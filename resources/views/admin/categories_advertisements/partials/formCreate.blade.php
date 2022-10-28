<div class="form-group">
    <label for="">Статус</label>
    <select class="form_control" name="published">
        @if (@isset($category_advertisement->id))
            <option value="0" @if ($category_advertisement->published == 0) selected = "" @endif>Не опубликовано</option>
            <option value="1" @if ($category_advertisement->published == 1) selected = "" @endif>Опубликовано</option>
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
<div class="form-group">
    <label for="">Slug</label>
    <input type="text" class="form-control" name="slug" placeholder="Авто генерация" value=""
        readonly="">
</div>
@error('slug')
    <div class="text-danger">{{ $message }}</div>
@enderror
<div class="form-group">
    <label>Родительская категорию</label>
    <select class="form-control" name="parent_id">
        <option value="0">-- без родительской категории --</option>
        @include('admin.categories_advertisements.partials.categories_advertisementsCreate', [
            'categories_advertisements' => $categories_advertisements,
        ])
    </select>
    @error('category_advertisement_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<input type="submit" class="btn btn-primary" value="Сохранить">
