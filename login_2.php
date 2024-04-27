<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $email = $_POST['email'];
    $passwor = $_POST['passwor'];
  

     // Conectar a la base de datos (reemplaza los valores con los de tu configuración)
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "login";
  
      $conn = new mysqli($servername, $username, $password, $dbname);
  
     // Verificar la conexión
     if ($conn->connect_error) {
     die("Conexión fallida: " . $conn->connect_error);
        }

    // Verificar si el correo electrónico y la contraseña coinciden con los registros en la base de datos
    $sql = "SELECT * FROM registro WHERE email = '$email' AND passwor = '$passwor'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        include ("Index.html");
    } else {
        include("Login.html");
        echo "Correo electrónico o contraseña incorrectos.";
    }
}
?>
