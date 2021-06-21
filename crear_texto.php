<?php 
    include "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir publicidad</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css?x=0">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/js/popper.min.js">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.bundle.js"> -->
</head>
<body>



        <div class="container">
            <form action="php/subir_texto.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <a href="index.php">Inicio</a>
                </div>
                <div class="link-right">
                            <a href="publicy_0.php">Subir multimedia</a>
                </div>
                <h4 class="display-4 text-center"> Subir nueva publicidad</h4> <hr><br>

                <?php if(isset($_GET['error'])){?>

                <div class="alert alert-danger" role="alert" align="center">
                    <?php echo $_GET['error']; ?>
                </div>
                <?php }?>

                <?php if(isset($_GET['success'])){?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_GET['success']; ?>
                    </div>
                <?php }?> 

                

                <div class="form-group">
                   <label for="titulo" class="display-6 text-center"> Título de la publicidad</label>
                    <br><br><input type="text" class="form-control" id="titulo" name="titulo_publicidad" value="" required>
                    <br>
                </div>
        
                <div class="form-group">
                    <label for="texto_descripcion" name="texto" class="display-6 text text-center ">Texto</label><br><br>
                    <textarea name="texto" id="" cols="30" rows="10" class="form-control" required></textarea>
                    <br>
                 </div>
                
                 <div class="form-group">
                    <label for="fhl" name="fecha_hora_inicio" class="text-center display-6">Fecha y Hora de Inicio</label><br>
                    <br><input type="datetime-local" size="5" class="form-control" required name="fecha_hora_inicio"><br><br>
                </div>

                <div class="form-group">
                    <label for="" class="display-6 text-center">Fecha y hora de término</label><br>
                    <br><input type="datetime-local" name="fecha_hora_final" class="form-control" required> <br>
                    <hr>

                <div class="form-group">
                    <label for="" class="display-6 text-center">Selecciona una sucursal</label><br>
                    <select name="fk_sucursal" id="" class="form-control">
                            <option value="">----Seleccione una sucursal----</option>
                                 <?php
                                $query = $mysqli -> query("SELECT * FROM sucursal");
                                while ($valores = mysqli_fetch_array($query)) {
                                    echo '<option value="'.$valores['id_sucursal'].'" name="fk_sucursal">'.$valores['nombre_sucursal'].' ('.$valores['tipo_sucursal'].')'.'</option>';
                                }
                                ?>
                    </select>
                                <hr>

                    <label for="" class="display-6 text-center">Dispositivos disponibles</label><br>
                    <select name="fk_dispositivo" id="" class="form-control">
                            <option value="">----Seleccione un dispositivo----</option>
                            <?php
                                $query = $mysqli -> query("SELECT * FROM dispositivo");
                                while ($valores = mysqli_fetch_array($query)) {
                                    echo '<option value="'.$valores['id_dispositivo'].'" name="fk_dispositivo">'.$valores['tipo_dispositivo'].' ('.$valores['nombre_dispositivo'].')'.'</option>';
                                }
                                ?>
                    </select>
                    <hr>
                </div>
                <button type="submit" class="btn btn-primary"
                name="crear" text-center>Crear nueva publicidad</button>
            </form>
        </div>
</body>


</html>