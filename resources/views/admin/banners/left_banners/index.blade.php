  @extends('admin.layouts.main')
  @section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Рекламные банера(лево)</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                <li class="breadcrumb-item active">Рекламные банера(лево)</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="col-1 mb-3">
            <a href="{{ route('admin.left_banner.create') }}" class="btn btn-block btn-primary">Добавить</a>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Название рекламы</th>
                        <th>Ссылка</th>
                        <th>Статус</th>
                        <th colspan="3">Действия</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($left_banners as $left_banner)
                        <tr>
                          <td>{{ $left_banner->id }}</td>
                          <td>{{ $left_banner->title }}</td>
                          <td>{{ $left_banner->link }}</td>
                          <td>{{ $left_banner->published == 1 ? 'Опубликовано' : 'Не опубликовано' }}
                          <td><a href="{{ route('admin.left_banner.show', $left_banner->id) }}"><i
                                class="far fa-eye"></i></a>
                          </td>
                          <td><a href="{{ route('admin.left_banner.edit', $left_banner->id) }}" class="text-success"><i
                                class="fas fa-pencil-alt"></i></a></td>
                          <td>
                            <form action="{{ route('admin.left_banner.destroy', $left_banner->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="border-0 bg-trnsparent"><i class="fas fa-trash text-danger"
                                  role="button"></i></button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  @endsection
