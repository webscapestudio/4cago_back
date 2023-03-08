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
              <li class="breadcrumb-item"><a href="{{ route('admin.category_question.index') }}">Категории</a></li>
              <li class="breadcrumb-item active">{{ $categories_asked_question->title }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="invoice p-3 mb-3">

          <div class="row">
            <div class="col-12">
              <h4>
                <i class="fas fa-globe"></i> Категория: {{ $categories_asked_question->title }}

              </h4>
            </div>

          </div>

          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">

              <address>
                <strong>Общая информация.</strong><br>
                ID категории: {{ $categories_asked_question->id }}<br>
                Родительская категория:
                {{ $categories_asked_question->parent->title ?? 'Не существует' }}<br>
                Статус: {{ $categories_asked_question->published == 1 ? 'Опубликовано' : 'Не опубликовано' }}<br>
                Создана: {{ $categories_asked_question->created_at }}<br>
                Изменена: {{ $categories_asked_question->updated_at }}
              </address>
            </div>

            <div class="col-sm-4 invoice-col">
              <strong>Краткое описание Категории.</strong>
              <address>

                {{ $categories_asked_question->description }}
              </address>
            </div>

          </div>





          <div class="row no-print">
            <div class="col-12">

              <a href="{{ route('admin.category_question.edit', $categories_asked_question->slug) }}"
                class="text-success"><button type="button" class="btn btn-success float-right"><i
                    class="fas fa-pencil-alt"></i>
                  Изменить
                </button></a>
              <form action="{{ route('admin.category_question.destroy', $categories_asked_question->slug) }}"
                method="POST">
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
                <span class="info-box-number">{{ $categories_asked_question->questionsCount->count() }}</span>

              </div>

            </div>

          </div>



        </div>

      </div><!-- /.container-fluid -->
    </div>
  </div>
@endsection
