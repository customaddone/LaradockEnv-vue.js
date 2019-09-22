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

// 親(Vue)のmyItemの値を子(item-desc)のitemNameに渡しています
Vue.component('item-desc', {
  props: {
    itemName: {
      type: String
    }
  },
  template: '<p>{{ itemName }}は便利です。</p>'
})

new Vue({
   el: '#app',
   data: { myItem: 'pen'}
 })
