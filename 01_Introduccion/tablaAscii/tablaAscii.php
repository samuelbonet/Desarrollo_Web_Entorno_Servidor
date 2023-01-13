<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLA ASCII PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="content">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th class="col">CODIGO ASCII</th>
                    <th class="col">RESULTADO</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 32; $i < 128; $i++) {
                    printf("<tr><td>%d</td><td>%c</td></tr>", $i, $i);
                    printf("<tr><td>%d</td><td>%c</td></tr>", $i, $i);
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<style type="text/css">
    .content {
        width: 100vw;
        height: 100vh;
    }

    table {
        width: 100%;
        height: 100%;
    }
</style>

</html>