@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $post->title }}</h1>
                        <h4 class="m-0">Категория поста: {{ $post->category->title ?? null }}</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Посты</a></li>
                            <li class="breadcrumb-item active">{{ $post->title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">

                <div class="col-md-6">

                    <div class="card card-widget">
                        <div class="card-header">
                            <div class="user-block">
                                <h3 class="card-title">{{ $post->author->name ?? null }}</h3>

                            </div>

                            <div class="card-tools">
                                <span class="description">Опубликовано {{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>

                        <div class="card-body">
                            @if (file_exists('storage/' . $post->post_image))
                                <img class="img-fluid pad" src="{{ asset('storage/' . $post->post_image) }}" alt="Photo">
                            @else
                            @endif

                            <h4>Краткое описание</h4>
                            <p>{{ $post->description }}</p>
                            <h4>Текст</h4>
                            <p>{{ $post->content }}</p>

                            <span class="float-right text-muted">Лайки - {{ $post->like->count() }} / Дизлайки -
                                {{ $post->dislike->count() }} / Коментарии -
                                {{ $post->comments->count() }} / Добавленно в избранное -
                                {{ $post->favourite->count() }}</span>
                        </div>

                        <div class="card-footer card-comments">


                            <div class="card-comment">
                                <h5 class="m-0">Коментарии поста</h5>
                                @foreach ($post->comments as $comment)
                                    @if (file_exists('storage/' . $comment->comment_image))
                                        <img class="img-circle img-sm"
                                            src="{{ asset('storage/' . $comment->comment_image) }}" alt="User Image">
                                    @else
                                    @endif
                                    <div class="comment-text">
                                        <span class="username">
                                            {{ $comment->author->name ?? 'Пользователь не найден' }}
                                            <span
                                                class="text-muted float-right">{{ $comment->created_at->diffForHumans() }}</span>
                                        </span>


                                        <form action="{{ route('post.comment.destroy', [$post->id, $comment->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-muted float-right"
                                                data-micromodal-trigger="report">
                                                Удалить
                                            </button>
                                        </form>
                                        {{ $comment->content }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="submit" class="btn btn-default"><i class="fas fa-ban"></i> Забанить</button>
                            </div>
                            <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-default"><i class="fas fa-times"></i> Удалить</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
