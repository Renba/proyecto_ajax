$(document).ready(function(){
  displayIndicators();
});

function displayIndicators(){
  $.ajax({
      url:"indicator/indicators_index.php",
      type:"GET",
      dataType:"html",
      success:function(response){
        $("#action").html(response);
      }
  });
}

function displayCreate(){
  option_number = 2;

  $("#action").html("");
  $.ajax({
      url:"indicator/indicator_create.php",
      type:"GET",
      dataType:"html",
      success:function(response){
        $("#action").html(response);
      }
  });
}

  function createIndicator(){
    $.post('../controllers/indicator/indicator_create.php', $('#form').serialize(), function(response){
       $("#notice").html(response);
       if(response == 'ok'){
         displayIndicators();
       }
    });
  }

  var option_number = 2;

  function addOption(){
    option_number += 1;
    $( "#indicator-options" ).append( "<div class=\"form-group\">"+
      "<label for=\"formGroupExampleInput\">Opcion "+ option_number+"</label>"+
      "<input type=\"text\" class=\"form-control\"  name=\"options[]\" placeholder=\"Nombre\" value=\"Opción "+
      option_number +"\" required></div>" );

  }

  function removeOption() {
    if(option_number > 2){
      $("#indicator-options .form-group").last().remove();
      option_number -= 1;
    }
  }



function displayIndicator(id){
  var parametros = {
    "id" : id
  };
  $.ajax({
      data: parametros,
      url:"indicator/indicator_view.php",
      type:"GET",
      dataType:"html",
      success:function(response){
        $("#action").html(response);
      }
  });
}

function displayEdit(id){
  var parametros = {
    "id" : id
  };
  $.ajax({
      data: parametros,
      url:"indicator/indicator_edit.php",
      type:"GET",
      dataType:"html",
      success:function(response){
        $("#action").html(response);
      }
  });
}

function editIndicator(){
  $.post('../controllers/indicator/indicator_update.php', $('#form').serialize(), function(response){
     $("#notice").html(response);
     if(response == 'ok'){
       displayIndicators();
     }
  });
}

function deleteIndicator(id){
  if (window.confirm('Seguro que quieres eliminar al indicador seleccionado?')){
    var parametros = {
      "id" : id,
    };
    $.ajax({
            data:  parametros,
            url:   '../controllers/indicator/indicator_delete.php',
            type:  'post',
            success:  function (response) {
                if(response == "ok"){
                  displayIndicators();
                }else{
                  alert(response);
                }
            }
    });

  }
}


function addOptioninEdit(indicator_id){
  var parametros = {
    "indicator_id" : indicator_id,
  };

  $.ajax({
      data: parametros,
      url:"indicator/indicator_option.php",
      type:"GET",
      dataType:"html",
      success:function(response){
        $("#indicator-options").append(response);
      }
  });

  $("#button-add").hide();
}

function saveOption(option_id, indicator_id){
  var parametros;
  var option_value;
  var url_action;
  if(option_id == -1){
    url_action = '../controllers/indicator_option/indicator_option_save.php';
    option_value = $('#form-1 input[name="option_name"]').val();
    parametros = {
      "option_name" : option_value,
      "indicator_id" : indicator_id,
    };
  }else{
    url_action ='../controllers/indicator_option/indicator_option_update.php';
    option_value = $('#form'+option_id+' input[name="option_name"]').val();
    parametros = {
      "option_id" : option_id,
      "option_name" : option_value,
      "indicator_id" : indicator_id,
    };
  }
  $.ajax({
          data:  parametros,
          url:   url_action,
          type:  'POST',
          success:  function (response) {
              if(response == "ok"){
                displayEdit(indicator_id);
                alert("Indicador correctamente actulizado");
              }
          }
  });

}

function deleteOption(option_id, indicator_id) {
  var parametros = {
    "option_id": option_id,
  };
  $.ajax({
          data:  parametros,
          url:   '../controllers/indicator_option/indicator_option_delete.php',
          type:  'POST',
          success:  function (response) {
              if(response == "ok"){
                displayEdit(indicator_id);
                alert("Opción de indicador correctamente eliminado.");
              }
          }
  });
}
