<template>
  <div class="container text-center">
    <div class="row">
      <div class="col">
        <router-link to="/cadastros">
          <h4>Cadastros</h4>
        </router-link>
      </div>
      <div class="col">
        <router-link to="/feedback">
          <h4>Deixar FeedBacks</h4>
        </router-link>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
.col {
  background: #14A9FF;
  margin: 10px;
  height: 183px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 20px;
  margin-top: 140px;
  margin-bottom: 100px;
  cursor: pointer;
  color: white;
  transition: transform 0.3s ease;



  &:hover {
    transform: scale(1.1);

  }
}
</style>
