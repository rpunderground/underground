<?php
// Configuración de la base de datos
$host = 'localhost'; // Cambia esto si tu base de datos está en otro servidor
$usuario = 'root'; // Cambia esto si tu usuario de MySQL es diferente
$contraseña = ''; // Cambia esto si tu contraseña de MySQL es diferente
$nombre_base_datos = 'undergroundrp'; // Cambia esto por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($host, $usuario, $contraseña, $nombre_base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>