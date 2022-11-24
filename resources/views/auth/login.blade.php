@extends('layouts.app')

@section('content')
    <section class="auth">
        <div class="container">

            <div class="authorization">

                <a class="close__btn" href="{{ url('/') }}">
                    <svg class="icon" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L12 10.5858L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L13.4142 12L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L12 13.4142L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L10.5858 12L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289Z">
                        </path>
                    </svg>
                </a>
                <h2 class="delete__title">Вход в аккаунт</h2>
                <div class="registration__inputs">
                    <form class="flexible error" method="POST" action="{{ route('login') }}">
                        @csrf
                        <input class="input input__email  @error('email') error @enderror" type="email" name="email"
                            placeholder="Почта" value="{{ old('email') }}" required autocomplete="email" autofocus>


                        <input class="input input__password @error('password') error @enderror" type="password"
                            name="password" placeholder="Пароль" required autocomplete="current-password">

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Запомнить меня') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form__message">
                            @error('email')
                                <div class="form__message">
                                    <p class="form__error">{{ $message }}</p>
                                </div>
                            @enderror
                            @error('password')
                                <div class="form__message">
                                    <p class="form__error">{{ $message }}</p>
                                </div>
                            @enderror
                            @if (Route::has('password.request'))
                                <a class="reg__link" href="{{ route('password.request') }}">
                                    {{ __('Забыли пароль?') }}
                                </a>
                            @endif
                        </div>

                        <button class="btn btn__blue" type="submit">Войти</button>
                    </form>
                </div>
                @if (Route::has('register'))
                    <div class="have__account">
                        <p class="profile__name">Нет аккаунта?</p>
                        <a class="reg__link" href="{{ route('register') }}">Регистрация</a>
                    </div>
                @endif
            </div>

        </div>
    </section>
@endsection
