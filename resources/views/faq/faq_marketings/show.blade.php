@extends('layouts.main')

@section('content')
  <div class="adv__post">
    <p class="post__title">{{ $faq_marketing->title }}</p>

    <p class="feed__text">
      {{ $faq_marketing->content }}
    </p>

  </div>
@endsection
