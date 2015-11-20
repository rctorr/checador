<!DOCTYPE html>
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
            include("registro.html");
        ?>
    </section>
    <footer>
        <p>www.virtual.com</p>
    </footer>

        </div> <!--termina div pagina-->
</body>
</html>
