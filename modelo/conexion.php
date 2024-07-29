<?php

$conexion_categoria = new mysqli("192.168.82.40", "JUAN", "123", "categoria");
$conexion_categoria->set_charset("utf8");

if ($conexion_categoria->connect_error) {
    die("Conexión fallida a la base de datos de categoría: " . $conexion_categoria->connect_error);
}

$conexion_juego = new mysqli("localhost", "root", "", "juego");
$conexion_juego->set_charset("utf8");

if ($conexion_juego->connect_error) {
    die("Conexión fallida a la base de datos de juego: " . $conexion_juego->connect_error);
}

?>

