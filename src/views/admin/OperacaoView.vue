<template>
  <div class="container">
    <div class="row">
      <div>
        <label for="pet">Nome do Pet?</label>
        <input v-model="novaOperacao.pet_name" class="form-control" id="pet" type="text"
          placeholder="Qual é o Pet? (Cachorro, gato...)">
      </div>
      <div class="mt-4">
        <label for="tutor">Nome do tutor</label>
        <input v-model="novaOperacao.tutor" class="form-control" id="tutor" type="text"
          placeholder="Digite o nome do Tutor">
      </div>
      <div class="mt-4">
        <label for="status">Qual o status do procedimento?</label>
        <input v-model="novaOperacao.status" class="form-control" id="status" type="text"
          placeholder="Status do procedimento">
      </div>
      <div class="mt-4">
        <label for="procedimento">Qual é o procedimento?</label>
        <input v-model="novaOperacao.procedimento" class="form-control" id="procedimento" type="text"
          placeholder="Procedimento">
      </div>
      <div class="form-floating mt-3 d-flex justify-content-center">
        <button type="submit" class="mt-4" @click="registrarOp()">Inserir operações</button>
      </div>
    </div>
    <h1 class="text-center my-5">Lista de operações</h1>
    <div v-for="(o, index) in operacoes" :key="index">
      <div class="container">
        <div class="row  d-flex justify-content-between">
          <div class="col">
            <div class="form-control mb-3 p-3">
              <div>
                <p><span class="bold">Nome do Pet: </span><span v-if="!o.editing">{{ o.pet_name }}</span>
                  <input v-if="o.editing" v-model="o.pet_name" class="form-control" type="text">
                </p>
              </div>
              <div>
                <p><span class="bold">Procedimento: </span><span v-if="!o.editing">{{ o.procedimento }}</span>
                  <input v-if="o.editing" v-model="o.procedimento" class="form-control" type="text">
                </p>
              </div>
              <div>
                <p><span class="bold">Status: </span><span v-if="!o.editing">{{ o.status }}</span>
                  <input v-if="o.editing" v-model="o.status" class="form-control" type="text">
                </p>
              </div>
              <div>
                <p><span class="bold">Nome do tutor: </span><span v-if="!o.editing">{{ o.name_tutor }}</span>
                  <input v-if="o.editing" v-model="o.name_tutor" class="form-control" type="text">
                </p>
              </div>
              <div>
                <p><span class="bold">Data de criação desta operação: </span>{{ formatDate(o.created_at) }}</p>
              </div>
              <div>
                <p><span class="bold">Data de modificação desta operação: </span>{{ formatDate(o.update_at) }}</p>
              </div>
              <hr>
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <button @click="editarOperacao(o)" v-if="!o.editing">Editar</button>
                  <button @click="salvarEdicao(o)" v-if="o.editing">Salvar</button>
                </div>
                <div>
                  <button data-bs-toggle="modal" data-bs-target="#exampleModal">Excluir</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Deseja Excluir?</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h5 class="text-danger"> Ao excluir, essa operação não poderá ser desfeita! <br> Tem certeza?
              </h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" class="bg-danger" @click="excluirOperacao(index)"
                data-bs-dismiss="modal">Excluir</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from '@/axiosDefault';
import moment from 'moment';

export default {
  data() {
    return {
      operacoes: [],
      novaOperacao: {
        pet_name: '',
        tutor: '',
        status: '',
        procedimento: '',
      },
    };
  },

  mounted() {
    this.carregarOperacoes();
  },

  methods: {
    formatDate(date) {
      return moment(date).format('DD/MM/YYYY');
    },

    carregarOperacoes() {
      axios.get('api/v1/operacao')
        .then(response => {
          this.operacoes = response.data.data;
        })
        .catch(error => {
          console.error('Erro ao buscar operações:', error);
        });
    },

    registrarOp() {
      var opData = {
        pet_name: this.novaOperacao.pet_name,
        name_tutor: this.novaOperacao.tutor,
        status: this.novaOperacao.status,
        procedimento: this.novaOperacao.procedimento,
      };
      axios.post('api/v1/operacao', opData)
        .then(() => {
          this.carregarOperacoes();
          this.novaOperacao = {
            pet_name: '',
            tutor: '',
            status: '',
            procedimento: '',
          };
        })
        .catch(error => {
          console.error('Erro ao inserir operação:', error);
        });
    },

    editarOperacao(operacao) {
      operacao.editing = true;
    },

    salvarEdicao(operacao) {
      operacao.editing = false;

      var opData = {
        pet_name: operacao.pet_name,
        tutor: operacao.name_tutor,
        status: operacao.status,
        procedimento: operacao.procedimento,
      };

      axios.put(`api/v1/operacao/${operacao.id}`, opData)
        .then(() => {
          this.carregarOperacoes();
        })
        .catch(error => {
          console.error('Erro ao salvar edição da operação:', error);
        });
    },

    excluirOperacao(index) {
      const operacao = this.operacoes[index];
      axios.delete(`api/v1/operacao/${operacao.id}`)
        .then(() => {
          this.operacoes.splice(index, 1);
        })
        .catch(error => {
          console.error('Erro ao excluir operação:', error);
        });
    },
  },
};
</script>
