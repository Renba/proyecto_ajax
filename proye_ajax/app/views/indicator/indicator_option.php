<?php
$indicator_id = $_GET["indicator_id"];
?>
<form id="form-1">
  <div class="form-group">
    <label for="formGroupExampleInput">Opcion </label>
    <input type="text" class="form-control"  name="option_name" placeholder="Nombre" value="Opción Nueva" required>
    <input type="text" class="form-control hidden"  name="id_option" placeholder="Nombre" value="Opcion" required>
    <br>
    <button type="button" class="btn btn-success btn-circle-sm" onclick="saveOption(-1,<?= $indicator_id ?>);">
       Guardar
    </button>
   </div>
</form>
