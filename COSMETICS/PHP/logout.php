<?php
session_start();
include '../Config/conexion.php';

session_destroy();
echo'
<script>
alert("CERRASTE SESIÓN.");
window.location = "../index.php"
</script>
';
?>