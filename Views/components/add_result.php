<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Añadir resultados</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-10">
                <div class="form-label-group">
                  <select id="fixture" class="form-control">
                    <option value="0">Seleccionar Jornada</option>
                    <option value="1">Jornada 1</option>
                    <option value="2">Jornada 2</option>
                    <option value="3">Jornada 3</option>
                    <option value="4">Jornada 4</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2">
                <input type="submit" class="btn btn-primary" value="Buscar">
              </div>
            </div>
          </div>
        </form>
        <form>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-label-group">
                  <p class="form-control">Equipo local</p>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-label-group">
                  <input type="number" class="form-control" style="padding-top: 7px;" id="score_home" name="score_home" min="0">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-label-group">
                  <p class="form-control">Equipo visitante</p>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-label-group">
                  <input type="number" class="form-control" style="padding-top: 7px;" id="score_visit" name="score_visit" min="0">
                </div>
              </div>
            </div>
          </div>
          <div>
            <input type="submit" class="btn btn-primary" value="Añadir">
          </div>
        </form>
      </div>
    </div>
  </div>