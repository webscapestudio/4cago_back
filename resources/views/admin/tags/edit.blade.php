  @extends('admin.layouts.main')
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактирование тега</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
          <form action="{{ route('admin.tag.update', $tag->id) }}" method="POST" class="w-25">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <input type="text" class="form-control" name="title" placeholder="Название тега" value="{{$tag->title}}">
            </div>
            @error('title')
                <div class="text-danger">Заполните поле{{$message}}</div>
            @enderror
            <input type="submit" class="btn btn-primary" value="Обновить">
          </form>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
      @endsection