<?php
// Conexión a la base de datos
$hostname = "localhost"; // Dirección del servidor de la base de datos
$username = "root";      // Nombre de usuario de la base de datos
$password = "";          // Contraseña de la base de datos
$database = "bdlatoya";  // Nombre de la base de datos
$port = "3309";          // Puerto de la base de datos

$conexion = mysqli_connect($hostname, $username, $password, $database, $port); // Establece una conexión a la base de datos


// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $precio = $_POST["precio"];
    $descripcion = $_POST["descripcion"];
    $imagen = file_get_contents($_FILES["imagen"]["tmp_name"]);

    // Preparar la consulta SQL para insertar el producto en la base de datos
    $sql = "INSERT INTO productos (titulo, imagen, precio, descripcion) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssds", $titulo, $imagen, $precio, $descripcion);
    $stmt->execute();

    // Verificar si la inserción fue exitosa
if ($stmt->affected_rows > 0) {
    $response = array('status' => 'success', 'message' => 'Producto subido correctamente.');
    echo json_encode($response);
} else {
    $response = array('status' => 'error', 'message' => 'Error al subir el producto: ' . $stmt->error);
    echo json_encode($response);
}

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>