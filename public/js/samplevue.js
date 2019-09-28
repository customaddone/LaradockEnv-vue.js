Vue.directive('fallback-image', {
  bind: function (el) {
    // 画像のアップロードに失敗したら実行される処理
    el.addEventListener('error', function () {
      el.src = 'https://dummyimage.com/400x400/000/ffffff.png&text=no+image'
    })
  }
})

new Vue({
  el: '#app'
})
