<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: register.php");
    exit();
}

require 'conexion.php';

$usuario_id = $_SESSION['usuario_id'];

// Consultar la información del usuario
$query_usuario = "SELECT * FROM usuarios WHERE id = $usuario_id";
$result_usuario = $conexion->query($query_usuario);
$usuario = $result_usuario->fetch_assoc();

// Consultar los productos del usuario
$query_productos = "SELECT id, nombre, image, precio, estado FROM productos WHERE usuario_id = $usuario_id";
$result_productos = $conexion->query($query_productos);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si se ha enviado el formulario
    if (isset($_POST['guardar'])) {
        $edad = $_POST['edad'];
        $genero = $_POST['genero'];
        $ubicacion = $_POST['ubicacion'];
        $descripcion = $_POST['descripcion'];

        // Validación y manejo de la imagen
        if (!empty($_FILES["profile_image"]["name"])) {
            $fileName = $_FILES["profile_image"]["name"];
            $tempName = $_FILES["profile_image"]["tmp_name"];
            $fileSize = $_FILES["profile_image"]["size"];

            $validImageExtensions = ['jpg', 'jpeg', 'png'];
            $imageExtension = pathinfo($fileName, PATHINFO_EXTENSION);

            if (!in_array(strtolower($imageExtension), $validImageExtensions)) {
                echo "<script>alert('Extensión de imagen inválida');</script>";
            } elseif ($fileSize > 1000000) {
                echo "<script>alert('El tamaño de la imagen es demasiado grande');</script>";
            } else {
                $newImageName = uniqid('', true) . '.' . $imageExtension;
                $targetPath = 'Resources/FotoPerfil/' . $newImageName;

                if (move_uploaded_file($tempName, $targetPath)) {
                    $query = "UPDATE usuarios SET edad = '$edad', genero = '$genero', ubicacion = '$ubicacion', descripcion = '$descripcion', fotoPerfil = '$newImageName' WHERE id = '$usuario_id'";
                    if (mysqli_query($conexion, $query)) {
                        header("Location: ".$_SERVER['PHP_SELF']); // Redirige para actualizar la imagen
                        exit();
                        $usuario['profile_image'] = $newImageName;
                    } else {
                        echo "<script>alert('Error al insertar en la base de datos');</script>";
                    }
                } else {
                    echo "<script>alert('Error al mover la imagen');</script>";
                }
            }
        } else {
            $query = "UPDATE usuarios SET edad = '$edad', genero = '$genero', ubicacion = '$ubicacion', descripcion = '$descripcion' WHERE id = '$usuario_id'";
            if (mysqli_query($conexion, $query)) {
                echo "<script>alert('Datos guardados exitosamente');</script>";
                 header("Location: ".$_SERVER['PHP_SELF']); // Redirige para actualizar los datos
                exit();
            } else {
                echo "<script>alert('Error al insertar en la base de datos');</script>";
            }
        }
    }
    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Perfil</title>
  <link rel="stylesheet" href="styles/stylePerfil.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary">
    <div class="container-fluid">
        <a href="Contenido.php" class="navbar-brand">
            <img src="Resources/logo_png.png" class="logo-header" alt="Logo YouMarket">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <a href="Ventas.php"><button class="btn btn-custom" type="button">Vender</button></a>
            <form class="d-flex ms-auto me-lg-4" role="search" action="busqueda.php" method="POST">
                <input class="form-control me-2" type="search" placeholder="Buscar Productos" name="buscar" id="buscar" aria-label="Search">
                <button class="btn btn-custom" type="submit">Buscar</button>
            </form>
            <a href="Miperfil.php">
                <button id="MiPerfil" class="btn btn-custom" type="button">
                    <?php 
                        if (!isset($_SESSION['usuario_id'])) {
                            echo "Iniciar sesión";
                        } else {
                            echo htmlspecialchars($_SESSION['usuario_nombre']);
                        }
                    ?>
                </button>
            </a>
        </div>
    </div>
