<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>TocaHores</title>
        <link href="{{mix('css/app.css')}}" type="text/css" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="/img/settings.png"/>
    </head>
    <body>
        @yield('bodyy')

        @include('modal.lock')
        @include('modal.settings')
        @include('modal.popup')

        <!-- script -->
        <script src="{{mix('js/app.js')}}" type="text/javascript"></script>
    </body>
</html>
