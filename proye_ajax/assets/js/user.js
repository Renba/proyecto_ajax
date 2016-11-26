$(document).ready(function(){
  displayTabla();
});

function displayTabla(){
  $("#create").html("");
  $("#body").html("");
  $( "#action" ).removeClass().addClass( "label label-default" );
  $("#action").html("Lista de Usuarios");

  $.ajax({
      url:"../controllers/user/user_index.php",
      type:"POST",
      dataType:"json",
      success:function(response){
        users = response;

        $.each(users, function(user) {
          var name = users[user].name;
          var email = users[user].email;
          var id = users[user].id;
          $("#body").append("<tr><td>"+ name +"</td><td>"+
                                      email +"</td>"+
                                      "<td><button "+
                                      "class=\"btn btn-primary\" onclick=\"displayEdit("+id+")\">Editar</button>"+
                                      "<button class=\"btn btn-danger\" onclick=\"deleteUser("+id+")\">Eliminar</button>"+
                                      "</td></tr>");
        });

      }
  });
  $("#index").show();
}

function displayCreate(){
  $("#create").html("");
  $.ajax({
      url:"user/user_create.php",
      type:"GET",
      dataType:"html",
      success:function(response){
        $("#create").html(response);

      }
  });
  $("#index").hide();
  $("#create").show("fold",2000);
  $( "#action" ).removeClass().addClass( "label label-success" );
  $("#action").html("Nuevo Usuario");

}

function createUser(){
  var password = $('#password').val();
  var confirm_password= $('#confirm-password').val();
  if(password === confirm_password && password != ""){

    var parametros = {
      "name" : $('#name').val(),
      "email" : $('#email').val(),
      "password": $('#password').val(),
    };
    $.ajax({
      data:  parametros,
      url:   '../controllers/user/user_create.php',
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
  }else{
    alert("No coincide la contraseña");
  }

}

function displayEdit(id){
  $("#create").html("");
  var parametros = {
          "id" : id
  };
  $.ajax({
      data: parametros,
      url:"user/user_edit.php",
      type:"GET",
      dataType:"html",
      success:function(response){
        $("#create").html(response);

      }
  });
  $("#index").hide();
  $("#create").show("fold",2000);
  $( "#action" ).removeClass().addClass( "label label-primary" );
  $("#action").html("Editar Usuario");
}

function editUser(){
  var password = $('#password').val();
  var confirm_password= $('#confirm-password').val();
  if(password === confirm_password && password != ""){

    var parametros = {
            "id" : $('#id').val(),
            "name" : $('#name').val(),
            "email" : $('#email').val(),
            "password": $('#password').val(),
    };
    $.ajax({
            data:  parametros,
            url:   '../controllers/user/user_update.php',
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

  }else{
    alert("No coincide la contraseña");
  }

}

function deleteUser(id){
  if (window.confirm('Seguro que quieres eliminar al usuario seleccionado?'))
  {
    var parametros = {
      "id" : id,
    };
    $.ajax({
            data:  parametros,
            url:   '../controllers/user/user_delete.php',
            type:  'post',
            success:  function (response) {
                if(response == "ok"){
                  displayTabla();
                }else{
                  alert(response);
                }
            }
    });

  }
}
