<template>
    <div class="form-wrap">
        <form @submit.prevent="submit" class="login">
            <p class="login-register">
                Don't have an account?
                <router-link class="router-link" :to="{name: 'Register'}">Register</router-link>
            </p>
            <h2>Login</h2>
            <div class="inputs">
                <div class="input">
                    <input type="text" placeholder="Email" v-model="form.email"/>
                </div>
                <div class="input">
                    <input type="password" placeholder="Password" v-model="form.password"/>
                </div>
            </div>
            <button>Sing In</button>
        </form>
    </div>
</template>

<script>
    import {mapActions} from 'vuex'

    export default {
        name: "Login",
        components: {},
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                    password_confirmation: ''
                }
            }
        },

        methods: {
            ...mapActions({
                login: 'auth/login'
            }),
            submit() {
                this.login(this.form).then(() => {
                    this.$router.push({
                        name: "Home"
                    });
                })
            }
        }
    }

</script>

<style lang="scss" scoped>

</style>