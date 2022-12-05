<div class="sidebar-right">
    @auth
        @if (request()->route()->getName() === 'personal.user.profile_settings')
            @include('personal.includes.profile_menu')
        @endif
    @endauth



    <div class="aside__ad">
        <a class="side-ad" href="#">
            <p class="side-ad__text">Реклама</p>
            <div class="side-ad__banner">
                <picture>
                    <source srcset="./images/content/side-ad.webp" type="image/webp"><img
                        src="./images/content/side-ad.jpg" alt="" />
                </picture>
            </div>
        </a>
    </div>

    <div class="aside__tags read__now">
        <p class="title__mini">читают сейчас</p>
        <div class="aside__tags-items">
            @foreach ($posts as $post)
                <!-- item -->
                <div class="read__now-item">
                    <a class="title__link" href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                    <div class="read__now-bottom">
                        <div class="read__now-left">
                            <div class="rn__left-item">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
                                    <path
                                        d="M2.57441 12.7075C3.03543 13.4213 3.71817 14.3706 4.60454 15.3161C6.39552 17.2264 8.89951 19 12 19C15.1005 19 17.6045 17.2264 19.3955 15.3161C20.2818 14.3706 20.9646 13.4213 21.4256 12.7075C21.6051 12.4296 21.75 12.1889 21.8593 12C21.75 11.8111 21.6051 11.5704 21.4256 11.2925C20.9646 10.5787 20.2818 9.6294 19.3955 8.68394C17.6045 6.77356 15.1005 5 12 5C8.89951 5 6.39552 6.77356 4.60454 8.68394C3.71817 9.6294 3.03543 10.5787 2.57441 11.2925C2.39492 11.5704 2.25003 11.8111 2.14074 12C2.25003 12.1889 2.39492 12.4296 2.57441 12.7075ZM23.8941 11.5521C23.8943 11.5525 23.8944 11.5528 23 12C23.8944 12.4472 23.8943 12.4475 23.8941 12.4479L23.8936 12.4488L23.8925 12.4511L23.889 12.458L23.8777 12.4802C23.8681 12.4987 23.8546 12.5247 23.8372 12.5576C23.8025 12.6233 23.752 12.7168 23.686 12.834C23.5542 13.0684 23.3601 13.3985 23.1057 13.7925C22.5979 14.5787 21.8432 15.6294 20.8545 16.6839C18.8955 18.7736 15.8995 21 12 21C8.10049 21 5.10448 18.7736 3.14546 16.6839C2.15683 15.6294 1.40207 14.5787 0.894336 13.7925C0.63985 13.3985 0.445792 13.0684 0.313971 12.834C0.248023 12.7168 0.19754 12.6233 0.162753 12.5576C0.145357 12.5247 0.131875 12.4987 0.122338 12.4802L0.11099 12.458L0.107539 12.4511L0.10637 12.4488L0.105925 12.4479C0.105741 12.4475 0.105573 12.4472 1 12C0.105573 11.5528 0.105741 11.5525 0.105925 11.5521L0.10637 11.5512L0.107539 11.5489L0.11099 11.542L0.122338 11.5198C0.131875 11.5013 0.145357 11.4753 0.162753 11.4424C0.19754 11.3767 0.248023 11.2832 0.313971 11.166C0.445792 10.9316 0.63985 10.6015 0.894336 10.2075C1.40207 9.42131 2.15683 8.3706 3.14546 7.31606C5.10448 5.22644 8.10049 3 12 3C15.8995 3 18.8955 5.22644 20.8545 7.31606C21.8432 8.3706 22.5979 9.42131 23.1057 10.2075C23.3601 10.6015 23.5542 10.9316 23.686 11.166C23.752 11.2832 23.8025 11.3767 23.8372 11.4424C23.8546 11.4753 23.8681 11.5013 23.8777 11.5198L23.889 11.542L23.8925 11.5489L23.8936 11.5512L23.8941 11.5521ZM23 12L23.8944 11.5528C24.0352 11.8343 24.0352 12.1657 23.8944 12.4472L23 12ZM0.105573 11.5528L1 12L0.105573 12.4472C-0.0351909 12.1657 -0.0351909 11.8343 0.105573 11.5528ZM10 12C10 10.8954 10.8954 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12ZM12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8Z" />
                                </svg>
                                <p class="input__text">6.9К</p>
                            </div>
                            <div class="rn__left-item">
                                <svg class="icon" viewBox="0 0 20 20" fill="none" fill="#000F13">
                                    <path
                                        d="M18 0.227539H2C0.9 0.227539 0 1.10708 0 2.18208V19.773L4 15.8639H18C19.1 15.8639 20 14.9844 20 13.9094V2.18208C20 1.10708 19.1 0.227539 18 0.227539ZM18 13.9094H4L2 15.8639V2.18208H18V13.9094Z" />
                                </svg>
                                <p class="input__text">{{ $post->comments->count() }}</p>
                            </div>
                        </div>
                        <div class="read__now-right">
                            <a class="rn__right-item smile active">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
                                    <path
                                        d="M15.5 11C16.3284 11 17 10.3284 17 9.5C17 8.67157 16.3284 8 15.5 8C14.6716 8 14 8.67157 14 9.5C14 10.3284 14.6716 11 15.5 11Z" />
                                    <path
                                        d="M8.5 11C9.32843 11 10 10.3284 10 9.5C10 8.67157 9.32843 8 8.5 8C7.67157 8 7 8.67157 7 9.5C7 10.3284 7.67157 11 8.5 11Z" />
                                    <path
                                        d="M11.99 2C6.47 2 2 6.48 2 12C2 17.52 6.47 22 11.99 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 11.99 2ZM12 20C7.58 20 4 16.42 4 12C4 7.58 7.58 4 12 4C16.42 4 20 7.58 20 12C20 16.42 16.42 20 12 20ZM12 16C10.52 16 9.25 15.19 8.55 14H6.88C7.68 16.05 9.67 17.5 12 17.5C14.33 17.5 16.32 16.05 17.12 14H15.45C14.75 15.19 13.48 16 12 16Z" />
                                </svg>
                                <p class="input__text">{{ $post->like->count() }}</p>
                            </a>
                            <a class="rn__right-item smile__sad">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
                                    <path
                                        d="M15.5 11C16.3284 11 17 10.3284 17 9.5C17 8.67157 16.3284 8 15.5 8C14.6716 8 14 8.67157 14 9.5C14 10.3284 14.6716 11 15.5 11Z" />
                                    <path
                                        d="M8.5 11C9.32843 11 10 10.3284 10 9.5C10 8.67157 9.32843 8 8.5 8C7.67157 8 7 8.67157 7 9.5C7 10.3284 7.67157 11 8.5 11Z" />
                                    <path
                                        d="M11.99 2C6.47 2 2 6.48 2 12C2 17.52 6.47 22 11.99 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 11.99 2ZM12 20C7.58 20 4 16.42 4 12C4 7.58 7.58 4 12 4C16.42 4 20 7.58 20 12C20 16.42 16.42 20 12 20ZM12 14C9.67 14 7.68 15.45 6.88 17.5H8.55C9.24 16.31 10.52 15.5 12 15.5C13.48 15.5 14.75 16.31 15.45 17.5H17.12C16.32 15.45 14.33 14 12 14Z" />
                                </svg>
                                <p class="input__text">{{ $post->dislike->count() }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="aside__tags sidebar__work">
        <p class="title__mini">Работа</p>
        <div class="aside__tags-items">
            <!-- item -->
            <div class="sidebar__work-item">
                <a class="title__link" href="#">Грузчик</a>
                <p class="title__count">164 вакансии</p>
            </div>

            <!-- item -->
            <div class="sidebar__work-item">
                <a class="title__link" href="#">Грузчик</a>
                <p class="title__count">164 вакансии</p>
            </div>

            <!-- item -->
            <div class="sidebar__work-item">
                <a class="title__link" href="#">Грузчик</a>
                <p class="title__count">164 вакансии</p>
            </div>

            <!-- item -->
            <div class="sidebar__work-item">
                <a class="title__link" href="#">Грузчик</a>
                <p class="title__count">164 вакансии</p>
            </div>

            <!-- item -->
            <div class="sidebar__work-item">
                <a class="title__link" href="#">Грузчик</a>
                <p class="title__count">164 вакансии</p>
            </div>

            <a class="underline__link" href="#">Все вакансии</a>
        </div>
    </div>

    <div class="aside__ad">
        <a class="side-ad" href="#">
            <p class="side-ad__text">Реклама</p>
            <div class="side-ad__banner">
                <picture>
                    <source srcset="./images/content/side-ad.webp" type="image/webp"><img
                        src="./images/content/side-ad.jpg" alt="" />
                </picture>
            </div>
        </a>
    </div>

    <div class="aside__tags sidebar__work">
        <p class="title__mini">популярные теги</p>
        <div class="aside__tags-items">
            <!-- item -->
            <div class="popular__tag-item">
                <a class="title__link" href="#">Одиночество</a>
                <p class="title__tags">43</p>
            </div>

            <!-- item -->
            <div class="popular__tag-item">
                <a class="title__link" href="#">Одиночество</a>
                <p class="title__tags">43</p>
            </div>

            <!-- item -->
            <div class="popular__tag-item">
                <a class="title__link" href="#">Одиночество</a>
                <p class="title__tags">43</p>
            </div>

            <!-- item -->
            <div class="popular__tag-item">
                <a class="title__link" href="#">Одиночество</a>
                <p class="title__tags">43</p>
            </div>

            <!-- item -->
            <div class="popular__tag-item">
                <a class="title__link" href="#">Одиночество</a>
                <p class="title__tags">43</p>
            </div>

            <!-- item -->
            <div class="popular__tag-item">
                <a class="title__link" href="#">Одиночество</a>
                <p class="title__tags">43</p>
            </div>

            <!-- item -->
            <div class="popular__tag-item">
                <a class="title__link" href="#">Одиночество</a>
                <p class="title__tags">43</p>
            </div>

        </div>
    </div>

</div>
