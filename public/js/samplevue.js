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

Vue.component('user-login', {
  // ビュー側でのx-templateを持ってくる
  template: '#login-template',
  data: function () {
    return {
      userid: '',
      password: ''
    }
  },
  methods: {
    login: function () {
      auth.login(this.userid, this.password)
    }
  }
})

var auth = {
  login: function(id, pass){
    window.alert("userid:" + id + "\n" + "password:" + pass);
  }
}

new Vue({
  el: "#login-example"
})
