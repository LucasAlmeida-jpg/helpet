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
              <label for="med">Seu pet toma medicações</label>
              <select id="med" class="form-select" v-model="novoMedicamento.petMedications">
                <option value="Sim">Sim</option>
                <option value="Não">Não</option>
              </select>
            </div>
            <div class="my-3">
              <label for="pet">Tipo de Pet</label>
              <select id="pet" class="form-select" v-model="novoMedicamento.petType">
                <option value="Cachorro">Cachorro</option>
                <option value="Gatos">Gatos</option>
                <option value="Outros">Outros</option>
              </select>
            </div>
            <input class="form-control" type="text" v-model="novoMedicamento.medicationName"
              placeholder="Nome do medicamento">
            <input class="form-control mt-3" type="text" v-model="novoMedicamento.dosage" placeholder="Dosagem">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" @click="registrarMedicamento">Registrar</button>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-4 text-center info container">
      <table class="table mt-5">
        <thead>
          <tr>
            <th scope="col">Seu pet toma medicações</th>
            <th scope="col">Tipo de Pet</th>
            <th scope="col">Nome do medicamento</th>
            <th scope="col">Dosagem</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(medicamento, index) in medicamentos" :key="index">
            <td>{{ medicamento.petMedications }}</td>
            <td>{{ medicamento.petType }}</td>
            <td>{{ medicamento.medicationName }}</td>
            <td>{{ medicamento.dosage }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      medicamentos: [],
      novoMedicamento: {
        petMedications: '',
        petType: '',
        medicationName: '',
        dosage: '',
      },
    };
  },
  methods: {
    registrarMedicamento() {
      this.medicamentos.push({ ...this.novoMedicamento });

      this.novoMedicamento = {
        petMedications: '',
        petType: '',
        medicationName: '',
        dosage: '',
      };
    },
  },
};
</script>

<style>
th,
td {
  color: #14A9FF;
}

thead {
  border: 1px solid #14A9FF;
  border-radius: 92px !important;
}

tbody {
  border: 1px solid #14A9FF;
  margin-top: 20px 90px;
}
</style>
