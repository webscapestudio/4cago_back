  @foreach ($advertisement->comments->where('parent_id', null)->reverse() as $comment)
    <div class="ad__comment">
      <div class="ad__comment-top">
        <div class="user__avatar">
          @if ($comment->author->user_avatar)
            <picture>
              <source srcset="{{ asset('storage/' . $comment->author->user_avatar) }}" type="image/webp" />
              <img src=" {{ asset('storage/' . $comment->author->user_avatar) }}" alt="" />
            </picture>
          @else
            <picture>
              <source srcset="{{ asset('/images/svg/humster.webp') }}" type="image/webp" />
              <img src="{{ asset('/images/svg/humster.png') }}" alt="" />
            </picture>
          @endif
        </div>
        <p class="user__name">{{ $comment->author->name ?? 'Пользователь не найден' }}</p>
        <div class="post__date">{{ $comment->created_at->diffForHumans() }}</div>
        <div class="post__drop">
          @auth
            @if (Auth::id() == $comment->author->id)
              <div class="meatballs">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#000F13">
                  <path d="M5 10C3.9 10 3 10.9 3 12C3 13.1 3.9 14 5 14C6.1 14 7 13.1 7 12C7 10.9 6.1 10 5 10Z"
                    stroke-width="1.5"></path>
                  <path
                    d="M19 10C17.9 10 17 10.9 17 12C17 13.1 17.9 14 19 14C20.1 14 21 13.1 21 12C21 10.9 20.1 10 19 10Z"
                    stroke-width="1.5"></path>
                  <path
                    d="M12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                    stroke-width="1.5"></path>
                </svg>
              </div>
              <div class="dropdown report">
                <form
                  action="{{ route('advertisement.comment.destroy', [$advertisement->category_advertisement_id, $advertisement->id, $comment->id]) }}"
                  method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="title__count report" data-micromodal-trigger="report">
                    Удалить
                  </button>
                </form>
              </div>
            @endif
          @endauth

        </div>

      </div>
      <p class="post__text">{{ $comment->content }}</p>
      @if ($comment->comment_image)
        <div class="post__img">
          <picture>
            <source srcset="{{ asset('storage/' . $comment->comment_image) }}" type="image/webp"><img
              src="{{ asset('storage/' . $comment->comment_image) }}" alt="">
          </picture>
        </div>
      @endif
    </div>
    @foreach ($comment->replies->reverse() as $comment1)
      <div class="ad__comment">
        <div class="ad__comment-top">
          <picture>
            <source srcset="./images/avatars/user-ava.webp" type="image/webp"><img src="./images/avatars/user-ava.jpg"
              alt="">
          </picture>
          <p class="user__name">Ответ пользователю: {{ $comment1->parent->author->name ?? 'Пользователь не найден' }}
          </p>
          <p class="user__name">От: {{ $comment1->author->name ?? 'Пользователь не найден' }}</p>
          <div class="post__date">{{ $comment1->created_at->diffForHumans() }}</div>
          <div class="post__drop">
            @auth
              <div class="meatballs">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#000F13">
                  <path d="M5 10C3.9 10 3 10.9 3 12C3 13.1 3.9 14 5 14C6.1 14 7 13.1 7 12C7 10.9 6.1 10 5 10Z"
                    stroke-width="1.5"></path>
                  <path
                    d="M19 10C17.9 10 17 10.9 17 12C17 13.1 17.9 14 19 14C20.1 14 21 13.1 21 12C21 10.9 20.1 10 19 10Z"
                    stroke-width="1.5"></path>
                  <path
                    d="M12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                    stroke-width="1.5"></path>
                </svg>
              </div>


              <div class="dropdown report">
                @if (Auth::id() == $comment1->author->id)
                  <form
                    action="{{ route('advertisement.comment.destroy', [$advertisement->category_advertisement_id, $advertisement->id, $comment1->id]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="title__count report" data-micromodal-trigger="report">
                      Удалить
                    </button>
                  </form>
                @else
                  <button type="submit" class="title__count report" data-micromodal-trigger="report">
                    Пожаловаться
                  </button>
                @endif
              </div>
            @endauth
          </div>
        </div>
        <p class="post__text">{{ $comment1->content }}</p>
        @if ($comment1->comment_image)
          <div class="post__img">
            <picture>
              <source srcset="{{ asset('storage/' . $comment1->comment_image) }}" type="image/webp"><img
                src="{{ asset('storage/' . $comment1->comment_image) }}" alt="">
            </picture>
          </div>
        @else
        @endif
      </div>
    @endforeach
  @endforeach
