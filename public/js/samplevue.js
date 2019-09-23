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

// slotは親の指定で差し替えられます slotのname属性を指定しておく
var headerTemplate = `
  <div style="color: gray;">
    <slot name="header">No title</slot>
  </div>
  `

var contentTemplate = `
  <div>
    <slot name="content">No contents</slot>
  </div>
`

Vue.component('page-header', {
  template: headerTemplate
})

Vue.component('page-content', {
  template: contentTemplate
})

new Vue({
  el: "#fruits-list"
})
