<?php
include("conexion.php");

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $contrasena = $_POST['contrasena'];

    // Validaciones básicas
    if (empty($nombre) || empty($correo) || empty($contrasena)) {
        $mensaje = "Todos los campos son obligatorios.";
    } else {
        // Verificar si el correo ya está registrado
        $stmt = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $mensaje = "❌ El correo ya está registrado.";
        } else {
            // Guardar usuario
            $hash = password_hash($contrasena, PASSWORD_DEFAULT);
            $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, correo, contraseña) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nombre, $correo, $hash);

            if ($stmt->execute()) {
                $mensaje = "✅ Cuenta registrada con éxito.";
            } else {
                $mensaje = "❌ Error al registrar la cuenta.";
            }
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de cuenta</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">

<div class="container py-5">
  <div class="mx-auto p-4 border rounded bg-white shadow" style="max-width: 400px;">
    <h4 class="text-center mb-3">Registro</h4>

    <?php if ($mensaje): ?>
      <div class="alert alert-info text-center"><?php echo $mensaje; ?></div>
    <?php endif; ?>

    <a href="index.html" class="btn btn-secondary w-100">Volver al inicio</a>
  </div>
</div>

</body>
</html>
