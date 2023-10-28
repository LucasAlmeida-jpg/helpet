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
      <h1 class="mb-4">Descrições dos Pets
      </h1>
      <div v-for="(i, index) in sinais" :key="index">
        <h4>{{ i.descricao }}</h4>
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
    }
  }
};
</script>

<style scoped>
#vitalsObservations {
  max-height: 125px;
  min-height: 100px;

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