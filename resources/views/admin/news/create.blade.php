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
                      </div>
                  </div>
              </div>
          </div>

          <section class="content">
              <div class="row">
                  <div class="col-md-6">
                      <form class="card card-primary" action="{{ route('admin.news.store') }}" method="POST"
                          enctype="multipart/form-data">
                          @csrf
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
                                      placeholder="Название новости" value="{{ old('title') }}">
                                  @error('title')
                                      <div class="text-danger">{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="inputDescription">Краткое описание</label>
                                  <textarea id="inputDescription" class="form-control" name="description" placeholder="Текст ..." rows="4"
                                      style="height: 170px;">{{ old('description') }}</textarea>
                                  @error('description')
                                      <div class="text-danger">{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="inputDescription">Текст новости</label>
                                  <textarea id="inputDescription" class="form-control" rows="4" style="height: 170px;" name="content"
                                      placeholder="Текст ...">{{ old('content') }}</textarea>

                                  @error('content')
                                      <div class="text-danger">{{ $message }}</div>
                                  @enderror
                              </div>
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
              </div>
          </section>

      </div>
  @endsection
