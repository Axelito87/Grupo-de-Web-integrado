<%-- 
    rivate Long id;
    private String orderCode;
    private String clientName;
    private Double orderPrice;
    private Long idAccount;
    private String fullName;
    private String createTime;
    private String updateTime;
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>

<h2>Ver Pedidos</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>ID Pedido</th>
                                <th>N°orden</th>
                                <th>Cliente/th>
                                <th>Total/th>
                                <th>idCuenta</th>
                                <th>Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se agregarán las filas de pedidos dinámicamente -->
                        </tbody>
                    </table>