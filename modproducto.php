<?php
  session_start();
  require("conexion.php");

foreach($_POST as $id=>$cantidad){
  
  mysqli_query($mysqli," UPDATE producto SET cantidad='$cantidad' WHERE id='$id'");
}
    echo ' <script language="javascript">alert("productos modificados con èxito");</script> ';
        echo "<script>location.href='admproductos.php'</script>";
      
      ?>