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
    <div id="login-example">
        <user-login></user-login>
    </div>
    <script type="text/x-template" id="login-template">
        <div id="login-template">
            <div>
                <!-- placeholderは初期値設定のため
                     v-modelでイベント発生ごとにuserid,passwordの値をいじる -->
                <input type="text" placeholder="ログインID" v-model="userid">
            </div>
            <div>
                <input type="password" placeholder="パスワード" v-model="password">
            </div>
            <!-- ボタンを押すとloginを実行 -->
            <button @click="login">ログイン</button>
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
