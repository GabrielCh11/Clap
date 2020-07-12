<?php
session_start();
require("conexion.php");
require 'fpdf/fpdf.php';
$cedula=$_POST['cedula'];

$hoy = getdate();
$mes = $hoy['mon'];
$year = $hoy['year'];

$sql2=("SELECT * FROM pago WHERE id_beneficiario=$cedula AND fecha_pago BETWEEN '$year-$mes-01' AND '$year-$mes-31'");
//Cierre Parte I

 $query2=mysqli_query($mysqli,$sql2);
 $arreglado=mysqli_fetch_array($query2);
 $ref=$arreglado[1];

 if($ref==''){

 echo ' <script language="javascript">alert("Atención, usted no ha registrado ningún pago para la caja del presente mes ");</script>';
 echo "<script>location.href='menubeneficiario.php'</script>";

 }else {

 
$sql=("SELECT * FROM producto WHERE fecha BETWEEN '$year-$mes-01' AND '$year-$mes-31'");

$query2=mysqli_query($mysqli,$sql);
 $arreglado=mysqli_fetch_array($query2);
 $cantidad=$arreglado[3];

 if($cantidad==''){
 echo ' <script language="javascript">alert("Atención, no hay productos asignados en el presente mes ");</script>';
 echo "<script>location.href='menuadm.php'</script>";


 }else {

$sql=("SELECT * FROM persona INNER JOIN beneficiario on persona.cedula = beneficiario.id_persona WHERE cedula='$cedula'");

$pdf = new FPDF();
$pdf->Addpage();
$pdf->Setfont('Arial','',11);

$query=mysqli_query($mysqli,$sql);

$arreglo=mysqli_fetch_array($query);
         
//leyenda (x,y,largo,alto)
$pdf->Image('img/border.png',32,42,150,1);
$pdf->Image('img/logo2.png',55,25,14);

$y= $pdf->GetY();
$pdf->SetY($y+20);
$pdf->SetX(67);
$pdf->cell(100, 10,utf8_decode('COMUNA CLAP "MANUEL ANTONIO CARREÑO"'), '', 1, 'C');
//leyenda (largo de celda en px, alto de celda,texto,borde, salto de linea,alineacion)

$y= $pdf->GetY();
$pdf->SetY($y+5);
$pdf->SetX(32);
$pdf->cell(150, 10,'CONSTANCIA DE ENTREGA', 1, 1, 'C');

$y= $pdf->GetY();
$pdf->SetY($y+5);
$pdf->SetX(32);	
$pdf->cell(150, 10,'DATOS DEL BENEFICIARIO', 1, 1, 'C');

$pdf->SetX(32);	
$pdf->cell(80, 10,utf8_decode('Cédula'), 1, 0,'C');		
$pdf->cell(70,10,$arreglo[1],1,'','C');

$y= $pdf->GetY();
$pdf->SetY($y+10);
$pdf->SetX(32);	
$pdf->cell(80, 10,'Nombre', 1, 0, 'C');		
$pdf->cell(70,10,$arreglo[2],1,'','C');

$y= $pdf->GetY();
$pdf->SetY($y+10);
$pdf->SetX(32);	
$pdf->cell(80, 10,'Apellido', 1, 0, 'C');
$pdf->cell(70,10,$arreglo[3],1,'','C');

$y= $pdf->GetY();
$pdf->SetY($y+10);
$pdf->SetX(32);	
$pdf->cell(80, 10,'Piso', 1, 0, 'C');
$pdf->cell(70,10,$arreglo[8],1,'','C');

$y= $pdf->GetY();
$pdf->SetY($y+10);	
$pdf->SetX(32);	
$pdf->cell(80, 10,'Apartamento', 1, 0, 'C');
$pdf->cell(70,10,$arreglo[9],1,'','C');

$y= $pdf->GetY();
$pdf->SetY($y+10);
$pdf->SetX(32);	
$pdf->cell(80, 10,'Fecha de Pago', 1, 0, 'C');
$pdf->cell(70,10,$arreglado[3],1,'','C');

$y= $pdf->GetY();
$pdf->SetY($y+10);
$pdf->SetX(32);	
$pdf->cell(150, 10,'DATOS DE LA CAJA', 1, 1, 'C');

$pdf->SetX(32);	
$pdf->cell(80, 10,'Producto', 1, 0, 'C');		
$pdf->cell(70, 10,'Cantidad', 1, 1, 'C');


$sql3=("SELECT A.*, P.cantidad FROM asignacion A, producto P WHERE A.id_nombre_producto=P.id_nombre_producto and A.id_fecha=P.fecha and A.id_pago='$ref'");
$yentrega=59;

$query3=mysqli_query($mysqli,$sql3);
while($tearregle=mysqli_fetch_array($query3)){
	$pdf->SetX(32);	
	$pdf->cell(80, 10,$tearregle[1], 1, 0, 'C');
	$pdf->cell(70, 10,$tearregle[4], 1, 1, 'C');
}


$y= $pdf->GetY();
$pdf->SetY($y+5);
$pdf->SetX(32);	
$pdf->cell(80, 10,'Nro. REFERENCIA', 1, 0, 'C');
$pdf->cell(70, 10,$arreglado[1], 1, 1, 'C');

$pdf->Image('img/border.png',32,270,150,1);

$y= $pdf->GetY();
$pdf->SetY($y+2);
$pdf->SetX(58);	
$pdf->cell(100, 10,'Calle Pichincha. Residencias Santa Teresa. Urb La Paz. El Paraiso.', '', 1, 'C');

$pdf->Output();
 


}
 }




?>


