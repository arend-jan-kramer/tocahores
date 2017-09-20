<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TocaHores</title>
        <link href="css/style.css" type="text/css" rel="stylesheet">
        {{-- <link href="{{mix('css/app.css')}}" type="text/css" rel="stylesheet"> --}}
    </head>
    <body>
        <div class="patient">
          {{ Form::open(['url' =>  'unlock', 'method' => 'post']) }}
          {{ Form::input('text', 'inp', null, ["placeholder" => "hello"]) }}
          {{ Form::submit("send", ["class" => 'hidden']) }}
          {{ Form::close() }}
        </div>
        <div class="overview">
          <div class="title">
            <p>Afdelingen</p>
            <p>Totaal beddenenvrij</p>
            <p>Komt vrij</p>
          </div>
          <div class="content">
            <div class="kube">A</div>
            <div class="detail">
              <p>Opnamenkamer</p>
              <p>4</p>
              <p></p>
              <p>Uitslaapkamer</p>
              <p>0</p>
              <p>1 uur 22 Minuten</p>
              <p class="notification"></p>
            </div>
          </div>
        </div>
        <!-- script -->
        {{-- <script src="{{mix('js/app.js')}}" type="text/javascript"></script>
        @stack('customscripts') --}}
    </body>
</html>
