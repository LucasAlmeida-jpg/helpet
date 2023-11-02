<template>
  <div class="text-center">
    <div class="container">
      <div class="row row-cols-2 d-flex justify-content-between">
        <div class="col-3 card-users" v-for="(u, index) in pets" :key="index">
          <div>
            <img src="@/assets/animal.png" alt="">
          </div>
          <div>
            <div class="info-user">Nome do Pet: {{ u.nome }}</div>
            <div class="info-user">Tipo: {{ u.tipo }}</div>
            <div class="info-user">Tamanho: {{ u.tamanho }}</div>
            <div class="info-user">Sexo: {{ u.sexo }}</div>
            <div class="info-user">Raça: {{ u.raca_pet }}</div>
            <div class="info-user">CPF do tutor: {{ u.raca_pet }}</div>
            <div class="info-user">Tutor: {{ u.nome_tutor }}</div>
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
      pets: [],
    };
  },

  mounted() {
    axios.get('api/v1/pet')
      .then(response => {
        this.pets = response.data.data;
        console.log(this.pets);
      })
      .catch(error => {
        console.error('Erro ao buscar pets:', error);
      });
  },

  methods: {

  }
};
</script>


<style lang="scss" scoped>
.card-users {
  margin: 10px;
  box-shadow: inset;
  padding: 30px 10px;
  font-weight: bold;
  color: black;
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
    background: black;
    margin: 5px;
    color: white;
    padding: 8px 0px;
    border-radius: 40px;
  }
}
</style>