<template>
  <p :class="$style.message">こんにちは</p>
</template>

<script>
export default {
  created () {
  console.log('css modules: $style', this.$style)
  }
}
</script>

/*
  モジュールでCSSの名前空間衝突を回避できる
  CSSモジュールでは、class属性の指定に、Vue.jsのv-bindで指定します
*/
<style module>
  .message { color: #42b983; }
</style>
