<template>
  <div class="text-center">
    <div class="container">
      <div class="row row-cols-2 d-flex justify-content-between">
        <div class="col-3 card-users" v-for="(u, index) in users" :key="index">
          <div>
            <img src="@/assets/user.png" alt="">
          </div>
          <div>
            <div class="info-user">Nome: {{ u.nome }}</div>
            <div class="info-user">E-mail: {{ u.email }}</div>
            <div class="info-user">CPF: {{ formatCPF(u.cpf) }}</div>
            <div class="info-user">Endereço: {{ u.endereco }}</div>
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
  box-shadow: inset;
  padding: 30px 10px;
  font-weight: bold;
  color: #9757FF;
  font-size: 20px;
  justify-content: center;
  border-radius: 12px;
  transition: transform 0.3s ease;
  text-align: center;
  cursor: pointer;
  opacity: 0.8;


  img {
    width: 80px;
    object-fit: cover;
  }


  &:hover {
    transform: scale(1.1);

  }

  .info-user {
    background: #9757FF;
    margin: 5px;
    color: white;
    padding: 8px 0px;
    border-radius: 40px;
  }
}
</style>

