<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i>Avisos</h1>
            <p>Ingresa los datos para modificar un aviso</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Avisos</li>
              <li><a href="#"><?=$titulo?>Avisos</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" method="POST" action="?c=avisos&a=Guardar">
                      <fieldset>
                        <legend><?=$titulo?> Avisos</legend>
                            <input class="form-control" name="ID" type="hidden" value="<?=$p->getID()?>">
                            
                            <div class="form-group">
                            <label class="col-lg-2 control-label" for="IDUsuarioAnunciante">Anunciante</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="IDUsuarioAnunciante" type="text" placeholder="Usuario anunciante" value="<?=$p->getIDUsuarioAnunciante()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Titulo">Título</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Titulo" type="text" placeholder="Título" value="<?=$p->getTitulo()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Descripcion">Descripción</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Descripcion" type="text" placeholder="Descripción" value="<?=$p->getDescripcion()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="FechaPublicacion">Fecha de publicación</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="FechaPublicacion" type="text" placeholder="Fecha de publicación" value="<?=$p->getFechaPublicacion()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Imagen">ImagenAnuncio</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Imagen" type="text" placeholder="Imagen de anuncio" value="<?=$p->getImagenAnuncio()?>">
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