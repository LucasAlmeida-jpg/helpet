<template>
  <div class="text-center">
    <div class="container">
      <div class="row row-cols-2 d-flex justify-content-center">
        <div class="col-5 card-users" v-for="(u, index) in users" :key="index">
          <div>
            <img src="@/assets/user.png" alt="">
          </div>
          <div>
            <div>Nome: {{ u.nome }}</div>
            <div>E-mail: {{ u.email }}</div>
            <div>CPF: {{ formatCPF(u.cpf) }}</div>
            <div>Endereço: {{ u.endereco }}</div>
            <div>{{ u.pets.name }}</div>
          </div>
        </div>
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
    };
  },

  mounted() {
    axios.get('api/v1/user')
      .then(response => {
        this.users = response.data.data;
        console.log(this.users);
      })
      .catch(error => {
        console.error('Erro ao buscar usuários:', error);
      });
  },

  methods: {
    formatCPF(cpf) {
      cpf = cpf.replace(/\D/g, '');
      if (cpf.length === 11) {
        cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3.$4');
        return `${cpf.substr(0, 11)}.04`;
      } else {
        return 'CPF inválido';
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.card-users {
  margin: 10px;
  border: 5px solid black;
  padding: 30px 10px;
  font-weight: bold;
  color: black;
  font-size: 20px;
  justify-content: center;
  border-radius: 12px;

  img {
    width: 80px;
    object-fit: cover;
  }
}
</style>