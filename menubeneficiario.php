<?php 
session_start();

 if ($_SESSION['rol']!=0){ 
  echo "<script>location.href='index.php'</script>";  
  }
  ?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
    <title>CLAP "Manuel Antonio Carreño"</title>
	<link rel="stylesheet" type="text/css" href="css/maquillaje.css">

</head>
<body>

  <script type="text/javascript">

//--------------------------------------------------------------------//    

          function Mostrar () {
          document.getElementById("caja").style.display ="block";
          document.getElementById("caja2").style.display ="none";
          document.getElementById("caja3").style.display ="none";
  }

          function Ocultar () {
          document.getElementById("caja").style.display ="none";

  }

//-----------------------------------------------------------------------//

          function Mostrar2 () {
          document.getElementById("caja2").style.display ="block";
          document.getElementById("caja").style.display ="none";
          document.getElementById("caja3").style.display ="none";
          
  }

          function Ocultar2 () {
          document.getElementById("caja2").style.display ="none";
  }

</script>

<!------------------------------------------------------------------------->
         
<!-- banner -->

<div class="header">
     <div><img src="img/logo4.png" class="logo1"/></div>
     <div><img src="img/logo2.png" class="logo2"/></div>
</div>  

<!-- Cuerpo del menubeneficiario -->

<div class="section">
     <div class="contenedor1">

     <div style="width: 5px; height: 5px; position: relative;" class="sesiones"> 
     <h2>Bienvenido</h2>
</div>

<div style="width: 5px; height: 5px; position: relative; font-size: 20px;" class="sesion">
     <?php  echo $_SESSION['usuario']?>
</div>

<a href="desloguiar.php">
   <button style="font-size: 15px" class= "boton8" type="submit">Cerrar Sesiòn</button></a>
   <img src="img\person.png" class="icono" />

   </div>
              
<div class="botonera4">
        
    <button style="font-size: 15px" class= "boton11" type="button" value="Ocultar" onclick="Mostrar2()">Datos del Perfil</button>

    <button style="font-size: 15px" class= "boton12" type="button" value="Mostrar" onclick="Mostrar()">Cambiar Contraseña</button>
    
    <a href="benepago.php">
    <button style="font-size: 15px" class= "boton13" type="button">Pago</button></a>
   
     <form method="POST" action="reportebeneficiario.php">
       <input type="hidden" name="cedula" value= <?php  echo $_SESSION['cedula']?> >
       <button style="font-size: 15px" class= "boton27" type="submit">Imprimir Reporte</button>
    </form>

</div>
         
<div class="contenedor4">
     <h3 class="titulo2">MENU</h3>
</div>

<!------------------------------------------------------------------------->
<!--codigo del modulo para cambiar la contraseña-->

<center>

         <section id="caja" style="width: 800px; height:0px; background-color:#A30502; border-radius: 10px;border: 3px solid #A30502; position: relative; top: -425px; left: 160px;display: none;">

  <form method="POST" action="contranueva.php" onsubmit="return validarcontra()">
   
         <p style="position: relative; top: 0px; right: -15px; font-size:17px;">Contraseña Anterior<input type="password" maxlength="8" name="anterior" id="anterior" style="position: relative; left: 12px;"></p>
        
        <p style="position: relative; top: 0px; right: -15px; font-size:17px;">Contraseña Nueva<input type="password" maxlength="8" name="nueva" id="nueva"  style="position: relative; left: 20px;"></p>

        <p style="position: relative; top: 0px; right: -15px; font-size:17px;">Repita Contraseña<input type="password" maxlength="8" name="repetir" id="repetir"  style="position: relative; left: 20px;"></p>

         <button class="boton14" type="submit" name="cedula">Aceptar</button>
  </form>
          <button class="boton15" type="button"
         value="Ocultar" onclick="Ocultar()">Cerrar</button>

         <p class="mensaje2">*La contraseña debe contener un máximo de 8 caracteres entre alfanuméricos y símbolos.</p>

         </section>

  </center>

<!------------------------------------------------------------------------->

<!--codigo del modulo datos de perfil-->


         <div id="caja2" style="width: 800px; height:0px; background-color:#A30502; border-radius: 10px;border: 3px solid #A30502; position: relative; top: -425px; left: 430px;display: none;">
  

         <div class="tabla" style="position: relative; top: 7px; left: -20px;">

 <?php

 require("conexion.php");

   $cedula= $_SESSION['cedula'];
    $usuario= $_SESSION['usuario'];

    $sql=("SELECT P.*, B.piso, B.apartamento, B.id FROM persona P, beneficiario B WHERE P.cedula='$cedula' and B.id_persona='$cedula'");
  
        $query=mysqli_query($mysqli,$sql);

         echo "<table>";
         echo "<tr>";
          
      echo "<th>Cedula</th>";
      echo "<th>Nombre<br</th>";
      echo "<th>Apellido<br</th>";
      echo "<th>Correo</th>";
      echo "<th>Telefono</th>";
      echo "<th>Piso</th>";
       echo "<th>Apartamento</th>";
            
               echo "</tr>";   
          
      ?>

          
      <?php 
         while($arreglo=mysqli_fetch_array($query)){
          

              echo "<td><font color='000000'>$arreglo[1]</font></td>";
              echo "<td><font color='000000'>$arreglo[2]</font></td>";
              echo "<td><font color='000000'>$arreglo[3]</font></td>";
              echo "<td><font color='000000'>$arreglo[4]</font></td>";
              echo "<td><font color='000000'>$arreglo[5]</font></td>";
              echo "<td><font color='000000'>$arreglo[6]</font></td>";
              echo "<td><font color='000000'>$arreglo[7]</font></td>";
     
          echo "</tr>";
        }

        echo "</table>";
  
      ?>

      <button class="boton16" type="button"
         value="Ocultar" onclick="Ocultar2()">Cerrar</button>

            

        </div>


   </div>
</div>

<!------------------------------------------------------------------------->

<div class="footer2"></div>
<script src="js/validar.js"></script>


 </body>
 </html>                   