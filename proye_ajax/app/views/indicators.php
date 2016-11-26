<?php include('layouts/layout.php'); ?>
<style media="screen">
  .indicator-inputs{
    margin-bottom: 20px;
  }
</style>
<script src="../../assets/js/indicator.js"></script>

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
