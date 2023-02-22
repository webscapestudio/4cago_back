  @extends('personal.main.index')
  @section('content')
    <div class="profile__card">
      <div class="profile__card-top">
        <div class="profile__card-left">
          <div class="user__img">
            @if ($user->user_avatar ?? null)
              <picture>
                <source srcset="{{ asset('storage/' . $user->user_avatar) }}" type="image/webp" />
                <img src=" {{ asset('storage/' . $user->user_avatar) }}" alt="" />
              </picture>
            @else
              <picture>
                <source srcset="{{ asset('/images/svg/humster.webp') }}" type="image/webp" />
                <img src="{{ asset('/images/svg/humster.png') }}" alt="" />
              </picture>
            @endif
          </div>
          <div class="user__info">
            <p class="profile__title">{{ $user->name }}</p>
            <p class="post__date">{{ $user->created_at->diffForHumans() }}</p>
          </div>
        </div>
        <div class="profile__card-right">
          <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#000F13">
            <path
              d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
              stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round">
            </path>
            <path
              d="M2 12.8799V11.1199C2 10.0799 2.85 9.21994 3.9 9.21994C5.71 9.21994 6.45 7.93994 5.54 6.36994C5.02 5.46994 5.33 4.29994 6.24 3.77994L7.97 2.78994C8.76 2.31994 9.78 2.59994 10.25 3.38994L10.36 3.57994C11.26 5.14994 12.74 5.14994 13.65 3.57994L13.76 3.38994C14.23 2.59994 15.25 2.31994 16.04 2.78994L17.77 3.77994C18.68 4.29994 18.99 5.46994 18.47 6.36994C17.56 7.93994 18.3 9.21994 20.11 9.21994C21.15 9.21994 22.01 10.0699 22.01 11.1199V12.8799C22.01 13.9199 21.16 14.7799 20.11 14.7799C18.3 14.7799 17.56 16.0599 18.47 17.6299C18.99 18.5399 18.68 19.6999 17.77 20.2199L16.04 21.2099C15.25 21.6799 14.23 21.3999 13.76 20.6099L13.65 20.4199C12.75 18.8499 11.27 18.8499 10.36 20.4199L10.25 20.6099C9.78 21.3999 8.76 21.6799 7.97 21.2099L6.24 20.2199C5.33 19.6999 5.02 18.5299 5.54 17.6299C6.45 16.0599 5.71 14.7799 3.9 14.7799C2.85 14.7799 2 13.9199 2 12.8799Z"
              stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round">
            </path>
          </svg>
        </div>
      </div>
      @include('personal.includes.sidebar')
    </div>
    <p class="post__title">Ваши избранные посты.</p>
    @if (isset($news_all) and !$news_all->isEmpty())
      @foreach ($news_all as $news)
        <div class="post__card ad__card">

          <div class="post__header">
            <div class="post__header-left">

              <div class="user__avatar">
                <picture>
                  <source srcset="{{ asset('./images/avatars/user-ava.webp') }}" type="image/webp"><img
                    src="{{ asset('./images/avatars/user-ava.jpg') }}" alt="user" />
                </picture>
              </div>
              <p class="user__name">Admin</p>
              <div class="post__date">{{ $news->created_at->diffForHumans() }}</div>
            </div>
            <div class="post__header-right">
              <div class="post__drop">
                <div class="meatballs">
                  <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#000F13">
                    <path d="M5 10C3.9 10 3 10.9 3 12C3 13.1 3.9 14 5 14C6.1 14 7 13.1 7 12C7 10.9 6.1 10 5 10Z"
                      stroke-width="1.5" />
                    <path
                      d="M19 10C17.9 10 17 10.9 17 12C17 13.1 17.9 14 19 14C20.1 14 21 13.1 21 12C21 10.9 20.1 10 19 10Z"
                      stroke-width="1.5" />
                    <path
                      d="M12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                      stroke-width="1.5" />
                  </svg>
                </div>

                <div class="dropdown">
                  <form action="{{ route('news.favourite.store', $news->id) }}" method="POST">
                    @csrf
                    <button type="submit">Удалить</button>
                  </form>
                </div>

              </div>

            </div>
          </div>

          <div class="post__main">
            <a class="post__title" href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a>
            <div class="post__content js-read-smore" data-read-smore-words="40">
              {{ $news->description }}

            </div>

            @if ($news->news_image)
              <div class="post__img">
                <picture>
                  <source srcset="{{ asset('storage/' . $news->news_image) }}" type="image/webp"><img
                    src="{{ asset('storage/' . $news->news_image) }}" alt="" />
                </picture>
              </div>
            @endif
          </div>

          <div class="post__bottom">
            <div class="post__tags">
              <div class="tags">

                @foreach ($news->tags as $tag)
                  <div class="tag">{{ $tag->title }}</div>
                @endforeach
              </div>
            </div>
            <div class="post__actions">
              <div class="post__actions-left">
                <a class="post__views post__actions-left-item" href="#">
                  <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
                    <path
                      d="M2.57441 12.7075C3.03543 13.4213 3.71817 14.3706 4.60454 15.3161C6.39552 17.2264 8.89951 19 12 19C15.1005 19 17.6045 17.2264 19.3955 15.3161C20.2818 14.3706 20.9646 13.4213 21.4256 12.7075C21.6051 12.4296 21.75 12.1889 21.8593 12C21.75 11.8111 21.6051 11.5704 21.4256 11.2925C20.9646 10.5787 20.2818 9.6294 19.3955 8.68394C17.6045 6.77356 15.1005 5 12 5C8.89951 5 6.39552 6.77356 4.60454 8.68394C3.71817 9.6294 3.03543 10.5787 2.57441 11.2925C2.39492 11.5704 2.25003 11.8111 2.14074 12C2.25003 12.1889 2.39492 12.4296 2.57441 12.7075ZM23.8941 11.5521C23.8943 11.5525 23.8944 11.5528 23 12C23.8944 12.4472 23.8943 12.4475 23.8941 12.4479L23.8936 12.4488L23.8925 12.4511L23.889 12.458L23.8777 12.4802C23.8681 12.4987 23.8546 12.5247 23.8372 12.5576C23.8025 12.6233 23.752 12.7168 23.686 12.834C23.5542 13.0684 23.3601 13.3985 23.1057 13.7925C22.5979 14.5787 21.8432 15.6294 20.8545 16.6839C18.8955 18.7736 15.8995 21 12 21C8.10049 21 5.10448 18.7736 3.14546 16.6839C2.15683 15.6294 1.40207 14.5787 0.894336 13.7925C0.63985 13.3985 0.445792 13.0684 0.313971 12.834C0.248023 12.7168 0.19754 12.6233 0.162753 12.5576C0.145357 12.5247 0.131875 12.4987 0.122338 12.4802L0.11099 12.458L0.107539 12.4511L0.10637 12.4488L0.105925 12.4479C0.105741 12.4475 0.105573 12.4472 1 12C0.105573 11.5528 0.105741 11.5525 0.105925 11.5521L0.10637 11.5512L0.107539 11.5489L0.11099 11.542L0.122338 11.5198C0.131875 11.5013 0.145357 11.4753 0.162753 11.4424C0.19754 11.3767 0.248023 11.2832 0.313971 11.166C0.445792 10.9316 0.63985 10.6015 0.894336 10.2075C1.40207 9.42131 2.15683 8.3706 3.14546 7.31606C5.10448 5.22644 8.10049 3 12 3C15.8995 3 18.8955 5.22644 20.8545 7.31606C21.8432 8.3706 22.5979 9.42131 23.1057 10.2075C23.3601 10.6015 23.5542 10.9316 23.686 11.166C23.752 11.2832 23.8025 11.3767 23.8372 11.4424C23.8546 11.4753 23.8681 11.5013 23.8777 11.5198L23.889 11.542L23.8925 11.5489L23.8936 11.5512L23.8941 11.5521ZM23 12L23.8944 11.5528C24.0352 11.8343 24.0352 12.1657 23.8944 12.4472L23 12ZM0.105573 11.5528L1 12L0.105573 12.4472C-0.0351909 12.1657 -0.0351909 11.8343 0.105573 11.5528ZM10 12C10 10.8954 10.8954 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12ZM12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8Z">
                    </path>
                  </svg>
                  <p class="post__views_num">{{ $news->views }}</p>
                </a>
                <a class="post__comments post__actions-left-item" href="#">
                  <svg class="icon" viewBox="0 0 20 20" fill="none" fill="#000F13">
                    <path
                      d="M18 0.227539H2C0.9 0.227539 0 1.10708 0 2.18208V19.773L4 15.8639H18C19.1 15.8639 20 14.9844 20 13.9094V2.18208C20 1.10708 19.1 0.227539 18 0.227539ZM18 13.9094H4L2 15.8639V2.18208H18V13.9094Z">
                    </path>
                  </svg>
                  <p class="post__coments_num">{{ $news->comments->count() }}</p>
                </a>


                <div class="post__pins post__actions-left-item">
                  <svg class="icon" viewBox="0 0 24 24">
                    <path
                      d="M4 4C4 2.34315 5.34315 1 7 1H17C18.6569 1 20 2.34315 20 4V22C20 22.3905 19.7727 22.7453 19.4179 22.9085C19.0631 23.0717 18.6457 23.0134 18.3492 22.7593L12 17.3171L5.65079 22.7593C5.35428 23.0134 4.93694 23.0717 4.58214 22.9085C4.22734 22.7453 4 22.3905 4 22V4ZM7 3C6.44772 3 6 3.44772 6 4V19.8258L11.3492 15.2407C11.7237 14.9198 12.2763 14.9198 12.6508 15.2407L18 19.8258V4C18 3.44772 17.5523 3 17 3H7Z">
                    </path>
                  </svg>
                  <p class="post__pins_num"> {{ $news->favourite->count() }}</p>
                </div>
              </div>

              <div class="post__actions-right">
                <div class="post__smile post__actions-right-item">
                  <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
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
                  <p class="post__smile-num">{{ $news->like->count() }}</p>
                </div>

                <div class="post__smile-sad post__actions-right-item">
                  <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
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
                  <p class="post__smile-sad-num">{{ $news->dislike->count() }}</p>
                </div>
              </div>
            </div>
          </div>


        </div>
      @endforeach
    @endif
    @if (isset($advertisements) and !$advertisements->isEmpty())
      @foreach ($advertisements as $advertisement)
        <div class="post__card ad__card">

          <div class="post__header">
            <div class="post__header-left">
              <div class="user__avatar">
                @if ($advertisement->author->user_avatar ?? null)
                  <picture>
                    <source srcset="{{ asset('storage/' . $advertisement->author->user_avatar) }}" type="image/webp" />
                    <img src=" {{ asset('storage/' . $advertisement->author->user_avatar) }}" alt="" />
                  </picture>
                @else
                  <picture>
                    <source srcset="{{ asset('/images/svg/humster.webp') }}" type="image/webp" />
                    <img src="{{ asset('/images/svg/humster.png') }}" alt="" />
                  </picture>
                @endif
              </div>
              <p class="user__name">{{ $advertisement->author->name ?? 'Пользователь не найден' }}</p>
              <div class="post__date">{{ $advertisement->created_at->diffForHumans() }}</div>
            </div>
            <div class="post__header-right">
              <div class="post__drop">
                <div class="meatballs">
                  <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#000F13">
                    <path d="M5 10C3.9 10 3 10.9 3 12C3 13.1 3.9 14 5 14C6.1 14 7 13.1 7 12C7 10.9 6.1 10 5 10Z"
                      stroke-width="1.5" />
                    <path
                      d="M19 10C17.9 10 17 10.9 17 12C17 13.1 17.9 14 19 14C20.1 14 21 13.1 21 12C21 10.9 20.1 10 19 10Z"
                      stroke-width="1.5" />
                    <path
                      d="M12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                      stroke-width="1.5" />
                  </svg>
                </div>

                <div class="dropdown">
                  <form
                    action="{{ route('advertisement.favourite.store', [$advertisement->category_advertisement_id, $advertisement->id]) }}"
                    method="POST">
                    @csrf
                    <button type="submit">Удалить</button>
                  </form>
                </div>

              </div>

            </div>
          </div>

          <div class="post__main">
            <a class="post__title"
              href="{{ route('advertisement.show', [$advertisement->category_advertisement_id, $advertisement->id]) }}">{{ $advertisement->title }}</a>
            <div class="post__content js-read-smore" data-read-smore-words="40">
              {{ $advertisement->description }}

            </div>

            @if ($advertisement->advertisement_image)
              <div class="post__img">
                <picture>
                  <source srcset="{{ asset('storage/' . $advertisement->advertisement_image) }}" type="image/webp"><img
                    src="{{ asset('storage/' . $advertisement->advertisement_image) }}" alt="" />
                </picture>
              </div>
            @endif
          </div>

          <div class="post__bottom">
            <div class="post__tags">
              <div class="tags">

                @foreach ($advertisement->tags as $tag)
                  <div class="tag">{{ $tag->title }}</div>
                @endforeach
              </div>
            </div>
            <div class="post__actions">
              <div class="post__actions-left">
                <a class="post__views post__actions-left-item" href="#">
                  <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
                    <path
                      d="M2.57441 12.7075C3.03543 13.4213 3.71817 14.3706 4.60454 15.3161C6.39552 17.2264 8.89951 19 12 19C15.1005 19 17.6045 17.2264 19.3955 15.3161C20.2818 14.3706 20.9646 13.4213 21.4256 12.7075C21.6051 12.4296 21.75 12.1889 21.8593 12C21.75 11.8111 21.6051 11.5704 21.4256 11.2925C20.9646 10.5787 20.2818 9.6294 19.3955 8.68394C17.6045 6.77356 15.1005 5 12 5C8.89951 5 6.39552 6.77356 4.60454 8.68394C3.71817 9.6294 3.03543 10.5787 2.57441 11.2925C2.39492 11.5704 2.25003 11.8111 2.14074 12C2.25003 12.1889 2.39492 12.4296 2.57441 12.7075ZM23.8941 11.5521C23.8943 11.5525 23.8944 11.5528 23 12C23.8944 12.4472 23.8943 12.4475 23.8941 12.4479L23.8936 12.4488L23.8925 12.4511L23.889 12.458L23.8777 12.4802C23.8681 12.4987 23.8546 12.5247 23.8372 12.5576C23.8025 12.6233 23.752 12.7168 23.686 12.834C23.5542 13.0684 23.3601 13.3985 23.1057 13.7925C22.5979 14.5787 21.8432 15.6294 20.8545 16.6839C18.8955 18.7736 15.8995 21 12 21C8.10049 21 5.10448 18.7736 3.14546 16.6839C2.15683 15.6294 1.40207 14.5787 0.894336 13.7925C0.63985 13.3985 0.445792 13.0684 0.313971 12.834C0.248023 12.7168 0.19754 12.6233 0.162753 12.5576C0.145357 12.5247 0.131875 12.4987 0.122338 12.4802L0.11099 12.458L0.107539 12.4511L0.10637 12.4488L0.105925 12.4479C0.105741 12.4475 0.105573 12.4472 1 12C0.105573 11.5528 0.105741 11.5525 0.105925 11.5521L0.10637 11.5512L0.107539 11.5489L0.11099 11.542L0.122338 11.5198C0.131875 11.5013 0.145357 11.4753 0.162753 11.4424C0.19754 11.3767 0.248023 11.2832 0.313971 11.166C0.445792 10.9316 0.63985 10.6015 0.894336 10.2075C1.40207 9.42131 2.15683 8.3706 3.14546 7.31606C5.10448 5.22644 8.10049 3 12 3C15.8995 3 18.8955 5.22644 20.8545 7.31606C21.8432 8.3706 22.5979 9.42131 23.1057 10.2075C23.3601 10.6015 23.5542 10.9316 23.686 11.166C23.752 11.2832 23.8025 11.3767 23.8372 11.4424C23.8546 11.4753 23.8681 11.5013 23.8777 11.5198L23.889 11.542L23.8925 11.5489L23.8936 11.5512L23.8941 11.5521ZM23 12L23.8944 11.5528C24.0352 11.8343 24.0352 12.1657 23.8944 12.4472L23 12ZM0.105573 11.5528L1 12L0.105573 12.4472C-0.0351909 12.1657 -0.0351909 11.8343 0.105573 11.5528ZM10 12C10 10.8954 10.8954 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12ZM12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8Z">
                    </path>
                  </svg>
                  <p class="post__views_num">{{ $advertisement->views }}</p>
                </a>
                <a class="post__comments post__actions-left-item"
                  href="{{ route('advertisement.show', [$advertisement->category_advertisement_id, $advertisement->id]) }}">
                  <svg class="icon" viewBox="0 0 20 20" fill="none" fill="#000F13">
                    <path
                      d="M18 0.227539H2C0.9 0.227539 0 1.10708 0 2.18208V19.773L4 15.8639H18C19.1 15.8639 20 14.9844 20 13.9094V2.18208C20 1.10708 19.1 0.227539 18 0.227539ZM18 13.9094H4L2 15.8639V2.18208H18V13.9094Z">
                    </path>
                  </svg>
                  <p class="post__coments_num">{{ $advertisement->comments->count() }}</p>
                </a>

                <div class="post__pins post__actions-left-item">
                  <svg class="icon" viewBox="0 0 24 24">
                    <path
                      d="M4 4C4 2.34315 5.34315 1 7 1H17C18.6569 1 20 2.34315 20 4V22C20 22.3905 19.7727 22.7453 19.4179 22.9085C19.0631 23.0717 18.6457 23.0134 18.3492 22.7593L12 17.3171L5.65079 22.7593C5.35428 23.0134 4.93694 23.0717 4.58214 22.9085C4.22734 22.7453 4 22.3905 4 22V4ZM7 3C6.44772 3 6 3.44772 6 4V19.8258L11.3492 15.2407C11.7237 14.9198 12.2763 14.9198 12.6508 15.2407L18 19.8258V4C18 3.44772 17.5523 3 17 3H7Z">
                    </path>
                  </svg>
                  <p class="post__pins_num"> {{ $advertisement->favourite->count() }}</p>
                </div>
              </div>

              <div class="post__actions-right">
                <div class="post__smile post__actions-right-item">
                  <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
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
                  <p class="post__smile-num">{{ $advertisement->like->count() }}</p>
                </div>

                <div class="post__smile-sad post__actions-right-item">
                  <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
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
                  <p class="post__smile-sad-num">{{ $advertisement->dislike->count() }}</p>
                </div>
              </div>
            </div>
          </div>


        </div>
      @endforeach
    @endif
    @if (isset($posts) and !$posts->isEmpty())
      @foreach ($posts as $post)
        <div class="post__card ad__card">

          <div class="post__header">
            <div class="post__header-left">
              <div class="user__avatar">
                @if ($post->author->user_avatar ?? null)
                  <picture>
                    <source srcset="{{ asset('storage/' . $post->author->user_avatar) }}" type="image/webp" />
                    <img src=" {{ asset('storage/' . $post->author->user_avatar) }}" alt="" />
                  </picture>
                @else
                  <picture>
                    <source srcset="{{ asset('/images/svg/humster.webp') }}" type="image/webp" />
                    <img src="{{ asset('/images/svg/humster.png') }}" alt="" />
                  </picture>
                @endif
              </div>
              <p class="user__name">{{ $post->author->name ?? 'Пользователь не найден' }}</p>
              <div class="post__date">{{ $post->created_at->diffForHumans() }}</div>
            </div>
            <div class="post__header-right">
              <div class="post__drop">
                <div class="meatballs">
                  <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#000F13">
                    <path d="M5 10C3.9 10 3 10.9 3 12C3 13.1 3.9 14 5 14C6.1 14 7 13.1 7 12C7 10.9 6.1 10 5 10Z"
                      stroke-width="1.5" />
                    <path
                      d="M19 10C17.9 10 17 10.9 17 12C17 13.1 17.9 14 19 14C20.1 14 21 13.1 21 12C21 10.9 20.1 10 19 10Z"
                      stroke-width="1.5" />
                    <path
                      d="M12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                      stroke-width="1.5" />
                  </svg>
                </div>

                <div class="dropdown">
                  <form action="{{ route('post.favourite.store', [$post->category_id, $post->id]) }}" method="POST">
                    @csrf
                    <button type="submit">Удалить</button>
                  </form>
                </div>

              </div>

            </div>
          </div>

          <div class="post__main">
            <a class="post__title"
              href="{{ route('post.show', [$post->category_id, $post->id]) }}">{{ $post->title }}</a>
            <div class="post__content js-read-smore" data-read-smore-words="40">
              {{ $post->description }}

            </div>

            @if ($post->post_image)
              <div class="post__img">
                <picture>
                  <source srcset="{{ asset('storage/' . $post->post_image) }}" type="image/webp">
                  <img src="{{ asset('storage/' . $post->post_image) }}" alt="" />
                </picture>
              </div>
            @endif
          </div>

          <div class="post__bottom">
            <div class="post__tags">
              <div class="tags">

                @foreach ($post->tags as $tag)
                  <div class="tag">{{ $tag->title }}</div>
                @endforeach
              </div>
            </div>
            <div class="post__actions">
              <div class="post__actions-left">
                <a class="post__views post__actions-left-item" href="#">
                  <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
                    <path
                      d="M2.57441 12.7075C3.03543 13.4213 3.71817 14.3706 4.60454 15.3161C6.39552 17.2264 8.89951 19 12 19C15.1005 19 17.6045 17.2264 19.3955 15.3161C20.2818 14.3706 20.9646 13.4213 21.4256 12.7075C21.6051 12.4296 21.75 12.1889 21.8593 12C21.75 11.8111 21.6051 11.5704 21.4256 11.2925C20.9646 10.5787 20.2818 9.6294 19.3955 8.68394C17.6045 6.77356 15.1005 5 12 5C8.89951 5 6.39552 6.77356 4.60454 8.68394C3.71817 9.6294 3.03543 10.5787 2.57441 11.2925C2.39492 11.5704 2.25003 11.8111 2.14074 12C2.25003 12.1889 2.39492 12.4296 2.57441 12.7075ZM23.8941 11.5521C23.8943 11.5525 23.8944 11.5528 23 12C23.8944 12.4472 23.8943 12.4475 23.8941 12.4479L23.8936 12.4488L23.8925 12.4511L23.889 12.458L23.8777 12.4802C23.8681 12.4987 23.8546 12.5247 23.8372 12.5576C23.8025 12.6233 23.752 12.7168 23.686 12.834C23.5542 13.0684 23.3601 13.3985 23.1057 13.7925C22.5979 14.5787 21.8432 15.6294 20.8545 16.6839C18.8955 18.7736 15.8995 21 12 21C8.10049 21 5.10448 18.7736 3.14546 16.6839C2.15683 15.6294 1.40207 14.5787 0.894336 13.7925C0.63985 13.3985 0.445792 13.0684 0.313971 12.834C0.248023 12.7168 0.19754 12.6233 0.162753 12.5576C0.145357 12.5247 0.131875 12.4987 0.122338 12.4802L0.11099 12.458L0.107539 12.4511L0.10637 12.4488L0.105925 12.4479C0.105741 12.4475 0.105573 12.4472 1 12C0.105573 11.5528 0.105741 11.5525 0.105925 11.5521L0.10637 11.5512L0.107539 11.5489L0.11099 11.542L0.122338 11.5198C0.131875 11.5013 0.145357 11.4753 0.162753 11.4424C0.19754 11.3767 0.248023 11.2832 0.313971 11.166C0.445792 10.9316 0.63985 10.6015 0.894336 10.2075C1.40207 9.42131 2.15683 8.3706 3.14546 7.31606C5.10448 5.22644 8.10049 3 12 3C15.8995 3 18.8955 5.22644 20.8545 7.31606C21.8432 8.3706 22.5979 9.42131 23.1057 10.2075C23.3601 10.6015 23.5542 10.9316 23.686 11.166C23.752 11.2832 23.8025 11.3767 23.8372 11.4424C23.8546 11.4753 23.8681 11.5013 23.8777 11.5198L23.889 11.542L23.8925 11.5489L23.8936 11.5512L23.8941 11.5521ZM23 12L23.8944 11.5528C24.0352 11.8343 24.0352 12.1657 23.8944 12.4472L23 12ZM0.105573 11.5528L1 12L0.105573 12.4472C-0.0351909 12.1657 -0.0351909 11.8343 0.105573 11.5528ZM10 12C10 10.8954 10.8954 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12ZM12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8Z">
                    </path>
                  </svg>
                  <p class="post__views_num">{{ $post->views }}</p>
                </a>
                <a class="post__comments post__actions-left-item"
                  href="{{ route('post.show', [$post->category_id, $post->id]) }}">
                  <svg class="icon" viewBox="0 0 20 20" fill="none" fill="#000F13">
                    <path
                      d="M18 0.227539H2C0.9 0.227539 0 1.10708 0 2.18208V19.773L4 15.8639H18C19.1 15.8639 20 14.9844 20 13.9094V2.18208C20 1.10708 19.1 0.227539 18 0.227539ZM18 13.9094H4L2 15.8639V2.18208H18V13.9094Z">
                    </path>
                  </svg>
                  <p class="post__coments_num">{{ $post->comments->count() }}</p>
                </a>



                <div class="post__pins post__actions-left-item">
                  <svg class="icon" viewBox="0 0 24 24">
                    <path
                      d="M4 4C4 2.34315 5.34315 1 7 1H17C18.6569 1 20 2.34315 20 4V22C20 22.3905 19.7727 22.7453 19.4179 22.9085C19.0631 23.0717 18.6457 23.0134 18.3492 22.7593L12 17.3171L5.65079 22.7593C5.35428 23.0134 4.93694 23.0717 4.58214 22.9085C4.22734 22.7453 4 22.3905 4 22V4ZM7 3C6.44772 3 6 3.44772 6 4V19.8258L11.3492 15.2407C11.7237 14.9198 12.2763 14.9198 12.6508 15.2407L18 19.8258V4C18 3.44772 17.5523 3 17 3H7Z">
                    </path>
                  </svg>
                  <p class="post__pins_num"> {{ $post->favourite->count() }}</p>
                </div>
              </div>

              <div class="post__actions-right">

                <div class="post__smile post__actions-right-item">

                  <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
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
                  <p class="post__smile-num">{{ $post->like->count() }}</p>
                </div>

                <div class="post__smile-sad post__actions-right-item">

                  <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
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

                  <p class="post__smile-sad-num">{{ $post->dislike->count() }}</p>
                </div>
              </div>
            </div>
          </div>


        </div>
      @endforeach
    @endif
    @if ($advertisements->isEmpty() and $posts->isEmpty() and $news_all->isEmpty())
      <p class="post__title">Вы еще не добавили ни одного поста в избранное.</p>
    @endif

  @endsection
