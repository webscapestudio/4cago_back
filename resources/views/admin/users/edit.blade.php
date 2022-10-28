  @extends('admin.layouts.main')
  @section('content')
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1 class="m-0">Редактирование пользователя</h1>
                      </div><!-- /.col -->
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                              <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
                              <li class="breadcrumb-item active">Редактирование пользователя</li>
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
                      <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="w-25">
                          @csrf
                          @method('PATCH')
                          <div class="form-group">
                              <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                  placeholder="Имя пользователя">
                          </div>
                          @error('name')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                          <div class="form-group">
                              <input type="text" class="form-control" name="email" value="{{ $user->email }}"
                                  placeholder="Email">
                          </div>
                          @error('email')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                          <div class="form-group">
                              <label>Выберите роль пользователя</label>
                              <select class="form-control" name="role">
                                  @foreach ($roles as $id => $role)
                                      <option value="{{ $id }}" {{ $id == $user->role ? 'selected' : '' }}>
                                          {{ $role }}</option>
                                  @endforeach
                              </select>
                              @error('role')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="form-group w-50">
                              <input type="hidden" name="user_id" value="{{ $user->id }}">
                          </div>
                          <input type="submit" class="btn btn-primary" value="Сохранить">
                      </form>
                  </div>
                  <!-- /.row -->

              </div><!-- /.container-fluid -->
          </section>
          <!-- /.content -->
      </div>
  @endsection
