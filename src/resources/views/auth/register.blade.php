<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PiGLy</title>
  <link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">

</head>
<body>
  <div class="register">
    <div class="register-wrapper">
      <div class="register-box">
        <div class="register-title">
          <h2 class="register-title__logo">PiGLy</h2>
          <div class="register-title__title">新規会員登録</div>
          <div class="register-title__sub">STEP1<br>アカウント情報の登録</div>
        </div>

        <div class="register-form">
          <div class="register-form__inner">
            <form class="register-form_form" action="/register/step1" method="post">
              @csrf
              <div class="register-form__group">
                <label class="register-form__label" for="name">お名前</label>
                <input class="register-form__input" type="text" name="name" id="name" placeholder="名前を入力">
                <p class="register-form__error-message">
                  @error('name')
                  {{ $message }}
                  @enderror
                </p>
              </div>
              <div class="register-form__group">
                <label class="register-form__label" for="email">メールアドレス</label>
                <input class="register-form__input" type="mail" name="email" id="email" placeholder="メールアドレスを入力">
                <p class="register-form__error-message">
                  @error('email')
                  {{ $message }}
                  @enderror
                </p>
              </div>
              <div class="register-form__group">
                <label class="register-form__label" for="password">パスワード</label>
                <input class="register-form__input" type="password" name="password" id="password" placeholder="パスワードを入力">
                <p class="register-form__error-message">
                @error('password')
                  {{ $message }}
                  @enderror
                </p>
              </div>
              <input class="register-form__btn" type="submit" value="次に進む">
            </form>
            <form action="{{ '/login'}}" method="get">
              <input class="register-form__login-btn" type="submit" value="ログインはこちら">
            </form>
          </input>
        </div>
      </div>
    </div>
  </div>
</body>
</html>