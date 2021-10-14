<?php  
/*
    ./core/constantes.php
*/

$base_href = explode("public/", $_SERVER['REQUEST_URI']);
define('BASE_URL', $base_href[0] . "public/");