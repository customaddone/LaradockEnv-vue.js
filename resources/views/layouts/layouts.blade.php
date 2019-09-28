<html>
<head>
    <title>RailsTutorial</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- Vueのインストールを行う -->
    <script src="https://unpkg.com/vue@2.5.17"></script>
    <!-- Vue Routerのインストールを行う -->
    <script src="https://unpkg.com/vue-router@3.0.1"></script>
    <!-- anime.jsを追加 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js">
    </script>
    <!-- csrf_tokenをつける -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<!-- テンプレート用 -->
<body>
    <div id="app">
        <my-page>
            <!-- name属性値がheaderの<slot>と置き換わるコンテンツ -->
            <h1 slot="header">This is my page</h1>
            <!-- name属性値がfooterの<slot>と置き換わるコンテンツ -->        
            <p slot="footer">This is footer</p>
        </my-page>
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
