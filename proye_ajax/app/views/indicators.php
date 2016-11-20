<?php include('layout.php'); ?>
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
      $.post('../controllers/indicator_create.php', $('#form').serialize(), function(response){
         $("#notice").html(response);
         if(response == 'ok'){

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




</script>
</head>

    <!-- Navigation -->
<body>
  <?php include('nav_bar.php'); ?>

    <!-- Header Carousel -->

    <!-- Page Content -->
    <div class="container">
      <div class="row">
          <div class="col-lg-10">
              <h2 class="page-header">
                <label class="label label-default"><span class="glyphicon glyphicon-th-list"></span> Indicadores</label>
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
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
              </div>
              <div class="col-md-4">
                  <a class="btn btn-lg btn-default btn-block" href="#">Call to Action</a>
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
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
