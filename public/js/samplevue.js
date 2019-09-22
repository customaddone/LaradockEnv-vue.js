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

// 子コンポーネント
Vue.component('fruits-item-name', {
  /* propで値を受ける器を作っている
     ビューで値を受け取りテンプレートに値を渡す */
  props: {
    fruitsItem: { // テンプレート中ではケバブケース
      type: Object, // 要オブジェクト
      required: true // このコンポーネントに必須
    }
  },
  template: '<li>{{ fruitsItem.name }}</li>'
})

// 親コンポーネント
new Vue({
   el: '#fruits-component',
   data: {
     fruitsItems: [
       { name: '梨' },
       { name: 'いちご' },
     ]
   }
 })
