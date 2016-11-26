<?php
require_once('../../models/indicator.php');
require_once('../../daos/indicatorDao.php');
$id = $_GET["id"];
$result = getIndicator($id);
$indicator = new Indicator();
if($result->num_rows > 0){
  $row = $result->fetch_assoc();
  $indicator->setId($id);
  $indicator->setName($row["name"]);
}

require_once('../../daos/indicatorOptionsDao.php');
require_once('../../models/indicator_option.php');
$result = getIndicatorOptions($id);
$indicator_options = array();
if($result->num_rows > 0){
  while($row =$result->fetch_assoc()){
    $option = new IndicatorOption();
    $option->setId($row["id"]);
    $option->setOptionName($row["option_name"]);
    $option->setIndicatorId($row["indicator_id"]);
    array_push($indicator_options, $option);
  }
}
?>
<script type="text/javascript">
  option_number = <?= count($indicator_options) ?>;
</script>

<div class="col-lg-6">
  <form id="form">
    <div class="indicator-inputs">
        <div class="form-group hidden">
          <label for="formGroupExampleInput">Nombre de Indicador</label>
          <input type="text" class="form-control"  name="id" placeholder="Nombre"
            required value="<?= $indicator->getId() ?>">
        </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Nombre de Indicador</label>
        <input type="text" class="form-control"  name="name" placeholder="Nombre"
          required value="<?= $indicator->getName() ?>">
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit"
      onclick="editIndicator(); return false;">Guardar Nombre de Indicador</button>
  </form>

  <div id="indicator-options">
    <h1>Opciones de Indicator</h1>

    <?php if(count($indicator_options) > 0) { ?>
       <?php
       $index = 1;
       foreach ($indicator_options as $option) {?>
         <form id="form<?= $option->getId() ?>">
           <div class="form-group">
             <label for="formGroupExampleInput">Opcion <?= $index ?></label>
             <input type="text" class="form-control"  name="option_name" placeholder="Nombre" value="<?= $option->getOptionName()?>" required>
             <input type="text" class="form-control hidden"  name="option_id" placeholder="Nombre" value="<?= $option->getId()?>" required>
             <br>

             <button type="button" class="btn btn-success btn-circle-sm"
                          onclick="saveOption(<?= $option->getId() ?>, <?= $indicator->getId()?>)">
                Guardar
             </button>

             <button type="button" class="btn btn-danger btn-circle-sm"
                     onclick="deleteOption(<?= $option->getId() ?>, <?= $indicator->getId() ?>)">
                Eliminar
             </button>
            </div>
         </form>
       <?php
       $index++;
     }    ?>
    <?php } ?>

  </div>
        <button id = "button-add" type="button" class="btn btn-success btn-circle-sm" onclick="addOptioninEdit(<?= $indicator->getId() ?>)">
          <i class="glyphicon glyphicon-plus"></i> Agregar Opción
        </button>
      </div>

  <div id="notice">

  </div>
</div>
