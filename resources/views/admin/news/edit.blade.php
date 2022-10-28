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
                              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                              <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">Новости</a></li>
                              <li class="breadcrumb-item active">Редактирование новости</li>
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
                      <form action="{{ route('admin.news.update', $news->id) }}" method="POST"
                          enctype="multipart/form-data">
                          @csrf
                          @method('PATCH')
                          <div class="form-group w-25">
                              <input type="text" class="form-control" name="title" placeholder="Название поста"
                                  value="{{ $news->title }}">
                              @error('title')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <textarea id="summernote" name="content">{{ $news->content }}</textarea>
                              @error('content')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="exampleInputFile">Загрузка файла</label>
                              <div class="w-50 mb-2">
                                  <img src="{{ asset('storage/' . $news->news_image) }}" alt="news_image" class="w-50">
                              </div>
                              <div class="input-group">
                                  <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="exampleInputFile"
                                          name="news_image">
                                      <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                  </div>
                              </div>
                              @error('news_image')
                                  <div class="text-danger">{{ $message }}</div>
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
