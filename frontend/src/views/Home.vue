<template>
    <div class="home">
        <div class="blog-wrapper">
            <div class="blog-content item">
                <div>
                    <h2>Welcome!</h2>
                    <p>Here we are talking about those who live on the fourth planet from the sun. look deeper!</p>
                </div>
            </div>
            <div class="blog-categories item">
                <div>
                    <CategoryList/>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
  import CategoryList from "../components/CategoryList"

  export default {
    name: 'Home',
    components: { CategoryList },
    data() {
    }
  }
</script>

<style lang="scss" scoped>
    .blog-wrapper {
        display: flex;
        flex-wrap: wrap;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);

        .item{
            flex:1 1 calc(33.33% - 30px);
            margin:5px;
            box-sizing:border-box;
            min-width:170px;

            padding:50px 20px;
            font-size:400%;
            text-align:center;
        }
    }
    
    .blog-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: #f2f3f4;
        flex: 4;
        order: 1;

        div {
            max-width: 375px;
            padding: 72px 24px;
        }

        h2 {
            font-size: 32px;
            font-weight: 300;
            text-transform: uppercase;
            margin-bottom: 24px;
        }

        p {
            font-size: 15px;
            font-weight: 300;
            line-height: 1.7;
        }
    }

    .blog-categories {
        order: 2;
        flex: 3;

        div {
            width: 100%;
            height: 100%;
        }

    }


</style>