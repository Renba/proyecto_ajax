$(document).ready(function(){
  displayTabla();
});

function displayTabla(){
  $("#create").html("");
  $("#body").html("");
  $( "#action" ).removeClass().addClass( "label label-default" );
  $("#action").html("Lista de Personas");

  $.ajax({
      url:"../controllers/person/persons_index.php",
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
                                      "class=\"btn btn-primary\" onclick=\"displayEdit("+id+")\">Editar</button>"+
                                      "<button class=\"btn btn-info\" onclick=\"evaluatePerson("+id+")\" >Evaluar Persona</button>"+
                                      "<button class=\"btn btn-danger\" onclick=\"deletePerson("+id+")\">Eliminar</button>"+
                                      "</td></tr>");
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
    url:"../controllers/person/persons_index.php",
    type:"POST",
    dataType:"json",
    success:function(response){
      persons = response;

      $.each(persons, function(person) {
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
          url:   '../controllers/person/persons_create.php',
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
    url:"../controllers/person/persons_index.php",
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
          url:   '../controllers/person/persons_update.php',
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

function deletePerson(id){
  if (window.confirm('Seguro que quieres eliminar a la personas seleccionada?'))
  {
    var parametros = {
      "id" : id,
    };
    $.ajax({
            data:  parametros,
            url:   '../controllers/person/persons_delete.php',
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

function evaluatePerson(id){
  $("#create").html("");
  $("#index").hide();
  var parametros = {
    "id" : id,
  };

  $.ajax({
      data:parametros,
      url:"evaluation/evaluation_index.php",
      type:"GET",
      dataType:"html",
      success:function(response){
        $("#create").html(response);

      }
  });


}
