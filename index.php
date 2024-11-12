<?php
session_start(); // Asegúrate de iniciar la sesión

if (isset($_SESSION['user_id'])) {
    // El usuario ha iniciado sesión
    echo "<h1>Bienvenido, " . $_SESSION['user_name'] . "!</h1>";
    echo '<a href="perfil.php">Configuración de Perfil</a>';
    echo '<a href="logout.php">Cerrar Sesión</a>';
    // Aquí puedes mostrar el logo del usuario o cualquier otra información
} else {
    // El usuario no ha iniciado sesión
    echo '<a href="login.php">Iniciar Sesión</a>';
    echo '<a href="registro.php">Registrarse</a>';
}
?>