<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Correo</title>
</head>
<body>
  <p>Gracias por registrarte. Para terminar con el registro del salón haz click <a href="{{ route('users.confirma_correo',$usuario_id) }}">aquí</a> para finalizar.</p>
</body>
</html>