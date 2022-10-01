  @extends('admin.layouts.main')
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактирование поста</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row"> 
          <form action="{{ route('admin.post.update', $post->id) }}" method="POST"  enctype="multipart/form-data" >
            @csrf
            @method('PATCH')
            <div class="form-group w-25">
              <input type="text" class="form-control" name="title" placeholder="Название поста"
              value="{{$post->title}}">
            @error('title')
                <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group">
            <textarea id="summernote" name="content">{{ $post->content }}</textarea>
            @error('content')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Загрузка файла</label>
            <div class="w-50 mb-2">
              <img src="{{ asset('storage/' . $post->post_image)  }}" alt="post_image" class="w-50">
            </div>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="post_image">
                <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
              </div>
            </div>
            @error('post_image')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Выберите категорию</label>
            <select class="form-control" name="category_id">
              @foreach ($categories as $category)
              <option value="{{$category->id}}"
                {{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->title}}</option>
              @endforeach
            </select>
            @error('category_id')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Теги</label>
            <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
              @foreach ($tags as $tag)
              <option {{is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : ''}} value="{{$tag->id}}"
                {{$tag->id == old('tag_id')? 'selected' : ''}}>{{$tag->title}}</option>
              @endforeach
            </select>
            @error('tag_id')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
            <input type="submit" class="btn btn-primary" value="Обновить">
          </form>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
      @endsection