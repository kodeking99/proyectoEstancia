<link href="../assets/css/estilos.css" rel="stylesheet" type="text/css">      


<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>Reportes</h1>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Menú</li>
              <li class="active"><a href="#">Reportes</a></li>
            </ul>
          </div>
          <div>
        </div>
      </div>
      <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Menú de reportes</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-2">
            <a href="?c=reportes&a=generarReporteMascotas" class="btn btn-primary btn-block">Mascotas</a>
          </div>
          <div class="col-md-2">
            <a href="?c=reportes&a=generarReporteAdopciones" class="btn btn-primary btn-block">Adopciones</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<canvas id="graficaAdopciones" width="400" height="200"></canvas>

<a id="descargarPDF" href="?c=reportes&a=generarPDFAdopciones" class="btn btn-primary" style="display: none;"><b>Descargar PDF</b></a>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('graficaAdopciones').getContext('2d');
    var data = {
        labels: <?php echo json_encode(array_column($p, 'EstadoAdopcion')); ?>,
        datasets: [{
            label: 'Total de Adopciones',
            data: <?php echo json_encode(array_column($p, 'total')); ?>,
            backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],
            borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
            borderWidth: 1
        }]
    };
    var options = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });

    document.getElementById('descargarPDF').style.display = 'block';
</script>

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