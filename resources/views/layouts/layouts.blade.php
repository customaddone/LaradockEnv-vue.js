<html>
<head>
    <title>RailsTutorial</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Vueのインストールを行う -->
    <script src="https://unpkg.com/vue@2.5.17"></script>
</head>
<!-- テンプレート用 -->
<body>
    <div id="app">
        <p>
            @{{ message }}
        </p>
    </div>
    <script>
        //ロードされ、Vueがグローバル変数として定義されているか確認
        console.assert(typeof Vue !== 'undefined');
        new Vue({
            el: '#app',
            data: { message: 'こんにちは！' }
        });
    </script>
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
