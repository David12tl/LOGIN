<?php
include ("db.php"); 
$conex = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $email = $_POST['email'];
    $passwor = $_POST['passwor'];     

    $sql = "SELECT * FROM registro WHERE email = '$email' AND passwor = '$passwor'";
    $result = mysqli_query($connex, $sql);

    if (mysqli_num_rows($result) == 1) {
        include ("Index.html");
    } else {
        include("Login.html");
        echo "Correo electrónico o contraseña incorrectos.";
    }

    }
?>