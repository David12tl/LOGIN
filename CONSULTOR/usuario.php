<?php
// Conexión a la base de datos (usando mysqli)
$servername = "localhost";
$username = "root";
$password = "";
$database = "login";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener el nombre del usuario
$sql = "SELECT email FROM registro WHERE email = 1"; // Suponiendo que el ID del usuario es 1 y que el nombre del usuario está en la columna 'email'

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Si hay resultados, mostrar el nombre del usuario
    while($row = $result->fetch_assoc()) {
        $nombreUsuario = $row["email"];
    }
} else {
    $nombreUsuario = "Usuario no encontrado";
}

// Cerrar conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Nombre de Usuario</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $nombreUsuario; ?>!</h1>
</body>
</html>