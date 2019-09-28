// Vue.directiveでカスタムディレクティブ生成　第一引数はディレクティブの名前
Vue.directive('fallback-image', {
  bind: function (el) {
    /*
        画像のアップロードに失敗したら実行される処理
        elがerror（第一引数）を起こした時に第二引数のfunctionが実行される
    */
    el.addEventListener('error', function () {
      el.src = 'https://dummyimage.com/400x400/000/ffffff.png&text=no+image'
    })
  }
})

new Vue({
  el: '#app'
})
