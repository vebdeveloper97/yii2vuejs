<template>
  <div class="form-wrapper">
    <h1>Login to create</h1>
    <form action="" @submit.prevent="login">
      <div v-if="errors" class="errors">
        <p v-for="(error, field) in errors" :key="field">
          {{error[0]}}
        </p>
      </div>
      <input type="text" v-model="form.username" placeholder="Username"><br>
      <input type="password" v-model="form.password" placeholder="Password"><br>
      <button class="btn" @click="login">Login</button>
      <router-link to="/auth/register">Click here to register</router-link>
    </form>
  </div>
</template>

<script>
  import axios from 'axios';
  import authService from "@/service/auth_service";
  import router from "@/router";

  export default{
    name: 'Login',
    data(){
      return {
        form: {
          username: '',
          password: '',
        },
        errors: false
      }
    },
    methods: {
      async login () {
        const {success, errors} = await authService.login(this.form);
        if(success){
          this.$router.push({name: 'About'});
        }
        else{
          this.errors = errors;
        }
      }
    }
  }
</script>

<style lang="scss">
.btn{
  padding: 10px 25px;
  border: none;
  position: relative;
  left: -15px;
  background-color: #42b983;
  cursor: pointer;
}
.form-wrapper{
  background: white;
  padding: 20px;
  width: 300px;
  margin: 0 auto;
  border-radius: 4px;
  box-shadow: 3px 3px 10px rgba(0,0,0,0.2);

h1{
  text-align: center;
  margin-bottom: 30px;
}
}
form{
input{
  display: block;
  width: 100%;
  border: 2px solid #e6e6e6;
  padding: 6px 12px;
  transition: all 0.3s;

&:hover{
   background-color: darken(#4fb2c1, 10%);
 }
}
.errors{
  margin-bottom: 15px;
  padding: 10px 15px;
  color: #fff;
  background-color: #ff6969;
  font-size: 12px;

p{
  margin: 0px;
}
}
.link{
  font-size: 80%;
  float: right;
}
}
</style>
