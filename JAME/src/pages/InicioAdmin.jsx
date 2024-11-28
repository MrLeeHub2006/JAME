import React from 'react'

export default function InicioAdmin() {
  return (
    <div class="container-fluid vh-100">
    {/* <!-- Header --> */}
   <Navegacion/>

    <div class="row vh-100">
        {/* <!-- Sidebar --> */}
        <div class="col-2 bg-dark text-white p-0">
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white py-3">
                    <i class="bi bi-house me-2"></i> Inicio
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white py-3">
                    <i class="bi bi-cart me-2"></i> Ventas
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white py-3">
                    <i class="bi bi-calendar2 me-2"></i> Agendamientos
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white py-3">
                    <i class="bi bi-box me-2"></i> Pedidos
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white py-3 mt-auto">
                    <i class="bi bi-gear me-2"></i> Configuración
                </a>
            </div>
        </div>

        {/* <!-- Main Content --> */}
        <div class="col-10 bg-light p-4">
            <h2 class="text-center mb-4">CLINICA VETERINARIA CIUDAD CANINA</h2>

            <div class="row mb-5">
                {/* <!-- Appointments Box --> */}
                <div class="col-6">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            {/* Agendados hoy */}
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Vacunación - Kira - 20/03/2024</li>
                                <li class="list-group-item">Vacunación - Kira - 20/03/2024</li>
                                <li class="list-group-item">Vacunación - Kira - 20/03/2024</li>
                                <li class="list-group-item">Vacunación - Kira - 20/03/2024</li>
                            </ul>
                            <a href="#" class="btn btn-link">Ver más...</a>
                        </div>
                    </div>
                </div>

                {/* <!-- Orders Box --> */}
                <div class="col-6">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Pedidos hoy
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Purina - Kira - 20/03/2024</li>
                                <li class="list-group-item">Nexgart - Keyla - 20/03/2024</li>
                                <li class="list-group-item">Correa - Kira - 20/03/2024</li>
                                <li class="list-group-item">Peluche - Kira - 20/03/2024</li>
                            </ul>
                            <a href="#" class="btn btn-link">Ver más...</a>
                        </div>
                    </div>
                </div>
            </div>

            {/* <!-- Bottom Icons --> */}
            <div class="row justify-content-center text-center">
                <div class="col-2">
                    <button class="btn btn-light border p-4">
                        <i class="bi bi-gear fs-3"></i>
                        <div class="mt-2">Configuración</div>
                    </button>
                </div>
                <div class="col-2">
                    <button class="btn btn-light border p-4">
                        <i class="bi bi-cloud fs-3"></i>
                        <div class="mt-2">Cloud</div>
                    </button>
                </div>
                <div class="col-2">
                    <button class="btn btn-light border p-4">
                        <i class="bi bi-paw fs-3"></i>
                        <div class="mt-2">Mascotas</div>
                    </button>
                </div>
                <div class="col-2">
                    <button class="btn btn-light border p-4">
                        <i class="bi bi-file-text fs-3"></i>
                        <div class="mt-2">Reportes</div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
  )
}
