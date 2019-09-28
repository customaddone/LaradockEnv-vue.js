var MyButton = {
  props: ['href', 'tag'],
  /*
    描画関数renderは、引数にcreateElement関数を受け取る
    この関数を用いて仮想のDOM要素を生成する
   */
  render: function (createElement) {
    // tag = tagがあればtag、なければa、それもなければbutton
    var tag = this.tag || (this.href ? 'a' : 'button')
    /*
      createElementの泰一引数には要素名、コンポーネントオプション、もしくはそれらを非同期
      に解決する関数を指定します
    */
    return createElement(tag, {
      // 指定した要素について、href属性を付与
      attrs: {
        href: this.href || '#'
      }
    }, this.$slots.default)
  }
}

new Vue({
  el: '#app',
  components: {
    MyButton: MyButton
  }
})
