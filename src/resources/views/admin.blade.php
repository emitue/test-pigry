@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css')}}">
@endsection

@section('link')
<form action="/logout" method="post">
  @csrf
  <input class="header__link" type="submit" value="logout">
</form>
@endsection

@section('content')
<div class="admin__heading-title">
  <div class="weight-info">
    <div class="weight-info__item">
      <div class="weight-info__label">目標体重</div>
      <p>{{ $goalWeight ?? '' }} kg</p>
    </div>
    <div class="weight-info__item">
      <div class="weight-info__label">
      目標まで</div>
      <p>{{ isset($goalWeight) ? number_format($goalWeight, 1) : '' }} kg</p>
    </div>
    <div class="weight-info__item">
      <div class="weight-info__label">
      最新体重</div>
      <p>{{ $latestWeight ?? '' }} kg</p>
    </div>
  </div>
</div>

    <div class="admin__inner">
      <form action="/weight_logs/search" method="get" class="mb-4 d-flex gap-2">
        <label class="search-form__date">
          <input type="date" name="from" value="{{ request('from') }}">
        </label>
        <label class="search-form__date">
          <input type="date" name="to" value="{{ request('to') }}">
        </label>
        <button type="submit" class="search-form__date-btn">"検索"</button>
        @if(request('from') || request('to'))
          <a href="/weight_logs/search" class="search-form__reset-btn btn">リセット
          </a>
        @endif
      </form>
      <div class="add-data">
        <a href="#weightLogModal" class="add-fate__btn">データ追加</a>
      </div>
      @if(request('from') && request('to'))
        <h5>{{ request('form') }} ~ {{ request('to') }} の検索結果 {{ $count }}件</h5>
      @endif

      @if(($results ?? collect())->isEmpty())
        <p>該当するデータはありません。</p>
      @endif
        <table class="admin__table">
          <tr class="admin__row">
            <th class="admin__label">日付</th>
            <th class="admin__label">体重</th>
            <th class="admin__label">食事摂取カロリー</th>
            <th class="admin__label">運動時間</th>
          </tr>
          @foreach(($results ?? []) as $log)
          <tr class="admin__row">
            <td class="admin__data">{{ $weightLog->created_at->format('Y-m-d') }}</td>
            <td class="admin__data">{{ $weightLog->weight }}</td>
            <td class="admin__data">{{ $weightLog->calories }}</td>
            <td class="admin__data">{{ $weightLog->exercise_time }}</td>
            <td class="admin__data">
              <div class="admin__detail-btn">
                <a href="/weight_logs/{:weightLogId}">
                  <img src="{{ asset('images/pen.png') }}" alt="画像">
                </a>
              </div>
            </td>
          </tr>
          @endforeach

          <div class="modal" id="weightLogModal">
            <a href="#!" class="modal__overlay"></a>
            <div class="modal__inner">
              <div class="modal__content">
                <form class="modal__detail-form" action="/weight_logs/create" method="post">
                  @csrf
                  <div class="add-form">
                    <h2>Weight Logを追加</h2>
                    <div class="add-form__group">
                      <label class="add-form__label" for="date">日付<span class="add-form__required">必須</span>
                      </label>
                      <div class="add-form__date-inputs">
                        <input class="add-form__date-input" type="date" name="date" id="date" value="{{ old('date') }}" placeholder="年/月/日">
                        <p class="add-form__error-message">
                          @error('date')
                          {{ $message }}
                          @enderror
                        </p>
                      </div>

                      <label class="add-form__label" for="weight">体重<span class="add-form__required">必須</span>
                      </label>
                      <div class="add-form__weight-inputs">
                        <input class="add-form__weight-input" type="number" step="0.1" name="weight" id="weight" value="{{ old('weight') }}" placeholder="50.0"><span class="add-form__unit">kg</span>
                        <p class="add-form__error-message">
                          @error('weight')
                          {{ $message }}
                          @enderror
                        </p>
                      </div>

                      <label class="add-form__label" for="calories">摂取カロリー<span class="add-form__required">必須</span>
                      </label>
                      <div class="add-form__calories-inputs">
                        <input class="add-form__calories-input" type="number" name="calories" id="calories" value="{{ old('calories') }}" placeholder="1200"><span class="add-form__unit">cal</span>
                        <p class="add-form__error-message">
                          @error('calories')
                          {{ $message }}
                          @enderror
                        </p>
                      </div>

                      <label class="add-form__label" for="exercise_time">運動時間<span class="add-form__required">必須</span>
                      </label>
                      <div class="add-form__exercise_time-inputs">
                        <input class="add-form__exercise_time-input" type="text" name="exercise_time" id="exercise_time" value="{{ old('exercise_time') }}" placeholder="00:00">
                        <p class="add-form__error-message">
                          @error('exercise_time')
                          {{ $message }}
                          @enderror
                        </p>
                      </div>

                      <label class="add-form__label" for="exercise_content">運動内容<span class="add-form__required">必須</span>
                      </label>
                      <textarea class="add-form__textarea" name="exercise_content" id="" cols="30" rows="4" placeholder="運動内容を追加">{{ old('exercise_content') }}</textarea>
                      <p class="add-form__error-message">
                        @error('exercise_content')
                        {{ $message }}
                        @enderror
                      </p>
                    </div>

                    <div class="add-form__btn-inner">
                      <button class="add-form__back-btn">戻る</button>
                      <input class="add-form__register-btn btn" type="submit" value="登録" name="register">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

