  @extends('admin.layouts.main')
  @section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Добавление контакта</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.contact.index') }}">Контакты</a></li>
                <li class="breadcrumb-item active">Добавление контакта</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="row">
          <div class="col-md-6">
            <form class="card card-primary" action="{{ route('admin.contact.store') }}" method="POST"
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
                  @if (@isset($contact->id))
                    <option value="0" @if ($contact->published == 0) selected = "" @endif>Не
                      опубликовано</option>
                    <option value="1" @if ($contact->published == 1) selected = "" @endif>
                      Опубликовано</option>
                  @else
                    <option value="0">Не опубликовано</option>
                    <option value="1">Опубликовано</option>
                  @endif
                </select>
              </div>

              <div class="card-body" style="display: block;">
                <div class="form-group">
                  <label for="inputName">Название контакта(реклама, поддержка, моредация)</label>
                  <input type="text" id="inputName" class="form-control" name="title" placeholder="Название контакта"
                    value="{{ old('title') }}">
                  @error('title')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="inputDescription">Контакт(Текст)</label>
                  <input id="inputDescription" class="form-control" name="content" placeholder="Текст ..."
                    value="{{ old('content') }}">

                  @error('content')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="inputDescription">Контакт(Ссылка)</label>
                  <input id="inputDescription" class="form-control" name="link" placeholder="Cсылка ..."
                    value="{{ old('link') }}">

                  @error('link')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

              </div>
              <input type="submit" class="btn btn-primary" value="Добавить">
            </form>
          </div>
        </div>
      </section>

    </div>
  @endsection
