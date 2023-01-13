<?php
$imagenes = [
    "https://es.wikieducator.org/images/3/3d/Ajax_cliente_servidor.png",

    "https://es.wikieducator.org/images/7/7b/Funcionamiento_ajax.png",
    "https://es.wikieducator.org/images/a/aa/Angular_app_base.png",
    "https://es.wikieducator.org/images/3/3d/Docker_distancia_1.png",

    "https://es.wikieducator.org/images/4/4e/Opcion_Instalar.png",
    "https://es.wikieducator.org/images/a/ab/AplicacionWeb.png",
    "https://es.wikieducator.org/images/e/e4/Red3.png",
    "https://es.wikieducator.org/images/f/f2/DACTW.png",
    "https://es.wikieducator.org/images/e/e5/M3_web.png",
    "https://es.wikieducator.org/images/a/a6/Ficheros.jpeg"
];

$imagen_usada = [];

function usarImagen($imagenes, $imagen_usada)
{
    $imagen = $imagenes[rand(0, count($imagenes) - 1)];
    // Si la imagen no se ha usado todavía la devolvemos, si no, volvemos a llamar a la función
    if (!in_array($imagen, $imagen_usada)) {
        $imagen_usada[] = $imagen;
        return $imagen;
    } else {
        return usarImagen($imagenes, $imagen_usada);
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagenes - Ejercicio 5</title>
    <link rel='stylesheet' href='https://unpkg.com/@picocss/pico@latest/css/pico.min.css'>

</head>

<body>
    <div class="container">
        <img src="<?php print(usarImagen($imagenes, $imagen_usada)) ?>"></img>
        <img src="<?php print(usarImagen($imagenes, $imagen_usada)) ?>"></img>
        <img src="<?php print(usarImagen($imagenes, $imagen_usada)) ?>"></img>
    </div>
</body>

</html>