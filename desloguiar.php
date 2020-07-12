<?php 
session_start();
if($_SESSION['usuario']){	
	session_destroy();
	echo '<script language="javascript">alert("Ha Cerrado la Sesion");</script> ';
	 echo "<script>location.href='index.php'</script>";
}
else{
    echo "<script>location.href='index.php'</script>";
}
?>