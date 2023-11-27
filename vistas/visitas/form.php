<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i>Visitas</h1>
            <p>Ingresa los datos para modificar una visita</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Visitas</li>
              <li><a href="#"><?=$titulo?>Visitas</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" method="POST" action="?c=visitas&a=Guardar">
                      <fieldset>
                        <legend><?=$titulo?> Visitas</legend>
                            <input class="form-control" name="ID" type="hidden" value="<?=$p->getID()?>">
                            
                            <div class="form-group">
                            <label class="col-lg-2 control-label" for="IDUsuarioVisitante">Usuario visitante</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="IDUsuarioVisitante" type="text" placeholder="Usuario" value="<?=$p->getIDUsuarioVisitante()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="IDMascota">Mascota</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="IDMascota" type="text" placeholder="Mascota" value="<?=$p->getIDMascota()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="FechaVisita">Fecha de visita</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="FechaVisita" type="text" placeholder="Fecha de la visita" value="<?=$p->getFechaVisita()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Comentario">Comentarios</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Comentario" type="text" placeholder="Comentarios" value="<?=$p->getComentario()?>">
                          </div>
                        </div>


                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default" type="reset">Cancelar</button>
                            <button class="btn btn-primary" type="submit">Enviar</button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>