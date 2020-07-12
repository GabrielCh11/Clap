<?php

session_start();
	require("conexion.php");

	$anterior=$_POST['anterior'];
	$nueva=$_POST['nueva'];
	$repetir=$_POST['repetir'];
    $cedula = $_SESSION['cedula'];

    if ($anterior === ""){
   echo '<script>alert("Debe introducir la contraseña anterior")</script> ';
   echo "<script>location.href='menubeneficiario.php'</script>";

}else{

	if ($nueva === ""){
   echo '<script>alert("Debe introducir la Contraseña nueva")</script> ';
   echo "<script>location.href='menubeneficiario.php'</script>";

}else{

	if ($repetir === ""){
   echo '<script>alert("Debe repetir la nueva contraseña para verificar")</script> ';
   echo "<script>location.href='menubeneficiario.php'</script>";

}else{

	$sql=mysqli_query($mysqli,"SELECT * FROM usuario WHERE id_persona='$cedula'");
	$usuariotb=mysqli_fetch_assoc($sql);
		if($anterior==$usuariotb['contrasena']){
			if($nueva==$repetir){
			
				mysqli_query($mysqli,"UPDATE usuario SET contrasena = '$nueva' WHERE id_persona='$cedula'");

				echo '<script>alert(" Cambio de contraseña Exitoso")</script> ';
				echo "<script>location.href='menubeneficiario.php'</script>";

			}else{ 

				echo '<script>alert(" Error las contraseñas no coinciden")</script> ';
                echo "<script>location.href='menubeneficiario.php'</script>";				
			}

		}else{
			echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
		
			echo "<script>location.href='menubeneficiario.php'</script>";
		}
	}	
	
  }
 }	
?>