<?php 
//Mostrar por ID

if(isset($_GET['id'])){
    include "conexion.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $id = validate($_GET['id']);
    $mostrar = "SELECT * FROM dispositivo WHERE id_dispositivo=$id";
    $resultado = mysqli_query($mysqli, $mostrar);

    if(mysqli_num_rows($resultado)>0){
        $row = mysqli_fetch_assoc($resultado);
        var_dump($row);
    }else{
        header("Location: lista_dispositivos.php");
    }
}else if(isset($_POST['actualizar'])){
    include "../conexion.php";
    function validate($data){ 
        $data = trim($data); 
        $data = stripslashes($data); 
        $data = htmlspecialchars($data); 
        return $data;  
    }
    $id = validate($_POST['id']);
    $nombre_dispositivo = validate($_POST['nombre_dispositivo']);
    $tipo_dispositivo = validate($_POST['tipo_dispositivo']);
    $device_agent = validate($_POST['device_agent']);
    $fk_sucursal = validate($_POST['fk_sucursal']);

    $datos_dispositivo= 'nombre_dispositivo='.$nombre_dispositivo.'&tipo_dispositivo='.$tipo_dispositivo.'&device_agent='.$device_agent.'&sucursal='.$fk_sucursal;

    if(empty($nombre_dispositivo)){
        header("Location: ../actualizar_dispositivo.php?id=$id&error=Nombre de dispositivo es requerido");
    }else if(empty($tipo_dispositivo)){
        header("Location: ../actualizar_dispositivo.php?id=$id&error=Tipo de dispositivo es requerido");
    }else if(empty($fk_sucursal)){
        header("Location: ../actualizar_dispositivo.php?id=$id&error=Sucursal es requerida");
    }else{
        $sql = "UPDATE dispositivo
                SET nombre_dispositivo='$nombre_dispositivo',
                tipo_dispositivo='$tipo_dispositivo',
                device_agent='$device_agent',
                fk_sucursal='$fk_sucursal' 
                WHERE id_dispositivo=$id";
                
        $resultado = mysqli_query($mysqli , $sql);

        if($resultado > 0){
            header("Location: ../actualizar_dispositivo.php?success=Dispositivo actualizado exitosamente!!");
        }else{
            header("Location: ../actualizar_dispositivo.php?id=$id&error=Ocurrio un error al actualizar los datos.");
        }
    }
}else{
    header("Location: lista_dispositivos.php");
}

