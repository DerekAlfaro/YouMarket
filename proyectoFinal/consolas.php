<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- MetaDatos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouMarket</title>
    <!-- Enlace a los estilos personalizados -->
    <link rel="stylesheet" href="styles/styleCompra.css">
    <!-- Enlace a Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary">
    <div class="container-fluid">
        <a href="Categorias.php" class="navbar-brand">
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

<!-- Contenido Principal-Artículos -->
<section class="categoria">
    <h1 class="titulo">Consolas</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
        require 'conexion.php';
        
        // Consulta para obtener los productos y el nombre del usuario
        $query = "
            SELECT productos.id, productos.nombre, productos.image, productos.precio, productos.estado, usuarios.nombre AS usuario_nombre
            FROM productos
            JOIN usuarios ON productos.usuario_id = usuarios.id
            WHERE productos.categoria = 'Consolas'
            ORDER BY productos.id DESC
        ";
        
        $rows = mysqli_query($conexion, $query);
        
        // Verificar si hay resultados
        if (mysqli_num_rows($rows) > 0) {
            // Iterar sobre los resultados y mostrar cada producto
            while ($row = mysqli_fetch_assoc($rows)) {
                echo '<div class="col">
                          <div class="card">
                            <a href="PestañaCompra.php?id=' . $row['id'] . '">
                                <img src="Resources/Productos/' . $row['image'] . '" class="card-img-top" id="productos">
                            </a>
                              <div class="card-body">
                                  <h5 class="card-title">' . htmlspecialchars($row['nombre']) . '</h5>
                                  <h6 class="card-subtitle mb-2 text-muted">' . htmlspecialchars($row['usuario_nombre']) . '</h6>
                                  <p>Precio: ₡' . htmlspecialchars($row['precio']) . '<br>Estado: ' . htmlspecialchars($row['estado']) . '</p>
                              </div>
                          </div>
                      </div>';
            }
        } else {
            echo '<div class="text-center w-100">
                <p>No hay productos disponibles en esta categoría.</p>
            </div>';
        }
        // Liberar el conjunto de resultados
        mysqli_free_result($rows);

        // Cerrar conexión
        mysqli_close($conexion);
        ?>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="footer-top">
        <div class="container text-center">
            <h5 class="fw-bold">YouMarket</h5>
            <p>Tu plataforma para emprender y encontrar todo</p>
            <p>© 2024 YouMarket. Todos los derechos reservados.</p>
            <p>
              <a href="#" class="text-white me-3">Política de Privacidad</a>
              <a href="#" class="text-white">Términos de Uso</a>
          </p>
          <p>
            <br>
            <h5 class="fw-bold">Contactenos</h5>
              <a href="https://www.instagram.com/deep.flowwer/" target="_blank">
                  <img src="Resources/instagram.png" alt="Instagram" style="width:24px; height:24px;" class="ImgContacto"></a>
              <a href="https://web.whatsapp.com" target="_blank">
                  <img src="Resources/whatsapp.png" alt="whatsapp" style="width:24px; height:24px;" class="ImgContacto"></a>
                  <a href="https://www.facebook.com/" target="_blank">
                    <img src="Resources/facebook.png" alt="facebook" style="width:24px; height:24px;" class="ImgContacto"></a>
                <a href="https://mail.google.com/mail" target="_blank">
                    <img src="Resources/gmail.png" alt="gmail" style="width:24px; height:24px;" class="ImgContacto"></a>
          </p>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p>Desarrollado por:</p>
            <p>Derek Alfaro, Jose Hernandez, Fabian Alvarez, Filander Molina</p>
            <p>Curso: Progra IV</p>
            <p>Año: 2024</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
