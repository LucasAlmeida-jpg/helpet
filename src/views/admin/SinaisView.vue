<template>
  <div>
    <main class="container">
      <h2 class="offset-top-20 my-4">Gerenciamento dos Sinais Vitais</h2>
      <div class="mb-5">
      </div>
      <div class="card mb-3">
        <div class="card-body">
          <form class="text-left" id="vitalsForm">
            <div class="form-group">
              <textarea v-model="description" class="form-control" id="vitalsObservations" name="message" maxlength="300"
                placeholder="Digite as observações do pet (máximo de 300 caracteres)"></textarea>
              <small class="form-text text-muted" id="charCount">0/300 caracteres</small>
            </div>
            <div class="d-flex justify-content-center align-items-center">
              <button class="btn btn-primary" @click="createSinais()">Salvar</button>
            </div>
          </form>
        </div>
      </div>
      <h1 class="my-5 text-center bg">Descrições dos Pets
      </h1>
      <div v-for="(i, index) in sinais" :key="index">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <h4>{{ i.descricao }}</h4>
          </div>
          <div>
            <h4 class="date-info">{{ formatDateAndTime(i.created_at) }}</h4>
          </div>
        </div>
        <hr>
      </div>
    </main>
  </div>
</template>

<script>
import axios from '@/axiosDefault';
export default {
  data() {
    return {
      sinais: [],
      description: '',
    };
  },

  mounted() {
    axios.get('api/v1/sinais')
      .then(response => {
        this.sinais = response.data.data;
        console.log(this.sinais);
      })
      .catch(error => {
        console.error('Erro ao buscar usuários:', error);
      });
  },

  methods: {
    createSinais() {
      var data = {
        descricao: this.description,
      }
      axios.post('api/v1/sinais', data)
        .then(response => {
          this.sinais = response.data.data;
        })
        .catch(error => {
          console.error('Erro ao buscar usuários:', error);
        });
    },
    formatDateAndTime(datetime) {
      const date = new Date(datetime);
      const formattedDate = `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()}`;
      const hours = String(date.getHours()).padStart(2, '0');
      const minutes = String(date.getMinutes()).padStart(2, '0');
      const formattedTime = `${hours}:${minutes}`;
      return `Data: ${formattedDate} Horário: ${formattedTime}`;
    },
  }
};
</script>

<style scoped>
#vitalsObservations {
  max-height: 125px;
  min-height: 100px;

}

.bg {
  background: #14A9FF;
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
  background-color: #14A9FF !important;
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