<?php
require_once('../../models/user.php');
$user = new User();

require_once('../../daos/userDao.php');
$id=$_GET['id'];
$result = getUser($id);
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $user->setId($row["id"]);
    $user->setName($row["name"]);
    $user->setEmail($row["email"]);
    $user->setPassword($row["password"]);
}

 ?>
<div class="col-lg-6">

  <form>
    <input type="text" class="form-control hidden" id="id" placeholder="Nombre"
      value="<?= $user->getId()?>" required>
    <div class="form-group">
      <label for="formGroupExampleInput">Nombre</label>
      <input type="text" class="form-control" id="name" placeholder="Nombre"
        value="<?= $user->getName()?>" required>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Email</label>
      <input type="text" class="form-control" id="email" placeholder="Apellido Paterno"
        value="<?= $user->getEmail()?>" required>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Contraseña</label>
      <input type="password" class="form-control" id="password" placeholder="Contraseña"
        value="<?= $user->getPassword()?>" required>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Contraseña</label>
      <input type="password" class="form-control" id="confirm-password" placeholder="Confirmar Contraseña"
        value="<?= $user->getPassword()?>" required>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit"
    onclick="editUser();return false;">Guardar</button>

    <div id="notice">

    </div>

  </form>
</div>
