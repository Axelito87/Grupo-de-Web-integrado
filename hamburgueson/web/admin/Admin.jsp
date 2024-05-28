<%-- 
    Document   : Gerente
    Created on : 19 may 2024, 19:22:14
    Author     : axele
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- Enlace a la hoja de estilos de FontAwesome para usar iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Enlace a tu hoja de estilos CSS -->
    <link href="EstiloAdmin.css" rel="stylesheet" type="text/css"/>
</head>

<body>

    <div class="container">
        <div class="form-container left">
            <form id="leftForm">
                <img id="mapacheAdmin" src="imagenes/843c0430e1c72c93e41fdd5e3962c330.jpg" alt=""/>
                <button type="button" onclick="changeRightForm('form1')">Crear Empleados</button>
                <button type="button" onclick="changeRightForm('form2')">Inventario</button>
                <button type="button" onclick="changeRightForm('form3')">Ver pedidos</button>
                <button type="button" onclick="changeRightForm('form4')">Ver empleados</button>
            </form>
        </div>
        <div class="form-container right">
            <form id="rightForm">
                <!-- Aquí se cargarán los formularios dinámicamente -->
            </form>
        </div>
    </div>

    <script>
        function changeRightForm(formName) {
            const rightForm = document.getElementById('rightForm');
            rightForm.innerHTML = '';

            if (formName === 'form1') {
                rightForm.innerHTML = `
                    <h2>Crear Empleado</h2>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="apellidoPaterno">Apellido Paterno:</label>
                    <input type="text" id="apellidoPaterno" name="apellidoPaterno" required>
                    <label for="apellidoMaterno">Apellido Materno:</label>
                    <input type="text" id="apellidoMaterno" name="apellidoMaterno" required>
                    <label for="correo">Correo:</label>
                    <input type="email" id="correo" name="correo" required>
                    <label for="celular">Celular:</label>
                    <input type="tel" id="celular" name="celular" required>
                    <label for="dni">DNI:</label>
                    <input type="text" id="dni" name="dni" required>
                    <label for="rol">Rol:</label>
                    <input type="text" id="rol" name="rol" required>
                    <button type="submit">Crear Empleado</button>
                    <h2>Lista de Empleados</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Correo</th>
                                <th>Celular</th>
                                <th>DNI</th>
                                <th>Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se agregarán las filas de empleados dinámicamente -->
                        </tbody>
                    </table>
                `;
            } else if (formName === 'form2') {
                rightForm.innerHTML = `
                    <h2>Inventario</h2>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="tipo">Tipo:</label>
                    <input type="text" id="tipo" name="tipo" required>
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" id="cantidad" name="cantidad" required>
                    <button type="submit">Actualizar Datos</button>
                    <h2>Lista de Inventario</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se agregarán las filas del inventario dinámicamente -->
                        </tbody>
                    </table>
                `;
            } else if (formName === 'form3') {
                rightForm.innerHTML = `
                    <h2>Ver Pedidos</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>ID Pedido</th>
                                <th>Cliente</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se agregarán las filas de pedidos dinámicamente -->
                        </tbody>
                    </table>
                `;
            } else if (formName === 'form4') {
                rightForm.innerHTML = `
                    <h2>Ver Empleados</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre del empleado</th>
                                <th>N° de DNI</th>
                                <th>Tipo de registro</th>
                                <th>Hora registrada</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se agregarán las filas de registros de empleados dinámicamente -->
                        </tbody>
                    </table>
                `;
            }
        }
    </script>
</body>

</html>
