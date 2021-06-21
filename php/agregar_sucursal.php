<?php

if(isset($_POST['crear'])){
    include "../conexion.php";
    function validate($data){ //VALIDA CADA UNA DE LOS VALORES RECIBIDOS POR POST DENTRO DE LA VARIABLE $DATA
    $data = trim($data); //VALIDA Y CORRIGE QUE NO HAYA ESPACIOS EN BLANCO
    $data = stripslashes($data); //QUITA la barra de escape de caracteres / **EJEMPLO: aquí \' hay una comilla simple escapada **EJEMPLO2: Aquí ' ya no hay una comilla simple escapada        $data = htmlspecialchars($data); //Traduce los caracteres especiales obtenidos dentro de $data;
    return $data;  //Retorna la variable data para poder ser tratada ya sea dentro de un echo o dentro de una variable que permitira insertarla dentro de una base de datos.
    }
    $sucursal = validate($_POST['sucursal']);
    $tipo_suc = validate($_POST['tipo_sucursal']);

    $datos_suc = 'sucursal='.$sucursal.'&tipo_sucursal='.$tipo_suc;

    if(empty($sucursal)){
        header("Location: ../agregar_sucursal.php?error=Sucursal requerida&$sucursal");
    }else if(empty($tipo_suc)){
        header("Location: ../agregar_sucursal.php?error=Tipo de sucursal requerido&$datos_suc");
    }else{
        $sql = "INSERT INTO sucursal(nombre_sucursal, tipo_sucursal)
                VALUES('$sucursal','$tipo_suc')";
        $resultado = mysqli_query($mysqli, $sql);
        if($resultado > 0){
            header("Location: ../agregar_sucursal.php?success=Nueva sucursal agregada exitosamente!!");
        }else{
            header("Location: ../agregar_sucursal.php?error=Ocurrio un error, verifica nuevamente.&$datos_suc");
        }
    }

}