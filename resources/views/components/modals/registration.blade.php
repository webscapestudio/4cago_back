<div class="modal micromodal-slide" id="registration" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close>
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <div class="registration">
        <div class="close__btn">
          <svg class="icon" viewBox="0 0 24 24" fill="none" data-micromodal-close>
            <path
              d="M5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L12 10.5858L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L13.4142 12L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L12 13.4142L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L10.5858 12L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289Z">
            </path>
          </svg>
        </div>
        <h2 class="delete__title">Регистрация</h2>

        <form class="flexible" method="POST" action="{{ route('register') }}" novalidate>
          @csrf

          <input class="input input__name @error('name') error @enderror" type="text" placeholder="Имя"
            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

          <input class="input input__email @error('email') error @enderror" type="email" placeholder="Почта"
            name="email" value="{{ old('email') }}" required autocomplete="email">

          <input class="input input__password  @error('password') error @enderror" type="password" placeholder="Пароль"
            name="password" required autocomplete="new-password">

          <input class="input input__password" type="password" placeholder="Подтвердите пароль"
            name="password_confirmation" required autocomplete="new-password">

          <div class="form__message">
            @error('name')
              <div class="form__message">
                <p class="form__error">{{ $message }}</p>
              </div>
            @enderror
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
          </div>

          <button class="btn btn__blue" type="submit">Зарегистрироваться</button>
        </form>
        @if (Route::has('login'))
          <div class="have__account mt-4">
            <p class="profile__name">Есть аккаунт?</p>
            <a class="reg__link cursor-pointer" data-micromodal-trigger="authorization" data-micromodal-close>Войти</a>
          </div>
        @endif
        <div class="reg__bottom">
          <a class="reg__link" href="#">Условия использования</a>
        </div>
      </div>
    </div>
  </div>
</div>
