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
        <a href="index.php" class="navbar-brand">
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
  <H1 class="titulo">Categorias</H1>
  <div class="row row-cols-2 row-cols-md-4 g-4">
    <div class="col">
      <div class="card">
        <h5 class="card-title">Camisas</h5>
        <a href="camisas.php"><img src="Resources/Categorias/Camisas.png" class="card-img-top" alt="camisas"></a>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <h5 class="card-title">Zapatos</h5>
        <a href="zapatos.php"><img src="Resources/Categorias/zapatos.png" class="card-img-top" alt="zapatos"></a>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <h5 class="card-title">VideoJuegos</h5>
        <a href="videojuegos.php"><img src="Resources/Categorias/Videojuegos.png" class="card-img-top" alt="Videojuegos"></a>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <h5 class="card-title">Accesorios</h5>
        <a href="accesorios.php"><img src="Resources/Categorias/gorra.png" class="card-img-top" alt="Accesorios"></a>
      </div>
    </div>
  
  <div class="col">
      <div class="card">
        <h5 class="card-title">Consolas</h5>
        <a href="consolas.php"><img src="Resources/Categorias/consola.png" class="card-img-top" alt="Consolas"></a>
      </div>
    </div>
  
  <div class="col">
      <div class="card">
        <h5 class="card-title">Computadoras y componentes</h5>
        <a href="computadoras.php"><img src="Resources/Categorias/pc1.jpg" class="card-img-top" alt="Computadoras y componentes"></a>
      </div>
    </div>
  
  <div class="col">
      <div class="card">
        <h5 class="card-title">Celulares</h5>
        <a href="celulares.php"><img src="Resources/Categorias/Celulares.jpg" class="card-img-top" alt="Celulares"></a>
      </div>
    </div>
  <div class="col">
    <div class="card">
      <h5 class="card-title">Pantalones</h5>
      <a href="pantalones.php"><img src="Resources/Categorias/pantalon.png" class="card-img-top" alt="Pantalones"></a>
    </div>
  </div>
</div>  
</div>
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