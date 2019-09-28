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
