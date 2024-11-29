import React from 'react'

export default function Example() {
  return (
    <div>
          <div className="bg-primary text-white py-2 text-center">
              <p className="mb-0">La mejor opción para el cuidado de tu mascota</p>
          </div>

          {/* <!-- Header --> */}
          <header className="bg-white py-3 border-bottom">
              <div className="container">
                  <div className="row align-items-center">
                      <div className="col-md-4 d-flex align-items-center">
                          <img src="https://via.placeholder.com/80" alt="Logo Veterinaria" className="rounded-circle me-3"/>
                              <div className="input-group">
                                  <input type="text" className="form-control" placeholder="Buscar productos..."/>
                                      <button className="btn btn-outline-secondary" type="button"><i className="fas fa-search"></i></button>
                              </div>
                      </div>
                      <div className="col-md-8 text-end">
                          <a href="#" className="text-decoration-none text-secondary me-3">Ingresar</a>
                          <a href="#" className="text-decoration-none text-secondary">CARRITO</a>
                      </div>
                  </div>
                  <nav className="mt-3">
                      <ul className="nav">
                          <li className="nav-item"><a href="#" className="nav-link text-secondary">Home</a></li>
                          <li className="nav-item"><a href="#" className="nav-link text-secondary">Productos</a></li>
                          <li className="nav-item"><a href="#" className="nav-link text-secondary">Servicios</a></li>
                          <li className="nav-item"><a href="#" className="nav-link text-secondary">Contáctanos</a></li>
                          <li className="nav-item"><a href="#" className="nav-link text-secondary">Acerca de nosotros</a></li>
                      </ul>
                  </nav>
              </div>
          </header>

          {/* <!-- Sección de Productos Nuevos --> */}
          <section className="bg-light-blue py-5">
              <div className="container">
                  <h2 className="text-white text-center mb-4">Productos Nuevos</h2>
                  <div className="row">
                      <div className="col-6 col-md-4 col-lg-2 mb-4">
                          <div className="card">
                              <img src="https://via.placeholder.com/150" className="card-img-top" alt="Producto 1"/>
                                  <div className="card-body text-center">
                                      <button className="btn btn-primary">Comprar ahora</button>
                                  </div>
                          </div>
                      </div>
                      <div className="col-6 col-md-4 col-lg-2 mb-4">
                          <div className="card">
                              <img src="https://via.placeholder.com/150" className="card-img-top" alt="Producto 2"/>
                                  <div className="card-body text-center">
                                      <button className="btn btn-primary">Comprar ahora</button>
                                  </div>
                          </div>
                      </div>
                      <div className="col-6 col-md-4 col-lg-2 mb-4">
                          <div className="card">
                              <img src="https://via.placeholder.com/150" className="card-img-top" alt="Producto 3"/>
                                  <div className="card-body text-center">
                                      <button className="btn btn-primary">Comprar ahora</button>
                                  </div>
                          </div>
                      </div>
                      <div className="col-6 col-md-4 col-lg-2 mb-4">
                          <div className="card">
                              <img src="https://via.placeholder.com/150" className="card-img-top" alt="Producto 4"/>
                                  <div className="card-body text-center">
                                      <button className="btn btn-primary">Comprar ahora</button>
                                  </div>
                          </div>
                      </div>
                      <div className="col-6 col-md-4 col-lg-2 mb-4">
                          <div className="card">
                              <img src="https://via.placeholder.com/150" className="card-img-top" alt="Producto 5"/>
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

          {/* <!-- Sección de Servicios --> */}
          <section className="py-5 bg-light">
              <div className="container">
                  <div className="text-center mb-5">
                      <p className="lead">
                          Nuestra clínica está conformada por profesionales altamente capacitados, con amplia experiencia en atención veterinaria y un profundo amor por los animales. Cada uno de nuestros servicios ha sido cuidadosamente diseñado para brindar atención médica de alta calidad, considerando las necesidades individuales de cada uno de nuestros pacientes.
                      </p>
                      <div className="mt-4">
                          <button className="btn btn-primary me-2 mb-2">Consulta médica</button>
                          <button className="btn btn-primary me-2 mb-2">Servicio de urgencias</button>
                          <button className="btn btn-primary mb-2">Productos y servicios adicionales</button>
                      </div>
                  </div>
                  <div className="row align-items-center">
                      <div className="col-md-6">
                          <h3 className="mb-4">Consultas médicas especializadas</h3>
                          <p>
                              En la veterinaria Ciudad Canina, tenemos servicio de consulta médica con un médico veterinario con más de 20 años de experiencia en donde también contamos con servicios de esterilización, todo tipo de vacunaciones, desparasitaciones, controles.
                          </p>
                      </div>
                      <div className="col-md-6 text-center">
                          <img src="https://via.placeholder.com/300" alt="Veterinario" className="img-fluid rounded"/>
                      </div>
                  </div>
              </div>
          </section>
{/* 
          <!-- Sección de Contacto --> */}
          <section className="py-5">
              <div className="container">
                  <div className="row">
                      <div className="col-md-6 mb-4 mb-md-0">
                          <h3 className="mb-4">CONTACTO</h3>
                          <form>
                              <div className="mb-3">
                                  <input type="text" className="form-control" placeholder="Nombre"/>
                              </div>
                              <div className="mb-3">
                                  <input type="email" className="form-control" placeholder="Email"/>
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
                          {/* <div className="ratio ratio-4x3 mb-3">
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.8101163721325!2d-74.07715908523784!3d4.639976443504326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9a2f3f3f3f3f%3A0x8e3f9a2f3f3f3f3f!2sBogot%C3%A1%2C%20Colombia!5e0!3m2!1sen!2sus!4v1623338100000!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                          </div> */}
                          <div>
                              <a href="#" className="text-decoration-none me-3"><i className="fab fa-facebook"></i></a>
                              <a href="#" className="text-decoration-none me-3"><i className="fab fa-whatsapp"></i></a>
                              <a href="#" className="text-decoration-none"><i className="fab fa-instagram"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
          </section>

          {/* <!-- Footer --> */}
          <footer className="bg-dark text-white py-3 text-center">
              <p className="mb-0">©2024 Tu tienda para cuidar tu peludo. Todos los derechos reservados.</p>
          </footer>
    </div>
  )
}
