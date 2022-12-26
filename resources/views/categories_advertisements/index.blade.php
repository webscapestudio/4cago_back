@extends('layouts.main')

@section('content')
  <div class="forum__item">
    @if (!$categories_advertisement->count() == 0)
      @foreach ($categories_advertisement as $category)
        <p class="post__text">{{ $category->title }}</p>
        <div class="forum__themes">
          @if (count($category->childrenCategories) > 0)
            @include('categories_advertisements.partials.child_category', [
                'child_categories' => $category->childrenCategories->where('published', '1'),
            ])
          @endif
        </div>
      @endforeach
    @else
      <p class="post__text">Тут пока ничего нет...</p>
    @endif
  </div>
@endsection
