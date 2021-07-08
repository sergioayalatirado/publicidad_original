<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fecha y hora</title>
</head>
<body>
    <form action="">
        <label for="">Date time local</label><br><br>
        <label for="">Fecha de Inicio</label><br>
            <input type="datetime-local" id="fecha_iniciodtl"><br>
        <label for="">Fecha final</label><br>
            <input type="datetime-local" id="fecha_finaldtl"><br>
            <br>
        <br>
        <label for="">Date y Time</label><br><br>
        <label for="">Fecha Inicio</label><br>
        <input type="date" id="fecha_inicio">
        <input type="time" id="hora_inicio"><br><br>
        <label for="">Fecha Final</label><br>
        <input type="date" id="fecha_final">
        <input type="time" id="hora_final">

        <button type="submit" name="btn_validar" id="btn_validar">Enviar validaciones</button>
    </form>
        <script src="js/validacion_fechas.js"></script>
</body>
</html>