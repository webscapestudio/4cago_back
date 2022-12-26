  @extends('admin.layouts.main')
  @section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Редактирование категории</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.category_question.index') }}">Категории</a></li>
                <li class="breadcrumb-item active">Редактирование категории</li>
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
            <form action="{{ route('admin.category_question.update', $categories_asked_question) }}" method="POST"
              class="w-25" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PATCH">
              @csrf
              <div class="form-group">
                <label>Статус</label>
                <select class="form_control" name="published">
                  @if (@isset($categories_asked_question->id))
                    <option value="0" @if ($categories_asked_question->published == 0) selected = "" @endif>Не опубликовано</option>
                    <option value="1" @if ($categories_asked_question->published == 1) selected = "" @endif>Опубликовано</option>
                  @else
                    <option value="0">Не опубликовано</option>
                    <option value="1">Опубликовано</option>
                  @endif
                </select>
              </div>
              <label>Наименование</label>
              <input type="text" class="form-control" name="title" placeholder="Заголовок категории"
                value="{{ $categories_asked_question->title }}">

              @error('title')
                <div class="text-danger">{{ $message }}</div>
              @enderror

              <div class="form-group">
                <label>Slug</label>
                <input type="text" class="form-control" name="slug" placeholder="Авто генерация" value=""
                  readonly="">
              </div>
              @error('slug')
                <div class="text-danger">{{ $message }}</div>
              @enderror

              <input type="submit" class="btn btn-primary" value="Сохранить">
            </form>
          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  @endsection
