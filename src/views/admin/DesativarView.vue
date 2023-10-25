<template>
  <div>
    <div class="container">
      <h3 class="text-center my-5">Desativar Perfil do usuário</h3>
      <div class="row">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nome do tutor</label>
          <input class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Lista de Pets</label>
          <input class="form-select" id="exampleFormControlInput1">
        </div>
      </div>
    </div>

    <div class="form-floating mt-5 d-flex justify-content-center">
      <div><button class="btn btn-secondary mt-4">Excluir</button></div>
    </div>
  </div>
</template>

<style scoped>
.btn-secondary {
  padding: 12px 30px;
  border-radius: 50px;
  background: red;
  border: none;
}

.container {
  max-width: 500px;
}
</style>