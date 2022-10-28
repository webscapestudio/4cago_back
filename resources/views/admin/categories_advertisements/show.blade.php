@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $category_advertisement->title }}</h1>
                        <td><a href="{{ route('admin.category_advertisement.edit', $category_advertisement->id) }}"
                                class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                        <td>
                            <form action="{{ route('admin.category_advertisement.destroy', $category_advertisement->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border-0 bg-trnsparent"><i class="fas fa-trash text-danger"
                                        role="button"></i></button>
                            </form>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.category_advertisement.index') }}">Категории</a></li>
                            <li class="breadcrumb-item active">{{ $category_advertisement->title }}</li>
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
                    <a href="{{ route('admin.category_advertisement.create') }}"
                        class="btn btn-block btn-primary">Добавить</a>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td>{{ $category_advertisement->id }}</td>
                                            <td>{{ $category_advertisement->title }}</td>
                                            </td>
                                        </tr>
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