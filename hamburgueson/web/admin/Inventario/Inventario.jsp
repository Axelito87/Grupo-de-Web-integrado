<%-- 
    private Integer id;
    private String name;
    private String    unit;
    private Double priceUnit;
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<h2>Inventario</h2>
                    <label for="id_inventario">n°id:</label>
                    <input type="text" id="id_inventario" name="id_inventario" required>
                    <label for="nombre">nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="unidad">Cantidad:</label>
                    <input type="number" id="unidad" name="unidad" required>
                    <label for="precio">Precio:</label>
                    <input type="number" id="precio" name="precio" required>
                    <button type="submit">Actualizar Datos</button>
                    <h2>Lista de Inventario</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se agregarán las filas del inventario dinámicamente -->
                        </tbody>
                    </table>
