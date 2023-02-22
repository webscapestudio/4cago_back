  @if (!$works->count() == 0)
    @foreach ($works as $work)
      <div class="work__card">
        <div class="work__card-top">
          <div class="user__avatar">
            @if ($work->author->user_avatar ?? null)
              <picture>
                <source srcset="{{ asset('storage/' . $work->author->user_avatar) }}" type="image/webp" />
                <img src=" {{ asset('storage/' . $work->author->user_avatar) }}" alt="" />
              </picture>
            @else
              <picture>
                <source srcset="{{ asset('/images/svg/humster.webp') }}" type="image/webp" />
                <img src="{{ asset('/images/svg/humster.png') }}" alt="" />
              </picture>
            @endif
          </div>
          <p class="user__name">{{ $work->author->name ?? 'Пользователь не найден' }}</p>
          <div class="post__date">{{ $work->created_at->diffForHumans() }}</div>

        </div>
        <div class="post__main">
          <a class="post__title"
            href="{{ route('work.show', [$work->category_work_id, $work->id]) }}">{{ $work->title }}</a>
          <div class="post__content js-read-smore" data-read-smore-words="40">
            {{ $work->description }}
          </div>

          @if ($work->work_image)
            <div class="post__img">
              <picture>
                <source srcset="{{ asset('storage/' . $work->work_image) }}" type="image/webp">
                <img src="{{ asset('storage/' . $work->work_image) }}" alt="">
              </picture>
            </div>
          @endif
        </div>

        <div class="card__tags">
          @foreach ($work->tags as $tag)
            <div class="forum__tags">{{ $tag->title }}</div>
          @endforeach
        </div>
        <div class="work__card-bottom">
          @auth()
            <a class="post__views post__actions-left-item">
              <svg class="icon" viewBox="0 0 24 24" fill="none">
                <path
                  d="M2.57441 12.7075C3.03543 13.4213 3.71817 14.3706 4.60454 15.3161C6.39552 17.2264 8.89951 19 12 19C15.1005 19 17.6045 17.2264 19.3955 15.3161C20.2818 14.3706 20.9646 13.4213 21.4256 12.7075C21.6051 12.4296 21.75 12.1889 21.8593 12C21.75 11.8111 21.6051 11.5704 21.4256 11.2925C20.9646 10.5787 20.2818 9.6294 19.3955 8.68394C17.6045 6.77356 15.1005 5 12 5C8.89951 5 6.39552 6.77356 4.60454 8.68394C3.71817 9.6294 3.03543 10.5787 2.57441 11.2925C2.39492 11.5704 2.25003 11.8111 2.14074 12C2.25003 12.1889 2.39492 12.4296 2.57441 12.7075ZM23.8941 11.5521C23.8943 11.5525 23.8944 11.5528 23 12C23.8944 12.4472 23.8943 12.4475 23.8941 12.4479L23.8936 12.4488L23.8925 12.4511L23.889 12.458L23.8777 12.4802C23.8681 12.4987 23.8546 12.5247 23.8372 12.5576C23.8025 12.6233 23.752 12.7168 23.686 12.834C23.5542 13.0684 23.3601 13.3985 23.1057 13.7925C22.5979 14.5787 21.8432 15.6294 20.8545 16.6839C18.8955 18.7736 15.8995 21 12 21C8.10049 21 5.10448 18.7736 3.14546 16.6839C2.15683 15.6294 1.40207 14.5787 0.894336 13.7925C0.63985 13.3985 0.445792 13.0684 0.313971 12.834C0.248023 12.7168 0.19754 12.6233 0.162753 12.5576C0.145357 12.5247 0.131875 12.4987 0.122338 12.4802L0.11099 12.458L0.107539 12.4511L0.10637 12.4488L0.105925 12.4479C0.105741 12.4475 0.105573 12.4472 1 12C0.105573 11.5528 0.105741 11.5525 0.105925 11.5521L0.10637 11.5512L0.107539 11.5489L0.11099 11.542L0.122338 11.5198C0.131875 11.5013 0.145357 11.4753 0.162753 11.4424C0.19754 11.3767 0.248023 11.2832 0.313971 11.166C0.445792 10.9316 0.63985 10.6015 0.894336 10.2075C1.40207 9.42131 2.15683 8.3706 3.14546 7.31606C5.10448 5.22644 8.10049 3 12 3C15.8995 3 18.8955 5.22644 20.8545 7.31606C21.8432 8.3706 22.5979 9.42131 23.1057 10.2075C23.3601 10.6015 23.5542 10.9316 23.686 11.166C23.752 11.2832 23.8025 11.3767 23.8372 11.4424C23.8546 11.4753 23.8681 11.5013 23.8777 11.5198L23.889 11.542L23.8925 11.5489L23.8936 11.5512L23.8941 11.5521ZM23 12L23.8944 11.5528C24.0352 11.8343 24.0352 12.1657 23.8944 12.4472L23 12ZM0.105573 11.5528L1 12L0.105573 12.4472C-0.0351909 12.1657 -0.0351909 11.8343 0.105573 11.5528ZM10 12C10 10.8954 10.8954 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12ZM12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8Z">
                </path>
              </svg>
              <p class="post__views_num">{{ $work->views }}</p>
            </a>
            <form id="favourite{{ $work->id }}"
              class="post__pins post__actions-left-item favourite {{ Auth::user()->hasFavouritedWork($work) ? 'active' : '' }}"
              data-id="{{ $work->id }}"
              action="{{ route('work.favourite.store', [$work->category_work_id, $work->id]) }}" method="POST">
              @csrf
              <button type="submit" class="post__pins post__actions-left-item">
                <svg class="icon" viewBox="0 0 24 24">
                  <path
                    d="M4 4C4 2.34315 5.34315 1 7 1H17C18.6569 1 20 2.34315 20 4V22C20 22.3905 19.7727 22.7453 19.4179 22.9085C19.0631 23.0717 18.6457 23.0134 18.3492 22.7593L12 17.3171L5.65079 22.7593C5.35428 23.0134 4.93694 23.0717 4.58214 22.9085C4.22734 22.7453 4 22.3905 4 22V4ZM7 3C6.44772 3 6 3.44772 6 4V19.8258L11.3492 15.2407C11.7237 14.9198 12.2763 14.9198 12.6508 15.2407L18 19.8258V4C18 3.44772 17.5523 3 17 3H7Z">
                  </path>
                </svg>
                <p class="post__pins_num fav{{ $work->id }}"> {{ $work->favourite->count() }}</p>
              </button>
            </form>
          @endauth
          @guest
            <a class="post__views post__actions-left-item" href="#">
              <svg class="icon" viewBox="0 0 24 24" fill="none">
                <path
                  d="M2.57441 12.7075C3.03543 13.4213 3.71817 14.3706 4.60454 15.3161C6.39552 17.2264 8.89951 19 12 19C15.1005 19 17.6045 17.2264 19.3955 15.3161C20.2818 14.3706 20.9646 13.4213 21.4256 12.7075C21.6051 12.4296 21.75 12.1889 21.8593 12C21.75 11.8111 21.6051 11.5704 21.4256 11.2925C20.9646 10.5787 20.2818 9.6294 19.3955 8.68394C17.6045 6.77356 15.1005 5 12 5C8.89951 5 6.39552 6.77356 4.60454 8.68394C3.71817 9.6294 3.03543 10.5787 2.57441 11.2925C2.39492 11.5704 2.25003 11.8111 2.14074 12C2.25003 12.1889 2.39492 12.4296 2.57441 12.7075ZM23.8941 11.5521C23.8943 11.5525 23.8944 11.5528 23 12C23.8944 12.4472 23.8943 12.4475 23.8941 12.4479L23.8936 12.4488L23.8925 12.4511L23.889 12.458L23.8777 12.4802C23.8681 12.4987 23.8546 12.5247 23.8372 12.5576C23.8025 12.6233 23.752 12.7168 23.686 12.834C23.5542 13.0684 23.3601 13.3985 23.1057 13.7925C22.5979 14.5787 21.8432 15.6294 20.8545 16.6839C18.8955 18.7736 15.8995 21 12 21C8.10049 21 5.10448 18.7736 3.14546 16.6839C2.15683 15.6294 1.40207 14.5787 0.894336 13.7925C0.63985 13.3985 0.445792 13.0684 0.313971 12.834C0.248023 12.7168 0.19754 12.6233 0.162753 12.5576C0.145357 12.5247 0.131875 12.4987 0.122338 12.4802L0.11099 12.458L0.107539 12.4511L0.10637 12.4488L0.105925 12.4479C0.105741 12.4475 0.105573 12.4472 1 12C0.105573 11.5528 0.105741 11.5525 0.105925 11.5521L0.10637 11.5512L0.107539 11.5489L0.11099 11.542L0.122338 11.5198C0.131875 11.5013 0.145357 11.4753 0.162753 11.4424C0.19754 11.3767 0.248023 11.2832 0.313971 11.166C0.445792 10.9316 0.63985 10.6015 0.894336 10.2075C1.40207 9.42131 2.15683 8.3706 3.14546 7.31606C5.10448 5.22644 8.10049 3 12 3C15.8995 3 18.8955 5.22644 20.8545 7.31606C21.8432 8.3706 22.5979 9.42131 23.1057 10.2075C23.3601 10.6015 23.5542 10.9316 23.686 11.166C23.752 11.2832 23.8025 11.3767 23.8372 11.4424C23.8546 11.4753 23.8681 11.5013 23.8777 11.5198L23.889 11.542L23.8925 11.5489L23.8936 11.5512L23.8941 11.5521ZM23 12L23.8944 11.5528C24.0352 11.8343 24.0352 12.1657 23.8944 12.4472L23 12ZM0.105573 11.5528L1 12L0.105573 12.4472C-0.0351909 12.1657 -0.0351909 11.8343 0.105573 11.5528ZM10 12C10 10.8954 10.8954 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12ZM12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8Z">
                </path>
              </svg>
              <p class="post__views_num">{{ $work->views }}</p>
            </a>
            <div class="post__actions-left">
              <div type="submit" class="post__pins post__actions-left-item">
                <svg class="icon" viewBox="0 0 24 24">
                  <path
                    d="M4 4C4 2.34315 5.34315 1 7 1H17C18.6569 1 20 2.34315 20 4V22C20 22.3905 19.7727 22.7453 19.4179 22.9085C19.0631 23.0717 18.6457 23.0134 18.3492 22.7593L12 17.3171L5.65079 22.7593C5.35428 23.0134 4.93694 23.0717 4.58214 22.9085C4.22734 22.7453 4 22.3905 4 22V4ZM7 3C6.44772 3 6 3.44772 6 4V19.8258L11.3492 15.2407C11.7237 14.9198 12.2763 14.9198 12.6508 15.2407L18 19.8258V4C18 3.44772 17.5523 3 17 3H7Z">
                  </path>
                </svg>
                <p class="post__pins_num"> {{ $work->favourite->count() }}</p>
              </div>
            </div>

          @endguest
        </div>
      </div>
    @endforeach
  @else
    <p class="post__text">Тут пока ничего нет...</p>
  @endif

  <script>
    document.addEventListener("DOMContentLoaded", ready);

    function ready() {
      const card = document.querySelectorAll('.ad__card')
      card.forEach(item => {
        const favoriteButton = item.querySelector('.favourite')
        const favoriteButtonCount = item.querySelector('.favourite p')

        const uriFavorite = favoriteButton.getAttribute("action")
        const token = item.querySelector('input[name = "_token"]').value;
        const likeID = favoriteButton.dataset.id
        const loadingText = "Загрузка"

        favoriteButton.addEventListener('click', favoriteHandler)

        async function favoriteHandler(e) {
          e.preventDefault()
          favoriteButtonCount.innerText = loadingText
          const responce = await fetch(uriFavorite, {
              headers: {
                "X-CSRF-TOKEN": token
              },
              method: "POST"
            })
            .then(res => res.json())
            .then(data => {
              if ($('#favourite' + likeID).hasClass('active')) {
                $('#favourite' + likeID).removeClass('active');
              } else {
                $('#favourite' + likeID).addClass('active');
              }
              dislikeCount = data
              favoriteButtonCount.innerText = dislikeCount
            })
        }
      })

    }
  </script>
