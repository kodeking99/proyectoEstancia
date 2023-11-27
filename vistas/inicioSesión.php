

<?php

session_start();
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Aplicación</title>  
        

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="assets/css/estilos.css" rel="stylesheet" type="text/css"> 
        <script src="assets/js/validaciones.js"></script>        
    </head>
<body class="body">
    <head class="header">
    </head>
    
    <main class="main">
        <!--div class="imagen_centro">
            <a href="#"> <img src="assets/img/Huellitas en Acción.png"></a>
        </div-->
        <div class="inicioSesion">
            <form name="frm" id="frm" method="POST" action="?c=inicioSesion&a=Validar">
                
            <h1 class="titulo_inicio"> INICIAR SESIÓN</h1>

                <div class="form_container">
                    <label for="correoElectronico" class="form_label">Correo</label>
                    <input type="text" name="correoElectronico" id="correoElectronico" class="form_input"
                    onchange="frm.correoElectronico.value=frm.correoElectronico.value.toUpperCase()">
                    <p class="alert alert-danger" style="display:none" id="correoError">El correo tiene que ser de 8 a 16 dígitos
                        y solo puede contener números, letras,
                        arroba, puntos y guion bajo y escribirse
                        mediante el siguiente formato:
                        user.user_1@server.dom1.domu</p>
                </div>
                
                
                

                <!-- 3 capacteres-->
                <div class="form_container">
                    <label for="contra" class="form_label">Contraseña</label>
                    <input type="text" name="contra" id="contra" class="form_input">
                            <p class="alert alert-danger" style="display:none" id="app">Ingresa un contraseña valida</p>
                </div>

                <p> ¿No tienes cuenta?  <a href="?c=registrarUsuario" class="subrayado">Unete</a></p>
         

                <div class="form_container">
                    <input type="button" value="Validar" class="form_btn" onclick="validacion();">
                    <p class="alert alert-success" style="display:none" id="confirmacionMensaje">Los datos son correctos. Por favor, presiona el botón 'Enviar'.</p>
                </div>

                <div class="alert alert-danger" id="mensajeError" style="display: none;">
                    <?php echo $error_message; ?>
                </div>

                
            </form>
        </div>


        

    </main>
    <footer class="footer">

    </footer>
</body>
</html>
