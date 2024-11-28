import { BrowserRouter, Routes, Route } from "react-router-dom";
import Index from "./pages/Index";
import InicioAdmin from "./pages/InicioAdmin";
import Login from "./pages/Login";
function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Index />} />
        <Route path="/login/" element={<Login />} />
        <Route path="/administrador/" element={<InicioAdmin />} />

      </Routes>
    </BrowserRouter>
  )
}

export default App
