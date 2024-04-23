<?php
// Conexión a la base de datos
$hostname = "localhost"; // Dirección del servidor de la base de datos
$username = "root";      // Nombre de usuario de la base de datos
$password = "";          // Contraseña de la base de datos
$database = "bdlatoya";  // Nombre de la base de datos
$port = "3309";          // Puerto de la base de datos

$conexion = mysqli_connect($hostname, $username, $password, $database, $port); // Establece una conexión a la base de datos

// Consulta SQL para obtener todos los productos
$sql = "SELECT titulo, imagen, precio, descripcion FROM productos";
$result = $conexion->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    $productos = array();

    // Obtener los resultados como un array asociativo
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }

    // Devolver los resultados como JSON
    echo json_encode($productos);
} else {
    echo "No se encontraron productos";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
