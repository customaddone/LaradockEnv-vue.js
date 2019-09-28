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
        <!-- 「parent」と「child」どちらが参照されるでしょうか -->
        <my-button>@{{ textLabel }}</my-button>
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
