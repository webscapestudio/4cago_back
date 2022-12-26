@extends('layouts.main')

@section('content')
  <div class="forum__item">
    @if (!$categories->count() == 0)
      @foreach ($categories as $category)
        <p class="post__text">{{ $category->title }}</p>
        <div class="forum__themes">
          @if (count($category->childrenCategories) > 0)
            @include('categories_posts.partials.child_category', [
                'child_categories' => $category->childrenCategories->where('published', '1'),
            ])
          @endif
        </div>
      @endforeach
    @else
      <p class="post__title">Тут пока ничего нет...</p>
    @endif
  </div>
@endsection
