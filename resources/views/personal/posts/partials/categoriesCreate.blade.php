@foreach ($categories as $category_list)
  <option value="{{ $category_list->id }}"
    @isset($category->id)

      @if ($category->parent_id == $category_list->id)
        selected=""
      @endif

      @if ($category->id == $category_list->id)
        hidden=""
      @endif

    @endisset>
    {!! $delimiter !!}{{ $category_list->title }}
  </option>

  @if (count($category_list->childrenCategories) > 0)
    @include('personal.posts.partials.categoriesCreate', [
        'categories' => $category_list->childrenCategories,
        'delimiter' => ' - ' . $delimiter,
    ])
  @endif
@endforeach
