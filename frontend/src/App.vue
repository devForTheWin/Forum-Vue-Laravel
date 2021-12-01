<template>
  <div class="app-wrapper">
    <div class="app">
      <Navigation v-if="!navigation"/>
      <router-view/>
    </div>
  </div>
</template>
<script>
    import Navigation from './components/Navigation'

    export default {
        name: 'App',
        components: {
            Navigation
        },
        data() {
            return {
                navigation: null
            }
        },
        created() {
            this.checkRoute();
        },
        methods: {
            checkRoute() {
                if (
                    this.$route.name === "Login" ||
                    this.$route.name === "Register"
                ) {
                    this.navigation = true;
                    return;
                }
                {
                    this.navigation = false;
                }
            }
        },
        watch: {
            $route() {
                this.checkRoute();
            }
        }
    }
</script>

<style lang="scss">
  @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap");

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Quicksand", sans-serif;
  }

  .app {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }

  .container {
    max-width: 1440px;
    margin: 0 auto;
  }

  .link {
    cursor: pointer;
    text-decoration: none;
    text-transform: uppercase;
    color: black;
  }

  .link-light {
    color: #fff;
  }

  button {
    transition: all .5s ease;
    cursor: pointer;
    margin-top: 24px;
    padding: 12px 24px;
    background-color: #303030;
    color: #fff;
    border-radius: 20px;
    border: none;
    text-transform: uppercase
  }

  // FORM SCSS
  .form-wrap {
    overflow: hidden;
    display: flex;
    height: 100vh;
    justify-content: center;
    align-self: center;
    margin: 0 auto;
    width: 90%;

    .login-register {
      margin-bottom: 32px;

      .router-link {
        color: #000;
      }
    }

    form {
      padding: 0 10px;
      position: relative;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      flex: 1;

      h2 {
        text-align: center;
        font-size: 32px;
        color: #303030;
        margin-bottom: 40px;
      }

      .inputs {
        width: 100%;
        max-width: 350px;

        .input {
          position: relative;
          display: flex;
          justify-content: center;
          align-items: center;
          margin-bottom: 8px;
          input {
            width: 100%;
            border: none;
            background-color: #dee2e6;
            padding: 4px 4px 4px 30px;
            height: 50px;

            &:focus {
              outline: none;
            }
          }

        }
      }
    }

  }

  .error {
    text-align: center;
    font-size: 12px;
    color: red;
  }
</style>