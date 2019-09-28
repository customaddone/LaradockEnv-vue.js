<template>
  <p class="message">メッセージ： {{ msg }}</p>
</template>

<script>
/*
  各ブロックでsrc属性で外部ファイルの内容をインポートできる
  src属性による外部ファイルのインポートは、既存のアプリケーション資産を流用できるので大変便利
  です
*/

export default {
  data () {
    return { msg: 'こんにちは！' }
  }
}
</script>
/*
  cssは実用レベルの名前空間がないため、BEMなどCSS側の記法を工夫することで干渉を防ぐ必要があるなど
  かなり手間のかかる言語です。スコープ付きCSSを利用することで擬似的な名前空間を設けて、この干渉の
  危険を防ぎます。
  直感的なスタイル定義が可能になり、よりCSSをメンテナンスしやすくなるため、大変便利です
*/
<style scoped>
  .message { color: #42b983; }
</style>
