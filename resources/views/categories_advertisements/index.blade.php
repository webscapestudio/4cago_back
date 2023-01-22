@extends('layouts.main')

@section('content')
  <div class="forum__item">
    @if (!$categories_advertisement->count() == 0)
      @foreach ($categories_advertisement as $category)
        <a class="forum__theme" href="{{ route('advertisement.index', $category->id) }}">
          <div class="forum__theme-left">
            <p class="title__comment"> {{ $category->title }}</p>
            <p class="feed__text"> {{ $category->description }}</p>
          </div>
          <div class="forum__theme-right">
            <div class="right__themes">
              <p class="forum__tags">Темы:</p>
              <p class="forum__tags count__theme">{{ $category->advertisementCount->count() }}</p>
            </div>
            <div class="right__themes">
              <p class="forum__tags">Сообщения:</p>
              <p class="forum__tags count__message">{{ $category->comments->count() }}</p>
            </div>
          </div>
        </a>

        @if (count($category->childrenCategories) > 0)
          @include('categories_advertisements.partials.child_category', [
              'child_categories' => $category->childrenCategories->where('published', '1'),
          ])
        @endif
      @endforeach
    @else
      <p class="post__text">Тут пока ничего нет...</p>
    @endif
  </div>
@endsection
