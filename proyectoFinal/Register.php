<?php
    require 'conexion.php';

    if (isset($_POST['register'])) {
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $correo = $_POST['correo'];
        $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);


        $query = "INSERT INTO usuarios (nombre, correo, contrasena, apellido1) VALUES ('$nombre', '$correo', '$contrasena', '$apellido1')";
        if(mysqli_query($conexion, $query)){
            echo "<script>alert('Usuario registrado exitosamente');</script>";
        } else {
            echo "<script>alert('Error al insertar en la base de datos');</script>";
        }
    }

    //login
    session_start();
    if (isset($_POST['login'])) {
        if (isset($_POST['correo']) && isset($_POST['contrasena'])) {
            $correo = $conexion->real_escape_string($_POST['correo']);
            $contrasena = $_POST['contrasena'];

            $query = "SELECT * FROM usuarios WHERE correo = '$correo'";
            $result = mysqli_query($conexion, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $usuario = mysqli_fetch_assoc($result);

            if (password_verify($contrasena, $usuario['contrasena'])) {
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                echo "<script>alert('Redirigiendo....);</script>";
                header("Location: Contenido.php");
                exit();
            } else {
                echo "<script>alert('Contraseña incorrecta');</script>";
            }
        } else {
            echo "<script>alert('Correo no encontrado');</script>";
        }
    } else {
        echo "<script>alert('Por favor, complete todos los campos');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web con Navbar y Formulario</title>
    <link rel="stylesheet" href="styles/styleRegister.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<nav class="navbar sticky-top bg-body-tertiary">
    <div class="container-fluid">
    <a href="index.php"><img src="Resources/logo_png.png" class="logo-header" alt="Logo YouMarket"></a>
</nav>

<section>
<div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" class="sign-in-form" method="post">
            <h2 class="title">Iniciar Sesion</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="correo" placeholder="Correo" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="contrasena" placeholder="Contraseña" />
            </div>
            <button class="btn solid" type="submit" name="login">Login</button>
          </form>
          <form action="" class="sign-up-form" method="post">
            <h2 class="title">Registrate</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="nombre" id="nombre" placeholder="Nombre" required />
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="apellido1" id="apellido1" placeholder="Apellido" required />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="correo" id="correo" placeholder="Email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" required/>
            </div>
            <input type="submit" class="btn" name="register" value="Registrarse" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>¿Eres nuevo por aquí?</h3>
            <p>
                ¡Regístrate para acceder a nuestro marketplace y descubre los artículos que deseas comprar y vender!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Registrarse
            </button>
          </div>
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>¿Ya eres nuestro usuario?</h3>
            <p>
                ¡Inicia sesión para acceder a nuestro marketplace y gestionar tus compras y ventas!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Log In
            </button>
          </div>
        </div>
      </div>
</div>
</section>


<script>
const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
</script>

</body>
</html>


