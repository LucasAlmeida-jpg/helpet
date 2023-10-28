<template>
  <div class="text-center">
    <ul>
      <li v-for="(u, index) in users" :key="index">{{ u.nome }}</li>
    </ul>
  </div>
</template>

<script>
import axios from '@/axiosDefault';
export default {
  data() {
    return {
      users: [],
    };
  },

  mounted() {
    axios.get('api/v1/user')
      .then(response => {
        this.users = response.data.data;
        console.log(this.users);
      })
      .catch(error => {
        console.error('Erro ao buscar usuários:', error);
      });
  },

  methods: {
  }
};
</script>