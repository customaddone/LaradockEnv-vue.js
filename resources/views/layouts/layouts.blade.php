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
    <!-- コンポーネントの配置 -->
    <div id="app">
        <!-- この中にresources/assets/js/components/SampleComponent.vueで書いた
            　テンプレートが入る -->
        <sample-component></sample-component>
    </div>
    <!-- -->
    <script src="{{ mix('js/app.js') }}"></script>
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
