Proceso Login
    // Definición de las carcateristicas ingresadas
    Definir usuario_ingresado Como Caracter
    Definir contraseña_ingresada Como Caracter
    Definir usuario_registrado Como Caracter
    Definir contraseña_registrada Como Caracter
	
    // Datos de usuario registrados
    usuario_registrado <- "AlissssT"
    contraseña_registrada <- "Torres0623"
	
    Escribir "Bienvenido. Por favor, inicie sesión."
	
    //  Nombre de usuario
    Escribir "Ingrese su nombre de usuario:"
    Leer usuario_ingresado
	
    // Solicitar contraseña
    Escribir "Ingrese su contraseña:"
    Leer contraseña_ingresada
	
    // Verificacion
    Si usuario_ingresado = usuario_registrado Y contraseña_ingresada = contraseña_registrada Entonces
        Escribir "Inicio de sesión exitoso. Bienvenido!"
    Sino
        Escribir "Nombre de usuario o contraseña incorrectos. Intente nuevamente."
    Fin Si

Fin Proceso