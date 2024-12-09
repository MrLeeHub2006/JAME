import React from 'react'
import Footer from '../../components/Footer'
import Navegacion from '../../components/Navegacion'

export default function Servicios() {
  return (
    
    <div>
      <Navegacion />

    {/* <!-- Services Section --> */}
    <section class="bg-custom-blue py-5">
        <div class="container">
            <h2 class="text-center mb-2 fw-bold">Servicios</h2>
            <p class="text-center mb-5">Ofrecemos todo tipo de atención en Ciudad Canina.</p>
            
            <div class="row g-4">
                {/* <!-- Medicina General --> */}
                <div class="col-md-6 col-lg">
                    <div class="card h-100 text-center bg-white">
                        <div class="card-body">
                            <svg class="paw-icon w-50" viewBox="0 0 24 24" fill="#000000FF">
                                <path d="M12,8L10.67,8.09C9.81,7.07 7.4,4.5 5,4.5C5,4.5 3.03,7.46 4.96,11.41C4.41,12.24 4.07,12.67 4,13.66L2.07,13.95L2.28,14.93L4.04,14.67L4.18,15.38L2.61,16.32L3.08,17.21L4.53,16.32C5.68,18.76 8.59,20 12,20C15.41,20 18.32,18.76 19.47,16.32L20.92,17.21L21.39,16.32L19.82,15.38L19.96,14.67L21.72,14.93L21.93,13.95L20,13.66C19.93,12.67 19.59,12.24 19.04,11.41C20.97,7.46 19,4.5 19,4.5C16.6,4.5 14.19,7.07 13.33,8.09L12,8Z"/>
                            </svg>
                            <h5 class="card-title mb-3">Medicina General</h5>
                            <p class="card-text mb-4">Consulta de medicina veterinaria general para caninos y felinos menores de 7 años.</p>
                            <button class="btn btn-outline-primary">Agendar cita</button>
                        </div>
                    </div>
                </div>

                {/* <!-- Consulta Nutricional --> */}
                <div class="col-md-6 col-lg">
                    <div class="card h-100 text-center bg-white"> 
                        <div class="card-body">
                            <svg class="paw-icon w-50" viewBox="0 0 24 24" fill="#000000FF">
                                <path d="M12,8L10.67,8.09C9.81,7.07 7.4,4.5 5,4.5C5,4.5 3.03,7.46 4.96,11.41C4.41,12.24 4.07,12.67 4,13.66L2.07,13.95L2.28,14.93L4.04,14.67L4.18,15.38L2.61,16.32L3.08,17.21L4.53,16.32C5.68,18.76 8.59,20 12,20C15.41,20 18.32,18.76 19.47,16.32L20.92,17.21L21.39,16.32L19.82,15.38L19.96,14.67L21.72,14.93L21.93,13.95L20,13.66C19.93,12.67 19.59,12.24 19.04,11.41C20.97,7.46 19,4.5 19,4.5C16.6,4.5 14.19,7.07 13.33,8.09L12,8Z"/>
                            </svg>
                            <h5 class="card-title mb-3">Consulta Nutricional</h5>
                            <p class="card-text mb-4">Recomendaciones sobre comidas balanceadas respecto a sus nutrientes ajusta para los perros y gatos.</p>
                            <button class="btn btn-outline-primary">Agendar cita</button>
                        </div>
                    </div>
                </div>

                {/* <!-- Vacunación --> */}
                <div class="col-md-6 col-lg">
                    <div class="card h-100 text-center bg-white">
                        <div class="card-body">
                            <svg class="paw-icon w-50" viewBox="0 0 24 24" fill="#000000FF">
                                <path d="M12,8L10.67,8.09C9.81,7.07 7.4,4.5 5,4.5C5,4.5 3.03,7.46 4.96,11.41C4.41,12.24 4.07,12.67 4,13.66L2.07,13.95L2.28,14.93L4.04,14.67L4.18,15.38L2.61,16.32L3.08,17.21L4.53,16.32C5.68,18.76 8.59,20 12,20C15.41,20 18.32,18.76 19.47,16.32L20.92,17.21L21.39,16.32L19.82,15.38L19.96,14.67L21.72,14.93L21.93,13.95L20,13.66C19.93,12.67 19.59,12.24 19.04,11.41C20.97,7.46 19,4.5 19,4.5C16.6,4.5 14.19,7.07 13.33,8.09L12,8Z"/>
                            </svg>
                            <h5 class="card-title mb-3">Vacunación</h5>
                            <p class="card-text mb-4">Guías para la vacunación de perros (caninos) y gatos (felinos).</p>
                            <button class="btn btn-outline-primary">Agendar cita</button>
                        </div>
                    </div>
                </div>

                {/* <!-- Cardiología --> */}
                <div class="col-md-6 col-lg">
                    <div class="card h-100 text-center bg-white">
                        <div class="card-body">
                            <svg class="paw-icon  w-50" viewBox="0 0 24 24" fill="#000000FF">
                                <path d="M12,8L10.67,8.09C9.81,7.07 7.4,4.5 5,4.5C5,4.5 3.03,7.46 4.96,11.41C4.41,12.24 4.07,12.67 4,13.66L2.07,13.95L2.28,14.93L4.04,14.67L4.18,15.38L2.61,16.32L3.08,17.21L4.53,16.32C5.68,18.76 8.59,20 12,20C15.41,20 18.32,18.76 19.47,16.32L20.92,17.21L21.39,16.32L19.82,15.38L19.96,14.67L21.72,14.93L21.93,13.95L20,13.66C19.93,12.67 19.59,12.24 19.04,11.41C20.97,7.46 19,4.5 19,4.5C16.6,4.5 14.19,7.07 13.33,8.09L12,8Z"/>
                            </svg>
                            <h5 class="card-title mb-3">Cardiología</h5>
                            <p class="card-text mb-4">Consulta especializada de cardiología veterinaria para seguimiento y control del paciente.</p>
                            <button class="btn btn-outline-primary">Agendar cita</button>
                        </div>
                    </div>
                </div>

                {/* <!-- Esterilización --> */}
                <div class="col-md-6 col-lg">
                    <div class="card h-100 text-center bg-white">
                        <div class="card-body">
                            <svg class="paw-icon w-50" viewBox="0 0 24 24" fill="#000000FF">
                                <path d="M12,8L10.67,8.09C9.81,7.07 7.4,4.5 5,4.5C5,4.5 3.03,7.46 4.96,11.41C4.41,12.24 4.07,12.67 4,13.66L2.07,13.95L2.28,14.93L4.04,14.67L4.18,15.38L2.61,16.32L3.08,17.21L4.53,16.32C5.68,18.76 8.59,20 12,20C15.41,20 18.32,18.76 19.47,16.32L20.92,17.21L21.39,16.32L19.82,15.38L19.96,14.67L21.72,14.93L21.93,13.95L20,13.66C19.93,12.67 19.59,12.24 19.04,11.41C20.97,7.46 19,4.5 19,4.5C16.6,4.5 14.19,7.07 13.33,8.09L12,8Z"/>
                            </svg>
                            <h5 class="card-title mb-3">Esterilización</h5>
                            <p class="card-text mb-4">Ofrecemos servicios de esterilización y castración para perros y gatos.</p>
                            <button class="btn btn-outline-primary">Agendar cita</button>
                        </div>
                    </div>
                </div>
            </div>
{/* 
            <!-- WhatsApp Section --> */}
            <div class="text-center mt-5">
                <div class="d-inline-flex align-items-center bg-white rounded-pill px-4 py-2 shadow-sm">
                    <svg width="24" height="24" fill="#25D366" viewBox="0 0 24 24">
                        <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2M12.05 3.67C14.25 3.67 16.31 4.53 17.87 6.09C19.42 7.65 20.28 9.72 20.28 11.92C20.28 16.46 16.58 20.15 12.04 20.15C10.56 20.15 9.11 19.76 7.85 19L7.55 18.83L4.43 19.65L5.26 16.61L5.06 16.29C4.24 15 3.8 13.47 3.8 11.91C3.81 7.37 7.5 3.67 12.05 3.67M8.53 7.33C8.37 7.33 8.1 7.39 7.87 7.64C7.65 7.89 7 8.5 7 9.71C7 10.93 7.89 12.1 8 12.27C8.14 12.44 9.76 14.94 12.25 16C12.84 16.27 13.3 16.42 13.66 16.53C14.25 16.72 14.79 16.69 15.22 16.63C15.7 16.56 16.68 16.03 16.89 15.45C17.1 14.87 17.1 14.38 17.04 14.27C16.97 14.17 16.81 14.11 16.56 14C16.31 13.86 15.09 13.26 14.87 13.18C14.64 13.1 14.5 13.06 14.31 13C14.09 12.94 13.84 13.1 13.59 13.35C13.34 13.6 12.97 14.23 12.72 14.48C12.47 14.74 12.21 14.77 11.97 14.63C11.72 14.5 10.91 14.24 9.95 13.37C9.2 12.71 8.69 11.89 8.43 11.63C8.18 11.38 8.42 11.13 8.63 10.91C9.07 10.43 9.5 9.93 9.58 9.67C9.66 9.42 9.62 9.21 9.56 9.02C9.5 8.83 8.97 7.59 8.76 7.09C8.55 6.6 8.33 6.67 8.08 6.66C7.84 6.65 7.69 6.65 7.53 6.65C7.37 6.65 7.1 6.71 6.87 6.96C6.65 7.21 6 7.82 6 9.03C6 10.25 6.89 11.42 7 11.59C7.14 11.76 8.76 14.26 11.25 15.32C12.84 16.02 13.3 16.07 13.66 16.18C14.25 16.37 14.79 16.34 15.22 16.28C15.7 16.21 16.68 15.68 16.89 15.1C17.1 14.52 17.1 14.03 17.04 13.92C16.97 13.82 16.81 13.76 16.56 13.65Z"/>
                    </svg>
                    <span class="ms-2">Para más información contáctenos por medio de WhatsApp</span>
                </div>
            </div>
        </div>
    </section>
      <Footer /> 
    </div>
  )
}