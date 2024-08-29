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
        <!DOCTYPE html>

        <style>
            .tabs button {
                background-color: inhe rit;
                border: 1px;
                outline: none;
                padding: 14px 16px;
                cursor: pointer;
                transition: background-color 0.3s;
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
            }

            .tab-content.active {
                display: block;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
            }

            table,
            th,
            td {
                border: 1px solid #dddddd;
            }

            th,
            td {
                text-align: left;
                padding: 8px;
            }

            th {
                background-color: #f2f2f2;
            }
        </style>


        <div class="tabs">
            <button class="tab-link active" onclick="openTab(event, 'tab1')">Pestaña 1</button>
            <button class="tab-link" onclick="openTab(event, 'tab2')">Pestaña 2</button>
            <button class="tab-link" onclick="openTab(event, 'tab3')">Pestaña 3</button>
        </div>

        <div id="tab1" class="tab-content active">
            <h2>Contenido de la Pestaña 1</h2>
            <table>
                <tr>
                    <th>Encabezado 1</th>
                    <th>Encabezado 2</th>
                    <th>Encabezado 3</th>
                </tr>
                <tr>
                    <td>Dato 1</td>
                    <td>Dato 2</td>
                    <td>Dato 3</td>
                </tr>
                <tr>
                    <td>Dato 4</td>
                    <td>Dato 5</td>
                    <td>Dato 6</td>
                </tr>
            </table>
        </div>

        <div id="tab2" class="tab-content">
            <h2>Contenido de la Pestaña 2</h2>
            <table>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
                <tr>
                    <td>Producto A</td>
                    <td>$10</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>Producto B</td>
                    <td>$20</td>
                    <td>200</td>
                </tr>
            </table>
        </div>

        <div id="tab3" class="tab-content">
            <h2>Contenido de la Pestaña 3</h2>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Ciudad</th>
                </tr>
                <tr>
                    <td>Juan Pérez</td>
                    <td>30</td>
                    <td>Madrid</td>
                </tr>
                <tr>
                    <td>María López</td>
                    <td>25</td>
                    <td>Barcelona</td>
                </tr>
            </table>
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
                    <p class="company-info-text">Somos fabricantes y distribuidores mayoristas de productos de belleza y
                        cuidado personal con tiendas en la ciudad de Bogotá, Colombia.</p>
                    <p class="company-info-item"><i class="fa-solid fa-phone"></i> +57 320 3778777</p>
                    <p class="company-info-item"><i class="fa-regular fa-envelope"></i> cosmeticos@ejemplo.com</p>
                    <p class="company-info-item"><i class="fa-solid fa-location-dot"></i> DG 60 D Sur</p>
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
        <p class="foter">&copy; 2023 Tu Tienda de Cosméticos. Todos los derechos reservados.</p>
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