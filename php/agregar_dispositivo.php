<?php

if(isset($_POST['crear'])){
    include "../conexion.php";
    function validate($data){ //VALIDA CADA UNA DE LOS VALORES RECIBIDOS POR POST DENTRO DE LA VARIABLE $DATA
    $data = trim($data); //VALIDA Y CORRIGE QUE NO HAYA ESPACIOS EN BLANCO
    $data = stripslashes($data); //QUITA la barra de escape de caracteres / **EJEMPLO: aquí \' hay una comilla simple escapada **EJEMPLO2: Aquí ' ya no hay una comilla simple escapada        $data = htmlspecialchars($data); //Traduce los caracteres especiales obtenidos dentro de $data;
    return $data;  //Retorna la variable data para poder ser tratada ya sea dentro de un echo o dentro de una variable que permitira insertarla dentro de una base de datos.
    }
    $nombre_dispositivo = validate($_POST['nombre_dispositivo']);
    $tipo_dispositivo = validate($_POST['tipo_dispositivo']);
    $device_agent = validate($_POST['device_agent']);
    $fk_sucursal = validate($_POST['fk_sucursal']);

    $datos_disp = 'Nombre='.$nombre_dispositivo.'&Tipo dispositivo='.$tipo_dispositivo.'&Device agent='.$device_agent.'&sucursal='.$fk_sucursal;

    if(empty($nombre_dispositivo)){
        header("Location: ../agregar_dispositivo.php?error=Nombre de dispositivo requerida&$nombre_dispositivo");
    }else if(empty($tipo_dispositivo)){
        header("Location: ../agregar_dispositivo.php?error=Tipo de dispositivo requerido&$tipo_dispositivo");
    }else if(empty($fk_sucursal)){
        header("Location: ../agregar_dispositivo.php?error=Sucursal requerida&$fk_sucursal");
    }else{
        $sql = "INSERT INTO dispositivo (nombre_dispositivo,tipo_dispositivo,device_agent, fk_sucursal) VALUES('$nombre_dispositivo','$tipo_dispositivo','$device_agent','$fk_sucursal')";
        $resultado = mysqli_query($mysqli, $sql);
        if($resultado > 0){
            header("Location: ../agregar_dispositivo.php?success=Nuevo dispositivo agregado exitosamente!!");
        }else{
            header("Location: ../agregar_dispositivo.php?error=Ocurrio un error, verifica nuevamente.&$datos_disp");
        }
    }
}