<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "bdlatoya";
$port = "3309";

$cn = mysqli_connect($hostname, $username, $password, $database, $port);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['imagen'])) {
        $nombreFoto = $_FILES['imagen']['name'];
        $ubicacionTemporal = $_FILES['imagen']['tmp_name'];
        $directorioFoto = "imagenesPHPP/";

        if ($_FILES['imagen']['size'] <= 2 * 1024 * 1024) {
            if (!empty($nombreFoto) && is_uploaded_file($ubicacionTemporal)) {
                if (move_uploaded_file($ubicacionTemporal, $directorioFoto . $nombreFoto)) {
                    require_once './muestra1.php';
                } else {
                    echo "No se pudo subir el archivo.";
                }
            } else {
                echo "No se proporcionó ninguna imagen o el archivo está vacío.";
            }
        } else {
            echo "El archivo es demasiado grande. El tamaño máximo permitido es 2 megabytes.";
        }
    } else {
        echo "No se proporcionó ninguna imagen.";
    }

    if (isset($_POST['btnEnviar'])) {
        $nombre = $_POST['txtNombres'];
        $email = $_POST['txtEmail'];
        $celular = $_POST['txtTlfCelular'];
        $sugerencia = $_POST['cbxTipoSuge'];
        $descripcion = $_POST['txtDescripcion'];
    

        // Cambié $_POST['imagen'] a $nombreFoto ya que es el nombre del archivo subido
        $insertarDatos = "INSERT INTO sugerencias VALUES ('','$nombre','$email','$celular', '$sugerencia', '$descripcion','')";
        $ejecutarInsertar = mysqli_query($cn, $insertarDatos);
    }
}
?>
