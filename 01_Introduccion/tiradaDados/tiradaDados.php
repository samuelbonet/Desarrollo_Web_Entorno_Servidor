<?php
$tiradas = 0;
$uno = 0;
$dos = 0;
$tres = 0;
$cuatro = 0;
$cinco = 0;
$seis = 0;
while ($tiradas < 6000) {
    $tirada = rand(1, 6);
    switch ($tirada) {
        case 1:
            $uno++;
            break;
        case 2:
            $dos++;
            break;
        case 3:
            $tres++;
            break;
        case 4:
            $cuatro++;
            break;
        case 5:
            $cinco++;
            break;
        case 6:
            $seis++;
            break;
    }
    $tiradas++;
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tirada Dados</title>
    <link rel="stylesheet" href="dado.css">
</head>

<body>
    <h1>Juego de dados</h1>
    <div class="container">
        <div>
            <div class="block">
                <div class="cara-1">
                    <div class="punto"></div>
                </div>
                <?= "Ha salido $uno veces" ?>
            </div>
            <div class="block">
                <div class="cara-2">
                    <div class="punto"></div>
                    <div class="punto"></div>
                </div>
                <?= "Ha salido $dos veces" ?>
            </div>
            <div class="block">
                <div class="cara-3">
                    <div class="punto"></div>
                    <div class="punto"></div>
                    <div class="punto"></div>
                </div>
                <?= "Ha salido $tres veces" ?>
            </div>
        </div>
        <div>
            <div class="block">
                <div class="cara-4">
                    <div class="columna">
                        <div class="punto"></div>
                        <div class="punto"></div>
                    </div>
                    <div class="columna">
                        <div class="punto"></div>
                        <div class="punto"></div>
                    </div>
                </div>
                <?= "Ha salido $cuatro veces" ?>
            </div>
            <div class="block">
                <div class="cara-5">
                    <div class="columna">
                        <div class="punto"></div>
                        <div class="punto"></div>
                    </div>
                    <div class="punto medio"></div>
                    <div class="columna">
                        <div class="punto"></div>
                        <div class="punto"></div>
                    </div>
                </div>
                <?= "Ha salido $cinco veces" ?>
            </div>

            <div class="block">
                <div class="cara-6">
                    <div class="columna">
                        <div class="punto"></div>
                        <div class="punto"></div>
                        <div class="punto"></div>
                    </div>
                    <div class="columna">
                        <div class="punto"></div>
                        <div class="punto"></div>
                        <div class="punto"></div>
                    </div>
                </div>
                <?= "Ha salido $seis veces" ?>
            </div>

        </div>
    </div>


</body>

</html>