<%-- 
    private String name;
    private String lastname;
    private String motherLastname;
    private String email;
    private String cellphone;
    private String dni;
    private Integer role;
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
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