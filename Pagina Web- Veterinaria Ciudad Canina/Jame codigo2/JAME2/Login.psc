Proceso Login
    // Definici�n de las carcateristicas ingresadas
    Definir usuario_ingresado Como Caracter
    Definir contrase�a_ingresada Como Caracter
    Definir usuario_registrado Como Caracter
    Definir contrase�a_registrada Como Caracter
	
    // Datos de usuario registrados
    usuario_registrado <- "AlissssT"
    contrase�a_registrada <- "Torres0623"
	
    Escribir "Bienvenido. Por favor, inicie sesi�n."
	
    //  Nombre de usuario
    Escribir "Ingrese su nombre de usuario:"
    Leer usuario_ingresado
	
    // Solicitar contrase�a
    Escribir "Ingrese su contrase�a:"
    Leer contrase�a_ingresada
	
    // Verificacion
    Si usuario_ingresado = usuario_registrado Y contrase�a_ingresada = contrase�a_registrada Entonces
        Escribir "Inicio de sesi�n exitoso. Bienvenido!"
    Sino
        Escribir "Nombre de usuario o contrase�a incorrectos. Intente nuevamente."
    Fin Si

Fin Proceso