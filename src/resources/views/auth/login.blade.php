<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PiGLy</title>
  <link rel="stylesheet" href="{{ asset('css/auth/login.css')}}">

</head>
<body>
  <div class="login">
    <div class="login-wrapper">
      <div class="login-box">
        <div class="login-title">
          <h2 class="login-title__logo">PiGLy</h2>
          <div class="login-title__title">ログイン</div>
        </div>
        <div class="login-form">
          <div class="login-form__inner">
            <form method="post" action="/login">
            @csrf
              <div class="login-form__group">
                <label class="login-form__label" for="email">メールアドレス</label>
                <input class="login-form__input" type="mail" name="email" id="email" placeholder="メールアドレスを入力">
                <p class="login-form__error-message">
                @error('email')
                {{ $message }}
                @enderror
                </p>
              </div>
              <div class="login-form__group">
                <label class="login-form__label" for="password">パスワード</label>
                <input class="login-form__input" type="password" name="password" id="password" placeholder="パスワードを入力">
                <p class="login-form__error-message">
                @error('password')
                {{ $message }}
                @enderror
                </p>
              </div>
              <input class="login-form__btn" type="submit" value="ログイン">
              <input class="login-form__register-btn" type="submit" value="アカウント作成はこちら">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>