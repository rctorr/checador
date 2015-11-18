<?php
    /* Acceso a la información de la Base de Datos */
    /* Información requerida para acceder a la BD:
       host: localhost
       nombre BD: checador
       usuario BD: checador
       password: checador2015
    */
    $servername = "localhost";
    $username = "checador";
    $password = "checador2015";
    $db = "checador";


    // Crear conección a la base de datos
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Checa el estado de la conección
    if (!$conn) {
        die("Conección fallida: " . mysqli_connect_error());
    }

    if(isset($_GET['user'])) { /* confirma si el usuario ya ha proporcionado sus datos por medio del user */
        $user = $_GET['user'];
        $pass = $_GET['pass'];

        /* Ahora tenemos que comparar las variables de $user y $pass con los
        valores que están en la base de datos */

        /* Entonces tenemos que consultar a la base de datos para ver si
        existe el usuario que está en la variable $user */

        /* intrucciones en lenguaje SQL para hacer la consulta a la BD de
           forma segura, sin permitir hackeo de la bd */
        $sql = "SELECT usuario, password from Usuario where usuario = '$user' and password = '$pass'";
        echo $sql;
        /* Para ejecutar la consulta y lo resultado están en la variable $result */
        $result = mysqli_query($conn, $sql);

        echo "Número de renglones resultado de la consulta:" . mysqli_num_rows($result);

        /* Se recomienda siempre cerrar la BD al final después de que ya no se usa */
        mysqli_close($conn);
    }

    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Control de Asistencias</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            include("login.html");
        ?>
    </section>

    <footer>
        <p>www.virtual.com</p>
    </footer>

</div> <!--termina div id="pagina" -->
</body>
</html>
