import React from 'react'

export default function Navegacion() {
    return (
        <nav className="navbar navbar-light bg-info px-5">
            <span className="navbar-brand mb-0 h1">VETERINARIA CIUDAD CANINA</span>
            <div className="d-flex align-items-center">
                <span className="me-3">AGENDAMIENTOS</span>
                <span className="me-3">ADMINISTRADOR</span>
                <i className="bi bi-paw fs-4"></i>
            </div>
        </nav>
    )
}
