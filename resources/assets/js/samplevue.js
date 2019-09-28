var IconShareButton = {
  template: `
    <!-- シェアアイコンを読み込み -->
    <button @click="share"><i class="fas fa-share-square"></i></button>
  `,
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

var TextShareButton = {
  template: `
    <button @click="share">{{ buttonLabel }}</button>
  `,
  data: function () {
    return {
      buttonLabel: 'シェアする',
      _isProcessing: false
    }
  },
  methods: {
    share: function () {
      if (this._isProcessing) {
        return
      }
      if (!window.confirm('シェアしますか？')) {
        return
      }
      this._isProcessing = true
      // 実際はここでSNSのAPIを呼び出す
      setTimeout(() => {
        window.alert('シェアしました')
        this._isProcessing = false
      }, 300)
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
