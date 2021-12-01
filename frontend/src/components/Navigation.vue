<template>
    <header>
        <nav class="container">
            <div class="branding">
                <router-link class="header" :to="{ name: 'Home'}">Occupant Earth</router-link>
            </div>
            <div class="nav-links">
                <ul>
                    <template v-if="authenticated">
                        <router-link class="link" :to="{name: 'Home' }">Categories</router-link>
                        <router-link class="link" :to="{name: 'CreatePost' }">New Post</router-link>
                    </template>
                    <template v-else>
                        <router-link class="link" :to="{name: 'Home' }">Categories</router-link>
                        <router-link class="link" :to="{name: 'Login' }">Login/Register</router-link>
                    </template>
                </ul>
                <div v-if="authenticated" @click="toggleProfileMenu" class="profile" ref="profile">
                    <span>US</span>
                    <div v-show="profileMenu" class="profile-menu">
                        <div class="info">
                            <p class="initials">US</p>
                            <div class="right">
                                <p>{{ user.name }}</p>
                                <p>{{ user.surname }}</p>
                                <p>{{ user.email }}</p>
                            </div>
                        </div>
                        <div class="options">
                            <div class="option">
                                <router-link class="option" :to="{ name: 'Profile' }">
                                    <p>Profile</p>
                                </router-link>
                            </div>
                            <div @click.prevent="singOut" class="option">
                                <p>Sing Out</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
  import { mapGetters, mapActions } from 'vuex'

  export default {
    name: 'Navigation',
    data() {
      return {
        profileMenu: null
      }
    },
    computed: {
      ...mapGetters( {
        authenticated: 'auth/authenticated',
        user: 'auth/user'
      } )
    },
    methods: {
      ...mapActions( {
        singOutAction: 'auth/singOut'
      } ),

      singOut() {
        this.singOutAction().then( () => {
          this.$router.push( {
            name: 'Home'
          } )
        } )
      },

      toggleProfileMenu( e ) {
        if ( e.target === this.$refs.profile ) {
          this.profileMenu = !this.profileMenu;
        }
      }

    }
  }
</script>

<style lang="scss" scoped>
    header {
        background-color: #fff;
        padding: 0 25px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        z-index: 99;

        .link {
            font-weight: 500;
            padding: 0 8px;
            transition: .3s color ease;

            &:hover {
                color: mediumaquamarine;
            }
        }
    }

    nav {
        display: flex;
        padding: 25px;

        .branding {
            display: flex;
            align-items: center;

            .header {
                font-weight: 600;
                font-size: 24px;
                color: #000;
                text-decoration: none;
            }
        }

        .nav-links {
            position: relative;
            display: flex;
            flex: 1;
            align-items: center;
            justify-content: flex-end;
        }
        ul {
            margin-left: 32px;

            .link {
                margin-right: 32px;
            }
        }

        .profile {
            position: relative;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: #fff;
            background-color: #212529;

            span {
                pointer-events: none;
            }

            .profile-menu {
                position: absolute;
                top: 60px;
                right: 0;
                width: 250px;
                background-color: #212529;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);

                .info {
                    display: flex;
                    align-items: center;
                    padding: 15px;
                    border-bottom: 1px solid #fff;

                    .initials {
                        position: initial;
                        width: 40px;
                        height: 40px;
                        background-color: #fff;
                        color: #303030;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border-radius: 50%;
                    }

                    .right {
                        flex: 1;
                        margin-left: 24px;

                        p:nth-child(1) {
                            font-size: 14px;
                        }

                        p:nth-child(2),
                        p:nth-child(2) {
                            font-size: 12px;
                        }
                    }

                }
            }

            .options {
                padding: 15px;
                .option {
                    text-decoration: none;
                    color: #fff;
                    display: flex;
                    align-items: center;
                    margin-bottom: 12px;

                    p {
                        font-size: 14px;
                        margin-left: 12px;
                    }

                    &:last-child {
                        margin-bottom: 0;
                    }
                }
            }
        }
    }

</style>