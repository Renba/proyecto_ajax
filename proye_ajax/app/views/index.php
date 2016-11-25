<?php
session_start();

  if(isset($_SESSION["valid"])){
    if($_SESSION["valid"] == false){
      header('location: ../views/login.php');
    }

  }else{
    header('location: ../views/login.php');
  }
 ?>
 <?php include('layouts/layout.php'); ?>

</head>

<body>


    <!-- Navigation -->

    <?php include('layouts/nav_bar.php'); ?>

    <!-- Header Carousel -->

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                  Módulos
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Personas</h4>
                    </div>
                    <div class="panel-body">
                        <p>Texto sobre el catalogo de personas, puede ser cualquier cosa</p>
                        <a href="persons.php" class="btn btn-info">Ir a Personas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i> Indicadores</h4>
                    </div>
                    <div class="panel-body">
                        <p>Texto sobre el catalogo de indicadores, puede ser cualquier cosa</p>
                        <a href="indicators.php" class="btn btn-success">Ir a Indicadores</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i> Easy to Use</h4>
                    </div>
                    <div class="panel-body">
                        <p>Texto sobre los reportes, puede ser cualquier cosa</p>
                        <a href="reports.php" class="btn btn-danger">Ir a Reportes</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Desarrollo web en Ajax</h2>
            </div>
            <div class="col-md-6">
                <p>Aplicación de la Matería de Desarrollo web en ajax</p>
                <ul>
                  <h3>Se aplicarón las siguientes tecnologias:</h3>
                    <li><strong>Ajax</strong>
                    </li>
                    <li>jQuery</li>
                    <li>JQPlot</li>
                    <li>JQuery Ui</li>
                    <li>Bootstrap</li>
                    <li>JavaScript</li>
                    <li>CSS</li>
                    <li>PHP</li>
                    <li>MYSQL</li>
                </ul>
                <h2>
                  <p>Gracias por su atención</p>
                </h2>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="../../assets/images/ajax.jpg" style="width:600px">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Ir al Home</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="index.php">Home</a>
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
