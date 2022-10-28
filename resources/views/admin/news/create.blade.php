  @extends('admin.layouts.main')
  @section('content')
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1 class="m-0">Добавление новости</h1>
                      </div><!-- /.col -->
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                              <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">Новости</a></li>
                              <li class="breadcrumb-item active">Добавление новости</li>
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
                      <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group w-50">
                              <input type="text" class="form-control" name="title" placeholder="Название новости"
                                  value="{{ old('title') }}">
                              @error('title')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label>Краткое описание</label>
                              <textarea name="description" class="form-control" rows="3" placeholder="Текст ...">{{ old('description') }}</textarea>
                              @error('description')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="form-group">
                              <label for="exampleInputFile">Текст</label>
                              <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                              @error('content')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="exampleInputFile">Загрузка файла</label>
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

                          <input type="submit" class="btn btn-primary" value="Добавить">
                      </form>
                  </div>
                  <!-- /.row -->

              </div><!-- /.container-fluid -->
          </section>
          <!-- /.content -->
      </div>
  @endsection
