<?php
session_start();
if(isset($_SESSION["valid"]) && $_SESSION["valid"] == true){
  header('location: ../views/index.php');
}

?>
<?php include('layouts/layout.php'); ?>
    <link href="../../assets/css/login.css" rel="stylesheet" type="text/css">
    <script src="../../assets/js/login.js"></script>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Home</a>
            </div>
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header Carousel -->

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
        </div>

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Bienvenido, por favor inicia sesión</h2>
            </div>
            <div class="col-md-6">
               <div class="account-wall">
                   <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                       alt="">
                   <form class="form-signin">
                   <input type="text" class="form-control" id="email" placeholder="Email" required autofocus>
                   <input type="password" class="form-control" id="password"placeholder="Password" required>
                   <button class="btn btn-lg btn-primary btn-block" type="submit"
                   onclick="doLogin($('#email').val(), $('#password').val());return false;">
                   Inciar Sesión</button>
                   <label class="checkbox pull-left">
                       <input type="checkbox" value="remember-me">
                       Recuérdame
                   </label>
                   <br>
                   <br>
                   </form>
                  <br>
                   <div id="notice">
                     Error
                   </div>
               </div>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" id="banner" src="../../assets/images/fmat.jpg" alt="">
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