</nav>

    <section class="container mt-4">
      <div class="row">
        <div class="col-md-4">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="profile-image-container">
              <img src="Resources/FotoPerfil/<?php echo htmlspecialchars($usuario['fotoPerfil']); ?>" id="profileImage" class="img-fluid rounded-circle mb-3">
            </div>
            <input type="file" class="form-control mt-2" name="profile_image" id="profileImageInput" accept="image/*" style="display: none;">
        </div>
        <div class="col-md-8">
          <h2><?php echo htmlspecialchars($usuario['nombre']); ?> <?php echo htmlspecialchars($usuario['apellido1']); ?></h2>
          <h4>Acerca de mi</h4>
          <p>Edad:</p>
          <input type="text" class="form-control" id="edad" name="edad" value="<?php echo htmlspecialchars($usuario['edad']); ?>" disabled>
          <p>Genero:</p>
          <select class="form-select" id="genero" name="genero" disabled>
            <option <?php echo $usuario['genero'] == 'Prefiero no decirlo' ? 'selected' : ''; ?>>Prefiero no decirlo</option>
            <option <?php echo $usuario['genero'] == 'Hombre' ? 'selected' : ''; ?>>Hombre</option>
            <option <?php echo $usuario['genero'] == 'Mujer' ? 'selected' : ''; ?>>Mujer</option>
          </select>
          <p>Vivo en:</p>
          <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="<?php echo htmlspecialchars($usuario['ubicacion']); ?>" disabled>
          <p>Una pequeña descripción de mi:</p>
          <textarea class="form-control" id="descripcion" name="descripcion" rows="3" disabled><?php echo htmlspecialchars($usuario['descripcion']); ?></textarea>
        </div>
      </div>
      <button id="editButton" class="btn btn-custom ms-3" type="button" onclick="enableEditing()">Editar Perfil</button>
      <button type="submit" name="guardar" id="guardar" class="btn btn-primary ms-3" style="display: none;">Guardar Cambios</button>
      </form>
      <hr>

      <!-- Listar los artículos en venta -->
      <div class="row mt-4">
        <div class="col-md-12">
          <h3>Artículos en Venta</h3>
          <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php if ($result_productos->num_rows > 0): ?>
              <?php while($producto = $result_productos->fetch_assoc()): ?>
                <div class="col">
                  <div class="card">
                    <a href="PestañaCompra.php?id=<?php echo $producto['id']; ?>">
                      <img src="Resources/Productos/<?php echo $producto['image']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
                    </a>
                    <div class="card-body">
                      <h5 class="card-title"><?php echo htmlspecialchars($producto['nombre']); ?></h5>
                      <p>Precio: ₡<?php echo htmlspecialchars($producto['precio']); ?> <br> Estado: <?php echo htmlspecialchars($producto['estado']); ?></p>
                      <a href="PestañaCompra.php?id=<?php echo $producto['id']; ?>" class="btn btn-primary w-100 p-0">Ver Artículo</a>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php else: ?>
              <p class="text-center">No tienes artículos en venta.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <hr>
    </section>

    <!-- Footer -->
    <footer>
      <div class="footer-top">
        <div class="footer-container text-center">
          <h5 class="fw-bold">YouMarket</h5>
          <p>Tu plataforma para emprender y encontrar todo</p>
          <p>© 2024 YouMarket. Todos los derechos reservados.</p>
          <p>
            <a href="#" class="text-white me-3">Política de Privacidad</a>
            <a href="#" class="text-white">Términos de Uso</a>
          </p>
          <p>
            <br>
            <h5 class="fw-bold">Contáctenos</h5>
            <a href="https://www.instagram.com/deep.flowwer/" target="_blank">
              <img src="Resources/instagram.png" alt="Instagram" style="width:24px; height:24px;" class="ImgContacto"></a>
            <a href="https://web.whatsapp.com/" target="_blank">
              <img src="Resources/whatsapp.png" alt="whatsapp" style="width:24px; height:24px;" class="ImgContacto"></a>
            <a href="https://www.facebook.com/" target="_blank">
              <img src="Resources/facebook.png" alt="facebook" style="width:24px; height:24px;" class="ImgContacto"></a>
            <a href="https://mail.google.com/mail" target="_blank">
              <img src="Resources/gmail.png" alt="gmail" style="width:24px; height:24px;" class="ImgContacto"></a>
          </p>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="footer-container text-center">
          <p>Desarrollado por:</p>
          <p>Derek Alfaro, Jose Hernandez, Fabian Alvarez, Filander Molina</p>
          <p>Curso: Progra IV</p>
          <p>Año: 2024</p>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function enableEditing() {
            // Habilitar campos
            document.getElementById('profileImageInput').style.display = 'block';
            document.getElementById('edad').disabled = false;
            document.getElementById('ubicacion').disabled = false;
            document.getElementById('genero').disabled = false;
            document.getElementById('descripcion').disabled = false;

            // Mostrar el botón para subir imagen y el input de archivo
            document.getElementById('guardar').style.display = 'block';
            document.getElementById('editButton').style.display = 'none';
        }
    </script>
  </body>
</html>
