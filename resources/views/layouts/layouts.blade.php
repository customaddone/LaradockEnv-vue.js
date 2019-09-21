<html>
<head>
    <title>RailsTutorial</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Vueのインストールを行う -->
    <script src="https://unpkg.com/vue@2.5.17"></script>
</head>
<!-- テンプレート用 -->
<body>
    <!-- Vueによってレンダリングされる部分です
         script以下のコードがdivの中に反映されます -->
    <div id="app"></div>
    <!--  script以下はVueを実行するためのコードです
          bladeの{{$変数}}記法とコンフリクトするので、{{}}で囲うvueの式を描く場合は
　　　　　 {{}}の前に＠をつけましょう -->
    <script>
        new Vue({
            template: '<p>@{{msg}}</p>',
            data: { msg: 'hello world!' }
        }).$mount('#app')
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
