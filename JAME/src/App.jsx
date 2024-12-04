import { BrowserRouter, Routes, Route } from "react-router-dom";
import Index from "./pages/Index";
import InicioAdmin from "./pages/InicioAdmin";
import Login from "./pages/Login";
import Register from "./pages/Register";
import Example from "./pages/Example"
import PerfilUsuario from "./pages/PerfilUsuario";
import Productos from "./pages/Productos";
import Producto from "./pages/Producto"
import CarritoCompras from "./pages/CarritoCompras";
import PasarelaPago from "./pages/PasarelaPago"
import OlvidoContraseña from "./pages/OlvidoContraseña";
import Mascota from "./pages/Mascota";


function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Index />} />
        <Route path="/login/" element={<Login />} />
        <Route path="/administrador/" element={<InicioAdmin />} />
        <Route path="/register/" element={<Register />} />
        <Route path="/example" element={<Example />} />
        <Route path="/perfil" element={<PerfilUsuario/>}/>
        <Route path="/productos" element={<Productos/>}/>
        <Route path="/producto" element={<Producto/>}/>
        <Route path="/carrito" element={<CarritoCompras/>}/>
        <Route path="/pago" element={<PasarelaPago />} />
        <Route path="/recuperar" element={<OlvidoContraseña />} />
        <Route path="/mascota" element={<Mascota/>} />


      </Routes>
    </BrowserRouter>
  )
}

export default App
