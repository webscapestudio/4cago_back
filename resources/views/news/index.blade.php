@extends('layouts.main')
@section('content')
  <form class="form__search" action="" method="get">
    <div class="form__top">
      <input class="input input__search" type="text" id="search" name="search" placeholder="Поиск">

      <div submit class="block svg">

        <svg class="icon" viewBox="0 0 24 24" fill="none">
          <path
            d="M15.5944 6.8076C13.168 4.38119 9.23401 4.38119 6.8076 6.8076C4.38119 9.23401 4.38119 13.168 6.8076 15.5944C9.23401 18.0208 13.168 18.0208 15.5944 15.5944C18.0208 13.168 18.0208 9.23401 15.5944 6.8076ZM5.39338 5.39338C8.60084 2.18593 13.8012 2.18593 17.0086 5.39338C19.9767 8.36148 20.1982 13.0361 17.6731 16.2589L21.799 20.3848C22.1895 20.7753 22.1895 21.4085 21.799 21.799C21.4084 22.1895 20.7753 22.1895 20.3848 21.799L16.2589 17.6731C13.0361 20.1982 8.36148 19.9767 5.39338 17.0086C2.18593 13.8012 2.18593 8.60084 5.39338 5.39338Z">
          </path>
        </svg>

      </div>
    </div>
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
  </form>

  <div class="feed" id="data-wrapper">
    <!-- Results -->
  </div>
  <!-- Data Loader -->
  <div class="auto-load text-center">
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
    var ENDPOINT = "{{ url('/') }}";
    var page = 1;
    infinteLoadMore(page);
    $(document).on('click', '.read-more', function(e) {
      e.preventDefault();
      page++;
      infinteLoadMore(page);

    });

    function infinteLoadMore(page) {
      $.ajax({
          url: ENDPOINT + "/news?page=" + page,
          datatype: "html",
          type: "get",
          beforeSend: function() {
            $('.auto-load').show();
          }
        })
        .done(function(response) {
          if (response.length == 0) {
            $('.auto-load').html("We don't have more data to display :(");
            return;
          }
          $('.auto-load').hide();
          $("#data-wrapper").append(response);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
          console.log('Server error occured');
        });
    }
  </script>
  <script>
    $(document).ready(function() {
      $('#search').on('keyup', function() {
        var value = $(this).val();
        if (value != 0) {
          $.ajax({
            type: "get",
            url: "/news/search",
            data: {
              'search': value
            },
            success: function(data) {
              $('#read-more').hide();
              $('#data-wrapper').html(data);
            }
          });
        } else {
          $.ajax({
              url: "/news?page=1",
              datatype: "html",
              type: "get",
              beforeSend: function() {
                $('.auto-load').show();
              }
            })
            .done(function(response) {
              if (response.length == 0) {
                $('.auto-load').html("We don't have more data to display :(");
                return;
              }
              $('.auto-load').hide();
              $('#read-more').show();
              $("#data-wrapper").html(response);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
              console.log('Server error occured');
            });
        }
      });
    });
  </script>
@endsection
