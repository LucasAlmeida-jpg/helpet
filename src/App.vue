<template>
  <nav>
    <div class="container d-flex align-items-center justify-content-between">
      <div>
        <div><img class="helpet" src="../src/assets/helpet.png" alt=""></div>
      </div>
      <div>
        <button data-bs-toggle="modal" data-bs-target="#createAccount">Não possui conta?</button>
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
            <img class="logo" src="@/assets/helpet.png" alt="Helpet Logo">
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
            <input type="password" class="form-control" id="floatingPassword">
            <label for="floatingPassword">Confirmar senha</label>
          </div>
        </div>
        <div class="modal-footer">
          <router-link to="/"><button type="button" class="btn btn-primary" data-bs-dismiss="modal"
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
            <img class="logo" src="@/assets/helpet.png" alt="Helpet Logo">
          </div>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput">
            <label for="floatingInput">E-mail</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword">
            <label for="floatingPassword">Senha</label>
          </div>
        </div>
        <div class="modal-footer">
          <router-link to="/client"><button type="button" class="btn btn-primary"
              data-bs-dismiss="modal">Entrar</button></router-link>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Recuperar Senha</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="loginAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <div>
            <img class="logo" src="@/assets/helpet.png" alt="Helpet Logo">
          </div>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput">
            <label for="floatingInput">E-mail</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword">
            <label for="floatingPassword">Senha</label>
          </div>
        </div>
        <div class="modal-footer">
          <router-link to="/Admin"><button type="button" class="btn btn-primary"
              data-bs-dismiss="modal">Entrar</button></router-link>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Recuperar Senha</button>
        </div>
      </div>
    </div>
  </div>

  <router-view />

  <!-- <footer class="text-center">
    <div class="container-fluid d-flex align-items-center justify-content-center">
      <div><img src="../src/assets/helpet.png" alt=""></div>
    </div>
  </footer> -->
</template>


<style lang="scss">
nav {
  padding: 30px;
}

li {
  list-style: none;
  color: #14A9FF;
  font-weight: bold;
  margin: 20px;
}

a {
  text-decoration: none !important;
  color: white !important;
}

h3 {
  color: #14A9FF;
}

button {
  background: #14A9FF;
  border: none;
  padding: 6px 20px;
  color: white;
  border-radius: 40px !important;
  font-size: 14px;
  font-weight: bold;
}

footer {
  background-color: #14A9FF;
  padding: 80px 100px;

  position: absolute;
  bottom: 0;

}

.helpet {
  width: 200px;
}

.logo {
  justify-content: center;
  width: 200px;
  background: white;
  border-radius: 30px;
  cursor: pointer;
  padding: 5px;
}

input,
select {
  border-radius: 20px;
}
</style>

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
      senha: ''
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
          console.log(this.user);
        })
        .catch(error => {
          console.error('Erro ao buscar usuários:', error);
        });
    }
  }
};
</script>