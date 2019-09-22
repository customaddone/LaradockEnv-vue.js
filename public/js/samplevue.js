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

   window.vm = vm
