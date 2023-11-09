<template>
  <div class="text-center">
    <div class="container">
      <div class="text-center my-5">
        <img src="@/assets/logo_helpett.png" alt="">
      </div>
      <div class="row row-cols-2 d-flex justify-content-center">
        <div class="col-3 border card-users" v-for="(u, index) in users" :key="index">
          <div class="text-center">
            <img src="@/assets/usuarios.png" alt="">
          </div>
          <div>
            <div class="info-user"><span>Nome: </span>{{ u.nome }}</div>
            <div class="info-user"><span>E-mail: </span>{{ u.email }}</div>
            <div class="info-user"><span>CPF: </span>{{ formatCPF(u.cpf) }}</div>
            <div class="info-user"><span>Endereço: </span>{{ u.endereco }}</div>
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
span {
  font-weight: bold !important;
}

.card-users {
  justify-content: center;
  border-radius: 12px;
  transition: transform 0.3s ease;
  text-align: justify;
  cursor: pointer;
  padding: 40px 20px;
  margin: 17px;


  img {
    width: 250px;
    margin-top: -30px;
    object-fit: cover;
  }


  &:hover {
    transform: scale(1.1);

  }


}
</style>

