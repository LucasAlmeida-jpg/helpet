<template>
  <div class="text-center">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-3 border card-pets" v-for="(u, index) in pets" :key="index">
          <div class="text-center">
            <img src="@/assets/pets.png" alt="">
          </div>
          <div>
            <div class="info-user"><span>Nome do Pet: </span>{{ u.nome }}</div>
            <div class="info-user"><span>Tipo: </span>{{ u.tipo }}</div>
            <div class="info-user"><span>Tamanho: </span>{{ u.tamanho }}</div>
            <div class="info-user"><span>Sexo: </span>{{ u.sexo }}</div>
            <div class="info-user"><span>Raça: </span>{{ u.raca_pet }}</div>
            <div class="info-user"><span>CPF do tutor: </span>{{ u.raca_pet }}</div>
            <div class="info-user"><span>Tutor: </span>{{ u.nome_tutor }}</div>
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
span {
  font-weight: bold !important;
}

.card-pets {
  justify-content: center;
  border-radius: 12px;
  transition: transform 0.3s ease;
  text-align: justify;
  cursor: pointer;
  padding: 40px;
  margin: 17px;

  img {
    width: 80px;
    object-fit: cover;
    margin-top: -20px;
  }


  &:hover {
    transform: scale(1.1);

  }
}
</style>