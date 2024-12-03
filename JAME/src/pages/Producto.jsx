import React from "react";
import Navegacion from "../components/Navegacion";

const ProductView = () => {
    return (
        <div >
            {/* Navbar personal */}
            <Navegacion />
            <div className="container my-4">
                <div className="row">
                    {/* Columna de imágenes pequeñas */}
                    <div className="col-md-2">
                        <div className="d-flex flex-column">
                            <img
                                src="imagen1.jpg"
                                className="img-thumbnail mb-2"
                                alt="Imagen pequeña 1"
                                data-bs-target="#carouselExample"
                                data-bs-slide-to="0"
                            />
                            <img
                                src="imagen2.jpg"
                                className="img-thumbnail mb-2"
                                alt="Imagen pequeña 2"
                                data-bs-target="#carouselExample"
                                data-bs-slide-to="1"
                            />
                            <img
                                src="imagen3.jpg"
                                className="img-thumbnail mb-2"
                                alt="Imagen pequeña 3"
                                data-bs-target="#carouselExample"
                                data-bs-slide-to="2"
                            />
                            <img
                                src="imagen4.jpg"
                                className="img-thumbnail mb-2"
                                alt="Imagen pequeña 4"
                                data-bs-target="#carouselExample"
                                data-bs-slide-to="3"
                            />
                        </div>
                    </div>

                    {/* Columna de imagen grande y descripción */}
                    <div className="col-md-10">
                        {/* Carrusel de imágenes */}
                        <div id="carouselExample" className="carousel slide">
                            <div className="carousel-inner">
                                <div className="carousel-item active">
                                    <img
                                        src="imagen1.jpg"
                                        className="d-block w-100"
                                        alt="Imagen grande 1"
                                    />
                                </div>
                                <div className="carousel-item">
                                    <img
                                        src="imagen2.jpg"
                                        className="d-block w-100"
                                        alt="Imagen grande 2"
                                    />
                                </div>
                                <div className="carousel-item">
                                    <img
                                        src="imagen3.jpg"
                                        className="d-block w-100"
                                        alt="Imagen grande 3"
                                    />
                                </div>
                                <div className="carousel-item">
                                    <img
                                        src="imagen4.jpg"
                                        className="d-block w-100"
                                        alt="Imagen grande 4"
                                    />
                                </div>
                            </div>
                        </div>

                        {/* Descripción del producto */}
                        <div className="mt-4">
                            <h2>Purina® Dog Chow® Alta Proteína</h2>
                            <p>
                                <strong>Tamaños disponibles:</strong> 1 kg, 2 kg, 7.5 kg, 20 kg
                            </p>
                            <p>
                                Alimento completo y balanceado para perros adultos de todos los
                                tamaños, fórmula de alta proteína a base de carnes, pollo y huevo.
                            </p>
                            <h5>Beneficios:</h5>
                            <ul>
                                <li>Ayuda a mantener sus dientes limpios para una salud oral</li>
                                <li>Ayuda a mantener su corazón sano</li>
                                <li>Músculos y huesos más fuertes</li>
                                <li>Promueve un pelaje brillante</li>
                                <li>Ayuda a mantenerlo sano y en forma</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default ProductView;
