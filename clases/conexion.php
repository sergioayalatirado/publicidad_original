<?php 
    class conectar{
        public function conexion(){
            $conexion = mysqli_connect('localhost', 'root', '', 'mydb_publicidad');
            $conexion->set_charset('utf8');
            return $conexion;
        }
    }
        $obj = new conectar();
        if($obj->conexion()){
            echo "Conectado";
        }
