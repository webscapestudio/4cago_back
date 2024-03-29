  @extends('admin.layouts.main')
  @section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Добавление пользователя</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
                <li class="breadcrumb-item active">Добавление пользователя</li>
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
            <form action="{{ route('admin.user.store') }}" method="POST" class="w-25" enctype="multipart/form-data">
              @csrf

              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Имя пользователя">
              </div>
              @error('name')
                <div class="text-danger">{{ $message }}</div>
              @enderror
              <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email">
              </div>
              @error('email')
                <div class="text-danger">{{ $message }}</div>
              @enderror
              <div class="form-group">
                <input type="text" class="form-control" name="password" placeholder="Введите пароль">
              </div>
              @error('password')
                <div class="text-danger">{{ $message }}</div>
              @enderror
              <div class="form-group">
                <label>Выберите роль пользователя</label>
                <select class="form-control" name="role">
                  @foreach ($roles as $id => $role)
                    <option value="{{ $id }}" {{ $id == old('role_id') ? 'selected' : '' }}>
                      {{ $role }}</option>
                  @endforeach
                </select>
                @error('role')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <label for="exampleInputFile">Изображение профиля</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="user_avatar">
                </div>
              </div>
              @error('user_avatar')
                <div class="text-danger">{{ $message }}</div>
              @enderror
              <div class="form-group w-50">
              </div>
              <input type="submit" class="btn btn-primary" value="Добавить">
            </form>
          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  @endsection
