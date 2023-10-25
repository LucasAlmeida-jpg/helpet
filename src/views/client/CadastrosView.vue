<template>
  <div class="container">
    <div class="row">
      <div>
        <h3 class="text-center">Faça o cadastro de seu pet</h3>
        <form action="">
          <input class="form-control" type="text" placeholder="Nome do Pet">
          <input class="form-control" type="text" placeholder="Tipo do Pet">
          <input class="form-control" type="text" placeholder="Tamanho do Pet">
          <input class="form-control" type="text" placeholder="Sexo do Pet">
          <input class="form-control" type="text" placeholder="Raca do Pet">
          <input class="form-control" type="text" placeholder="Cor do Pet">
          <input class="form-control" type="text" placeholder="CPF do Tutor">
          <input class="form-control" type="text" placeholder="Nome do Tutor">
          <button>Cadastrar</button>
        </form>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.container {
  display: flex;
  align-content: center;
  justify-content: center;
}

input {
  min-width: 350px !important;
  display: block !important;
  margin: 20px 0px;
  padding: 10px 16px;
}

form {
  display: block !important;
}

button {
  min-width: 350px !important;
  padding: 10px;
}
</style>