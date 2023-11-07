<template>
  <nav>
    <div class="container d-flex align-items-center justify-content-between">
      <a href="/">
        <div><img class="helpet" src="../src/assets/logo_helpett.png" alt=""></div>
      </a>
      <div>
        <button class="btn btn-secondary-account" data-bs-toggle="modal" data-bs-target="#createAccount">Não possui
          conta?</button>
        <button class="mx-3" data-bs-toggle="modal" data-bs-target="#loginClient">Cliente</button>
        <button data-bs-toggle="modal" data-bs-target="#loginAdmin">Admin</button>
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
            <input type="email" class="form-control" id="floatingInput">
            <label for="floatingInput">E-mail</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword">
            <label for="floatingPassword">Senha</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword">
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

  <div class="modal fade" id="loginClient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <div>
            <img class="logo" src="@/assets/logo_helpett.png" alt="Helpet Logo">
          </div>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" v-model="emailClient">
            <label for="floatingInput">E-mail (Cliente)</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" v-model="senhaClient">
            <label for="floatingPassword">Senha (Cliente)</label>
          </div>
          <span v-if="errorLogin" class="text-danger">Senha Incorreta!</span>
        </div>
        <div class="modal-footer">
          <button type="button" @click="validateClient()">Entrar</button>
          <button type=" button" class="btn btn-secondary" data-bs-dismiss="modal">Recuperar Senha</button>
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
  <!-- 
  <footer class="text-center">
    <div class="container-fluid d-flex align-items-center justify-content-center">
      <div><img src="../src/assets/logo_helpett.png" class="logo" alt=""></div>
    </div>
  </footer> -->
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

    };
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
          console.log(this.user, 'this.user');
        })
        .catch(error => {
          console.error('Erro ao buscar usuários:', error);
        });
    },
    async validateClient() {
      try {
        const dataUser = {
          email: this.emailClient,
          password: this.senhaClient,
        };
        const response = await axios.post('api/v1/login', dataUser);
        this.user = response.data.data;

        this.$router.push('/client');
      } catch (error) {
        this.errorLogin = true;
        setTimeout(() => {
          this.errorLogin = false;
        }, 1000)
      }
    },

    async validateAdmin() {
      try {
        const dataUser = {
          email: this.emailAdmin,
          password: this.senhaAdmin,
        };
        const response = await axios.post('api/v1/login', dataUser);
        this.user = response.data.data;

        this.$router.push('/admin');
      } catch (error) {
        this.errorLogin = true;
        setTimeout(() => {
          this.errorLogin = false;
        }, 1000)
      }
    }




  }
};
</script>

<style lang="scss">
.em-andamento {
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