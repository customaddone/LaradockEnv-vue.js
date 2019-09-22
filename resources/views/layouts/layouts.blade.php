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
    <div id="fruits-counter">
        <div v-for="fruit in fruits">
            <!-- カスタムイベントをv-onで捕捉 -->
            @{{ fruit.name }}: <counter-button v-on:increment="incrementCartStatus()">
            </counter-button>
        </div>
        <p>合計: @{{ total }}</p>
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
