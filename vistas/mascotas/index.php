
<link href="../assets/css/estilos.css" rel="stylesheet" type="text/css">      


<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>Tabla Mascotas</h1>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Tablas</li>
              <li class="active"><a href="#">Tabla Mascotas</a></li>
            </ul>
          </div>
          <form  method="GET">
          <div class="form-group">
                  <label for="busqueda">Buscar mascota:</label>
                  <input type="text" id="busqueda" class="form-control" placeholder="Ingrese el nombre de la mascota">
                  <input type="button" value="Buscar" class="form_btn" onclick="busquedaMascotas();">
          </div>
          </form>

          <div><a class="btn btn-primary btn-flat" href="?c=mascotas&a=FormCrear"><i class="fa fa-lg fa-plus"></i></a>
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
                      <th>Raza</th>
                      <th>Edad</th>
                      <th>Genero</th>
                      <th>Descripción</th>
                      <th>Imagenes</th>
                      <th>Estado de adopción</th>
                      <th>Refugio</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                <?php foreach($this->modelo->Listar() as $r):?>
                    <tr>
                      <td><?=$r->ID?></td>
                      <td><?=$r->Nombre?></td>
                      <td><?=$r->Raza?></td>
                      <td><?=$r->Edad?></td>
                      <td><?=$r->Genero?></td>
                      <td><?=$r->Descripcion?></td>
                      <td><img src="img/<?= $r->Imagenes ?>" alt="<?= $r->Nombre ?>" width="50" height="50"></td>
                      <td><?=$r->EstadoAdopcion?></td>
                      <td><?=$r->Refugio?></td>
                      <td>
                        
                      <a class="btn btn-info btn-flat" href="?c=mascotas&a=FormCrear&id=<?=$r->ID?>"><i class="fa fa-pencil"></i></a>
                      <a class="btn btn-danger btn-flat" href="?c=mascotas&a=Borrar&id=<?=$r->ID?>" onclick="return confirm('¿Desea eliminar este registro?');"><i class="fa fa-trash"></i></a>
                    
                    </td>
                    </tr>
                <?php endforeach;?>
                  </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="confirmarBorradoModal" tabindex="-1" role="dialog" aria-labelledby="confirmarBorradoModalLabel" aria-hidden="true">
   
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="confirmarBorradoModalLabel">Confirmar Borrado</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               ¿Está seguro de que desea borrar este registro?
           </div>
           <div class="modal-footer">
               <button type="button"  href="?c=mascotas" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
               <a id="confirmarBorradoBtn" href="?c=mascotas&a=Borrar&id=<?=$r->ID?>"  class="btn btn-danger" >Confirmar</a>
           </div>
       </div>
    </div>
    </div>
   </div>

   <script src="assets/js/validaciones.js"></script>