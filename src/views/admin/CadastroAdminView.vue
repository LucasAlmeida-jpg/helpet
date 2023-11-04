<template>
  <div class="d-flex align-items-center justify-content-center">
  </div>
  <div class="container">
    <div class="tab-content text-center" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
        tabindex="0">
        <div class="text-center my-5">
          <h1 class="sinais">Cadastros de PETS</h1>
          <img src="@/assets/logo_helpett.png" alt="">
        </div>
        <form class="mb-5">
          <input class="form-control" v-model="pet.nome_pet" placeholder="Nome do Pet">
          <input class="form-control" v-model="pet.tipo_pet" placeholder="Tipo do Pet">
          <input class="form-control" v-model="pet.tamanho_pet" placeholder="Tamanho do Pet">
          <input class="form-control" v-model="pet.sexo_pet" placeholder="Sexo do Pet">
          <input class="form-control" v-model="pet.raca" placeholder="Raca do Pet">
          <input class="form-control" v-model="pet.cor" placeholder="Cor do Pet">
          <input class="form-control" v-model="pet.cpfTutor" placeholder="CPF do Tutor">
          <input class="form-control" v-model="pet.nomeTutor" placeholder="Nome do Tutor">
          <button @click.prevent="createPet()">Cadastrar</button>
        </form>
      </div>

      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
        <form action="">
          <input class="form-control" type="text" placeholder="Nome do Pet">
          <input class="form-control" type="text" placeholder="E-mail">
          <input class="form-control" type="text" placeholder="Telefone">
          <input type="date" class="form-control" placeholder="Data de nascimento">
          <button>Cadastrar</button>
        </form>
      </div>

    </div>
  </div>
</template>

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

.sinais {
  font-size: 14px;
  margin-bottom: -7px;
  font-style: italic;
  color: #9757FF;
  font-weight: bold;
}


button {
  min-width: 350px !important;
  padding: 10px;
}
</style>

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

      petClient: {
        nome_pet_client: '',
        email_client: '',
        telefone_client: '',
        data_client: '',
      }

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
        })
        .catch(error => {
          console.error('Erro ao criar pet:', error);
        });
    }
  },
};
</script>