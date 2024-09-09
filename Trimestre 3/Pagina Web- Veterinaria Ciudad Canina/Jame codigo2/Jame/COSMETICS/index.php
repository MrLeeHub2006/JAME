<?php
try {

    error_reporting(0);
    session_start();
    include 'PHP/conexion.php';
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

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="shortcut icon" href="img/LOGO.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/eb36e646d1.js" crossorigin="anonymous"></script>
    <title>Inicio Ciudad Canina</title>
    <link rel="icon" href="/img/logovet.png">
</head>

<body>
    <header>
        <div class="texto-rosa-header">
            <p>La mejor opcion para el cuidado de tu mascota</p>
        </div>
        <div class="logo-account-navbar">
            <div class="logo">
                <a href="index.php"><img src="IMG/logovet.png" id="logo-header"></a>
            </div>
            <div class="nav-search">
                <input type="text" id="search-input" placeholder="Buscar productos...">
                <button id="search-button"><i class="fa-solid fa-search"></i></button>
            </div>

            <ul class="nav-account">
                <li><a
                        href="<?php if (isset($usuario)) {
                            echo 'perfil-usuario.php?id=' . $id . '';
                        } else if (!isset($usuario)) {
                            echo 'login.php';
                        }
                        ; ?>"><i
                            class="fa-regular fa-user"></i>
                        <?php if (isset($usuario)) {
                            echo 'MI CUENTA';
                        } else if (!isset($usuario)) {
                            echo 'Ingresar';
                        }
                        ; ?></a>
                </li>
                <li><a href="index.php#carritox"><i class="fa-solid fa-cart-shopping"></i> CARRITO</a></li>
            </ul>
        </div>
        <div class="texto-rosa-header nav-list-rosa">
            <ul class="nav-list">
                <li class="nav-list-item"><a href="index.php">Inicio</a></li>
                <li class="nav-list-item"><a href="index.php#productos">Productos</a></li>
                <li class="nav-list-item"><a href="index.php#contact-info">Contacto</a></li>
                <li class="nav-list-item"><a href="index.php#contact-info">Grooming</a></li>
                <li class="nav-list-item"><a href="index.php#contact-info">Medicina</a></li>
                <li class="nav-list-item"><a href="index.php#about-us">Acerca de nosotros</a></li>
            </ul>
        </div>
    </header>

    <main>
        <section class="section-introduction">
            <div class="text-introduction">
                <h1>Bienvenido a Veterinaria Ciudad Canina</h1>
                <p>Descubre la mejor gama de cuidado y servicios para la mascota</p>
                <a href="index.php#productos"><button class="btn-introduction">Conocer más</button></a>
            </div>

            <a name="productos"></a>
        </section>
        <section class="section-productos">
            <div class="texto-rosa-header titulo-productos">
                <p>Productos Nuevos</p>
            </div>
            <div class="container-productos">
                <?php
                
                $count = 0;
                foreach ($resultado as $row) {
                    $count++;
                    ?>
                    <div class="box-producto <?php if ($count > 5) {
                        echo ' hidden';
                    } ?>">
                        <div class="img-producto">
                            <?php
                            $id = $row['id_producto'];
                            $imagen = "PRODUCTOS_FOTOS/" . $id . ".jpg";
                            if (!file_exists($imagen)) {
                                $imagen = "PRODUCTOS_FOTOS/nf.jpg";
                            }
                            ?>
                            <img src="<?php echo $imagen; ?>" alt="Producto 1">
                        </div>
                        <div class="info-producto">
                            <h3><?php echo ($row['nombre_producto']); ?></h3>
                            <p><?php echo ($row['descripcion']); ?></p>
                        </div>
                        <div class="precio-producto">
                            <p class="precio"><?php echo number_format(($row['precio'])); ?> COP</p>
                            <button class="agregar-carrito-btn">Agregar al carrito</button>
                        </div>
                    </div>
                <?php } ?>


            </div>
            <a name="about-us"></a>
            <div class="btns-productos">

                <?php
                if (count($productos) > 5) {
                    echo '<button id="mostrar-mas-btn"> <strong> Mostrar más </strong><i class="fa-solid fa-arrow-down"></i></button>
                <button id="mostrar-menos-btn" style="display: none;"><strong>Mostrar menos </strong><i class="fa-solid fa-arrow-up"></i></button>';
                }
                if ($rol == 1) {
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
                    Somos una marca de cosméticos comprometida con la belleza natural y sencilla. Nuestra misión es
                    proporcionar productos de alta calidad
                    que realcen tu belleza de manera natural. Creemos en la simplicidad y la autenticidad, y nuestros
                    productos están diseñados para realzar tu belleza única.
                    <br>
                    En Cosméticos Sencillos, nos esforzamos por utilizar ingredientes naturales y sostenibles en
                    nuestros productos. Nos enorgullecemos
                    de ser una marca amigable con el medio ambiente y libre de crueldad animal. Queremos que te sientas
                    bien contigo misma y con el mundo que te rodea.
                </p>
            </div>
        </section>
        <a name="contact-info"></a>

        <a name="carritox"></a>
        <div class="carrito" style="display: none;">
            <h3>Carrito de Compras</h3>
            <div class="carrito-contenido">
                <!-- Aquí se mostrarán los productos del carrito -->
            </div>
            <div class="carrito-total">
                <p>Total: <span id="total-carrito">0 COP</span></p>
                <button id="vaciar-carrito">Vaciar Carrito</button>
                <button id="comprar">Comprar</button>
            </div>
            <form id="carrito-form" action="PHP/compra.php" method="post" style="display: none;">
                <input type="hidden" name="carrito" id="carrito-input">
            </form>
        </div>
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
        <div class="container-servicios section-servicios">

                <div class="tabs">
                    <button class="tab-link active" onclick="openTab(event, 'tab1')">Consulta medica</button>
                    <button class="tab-link" onclick="openTab(event, 'tab2')">Servicio de grooming</button>
                    <button class="tab-link" onclick="openTab(event, 'tab3')">Agendamiento de citas</button>
                    <button class="tab-link" onclick="openTab(event, 'tab4')">Pedidos y servicios adicionales</button>
                </div>

                <div id="tab1" class="tab-content active ">
                    <center><h2>Consultas medicas especializadas</h2></center>
                    <table>               
                            <td> <center>
                                En la veterinaria Ciudad Canina, tenemos servicio de consulta medica con un medico <br>
                                veterinario con mas de 20 años de experiencia en donde tambien contamos con servicios<br>
                                de esterilizacion, todo tipo de vacunaciones, recomendaciones, controles.</td></center>
                                <td>
                                    <img src="max.png" alt="expopet colombia"><br>
                                Hola comoe stas esto es una prubea
                            </td>
                        </tr>
                    </table>
                </div>

                <div id="tab2" class="tab-content">
                    <center><h2>Todo en belleza para mascotas<br>
                        Como amor se atiente tu peludo</h2></center>
                    <table>
                            <td> <center>Manejamos el servicio de baño y peluqueria, donde se atienden con pelo largo, corto, cortes al gusto del cliente con asesoria de profesional.<br>

                            Adicionalmente se entrega limpieza de oidos corte de uñas y si lavado de dientes. <br>

                            Si desea agendar un baño para su mascota, puede hacerlo por este medio o puede acercarse a la veterinaria y alla le haran el respectivo agendamiento.</td></center>
                                <td>
                                    <img src="max.png" alt="expopet colombia"><br>
                                Hola comoe stas esto es una prubea
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="tab3" class="tab-content">
                    <h2>Realiza tus agendamientos<br>
                        para el tiempo que desees, tanto pedidos como servicios</h2>
                <table>
                            <td> <center>Tenemos servicio de agendamiento en donde puedes agendar desde dias antes para guardar <br>el cupo para que su mascota sea atendida de la mejor manera.<br><br>

                                    Tambien tenemos servicio de agendamiento de pedidos, donde puede pasar a <br>recoger el pedido en el establecimiento con el respectivo pago.</td></center>
                                <td>
                                    <img src="max.png" alt="expopet colombia"><br>
                                Hola comoe stas esto es una prubea
                            </td>
                        </tr>
                    </table>
                </div>
                        <div id="tab4" class="tab-content">
                    <h2>Servicios adicionales <br>
                        con clientes</h2>
                <table>
                            <td> <center>En la veterinaria, nos importa mucho la comunicacion con nuestros clientes por eso tenemos atencion virtual <br>por medio de WhatsApp, Gmail y tambien tenemos servicio de recordatorio por medio de un mensaje SMS donde se le recordara sobre su agendamiento</td></center>
                                <td>
                                    <img src="max.png" alt="expopet colombia"><br>
                                Hola comoe stas esto es una prubea
                            </td>
                        </tr>
                    </table>
                </div>

        
        </div>
        <script>    
            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;

                tabcontent = document.getElementsByClassName("tab-content");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].classList.remove("active");
                }

                tablinks = document.getElementsByClassName("tab-link");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].classList.remove("active");
                }

                document.getElementById(tabName).classList.add("active");
                evt.currentTarget.classList.add("active");
            }
        </script>

    </main>

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
                        <a href="https://web.facebook.com/profile.php?id=100092421275450"><i
                                class="fa-brands fa-facebook"></i></a>
                        <a
                            href="https://api.whatsapp.com/send/?phone=%2B573124852078&text&type=phone_number&app_absent=0"><i
                                class="fa-brands fa-whatsapp"></i></a>
                        <a href="https://www.instagram.com/laabejita22/"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>


            </div>
        </section>
        <p class="foter">&copy;2024 Tu tienda para confiar tu peludo. Todos los derechos reservados.</p>
    </footer>
    <script src="JS/carrito.js"></script>
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
                        imagen.src = "PRODUCTOS_FOTOS/" + producto.id_producto + ".jpg";
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

</html>