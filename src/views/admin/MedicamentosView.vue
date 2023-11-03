<template>
  <div>
    <div class="container d-flex align-items-center justify-content-between">
      <div>
        <h3>Registro de medicamentos</h3>
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
            <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Medicamento</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div>
              <label for="med">Nome do Pet</label>
              <input id="med" v-model="novoMedicamento.petMedications">
            </div>
            <div class="my-3">
              <label for="pet">Tipo de Pet</label>
              <input id="pet" v-model="novoMedicamento.petType">
            </div>

            <div class="my-3">
              <label for="pet">Horário da aplicacao</label>
              <input id="pet" v-model="novoMedicamento.timeAplication">
            </div>
            <label for="medicamento">Nome do medicamento</label>
            <input id="medicamento" type="text" v-model="novoMedicamento.medicationName">

            <div class="mt-3">
              <label for="name">Dosagem</label>
              <input id="name" type="text" v-model="novoMedicamento.dosage">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary" @click="registrarMedicamento"
              data-bs-dismiss="modal">Registrar</button>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-4 text-center info container">
      <div class="row row-cols-2 d-flex justify-content-between">
        <div class="medication-info col-3 card-users" v-for="(medicamento, index) in medicamentos" :key="index">
          <div>
            <img src="@/assets/animal.png" alt="">
          </div>
          <div>
            <div>Nome do Pet: {{ medicamento.nome_pet }} </div>
            <div>Medicamento: {{ medicamento.nome }} </div>
            <div>Dose: {{ medicamento.dose }}</div>
            <div>Horário da Aplicação : {{ medicamento.hora_de_aplicação }}</div>
            <div>Tipo do Pet : {{ medicamento.tipo_pet }}</div>
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
      medicamentos: [],
      novoMedicamento: {
        petMedications: '',
        petType: '',
        medicationName: '',
        timeAplication: '',
        dosage: '',
      },
    };
  },

  mounted() {
    axios.get('api/v1/medicamento')
      .then(response => {
        this.medicamentos = response.data.data;
      })
      .catch(error => {
        console.error('Erro ao buscar usuários:', error);
      });
  },

  methods: {

    registrarMedicamento() {

      var medData = {
        nome_pet: this.novoMedicamento.petMedications,
        tipo_pet: this.novoMedicamento.petType,
        nome: this.novoMedicamento.medicationName,
        dose: this.novoMedicamento.dosage,
        hora_de_aplicação: '2023-11-01 ' + this.novoMedicamento.timeAplication + ':00'
      };
      axios.post('api/v1/medicamento', medData)
        .then(response => {
          this.medicamentos = response.data.data;
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

