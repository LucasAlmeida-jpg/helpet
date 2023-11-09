<template>
  <div>
    <div class="container">
      <h3 class="text-center my-5">Desativar Perfil do usuário</h3>
      <div class="row">
        <div class="mb-3">
          <label for="tutor">Desativar Perfil do usuário selecionando abaixo.</label>
          <select id="tutor" v-model="selectedUserId" class="form-control">
            <option class="optionDisabled " v-for="user in users" :key="user.id" :value="user.id">{{ user.nome }}</option>
          </select>
        </div>
      </div>
    </div>

    <div class="form-floating mt-5 d-flex justify-content-center">
      <div>
        <button class="btn btn-secondary mt-4" @click="deleteUser">Excluir</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from '@/axiosDefault';

export default {
  data() {
    return {
      users: [],
      selectedUserId: null,
    };
  },

  mounted() {
    this.loadUsers();
  },

  methods: {
    loadUsers() {
      axios.get('api/v1/user')
        .then(response => {
          this.users = response.data.data;
        })
    },

    deleteUser() {
      if (this.selectedUserId !== null) {
        axios.delete(`api/v1/user/${this.selectedUserId}`)
          .then(() => {
            this.loadUsers();
          })
      } else {
        console.error('Nenhum usuário selecionado para exclusão.');
      }
    },
  },
};
</script>

<style scoped>
.optionDisabled {
  width: 100% !important;
  padding: 10px !important;
}

.btn-secondary {
  padding: 12px 30px;
  border-radius: 50px;
  background: red;
  border: none;
}

.container {
  max-width: 500px;
}
</style>