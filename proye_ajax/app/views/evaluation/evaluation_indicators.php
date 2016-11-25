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
   <div class="list-group">
     <?php foreach ($indicators as $indicator) {?>
       <a onclick="displayReport(<?= $indicator->getId() ?>);"
          id="indicator-<?= $indicator->getId() ?>" class="list-group-item">
          <?= $indicator->getName() ?>
      </a>
       <?php }    ?>
   </div>
 <?php } ?>
