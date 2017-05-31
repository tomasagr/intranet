<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Se cancelo la reserva de sala</title>
</head>
<body>
  Estimado {{$reserva->user->fullname}}, el Administrador ha cancelado su reserva para la sala {{$reserva->sala->nombre}} en el horario {{$reserva->franja->start}} - {{$reserva->franja->end}}. Si tiene alguna consulta puede escribir a <a href="mailto:admin@somossummit.com.ar">admin@somossummit.com.ar</a>
</body>
</html>