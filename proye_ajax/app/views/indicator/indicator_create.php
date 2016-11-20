<div class="col-lg-6">
  <form id="form">
    <div class="indicator-inputs">

      <div class="form-group">
        <label for="formGroupExampleInput">Nombre de Indicador</label>
        <input type="text" class="form-control"  name="name" placeholder="Nombre" required>
      </div>

      <div id="indicator-options">
        <h1>Opciones de Indicator</h1>

        <div class="form-group">
          <label for="formGroupExampleInput">Opcion 1</label>
          <input type="text" class="form-control"  name="options[]" placeholder="Nombre" value="Opción 1" required>
        </div>

        <div class="form-group">
          <label for="formGroupExampleInput">Opción 2</label>
          <input type="text" class="form-control"  name="options[]" placeholder="Nombre" required value="Opción 2">
        </div>

      </div>
      <button type="button" class="btn btn-success btn-circle-sm" onclick="addOption()">
        <i class="glyphicon glyphicon-plus"></i>
      </button>
      <button type="button" class="btn btn-danger btn-circle-sm" onclick="removeOption();">
        <i class="glyphicon glyphicon-minus" ></i>
      </button>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit"
    onclick="createIndicator(); return false;">Guardar Indicador</button>

  </form>
  <div id="notice">

  </div>
</div>
