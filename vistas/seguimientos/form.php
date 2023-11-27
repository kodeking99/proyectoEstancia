<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i>Seguimiento</h1>
            <p>Ingresa los datos para modificar un seguimiento</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Seguimiento</li>
              <li><a href="#"><?=$FechaSeguimiento?>Seguimiento</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" method="POST" action="?c=seguimientos&a=Guardar">
                      <fieldset>
                        <legend><?=$FechaSeguimiento?> Seguimiento</legend>
                            <input class="form-control" name="ID" type="hidden" value="<?=$p->getID()?>">
                            
                            <div class="form-group">
                            <label class="col-lg-2 control-label" for="IDAdopcion">ID Adopcion</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="IDAdopcion" type="text" placeholder="Id adopcion" value="<?=$p->getIDAdopcion()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="FechaSeguimiento">Fecha de seguimiento</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="FechaSeguimiento" type="text" placeholder="Fecha seguimiento" value="<?=$p->getFechaSeguimiento()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Comentario">Comentario</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Comentario" type="text" placeholder="comentario" value="<?=$p->getComentario()?>">
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