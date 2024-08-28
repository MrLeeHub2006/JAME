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
<<<<<<< HEAD
                            echo 'Ingresar';
=======
                            echo 'Invitado';
>>>>>>> 56e00d499d15adbeda24b8ea54caa1d853230ed8
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
<<<<<<< HEAD
                
=======
>>>>>>> 56e00d499d15adbeda24b8ea54caa1d853230ed8
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
<<<<<<< HEAD
=======
        </div>
        <!DOCTYPE html>

        <style>
            .tabs button {
                background-color: inhe rit;
                border: none;
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
>>>>>>> 56e00d499d15adbeda24b8ea54caa1d853230ed8
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



        <div class="elementor-element elementor-element-c7bb856 elementor-hidden-tablet elementor-hidden-mobile e-flex e-con-boxed e-con e-parent"
            data-id="c7bb856" data-element_type="container"
            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-683eb46 elementor-widget elementor-widget-heading"
                    data-id="683eb46" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default"><span
                                class=" blue-gradient">servicios
                            </span>City Can Vet</h2>
                    </div>
                </div>
                <div class="elementor-element elementor-element-350b859 elementor-hidden-tablet elementor-hidden-mobile e-n-tabs-mobile elementor-widget elementor-widget-n-tabs"
                    data-id="350b859" data-element_type="widget"
                    data-settings="{&quot;horizontal_scroll&quot;:&quot;disable&quot;}"
                    data-widget_type="nested-tabs.default">
                    <div class="elementor-widget-container">
                        <div class="e-n-tabs e-activated" data-widget-number="55621721"
                            aria-label="Pestañas. Abre elementos con Intro o Espacio, ciérralos con Escape y navega con las fechas."
                            data-touch-mode="true">
                            <div class="e-n-tabs-heading" role="tablist">
                                <button id="e-n-tab-title-556217211" class="e-n-tab-title" aria-selected="true"
                                    data-tab-index="1" role="tab" tabindex="0" aria-controls="e-n-tab-content-556217211"
                                    style="--n-tabs-title-order: 1;">
                                    <span class="e-n-tab-title-text">
                                        Consultas medica</span>
                                </button>
                                <button id="e-n-tab-title-556217212" class="e-n-tab-title" aria-selected="false"
                                    data-tab-index="2" role="tab" tabindex="-1"
                                    aria-controls="e-n-tab-content-556217212" style="--n-tabs-title-order: 2;">
                                    <span class="e-n-tab-title-text">
                                        Servicio de grooming</span>
                                </button>
                                <button id="e-n-tab-title-556217213" class="e-n-tab-title" aria-selected="false"
                                    data-tab-index="3" role="tab" tabindex="-1"
                                    aria-controls="e-n-tab-content-556217213" style="--n-tabs-title-order: 3;">
                                    <span class="e-n-tab-title-text">
                                        Agendamiento de citas </span>
                                </button>
                                <button id="e-n-tab-title-556217214" class="e-n-tab-title" aria-selected="false"
                                    data-tab-index="4" role="tab" tabindex="-1"
                                    aria-controls="e-n-tab-content-556217214" style="--n-tabs-title-order: 4;">
                                    <span class="e-n-tab-title-text">
                                        Pedidos y servicios adicionales</span>
                                </button>
                            </div>
                            <div class="e-n-tabs-content">
                                <div id="e-n-tab-content-556217211" role="tabpanel"
                                    aria-labelledby="e-n-tab-title-556217211" data-tab-index="1"
                                    style="--n-tabs-title-order: 1;"
                                    class="e-active elementor-element elementor-element-7329ba5 e-con-full e-flex e-con e-child"
                                    data-id="7329ba5" data-element_type="container">
                                    <div class="elementor-element elementor-element-e8086c2 e-con-full e-flex e-con e-child"
                                        data-id="e8086c2" data-element_type="container"
                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                        <div class="elementor-element elementor-element-6c45778 e-con-full e-flex e-con e-child"
                                            data-id="6c45778" data-element_type="container">
                                            <div class="elementor-element elementor-element-4501918 elementor-widget elementor-widget-heading"
                                                data-id="4501918" data-element_type="widget"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2 class="elementor-heading-title elementor-size-default">Consultas
                                                        medicas<br><span class=" blue-gradient">especializadas </span>
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-29c43a0 elementor-widget__width-initial elementor-widget elementor-widget-text-editor"
                                                data-id="29c43a0" data-element_type="widget"
                                                data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    <p>En la veterinaria Ciudad Canina, tenemos servicio de consulta
                                                        medica con un medico veterinario con mas de 20 años de
                                                        experiencia
                                                        en donde tambien contamos con servicios de esterilizacion, todo
                                                        tipo de vacunaciones, recomendaciones, controles.</p>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-0b75e0c btn-lead elementor-widget elementor-widget-button"
                                                data-id="0b75e0c" data-element_type="widget"
                                                data-widget_type="button.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-button-wrapper">
                                                        <a class="elementor-button elementor-button-link elementor-size-sm"
                                                            href="" target="_blank" rel="nofollow">
                                                            <span class="elementor-button-content-wrapper">
                                                                <span class="elementor-button-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17"
                                                                        height="15" viewBox="0 0 17 15" fill="none">
                                                                        <path
                                                                            d="M16.6001 8.18344C16.6062 8.17661 16.6121 8.16954 16.6183 8.16246C16.626 8.15351 16.6338 8.14455 16.6414 8.13536C16.6491 8.12593 16.6564 8.11627 16.664 8.1066C16.6694 8.09977 16.6748 8.09293 16.68 8.08586C16.688 8.07502 16.6958 8.06394 16.7036 8.05287C16.7078 8.04674 16.7123 8.04061 16.7163 8.03448C16.7241 8.02293 16.7314 8.01115 16.7387 7.9996C16.7425 7.99347 16.7465 7.98734 16.7502 7.98121C16.7571 7.96967 16.7637 7.95788 16.7703 7.94633C16.774 7.9395 16.7781 7.93266 16.7816 7.92583C16.7875 7.91475 16.7931 7.90343 16.7988 7.89236C16.8028 7.88458 16.8068 7.87656 16.8106 7.86879C16.8155 7.85842 16.82 7.84805 16.8247 7.83768C16.8287 7.82848 16.833 7.81929 16.8367 7.80986C16.8405 7.80067 16.8443 7.79124 16.8478 7.78182C16.8521 7.77121 16.8561 7.7606 16.8598 7.74976C16.8627 7.74151 16.8655 7.73326 16.8683 7.72501C16.8723 7.71299 16.8763 7.70097 16.8799 7.68895C16.882 7.68164 16.8841 7.6741 16.8862 7.6668C16.89 7.65383 16.8935 7.64087 16.8968 7.62767C16.8985 7.6206 16.9001 7.61376 16.9018 7.60669C16.9049 7.59326 16.9079 7.57959 16.9108 7.56592C16.9122 7.55861 16.9133 7.5513 16.9145 7.54423C16.9169 7.5308 16.9192 7.5176 16.9214 7.50393C16.9225 7.49544 16.9235 7.48696 16.9247 7.47871C16.9263 7.46645 16.928 7.45396 16.9291 7.44147C16.9303 7.43016 16.931 7.41861 16.9317 7.40729C16.9324 7.39763 16.9334 7.3882 16.9339 7.37854C16.936 7.33564 16.936 7.29275 16.9339 7.25008C16.9334 7.24042 16.9324 7.23076 16.9317 7.22133C16.931 7.20978 16.9303 7.19847 16.9291 7.18715C16.928 7.17466 16.9263 7.16241 16.9247 7.14991C16.9235 7.14143 16.9228 7.13294 16.9214 7.12469C16.9195 7.11126 16.9169 7.09782 16.9145 7.08439C16.9131 7.07708 16.9122 7.06978 16.9108 7.06271C16.9082 7.04904 16.9049 7.0356 16.9018 7.02193C16.9001 7.01486 16.8987 7.00779 16.8968 7.00095C16.8935 6.98775 16.89 6.97479 16.8862 6.96183C16.8841 6.95452 16.8822 6.94698 16.8799 6.93967C16.8761 6.92742 16.8723 6.91563 16.8683 6.90361C16.8655 6.89536 16.8629 6.88711 16.8598 6.87886C16.8561 6.86802 16.8518 6.85741 16.8478 6.84681C16.8443 6.83738 16.8405 6.82795 16.8367 6.81876C16.833 6.80933 16.8287 6.80014 16.8247 6.79095C16.82 6.78058 16.8155 6.77021 16.8106 6.75984C16.8068 6.75182 16.8028 6.74404 16.7988 6.73627C16.7931 6.72495 16.7875 6.71388 16.7816 6.7028C16.7778 6.69596 16.774 6.68913 16.7703 6.68229C16.7637 6.67051 16.7571 6.65896 16.7502 6.64741C16.7465 6.64128 16.7425 6.63515 16.7387 6.62902C16.7314 6.61724 16.7241 6.60569 16.7163 6.59414C16.7121 6.58801 16.7078 6.58188 16.7036 6.57576C16.6958 6.56468 16.6883 6.5536 16.68 6.54276C16.6748 6.53569 16.6694 6.52885 16.664 6.52202C16.6564 6.51235 16.6491 6.50269 16.6414 6.49326C16.6338 6.48407 16.626 6.47511 16.6183 6.46616C16.6121 6.45909 16.6062 6.45202 16.6001 6.44518C16.5855 6.42915 16.5706 6.41336 16.5553 6.39804L11.0101 0.851165C10.5038 0.34489 9.68313 0.34489 9.17685 0.851165C8.67058 1.35744 8.67058 2.17814 9.17685 2.68441L12.5096 6.01716H1.44672C0.730675 6.01716 0.150391 6.59744 0.150391 7.31349C0.150391 8.02953 0.730675 8.60982 1.44672 8.60982H12.5094L9.17662 11.9426C8.67034 12.4488 8.67034 13.2695 9.17662 13.7758C9.42975 14.0289 9.76138 14.1555 10.0932 14.1555C10.4251 14.1555 10.7567 14.0289 11.0099 13.7758L16.5551 8.23058C16.5704 8.21526 16.5853 8.1997 16.5999 8.18344H16.6001Z"
                                                                            fill="white"></path>
                                                                    </svg> </span>
                                                                <span class="elementor-button-text">Agendar cita</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-a276a70 e-con-full e-flex e-con e-child"
                                            data-id="a276a70" data-element_type="container">
                                            <div class="elementor-element elementor-element-4d69cfc elementor-widget elementor-widget-image"
                                                data-id="4d69cfc" data-element_type="widget"
                                                data-widget_type="image.default">
                                                <div class="elementor-widget-container">
                                                    <img loading="lazy" decoding="async" width="824" height="693" src=""
                                                        class="attachment-large size-large wp-image-4773"
                                                        alt="Historias clínicas Veterinarias"
                                                        srcset="https://okvet.co/wp-content/uploads/2024/06/historia-capture.png 824w, https://okvet.co/wp-content/uploads/2024/06/historia-capture-600x505.png 600w, https://okvet.co/wp-content/uploads/2024/06/historia-capture-768x646.png 768w"
                                                        sizes="(max-width: 824px) 100vw, 824px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="e-n-tab-content-556217212" role="tabpanel"
                                    aria-labelledby="e-n-tab-title-556217212" data-tab-index="2"
                                    style="--n-tabs-title-order: 2;"
                                    class=" elementor-element elementor-element-4ecc661 e-con-full e-flex e-con e-child"
                                    data-id="4ecc661" data-element_type="container">
                                    <div class="elementor-element elementor-element-4e8fbb3 e-con-full e-flex e-con e-child"
                                        data-id="4e8fbb3" data-element_type="container"
                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                        <div class="elementor-element elementor-element-8ec78f4 e-con-full e-flex e-con e-child"
                                            data-id="8ec78f4" data-element_type="container">
                                            <div class="elementor-element elementor-element-936f32a elementor-widget elementor-widget-heading"
                                                data-id="936f32a" data-element_type="widget"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2 class="elementor-heading-title elementor-size-default"><span
                                                            class=" blue-gradient">Todo en belleza para
                                                            mascotas<br></span>Como amor se atiente tu peludo</h2>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-f725ebd elementor-widget__width-initial elementor-widget elementor-widget-text-editor"
                                                data-id="f725ebd" data-element_type="widget"
                                                data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    <p>Manejamos el servicio de baño y peluqueria, donde se atienden con
                                                        pelo largo, corto,
                                                        cortes al gusto del cliente con asesoria de profesional.</p>
                                                    <p>Adicionalmente se entrega limpieza de oidos corte de uñas y si
                                                        lavado de dientes.&nbsp;</p>
                                                    <p>Si desea agendar un baño para su mascota, puede hacerlo por este
                                                        medio o puede acercarse a la veterinaria y alla le haran el
                                                        respectivo agendamiento.&nbsp;</p>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-1b9672f elementor-widget elementor-widget-button"
                                                data-id="1b9672f" data-element_type="widget"
                                                data-widget_type="button.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-button-wrapper">
                                                        <a class="elementor-button elementor-button-link elementor-size-sm"
                                                            href="">
                                                            <span class="elementor-button-content-wrapper">
                                                                <span class="elementor-button-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17"
                                                                        height="15" viewBox="0 0 17 15" fill="none">
                                                                        <path
                                                                            d="M16.6001 8.18344C16.6062 8.17661 16.6121 8.16954 16.6183 8.16246C16.626 8.15351 16.6338 8.14455 16.6414 8.13536C16.6491 8.12593 16.6564 8.11627 16.664 8.1066C16.6694 8.09977 16.6748 8.09293 16.68 8.08586C16.688 8.07502 16.6958 8.06394 16.7036 8.05287C16.7078 8.04674 16.7123 8.04061 16.7163 8.03448C16.7241 8.02293 16.7314 8.01115 16.7387 7.9996C16.7425 7.99347 16.7465 7.98734 16.7502 7.98121C16.7571 7.96967 16.7637 7.95788 16.7703 7.94633C16.774 7.9395 16.7781 7.93266 16.7816 7.92583C16.7875 7.91475 16.7931 7.90343 16.7988 7.89236C16.8028 7.88458 16.8068 7.87656 16.8106 7.86879C16.8155 7.85842 16.82 7.84805 16.8247 7.83768C16.8287 7.82848 16.833 7.81929 16.8367 7.80986C16.8405 7.80067 16.8443 7.79124 16.8478 7.78182C16.8521 7.77121 16.8561 7.7606 16.8598 7.74976C16.8627 7.74151 16.8655 7.73326 16.8683 7.72501C16.8723 7.71299 16.8763 7.70097 16.8799 7.68895C16.882 7.68164 16.8841 7.6741 16.8862 7.6668C16.89 7.65383 16.8935 7.64087 16.8968 7.62767C16.8985 7.6206 16.9001 7.61376 16.9018 7.60669C16.9049 7.59326 16.9079 7.57959 16.9108 7.56592C16.9122 7.55861 16.9133 7.5513 16.9145 7.54423C16.9169 7.5308 16.9192 7.5176 16.9214 7.50393C16.9225 7.49544 16.9235 7.48696 16.9247 7.47871C16.9263 7.46645 16.928 7.45396 16.9291 7.44147C16.9303 7.43016 16.931 7.41861 16.9317 7.40729C16.9324 7.39763 16.9334 7.3882 16.9339 7.37854C16.936 7.33564 16.936 7.29275 16.9339 7.25008C16.9334 7.24042 16.9324 7.23076 16.9317 7.22133C16.931 7.20978 16.9303 7.19847 16.9291 7.18715C16.928 7.17466 16.9263 7.16241 16.9247 7.14991C16.9235 7.14143 16.9228 7.13294 16.9214 7.12469C16.9195 7.11126 16.9169 7.09782 16.9145 7.08439C16.9131 7.07708 16.9122 7.06978 16.9108 7.06271C16.9082 7.04904 16.9049 7.0356 16.9018 7.02193C16.9001 7.01486 16.8987 7.00779 16.8968 7.00095C16.8935 6.98775 16.89 6.97479 16.8862 6.96183C16.8841 6.95452 16.8822 6.94698 16.8799 6.93967C16.8761 6.92742 16.8723 6.91563 16.8683 6.90361C16.8655 6.89536 16.8629 6.88711 16.8598 6.87886C16.8561 6.86802 16.8518 6.85741 16.8478 6.84681C16.8443 6.83738 16.8405 6.82795 16.8367 6.81876C16.833 6.80933 16.8287 6.80014 16.8247 6.79095C16.82 6.78058 16.8155 6.77021 16.8106 6.75984C16.8068 6.75182 16.8028 6.74404 16.7988 6.73627C16.7931 6.72495 16.7875 6.71388 16.7816 6.7028C16.7778 6.69596 16.774 6.68913 16.7703 6.68229C16.7637 6.67051 16.7571 6.65896 16.7502 6.64741C16.7465 6.64128 16.7425 6.63515 16.7387 6.62902C16.7314 6.61724 16.7241 6.60569 16.7163 6.59414C16.7121 6.58801 16.7078 6.58188 16.7036 6.57576C16.6958 6.56468 16.6883 6.5536 16.68 6.54276C16.6748 6.53569 16.6694 6.52885 16.664 6.52202C16.6564 6.51235 16.6491 6.50269 16.6414 6.49326C16.6338 6.48407 16.626 6.47511 16.6183 6.46616C16.6121 6.45909 16.6062 6.45202 16.6001 6.44518C16.5855 6.42915 16.5706 6.41336 16.5553 6.39804L11.0101 0.851165C10.5038 0.34489 9.68313 0.34489 9.17685 0.851165C8.67058 1.35744 8.67058 2.17814 9.17685 2.68441L12.5096 6.01716H1.44672C0.730675 6.01716 0.150391 6.59744 0.150391 7.31349C0.150391 8.02953 0.730675 8.60982 1.44672 8.60982H12.5094L9.17662 11.9426C8.67034 12.4488 8.67034 13.2695 9.17662 13.7758C9.42975 14.0289 9.76138 14.1555 10.0932 14.1555C10.4251 14.1555 10.7567 14.0289 11.0099 13.7758L16.5551 8.23058C16.5704 8.21526 16.5853 8.1997 16.5999 8.18344H16.6001Z"
                                                                            fill="white"></path>
                                                                    </svg> </span>
                                                                <span class="elementor-button-text">Agendar
                                                                    Grooming</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-60c63d1 e-con-full e-flex e-con e-child"
                                            data-id="60c63d1" data-element_type="container">
                                            <div class="elementor-element elementor-element-96b06bd elementor-widget elementor-widget-image"
                                                data-id="96b06bd" data-element_type="widget"
                                                data-widget_type="image.default">
                                                <div class="elementor-widget-container">
                                                    <img loading="lazy" decoding="async" width="549" height="462"
                                                        src="https://okvet.co/wp-content/uploads/2024/06/adminvet.png"
                                                        class="attachment-large size-large wp-image-4778"
                                                        alt="Gestión administrativo veterinario">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="e-n-tab-content-556217213" role="tabpanel"
                                    aria-labelledby="e-n-tab-title-556217213" data-tab-index="3"
                                    style="--n-tabs-title-order: 3;"
                                    class=" elementor-element elementor-element-b730deb e-flex e-con-boxed e-con e-child"
                                    data-id="b730deb" data-element_type="container">
                                    <div class="e-con-inner">
                                        <div class="elementor-element elementor-element-124e5d0 e-con-full e-flex e-con e-child"
                                            data-id="124e5d0" data-element_type="container"
                                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                            <div class="elementor-element elementor-element-762e112 e-con-full e-flex e-con e-child"
                                                data-id="762e112" data-element_type="container">
                                                <div class="elementor-element elementor-element-1c931af elementor-widget elementor-widget-heading"
                                                    data-id="1c931af" data-element_type="widget"
                                                    data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <h2 class="elementor-heading-title elementor-size-default"><span
                                                                class=" blue-gradient">Realiza tus
                                                                agendamientos</span><br>para el tiempo que desees, tanto
                                                            pedidos como servicios</h2>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-d9b2836 elementor-widget__width-initial elementor-widget elementor-widget-text-editor"
                                                    data-id="d9b2836" data-element_type="widget"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        <p>Tenemos servicio de agendamiento en donde puedes agendar
                                                            desde dias
                                                            antes para guardar el cupo para que su mascota sea atendida
                                                            de la mejor manera.</p>
                                                        <p>Tambien tenemos servicio de agendamiento de pedidos, donde
                                                            puede pasar a
                                                            recoger el pedido en el establecimiento con el respectivo
                                                            pago.</p>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-7b22305 elementor-widget elementor-widget-button"
                                                    data-id="7b22305" data-element_type="widget"
                                                    data-widget_type="button.default">

                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-59bbd1c e-con-full e-flex e-con e-child"
                                                data-id="59bbd1c" data-element_type="container">
                                                <div class="elementor-element elementor-element-5a68f2f elementor-widget elementor-widget-image"
                                                    data-id="5a68f2f" data-element_type="widget"
                                                    data-widget_type="image.default">
                                                    <div class="elementor-widget-container">
                                                        <img loading="lazy" decoding="async" width="1034" height="761"
                                                            src="https://okvet.co/wp-content/uploads/2024/06/agenda-okvet.png"
                                                            class="attachment-large size-large wp-image-4365"
                                                            alt="Agenda veterinaria"
                                                            srcset="https://okvet.co/wp-content/uploads/2024/06/agenda-okvet.png 1034w, https://okvet.co/wp-content/uploads/2024/06/agenda-okvet-600x442.png 600w, https://okvet.co/wp-content/uploads/2024/06/agenda-okvet-768x565.png 768w"
                                                            sizes="(max-width: 1034px) 100vw, 1034px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="e-n-tab-content-556217214" role="tabpanel"
                                    aria-labelledby="e-n-tab-title-556217214" data-tab-index="4"
                                    style="--n-tabs-title-order: 4;"
                                    class=" elementor-element elementor-element-8e2f066 e-flex e-con-boxed e-con e-child"
                                    data-id="8e2f066" data-element_type="container">
                                    <div class="e-con-inner">
                                        <div class="elementor-element elementor-element-048cfab e-con-full e-flex e-con e-child"
                                            data-id="048cfab" data-element_type="container"
                                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                            <div class="elementor-element elementor-element-446f054 e-con-full e-flex e-con e-child"
                                                data-id="446f054" data-element_type="container">
                                                <div class="elementor-element elementor-element-c25b9a4 elementor-widget elementor-widget-heading"
                                                    data-id="c25b9a4" data-element_type="widget"
                                                    data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <h2 class="elementor-heading-title elementor-size-default"><span
                                                                class=" blue-gradient">Servicios adicionales</span><br>
                                                            con clientes</h2>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-7356423 elementor-widget__width-initial elementor-widget elementor-widget-text-editor"
                                                    data-id="7356423" data-element_type="widget"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        <p>En la veterinaria, nos importa mucho la comunicacion con
                                                            nuestros clientes por eso tenemos
                                                            atencion virtual por medio de WhatsApp, Gmail y tambien
                                                            tenemos servicio de recordatorio por medio de un mensaje
                                                            SMS donde se le recordara sobre su agendamiento</p>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-4a63cf2 elementor-widget elementor-widget-button"
                                                    data-id="4a63cf2" data-element_type="widget"
                                                    data-widget_type="button.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-button-wrapper">
                                                            <a class="elementor-button elementor-button-link elementor-size-sm"
                                                                href="/html/ejercicio prueba.html">
                                                                <span class="elementor-button-content-wrapper">
                                                                    <span class="elementor-button-icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="17" height="15" viewBox="0 0 17 15"
                                                                            fill="none">
                                                                            <path
                                                                                d="M16.6001 8.18344C16.6062 8.17661 16.6121 8.16954 16.6183 8.16246C16.626 8.15351 16.6338 8.14455 16.6414 8.13536C16.6491 8.12593 16.6564 8.11627 16.664 8.1066C16.6694 8.09977 16.6748 8.09293 16.68 8.08586C16.688 8.07502 16.6958 8.06394 16.7036 8.05287C16.7078 8.04674 16.7123 8.04061 16.7163 8.03448C16.7241 8.02293 16.7314 8.01115 16.7387 7.9996C16.7425 7.99347 16.7465 7.98734 16.7502 7.98121C16.7571 7.96967 16.7637 7.95788 16.7703 7.94633C16.774 7.9395 16.7781 7.93266 16.7816 7.92583C16.7875 7.91475 16.7931 7.90343 16.7988 7.89236C16.8028 7.88458 16.8068 7.87656 16.8106 7.86879C16.8155 7.85842 16.82 7.84805 16.8247 7.83768C16.8287 7.82848 16.833 7.81929 16.8367 7.80986C16.8405 7.80067 16.8443 7.79124 16.8478 7.78182C16.8521 7.77121 16.8561 7.7606 16.8598 7.74976C16.8627 7.74151 16.8655 7.73326 16.8683 7.72501C16.8723 7.71299 16.8763 7.70097 16.8799 7.68895C16.882 7.68164 16.8841 7.6741 16.8862 7.6668C16.89 7.65383 16.8935 7.64087 16.8968 7.62767C16.8985 7.6206 16.9001 7.61376 16.9018 7.60669C16.9049 7.59326 16.9079 7.57959 16.9108 7.56592C16.9122 7.55861 16.9133 7.5513 16.9145 7.54423C16.9169 7.5308 16.9192 7.5176 16.9214 7.50393C16.9225 7.49544 16.9235 7.48696 16.9247 7.47871C16.9263 7.46645 16.928 7.45396 16.9291 7.44147C16.9303 7.43016 16.931 7.41861 16.9317 7.40729C16.9324 7.39763 16.9334 7.3882 16.9339 7.37854C16.936 7.33564 16.936 7.29275 16.9339 7.25008C16.9334 7.24042 16.9324 7.23076 16.9317 7.22133C16.931 7.20978 16.9303 7.19847 16.9291 7.18715C16.928 7.17466 16.9263 7.16241 16.9247 7.14991C16.9235 7.14143 16.9228 7.13294 16.9214 7.12469C16.9195 7.11126 16.9169 7.09782 16.9145 7.08439C16.9131 7.07708 16.9122 7.06978 16.9108 7.06271C16.9082 7.04904 16.9049 7.0356 16.9018 7.02193C16.9001 7.01486 16.8987 7.00779 16.8968 7.00095C16.8935 6.98775 16.89 6.97479 16.8862 6.96183C16.8841 6.95452 16.8822 6.94698 16.8799 6.93967C16.8761 6.92742 16.8723 6.91563 16.8683 6.90361C16.8655 6.89536 16.8629 6.88711 16.8598 6.87886C16.8561 6.86802 16.8518 6.85741 16.8478 6.84681C16.8443 6.83738 16.8405 6.82795 16.8367 6.81876C16.833 6.80933 16.8287 6.80014 16.8247 6.79095C16.82 6.78058 16.8155 6.77021 16.8106 6.75984C16.8068 6.75182 16.8028 6.74404 16.7988 6.73627C16.7931 6.72495 16.7875 6.71388 16.7816 6.7028C16.7778 6.69596 16.774 6.68913 16.7703 6.68229C16.7637 6.67051 16.7571 6.65896 16.7502 6.64741C16.7465 6.64128 16.7425 6.63515 16.7387 6.62902C16.7314 6.61724 16.7241 6.60569 16.7163 6.59414C16.7121 6.58801 16.7078 6.58188 16.7036 6.57576C16.6958 6.56468 16.6883 6.5536 16.68 6.54276C16.6748 6.53569 16.6694 6.52885 16.664 6.52202C16.6564 6.51235 16.6491 6.50269 16.6414 6.49326C16.6338 6.48407 16.626 6.47511 16.6183 6.46616C16.6121 6.45909 16.6062 6.45202 16.6001 6.44518C16.5855 6.42915 16.5706 6.41336 16.5553 6.39804L11.0101 0.851165C10.5038 0.34489 9.68313 0.34489 9.17685 0.851165C8.67058 1.35744 8.67058 2.17814 9.17685 2.68441L12.5096 6.01716H1.44672C0.730675 6.01716 0.150391 6.59744 0.150391 7.31349C0.150391 8.02953 0.730675 8.60982 1.44672 8.60982H12.5094L9.17662 11.9426C8.67034 12.4488 8.67034 13.2695 9.17662 13.7758C9.42975 14.0289 9.76138 14.1555 10.0932 14.1555C10.4251 14.1555 10.7567 14.0289 11.0099 13.7758L16.5551 8.23058C16.5704 8.21526 16.5853 8.1997 16.5999 8.18344H16.6001Z"
                                                                                fill="white"></path>
                                                                        </svg> </span>
                                                                    <span class="elementor-button-text">Unirme a Ciudad
                                                                        Canina</span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-68e5bb0 e-con-full e-flex e-con e-child"
                                                data-id="68e5bb0" data-element_type="container">
                                                <div class="elementor-element elementor-element-7aecbba elementor-widget elementor-widget-image"
                                                    data-id="7aecbba" data-element_type="widget"
                                                    data-widget_type="image.default">
                                                    <div class="elementor-widget-container">
                                                        <img loading="lazy" decoding="async" width="824" height="693"
                                                            src="https://okvet.co/wp-content/uploads/2024/06/notif.png"
                                                            class="attachment-large size-large wp-image-4772"
                                                            alt="Notificaciones veterinarias"
                                                            srcset="https://okvet.co/wp-content/uploads/2024/06/notif.png 824w, https://okvet.co/wp-content/uploads/2024/06/notif-600x505.png 600w, https://okvet.co/wp-content/uploads/2024/06/notif-768x646.png 768w"
                                                            sizes="(max-width: 824px) 100vw, 824px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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