<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'Config/conexion.php';

$usuario = $_SESSION['username'];
$id = $_SESSION['id'];
$rol = $_SESSION['rol'];


if ((isset($_GET['id']) and $id == $_GET['id']) || (isset($_GET['id']) and $rol == 1)){

    $query = "SELECT * FROM `usuarios` WHERE `id_usuario` = ".$_GET['id']."";
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
    <link rel="stylesheet" href="Assets/CSS/perfil-usuario.css">
    <title>Perfil de <?php  echo $_SESSION['username']. $rol; ?></title>
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
        <a class="nav-link" href="/index.php">Home <span class="sr-only"></span></a>
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
            <div class="section-foto-usuario">
                <h1 class="title-div">FOTO USUARIO</h1>
                <form action="PHP/foto-usuario.php" enctype="multipart/form-data" method="post" style="display:flex; flex-direction:column;">
                    <?php
                        $id = $row['id_usuario'];
                        $imagen = "Assets/USUARIOS_FOTOS/".$id.".jpg";
                        if (!file_exists($imagen)) {
                            $imagen = "Assets/USUARIOS_FOTOS/nf.jpg";
                        }
                    ?>
                    <div class="foto-usuario" alt="Usuario" id="usuario-foto" style="background-image: url('<?php echo $imagen; ?>'); background-size: 100% 100%;"></div>
                    <input type="file" name="imagen" id="fileField" value="cambiar foto" Required>
                    <input type="number" value="<?php echo $_GET['id'];?>" name="id" style="display:none; visibility: 0;">  
                    <button type="submit" class="btn-foto">Cambiar foto</button>
                </form>
            </div>
            <div class="informacion-usuario">
                <h1 class="title-div">INFORMACIÓN USUARIO</h1>
                <form action="PHP/update-user.php" method="post">
                    <div class="form-item"><p>Nombre:</p>       <input class="input-item" name="txtnombre" type="text" value="<?php echo $row['nombre_completo'] ?>" maxlength="50" required readonly></div>
                    <div class="form-item"><p>Usuario:</p>      <input class="input-item" name="txtusuario" type="text" value="<?php echo $row['usuario'] ?>" maxlength="20" required readonly></div>
                    <div class="form-item"><p>Correo:</p>       <input class="input-item" name="txtcorreo" type="text" value="<?php echo $row['correo_electronico']  ?>" maxlength="70" required readonly></div>
                    <div class="form-item"><p>Contraseña:</p>   <input class="input-item" name="txtcontraseña" type="text" value="<?php echo $row['contraseña'] ?>" maxlength="70" required readonly></div>
                    <div class="form-item"><p>Dirección:</p>    <input class="input-item" name="txtdireccion" type="text" value="<?php echo $row['direccion'] ?>" maxlength="30" readonly></div>
                    <div class="form-item"><p>Teléfono:</p>     <input class="input-item" name="txtnumero" type="number" value="<?php echo $row['telefono']?>" maxlength="10" readonly></div>

                    <input type="number" value="<?php echo $_GET['id'];?>" name="id" style="display:none; visibility: 0;">

                    <div class="botones-edit">
                        <div id="btn-editar">EDITAR</div>  
                        <div id="btn-cancelar" class="hidden"> CANCELAR</div>  
                        <button id="btn-update" type="submit" class="hidden">ACTUALIZAR</button>
                    </div>
                   
                </form>
                <div style="display: flex;">
                    <form action="PHP/logout.php"> 
                        <?php if($_GET['id'] == $_SESSION['id']){echo'<button type="submit" id="btn-logout">SALIR DE LA CUENTA</button> ';} ?>
                        
                    </form>
                    <?php
                    if ($rol == 1){echo '<a href="st-usuarios.php"><button id="editar-usuarios">EDITAR USUARIOS</button></a>';}
                    ?>
                </div>
            </div>
        </div>            
    </main>
    <?php }}else if ($_SESSION['id'] !== $_GET['id'] and $_SESSION['rol']!==1){
    echo '
    <script>
    alert ("No tienes permisos para ver la información de otros usuarios");
    window.location="index.php";
    </script>
    ';
    }
    ?>
    <script src="Assets/JS/editar.js"></script>
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