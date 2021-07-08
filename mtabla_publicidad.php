<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <?php require_once "scripts.php"; ?>
    <?php require "funciones/scripts_funciones.php";?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-left">
                    <!-- La propiedad center de la clase de la div sirve para centrar los elementos, en este caso se utilizara el left -->
                    <div class="card-header">
                            Publicidad almacenada
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">Agregar nuevo <span class="fa fa-plus-circle"></span></button>
                        <hr>
                        <div id="tablaDatatable"></div> <!-- Sirve para mostrarnos el documento php de la tabla-->
                    </div>
                    <div class="card-footer text-muted">
                        By Sergio Ayala
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Agregar-->
    <div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agrega nueva publicidad</h5>
                    <button type="button" class="fa fa-window-close btn" data-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmnuevo">
                        <label>Nombre</label>
                        <input type="text" class="form-control input-sm" id="nombre" name="nombre">
                        <label>Año</label>
                        <input type="text" class="form-control input-sm" id="anio" name="anio">
                        <label>Empresa</label>
                        <input type="text" class="form-control input-sm" id="empresa" name="empresa">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnAgregarnuevo">Agregar nuevo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar y Actualizar -->
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar juego</h5>
                    <button type="button" class="fa fa-window-close btn" data-dismiss="modal" aria-label="close"></button>
                </div>

                <div class="modal-body">
                    <form id="frmnuevoU">
                        <input type="text" hidden="" name="idjuego" id="idjuego">
                        <label>Nombre</label>
                        <input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
                        <label>Año</label>
                        <input type="text" class="form-control input-sm" id="anioU" name="anioU">
                        <label>Empresa</label>
                        <input type="text" class="form-control input-sm" id="empresaU" name="empresaU">
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
                </div>
            </div>
        </div>
    </div>


</body>
</html>