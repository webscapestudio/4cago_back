  @extends('personal.main.index')
  @section('content')
      <form action="{{ route('personal.post.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group w-25">
              <input type="text" class="form-control" name="title" placeholder="Название поста" value="{{ old('title') }}">
              @error('title')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
          <div class="form-group">
              <textarea id="summernote" name="content">{{ old('content') }}</textarea>
              @error('content')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
          <div class="form-group">
              <label for="exampleInputFile">Загрузка файла</label>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="post_image">
                      <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                  </div>
              </div>
              @error('post_image')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
          <div class="form-group">
              <label>Выберите категорию</label>
              <select class="form-control" name="category_id">
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                          {{ $category->title }}
                      </option>
                  @endforeach
              </select>
              @error('category_id')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
          <div class="form-group">
              <label>Теги</label>
              <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите теги"
                  style="width: 100%;">
                  @foreach ($tags as $tag)
                      <option {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected' : '' }}
                          value="{{ $tag->id }}" {{ $tag->id == old('tag_id') ? 'selected' : '' }}>
                          {{ $tag->title }}</option>
                  @endforeach
              </select>
              @error('tag_ids')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>

          <input type="submit" class="btn btn-primary" value="Добавить">
      </form>
  @endsection
