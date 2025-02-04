Vue.mixin({
  // 全コンポーネントに強制的にミックスインされる
  data: function () {
    return {
      loggedInUser: null
    }
  },
  created: function () {
    var auth = this.$options.auth
    this.loggedInUser = JSON.parse(sessionStorage.getItem('loggedInUser'))
    if (auth && !this.loggedInUser) {
      window.alert('このページはログインが必要です')
    }
  }
})

var LoginRequiredPage = {
  auth: true,
  template: `
    <div>
      <p v-if="!loggedInUser">
        このページはログインが必要です
      </p>
    </div>
  `
}

new Vue({
  el: '#app',
  components: {
    LoginRequiredPage
  }
})
