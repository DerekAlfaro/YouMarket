<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: register.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Producto</title>
    <link rel="stylesheet" href="styles/styleVender.css">
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

<!-- Formulario de subida de articulo-->
<div class="container my-5">
    <div class="row">
        <!-- Columna izquierda con el formulario -->
        <div class="col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="hidden" id="usuario_id" name="usuario_id" value="<?php echo $_SESSION['usuario_id']; ?>">
                    <label for="productName" class="form-label">Nombre del producto</label>
                    <input type="text" class="form-control" id="productName" name="productName" placeholder="Nombre del producto" required>
                </div>
                <h5>Acerca de este producto:</h5>
                <div class="mb-3">
                    <label for="price" class="form-label">Precio:</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Ingrese el precio en ₡" required>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Categoría:</label>
                    <select class="form-select" id="category" name="category" required>
                        <option selected>Consolas</option>
                        <option>Videojuegos</option>
                        <option>Camisas</option>
                        <option>Celulares</option>
                        <option>Accesorios</option>
                        <option>Zapatos</option>
                        <option>Computadoras y componentes</option>
                        <option>Pantalones</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="usage" class="form-label">Estado:</label>
                    <select class="form-select" id="usage" name="usage" required>
                        <option selected>Nuevo</option>
                        <option>Usado - Como Nuevo</option>
                        <option>Usado - Buen estado</option>
                        <option>Usado - Aceptable</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="saleReason" class="form-label">Razón de venta:</label>
                    <input type="text" class="form-control" id="saleReason" name="saleReason" placeholder="Escribe la razón de venta" required>
                </div>
                <div class="mb-3">
                    <label for="salePlace" class="form-label">Lugar de venta:</label>
                    <input type="text" class="form-control" id="salePlace" name="salePlace" placeholder="Escribe el lugar de venta" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción:</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Ingresa una descripción más detallada del producto"></textarea>
                </div>
        </div>
        <!-- Columna derecha con la imagen y el botón -->
        <div class="col-md-6 text-center">
            <div class="upload-box">
                <label for="upload" class="form-label"></label>
                <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png" class="form-control-file" onchange="previewImage(event)" required>
            </div>
                <center><img id="preview" src="#" alt="Vista previa de la imagen" style="max-width: 350px; margin-top: 20px; display: none;"></center>
                <button type="submit" name="Vender" class="btn btn-custom mt-3">Vender producto</button>
                </form>
        </div>
    </div>
</div>

        

<!-- Footer -->
<footer>
  <div class="footer-top">
      <div class="footer-container text-center">
          <h5 class="fw-bold">YouMarket</h5>
          <p>Descubre y compra productos únicos</p>
          <p>© 2024 YouMarket. Todos los derechos reservados.</p>
          <p>
            <a href="#" class="text-white me-3">Política de Privacidad</a>
            <a href="#" class="text-white">Términos de Uso</a>
        </p>
        <p>
          <br>
          <h5 class="fw-bold">Contactenos</h5>
          <a href="https://www.instagram.com/deep.flowwer/" target="_blank">
                  <img src="Resources/Categorias/Icons/igicon.svg" alt="Instagram" style="width:50px; height:50px;" class="ImgContacto"></a>
              <a href="https://web.whatsapp.com" target="_blank">
                  <img src="Resources/Categorias/Icons/whticon.svg" alt="whatsapp" style="width:50px; height:50px;" class="ImgContacto"></a>
                  <a href="https://www.facebook.com/" target="_blank">
                    <img src="Resources/Categorias/Icons/faceicon.svg" alt="facebook" style="width:50px; height:50px;" class="ImgContacto"></a>
                <a href="https://mail.google.com/mail" target="_blank">
                    <img src="Resources/Categorias/Icons/emailicon.svg" alt="gmail" style="width:50px; height:50px;" class="ImgContacto"></a>
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

<script>
function previewImage(event) {
    var input = event.target;
    var preview = document.getElementById('preview');

    var reader = new FileReader();
    reader.onload = function() {
        preview.src = reader.result;
        preview.style.display = 'block';
    }
    if (input.files[0]) {
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


<?php
require 'conexion.php';

if (isset($_POST['Vender'])) {
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $usage = $_POST['usage'];
    $saleReason = $_POST['saleReason'];
    $salePlace = $_POST['salePlace'];
    $description = $_POST['description'];
    $usuario_id = $_POST['usuario_id'];

    // Validación de la imagen
    if ($_FILES["image"]["error"] === 4) {
        echo "<script>alert('Imagen no existe');</script>";
    } else {
        $fileName = $_FILES["image"]["name"];
        $tempName = $_FILES["image"]["tmp_name"];
        $fileSize = $_FILES["image"]["size"];

        $validImageExtensions = ['jpg', 'jpeg', 'png'];
        $imageExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        if (!in_array(strtolower($imageExtension), $validImageExtensions)) {
            echo "<script>alert('Extensión de imagen inválida');</script>";
        } elseif ($fileSize > 1000000) {
            echo "<script>alert('El tamaño de la imagen es demasiado grande');</script>";
        } else {
            $newImageName = uniqid('', true) . '.' . $imageExtension;
            $targetPath = 'Resources/Productos/' . $newImageName;

            if (move_uploaded_file($tempName, $targetPath)) {
                $query = "INSERT INTO productos (nombre, image, precio, categoria, estado, razon_venta, lugar_venta, descripcion, usuario_id) 
                          VALUES ('$productName', '$newImageName', '$price', '$category', '$usage', '$saleReason', '$salePlace', '$description', '$usuario_id')";
                if (mysqli_query($conexion, $query)) {
                    echo "<script>alert('Producto subido correctamente');</script>";
                } else {
                    echo "<script>alert('Error al subir el producto a la base de datos');</script>";
                }
            } else {
                echo "<script>alert('Error al mover la imagen');</script>";
            }
        }
    }
    mysqli_close($conexion);
}
?>

