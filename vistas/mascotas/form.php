<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i>Mascotas</h1>
            <p>Ingresa los datos para modificar una mascota</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Mascotas</li>
              <li><a href="#"><?=$titulo?>Mascotas</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" method="POST" action="?c=mascotas&a=Guardar">
                      <fieldset>
                        <legend><?=$titulo?> Mascotas</legend>
                            <input class="form-control" name="ID" type="hidden" value="<?=$p->getID()?>">
                            
                            <div class="form-group">
                            <label class="col-lg-2 control-label" for="Nombre">Nombre</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Nombre" type="text" placeholder="Nombre mascota" value="<?=$p->getNombre()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Raza">Raza</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Raza" type="text" placeholder="Raza" value="<?=$p->getRaza()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Edad">Edad</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Edad" type="number" placeholder="Edad" value="<?=$p->getEdad()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Genero">Género</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Genero" type="text" placeholder="Género" value="<?=$p->getGenero()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Descripcion">Descripción</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Descripcion" type="text" placeholder="Descripcion" value="<?=$p->getDescripcion()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Imagenes">Imágenes</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Imagenes" type="text" placeholder="Imágenes" value="<?=$p->getImagenes()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="EstadoAdopcion">Estado</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="EstadoAdopcion" type="text" placeholder="Estado de la adopción" value="<?=$p->getEstadoAdopcion()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Refugio">Raza</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Refugio" type="text" placeholder="Refugio" value="<?=$p->getRefugio()?>">
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