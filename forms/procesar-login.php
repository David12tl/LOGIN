<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";

    $conn = new mysqli($servername, $username, $password, $dbname);
  
    // Verificar la conexión
    if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
       }

    // Validar los datos (puedes agregar más validaciones aquí)
    if ($username === "usuario" && $password === "contraseña") {
        // Autenticación exitosa
        echo "¡Bienvenido, $username!";
    } else {
        // Autenticación fallida
        echo "Usuario o contraseña incorrectos.";
    }
}
?>
