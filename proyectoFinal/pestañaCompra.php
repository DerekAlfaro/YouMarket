<?php
require 'conexion.php';

session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: register.php");
    exit();
}

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    // Modificar la consulta para incluir el nombre del vendedor
    $query = "
        SELECT productos.*, usuarios.nombre AS vendedor_nombre
        FROM productos
        JOIN usuarios ON productos.usuario_id = usuarios.id
        WHERE productos.id = '$productId'
    ";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "Producto no encontrado.";
        exit;
    }
} else {
    echo "ID de producto no especificado.";
    exit;
}

// Lógica de compra y descarga del archivo
if (isset($_POST['comprar'])) {
    $deleteQuery = "DELETE FROM productos WHERE id = '$productId'";
    if (mysqli_query($conexion, $deleteQuery)) {
        // Preparar el contenido del archivo TXT
        $fileName = "Factura_{$product['nombre']}.txt";
        $txtContent = "Muchas gracias por comprar en YouMarket \n";
        $txtContent .= "Producto: " . $product['nombre'] . "\n";
        $txtContent .= "Precio: ₡" . $product['precio'] . "\n";
        $txtContent .= "Categoría: " . $product['categoria'] . "\n";
        $txtContent .= "Estado: " . $product['estado'] . "\n";
        $txtContent .= "Razón de venta: " . $product['razon_venta'] . "\n";
        $txtContent .= "Lugar de venta: " . $product['lugar_venta'] . "\n";
        $txtContent .= "Descripción: " . $product['descripcion'] . "\n";
        $txtContent .= "Vendedor: " . $product['vendedor_nombre'] . "\n";

        header('Content-Type: text/plain');
        header("Content-Disposition: attachment; filename=$fileName");
        echo $txtContent;

        echo "<script>
                alert('Compra realizada correctamente');
                setTimeout(function(){
                    window.location.href = 'Contenido.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al eliminar el producto.";
    }
}
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

<!-- Contenido Principal-Artículos -->
<section class="container mt-5">
    <section class="infoProducto">
      <div class="row">
        <div class="col-md-6">
                <div class="mb-3">
                    <h1 class="nombreProducto" id="nombreProducto"><?php echo htmlspecialchars($product['nombre']); ?></h1>
                </div>
                <h5>Acerca de este producto:</h5>
                <div class="mb-3">
                    <label for="price" class="form-label">Precio:</label>
                    <h6 class="precioProducto" id="precioProducto">₡<?php echo htmlspecialchars($product['precio']); ?></h6>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Categoría:</label>
                    <h6 class="categoriaProducto" id="categoriaProducto"><?php echo htmlspecialchars($product['categoria']); ?></h6>
                </div>
                <div class="mb-3">
                    <label for="usage" class="form-label">Estado:</label>
                    <h6 class="estadoProducto" id="estadoProducto"><?php echo htmlspecialchars($product['estado']); ?></h6>
                </div>
                <div class="mb-3">
                    <label for="saleReason" class="form-label">Razón de venta:</label>
                    <h6 class="razonVenta" id="razonVenta"><?php echo htmlspecialchars($product['razon_venta']); ?></h6>
                </div>
                <div class="mb-3">
                    <label for="salePlace" class="form-label">Lugar de venta:</label>
                    <h6 class="lugarVenta" id="lugarVenta"><?php echo htmlspecialchars($product['lugar_venta']); ?></h6>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción:</label>
                    <h6 class="descripcionProducto" id="descripcionProducto"><?php echo htmlspecialchars($product['descripcion']); ?></h6>
                </div>
              <form>
                <div class="mb-3">
                  <label for="description" class="form-label">Preguntas y respuestas:</label>
                  <textarea class="form-control" id="description" rows="3" placeholder="Ingresa tu pregunta"></textarea>
                  <br>
                  <button class="btn btn-custom" type="button">Enviar</button>
              </div>
            </form>
        </div>
        <div class="col-md-6 text-center">
            <div>
              <br>
              <br>
                <img src="Resources/Productos/<?php echo htmlspecialchars($product['image']); ?>" alt="Producto"  class="ImgProducto" id="ImgProducto">
            </div>
            <div class="mb-3">
                <a href="verPerfil.php?id=<?php echo $product['usuario_id']; ?>" class="nombreVendedor">
                    <h3 class="nombreVendedor" id="nombreVendedor">Vendedor: <?php echo htmlspecialchars($product['vendedor_nombre']); ?></h3>
                </a>
            </div>
            <form method="POST">
                <button class="btn btn-custom" type="submit" name="comprar" id="comprar">Comprar</button>
            </form>
        </div>
    </div>
  </section>
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
