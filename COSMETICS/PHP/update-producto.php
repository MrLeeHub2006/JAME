<?php 

session_start();
include 'Config/conexion.php';

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$id = $_POST['id'];

$query ="UPDATE `Productos` 
SET
`nombre_producto`='$nombre',
`descripcion`='$descripcion',
`precio`= $precio,
`stock`='$stock'
WHERE `id_producto` = ".$id."";
     
$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar){
    echo "<script>
    alert('PRODUCTO MODIFICADO CORRECTAMENTE')
    window.location = '../st-productos.php';
    </script>";
}else{
    echo "<script>
    alert('PRODUCTO NO HA SIDO MODIFICADO, INTÉNTALO DE NUEVO')
    window.location = '../st-productos.php';
    </script>";
}


?>