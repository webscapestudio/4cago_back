@foreach ($categories as $category_list)

  <option value="{{$category_list->id}}"
    {{$category->id == old('category_id')? 'selected' : ''}}
    @isset($category->id)

      @if ($category->parent_id == $category_list->id)
        selected=""
      @endif

      @if ($category->id == $category_list->id)
        hidden=""
      @endif

    @endisset

    >
    {!! $delimiter !!}{{$category_list->title}}
  </option>

  @if (count($category_list->childrenCategories) > 0)

    @include('admin.categories.partials.categoriesEdit', [
      'categories' => $category_list->childrenCategories,
      'delimiter'  => ' - ' . $delimiter 
    ])

  @endif
@endforeach