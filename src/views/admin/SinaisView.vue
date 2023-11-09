<template>
  <div>
    <main class="container">
      <div class="text-center my-5">
        <h1 class="sinais">Sinais vitais</h1>
        <img src="@/assets/logo_helpett.png" alt="">
      </div>
      <div class="mb-4">
        <div class="card-body d-flex justify-content-center align-items-center">
          <div>
            <select class="form-control mb-4" name="pet" v-model="pet_name" id="pet">
              <option value="" disabled selected>Selecione o Pet</option>
              <option v-for="(pet, index) in pets" :key="index">
                {{ pet.nome }}
              </option>
            </select>
            <textarea v-model="descricao" class="form-control" id="vitalsObservations" name="message" maxlength="300"
              placeholder="Digite as observações do pet (máximo de 300 caracteres)"></textarea>
            <small class="form-text text-muted" id="charCount">0/300 caracteres</small>
            <div class="d-flex justify-content-end align-items-center">
              <button class="" @click="createSinais()">Salvar</button>
            </div>
            <div v-if="sinalCadastro" class="color-default text-center mt-2">
              Sinal Vital cadastrado com sucesso!
            </div>
          </div>
        </div>
      </div>

      <div v-for="(i, index) in sinais" :key="index">
        <div class="form-control mb-4 p-4 d-flex align-items-center justify-content-between">
          <div>
            <h4><span>Nome do Pet:</span> {{ i.pet_name }}</h4>
            <h4><span>Descrição do Sinal vital:</span> {{ i.descricao }}</h4>
          </div>
          <div>
            <h4 class="date-info">Data: {{ formatDate(i.created_at) }}</h4>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import moment from 'moment';
import axios from '@/axiosDefault';
export default {
  data() {
    return {
      sinais: [],
      descricao: '',
      sinalCadastro: false,
      pets: [],
      pet_name: '',
    };
  },

  mounted() {
    axios.get('api/v1/sinais')
      .then(response => {
        this.sinais = response.data.data;
      });

    axios.get('api/v1/pet')
      .then(response => {
        this.pets = response.data.data;
      })
      .catch(error => {
        console.error('Erro ao buscar pets:', error);
      });
  },

  methods: {
    createSinais() {
      var dataSign = {
        descricao: this.descricao,
        pet_name: this.pet_name,
      };

      axios.post('api/v1/sinais', dataSign)
        .then(response => {
          this.sinais = response.data.data;
          this.sinalCadastro = true;
          setTimeout(() => {
            this.sinalCadastro = false;
            window.location.reload();
          }, 2000);
        });
    },

    formatDate(date) {
      return moment(date).format('DD/MM/YYYY');
    },
  }
};
</script>

<style scoped>
#vitalsObservations {
  min-width: 800px;
  min-height: 134px;

}

h4 {
  font-size: 14px;
}

span {
  font-weight: bold;
}

.sinais {
  font-size: 10px;
  margin-bottom: -7px;
  font-style: italic;
  color: #9757FF;

  margin-bottom: -28px;
  margin-right: -108px;
}

.bg {
  background: #9757FF;
  color: white;
  border-radius: 12px;
  padding: 20px;

}

.date-info {
  font-size: 12px;
  color: grey;
  opacity: .7;
}

.logo {
  border-style: none;
  object-fit: cover;
  z-index: 1;
  width: 231px;
}

.btn-primary {
  padding: 12px 30px;
  border-radius: 50px;
  background-color: #9757FF !important;
  border: none;
  font-weight: 700;
}

.btn-danger {
  border-radius: 50px;

}

select {
  cursor: pointer;
  padding: 14px;
}
</style>