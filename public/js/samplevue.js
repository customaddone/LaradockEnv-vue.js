Vue.directive('fallback-image', {
  /*
    bindはディレクティブが対象の要素に紐付いた時一度だけ呼ばれます
    elはディレクティブが紐付く要素です
  */
  bind: function (el, binding) {
    console.log('bind', binding)
    el.addEventListener('error', function () {
       el.src = 'https://dummyimage.com/400x400/000/ffffff.png&text=no+image'
    })
  },
  // アップデートした時に呼び出されるます
  update: function (el, binding) {
    console.log('update', binding)
  }
})

var vm = new Vue({
  el: '#app',
  data: function () {
    return {
      altText: 'logo'
    }
  }
})
