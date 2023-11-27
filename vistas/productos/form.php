<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i>Usuarios</h1>
            <p>Ingresa los datos para modificar un usuario</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Usuarios</li>
              <li><a href="#"><?=$titulo?>Usuarios</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" method="POST" action="?c=producto&a=Guardar">
                      <fieldset>
                        <legend><?=$titulo?> Usuarios </legend>
                        <div class="form-group">
                            <input class="form-control" name="ID" type="hidden" value="<?=$p->getID()?>">
                            

                            <label class="col-lg-2 control-label" for="Nombre">Nombre</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Nombre" type="text" placeholder="Nombre Usuario" value="<?=$p->getNombre()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Apellido">Apellido</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Apellido" type="text" placeholder="Apellido" value="<?=$p->getApellido()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Correo">Correo</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Correo" type="text" placeholder="Correo" value="<?=$p->getCorreoElectronico()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Contraseña">Contraseña</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Contraseña" type="text" placeholder="Contraseña" value="<?=$p->getContra()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Telefono">Teléfono</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Telefono" type="text" placeholder="Teléfono" value="<?=$p->getTelefono()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Direccion">Dirección</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Direccion" type="text" placeholder="Dirección" value="<?=$p->getDireccion()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="tipoUsuario">Rol</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="tipoUsuario" type="text" placeholder="Tipo de usuario" value="<?=$p->getTipoUsuario()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="fechaNacimiento">Fecha nacimiento</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="fechaNacimiento" type="text" placeholder="Fecha de nacimiento" value="<?=$p->getFechaNacimiento()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Genero">Género</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Genero" type="text" placeholder="Género" value="<?=$p->getGenero()?>">
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