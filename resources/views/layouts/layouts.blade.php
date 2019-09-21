<html>
<head>
  <title>RailsTutorial</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<!-- テンプレート用 -->
<body>
  <!-- ４　npm run devでソースをコンパイルする
       ５  view内でasset('/js/()')でassetを読み込む -->
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
