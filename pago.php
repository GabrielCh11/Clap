<?php
  session_start();
  require("conexion.php");

 $entendilareferencia = $_POST ['referencia'];
 $hoy = getdate();
  $mes = $hoy['mon'];
  $year = $hoy['year'];
  $cedula = $_SESSION['cedula'];

  $query=mysqli_query($mysqli,"SELECT * FROM producto WHERE fecha BETWEEN '$year-$mes-01' AND '$year-$mes-31'");

   while($arreglo=mysqli_fetch_array($query)){
  $fecha_caja = $arreglo[2];
  }


  if ($entendilareferencia === ""){
   echo '<script>alert("El campo de Referencia Está Vacio")</script> ';
   echo "<script>location.href='benepago.php'</script>";
    
}else{

//tabla pago
 $entendi =mysqli_query($mysqli,"SELECT * FROM pago WHERE referencia='$entendilareferencia'OR fecha_pago BETWEEN '$year-$mes-01' AND '$year-$mes-31' AND id_beneficiario=$cedula ");

 $numeroreferencia=mysqli_num_rows($entendi);

//tabla produto
 $queryp =mysqli_query($mysqli,"SELECT * FROM producto WHERE fecha BETWEEN '$year-$mes-01' AND '$year-$mes-31'");

 $nropago=mysqli_num_rows($queryp);

      if($numeroreferencia>0){

        echo ' <script language="javascript">alert("Atención, este número de referencia está registrado, verifique e intente con otro o ya se registró el mes anterior");</script> ';

       echo "<script>location.href='menubeneficiario.php'</script>";

      }else if($nropago==0){

        echo ' <script language="javascript">alert("Atención, debe esperar a que el administrador asigne la caja del presente mes");</script> ';

       echo "<script>location.href='menubeneficiario.php'</script>";
     }else{
        
        mysqli_query($mysqli,"INSERT INTO pago VALUES('','$entendilareferencia','$cedula',NOW(),'0','$fecha_caja')");

         echo ' <script language="javascript">alert("Registro de Referencia exitoso");</script> ';

        echo "<script>location.href='menubeneficiario.php'</script>";
          
        }
      } 
 ?>

