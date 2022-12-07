@extends('layouts.main')

@section('content')
    <div class="forum__item">
        @foreach ($categories as $category)
            <p class="post__text">{{ $category->title }}</p>
            <div class="forum__themes">
                @if (count($category->childrenCategories) > 0)
                    @include('categories_posts.partials.child_category', [
                        'child_categories' => $category->childrenCategories,
                    ])
                @endif
            </div>
        @endforeach
    </div>
@endsection
