<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welkom</title>
  </head>
  <body>
    Beste {{ $user }},<br><br>
    Het wachtwoord om de applicatie te ontgrendelen is: {{ $data->password }}<br><br>
    <a href="http://project.tocahores">Link naar de applicatie!</a><br><br>
    Met vriendelijke groet,<br>
    Het management team
  </body>
</html>
