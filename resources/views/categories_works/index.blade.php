@extends('layouts.main')

@section('content')
  <div class="forum__item">
    @if (!$categories_work->count() == 0)
      @foreach ($categories_work as $category)
        <a class="forum__theme" href="{{ route('work.index', $category->id) }}">
          <div class="forum__theme-left">
            <p class="title__comment"> {{ $category->title }}</p>
            <p class="feed__text"> {{ $category->description }}</p>
          </div>
          <div class="forum__theme-right">
            <div class="right__themes">
              <p class="forum__tags">Объявления:</p>
              <p class="forum__tags count__theme">{{ $category->workCount->count() }}</p>
            </div>
          </div>
        </a>

        @if (count($category->childrenCategories) > 0)
          @include('categories_works.partials.child_category', [
              'child_categories' => $category->childrenCategories->where('published', '1'),
          ])
        @endif
      @endforeach
    @else
      <p class="post__text">Тут пока ничего нет...</p>
    @endif
  </div>
@endsection
