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
    $mostrar = "SELECT * FROM sucursal WHERE id_sucursal=$id";
    $resultado = mysqli_query($mysqli, $mostrar);

    if(mysqli_num_rows($resultado)>0){
        $row = mysqli_fetch_assoc($resultado);
        var_dump($row);
    }else{
        header("Location: ../lista_sucursales.php");
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
    $nombre_sucursal = validate($_POST['sucursal']);
    $tipo_sucursal = validate($_POST['tipo_sucursal']);

    $datos_sucursal= 'nombre_sucursal='.$nombre_sucursal.'&tipo_sucursal='.$tipo_sucursal;

    if(empty($nombre_sucursal)){
        header("Location: ../editar_sucursal.php?id=$id&error=Nombre de sucursal es requerido");
    }else if(empty($tipo_sucursal)){
        header("Location: ../editar_sucursal.php?id=$id&error=Tipo de sucursal es requerido");
    }else{
        $sql = "UPDATE sucursal
                SET nombre_sucursal='$nombre_sucursal',
                tipo_sucursal='$tipo_sucursal',
                estatus=1 
                WHERE id_sucursal=$id";
                
        $resultado = mysqli_query($mysqli , $sql);

        if($resultado > 0){
            header("Location: ../lista_sucursales.php?success=Sucursal actualizada exitosamente!!");
        }else{
            header("Location: ../lista_sucursales.php?id=$id&error=Ocurrio un error al actualizar los datos.");
        }
    }
}else{
    header("Location: lista_sucursales.php");
}

