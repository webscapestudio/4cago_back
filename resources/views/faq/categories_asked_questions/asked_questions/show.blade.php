@extends('layouts.main')

@section('content')
  <div class="helps how__reg">

    <h2 class="help__title">{{ $asked_question->title }}</h2>
    <div class="subtitles">
      <p class="help__subtitle">
        {!! $asked_question->content !!}
      </p>
    </div>
  </div>
@endsection
