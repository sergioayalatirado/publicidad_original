<?php
    if(isset($_POST['crear'])){
        include "../conexion.php";
        
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
       
            $titulop = validate($_POST['titulo_publicidad']);
            $texto = validate($_POST['texto']);
            $fhi = validate($_POST['fecha_hora_inicio']);
            $fhf = validate($_POST['fecha_hora_final']);
            $fks = validate($_POST['fk_sucursal']);
            $fkd = validate($_POST['fk_dispositivo']);

            $datos_subida = 'Titulo='.$titulop.'Texto='.$texto.'FechahoraInicio='.$fhi.'&FechaHoraFinal='.$fhf;

            if(empty($titulop)){
                header("Location: ../crear_texto.php?error=Titulo es requerido&$titulop");
            }else if(empty($texto)){
                header("Location: ../crear_texto.php?error=Campo texto es requerido&$texto");
            }else if(empty($fhi)){
                header("Location: ../crear_texto.php?error=Fecha hora inicial requerida&$fhi");
            }else if(empty($fhf)){
                header("Location: ../crear_texto.php?error=Fecha hora final requerida&$fhf");
            }else if(empty($fks)){
                header("Location: ../crear_texto.php?error=No hay sucursal seleccionada&$fks");
            }else if(empty($fkd)){
                header("Location: ../crear_texto.php?error=No hay dispositivo seleccionado&$fkd");
            }else{
                $sql = "INSERT INTO publicidad(titulo_publicidad,url_archivo,extension_archivo,tipo_archivo,fecha_hora_inicio,fecha_hora_final,estatus,texto,fk_sucursal,fk_dispositivo)
                                VALUES('$titulop','','','texto','$fhi','$fhf',1, '$texto','$fks','$fkd')";
                            
                            $resultado = mysqli_query($mysqli,$sql);
    
                            if($resultado > 0)
                            {
                               header("Location: ../publicy_0.php?success=Guardado exitosamente!!");
                             }

                             else
                             {
                                 header("Location: ../publicy_0.php?error=Ocurrio un Error&$datos_subida");
                             }
               
            }           
    }

    