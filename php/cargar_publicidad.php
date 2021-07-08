<?php
include_once '../conexion.php';

//TODO SIRVE CORRECTAMENTE , SE REVISO EL (21-06-2021)
if (isset($_POST)) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$titulo = $_POST['titulo_publicidad'];
$texto = $_POST['texto'];


//Nuevas variables de fechas y horas 07/07/2021
$fecha_inicio = $_POST['fecha_inicio'];
$hora_inicio = $_POST['hora_inicio'];

$fecha_final = $_POST['fecha_final'];
$hora_final = $_POST['hora_final'];

// $fecha_hora_final = $_POST['fecha_hora_final'];
$fk_sucursal = $_POST['fk_sucursal'];
$fk_dispositivo = $_POST['fk_dispositivo'];
$archivo = $_FILES['archivo']['name'];
$tipo = $_FILES['archivo']['type'];
$archivo_tamano = $_FILES['archivo']['size'];

//Fecha y hora 
$fecha_hora_inicio = $fecha_inicio . " " . $hora_inicio;
$fecha_hora_final = $fecha_final . " " . $hora_final;

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";






// var_dump($archivo_tamano);
//Si no hay algun archivo cargado da error de int(0);
//Si no hay algun archivo el tipo sera String(0);

$datos_publicidad = 'titulo=' . $titulo . '&texto=' . $texto . '&fhi=' . $fecha_hora_inicio . '&fhf=' . $fecha_hora_final . '&fks=' . $fk_sucursal . '&fkd=' . $fk_dispositivo;

// var_dump($datos_publicidad);

