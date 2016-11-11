<?php
session_start();
if(isset($_SESSION["valid"]) && $_SESSION["valid"] == true){
  header('location: ../views/index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Proyecto Ajax</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../assets/bootstrap/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../assets/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style media="screen">
    .form-signin
{
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
  margin-bottom: 10px;
}
.form-signin .checkbox
{
  font-weight: normal;
}
.form-signin .form-control
{
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.form-signin .form-control:focus
{
  z-index: 2;
}
.form-signin input[type="text"]
{
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.account-wall
{
  margin-top: 20px;
  padding: 40px 0px 20px 0px;
  background-color: #f7f7f7;
  -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
  color: #555;
  font-size: 18px;
  font-weight: 400;
  display: block;
}
.profile-img
{
  width: 96px;
  height: 96px;
  margin: 0 auto 10px;
  display: block;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
}
.need-help
{
  margin-top: 10px;
}
.new-account
{
  display: block;
  margin-top: 10px;
}

#banner{
  margin-top: 30px;
}

#notice{
  font-family: cursive;
  color: red;
}
    </style>
    <script type="text/javascript">
    function doLogin(email, password){
      var parametros = {
              "email" : email,
              "password" : password
      };
      $.ajax({
              data:  parametros,
              url:   '../controllers/login.php',
              type:  'post',
              beforeSend: function () {
                      $("#notice").html("Procesando, espere por favor...");
              },
              success:  function (response) {
                  $("#notice").html(response);
                  if(response == "ok"){
                    window.location.href="index.php"
                  }
              }
      });
      }
    </script>
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
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.html">Personas</a>
                    </li>
                    <li>
                        <a href="services.html">Métricas</a>
                    </li>
                    <li>
                        <a href="contact.html">Reportes</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configuraciones <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="full-width.html">Usuarios</a>
                            </li>
                            <li>
                                <a href="sidebar.html">Iniciar Sesión/Cerrar Sesión</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
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
