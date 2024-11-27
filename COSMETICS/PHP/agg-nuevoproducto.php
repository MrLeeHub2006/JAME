<?php 
session_start();
include '../Config/conexion.php';

$query = "INSERT INTO `Productos` (`nombre_producto`, `descripcion`, `precio`, `imagen`) VALUES 
('Nombre Producto', 'Descripción breve del producto.', '10000', 'Assets/PRODUCTOS_PHOTOS/nf.jpg');";
$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar){
    echo '
    <script>
    alert("¡EL PRODUCTO HA SIDO AGREGADO CORRECTAMENTE!");
    window.location = "../st-productos.php";
    </script>
    ';
}else{
    echo '
    <script>
    alert("EL PRODUCTO NO HA SIDO AGREGADO CORRECTAMENTE, INTÉNTALO DE NUEVO");
    window.location = "../st-productos.php";
    </script>
    ';
}

?>