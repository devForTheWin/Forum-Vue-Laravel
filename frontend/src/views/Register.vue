<template>
    <div class="form-wrap">
        <form @submit.prevent="handleSubmit" class="register">
            <p class="login-register">
                Already have an account?
                <router-link class="router-link" :to="{name: 'Login'}">Login</router-link>
            </p>
            <h2>Create your account</h2>
            <div class="inputs">
                <div class="input">
                    <input type="text" placeholder="Name" v-model="name"/>
                </div>
                <div class="input">
                    <input type="text" placeholder="Surname" v-model="surname"/>
                </div>
                <div class="input">
                    <input type="text" placeholder="Email" v-model="email"/>
                </div>
                <div class="input">
                    <input type="password" placeholder="Password" v-model="password"/>
                </div>
                <div class="input">
                    <input type="password" placeholder="Confirm password" v-model="password_confirmation"/>
                </div>
                <!--<div v-show="error">{{ this.errorMsg }}</div>-->
            </div>
            <button>Sing Up</button>
        </form>
    </div>
</template>

<script>
  import axios from 'axios'

  export default {
    name: "Register",
    components: {},
    data() {
      return {
        name: '',
        surname: '',
        email: '',
        password: '',
        password_confirmation: '',
        error: '',
        errorMsg: ''
      }
    },
    methods: {
      handleSubmit: async function () {
        await axios.post( 'register', {
          name: this.name,
          surname: this.surname,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation
        } );

        this.$router.push( { name: "Home" } );
      }
    }
  }
</script>

<style lang="scss" scoped>
    .register {
        h2 {
            min-width: 700px;
        }
    }
</style>