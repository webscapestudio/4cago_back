<div class="modal micromodal-slide" id="report" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close>
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <div class="dropdown__report">
        <div class="close__btn" data-micromodal-close>
          <svg class="icon" viewBox="0 0 24 24" fill="none">
            <path
              d="M5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L12 10.5858L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L13.4142 12L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L12 13.4142L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L10.5858 12L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289Z">
            </path>
          </svg>
        </div>
        <p class="delete__title">Пожаловаться</p>

        <p class="dropdown__span">Выберите причину</p>
        <form class="custom__select" method="POST"
          action="@if (isset($post)) {{ route('post.banned_reason.store', [$post->category_id, $post->id]) }} @endif
          @if (isset($advertisement)) {{ route('advertisement.banned_reason.store', [$advertisement->category_advertisement_id, $advertisement->id]) }} @endif
            @if (isset($work)) {{ route('work.banned_reason.store', [$work->category_work_id, $work->id]) }} @endif
          @if (isset($news)) {{ route('news.banned_reason.store', $news->id) }} @endif"
          novalidate>
          @csrf
          <select id="a-select" name="banned_reason" style="margin-bottom: 1rem;">
            <option value="0">Выбрать причину</option>
            <option value="Спам">Спам</option>
            <option value="Оскорбление">Оскорбление</option>
            <option value="Порнографический контент">Порнографический контент</option>
            <option value="Насилие">Насилие</option>
            <option value="Авторские права">Авторские права</option>
            <option value="Введение в заблуждение">Введение в заблуждение</option>
            <option value="Другое">Другое</option>
          </select>

          <div class="other-report_div delete__title" style="display:none;">
            <p class="dropdown__span">Опишите свою причину</p>
            <input class="input input" id="other-report"name="other_report" placeholder="Текст" />
          </div>
          <button class="btn btn__blue">Отправить</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
  $("#a-select").change(function() {
    if ($(this).val() == "Другое") {
      $('.other-report_div').show();
    } else {
      $('.other-report_div').hide();
    }
  });
</script>
