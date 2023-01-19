@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="{{ mix('/css/main.css') }}" />
  <section class="pc">
    <div class="container">
      <div class="pass__restore">
        <a class="close__btn" href="{{ url('/') }}">
          <svg class="icon" viewBox="0 0 24 24" fill="none">
            <path
              d="M5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L12 10.5858L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L13.4142 12L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L12 13.4142L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L10.5858 12L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289Z">
            </path>
          </svg>
        </a>
        <h2 class="delete__title">Восстановить пароль</h2>
        <div class="registration__inputs">
          @if (session('status'))
            <p class="delete__title">Письмо отправлено!</p>
          @else
            <form class="flexible" method="POST" action="{{ route('password.email') }}" novalidate>
              @csrf
              <input class="input input__email" id="email" type="email"
                class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                required autocomplete="email" placeholder="Почта" autofocus>

              @error('email')
                <p class="form__error">
                  @if ($message == 'passwords.throttled')
                    Вы недавно запросили сброс пароля, пожалуйста, проверьте свою электронную почту
                  @else
                    {{ $message }}
                  @endif
                </p>
              @enderror

              <button class="btn btn__blue" type="submit">Отправить</button>
            </form>
          @endif
        </div>
        <div class="have__account">
          <p class="profile__name">Нет аккаунта?</p>
          <a class="reg__link" href="{{ route('register') }}">Регистрация</a>
        </div>
      </div>

    </div>
  </section>
@endsection
