<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo/estilocoment.css" media="all" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <title>Deporte</title>
</head>
<body>
<div class="test">

<form action="Deporte.php" method="post">
    <h2 class='titulo'>Deporte</h2>
    <input type="text" name="nombre" placeholder="Nombre" class="cajanom" required> <br>
    <textarea name="texto" id="" cols="30" rows="10" placeholder="Gracias por compartir su comentario" required></textarea> <br>
    <input  type="submit" class="enviar">
</form>    

</div>
<?php
   
    echo "<p class='subtitulo'>Comentarios recientes</p>";
    
?>

<div class="comentarios">

<?php

        
                try {
                    $conexion = new PDO('mysql:host=localhost;dbname=forontsg','root', '');
                    
                    if(!empty($_POST)){
                        
                        
                        $nom = $_POST['nombre'];
                        $texto = $_POST['texto'];
                        $fecha=date("y/m/d");
                        $conexion->query("INSERT INTO `tema1` (`id`, `nombre`, `comentario`, `fecha`) VALUES (NULL, '$nom', '$texto','$fecha' );");

                    }else{}

                } catch (PDOException $e) {
                    echo 'Falló la conexión: ' . $e->getMessage();
                }
                   
            
               
    
        
                $busca = $conexion->query("SELECT * FROM `tema1` ORDER BY id DESC");
       
        
                echo "<div class='comentario1'>";
                foreach ($busca as $imagen)
                {   
                    echo "<div class='cajas'>";
                    echo "<p class='nombre'>".$imagen['nombre']."</p>";
                    echo "<p class='comentario'>".$imagen['comentario']."</p>";
                    echo "<p class='fecha'></p>".$imagen['fecha']."</p>";
                    echo "</div>";
                    
                }
                echo "</div>";
    
    
?>
</div>

</body>
</html>