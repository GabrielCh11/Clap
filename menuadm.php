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
          document.getElementById("caja2").style.display ="none";
         
  }

          function Ocultar () {
          document.getElementById("caja").style.display ="none";

  }

          function Mostrar2 () {
          document.getElementById("caja2").style.display ="block";
           document.getElementById("caja").style.display ="none";
  }

          function Ocultar2 () {
          document.getElementById("caja2").style.display ="none";

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
  
              <button style="font-size: 15px" value="Mostrar2" onclick="Mostrar2()" class= "boton18" type="submit">Imprimir Reporte</button>
            
              <button style="font-size: 15px" class= "boton19" type="submit" value= "Mostrar" onclick="Mostrar()">Asignaciones</button>
           </div>
         </div> 
       </div>

<!------------------------------------------------------------------------->      

<!--codigo de los botones de los reportes-->

   <div id="caja2" style="width: 800px; height:0px; background-color:#A30502; border-radius: 10px;border: 3px solid #A30502; position: relative; top: -425px; left: 420px;display: none;">

      <div class="container9">
        <form method="POST" action="reporteadm.php">
           <input type="hidden" name="cedula" value= <?php  echo $_SESSION['cedula']?> >
           <input type="hidden" name="usuario" value= <?php  echo $_SESSION['usuario']?> >
           <button style="font-size: 15px" class= "boton42" type="submit">Entregas</button>
        </form>

      <form method="POST" action="reporteadmproductos.php">
         <button style="font-size: 15px" class= "boton43" type="submit">Productos</button>
      </form>
     </div>

      <button class="boton44" value="Ocultar2" onclick="Ocultar2()" type="button">Cerrar</button>
  </div>


<!------------------------------------------------------------------------->      

<!--codigo del modulo de asignacion-->

<div id="caja" style="width: 800px; height:0px; background-color:#A30502; border-radius: 10px;border: 3px solid #A30502; position: relative; top: -425px; left: 410px;display: none;">
  <form method="POST" action="asignacion.php">
  
    <div class="tabla" style="position: relative; top: -20px; left: -70px;">

       <?php

         require("conexion.php");

           $sql=("SELECT * FROM pago WHERE entrega='0'");
  
            $query=mysqli_query($mysqli,$sql);

            $existe=mysqli_num_rows($query);
              if($existe>0){

            echo "<table>";
            echo "<tr>";
            echo "<th>Referencia</th>";
            echo "<th>Cedula</th>";
            echo "<th>Fecha de Pago</th>";
            echo "<th>Entregado</th>";

            echo "</tr>";   
                   while($arreglo=mysqli_fetch_array($query)){
         
           echo "<td><font color='000000'>$arreglo[1]</font></td>";
           echo "<td><font color='000000'>$arreglo[2]</font></td>";
           echo "<td><font color='000000'>$arreglo[3]</font></td>";
           echo "<td><div><input type=checkbox name='$arreglo[0]' id='checkbox'id='checkbox' value='1' class='chequeo'/></div></td>"; 

           echo "</tr>";
        }

           echo "</table>";
           echo "<button class='boton41' type='submit'>Asignar</button>";
          }else{
          
            echo "<h3>No hay Beneficiarios que Asignar</h3>";

          }
  
        ?>

         <button class="boton16" value="Ocultar" onclick="Ocultar()" type="button">Cerrar</button>

    </div>
</div>

</form>
<!------------------------------------------------------------------------->      
  <div class="footer2"></div>

</body>
</html>