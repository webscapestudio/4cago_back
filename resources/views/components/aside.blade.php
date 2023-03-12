<div class="sidebar-left">

  <div class="sidebar" @if (Str::of(request()->route()->getName())->test('/faq/')) style="display: none;"@else @endif>
    <div class="mobileasidewrap">
      <div class="sidebar__menu">
        <ul class="sidebar__menu-items">


          <!-- item -->
          <li class="sidebar__menu-item">

            <a class="menu__link {{ Request::path() == '/' ? 'active' : '' }}" href="{{ route('main.index') }}">
              <svg class="icon" viewBox="0 0 17 20" fill="none" fill="#000F13">
                <path
                  d="M8.62722 0.701087C8.46175 0.511982 8.21979 0.407635 7.96869 0.417096C7.71762 0.426556 7.48422 0.548791 7.33345 0.749778L7.3334 0.749834L7.33328 0.750007L7.33236 0.751231L7.32818 0.756778L7.31071 0.779906C7.29509 0.800532 7.27166 0.831379 7.24111 0.871332C7.17998 0.951255 7.0904 1.06751 6.97783 1.21121C6.75249 1.49888 6.43614 1.8951 6.07235 2.32909C5.33178 3.21257 4.44011 4.19726 3.72946 4.76578C1.5042 6.54599 0.083374 8.84966 0.083374 11.6665C0.083374 14.174 1.002 16.1732 2.48791 17.5402C3.96299 18.8973 5.94363 19.5832 8.00007 19.5832C12.08 19.5832 16.3334 16.8304 16.3334 11.6665C16.3334 9.24382 15.7818 7.45526 15.2108 6.25614C14.926 5.65819 14.638 5.21002 14.4148 4.90488C14.3031 4.75232 14.2076 4.63546 14.1367 4.55342C14.1013 4.5124 14.072 4.48006 14.0498 4.4563C14.0388 4.44441 14.0295 4.43467 14.0221 4.42706L14.0126 4.41723L14.0089 4.41351L14.0073 4.41195L14.0066 4.41124C14.0063 4.41091 14.006 4.41058 13.4167 4.99984L14.006 4.41058C13.8017 4.20636 13.5063 4.12244 13.2252 4.1888C12.9463 4.25466 12.7209 4.45922 12.6282 4.73016L12.6259 4.73646C12.6226 4.74527 12.616 4.76248 12.6057 4.78711C12.585 4.83642 12.5498 4.91505 12.497 5.01536C12.3912 5.21638 12.2166 5.5014 11.9507 5.81168C11.6195 6.19803 11.1417 6.62987 10.4645 6.98915C10.5068 6.71006 10.5388 6.40293 10.5515 6.07353C10.6098 4.55684 10.2557 2.56218 8.62722 0.701087ZM7.34963 3.39976C7.5854 3.11849 7.80168 2.85289 7.98774 2.62047C8.75046 3.83095 8.92343 5.03825 8.88608 6.00948C8.86298 6.61005 8.75881 7.11884 8.66121 7.47479C8.61259 7.65213 8.56612 7.78962 8.53331 7.87934C8.51693 7.92414 8.50402 7.95684 8.49605 7.97645L8.48801 7.99585C8.48753 7.99696 8.48724 7.99763 8.48715 7.99785L8.48754 7.99697L8.48789 7.99617C8.35929 8.28699 8.4074 8.62571 8.61201 8.86924C8.81697 9.11317 9.14306 9.2189 9.45215 9.14162C11.306 8.67816 12.4925 7.74054 13.2161 6.89633C13.3164 6.77925 13.4077 6.66426 13.4904 6.55294C13.5607 6.67999 13.6332 6.81985 13.706 6.9727C14.1767 7.96109 14.6667 9.50586 14.6667 11.6665C14.6667 14.3745 13.1808 16.279 11.1604 17.2278C11.2704 16.9179 11.3334 16.5889 11.3334 16.2498C11.3334 14.8628 10.5057 13.8224 9.81314 13.1876C9.45612 12.8603 9.10255 12.6103 8.83932 12.4421C8.70688 12.3575 8.59515 12.2922 8.51437 12.247C8.47392 12.2244 8.44107 12.2067 8.41708 12.1941L8.38784 12.1788L8.37846 12.174L8.37513 12.1724L8.37381 12.1717L8.37323 12.1714C8.37297 12.1713 8.37272 12.1711 8.00004 12.9165L8.37272 12.1711L8.00004 11.9848L7.62736 12.1711L8.00004 12.9165C7.62736 12.1711 7.62711 12.1713 7.62685 12.1714L7.62627 12.1717L7.62495 12.1724L7.62162 12.174L7.61224 12.1788L7.583 12.1941C7.55901 12.2067 7.52616 12.2244 7.48571 12.247C7.40493 12.2922 7.2932 12.3575 7.16076 12.4421C6.89754 12.6103 6.54397 12.8603 6.18694 13.1876C5.49442 13.8224 4.66671 14.8628 4.66671 16.2498C4.66671 16.5638 4.71609 16.8665 4.80459 17.1523C4.37178 16.9218 3.97256 16.6414 3.61634 16.3136C2.49808 15.2848 1.75004 13.7424 1.75004 11.6665C1.75004 9.48335 2.82922 7.62035 4.77062 6.06723C5.62247 5.38575 6.60581 4.28711 7.34963 3.39976ZM8.48823 7.99541C8.48837 7.99507 8.48853 7.99472 9.25004 8.33317L8.48853 7.99472L8.48823 7.99541ZM8.68694 14.4162C9.24442 14.9272 9.66671 15.5535 9.66671 16.2498C9.66671 16.6038 9.48133 17.0275 9.12953 17.3793C8.77774 17.7311 8.35401 17.9165 8.00004 17.9165C7.62875 17.9165 7.20467 17.7372 6.86389 17.404C6.52569 17.0733 6.33337 16.6537 6.33337 16.2498C6.33337 15.5535 6.75566 14.9272 7.31314 14.4162C7.55659 14.1931 7.80289 14.0136 8.00004 13.8842C8.19719 14.0136 8.44349 14.1931 8.68694 14.4162Z" />
              </svg>
              <div class="sidebar__menu-text">Популярное</div>
            </a>
          </li>
          <!-- item -->
          <li class="sidebar__menu-item">
            <a class="menu__link {{ Request::is('news*') ? 'active' : '' }}" href="{{ route('news.index') }}">
              <svg class="icon" viewBox="0 0 22 22" fill="none" fill="#7D8688">
                <path
                  d="M11 2C10.5654 2 10.138 2.0308 9.71986 2.09035C9.58538 2.5785 9.4075 3.27861 9.22926 4.14011C9.05882 4.96392 8.8888 5.9317 8.75585 7H13.2441C13.1112 5.9317 12.9412 4.96392 12.7707 4.14011C12.5925 3.27861 12.4146 2.5785 12.2801 2.09035C11.862 2.0308 11.4346 2 11 2ZM7.27074 3.73489C7.34768 3.36303 7.42468 3.01904 7.4987 2.70646C5.51262 3.54596 3.89065 5.07805 2.93552 7H6.74127C6.8859 5.7707 7.07856 4.66374 7.27074 3.73489ZM6.56198 9H2.22302C2.07706 9.64322 2 10.3126 2 11C2 11.6874 2.07706 12.3568 2.22302 13H6.56198C6.52248 12.353 6.5 11.6843 6.5 11C6.5 10.3157 6.52248 9.64699 6.56198 9ZM6.74127 15H2.93552C3.89065 16.922 5.51262 18.454 7.4987 19.2935C7.42468 18.981 7.34768 18.637 7.27074 18.2651C7.07856 17.3363 6.8859 16.2293 6.74127 15ZM8.75585 15C8.8888 16.0683 9.05882 17.0361 9.22926 17.8599C9.4075 18.7214 9.58538 19.4215 9.71986 19.9097C10.138 19.9692 10.5654 20 11 20C11.4346 20 11.862 19.9692 12.2801 19.9097C12.4146 19.4215 12.5925 18.7214 12.7707 17.8599C12.9412 17.0361 13.1112 16.0683 13.2441 15H8.75585ZM13.4341 13C13.476 12.3536 13.5 11.6845 13.5 11C13.5 10.3155 13.476 9.64638 13.4341 9H8.56593C8.52402 9.64638 8.5 10.3155 8.5 11C8.5 11.6845 8.52402 12.3536 8.56593 13H13.4341ZM15.2587 15C15.1141 16.2293 14.9214 17.3363 14.7293 18.2651C14.6523 18.637 14.5753 18.981 14.5013 19.2935C16.4874 18.454 18.1094 16.922 19.0645 15H15.2587ZM19.777 13C19.9229 12.3568 20 11.6874 20 11C20 10.3126 19.9229 9.64322 19.777 9H15.438C15.4775 9.64699 15.5 10.3157 15.5 11C15.5 11.6843 15.4775 12.353 15.438 13H19.777ZM14.5013 2.70646C14.5753 3.01904 14.6523 3.36303 14.7293 3.73489C14.9214 4.66374 15.1141 5.7707 15.2587 7H19.0645C18.1094 5.07805 16.4874 3.54596 14.5013 2.70646ZM0 11C0 4.92487 4.92487 0 11 0C17.0751 0 22 4.92487 22 11C22 17.0751 17.0751 22 11 22C4.92487 22 0 17.0751 0 11Z" />
              </svg>

              <div class="sidebar__menu-text">Новости</div>
            </a>
          </li>
          <!-- item -->
          <li class="sidebar__menu-item">
            <a class="menu__link {{ Request::is('forum*') ? 'active' : '' }}"
              href="{{ route('categories_posts.index') }}">
              <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#7D8688">
                <g clip-path="url(#clip0_23_166)">
                  <path
                    d="M3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5C18 14.6421 14.6421 18 10.5 18H3V10.5ZM10.5 1C5.25329 1 1 5.25329 1 10.5V19C1 19.5523 1.44772 20 2 20H8.86528C10.1219 22.3773 12.6205 24 15.5 24H22C22.5523 24 23 23.5523 23 23V16.5C23 14.0452 21.82 11.8666 20 10.4996C19.9998 5.25307 15.7466 1 10.5 1ZM19.6859 12.9319C20.506 13.893 21 15.139 21 16.5V22H15.5C13.78 22 12.2431 21.2104 11.234 19.9721C15.3132 19.6604 18.6718 16.7724 19.6859 12.9319Z" />
                </g>
                <defs>
                  <clipPath id="clip0_23_166">
                    <rect width="24" height="24" fill="white" />
                  </clipPath>
                </defs>
              </svg>
              <div class="sidebar__menu-text">Форум</div>
            </a>
          </li>
        </ul>
      </div>


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
  @if (Str::of(request()->route()->getName())->test('/faq/'))
    @include('faq.faq_menue')
  @endif
</div>
