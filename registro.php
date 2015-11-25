<!DOCTYPE html>
<?php
    /*
        [*] 1. Presentar formulario cuando es llamado por 1er vez
           http://localhost/checador/registro.php
        [*]2. Determinar si el formulario es llamado con información
           http://localhost/checador/registro.php?usuario=rctorr&nombre=Ricardo&apPaterno=Torres&apMaterno=Estrada...
           Para saber si existe o no una variable se usa la función
           isset(nombre variable). Ej: isset($_GET['usuario'])? regresa True
           o False
           Se elige la variable que tenga que ver con el campo llave de la
           tabla en la BD.
           Usuario:
           - usuario *
           - nombre
           - apPaterno
           - apMaterno
           - email
           - sexo
           Algoritomo:
           -----------
           Si no hay información:
               mostrar formulario
           de lo contrario:
               mostrar un mensaje con PHP echo
           PHP:
           ----
           if(isset($_GET['usuario'])) {
               // Ejecuta instrucciones cuando la condición es True
               ...
           } else {
               // Ejecuta instrucciones cuando la condición es False
               ...
           }

        [*]3. Si no hay información entonces:(PHP: if)
                4. Presentar formulario punto 1
        [*]5. De lo contrario (PHP: else):
                Tenemos información del usuario
                [*] 6. Buscar el usuario en la BD (SQL: SELECT)
                [*]7. Si el usuario existe en la BD entonces: (PHP: if)
                      [*]8. Mostrar página con mensaje de que el usuario
                       ya existe con opción a reintentar.
                [*]9. De lo contrario (PHP: else):
                    [*]10. Agregar el usuario a la BD (SQL: INSERT)
                    [*]11. Mostrar página con mensaje de usuario
                        registrado con opción a Acceder al sistema.
    */
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Control de Asistencias</title>
    <link rel="stylesheet" href="css/main.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="fondo">
        <script>
            var trans = ['trans20','trans40','trans60','trans80','trans100'];
            for(i=0;i<500;i++) {
            ri = Math.floor(Math.random()*5);
            line = '<div id="c'+i+'" class="cuadros '+trans[ri]+'"></div>';
            document.write(line);

    } /* preguntar al prof de donde sale : ri = Math.floor(Math.random()*5);
            line = '<div id="c'+i+'" class="cuadros '+trans[ri]+'"></div>';
            document.write(line) */

        </script>

    </div> <!--termina cuadros-->

    <div id="pagina">
    <header>
        <h1> <strong>VIRTUAL NET</strong></h1>
        <p>Internet, Papeleria, Mantenimiento, Copias, Diseño y Asesoría.</p>
    </header>

    <section id="contenedor">
        <?php

        if(isset($_GET['usuario'])) {
            // Aquí vamos si tenemos info
            $user = $_GET['usuario']; // $_POST['usuario'];
            $nombre = $_GET['nombre'];
            $apPat = $_GET['apPaterno'];
            $apMat = $_GET['apMaterno'];
            $pass = $_GET['password'];
            $email = $_GET['email'];
            $sexo = $_GET['sexo'];

        /*  Los siguentes echo's son para verificar que se reciben la info
            de forma correcta. Pero ya están comentado
            echo $user."<br/>";
            echo $nombre."<br/>";
            echo $apPat."<br/>";
            echo $apMat."<br/>";
            echo $pass."<br/>";
            echo $email."<br/>";
            echo $sexo;
        */

            /* Realizar la conexión a la BD */
            $servername = "localhost";
            $username = "checador";
            $password = "checador2015";
            $db = "checador";

            $conn = mysqli_connect($servername, $username, $password, $db);

            // Checa el estado de la conección
            if (!$conn) {
                die("Conección fallida: " . mysqli_connect_error());
            }

            /* Consulta la BD para saber si existe o no el $user */
            $sql = "SELECT usuario FROM Usuario WHERE usuario = '$user'";
            $result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($result);
            if($numrows) {
                /* Si el usuario existe nos vamos para acá */
                /* Enviar mensaje y mostrar botón de Reintentar
                   registro */
                   echo "El usuario existe y tienes que pensar mejor!"; // cambiar por include
            } else {
                /* Si el usuario no existe no vamos para acá */
                /* Enviar floresitas, felicitarlo y lo que quieras hacer
                   y mostrar boton en Entrar */

                /* Agregand el nuevo usuario a la BD */
                   $sql = "INSERT INTO checador.Usuario (usuario, nombre, apPaterno, apMaterno, email, password, sexo) VALUES ('$user', '$nombre', '$apPat', '$apMat', '$email', '$pass', '$sexo')";
                   $result = mysqli_query($conn, $sql);
                   if(!$result) {
                       /* Si el insert termina en error nos vamos por aquí... */
                       die("Error al insertar data: " . $sql . " " . mysqli_error());
                   }

                   echo "Hay sido muy creativo con tu usuario: ".$user; // cambiar por include
               }

            /* No olvidar cerrar la BD */
            mysqli_close($conn);

        } else {
            /* Acá vamos si NO hay info */
            include("registro.html");
        }

        ?>
    </section>
    <footer>
        <p>www.virtual.com</p>
    </footer>

    </div> <!--termina div pagina-->
</body>
</html>
