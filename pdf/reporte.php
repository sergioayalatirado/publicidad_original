<?php
    include 'plantilla.php';
    require '../conexion.php';

    $consulta= "SELECT id_publicidad,titulo_publicidad, url_archivo , fecha_hora_inicio , fecha_hora_final , nombre_sucursal , nombre_dispositivo, tipo_dispositivo FROM publicidad p, dispositivo d , sucursal s 
    WHERE p.fk_dispositivo = d.id_dispositivo AND p.fk_sucursal = s.id_sucursal";
    $resultado = $mysqli->query($consulta);

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial', 'B',12);
    $pdf->Cell(50,6,'ID',1,1,'C',1);
    $pdf->Cell(50,6,'Titulo de publicidad',1,1,'C',1);
    // $pdf->Cell(20,6,'Id',1,0,'C',1);
    $pdf->Cell(50,6,'Url de Archivo',1,1,'C',1);
    $pdf->Cell(50,6,'Fecha de Inicio',1,1,'C',1);
    $pdf->Cell(50,6,'Fecha Final',1,1,'C',1);
    $pdf->Cell(50,6,'Nombre de Sucursal',1,1,'C',1);
    $pdf->Cell(50,6,'Nombre de dispositivo',1,1,'C',1);
    $pdf->Cell(50,6,'Tipo de dispositivo',1,1,'C',1);
    $pdf->SetFont('Arial','',10);
    

	
	while($row = $resultado->fetch_assoc())
	{
        $pdf->Cell(50,6,utf8_decode($row['id_publicidad']),1,1,'C');   
		$pdf->Cell(50,6,utf8_decode($row['titulo_publicidad']),1,1,'C');
		// $pdf->Cell(20,6,$row['idpublicidad_tv'],1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['url_archivo']),1,1,'C');
        $pdf->Cell(50,6,utf8_decode($row['fecha_hora_inicio']),1,1,'C');
        $pdf->Cell(50,6,utf8_decode($row['fecha_hora_final']),1,1,'C');
        $pdf->Cell(50,6,utf8_decode($row['nombre_sucursal']),1,1,'C');
        $pdf->Cell(50,6,utf8_decode($row['nombre_dispositivo']),1,1,'C');
        $pdf->Cell(50,6,utf8_decode($row['tipo_dispositivo']),1,1,'C');

	}
	$pdf->Output();
?>