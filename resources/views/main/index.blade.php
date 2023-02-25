@extends('layouts.main')

@section('content')
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
      const uri = "{{ url('/') }}"
      let page = 1
      const errorMessage = "Ошибка"

      const searchForm = document.querySelector(".form__top")
      const searchInput = document.querySelector("#search")
      const loadMoreBtn = document.querySelector(".read-more")
      const preloaderEl = document.querySelector(".auto-load")
      const dataWrapper = document.querySelector("#data-wrapper")
      let lastpage = {{ $last_page }}
      loadMoreBtn.addEventListener("click", loadMoreHandler)

      fetchPosts()

      async function loadMoreHandler() {
        page += 1
        fetchPosts(page)
      }

      async function fetchPosts(page = 1) {
        preloaderEl.style.display = "flex"
        const response = await fetch(`${uri}?page=${page}`, {
            headers: {
              'X-Requested-With': 'XMLHttpRequest'
            },
          })
          .then(res => res.text())
          .then(data => {
            preloaderEl.style.display = "none"
            dataWrapper.insertAdjacentHTML('beforeEnd', data)
            const card = document.querySelectorAll('.ad__card')

            card.forEach(item => {
              if (lastpage == page) {
                loadMoreBtn.style.display = "none"
              }
              const likeButton = item.querySelector('.smile')
              const likeButtonCount = item.querySelector('.smile p')
              const dislikeButton = item.querySelector('.smile__sad')
              const dislikeButtonCount = item.querySelector('.smile__sad p')
              const favoriteButton = item.querySelector('.favourite')
              const favoriteButtonCount = item.querySelector('.favourite p')

              const uriLike = likeButton.getAttribute("action")
              const uriDislike = dislikeButton.getAttribute("action")
              const uriFavorite = favoriteButton.getAttribute("action")
              const token = item.querySelector('input[name = "_token"]').value;
              const likeID = likeButton.dataset.id
              const loadingText = "Загрузка"
              likeButton.addEventListener('click', likeHandler)
              dislikeButton.addEventListener('click', dislikeHandler)
              favoriteButton.addEventListener('click', favoriteHandler)

              async function likeHandler(e) {
                e.preventDefault()
                likeButtonCount.innerText = loadingText
                const responce = await fetch(uriLike, {
                    headers: {
                      "X-CSRF-TOKEN": token
                    },
                    method: "POST"
                  })
                  .then(res => res.json())
                  .then(data => {
                    if ($('#like' + likeID).hasClass('active')) {
                      $('#like' + likeID).removeClass('active');
                    } else {
                      $('#like' + likeID).addClass('active');
                    }
                    likeCount = data
                    likeButtonCount.innerText = likeCount
                  })
              }

              async function dislikeHandler(e) {
                e.preventDefault()
                dislikeButtonCount.innerText = loadingText
                const responce = await fetch(uriDislike, {
                    headers: {
                      "X-CSRF-TOKEN": token
                    },
                    method: "POST"
                  })
                  .then(res => res.json())
                  .then(data => {
                    if ($('#dislike' + likeID).hasClass('active')) {
                      $('#dislike' + likeID).removeClass('active');
                    } else {
                      $('#dislike' + likeID).addClass('active');
                    }
                    dislikeCount = data
                    dislikeButtonCount.innerText = dislikeCount
                  })
              }

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
