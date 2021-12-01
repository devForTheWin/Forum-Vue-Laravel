<template>
    <div class="post-view">
        <div class="container ">
            <h2>{{ singlePost.id }}</h2>
            <h2>{{ singlePost.title }}</h2>
            <div>
                <h4 @click="showAlert">{{ singlePost.authors.name }} {{ singlePost.authors.surname }}</h4>
            </div>
            //number of likes for !auth

            <div v-if="authenticated" class="likes">
                <a href="#">
                    <fa icon="thumbs-up"/>
                    <h4>likes</h4>
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
  import { mapState, mapGetters } from 'vuex'

  export default {
    name: "CategoryPost",

    data() {
      return {
        id: this.$route.params.id,
      }
    },
    methods: {
      showAlert: () => {
        alert( 'Author Profile' )
      }
    },

    computed: {
      ...mapState( 'auth', [ 'singlePost' ] ),
      ...mapGetters( {
        authenticated: 'auth/authenticated',
        user: 'auth/user'
      } )
    },
    created() {
      this.$store.dispatch( 'auth/singlePost', this.id )
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
