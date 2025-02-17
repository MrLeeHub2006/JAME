<?php 
try {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

    include 'Config/conexion.php';
    
    $usuario = $_SESSION['username'];
    $id = $_SESSION['id'];
    
    $sql = "SELECT * FROM usuarios";
    $resultado = $conexion->query($sql);

    // Fetch data from the query result
    $productos = $resultado->fetch_all(MYSQLI_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
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
    <link rel="shortcut icon" href="img/LOGO.png" type="image/x-icon">
    <link rel="stylesheet" href="Assets/CSS/sistema-usuarios.css">
    <script src="https://kit.fontawesome.com/eb36e646d1.js" crossorigin="anonymous"></script>
    <title>Query Users</title>
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
        <a href="perfil-usuario.php?id=<?php echo $id;?>"><button id="btn-volver"><i class="fa-solid fa-arrow-left"></i></button></a>
            <h1>TABLA DE USUARIOS</h1>
            <table class="table-contenedor">
                <tr>
                    <th>ID</th>
                    <th>Nombres Completos</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Cargo</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
                <?php foreach ($resultado as $row) { ?>
                <tr>
                    <td><?php echo $row['id_usuario']; ?></td>
                    <td><?php echo $row['nombre_completo']; ?></td>
                    <td><?php echo $row['usuario']; ?></td>
                    <td><?php echo $row['correo_electronico']; ?></td>
                    <td><?php echo $row['telefono']; ?></td>
                    <td><?php if ($row['id_rol'] == 1 ){echo 'Administrador';} else if ($row['id_rol'] == 2){echo 'Usuario';} ?></td>
                    <td><a href="perfil-usuario.php?id=<?php echo $row['id_usuario']?>"><button>EDITAR</button></a></td>
                    <form action="PHP/del-user.php" method="post"> 
                        <input type="number" name="id" value="<?php echo $row['id_usuario'];?>" style="display:none;visibility:0;"><td id="del-btn"><button>ELIMINAR</button></td></form>
                </tr>
                <?php }?>
            </table>
        </div>            
    </main>
    <footer>

    </footer>
</body>
</html>