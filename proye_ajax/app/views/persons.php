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
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/jquery-ui.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style media="screen">
    </style>
    <script type="text/javascript">
      $(document).ready(function(){
        displayTabla();
      });

      function displayTabla(){
        $("#create").html("");
        $("#body").html("");
        $( "#action" ).removeClass().addClass( "label label-default" );
        $("#action").html("Lista de Personas");

        $.ajax({
            url:"../controllers/persons_index.php",
            type:"POST",
            dataType:"json",
            success:function(response){
              persons = response;

              $.each(persons, function(person) {
                var name = persons[person].name;
                var last_name = persons[person].last_name;
                var mother_last_name = persons[person].mother_last_name;
                var father = persons[person].father.name;
                var mother = persons[person].mother.name;
                var id = persons[person].id;
                $("#body").append("<tr><td>"+ name +"</td><td>"+
                                            last_name +"</td><td>"+
                                            mother_last_name+"</td><td>"+
                                            father+"</td><td>"+
                                            mother+"</td><td><button "+
                                            "class=\"btn btn-primary\" onclick=\"displayEdit("+id+")\">Editar</button></td></tr>");
              });

            }
        });
        $("#index").show();
      }

      function displayCreate(){
        $("#create").html("");
        $.ajax({
            url:"persons/persons_create.php",
            type:"GET",
            dataType:"html",
            success:function(response){
              $("#create").html(response);

            }
        });
        $("#index").hide();
        $("#create").show("fold",2000);
        $( "#action" ).removeClass().addClass( "label label-success" );
        $("#action").html("Nueva Persona");

        $.ajax({
          url:"../controllers/persons_index.php",
          type:"POST",
          dataType:"json",
          success:function(response){
            persons = response;

            $.each(persons, function(person) {
              console.log(persons[person].name);
              var name = persons[person].name +" "+ persons[person].last_name +" "+ persons[person].mother_last_name;
              var id = persons[person].id
              $("#father_id").append("<option value="+ id +">"+ name +"</options>");
            });

              $.each(persons, function(person) {
                var name = persons[person].name +" "+ persons[person].last_name +" "+ persons[person].mother_last_name;
                var id = persons[person].id
                $("#mother_id").append("<option value="+ id +">"+ name +"</options>");
              });

          }
        });
      }

      function createPerson(){
        var parametros = {
                "name" : $('#name').val(),
                "last_name" : $('#last_name').val(),
                "mother_last_name": $('#mother_last_name').val(),
                "father_id": $('#father_id').val(),
                "mother_id": $('#mother_id').val()
        };
        $.ajax({
                data:  parametros,
                url:   '../controllers/persons_create.php',
                type:  'post',
                beforeSend: function () {
                        $("#notice").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                  $("#notice").html(response);
                    if(response == "ok"){
                      displayTabla();
                    }
                }
        });

      }

      function displayEdit(id){
        $("#create").html("");
        var parametros = {
                "id" : id
        };
        $.ajax({
            data: parametros,
            url:"persons/persons_edit.php",
            type:"GET",
            dataType:"html",
            success:function(response){
              $("#create").html(response);

            }
        });
        $("#index").hide();
        $("#create").show("fold",2000);
        $( "#action" ).removeClass().addClass( "label label-primary" );
        $("#action").html("Editar Persona");

        $.ajax({
          url:"../controllers/persons_index.php",
          type:"POST",
          dataType:"json",
          success:function(response){
            persons = response;

            $.each(persons, function(person) {
              console.log(persons[person].name);
              var name = persons[person].name +" "+ persons[person].last_name +" "+ persons[person].mother_last_name;
              var id = persons[person].id
              $("#father_id").append("<option value="+ id +">"+ name +"</options>");
            });

              $.each(persons, function(person) {
                var name = persons[person].name +" "+ persons[person].last_name +" "+ persons[person].mother_last_name;
                var id = persons[person].id
                $("#mother_id").append("<option value="+ id +">"+ name +"</options>");
              });

          }
        });
      }





      function editPerson(){
        var parametros = {
                "id" : $('#id').val(),
                "name" : $('#name').val(),
                "last_name" : $('#last_name').val(),
                "mother_last_name": $('#mother_last_name').val(),
                "father_id": $('#father_id').val(),
                "mother_id": $('#mother_id').val()
        };
        $.ajax({
                data:  parametros,
                url:   '../controllers/persons_edit.php',
                type:  'post',
                beforeSend: function () {
                        $("#notice").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                  $("#notice").html(response);
                    if(response == "ok"){
                      displayTabla();
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
