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
          document.getElementById("caja3").style.display ="none";
          document.getElementById("caja").style.display ="none";
          
          
  }

          function Ocultar2 () {
          document.getElementById("caja2").style.display ="none";
  }

  //-----------------------------------------------------------------------//

          function Mostrar3 () {
          document.getElementById("caja3").style.display ="block";
          document.getElementById("caja2").style.display ="none";
          document.getElementById("caja").style.display ="none";
          
          
  }

          function Ocultar3 () {
          document.getElementById("caja3").style.display ="none";
  }
       

</script>

<!------------------------------------------------------------------------->
         
<!-- banner -->

<div class="header">
     <div><img src="img/logo4.png" class="logo1"/></div>
     <div><img src="img/logo2.png" class="logo2"/></div>
</div>  

<!-- Cuerpo del menubeneficiario -->
           
<div class="botonera7">
        
    <button style="font-size: 15px" class= "boton30" type="button" value="Ocultar" onclick="Mostrar()">Consultar Pago</button>

    <button style="font-size: 15px" class= "boton31" type="button" value="Mostrar" onclick="Mostrar2()">Registrar Pago</button>

     <button style="font-size: 15px" class= "boton45" type="button" value="Mostrar" onclick="Mostrar3()">Eliminar Pago</button>

    <a href="menubeneficiario.php">
    <button style="font-size: 15px" class= "boton32" type="button">Regresar</button></a>

</div>
         
<div class="contenedor9">
     <h3 class="titulo7">PAGOS</h3>
</div>

<!------------------------------------------------------------------------->

<!--Consulta Pago-->

         <div id="caja" style="width: 800px; height:0px; background-color:#A30502; border-radius: 10px;border: 3px solid #A30502; position: relative; top: -389px; left: 430px;display: none;">
  

         <div class="tabla" style="position: relative; top: 30px; left: -50px;">

     <?php

 require("conexion.php");

  
    $cedula = $_SESSION['cedula'];
    $sql=("SELECT * FROM pago WHERE id_beneficiario=$cedula ");
  
        $query=mysqli_query($mysqli,$sql);
        $existe=mysqli_num_rows($query);
              if($existe>0){

         echo "<table>";
         echo "<tr>";
          
      echo "<th>Referencia</th>";
      echo "<th>Cedula</th>";
      echo "<th>Fecha Del Pago</th>";
      echo "<th>Recibido<th>";

               echo "</tr>";   
          
      ?>

          
      <?php 
         while($arreglo=mysqli_fetch_array($query)){
          

              echo "<td><font color='000000'>$arreglo[1]</font></td>";
              echo "<td><font color='000000'>$arreglo[2]</font></td>";
              echo "<td><font color='000000'>$arreglo[3]</font></td>";
              
                
                if ($arreglo[4]==0) {
                  echo "<td><div><img src='iconos/closed2.png' class='cerrar'/></div></td>";
                } else {
  
                   echo "<td><div><img src='iconos/verificar2.png' class='cerrar'/></div></td>";
                  }
              
     
          echo "</tr>";
        }

        echo "</table>";

        }else{
                  
            echo "<div class='msg' <h3>No hay Referencias que mostrar</h3></div>";

          }
  
      ?>

      <button class="boton36" type="button"
         value="Ocultar2" onclick="Ocultar()">Cerrar</button>
            
        </div>
    </div>


<!------------------------------------------------------------------------->

<!-- Modulo Registrar Pago-->

<div id="caja2" style="width: 800px; height:0px; background-color:#A30502; border-radius: 10px;border: 3px solid #A30502; position: relative; top: -390px; left: 400px;display: none;">


        <h3 class="titulo6">REGISTRAR REFERENCIA DEL PAGO</h3>
                       
  
   <div class="container3">

       <form method="POST" action="pago.php" onsubmit="return validarRegreferencia()">

         <input style="position: relative; left: 155px;" type="text" id="referencia" name="referencia" maxlength="12" size="30" placeholder="000000000000" />
          <label style="position: relative; right:250px;" for="nombre" >Nº DE REFERENCIA</label>


    <button style="font-size: 15px" type="submit" class="boton28">Registrar</button>

    <button style="font-size:15px " type="button" value="Ocultar" onclick="Ocultar2()" class="boton35">Cerrar</button>

      
   </form>
</div>
            <p class="mensaje">*Todos los pagos deben realizarse a través del Banco de Venezuela</p>
</div>


<!------------------------------------------------------------------------->

<!-- Modulo Eliminar Pago-->

<div id="caja3" style="width: 800px; height:0px; background-color:#A30502; border-radius: 10px;border: 3px solid #A30502; position: relative; top: -390px; left: 400px;display: none;">


        <h3 class="titulo6">ELIMINAR REFERENCIA DEL PAGO</h3>
                       
  
   <div class="container3">

       <form method="POST" action="EliminarPago.php" onsubmit="return validareliminar() ">

         <input style="position: relative; left: 155px;" type="text" id="eliminarReferencia" name="eliminarReferencia" maxlength="12" size="30" placeholder="000000000000" />
          <label style="position: relative; right:250px;" for="nombre" >Nº DE REFERENCIA</label>


    <button style="font-size: 15px" type="submit" class="boton28">Eliminar</button>

    <button style="font-size:15px " type="button" value="Ocultar" onclick="Ocultar3()" class="boton35">Cerrar</button>

      
   </form>
</div>
            <p class="mensaje">*Recuerde que no podra eliminar referencias ya validadas por el administrador</p>
</div>


<!------------------------------------------------------------------------->


<div class="footer2"></div>
<script src="js/validar.js"></script>


 </body>
 </html>                   