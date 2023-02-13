@extends('admin.layouts.main')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $work->title }}</h1>
            <h4 class="m-0">Категория поста: {{ $work->category_work->title ?? null }}</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.work.index') }}">Посты</a></li>
              <li class="breadcrumb-item active">{{ $work->title }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">

        <div class="col-md-6">

          <div class="card card-widget">
            <div class="card-header">
              <div class="user-block">
                <h3 class="card-title">{{ $work->author->name ?? 'Пользователь не найден' }}</h3>

              </div>

              <div class="card-tools">
                <span class="description">Опубликовано:
                  {{ $work->created_at->diffForHumans() }}</span>
              </div>
            </div>

            <div class="card-body">
              @if ($work->work_image)
                <img class="img-fluid pad" src="{{ asset('storage/' . $work->work_image) }}" alt="Photo">
              @else
              @endif

              <h4>Краткое описание</h4>
              <p>{{ $work->description }}</p>
              <h4>Текст</h4>
              <p>{!! $work->content !!}</p>

              <span class="float-right text-muted">Добавленно в избранное -
                {{ $work->favourite->count() }}</span>
            </div>


            <div class="card-footer">

              <form action="{{ route('admin.work.destroy', $work->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-default"><i class="fas fa-times"></i> Удалить</button>
              </form>
            </div>
          </div>

        </div>

      </div><!-- /.container-fluid -->
    </section>
  </div>
@endsection
