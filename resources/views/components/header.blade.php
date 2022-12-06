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
                    <div class="notifications__block active">
                        <a class="header__link notification__link" href="#">
                            <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#7D8688">
                                <path
                                    d="M13 1C13 0.447715 12.5523 0 12 0C11.4477 0 11 0.447715 11 1V2.05493C6.50005 2.55237 3 6.36745 3 11V17C3 18.6569 4.34315 20 6 20H18C19.6569 20 21 18.6569 21 17V11C21 6.36745 17.5 2.55237 13 2.05493V1ZM12 4C15.866 4 19 7.13401 19 11V17C19 17.5523 18.5523 18 18 18H6C5.44772 18 5 17.5523 5 17V11C5 7.13401 8.13401 4 12 4ZM9 22C9 21.4477 9.44772 21 10 21H14C14.5523 21 15 21.4477 15 22C15 22.5523 14.5523 23 14 23H10C9.44772 23 9 22.5523 9 22Z" />
                            </svg>
                            <div class="notification__count">
                                <p class="title__count">3</p>
                            </div>
                        </a>
                        <div class="notifications notifications__in notifications__none">
                            <div class="notifications__top">
                                <p class="title__mini">Уведомления</p>
                            </div>
                            <div class="notifications__content">
                                <p class="title__count">
                                    Авторизируйтесь или зарегестрируйтесь и получите
                                    возможность создавать записи, писать комментарии и
                                    оценивать материалы.
                                </p>
                                <div class="notifications__items">
                                    <div class="notifications__item">
                                        <p class="title__count">Ваши статьи</p>
                                        <a class="post__link" href="">
                                            <p class="post__text">
                                                Почему не нужно идти в айти — демотиватор
                                            </p>
                                            <div class="notifications__bottom">
                                                <div class="notifications__left">
                                                    <div class="post__item">
                                                        <svg class="icon" viewBox="0 0 24 24" fill="none"
                                                            fill="#000F13">
                                                            <path
                                                                d="M2.57441 12.7075C3.03543 13.4213 3.71817 14.3706 4.60454 15.3161C6.39552 17.2264 8.89951 19 12 19C15.1005 19 17.6045 17.2264 19.3955 15.3161C20.2818 14.3706 20.9646 13.4213 21.4256 12.7075C21.6051 12.4296 21.75 12.1889 21.8593 12C21.75 11.8111 21.6051 11.5704 21.4256 11.2925C20.9646 10.5787 20.2818 9.6294 19.3955 8.68394C17.6045 6.77356 15.1005 5 12 5C8.89951 5 6.39552 6.77356 4.60454 8.68394C3.71817 9.6294 3.03543 10.5787 2.57441 11.2925C2.39492 11.5704 2.25003 11.8111 2.14074 12C2.25003 12.1889 2.39492 12.4296 2.57441 12.7075ZM23.8941 11.5521C23.8943 11.5525 23.8944 11.5528 23 12C23.8944 12.4472 23.8943 12.4475 23.8941 12.4479L23.8936 12.4488L23.8925 12.4511L23.889 12.458L23.8777 12.4802C23.8681 12.4987 23.8546 12.5247 23.8372 12.5576C23.8025 12.6233 23.752 12.7168 23.686 12.834C23.5542 13.0684 23.3601 13.3985 23.1057 13.7925C22.5979 14.5787 21.8432 15.6294 20.8545 16.6839C18.8955 18.7736 15.8995 21 12 21C8.10049 21 5.10448 18.7736 3.14546 16.6839C2.15683 15.6294 1.40207 14.5787 0.894336 13.7925C0.63985 13.3985 0.445792 13.0684 0.313971 12.834C0.248023 12.7168 0.19754 12.6233 0.162753 12.5576C0.145357 12.5247 0.131875 12.4987 0.122338 12.4802L0.11099 12.458L0.107539 12.4511L0.10637 12.4488L0.105925 12.4479C0.105741 12.4475 0.105573 12.4472 1 12C0.105573 11.5528 0.105741 11.5525 0.105925 11.5521L0.10637 11.5512L0.107539 11.5489L0.11099 11.542L0.122338 11.5198C0.131875 11.5013 0.145357 11.4753 0.162753 11.4424C0.19754 11.3767 0.248023 11.2832 0.313971 11.166C0.445792 10.9316 0.63985 10.6015 0.894336 10.2075C1.40207 9.42131 2.15683 8.3706 3.14546 7.31606C5.10448 5.22644 8.10049 3 12 3C15.8995 3 18.8955 5.22644 20.8545 7.31606C21.8432 8.3706 22.5979 9.42131 23.1057 10.2075C23.3601 10.6015 23.5542 10.9316 23.686 11.166C23.752 11.2832 23.8025 11.3767 23.8372 11.4424C23.8546 11.4753 23.8681 11.5013 23.8777 11.5198L23.889 11.542L23.8925 11.5489L23.8936 11.5512L23.8941 11.5521ZM23 12L23.8944 11.5528C24.0352 11.8343 24.0352 12.1657 23.8944 12.4472L23 12ZM0.105573 11.5528L1 12L0.105573 12.4472C-0.0351909 12.1657 -0.0351909 11.8343 0.105573 11.5528ZM10 12C10 10.8954 10.8954 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12ZM12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8Z">
                                                            </path>
                                                        </svg>
                                                        <p class="post__views_num">+1K</p>
                                                    </div>
                                                    <div class="post__item">
                                                        <svg class="icon" viewBox="0 0 20 20" fill="none"
                                                            fill="#000F13">
                                                            <path
                                                                d="M18 0.227539H2C0.9 0.227539 0 1.10708 0 2.18208V19.773L4 15.8639H18C19.1 15.8639 20 14.9844 20 13.9094V2.18208C20 1.10708 19.1 0.227539 18 0.227539ZM18 13.9094H4L2 15.8639V2.18208H18V13.9094Z">
                                                            </path>
                                                        </svg>
                                                        <p class="post__coments_num">+42</p>
                                                    </div>
                                                </div>
                                                <div class="post__right">
                                                    <div class="post__item">
                                                        <svg class="icon" viewBox="0 0 24 24" fill="none"
                                                            fill="#000F13">
                                                            <path
                                                                d="M15.5 11C16.3284 11 17 10.3284 17 9.5C17 8.67157 16.3284 8 15.5 8C14.6716 8 14 8.67157 14 9.5C14 10.3284 14.6716 11 15.5 11Z">
                                                            </path>
                                                            <path
                                                                d="M8.5 11C9.32843 11 10 10.3284 10 9.5C10 8.67157 9.32843 8 8.5 8C7.67157 8 7 8.67157 7 9.5C7 10.3284 7.67157 11 8.5 11Z">
                                                            </path>
                                                            <path
                                                                d="M11.99 2C6.47 2 2 6.48 2 12C2 17.52 6.47 22 11.99 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 11.99 2ZM12 20C7.58 20 4 16.42 4 12C4 7.58 7.58 4 12 4C16.42 4 20 7.58 20 12C20 16.42 16.42 20 12 20ZM12 16C10.52 16 9.25 15.19 8.55 14H6.88C7.68 16.05 9.67 17.5 12 17.5C14.33 17.5 16.32 16.05 17.12 14H15.45C14.75 15.19 13.48 16 12 16Z">
                                                            </path>
                                                        </svg>
                                                        <p class="post__smile-num">+2</p>
                                                    </div>
                                                    <div class="post__item">
                                                        <svg class="icon" viewBox="0 0 24 24" fill="none"
                                                            fill="#000F13">
                                                            <path
                                                                d="M15.5 11C16.3284 11 17 10.3284 17 9.5C17 8.67157 16.3284 8 15.5 8C14.6716 8 14 8.67157 14 9.5C14 10.3284 14.6716 11 15.5 11Z">
                                                            </path>
                                                            <path
                                                                d="M8.5 11C9.32843 11 10 10.3284 10 9.5C10 8.67157 9.32843 8 8.5 8C7.67157 8 7 8.67157 7 9.5C7 10.3284 7.67157 11 8.5 11Z">
                                                            </path>
                                                            <path
                                                                d="M11.99 2C6.47 2 2 6.48 2 12C2 17.52 6.47 22 11.99 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 11.99 2ZM12 20C7.58 20 4 16.42 4 12C4 7.58 7.58 4 12 4C16.42 4 20 7.58 20 12C20 16.42 16.42 20 12 20ZM12 14C9.67 14 7.68 15.45 6.88 17.5H8.55C9.24 16.31 10.52 15.5 12 15.5C13.48 15.5 14.75 16.31 15.45 17.5H17.12C16.32 15.45 14.33 14 12 14Z">
                                                            </path>
                                                        </svg>
                                                        <p class="post__smile-sad-num">+1</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="notifications__item comment__answer">
                                        <p class="title__count">Ответы на комментарии</p>
                                        <a class="post__link" href="">
                                            <p class="post__text">Почему не нужно переезжать</p>
                                            <div class="notifications__bottom">
                                                <div class="notifications__left">
                                                    <div class="post__item">
                                                        <svg class="icon" viewBox="0 0 20 20" fill="none"
                                                            fill="#000F13">
                                                            <path
                                                                d="M18 0.227539H2C0.9 0.227539 0 1.10708 0 2.18208V19.773L4 15.8639H18C19.1 15.8639 20 14.9844 20 13.9094V2.18208C20 1.10708 19.1 0.227539 18 0.227539ZM18 13.9094H4L2 15.8639V2.18208H18V13.9094Z">
                                                            </path>
                                                        </svg>
                                                        <p class="post__coments_num">+2</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="notifications__null">
                                    <p class="post__text">Уведомлений пока нет</p>
                                    <p class="title__count">
                                        Создавайте записи, оставляйте комментарии и тогда здесь
                                        станет не так пусто.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="login__block active">
                        <a class="header__link login__link" href="#">
                            <svg class="icon login__icon" viewBox="0 0 24 24" fill="none" fill="#7D8688">
                                <path
                                    d="M9 6C9 4.34315 10.3431 3 12 3C13.6569 3 15 4.34315 15 6C15 7.65685 13.6569 9 12 9C10.3431 9 9 7.65685 9 6ZM12 1C9.23858 1 7 3.23858 7 6C7 8.76142 9.23858 11 12 11C14.7614 11 17 8.76142 17 6C17 3.23858 14.7614 1 12 1ZM9 13C6.23858 13 4 15.2386 4 18V21C4 21.5523 4.44772 22 5 22C5.55228 22 6 21.5523 6 21V18C6 16.3431 7.34315 15 9 15H15C16.6569 15 18 16.3431 18 18V21C18 21.5523 18.4477 22 19 22C19.5523 22 20 21.5523 20 21V18C20 15.2386 17.7614 13 15 13H9Z" />
                            </svg>
                            <div class="login__active">
                                @if (file_exists('storage/' . $user->user_avatar))
                                    <picture>
                                        <source srcset="{{ asset('storage/' . Auth::user()->user_avatar) }}"
                                            type="image/webp" />
                                        <img src=" {{ asset('storage/' . Auth::user()->user_avatar) }}" alt="" />
                                    </picture>
                                @else
                                    <picture>
                                        <source srcset="{{ asset('/images/svg/humster.webp') }}" type="image/webp" />
                                        <img src="{{ asset('/images/svg/humster.png') }}" alt="" />
                                    </picture>
                                @endif
                                <svg class="icon" viewBox="0 0 14 14" fill="none" stroke="#1B1B1B">
                                    <path
                                        d="M11.62 5.2207L7.81667 9.02404C7.36751 9.4732 6.63251 9.4732 6.18334 9.02404L2.38 5.2207"
                                        stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                        </a>
                        <div class="profile__menu">
                            <p class="user__name">Мой профиль</p>
                            <div class="profile__data">
                                @if (file_exists('storage/' . $user->user_avatar))
                                    <picture>
                                        <source srcset="{{ asset('storage/' . Auth::user()->user_avatar) }}"
                                            type="image/webp" />
                                        <img src=" {{ asset('storage/' . Auth::user()->user_avatar) }}" alt="" />
                                    </picture>
                                @else
                                    <picture>
                                        <source srcset="{{ asset('/images/svg/humster.webp') }}" type="image/webp" />
                                        <img src="{{ asset('/images/svg/humster.png') }}" alt="" />
                                    </picture>
                                @endif
                                <a class="profile__name"
                                    href="{{ route('personal.user.profile_settings', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
                            </div>
                            <div class="profile__items">
                                <ul class="profile__item create">
                                    <!-- create items -->
                                    <a class="comment__link">
                                        <svg class="icon create-icon" viewBox="0 0 18 18" fill="none"
                                            stroke="#000F13">
                                            <path
                                                d="M9 16.5C13.125 16.5 16.5 13.125 16.5 9C16.5 4.875 13.125 1.5 9 1.5C4.875 1.5 1.5 4.875 1.5 9C1.5 13.125 4.875 16.5 9 16.5Z"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M6 9H12" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M9 12V6" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        Создать<svg class="icon chev" viewBox="0 0 14 14" fill="none"
                                            stroke="#1B1B1B">
                                            <path
                                                d="M11.62 5.2207L7.81667 9.02404C7.36751 9.4732 6.63251 9.4732 6.18334 9.02404L2.38 5.2207"
                                                stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                    <li class="profile__subitem">

                                        <a class="comment__link" href="{{ route('personal.post.index') }}"><svg
                                                class="icon fill" viewBox="0 0 22 22" fill="none" fill="#7D8688">
                                                <path
                                                    d="M11 2C10.5654 2 10.138 2.0308 9.71986 2.09035C9.58538 2.5785 9.4075 3.27861 9.22926 4.14011C9.05882 4.96392 8.8888 5.9317 8.75585 7H13.2441C13.1112 5.9317 12.9412 4.96392 12.7707 4.14011C12.5925 3.27861 12.4146 2.5785 12.2801 2.09035C11.862 2.0308 11.4346 2 11 2ZM7.27074 3.73489C7.34768 3.36303 7.42468 3.01904 7.4987 2.70646C5.51262 3.54596 3.89065 5.07805 2.93552 7H6.74127C6.8859 5.7707 7.07856 4.66374 7.27074 3.73489ZM6.56198 9H2.22302C2.07706 9.64322 2 10.3126 2 11C2 11.6874 2.07706 12.3568 2.22302 13H6.56198C6.52248 12.353 6.5 11.6843 6.5 11C6.5 10.3157 6.52248 9.64699 6.56198 9ZM6.74127 15H2.93552C3.89065 16.922 5.51262 18.454 7.4987 19.2935C7.42468 18.981 7.34768 18.637 7.27074 18.2651C7.07856 17.3363 6.8859 16.2293 6.74127 15ZM8.75585 15C8.8888 16.0683 9.05882 17.0361 9.22926 17.8599C9.4075 18.7214 9.58538 19.4215 9.71986 19.9097C10.138 19.9692 10.5654 20 11 20C11.4346 20 11.862 19.9692 12.2801 19.9097C12.4146 19.4215 12.5925 18.7214 12.7707 17.8599C12.9412 17.0361 13.1112 16.0683 13.2441 15H8.75585ZM13.4341 13C13.476 12.3536 13.5 11.6845 13.5 11C13.5 10.3155 13.476 9.64638 13.4341 9H8.56593C8.52402 9.64638 8.5 10.3155 8.5 11C8.5 11.6845 8.52402 12.3536 8.56593 13H13.4341ZM15.2587 15C15.1141 16.2293 14.9214 17.3363 14.7293 18.2651C14.6523 18.637 14.5753 18.981 14.5013 19.2935C16.4874 18.454 18.1094 16.922 19.0645 15H15.2587ZM19.777 13C19.9229 12.3568 20 11.6874 20 11C20 10.3126 19.9229 9.64322 19.777 9H15.438C15.4775 9.64699 15.5 10.3157 15.5 11C15.5 11.6843 15.4775 12.353 15.438 13H19.777ZM14.5013 2.70646C14.5753 3.01904 14.6523 3.36303 14.7293 3.73489C14.9214 4.66374 15.1141 5.7707 15.2587 7H19.0645C18.1094 5.07805 16.4874 3.54596 14.5013 2.70646ZM0 11C0 4.92487 4.92487 0 11 0C17.0751 0 22 4.92487 22 11C22 17.0751 17.0751 22 11 22C4.92487 22 0 17.0751 0 11Z" />
                                            </svg>
                                            Статья</a>
                                    </li>
                                    <li class="profile__subitem">
                                        <a class="comment__link" href="{{ route('personal.advertisement.index') }}"><svg
                                                class="icon fill" viewBox="0 0 24 24" fill="none" fill="#7D8688">
                                                <g clip-path="url(#clip0_23_178)">
                                                    <path
                                                        d="M2.07153 1.62861C2.22339 1.24895 2.5911 1 3 1H21C21.4089 1 21.7766 1.24895 21.9285 1.62861L23.9285 6.62861C24.0187 6.85422 24.0227 7.10185 23.9453 7.32617C23.9772 7.54619 23.9936 7.77118 23.9936 8.00001C23.9936 9.58274 23.2054 10.9814 22 11.8247V21.9999C22 22.5522 21.5523 22.9999 21 22.9999H3C2.44772 22.9999 2 22.5522 2 21.9999V11.8247C0.794632 10.9814 0.00635242 9.58274 0.00635242 8.00001C0.00635242 7.77117 0.0228323 7.54617 0.05467 7.32614C-0.0227044 7.10183 -0.0187129 6.85421 0.071528 6.62861L2.07153 1.62861ZM2.00635 8.00001C2.00635 8.00002 2.00635 8.00001 2.00635 8.00001C2.00635 9.4716 3.19931 10.6646 4.6709 10.6646C6.14249 10.6646 7.33544 9.4716 7.33544 8.00001C7.33544 8.00001 7.33544 8.00002 7.33544 8.00001H2.00635ZM9.33545 8.00001C9.33545 8.00002 9.33545 8.00001 9.33545 8.00001C9.33545 9.4716 10.5284 10.6646 12 10.6646C13.4716 10.6646 14.6645 9.4716 14.6645 8.00001C14.6645 8.00001 14.6645 8.00002 14.6645 8.00001H9.33545ZM16.6646 8.00001C16.6646 9.4716 17.8575 10.6646 19.3291 10.6646C20.8007 10.6646 21.9936 9.4716 21.9936 8.00001H16.6646ZM4 12.6167V20.9999H20V12.6167C19.7809 12.6482 19.5569 12.6646 19.3291 12.6646C17.8427 12.6646 16.5187 11.9693 15.6646 10.8863C14.8104 11.9693 13.4864 12.6646 12 12.6646C10.5136 12.6646 9.18963 11.9693 8.33545 10.8863C7.48127 11.9693 6.15727 12.6646 4.6709 12.6646C4.44308 12.6646 4.21908 12.6482 4 12.6167ZM3.67704 3L2.47704 6H21.523L20.323 3H3.67704Z" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_23_178">
                                                        <rect width="24" height="24" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            Объявление</a>
                                    </li>
                                    <li class="profile__subitem">

                                        <a class="comment__link" href="{{ route('personal.work.index') }}"><svg
                                                class="icon fill" viewBox="0 0 24 24" fill="none" fill="#7D8688">
                                                <path
                                                    d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM17.6569 6.34314C17.9397 6.626 18.0268 7.05022 17.8782 7.42164L15.0498 14.4927C14.9482 14.7468 14.7468 14.9481 14.4927 15.0498L7.42165 17.8782C7.05023 18.0268 6.62601 17.9397 6.34315 17.6568C6.06029 17.374 5.97321 16.9498 6.12178 16.5783L8.95021 9.50728C9.05185 9.25318 9.25319 9.05184 9.50729 8.9502L16.5784 6.12177C16.9498 5.9732 17.374 6.06028 17.6569 6.34314ZM10.648 10.648L8.84531 15.1547L13.352 13.352L15.1547 8.8453L10.648 10.648ZM11.2929 12.7071C11.6834 13.0976 12.3166 13.0976 12.7071 12.7071C13.0976 12.3166 13.0976 11.6834 12.7071 11.2929C12.3166 10.9024 11.6834 10.9024 11.2929 11.2929C10.9024 11.6834 10.9024 12.3166 11.2929 12.7071Z" />
                                            </svg>Вакансию</a>
                                    </li>
                                    <li class="profile__subitem">
                                        <a class="comment__link" href="#"><svg class="icon fill"
                                                viewBox="0 0 24 24" fill="none" fill="#7D8688">
                                                <path
                                                    d="M14.3284 2.4941C15.0906 2.16819 15.9088 2 16.7359 2C17.563 2 18.3811 2.16819 19.1434 2.4941C19.9055 2.81992 20.5958 3.29656 21.1758 3.89523C21.756 4.49371 22.2147 5.20261 22.5272 5.98065C22.8396 6.75864 23 7.59148 23 8.43187C23 9.27225 22.8396 10.1051 22.5272 10.8831C22.2148 11.6611 21.7561 12.3699 21.1759 12.9683C21.1759 12.9684 21.176 12.9683 21.1759 12.9683L12.7179 21.6959C12.5295 21.8903 12.2704 22 11.9997 22C11.7291 22 11.47 21.8903 11.2816 21.6959L2.82357 12.9683C1.65254 11.76 1 10.1276 1 8.43187C1 6.73612 1.65254 5.10375 2.82357 3.8954C3.99563 2.68599 5.59209 2.00053 7.26361 2.00053C8.93512 2.00053 10.5316 2.68599 11.7036 3.8954L11.9997 4.20093L12.2957 3.89557C12.2957 3.89551 12.2956 3.89562 12.2957 3.89557C12.8757 3.29682 13.5662 2.81995 14.3284 2.4941ZM19.7395 5.28709C19.3422 4.87692 18.8722 4.55328 18.3571 4.33307C17.8422 4.11289 17.2914 4 16.7359 4C16.1804 4 15.6296 4.11289 15.1146 4.33307C14.5996 4.55328 14.1295 4.87692 13.7322 5.28709L12.7179 6.33378C12.5295 6.52814 12.2704 6.63785 11.9997 6.63785C11.7291 6.63785 11.47 6.52814 11.2816 6.33378L10.2674 5.28726C9.46526 4.45953 8.38409 4.00053 7.26361 4.00053C6.14313 4.00053 5.06196 4.45953 4.25978 5.28726C3.45658 6.11606 3 7.24666 3 8.43187C3 9.61708 3.45658 10.7477 4.25978 11.5765L11.9997 19.5631L19.7397 11.5765C20.1373 11.1664 20.4544 10.6777 20.6712 10.1378C20.888 9.59786 21 9.01809 21 8.43187C21 7.84565 20.888 7.26587 20.6712 6.72592C20.4544 6.18601 20.1371 5.69713 19.7395 5.28709Z" />
                                            </svg>Знакомства</a>
                                    </li>
                                </ul>
                                <!-- create items end -->
                                <!-- profile item -->
                                <ul class="profile__item">
                                    <a class="comment__link" href="#"><svg class="icon" viewBox="0 0 20 20"
                                            fill="none" stroke="#000F13">
                                            <path
                                                d="M18.175 3.28323C16.8916 6.48323 13.675 10.8332 10.9833 12.9916L9.34164 14.3082C9.13331 14.4582 8.92498 14.5916 8.69164 14.6832C8.69164 14.5332 8.68331 14.3666 8.65831 14.2082C8.56664 13.5082 8.24998 12.8582 7.69164 12.2999C7.12498 11.7332 6.43331 11.3999 5.72498 11.3082C5.55831 11.2999 5.39164 11.2832 5.22498 11.2999C5.31664 11.0416 5.45831 10.7999 5.63331 10.5999L6.93331 8.95823C9.08331 6.26656 13.45 3.03323 16.6416 1.75823C17.1333 1.5749 17.6083 1.70823 17.9083 2.01656C18.225 2.3249 18.375 2.7999 18.175 3.28323Z"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M8.69161 14.6832C8.69161 15.5998 8.34161 16.4748 7.68328 17.1415C7.17494 17.6498 6.48328 17.9998 5.65828 18.1082L3.60828 18.3332C2.49161 18.4582 1.53328 17.5082 1.66661 16.3748L1.89161 14.3248C2.09161 12.4998 3.61661 11.3332 5.23328 11.2998C5.39994 11.2915 5.57494 11.2998 5.73328 11.3082C6.44161 11.3998 7.13328 11.7248 7.69994 12.2998C8.25828 12.8582 8.57494 13.5082 8.66661 14.2082C8.67494 14.3665 8.69161 14.5248 8.69161 14.6832Z"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M11.8667 12.0584C11.8667 9.88337 10.1 8.1167 7.92505 8.1167"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>Черновики</a>
                                </ul>
                                <!-- profile item -->
                                <ul class="profile__item">
                                    <a class="comment__link" href="#"><svg class="icon fill" viewBox="0 0 24 24"
                                            fill="none" fill="#000F13">
                                            <path
                                                d="M4 4C4 2.34315 5.34315 1 7 1H17C18.6569 1 20 2.34315 20 4V22C20 22.3905 19.7727 22.7453 19.4179 22.9085C19.0631 23.0717 18.6457 23.0134 18.3492 22.7593L12 17.3171L5.65079 22.7593C5.35428 23.0134 4.93694 23.0717 4.58214 22.9085C4.22734 22.7453 4 22.3905 4 22V4ZM7 3C6.44772 3 6 3.44772 6 4V19.8258L11.3492 15.2407C11.7237 14.9198 12.2763 14.9198 12.6508 15.2407L18 19.8258V4C18 3.44772 17.5523 3 17 3H7Z" />
                                        </svg>Избранное</a>
                                </ul>
                                <!-- profile item -->
                                <ul class="profile__item">
                                    <a class="comment__link"
                                        href="{{ route('personal.user.profile_settings', Auth::user()->id) }}"><svg
                                            class="icon" viewBox="0 0 24 24" fill="none" stroke="#000F13">
                                            <path
                                                d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
                                                stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M2 12.8799V11.1199C2 10.0799 2.85 9.21994 3.9 9.21994C5.71 9.21994 6.45 7.93994 5.54 6.36994C5.02 5.46994 5.33 4.29994 6.24 3.77994L7.97 2.78994C8.76 2.31994 9.78 2.59994 10.25 3.38994L10.36 3.57994C11.26 5.14994 12.74 5.14994 13.65 3.57994L13.76 3.38994C14.23 2.59994 15.25 2.31994 16.04 2.78994L17.77 3.77994C18.68 4.29994 18.99 5.46994 18.47 6.36994C17.56 7.93994 18.3 9.21994 20.11 9.21994C21.15 9.21994 22.01 10.0699 22.01 11.1199V12.8799C22.01 13.9199 21.16 14.7799 20.11 14.7799C18.3 14.7799 17.56 16.0599 18.47 17.6299C18.99 18.5399 18.68 19.6999 17.77 20.2199L16.04 21.2099C15.25 21.6799 14.23 21.3999 13.76 20.6099L13.65 20.4199C12.75 18.8499 11.27 18.8499 10.36 20.4199L10.25 20.6099C9.78 21.3999 8.76 21.6799 7.97 21.2099L6.24 20.2199C5.33 19.6999 5.02 18.5299 5.54 17.6299C6.45 16.0599 5.71 14.7799 3.9 14.7799C2.85 14.7799 2 13.9199 2 12.8799Z"
                                                stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
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
                                                <path d="M15 12H3.62" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M5.85 8.6499L2.5 11.9999L5.85 15.3499" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>Выйти
                                        </label>
                                    </form>




                                </ul>
                            </div>
                        </div>
                    </div>
                @endguest

            </nav>
        </div>
    </div>
</header>
