<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TocaHores</title>
        <link href="{{mix('css/app.css')}}" type="text/css" rel="stylesheet">
    </head>
    <body>
        @yield('bodyy')
        <!-- script -->
        <div id="app">

        </div>
        @include('modal.lock')
        @include('modal.settings')
        @include('modal.popup')

        <script src="{{mix('js/app.js')}}" type="text/javascript"></script>
        @stack('customscripts')
    </body>
</html>
