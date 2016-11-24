<?php include('layouts/layout2.php'); ?>
<script type="text/javascript" src="../../assets/jqplot/jquery.js"></script>
<script type="text/javascript" src="../../assets/jqplot/jquery.jqplot.js"></script>
<script type="text/javascript" src="../../assets/jqplot/jqplot.barRenderer.js"></script>
<script type="text/javascript" src="../../assets/jqplot/jqplot.categoryAxisRenderer.js"></script>
<script type="text/javascript" src="../../assets/jqplot/jqplot.pointLabels.js"></script>
<link rel="stylesheet" type="text/css" hrf="../../assets/jqplot/jquery.jqplot.css" />
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
                  <li><a href="index.html">Inicio</a>
                  </li>
                  <li class="active">Reportes</li>
              </ol>
          </div>
      </div>
        <!-- Marketing Icons Section -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="index.html" class="list-group-item">Home</a>
                    <a href="about.html" class="list-group-item">About</a>
                    <a href="services.html" class="list-group-item">Services</a>
                    <a href="contact.html" class="list-group-item">Contact</a>
                    <a href="portfolio-1-col.html" class="list-group-item">1 Column Portfolio</a>
                    <a href="portfolio-2-col.html" class="list-group-item">2 Column Portfolio</a>
                    <a href="portfolio-3-col.html" class="list-group-item">3 Column Portfolio</a>
                    <a href="portfolio-4-col.html" class="list-group-item">4 Column Portfolio</a>
                    <a href="portfolio-item.html" class="list-group-item">Single Portfolio Item</a>
                    <a href="blog-home-1.html" class="list-group-item">Blog Home 1</a>
                    <a href="blog-home-2.html" class="list-group-item">Blog Home 2</a>
                    <a href="blog-post.html" class="list-group-item">Blog Post</a>
                    <a href="full-width.html" class="list-group-item">Full Width Page</a>
                    <a href="sidebar.html" class="list-group-item ">Sidebar Page</a>
                    <a href="faq.html" class="list-group-item">FAQ</a>
                    <a href="404.html" class="list-group-item">404</a>
                    <a href="pricing.html" class="list-group-item">Pricing Table</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9" id="content">
              <h1 class="page-header"><label class="label label-info" id="title">Indicadores</label>
              </h1>

              <div id="info1"></div>
              <div id="chart1" style="height:500px;width:800px; ">
              </div>
            </div>
        </div>
        <!-- Call to Action Section -->
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

    <!-- Bootstrap Core JavaScript -->
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script type="text/javascript">
    $(document).ready(function(){
      var data = [2,6,7,10,12,12];
      var options = ['Totalmente de acuerdo', 'De acuerdo', 'Casi de acuerdo', 'En desacuerdo', 'No me gusto nada', 'lo odio'];

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

        $('#chart1').bind('jqplotDataClick',
            function (ev, seriesIndex, pointIndex, data) {
                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
      }
    </script>

</body>

</html>
