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
            <h1 class="modal-title fs-5" id="exampleModalLabel">Gerenciamento de Higiene dos Pets</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div>
              <label for="med">Tipo de cuidado</label>
              <input class="form-control" id="med" v-model="novaHigiene.typeCare">
            </div>

            <div class="my-3">
              <label for="pet">Nome de Pet</label>
              <select class="form-control" name="pet" v-model="novaHigiene.petName">
                <option value="" disabled selected>Selecione o Pet</option>
                <option v-for="(pet, index) in pets" :value="pet.nome" :key="index">{{ pet.nome }}</option>
              </select>
            </div>

            <div class="my-3">
              <label for="pet">Tipo de Pet</label>
              <input class="form-control" id="pet" v-model="novaHigiene.petType">
            </div>

            <div class="my-3">
              <label for="pet">Qual foi a última vez que o pet fez o procedimento?</label>
              <input class="form-control" id="pet" type="date" v-model="novaHigiene.actualTime">
            </div>
            <label for="medicamento">Data atual do procedimento</label>
            <input class="form-control" id="medicamento" type="date" v-model="novaHigiene.lastTime">

            <div class="mt-3">
              <label for="name">Observacao</label>
              <input class="form-control" id="name" type="text" v-model="novaHigiene.obs">
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
      <div class="row row-cols-2 d-flex justify-content-center">
        <div class="higiene-info col-4 border" v-for="(h, index) in higienes" :key="index">
          <div class="text-center">
            <img src="@/assets/higiene.png" alt="">
          </div>
          <div>
            <div><span>Nome do Pet:</span> {{ h.pet_name }} </div>
            <div><span>Tipo do Pet:</span> {{ h.type_animal }} </div>
            <div><span>Tipo de cuidado:</span> {{ h.type_care }} </div>
            <div><span>Observação</span> {{ h.cuidados }} </div>
            <div><span>Data do ultimo procedimento?</span> {{ formatDate(h.ultimar) }} </div>
            <div><span>Data do atual procedimento?</span> {{ formatDate(h.proxr) }} </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from '@/axiosDefault';
import moment from 'moment'
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
      pets: [],
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


    axios.get('api/v1/pet')
      .then(response => {
        this.pets = response.data.data;
      })
  },

  methods: {
    formatDate(date) {
      return moment(date).format('DD/MM/YYYY');
    },

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
          window.location.reload();
        })
    }
  }


};
</script>

<style lang="scss" scoped>
span {
  font-weight: bold !important;
}

.higiene-info {
  justify-content: center;
  border-radius: 12px;
  transition: transform 0.3s ease;
  text-align: justify;
  cursor: pointer;
  padding: 40px;
  margin: 17px;
  // box-shadow: 5px 5px 5px 0px rgba(0, 0, 0, 0.81);
  // -webkit-box-shadow: 5px 5px 5px 0px rgba(0, 0, 0, 0.81);
  // -moz-box-shadow: 5px 5px 5px 0px rgba(0, 0, 0, 0.81);



  img {
    width: 250px;
    object-fit: cover;
    margin-top: -35px;
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

