<template>
    <div class="container">
        <h3 class="category-title">Select a category</h3>
        <div class="categories-links">
            <ul class="cat-nav">
                <router-link v-for="category in categories"
                             :key="category.name" class="link" :to="`/blog/${category.slug}`">{{ category.name
                    }}
                </router-link>
            </ul>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex'

    export default {
        name: "CategoryList",

        computed: {
            ...mapState( 'auth', [ 'categories' ] )
        },
        created() {
            this.$store.dispatch( 'auth/allCategory' )
        }
    }

</script>

<style lang="scss" scoped>
    .category-title {
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #007bff;
        font-size: 16px;
        padding-left: 15px;
        margin-bottom: 15px;
    }

    .cat-nav {
        padding: 20px;
        display: flex;
        flex-direction: column;
        height: 100%;
        font-weight: 600;
        font-size: 32px;

        .link {
            transition: .3s color ease;

            &:hover {
                color: mediumaquamarine;
            }
        }

    }
</style>