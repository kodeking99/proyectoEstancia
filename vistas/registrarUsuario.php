
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Aplicación</title>  
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="assets/css/estilos.css" rel="stylesheet">    
        <script src="assets/js/validaciones.js"></script>   
    </head>
<body class="body">
    <head class="header">
    </head>
    <main class="main">
        <div class="formulario">
            <form name="frm" id="frm" method="POST" action="?c=registrarUsuario&a=registrarU" onsubmit="return validacion2();">
            <h1 class="titulo_inicio alineacion">Registrarse</h1>
                <div class="form_container">
                    <label for="nombre" class="form_label">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form_input"
                        onchange="frm.nombre.value=frm.nombre.value.toUpperCase()">
                  <p class="alert alert-danger" style="display:none" id="nom">Ingresa un nombre valido</p>
                </div>

                <!-- 3 capacteres-->
                <div class="form_container">
                    <label for="apellido" class="form_label">Apellido:</label>
                    <input type="text" name="apellido" id="apellido" class="form_input"
                            onchange="frm.apellido.value=frm.apellido.value.toUpperCase()">
                            <p class="alert alert-danger" style="display:none" id="app">Ingresa un apellido valido</p>
                </div>

                <!-- 3 capacteres-->
                <div class="form_container">
                    <label for="direccion" class="form_label">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" class="form_input"
                            onchange="frm.direccion.value=frm.direccion.value.toUpperCase()">
                            <p class="alert alert-danger" style="display:none" id="dir">Ingresa una direccion valida</p>
                </div>

                <!-- 10 capacteres-->

                <div class="form_container">
                    <label for="telefono" class="form_label">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" class="form_input" onkeypress="
                        if(event.keyCode<48 || event.keyCode >57){
                            event.returnValue=false;
                        }">
                  <p class="alert alert-danger" style="display:none" id="tel">Ingresa un numero de telefono valido</p>
                </div>

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
                    <label for="contrase" class="form_label">Contraseña</label>
                    <input type="text" name="contrase" id="contrase" class="form_input">
                            <p class="alert alert-danger" style="display:none" id="contraError">Ingresa un contraseña valida</p>
                </div>

                 <!-- 10 capacteres-->
                 <div class="form_container">
                    <label class="form_label">Genero:</label>
                    <label for="Sexo" class="form_label_s">Masculino</label>
                    <input type="radio" name="genero" id="genero"  value="Masculino" clas="form_input">
                  
                    <label for="Sexo" class="form_label_s">Femenino</label>
                    <input type="radio" name="genero" id="genero"  value="Femenino" clas="form_input">

                    <label for="Sexo" class="form_label_s">Otro</label>
                    <input type="radio" name="genero" id="genero"  value="Otro" clas="form_input">
                    <p class="alert alert-danger" style="display:none" id="s">selecciona un genero</p>
                </div>

                <br>

                <div class="form_container">
                    <input type="submit" value="Registrar" class="form_btn" onclick="validacion2();">
                    <p class="alert alert-info" style="display:none" id="boton">Gracias por enviar tus datos de forma correcta</p>
                </div>
            </form>

            <a href="?c=inicioSesion" class="subrayado">Ir a iniciar sesión</a>
            
                             
        </div>
    </main>
    <footer class="footer">
        <h6>@</h6>
    </footer>

</body>
</html>