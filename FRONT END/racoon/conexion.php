<?php
// Configuración de la base de datos
$hostname = "localhost";    // Dirección del servidor de la base de datos
$username = "root";         // Nombre de usuario de la base de datos
$password = "";             // Contraseña de la base de datos
$database = "bdlatoya";    // Nombre de la base de datos
$port = "3309";             // Puerto de la base de datos



// Establecer una conexión a la base de datos usando MySQLi
$cn = mysqli_connect($hostname, $username, $password, $database, $port);

// Verificar si la conexión a la base de datos se estableció con éxito
if (!$cn) {
    die("No hay conexion" . mysqli_connect_error());  // Mostrar un mensaje de error si la conexión falla
}

// Obtener el valor de 'Usuario' y 'Password' desde una solicitud POST
$nombre = $_POST["Usuario"];
$pass = $_POST["Password"];

// Ejecutar una consulta SQL para verificar las credenciales del usuario
$query = mysqli_query($cn, "SELECT * FROM usuario WHERE email = '" . $nombre . "' and contraseña = '" . $pass . "'");

// Contar el número de filas afectadas por la consulta
$nr = mysqli_num_rows($query);

// Crear un arreglo para almacenar la respuesta
$response = array();

// Comprobar si se encontró un usuario con las credenciales proporcionadas
if ($nr == 1) {
    $response['authenticated'] = true;  // El usuario está autenticado
} else {
    $response['authenticated'] = false;  // El usuario no está autenticado
}

// Devolver la respuesta en formato JSON
echo json_encode($response);

// Cerrar la conexión a la base de datos
mysqli_close($cn);
?>
