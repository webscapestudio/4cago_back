  @extends('admin.layouts.main')
  @section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Редактирование правила</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">Правила</a></li>
                <li class="breadcrumb-item active">Редактирование правила</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <section class="content">
        <div class="row">
          <div class="col-md-6">
            <form class="card card-primary" action="{{ route('admin.rule.update', $rules->id) }}" method="POST"
              enctype="multipart/form-data">
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
                  @if (@isset($rules->id))
                    <option value="1" @if ($rules->published == 1) selected = "" @endif>
                      Опубликовано</option>
                    <option value="0" @if ($rules->published == 0) selected = "" @endif>Не
                      опубликовано</option>
                  @else
                    <option value="1">Опубликовано</option>
                    <option value="0">Не опубликовано</option>
                  @endif
                </select>
              </div>
              <div class="card-body" style="display: block;">
                <div class="form-group">
                  <label for="inputName">Название правила</label>
                  <input type="text" id="inputName" class="form-control" name="title" placeholder="Название новости"
                    value="{{ $rules->title }}">
                  @error('title')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="inputDescription">Текст правила</label>
                  <textarea id="inputDescription" class="tiny_editor" rows="4" style="height: 170px;" name="content"
                    placeholder="Текст ...">{{ $rules->content }}</textarea>

                  @error('content')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

              </div>
              <input type="submit" class="btn btn-primary" value="Сохранить">
            </form>
          </div>
        </div>
      </section>




    </div>
  @endsection
