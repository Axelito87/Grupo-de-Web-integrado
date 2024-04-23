<?php
// Conexión a la base de datos
$hostname = "localhost"; // Dirección del servidor de la base de datos
$username = "root";      // Nombre de usuario de la base de datos
$password = "";          // Contraseña de la base de datos
$database = "bdlatoya";  // Nombre de la base de datos
$port = "3309";          // Puerto de la base de datos

$cn = mysqli_connect($hostname, $username, $password, $database, $port); // Establece una conexión a la base de datos

if (!$cn) {
    die("No hay conexión: " . mysqli_connect_error()); // Si la conexión falla, muestra un mensaje de error
}

// Recopila los datos del formulario
$nombre = $_POST["nombre"];        // Obtiene el valor del campo 'nombre' enviado por POST
$apellido = $_POST["apellido"];    // Obtiene el valor del campo 'apellido' enviado por POST
$contrasena = $_POST["contrasena"];// Obtiene el valor del campo 'contrasena' enviado por POST
$email = $_POST["email"];          // Obtiene el valor del campo 'email' enviado por POST

// Validación de campos
if (empty($nombre) || empty($apellido) || empty($contrasena) || empty($email)) {
    echo "Completa todos los campos."; // Si algún campo está vacío, muestra un mensaje de error
} else {
    // Inserción en la base de datos
    $query = "INSERT INTO usuario (nombre, apellido, contraseña, email) VALUES ('$nombre', '$apellido', '$contrasena', '$email')"; // Crea la consulta SQL para insertar un nuevo usuario

    if (mysqli_query($cn, $query)) {
        echo "Registro exitoso. ¡Bienvenido, $nombre!"; // Si la consulta se ejecuta con éxito, muestra un mensaje de registro exitoso
    } else {
        echo "Error al registrar el usuario: " . mysqli_error($cn); // Si hay un error en la consulta, muestra un mensaje de error
    }
}

// Cierra la conexión a la base de datos
mysqli_close($cn);
?>
