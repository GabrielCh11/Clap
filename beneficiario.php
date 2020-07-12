<?php
  session_start();
  require("conexion.php");

  $cedula=$_POST['cedula'];
  $nombre=$_POST['nombre'];
  $apellido=$_POST['apellido'];
  $correo=$_POST['correo'];
  $telefono=$_POST['telefono'];
  $piso=$_POST['piso'];
  $apartamento=$_POST['apartamento'];
  
   if ($nombre === "" AND $apellido === "" AND $cedula === "" AND $correo === "" AND $telefono === "" AND $piso ==="" AND $apartamento === ""){
  echo '<script>alert("Los Campos Están Vacios")</script> ';
  echo "<script>location.href='admbeneficiario.php'</script>";

  }else{

  if ($nombre === ""){
   echo '<script>alert("El campo Nombre Está Vacío")</script> ';
   echo "<script>location.href='admbeneficiario.php'</script>";
    
}else{

   if ($apellido === ""){
   echo '<script>alert("El campo Apellido Está Vacio")</script> ';
   echo "<script>location.href='admbeneficiario.php'</script>";

}else{

  if ($cedula === ""){
   echo '<script>alert("El campo Cèdula Está Vacio")</script> ';
   echo "<script>location.href='admbeneficiario.php'</script>";

}else{

  if ($correo === ""){
   echo '<script>alert("El campo Correo Está Vacio")</script> ';
   echo "<script>location.href='admbeneficiario.php'</script>";

}else{

  if ($telefono === ""){
   echo '<script>alert("El campo Teléfono Está Vacio")</script> ';
   echo "<script>location.href='admbeneficiario.php'</script>";

}else{

  if ($piso === ""){
   echo '<script>alert("El campo Piso Está Vacio")</script> ';
   echo "<script>location.href='admbeneficiario.php'</script>";

}else{

  if ($apartamento === ""){
   echo '<script>alert("El campo apartamento Está Vacio")</script> ';
   echo "<script>location.href='admbeneficiario.php'</script>";

}else{

    $existe=mysqli_query($mysqli,"SELECT * FROM persona WHERE cedula='$cedula'");
     $numeroPersonas=mysqli_num_rows($existe);
      if($numeroPersonas>0){
        
        echo ' <script language="javascript">alert("Atencion, ya existe un Beneficiario con la misma cedula, verifique sus datos");</script> ';
        echo "<script>location.href='admbeneficiario.php'</script>";
      }else {
        
        mysqli_query($mysqli,"INSERT INTO persona VALUES('','$cedula','$nombre','$apellido','$correo','$telefono')");

        mysqli_query($mysqli,"INSERT INTO usuario VALUES('','$cedula','$cedula','$cedula','$2')");

        mysqli_query($mysqli,"INSERT INTO beneficiario VALUES('','$cedula','$piso','$apartamento')");
        
        echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
        echo "<script>location.href='admbeneficiario.php'</script>";
        }
       }
      }
     }
    }
   }
  }
 }
}


