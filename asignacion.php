  <?php
  session_start();
  require("conexion.php");
  
  $hoy = getdate();
  $mes = $hoy['mon'];
  $year = $hoy['year'];

foreach($_POST as $id=>$entrega){
  
  $sql=mysqli_query($mysqli,"SELECT * FROM pago WHERE id='$id'");
  $pago=mysqli_fetch_array($sql);
  

  $query=mysqli_query($mysqli,"SELECT * FROM producto WHERE fecha BETWEEN '$year-$mes-01' AND '$year-$mes-31'");

   while($arreglo=mysqli_fetch_array($query)){

	mysqli_query($mysqli,"INSERT INTO asignacion VALUES('','$arreglo[1]','$arreglo[2]','$pago[1]')");
  $fecha_caja = $arreglo[2];
 }
  mysqli_query($mysqli," UPDATE pago SET entrega='$entrega', fecha_caja='$fecha_caja' WHERE id='$id'");
}
   echo ' <script language="javascript">alert("Asignacion de caja existosa");</script> ';
        echo "<script>location.href='menuadm.php'</script>";
?>