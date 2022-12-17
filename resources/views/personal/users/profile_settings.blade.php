@extends('layouts.main')

@section('content')
    <div class="main__settings">
        <form class="main-settings__inner" action="{{ route('personal.user.update', $user->id) }}"
            method="POST"enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="top__setting">
                <h2 class="delete__title">Отоброжаемое имя</h2>
                <div class="create__title">
                    <input class="input input__title" type="text" name="name" value="{{ $user->name }}">
                </div>
            </div>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="avatar__setting">
                <h2 class="delete__title">Аватар профиля</h2>
                @if ($user->user_avatar)
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <img class="img-fluid pad" src="{{ asset('storage/' . $user->user_avatar) }}"
                                        alt="Photo">
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                @endif
                <input class="input input__mail" type="file" name="user_avatar">
            </div>
            @error('user_avatar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="pass__setting">
                <h2 class="delete__title">Почта и пароль</h2>
                <div class="create__tags">
                    <div class="email__input">
                        <input class="input input__mail" type="email" name="email" value="{{ $user->email }}">
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <a class="password__change" href="{{ route('password.request') }}">Изменить пароль</a>
                </div>
            </div>
            <div class="acc__delete">
                <h2 class="delete__title">Удаление аккаунта</h2>
                <div class="create__tags">
                    <p class="feed__text">
                        Вы можете
                        <a class="vacancy__link" data-micromodal-trigger="acc-delete">удалить свой аккаунт</a>. У вас будет
                        30 дней на восстановление.
                    </p>
                </div>
            </div>
            <div class="create__bottom">

                <button type="submit" class="btn btn__blue">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
