<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PiGLy</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
  @yield('css')
</head>
<body>
  <header class="header">
    <div class="header__inner">
      <h1 class="header__logo">
        PiGLy
      </h1>
      <div class="header__logo-btn">
        <a href="/weight_logs/goal_setting">目標体重設定</a>
        <form method="POST" action="/logout">
          @csrf
          <button type="submit">ログアウト</button>
        </form>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>
</body>
</html>