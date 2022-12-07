@foreach ($child_categories as $category_list)
    <a class="forum__theme" href="{{ route('post.index', $category_list->id) }}">
        <div class="forum__theme-left">
            <p class="title__comment"> {{ $category_list->title }}</p>
            <p class="feed__text"> {{ $category_list->description }}</p>
        </div>
        <div class="forum__theme-right">
            <div class="right__themes">
                <p class="forum__tags">Темы:</p>
                <p class="forum__tags count__theme">180</p>
            </div>
            <div class="right__themes">
                <p class="forum__tags">Сообщения:</p>
                <p class="forum__tags count__message">1.6К</p>
            </div>
        </div>
    </a>
@endforeach
