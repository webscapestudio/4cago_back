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
                                              <th colspan="3">Действия</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($posts as $post)
                                              <tr>
                                                  <td>{{ $post->id }}</td>
                                                  <td>{{ $post->title }}</td>
                                                  <td>{{ $post->category->title ?? null }}</td>
                                                  <td>{{ $post->author->name ?? null }}</td>
                                                  <td><a href="{{ route('admin.post.show', $post->id) }}"><i
                                                              class="far fa-eye"></i></a></td>
                                                  <td>
                                                      <form action="{{ route('admin.post.destroy', $post->id) }}"
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
