@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/app.css')}}">
<link rel="stylesheet" href="{{ asset('css/create.css')}}">
@endsection

@section('link')
<form action="/logout" method="post">
  @csrf
  <input class="header__link" type="submit" value="logout">
</form>
@endsection

@section('content')
<div class="create-form__inner">
  <form class="create__form-form" action="/weight_logs/create" method="post">
  @csrf
  <div class="create-form">
    <h2>Weight Log</h2>
    <div class="create-form__group">
      <label class="create-form__label" for="date">日付<span class="create-form__required">必須</span>     </label>
      <div class="create-form__date-inputs">
        <input class="create-form__date-input" type="date" name="date" id="date" value="{{ old('date') }}" placeholder="2024年1月1日">
        <p class="create-form__error-message">
          @error('date')
          {{ $message }}
          @enderror
        </p>
      </div>

      <label class="create-form__label" for="weight">体重<span class="create-form__required">必須</span>
      </label>
      <div class="create-form__weight-inputs">
        <input class="create-form__weight-input" type="number" step="0.1" name="weight" id="weight" value="{{ old('weight') }}" placeholder="50.0"><span class="create-form__unit">kg</span>
        <p class="create-form__error-message">
          @error('weight')
          {{ $message }}
          @enderror
        </p>
      </div>

      <label class="create-form__label" for="calories">摂取カロリー<span class="create-form__required">必須</span>
      </label>
      <div class="create-form__calories-inputs">
        <input class="create-form__calories-input" type="number" name="calories" id="calories" value="{{ old('calories') }}" placeholder="1200"><span class="create-form__unit">cal</span>
        <p class="create-form__error-message">
          @error('calories')
          {{ $message }}
          @enderror
        </p>
      </div>

      <label class="create-form__label" for="exercise_time">運動時間<span class="create-form__required">必須</span>
      </label>
      <div class="create-form__exercise_time-inputs">
        <input class="create-form__exercise_time-input" type="text" name="exercise_time" id="exercise_time" value="{{ old('exercise_time') }}" placeholder="00:00">
        <p class="create-form__error-message">
          @error('exercise_time')
          {{ $message }}
          @enderror
        </p>
      </div>

      <label class="create-form__label" for="exercise_content">運動内容<span class="create-form__required">必須</span>
      </label>
      <textarea class="create-form__textarea" name="exercise_content" id="" cols="30" rows="4" placeholder="運動内容を追加">{{ old('exercise_content') }}</textarea>
      <p class="create-form__error-message">
          @error('exercise_content')
          {{ $message }}
          @enderror
      </p>

      <div class="create-form__btn-inner">
        <input class="create-form__back-btn" type="submit" value="戻る" name="back">
        <input class="create-form__register-btn btn" type="submit" value="登録" name="register">
        <div class="trash-can-content">
          <a href="/weight_logs/{:weightLogId}/delete">
            <img src="{{ asset('/images/trash-can.png') }}" alt="ゴミ箱の画像" class="img-trash-can" />
          </a>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection