<%-- 
     private Long id;
    private String fullName;
    private String email;
    private String cellphone;
    private String dni;
    private String accountType;
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>

<h2>Ver Empleados</h2>
                    <table id="TablaVerEmpleado" class="MostrarTablaEmpleados">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>email</th>
                                <th>N° de celular</th>
                                <th>DNI</th>
                                <th>Tipo de cuenta</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se agregarán las filas de registros de empleados dinámicamente -->
                        </tbody>
                    </table>
