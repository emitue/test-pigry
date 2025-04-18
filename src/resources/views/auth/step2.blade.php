<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PiGLy</title>
  <link rel="stylesheet" href="{{ asset('css/auth/step2.css')}}">

</head>
<body>
  <div class="step2">
    <div class="step2-wrapper">
      <div class="step2-box">
        <div class="step2-title">
          <h2 class="step2-title__logo">PiGLy</h2>
          <div class="step2-title__title">新規会員登録</div>
          <div class="step2-title__sub">STEP2<br>体重データの入力</div>
        </div>

        <div class="step2-form">
          <div class="step2-form__inner">
            <form class="step2-form__form" action="/register/step2" method="post">
              @csrf
              <div class="step2-form__group">
                <label class="step2-form__label" for="weight">現在の体重
                </label>
                <div class="step2-form__weight-inputs">
                  <input class="step2-form__weight-input" type="number" step="0.1" name="weight" id="weight" value="{{ old('weight') }}" placeholder="現在の体重を入力"><span class="step2-form__unit">kg</span>
                  <p class="step2-form__error-message">
                    @error('weight')
                    {{ $message }}
                    @enderror
                  </p>
                </div>
              </div>
              <div class="step2-form__group">
                <label class="step2-form__label" for="weight">目標の体重
                </label>
                <div class="step2-form__weight-inputs">
                  <input class="step2-form__target_weight-input" type="number" step="0.1" name="target_weight" id="target_weight" value="{{ old('target_weight') }}" placeholder="目標の体重を入力"><span class="step2-form__unit">kg</span>
                  <p class="step2-form__error-message">
                    @error('target_weight')
                    {{ $message }}
                    @enderror
                  </p>
                </div>
              <input class="step2-form__btn" type="submit" value="アカウント作成">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>