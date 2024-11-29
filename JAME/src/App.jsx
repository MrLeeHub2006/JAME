import { BrowserRouter, Routes, Route } from "react-router-dom";
import Index from "./pages/Index";
import InicioAdmin from "./pages/InicioAdmin";
import Login from "./pages/Login";
import Register from "./pages/Register";
import Example from "./pages/Example"
import PerfilUsuario from "./pages/PerfilUsuario";
import Productos from "./pages/Productos";

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
      </Routes>
    </BrowserRouter>
  )
}

export default App
