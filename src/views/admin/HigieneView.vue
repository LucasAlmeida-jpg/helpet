<template>
  <div>
    <div class="container d-flex align-items-center justify-content-between">
      <div>
        <h3>Gerenciamento de Higiente dos Pets</h3>
      </div>
      <div>
        <button data-bs-toggle="modal" data-bs-target="#exampleModal">
          Adicionar Higiente
        </button>
      </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Higiente</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div>
              <label for="med">Selecione o tipo de cuidado</label>
              <select id="med" class="form-select" v-model="novaHigiene.petMedications">
                <option value="Banho">Banho</option>
                <option value="Tosa">Tosa</option>
                <option value="Hidratacao">Hidratacao</option>
                <option value="Outros">Outros</option>
              </select>
            </div>
            <div class="my-3">
              <label for="pet">Selecione o Tipo do Pet</label>
              <select id="pet" class="form-select" v-model="novaHigiene.petType">
                <option value="Cachorro">Cachorro</option>
                <option value="Gatos">Gatos</option>
                <option value="Outros">Outros</option>
              </select>
            </div>
            <input class="form-control" type="date" v-model="novaHigiene.medicationName"
              placeholder="Nome do medicamento">
            <input class="form-control mt-3" type="date" v-model="novaHigiene.dosage" placeholder="Dosagem">

            <textarea class="form-control mt-4" id="" cols="30" rows="4" v-model="novaHigiene.obs"
              placeholder="Observação"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary" @click="registrarMedicamento">Registrar</button>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-4 text-center info container">
      <table class="table mt-5">
        <thead>
          <tr>
            <th scope="col">Tipo de Cuidado </th>
            <th scope="col">Tipo de Pet</th>
            <th scope="col">Última Realização </th>
            <th scope="col">Próxima Realização</th>
            <th scope="col">Observações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(medicamento, index) in higiene" :key="index">
            <td>{{ medicamento.petMedications }}</td>
            <td>{{ medicamento.petType }}</td>
            <td>{{ medicamento.medicationName }}</td>
            <td>{{ medicamento.dosage }}</td>
            <td>{{ medicamento.obs }}</td>
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
      higiene: [],
      novaHigiene: {
        petMedications: '',
        petType: '',
        medicationName: '',
        dosage: '',
        obs: '',
      },
    };
  },
  methods: {
    registrarMedicamento() {
      this.higiene.push({ ...this.novaHigiene });

      this.novaHigiene = {
        petMedications: '',
        petType: '',
        medicationName: '',
        dosage: '',
        obs: '',
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
