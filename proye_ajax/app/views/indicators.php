<?php include('layouts/layout.php'); ?>
<style media="screen">
  .indicator-inputs{
    margin-bottom: 20px;
  }
</style>
<script type="text/javascript">

  $(document).ready(function(){
    displayIndicators();
  });

  function displayIndicators(){
    $.ajax({
        url:"indicator/indicators_index.php",
        type:"GET",
        dataType:"html",
        success:function(response){
          $("#action").html(response);
        }
    });
  }

  function displayCreate(){
    option_number = 2;

    $("#action").html("");
    $.ajax({
        url:"indicator/indicator_create.php",
        type:"GET",
        dataType:"html",
        success:function(response){
          $("#action").html(response);
        }
    });
  }

    function createIndicator(){
      $.post('../controllers/indicator/indicator_create.php', $('#form').serialize(), function(response){
         $("#notice").html(response);
         if(response == 'ok'){
           displayIndicators();
         }
      });
    }

    var option_number = 2;

    function addOption(){
      option_number += 1;
      $( "#indicator-options" ).append( "<div class=\"form-group\">"+
        "<label for=\"formGroupExampleInput\">Opcion "+ option_number+"</label>"+
        "<input type=\"text\" class=\"form-control\"  name=\"options[]\" placeholder=\"Nombre\" value=\"Opción "+
        option_number +"\" required></div>" );

    }

    function removeOption() {
      if(option_number > 2){
        $("#indicator-options .form-group").last().remove();
        option_number -= 1;
      }
    }



  function displayIndicator(id){
    var parametros = {
      "id" : id
    };
    $.ajax({
        data: parametros,
        url:"indicator/indicator_view.php",
        type:"GET",
        dataType:"html",
        success:function(response){
          $("#action").html(response);
        }
    });
  }

  function displayEdit(id){
    var parametros = {
      "id" : id
    };
    $.ajax({
        data: parametros,
        url:"indicator/indicator_edit.php",
        type:"GET",
        dataType:"html",
        success:function(response){
          $("#action").html(response);
        }
    });
  }

  function editIndicator(){
    $.post('../controllers/indicator/indicator_update.php', $('#form').serialize(), function(response){
       $("#notice").html(response);
       if(response == 'ok'){
         displayIndicators();
       }
    });
  }

  function deleteIndicator(id){
    if (window.confirm('Seguro que quieres eliminar al indicador seleccionado?')){
      var parametros = {
        "id" : id,
      };
      $.ajax({
              data:  parametros,
              url:   '../controllers/indicator/indicator_delete.php',
              type:  'post',
              success:  function (response) {
                  if(response == "ok"){
                    displayIndicators();
                  }else{
                    alert(response);
                  }
              }
      });

    }
  }

</script>
</head>

    <!-- Navigation -->
<body>
  <?php include('layouts/nav_bar.php'); ?>

    <!-- Header Carousel -->

    <!-- Page Content -->
    <div class="container">
      <div class="row">
          <div class="col-lg-10">
              <h2 class="page-header">
                <label class="label label-default" onclick="displayIndicators();"><span class="glyphicon glyphicon-th-list"></span> Indicadores</label>
              </h2>
          </div>
          <div class="col-lg-2">
              <h3 class="page-header">
                <label class="label label-success" onclick="displayCreate();">
                  <span class="glyphicon glyphicon-plus"></span>Nuevo Indicador
                </label>
              </h3>
          </div>
          <div id="action">

          </div>

      </div>

      <!--message-->
      <div class="well">
          <div class="row">
              <div class="col-md-8">
                <p>Proyecto de la Asignatura de Desarrollo web con Ajax de la Facultad de Matemáticas</p>
              </div>
              <div class="col-md-4">
                  <a class="btn btn-lg btn-default btn-block" href="indicators.php">Indicadores</a>
              </div>
          </div>
      </div>

      <hr>

      <!-- Footer -->
      <footer>
          <div class="row">
              <div class="col-lg-12">
                  <p>Copyright &copy; Your Website 2014</p>
              </div>
          </div>
      </footer>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../../assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->


</body>

</html>
