@foreach ($child_categories as $category_list)
  <a class="forum__theme" href="{{ route('advertisement.index', $category_list->id) }}">
    <div class="forum__theme-left">
      <p class="title__comment"> {{ $category_list->title }}</p>
      <p class="feed__text"> {{ $category_list->description }}</p>
    </div>
    <div class="forum__theme-right">
      <div class="right__themes">
        <p class="forum__tags">Темы:</p>
        <p class="forum__tags count__theme">{{ $category_list->advertisementCount->count() }}</p>
      </div>
      <div class="right__themes">
        <p class="forum__tags">Сообщения:</p>
        <p class="forum__tags count__message">{{ $category_list->comments->count() }}</p>
      </div>
    </div>
  </a>
  @if (count($category_list->childrenCategories) > 0)
    @include('categories_advertisements.partials.child_category', [
        'child_categories' => $category_list->childrenCategories->where('published', '1'),
    ])
  @endif
@endforeach
