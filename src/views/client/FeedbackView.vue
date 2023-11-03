<template>
  <div class="container text-center">
    <div class="feedback-container">
      <h3>Sistema de Feedback</h3>
      <div class="mb-3 mt-5">
        <input class="form-control" v-model="nome" id="pet-name" required placeholder="Nome">
      </div>
      <div class="mb-3">
        <textarea id="feedback-text" v-model="feedback" class="form-control" rows="4" maxlength="300" required
          placeholder="Digite aqui"></textarea>
      </div>
      <button @click="createFeedback()">Enviar Feedback</button>
    </div>
  </div>
</template>
<script>
import axios from '@/axiosDefault';
export default {
  data() {
    return {
      feed: [],
      nome: '',
      feedback: '',
    };
  },

  // mounted() {
  //   axios.get('api/v1/feedback')
  //     .then(response => {
  //       this.feed = response.data.data;
  //       console.log(this.feed);
  //     })
  // },

  methods: {
    createFeedback() {
      var data = {
        feedback_tutor: this.feedback,
        name_tutor: this.nome,
        name: this.nome,
        created_at: new Date().toISOString()
      }

      axios.post('api/v1/feedback', data)
        .then(response => {
          this.sinais = response.data.data;
        })
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

<style>
.feedback-container {
  max-width: 600px;
  margin: 0 auto;
}

input,
textarea {
  border-radius: 20px !important;
  padding: 18px !important;
}

.pet-feedback {
  margin-bottom: 20px;
  border: 1px solid #ccc;
  padding: 10px;
  margin-top: 12px;
  border-radius: 30px;
}

.btn-primary {
  padding: 12px 30px;
  border-radius: 50px;
  background-color: #05AFF2 !important;
  border: none;
}
</style>