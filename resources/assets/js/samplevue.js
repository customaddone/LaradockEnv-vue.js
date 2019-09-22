/* laravelでのJavaScriptの書き方について
   １　ターミナルでnpmのインストール（$ npm install)
   ２  resources/assets/js内にjsファイルを作成 */
   var items = [
   {
       name: '鉛筆',
       price: 300,
       quantity: 0
     },
     {
       name: 'ノート',
       price: 400,
       quantity: 0
     },
     {
       name: '消しゴム',
       price: 500,
       quantity: 0
     }
   ]

   var vm = new Vue({
   el: '#app',
     data: {
     items: items
     }
   })

　 /* インスタンスvmに$watchメゾッドを追加します
　　　 第一引数には監視対象の値を返す関数
      第二引数には値が変わった場合に呼ばれるコールバック関数を渡します。*/
   vm.$watch(function () {
     // item[0]の個数
     return this.items[0].quantity
   }, function (quantity) {
     // このコールバックは監視対象の個数が変わったら呼ばれます
     alert(quantity)
   })
   // item[0]の個数を変更します
   vm.items[0].quantity = 1

   window.vm = vm
