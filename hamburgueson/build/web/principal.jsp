<%-- 
    Document   : principal
    Created on : 23 abr. 2024, 00:39:52
    Author     : user
--%>

<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
    <h1>Bienvenido a nuestra hamburguesería</h1>
    <img src="Racoon/hamburguesa.jpg" alt="Hamburguesa deliciosa">
    <br><br>
    <a href="login.jsp">Iniciar sesión</a>
    <br><br>
    <form action="productos.jsp">
        <input type="submit" value="Ver productos">
    </form>
    <br>
    <form action="sugerencia.jsp">
        <input type="submit" value="Enviar sugerencia">
    </form>
</html>
