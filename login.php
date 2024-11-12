<?php
include 'db.php'; // Incluir la conexión a la base de datos

session_start(); // Iniciar la sesión

// Conectar a la base de datos
$servername = "localhost";
$username = "root"; // Cambia esto si es necesario
$password = ""; // Cambia esto si es necesario
$dbname = "undergroundrp"; // Cambia esto por el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Procesar el inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Consultar el usuario
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verificar la contraseña
        if (password_verify($contraseña, $row['contraseña'])) {
            // Contraseña correcta, iniciar sesión
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['nombre']; // Almacena el nombre del usuario
            echo "Inicio de sesión exitoso";
            // Redirigir a otra página si es necesario
            // header("Location: dashboard.php");
            // exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "No se encontró el usuario";
    }
}

$conn->close();
?>