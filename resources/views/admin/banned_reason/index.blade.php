  @extends('admin.layouts.main')
  @section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Жалобы</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                <li class="breadcrumb-item active">Жалобы</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <nav class="main-header navbar navbar-expand navbar-light">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block" style="display: none;">
              <form class="form-inline" action="{{ route('admin.banned_reason.search') }}" method="get">
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
                        <th>Причина</th>
                        <th>Автор жалобы</th>
                        <th>Дата</th>
                        <th>Статус</th>
                        <th colspan="3">Действия</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($banned_reasons as $banned_reason)
                        <tr>
                          <td>{{ $banned_reason->id }}</td>
                          <td>{{ $banned_reason->banned_reason }}</td>
                          <td>{{ $banned_reason->author->name ?? 'Пользователь не найден' }}</td>
                          <td>{{ $banned_reason->created_at }}</td>
                          <td>
                            @if (
                                $banned_reason->banned_reasonable->published == 2 and $banned_reason->status == '1' or
                                    $banned_reason->banned_reasonable->published == 2)
                              Одобрено(Заблокировано)
                            @else
                              Неодобрено
                            @endif
                          </td>
                          <td><a href="{{ route('admin.banned_reason.show', $banned_reason->id) }}"><i
                                class="far fa-eye"></i></a></td>

                          @if ($banned_reason->banned_reasonable->published == 1 and $banned_reason->status == '0')
                            <td>
                              <form action="{{ route('admin.banned_reason.report', $banned_reason->id) }}" method="POST">
                                <input type="hidden" name="_method" value="PATCH">
                                {{ csrf_field() }}
                                <button type="submit" class="border-0 bg-trnsparent"><i class="fas fa-ban text-danger"
                                    role="button"></i></button>
                              </form>
                            </td>
                          @elseif($banned_reason->banned_reasonable->published == 2 and $banned_reason->status == '1')
                            <td>
                              <form action="{{ route('admin.banned_reason.report', $banned_reason->id) }}" method="POST">
                                <input type="hidden" name="_method" value="PATCH">
                                {{ csrf_field() }}
                                <button type="submit" class="border-0 bg-trnsparent"><i class="fas fa-ban text-blue"
                                    role="button"></i></button>
                              </form>
                            </td>
                          @else
                          @endif
                          <td>
                            <form action="{{ route('admin.banned_reason.destroy', $banned_reason->id) }}" method="POST">
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
