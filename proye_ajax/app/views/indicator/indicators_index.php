<?php
require_once('../../models/indicator.php');
  $indicators = array();

require_once('../../daos/indicatorDao.php');

  $result = getIndicators();
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $indicator = new Indicator();
      $indicator->setId( $row['id']);
      $indicator->setName( $row['name']);
      array_push($indicators, $indicator);

    }
  }
?>

 <?php if(count($indicators) > 0) { ?>
    <?php foreach ($indicators as $indicator) {?>

      <div class="col-md-4 col-sm-6">
        <div class="panel panel-default text-center">
          <div class="panel-heading">
            <span class="fa-stack fa-5x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-book fa-stack-1x fa-inverse"></i>
            </span>
          </div>
          <div class="panel-body">
            <h4><?= $indicator->getName()?></h4>
            <a href="#" class="btn btn-primary" onclick="displayIndicator(<?= $indicator->getId() ?>)">Ver</a>
            <a href="#" class="btn btn-success" onclick="displayEdit(<?= $indicator->getId() ?>)">Editar</a>
            <a href="#" class="btn btn-danger" onclick="deleteIndicator(<?= $indicator->getId() ?>)">Eliminar</a>

          </div>
        </div>
      </div>

    <?php }    ?>
 <?php } ?>
