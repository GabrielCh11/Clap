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
               <title>CLAP "Manuel Antonio Carreño"</title>
               <link rel="stylesheet" type="text/css" href="css/maquillaje.css">
            </head>
    <body>

<script type="text/javascript">

//--------------------------------------------------------------------//    

          function Mostrar () {
          document.getElementById("caja").style.display ="block";
         
  }

          function Ocultar () {
          document.getElementById("caja").style.display ="none";

  }

  </script>
<!----------------------------------------------------------------------->

<!-- banner -->

             <div class="header">
                <div><img src="img/logo4.png" class="logo1"/></div>
                <div><img src="img/logo2.png" class="logo2"/></div>
             </div>  

<!-- Cuerpo del menuadm -->

<div class="section">

      <div class="contenedor1">

        <div style="width: 5px; height: 5px;" class="sesiones">   
                <h2>Bienvenido</h2>
        </div>

        <div style="width: 5px; height: 5px; position: relative; font-size: 20px;" class="sesion">
                  <?php  echo $_SESSION['usuario']?>
        </div>

            <a href="desloguiar.php">
            <button style="font-size: 15px" class= "boton8" type="button">Cerrar Sesiòn</button></a>
            <img src="img\person2.png" class="icono"/>
      
      </div>

      <div class="contenedor5">
           <h3 class="titulo2">MENU</h3>
       </div>
              
           <div class="botonera2">

              <a href="admbeneficiario.php">
              <button style="font-size: 15px" class= "boton21" type="submit">Beneficiarios</button></a>

              <a href="admproductos.php">
              <button style="font-size: 15px" class= "boton22" type="submit">Productos</button></a>

              <button style="font-size: 15px" class= "boton18" type="submit">Imprimir Reporte</button>

              <button style="font-size: 15px" class= "boton19" type="submit" value= "Mostrar" onclick="Mostrar()">Asignaciones</button>
           </div>
         </div> 
       </div>

<!------------------------------------------------------------------------->       
<!--codigo del modulo de asignacion-->

<div id="caja" style="width: 800px; height:0px; background-color:#A30502; border-radius: 10px;border: 3px solid #A30502; position: relative; top: -425px; left: 323px;display: none;">

  <form method="POST" action="asignacion.php"></form>
  
    <div class="tabla" style="position: relative; top: 7px; left: -110px;">

       <?php

         require("conexion.php");


           $sql=("SELECT * FROM pago ");
  
            $query=mysqli_query($mysqli,$sql);

            echo "<table>";
            echo "<tr>";
            echo "<th>Referencia</th>";
            echo "<th>Cedula</th>";
            echo "<th>Fecha de Pago</th>";
            echo "<th>Entregado</th>";

            

            echo "</tr>";   
          
        ?>

       <?php 

         while($arreglo=mysqli_fetch_array($query)){
          
           echo "<td><font color='000000'>$arreglo[1]</font></td>";
           echo "<td><font color='000000'>$arreglo[2]</font></td>";
           echo "<td><font color='000000'>$arreglo[3]</font></td>";
           echo "<td><div><input type=checkbox name='checkbox[]' id='checkbox'id='checkbox' value='si' class='chequeo'/></div></td>"; 

      
           echo "</tr>";
        }

           echo "</table>";
  
        ?>

      <button class="boton16" type="button"
         value="Ocultar" onclick="Ocultar()">Cerrar</button>

    </div>
</div>

</form>
<!------------------------------------------------------------------------->      
  <div class="footer2"></div>

</body>
</html>




































   </div>
<!--------------------------------------------------------------------------------->

<div class="footer2"></div>


</body>
</html>