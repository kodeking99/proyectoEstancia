<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i>Adopciones</h1>
            <p>Ingresa los datos para modificar una adopcion</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Adopciones</li>
              <li><a href="#"><?=$titulo?>Adopciones</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" method="POST" action="?c=adopciones&a=Guardar">
                      <fieldset>
                        <legend><?=$titulo?> Adopciones</legend>
                            <input class="form-control" name="ID" type="hidden" value="<?=$p->getID()?>">
                            
                            <div class="form-group">
                            <label class="col-lg-2 control-label" for="IDUsuarioAdoptante">Adoptante</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="IDUsuarioAdoptante" type="text" placeholder="Usuario Adoptante" value="<?=$p->getIDUsuarioAdoptante()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="IDMascota">Mascota</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="IDMascota" type="text" placeholder="Mascota" value="<?=$p->getIDMascota()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="FechaAdopcion">Fecha de Adopción</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="FechaAdopcion" type="text" placeholder="Fecha de adopción" value="<?=$p->getFechaAdopcion()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="EstadoAdopcion">Estado Adopción</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="EstadoAdopcion" type="text" placeholder="Estado de la adopción" value="<?=$p->getEstadoAdopcion()?>">
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