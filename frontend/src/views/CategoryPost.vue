<template>
    <div class="post-view">
        <div class="container ">
            <h2>{{ singlePost.id }}</h2>
            <h2>{{ singlePost.title }}</h2>
            <div @click="showAlert">
                <h4>{{ singlePost.authors.name }} {{ singlePost.authors.surname }}</h4>
            </div>
            <div class="likes" @click.prevent="liked">
                <fa icon="thumbs-up"/>
                <div class="likes-num"> {{this.like}}</div>
            </div>

            <div class="post-content "> {{ singlePost.post_text }}</div>
            <div>Comments</div>
        </div>
    </div>
</template>

<script>
    import {mapState, mapGetters, mapActions} from 'vuex';

    export default {
        name: "CategoryPost",

        data() {
            return {
                id: this.$route.params.id,
            }
        },
        methods: {
            ...mapActions({
                likes: 'auth/likes'
            }),

            showAlert: () => {
                alert('Author Profile')
            },

            liked() {
                if (this.authenticated) {
                    this.likes(this.id)

                } else {
                    window.location = '/login'
                }
            },

        },

        computed: {
            ...mapState('auth', ['singlePost', 'profileId', 'like']),

            ...mapGetters({
                authenticated: 'auth/authenticated',
                user: 'auth/user',
            })
        },
        created() {
            this.$store.dispatch('auth/singlePost', this.id);
        }
    }
</script>

<style lang="scss">
    .post-view {
        h4 {
            font-weight: 400;
            font-size: 14px;
            margin-bottom: 24px;
        }
    }

    .likes {
        display: flex;

        .likes-num {
            font-size: 16px;
            font-weight: 500;
            margin-left: 5px;
        }

    }

    .post-content {
        margin-top: 25px;
    }
</style>
