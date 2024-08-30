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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Enlace a Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand">
            <img src="Resources/logo_png.png" class="logo-header" alt="Logo YouMarket">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
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
<header class="text-center" id="Encabezado">
    <div class="header-content">
        <img src="Resources/Ventas/Logo.svg" class="cardLogo" alt="Logo">
        <h1 class="TextBanner fw-bold">Bienvenidos a YouMarket</h1>
        <section class="containertxt">
            <h2 class="container__typing lead">
            "Descubre y compra productos únicos"
            </h2>
        </section>
        <a href="Register.php" class="btn btn-custom mt-4">Registrarme</a>
    </div>
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

<!-- Contenido Principal-Servicios -->
<section id="Servicios">
    <h2 class="servicios">Servicios que ofrecemos</h2>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card text-center h-100 shadow">
                    <img class="mx-auto"width="64" height="64" src="https://img.icons8.com/arcade/64/add-shopping-cart.png" alt="add-shopping-cart"/>
                    <div class="card-body">
                        <h5 class="card-title">Compras desde la comodidad de tu casa</h5>
                        <p class="card-text">Busca lo que necesites desde tu hogar y coordina el pago y la entrega con el vendedor</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center h-100 shadow">
                    <img class="mx-auto" width="64" height="64" src="https://img.icons8.com/arcade/64/worldwide-delivery.png" alt="worldwide-delivery"/>
                    <div class="card-body">
                        <h5 class="card-title">Vende totalmente gratis</h5>
                        <p class="card-text">Empieza tu emprendimiento o vende cosas que ya no uses totalmente gratis</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center h-100 shadow">
                    <img class="mx-auto" width="64" height="64" src="https://img.icons8.com/arcade/64/firewall.png" alt="firewall"/>
                    <div class="card-body">
                        <h5 class="card-title">Seguridad a la hora de recibir el pedido</h5>
                        <p class="card-text">Coordina la entrega con el vendedor y nosotros estaremos pendientes de que recibas tu pedido</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center g-4 mt-3">
            <div class="col-md-4">
                <div class="card text-center h-100 shadow">
                    <img class="mx-auto" width="64" height="64" src="https://img.icons8.com/arcade/64/search-client.png" alt="search-client"/>
                    <div class="card-body">
                        <h5 class="card-title">Encuentra facilmente lo que buscas</h5>
                        <p class="card-text">Tenemos todo bien ubicado por categorias para que te sea mas facil encontrar lo que necesitas</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center h-100 shadow">
                    <img class="mx-auto" width="64" height="64" src="https://img.icons8.com/arcade/64/phone-ringing.png" alt="phone-ringing"/>
                    <div class="card-body">
                        <h5 class="card-title">Servicio de atencion al cliente</h5>
                        <p class="card-text">Contamos con servicio de atencion al cliente ante cualquier duda o inconveniente tanto para compradores como vendedores</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección Comunicación -->
<section class="text-center" id="Comunicacion">
    <h3 class="fs-5 mb-3">No sabes por donde empezar? <br><small class="text-body-secondary">Dirigete a la pagina de inicio y encuentra algo de inspiracion</small></h3>
    <a href="Contenido.php"><button type="button" class="btn btn-custom btn-lg mb-5">Inicio</button></a>
</section>

<!-- Footer -->
<footer class="SectionF">
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