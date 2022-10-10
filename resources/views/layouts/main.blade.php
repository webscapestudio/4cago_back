@include('components.head')

<body>

    @include('components.ad.top_ad')


    <main>
        @include('components.header')

        <div class="container">
            <div class="wrap">
                @include('components.aside')


                @yield('content')


                @include('components.aside_right')
            </div>
        </div>
    </main>
    @include('components.modals.authorization')
    @include('components.modals.registration')

</body>

<script src="{{ asset('./js/main.min.js') }}"></script>

</html>
