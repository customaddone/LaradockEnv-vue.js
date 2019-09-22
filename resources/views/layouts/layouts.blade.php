<html>
<head>
    <title>RailsTutorial</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Vueのインストールを行う -->
    <script src="https://unpkg.com/vue@2.5.17"></script>
    <!-- csrf_tokenをつける -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<!-- テンプレート用 -->
<body>
    <div id="app">
        <ul>
            <li v-for="item in items" v-bind:key="item.name">
                <!-- inputイベントをハンドリングして入力の度にquantityプロパティを変更
                     v-onでイベントが発生した時に属性値で指定した式を評価する
                     v-model:value=でv-onの代わりにできる -->
                @{{ item.name }}の個数： <input type="number" v-model:value=
                "item.quantity" min="0">
            </li>
        </ul>
        <hr>
        <div v-bind:style="errorMessageStyle">
            <ul>
                <li v-for="item in items" v-bind:key="item.name">
                    @{{ item.name }}: @{{ item.price }} * @{{ item.quantity }} =
                    @{{ item.price * item.quantity | numberWithDelimiter }}円
                </li>
            <ul>
            <p>@{{ items[0].name }}: @{{ items[0].price }} * @{{ items[0].quantity}}
    	    </p>
    	    <p>小計： @{{ totalPrice | numberWithDelimiter }}円</p>
    	    <p>合計（税込）： @{{ totalPriceWithTax | numberWithDelimiter }}円</p>
            <p v-show="!canBuy">
    	        @{{ 1000 | numberWithDelimiter }}円以上からご購入いただけます
    	    </p>
            <!-- ボタンが押されたら、doBuyメソッドを呼びます -->
            <button v-bind:disabled="!canBuy" v-on:click='doBuy'>購入</button>
        </div>
    </div>
    <script src="{{ asset('/js/samplevue.js') }}"></script>

    <div class="container">
        <header>
            @yield('header')
        </header>
        <main>
            @yield('main')
        </main>
        <aside class="sidebar">
            @yield('sidebar')
        </aside>
        <footer>
            @yield('footer')
        </footer>
    </div>
</body>
</html>
