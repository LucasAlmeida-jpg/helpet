<template>
  <div class="container">
    <h1 class="text-center my-5">Inserir operações</h1>
    <form @submit.prevent="submitOperation">
      <div class="pt-5 text-center">
        <span class="me-3">Pet *</span>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" v-model="petType" value="Cachorro">
          <label class="form-check-label" for="cachorro">Cachorro</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" v-model="petType" value="Gato">
          <label class="form-check-label" for="gato">Gato</label>
        </div>
      </div>
      <div class="d-flex justify-content-center my-5">
        <div class="form-floating mb-3">
          <input type="date" class="form-control" v-model="data" required>
          <label for="data">Data</label>
        </div>
        <div class="form-floating mx-5">
          <input class="form-control" v-model="horario" required>
          <label for="horario">Horário</label>
        </div>
        <div class="form-floating">
          <select class="form-select" v-model="status" required>
            <option value="" disabled selected>Selecione</option>
            <option value="Concluído">Concluído</option>
            <option value="Em Andamento">Em Andamento</option>
            <option value="Cancelado">Cancelado</option>
          </select>
          <label for="status">Status</label>
        </div>
        <div class="form-floating mx-5">
          <input class="form-control" v-model="procedimento" required>
          <label for="procedimento">Nome do Procedimento</label>
        </div>
      </div>
      <div class="form-floating mt-5 d-flex justify-content-center">
        <button type="submit" class="btn btn-primary mt-4">Inserir operações</button>
      </div>
    </form>

    <h1 class="text-center my-5">Lista de Operações</h1>
    <table class="table">
      <thead>
        <th>Pet</th>
        <th>Status do Processo</th>
        <th>Nome do Procedimento</th>
        <th>Data e Horário</th>
        <th>Ações</th>
      </thead>
      <tbody>
        <tr v-for="(operation, index) in operations" :key="index">
          <td>{{ operation.petType }}</td>
          <td>{{ operation.status }}</td>
          <td>{{ operation.procedimento }}</td>
          <td>{{ operation.data }} - {{ operation.horario }}</td>
          <td>
            <button class="btn btn-primary btn-sm" @click="updateStatus(index)">Atualizar Status</button>
            <button class="btn btn-primary btn-sm" @click="updateHorario(index)">Atualizar Horário</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      petType: "Cachorro",
      data: "",
      horario: "",
      status: "",
      procedimento: "",
      operations: []
    };
  },
  methods: {
    submitOperation() {
      this.operations.push({
        petType: this.petType,
        data: this.data,
        horario: this.horario,
        status: this.status,
        procedimento: this.procedimento
      });
      this.petType = "Cachorro";
      this.data = "";
      this.horario = "";
      this.status = "";
      this.procedimento = "";
    },
    updateStatus(index) {
      const newStatus = prompt('Digite o novo status:');
      if (newStatus !== null) {
        this.operations[index].status = newStatus;
      }
    },
    updateHorario(index) {
      const newHorario = prompt('Digite o novo horário no formato DD/MM/AAAA - HH:MM:');
      if (newHorario !== null) {
        this.operations[index].horario = newHorario;
      }
    }
  }
};
</script>

<style scoped>
tr {
  border-color: inherit;
  border-style: solid;
  border-width: 0;
  border: 1px solid black;
  border-radius: 54px;
  text-align: center;
}

.btn-primary {
  background-color: rgb(5, 175, 242);
  border: none;
  border-radius: 30px;
}
</style>
