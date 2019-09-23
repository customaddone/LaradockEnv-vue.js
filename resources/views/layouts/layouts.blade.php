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
    <div id="fruits-list">
        <page-header class="header">
            <!-- slot=名前指定 で子コンポーネントのslotに任意のコンテンツを埋め込む-->
            <h1 slot="header">
                冬の果物
            </h1>
        </page-header>
        <page-content class="content">
            <ul slot="content">
                <li>りんご</li>
                <li>イチゴ</li>
            </ul>
        </page-content>
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
