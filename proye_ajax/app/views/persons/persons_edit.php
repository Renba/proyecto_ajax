<?php
require_once('../../models/person.php');
$person = new Person();

require_once('../../daos/personDao.php');
$id=$_GET['id'];
$result = getPerson($id);
if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    $person->setId($row["id"]);
    $person->setName($row["name"]);
    $person->setLastName($row["last_name"]);
    $person->setMotherLastName($row["mother_last_name"]);
    $fid = $row["father_id"];
    $mid = $row["mother_id"];
  }
}

 ?>
<div class="col-lg-6">

  <form>
    <input type="text" class="form-control hidden" id="id" placeholder="Nombre"
      value="<?= $person->getId()?>" required>
    <div class="form-group">
      <label for="formGroupExampleInput">Nombre</label>
      <input type="text" class="form-control" id="name" placeholder="Nombre"
        value="<?= $person->getName()?>" required>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Apellido Paterno</label>
      <input type="text" class="form-control" id="last_name" placeholder="Apellido Paterno"
        value="<?= $person->getLastName()?>" required>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Apellido Materno</label>
      <input type="text" class="form-control" id="mother_last_name" placeholder="Apellino Materno"
        value="<?= $person->getMotherLastName()?>" required>
    </div>
    <div id="fid" class="hidden"><?= $fid ?></div>
    <div id="mid" class="hidden"><?= $mid ?></div>
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
    onclick="editPerson();return false;">Guardar</button>

    <div id="notice">

    </div>

  </form>
</div>
