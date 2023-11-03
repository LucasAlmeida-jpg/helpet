<template>
  <div>
    <main class="container">
      <h3 class="offset-top-20 my-4">Gerenciamento dos Sinais Vitais</h3>
      <div class="text-center my-5">
        <h1 class="sinais">Sinais vitais</h1>
        <img src="@/assets/logo_helpett.png" alt="">
      </div>
      <div class="mb-5">
      </div>
      <div class="mb-4">
        <div class="card-body">
          <div>
            <textarea v-model="description" class="form-control" id="vitalsObservations" name="message" maxlength="300"
              placeholder="Digite as observações do pet (máximo de 300 caracteres)"></textarea>
            <small class="form-text text-muted" id="charCount">0/300 caracteres</small>
          </div>
          <div class="d-flex justify-content-end align-items-center">
            <button class="" @click="createSinais()">Salvar</button>
          </div>
          <div v-if="sinalCadastro" class="color-default text-center mt-2">
            Sinal Vital cadastrado com sucesso!
          </div>
        </div>
      </div>

      <div v-for="(i, index) in sinais" :key="index">
        <div class="form-control mb-4 p-4 d-flex align-items-center justify-content-between">
          <div>
            <h4>{{ i.descricao }}</h4>
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
      description: '',
      sinalCadastro: false,
    };
  },

  mounted() {
    axios.get('api/v1/sinais')
      .then(response => {
        this.sinais = response.data.data;
      })
  },

  methods: {
    createSinais() {
      var data = {
        descricao: this.description,
      };
      axios.post('api/v1/sinais', data)
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
  max-height: 125px;
  min-height: 100px;

}

.sinais {
  font-size: 14px;
  margin-bottom: -7px;
  font-style: italic;
  color: #9757FF;
  font-weight: bold;
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
  border: none !important;
  font-size: 20px;
}
</style>