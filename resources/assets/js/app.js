
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

/* １つ目の引数　ビューでVueが適用される要素を決める
　　２つ目の引数　Vueのコードの中身が書かれてあるファイルを引っ張ってくる
    npm run devすればコンパイルされるが、npm run watchするとassetファイルを変更すると自動で
    コンパイルしてくれる

    git addをするとwarning: CRLF will be replaced by LF inのエラーが出て、gitが改行
    コードをCRLFに変更しようとする
    →　$git config --global core.autoCRLF false
    を実行すると、gitが改行コードをCRLFへ変更しなくなる

    単一コンポーネントを使いたい時は下記のように書いていく
  */
Vue.component('sample-component', require('./components/SampleComponent.vue'));
// id="app"の要素にVueが反映される
const app = new Vue({
    el: '#app'
});
