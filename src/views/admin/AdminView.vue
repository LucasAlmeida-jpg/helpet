<template>
  <div class="container text-center">
    <div class="row">
      <div class="col">
        <router-link to="/sinais">
          <h4>Sinais Vitais</h4>
        </router-link>
      </div>
      <div class="col">
        <router-link to="/medicamentos">
          <h4>Registre Medicamentos dos Pets</h4>
        </router-link>
      </div>
      <div class="col">
        <router-link to="/cadastroAdmin">
          <h4>Cadastros</h4>
        </router-link>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <router-link to="/higieneAdmin">
          <h4>Higiene dos Pets</h4>
        </router-link>
      </div>
      <div class="col">
        <router-link to="/operacaoAdmin">
          <h4>Inserir Operações</h4>
        </router-link>
      </div>
      <div class="col">
        <router-link to="/desativar">
          <h4>Desativar perfil de usuário</h4>
        </router-link>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <router-link to="/listUser">
          <h4>Usuários</h4>
        </router-link>
      </div>
      <div class="col">
        <router-link to="/pets">
          <h4>Informações dos Pets</h4>
        </router-link>
      </div>
      <div class="col">
        <router-link to="/feedbackAdmin">
          <h4>FeedBack</h4>
        </router-link>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.col {
  background: #14A9FF;
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
