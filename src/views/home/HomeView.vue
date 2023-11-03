<template>
  <div class="container">
    <header class="d-flex align-items-center justify-content-between">
      <div class="first-section">
        <article class="info-article">
          <h1 class="mt-4">
            Gestão inteligente para um pet shop de excelência.
          </h1>
          <p>Helpet: A sua solução para uma gestão mais eficiente e cuidados ainda melhores para seus amiguinhos peludos.
          </p>
        </article>
      </div>
      <div class="second-section">
        <img src="@/assets/capa-helpet.png" alt="capa">
      </div>
    </header>
  </div>
</template>

<script>

export default {


}
</script>

<style scoped>
.container {
  margin-top: 20px;
}

.second-section img {
  background-color: #9757FF;
  clip-path: polygon(75% 0%, 100% 50%, 75% 100%, 0% 100%, 25% 50%, 0% 0%);
  padding: 10px 100px;
}

.first-section {
  background-color: #9757FF;
  -webkit-clip-path: polygon(0% 0%, 75% 0%, 100% 50%, 75% 100%, 0% 100%);
  clip-path: polygon(0% 0%, 87% 0%, 100% 50%, 87% 100%, 0% 100%);
  padding: 10px 100px;
  text-align: center;
}

.first-section .info-article {
  margin-right: 100px;
  color: white;
}
</style>

