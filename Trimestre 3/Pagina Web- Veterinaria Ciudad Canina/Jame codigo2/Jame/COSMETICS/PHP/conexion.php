<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "paradise_cosmetics_db";

$conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conexion){
    die("No hay conexion: ".mysqli_connect_error());
}

?>