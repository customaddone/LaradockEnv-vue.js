var MyButton = {
  /* 子コンポーネントでtextLabel: 'child'を宣言する */
  data: function () {
    return {
      textLabel: 'child'
    }
  },
  template: `
    <button>
      <slot>OK</slot>
    </button>
  `
}
new Vue({
  el: '#app',
  /*
  　　親コンポーネントでtextLabel: 'parent'を宣言する
     親のコンポーネントのテンプレートで行われるデータバインディングは、スロットとして挿入される
     コンテンツであっても、親のコンポーネントのスコープが適用される
  */
  data: function () {
    return {
      textLabel: 'parent'
    }
  },
  components: {
    MyButton: MyButton
  }
})
