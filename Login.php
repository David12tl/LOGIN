<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nam = $_POST['nam'];
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

    // Verificar si el correo electrónico ya existe en la base de datos
    $sql = "SELECT * FROM registro WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        include("Login.html");
        echo "";
        echo "El correo electrónico ya está en uso.";
    } else {

    $sql = "SELECT * FROM registro WHERE nam = '$nam'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        include("Login.html");
        echo "";
        echo "ESTE NOMBRE YA ESTA EN USO";
    } else {

       // Insertar datos del nuevo usuario en la base de datos
        $sql = "INSERT INTO registro (nam, email, passwor) VALUES ('$nam', '$email', '$passwor')";
        mysqli_query($conn, $sql);
        if($sql){
            include ("Index.html");
        } else {
            include("Login.html");
            echo "Correo electrónico o contraseña incorrectos.";
        }
    }
 }
}
?>
