<?php
  session_start();
  require("conexion.php");

 $entendilareferencia = $_POST ['eliminarReferencia'];
 $hoy = getdate();
  $mes = $hoy['mon'];
  $year = $hoy['year'];
  $cedula = $_SESSION['cedula'];

  if ($entendilareferencia === ""){
   echo '<script>alert("El campo de Referencia Está Vacio")</script> ';
   echo "<script>location.href='benepago.php'</script>";
    
}else{
//tabla asignacion
 $queryAsig =mysqli_query($mysqli,"SELECT * FROM asignacion WHERE id_pago='$entendilareferencia' AND id_fecha BETWEEN '$year-$mes-01' AND '$year-$mes-31'");

 $nroAsig=mysqli_num_rows($queryAsig);

//tabla pago
 $entendi =mysqli_query($mysqli,"SELECT * FROM pago WHERE referencia='$entendilareferencia' AND fecha_pago BETWEEN '$year-$mes-01' AND '$year-$mes-31' AND id_beneficiario=$cedula ");

 $numeroreferencia=mysqli_num_rows($entendi);
echo "$nroAsig";
      if($numeroreferencia==0){

        echo ' <script language="javascript">alert("Atención, este número de referencia no se encuentra registrado, verifique e intente con otro o es del mes anterior");</script> ';

       echo "<script>location.href='menubeneficiario.php'</script>";
    
    }else if($nroAsig>0){

        echo ' <script language="javascript">alert("Atención, no puede eliminar referencias ya validadas por el administrador");</script> ';

       echo "<script>location.href='menubeneficiario.php'</script>";
     }else{
        
        mysqli_query($mysqli,"DELETE FROM pago WHERE referencia = '$entendilareferencia'");

         echo ' <script language="javascript">alert("Registro eliminado con éxito");</script> ';

        echo "<script>location.href='menubeneficiario.php'</script>";
   
      
        }
      } 
 ?>

