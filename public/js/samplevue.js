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

   var vm = new Vue({
     el: '#app',
     data: {
       items: items
     },
     // 算出プロパティ　ややこしい計算処理はhtmlよりこっちに書きましょう
     computed: {
       totalPrice: function () {
         /* reduceは配列の要素に対して処理を行うメソッド
            第一引数は１つ前の処理の結果
            第二引数は現在処理されている要素の値
            （第三引数は現在処理されている要素のインデックス）
            最後の０は初期値　*/
         return this.items.reduce(function (sum, item) {
           return sum + (item.price * item.quantity)
         }, 0)
       },
       totalPriceWithTax: function () {
         return Math.floor(this.totalPrice * 1.08)
       },
       // 戻り値はtrue or falseになる
       canBuy: function () {
         return this.totalPrice >= 1000
       },
       // 合計金額が1000円以下になるとdivの枠線が赤くなります
       errorMessageStyle: function () {
         return {
           border: this.canBuy ? '' : '1px solid red',
           color: this.canBuy ? '' : 'red',
         }
       },
     },
     filters: {
       numberWithDelimiter: function (value) {
         if (!value) {
           return '0'
         }
         // ３桁ごとにカンマを打つ関数
         return value.toString().replace(/(\d)(?=(\d{3})+$)/g, '$1,')
       }
     }
   })

   window.vm = vm
