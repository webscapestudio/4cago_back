@foreach ($categories_works as $category_work_list)
    <option value="{{ $category_work_list->id }}"
        @isset($category_work->id)

      @if ($category_work->parent_id == $category_work_list->id)
        selected=""
      @endif

      @if ($category_work->id == $category_work_list->id)
        hidden=""
      @endif

    @endisset>
        {!! $delimiter !!}{{ $category_work_list->title }}
    </option>

    @if (count($category_work_list->childrenCategories) > 0)
        @include('admin.categories_works.partials.categories_worksCreate', [
            'categories_works' => $category_work_list->childrenCategories,
            'delimiter' => ' - ' . $delimiter,
        ])
    @endif
@endforeach
