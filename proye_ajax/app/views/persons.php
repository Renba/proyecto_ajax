<?php include('layout.php'); ?>
<script src="../../assets/js/person.js"></script>
</head>

    <!-- Navigation -->
<body>
  <?php include('nav_bar.php'); ?>

    <!-- Header Carousel -->

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
        </div>

        <!-- Features Section -->
        <div class="row">
          <div class="row">
              <div class="col-lg-10">
                  <h1 class="page-header" onclick="displayTabla();"><label class="label label-default"><span class="glyphicon glyphicon-th-list"></span> Personas</label>
                      <small><label id="action" class="label label-default">Lista de Personas</label></small>
                  </h1>
              </div>
              <div class="col-lg-2">
                <h1 class="page-header">
                  <button type="button" class="btn btn-success" onclick="displayCreate();"><span class="glyphicon glyphicon-plus"></span> Agregar Persona</button>
                </h1>
              </div>
          </div>
          <div id="index">
            <table class="table">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>
                    Padre
                  </th>
                  <th>
                    Madre
                  </th>
                  <th>
                    options
                  </th>

                </tr>
              </thead>
              <tbody id="body">
              </tbody>
            </table>
          </div>
          <div id="create">
          </div>
        </div>
        <!-- /.row -->

        <hr>

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
