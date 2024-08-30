<?php
$servidor = "localhost";
$nombreUsuario = "root";
$clave = "";
$BD = "proyecto";

// Crear conexión
$conexion = new mysqli($servidor, $nombreUsuario, $clave, $BD);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

?>