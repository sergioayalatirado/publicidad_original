<?php
include_once '../conexion.php';
sleep(3);
$titulo = $_POST['titulo_publicidad'];
$texto = $_POST['texto'];
$fecha_inicio = $_POST['fecha_inicio'];
$hora_inicio = $_POST['hora_inicio'];
$fecha_final = $_POST['fecha_final'];
$hora_final = $_POST['hora_final'];
$fk_sucursal = $_POST['fk_sucursal'];
$fk_dispositivo = $_POST['fk_dispositivo'];
$archivo = $_FILES['archivo'];

// Archivo 
// $archivo = $_FILES['archivo']['name'];
// $tipo = $_FILES['archivo']['type'];
// $archivo_tamano = $_FILES['archivo']['size'];

//Anadiendole 1 minuto al tiempo 
$parsedHI = strtotime($hora_inicio);
$parsedHF = strtotime($hora_final);

//Añadiendole y restandole a la hora recibida
$parsedHIP = ($parsedHI + 60);
$parsedHFM = ($parsedHF - 60);

//Conviertiendo la hora y minutos recibidos a hora valida (Hora y minutos)
$inicioHoraMMA = date("H:i", $parsedHIP);
$finHoraMME = date("H:i", $parsedHFM);

//Fecha y hora completas SOLO PARA REALIZAR LAS CONSULTAS, YA LA HORA DE INICIO TIENE UN MINUTO MAS Y LA FINAL TIENE UN MINUTO MENOS
$fecha_hora_inicioR = $fecha_inicio . " " . $inicioHoraMMA;
$fecha_hora_finalR = $fecha_final . " " . $finHoraMME;

$fech_hora_inicio = $fecha_inicio . " " . $inicioHoraMMA;
$fech_hora_final = $fecha_final . " " . $finHoraMME;

$sql = "SELECT * FROM publicidad WHERE ( fecha_hora_inicio BETWEEN '$fecha_hora_inicioR' AND '$fecha_hora_finalR') OR
( fecha_hora_final  BETWEEN '$fecha_hora_inicioR' AND '$fecha_hora_finalR')";

$verificar_horario = mysqli_query($mysqli, $sql);
$resultado_rows = mysqli_num_rows($verificar_horario);

if ($resultado_rows > 0) {

    $lista = "<ul>"; //Ul lista
    echo "El registro de la publicidad en curso mostro lo siguiente.<br><br>";
    echo "Se encontraron " . $resultado_rows . " publicidades dentro del horario seleccionado.<br><br>";
    while ($fila = mysqli_fetch_array($verificar_horario)) {
        $titulo_publicidad = $fila["titulo_publicidad"];
        $fecha_hora_inicio = $fila["fecha_hora_inicio"];
        $fecha_hora_final = $fila["fecha_hora_final"];
        $lista .= "<li>
        <b>TITULO DE LA PUBLICIDAD</b><br> $titulo_publicidad<br>
        <b>FECHA DE INICIO Y HORA DE INICIO</b><br> $fecha_hora_inicio<br> 
        <b>FECHA DE VENCIMIENTO Y HORA DE VENCIMIENTO</b><br> $fecha_hora_final</li>
        <br>
        ";
    }
    $lista .= "</ul>";
    echo $lista . "
   $fecha_hora_inicioR $fecha_hora_finalR
    <b>NOTA</b>
    <br><b>Considere elegir una fecha y hora distinta, o un horario libre para guardar su publicidad.</b>";
} else {
     echo "LA FECHA Y EL HORARIO SE ENCUENTRA LIBRE.<br>Ha pasado las validaciones del horario y fecha.";

}































    // if(empty($titulo)){
    //     echo "El titulo esta vacio es muy corto.";
    // }else if(empty($fecha_inicio)){
    //     echo "La fecha y hora de inicio estan vacias.";
    // }else if(empty($fecha_final)){
    //     echo "La fecha y hora de vencimiento estan vacias.";
    // }else if($fecha_inicio == $fecha_final){
    //     echo "La fecha de inicio y la fecha final son iguales.";
    // }else if($fecha_hora_inicio > $fecha_hora_final){
    //     echo "La fecha y hora de inicio son mayores a la fecha y hora final";
    // }else if($fecha_hora_inicio == $fecha_hora_final){
    //     echo "La fecha, hora de inicio son iguales a la fecha, hora de vencimiento.";
    // }else if(empty($hora_inicio)){
    //     echo "La hora de inicio esta vacia.";
    // }else if(empty($hora_final)){
    //     echo "La hora de vencimiento esta vacia";
    // }else if(empty($fk_sucursal)){
    //     echo "Selecciona una sucursal.";
    // }else if(empty($fk_dispositivo)){
    //     echo "Selecciona un dispositivo.";
    // }