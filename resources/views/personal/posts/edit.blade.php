@extends('personal.main.index')
@section('content')
  <form class="post__create"action="{{ route('personal.post.update', $post->id) }}" method="POST"
    enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PATCH">
    {{ csrf_field() }}
    <h2 class="delete__title">Редактировать пост</h2>
    <div class="post-create__inner">
      <div class="post__category">
        <p class="post__date">Статус</p>

        <div class="custom__select">
          <select id="a-select" name="published">
            @if (@isset($post->id))
              <option value="1" @if ($post->published == 1) selected = "" @endif>Опубликовано
              </option>
              <option value="0" @if ($post->published == 0) selected = "" @endif>Не
                опубликовано</option>
            @else
              <option value="1">Опубликовано</option>
              <option value="0">Не опубликовано</option>
            @endif

          </select>
          @error('published')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="post__category">
        <p class="post__date">Категория</p>

        <div class="custom__select">
          <select id="a-select" name="category_id">
            @include('admin.categories.partials.categoriesEdit', [
                'categories' => $categories,
            ])

          </select>
          @error('category_id')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="create__title">
        <p class="post__date">Заголовок</p>
        <input class="input input__title" type="text" name="title" value="{{ $post->title }}">
        @error('title')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>


      <div class="create__text">
        <p class="post__date">Текст</p>
        <div class="white__area">

          <textarea id="summernote" class="white__textarea" name="content" id="white-area">{{ $post->content }}</textarea>
          @error('content')
            <div class="text-danger">{{ $message }}</div>
          @enderror


          <div class="file__create">
            <input type="file" name="post_image" id="input__comment">
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

            @error('post_image')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

        </div>
        @if ($post->post_image)
          <div class="post__img">
            <picture>
              <source srcset="{{ asset('storage/' . $post->post_image) }}" type="image/webp">
              <img src="{{ asset('storage/' . $post->post_image) }}" alt="">
            </picture>
          </div>
        @else
        @endif
      </div>




      <div class="create__tags">
        <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите теги"
          style="width: 100%;">
          @foreach ($tags as $tag)
            <option {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected' : '' }}
              value="{{ $tag->id }}" {{ $tag->id == old('tag_id') ? 'selected' : '' }}>
              {{ $tag->title }}</option>
          @endforeach
        </select>
        @error('tag_ids')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <div class="create__bottom">
      <input type="submit" class="btn btn__blue" value="Сохранить">
      <p class="post__date">Стоимость размещения - 1$ за 24 часа</p>
    </div>
  </form>
@endsection
