<template>
    <div class="post-view">
        <div class="container ">
            <h2>{{ singlePost.id }}</h2>
            <h2>{{ singlePost.title }}</h2>
            <div @click="showAlert">
                <h4>{{ singlePost.authors.name }} {{ singlePost.authors.surname }}</h4>
            </div>
            <div v-if="authenticated" class="likes">
                <a @click="liked" hrer="#">
                    <fa icon="thumbs-up"/>
                    <h4> {{this.like}} </h4>

                </a>
            </div>
            <div v-else class="likes">
                <fa icon="thumbs-up"/>
                <h4>likes</h4>
            </div>

            <div class="post-content "> {{ singlePost.post_text }}</div>
            <div>Comments</div>
        </div>
    </div>
</template>

<script>
    import {mapState, mapGetters, mapActions} from 'vuex';
    import axios from 'axios'
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
                this.likes(this.id)
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
</style>
