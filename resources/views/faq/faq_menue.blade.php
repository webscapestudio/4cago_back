<div class="sidebar__help">
  <div class="sidebar__menu">
    <ul class="sidebar__menu-items">
      <!-- item -->
      <li class="sidebar__menu-item">
        <a class="menu__link active" href="{{ route('faq.rule.index') }}">
          <div class="sidebar__menu-text">Правила</div>
        </a>
      </li>
      <!-- item -->
      <li class="sidebar__menu-item">
        <a class="menu__link" href="{{ route('faq.category_asked_question.index') }}">
          <div class="sidebar__menu-text">Помощь</div>
        </a>
      </li>
      <!-- item -->
      <li class="sidebar__menu-item">
        <a class="menu__link" href="{{ route('faq.faq_marketing.index') }}">
          <div class="sidebar__menu-text">Реклама</div>
        </a>
      </li>
      <!-- item -->
      <li class="sidebar__menu-item">
        <a class="menu__link" href="{{ route('faq.contact.index') }}">
          <div class="sidebar__menu-text">Контакты</div>
        </a>
      </li>
    </ul>
  </div>
  <div class="hide">
    <div class="ad advertisments">
      <ul class="ad__items">
        <li class="ad__item">
          <a class="ad__item-inner" href="#">
            <p class="ad-text">Реклама</p>
            <div class="ad-img">
              <picture>
                <source srcset="./images/content/ad-1.webp" type="image/webp"><img src="./images/content/ad-1.png"
                  alt="">
              </picture>
            </div>
          </a>
        </li>
        <li class="ad__item">
          <a class="ad__item-inner" href="#">
            <p class="ad-text">Реклама</p>
            <div class="ad-img">
              <picture>
                <source srcset="./images/content/ad-2.webp" type="image/webp"><img src="./images/content/ad-2.png"
                  alt="">
              </picture>
            </div>
          </a>
        </li>
        <li class="ad__item">
          <a class="ad__item-inner" href="#">
            <p class="ad-text">Реклама</p>
            <div class="ad-img">
              <picture>
                <source srcset="./images/content/ad-3.webp" type="image/webp"><img src="./images/content/ad-3.png"
                  alt="">
              </picture>
            </div>
          </a>
        </li>
        <li class="ad__item">
          <a class="ad__item-inner" href="#">
            <p class="ad-text">Реклама</p>
            <div class="ad-img">
              <picture>
                <source srcset="./images/content/ad-4.webp" type="image/webp"><img src="./images/content/ad-4.png"
                  alt="">
              </picture>
            </div>
          </a>
        </li>
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
