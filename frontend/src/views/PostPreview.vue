<template>
    <div class="post-view">
        <div class="container">
            <h2>{{ this.postTitle }}</h2>
            <div class="post-content ck-editor" v-html="postContent"></div>
            <div>
                <h6>Category name : </h6>{{ category }}</div>
        </div>
    </div>
</template>

<script>
  import { mapState } from 'vuex';

  export default {
    name: "PostPreview",
    computed: {
      ...mapState( 'auth', [ 'profileId', 'postTitle', 'postContent', 'category' ] ),
    },
    methods: {

    }
  };
</script>

<style lang="scss">
    .post-view {
        min-height: 100%;
        .container {
            max-width: 1000px;
            padding: 60px 25px;
        }
        .ck-editor {
            padding: 0;
        }
        h2 {
            margin-bottom: 16px;
            font-weight: 300;
            font-size: 32px;
        }
        img {
            width: 100%;
            margin-bottom: 32px;
        }
    }
</style>