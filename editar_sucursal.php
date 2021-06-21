<?php include("conexion.php");
?>
<?php include ("php/actualizar_sucursal.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Sucursal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
            <form action="php/actualizar_sucursal.php" 
            method="post">

            <h4 class="display-4 text-center">Actualizar sucursal</h4><hr><br>

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
                <label for="name">Nombre de sucursal</label>
                <input type="text" 
                class="form-control" 
                id="sucursal" 
                name="sucursal"
                value="<?=$row['nombre_sucursal']?>"
                placeholder="Ingresa el nombre o identificador de la sucursal">
            </div>

            <div class="form-group"><br>
                <label for="tipo_sucursal" >Tipo de sucursal</label><br>
                <label for="">Tipo de sucursal actual: <?=$row['tipo_sucursal']?></label>
                <select name="tipo_sucursal" id="tipo_sucursal" class="form-control">
                    <option value="matriz">Matriz</option>
                    <option value="normal">Normal</option>
                </select>
            </div>
            <input type="text"
                    name="id"
                    value="<?=$row['id_sucursal']?>"
                    hidden>
            <br>
            <button type="submit" 
                    class="btn btn-primary"
                    name="actualizar">Actualizar sucursal</button>
                    <a href="lista_sucursales.php"  class=" btn btn-secondary" name=>Lista de sucursales</a>
            </form>
        </div>
    
</body>
</html>