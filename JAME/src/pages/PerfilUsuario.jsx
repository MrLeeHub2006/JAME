import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';

const UserProfile = () => {
    const [user, setUser] = useState({
        id: '',
        nombre_completo: '',
        usuario: '',
        correo_electronico: '',
        contraseña: '',
        direccion: '',
        telefono: '',
        rol: 0
    });
    const [imageUrl, setImageUrl] = useState('');
    const [isEditing, setIsEditing] = useState(false);
    const [file, setFile] = useState(null);

    useEffect(() => {
        // Fetch user data from API
        const fetchUserData = async () => {
            const response = await fetch('/api/user'); // Replace with your API endpoint
            const data = await response.json();
            setUser(data);
            setImageUrl(`Assets/USUARIOS_FOTOS/${data.id}.jpg`);
        };
        fetchUserData();
    }, []);

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setUser(prevUser => ({ ...prevUser, [name]: value }));
    };

    const handleFileChange = (e) => {
        setFile(e.target.files[0]);
    };

    const handlePhotoSubmit = async (e) => {
        e.preventDefault();
        const formData = new FormData();
        formData.append('imagen', file);
        formData.append('id', user.id);

        const response = await fetch('/api/update-photo', {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            setImageUrl(`Assets/USUARIOS_FOTOS/${user.id}.jpg?${new Date().getTime()}`);
        }
    };

    const handleUserUpdate = async (e) => {
        e.preventDefault();
        const response = await fetch('/api/update-user', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(user)
        });

        if (response.ok) {
            setIsEditing(false);
        }
    };

    const handleLogout = async () => {
        await fetch('/api/logout', { method: 'POST' });
        // Redirect to login page or home page
    };

    return (
        <>
            <div className="bg-primary text-dark py-2 text-center bg-info">
                <p className="mb-0">La mejor opción para el cuidado de tu mascota</p>
            </div>

            {/* Header */}
            <header className="bg-white py-3 border-bottom">
                <div className="container">
                    <div className="row align-items-center">
                        <div className="col-md-4 d-flex align-items-center">
                            <img src="/src/img/logovet.png" alt="Logo Veterinaria" className=" w-25 rounded-circle me-5" />
                        </div>
                        <div className="col-md-4 text-center">
                            <h1>Veterinaria Ciudad Canina</h1>
                        </div>
                        <div className="col-md-2 text-end">
                            <i class="bi bi-person"></i>
                            <a href="#" className="text-decoration-none text-secondary me-3">INGRESAR</a>
                        </div>
                    </div>
                </div>
            </header>
            <main>
                <div className="contenedor">
                    <div className="section-foto-usuario">
                        <h1 className="title-div">FOTO USUARIO</h1>
                        <form onSubmit={handlePhotoSubmit} style={{ display: 'flex', flexDirection: 'column' }}>
                            <div
                                className="foto-usuario"
                                style={{ backgroundImage: `url(${imageUrl})`, backgroundSize: '100% 100%' }}
                            />
                            <input type="file" onChange={handleFileChange} required />
                            <button type="submit" className="btn-foto">Cambiar foto</button>
                        </form>
                    </div>
                    <div className="informacion-usuario">
                        <h1 className="title-div">INFORMACIÓN USUARIO</h1>
                        <form onSubmit={handleUserUpdate}>
                            <div className="form-item">
                                <p>Nombre:</p>
                                <input
                                    className="input-item"
                                    name="nombre_completo"
                                    type="text"
                                    value={user.nombre_completo}
                                    onChange={handleInputChange}
                                    readOnly={!isEditing}
                                    maxLength={50}
                                    required
                                />
                            </div>
                            <div className="form-item">
                                <p>Usuario:</p>
                                <input
                                    className="input-item"
                                    name="usuario"
                                    type="text"
                                    value={user.usuario}
                                    onChange={handleInputChange}
                                    readOnly={!isEditing}
                                    maxLength={20}
                                    required
                                />
                            </div>
                            <div className="form-item">
                                <p>Correo:</p>
                                <input
                                    className="input-item"
                                    name="correo_electronico"
                                    type="text"
                                    value={user.correo_electronico}
                                    onChange={handleInputChange}
                                    readOnly={!isEditing}
                                    maxLength={70}
                                    required
                                />
                            </div>
                            <div className="form-item">
                                <p>Contraseña:</p>
                                <input
                                    className="input-item"
                                    name="contraseña"
                                    type="text"
                                    value={user.contraseña}
                                    onChange={handleInputChange}
                                    readOnly={!isEditing}
                                    maxLength={70}
                                    required
                                />
                            </div>
                            <div className="form-item">
                                <p>Dirección:</p>
                                <input
                                    className="input-item"
                                    name="direccion"
                                    type="text"
                                    value={user.direccion}
                                    onChange={handleInputChange}
                                    readOnly={!isEditing}
                                    maxLength={30}
                                />
                            </div>
                            <div className="form-item">
                                <p>Teléfono:</p>
                                <input
                                    className="input-item"
                                    name="telefono"
                                    type="number"
                                    value={user.telefono}
                                    onChange={handleInputChange}
                                    readOnly={!isEditing}
                                    maxLength={10}
                                />
                            </div>

                            <div className="botones-edit">
                                {!isEditing && <button type="button" onClick={() => setIsEditing(true)}>EDITAR</button>}
                                {isEditing && (
                                    <>
                                        <button type="button" onClick={() => setIsEditing(false)}>CANCELAR</button>
                                        <button type="submit">ACTUALIZAR</button>
                                    </>
                                )}
                            </div>
                        </form>
                        <div style={{ display: 'flex' }}>
                            <button onClick={handleLogout}>SALIR DE LA CUENTA</button>
                            {user.rol === 1 && (
                                <Link to="/st-usuarios">
                                    <button>EDITAR USUARIOS</button>
                                </Link>
                            )}
                        </div>
                    </div>
                </div>
            </main>
        </>
    );
};

export default UserProfile;

