import React from 'react'
import { Link } from 'react-router-dom'
import Navegacion from '../components/Navegacion'

export default function CarritoCompras() {
    return (
        <div>
            {/* header */}
            <Navegacion/>

            <div className="container my-5">
                <h1 className="mb-4">Tu Carrito de Compras</h1>

                <div className="row">
                    <div className="col-md-8">
                        <div className="card mb-4">
                            <div className="card-body">
                                <h5 className="card-title">Productos en tu carrito</h5>
                                <hr />
                                <div className="row mb-3">
                                    <div className="col-md-3">
                                        <img src="https://via.placeholder.com/100x100" alt="Alimento para perros" className="img-fluid rounded" />
                                    </div>
                                    <div className="col-md-6">
                                        <h6>Alimento Premium para Perros</h6>
                                        <p className="text-muted">5kg, Sabor Pollo</p>
                                        <div className="input-group input-group-sm" style={{ width: "120px" }}>
                                            <button className="btn btn-outline-secondary" type="button">-</button>
                                            <input type="text" className="form-control text-center" value="1" />
                                            <button className="btn btn-outline-secondary" type="button">+</button>
                                        </div>
                                    </div>
                                    <div className="col-md-3 text-end">
                                        <p className="fw-bold">$24.99</p>
                                        <button className="btn btn-sm btn-outline-danger">
                                            <i className="fas fa-trash"></i> Eliminar
                                        </button>
                                    </div>
                                </div>
                                <hr />
                                <div className="row mb-3">
                                    <div className="col-md-3">
                                        <img src="https://via.placeholder.com/100x100" alt="Juguete para gatos" className="img-fluid rounded" />
                                    </div>
                                    <div className="col-md-6">
                                        <h6>Juguete Interactivo para Gatos</h6>
                                        <p className="text-muted">Ratón Electrónico</p>
                                        <div className="input-group input-group-sm" style={{ width: "120px" }}>
                                            <button className="btn btn-outline-secondary" type="button">-</button>
                                            <input type="text" className="form-control text-center" value="2" />
                                            <button className="btn btn-outline-secondary" type="button">+</button>
                                        </div>
                                    </div>
                                    <div className="col-md-3 text-end">
                                        <p className="fw-bold">$15.99</p>
                                        <button className="btn btn-sm btn-outline-danger">
                                            <i className="fas fa-trash"></i> Eliminar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-4">
                        <div className="card">
                            <div className="card-body">
                                <h5 className="card-title">Resumen del Pedido</h5>
                                <hr />
                                <div className="d-flex justify-content-between mb-2">
                                    <span>Subtotal</span>
                                    <span>$56.97</span>
                                </div>
                                <div className="d-flex justify-content-between mb-2">
                                    <span>Envío</span>
                                    <span>$5.00</span>
                                </div>
                                <hr />
                                <div className="d-flex justify-content-between mb-4">
                                    <span className="fw-bold">Total</span>
                                    <span className="fw-bold">$61.97</span>
                                </div>
                                <button className="btn btn-primary w-100">Proceder al Pago</button>
                            </div>
                        </div>
                        <div className="mt-3">
                            <Link to={"/productos"} className="text-decoration-none">
                                <i className="fas fa-arrow-left me-2"></i>Continuar Comprando
                            </Link>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    )
}
