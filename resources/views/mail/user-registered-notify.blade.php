<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Se ha registrado un nuevo usuario</title>
</head>
<body>
  Se registro un nuevo usuario:

  <p>Nombre: {{$user->fullname}}</p>
  <p>Email: {{$user->email}}</p>
</body>
</html>