  @extends('admin.layouts.main')
  @section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Новости</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                <li class="breadcrumb-item active">Новости</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <nav class="main-header navbar navbar-expand navbar-light mx-auto">
        <div class="col-1 mb-3">
          <a href="{{ route('admin.news.create') }}" class="btn btn-block btn-primary">Добавить</a>
        </div>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block" style="display: none;">
              <form class="form-inline" action="{{ route('admin.news.search') }}" method="get">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" name="s" placeholder="Поиск"
                    aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>
        </ul>
      </nav>
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
                        <th>Добавлено в избранное</th>
                        <th>Коментариев</th>
                        <th>Лайков</th>
                        <th>Дизайков</th>
                        <th>Статус</th>
                        <th colspan="3">Действия</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($news as $news)
                        <tr>
                          <td>{{ $news->id }}</td>
                          <td>{{ $news->title }}</td>
                          <td>{{ $news->favourite->count() }}</td>
                          <td>{{ $news->comments->count() }}</td>
                          <td>{{ $news->like->count() }}</td>
                          <td>{{ $news->dislike->count() }}</td>
                          <td>
                            @if ($news->published == '0')
                              Не опубликовано
                            @elseif($news->published == '1')
                              Опубликовано
                            @else
                              Заблокировано
                            @endif
                          </td>
                          <td><a href="{{ route('admin.news.show', $news->slug) }}"><i class="far fa-eye"></i></a>
                          </td>
                          <td><a href="{{ route('admin.news.edit', $news->slug) }}" class="text-success"><i
                                class="fas fa-pencil-alt"></i></a></td>
                          <td>
                            <form action="{{ route('admin.news.destroy', $news->slug) }}" method="POST">
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
