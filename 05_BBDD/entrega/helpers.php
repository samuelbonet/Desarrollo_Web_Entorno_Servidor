<?php
//Load credentials
require "credentials.php";
//Autoload classes
function carga($clase)
{
    require "$clase.php";
}
spl_autoload_register("carga");

// If user is not logged in, redirect to login page
if ($_SESSION['usuario'] == null) {
    header("Location: ./login.php");
    exit;
}