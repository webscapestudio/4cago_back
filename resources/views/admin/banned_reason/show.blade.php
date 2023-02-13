@extends('admin.layouts.main')
@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.banned_reason.index') }}">Жалобы</a></li>
              <li class="breadcrumb-item active">{{ $banned_reason->id }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="invoice p-3 mb-3">

          <div class="row">
            <div class="col-12">
              <h4>
                <i class="fas fa-globe"></i> Причина жалобы: {{ $banned_reason->banned_reason }}

              </h4>
            </div>

          </div>

          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">

              <address>
                <strong>Общая информация.</strong><br>

                ID: {{ $banned_reason->id }}<br>
                Статус: @if (
                    $banned_reason->banned_reasonable->published == 2 and $banned_reason->status == '1' or
                        $banned_reason->banned_reasonable->published == 2)
                  Одобрено(Заблокировано)
                @elseif(!$banned_reason->banned_reasonable->deleted_at == null)
                  Запись удалена
                @else
                  Неодобрено
                @endif
                <br>
                Создана: {{ $banned_reason->created_at }}<br>
              </address>
            </div>

            <div class="col-sm-4 invoice-col">
              <strong>Описание(другое).</strong>
              <address>

                {{ $banned_reason->other_report }}
              </address>
            </div>

          </div>
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">

              <address>
                <strong>Информация о записи.</strong><br>
                Название записи: {{ $banned_reason->banned_reasonable->title }}<br>
                ID: {{ $banned_reason->banned_reasonable->id }}<br>
                Статус: {{ $banned_reason->banned_reasonable->published == 2 ? 'Заблокировано' : 'Не заблокировано' }}<br>
                Создана: {{ $banned_reason->banned_reasonable->created_at }}<br>
              </address>
            </div>

            <div class="col-sm-4 invoice-col">
              <strong>Текст записи.</strong>
              <address>

                {!! $banned_reason->banned_reasonable->content !!}
              </address>
            </div>

          </div>




          <div class="row no-print">
            <div class="col-12">
              @if ($banned_reason->banned_reasonable->published == 1 and $banned_reason->status == '0')
                <td>
                  <form action="{{ route('admin.banned_reason.report', $banned_reason->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PATCH">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger float-right"><i class="fas fa-ban" role="button"></i>
                      Заблокировать
                    </button>
                  </form>
                </td>
              @elseif($banned_reason->banned_reasonable->published == 2 and $banned_reason->status == '1')
                <td>
                  <form action="{{ route('admin.banned_reason.report', $banned_reason->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PATCH">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary float-right"><i class="fas fa-ban" role="button"></i>
                      Разблокировать
                    </button>
                  </form>
                </td>
              @else
              @endif

              <form action="{{ route('admin.banned_reason.report', $banned_reason->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger float-right" style="margin-right: 5px;">
                  <i class="fas fa-trash"></i> Удалить
                </button>
              </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
  </div>
@endsection
