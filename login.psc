Algoritmo Login
	Definir CONTRASENA_INGRESADA Como Cadena
	// Definici�n de las carcateristicas ingresadas
	Definir usuario_ingresado Como Cadena
	Definir usuario_registrado Como Cadena
	Definir CONTRASENA_REGISTRADA Como Cadena
	// Datos de usuario registrados
	usuario_registrado <- 'AlissssT'
	CONTRASENA_REGISTRADA <- 'Torres0623'
	Escribir 'Bienvenido. Por favor, inicie sesi�n.'
	// Nombre de usuario
	Escribir 'Ingrese su nombre de usuario:'
	Leer usuario_ingresado
	// Solicitar contrase�a
	Escribir 'Ingrese su contrase�a:'
	Leer CONTRASENA_INGRESADA
	// Verificacion
	Si usuario_ingresado=usuario_registrado Y CONTRASENA_INGRESADA=CONTRASENA_REGISTRADA Entonces
		Escribir 'Inicio de sesi�n exitoso. Bienvenido!'
	SiNo
		Escribir 'Nombre de usuario o contrase�a incorrectos. Intente nuevamente.'
	FinSi
FinAlgoritmo
