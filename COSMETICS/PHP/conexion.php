<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "jame";

$conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conexion){
    die("No hay conexion: ".mysqli_connect_error());
}

?>