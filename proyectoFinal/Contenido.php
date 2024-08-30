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
    <link rel="stylesheet" href="styles/styles.css">
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

<!-- Encabezado Principal -->
<header class="text-center mb-5 fw-bold">
        <img src="Resources/Ventas/Logo.svg" class="cardLogo" alt="Logo">
        <h1 class="TextBanner fw-bold">Bienvenidos a YouMarket</h1>
        <section class="containertxt">
            <h2 class="container__typing lead">
            "Descubre y compra productos únicos"
            </h2>
        </section>
        <a href="Categorias.php"><button type="button" class="btn btn-custom btn-lg mb-5" href="Categorias.php" id="categorias">Categorias</button></a>
</header>

<!-- Publicidades -->
<section class="Publicidad">
<div class="slider">
        <div class="slide-track">
            <div class="slide">
                <img src="Resources/Categorias/Icons/1.svg" alt="">
            </div>
            <div class="slide">
                <img src="Resources/Categorias/Icons/2.svg" alt="">
            </div>
            <div class="slide">
                <img src="Resources/Categorias/Icons/3.svg" alt="">
            </div>
            <div class="slide">
                <img src="Resources/Categorias/Icons/4.svg" alt="">
            </div>
            <div class="slide">
                <img src="Resources/Categorias/Icons/5.svg" alt="">
            </div>
            <div class="slide">
                <img src="Resources/Categorias/Icons/6.svg" alt="">
            </div>
            <div class="slide">
                <img src="Resources/Categorias/Icons/7.svg" alt="">
            </div>
            <div class="slide">
                <img src="Resources/Categorias/Icons/8.svg" alt="">
            </div>
<!-- Segunda serie de diapositivas-->
            <div class="slide">
                <img src="Resources/Categorias/Icons/1.svg" alt="">
            </div>
            <div class="slide">
                <img src="Resources/Categorias/Icons/2.svg" alt="">
            </div>
            <div class="slide">
                <img src="Resources/Categorias/Icons/3.svg" alt="">
            </div>
            <div class="slide">
                <img src="Resources/Categorias/Icons/4.svg" alt="">
            </div>
            <div class="slide">
                <img src="Resources/Categorias/Icons/5.svg" alt="">
            </div>
            <div class="slide">
                <img src="Resources/Categorias/Icons/6.svg" alt="">
            </div>
            <div class="slide">
                <img src="Resources/Categorias/Icons/7.svg" alt="">
            </div>
            <div class="slide">
                <img src="Resources/Categorias/Icons/8.svg" alt="">
            </div>
        </div>
</div>
</section>

