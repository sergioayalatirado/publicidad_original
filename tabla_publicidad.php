<?php 
    require_once "clases/conexion.php";
    $obj = new conectar();
    $conexion = $obj->conexion();

    $sql = "SELECT id_publicidad,
    titulo_publicidad,
    url_archivo,
    tipo_archivo,
    fecha_hora_inicio,
    fecha_hora_final,
    p.estatus,
    texto,
    fecha_creacion,
    fecha_modificacion,
    nombre_sucursal,
    nombre_dispositivo
    FROM publicidad p
    WHERE p.estatus=1";
    $resultado = mysqli_query($conexion,$sql);
?>

<div>
    <table class="table table-hover table-condensed table-bordered" id="iddatatable">
        <thead style="background-color: #dc3545;color: white; font-weight: bold;">
            <tr>
                <td>Titulo publicidad</td>
                <td>Ruta del archivo</td>
                <td>Tipo de archivo</td>
                <td>Fecha de Inicio</td>
                <td>Fecha de Vencimiento</td>
                <td>Texto</td>
                <td>Fecha de creacion</td>
                <td>Fecha de modificacion</td>
                <td>Sucursal</td>
                <td>Dispositivo</td>
            </tr>
        </thead>
        <tfoot style="background-color: #ccc;color: white; font-weight:bold;">
            <tr>
            <td>Titulo publicidad</td>
                <td>Ruta del archivo</td>
                <td>Tipo de archivo</td>
                <td>Fecha de Inicio</td>
                <td>Fecha de Vencimiento</td>
                <td>Texto</td>
                <td>Fecha de creacion</td>
                <td>Fecha de modificacion</td>
                <td>Sucursal</td>
                <td>Dispositivo</td>
            </tr>
        </tfoot>

        <tbody style="background-color: white;">
            <?php 
            while($mostrar=mysqli_fetch_row($resultado)){ 
            ?>
            <tr>
                <td><?php echo $mostrar[1]?></td> 
                <td><?php echo $mostrar[2]?></td>
                <td><?php echo $mostrar[3]?></td>
                <td><?php echo $mostrar[4]?></td> 
                <td><?php echo $mostrar[5]?></td>
                <td><?php echo $mostrar[6]?></td>
                <td><?php echo $mostrar[7]?></td> 
                <td><?php echo $mostrar[8]?></td>
                <td><?php echo $mostrar[9]?></td>
                <td><?php echo $mostrar[10]?></td> 
                <td><?php echo $mostrar[11]?></td>

                <td style="text-align: center;">
                    <span class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')">
                        <span class="fa fa-pencil-square-o"></span>
                    </span>
                </td>
                <td style="text-align: center;">
                    <span class="btn btn-danger btn-sm" onclick="eliminarDatos('<?php echo $mostrar[0]?>')">
                        <span class="fa fa-trash"></span>
                    </span>
                </td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
        $(document).ready(function(){
            $('#iddatatable').DataTable();
        });
</script>
