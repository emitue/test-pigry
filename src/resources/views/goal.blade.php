@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/goal.css')}}">
@endsection

@section('link')
<form action="/weight_logs/{:weightLogId}" method="post">
  @csrf
  <input class="header__link" type="submit" value="logout">
</form>
@endsection

@section('content')
<div class="goal">
  <div class="goal__title">
    <div class="goal__title-title">目標体重設定</div>
      <form class="goal-form_form" action="/weight_logs/goal_setting" method="post">
        @csrf
        <div class="goal-form__weight-inputs">
          <input class="goal-form__target_weight-input" type="hidden" step="0.1" name="target_weight" id="target_weight" value="{{ $weightLogs['target_weight'] }}"><span class="goal-form__unit">kg</span>
          <p class="goal-form__error-message">
            @error('target_weight')
            {{ $message }}
            @enderror
          </p>
        </div>
        <div class="goal-form__btn">
          <input class="goal-form__return-btn" type="submit" value="戻る">
          <input class="goal-form__edit-btn" type="submit" value="更新">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection