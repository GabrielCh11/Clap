<!DOCTYPE html>
<html>
            <head>
                  <meta charset="utf-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                  <title>CLAP "Manuel Antonio Carreño"</title>
	                <link rel="stylesheet" type="text/css" href="css/maquillaje.css">
            </head>
  <body>

<!-- banner -->

               <div class="header">
                  <div><img src="img/logo4.png" class="logo1"/></div>
                  <div><img src="img/logo2.png" class="logo2"/></div>
               </div>  

<!-- Cuerpo del index -->

      <div class="section">
            <h2>SISTEMA DE REGISTRO Y CONTROL</h2>

          <div class="contenedor">
                  <p>BIENVENIDO</p>

            <form method="POST" action="validacionsesion.php" onsubmit="return validarsesion()"> 
                 <input style="position: relative; left: 72px;" maxlength="8" name =usuario type="text" id=usuario placeholder= "Usuario" >

                 <input style="position: relative; left: 72px;" name = contraseña type="password" id ="clave" placeholder="Contraseña" maxlength="8" >

                 <button style="font-size: 17px" type="submit"
                 class="boton">Iniciar Sesión</button>
            </form>
          </div>
      </div> 

<!--Pie del index-->

        <div class="footer">
           <h4>CLAP "MANUEL ANTONIO CARREÑO"</h4>
            <h5> Calle Pichincha. Residencias Santa Teresa. Urb La Paz. El Paraiso</h5>
       </div>

       <script src="js/validar.js"></script>
           
  </body>
</html>