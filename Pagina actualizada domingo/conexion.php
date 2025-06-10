<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = ""; // por defecto está vacío
$basededatos = "tienda_videojuegos";

$conexion = new mysqli($servidor, $usuario, $contrasena, $basededatos);

// Verifica conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
