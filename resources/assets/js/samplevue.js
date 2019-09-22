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

Vue.component('simple-counter', {
  template: '<h1>フルーツ一覧 {{ fruits[0] }}</h1>',
  data: function () {
    return {
      fruits: ['りんご', 'みかん']
    }
  }
})

new Vue({ el: 'simple-counter' })
