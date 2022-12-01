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
                              <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Категории</a></li>
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
                      <form action="{{ route('admin.category.update', $category) }}" method="POST" class="w-25"
                          enctype="multipart/form-data">
                          <input type="hidden" name="_method" value="PATCH">
                          @csrf
                          @include('admin.categories.partials.formEdit')
                      </form>
                  </div>
                  <!-- /.row -->

              </div><!-- /.container-fluid -->
          </section>
          <!-- /.content -->
      </div>
  @endsection