$sql = "SELECT * FROM publicidad WHERE ( fecha_hora_inicio BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_final') OR
( fecha_hora_final  BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_final')";

$resultado1 = mysqli_query($mysqli, $sql);
$resultado_rows = mysqli_num_rows($resultado1);

echo "<pre>";
var_dump($resultado1);
echo "</pre>";

// if($resultado_rows > 0){
//     echo "Se encontraron ".$resultado_rows." registros.";
//     // $consulta1 = mysqli_fetch_assoc($resultado1);
//     while($fila = mysqli_fetch_array($resultado1)){
//     echo "<pre>";
//     var_dump($fila['id_publicidad'], $fila['titulo_publicidad'], $fila['fecha_hora_inicio']);
//     echo "</pre>";
//     }
// }else{
//     echo "No se encuentra ningun registro dentro de la base de datos";
// }

// if (empty($titulo)) {
//     header("Location: ../cargar_publicidad.php?error=Titulo es requerido&$datos_publicidad");
// } else if ($fecha_hora_inicio > $fecha_hora_final) {
//     header("Location: ../cargar_publicidad.php?error=Fecha hora final menor a la inicial, ingresa una fecha valida nuevamente.&$datos_publicidad");
// } else if ($fecha_hora_inicio == $fecha_hora_final) {
//     header("Location: ../cargar_publicidad.php?error=Las fechas son identicas, por favor verifica las fechas.&$datos_publicidad");
// } else if (empty($fecha_hora_inicio)) {
//     header("Location: ../cargar_publicidad.php?error=Fecha Hora Inicial es requerida&$datos_publicidad");
// } else if (empty($fecha_hora_final)) {
//     header("Location: ../cargar_publicidad.php?error=Fecha Hora Final es requerido&$datos_publicidad");
// } else if (empty($fk_sucursal)) {
//     header("Location: ../cargar_publicidad.php?error=Sucursal es requerida&$datos_publicidad");
// } else if (empty($fk_dispositivo)) {
//     header("Location: ../cargar_publicidad.php?error=Dispositivo es requerido&$datos_publicidad");
// } else if ($_FILES['archivo']['name'] != null) { //ESTA LINEA IDENTIFICA QUE EL FILE TENGA NOMBRE OSEA QUE NO ESTE VACIO Y TAMBIEN QUE CONTENGA TEXTO


//     // echo "Hay archivo prro";
//     if ($tipo == 'image/jpg' || $tipo == 'image/png' || $tipo == 'image/jpeg' || $tipo == 'image/gif') {
//         // echo "Es una imagen prro";
//         $archivo = $_FILES["archivo"]["name"];
//         $ruta = $_FILES['archivo']['tmp_name'];
//         $archivo_tamano = $_FILES['archivo']['size'];
//         $hex = bin2hex(random_bytes(10));
//         $destino = "multimedia/imagen" . $archivo;
//         // $extension_archivo = str_replace("image/","",$ruta);
//         echo $destino;
//         // copy($ruta,$destino);
//         // $extension_archivo = str_replace("image/","",$tipo);
//         // $tipo_archivo= "imagen";


//         // $sql = $sql = "INSERT INTO publicidad(titulo_publicidad,url_archivo,extension_archivo,tipo_archivo,fecha_hora_inicio,fecha_hora_final,estatus,texto, fk_sucursal,fk_dispositivo)
//         //     VALUES('$titulo','$destino','$extension_archivo','$tipo_archivo','$fecha_hora_inicio','$fecha_hora_final',1,'$texto','$fk_sucursal','$fk_dispositivo')";

//         // $resultado = mysqli_query($mysqli,$sql);

//         // if($resultado > 0){
//         //         header("Location: ../cargar_publicidad.php?success=Guardado exitosamente!!");
//         //         }else{
//         //             header("Location: ../cargar_publicidad.php?error=Ocurrio un error&$datos_publicidad");
//         //         }

//     } else if ($tipo == 'video/mp4' || $tipo == 'video/avi' || $tipo == 'video/flv' || $tipo == 'video/mov' || $tipo == 'video/wmv' || $tipo == 'video/H.264' || $tipo == 'video/XVID' || $tipo == 'video/RM') {
//         echo "Hay un video prro!!";
//         $archivo = $_FILES["archivo"]["name"];
//         $ruta = $_FILES["archivo"]["tmp_name"];
//         $destino = "multimedia/video" . $archivo;
//         copy($ruta, $destino);
//         $extension_archivo = str_replace("video/", "", $tipo);
//         $tipo_archivo = "video";

//         $sql = $sql = "INSERT INTO publicidad(titulo_publicidad,url_archivo,extension_archivo,tipo_archivo,fecha_hora_inicio,fecha_hora_final,estatus,texto, fk_sucursal,fk_dispositivo)
//         VALUES('$titulo','$destino','$extension_archivo','$tipo_archivo','$fecha_hora_inicio','$fecha_hora_final',1,'$texto','$fk_sucursal','$fk_dispositivo')";

//         $resultado = mysqli_query($mysqli, $sql);

//         if ($resultado > 0) {
//             header("Location: ../cargar_publicidad.php?success=Guardado exitosamente!!");
//         } else {
//             header("Location: ../cargar_publicidad.php?error=Ocurrio un error&$datos_publicidad");
//         }
//     } else if ($tipo == 'audio/mpeg' || $tipo == 'audio/mp3' || $tipo == 'audio/wav' || $tipo == 'audio/midi' || $tipo == 'audio/aac' || $tipo == 'audio/flac' || $tipo == 'audio/AIFF') {
//         echo "Hay un audio prro!!";
//         $archivo = $_FILES["archivo"]["name"];
//         $ruta = $_FILES["archivo"]["tmp_name"];
//         $destino = "multimedia/audio" . $archivo;
//         copy($ruta, $destino);
//         $extension_archivo = str_replace("audio/", "", $tipo);
//         $tipo_archivo = "audio";

//         $sql = $sql = "INSERT INTO publicidad(titulo_publicidad,url_archivo,extension_archivo,tipo_archivo,fecha_hora_inicio,fecha_hora_final,estatus,texto, fk_sucursal,fk_dispositivo)
//         VALUES('$titulo','$destino','$extension_archivo','$tipo_archivo','$fecha_hora_inicio','$fecha_hora_final',1,'$texto','$fk_sucursal','$fk_dispositivo')";

//         $resultado = mysqli_query($mysqli, $sql);

//         if ($resultado > 0) {
//             header("Location: ../cargar_publicidad.php?success=Guardado exitosamente!!");
//         } else {
//             header("Location: ../cargar_publicidad.php?error=Ocurrio un error&$datos_publicidad");
//         }
//     } else {
//         header("Location: ../cargar_publicidad.php?error=Formato no valido");
//     }
// } else {
//     include '../conexion.php';
//     // echo "Es un texto";
//     $tipo_archivo = "texto";
//     $extension_archivo = "txt";
//     $texto = $_POST['texto'];

//     $str = $texto;
//     $txtlenght = strlen($str);

//     if ($txtlenght < 5) {
//         header("Location: ../cargar_publicidad.php?error=El texto tiene que ser mayor a 5 caracteres!!&$datos_publicidad");
//     } else {
//         header("Location: ../cargar_publicidad.php?error=Tu texto se ha guardado exitosamente!!");
//         $sql = "INSERT INTO publicidad(titulo_publicidad,url_archivo,extension_archivo,tipo_archivo,fecha_hora_inicio,fecha_hora_final,estatus,texto, fk_sucursal,fk_dispositivo)
//         VALUES('$titulo','','$extension_archivo','$tipo_archivo','$fecha_hora_inicio','$fecha_hora_final',1,'$texto','$fk_sucursal','$fk_dispositivo')";
//         $resultado = mysqli_query($mysqli, $sql);

//         if ($resultado > 0) {
//             header("Location: ../cargar_publicidad.php?success=Se ha guardado el texto exitosamente!!");
//         } else {
//             header("Location: ../publicy_0.php?error=Ocurrio un Error&$datos_subida");
//         }
//     }
// }
