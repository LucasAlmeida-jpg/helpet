<template>
  <div class="container text-center">
    <div class="feedback-container">
      <h3>Sistema de Feedback</h3>
      <form id="feedback-form">
        <div class="mb-3 mt-5">
          <input class="form-control" id="pet-name" required placeholder="Nome">
        </div>
        <div class="mb-3">
          <textarea id="feedback-text" class="form-control" rows="4" maxlength="300" required
            placeholder="Digite aqui"></textarea>
        </div>
        <button class="btn-primary btn" type="submit">Enviar Feedback</button>
      </form>
      <div id="feedback-list"></div>
    </div>
  </div>
</template>



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