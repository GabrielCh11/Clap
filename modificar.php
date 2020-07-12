 <?php
session_start();
	require("conexion.php");

	$idPersona=$_POST['idPersona'];
	$idBeneficiario=$_POST['idBeneficiario'];
    $nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$correo=$_POST['correo'];
	$telefono=$_POST['telefono'];
	$piso=$_POST['piso'];
	$apartamento=$_POST['apartamento'];


	mysqli_query($mysqli," UPDATE persona SET nombre='$nombre', apellido='$apellido', correo='$correo', telefono='$telefono'  WHERE id='$idPersona'");

	mysqli_query($mysqli," UPDATE beneficiario SET piso='$piso', apartamento='$apartamento' WHERE id='$idBeneficiario'");

	echo '<script language="javascript">alert("El Beneficario fue modificado con èxito");</script> ';
    echo "<script>location.href='admbeneficiario.php'</script>";
	


?>