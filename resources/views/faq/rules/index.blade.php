@extends('layouts.main')

@section('content')
  <div class="rule__card">

    @if (!$rules->count() == 0)
      @foreach ($rules as $rule)
        <p class="post__title">{{ $rule->title }}</p>
        <ul class="rule__items">
          <li class="rule__item">
            <p class="feed__text">{{ $rule->content }}</p>
          </li>
        </ul>
      @endforeach
    @else
      <p class="post__title">Тут пока ничего нет...</p>
    @endif
  </div>
@endsection
