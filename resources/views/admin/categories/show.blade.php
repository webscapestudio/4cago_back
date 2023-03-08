@extends('admin.layouts.main')
@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Категории</a></li>
              <li class="breadcrumb-item active">{{ $category->title }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="invoice p-3 mb-3">

          <div class="row">
            <div class="col-12">
              <h4>
                <i class="fas fa-globe"></i> Категория: {{ $category->title }}

              </h4>
            </div>

          </div>

          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">

              <address>
                <strong>Общая информация.</strong><br>
                ID категории: {{ $category->id }}<br>
                Родительская категория:
                {{ $category->parent->title ?? 'Не существует' }}<br>
                Статус: {{ $category->published == 1 ? 'Опубликовано' : 'Не опубликовано' }}<br>
                Создана: {{ $category->created_at }}<br>
                Изменена: {{ $category->updated_at }}
              </address>
            </div>

            <div class="col-sm-4 invoice-col">
              <strong>Краткое описание Категории.</strong>
              <address>

                {{ $category->description }}
              </address>
            </div>

          </div>





          <div class="row no-print">
            <div class="col-12">

              <a href="{{ route('admin.category.edit', $category->slug) }}" class="text-success"><button type="button"
                  class="btn btn-success float-right"><i class="fas fa-pencil-alt"></i>
                  Изменить
                </button></a>
              <form action="{{ route('admin.category.destroy', $category->slug) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger float-right" style="margin-right: 5px;">
                  <i class="fas fa-trash"></i> Удалить
                </button>
              </form>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">
              <span class="info-box-icon"> <i class="nav-icon far fa-clipboard"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Постов в категории</span>
                <span class="info-box-number">{{ $category->postCount->count() }}</span>

              </div>

            </div>

          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
              <span class="info-box-icon"><i class="fas fa-comments"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Коментариев в категории</span>
                <span class="info-box-number">
                  <td>{{ $category->comments->count() }}</td>
                </span>

              </div>

            </div>

          </div>

        </div>

      </div><!-- /.container-fluid -->
    </div>
  </div>
@endsection
