<template>
  <div class="container">
    <div class="row">
      <div>
        <h3 class="text-center">Faça o cadastro de seu pet</h3>
        <form>
          <input class="form-control" v-model="pet.nome_pet" placeholder="Nome do Pet">
          <input class="form-control" v-model="pet.tipo_pet" placeholder="Tipo do Pet">
          <input class="form-control" v-model="pet.tamanho_pet" placeholder="Tamanho do Pet">
          <input class="form-control" v-model="pet.sexo_pet" placeholder="Sexo do Pet">
          <input class="form-control" v-model="pet.raca" placeholder="Raca do Pet">
          <input class="form-control" v-model="pet.cor" placeholder="Cor do Pet">
          <input class="form-control" v-model="pet.cpfTutor" placeholder="CPF do Tutor">
          <input class="form-control" v-model="pet.nomeTutor" placeholder="Nome do Tutor">
          <button @click.prevent="createPet()">Cadastrar</button> <br>
          <div class="text-center mt-3 color-default " v-if="cadastroBemSucedido">Pet cadastrado com sucesso!
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from '@/axiosDefault';

export default {
  data() {
    return {
      pet: {
        nome_pet: '',
        tipo_pet: '',
        tamanho_pet: '',
        sexo_pet: '',
        raca: '',
        cor: '',
        cpfTutor: '',
        nomeTutor: '',
      },
      cadastroBemSucedido: false,

    };
  },

  methods: {
    createPet() {
      var petData = {
        cor: this.pet.cor,
        tipo: this.pet.tipo_pet,
        tamanho: this.pet.tamanho_pet,
        sexo: this.pet.sexo_pet,
        raca_pet: this.pet.raca,
        nome: this.pet.nome_pet,
        cpf_tutor: this.pet.cpfTutor,
        nome_tutor: this.pet.nomeTutor
      };
      axios.post('api/v1/pet', petData)
        .then(response => {
          this.pet = response.data.data;
          this.cadastroBemSucedido = true;
          setTimeout(() => {
            window.location.reload();
            this.cadastroBemSucedido = false;
          }, 2000);
        })
        .catch(error => {
          console.error('Erro ao criar pet:', error);
        });
    }
  },
};
</script>


<style lang="scss" scoped>
.container {
  display: flex;
  align-content: center;
  justify-content: center;
}

input {
  min-width: 350px !important;
  display: block !important;
  margin: 20px 0px;
  padding: 10px 16px;
}

form {
  display: block !important;
}

button {
  min-width: 350px !important;
  padding: 10px;
}
</style>
