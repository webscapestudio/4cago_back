<div class="form-group">
  <label>Статус</label>
  <select class="form_control" name="published">
    @if (@isset($category->id))
      <option value="1" @if ($category->published == 1) selected = "" @endif>Опубликовано</option>
      <option value="0" @if ($category->published == 0) selected = "" @endif>Не опубликовано</option>
    @else
      <option value="1">Опубликовано</option>
      <option value="0">Не опубликовано</option>
    @endif
  </select>
</div>
<label>Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории" value="{{ $category->title }}">

@error('title')
  <div class="text-danger">{{ $message }}</div>
@enderror

<label>Краткое описание</label>
<textarea type="text" class="form-control" name="description" placeholder="Краткое описание категории" cols="30"
  rows="10">{{ $category->description }}</textarea>
@error('description')
  <div class="text-danger">{{ $message }}</div>
@enderror
<div class="form-group">
  <label>Родительская категорию</label>
  <select class="form-control" name="parent_id">
    <option value="0">-- без родительской категории --</option>
    @include('admin.categories.partials.categoriesEdit', ['categories' => $categories])
  </select>
  @error('parent_id')
    <div class="text-danger">{{ $message }}</div>
  @enderror
</div>
<input type="submit" class="btn btn-primary" value="Сохранить">
