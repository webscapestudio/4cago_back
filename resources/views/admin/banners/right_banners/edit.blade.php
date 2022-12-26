  @extends('admin.layouts.main')
  @section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Редактирование банера</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.right_banner.index') }}">Рекламные банера(справа)</a>
                </li>
                <li class="breadcrumb-item active">Редактирование банера</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <!-- /.content-header -->

      <section class="content">
        <div class="row">
          <div class="col-md-6">
            <form class="card card-primary" action="{{ route('admin.right_banner.update', $right_banner->id) }}"
              method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PATCH">
              @csrf
              <div class="card-header">
                <h3 class="card-title">Главное</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <label>Статус</label>
                <select class="form_control" name="published">
                  @if (@isset($right_banner->id))
                    <option value="0" @if ($right_banner->published == 0) selected = "" @endif>Не
                      опубликовано</option>
                    <option value="1" @if ($right_banner->published == 1) selected = "" @endif>
                      Опубликовано</option>
                  @else
                    <option value="0">Не опубликовано</option>
                    <option value="1">Опубликовано</option>
                  @endif
                </select>
              </div>
              <div class="form-group">
                <label for="inputName">Название рекламы</label>
                <input type="text" id="inputName" class="form-control" name="title" placeholder="Название новости"
                  value="{{ $right_banner->title }}">
                @error('title')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputLink">Ссылка</label>
                <input type="text" id="inputLink" class="form-control" name="link" placeholder="Ссылка..."
                  value="{{ $right_banner->link }}">
                @error('link')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <label for="exampleInputFile">Загрузка файла</label>
              @if ($right_banner->banner_image)
                <div class="row mb-3">
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-6">
                        <img class="img-fluid pad" src="{{ asset('storage/' . $right_banner->banner_image) }}"
                          alt="Photo">
                      </div>
                    </div>
                  </div>
                </div>
              @else
              @endif
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="banner_image">
                  <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                </div>
              </div>
              @error('banner_image')
                <div class="text-danger">{{ $message }}</div>
              @enderror
              <input type="submit" class="btn btn-primary" value="Сохранить">
            </form>
          </div>
        </div>
      </section>




    </div>
  @endsection
