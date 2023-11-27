


<link href="../assets/css/estilos.css" rel="stylesheet" type="text/css">      


<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>Tabla Avisos</h1>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Tablas</li>
              <li class="active"><a href="#">Tabla Avisos</a></li>
            </ul>
          </div>
          <form  method="GET">
          <div class="form-group">
                  <label for="busqueda">Buscar aviso:</label>
                  <input type="text" id="busqueda" class="form-control" placeholder="Ingresé el aviso">
                  <input type="button" value="Buscar" class="form_btn" onclick="busquedaAvisos();">
          </div>
          </form>

          <div><a class="btn btn-primary btn-flat" href="?c=avisos&a=FormCrear"><i class="fa fa-lg fa-plus"></i></a>
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
                      <th>Anunciante</th>
                      <th>Titulo</th>
                      <th>Descripcion</th>
                      <th>Fecha de publicación</th>
                      <th>Aviso</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach($p as $r):?>
                    <tr>
                      <td><?=$r->ID?></td>
                      <td><?=$r->IDUsuarioAnunciante?></td>
                      <td><?=$r->Titulo?></td>
                      <td><?=$r->Descripcion?></td>
                      <td><?=$r->FechaPublicacion?></td>
                      <td><img src="assets/img/<?= $r->ImagenAnuncio ?>" alt="<?= $r->IDUsuarioAnunciante ?>" width="50" height="25"></td>
                      <td>
                      <a class="btn btn-info btn-flat" href="?c=avisos&a=FormCrear&id=<?=$r->ID?>"><i class="fa fa-pencil"></i></a>
                      <a class="btn btn-danger btn-flat" href="?c=avisos&a=Borrar&id=<?=$r->ID?>" onclick="return confirm('¿Desea eliminar este registro?');"><i class="fa fa-trash"></i></a>
                    
                    </td>
                    </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="assets/js/validaciones.js"></script>