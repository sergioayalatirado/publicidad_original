<?php include "php/cargar_publicidad.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicidades almacenadas y tiempos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container">
        <div class="box">
            <h4 class="display-4 text-center">Publicidad registrada(All time)</h4>
            <hr>
            <div class="link-right">
                <a href="publicidad-hoy.php">Publicidad de Hoy</a>
            </div>
            <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_GET['success']; ?>
                </div>
            <?php } ?>
            <?php if (mysqli_num_rows($resultado1)) { ?>
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th scope="col">ID</th>
                            <th scope="col">Titulo de Publicidad</th>
                            <th scope="col">Url archivo</th>
                            <th scope="col">Extension de Archivo</th>
                            <th scope="col">Tipo de Archivo</th>
                            <th scope="col">Fecha/Hora Inicio</th>
                            <th scope="col">Fecha/Hora Final</th>
                            <th scope="col">Estatus</th>
                            <th scope="col">Texto</th>
                            <th scope="col">Sucursal</th>
                            <th scope="col">Dispositivo</th>
                            <th scope="col">Tipo de Dispositivo</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($rows = mysqli_fetch_assoc($resultado1)) {
                            $i++;
                        ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>

                                <td><?php echo $rows['titulo_publicidad']; ?></td>
                                <td><?php echo $rows['url_archivo']; ?></td>
                                <td><?php echo $rows['extension_archivo']; ?></td>
                                <td><?php echo $rows['tipo_archivo']; ?></td>
                                <td><?php echo $rows['fecha_hora_inicio']; ?></td>
                                <td><?php echo $rows['fecha_hora_final']; ?></td>
                                <td><?php echo $rows['estatus']; ?></td>
                                <td><?php echo $rows['texto']; ?></td>
                                <td><?php echo $rows['nombre_sucursal']; ?></td>
                                <td><?php echo $rows['nombre_dispositivo']; ?></td>
                                <td><?php echo $rows['tipo_dispositivo']; ?></td>
                                <td>
                                    <!-- Manda a llamar a la row "['url_archivo']" para poder mostrarla y se le reemplaza los valores de ../multimedia/ -->
                                    <?php
                                    $url_a = $rows['url_archivo'];
                                    $url_arch = str_replace("../multimedia/", "", "$url_a");
                                    ?>

                                    <?php
                                    $texto = $rows['tipo_archivo'];
                                    if ($texto != 'texto') {
                                        echo "<a href='multimedia/$url_arch' class='btn btn-primary'>Reproducir</a>";
                                    }
                                    ?>
                                    <br>
                                    <br>
                                    <a href="editar_publicidad.php?id=<?= $rows['id_publicidad'] ?>" class="btn btn-warning">Editar datos</a><br><br>

                                    <a href="php/eliminar.php?id=<?= $rows['id_publicidad'] ?>" class="btn btn-danger">Eliminar publicidad</a>
                                    <br><br>

                                    <!-- <a href="multimedia/"> Directorio</a> -->
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
            <div class="link-right">
                <a href="index.php" class="link-primary">Inicio</a>
            </div>

        </div>
    </div>

</body>

</html>