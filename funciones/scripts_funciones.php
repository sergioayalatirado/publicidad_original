<!-- INSERTAR NUEVO REGISTRO -->
<script type="text/javascript">
    $(document).ready(function() { //Prepara una funcion de listo
        $('#btnAgregarnuevo').click(function() { //Prepara la funcion si en el caso que se haga click dentro del boton con id "btnAgregarnuevo" se mandara a llamar la funcion con un nuevo formulario
            datos = $('#frmnuevo').serialize(); //Manda a llamar la funcion del nuevo formulario
            //Manda a llamar un ajax donde por tipo POST, osea envia datos al archivo procesos/agregar.php y valida segun la consulta.
            $.ajax({
                type: "POST",
                data: datos,
                url: "procesos/agregar.php",
                success: function(resultado) {
                    if (resultado == 1) {
                        $('#frmnuevo')[0].reset(); //Sirve para limpiar el formulario con id 'frmnuevo' al momento de insertar un nuevo registro a la base de datos
                        $('#tablaDatatable').load("tabla.php"); //Sirve para que al id 'tablaDatatable' le cargue un elemento, en este caso 'tabla.php'
                        alertify.success("Agregado con exito :D"); //Muestra el aviso de la respuesta si es valida osea 1 aparecera el aviso
                        $('#agregarnuevosdatosmodal').modal('hide');
                    } else {
                        alertify.error("Fallo al agregar :c"); //Muestra un aviso de la respuesta en este caso de que no se inserte un nuevo registro dentro de la base de datos
                    }
                }
            });
        });
        $('#btnActualizar').click(function() {
            datos = $('#frmnuevoU').serialize(); //Manda a llamar la funcion del nuevo formulario
            //Manda a llamar un ajax donde por tipo POST, osea envia datos al archivo procesos/agregar.php y valida segun la consulta.
            $.ajax({
                type: "POST",
                data: datos,
                url: "procesos/actualizar.php",
                success: function(resultado) {
                    if (resultado == 1) {
                        $('#tablaDatatable').load("tabla.php"); //Sirve para que al id 'tablaDatatable' le cargue un elemento, en este caso 'tabla.php'
                        $('#modalEditar').modal('hide');
                        alertify.success("Actualizado con exito :D"); //Muestra el aviso de la respuesta si es valida osea 1 aparecera el aviso
                    } else {
                        alertify.error("Fallo al Actualizar :c"); //Muestra un aviso de la respuesta en este caso de que no se inserte un nuevo registro dentro de la base de datos
                    }
                }
            });

        });
    });
</script>
<!-- SCRIPT PARA AGREGAR LA TABLA DENTRO DEL INDEX -->
<script type="text/javascript">
    //Script para cargar la tabla dentro de la pagina de index
    $(document).ready(function() { //Asi se abre un documento Jquery
        $('#tablaDatatable').load("tabla.php"); //Sirve para que al id 'tablaDatatable' le cargue un elemento, en este caso 'tabla.php'
    })
</script>

<!-- SCRIPT PARA TRAER LOS DATOS DE LA BASE DE DATOS POR ID -->
<script type="text/javascript">
    function agregaFrmActualizar(idjuego) {
        $.ajax({
            type: "POST",
            data: "idjuego=" + idjuego,
            url: "procesos/obtenDatos.php",
            success: function(resultado) {
                datos = jQuery.parseJSON(resultado);
                // ID componente       //Nombre campo base de datos
                $('#idjuego').val(datos['id_juego']);
                $('#nombreU').val(datos['nombre']);
                $('#anioU').val(datos['anio']);
                $('#empresaU').val(datos['empresa']);
            }
        });
    }

    function eliminarDatos(idjuego){
		alertify.confirm('Eliminar un juego', '¿Seguro de eliminar este juego pro :(?', function(){ 

			$.ajax({
				type:"POST",
				data:"idjuego=" + idjuego,
				url:"procesos/eliminar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Eliminado con exito !");
					}else{
						alertify.error("No se pudo eliminar...");
					}
				}
			});

		}
		, function(){

		});
    }
</script>

