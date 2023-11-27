<a href="../includes/reporte.php" class="btn btn-primary"><b>PDF</b> </a>

<link href="../assets/css/estilos.css" rel="stylesheet" type="text/css">      
<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>Respaldo y Restauración</h1>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Menú</li>
              <li class="active"><a href="#">Respaldo y Restauración</a></li>
            </ul>
          </div>
    

          <div>
        </div>
      </div>
      <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Menú</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-2">
            <a href="?c=respaldos&a=generarRespaldo" class="btn btn-primary btn-block">Respaldo</a>
          </div>
          <div class="col-md-4">
            <a href="?c=respaldos&a=generarRestauracion" class="btn btn-primary btn-block">Restauración</a>
              <form action="?c=respaldos&a=generarRestauracion" method="post" enctype="multipart/form-data">
                <label for="archivo_sql">Seleccionar archivo .sql:</label>
                <input type="file" name="archivo_sql" id="archivo_sql" accept=".sql">
                <br>
                <input type="submit" value="Restaurar Base de Datos">
              </form>
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
               <button type="button"  href="?c=producto" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
               <a id="confirmarBorradoBtn" href="?c=producto&a=Borrar&id=<?=$r->ID?>"  class="btn btn-danger" >Confirmar</a>
           </div>
       </div>
   </div>
</div>
     <script src="../assets/js/buscador.js"></script>
   </div>