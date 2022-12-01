  @extends('admin.layouts.main')
  @section('content')
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1 class="m-0">Посты</h1>
                      </div><!-- /.col -->
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                              <li class="breadcrumb-item active">Посты</li>
                          </ol>
                      </div><!-- /.col -->
                  </div><!-- /.row -->
              </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->

          <!-- Main content -->
          <section class="content">
              <div class="container-fluid">

                  <div class="row">
                      <div class="col-12">
                          <div class="card">

                              <!-- /.card-header -->
                              <div class="card-body table-responsive p-0">
                                  <table class="table table-hover text-nowrap">
                                      <thead>
                                          <tr>
                                              <th>ID</th>
                                              <th>Название</th>
                                              <th>Категория</th>
                                              <th>Пользователь</th>
                                              <th>Добавлено в избранное</th>
                                              <th>Коментариев</th>
                                              <th>Лайков</th>
                                              <th>Дизайков</th>
                                              <th colspan="3">Действия</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($advertisements as $advertisement)
                                              <tr>
                                                  <td>{{ $advertisement->id }}</td>
                                                  <td>{{ $advertisement->title }}</td>
                                                  <td>{{ $advertisement->category_advertisement->title ?? null }}</td>
                                                  <td>{{ $advertisement->author->name ?? null }}</td>
                                                  <td>{{ $advertisement->favourite->count() }}</td>
                                                  <td>{{ $advertisement->comments->count() }}</td>
                                                  <td>{{ $advertisement->like->count() }}</td>
                                                  <td>{{ $advertisement->dislike->count() }}</td>
                                                  <td><a href="{{ route('admin.advertisement.show', $advertisement->id) }}"><i
                                                              class="far fa-eye"></i></a></td>
                                                  <td>
                                                      <form
                                                          action="{{ route('admin.advertisement.destroy', $advertisement->id) }}"
                                                          method="POST">
                                                          @csrf
                                                          @method('DELETE')
                                                          <button type="submit" class="border-0 bg-trnsparent"><i
                                                                  class="fas fa-trash text-danger"
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
