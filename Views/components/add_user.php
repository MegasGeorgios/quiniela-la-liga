<div class="container">
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Añadir usuario</div>
    <div class="card-body">
      <form>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required="required" autofocus="autofocus">
                <label for="name">Nombre</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Apellidos" required="required">
                <label for="lastName">Apellidos</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="dni" name="dni" class="form-control" placeholder="DNI" required="required" autofocus="autofocus">
                <label for="dni">DNI</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="phone" name="phone" class="form-control" placeholder="Móvil" required="required">
                <label for="phone">Móvil</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="required">
            <label for="email">Email</label>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña" required="required">
                <label for="pass">Contraseña</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="password" id="confirmPass" name="confirmPass" class="form-control" placeholder="Confirmar contraseña" required="required">
                <label for="confirmPass">Confirmar contraseña</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <select id="rol_id" class="form-control">
              <option value="1">Administrador</option>
              <option value="2">Editor</option>
            </select>
          </div>
        </div>
        <div>
          <input type="submit" class="btn btn-primary" value="Añadir">
        </div>
      </form>
    </div>
  </div>
</div>