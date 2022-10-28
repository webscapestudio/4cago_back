@foreach ($categories_advertisements as $category_advertisement_list)
    <option value="{{ $category_advertisement_list->id }}"
        {{ $category_advertisement->id == old('category_advertisement_id') ? 'selected' : '' }}
        @isset($category_advertisement->id)

      @if ($category_advertisement->parent_id == $category_advertisement_list->id)
        selected=""
      @endif

      @if ($category_advertisement->id == $category_advertisement_list->id)
        hidden=""
      @endif

    @endisset>
        {!! $delimiter !!}{{ $category_advertisement_list->title }}
    </option>

    @if (count($category_advertisement_list->childrenCategories) > 0)
        @include('personal.advertisements.partials.categories_advertisementsCreate', [
            'categories_advertisements' => $category_advertisement_list->childrenCategories,
            'delimiter' => ' - ' . $delimiter,
        ])
    @endif
@endforeach