<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'PHP/conexion.php';

if (isset($_GET['id'])){

    $query = "SELECT * FROM `productos` WHERE `id_producto` = ".$_GET['id']."";
    $ejecutar = mysqli_query($conexion, $query);

    while($row = $ejecutar->fetch_array()){ 
?>
<!DOCTYPE html>
<html lang="en">
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/perfil-producto.css">
    <title>Perfil de producto</title>
</head>
<body>
<header>
    <div class="logo-account-navbar">
                <div class="logo">
                    <a href="index.php"><img src="IMG/logovet.png" id="logo-header"></a>
                </div>
        <nav class="navbar navbar-expand-lg navbar-light  ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">    
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php#productos">Productos</a>
      </li>
              <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Servicios
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="#">Grooming</a></li>
            <li><a class="dropdown-item" href="#">Medicina</a></li>
            <li><a class="dropdown-item" href="#">Consultas</a></li>
          </ul>
        </li>

      <li class="nav-item">
        <a class="nav-link" href="index.php#contact-info">Contactanos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php#about-us">Acerca de nosotros</a>
      </li>
    </ul>
  </div>
</nav>
    </header>
    <main>
        <div class="contenedor">
            <div class="section-foto-producto">
                <h1 class="title-div">FOTO PRODUCTO</h1>
                <form action="PHP/foto-producto.php" enctype="multipart/form-data" method="post" style="display:flex; flex-direction:column;">
                <?php
                    $id = $row['id_producto'];
                    $imagen = "PRODUCTOS_FOTOS/".$id.".jpg";
                    if (!file_exists($imagen)) {
                        $imagen = "PRODUCTOS_FOTOS/nf.jpg";}
                ?>
                <div class="foto-producto" alt="Usuario" id="usuario-foto" style="background-image: url('<?php echo $imagen; ?>'); background-size: 100% 100%;"></div>
                <input type="file" name="imagen" id="fileField" value="cambiar foto">
                <input type="number" value="<?php echo $_GET['id'];?>" name="id" style="display:none; visibility: 0;">  
                <button type="submit" class="btn-foto">Cambiar foto</button>
                </form>
            </div>
            <div class="informacion-producto">
                <h1 class="title-div">INFORMACIÓN PRODUCTO</h1>
                <form action="PHP/update-producto.php" method="post">
                    <div class="form-item"><p>Nombre:</p>                   <input class="input-item" name="nombre" type="text" value="<?php echo $row['nombre_producto']; ?>" maxlength="100" required readonly></div>
                    <div class="form-item"><p>Descripcion:</p>              <textarea style="resize: none;" class="input-item" name="descripcion" maxlength="255" required readonly><?php echo $row['descripcion']; ?></textarea></div>
                    <div class="form-item"><p>Precio:</p>                   <input class="input-item" name="precio" type="number" value="<?php echo $row['precio'];  ?>" maxlength="10" required readonly></div>
                    <div class="form-item"><p>Stock:</p>                   <input class="input-item" name="stock" type="number" value="<?php echo $row['stock'];  ?>" maxlength="10" required readonly></div>

                    <input type="number" value="<?php echo $_GET['id'];?>" name="id" style="display:none; visibility: 0;">

                    <div class="botones-edit">
                        <div id="btn-editar">EDITAR</div>  
                        <div id="btn-cancelar" class="hidden"> CANCELAR</div>  
                        <button id="btn-update" type="submit" class="hidden">ACTUALIZAR</button>
                    </div>
                </form>
            </div>
        </div>            
    </main>
    <?php }}?>
    <script src="js/editar.js"></script>
    <script>
        document.querySelectorAll('input[type="number"]').forEach(input =>{
            input.oninput = () =>{
                if(input.value.length > input.maxLength) input.value = input.value.slice(0, input.maxLength);
            };
        });
    </script>
    <footer>

    </footer>
</body>
</html>