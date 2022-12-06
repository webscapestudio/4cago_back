@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Профиль: {{ $user->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
                            <li class="breadcrumb-item active">{{ $user->name }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if ($user->user_avatar)
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('storage/' . $user->user_avatar) }}" alt="User profile picture">
                                    @else
                                        <img class="img-circle img-bordered-sm"
                                            src="{{ asset('/images/avatars/user-car-ava.jpg') }}"
                                            alt="User profile picture">
                                    @endif
                                </div>
                                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                                <p class="text-muted text-center">{{ $user->role == 1 ? 'Пользователь' : 'Администратор' }}
                                </p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Статей</b> <a class="float-right">{{ $user->posts()->get()->count() }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Обьявлений</b> <a
                                            class="float-right">{{ $user->advertisements()->get()->count() }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Коментариев</b> <a class="float-right">{{ $user->comments->count() }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Лайков</b> <a class="float-right">{{ $user->liks->count() }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Дизлайков</b> <a class="float-right">{{ $user->disliks->count() }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>В избранном</b> <a class="float-right">{{ $user->favourites->count() }}</a>
                                    </li>
                                </ul>
                                <a href="{{ route('admin.user.edit', $user->id) }}"
                                    class="btn btn-block btn-warning"><b>Редактировать</b></a>
                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-block btn-danger"><b>Удалить</b></button>
                                </form>

                            </div>

                        </div>


                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Информация о пользователе</h3>
                            </div>

                            <div class="card-body">
                                <strong><i class="fas fa-calendar-plus"></i> Создан</strong>
                                <p class="text-muted">
                                    {{ $user->created_at }}
                                </p>
                                <hr>
                                <strong><i class="fas fa-envelope"></i> Email пользователя</strong>
                                <p class="text-muted">{{ $user->email }}</p>
                                <hr>
                                <strong><i class="fas fa-id-card"></i> ID пользователя</strong>
                                <p class="text-muted">{{ $user->id }}</p>
                                <hr>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#posts" data-toggle="tab">Все
                                            статьи пользователя</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#advertisement" data-toggle="tab">Все
                                            обьявления пользователя</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="posts">
                                        @if (isset($user->posts) and !$user->posts->isEmpty())
                                            @foreach ($user->posts as $post)
                                                <div class="post">
                                                    <div class="user-block">
                                                        @if ($user->user_avatar)
                                                            <img class="img-circle img-bordered-sm"
                                                                src="{{ asset('storage/' . $user->user_avatar) }}"
                                                                alt="User profile picture">
                                                        @else
                                                            <img class="img-circle img-bordered-sm"
                                                                src="{{ asset('/images/avatars/user-car-ava.jpg') }}"
                                                                alt="User profile picture">
                                                        @endif
                                                        <span class="username">
                                                            <p>{{ $post->author->name }}</p>
                                                            <form action="{{ route('admin.post.destroy', $post->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button
                                                                    class="float-right btn btn-danger btn-sm">Удалить</button>
                                                            </form>
                                                        </span>
                                                        <span class="description">Дата создания:
                                                            {{ $post->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    <h4> <a href="{{ route('admin.post.show', $post->id) }}">
                                                            {{ $post->title }}</a></h4>
                                                    @if (file_exists('storage/' . $post->post_image))
                                                        <div class="col-sm-6">
                                                            <img class="img-fluid mb-3"
                                                                src="{{ asset('storage/' . $post->post_image) }}"
                                                                alt="User Image">
                                                        </div>
                                                    @else
                                                    @endif
                                                    <p>
                                                        {{ $post->content }}
                                                    </p>
                                                    <div class="card-body">
                                                        <span class="float-right text-muted">Лайки -
                                                            {{ $post->like->count() }}
                                                            /
                                                            Дизлайки -
                                                            {{ $post->dislike->count() }} / Коментарии -
                                                            {{ $post->comments->count() }} / Добавленно в избранное -
                                                            {{ $post->favourite->count() }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="post__title">У пользователя нет статей...</p>
                                        @endif
                                    </div>
                                    <div class="tab-pane" id="advertisement">
                                        @if (isset($user->advertisements) and !$user->advertisements->isEmpty())
                                            @foreach ($user->advertisements as $advertisement)
                                                <div class="post">
                                                    <div class="user-block">
                                                        @if ($user->user_avatar)
                                                            <img class="img-circle img-bordered-sm"
                                                                src="{{ asset('storage/' . $user->user_avatar) }}"
                                                                alt="User profile picture">
                                                        @else
                                                            <img class="img-circle img-bordered-sm"
                                                                src="{{ asset('/images/avatars/user-car-ava.jpg') }}"
                                                                alt="User profile picture">
                                                        @endif
                                                        <span class="username">
                                                            <p>{{ $advertisement->author->name }}</p>
                                                            <form
                                                                action="{{ route('admin.advertisement.destroy', $advertisement->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button
                                                                    class="float-right btn btn-danger btn-sm">Удалить</button>
                                                            </form>
                                                        </span>
                                                        <span class="description">Дата создания:
                                                            {{ $advertisement->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    <h4> <a
                                                            href="{{ route('admin.advertisement.show', $advertisement->id) }}">
                                                            {{ $advertisement->title }}</a></h4>
                                                    @if (file_exists('storage/' . $advertisement->advertisement_image))
                                                        <div class="col-sm-6">
                                                            <img class="img-fluid mb-3"
                                                                src="{{ asset('storage/' . $advertisement->advertisement_image) }}"
                                                                alt="User Image">
                                                        </div>
                                                    @else
                                                    @endif
                                                    <p>
                                                        {{ $advertisement->content }}
                                                    </p>
                                                    <div class="card-body">
                                                        <span class="float-right text-muted">Лайки -
                                                            {{ $advertisement->like->count() }}
                                                            /
                                                            Дизлайки -
                                                            {{ $advertisement->dislike->count() }} / Коментарии -
                                                            {{ $advertisement->comments->count() }} / Добавленно в
                                                            избранное -
                                                            {{ $advertisement->favourite->count() }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="post__title">У пользователя нет обьявлений...</p>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>

    </div>
@endsection
