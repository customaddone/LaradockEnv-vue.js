var Sharable = {
  data: function () {
    return {
      _isProcessing: false
    }
  },
  methods: {
    share: function () {
      // _isProcessingがtrueであれば何も返さない
      if (this._isProcessing) {
        return
      }
      // window.confirmが拒否られても何も返さない
      if (!window.confirm('シェアしますか？')) {
        return
      }
      // ボタン連打を防ぐためにtrueに　カウント300以内だとボタンを押されても何もしない
      this._isProcessing = true
      // 実際はここでSNSのAPIを呼び出す
      setTimeout(() => {
        window.alert('シェアしました')
        this._isProcessing = false
      }, 300)
    }
  }
}

var IconShareButton = {
  mixins: [Sharable],
  template: `
    <!-- シェアアイコンを読み込み -->
    <button @click="share"><i class="fas fa-share-square"></i></button>
  `,
}

var TextShareButton = {
  /*
    mixin配列にお好みのミックスインを追加する
    TextShareButtonには_isProcessingとbuttonLabelの両方の状態がある
  */
  mixins: [Sharable],
  template: `
    <button @click="share">{{ buttonLabel }}</button>
  `,
  data: function () {
    return {
      buttonLabel: 'シェアする'
    }
  }
}

new Vue({
  el: '#app',
  components: {
    IconShareButton,
    TextShareButton
  }
})
