<?php
session_start();
require 'conexion.php';

if (isset($_GET['id'])) {
    $vendedor_id = $_GET['id'];

    // Consultar la información del vendedor
    $query_vendedor = "SELECT * FROM usuarios WHERE id = $vendedor_id";
    $result_vendedor = $conexion->query($query_vendedor);
    $vendedor = $result_vendedor->fetch_assoc();

    // Consultar los productos del vendedor
    $query_productos = "SELECT id, nombre, image, precio, estado FROM productos WHERE usuario_id = $vendedor_id";
    $result_productos = $conexion->query($query_productos);
} else {
    echo "ID de vendedor no especificado.";
    exit();
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
            <div class="profile-image-container">
                <img src="Resources/FotoPerfil/<?php echo htmlspecialchars($vendedor['fotoPerfil']); ?>" id="profileImage" class="img-fluid rounded-circle mb-3">
            </div>
        </div>
        <div class="col-md-8">
            <h2><?php echo htmlspecialchars($vendedor['nombre']); ?> <?php echo htmlspecialchars($vendedor['apellido1']); ?></h2>
            <h4>Acerca de mi</h4>
            <p>Edad: <?php echo htmlspecialchars($vendedor['edad']); ?></p>
            <p>Género: <?php echo htmlspecialchars($vendedor['genero']); ?></p>
            <p>Vivo en: <?php echo htmlspecialchars($vendedor['ubicacion']); ?></p>
            <p>Una pequeña descripción de mi: <?php echo htmlspecialchars($vendedor['descripcion']); ?></p>
        </div>
    </div>
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
                    <p class="text-center">Este vendedor no tiene artículos en venta.</p>
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
    
</body>
</html>
