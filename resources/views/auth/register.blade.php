@extends('layouts.app')

@section('content')
  <section class="reg">
    <div class="container">
      <div class="registration">
        <a class="close__btn" href="{{ url('/') }}">
          <svg class="icon" viewBox="0 0 24 24" fill="none">
            <path
              d="M5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L12 10.5858L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L13.4142 12L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L12 13.4142L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L10.5858 12L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289Z">
            </path>
          </svg>
        </a>
        <h2 class="delete__title">Регистрация</h2>

        <div class="registration__inputs">
          <form class="flexible" method="POST" action="{{ route('register') }}" novalidate>
            {{ csrf_field() }}

            <input class="input input__name @error('name') error @enderror" type="text" placeholder="Имя"
              name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            <input class="input input__email @error('email') error @enderror" type="email" placeholder="Почта"
              name="email" value="{{ old('email') }}" required autocomplete="email">

            <input class="input input__password  @error('password') error @enderror" type="password" placeholder="Пароль"
              name="password" required autocomplete="new-password">

            <input class="input input__password" type="password" placeholder="Подтвердите пароль"
              name="password_confirmation" required autocomplete="new-password">

            @error('name')
              <p class="form__error">{{ $message }}</p>
            @enderror
            @error('email')
              <p class="form__error">{{ $message }}</p>
            @enderror
            @error('password')
              <p class="form__error">{{ $message }}</p>
            @enderror


            <button class="btn btn__blue" type="submit">Зарегистрироваться</button>
          </form>
        </div>
        @if (Route::has('login'))
          <div class="have__account">
            <p class="profile__name">Есть аккаунт?</p>
            <a class="reg__link" href="{{ route('login') }}">Войти</a>
          </div>
        @endif
        <div class="reg__bottom">
          <a class="reg__link" href="#">Условия использования</a>
        </div>
      </div>

    </div>
  </section>
@endsection
