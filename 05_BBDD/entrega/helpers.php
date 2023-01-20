<?php
require "credentials.php";
function carga($clase)
{
    require "$clase.php";
}

spl_autoload_register("carga");

if ($_SESSION['usuario'] == null) {
    header("Location: ./login.php");
    exit;
}