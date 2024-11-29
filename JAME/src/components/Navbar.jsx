import React from 'react'

export default function Navbar() {
  return (
    <div>
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
    </div>
  )
}
