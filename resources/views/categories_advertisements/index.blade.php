@extends('layouts.main')

@section('content')
  <div class="forum__item">
    @if (!$categories_advertisement->count() == 0)
      @include('categories_advertisements.partials.child_category')
    @else
      <p class="post__text">Тут пока ничего нет...</p>
    @endif
  </div>
@endsection
