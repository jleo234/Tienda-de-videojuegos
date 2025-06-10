<?php
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['registro'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if ($email && $password) {
            if (!file_exists("usuarios.txt")) {
                file_put_contents("usuarios.txt", "");
            }

            $usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES);
            $existe = false;

            foreach ($usuarios as $usuario) {
                list($e, $p) = explode("|", $usuario);
                if ($e == $email) {
                    $existe = true;
                    break;
                }
            }

            if ($existe) {
                $mensaje = "⚠️ Este correo ya está registrado.";
            } else {
                file_put_contents("usuarios.txt", $email . "|" . $password . PHP_EOL, FILE_APPEND);
                $mensaje = "✅ Registro exitoso. Ahora puedes iniciar sesión.";
            }
        } else {
            $mensaje = "❌ Todos los campos son obligatorios.";
        }

    } elseif (isset($_POST['login'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if ($email && $password) {
            if (file_exists("usuarios.txt")) {
                $usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES);
                $valido = false;

                foreach ($usuarios as $usuario) {
                    list($e, $p) = explode("|", $usuario);
                    if ($e == $email && $p == $password) {
                        $valido = true;
                        break;
                    }
                }

                if ($valido) {
                    header("Location: index.html");
                    exit();
                } else {
                    $mensaje = "❌ Correo o contraseña incorrectos.";
                }
            } else {
                $mensaje = "❌ No hay usuarios registrados.";
            }
        } else {
            $mensaje = "❌ Todos los campos son obligatorios.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login & Registro</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f1f1f1;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .contenedor {
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    form {
      display: flex;
      flex-direction: column;
    }
    input {
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    button {
      padding: 10px;
      background: #6c63ff;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      margin-top: 10px;
    }
    .mensaje {
      text-align: center;
      margin-top: 10px;
      color: #ff3333;
    }
    .switch {
      text-align: center;
      margin-top: 10px;
    }
    .switch a {
      color: #6c63ff;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="contenedor">
    <h2 id="titulo">Iniciar Sesión</h2>

    <?php if ($mensaje): ?>
      <div class="mensaje"><?= $mensaje ?></div>
    <?php endif; ?>

    <form method="POST" id="formulario">
      <input type="email" name="email" placeholder="Correo electrónico" required>
      <input type="password" name="password" placeholder="Contraseña" required>
      <button type="submit" name="login">Iniciar sesión</button>
      <div class="switch">
        ¿No tienes cuenta? <a href="#" onclick="alternarFormulario('registro')">Regístrate</a>
      </div>
    </form>

    <form method="POST" id="formularioRegistro" style="display: none;">
      <input type="email" name="email" placeholder="Correo electrónico" required>
      <input type="password" name="password" placeholder="Contraseña" required>
      <button type="submit" name="registro">Registrarse</button>
      <div class="switch">
        ¿Ya tienes cuenta? <a href="#" onclick="alternarFormulario('login')">Inicia sesión</a>
      </div>
    </form>
  </div>

  <script>
    function alternarFormulario(tipo) {
      const login = document.getElementById('formulario');
      const registro = document.getElementById('formularioRegistro');
      const titulo = document.getElementById('titulo');

      if (tipo === 'registro') {
        login.style.display = 'none';
        registro.style.display = 'block';
        titulo.textContent = 'Registrarse';
      } else {
        login.style.display = 'block';
        registro.style.display = 'none';
        titulo.textContent = 'Iniciar Sesión';
      }
    }
  </script>
</body>
</html>



