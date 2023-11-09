<template>
  <div class="container text-center mt-5">
    <div class="row">
      <router-link to="/cadastros" class="col arrow">
        <h4>Cadastros</h4>
      </router-link>

      <router-link to="/feedback" class="col arrow">
        <h4>Deixar FeedBacks</h4>
      </router-link>
    </div>
  </div>
</template>

<style lang="scss">
h4 {
  text-transform: uppercase;
  font-size: 15px;
}

// text

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
