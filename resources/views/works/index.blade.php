@extends('layouts.main')
@section('content')
  <div class="form__search">
    <form class="form__top">
      <input class="input input__search" type="text" id="search" name="search" placeholder="Поиск">

      <div submit class="block svg">

        <svg class="icon" viewBox="0 0 24 24" fill="none">
          <path
            d="M15.5944 6.8076C13.168 4.38119 9.23401 4.38119 6.8076 6.8076C4.38119 9.23401 4.38119 13.168 6.8076 15.5944C9.23401 18.0208 13.168 18.0208 15.5944 15.5944C18.0208 13.168 18.0208 9.23401 15.5944 6.8076ZM5.39338 5.39338C8.60084 2.18593 13.8012 2.18593 17.0086 5.39338C19.9767 8.36148 20.1982 13.0361 17.6731 16.2589L21.799 20.3848C22.1895 20.7753 22.1895 21.4085 21.799 21.799C21.4084 22.1895 20.7753 22.1895 20.3848 21.799L16.2589 17.6731C13.0361 20.1982 8.36148 19.9767 5.39338 17.0086C2.18593 13.8012 2.18593 8.60084 5.39338 5.39338Z">
          </path>
        </svg>

      </div>
    </form>
    <div class="dropdown__filter">
      <!-- <select class="dropdown__span" name="sort">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          <option value="date">По
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            дате</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          <option value="views">По
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            количеству просмотров</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          <option value="like">По
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            рейтингу</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </select> -->
    </div>
  </div>

  <div class="feed" id="data-wrapper">
    <!-- Results -->
  </div>
  <!-- Data Loader -->
  <div class="auto-load flex justify-center">
    <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
      x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0"
      xml:space="preserve">
      <path fill="#000"
        d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
        <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50"
          to="360 50 50" repeatCount="indefinite" />
      </path>
    </svg>
  </div>
  <button type="button" id="read-more" class="btn btn__blue read-more">Показать еще</button>

  <script>
    document.addEventListener("DOMContentLoaded", ready)

    function ready() {
      const uri = "{{ url('/categories_works') }}"
      let work_cat = "{{ $work_cat }}"
      let page = 1
      const errorMessage = "Ошибка"

      const searchForm = document.querySelector(".form__top")
      const searchInput = document.querySelector("#search")
      const loadMoreBtn = document.querySelector(".read-more")
      const preloaderEl = document.querySelector(".auto-load")
      const dataWrapper = document.querySelector("#data-wrapper")
      let lastpage = {{ $last_page }}
      searchInput.addEventListener("keyup", searchHandler)
      loadMoreBtn.addEventListener("click", loadMoreHandler)

      fetchPosts()

      async function searchHandler() {
        const value = searchInput.value
        preloaderEl.style.display = "flex"
        const response = await fetch(`${uri}/${work_cat}/works/search?search=${value}`)
          .then(res => res.text())
          .then(data => {
            dataWrapper.innerHTML = ''
            preloaderEl.style.display = "none"
            loadMoreBtn.style.display = "none"
            dataWrapper.insertAdjacentHTML('afterbegin', data)
            const card = document.querySelectorAll('.work__card')

            card.forEach(item => {
              const favoriteButton = item.querySelector('.favourite')
              const favoriteButtonCount = item.querySelector('.favourite p')

              const uriFavorite = favoriteButton.getAttribute("action")
              const token = item.querySelector('input[name = "_token"]').value;
              const likeID = favoriteButton.dataset.id
              const loadingText = "Загрузка"

              favoriteButton.addEventListener('click', favoriteHandler)

              async function favoriteHandler(e) {
                e.preventDefault()
                favoriteButtonCount.innerText = loadingText
                const responce = await fetch(uriFavorite, {
                    headers: {
                      "X-CSRF-TOKEN": token
                    },
                    method: "POST"
                  })
                  .then(res => res.json())
                  .then(data => {
                    if ($('#favourite' + likeID).hasClass('active')) {
                      $('#favourite' + likeID).removeClass('active');
                    } else {
                      $('#favourite' + likeID).addClass('active');
                    }
                    dislikeCount = data
                    favoriteButtonCount.innerText = dislikeCount
                  })
              }
            })
          })
      }

      async function loadMoreHandler() {
        page += 1
        fetchPosts(page)
      }

      async function fetchPosts(page = 1) {
        preloaderEl.style.display = "flex"
        const response = await fetch(`${uri}/${work_cat}/works?page=${page}`, {
            headers: {
              'X-Requested-With': 'XMLHttpRequest'
            },
          })

          .then(res => res.text())
          .then(data => {
            preloaderEl.style.display = "none"
            dataWrapper.insertAdjacentHTML('beforeend', data)
            let card = document.querySelectorAll('.work__card')
            card.forEach(item => {
              if (lastpage == page) {
                loadMoreBtn.style.display = "none"
              }
              const favoriteButton = item.querySelector('.favourite')
              const favoriteButtonCount = item.querySelector('.favourite p')

              const uriFavorite = favoriteButton.getAttribute("action")
              const token = item.querySelector('input[name = "_token"]').value;
              const likeID = favoriteButton.dataset.id
              const loadingText = "Загрузка"
              favoriteButton.addEventListener('click', favoriteHandler)
              async function favoriteHandler(e) {
                e.preventDefault()
                favoriteButtonCount.innerText = loadingText
                const responce = await fetch(uriFavorite, {
                    headers: {
                      "X-CSRF-TOKEN": token
                    },
                    method: "POST"
                  })
                  .then(res => res.json())
                  .then(data => {
                    if ($('#favourite' + likeID).hasClass('active')) {
                      $('#favourite' + likeID).removeClass('active');
                    } else {
                      $('#favourite' + likeID).addClass('active');
                    }
                    dislikeCount = data
                    favoriteButtonCount.innerText = dislikeCount
                  })
              }
            })
          })
      }
    }
  </script>
@endsection
