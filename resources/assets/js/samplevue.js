/* laravelでのJavaScriptの書き方について
   １　ターミナルでnpmのインストール（$ npm install)
   ２  resources/assets/js内にjsファイルを作成 */
   var items = [
   {
       name: '鉛筆',
       price: 300,
       quantity: 1
     },
     {
       name: 'ノート',
       price: 400,
       quantity: 1
     },
     {
       name: '消しゴム',
       price: 500,
       quantity: 1
     }
   ]

// 子コンポーネントのカウンターボタン
var counterButton = Vue.extend({
  // ボタンを押すとaddToCartが呼ばれる
  template: '<span>{{ counter }}個<button v-on:click="addToCart">追加</button></span>',
  data: function () {
    return {
      counter: 0
    }
  },
  methods: {
    addToCart: function () {
      this.counter += 1
      this.$emit('increment') // ビューで親のincrementCartStatusを呼んでいます
    }
  },
})

// 親コンポーネントのカート
new Vue({
  el: '#fruits-counter',
  components: {
    'counter-button': counterButton
  },
  data: {
    total: 0,
    fruits: [
      { name: '梨' },
      { name: 'いちご' }
    ]
  },
  methods: {
    incrementCartStatus: function () { // ボタンを押す度にtotalが１個ずつ増える
      this.total += 1
    }
  }
})
