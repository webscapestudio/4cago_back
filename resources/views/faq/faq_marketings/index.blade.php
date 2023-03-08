@extends('layouts.main')

@section('content')
  <div class="advertising__card">
    <p class="post__title">Реклама</p>
    <p class="feed__text">
      На этой странице вы сможете узнать о размещении рекламы на сайте.
    </p>
    <ul class="advertising__items">
      @if (!$faq_marketings->count() == 0)
        @foreach ($faq_marketings as $faq_marketing)
          <li class="advertising__item">
            <a class="vacancy__link"
              href="{{ route('faq.faq_marketing.show', $faq_marketing->slug) }}">{{ $faq_marketing->title }}</a>
          </li>
        @endforeach
      @else
        <p class="post__title">Тут пока ничего нет...</p>
      @endif
    </ul>
  </div>
@endsection
