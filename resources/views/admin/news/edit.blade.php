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

          <section class="content">
              <div class="row">
                  <div class="col-md-6">
                      < <form class="card card-primary" action="{{ route('admin.news.update', $news->id) }}" method="POST"
                          enctype="multipart/form-data">
                          @csrf
                          @method('PATCH')
                          <div class="card-header">
                              <h3 class="card-title">Главное</h3>
                              <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                      <i class="fas fa-minus"></i>
                                  </button>
                              </div>
                          </div>
                          <div class="card-body" style="display: block;">
                              <div class="form-group">
                                  <label for="inputName">Название новости</label>
                                  <input type="text" id="inputName" class="form-control" name="title"
                                      placeholder="Название новости" value="{{ $news->title }}">
                                  @error('title')
                                      <div class="text-danger">{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="inputDescription">Краткое описание</label>
                                  <textarea id="inputDescription" class="form-control" name="description" placeholder="Текст ..." rows="4"
                                      style="height: 170px;">{{ $news->description }}</textarea>
                                  @error('description')
                                      <div class="text-danger">{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="inputDescription">Текст новости</label>
                                  <textarea id="inputDescription" class="form-control" rows="4" style="height: 170px;" name="content"
                                      placeholder="Текст ...">{{ $news->content }}</textarea>

                                  @error('content')
                                      <div class="text-danger">{{ $message }}</div>
                                  @enderror
                              </div>
                              <label for="exampleInputFile">Загрузка файла</label>
                              @if (file_exists('storage/' . $news->news_image))
                                  <div class="row mb-3">
                                      <div class="col-sm-6">
                                          <div class="row">
                                              <div class="col-sm-6">
                                                  <img class="img-fluid pad"
                                                      src="{{ asset('storage/' . $news->news_image) }}" alt="Photo">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              @else
                              @endif
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
              </div>
          </section>




      </div>
  @endsection
