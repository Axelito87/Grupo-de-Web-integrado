<?php
// Conexión a la base de datos
$hostname = "localhost"; // Dirección del servidor de la base de datos
$username = "root";      // Nombre de usuario de la base de datos
$password = "";          // Contraseña de la base de datos
$database = "bdlatoya";  // Nombre de la base de datos
$port = "3309";          // Puerto de la base de datos

$conexion = mysqli_connect($hostname, $username, $password, $database, $port); // Establece una conexión a la base de datos
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Toya</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    <header>
        <div class="inicio_header">
            <img class="logo" src="img/encuadre2.png">
            <div class="box_buscar">
                <input type="text" placeholder="Buscar..." class="texfile_buscar">
                <button class="boton_busqueda">
                    <i>Buscar</i>
                </button>
            </div>
        </div>
        <div class="box_navegacion">
            <nav>
                <a href="inicioL.php">Formularios</a>
                <a href="subirProductos.html">Subir Productos</a>
            </nav>
        </div>
        <div class="box_navegacion2">
            <nav>
                <a>Formulario de Sugerencias</a>
            </nav>
        </div>
    </header>
    
    <main>
        <div>
            <table class="tabla1" border="1" >
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>E-mail</th>
                    <th>Teléfono</th>
                    <th>Tipo de sugerencia</th>
                    <th>Descripción</th>
                    <th>Archivo</th>
                </tr>

                <?php
                    $sql = "SELECT * FROM sugerencias";
                    $result = mysqli_query($conexion,$sql);

                    while($mostrar = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $mostrar['codigo']?></td>
                    <td><?php echo $mostrar['nombre']?></td>
                    <td><?php echo $mostrar['email']?></td>
                    <td><?php echo $mostrar['telefono']?></td>
                    <td><?php echo $mostrar['tipo_sugerencia']?></td>
                    <td><?php echo $mostrar['descripcion']?></td>
                    <td><?php echo $mostrar['archivo']?></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <div class="box_navegacion2">
            <nav>
                <a>Formulario de Libro de reclamaciones</a>
            </nav>
        </div>
        <div>
            
            <table border="1"   class="tabla1" >
                <tr>
                    <th>Código</th>
                    <th>tipo_edad</th>
                    <th>tipo_documento</th>
                    <th>num_documento</th>
                    <th>nombres</th>
                    <th>apellidos</th>
                    <th>tipo_respuesta</th>
                    <th>direccion_respuesta</th>
                    <th>telefono_fijo</th>
                    <th>telefono_celular</th>
                    <th>departamento</th>
                    <th>tipo_bien_contratado</th>
                    <th>num_boleta</th>
                    
                    
                </tr>

                <?php
                    $sql = "SELECT codigo,tipo_edad,tipo_documento,num_documento,nombres,apellidos,tipo_respuesta,direccion_respuesta,telefono_fijo,telefono_celular,departamento,tipo_bien_contratado,num_boleta FROM libro_reclamaciones";
                    $result = mysqli_query($conexion,$sql);

                    while($mostrar = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $mostrar['codigo']?></td>
                    <td><?php echo $mostrar['tipo_edad']?></td>
                    <td><?php echo $mostrar['tipo_documento']?></td>
                    <td><?php echo $mostrar['num_documento']?></td>
                    <td><?php echo $mostrar['nombres']?></td>
                    <td><?php echo $mostrar['apellidos']?></td>
                    <td><?php echo $mostrar['tipo_respuesta']?></td>
                    <td><?php echo $mostrar['direccion_respuesta']?></td>
                    <td><?php echo $mostrar['telefono_fijo']?></td>
                    <td><?php echo $mostrar['telefono_celular']?></td>
                    <td><?php echo $mostrar['departamento']?></td>
                    <td><?php echo $mostrar['tipo_bien_contratado']?></td>
                    <td><?php echo $mostrar['num_boleta']?></td>
                    
                    
                </tr>
                <?php
                }
                ?>
            </table>
            <table border="1"   class="tabla1" >
                <tr>
                    <th>Código</th>
                    
                    <th>fecha_de_compra</th>
                    <th>monto_reclamado</th>
                    <th>descripcion_producto</th>
                    <th>tipo_reclamo</th>
                    <th>detalle_queja_reclamo</th>
                    <th>pedido</th>
                    <th>archivo</th>
                </tr>

                <?php
                    $sql = "SELECT codigo,fecha_compra,monto_reclamado,descripcion_producto,tipo_reclamo,detalle_queja_reclamo,pedido,archivo FROM libro_reclamaciones";
                    $result = mysqli_query($conexion,$sql);

                    while($mostrar = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $mostrar['codigo']?></td>
                    
                    <td><?php echo $mostrar['fecha_compra']?></td>
                    <td><?php echo $mostrar['monto_reclamado']?></td>
                    <td><?php echo $mostrar['descripcion_producto']?></td>
                    <td><?php echo $mostrar['tipo_reclamo']?></td>
                    <td><?php echo $mostrar['detalle_queja_reclamo']?></td>
                    <td><?php echo $mostrar['pedido']?></td>
                    <td><?php echo $mostrar['archivo']?></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </main>

    <footer class="footer">
        <div class="box_contacto">
            <h3>Contáctanos</h3>
            <p>Whatsapp: +54 221 614-7319</p>
            <p>Instagram: @la.toya.dulces</p>
            <p>GMAIL: toyasoosna03@gmail.com</p>
        </div>
    
        <div class="box_ubicacion">
            <h3>Ubicanos</h3>
            <p><a href="https://www.google.com/maps/place/Parque+Saavedra/@-34.550819,-58.4798156,17z/data=!3m1!4b1!4m6!3m5!1s0x95bcb696ab5cb4ed:0x887c745720a0e9b6!8m2!3d-34.550819!4d-58.4798156!16s%2Fg%2F12215d9x?entry=ttu">Plata, Argentina</a> </p>
        </div>
    
        
    </footer>
</body>
</html>