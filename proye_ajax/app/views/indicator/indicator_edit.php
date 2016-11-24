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

      <div id="indicator-options">
        <h1>Opciones de Indicator</h1>

        <?php if(count($indicator_options) > 0) { ?>
           <?php
           $index = 1;
           foreach ($indicator_options as $option) {?>
             <div class="form-group">
               <label for="formGroupExampleInput">Opcion <?= $index ?></label>
               <input type="text" class="form-control"  name="options[]" placeholder="Nombre" value="<?= $option->getOptionName()?>" required>
             </div>
           <?php
           $index++;
         }    ?>
        <?php } ?>


      </div>
      <button type="button" class="btn btn-success btn-circle-sm" onclick="addOption()">
        <i class="glyphicon glyphicon-plus"></i>
      </button>
      <button type="button" class="btn btn-danger btn-circle-sm" onclick="removeOption();">
        <i class="glyphicon glyphicon-minus" ></i>
      </button>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit"
    onclick="editIndicator(); return false;">Guardar Indicador</button>

  </form>
  <div id="notice">

  </div>
</div>
