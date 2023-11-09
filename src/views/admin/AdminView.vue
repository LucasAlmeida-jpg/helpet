<template>
  <div class="container text-center mt-4">
    <div class="row">
      <router-link to="/sinais" class="col arrow">
        <h4>Sinais Vitais</h4>
      </router-link>

      <router-link to="/medicamentos" class="col arrow">
        <h4>Registre Medicamentos dos Pets</h4>
      </router-link>

      <router-link to="/cadastroAdmin" class="col arrow">
        <h4>Cadastros de Pets</h4>
      </router-link>
    </div>
    <div class="row">
      <router-link to="/higieneAdmin" class="col arrow">
        <h4>Higiene dos Pets</h4>
      </router-link>

      <router-link to="/operacaoAdmin" class="col arrow">
        <h4>Inserir Operações</h4>
      </router-link>

      <router-link to="/desativar" class="col arrow">
        <h4>Desativar perfil de usuário</h4>
      </router-link>
    </div>

    <div class="row">
      <router-link to="/listUser" class="col arrow">
        <h4>Usuários Cadastrados</h4>
      </router-link>

      <router-link to="/pets" class="col arrow">
        <h4>Informações dos Pets</h4>
      </router-link>

      <router-link to="/feedbackAdmin" class="col arrow">
        <h4>FeedBack</h4>
      </router-link>
    </div>
  </div>
</template>

<style lang="scss" scoped>
h4 {
  text-transform: uppercase;
  font-size: 15px;
}


.arrow:after {
  border-right: 0.2em solid white;
  border-bottom: 0.2em solid white;
  content: "";
  display: inline-block;
  height: .70em;
  margin-top: -6px;
  width: .70em;
  margin-left: 10px;

  -webkit-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  transform: rotate(-45deg);
}

.col {
  background: #9757FF;
  margin: 10px;
  height: 183px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 20px;
  cursor: pointer;
  color: white;
  max-width: 421px;
  transition: transform 0.3s ease;

  &:hover {
    transform: scale(1.1);

  }
}
</style>
