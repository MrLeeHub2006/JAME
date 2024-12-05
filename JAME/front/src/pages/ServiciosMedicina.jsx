import React from 'react'
import Footer from '../components/Footer'
import Navegacion from '../components/Navegacion'

export default function Servicios() {
  return (
    <div>
      <Navegacion />
      <main className="py-4">
        <div className="container">
          <div className="text-center mb-5">
            <h2 className="d-inline-block bg-light px-4 py-2 mb-3">Servicios</h2>
            <p className="lead">Ofrecemos todo tipo de atención en Ciudad Canina</p>
          </div>
          <div className="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-4 mb-5">
            {[1, 2, 3, 4, 5].map((service) => (
              <div key={service} className="col">
                <div className="card h-100 text-center">
                  <div className="card-body d-flex flex-column justify-content-between">
                    <div className="mb-3">
                      <svg viewBox="0 0 24 24" className="w-50 h-50 mx-auto">
                        <path
                          fill="currentColor"
                          d="M12,8L10.67,8.09C9.81,7.07 7.4,4.5 5,4.5C5,4.5 3.03,7.46 4.96,11.41C4.41,12.24 4.07,12.67 4,13.66L2.07,13.95L2.28,14.93L4.04,14.67L4.18,15.38L2.61,16.32L3.08,17.21L4.53,16.32C5.68,18.76 8.59,20 12,20C15.41,20 18.32,18.76 19.47,16.32L20.92,17.21L21.39,16.32L19.82,15.38L19.96,14.67L21.72,14.93L21.93,13.95L20,13.66C19.93,12.67 19.59,12.24 19.04,11.41C20.97,7.46 19,4.5 19,4.5C16.6,4.5 14.19,7.07 13.33,8.09L12,8Z"
                        />
                      </svg>
                    </div>
                    <button className="btn btn-success w-100">Agendar</button>
                  </div>
                </div>
              </div>
            ))}
          </div>
          <div className="text-center">
            <button className="btn btn-success btn-lg">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="bi bi-whatsapp me-2" viewBox="0 0 16 16">
                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
              </svg>
              Para más información comuníquese por medio de WhatsApp
            </button>
          </div>
        </div>
      </main>
      <Footer /> 
    </div>
  )
}