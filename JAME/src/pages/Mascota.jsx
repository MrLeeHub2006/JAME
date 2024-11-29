import React from 'react'

export default function Mascota() {
  return (
    <div>
          {/* <!-- Información de la mascota --> */} 
          <h4 class="mb-3">Información de la Mascota</h4>
          <div class="row mb-3">
              <div class="col-md-6">
                  <label for="nombreMascota" class="form-label">Nombre de la Mascota</label>
                  <input type="text" id="nombreMascota" class="form-control" placeholder="Nombre de la mascota" required />
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
                  <input type="text" id="razaMascota" class="form-control" placeholder="Raza de la mascota" required />
              </div>
              <div class="col-md-6">
                  <label for="edadMascota" class="form-label">Edad</label>
                  <input type="number" id="edadMascota" class="form-control" placeholder="Edad en años" required />
              </div>
          </div>
          <div class="mb-3">
              <label for="observacionesMascota" class="form-label">Observaciones</label>
              <textarea id="observacionesMascota" class="form-control" rows="3" placeholder="Escribe detalles adicionales o notas importantes"></textarea>
          </div>
    </div>
  )
}
