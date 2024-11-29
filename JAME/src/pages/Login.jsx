import React from "react"
import { Link } from "react-router-dom"
import Footer from "../components/Footer"

export default function Login() {


  return (
    <div className="vh-100 d-flex justify-content-center align-items-center " style={{ 
        backgroundImage: `url("https://hoylecohen.com/wp-content/uploads/login-page-bg.jpg")` 
      }}>   
        <div className="w-50 p-5">
            <div className="card shadow p-5 rounded-5">
                <div className="card-body ">
                    <div className="text-center mb-4">
                    <i className="display-1 fa fa-paw" aria-hidden="true"></i>
                        <h2 className="card-title">Clinica Veterinaria Ciudad Canina</h2>
                        <p className="text-muted">Iniciar Sesión</p>
                    </div>
                    <form>
                        <div className="mb-3">
                            <label htmlFor="email" className="form-label">Correo Electrónico</label>
                            <input type="email" className="form-control" id="email" placeholder="nombre@ejemplo.com" required/>
                        </div>
                        <div className="mb-3">
                            <label htmlFor="password" className="form-label">Contraseña</label>
                            <input type="password" className="form-control" id="password" placeholder="Contraseña" required/>
                        </div>
                        <div className="mb-3 form-check">
                            <input type="checkbox" className="form-check-input" id="remember"/>
                            <label className="form-check-label" htmlFor="remember">Recordarme</label>
                        </div>
                        <div className="d-grid">
                            <button type="submit" className="btn btn-primary">Iniciar Sesión</button>
                        </div>
                    </form>
                    <div className="text-center mt-3">
                        <a href="#" className="text-decoration-none">¿Olvidaste tu contraseña?</a>
                        <br />
                        <Link to="/register" className="text-decoration-none">¿No tienes cuenta? Registrate</Link>
                    </div>
                </div>
            </div>
        </div>
        <Footer/>
        
</div>
  )
}

