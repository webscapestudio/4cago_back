@extends('admin.layouts.main')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $right_banner->title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.right_banner.index') }}">Рекламные банера(справа)</a>
              </li>
              <li class="breadcrumb-item active">{{ $right_banner->title }}</li>
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
              <div class="card-tools">
                <span class="description">Опубликовано {{ $right_banner->created_at->diffForHumans() }}</span>
              </div>
            </div>

            <div class="card-body">
              <p>Ccылка: {{ $right_banner->link }}</p>
              @if (file_exists('storage/' . $right_banner->banner_image))
                <img class="img-fluid pad" src="{{ asset('storage/' . $right_banner->banner_image) }}" alt="Photo">
              @else
              @endif

              <div class="card-footer">
                <div class="float-right">
                  <a href="{{ route('admin.right_banner.edit', $right_banner->id) }}" type="button"
                    class="btn btn-default"><i class="fas fa-pencil-alt"></i>
                    Редактировать</a>
                </div>
                <form action="{{ route('admin.right_banner.destroy', $right_banner->id) }}" method="POST">
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
