var PullDownMenu = {
  data: function () {
    return {
      isShown: false,
      name: 'メニュー',
      items: [
        '1-1',
        '1-2',
        '1-3',
      ]
    }
  },
  /*
   * transitionの中でv-on(@)を付けて発火するイベントを指定
   * mouseleaveはマウスが離れた時に発火 mouseoverはマウスを乗せた時に発火
   * v-showは非表示の状態になる v-ifは存在自体が削除される
   * 要素が挿入される前にbeforeEnter発火
   * アニメーションされる前にenter発火
   * 離れる時にleave発火
  */
  template: `
    <div @mouseleave="isShown = false">
      <p @mouseover="isShown = true"><a href="#" class="menu">{{ name }}</a></p>
      <transition
        @before-enter="beforeEnter"
        @enter="enter"
        @leave="leave"
        :css="false"
      >
        <ul v-if="isShown">
          <li v-for="item in items" :key="item">
            <a href="#" class="menu-item">{{ item }}</a>
          </li>
        </ul>
      </transition>
    </div>
  `,
  methods: {
    beforeEnter: function (el) {
      /*
       * el: トランジジョンの対象となるDOM要素(メニューの下から伸びてくるやつ)
       * el : #appの形だけではなくインスタンスとしても扱える
       * アニメーションの初期状態
       */
      el.style.height = '0px'
      el.style.opacity = '0'
    },
    enter: function (el, done) {
      // el: トランシジョンの対象となるDOM要素
      // 要素の高さを取得(scrollHeight)し、Amine.jsを用いてメニューを下に展開する
      // 3秒かけて、透明度と高さを変更して出現させる
      anime({
        targets: el,
        opacity: 1,
        height: el.scrollHeight + 'px',
        duration: 3000,
        complete: done
      })
    },
    leave: function (el, done) {
      // el: トランシジョンの対象となるDOM要素
      anime({
        targets: el,
        opacity: 0,
        height: '0px',
        duration: 300,
        complete: done
      })
    }
  }
}

new Vue({
  el: '#app',
  components: {
    PullDownMenu: PullDownMenu
  }
})
