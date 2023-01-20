<?php
require "credenciales.php";

function carga($clase)
{
    require "$clase.php";
}
spl_autoload_register("carga");

session_start();

// Si el usuario no esta logueado
if ($_SESSION['usuario'] == null) {
    header("Location: ./login.php");
    exit;
}