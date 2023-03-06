<header class="header">
  <div class="container">
    <div class="header__wrap">
      <div class="burger">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <a class="logo" href="{{ URL::to('/') }}">
        <img src="{{ asset('/images/content/logo.svg') }}" alt="" />
      </a>
      <nav class="header__nav">
        <a class="header__link search__link" href="#">
          <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#7D8688">
            <path
              d="M15.5944 6.8076C13.168 4.38119 9.23401 4.38119 6.8076 6.8076C4.38119 9.23401 4.38119 13.168 6.8076 15.5944C9.23401 18.0208 13.168 18.0208 15.5944 15.5944C18.0208 13.168 18.0208 9.23401 15.5944 6.8076ZM5.39338 5.39338C8.60084 2.18593 13.8012 2.18593 17.0086 5.39338C19.9767 8.36148 20.1982 13.0361 17.6731 16.2589L21.799 20.3848C22.1895 20.7753 22.1895 21.4085 21.799 21.799C21.4084 22.1895 20.7753 22.1895 20.3848 21.799L16.2589 17.6731C13.0361 20.1982 8.36148 19.9767 5.39338 17.0086C2.18593 13.8012 2.18593 8.60084 5.39338 5.39338Z" />
          </svg>
        </a>

        @guest
          <div class="login__block" data-micromodal-trigger="authorization">
            <a class="header__link login__link" href="#">
              <svg class="icon login__icon" viewBox="0 0 24 24" fill="none" fill="#7D8688">
                <path
                  d="M9 6C9 4.34315 10.3431 3 12 3C13.6569 3 15 4.34315 15 6C15 7.65685 13.6569 9 12 9C10.3431 9 9 7.65685 9 6ZM12 1C9.23858 1 7 3.23858 7 6C7 8.76142 9.23858 11 12 11C14.7614 11 17 8.76142 17 6C17 3.23858 14.7614 1 12 1ZM9 13C6.23858 13 4 15.2386 4 18V21C4 21.5523 4.44772 22 5 22C5.55228 22 6 21.5523 6 21V18C6 16.3431 7.34315 15 9 15H15C16.6569 15 18 16.3431 18 18V21C18 21.5523 18.4477 22 19 22C19.5523 22 20 21.5523 20 21V18C20 15.2386 17.7614 13 15 13H9Z" />
              </svg>

            </a>
          </div>
        @else
          <div class="login__block active">
            <a class="header__link login__link" href="#">
              <svg class="icon login__icon" viewBox="0 0 24 24" fill="none" fill="#7D8688">
                <path
                  d="M9 6C9 4.34315 10.3431 3 12 3C13.6569 3 15 4.34315 15 6C15 7.65685 13.6569 9 12 9C10.3431 9 9 7.65685 9 6ZM12 1C9.23858 1 7 3.23858 7 6C7 8.76142 9.23858 11 12 11C14.7614 11 17 8.76142 17 6C17 3.23858 14.7614 1 12 1ZM9 13C6.23858 13 4 15.2386 4 18V21C4 21.5523 4.44772 22 5 22C5.55228 22 6 21.5523 6 21V18C6 16.3431 7.34315 15 9 15H15C16.6569 15 18 16.3431 18 18V21C18 21.5523 18.4477 22 19 22C19.5523 22 20 21.5523 20 21V18C20 15.2386 17.7614 13 15 13H9Z" />
              </svg>
              <div class="login__active">
                @if ($user->user_avatar)
                  <picture>
                    <source srcset="{{ asset('storage/' . Auth::user()->user_avatar) }}" type="image/webp" />
                    <img src=" {{ asset('storage/' . Auth::user()->user_avatar) }}" alt="" />
                  </picture>
                @else
                  <picture>
                    <source srcset="{{ asset('/images/svg/humster.webp') }}" type="image/webp" />
                    <img src="{{ asset('/images/svg/humster.png') }}" alt="" />
                  </picture>
                @endif
                <svg class="icon" viewBox="0 0 14 14" fill="none" stroke="#1B1B1B">
                  <path d="M11.62 5.2207L7.81667 9.02404C7.36751 9.4732 6.63251 9.4732 6.18334 9.02404L2.38 5.2207"
                    stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
            </a>

          </div>
          <div class="profile__menu">
            <p class="user__name">Мой профиль</p>
            <div class="profile__data">
              @if ($user->user_avatar)
                <picture>
                  <source srcset="{{ asset('storage/' . Auth::user()->user_avatar) }}" type="image/webp" />
                  <img src=" {{ asset('storage/' . Auth::user()->user_avatar) }}" alt="" />
                </picture>
              @else
                <picture>
                  <source srcset="{{ asset('/images/svg/humster.webp') }}" type="image/webp" />
                  <img src="{{ asset('/images/svg/humster.png') }}" alt="" />
                </picture>
              @endif
              <a class="profile__name" href="{{ route('personal.main.index', $user->id) }}">{{ Auth::user()->name }}</a>
            </div>
            <div class="profile__items">
              <ul class="profile__item create">
                <!-- create items -->
                <a href="javascript:void(0)" class="comment__link">
                  <svg class="icon create-icon" viewBox="0 0 18 18" fill="none" stroke="#000F13">
                    <path
                      d="M9 16.5C13.125 16.5 16.5 13.125 16.5 9C16.5 4.875 13.125 1.5 9 1.5C4.875 1.5 1.5 4.875 1.5 9C1.5 13.125 4.875 16.5 9 16.5Z"
                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M6 9H12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M9 12V6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <p>Создать</p>
                  <svg class="icon chev" viewBox="0 0 14 14" fill="none" stroke="#1B1B1B">
                    <path d="M11.62 5.2207L7.81667 9.02404C7.36751 9.4732 6.63251 9.4732 6.18334 9.02404L2.38 5.2207"
                      stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </a>
                <li class="profile__subitem">

                  <a class="comment__link" href="{{ route('personal.post.index') }}"><svg class="icon fill"
                      viewBox="0 0 22 22" fill="none" fill="#7D8688">
                      <path
                        d="M11 2C10.5654 2 10.138 2.0308 9.71986 2.09035C9.58538 2.5785 9.4075 3.27861 9.22926 4.14011C9.05882 4.96392 8.8888 5.9317 8.75585 7H13.2441C13.1112 5.9317 12.9412 4.96392 12.7707 4.14011C12.5925 3.27861 12.4146 2.5785 12.2801 2.09035C11.862 2.0308 11.4346 2 11 2ZM7.27074 3.73489C7.34768 3.36303 7.42468 3.01904 7.4987 2.70646C5.51262 3.54596 3.89065 5.07805 2.93552 7H6.74127C6.8859 5.7707 7.07856 4.66374 7.27074 3.73489ZM6.56198 9H2.22302C2.07706 9.64322 2 10.3126 2 11C2 11.6874 2.07706 12.3568 2.22302 13H6.56198C6.52248 12.353 6.5 11.6843 6.5 11C6.5 10.3157 6.52248 9.64699 6.56198 9ZM6.74127 15H2.93552C3.89065 16.922 5.51262 18.454 7.4987 19.2935C7.42468 18.981 7.34768 18.637 7.27074 18.2651C7.07856 17.3363 6.8859 16.2293 6.74127 15ZM8.75585 15C8.8888 16.0683 9.05882 17.0361 9.22926 17.8599C9.4075 18.7214 9.58538 19.4215 9.71986 19.9097C10.138 19.9692 10.5654 20 11 20C11.4346 20 11.862 19.9692 12.2801 19.9097C12.4146 19.4215 12.5925 18.7214 12.7707 17.8599C12.9412 17.0361 13.1112 16.0683 13.2441 15H8.75585ZM13.4341 13C13.476 12.3536 13.5 11.6845 13.5 11C13.5 10.3155 13.476 9.64638 13.4341 9H8.56593C8.52402 9.64638 8.5 10.3155 8.5 11C8.5 11.6845 8.52402 12.3536 8.56593 13H13.4341ZM15.2587 15C15.1141 16.2293 14.9214 17.3363 14.7293 18.2651C14.6523 18.637 14.5753 18.981 14.5013 19.2935C16.4874 18.454 18.1094 16.922 19.0645 15H15.2587ZM19.777 13C19.9229 12.3568 20 11.6874 20 11C20 10.3126 19.9229 9.64322 19.777 9H15.438C15.4775 9.64699 15.5 10.3157 15.5 11C15.5 11.6843 15.4775 12.353 15.438 13H19.777ZM14.5013 2.70646C14.5753 3.01904 14.6523 3.36303 14.7293 3.73489C14.9214 4.66374 15.1141 5.7707 15.2587 7H19.0645C18.1094 5.07805 16.4874 3.54596 14.5013 2.70646ZM0 11C0 4.92487 4.92487 0 11 0C17.0751 0 22 4.92487 22 11C22 17.0751 17.0751 22 11 22C4.92487 22 0 17.0751 0 11Z" />
                    </svg>
                    Форум</a>
                </li>
              </ul>
              <!-- create items end -->
              <!-- profile item -->
              <ul class="profile__item">
                <a class="comment__link" href="{{ route('personal.published.index') }}"><svg class="icon"
                    viewBox="0 0 20 20" fill="none" stroke="#000F13">
                    <path
                      d="M18.175 3.28323C16.8916 6.48323 13.675 10.8332 10.9833 12.9916L9.34164 14.3082C9.13331 14.4582 8.92498 14.5916 8.69164 14.6832C8.69164 14.5332 8.68331 14.3666 8.65831 14.2082C8.56664 13.5082 8.24998 12.8582 7.69164 12.2999C7.12498 11.7332 6.43331 11.3999 5.72498 11.3082C5.55831 11.2999 5.39164 11.2832 5.22498 11.2999C5.31664 11.0416 5.45831 10.7999 5.63331 10.5999L6.93331 8.95823C9.08331 6.26656 13.45 3.03323 16.6416 1.75823C17.1333 1.5749 17.6083 1.70823 17.9083 2.01656C18.225 2.3249 18.375 2.7999 18.175 3.28323Z"
                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                      d="M8.69161 14.6832C8.69161 15.5998 8.34161 16.4748 7.68328 17.1415C7.17494 17.6498 6.48328 17.9998 5.65828 18.1082L3.60828 18.3332C2.49161 18.4582 1.53328 17.5082 1.66661 16.3748L1.89161 14.3248C2.09161 12.4998 3.61661 11.3332 5.23328 11.2998C5.39994 11.2915 5.57494 11.2998 5.73328 11.3082C6.44161 11.3998 7.13328 11.7248 7.69994 12.2998C8.25828 12.8582 8.57494 13.5082 8.66661 14.2082C8.67494 14.3665 8.69161 14.5248 8.69161 14.6832Z"
                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M11.8667 12.0584C11.8667 9.88337 10.1 8.1167 7.92505 8.1167" stroke-width="1.5"
                      stroke-linecap="round" stroke-linejoin="round" />
                  </svg>Черновики</a>
              </ul>
              <!-- profile item -->
              <ul class="profile__item">
                <a class="comment__link" href="{{ route('personal.favourite.index') }}"><svg class="icon fill"
                    viewBox="0 0 24 24" fill="none" fill="#000F13">
                    <path
                      d="M4 4C4 2.34315 5.34315 1 7 1H17C18.6569 1 20 2.34315 20 4V22C20 22.3905 19.7727 22.7453 19.4179 22.9085C19.0631 23.0717 18.6457 23.0134 18.3492 22.7593L12 17.3171L5.65079 22.7593C5.35428 23.0134 4.93694 23.0717 4.58214 22.9085C4.22734 22.7453 4 22.3905 4 22V4ZM7 3C6.44772 3 6 3.44772 6 4V19.8258L11.3492 15.2407C11.7237 14.9198 12.2763 14.9198 12.6508 15.2407L18 19.8258V4C18 3.44772 17.5523 3 17 3H7Z" />
                  </svg>Избранное</a>
              </ul>
              <!-- profile item -->
              <ul class="profile__item">
                <a class="comment__link" href="{{ route('personal.user.profile_settings', Auth::user()->id) }}"><svg
                    class="icon" viewBox="0 0 24 24" fill="none" stroke="#000F13">
                    <path
                      d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
                      stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                      d="M2 12.8799V11.1199C2 10.0799 2.85 9.21994 3.9 9.21994C5.71 9.21994 6.45 7.93994 5.54 6.36994C5.02 5.46994 5.33 4.29994 6.24 3.77994L7.97 2.78994C8.76 2.31994 9.78 2.59994 10.25 3.38994L10.36 3.57994C11.26 5.14994 12.74 5.14994 13.65 3.57994L13.76 3.38994C14.23 2.59994 15.25 2.31994 16.04 2.78994L17.77 3.77994C18.68 4.29994 18.99 5.46994 18.47 6.36994C17.56 7.93994 18.3 9.21994 20.11 9.21994C21.15 9.21994 22.01 10.0699 22.01 11.1199V12.8799C22.01 13.9199 21.16 14.7799 20.11 14.7799C18.3 14.7799 17.56 16.0599 18.47 17.6299C18.99 18.5399 18.68 19.6999 17.77 20.2199L16.04 21.2099C15.25 21.6799 14.23 21.3999 13.76 20.6099L13.65 20.4199C12.75 18.8499 11.27 18.8499 10.36 20.4199L10.25 20.6099C9.78 21.3999 8.76 21.6799 7.97 21.2099L6.24 20.2199C5.33 19.6999 5.02 18.5299 5.54 17.6299C6.45 16.0599 5.71 14.7799 3.9 14.7799C2.85 14.7799 2 13.9199 2 12.8799Z"
                      stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>Настройки</a>
              </ul>
              <!-- profile item -->

              <ul class="profile__item">


                <form class="comment__link logout" action="{{ route('logout') }}" method="POST">
                  @csrf
                  <input class="input logout" type="submit" id="logout" />
                  <label for="logout">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#000F13">
                      <path
                        d="M8.90002 7.56023C9.21002 3.96023 11.06 2.49023 15.11 2.49023H15.24C19.71 2.49023 21.5 4.28023 21.5 8.75023V15.2702C21.5 19.7402 19.71 21.5302 15.24 21.5302H15.11C11.09 21.5302 9.24002 20.0802 8.91002 16.5402"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      <path d="M15 12H3.62" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      <path d="M5.85 8.6499L2.5 11.9999L5.85 15.3499" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    </svg>Выйти
                  </label>
                </form>
              </ul>
            </div>
          </div>
        @endguest

      </nav>
    </div>
  </div>
</header>
