  @extends('layouts.main')
  @section('content')
    <div class="help__card">
      <div class="help__block">
        <p class="post__title">Помощь</p>
        <p class="feed__text">
          На этой странице вы сможете найти ответы на самые частые вопросы.
        </p>
      </div>
      @if (!$categories_asked_questions->count() == 0)
        @foreach ($categories_asked_questions as $category_asked_question)
          <div class="help__block">
            <p class="post__title">{{ $category_asked_question->title }}</p>
            <ul class="help__items">
              @if (!$category_asked_question->asked_questions->count() == 0)
                @foreach ($category_asked_question->asked_questions as $asked_question)
                  <!-- item -->
                  <li class="help__item">
                    <a class="vacancy__link"
                      href="{{ route('faq.asked_question.show', [$category_asked_question->slug, $asked_question->slug]) }}">{{ $asked_question->title }}</a>
                  </li>
                @endforeach
              @else
                <p>Тут пока ничего нет...</p>
              @endif
            </ul>
          </div>
        @endforeach
      @else
        <p class="post__title">Тут пока ничего нет...</p>
      @endif
    </div>
  @endsection
