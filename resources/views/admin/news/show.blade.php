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
                <h3 class="card-title">Admin</h3>

              </div>

              <div class="card-tools">
                <span class="description">Опубликовано {{ $news->created_at->diffForHumans() }}</span>
              </div>
            </div>

            <div class="card-body">
              @if (file_exists('storage/' . $news->news_image))
                <img class="img-fluid pad" src="{{ asset('storage/' . $news->news_image) }}" alt="Photo">
              @else
              @endif

              <h4>Краткое описание</h4>
              <p>{{ $news->description }}</p>
              <h4>Текст</h4>
              <p>{{ $news->content }}</p>

              <span class="float-right text-muted">Лайки - {{ $news->like->count() }} / Дизлайки -
                {{ $news->dislike->count() }} / Коментарии -
                {{ $news->comments->count() }} / Добавленно в избранное -
                {{ $news->favourite->count() }}</span>
            </div>

            <div class="card-footer card-comments">
              <div class="card-comment">
                <h5 class="m-0">Коментарии поста</h5>
                @foreach ($news->comments->where('parent_id', null)->reverse() as $comment)
                  @if ($comment->author->user_avatar ?? null)
                    <img class="img-circle img-sm" src="{{ asset('storage/' . $comment->author->user_avatar) }}"
                      alt="User Image">
                  @else
                    <img class="img-circle img-sm" src="{{ asset('./images/avatars/user-ava.jpg') }}" alt="User Image">
                  @endif
                  <div class="comment-text">
                    <span class="username">{{ $comment->author->name ?? 'Пользователь не найден' }}</span>
                    <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>


                    <form action="{{ route('news.comment.destroy', [$news->id, $comment->id]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn bg-danger float-right" data-micromodal-trigger="report">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                    {{ $comment->content }}
                  </div>
                  @foreach ($comment->replies->reverse() as $comment1)
                    @if ($comment1->author->user_avatar ?? null)
                      <img class="img-circle img-sm" src="{{ asset('storage/' . $comment1->author->user_avatar) }}"
                        alt="User Image">
                    @else
                      <img class="img-circle img-sm" src="{{ asset('./images/avatars/user-ava.jpg') }}" alt="User Image">
                    @endif
                    <div class="comment-text">
                      <span class="username">
                        {{ $comment1->author->name ?? 'Пользователь не найден' }}</span>
                      <span class="text-muted">
                        Ответ пользователю: {{ $comment1->parent->author->name ?? 'Пользователь не найден' }}</span>
                      <span class="text-muted">{{ $comment1->created_at->diffForHumans() }}</span>
                      <form action="{{ route('news.comment.destroy', [$news->id, $comment1->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn bg-danger float-right" data-micromodal-trigger="report">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                      {{ $comment1->content }}
                      @if ($comment1->comment_image)
                        <div class="row mb-3">
                          <div class="col-sm-6">
                            <div class="row">
                              <div class="col-sm-6">
                                <img class="img-fluid pad" src="{{ asset('storage/' . $comment1->comment_image) }}"
                                  alt="Photo">
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif
                    </div>
                  @endforeach
                @endforeach
              </div>
            </div>
            <div class="card-footer">
              <div class="float-right">
                <a href="{{ route('admin.news.edit', $news->id) }}" type="button" class="btn btn-default"><i
                    class="fas fa-pencil-alt"></i>
                  Редактировать</a>
              </div>
              <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-default"><i class="fas fa-times"></i>Удалить</button>
              </form>
            </div>
          </div>

        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
