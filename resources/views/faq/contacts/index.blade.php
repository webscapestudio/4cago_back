@extends('layouts.main')

@section('content')

  <div class="helps contacts">
    <h2 class="help__title">Контакты</h2>
    <div class="rules__wrap">
      @if (!$contacts->count() == 0)
        @foreach ($contacts as $contact)
          <!-- subtitles -->
          <div class="subtitles">
            <p class="subtitle__title">{{ $contact->title }}</p>
            <a class="help__link" href="{{ $contact->link }}">{{ $contact->content }}</a>
          </div>
        @endforeach
      @else
        <p class="post__title">Тут пока ничего нет...</p>
      @endif
    </div>
  </div>

@endsection
