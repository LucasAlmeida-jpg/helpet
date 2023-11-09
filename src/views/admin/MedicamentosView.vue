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
              <label for="med">Qual o Pet</label>
              <!-- <input form-control id="med"> -->
              <select name="med" v-model="novoMedicamento.petMedications" class="form-control">
                <option value="" disabled selected>Selecione o Pet</option>
                <option v-for="(pet, index) in pets" :value="pet.nome" :key="index">{{ pet.nome }}</option>
              </select>
            </div>
            <div class="my-3">
              <label for="pet">Tipo de Pet</label>
              <input class="form-control" id="pet" v-model="novoMedicamento.petType">
            </div>

            <div class="my-3">
              <label for="pet">Horário da Aplicação</label>
              <input class="form-control" type="time" id="pet" v-model="novoMedicamento.timeAplication">
            </div>
            <label for="medicamento">Nome do medicamento</label>
            <input class="form-control" id="medicamento" type="text" v-model="novoMedicamento.medicationName">

            <div class="mt-3">
              <label for="name">Dosagem</label>
              <input class="form-control" id="name" type="text" v-model="novoMedicamento.dosage">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="button" class="" @click="registrarMedicamento" data-bs-dismiss="modal">Registrar</button>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-5 text-center container">
      <div class="row d-flex justify-content-center">
        <div class="medication-info border col-5" v-for="(medicamento, index) in medicamentos" :key="index">
          <div class="text-center mb-3">
            <img src="@/assets/medicamentos.png" alt="">
          </div>
          <div>
            <div><span>Nome do Pet:</span> {{ medicamento.nome_pet }} </div>
            <div><span>Medicamento:</span> {{ medicamento.nome }} </div>
            <div><span>Dose:</span> {{ medicamento.dose }}</div>
            <div><span>Horário da Aplicação:</span> {{ medicamento.hora_de_aplicação }}</div>
            <div><span>Tipo do Pet:</span> {{ medicamento.tipo_pet }}</div>
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
      pets: [],
    };
  },

  mounted() {
    axios.get('api/v1/medicamento')
      .then(response => {
        this.medicamentos = response.data.data;
      })
      .catch(error => {
        console.error('Erro ao buscar medicamentos:', error);
      });

    axios.get('api/v1/pet')
      .then(response => {
        this.pets = response.data.data;
      })

  },

  methods: {

    registrarMedicamento() {
      var medData = {
        nome_pet: this.novoMedicamento.petMedications,
        tipo_pet: this.novoMedicamento.petType,
        nome: this.novoMedicamento.medicationName,
        dose: this.novoMedicamento.dosage,
        hora_de_aplicação: this.novoMedicamento.timeAplication,
      };
      axios.post('api/v1/medicamento', medData)
        .then(response => {
          this.medicamentos = response.data.data;
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

.medication-info {
  justify-content: center;
  border-radius: 12px;
  transition: transform 0.3s ease;
  text-align: justify;
  cursor: pointer;
  padding: 40px;
  margin: 17px;

  img {
    width: 250px;
    object-fit: cover;
  }

  &:hover {
    transform: scale(1.1);

  }
}
</style>

