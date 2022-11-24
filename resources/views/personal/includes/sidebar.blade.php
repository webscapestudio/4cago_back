<div class="profile__card-bottom category__tabs_wrap">
    <ul class="theme__items">
        <li class="theme__item">
            <a href="{{ route('personal.post.index') }}" class="profile__link tabs-btn">Записи</a>
        </li>
        <li class="theme__item">
            <a href="{{ route('personal.advertisement.index') }}" class="profile__link tabs-btn">Обьявления</a>
        </li>
        <li class="theme__item">
            <a href="{{ route('personal.work.index') }}" class="profile__link tabs-btn">Вакансии</a>
        </li>
        <li class="theme__item">
            <button class="profile__link tabs-btn">Знакомства</button>
        </li>
        <li class="theme__item">
            <button class="profile__link tabs-btn">Комментарии</button>
        </li>
        <li class="theme__item">
            <button class="profile__link tabs-btn">Черновики</button>
        </li>
        <li class="theme__item">
            <a href="{{ route('personal.favourite.index') }}" class="profile__link tabs-btn">Избранное</a>
        </li>
    </ul>
    <div class="category__tabs_content">
        <div class="category__tabs"></div>
        <div class="category__tabs"></div>
        <div class="category__tabs"></div>
        <div class="category__tabs"></div>
        <div class="category__tabs"></div>
        <div class="category__tabs"></div>
        <div class="category__tabs"></div>
    </div>
</div>
