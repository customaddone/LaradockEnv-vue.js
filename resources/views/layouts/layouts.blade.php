<html>
<head>
    <title>RailsTutorial</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Vueのインストールを行う -->
    <script src="https://unpkg.com/vue@2.5.17"></script>
    <!-- Vue Routerのインストールを行う -->
    <script src="https://unpkg.com/vue-router@3.0.1"></script>
    <!-- csrf_tokenをつける -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<!-- テンプレート用 -->
<body>
    <div id="app">
        <nav>
            <!-- router-linkによるナビゲーション定義 -->
            <router-link to="/top">トップページ</router-link>
            <router-link to="/users">ユーザー一覧ページ</router-link>
        </nav>
        <router-view></router-view>
    </div>
    <script type="text/x-template" id="user-list">
        <div>
            <div class="loading" v-if="loading">読み込み中...</div>
            <div v-if="error" class="error">
                @{{ error }}
            </div>
            <!-- userがロードされたらユーザーの名前を表示する -->
            <div v-for="user in users" :key="user.id">
                <h2>@{{ user.name }}</h2>
            </div>
        </div>
    </script>

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
