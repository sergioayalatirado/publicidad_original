<?php
if(isset($_GET['id'])){
include "../conexion.php";

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    
    $id = validate($_GET['id']);

    $busqueda_id = "SELECT url_imagen, url_video, texto FROM publicidad_tv WHERE idpublicidad_tv=$id";
    $resultado = mysqli_query($mysqli, $busqueda_id);

    $resultado = mysqli_fetch_array($resultado);

    //MOSTRAR EL VALOR DE LOS DISTINTOS ARRAY QUE SE CAPTURARON DENTRO DE LOS RESULTADO
    $imagen = $resultado['url_imagen'];
    $video = $resultado['url_video'];
    $texto = $resultado['texto'];

    //MOSTRAR SI LA VARIABLE $IMAGEN ESTA NULA
    $bool_img = var_dump(is_null($imagen));
    $bool_video = var_dump(is_null($video));
    $bool_texto = var_dump(is_null($texto));

    //VALIDAR QUE NO TENGAN VALORES IMAGEN, VIDEO O TEXTO
    if($imagen==null || $imagen=""){
        if($video==null || $video=""){
            if($texto==null || $texto=""){
                echo "Ninguno de los 3 tiene valores #row";
            }
        }
    }else{
        echo "Existe un campo con valor";
        if($bool_img==false){
                echo "Hay una imagen";
        }else if($bool_video==false){
                echo "Hay un video";
        }else if($bool_texto==false){
                echo "Hay texto";
        }
    }

    // if($imagen=!""){
    //     echo "No hay imagen dentro";
    // }else{
    //     echo "Si hay imagen dentro";
    // }


//    print_r($resultado);

//    if($resultado = $mysqli->query($busqueda_id)){

//     while($finfo = $resultado->fetch_field()){

//         printf("id: %s\n", $finfo->idpublicidad_tv);
//     }
//     $resultado->close();
//    }
    // print_r($resultado);
    // foreach(mysqli_fetch_all($resultado, MYSQLI_ASSOC) as $fila){
    //     if(isset($fila['idpublicidad_tv'])){
    //         echo 'No hay registros';
    //     }else{
    //         echo $fila['idpublicidad_tv'];
    //     }
    // }



//     if(mysqli_num_rows($resultado)>0){
//         $array = mysqli_fetch_assoc($resultado);
        
//         foreach(mysqli_fetch_all()){
//            $id = $value ['idpublicidad_tv'];
//             $url_imagen = $value['url_imagen'];
//            $url_video = $value ['url_video'];
//             $fhi = $value['fecha_hora_inicio'];
//            $fhf = $value['fecha_hora_final'];
//            $video_imagen = $value['band_elimnar'];
//            $titulo_publicidad = $value['titulo_publicidad'];
//         }
       

//     //     $array = array("url_imagen");
//     //     if(empty($array))
//     //     {
//     //         echo 'El array SI esta vacio';
//     //     }
//     //     else{
//     //         var_dump($array);
//     // }
//     // if($resultado > 1){
//     //     echo 'Si hay una variable';;
//     // }else{
//     //     echo 'No hay nada';
//     // }
// }else{
//     echo 'f';
// }
}
