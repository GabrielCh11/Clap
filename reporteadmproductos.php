<?php
session_start();
require("conexion.php");
require 'fpdf/fpdf.php';

$hoy = getdate();
$mes = $hoy['mon'];
$year = $hoy['year'];

$sql=("SELECT * FROM producto WHERE fecha BETWEEN '$year-$mes-01' AND '$year-$mes-31'");

$query2=mysqli_query($mysqli,$sql);
 $arreglado=mysqli_fetch_array($query2);
 $cantidad=$arreglado[3];

 if($cantidad==''){
 echo ' <script language="javascript">alert("Atención, usted no ha registrado ningún producto para la caja del presente mes ");</script>';
 echo "<script>location.href='menuadm.php'</script>";

 }else {



$pdf = new FPDF();
$pdf->Addpage();
$pdf->Setfont('Arial','',11);

//leyenda (x,y,largo,alto)
$pdf->Image('img/border.png',32,42,150,1);
$pdf->Image('img/logo2.png',33,25,14);

$y= $pdf->GetY();
$pdf->SetY($y+20);
$pdf->SetX(45);
$pdf->cell(100, 10,utf8_decode('COMUNA CLAP "MANUEL ANTONIO CARREÑO"'), '', 1, 'C');
//leyenda (largo de celda en px, alto de celda,texto,borde, salto de linea,alineacion)

$y= $pdf->GetY();
$pdf->SetY($y+5);
$pdf->SetX(32);
$pdf->cell(150, 10,'Productos del Mes', 1, 1, 'C');

$sql=("SELECT * FROM producto WHERE fecha BETWEEN '$year-$mes-01' AND '$year-$mes-31'");

$y= $pdf->GetY();
$pdf->SetY($y+4);
$pdf->SetX(32);	
$pdf->cell(80, 10,'Producto', 1, 0, 'C');		
$pdf->cell(70, 10,'Cantidad', 1, 1, 'C');

$query=mysqli_query($mysqli,$sql);
while($arreglo=mysqli_fetch_array($query)){
	$pdf->SetX(32);
	$pdf->cell(80, 10,$arreglo[1], 1, 0, 'C');
	$fecha=$arreglo[2];
    $pdf->cell(70, 10,$arreglo[3], 1, 1, 'C');	
}

 //fecha
    $y= $pdf->GetY();
    $pdf->SetY($y-129);
	$pdf->SetX(150);
	$pdf->cell(30,10,$fecha,'','','C');


$pdf->Image('img/border.png',32,145,150,1);

$y= $pdf->GetY();
$pdf->SetY($y+135);
$pdf->SetX(58);	
$pdf->cell(100, 10,'Calle Pichincha. Residencias Santa Teresa. Urb La Paz. El Paraiso.', '', 1, 'C');

}


$pdf->Output();

?>