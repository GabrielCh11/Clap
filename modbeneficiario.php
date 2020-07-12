<?php 
session_start();

 if (isset($_SESSION['rol'])!=1){ 
  echo "<script>location.href='index.php'</script>";  
  }
  ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>CLAP "Manuel Antonio Carreño"</title>
   <link rel="stylesheet" type="text/css" href="css/maquillaje.css">
</head>

<body>

<!----------------------------------------------------------------------------->          
<!-- banner -->

              <div class="header">
                  <div>
                     <img src="img/logo4.png" class="logo1"/>
                 </div>
                  <div>
                      <img src="img/logo2.png" class="logo2"/>
                  </div>
             </div>

<!-- Cuerpo del modbeneficiario -->

<div class="section">  

                <h3 class="titulo">MODIFICAR DATOS</h3>

<div class="border" style="width: 800px; height:0px; background-color:#A30502; border-radius: 10px;border: 3px solid #A30502; position: relative; top: -17px; left: 310px;">

</div>

    <form method="POST" action="modificar.php" onsubmit="return validarMod()">

  <?php
 
  require("conexion.php");
   $cedula=$_POST['cedula'];

   if ($cedula === ""){
   echo '<script>alert("Porfavor Introduzca la Cédula del Beneficiario a Modificar")</script> ';
   echo "<script>location.href='admbeneficiario.php'</script>";
    
    }else{

          if($cedula ==''){
            $cedula = 9987987879878979;
          }

          $sql=("SELECT P.*, B.piso, B.apartamento, B.id FROM persona P, beneficiario B WHERE P.cedula='$cedula' and B.id_persona='$cedula'");
  
          $query=mysqli_query($mysqli,$sql);

           echo "<div class=container8>";
  ?>
       
   <?php 
         $existe = mysqli_num_rows($query);
         if($existe>0){

         $beneficiario=mysqli_fetch_array($query);

         echo"<input type='hidden' id='id$beneficiario[0]' name='idPersona' maxlength='30' size='30' value='$beneficiario[0]' />";

         echo"<input type='hidden' id='id$beneficiario[0]' name='idBeneficiario' maxlength='30' size='30' value='$beneficiario[8]' />";
          
          echo"<input type='text' id='name1' name='nombre' maxlength='30' size='30' placeholder='Nombre' value='$beneficiario[2]' />";
          echo "<label for='$beneficiario[0]' >Nombre </label>";

          echo"<input type='text' id='surname' name='apellido' maxlength='30' size='30' placeholder='Apellido' value='$beneficiario[3]' />";
          echo "<label for='apellido$beneficiario[0]' >Apellido </label>";

          echo"<input type='text' id='cedula' name='cedula' maxlength='8' size='30' placeholder='Cedula' value='$beneficiario[1]' disabled='true' />";
          echo "<label for='cedula$beneficiario[0]' >Cédula </label>";

          echo"<input type='text' id='email' name='correo' maxlength='30' size='30' placeholder='Correo' value='$beneficiario[4]' />";
           echo "<label for='correo$beneficiario[0]' >Correo </label>";

           echo"<input type='text' id='movil' name='telefono' maxlength='11' size='30' placeholder='Telefono' value='$beneficiario[5]' />";
           echo "<label for='correo$beneficiario[0]' >Teléfono </label>";

           echo"<input type='text' id='suelo' name='piso' maxlength='2' size='30' placeholder='Piso' value='$beneficiario[6]' />";
           echo "<label for='piso$beneficiario[0]' >Piso </label>";

           echo"<input type='text' id='casa' name='apartamento' maxlength='2' size='30' placeholder='Apartamento' value='$beneficiario[7]'/>";
           echo "<label for='apartamento$beneficiario[0]' >Apartamento </label>";
        

           echo "</div>";

         }else{

          echo ' <script language="javascript">alert("No existe Ningún Beneficiario asociado con esta Cédula");</script> ';
          echo "<script>location.href='admbeneficiario.php'</script>";
         }
        }
   ?>

<!-- Pie del modificar Beneficiario -->

            <div class="botonera1">
                  <button style="font-size: 15px" type="submit" class="boton39">Modificar</button>

                   <a href="admbeneficiario.php">
                   <button style="font-size: 15px" type="button" class="boton40">Regresar</button></a>
            </div>
  </form>
</div>

<!--------------------------------------------------------------------------------->

<div class="footer2"></div>
<script src="js/validar.js"></script>

</body>
</html>





