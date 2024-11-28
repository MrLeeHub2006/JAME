import React from 'react'

export default function Register() {
  return (
    <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow">
          <div class="card-header bg-primary text-white text-center">
            <h2>Registro de Veterinaria</h2>
          </div>
          <div class="card-body">
            <form>
              {/* <!-- Información del propietario --> */}
              <h4 class="mb-3">Información del Propietario</h4>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="nombrePropietario" class="form-label">Nombre Completo</label>
                  <input type="text" id="nombrePropietario" class="form-control" placeholder="Nombre del propietario" required/>
                </div>
                <div class="col-md-6">
                  <label for="emailPropietario" class="form-label">Correo Electrónico</label>
                  <input type="email" id="emailPropietario" class="form-control" placeholder="Correo electrónico" required/>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="telefonoPropietario" class="form-label">Teléfono</label>
                  <input type="tel" id="telefonoPropietario" class="form-control" placeholder="Número de teléfono" required/>
                </div>
                <div class="col-md-6">
                  <label for="direccionPropietario" class="form-label">Dirección</label>
                  <input type="text" id="direccionPropietario" class="form-control" placeholder="Dirección completa" required/>
                </div>
              </div>
{/* 
              <!-- Información de la mascota --> */}
              <h4 class="mb-3">Información de la Mascota</h4>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="nombreMascota" class="form-label">Nombre de la Mascota</label>
                  <input type="text" id="nombreMascota" class="form-control" placeholder="Nombre de la mascota" required/>
                </div>
                <div class="col-md-6">
                  <label for="especieMascota" class="form-label">Especie</label>
                  <select id="especieMascota" class="form-select" required>
                    <option value="" disabled selected>Seleccione una especie</option>
                    <option value="perro">Perro</option>
                    <option value="gato">Gato</option>
                    <option value="ave">Ave</option>
                    <option value="otro">Otro</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="razaMascota" class="form-label">Raza</label>
                  <input type="text" id="razaMascota" class="form-control" placeholder="Raza de la mascota" required/>
                </div>
                <div class="col-md-6">
                  <label for="edadMascota" class="form-label">Edad</label>
                  <input type="number" id="edadMascota" class="form-control" placeholder="Edad en años" required/>
                </div>
              </div>
              <div class="mb-3">
                <label for="observacionesMascota" class="form-label">Observaciones</label>
                <textarea id="observacionesMascota" class="form-control" rows="3" placeholder="Escribe detalles adicionales o notas importantes"></textarea>
              </div>

              {/* <!-- Botón de registro --> */}
              <div class="text-center">
                <button type="submit" class="btn btn-success w-100">Registrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  )
}
