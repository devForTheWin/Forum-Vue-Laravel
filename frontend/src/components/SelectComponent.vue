<template>
    <div class="blog-select">
        <span class="title">Choose category:</span>
        <select class="select-component__select" @change="handleChange" :value="value">
            <option value="">--{{ placeholder }}--</option>

            <option :value="option" v-for="(option, i) in options" :key="i">
                {{ option }}
            </option>
        </select>
    </div>
</template>

<script>
  export default {
    name: "SelectComponent",
    props: {
      options: {
        type: Array,
        default: () => []
      },
      value: {
        default: ""
      },
      placeholder: {
        type: String,
        default: "Select One"
      }
    },
    methods: {
      handleChange( e ) {
        // console.log(e.target.value)
        this.$emit( 'input', e.target.value )
      }
    }
  }
</script>

<style lang="scss" scoped>
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