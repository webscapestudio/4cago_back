@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $news->title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">Посты</a></li>
                            <li class="breadcrumb-item active">{{ $news->title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="col-md-6">

                    <div class="card card-widget">
                        <div class="card-header">
                            <div class="user-block">

                                <span class="description">Опубликовано {{ $news->created_at }}</span>
                            </div>

                            <div class="card-tools">
                                <a href="{{ route('admin.news.edit', $news->id) }}" class="text-success">Редактировать</a>
                                <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn text-danger">
                                        Удалить
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="card-body">

                            <img class="img-fluid pad" src="{{ asset('storage/app/public/' . $news->news_image) }}"
                                alt="Photo">

                            <h4>Краткое описание</h4>
                            <p>{{ $news->description }}</p>
                            <h4>Текст</h4>
                            <p>{{ $news->content }}</p>

                            <span class="float-right text-muted">127 likes - 3 comments</span>
                        </div>

                        <div class="card-footer card-comments">
                            <div class="card-comment">
                                <h5 class="m-0">Коментарии поста</h5>
                                <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">
                                <div class="comment-text">
                                    <span class="username">
                                        Maria Gonzales
                                        <span class="text-muted float-right">8:03 PM Today</span>
                                    </span>
                                    It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout.
                                </div>

                            </div>

                            <div class="card-comment">

                                <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image">
                                <div class="comment-text">
                                    <span class="username">
                                        Luna Stark
                                        <span class="text-muted float-right">8:03 PM Today</span>
                                    </span>
                                    It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout.
                                </div>

                            </div>

                        </div>

                        <div class="card-footer">
                            <form action="#" method="post">
                                <img class="img-fluid img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">

                                <div class="img-push">
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Press enter to post comment">
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
