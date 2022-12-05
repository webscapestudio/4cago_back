@extends('layouts.main')

@section('content')
    <div class="main__settings">
        <div class="main-settings__inner">
            <div class="top__setting">
                <h2 class="delete__title">Отоброжаемое имя</h2>
                <div class="create__title">
                    <input class="input input__title" type="text">
                </div>
            </div>
            <div class="avatar__setting">
                <h2 class="delete__title">Аватар профиля</h2>
                <a class="password__change" href="">Изменить аватар</a>
            </div>
            <div class="pass__setting">
                <h2 class="delete__title">Почта и пароль</h2>
                <div class="create__tags">
                    <div class="email__input">
                        <input class="input input__mail" type="email">
                    </div>
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
                <button class="btn btn__blue">Сохранить</button>
            </div>
        </div>
    </div>
@endsection
