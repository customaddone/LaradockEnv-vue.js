<html>
<head>
  <title>RailsTutorial</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<!-- テンプレート用 -->
<body>
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
