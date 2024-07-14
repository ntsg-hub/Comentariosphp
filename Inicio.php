<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo/estilo.css?1.0" media="all" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>

   

    <?php 


        try {
            $conexion = new PDO('mysql:host=localhost;dbname=forontsg','root', '');
            
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }

        $busca = $conexion->query("SELECT * FROM `temas`");
        echo "<h2 class='titulo'>Temas</h2>";



     
        echo "<div class='temas'>";
        foreach ($busca as $imagen)
        {   
            $nombre_tema = $imagen['titulo'].".php";
            echo "<div class='cajas'>";
            echo "<a href='$nombre_tema'><h1>".$imagen['titulo']."</h1> </a>";
            echo "<p>".$imagen['Info']."</p>";

            
            echo "</div>";
        }

        echo "</div>";



        //Esto es un test para agregar mas adelante
        //Ultimo comentario de Deporte
        $buscaUltimoComentario = $conexion->query("SELECT * FROM `tema1` ORDER BY id DESC LIMIT 1");
        $ultimoComentario = $buscaUltimoComentario->fetch();

        if ($ultimoComentario) {
            echo "<p class='nombre'>".$ultimoComentario['nombre']."</p>";
            echo "<p>".$ultimoComentario['comentario']."</p>";
            echo "<p class='fecha'>".$ultimoComentario['fecha']."</p>";
        } else {
            echo "<p>No hay comentarios aun</p>";
        }





    ?>


</body>
</html>