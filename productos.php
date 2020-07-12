<?php
  session_start();
  require("conexion.php");

  $hoy = getdate();
  $mes = $hoy['mon'];
  $year = $hoy['year'];

  $existe=mysqli_query($mysqli,"SELECT * FROM producto WHERE fecha BETWEEN '$year-$mes-01' AND '$year-$mes-31'");
  $numprod=mysqli_num_rows($existe);

      if($numprod>0){
        echo ' <script language="javascript">alert("Atencion, ya existe una caja cargada con estos productos para este mes, Debe registrar los productos mensualmente");</script> ';
        echo "<script>location.href='admproductos.php'</script>";
      } else {

foreach($_POST as $id=>$cantidad){

$sql=mysqli_query($mysqli,"SELECT * FROM almacen WHERE id='$id'");
  
  $almacen=mysqli_fetch_array($sql);

  mysqli_query($mysqli,"INSERT INTO producto VALUES('','$almacen[1]',NOW(),'$cantidad')");

}
        echo ' <script language="javascript">alert("productos guardados con èxito");</script> ';
        echo "<script>location.href='admproductos.php'</script>";  
  }



?>

