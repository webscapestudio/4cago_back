@extends('personal.main.index')
@section('content')
    <form class="vacancy__post"action="{{ route('personal.work.update', $work->id) }}" method="POST"
        enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}

        <h2 class="delete__title">Редактировать вакансию</h2>
        <div class="post-create__inner">
            <div class="post__category">
                <p class="post__date">Статус</p>

                <div class="custom__select">
                    <select id="a-select" name="is_published">
                        @if (@isset($work->id))
                            <option value="0" @if ($work->is_published == 0) selected = "" @endif>Не
                                опубликовано</option>
                            <option value="1" @if ($work->is_published == 1) selected = "" @endif>
                                Опубликовано
                            </option>
                        @else
                            <option value="0">Не опубликовано</option>
                            <option value="1">Опубликовано</option>
                        @endif

                    </select>
                    @error('category_work_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="post__category">
                <p class="post__date">Категория</p>

                <div class="custom__select">
                    <select id="a-select" name="category_work_id">
                        @include('personal.works.partials.categories_worksCreate', [
                            'categories_works' => $categories_works,
                        ])

                    </select>
                    @error('category_work_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="vacancy__name">
                <p class="label__gray">Название вакансии</p>

                <input class="input input__title" type="text"name="title" value="{{ $work->title }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="categories">
                <div class="post__category">
                    <p class="label__gray">Тип занятости</p>
                    <div class="custom__select">
                        <select name="type" id="slim-select" tabindex="-1" data-ssid="ss-55358" aria-hidden="true"
                            style="display: none;">
                            <option value="0">Полная</option>
                            <option value="1">Частичная занятость</option>
                        </select>
                        <div class="ss-55358 ss-main" style="">
                            <div class="ss-single-selected"><span class="placeholder">Полная</span><span
                                    class="ss-deselect ss-hide">x</span><span class="ss-arrow"><span
                                        class="arrow-down"></span></span></div>
                            <div class="ss-content">
                                <div class="ss-search"><input type="search" placeholder="Search" tabindex="0"
                                        aria-label="Search" autocapitalize="off" autocomplete="off" autocorrect="off">
                                </div>
                                <div class="ss-list" role="listbox">
                                    <div class="ss-option ss-disabled ss-option-selected" role="option" data-id="85199876">
                                        Полная</div>
                                    <div class="ss-option" role="option" data-id="72717033">Частичная занятость
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter__category">
                    <p class="label__gray">Оклад, $</p>
                    <div class="filter">
                        <input type="number" id="before" placeholder="От" name="salary_from"
                            value="{{ $work->salary_from }}">
                        @error('salary_from')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <!-- <label for="before"></label> -->
                        <input type="number" id="after" placeholder="До"name="salary_before"
                            value="{{ $work->salary_before }}">
                        @error('salary_before')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <!-- <label for="after"></label> -->
                    </div>
                </div>
                <div class="post__subcategory">
                    <p class="label__gray">Место работы</p>
                    <div class="custom__select">
                        <select name="place" id="slim-select-job" tabindex="-1" data-ssid="ss-47908" aria-hidden="true"
                            style="display: none;">
                            <option value="0">Офис</option>
                            <option value="1">Удалённо</option>
                        </select>
                        <div class="ss-47908 ss-main" style="">
                            <div class="ss-single-selected"><span class="placeholder">Офис</span><span
                                    class="ss-deselect ss-hide">x</span><span class="ss-arrow"><span
                                        class="arrow-down"></span></span></div>
                            <div class="ss-content">
                                <div class="ss-search"><input type="search" placeholder="Search" tabindex="0"
                                        aria-label="Search" autocapitalize="off" autocomplete="off" autocorrect="off">
                                </div>
                                <div class="ss-list" role="listbox">
                                    <div class="ss-option ss-disabled ss-option-selected" role="option"
                                        data-id="9756205">Офис</div>
                                    <div class="ss-option" role="option" data-id="99602861">Удалённо</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="create__title">
                <p class="label__gray">Требования</p>

                <input class="input input__title" type="text"name="requirements" value="{{ $work->requirements }}">
                @error('requirements')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="create__text">
                <p class="label__gray">Задачи</p>

                <input class="input input__title" type="text"name="tasks" value="{{ $work->tasks }}">
                @error('tasks')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="create__tags">
                <p class="label__gray">Условия</p>

                <input class="input input__title" type="text"name="conditions" value="{{ $work->conditions }}">
                @error('conditions')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
        </div>
        <h2 class="delete__title">Контактная информация</h2>
        <div class="post-create__inner">
            <div class="vacancy__name">
                <p class="label__gray">Почта для соискателей</p>

                <input class="input input__title" type="mail"name="mail_applicants"
                    value="{{ $work->mail_applicants }}">
                @error('mail_applicants')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="post__category">
                <p class="label__gray">Почта для уведомлений</p>

                <input class="input input__title" type="mail"name="mail_notifications"
                    value="{{ $work->mail_notifications }}">
                @error('mail_notifications')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="create__title">
                <p class="label__gray">Whatsapp</p>

                <input class="input input__title" type="text"name="whatsapp" value="{{ $work->whatsapp }}">
                @error('whatsapp')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="create__tags">
                <p class="label__gray">Telegram</p>

                <input class="input input__title" type="text"name="telegram" value="{{ $work->telegram }}">
                @error('telegram')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
        </div>



        <div class="file__create">
            <input type="file" name="work_image" id="input__comment">
            <label for="input__comment"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#292D32">
                    <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path
                        d="M9 10C10.1046 10 11 9.10457 11 8C11 6.89543 10.1046 6 9 6C7.89543 6 7 6.89543 7 8C7 9.10457 7.89543 10 9 10Z"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path
                        d="M2.66998 18.9501L7.59998 15.6401C8.38998 15.1101 9.52998 15.1701 10.24 15.7801L10.57 16.0701C11.35 16.7401 12.61 16.7401 13.39 16.0701L17.55 12.5001C18.33 11.8301 19.59 11.8301 20.37 12.5001L22 13.9001"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </label>
            @error('work_image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="create__bottom">
            <input type="submit" class="btn btn__blue" value="Разместить">
            <p class="label__gray">Стоимость размещения - 10$ за 30 дней</p>
        </div>
    </form>
@endsection
