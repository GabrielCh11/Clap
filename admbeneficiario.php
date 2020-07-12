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

 <script type="text/javascript">

          function Mostrar () {
          document.getElementById("caja").style.display ="block";
          document.getElementById("caja2").style.display ="none";
          document.getElementById("caja3").style.display ="none";
          document.getElementById("caja4").style.display ="block";
  }

          function Ocultar () {
          document.getElementById("caja").style.display ="none";

  }

  //--------------------------------------------------------------------//

          function Mostrar2 () {
          document.getElementById("caja2").style.display ="block";
          document.getElementById("caja").style.display ="none";
          document.getElementById("caja3").style.display ="none"; 
          document.getElementById("caja4").style.display ="block";       
  }

          function Ocultar2 () {
          document.getElementById("caja2").style.display ="none";
  }

//--------------------------------------------------------------------//

          function Mostrar3 () {
          document.getElementById("caja3").style.display ="block";
          document.getElementById("caja").style.display ="none";
          document.getElementById("caja2").style.display ="none";
          document.getElementById("caja4").style.display ="block";
  }

          function Ocultar3 () {
          document.getElementById("caja3").style.display ="none";

  }

          function Mostrar4 () {
          document.getElementById("caja4").style.display ="block";
          document.getElementById("caja").style.display ="none";
          document.getElementById("caja2").style.display ="none";
          document.getElementById("caja3").style.display ="none";

  }

          function Ocultar4 () {
          document.getElementById("caja4").style.display ="none";

  }

 </script>

<!------------------------------------------------------------------------->          
<!-- banner -->

              <div class="header">
                  <div>
                     <img src="img/logo4.png" class="logo1"/>
                 </div>
                  <div>
                      <img src="img/logo2.png" class="logo2"/>
                  </div>
             </div>  

<!-- Cuerpo del admbeneficiario -->

      <div class="section">

            <div class="contenedor6">
                <h3 class="titulo3">BENEFICIARIOS</h3>
            </div>

           <div class="botonera5">

                <button style="font-size: 15px;" class= "boton3" type="submit" value="Ocultar" onclick="Mostrar()">Consultar Beneficiario</button>

                <button style="font-size: 15px" class= "boton4" type="submit" value="Mostrar2" onclick="Mostrar2()">Registrar Beneficiario</button>

                <button style="font-size: 15px" class= "boton5" type="submit" value="Mostrar3" onclick="Mostrar3()" >Modificar Beneficiario</button>

                <a href="menuadm.php">
                <button style="font-size: 15px" class= "boton23" type="button">Regresar</button></a>

           </div>

      </div>

<!----------------------------------Beneficiario----------------------------------> 

<!--codigo del modulo de la consulta-->

          <div id="caja" style="width: 800px; height:0px; background-color:#A30502; border-radius: 10px;border: 3px solid #A30502; position: relative; top: -400px; left: 410px;display: none;">
  

              <div class="tabla" style="position: relative; top: -9px; left: -50px;">

     <?php

      require("conexion.php");

       $cedula= $_SESSION['cedula'];
       $usuario= $_SESSION['usuario'];

    $sql=("SELECT * FROM persona INNER JOIN beneficiario on persona.cedula = beneficiario.id_persona");

   
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
              echo "<td><font color='000000'>$arreglo[8]</font></td>";
              echo "<td><font color='000000'>$arreglo[9]</font></td>";

          echo "</tr>";
        }

        echo "</table>";
  
      ?>

      <button class="boton20" type="button"
         value="Ocultar" onclick="Ocultar()">Cerrar</button>


        </div>


   </div>

<!------------------------------------------------------------------------------->

<!-- Modulo Registrar Beneficiario-->

 <div id="caja2" style="width: 800px; height:0px; background-color:#A30502; border-radius: 10px;border: 3px solid #A30502; position: relative; top: -400px; left: 410px;display: none;">


            <h3 class="titulo5">FORMULARIO DE REGISTRO</h3>
                       
 
   <div class="container">

      <div class="formulario">
       
       <form method="POST" action="beneficiario.php" onsubmit="return validarRegBeneficiaro()" >

         <input type="text" id="nombre" name="nombre" maxlength="30" size="30" placeholder="Nombre" />
          <label for="nombre" >Nombre</label>
    
          <input type="text" id="apellido" name="apellido" maxlength="30" size="30" placeholder="Apellido" />
          <label for="apellido" >Apellido</label>
     
          <input type="text" id="cedula" name="cedula" maxlength="8" size="30" placeholder="Cèdula" />
          <label for="cèdula" >Cèdula</label>

          <input type="text" id="correo" name="correo" maxlength="30" size="30" placeholder="Correo"/>
          <label for="correo" >Correo</label>

          <input type="telèfono" id="telefono" name="telefono" maxlength="11" size="30" placeholder="Telèfono" />
          <label for="telèfono" >Teléfono</label>
          
          <input type="text" id="piso" name="piso" maxlength="2" size="30" placeholder="Piso" />
          <label for="piso" >Piso</label>   

          <input type="text" id="apartamento" name="apartamento" maxlength="2" size="30" placeholder="Apartamento" />
          <label for="apartamento" >Apartamento</label>
  

        </div> 
      </div>
                 <!-- Pie del Registro Beneficiario -->

 <div class="botonera">
    <button style="font-size: 15px" type="submit" class="boton1">Registrar</button>

  
    <button style="font-size:15px " type="button" value="Ocultar2" onclick="Ocultar2()" class="boton2">Cerrar</button>
 </div>

    </form>

 </div>

 <!-------------------------------------------------------------------------------->

<!-- Modulo Modificar Beneficiario-->

 <div id="caja3" style="width: 800px; height:0px; background-color:#A30502; border-radius: 10px;border: 3px solid #A30502; position: relative; top: -400px; left: 410px;display: none;">


            <h3 class="titulo5">MODIFICAR DATOS</h3>
                        
   <div class="container7">

      <div class="formulario">
       
       <form method="POST" action="modbeneficiario.php" onsubmit="return validarModBeneficiario()">

          <input type="text" id="cedulaMod" name="cedula" maxlength="8" size="30" placeholder="Cédula" />
          <label style="position:relative; right: 240px;"" for="cèdula" >Introduza Cédula</label>

          <button style="font-size: 15px" type="submit" class="boton25">Buscar</button>

          <button style="font-size:15px " type="button" value="Ocultar2" onclick="Ocultar3()" class="boton26">Cerrar</button>

        </div> 
      </div>
    </form>
  </div>

 <!---------------------------------------------------------------------------->

<div class="footer2"></div>

<script src="js/validar.js"></script>


</body>
</html>