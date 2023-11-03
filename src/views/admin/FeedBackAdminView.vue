<template>
  <div class="container text-center">
    <div class="feedback-container">
      <div class="text-center">
        <img src="@/assets/feedback.png" alt="">
      </div>
      <div class="container">
        <div class="row row-cols-2 d-flex justify-content-center">
          <div class="col-4 border card-users" v-for="(f, index) in feed" :key="index">
            <div>
              <img src="@/assets/user.png" alt="">
            </div>
            <div>
              <div class="info-user"><span>Nome: </span>{{ f.name_tutor }}</div>
              <div class="info-user"><span>Feedback: </span>{{ f.feedback_tutor }}</div>
              <div class="info-user"><span>Data da postagem: </span>{{ formatDate(f.created_at) }}</div>
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
    formatDate(date) {
      return moment(date).format('DD/MM/YYYY');
    },

  }


};
</script>

<style lang="scss" scoped>
span {
  font-weight: bold !important;
}

.card-users {
  justify-content: center;
  border-radius: 12px;
  transition: transform 0.3s ease;
  text-align: justify;
  cursor: pointer;
  padding: 40px;
  margin: 17px;


  img {
    width: 80px;
    object-fit: cover;
  }


  &:hover {
    transform: scale(1.1);

  }

  // .info-user {
  //   background: #9757FF;
  //   margin: 5px;
  //   color: white;
  //   padding: 8px 0px;
  //   min-width: 900px !important;
  //   border-radius: 40px;
  //   box-shadow: 50px 10px 58px 0px rgba(0, 0, 0, 0.81);
  //   -webkit-box-shadow: 50px 10px 58px 0px rgba(0, 0, 0, 0.81);
  //   -moz-box-shadow: 50px 10px 58px 0px rgba(0, 0, 0, 0.81);
  // }
}
</style>
