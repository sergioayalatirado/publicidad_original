<!DOCTYPE html>
<html>
<head>
	<title>Petición ajax en jquery-validate</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Es importante que primero importes jQuery y luego los demás frameworks -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>

    <script type="text/javascript">
        $(function() { 
            jQuery("#commentForm").validate({ //inicamos la validación del formulario
                //Cada cosa que configures la debes de terminar con una coma ,
                onfocusout: false,  //Si un objeto no cumple con la validación, tomara el foco 
                rules: { //iniciamos sección de reglas
                    nameO: { //estas seras las reglas para el objeto que en su propiedad name tenga nameO
                        required: true, //indicamos que es requerido que contenga un valor 
                        minlength: 4, //indicamos que debe de tener por lo menos 4 caracteres
                        maxlength: 20 //indicamos que debe de tener maximo 20 caracteres
                    },  
                    email: {
                        required: true,
                        email: true //indicamos que debe de cumplir con la estructura de un email 
                    }
               },
                messages: {//estos seran los mensaje que aparezcan segun el objeto y la reque que espeficiquemos en la sección de reglas 
                    nameO: {
                        required: "Hey vamos, por favor, d&aacute;nos tu nombre",
                        minlength: $.format("Necesitamos por lo menos {0} caracteres"),
                        maxlength: $.format("{0} caracteres son demasiados!")
                    },
                    email: {
                        required: "Hey vamos, por favor, d&aacute;nos tu email",
                        email: "No cumple con la estructura de un email."
                    }
               },
               submitHandler: function(form){ //si todos los controles cumplen con las validaciones, se ejecuta este codigo
                    $("div#formError").addClass("hidden"); //para ocultar el mensaje, le agregamos la clase de Bootstrap 3
                    jQuery.ajax({ 
                        url: 'send.php',  //pagina que recibirá la solicitud
                        type: 'POST',     //petodo de envío de la información
                        dataType: 'html', //tipo de respuesta del servidor
                        data: {param1: 'Texto enviado por el m&eacute;todo POST'}, //parametros (valores) en formato llaver:valor, que se enviaran con la solicitud
                      complete: function(xhr, textStatus) {
                        //se llama cuando se recibe la respuesta (no importa si es error o exito)
                        alert("La respuesta regreso");
                      },
                      success: function(data, textStatus, xhr) {
                        //se llama cuando tiene éxito la respuesta
                        alert(data);
                        alert("La respuesta fue exitosa");
                      },
                      error: function(xhr, textStatus, errorThrown) {
                        //called when there is an error
                         alert("La respuesta fue con error");
                      }
                    });
               },
               invalidHandler: function(event, validator) { //si por lo menos uno control no cumplen con las validaciones, se ejecuta este codigo
                    var errors = validator.numberOfInvalids(); // número de errores encontrados al validar el formulario
                    if (errors) { //si errors = 0 no se ejecuta el if, de ser mayor que cero se ejecuta 
                        //la linea de abajo es un if ternario 
                        var message = errors == 1 ? ' Error: Te perdiste 1 campo. Ha sido destacado' : ' Error: Te perdiste '+ errors +' campos. Se han destacado';
                        $("div#formError span#Mensaje").html(message); //agregamos el valor de message a objeto seleccionado
                        $("div#formError").removeClass("hidden"); //para que se muestre el mensaje, le quitamos la clase que lo oculta
                    }
                },
                highlight: function(element, errorClass) {//los objetos que no cumplan con la validación parpadearan 
                    $(element).fadeOut(function() {
                        $(element).fadeIn();
                    });
                },
                errorElement: "div", //indicamos en qué tipo de objeto DOM se agregarán las alertas. El valor por default es "label"
                errorClass: "alert alert-danger", //indicamos la clase que se agregara a las alertas. El valor por default es "error"
            });
        });
    </script>
    <style type="text/css">
        label.error { float: none; color: red; padding-left: .5em; vertical-align: middle; font-size: 12px; }
    </style>
</head>
<body>
	<div class="container-fluid">
        <form id="commentForm" method="get" action="">
            <div class="form-group">
                <legend>Por favor ingrese su nombre, dirección de correo electrónico y un comentario</legend>
            </div>
            <div class="form-group">
                <label for="cname">Nombre (requerido, al menos 2 caracteres)</label>
                <input id="cname" name="nameO" minlength="2" type="text"   class="form-control">   
            </div>
            <div class="form-group">  
                <label for="cemail">E-Mail (requerido)</label>
                <input id="cemail" type="email" name="email"    email class="form-control">
            </div>
            <div class="form-group">
                <label for="curl">URL (opcional)</label>
                <input id="curl" type="url" name="url" class="form-control">
            </div>
            <div class="form-group">
                <label for="ccomment">Comentario (requerido)</label>
                <textarea id="ccomment" name="message"   class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input   type="submit" value="Enviar" class="btn btn-default">
                <div id="formError" class="alert alert-danger hidden" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span id="Mensaje">Error: </span>
                </div>
                <div id="summary"></div><!--Espacio donde se colocara un mensaje general para el usuario-->
            </div>
        </form>
    </div>
</body>
</html>