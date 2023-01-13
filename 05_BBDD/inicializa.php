<?php
require "credenciales.php";

function carga($clase)
{
    require "$clase.php";
}
spl_autoload_register("carga");
