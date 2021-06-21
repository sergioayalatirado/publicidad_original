<?php

//TODO SIRVE CORRECTAMENTE , SE REVISO EL (21-06-2021)
if(isset($_POST['crear'])){
include '../conexion.php';
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$titulo = $_POST['titulo_publicidad'];
$texto = $_POST['texto'];
$fecha_hora_inicio = $_POST['fecha_hora_inicio'];
$fecha_hora_final = $_POST['fecha_hora_final'];
$fk_sucursal = $_POST['fk_sucursal'];
$fk_dispositivo = $_POST['fk_dispositivo'];
$archivo = $_FILES['archivo']['name'];
$tipo = $_FILES['archivo']['type'];
$archivo_tamano = $_FILES['archivo']['size'];

var_dump($archivo_tamano);
//Si no hay algun archivo cargado da error de int(0);
//Si no hay algun archivo el tipo sera String(0);

$datos_publicidad= 'titulo='.$titulo.'&texto='.$texto.'&fhi='.$fecha_hora_inicio.'&fhf='.$fecha_hora_final.'&fks='.$fk_sucursal.'&fkd'.$fk_dispositivo;

if(empty($titulo)){
    header("Location: ../cargar_publicidad.php?error=Titulo es requerido&$datos_publicidad");
}else if($fecha_hora_inicio > $fecha_hora_final){
    header("Location: ../cargar_publicidad.php?error=Fecha hora final menor a la inicial, ingresa una fecha valida nuevamente.&$datos_publicidad");
}else if($fecha_hora_inicio == $fecha_hora_final){
    header("Location: ../cargar_publicidad.php?error=Las fechas son identicas, por favor verifica las fechas.&$datos_publicidad");
}else if(empty($fecha_hora_inicio)){
    header("Location: ../cargar_publicidad.php?error=Fecha Hora Inicial es requerida&$datos_publicidad");
}else if(empty($fecha_hora_final)){
    header("Location: ../cargar_publicidad.php?error=Fecha Hora Final es requerido&$datos_publicidad");
}else if(empty($fk_sucursal)){
    header("Location: ../cargar_publicidad.php?error=Sucursal es requerida&$datos_publicidad");
}else if (empty($fk_dispositivo)){
    header("Location: ../cargar_publicidad.php?error=Dispositivo es requerido&$datos_publicidad");
}else if ($_FILES['archivo']['name'] !=null){//ESTA LINEA IDENTIFICA QUE EL FILE TENGA NOMBRE OSEA QUE NO ESTE VACIO Y TAMBIEN QUE CONTENGA TEXTO

    echo "Hay archivo prro";
    if($tipo=='image/jpg' || $tipo=='image/png' || $tipo=='image/jpeg' || $tipo=='image/gif'){
    echo "Es una imagen prro";
    $archivo = $_FILES["archivo"]["name"];
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = "multimedia/".$archivo;
    copy($ruta,$destino);
    $extension_archivo = str_replace("image/","",$tipo);
    $tipo_archivo= "imagen";

    $sql = $sql = "INSERT INTO publicidad(titulo_publicidad,url_archivo,extension_archivo,tipo_archivo,fecha_hora_inicio,fecha_hora_final,estatus,texto, fk_sucursal,fk_dispositivo)
        VALUES('$titulo','$destino','$extension_archivo','$tipo_archivo','$fecha_hora_inicio','$fecha_hora_final',1,'$texto','$fk_sucursal','$fk_dispositivo')";

    $resultado = mysqli_query($mysqli,$sql);
    
            if($resultado > 0){
                header("Location: ../cargar_publicidad.php?success=Guardado exitosamente!!");
            }else{
                header("Location: ../cargar_publicidad.php?error=Ocurrio un error&$datos_publicidad");
            }

    }else if($tipo=='video/mp4' || $tipo=='video/avi' || $tipo=='video/flv' || $tipo=='video/mov' || $tipo=='video/wmv'|| $tipo=='video/H.264' || $tipo=='video/XVID'|| $tipo=='video/RM'){
        echo "Hay un video prro!!";
        $archivo = $_FILES["archivo"]["name"];
        $ruta = $_FILES["archivo"]["tmp_name"];
        $destino= "multimedia/".$archivo;
        copy($ruta,$destino);
        $extension_archivo = str_replace("video/","",$tipo);
        $tipo_archivo = "video";

        $sql = $sql = "INSERT INTO publicidad(titulo_publicidad,url_archivo,extension_archivo,tipo_archivo,fecha_hora_inicio,fecha_hora_final,estatus,texto, fk_sucursal,fk_dispositivo)
        VALUES('$titulo','$destino','$extension_archivo','$tipo_archivo','$fecha_hora_inicio','$fecha_hora_final',1,'$texto','$fk_sucursal','$fk_dispositivo')";

        $resultado = mysqli_query($mysqli,$sql);

        if($resultado >0){
            header("Location: ../cargar_publicidad.php?success=Guardado exitosamente!!");
        }else{
            header("Location: ../cargar_publicidad.php?error=Ocurrio un error&$datos_publicidad");
        }
    }else if($tipo=='audio/mpeg' || $tipo=='audio/mp3' || $tipo=='audio/wav' || $tipo=='audio/midi' || $tipo=='audio/aac' || $tipo=='audio/flac' || $tipo=='audio/AIFF'){
        echo "Hay un audio prro!!";
        $archivo = $_FILES["archivo"]["name"];
        $ruta = $_FILES["archivo"]["tmp_name"];
        $destino = "multimedia/".$archivo;
        copy($ruta,$destino);
        $extension_archivo = str_replace("audio/","",$tipo);
        $tipo_archivo = "audio";

        $sql = $sql = "INSERT INTO publicidad(titulo_publicidad,url_archivo,extension_archivo,tipo_archivo,fecha_hora_inicio,fecha_hora_final,estatus,texto, fk_sucursal,fk_dispositivo)
        VALUES('$titulo','$destino','$extension_archivo','$tipo_archivo','$fecha_hora_inicio','$fecha_hora_final',1,'$texto','$fk_sucursal','$fk_dispositivo')";

        $resultado = mysqli_query($mysqli, $sql);

        if($resultado > 0){
            header("Location: ../cargar_publicidad.php?success=Guardado exitosamente!!");
        }else{
            header("Location: ../cargar_publicidad.php?error=Ocurrio un error&$datos_publicidad");
        }
    }else{
        header("Location: ../cargar_publicidad.php?error=Formato no valido");
    }
}else{
    echo "Es un texto";
    $tipo_archivo = "texto";
    $extension_archivo= "txt";

    $sql = $sql = "INSERT INTO publicidad(titulo_publicidad,url_archivo,extension_archivo,tipo_archivo,fecha_hora_inicio,fecha_hora_final,estatus,texto, fk_sucursal,fk_dispositivo)
    VALUES('$titulo','','$extension_archivo','$tipo_archivo','$fecha_hora_inicio','$fecha_hora_final',1,'$texto','$fk_sucursal','$fk_dispositivo')";
    $resultado = mysqli_query($mysqli,$sql);

    if($resultado > 0){
        header("Location: ../cargar_publicidad.php?success=Se ha guardado el texto exitosamente!!");
    }else{
        header("Location: ../publicy_0.php?error=Ocurrio un Error&$datos_subida");
    }
}
