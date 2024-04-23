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
                    echo "El archivo se subió correctamente.";
                    // Aquí podrías requerir algún archivo o realizar alguna acción adicional
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

    if (isset($_POST['btnEnviarLibro'])) {
        $tipoDocumento = $_POST['cbxTipoDoc'];
        $numeroDocumento = $_POST['txtNDoc'];
        $nombre = $_POST['txtNombre'];
        $apellidos = $_POST['txtApellidos'];
        $tipoRespuesta = $_POST['cbxTipoRespuesta'];
        $email = $_POST['txtEmail'];
        $direccion = $_POST['txtDireccion'];
        $telefonoFijo = $_POST['txtTlfFijo'];
        $telefonoCelular = $_POST['txtTlfCelular'];
        $departamento = $_POST['cbxDepartamento'];
        $provincia = $_POST['txtProvincia'];
        $tipoBien = $_POST['cbxTipoBien'];
        $numeroFactura = $_POST['txt'];
        $fechaCompra = $_POST['fechaCompra'];
        $montoReclamado = $_POST['txtmonto'];
        $descripcionProducto = $_POST['txtDescripcion'];
        $tipoReclamo = $_POST['cbxTipoReclamo'];
        $detalleReclamo = $_POST['txtDetalle'];
        $pedido = $_POST['txtPedido'];
        $imagenNombre = $_FILES['imagen']['name'];

        $insertarDatos = "INSERT INTO sugerencias 
                          (tipo_documento, numero_documento, nombre, apellidos, tipo_respuesta, email, direccion, telefono_fijo, telefono_celular, departamento, provincia, tipo_bien, numero_factura, fecha_compra, monto_reclamado, descripcion_producto, tipo_reclamo, detalle_reclamo, pedido, nombre_imagen)
                          VALUES ('$tipoDocumento', '$numeroDocumento', '$nombre', '$apellidos', '$tipoRespuesta', '$email', '$direccion', '$telefonoFijo', '$telefonoCelular', '$departamento', '$provincia', '$tipoBien', '$numeroFactura', '$fechaCompra', '$montoReclamado', '$descripcionProducto', '$tipoReclamo', '$detalleReclamo', '$pedido', '$imagenNombre')";
        $ejecutarInsertar = mysqli_query($cn, $insertarDatos);
        if ($ejecutarInsertar) {
            echo "Los datos se han insertado correctamente en la base de datos.";
        } else {
            echo "Error al insertar los datos: " . mysqli_error($cn);
        }
    }
}
?>