<template>
    <!--<form @submit.prevent="publishPost" class="create-post">-->
    <div class="create-post">
        <div class="container">
            <h2>Create new post</h2>
            <div class="blog-info">
                <input type="text" placeholder="Enter Blog Title" v-model="postTitle"/>
            </div>
            <div class="editor">
                <ckeditor :editor="editor" v-model="postContent" :config="editorConfig"></ckeditor>
            </div>
            <div class="select">
                <div class="blog-select">
                    <span class="title">Choose category:</span>
                    <select v-model="category" class="select-component__select">
                        <option value="">--{{ placeholder }}--</option>
                        <option v-for="(category, index) in categories"
                                :key="index"
                                :value="category.id">{{ category.name }}
                        </option>
                    </select>
                </div>

            </div>
            <div class="blog-actions">
                <button @click="publishPost">Publish Post</button>
                <router-link class="router-button" :to="{ name: 'PostPreview' }">POST PREV</router-link>
            </div>
        </div>
    </div>
    <!--</form>-->
</template>

<script>
  import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
  import SelectComponent from "@/components/SelectComponent"
  import { mapState, mapMutations, mapActions } from 'vuex';

  export default {
    name: "CreatePost",
    data() {
      return {
        editor: ClassicEditor,
        editorConfig: {
            // 'enterMode': CKEDITOR.ENTER_P,
        },
        category: "",
        placeholder: "Select One"
      };
    },
    components: {
      SelectComponent
    },

    methods: {
      ...mapActions( {
        addNewPost: 'auth/addNewPost'
      } ),
      ...mapMutations( 'auth', [ 'NEW_POST_TITLE', 'NEW_POST_CONTENT', 'NEW_POST_VALUE' ] ),

      publishPost() {

        let payload = {
          user_id: this.profileId,
          title: this.postTitle,
          content: this.postContent,
          category_id: this.category,
          is_published: 1
        }
        this.$store.dispatch( 'auth/addNewPost', payload )
      }
    },
    computed: {
      ...mapState( 'auth', [ 'categories' ] ),

      profileId() {
        return this.profileId
      },

      postTitle: {
        get() {
          return this.postTitle;
        },
        set( payload ) {
          this.$store.commit( "auth/NEW_POST_TITLE", payload )
        }
      },

      postContent: {
        get() {
          return this.postContent;
        },
        set( payload ) {
          this.$store.commit( "auth/NEW_POST_CONTENT", payload )
        }
      },

      category: {
        get() {
          return this.category;
        },
        set( payload ) {
          this.$store.commit( "auth/NEW_POST_VALUE", payload )
        }
      }
    },
    created() {
      this.$store.dispatch( 'auth/allCategory' )
    }
  }
</script>

<style lang="scss">
    .create-post {
        position: relative;
        display: flex;
        height: 100%;
        max-width: 750px;
        margin: 32px auto;
        text-align: center;
        button {
            margin-top: 0;
        }
        .router-button {
            text-decoration: none;
            color: #fff;
        }
        button,
        .router-button {
            transition: 0.5s ease-in-out all;
            align-self: center;
            font-size: 14px;
            cursor: pointer;
            border-radius: 20px;
            padding: 12px 24px;
            color: #fff;
            background-color: #303030;
            text-decoration: none;
            &:hover {
                background-color: rgba(48, 48, 48, 0.7);
            }
        }
        .container {
            position: relative;
            height: 100%;
            padding: 10px 25px 60px;

            h2 {
                text-align: center;
                margin-bottom: 16px;
                font-weight: 300;
                font-size: 32px;
            }
        }
        .blog-info {
            display: flex;
            margin-top: 40px;
            margin-bottom: 32px;
            input:nth-child(1) {
                min-width: 300px;
            }
            input {
                transition: 0.5s ease-in-out all;
                width: 100%;
                padding: 10px 4px;
                border: none;
                border-bottom: 1px solid #303030;

            }
        }
        .editor {
            height: 60vh;
            display: flex;
            flex-direction: column;

            .ck-content {
                display: flex;
                flex-direction: column;
                height: 45vh;
                overflow: scroll;
            }
        }
        .blog-actions {
            button {
                margin-right: 16px;
            }
        }
        .select {
            text-align: left;
            margin-bottom: 60px;

        }
    }

    .title {
        font-size: 16px;
        font-weight: 200;
        margin-right: 40px;
    }

    .select-component__select {
        width: 350px;
        background: #fff;
        padding: 6px 12px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;

        &:focus {
            outline: none;
        }

    }
</style>