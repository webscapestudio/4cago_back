<div class="form-group">
  <label for="">Статус</label>
  <select class="form_control" name="published">
    @if (@isset($category_work->id))
      <option value="0" @if ($category_work->published == 0) selected = "" @endif>Не опубликовано</option>
      <option value="1" @if ($category_work->published == 1) selected = "" @endif>Опубликовано</option>
    @else
      <option value="0">Не опубликовано</option>
      <option value="1">Опубликовано</option>
    @endif
  </select>
</div>

<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории" value="">

@error('title')
  <div class="text-danger">{{ $message }}</div>
@enderror

<label>Краткое описание</label>
<textarea type="text" class="form-control" name="description" placeholder="Краткое описание категории" cols="30"
  rows="10">{{ old('description') }}</textarea>
@error('description')
  <div class="text-danger">{{ $message }}</div>
@enderror

<div class="form-group">
  <label>Родительская категорию</label>
  <select class="form-control" name="parent_id">
    <option value="0">-- без родительской категории --</option>
    @include('admin.categories_works.partials.categories_worksCreate', [
        'categories_works' => $categories_works,
    ])
  </select>
  @error('parent_id')
    <div class="text-danger">{{ $message }}</div>
  @enderror
</div>
<input type="submit" class="btn btn-primary" value="Сохранить">
