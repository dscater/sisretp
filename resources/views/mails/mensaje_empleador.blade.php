<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Correo</title>
</head>
<body>
  <p><strong>De: </strong> {{mb_strtoupper($nombre)}}</p>
  <p><strong>Correo: </strong> {{mb_strtoupper($email)}}</p>
  <p><strong>Razón: </strong> {{mb_strtoupper($razon)}}</p>
  <p><strong>Mensaje: </strong> {{mb_strtoupper($mensaje)}}</p>
</body>
</html>