<!-- Contenido Principal-Artículos -->
<section class="container mt-5">
    <h2 class="text-center mb-4 mb-5 fw-bold">Categorías más vendidas</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4" id="categoriasVendidas">
        <div class="col" > 
            <a href="Categorias.php" class="masVendidas"><div class="card h-100">
                <img src="Resources/Ventas/1.svg" class="card-img-top" alt="Ropa">
                <div class="card__content">
                    <p class="card__title">Prendas</p>
                    <p class="card__description">
                        Ofrecemos una amplia variedad de prendas para satisfacer las necesidades de todos nuestros clientes. Desde ropa casual y deportiva hasta trajes formales y de gala, tenemos opciones para cada ocasión.
                    <ul>
                        <li>Camisas</li>
                        <li>Sudaderas</li>
                        <li>Jeans</li>
                        <li>Shorts</li>
                        <li>Vestidos</li>
                    </ul>
                    </p>
                </div>
            </div></a>
        </div>
        <div class="col">
            <a href="celulares.php" class="masVendidas"><div class="card h-100">
                <img src="Resources/Ventas/2.svg" class="card-img-top" alt="Dispositivos">
                <div class="card__content">
                    <p class="card__title">Celulares y Accesorios</p>
                    <p class="card__description">
                        Publica y encuentra el celular perfecto para ti en nuestra plataforma, donde calidad, variedad y buenos precios están garantizados.
                    <ul>
                        <li>Iphone</li>
                        <li>Samsung</li>
                        <li>Xiomi</li>
                        <li>Huawei</li>
                        <li>Otros..</li>
                    </ul>
                    </p>
                </div>
            </div></a>
        </div>
        <div class="col">
            <a href="Categorias.php" class="masVendidas"><div class="card h-100">
                <img src="Resources/Ventas/3.svg" class="card-img-top" alt="Gaming">
                <div class="card__content">
                    <p class="card__title">Consolas y Videojuegos</p>
                    <p class="card__description">
                        Publica y encuentra la consola perfecta para ti en nuestra plataforma, donde la variedad, calidad y buenos precios están garantizados.
                    <ul>
                        <li>Consolas</li>
                        <li>Juegos</li>
                        <li>Controles</li>
                        <li>Accesorios</li>
                    </ul>
                    </p>
                </div>
            </div></a>
        </div>
        <div class="col">
            <a href="accesorios.php" class="masVendidas"><div class="card h-100">
                <img src="Resources/Ventas/4.svg" class="card-img-top" alt="Accesorios">
                <div class="card__content">
                    <p class="card__title">Accesorios</p>
                    <p class="card__description">
                        Publica y encuentra el accesorio perfecto para ti en nuestra plataforma, donde variedad, calidad y buenos precios están garantizados.
                    <ul>
                        <li>Bolsos</li>
                        <li>Joyería</li>
                        <li>Gorras</li>
                    </ul>
                    </p>
                </div>
            </div></a>
        </div>
        <div class="col">
            <a href="zapatos.php" class="masVendidas"><div class="card h-100">
                <img src="Resources/Ventas/5.svg" class="card-img-top" alt="Sneakers">
                <div class="card__content">
                    <p class="card__title">Calzado</p>
                    <p class="card__description">
                        Publica y encuentra el par de zapatos perfecto para ti en nuestra plataforma, donde calidad, variedad y buenos precios están garantizados.
                    <ul>
                        <li>Calzado de Vestir</li>
                        <li>Sneakers</li>
                        <li>Deportivos</li>
                    </ul>
                    </p>
                </div>
            </div></a>
        </div>
        <div class="col">
            <a href="computadoras.php" class="masVendidas"><div class="card h-100">
            <img src="Resources/Ventas/6.svg" class="card-img-top" alt="Computadoras">
                <div class="card__content">
                    <p class="card__title">PC y Componentes</p>
                    <p class="card__description">
                        Publica y encuentra el PC o componente perfecto para ti en nuestra plataforma, donde calidad, variedad y buenos precios están garantizados.
                    <ul>
                        <li>MotherBoard</li>
                        <li>Procesadores</li>
                        <li>Almacenamiento</li>
                        <li>Laptops</li>
                        <li>Gaming</li>
                    </ul>
                    </p>
                </div>
            </div></a>
        </div>
    </div>
</section>


<!-- Sección de cartas-Artículos más Vendidos -->
<section class="container mt-5">
    <div class="row">
        <h2 class="text-center mb-5 fw-bold">Artículos más Vendidos</h2>
<!-- Tarjeta grande -->
        <div class="col-md-8 mb-3">
            <a href="camisas.php"><div class="card h-100">
                <img src="Resources/Ventas/7.svg" class="card-img-top" alt="Camisas Oversize">
            </div></a>
        </div>

<!-- Tarjeta pequeña superior -->
        <div class="col-md-4">
            <a href="videojuegos.php"><div class="card mb-4">
                <img src="Resources/Ventas/8.svg" class="card-img-top" alt="Juegos Consola">
            </div></a>

<!-- Tarjeta pequeña inferior -->
            <div class="card mb-3">
                <a href="accesorios.php"><img src="Resources/Ventas/9.svg" class="card-img-top" alt="Anillos">
            </div></a>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="footer-top">
        <div class="container text-center">
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