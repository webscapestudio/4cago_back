  @extends('admin.layouts.main')
  @section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Добавление категории</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Категории</a></li>
                <li class="breadcrumb-item active">Добавление категории</li>
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
            <form action="{{ route('admin.category_question.store') }}" method="POST" class="w-25"
              enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Статус</label>
                <select class="form_control" name="published">
                  @if (@isset($category->id))
                    <option value="0" @if ($category->published == 0) selected = "" @endif>Не опубликовано</option>
                    <option value="1" @if ($category->published == 1) selected = "" @endif>Опубликовано</option>
                  @else
                    <option value="0">Не опубликовано</option>
                    <option value="1">Опубликовано</option>
                  @endif
                </select>
              </div>
              <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control" name="title" placeholder="Заголовок категории"
                  value="{{ old('title') }}">

                @error('title')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Slug</label>
                <input type="text" class="form-control" name="slug" placeholder="Авто генерация" value=""
                  readonly="">
              </div>
              @error('slug')
                <div class="text-danger">{{ $message }}</div>
              @enderror
              <input type="submit" class="btn btn-primary" value="Добавить">

            </form>
          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  @endsection
