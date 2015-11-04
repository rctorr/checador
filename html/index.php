<?php
  /*seleccionando pagina a mostrar*/

  if(isset($_GET['pg'])){
        $pg=$_GET['pg']; /*indica la pag a abrir ejem.: index.php?pg=login */
  }
  else{
    $pg=''; /*valor por default*/
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>webApp: checador</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header>
        <h1>checador</h1>
    </header> <!--eliminar opcional-->
     
      <!-- inicia contenido dinámico--> 
        <section id="contenido">
        <?php
          if($pg=='index')include('index.html');
          if($pg=='entrada')include('entrada.html');
          if($pg=='registrovalido')include('registrovalido.html');
          if($pg=='salida')include('salida.html');
          if($pg=='historial')include('historial.html');
          
          if($pg=='')include('index.html') /*pág por default privada*/
        ?>

    </section>
       
       
       <!-- revisar si se queda o se va por los cambios el contenido dinámico
       <div id="contenedor"> 
        
        <form action="index.php" method="post" > 
           <input type="text" placeholder="Usuario" name="usuario" required />
            <input id="pass" type="password" placeholder="Contraseña" name="contraseña" required />
            <div id="msj"> </div>
            
            <button class="btn" id="bot" type="submit"> Entra </button>
        </form><!--termina formulario-->  <!--termina div id="contenedor" < /div> --> -->
    
    <footer> copyleft tdw2.0</footer>
</body>
</html>