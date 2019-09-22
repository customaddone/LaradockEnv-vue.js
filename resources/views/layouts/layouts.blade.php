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
    <div id="fruits-component">
        <!-- v-forでfruitsItemsを回して:fruits-item="fruit"で親コンポーネントから
    　　　　　子コンポーネントに値を渡している -->
        <ol>
            <fruits-item-name v-for="fruit in fruitsItems" :key="fruit.name"
            :fruits-item="fruit"></fruits-item-name>
        </ol>
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
