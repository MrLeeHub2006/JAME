<?php 
try {
    
    error_reporting(0);
    session_start();
    include 'Config/conexion.php';
    $usuario = $_SESSION['username'];
    $id = $_SESSION['id'];
    $rol = $_SESSION['rol'];

    $sql = "SELECT * FROM productos";
    $resultado = $conexion->query($sql);

    // Fetch data from the query result
    $productos = $resultado->fetch_all(MYSQLI_ASSOC);
} catch (PDOException $e) {
    echo "<script> alert ('Error: " . $e->getMessage() . "')</script>";
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
    <link rel="stylesheet" href="Assets/CSS/index.css">
    <link rel="shortcut icon" href="Assets/img/LOGO.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/eb36e646d1.js" crossorigin="anonymous"></script>
    <title>Inicio Ciudad Canina</title>
    <link rel="icon" href="Assets/IMG/logovet.png">
</head>
<body>
<header>
        <div class="texto-rosa-header">
            <p>La mejor opcion para el cuidado de tu mascota</p>
        </div>
        <div class="logo-account-navbar">
            <div class="logo">
                <a href="index.php"><img src="Assets/IMG/logovet.png" id="logo-header"></a>
            </div>
            <div class="nav-search">
                <input type="text" id="search-input" placeholder="Buscar productos...">
                <button id="search-button"><i class="fa-solid fa-search"></i></button>
            </div>

            <ul class="nav-account">

                <li><a href="index.php#carritox"><i class="fa-solid fa-cart-shopping"></i> CARRITO</a></li>
            </ul>
        </div>
    
        <nav class="navbar navbar-expand-lg navbar-light  ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">    
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#carouselExampleIndicators">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php#productos">Productos</a>
      </li>
              <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- Servicios -->
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="#">Grooming</a></li>
            <li><a class="dropdown-item" h ref="#">Medicina</a></li>
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
    <div id="carouselExampleIndicators" class="carousel slide position-relative" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Assets/IMG/Banner1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="Assets/IMG/Banner1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="Assets/IMG/Banner1.png" class="d-block w-100" alt="...">
                </div>
            </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  <div class="position-absolute top-50 end-0 translate-middle">
    <h1>Bienvenido a Veterinaria Ciudad Canina</h1>
    <p>Descubre la mejor gama de cuidado y servicios para la mascota</p>
    <a href="index.php#nosotros"><button class="btn-introduction">Conocer más</button></a>
  </div>
</div>
            
        <a name="productos"></a>
        </section>
        <section class="section-productos">
            <div class="texto-rosa-header titulo-productos"><p>Productos Nuevos</p></div>
            <div class="container-productos">
                <?php 
                $count = 0;
                foreach ($resultado as $row) { 
                $count ++;
                ?>
                <div class="box-producto <?php if ($count > 5) { echo ' hidden' ;}?>">
                    <div class="img-producto">
                       
                    </div>
                    <div class="info-producto">
                        <h3><?php echo($row['nombre_producto']); ?></h3>
                        <p><?php echo($row['descripcion']);?></p>
                    </div>
                    <div class="precio-producto">
                        <p class="precio"><?php echo number_format(($row['precio']));?> COP</p>
                        <button class="agregar-carrito-btn">Agregar al carrito</button>
                    </div>
                </div>
                <?php } ?>   

             
            </div>
            <a name="about-us"></a>
            <div class="btns-productos">

                <?php 
            if (count($productos) > 5){ 
                echo '<button id="mostrar-mas-btn"> <strong> Mostrar más </strong><i class="fa-solid fa-arrow-down"></i></button>
                <button id="mostrar-menos-btn" style="display: none;"><strong>Mostrar menos </strong><i class="fa-solid fa-arrow-up"></i></button>';
            } 
            if ($rol == 1){
                echo '
                <a href="st-productos.php"><button id="editar-productos">EDITAR PRODUCTOS</button></a>';
            }
            ?>
            </div>
        </section>
        <section class="section-about-us">
            <div class="container-about-us">
                <h2>Acerca de Nosotros</h2>
                <p>
                Nuestro equipo está conformado por profesionales altamente capacitados, con amplia experiencia en medicina veterinaria y un profundo amor por los animales. Cada uno de nosotros entiende lo importante que son las mascotas en la vida de nuestros clientes, y por eso brindamos un servicio integral, personalizado y con un enfoque humano, cuidando tanto a las mascotas como a sus dueños.
                    <br>
                   hemos trabajado con dedicación para ofrecer atención veterinaria de alta calidad, comprometidos con la vida y el bienestar de cada uno de nuestros pacientes.
                </p>
        </div>
        </section>
        <style>
            .tabs button {
                background-color: #2d9cf7;
                border: 1px;
                outline: none;
                padding: 14px 16px;
                cursor: pointer;
                transition: background-color 0.5s;
                flex: 1;
                font-size: 17px;
            }

            .tabs button:hover {
                background-color: #ddd;
            }

            .tabs button.active {
                background-color: #ccc;
            }

            .tab-content {
                display: none;
                padding: 20px;
                border-top: none;
                flex-direction: row;
            }

            .tab-content.active {
                display: block;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
            }

            th,
            td {
                text-align: left;
                padding: 18px;
            }

            th {
                background-color: #f2f2f2;
            }
            h2 {

                color: #2d9cf7;
            }

        </style>    
        <div class="">

<div class="tabs">
    <button class="tab-link active" onclick="openTab(event, 'tab1')">Consulta medica</button>
    <button class="tab-link" onclick="openTab(event, 'tab2')">Servicio de grooming</button>
    <button class="tab-link" onclick="openTab(event, 'tab3')">Agendamiento de citas</button>
    <button class="tab-link" onclick="openTab(event, 'tab4')">Pedidos y servicios adicionales</button>
</div>

<div id="tab1" class="tab-content active ">
    <h2>Consultas medicas especializadas</h2>
    <table class="section-servicios">               
            <td> 
                En la veterinaria Ciudad Canina, tenemos servicio de consulta medica con un medico <br>
                veterinario con mas de 20 años de experiencia en donde tambien contamos con servicios<br>
                de esterilizacion, todo tipo de vacunaciones, recomendaciones, controles.</td>
                <td>
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/024/585/326/small_2x/3d-happy-cartoon-doctor-cartoon-doctor-on-transparent-background-generative-ai-png.png"><br>
            </td>
        </tr>
    </table>
</div>

<div id="tab2" class="tab-content">
    <h2>Todo en belleza para mascotas<br>
        Como amor se atiente tu peludo</h2>
    <table class="section-servicios">
            <td> Manejamos el servicio de baño y peluqueria, donde se atienden con pelo largo, corto, cortes al gusto del cliente con asesoria de profesional.<br>

            Adicionalmente se entrega limpieza de oidos corte de uñas y si lavado de dientes. <br>

            Si desea agendar un baño para su mascota, puede hacerlo por este medio o puede acercarse a la veterinaria y alla le haran el respectivo agendamiento.</td>
            <td>
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/024/585/326/small_2x/3d-happy-cartoon-doctor-cartoon-doctor-on-transparent-background-generative-ai-png.png"><br>
            </td>
        </tr>
    </table>
</div>
<div id="tab3" class="tab-content">
    <h2>Realiza tus agendamientos<br>
        para el tiempo que desees, tanto pedidos como servicios</h2>
<table class="section-servicios">
            <td> Tenemos servicio de agendamiento en donde puedes agendar desde dias antes para guardar <br>el cupo para que su mascota sea atendida de la mejor manera.<br><br>

                    Tambien tenemos servicio de agendamiento de pedidos, donde puede pasar a <br>recoger el pedido en el establecimiento con el respectivo pago.</td>
                    <td>
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/024/585/326/small_2x/3d-happy-cartoon-doctor-cartoon-doctor-on-transparent-background-generative-ai-png.png"><br>
            </td>
        </tr>
    </table>
</div>
        <div id="tab4" class="tab-content">
    <h2>Servicios adicionales <br>
        con clientes</h2>
<table class="section-servicios">
            <td> En la veterinaria, nos importa mucho la comunicacion con nuestros clientes por eso tenemos atencion virtual <br>por medio de WhatsApp, Gmail y tambien tenemos servicio de recordatorio por 
            <br>medio de un mensaje SMS donde se le recordara sobre su agendamiento</td>
            <td>
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/024/585/326/small_2x/3d-happy-cartoon-doctor-cartoon-doctor-on-transparent-background-generative-ai-png.png"><br>
            </td>
        </tr>
    </table>
</div>


</div>
<!-- <script>    
                function openTab(evt, tabName) {
                var i, tabcontent, tablinks;

                tabcontent = document.getElementsByClassName("tab-content");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].classList.remove("active");
                }

                tablinks = document.getElementsByClassName("tab-link");
                for (i = 0; i <script tablinks.length; i++) {
                    tablinks[i].classList.remove("active");
                }

                document.getElementById(tabName).classList.add("active");
                evt.currentTarget.classList.add("active");
                }
                </script> -->


    
           
    <footer>
        <section class="contact-info">
            <div class="container-contact-info">
                <div class="contact-form">
                    <h2 class="section-title">Contacto</h2>
                    <p>Tu opinión es muy importante para nosotros. Te invitamos a compartir todas sus preguntas, quejas
                        y reclamos para que juntos podamos mejorar y brindarles
                        una experiencia excepcional.</p>
                    <form action="PHP/correo.php" method="post">
                        <input type="text" id="nombre" name="nombre" placeholder="Nombre" required> <br>

                        <input type="email" id="correo" name="correo" placeholder="Correo" required> <br>

                        <textarea id="mensaje" name="mensaje" style="resize: none; height: 90px;"
                            placeholder="Mensaje..." required></textarea> <br>

                        <button type="submit">Enviar</button>
                    </form>
                </div>

                <div class="company-info">
                    <h2 class="section-title">Información de la Empresa</h2>
                    <p class="company-info-text">Somos tienda fisica del cuidado de tu mascota, donde puedes encontrar diferentes servicios para tu mascota, como grooming, medicina, pet shop y vacunaciones, estamos localizados en la ciudad de bogota</p>
                    <p class="company-info-item"><i class="fa-solid fa-phone"></i> +57 320 3778777</p>
                    <p class="company-info-item"><i class="fa-regular fa-envelope"></i> ciudadcaninavet@ejemplo.com</p>
                    <p class="company-info-item"><i class="fa-solid fa-location-dot"></i> carrera 62 # 167-11</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7952.226700209515!2d-74.06130763246266!3d4.750338012903194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f85a6923946cd%3A0xaa100ebe70e38f1c!2sCIUDAD%20CANINA%20VETERINARIA!5e0!3m2!1ses-419!2sco!4v1725464181474!5m2!1ses-419!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="ontamos_logos">
                        <a href="https://www.facebook.com/"><i
                                class="fa-brands fa-facebook"></i></a>
                        <a
                            href="https://web.whatsapp.com/"><i
                                class="fa-brands fa-whatsapp"></i></a>
                        <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>


            </div>
        </section>
        <p class="foter">&copy;2024 Tu tienda para confiar tu peludo. Todos los derechos reservados.</p>
    </footer>
    
    <script src="Assets/JS/carrito.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const mostrarMasBtn = document.getElementById("mostrar-mas-btn");
            const mostrarMenosBtn = document.getElementById("mostrar-menos-btn");
            const productosOcultos = document.querySelectorAll(".box-producto.hidden");
            const searchInput = document.getElementById("search-input");
            const searchButton = document.getElementById("search-button");
            const productos = <?php echo json_encode($productos); ?>;

            mostrarMasBtn.addEventListener("click", function () {
                productosOcultos.forEach(function (producto) {
                    producto.classList.remove("hidden");
                });
                mostrarMasBtn.style.display = "none"; // Oculta el botón después de mostrar los productos adicionales
                mostrarMenosBtn.style.display = "block"; // muestra el botón "Mostrar menos"

            });

            mostrarMenosBtn.addEventListener("click", function () {
                productosOcultos.forEach(function (producto) {
                    producto.classList.add("hidden");
                });
                mostrarMasBtn.style.display = "flex";
                mostrarMasBtn.style.justifyContent = "center";
                
                mostrarMasBtn.style.alignItems = "center";
                mostrarMenosBtn.style.display = "none"; // Oculta el botón "Mostrar menos" nuevamente
            });

            searchButton.addEventListener("click", function () {
                const searchTerm = searchInput.value.toLowerCase();
                const productosContainer = document.querySelector(".container-productos");
                productosContainer.innerHTML = ""; // Limpia el contenedor de productos
                mostrarTodos = false;
                let resultadosEncontrados = 0;

                productos.forEach(function (producto) {
                    const nombreProducto = producto.nombre_producto.toLowerCase();
                    if (nombreProducto.includes(searchTerm)) {
                        if (!mostrarTodos && resultadosEncontrados >= 5) {
                            mostrarMasBtn.style.display = "block";
                            mostrarMenosBtn.style.display = "none";
                            return; // Si ya se muestran 5 resultados y no se muestra todo, se detiene el bucle
                        }
                        const productoElement = document.createElement("div");
                        productoElement.classList.add("box-producto");

                        // Imagen del producto
                        const imgProducto = document.createElement("div");
                        imgProducto.classList.add("img-producto");
                        const imagen = document.createElement("img");
                        imagen.src= "Assets/PRODUCTOS_FOTOS/" + producto.id_producto + ".jpg";
                        imgProducto.appendChild(imagen);
                        productoElement.appendChild(imgProducto);

                        // Información del producto
                        const infoProducto = document.createElement("div");
                        infoProducto.classList.add("info-producto");
                        const nombreProductoElement = document.createElement("h3");
                        nombreProductoElement.textContent = producto.nombre_producto;
                        const descripcionProducto = document.createElement("p");
                        descripcionProducto.textContent = producto.descripcion;
                        infoProducto.appendChild(nombreProductoElement);
                        infoProducto.appendChild(descripcionProducto);
                        productoElement.appendChild(infoProducto);

                        // Precio y botón
                        const precioProducto = document.createElement("div");
                        precioProducto.classList.add("precio-producto");
                        const precio = document.createElement("p");
                        precio.classList.add("precio");
                        precio.textContent = (producto.precio + " COP");
                        const agregarCarritoBtn = document.createElement("button");
                        agregarCarritoBtn.classList.add("agregar-carrito-btn");
                        agregarCarritoBtn.textContent = "Agregar al carrito";
                        precioProducto.appendChild(precio);
                        precioProducto.appendChild(agregarCarritoBtn);
                        productoElement.appendChild(precioProducto);

                        // Agrega el producto construido al contenedor de productos
                        productosContainer.appendChild(productoElement);
                        resultadosEncontrados++;

                    }
                });
                
                if (resultadosEncontrados <= 5) {
                    mostrarMasBtn.style.display = "none";
                } else {
                    mostrarMasBtn.style.display = "block";
                }
            });

        });
    </script>
</body>
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</html>
