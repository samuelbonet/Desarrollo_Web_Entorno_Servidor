<?php
$nombre = htmlspecialchars($_POST['nombre']);
$pwd = htmlspecialchars($_POST['password']);


if ($nombre === $pwd && ($nombre != '' || $pwd != '')) {
    header("Set-Cookie: nombre=$nombre; ;path=/; domain=localhost");
    header("Location: sitio.php");

    // header("Location: sitio.php?nombre=$nombre");

    exit();
} else {
    header("Location: formInput.php?error=true?msg=Usuario o contraseña incorrectos");
    exit();
}
