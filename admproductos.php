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
  }

          function Ocultar () {
          document.getElementById("caja").style.display ="none";

  }

  //---------------------------------------------------------------------------//

          function Mostrar2 () {
          document.getElementById("caja2").style.display ="block";
          document.getElementById("caja").style.display ="none";
          document.getElementById("caja3").style.display ="none";        
  }

          function Ocultar2 () {
          document.getElementById("caja2").style.display ="none";
  }

//-----------------------------------------------------------------------------//

          function Mostrar3 () {
          document.getElementById("caja3").style.display ="block";
          document.getElementById("caja").style.display ="none";
          document.getElementById("caja2").style.display ="none";
  }

          function Ocultar3 () {
          document.getElementById("caja3").style.display ="none";

  }

 </script>


<!-------------------------------------------------------------------------------->          
<!-- banner -->

<div class="header">
          <div>
            <img src="img/logo4.png" class="logo1"/>
          </div>
         <div>
            <img src="img/logo2.png" class="logo2"/>
         </div>
</div>  

<!-- Cuerpo del admproducto -->

<div class="section">

           <div class="contenedor8">
                <h3 class="titulo3">PRODUCTOS</h3>
            </div>

     <div class="botonera6">

             <button style="font-size: 15px" class="boton6" type="submit" value="Mostrar" onclick="Mostrar()">Consultar Productos</button>
            
              <button style="font-size: 15px" class= "boton7" type="submit" value="Mostrar2" onclick="Mostrar2()">Registrar Productos</button>

              <button style="font-size: 15px" class= "boton17" type="submit" value="Mostrar3" onclick="Mostrar3()">Modificar Productos</button>

              <a href="menuadm.php">
              <button style="font-size: 15px" class= "boton24" type="button">Regresar</button></a>

      </div>

    </div>

<!----------------------------------Producto--------------------------------------->

<!--Consulta Producto-->

         <div id="caja" style="width: 800px; height:0px; background-color:#A30502; border-radius: 10px;border: 3px solid #A30502; position: relative; top: -400px; left: 410px;display: none;">
  

         <div class="tabla" style="position: relative; top: 7px; left: -50px;">

<?php

 require("conexion.php");


  
  $hoy = getdate();
  $mes = $hoy['mon'];
  $year = $hoy['year'];


  $query=mysqli_query($mysqli,"SELECT * FROM producto WHERE fecha BETWEEN '$year-$mes-01' AND '$year-$mes-31'");

   $existe=mysqli_num_rows($query);
              if($existe>0){

         echo "<table>";
         echo "<tr>";
         echo "<th>Producto</th>";
         echo "<th>Fecha</th>";
         echo "<th>Cantidad</th>";


               echo "</tr>";   
          
      ?>
       
      <?php 
         while($arreglo=mysqli_fetch_array($query)){
          

              echo "<td><font color='000000'>$arreglo[1]</font></td>";
              echo "<td><font color='000000'>$arreglo[2]</font></td>";
              echo "<td><font color='000000'>$arreglo[3]</font></td>";

          echo "</tr>";
        }

        echo "</table>";

        }else{
                  
            echo "<div class='message' <h3>No hay productos registrados para este mes</h3></div>";

          }
  
      ?>

      <button class="boton36" type="button"
         value="Ocultar" onclick="Ocultar()">Cerrar</button>
            
        </div>
    </div>

<!-------------------------------------------------------------------------------->

<!-- Modulo Registrar producto-->

<div id="caja2" style="width: 800px; height:0px; background-color:#A30502; border-radius: 10px;border: 3px solid #A30502; position: relative; top: -400px; left: 410px;display: none">

               <h3 class="titulo1">REGISTRAR PRODUCTOS</h3>


<div class="container1">

               <form method="POST" action="productos.php" onsubmit="return RegProductos()"> 
<?php


       require("conexion.php");

  $sql=("SELECT * FROM almacen");
  
  $query=mysqli_query($mysqli,$sql);

         echo "<div class='container2'>&nbsp PRODUCTOS &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCANTIDAD<br><br>";                  
?>

<?php

         while($arreglo=mysqli_fetch_array($query)){
            
              echo "<input type='text' id='comida' name='$arreglo[0]' maxlength='2' size='30' placeholder='Cantidad'/>";
              echo "<label for='$arreglo[0]' >$arreglo[1]</label>"; 
        }

        echo "</div>";
  
      ?>

<!-- Pie del Registro Productos -->

          <div class="botonera3">
              <button style="font-size: 17px" type="submit" class="boton9">Registrar</button>

 
               <button style="font-size:17px " type="button" class="boton10" value="Ocultar2" onclick="Ocultar2()">Cerrar</button>

          </div>
       </form>
   </div>
</div>

<!---------------------------------------------------------------------------------->

<!-- Modulo modificar producto-->

<div id="caja3" style="width: 800px; height:0px; background-color:#A30502; border-radius: 10px;border: 3px solid #A30502; position: relative; top: -400px; left: 410px;display: none">

               <h3 class="titulo8">MODIFICAR PRODUCTOS</h3>


<div class="container6">

               <form method="POST" action="modproducto.php" onsubmit="return validarModproductos()"> 
<?php


 require("conexion.php");

  $hoy = getdate();
  $mes = $hoy['mon'];
  $year = $hoy['year'];
  $cedula = $_SESSION['cedula'];

 $sql =("SELECT * FROM producto WHERE fecha BETWEEN '$year-$mes-01' AND '$year-$mes-31'");
  
  $query=mysqli_query($mysqli,$sql);

         echo "<div class='container5'>&nbsp PRODUCTOS &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCANTIDAD<br><br>";                  
?>

<?php

         while($arreglo=mysqli_fetch_array($query)){
            
              echo "<input value='$arreglo[3]' type='text' id='articulos' name='$arreglo[0]' maxlength='2' size='30' placeholder='Cantidad'/>";
              echo "<label for='$arreglo[0]' >$arreglo[1]</label>"; 
        }

        echo "</div>";
  
      ?>

<!-- Pie del Modificar Productos -->

          <div class="botonera8">
              <button style="font-size: 17px" type="submit" class="boton37">Aceptar</button>

 
               <button style="font-size:17px " type="button" class="boton38" value="Ocultar3" onclick="Ocultar3()">Cerrar</button>

          </div>
       </form>
   </div>
</div>

<!--------------------------------------------------------------------------------->    
<div class="footer2"></div>
<script src="js/validar.js"></script>

</body>
</html>