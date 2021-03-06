<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Sucursal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <form action="php/agregar_sucursal.php" method="POST" id="form-agregarsucursal">

            <h4 class="display-4 text-center">Registrar nueva sucursal</h4>
            <hr><br>

            <?php if (isset($_GET['error'])) { ?>

                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>
            <!-- //PERMITE SACAR EL ERROR QUE SE ENCUENTRE POR VIDA GET -->

            <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_GET['success']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="name">Nombre de la Sucursal</label>
                <input type="text" class="form-control" id="sucursal" name="sucursal" value="" placeholder="Ingresa el nombre o identificador de la sucursal" onkeypress="return soloLetras(event)" onpaste="return false;">
            </div>
            <i id="mensaje_sucursal" style="color:red;" class="text-center"></i>

            <div class="form-group"><br>
                <label for="tipo_sucursal">Tipo de sucursal</label><br>
                <select name="tipo_sucursal" id="tipo_sucursal" class="form-control">
                    <option value="">---- Selecciona un tipo de sucursal ----</option>
                    <option value="Matriz">Matriz</option>
                    <option value="Normal">Normal</option>
                </select>
            </div>

            <br>
            <button type="submit" class="btn btn-primary" id="btn_esucursal" name='crear'>Crear</button>
            <a href="lista_sucursales.php" class=" btn btn-secondary">Mostrar sucursales</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
    <script src="js/agregar_sucursal.js"></script>

</body>

</html>