<template>
  <div class="d-flex align-items-center justify-content-center">
    <div>
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Cadastro Pets</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
            type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Cadastro Clientes</button>
        </li>
      </ul>
    </div>
  </div>
  <div class="container">
    <div class="tab-content text-center" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
        tabindex="0">
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
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
        <form action="">
          <input class="form-control" type="text" placeholder="Nome do Pet">
          <input class="form-control" type="text" placeholder="E-mail">
          <input class="form-control" type="text" placeholder="Telefone">
          <input type="date" class="form-control" placeholder="Data de nascimento">
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