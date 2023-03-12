<div class="sidebar__help">
  <div class="sidebar__menu">
    <ul class="sidebar__menu-items">
      <!-- item -->
      <li class="sidebar__menu-item">
        <a class="menu__link {{ Request::is('faq/rules*') ? 'active' : '' }}" href="{{ route('faq.rule.index') }}">
          <div class="sidebar__menu-text">Правила</div>
        </a>
      </li>
      <!-- item -->
      <li class="sidebar__menu-item">
        <a class="menu__link {{ Request::is('faq/categories_asked_questions*') ? 'active' : '' }}"
          href="{{ route('faq.category_asked_question.index') }}">
          <div class="sidebar__menu-text">Помощь</div>
        </a>
      </li>
      <!-- item -->
      <li class="sidebar__menu-item">
        <a class="menu__link {{ Request::is('faq/faq_marketings*') ? 'active' : '' }}"
          href="{{ route('faq.faq_marketing.index') }}">
          <div class="sidebar__menu-text">Реклама</div>
        </a>
      </li>
      <!-- item -->
      <li class="sidebar__menu-item">
        <a class="menu__link {{ Request::is('faq/contacts*') ? 'active' : '' }}"
          href="{{ route('faq.contact.index') }}">
          <div class="sidebar__menu-text">Контакты</div>
        </a>
      </li>
    </ul>
  </div>
  <div class="hide">
    <div class="ad advertisments">
      <ul class="ad__items">

        @if (!$left_banners->count() == 0)
          @foreach ($left_banners as $left_banner)
            <li class="ad__item">
              <a class="ad__item-inner" href="{{ $left_banner->link }}">
                <p class="ad-text">Реклама</p>
                <div class="ad-img">
                  @if ($left_banner->banner_image)
                    <picture>
                      <source srcset="{{ asset('storage/' . $left_banner->banner_image) }}" type="image/webp"><img
                        src="{{ asset('storage/' . $left_banner->banner_image) }}" alt="" />
                    </picture>
                  @else
                  @endif
                </div>
              </a>
            </li>
          @endforeach
        @endif
      </ul>
    </div>
    <div class="tools">
      <div class="tools__links">
        <a class="tools__link" href="{{ route('faq.faq_marketing.index') }}">Заказать рекламу</a>
        <a class="tools__link" href="{{ route('faq.rule.index') }}">Правила</a>
        <a class="tools__link" href="{{ route('faq.category_asked_question.index') }}">Помощь</a>
      </div>
    </div>
  </div>
</div>
