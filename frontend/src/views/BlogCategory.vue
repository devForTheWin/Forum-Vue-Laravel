<template>
    <div class="blog-wrap">
        <div class="main-title">
            <h2>Category "{{ slug }}" posts: </h2>
        </div>
        <div v-for="post in posts" :key="post.id" class="blog-card container">
            <div class="card-details">
                <div class="author">
                    <i>{{ post.authors.name }} {{ post.authors.surname }}</i>
                </div>
                <div class="likes">
                    <fa icon="thumbs-up"/>
                    <span>
                        <i>{{ post.likes.length }}</i>
                    </span>
                </div>
            </div>
            <div class="blog-data">
                <h2 class="title">{{ post.title }}</h2>

                <!--text 300 symbols-->

                <p class="description">{{ post.post_text }}</p>
                <div class="cta">
                    <router-link :to="{name: 'CategoryPost', params: {id: post.id}}">Read more &rarr;</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import { mapState, mapActions } from 'vuex'

  export default {
    name: "BlogCategory",

    data() {
      return {
        slug: this.$route.params.slug,
        profileMenu: null
      }
    },

    computed: {
      ...mapState( 'auth', [ 'posts', 'user'] )
    },

    created() {
      this.$store.dispatch( 'auth/posts', this.slug );
    },

    methods: {
      ...mapActions( {
        posts: 'auth/posts',
      } ),

      posts() {
        this.posts( this.slug )
      },
    }
  }
</script>

<style lang="scss" scoped>
    a {
        text-decoration: none;
        color: inherit;
    }

    .blog-wrap {
        font-size: 1.6rem;
        color: #333;
        background-color: #f1f1f1;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 1.5rem;
        flex-wrap: wrap;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);

    }

    .main-title {
        width: 100%;
        text-align: center;
        padding: 3rem;

    }

    .blog-card {
        position: relative;
        display: flex;
        flex-direction: column;
        z-index: 1;
        width: 750px;
        margin-bottom: 2rem;
        background-color: #fff;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .card-details {
        width: 100%;
        font-size: 1.4rem;
        font-weight: bold;
        white-space: nowrap;
        color: #495057;
        position: absolute;
        top: 0;
        left: 2rem;
        padding: 1rem;
        z-index: 1;

        div {
            display: inline-block;
        }

        i {
            margin-right: 1rem;
        }
    }

    .profile-menu{
    width: 300px;
    height: 200px;
    position: absolute;
    background-color: #f7f7f7;
    z-index: 2;
    }

    .blog-data {
        padding: 3rem;
        position: relative;

        .title {
            font-size: 3rem;
            line-height: 1;
        }

        .cta {
            text-align: center;
            font-weight: bold;
            margin-top: 1rem;

            a {
                color: #495057;
            }

            a:hover {
                color: mediumaquamarine;
            }
        }

    }


</style>