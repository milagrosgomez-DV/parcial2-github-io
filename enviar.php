<?php
$destinatario = "southpark.dmm2ap@gmail.com"; 
$asunto = "Nuevo mensaje desde el formulario de South Park";

$nombre   = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$email    = $_POST['email'] ?? '';
$asuntoForm = $_POST['asunto'] ?? '';
$mensaje  = $_POST['mensaje'] ?? '';

if (empty($nombre) || empty($apellido) || empty($email) || empty($mensaje)) {
  echo '<div class="container text-center mt-5">
          <div class="alert alert-danger" role="alert">
            ❌ Este campo es obligatorio. Por favor, completa con tus datos.
          </div>
          <a href="index.html" class="btn btn-secondary mt-3">Volver</a>
        </div>';
  exit;
}

$cuerpo = "
  <h2>Nuevo mensaje del formulario de South Park</h2>
  <p><strong>Nombre:</strong> $nombre $apellido</p>
  <p><strong>Email:</strong> $email</p>
  <p><strong>Asunto seleccionado:</strong> $asuntoForm</p>
  <p><strong>Mensaje:</strong><br>$mensaje</p>
";

$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: $nombre <$email>" . "\r\n";

if (mail($destinatario, $asunto, $cuerpo, $headers)) {
  echo '<div class="container text-center mt-5">
          <div class="alert alert-success" role="alert">
            ✅ Tu mensaje fue enviado. ¡Gracias!
          </div>
          <a href="index.html" class="btn btn-primary mt-3">Volver a la página</a>
        </div>';
} else {
  echo '<div class="container text-center mt-5">
          <div class="alert alert-danger" role="alert">
            ❌ Ocurrió un error. Por favor, intenta nuevamente.
          </div>
          <a href="index.html" class="btn btn-secondary mt-3">Volver</a>
        </div>';
}
?>
