<template>
  <div>
    <div class="container d-flex align-items-center justify-content-between">
      <div>
        <h3>Gerenciamento de Higiente dos Pets</h3>
      </div>
      <div>
        <button data-bs-toggle="modal" data-bs-target="#exampleModal">
          Registrar
        </button>
      </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Gerenciamento de Higiente dos Pets</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div>
              <label for="med">Tipo de cuidado</label>
              <input id="med" v-model="novaHigiene.typeCare">
            </div>

            <div class="my-3">
              <label for="pet">Nome de Pet</label>
              <input id="pet" v-model="novaHigiene.petName">
            </div>

            <div class="my-3">
              <label for="pet">Tipo de Pet</label>
              <input id="pet" v-model="novaHigiene.petType">
            </div>

            <div class="my-3">
              <label for="pet">Qual foi a última vez que o pet fez o procedimento?</label>
              <input id="pet" type="date" v-model="novaHigiene.actualTime">
            </div>
            <label for="medicamento">Data atual do procedimento</label>
            <input id="medicamento" type="date" v-model="novaHigiene.lastTime">

            <div class="mt-3">
              <label for="name">Observacao</label>
              <input id="name" type="text" v-model="novaHigiene.obs">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="button" class="" @click="registrarHigiene" data-bs-dismiss="modal">Registrar</button>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-4 text-center info container">
      <div class="row row-cols-2 d-flex justify-content-between">
        <div class="medication-info col-3 card-users" v-for="(h, index) in higienes" :key="index">
          <div>
            <img src="@/assets/animal.png" alt="">
          </div>
          <div>
            <div>Nome do Pet: {{ h.pet_name }} </div>
            <div>Tipo do Pet: {{ h.type_animal }} </div>
            <div>Tipo de cuidado: {{ h.type_care }} </div>
            <div>Observação {{ h.cuidados }} </div>
            <div>Data do ultimo procedimento? {{ h.ultimar }} </div>
            <div>Data do atual procedimento? {{ h.proxr }} </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from '@/axiosDefault';

export default {
  data() {
    return {
      higienes: [],
      novaHigiene: {
        typeCare: '',
        petType: '',
        lastTime: '',
        actualTime: '',
        obs: '',
        petName: '',
      },
    };
  },

  mounted() {
    axios.get('api/v1/higiene')
      .then(response => {
        this.higienes = response.data.data.data;
      })
      .catch(error => {
        console.error('Erro ao buscar usuários:', error);
      });
  },

  methods: {

    registrarHigiene() {
      var medData = {
        type_care: this.novaHigiene.typeCare,
        type_animal: this.novaHigiene.petType,
        ultimar: this.novaHigiene.lastTime,
        proxr: this.novaHigiene.actualTime,
        cuidados: this.novaHigiene.obs,
        pet_name: this.novaHigiene.petName,
      };
      axios.post('api/v1/higiene', medData)
        .then(response => {
          this.higienes = response.data.data;
        })
    }
  }


};
</script>

<style lang="scss" scoped>
.medication-info {
  margin: 10px;
  box-shadow: inset;
  padding: 30px 10px;
  font-weight: bold;
  color: #9757FF;
  font-size: 20px;
  justify-content: center;
  border-radius: 12px;
  transition: transform 0.3s ease;
  text-align: center;
  cursor: pointer;
  opacity: 0.8;


  img {
    width: 80px;
    object-fit: cover;
  }


  &:hover {
    transform: scale(1.1);

  }

  .info-user {
    background: #9757FF;
    margin: 5px;
    color: white;
    padding: 8px 0px;
    border-radius: 40px;
  }
}
</style>

