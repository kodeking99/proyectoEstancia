
<link href="../assets/css/estilos.css" rel="stylesheet" type="text/css">      
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1>Tabla solicitudes</h1>
            <ul class="breadcrumb side">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li>Tablas</li>
                <li class="active"><a href="#">Tabla Solicitudes</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Ciudad</th>
                                <th>Colonia</th>
                                <th>Mascota</th>
                                <th>Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($this->modelo->Listar() as $r):?>
                                <tr>
                                    <td><?=$r->ID?></td>
                                    <td><?=$r->Nombre?></td>
                                    <td><?=$r->Apellido?></td>
                                    <td><?=$r->Correo?></td>
                                    <td><?=$r->Telefono?></td>
                                    <td><?=$r->Ciudad?></td>
                                    <td><?=$r->Colonia?></td>
                                    <!--td><img src="img<//?= $r->Imagenes ?>" alt="<//?= $r->Nombre ?>" width="50" height="50"></td-->
                                    <td><?=$r->IdMascota?></td>
                                    <td><?=$r->IdUsuario?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
