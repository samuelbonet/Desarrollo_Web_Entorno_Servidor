<?php
if(isset($_GET['cadena']) && isset($_GET['regex'])){
    $regex = "%".$_GET['regex']."%";
    $cadena = $_GET['cadena'];
    $output = (preg_match($regex,$cadena)) ? "<span style='color:green' >SI CUMPLE</span>" : "<span style='color:red'>NO CUMPLE</span>";
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REGEX CHECKER</title>
    <link rel='stylesheet' href='https://unpkg.com/@picocss/pico@latest/css/pico.min.css'>
    <link rel="stylesheet" href="style.css">

</head>
<body style="height: 100vh;overflow: hidden">
<header style="height: 10%">
    <h1 style="text-align: center">REGEX CHECKER</h1>
</header>
<main style="height: 70%"><form action="index.php" METHOD="get">
            <label for="cadena">Cadena de texto:</label><br>
            <textarea name="cadena" id="cadena" cols="30" rows="5"></textarea><br>
            <label for="regex">REGEX:</label><br>
            <input type="text" name="regex" id="regex"><br>
<button type="submit" style="background-color:#EEE;color:#000">Comprobar</button>
</form>
            </main>
<footer style="height: 10%">
    <a href="#" class="float">
        i
    </a>
        <?php
        if(isset($output)){
            echo "<p  style='text-align: center;margin:auto;'>".$output."</p>";
        }


        ?>
    </footer>

</body>
</html>