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

var Userlist = {
  // ビューのscriptタグのidを指定する
  template: '#user-list',
  data: function () {
    return {
      loading: false,
      users: function () { return []}, //初期値の空配列
      error: null
    }
  },

  // 初期化時にデータを取得する
  created: function () {
    this.fetchData()
  },

  // $routeの変更をwatchすることでルーティングが変更された時に再度データを取得
  watch: {
    '$route': 'fetchData'
  },

  methods: {
    fetchData: function () {
      this.loading = true
      // 取得したデータの結果をusersに格納する
      // Function.prototype.bindはthisのスコープを渡すために利用
      getUsers((function (err, users) {
        this.loading = false
        if (err) {
          this.error = err.toString()
        } else {
          this.users = users
        }
      }).bind(this))
    }
  }
}

var router = new VueRouter({
  routes: [
    {
      path: '/top',
      component: {
        template: '<div>トップページです。</div>'
      }
    },
    {
      path: '/users',
      component: Userlist
    }
  ]
})

var getUsers = function (callback) {
  // functionを1000ミリ秒後に実施
  setTimeout(function () {
    // callback(null,[])でgetUser()の中身の関数function(err, user)を実行
    // errは今回null,userは２人用意
    callback(null, [
      {
        id: 1,
        name: 'Takuya Tejima',
      },
      {
        id: 2,
        name: 'Yohei Noda'
      }
    ])
  }, 1000)
}

var app = new Vue({
  router: router
}).$mount('#app')
