<?php
$numero = rand(1, 100);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de multiplicar de <?= $numero ?></title>
</head>

<body>
    <button onclick="location.reload()">Nuevo número</button>
    <h1>Tabla de multiplicar de <?= $numero ?></h1>
    <table>
        <thead>
            <tr>
                <th>Numero</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 1; $i <= 10; $i++) : ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $numero * $i ?></td>
                </tr>
            <?php endfor ?>
    </table>
</body>

</html>