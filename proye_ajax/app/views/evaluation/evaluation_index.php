<?php
$id = $_GET["id"];
require_once("../../models/indicator.php");
require_once("../../daos/indicatorDao.php");
$indicators = array();
$result_indicator = getIndicators();
if($result_indicator->num_rows > 0){
  while($row_indicator = $result_indicator->fetch_assoc()){
    $indicator = new Indicator();
    $indicator->setId($row_indicator['id']);
    $indicator->setName( $row_indicator['name']);
    array_push($indicators, $indicator);
  }
}

require_once("../../models/indicator_option.php");
require_once("../../daos/indicatorOptionsDao.php");
require_once("../../daos/evaluationDao.php");

foreach($indicators as $indicator){
  $options = array();
  $result_option = getIndicatorOptions($indicator->getId());

  $result_selected_option = getEvaluationSelectedOption($id, $indicator->getId());
  $row_selected_option = $result_selected_option->fetch_assoc();
  $selected_option = $row_selected_option["option_id"];

  if($result_option->num_rows > 0){
    while($row_option = $result_option->fetch_assoc()){
      $option = new IndicatorOption();
      $option->setId($row_option["id"]);
      $option->setOptionName($row_option["option_name"]);
      if($option->getId() == $selected_option){
        $option->setSelected();
      }
      array_push($options, $option);
    }
  }
  $indicator->setOptions($options);
}

 ?>
<script type="text/javascript">
  function updateEvaluation(person_id, indicator_id){
    var option_id = $("#indicator"+indicator_id+" input[type='radio'][name='option']:checked").val();
    if (option_id == undefined){
      alert("Selecciona una opción de indicador");
    }else{

      var parametros = {
        "person_id" : person_id,
        "indicator_id": indicator_id,
        "option_id": option_id,
      };
      $.ajax({
              data:  parametros,
              url:   '../controllers/evaluation/evaluation_update.php',
              type:  'post',
              success:  function (response) {
                  if(response == "ok"){

                    alert("Se evaluo correctamente el indicador");
                  }else{
                    alert("Error al evaluar el indicador");
                  }
              }
      });

    }
  }
</script>
<style media="screen">
  .form-check-inline{
    padding-right: 20px;
  }
</style>
<?php if(count($indicators) > 0) { ?>
         <?php foreach ($indicators as $indicator) {?>

           <div id="indicator<?= $indicator->getId()?>">
             <form class="form-group">
               <h1 class="page-header"><label class="label label-info"><?= $indicator->getName()?></label>
               </h1>

               <?php foreach($indicator->getOptions() as $option) {?>
                 <label class="form-check-inline">
                   <input class="form-check-input" type="radio" name="option"
                      value="<?=$option->getId()?>" <?= $option->isSelected() ? 'checked': ''?>>
                      <?= $option->getOptionName()?>
                 </label>
                 <?php }; ?>

                 <div class="form-group">
                   <button type="button" class="btn btn-success"
                           onclick="updateEvaluation(<?= $id ?>, <?= $indicator->getId() ?>)">
                     Evaluar
                   </button>
                 </div>
             </form>
           </div>

         <?php }  ?>
<?php } ?>
