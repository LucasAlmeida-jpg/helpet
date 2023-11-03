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
      <div class="color-default mt-4" v-if="feedbackEnviado">Feedback enviado com sucesso!</div>
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
      feedbackEnviado: false,

    };
  },

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
          this.feedbackEnviado = true;

          setTimeout(() => {
            window.location.reload();
            this.feedbackEnviado = false;
          }, 2000);
        })

    },
  }
};
</script>

<style scoped>
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
</style>