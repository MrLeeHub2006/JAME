import React, { useState } from "react";

export default function Index() {
    const [seccionActiva, setSeccionActiva] = useState("consulta");

    const renderContenido = () => {
        switch (seccionActiva) {
            case "consulta":
                return (
                    <>
                        <h3 className="mb-6">Consultas médicas especializadas</h3>
                        <p>
                            En la veterinaria Ciudad Canina, tenemos servicio de consulta médica con un médico veterinario con más de
                            20 años de experiencia, incluyendo servicios de esterilización, vacunaciones, desparasitaciones y controles.
                        </p>
                    </>
                );
            case "urgencias":
                return (
                    <>
                        <h3 className="mb-6">Servicio de urgencias</h3>
                        <p>
                            Contamos con un servicio de urgencias disponible 24/7 para atender cualquier situación médica que pueda
                            afectar a tu mascota. Tu tranquilidad y la salud de tu compañero son nuestra prioridad.
                        </p>
                    </>
                );
            case "productos":
                return (
                    <>
                        <h3 className="mb-6">Productos y servicios adicionales</h3>
                        <p>
                            Ofrecemos una amplia variedad de productos y servicios, desde alimentos premium hasta accesorios y
                            tratamientos especializados para el bienestar de tu mascota.
                        </p>
                    </>
                );
            default:
                return null;
        }
    };

    return (
        <div>
            {/* Banner superior */}
            <div className="bg-primary text-dark py-2 text-center bg-info">
                <p className="mb-0">La mejor opción para el cuidado de tu mascota</p>
            </div>

            {/* Header */}
            <header className="bg-white py-3 border-bottom">
                <div className="container">
                    <div className="row align-items-center">
                        <div className="col-md-4 d-flex align-items-center">
                            <img src="https://via.placeholder.com/80" alt="Logo Veterinaria" className="rounded-circle me-5" />
                            <div className="input-group">
                                <input type="text" className="form-control" placeholder="Buscar productos..." />
                                <button className="btn btn-outline-secondary" type="button"><i className="fas fa-search"></i></button>
                            </div>
                        </div>    
                        <div className="col-md-5 text-center">
                            <h1>Veterinaria Ciudad Canina</h1>
                        </div>               
                        <div className="col-md-2 text-end">
                            <a href="#" className="text-decoration-none text-secondary me-3">INGRESAR</a>
                            <a href="#" className="text-decoration-none text-secondary">CARRITO</a>
                        </div>
                    </div>
                </div>
                <div className="text-center">
                    <nav className="mt-4 bg-info text-center">
                        <ul className="nav">
                            <li className="nav-item "><a href="#" className="nav-link text-dark">Home</a></li>
                            <li className="nav-item "><a href="#" className="nav-link text-dark">Productos</a></li>
                            <li className="nav-item "><a href="#" className="nav-link text-dark">Servicios</a></li>
                            <li className="nav-item "><a href="#" className="nav-link text-dark">Contáctanos</a></li>
                            <li className="nav-item "><a href="#" className="nav-link text-dark">Acerca de nosotros</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown link
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </header>

            {/* Sección de Productos Nuevos */}
            <section className="bg-light-blue py-5">
                <div className="container">
                    <h2 className="text-white text-center mb-4">Productos Nuevos</h2>
                    <div className="row">
                        <div className="col-6 col-md-4 col-lg-2 mb-4">
                            <div className="card">
                                <img src="https://via.placeholder.com/150" className="card-img-top" alt="Producto 1" />
                                <div className="card-body text-center">
                                    <button className="btn btn-primary">Comprar ahora</button>
                                </div>
                            </div>
                        </div>
                        <div className="col-6 col-md-4 col-lg-2 mb-4">
                            <div className="card">
                                <img src="https://via.placeholder.com/150" className="card-img-top" alt="Producto 2" />
                                <div className="card-body text-center">
                                    <button className="btn btn-primary">Comprar ahora</button>
                                </div>
                            </div>
                        </div>
                        <div className="col-6 col-md-4 col-lg-2 mb-4">
                            <div className="card">
                                <img src="https://via.placeholder.com/150" className="card-img-top" alt="Producto 3" />
                                <div className="card-body text-center">
                                    <button className="btn btn-primary">Comprar ahora</button>
                                </div>
                            </div>
                        </div>
                        <div className="col-6 col-md-4 col-lg-2 mb-4">
                            <div className="card">
                                <img src="https://via.placeholder.com/150" className="card-img-top" alt="Producto 4" />
                                <div className="card-body text-center">
                                    <button className="btn btn-primary">Comprar ahora</button>
                                </div>
                            </div>
                        </div>
                        <div className="col-6 col-md-4 col-lg-2 mb-4">
                            <div className="card">
                                <img src="https://via.placeholder.com/150" className="card-img-top" alt="Producto 5" />
                                <div className="card-body text-center">
                                    <button className="btn btn-primary">Comprar ahora</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="text-center mt-4">
                        <button className="btn btn-light">mostrar más</button>
                    </div>
                </div>
            </section>

            {/* Sección de Servicios */}
            <section className="py-5 bg-light">
                <div className="container bg-info-emphasis">
                    <div className="text-center mb-5">
                        <p className="lead bg-info-emphasis">
                            Nuestra clínica está conformada por profesionales altamente capacitados, con amplia experiencia en atención veterinaria y un profundo amor por los animales. Cada uno de nuestros servicios ha sido cuidadosamente diseñado para brindar atención médica de alta calidad, considerando las necesidades individuales de cada uno de nuestros pacientes.
                        </p>
                        <div className="mt-4">
                            <button className="btn btn-primary me-2 mb-2" onClick={() => setSeccionActiva("consulta")}>Consulta médica</button>
                            <button className="btn btn-primary me-2 mb-2" onClick={() => setSeccionActiva("urgencias")}>Servicio de urgencias</button>
                            <button className="btn btn-primary mb-2" onClick={() => setSeccionActiva("productos")}>Productos y servicios adicionales</button>
                        </div>
                    </div>
                    <div className="row align-items-center">
                        <div className="col-md-6">{renderContenido()}</div>
                        <div className="col-md-6 text-center">
                            <img src="https://via.placeholder.com/300" alt="Veterinario" className="img-fluid rounded" />
                        </div>
                    </div>
                </div>
            </section>

            {/* Sección de Contacto */}
            <section className="py-5">
                <div className="container">
                    <div className="row">
                        <div className="col-md-6 mb-4 mb-md-0">
                            <h3 className="mb-4">CONTACTO</h3>
                            <form>
                                <div className="mb-3">
                                    <input type="text" className="form-control" placeholder="Nombre" />
                                </div>
                                <div className="mb-3">
                                    <input type="email" className="form-control" placeholder="Email" />
                                </div>
                                <div className="mb-3">
                                    <textarea className="form-control" rows="4" placeholder="Mensaje"></textarea>
                                </div>
                                <button type="submit" className="btn btn-primary">Enviar</button>
                            </form>
                        </div>
                        <div className="col-md-6">
                            <h3 className="mb-4">INFORMACIÓN DE LA EMPRESA</h3>
                            <p>+57 321 234567</p>
                            <div>
                                <a href="#" className="text-decoration-none me-3"><i className="fab fa-facebook"></i></a>
                                <a href="#" className="text-decoration-none me-3"><i className="fab fa-whatsapp"></i></a>
                                <a href="#" className="text-decoration-none"><i className="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {/* Footer */}
            <footer className="bg-dark text-white py-3 text-center">
                <p className="mb-0">©2024 Tu tienda para cuidar tu peludo. Todos los derechos reservados.</p>
            </footer>
        </div>
    );
}
