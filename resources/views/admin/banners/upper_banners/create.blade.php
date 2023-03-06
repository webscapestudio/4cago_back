  @extends('admin.layouts.main')
  @section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Добавление банера</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.upper_banner.index') }}">Рекламные банера(верх)</a>
                </li>
                <li class="breadcrumb-item active">Добавление банера</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="row">
          <div class="col-md-6">
            <form class="card card-primary" action="{{ route('admin.upper_banner.store') }}" method="POST"
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
              <div class="card-body">
                <label>Статус</label>
                <select class="form_control" name="published">
                  @if (@isset($upper_banner->id))
                    <option value="0" @if ($upper_banner->published == 0) selected = "" @endif>Не
                      опубликовано</option>
                    <option value="1" @if ($upper_banner->published == 1) selected = "" @endif>
                      Опубликовано</option>
                  @else
                    <option value="0">Не опубликовано</option>
                    <option value="1">Опубликовано</option>
                  @endif
                </select>

                <div class="form-group">
                  <label for="inputName">Название рекламы</label>
                  <input type="text" id="inputName" class="form-control" name="title" placeholder="Название новости"
                    value="{{ old('title') }}">
                  @error('title')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="inputLink">Ссылка</label>
                  <input type="text" id="inputLink" class="form-control" name="link" placeholder="Ссылка..."
                    value="{{ old('link') }}">
                  @error('link')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <label for="exampleInputFile">Загрузка файла(мобильные устройства):</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file"name="banner_image_mob">

                  </div>
                </div>
                @error('banner_image_mob')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
                <label for="exampleInputFile">Загрузка файла(планшеты):</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="banner_image_tablet">
                  </div>
                </div>
                @error('banner_image_tablet')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
                <label for="exampleInputFile">Загрузка файла(десктопы):</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="banner_image_desktop">
                  </div>
                </div>
                @error('banner_image_desktop')
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
