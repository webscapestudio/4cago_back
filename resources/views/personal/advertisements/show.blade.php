@extends('layouts.main')
@section('content')
    <div class="feed">
        <div class="ad__card">
            <div class="post__header">
                <div class="post__header-left">
                    <div class="user__avatar">
                        <picture>
                            <source srcset="./images/avatars/user-ava.webp" type="image/webp"><img
                                src="./images/avatars/user-ava.jpg" alt="user">
                        </picture>
                    </div>
                    <p class="user__name">
                        {{ $advertisement->author->name ?? null }}{{ $advertisement->created_at }}
                    </p>
                    <div class="post__date">{{ $advertisement->created_at }}</div>
                </div>
                <div class="post__header-right">
                    <div class="post__drop">
                        <div class="meatballs">
                            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#000F13">
                                <path d="M5 10C3.9 10 3 10.9 3 12C3 13.1 3.9 14 5 14C6.1 14 7 13.1 7 12C7 10.9 6.1 10 5 10Z"
                                    stroke-width="1.5"></path>
                                <path
                                    d="M19 10C17.9 10 17 10.9 17 12C17 13.1 17.9 14 19 14C20.1 14 21 13.1 21 12C21 10.9 20.1 10 19 10Z"
                                    stroke-width="1.5"></path>
                                <path
                                    d="M12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                                    stroke-width="1.5"></path>
                            </svg>
                        </div>

                        <div class="dropdown">
                            <a href="{{ route('personal.advertisement.edit', $advertisement->id) }}"
                                class="text-success">Изменить</a>

                            <form action="{{ route('personal.advertisement.destroy', $advertisement->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Удалить</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
            <div class="post__main">
                <a class="post__title" href="ad-post.html">{{ $advertisement->title }}</a>
                <p class="post__text">{{ $advertisement->content }}</p>

                @if (file_exists('storage/' . $advertisement->advertisement_image))
                    <div class="post__img">
                        <picture>
                            <source srcset="{{ asset('storage/' . $advertisement->advertisement_image) }}"
                                type="image/webp"><img src="{{ asset('storage/' . $advertisement->advertisement_image) }}"
                                alt="">
                        </picture>
                    </div>
                @else
                @endif

            </div>
            <div class="post__bottom">
                <div class="post__tags">
                    @foreach ($advertisement->tags as $tag)
                        <div class="tag">{{ $tag->title }}</div>
                    @endforeach
                </div>
                <div class="post__actions">
                    @auth()
                        <div class="post__actions-left">
                            <a class="post__views post__actions-left-item" href="#">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
                                    <path
                                        d="M2.57441 12.7075C3.03543 13.4213 3.71817 14.3706 4.60454 15.3161C6.39552 17.2264 8.89951 19 12 19C15.1005 19 17.6045 17.2264 19.3955 15.3161C20.2818 14.3706 20.9646 13.4213 21.4256 12.7075C21.6051 12.4296 21.75 12.1889 21.8593 12C21.75 11.8111 21.6051 11.5704 21.4256 11.2925C20.9646 10.5787 20.2818 9.6294 19.3955 8.68394C17.6045 6.77356 15.1005 5 12 5C8.89951 5 6.39552 6.77356 4.60454 8.68394C3.71817 9.6294 3.03543 10.5787 2.57441 11.2925C2.39492 11.5704 2.25003 11.8111 2.14074 12C2.25003 12.1889 2.39492 12.4296 2.57441 12.7075ZM23.8941 11.5521C23.8943 11.5525 23.8944 11.5528 23 12C23.8944 12.4472 23.8943 12.4475 23.8941 12.4479L23.8936 12.4488L23.8925 12.4511L23.889 12.458L23.8777 12.4802C23.8681 12.4987 23.8546 12.5247 23.8372 12.5576C23.8025 12.6233 23.752 12.7168 23.686 12.834C23.5542 13.0684 23.3601 13.3985 23.1057 13.7925C22.5979 14.5787 21.8432 15.6294 20.8545 16.6839C18.8955 18.7736 15.8995 21 12 21C8.10049 21 5.10448 18.7736 3.14546 16.6839C2.15683 15.6294 1.40207 14.5787 0.894336 13.7925C0.63985 13.3985 0.445792 13.0684 0.313971 12.834C0.248023 12.7168 0.19754 12.6233 0.162753 12.5576C0.145357 12.5247 0.131875 12.4987 0.122338 12.4802L0.11099 12.458L0.107539 12.4511L0.10637 12.4488L0.105925 12.4479C0.105741 12.4475 0.105573 12.4472 1 12C0.105573 11.5528 0.105741 11.5525 0.105925 11.5521L0.10637 11.5512L0.107539 11.5489L0.11099 11.542L0.122338 11.5198C0.131875 11.5013 0.145357 11.4753 0.162753 11.4424C0.19754 11.3767 0.248023 11.2832 0.313971 11.166C0.445792 10.9316 0.63985 10.6015 0.894336 10.2075C1.40207 9.42131 2.15683 8.3706 3.14546 7.31606C5.10448 5.22644 8.10049 3 12 3C15.8995 3 18.8955 5.22644 20.8545 7.31606C21.8432 8.3706 22.5979 9.42131 23.1057 10.2075C23.3601 10.6015 23.5542 10.9316 23.686 11.166C23.752 11.2832 23.8025 11.3767 23.8372 11.4424C23.8546 11.4753 23.8681 11.5013 23.8777 11.5198L23.889 11.542L23.8925 11.5489L23.8936 11.5512L23.8941 11.5521ZM23 12L23.8944 11.5528C24.0352 11.8343 24.0352 12.1657 23.8944 12.4472L23 12ZM0.105573 11.5528L1 12L0.105573 12.4472C-0.0351909 12.1657 -0.0351909 11.8343 0.105573 11.5528ZM10 12C10 10.8954 10.8954 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12ZM12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8Z">
                                    </path>
                                </svg>
                                <p class="post__views_num">6.9K</p>
                            </a>
                            <a class="post__comments post__actions-left-item" href="#">
                                <svg class="icon" viewBox="0 0 20 20" fill="none" fill="#000F13">
                                    <path
                                        d="M18 0.227539H2C0.9 0.227539 0 1.10708 0 2.18208V19.773L4 15.8639H18C19.1 15.8639 20 14.9844 20 13.9094V2.18208C20 1.10708 19.1 0.227539 18 0.227539ZM18 13.9094H4L2 15.8639V2.18208H18V13.9094Z">
                                    </path>
                                </svg>
                                <p class="post__coments_num">42</p>
                            </a>

                            <form class="post__pins post__actions-left-item active"
                                action="{{ route('advertisement.favourite.store', $advertisement->id) }}" method="POST">
                                @csrf

                                <button type="submit">
                                    @if (auth()->user()->favourite)
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F16">
                                            <path
                                                d="M4 4C4 2.34315 5.34315 1 7 1H17C18.6569 1 20 2.34315 20 4V22C20 22.3905 19.7727 22.7453 19.4179 22.9085C19.0631 23.0717 18.6457 23.0134 18.3492 22.7593L12 17.3171L5.65079 22.7593C5.35428 23.0134 4.93694 23.0717 4.58214 22.9085C4.22734 22.7453 4 22.3905 4 22V4ZM7 3C6.44772 3 6 3.44772 6 4V19.8258L11.3492 15.2407C11.7237 14.9198 12.2763 14.9198 12.6508 15.2407L18 19.8258V4C18 3.44772 17.5523 3 17 3H7Z">
                                            </path>
                                        </svg>
                                    @else
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4 4C4 2.34315 5.34315 1 7 1H17C18.6569 1 20 2.34315 20 4V22C20 22.3905 19.7727 22.7453 19.4179 22.9085C19.0631 23.0717 18.6457 23.0134 18.3492 22.7593L12 17.3171L5.65079 22.7593C5.35428 23.0134 4.93694 23.0717 4.58214 22.9085C4.22734 22.7453 4 22.3905 4 22V4ZM7 3C6.44772 3 6 3.44772 6 4V19.8258L11.3492 15.2407C11.7237 14.9198 12.2763 14.9198 12.6508 15.2407L18 19.8258V4C18 3.44772 17.5523 3 17 3H7Z"
                                                fill="#000F13"></path>
                                        </svg>
                                    @endif
                                </button>
                                <p class="post__pins_num">

                                    {{ $advertisement->favourite->count() }}

                                </p>
                            </form>


                        </div>
                        <div class="post__actions-right">

                            <form class="post__smile post__actions-right-item"
                                action="{{ route('advertisement.like.store', $advertisement->id) }}" method="POST">
                                @csrf
                                <button type="submit">
                                    @if (auth()->user()->like)
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
                                            <path
                                                d="M15.5 11C16.3284 11 17 10.3284 17 9.5C17 8.67157 16.3284 8 15.5 8C14.6716 8 14 8.67157 14 9.5C14 10.3284 14.6716 11 15.5 11Z">
                                            </path>
                                            <path
                                                d="M8.5 11C9.32843 11 10 10.3284 10 9.5C10 8.67157 9.32843 8 8.5 8C7.67157 8 7 8.67157 7 9.5C7 10.3284 7.67157 11 8.5 11Z">
                                            </path>
                                            <path
                                                d="M11.99 2C6.47 2 2 6.48 2 12C2 17.52 6.47 22 11.99 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 11.99 2ZM12 20C7.58 20 4 16.42 4 12C4 7.58 7.58 4 12 4C16.42 4 20 7.58 20 12C20 16.42 16.42 20 12 20ZM12 16C10.52 16 9.25 15.19 8.55 14H6.88C7.68 16.05 9.67 17.5 12 17.5C14.33 17.5 16.32 16.05 17.12 14H15.45C14.75 15.19 13.48 16 12 16Z">
                                            </path>
                                        </svg>
                                    @else
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
                                            <path
                                                d="M15.5 11C16.3284 11 17 10.3284 17 9.5C17 8.67157 16.3284 8 15.5 8C14.6716 8 14 8.67157 14 9.5C14 10.3284 14.6716 11 15.5 11Z">
                                            </path>
                                            <path
                                                d="M8.5 11C9.32843 11 10 10.3284 10 9.5C10 8.67157 9.32843 8 8.5 8C7.67157 8 7 8.67157 7 9.5C7 10.3284 7.67157 11 8.5 11Z">
                                            </path>
                                            <path
                                                d="M11.99 2C6.47 2 2 6.48 2 12C2 17.52 6.47 22 11.99 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 11.99 2ZM12 20C7.58 20 4 16.42 4 12C4 7.58 7.58 4 12 4C16.42 4 20 7.58 20 12C20 16.42 16.42 20 12 20ZM12 16C10.52 16 9.25 15.19 8.55 14H6.88C7.68 16.05 9.67 17.5 12 17.5C14.33 17.5 16.32 16.05 17.12 14H15.45C14.75 15.19 13.48 16 12 16Z">
                                            </path>
                                        </svg>
                                    @endif
                                </button>
                                <p class="post__smile-num">{{ $advertisement->like->count() }}</p>
                            </form>

                            <form class="post__smile-sad post__actions-right-item active"
                                action="{{ route('advertisement.dislike.store', $advertisement->id) }}" method="POST">
                                @csrf
                                <button type="submit">
                                    @if (auth()->user()->dislike)
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
                                            <path
                                                d="M15.5 11C16.3284 11 17 10.3284 17 9.5C17 8.67157 16.3284 8 15.5 8C14.6716 8 14 8.67157 14 9.5C14 10.3284 14.6716 11 15.5 11Z">
                                            </path>
                                            <path
                                                d="M8.5 11C9.32843 11 10 10.3284 10 9.5C10 8.67157 9.32843 8 8.5 8C7.67157 8 7 8.67157 7 9.5C7 10.3284 7.67157 11 8.5 11Z">
                                            </path>
                                            <path
                                                d="M11.99 2C6.47 2 2 6.48 2 12C2 17.52 6.47 22 11.99 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 11.99 2ZM12 20C7.58 20 4 16.42 4 12C4 7.58 7.58 4 12 4C16.42 4 20 7.58 20 12C20 16.42 16.42 20 12 20ZM12 14C9.67 14 7.68 15.45 6.88 17.5H8.55C9.24 16.31 10.52 15.5 12 15.5C13.48 15.5 14.75 16.31 15.45 17.5H17.12C16.32 15.45 14.33 14 12 14Z">
                                            </path>
                                        </svg>
                                    @else
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
                                            <path
                                                d="M15.5 11C16.3284 11 17 10.3284 17 9.5C17 8.67157 16.3284 8 15.5 8C14.6716 8 14 8.67157 14 9.5C14 10.3284 14.6716 11 15.5 11Z">
                                            </path>
                                            <path
                                                d="M8.5 11C9.32843 11 10 10.3284 10 9.5C10 8.67157 9.32843 8 8.5 8C7.67157 8 7 8.67157 7 9.5C7 10.3284 7.67157 11 8.5 11Z">
                                            </path>
                                            <path
                                                d="M11.99 2C6.47 2 2 6.48 2 12C2 17.52 6.47 22 11.99 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 11.99 2ZM12 20C7.58 20 4 16.42 4 12C4 7.58 7.58 4 12 4C16.42 4 20 7.58 20 12C20 16.42 16.42 20 12 20ZM12 14C9.67 14 7.68 15.45 6.88 17.5H8.55C9.24 16.31 10.52 15.5 12 15.5C13.48 15.5 14.75 16.31 15.45 17.5H17.12C16.32 15.45 14.33 14 12 14Z">
                                            </path>
                                        </svg>
                                    @endif
                                </button>
                                <p class="post__smile-sad-num">{{ $advertisement->dislike->count() }}</p>
                            </form>
                        </div>
                    @endauth
                    @guest
                        <div class="post__actions-left">
                            <a class="post__views post__actions-left-item" href="#">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
                                    <path
                                        d="M2.57441 12.7075C3.03543 13.4213 3.71817 14.3706 4.60454 15.3161C6.39552 17.2264 8.89951 19 12 19C15.1005 19 17.6045 17.2264 19.3955 15.3161C20.2818 14.3706 20.9646 13.4213 21.4256 12.7075C21.6051 12.4296 21.75 12.1889 21.8593 12C21.75 11.8111 21.6051 11.5704 21.4256 11.2925C20.9646 10.5787 20.2818 9.6294 19.3955 8.68394C17.6045 6.77356 15.1005 5 12 5C8.89951 5 6.39552 6.77356 4.60454 8.68394C3.71817 9.6294 3.03543 10.5787 2.57441 11.2925C2.39492 11.5704 2.25003 11.8111 2.14074 12C2.25003 12.1889 2.39492 12.4296 2.57441 12.7075ZM23.8941 11.5521C23.8943 11.5525 23.8944 11.5528 23 12C23.8944 12.4472 23.8943 12.4475 23.8941 12.4479L23.8936 12.4488L23.8925 12.4511L23.889 12.458L23.8777 12.4802C23.8681 12.4987 23.8546 12.5247 23.8372 12.5576C23.8025 12.6233 23.752 12.7168 23.686 12.834C23.5542 13.0684 23.3601 13.3985 23.1057 13.7925C22.5979 14.5787 21.8432 15.6294 20.8545 16.6839C18.8955 18.7736 15.8995 21 12 21C8.10049 21 5.10448 18.7736 3.14546 16.6839C2.15683 15.6294 1.40207 14.5787 0.894336 13.7925C0.63985 13.3985 0.445792 13.0684 0.313971 12.834C0.248023 12.7168 0.19754 12.6233 0.162753 12.5576C0.145357 12.5247 0.131875 12.4987 0.122338 12.4802L0.11099 12.458L0.107539 12.4511L0.10637 12.4488L0.105925 12.4479C0.105741 12.4475 0.105573 12.4472 1 12C0.105573 11.5528 0.105741 11.5525 0.105925 11.5521L0.10637 11.5512L0.107539 11.5489L0.11099 11.542L0.122338 11.5198C0.131875 11.5013 0.145357 11.4753 0.162753 11.4424C0.19754 11.3767 0.248023 11.2832 0.313971 11.166C0.445792 10.9316 0.63985 10.6015 0.894336 10.2075C1.40207 9.42131 2.15683 8.3706 3.14546 7.31606C5.10448 5.22644 8.10049 3 12 3C15.8995 3 18.8955 5.22644 20.8545 7.31606C21.8432 8.3706 22.5979 9.42131 23.1057 10.2075C23.3601 10.6015 23.5542 10.9316 23.686 11.166C23.752 11.2832 23.8025 11.3767 23.8372 11.4424C23.8546 11.4753 23.8681 11.5013 23.8777 11.5198L23.889 11.542L23.8925 11.5489L23.8936 11.5512L23.8941 11.5521ZM23 12L23.8944 11.5528C24.0352 11.8343 24.0352 12.1657 23.8944 12.4472L23 12ZM0.105573 11.5528L1 12L0.105573 12.4472C-0.0351909 12.1657 -0.0351909 11.8343 0.105573 11.5528ZM10 12C10 10.8954 10.8954 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12ZM12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8Z">
                                    </path>
                                </svg>
                                <p class="post__views_num">6.9K</p>
                            </a>
                            <a class="post__comments post__actions-left-item" href="#">
                                <svg class="icon" viewBox="0 0 20 20" fill="none" fill="#000F13">
                                    <path
                                        d="M18 0.227539H2C0.9 0.227539 0 1.10708 0 2.18208V19.773L4 15.8639H18C19.1 15.8639 20 14.9844 20 13.9094V2.18208C20 1.10708 19.1 0.227539 18 0.227539ZM18 13.9094H4L2 15.8639V2.18208H18V13.9094Z">
                                    </path>
                                </svg>
                                <p class="post__coments_num">42</p>
                            </a>
                            <div class="post__pins post__actions-left-item active">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4 4C4 2.34315 5.34315 1 7 1H17C18.6569 1 20 2.34315 20 4V22C20 22.3905 19.7727 22.7453 19.4179 22.9085C19.0631 23.0717 18.6457 23.0134 18.3492 22.7593L12 17.3171L5.65079 22.7593C5.35428 23.0134 4.93694 23.0717 4.58214 22.9085C4.22734 22.7453 4 22.3905 4 22V4ZM7 3C6.44772 3 6 3.44772 6 4V19.8258L11.3492 15.2407C11.7237 14.9198 12.2763 14.9198 12.6508 15.2407L18 19.8258V4C18 3.44772 17.5523 3 17 3H7Z"
                                        fill="#000F13"></path>
                                </svg>
                                <p class="post__pins_num"> {{ $advertisement->favourite->count() }}</p>
                            </div>
                        </div>
                        <div class="post__actions-right">
                            <div class="post__smile post__actions-right-item">

                                <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
                                    <path
                                        d="M15.5 11C16.3284 11 17 10.3284 17 9.5C17 8.67157 16.3284 8 15.5 8C14.6716 8 14 8.67157 14 9.5C14 10.3284 14.6716 11 15.5 11Z">
                                    </path>
                                    <path
                                        d="M8.5 11C9.32843 11 10 10.3284 10 9.5C10 8.67157 9.32843 8 8.5 8C7.67157 8 7 8.67157 7 9.5C7 10.3284 7.67157 11 8.5 11Z">
                                    </path>
                                    <path
                                        d="M11.99 2C6.47 2 2 6.48 2 12C2 17.52 6.47 22 11.99 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 11.99 2ZM12 20C7.58 20 4 16.42 4 12C4 7.58 7.58 4 12 4C16.42 4 20 7.58 20 12C20 16.42 16.42 20 12 20ZM12 16C10.52 16 9.25 15.19 8.55 14H6.88C7.68 16.05 9.67 17.5 12 17.5C14.33 17.5 16.32 16.05 17.12 14H15.45C14.75 15.19 13.48 16 12 16Z">
                                    </path>
                                </svg>

                                <p class="post__smile-num">{{ $advertisement->like->count() }}</p>
                            </div>
                            <div class="post__smile-sad post__actions-right-item active">

                                <svg class="icon" viewBox="0 0 24 24" fill="none" fill="#000F13">
                                    <path
                                        d="M15.5 11C16.3284 11 17 10.3284 17 9.5C17 8.67157 16.3284 8 15.5 8C14.6716 8 14 8.67157 14 9.5C14 10.3284 14.6716 11 15.5 11Z">
                                    </path>
                                    <path
                                        d="M8.5 11C9.32843 11 10 10.3284 10 9.5C10 8.67157 9.32843 8 8.5 8C7.67157 8 7 8.67157 7 9.5C7 10.3284 7.67157 11 8.5 11Z">
                                    </path>
                                    <path
                                        d="M11.99 2C6.47 2 2 6.48 2 12C2 17.52 6.47 22 11.99 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 11.99 2ZM12 20C7.58 20 4 16.42 4 12C4 7.58 7.58 4 12 4C16.42 4 20 7.58 20 12C20 16.42 16.42 20 12 20ZM12 14C9.67 14 7.68 15.45 6.88 17.5H8.55C9.24 16.31 10.52 15.5 12 15.5C13.48 15.5 14.75 16.31 15.45 17.5H17.12C16.32 15.45 14.33 14 12 14Z">
                                    </path>
                                </svg>

                                <p class="post__smile-sad-num">{{ $advertisement->dislike->count() }}</p>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>

        <div class="comment">
            <p class="title__comment">Комментарии</p>
            <textarea name="text__comment" id="area__comment" placeholder="Написать комментарий..."></textarea>
            <div class="comment__bottom">
                <input type="file" name="file__comment" id="input__comment">
                <label for="input__comment"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#292D32">
                        <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M9 10C10.1046 10 11 9.10457 11 8C11 6.89543 10.1046 6 9 6C7.89543 6 7 6.89543 7 8C7 9.10457 7.89543 10 9 10Z"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M2.66998 18.9501L7.59998 15.6401C8.38998 15.1101 9.52998 15.1701 10.24 15.7801L10.57 16.0701C11.35 16.7401 12.61 16.7401 13.39 16.0701L17.55 12.5001C18.33 11.8301 19.59 11.8301 20.37 12.5001L22 13.9001"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </label>
                <button class="btn btn__blue">Отправить</button>
            </div>
        </div>

        <div class="ad__comment">
            <div class="ad__comment-top">
                <picture>
                    <source srcset="./images/avatars/user-ava.webp" type="image/webp"><img
                        src="./images/avatars/user-ava.jpg" alt="">
                </picture>
                <p class="user__name">Oleg Kirillov</p>
                <div class="post__date">сегодня в 16:21</div>
                <div class="post__drop">
                    <div class="meatballs">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#000F13">
                            <path d="M5 10C3.9 10 3 10.9 3 12C3 13.1 3.9 14 5 14C6.1 14 7 13.1 7 12C7 10.9 6.1 10 5 10Z"
                                stroke-width="1.5"></path>
                            <path
                                d="M19 10C17.9 10 17 10.9 17 12C17 13.1 17.9 14 19 14C20.1 14 21 13.1 21 12C21 10.9 20.1 10 19 10Z"
                                stroke-width="1.5"></path>
                            <path
                                d="M12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                                stroke-width="1.5"></path>
                        </svg>
                    </div>

                    <div class="dropdown report">
                        <button class="title__count report" data-micromodal-trigger="report">
                            Пожаловаться
                        </button>
                        <button class="title__count unlock">Разблокировать</button>
                    </div>

                </div>

            </div>
            <p class="post__text">Продам диван, 200$.</p>
            <div class="post__img">
                <picture>
                    <source srcset="./images/content/chair.webp" type="image/webp"><img src="./images/content/chair.jpg"
                        alt="">
                </picture>
            </div>
            <div class="ad__comment-bottom">
                <a class="comment__link" href="#">Ответить</a>
            </div>
        </div>

    </div>
@endsection
