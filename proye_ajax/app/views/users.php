<?php include('layouts/layout.php'); ?>
<script src="../../assets/js/user.js"></script>
</head>

    <!-- Navigation -->
<body>
  <?php include('layouts/nav_bar.php'); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
        </div>

        <!-- Features Section -->
        <div class="row">
          <div class="row">
              <div class="col-lg-10">
                  <h1 class="page-header" onclick="displayTabla();"><label class="label label-default"><span class="glyphicon glyphicon-th-list"></span> Usuarios</label>
                      <small><label id="action" class="label label-default">Lista de Usuarios</label></small>
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
                  <th>Correo Electronico</th>
                  <th>Opciones</th>
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
                  <p>Proyecto de la Asignatura de Desarrollo web con Ajax de la Facultad de Matemáticas</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="users.php">Usuarios</a>
                </div>
            </div>
        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Abner Collí 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../../assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
