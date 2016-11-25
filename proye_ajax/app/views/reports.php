<?php include('layouts/layout2.php'); ?>
<script type="text/javascript" src="../../assets/jqplot/jquery.js"></script>
<script type="text/javascript" src="../../assets/jqplot/jquery.jqplot.js"></script>
<script type="text/javascript" src="../../assets/jqplot/jqplot.barRenderer.js"></script>
<script type="text/javascript" src="../../assets/jqplot/jqplot.categoryAxisRenderer.js"></script>
<script type="text/javascript" src="../../assets/jqplot/jqplot.pointLabels.js"></script>
<link rel="stylesheet" type="text/css" hrf="../../assets/jqplot/jquery.jqplot.css" />
<script type="text/javascript">
$(document).ready(function(){
  displayIndicators();
});

  function displayIndicators(){
    $.ajax({
        url:"evaluation/evaluation_indicators.php",
        type:"GET",
        dataType:"html",
        success:function(response){
          $("#indicators").html(response);

        }
    });
  }

  function displayReport(indicator_id){
    var parametros = {
      "indicator_id": indicator_id,
    };
    $.ajax({
        data: parametros,
        url:"../controllers/evaluation/evaluation_indicator_report.php",
        type:"GET",
        dataType:"json",
        success:function(response){
          var evaluations = response;
          var data = new Array();
          var options = new Array();
          $.each(evaluations, function(evaluation) {
            var option_name = evaluations[evaluation].option_name;
            options.push(option_name)
            var times = evaluations[evaluation].times;
            data.push(times);
          });
          $('#chart1').html("");
          drawTable(data,options);
          $("#indicator-"+indicator_id).addClass("active");
          $('#indicators a').click(function(){
            $(this).parent().children('a').not(this).removeClass('active');
            $(this).addClass('active');
          });

        }
    });
  }
</script>
</head>

<body>
  <?php include('layouts/nav_bar.php'); ?>

    <!-- Header Carousel -->

    <!-- Page Content -->
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">Reportes del Proyecto de Ajax
                  <small>Indicadores</small>
              </h1>
              <ol class="breadcrumb">
                  <li><a href="index.php">Inicio</a>
                  </li>
                  <li class="active">Reportes</li>
              </ol>
          </div>
      </div>
        <!-- Marketing Icons Section -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-3" id="indicators">
            </div>
            <!-- Content Column -->
            <div class="col-md-9" id="content">

              <div id="info1"></div>
              <div id="chart1" style="height:400px;width:800px; ">
              </div>
            </div>
        </div>
        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Proyecto de la Asignatura de Desarrollo web con Ajax de la Facultad de Matemáticas</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="reports.php">Indicadores</a>
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

    <!-- Bootstrap Core JavaScript -->
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script type="text/javascript">
    $(document).ready(function(){
      var data = [0];
      var options = [''];

      drawTable(data, options);

      });
      function drawTable(data, options) {
        $.jqplot.config.enablePlugins = false;
        var s1 = data;
        var ticks = options;
        plot1 = $.jqplot('chart1', [s1], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            animate: !$.jqplot.use_excanvas,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            },
            highlighter: { show: false }
        });

      }
    </script>

</body>

</html>
