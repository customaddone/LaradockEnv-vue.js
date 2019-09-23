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
            <router-link to="/users/new?redirect=true">新規ユーザー登録</router-link>
            <router-link to="/login" v-show="!Auth.loggedIn()">ログイン</router-link>
            <router-link to="/logout" v-show="Auth.loggedIn()">ログアウト</router-link>
        </nav>
        <router-view></router-view>
    </div>
    <!-- ユーザー一覧画面 -->
    <script type="text/x-template" id="user-list">
        <div>
            <div class="loading" v-if="loading">読み込み中...</div>
            <div v-if="error" class="error">
                @{{ error }}
            </div>
            <!-- userがロードされたらユーザーの名前を表示する -->
            <div v-for="user in users" :key="user.id">
                <router-link :to="{ path: '/users/' + user.id }">@{{ user.name }}
                </router-link>
            </div>
        </div>
    </script>
    <!-- ユーザー詳細画面-->
    <script type="text/x-template" id="user-detail">
        <div>
            <div class="loading" v-if="loading">読み込み中...</div>
            <div v-if="error" class="error">
                @{{ error }}
            </div>
            <div v-if="user">
                <h2>@{{ user.name }}</h2>
                <p>@{{ user.description }}</p>
            </div>
        </div>
    </script>
    <!-- ユーザー作成画面 -->
    <script type="text/x-template" id="user-create">
        <div>
            <div class="sending" v-if="sending">Sending...</div>
            <div>
                <h2>新規ユーザー作成</h2>
                <div>
                    <label>名前： </label>
                    <input type="text" v-model="user.name">
                </div>
                <div>
                    <label>説明文： </label>
                    <textarea v-model="user.description"></textarea>
                </div>
                <div v-if="error" class="error">
                    @{{ error }}
                </div>
                <div>
                    <input type="button" @click="createUser" value="送信">
                </div>
            </div>
        </div>
    </script>
    <!-- ログイン画面 -->
    <script type="text/x-template" id="login">
        <div>
            <h2>Login</h2>
            <p v-if="$route.query.redirect">
                ログインしてください
            </p>
            <form @submit.prevent="login">
                <label><input v-model="email" placeholder="email"></label>
                <label><input v-model="pass" placeholder="password"
                type="password"></label><br>
                <button type="submit">ログイン</button>
                <p v-if="error" class="error">ログインに失敗しました</p>
            </form>
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
