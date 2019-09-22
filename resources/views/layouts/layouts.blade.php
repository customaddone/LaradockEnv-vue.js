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
        <div v-bind:style="errorMessageClass">
            <ul>
                <!-- liの中で、Vueから渡されたインスタンスitemsの繰り返しレンダリングを
            　　　　　行います-->
                <li v-for="item in items" v-bind:key="item.name">
                    @{{ item.name }}: @{{ item.price }} * @{{ item.quantity }} = @{{
                    item.price * item.quantity | numberWithDelimiter }}円
                </li>
            </ul>
            <p>@{{ items[0].name }}: @{{ items[0].price }} * @{{ items[0].quantity}}
            </p>
            <p>小計： @{{ totalPrice | numberWithDelimiter }}円</p>
            <p>合計（税込）： @{{ totalPriceWithTax | numberWithDelimiter }}円</p>
            <p v-show="!canBuy">
                @{{ 1000 | numberWithDelimiter }}円以上からご購入いただけます
            </p>
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
