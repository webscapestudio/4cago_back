@foreach ($child_categories as $category_list)
  <a class="forum__theme" href="{{ route('work.index', $category_list->id) }}">
    <div class="forum__theme-left">
      <p class="title__comment"> {{ $category_list->title }}</p>
      <p class="feed__text"> {{ $category_list->description }}</p>
    </div>
    <div class="forum__theme-right">
      <div class="right__themes">
        <p class="forum__tags">Объявления:</p>
        <p class="forum__tags count__theme">{{ $category_list->workCount->count() }}</p>
      </div>
    </div>
  </a>
  @if (count($category_list->childrenCategories) > 0)
    @include('categories_works.partials.child_category', [
        'child_categories' => $category_list->childrenCategories->where('published', '1'),
    ])
  @endif
@endforeach
