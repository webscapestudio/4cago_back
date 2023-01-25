@include('components.head')

<body>

  @include('components.ad.top_ad')


  <main>
    @include('components.header')

    <div class="container">
      <div class="wrap">
        @include('components.aside')

        <div class="feed">

          @yield('content')
        </div>

        @include('components.aside_right')

      </div>
    </div>
  </main>
  @include('components.modals.authorization')
  @include('components.modals.registration')
  @include('components.modals.report')
</body>

<!-- <script src="{{ asset('./js/main.min.js') }}"></script> -->
<script src="{{ asset('./js/main.js') }}"></script>

</html>
