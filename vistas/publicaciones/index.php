<?php

session_start();
error_reporting(0);

$validar = $_SESSION['tipo_usuario'];
$nombre = $_SESSION['Nombre'];
$id = $_SESSION['ID'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <title>Aplicación</title>     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="assets/css/estilos.css" rel="stylesheet" type="text/css">  
</head>
<body>
 <div class="nav_bg fixed-top shadow" class="navbar bg-primary" data-bs-theme="dark">
   <nav class="navegacion_principal contenedor">
       <a href="?c=principal" class="navegacion_principal">
         <!--svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="80" viewBox="0 0 35 25"></svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-paw" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff9300" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M14.7 13.5c-1.1 -2 -1.441 -2.5 -2.7 -2.5c-1.259 0 -1.736 .755 -2.836 2.747c-.942 1.703 -2.846 1.845 -3.321 3.291c-.097 .265 -.145 .677 -.143 .962c0 1.176 .787 2 1.8 2c1.259 0 3 -1 4.5 -1s3.241 1 4.5 1c1.013 0 1.8 -.823 1.8 -2c0 -.285 -.049 -.697 -.146 -.962c-.475 -1.451 -2.512 -1.835 -3.454 -3.538z" />
                <path d="M20.188 8.082a1.039 1.039 0 0 0 -.406 -.082h-.015c-.735 .012 -1.56 .75 -1.993 1.866c-.519 1.335 -.28 2.7 .538 3.052c.129 .055 .267 .082 .406 .082c.739 0 1.575 -.742 2.011 -1.866c.516 -1.335 .273 -2.7 -.54 -3.052z" />
                <path d="M9.474 9c.055 0 .109 0 .163 -.011c.944 -.128 1.533 -1.346 1.32 -2.722c-.203 -1.297 -1.047 -2.267 -1.932 -2.267c-.055 0 -.109 0 -.163 .011c-.944 .128 -1.533 1.346 -1.32 2.722c.204 1.293 1.048 2.267 1.933 2.267z" />
                <path d="M16.456 6.733c.214 -1.376 -.375 -2.594 -1.32 -2.722a1.164 1.164 0 0 0 -.162 -.011c-.885 0 -1.728 .97 -1.93 2.267c-.214 1.376 .375 2.594 1.32 2.722c.054 .007 .108 .011 .162 .011c.885 0 1.73 -.974 1.93 -2.267z" />
                <path d="M5.69 12.918c.816 -.352 1.054 -1.719 .536 -3.052c-.436 -1.124 -1.271 -1.866 -2.009 -1.866c-.14 0 -.277 .027 -.407 .082c-.816 .352 -1.054 1.719 -.536 3.052c.436 1.124 1.271 1.866 2.009 1.866c.14 0 .277 -.027 .407 -.082z" />
            </svg-->
            Inicio
       </a>
       <a href="#" class="navegacion_enlace" data-toggle="modal" data-target="#modalAdoptar">¿Cómo Adoptar?</a>
       <a href="?c=foro" class="navegacion_enlace">Foro</a>

       <?php if(isset($_SESSION['tipo_usuario'])): ?>
            <?php if($validar == 'UsuarioComun'): ?>
            <a href="#" class="navegacion_enlace"><?php echo $nombre; ?></a>
            <a href="?c=cerrarSesionUsuario"><i class="fa fa-sign-out fa-lg"></i> Cerrar sesión</a>
       <?php endif; ?>
      <?php elseif($validar == null || $validar == ''): ?>
            <a href="#" class="navegacion_enlace" data-toggle="modal" data-target="#modalInicioSesion">Iniciar Sesión</a>
            <a href="?c=registrarUsuario"><i class="fa fa-sign-out fa-lg"></i> Registrarse</a> 
            <?php endif; ?> 
    </nav> 
  </div> 



<!-- Rectángulo de publicación -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="mr-3">
                        <form class="form-horizontal"  enctype="multipart/form-data" method="POST" action="?c=publicaciones">
                            <img src="assets/img/user_dog.png"  width="40" height="30">
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" name="Descripcion" placeholder="Escribe una historia de éxito">
                            <input type="text" class="form-control" name="Titulo" placeholder="Agrega un titulo">
                            <div class="input-group-append">
                                <label for="Imagen" class="btn btn-success">
                                    Imagen
                                    <input type="file" id="Imagen" name="archivo" accept="image/*" style="display:none;">
                                    
                                </label>
                                <label for="Button">
                                    <button class="btn btn-primary" type="submit">Publicar</button>
                                </label>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<div class="container mt-5">
    <div class="row">
        <?php foreach ($foro as $historia) : ?>
            <div class="col-md-8 mx-auto mb-4">
                <div class="card shadow rounded-3 border-1" style="max-width: 600px; margin: auto;">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <img src="assets/img/user_dog.png" width="30" height="30" alt="Usuario">
                                </div>
                                <div class="usuario"><?php echo $historia->Nombre; ?></div>
                            </div>
                            <div class="fecha"><?php echo $historia->FechaPublicacion; ?></div>
                        </div>
                        <?php if (!empty($historia->Titulo)) : ?>
                            <h5 class="card-title mt-2"><?php echo $historia->Titulo; ?></h5>
                        <?php endif; ?>
                        <p class="card-text"><?php echo $historia->Descripcion; ?></p>
                        <?php if (strlen($historia->Descripcion) > 100) : ?>
                            <a href="#" class="btn btn-link" data-toggle="modal" data-target="#verMasModal<?php echo $historia->ID; ?>">Ver más</a>
                            <div class="modal fade" id="verMasModal<?php echo $historia->ID; ?>" tabindex="-1" role="dialog" aria-labelledby="verMasModalLabel<?php echo $historia->ID; ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="verMasModalLabel<?php echo $historia->ID; ?>">Descripción completa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo $historia->Descripcion; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($historia->Imagenes)) : ?>
                        <img src="img/<?php echo $historia->Imagenes; ?>" class="card-img-bottom rounded" alt="Imagen de la publicación" class="rounded-3" style="max-width: 100%; height: auto; ">
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>



<!-- Ventana modal de inicio de sesión -->
<div class="modal fade" id="modalInicioSesion" tabindex="-1" role="dialog" aria-labelledby="modalInicioSesionLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalInicioSesionLabel">Iniciar Sesión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php include 'inicioSesión.php'; ?>
      </div>
    </div>
  </div>
</div>

<!-- Ventana modal de registro de usuario-->
<div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="modalRegistroLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalRegistroLabel">Iniciar Sesión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php include '?=registrarUsuario'; ?>
      </div>
    </div>
  </div>
</div>




<!-- Ventana modal Instrucciones-->
<div class="modal fade" id="modalAdoptar" tabindex="-1" role="dialog" aria-labelledby="modalAdoptarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAdoptarLabel">¿Cómo adoptar?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th>Paso</th>
              <th>Descripción</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Elige a tu mascota favorita, da clic en ADOPTAR y llena el formulario con tus datos.</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Envía</td>
            </tr>
            <tr>
              <td></td>
              <td>El albergue o rescatista recibirá tu solicitud de adopción.</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Contacto</td>
            </tr>
            <tr>
              <td></td>
              <td>Ellos se pondrán en contacto contigo para continuar el proceso de adopción y realizarte un contrato.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="assets/js/validaciones.js"></script>