<template>
  <nav>
    <div class="container d-flex align-items-center justify-content-between">
      <a href="/">
        <div><img class="helpet" src="../src/assets/logo_helpett.png" alt=""></div>
      </a>
      <div>
        <button class="btn btn-secondary-account" data-bs-toggle="modal" data-bs-target="#createAccount"
          v-if="!loggedIn.user">Não possui conta?</button>
        <button class="ms-3" data-bs-toggle="modal" data-bs-target="#loginAdmin" v-if="!loggedIn.user">Login</button>
        <div class="d-flex align-items-center">
          <h6 class="welcome">{{ greetingMessage }}</h6>
          <h6 class="welcome ms-5 btn btn-secondary-account" @click="logout" v-if="loggedIn.user">Log Out</h6>
        </div>
      </div>
    </div>
  </nav>

  <div class="modal fade" id="createAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <div>
            <img class="logo" src="@/assets/logo_helpett.png" alt="Helpet Logo">
          </div>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" v-model="name">
            <label for="floatingInput">Nome</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" v-model="cpf">
            <label for="floatingInput">CPF</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" v-model="endereco">
            <label for="floatingInput">Endereço</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" v-model="email">
            <label for="floatingInput">E-mail</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" v-model="senha">
            <label for="floatingPassword">Senha</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" v-model="senha">
            <label for="floatingPassword">Confirmar senha</label>
          </div>
        </div>
        <div class="modal-footer">
          <router-link to="/"><button type="button" class="" data-bs-dismiss="modal"
              @click="createUSer()">Salvar</button></router-link>
          <router-link to="/"><button type="button" class="btn btn-secondary"
              data-bs-dismiss="modal">Cancelar</button></router-link>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="loginAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <div>
            <img class="logo" src="@/assets/logo_helpett.png" alt="Helpet Logo">
          </div>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" v-model="emailAdmin">
            <label for="floatingInput">E-mail</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" v-model="senhaAdmin">
            <label for="floatingPassword">Senha</label>
          </div>
          <span v-if="errorLogin" class="text-danger">Senha Incorreta!</span>
        </div>
        <div class="modal-footer">
          <button type="button" class="" @click="validateAdmin()">Entrar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Recuperar Senha</button>
        </div>
      </div>
    </div>
  </div>
  <router-view />
</template>

<script>
import axios from '@/axiosDefault';
export default {
  data() {
    return {
      user: '',
      name: '',
      cpf: '',
      endereco: '',
      email: '',
      senha: '',
      senhaClient: '',
      emailClient: '',
      errorLogin: false,
      emailAdmin: '',
      senhaAdmin: '',
      loggedIn: {},
    };
  },
  computed: {
    greetingMessage() {
      if (this.loggedIn.user && this.loggedIn.user.length > 0) {
        return `Olá, ${this.loggedIn.user[0].nome}!`;
      } else {
        return '';
      }
    }
  },
  methods: {
    createUSer() {
      var data = {
        nome: this.name,
        email: this.email,
        password: this.senha,
        cpf: this.cpf,
        endereco: this.endereco,
      }
      axios.post('api/v1/user', data)
        .then(response => {
          this.user = response.data.data;
        })
        .catch(error => {
          console.error('Erro ao buscar usuários:', error);
        });
    },

    async validateAdmin() {
      try {
        const dataUser = {
          email: this.emailAdmin,
          password: this.senhaAdmin,
        };
        const response = await axios.post('api/v1/login', dataUser);

        if (response.data.user && response.data.user.length > 0) {
          this.loggedIn = response.data;

          localStorage.setItem('loggedIn', JSON.stringify(this.loggedIn));

          if (this.loggedIn.user[0].admin) {
            this.$router.push('/admin');
          } else {
            this.$router.push('/client');
          }
        } else {
          console.log('Usuário inválido na resposta da API');
        }
      } catch (error) {
        this.errorLogin = true;
        setTimeout(() => {
          this.errorLogin = false;
        }, 1000);
      }
    },

    logout() {
      localStorage.removeItem('loggedIn');

      this.$router.push('/');
    }

  },
  created() {
    const savedLoginData = localStorage.getItem('loggedIn');
    if (savedLoginData) {
      this.loggedIn = JSON.parse(savedLoginData);
    }
  }
};
</script>

<style lang="scss">
.em-andamento,
.welcome {
  color: #9757FF;

}

.finalizado {
  color: blue;

}

.cancelado {
  color: red;

}


.color-default {
  color: #9757FF;
}

nav {
  padding: 30px;
}

li {
  list-style: none;
  color: #9757FF;
  font-weight: bold;
  margin: 20px;
}

a {
  text-decoration: none !important;
  color: white !important;
}

h3 {
  color: #9757FF;
}

button {
  background: #9757FF;
  border: none;
  padding: 6px 20px;
  color: white;
  border-radius: 40px !important;
  font-size: 14px;
  font-weight: bold;
}

.btn-secondary-account {
  border: #9757FF !important;
  color: #9757FF !important;
  border: 4px solid #9757FF !important;
}

footer {
  background-color: #9757FF;
  padding: 40px 100px;
  position: fixed;
  bottom: 0;
  width: 100%;

}

.helpet {
  width: 200px;
}

.logo {

  width: 200px;
  background: white;
  border-radius: 30px;
  cursor: pointer;
  padding: 5px;
}

.bold {
  font-weight: bold;
}

input,
select {
  width: 100%;
  padding: 10px;
}
</style>