<template>
  <div>
    <main class="container">
      <h2 class="offset-top-20 my-4">Gerenciamento dos Sinais Vitais</h2>
      <div class="card mb-3">
        <div class="card-body">
          <form class="text-left" id="vitalsForm">
            <div class="form-group">
              <textarea class="form-control" id="vitalsObservations" name="message" maxlength="300"
                placeholder="Digite as observações do pet (máximo de 300 caracteres)"></textarea>
              <small class="form-text text-muted" id="charCount">0/300 caracteres</small>
            </div>
            <div class="d-flex justify-content-center align-items-center">
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
</script>

<style>
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
</style>