import React from 'react'
import Footer from '../components/Footer'


export default function Productos() {
  return (
    <div>
  
      {/* <!-- Encabezado --> */}
      <header className="bg-light py-3 border-bottom">
      <div className="bg-primary text-dark py-2 text-center bg-info">
              <p className="mb-0">La mejor opción para el cuidado de tu mascota</p>
          </div>

          {/* Header */}
          <header className="bg-white py-3 border-bottom">
              <div className="container">
                  <div className="row align-items-center">
                      <div className="col-md-4 d-flex align-items-center">
                          <img src="/src/img/logovet.png" alt="Logo Veterinaria" className=" w-25 rounded-circle me-5" />
                          <div className="input-group">
                              <input type="text" className="form-control" placeholder="Buscar productos..." />
                              <button className="btn btn-outline-secondary" type="button"><i className="fas fa-search"></i></button>
                          </div>
                      </div>
                      <div className="col-md-5 text-center">
                          <h1>Veterinaria Ciudad Canina</h1>
                      </div>
                      <div className="col-md-2 text-end">
                          <i class="bi bi-person"></i>
                          <a href="#" className="text-decoration-none text-secondary me-3">INGRESAR</a>

                          <a href="#" className="text-decoration-none text-secondary">CARRITO</a>
                          <i class="bi bi-cart4"></i>
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
                          <li className="nav-item dropdown">
                              <a className="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Dropdown link
                              </a>
                              <ul className="dropdown-menu">
                                  <li><a className="dropdown-item" href="#">Action</a></li>
                                  <li><a className="dropdown-item" href="#">Another action</a></li>
                                  <li><a className="dropdown-item" href="#">Something else here</a></li>
                              </ul>
                          </li>
                      </ul>
                  </nav>
              </div>
          </header>
        <div className="container">
          <div className="d-flex align-items-center">
              <h1 className="fs-4 mb-0">Productos de Alimento para Perro y Gato</h1>
          </div>
        </div>
      </header>
      {/* <!-- Contenido principal --> */}
      <main className="py-4">
        <div className="container">
          <div className="row">
            {/* <!-- Filtros --> */}
            <aside className="col-md-3">
              <h5 className="mb-3">Tipo de Comida</h5>
              <div className="form-check">
                <input className="form-check-input" type="checkbox" id="humedo" />
                <label className="form-check-label" htmlFor="humedo">Húmedo</label>
              </div>
              <div className="form-check">
                <input className="form-check-input" type="checkbox" id="seco" />
                <label className="form-check-label" htmlFor="seco">Seco</label>
              </div>

             
                <h5 className="mb-3">Especie</h5>
                <div className="form-check">
                  <input className="form-check-input" type="checkbox" id="gato" />
                  <label className="form-check-label" htmlFor="gato">Gato</label>
                </div>
                <div className="form-check">
                  <input className="form-check-input" type="checkbox" id="perro" />
                  <label className="form-check-label" htmlFor="perro">Perro</label>
                </div>

                
                  <h5 className="mb-3">Etapa de Vida</h5>
                  <div className="form-check">
                    <input className="form-check-input" type="checkbox" id="adulto" />
                    <label className="form-check-label" htmlFor="adulto">Adulto</label>
                  </div>
                  <div className="form-check">
                    <input className="form-check-input" type="checkbox" id="adultos-mayores" />
                    <label className="form-check-label" htmlFor="adultos-mayores">Adultos mayores</label>
                  </div>
                  <div className="form-check">
                    <input className="form-check-input" type="checkbox" id="cachorro" />
                    <label className="form-check-label" htmlFor="cachorro">Cachorro</label>
                  </div>
                  <div className="form-check">
                    <input className="form-check-input" type="checkbox" id="gatitos" />
                    <label className="form-check-label" htmlFor="gatitos">Gatitos</label>
                  </div>
                </aside>

                {/* <!-- Productos --> */}
                <section className="col-md-9">
                  <div className="row g-4">
                    <div className="col-md-4">
                      <div className="card">
                        <img src="producto1.jpg" className="card-img-top" alt="Producto 1" />
                        <div className="card-body">
                          <h6 className="card-title">Adultos Minis y Pequeños Pollo y Salmón</h6>
                          <p className="card-text text-muted">Alimento balanceado completo para perros adultos minis y pequeños...</p>
                          <a href="#" className="btn btn-link">Ver más</a>
                        </div>
                      </div>
                    </div>
                    <div className="col-md-4">
                      <div className="card">
                        <img src="producto2.jpg" className="card-img-top" alt="Producto 2" />
                        <div className="card-body">
                          <h6 className="card-title">Purina One® Gatos Esterilizados</h6>
                          <p className="card-text text-muted">Alimento balanceado, completo, húmedo, para gatos adultos y...</p>
                          <a href="#" className="btn btn-link">Ver más</a>
                        </div>
                      </div>
                    </div>
                    <div className="col-md-4">
                      <div className="card">
                        <img src="producto3.jpg" className="card-img-top" alt="Producto 3"/>
                          <div className="card-body">
                            <h6 className="card-title">Multi Proteínas Salmón, Atún</h6>
                            <p className="card-text text-muted">Alimento balanceado, completo, húmedo, para gatos adultos y...</p>
                            <a href="#" className="btn btn-link">Ver más</a>
                          </div>
                      </div>
                    </div>
                    <div className="col-md-4">
                      <div className="card">
                        <img src="producto1.jpg" className="card-img-top" alt="Producto 1" />
                        <div className="card-body">
                          <h6 className="card-title">Adultos Minis y Pequeños Pollo y Salmón</h6>
                          <p className="card-text text-muted">Alimento balanceado completo para perros adultos minis y pequeños...</p>
                          <a href="#" className="btn btn-link">Ver más</a>
                        </div>
                      </div>
                    </div>
                    <div className="col-md-4">
                      <div className="card">
                        <img src="producto2.jpg" className="card-img-top" alt="Producto 2" />
                        <div className="card-body">
                          <h6 className="card-title">Purina One® Gatos Esterilizados</h6>
                          <p className="card-text text-muted">Alimento balanceado, completo, húmedo, para gatos adultos y...</p>
                          <a href="#" className="btn btn-link">Ver más</a>
                        </div>
                      </div>
                    </div>
                    <div className="col-md-4">
                      <div className="card">
                        <img src="producto3.jpg" className="card-img-top" alt="Producto 3"/>
                          <div className="card-body">
                            <h6 className="card-title">Multi Proteínas Salmón, Atún</h6>
                            <p className="card-text text-muted">Alimento balanceado, completo, húmedo, para gatos adultos y...</p>
                            <a href="#" className="btn btn-link">Ver más</a>
                          </div>
                      </div>
                    </div>
                    <div className="col-md-4">
                      <div className="card">
                        <img src="producto1.jpg" className="card-img-top" alt="Producto 1" />
                        <div className="card-body">
                          <h6 className="card-title">Adultos Minis y Pequeños Pollo y Salmón</h6>
                          <p className="card-text text-muted">Alimento balanceado completo para perros adultos minis y pequeños...</p>
                          <a href="#" className="btn btn-link">Ver más</a>
                        </div>
                      </div>
                    </div>
                    <div className="col-md-4">
                      <div className="card">
                        <img src="producto2.jpg" className="card-img-top" alt="Producto 2" />
                        <div className="card-body">
                          <h6 className="card-title">Purina One® Gatos Esterilizados</h6>
                          <p className="card-text text-muted">Alimento balanceado, completo, húmedo, para gatos adultos y...</p>
                          <a href="#" className="btn btn-link">Ver más</a>
                        </div>
                      </div>
                    </div>
                    <div className="col-md-4">
                      <div className="card">
                        <img src="producto3.jpg" className="card-img-top" alt="Producto 3"/>
                          <div className="card-body">
                            <h6 className="card-title">Multi Proteínas Salmón, Atún</h6>
                            <p className="card-text text-muted">Alimento balanceado, completo, húmedo, para gatos adultos y...</p>
                            <a href="#" className="btn btn-link">Ver más</a>
                          </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
          </div>
      </main>
      <Footer/>
    </div>
  )
}
