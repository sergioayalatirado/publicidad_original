<?php include("conexion.php");
?>
<?php include ("php/actualizar_dispositivo.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Dispositivo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
            <form action="php/actualizar_dispositivo.php" 
            method="post">

            <h4 class="display-4 text-center">Actualizar dispositivo</h4><hr><br>

            <?php if(isset($_GET['error'])){?>    

            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
            <?php } ?> 
            <!-- //PERMITE SACAR EL ERROR QUE SE ENCUENTRE POR VIDA GET -->
            
            <?php if(isset($_GET['success'])){?>    
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['success']; ?>
            </div>
            <?php } ?> 

            <div class="form-group">
                <label for="name">Nombre del dispositivo(Apodo)</label>
                <h6>Ej: Sala de juntas</h6><br>
                <input type="text" 
                class="form-control" 
                id="nombre_dispositivo" 
                name="nombre_dispositivo"
                value="<?=$row['nombre_dispositivo']?>"
                placeholder="Ingresa el nombre o apodo del dispositivo">
            </div>
                <hr>
            <div class="form-group">
                <label for="tipo_dispositivo">Tipo de dispositivo</label><br>
                <label for="">Dispositivo actual:</label>
                <?=$row['tipo_dispositivo']?><br>
                <select name="tipo_dispositivo" id="tipo_dispositivo" class="form-control">
                    <option value="television">Television</option>
                    <option value="computadora">Computadora</option>
                    <option value="smartphone">Smartphone</option>
                </select>
            </div>
            <hr>
            <div class="form-group">
            <label for="tipo_dispositivo">Sucursal</label>
            <select name="fk_sucursal" id="" class="form-control">
                            <option value="">----Seleccione una sucursal----</option>
                                 <?php
                                $query = $mysqli -> query("SELECT * FROM sucursal ");
                                while ($valores = mysqli_fetch_array($query)) {
                                    // echo '<option value="'.$valores['id_sucursal'].'" name="fk_sucursal">'.$valores['nombre_sucursal'].'</option>';
                                    if ($valores["id_sucursal"] == $row["fk_sucursal"] ){
                                        echo "<option value='" . $valores["id_sucursal"] . "' selected='selected'>" . utf8_encode($valores["nombre_sucursal"]) . "</option>";
                                    }
                                    else {
                                        echo "<option value='" . $valores["id_sucursal"] . "'>" . utf8_encode($valores["nombre_sucursal"]) . "</option>";
                                    }
                                }
                                ?>
                    </select>
            </div>
            <hr>
            <div class="form-group">
                Ingresa el User Agent(Identificador de navegador)(No obligatorio) <br>
                <textarea name="device_agent" id="device_agent" cols="30" rows="10" ><?=$row['device_agent']?></textarea>
            </div>
            <input type="text"
                    name="id"
                    value="<?=$row['id_dispositivo']?>"
                    hidden>
            <br>
            <button type="submit" 
                    class="btn btn-primary"
                    name="actualizar">Actualizar dispositivo</button>
            </form>
        </div>
    
</body>
</html>