<?php

require("conexion.php");
require 'fpdf/fpdf.php';

$hoy = getdate();
$mes = $hoy['mon'];
$year = $hoy['year'];

$sql=("SELECT * from pago WHERE fecha_pago BETWEEN '$year-$mes-01' and '$year-$mes-31'");

$query2=mysqli_query($mysqli,$sql);
 $arreglado=mysqli_fetch_array($query2);
 $ref=$arreglado[1];

 if($ref==''){

 echo ' <script language="javascript">alert("Atención, no hay registros de Beneficarios que mostrar");</script>';
 echo "<script>location.href='menuadm.php'</script>";

 }else {

$pdf = new FPDF('L','mm','A4');
$pdf->Addpage();
$pdf->Setfont('Arial','',11);

$pdf->Image('img/border.png',32,35,242,1);
$pdf->Image('img/logo2.png',35,18,14);

$y= $pdf->GetY();
$pdf->SetY($y+8);
$pdf->SetX(47);
$pdf->cell(100, 10,utf8_decode('COMUNA CLAP "MANUEL ANTONIO CARREÑO"'), '', 1, 'C');

$y= $pdf->GetY();
$pdf->SetY($y-2);
$pdf->SetX(22);
$pdf->cell(100, 10,'Responsable: ADMIN', '', 1, 'C');


$y= $pdf->GetY();
$pdf->SetY($y+5);
$pdf->SetX(32);
$pdf->cell(242, 10,'CONTROL DE ENTREGAS', 1, 1, 'C');
$pdf->Ln();
    
//Encabezados de la consulta
//Cédula    
$y= $pdf->GetY();
$pdf->SetY($y-5);
$pdf->SetX(32);	
$pdf->cell(30, 10,utf8_decode('Cédula'), 1, 0,'C');

//Nombre
$pdf->SetX(62);	
$pdf->cell(30, 10,'Nombre', 1, 0,'C');

//Apellido
$pdf->SetX(92);	
$pdf->cell(30, 10,'Apellido', 1, 0,'C');

//Teléfono 
$pdf->SetX(122);	
$pdf->cell(30, 10,utf8_decode('Teléfono'), 1, 0,'C');

//Piso
$pdf->SetX(152);	
$pdf->cell(30, 10,'Piso', 1, 0,'C');

//Apartamento
$pdf->SetX(182);	
$pdf->cell(30, 10,'Apartamento', 1, 0,'C');

//Referencia
$pdf->SetX(212);	
$pdf->cell(30, 10,'Referencia', 1, 0,'C');

//Recibio
$pdf->SetX(242);	
$pdf->cell(30, 10,'Recibio', 1, 0,'C');

 $hoy = getdate();
 $mes = $hoy['mon'];
 $year = $hoy['year'];

$sql=("SELECT p.cedula, p.nombre, p.apellido, p.telefono, b.piso, b.apartamento, r.referencia, r.entrega, r.fecha_caja FROM pago r INNER JOIN beneficiario b ON r.id_beneficiario= b.id_persona INNER JOIN persona p ON b.id_persona = p.cedula AND r.fecha_caja BETWEEN '$year-$mes-01' AND '$year-$mes-31'");

$query=mysqli_query($mysqli,$sql);
$yentrega=59;
while($arreglo=mysqli_fetch_array($query)){

    //Cédula
    $y= $pdf->GetY();
    $pdf->SetY($y+10);
    $pdf->SetX(32);
	$pdf->cell(30,10,$arreglo[0],1,'','C');

    //Nombre
	$pdf->SetX(62);
	$pdf->cell(30,10,$arreglo[1],1,'','C');

    //Apellido
	$pdf->SetX(92);
	$pdf->cell(30,10,$arreglo[2],1,'','C');

    //Teléfono 
	$pdf->SetX(122);
	$pdf->cell(30,10,$arreglo[3],1,'','C');

    //Piso
	$pdf->SetX(152);
	$pdf->cell(30,10,$arreglo[4],1,'','C');

    //Apartamento
	$pdf->SetX(182);
	$pdf->cell(30,10,$arreglo[5],1,'','C');	

	//referencia
	$pdf->SetX(212);
	$pdf->cell(30,10,$arreglo[6],1,'','C');

	//entrega
	
	$yentrega=$yentrega+10;
	$pdf->cell(30,10,'',1,'','C');
	$pdf->SetX(242);

	if ($arreglo[7]==0) {
                $pdf->Image('iconos/closed2.png' ,255,$yentrega,5,5); 
                } else {
  
                $pdf->Image('iconos/verificar2.png',255,$yentrega,5,5); 
                 }	 

    $fecha_caja= $arreglo[8];

}

    //fecha
    $y= $pdf->GetY();
    $pdf->SetY($y-58);
	$pdf->SetX(242);
	$pdf->cell(30,10,$fecha_caja,'','','C');	

$pdf->Output();

}

?>




