  @auth()
    <form class="comment" action="{{ route('news.comment.store', $news->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <p class="title__comment">Комментарии</p>
      <textarea id="summernote" class="white__textarea" name="content" id="area__comment" placeholder="Написать комментарий...">{{ old('content') }}</textarea>

      <div class="comment__bottom">
        <input type="file" name="comment_image" id="input__comment">
        <label for="input__comment"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#292D32">
            <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke-width="1.5"
              stroke-linecap="round" stroke-linejoin="round"></path>
            <path
              d="M9 10C10.1046 10 11 9.10457 11 8C11 6.89543 10.1046 6 9 6C7.89543 6 7 6.89543 7 8C7 9.10457 7.89543 10 9 10Z"
              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path
              d="M2.66998 18.9501L7.59998 15.6401C8.38998 15.1101 9.52998 15.1701 10.24 15.7801L10.57 16.0701C11.35 16.7401 12.61 16.7401 13.39 16.0701L17.55 12.5001C18.33 11.8301 19.59 11.8301 20.37 12.5001L22 13.9001"
              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </label>

        @error('content')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        @error('comment_image')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        <button class="btn btn__blue">Отправить</button>
      </div>
    </form>
  @endauth
  @guest
    <p class="post__title">Войдите или зарегистрируйтесь для ответа.</p>
  @endguest
  @foreach ($news->comments->where('parent_id', null)->reverse() as $comment)
    <div class="ad__comment">
      <div class="ad__comment-top">
        <div class="user__avatar">
          @if ($comment->author->user_avatar ?? null)
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
            <div class="meatballs">
              <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#000F13">
                <path d="M5 10C3.9 10 3 10.9 3 12C3 13.1 3.9 14 5 14C6.1 14 7 13.1 7 12C7 10.9 6.1 10 5 10Z"
                  stroke-width="1.5"></path>
                <path d="M19 10C17.9 10 17 10.9 17 12C17 13.1 17.9 14 19 14C20.1 14 21 13.1 21 12C21 10.9 20.1 10 19 10Z"
                  stroke-width="1.5"></path>
                <path d="M12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                  stroke-width="1.5"></path>
              </svg>
            </div>


            <div class="dropdown report">
              @if (Auth::id() == $comment->author->id)
                <form action="{{ route('news.comment.destroy', [$news->id, $comment->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="title__count report">
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
      <p class="post__text">{{ $comment->content }}</p>
      @if ($comment->comment_image)
        <div class="post__img">
          <picture>
            <source srcset="{{ asset('storage/' . $comment->comment_image) }}" type="image/webp"><img
              src="{{ asset('storage/' . $comment->comment_image) }}" alt="">
          </picture>
        </div>
      @else
      @endif
      @auth
        <form class="comment" action="{{ route('news.comment.store', $news->id) }}" method="POST"
          enctype="multipart/form-data">
          @csrf
          <textarea id="summernote" class="white__textarea" name="content" id="area__comment"
            placeholder="Написать комментарий...">{{ old('content') }}</textarea>

          <div class="comment__bottom">
            <input type="file" name="comment_image" id="input__comment1">
            <label for="input__comment1"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#292D32">
                <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke-width="1.5"
                  stroke-linecap="round" stroke-linejoin="round"></path>
                <path
                  d="M9 10C10.1046 10 11 9.10457 11 8C11 6.89543 10.1046 6 9 6C7.89543 6 7 6.89543 7 8C7 9.10457 7.89543 10 9 10Z"
                  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path
                  d="M2.66998 18.9501L7.59998 15.6401C8.38998 15.1101 9.52998 15.1701 10.24 15.7801L10.57 16.0701C11.35 16.7401 12.61 16.7401 13.39 16.0701L17.55 12.5001C18.33 11.8301 19.59 11.8301 20.37 12.5001L22 13.9001"
                  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </label>
            @error('content')
              <div class="text-danger">{{ $message }}</div>
            @enderror
            @error('comment_image')
              <div class="text-danger">{{ $message }}</div>
            @enderror
            <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            <button class="comment__link ml-auto">Ответить</button>
          </div>
        </form>
      @endauth
    </div>
    @if (count($comment->replies) > 0)
      @include('news.comments.reverse_comments', [
          'comments_res' => $comment->replies->reverse(),
      ])
    @endif
  @endforeach
