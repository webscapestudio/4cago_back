@extends('admin.layouts.main')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $upper_banner->title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.upper_banner.index') }}">Рекламные банера(верх)</a>
              </li>
              <li class="breadcrumb-item active">{{ $upper_banner->title }}</li>
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
                <span class="description">Опубликовано {{ $upper_banner->created_at->diffForHumans() }}</span>
              </div>
            </div>

            <div class="card-body">
              <p>Ccылка: {{ $upper_banner->link }}</p>
              <p>Изображение(мобильные устройства):</p>
              @if (file_exists('storage/' . $upper_banner->banner_image_mob))
                <img class="img-fluid pad" src="{{ asset('storage/' . $upper_banner->banner_image_mob) }}" alt="Photo">
              @else
              @endif
              <p>Изображение(планшеты):</p>
              @if (file_exists('storage/' . $upper_banner->banner_image_tablet))
                <img class="img-fluid pad" src="{{ asset('storage/' . $upper_banner->banner_image_tablet) }}"
                  alt="Photo">
              @else
              @endif
              <p>Изображение(десктопы):</p>
              @if (file_exists('storage/' . $upper_banner->banner_image_desktop))
                <img class="img-fluid pad" src="{{ asset('storage/' . $upper_banner->banner_image_desktop) }}"
                  alt="Photo">
              @else
              @endif
              <div class="card-footer">
                <div class="float-right">
                  <a href="{{ route('admin.upper_banner.edit', $upper_banner->id) }}" type="button"
                    class="btn btn-default"><i class="fas fa-pencil-alt"></i>
                    Редактировать</a>
                </div>
                <form action="{{ route('admin.upper_banner.destroy', $upper_banner->id) }}" method="POST">
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
