<template>
  <div class="container text-center">
    <div class="feedback-container">
      <h3>Feedback dos Clientes</h3>
      <div class="container">
        <div class="row row-cols-2 d-flex justify-content-center">
          <div class="col-6 card-users d-flex justify-content-center align-items-center" v-for="(f, index) in feed"
            :key="index">
            <div>
              <img src="@/assets/user.png" alt="">
            </div>
            <div>
              <div class="info-user">Nome: {{ f.name_tutor }}</div>
              <div class="info-user">Feedback: {{ f.feedback_tutor }}</div>
              <div class="info-user">Data da postagem: {{ formatDateAndTime(f.created_at) }}</div>
            </div>
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
      feed: [],
      nome: '',
      feedback: '',
    };
  },

  mounted() {
    axios.get('api/v1/feedback')
      .then(response => {
        this.feed = response.data.data;
        console.log(this.feed);
      })
  },

  methods: {
    formatDateAndTime(datetime) {
      const date = new Date(datetime);
      const formattedDate = `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()}`;
      const hours = String(date.getHours()).padStart(2, '0');
      const minutes = String(date.getMinutes()).padStart(2, '0');
      const formattedTime = `${hours}:${minutes}`;
      return `Data: ${formattedDate} Horário: ${formattedTime}`;
    },
  }


};
</script>

<style lang="scss" scoped>
.card-users {
  margin: 10px;
  box-shadow: inset;
  padding: 30px 10px;
  font-weight: bold;
  color: black;
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
    background: black;
    margin: 5px;
    color: white;
    padding: 8px 0px;
    min-width: 900px !important;
    border-radius: 40px;
    box-shadow: 50px 10px 58px 0px rgba(0, 0, 0, 0.81);
    -webkit-box-shadow: 50px 10px 58px 0px rgba(0, 0, 0, 0.81);
    -moz-box-shadow: 50px 10px 58px 0px rgba(0, 0, 0, 0.81);
  }
}
</style>
