@extends('admin.layouts.main')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $faq_marketing->title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.faq_marketing.index') }}">Информации о рекламе</a>
              </li>
              <li class="breadcrumb-item active">{{ $faq_marketing->title }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="col-md-6">

          <div class="card card-widget">
            <div class="card-header">
              <div class="user-block">
                <h3 class="card-title">Статус: {{ $faq_marketing->published == 1 ? 'Опубликовано' : 'Не опубликовано' }}
                </h3>

              </div>

              <div class="card-tools">
                <span class="description">Дата создания: {{ $faq_marketing->created_at }}</span>
              </div>
            </div>

            <div class="card-body">

              <h4>Текст</h4>
              <p>{{ $faq_marketing->content }}</p>
            </div>

            <div class="card-footer card-comments">



              <div class="card-footer">
                <div class="float-right">
                  <a href="{{ route('admin.faq_marketing.edit', $faq_marketing->id) }}" type="button"
                    class="btn btn-default"><i class="fas fa-pencil-alt"></i>
                    Редактировать</a>
                </div>
                <form action="{{ route('admin.faq_marketing.destroy', $faq_marketing->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-default"><i class="fas fa-times"></i>Удалить</button>
                </form>
              </div>
            </div>

          </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
