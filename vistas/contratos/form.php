<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i>Contratos</h1>
            <p>Ingresa los datos para modificar un contrato</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Contratos</li>
              <li><a href="#"><?=$titulo?>Contratos</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" method="POST" action="?c=contratos&a=Guardar">
                      <fieldset>
                        <legend><?=$titulo?> Contratos</legend>
                            <input class="form-control" name="ID" type="hidden" value="<?=$p->getID()?>">
                            
                            <div class="form-group">
                            <label class="col-lg-2 control-label" for="IDAdopcion">Adopción</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="IDAdopcion" type="text" placeholder="Adopción" value="<?=$p->getIDAdopcion()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="IDUsuario">Usuario</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="IDUsuario" type="text" placeholder="Usuario" value="<?=$p->getIDUsuario()?>">
                          </div>
                        </div>

                       

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="TerminosYCondiciones">TerminosYCondiciones</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="TerminosYCondiciones" type="text" placeholder="Terminos" value="<?=$p->getTerminosYCondiciones()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="FirmaDigital">Firma Digital</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="FirmaDigital" type="text" placeholder="Firma Digital" value="<?=$p->getFirmaDigital()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="FechaFirma">Fecha Contrato</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="FechaFirma" type="text" placeholder="Fecha contrato" value="<?=$p->getFechaFirma()?>">
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