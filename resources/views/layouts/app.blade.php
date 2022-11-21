<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Useful meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    <meta name="google" content="notranslate">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="Description...">
    <meta name="keywords" content="HTML, CSS, JavaScript, Shop">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#9B9B9B">
    <!-- Favicons -->
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="16x16" href="/">
    <link rel="icon" type="image/png" sizes="32x32" href="/">
    <link rel="icon" type="image/png" sizes="96x96" href="/">
    <link rel="icon" type="image/png" sizes="120x120" href="/">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/apple-touch-icon-180x180.png">
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <script src="https://jsuites.net/v4/jsuites.webcomponents.js"></script>
    <!-- <link rel="manifest" href="./images/manifest.json"> -->
    <link rel="stylesheet" href="./css/main.min.css">


</head>

<body>

    <main>
        @yield('content')
    </main>

</body>

</html>
