<div class="col-lg-6">

  <form>
    <div class="form-group">
      <label for="formGroupExampleInput">Nombre</label>
      <input type="text" class="form-control" id="name" placeholder="Nombre" required>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Apellido Paterno</label>
      <input type="text" class="form-control" id="last_name" placeholder="Apellido Paterno" required>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Apellido Materno</label>
      <input type="text" class="form-control" id="mother_last_name" placeholder="Apellino Materno"required>
    </div>
    <div class="form-group">
      <label for="father_list">Seleccionar Padre</label>
      <select class="form-control" id="father_id">
        <option value="">Selecciona una opción</option>
      </select>
    </div>
    <div class="form-group">
      <label for="father_list">Seleccionar Madre </label>
      <select class="form-control" id="mother_id">
        <option value="">Selecciona una opción</option>
      </select>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit"
    onclick="createPerson();return false;">Guardar</button>

    <div id="notice">

    </div>

  </form>
</div>
