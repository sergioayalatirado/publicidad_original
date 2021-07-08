<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar publicidad v2</title>
    <script src="scripts.php"></script>
</head>
<body>
        <div id="contenido">
            <form action="">
                <label for="">Titulo de publicidad</label><br>
                <input type="text" name="titulo_publicidad" id="titulo_publicidad">
                <br>
                <label for="">Texto</label><br>
                <textarea name="texto" id="texto" cols="30" rows="10"></textarea><br>
                <label for="">Fecha y hora de Inicio | Fecha y hora de expiracion</label><br>
                <input type="datetime-local" name="fecha_hora_inicio" id="fecha_hora_inicio"> <input type="datetime-local" name="fecha_hora_final" id="fecha_hora_final">
                <br><br>
                <label for="">Selecciona la sucursal</label><br>
                <select name="fk_sucursal" id="fk_sucursal">
                        <option value="">Selecciona una sucursal</option>
                </select>
            </form>
        </div>
</body>
</html>