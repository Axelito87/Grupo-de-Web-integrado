 <%-- 
    Document   : newjsp
    Created on : 19 may 2024, 19:16:22
    Author     : axele
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>

<link href="css/Style.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Formulario de inicio de sesión -->
    <form action="admin/Admin.jsp" method="get">
        
        <!-- Título del formulario -->
        <h1 class="title">Login</h1>
        
        <!-- Etiqueta para el campo de nombre de usuario -->
        <label> 
            <!-- Icono de usuario de FontAwesome -->
            <i class="fa-solid fa-user"></i>
            <!-- Campo de entrada para el nombre de usuario -->
            <input type="text" id="username">
        </label>
        
        <!-- Etiqueta para el campo de contraseña -->
        <label> 
            <!-- Icono de candado de FontAwesome -->
            <i class="fa-solid fa-lock"></i>
            <!-- Campo de entrada para la contraseña -->
            <input type="password" id="contraseña">
        </label>
        
        <!-- Enlace para la recuperación de contraseña -->
        <a href="#" class="link">Olvidaste tu contraseña, causa?</a>
        
        <!-- Imagen agregada al formulario -->
        <img src="admin/imagenes/racoon-removebg-preview (1).png" alt=""/>
        <!-- Botón de envío del formulario -->
        <button id="button", type="submit">Ingresando Mapache</button>
    </form>
