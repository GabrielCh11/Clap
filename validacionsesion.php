<?php
session_start();
	require("conexion.php");

	$usuario=$_POST['usuario'];
	$pass=$_POST['contraseña'];

  if ($usuario === "" AND $pass === ""){
	echo '<script>alert("Los Campos Están Vacios")</script> ';
	echo "<script>location.href='index.php'</script>";	
	
}else{ 

   if ($usuario === ""){
   echo '<script>alert("El campo Usuario Está Vacio")</script> ';
	echo "<script>location.href='index.php'</script>";

}else{	

    if ($pass === ""){
	   echo '<script>alert("El campo Contraseña Está Vacio")</script> ';
	    echo "<script>location.href='index.php'</script>";

}else{

//Administrador//
	$sql=mysqli_query($mysqli,"SELECT * FROM usuario WHERE usuario='$usuario'");
	if($f=mysqli_fetch_assoc($sql)){
		if($pass==$f['contrasena']){
			if($f['rol']==1){

			    $_SESSION['usuario']=$f['usuario'];
				$_SESSION['cedula']=$f['id_persona'];
				$_SESSION['rol']=$f['rol'];

				echo '<script>alert(" Bienvenido Administrador")</script> ';
				echo "<script>location.href='menuadm.php'</script>";
			}else{ 		

//usuario//

     $sql2=mysqli_query($mysqli,"SELECT * FROM persona WHERE cedula='$usuario'");
       $fpersona=mysqli_fetch_assoc($sql2);

       			$_SESSION['cedula']=$f['id_persona'];
				$_SESSION['usuario']=$fpersona['nombre'];
				$_SESSION['rol']=$f['rol'];

				echo '<script>alert(" Bienvenido Beneficiario")</script> ';
                echo "<script>location.href='menubeneficiario.php'</script>";				
			}

		}else{
			echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
		
			echo "<script>location.href='index.php'</script>";
		}
	}else{
		
		echo '<script>alert("ESTE USUARIO NO EXISTE")</script> ';
		
		echo "<script>location.href='index.php'</script>";	

	 }

   }
  }
 }
?>

