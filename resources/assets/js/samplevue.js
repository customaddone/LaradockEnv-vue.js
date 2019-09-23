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

// ルートオプションを渡してルーターインスタンスを生成
var router = new VueRouter({
  // コンポーネントをマッピングしたルート定義を配列で渡す
  routes: [
    {
      // ビューのrouter-linkから呼び出される
      path: '/top',
      component: {
        template: '<div>トップページです。</div>'
      }
    },
    {
      path: '/users',
      component: {
        template: '<div>ユーザー一覧ページです。</div>'
      }
    }
  ]
})

// ルーターのインスタンスをrootとなるVueインスタンスに渡す
var app = new Vue({
  router: router
}).$mount('#app')
