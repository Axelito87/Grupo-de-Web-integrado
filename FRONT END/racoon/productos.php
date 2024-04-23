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

// Obtener todos los productos de la base de datos
$sql = "SELECT * FROM productos";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>La Toya</title>
        <link rel="stylesheet" href="css/style.css">
        
        <link href="css/style.css" rel="stylesheet" type="text/css">
        
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.min.js" integrity="sha512-3PL7jW3xI1EjF2Hfqwv5u6nKG/BnUbWytnJDhsY/q5CbIB5XzoHNhJvgmFeVD7xgC9DbKDm+gPP9uDAAfLAZUA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.css" integrity="sha512-eRBMRR/qeSlGYAb6a7UVwNFgXHRXa62u20w4veTi9suM2AkgkJpjcU5J8UVcoRCw0MS096e3n716Qe9Bf14EyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="app.js" async></script>
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
                <div class="box_login">
                    <button><a href="login.html">Iniciar Sesión</a></button>

                </div>
            </div>
            
            <div class="box_navegacion">
                <nav>
                    
                    
                    <a href="index.html">Inicio</a>
                    <a href="productos.php">Productos</a>
                    <a href="sugerenciass.html">Sugerencias</a> <!--corregir el href-->
                    <a href="Nosotros.html">Nosotros</a> 
                </nav>
            </div>
    </header>
    
    <main>
            <section class="contenedor">
                <div class="contenedor-items">
                    
                        <!--productos-->
                        <!-- <div class="fotop" > -->
                        <?php
                        for ($i = 0; $i < $resultado->num_rows; $i++) {
                            $producto = $resultado->fetch_assoc();
                        ?>
                            <div class="fotop">
                                <p class="titulo-item"><?= $producto['titulo'] ?></p>
                                <p class="precio-item">$<?= $producto['precio'] ?></p>
                                <p class="descripcion-item">Descripción: <?= $producto['descripcion'] ?></p>

                                <!-- Mostrar la imagen -->
                                <img class="img-item" src="data:image/jpeg;base64,<?= base64_encode($producto['imagen']) ?>" alt="<?= $producto['titulo'] ?>">
                                <button class="boton-item" onclick="agregarItemAlCarrito">Agregar al Carrito</button>
                                
                            </div>
                        <?php
                        }
                        ?>
                        

                        <!-- </div> -->
                            
                </div>
                        <!--carrito de compras-->
                        <div class="carrito">

                            <div class="header-carrito">
                                <h2>Tu carrito</h2>
                            </div>

                            <div class="carrito-items">
                                
                                <!-- fafssf -->
                            </div>
                            <div class="carrito-total">
                                <div class="fila">
                                    <strong>Tu total</strong>
                                    <span class="carrito-precio-total"> 
                                        $0,00
                                    </span>
                                </div>
                                <button class="btn-pagar">Pagar <i class="fa-solid fa-bag-shopping"></i></button>
                            </div>
                        </div>
    </section>
            

            


            <!-- Modal para mostrar la descripción del producto -->
            <div id="modal" class="modal">
                <div id="modal-content" class="modal-content">
                    <!-- El contenido del modal se generará dinámicamente con JavaScript -->
                </div>
            </div>
        
        </main>



        <footer  class="footer">
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
        
            <div class="box_ayuda">
                <h3>Ayuda</h3>
                <p><a href="preguntasF.html">Preguntas Frecuentes</a></p>
                <p><a href="libro_reclamaciones.html">Libro de Reclamaciones</a></p>
            </div>

        </footer>

    </body>
</html>

   
<?php
} else {
    echo "No hay productos en la base de datos.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>

