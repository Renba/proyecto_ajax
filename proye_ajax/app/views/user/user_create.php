<div class="col-lg-6">

  <form>
    <div class="form-group">
      <label for="formGroupExampleInput">Nombre</label>
      <input type="text" class="form-control" id="name" placeholder="Nombre" required>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Correo Electrónico</label>
      <input type="text" class="form-control" id="email" placeholder="ejemplo@ejemplo.com"required>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Contraseña</label>
      <input type="password" class="form-control" id="password" placeholder="Contraseña"required>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Contraseña</label>
      <input type="password" class="form-control" id="confirm-password" placeholder="Confirma tu Contraseña"required>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit"
    onclick="createUser();return false;">Guardar</button>

    <div id="notice">

    </div>

  </form>
</div>
