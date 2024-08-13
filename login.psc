Algoritmo Login
	Definir CONTRASENA_INGRESADA Como Cadena
	// Definición de las carcateristicas ingresadas
	Definir usuario_ingresado Como Cadena
	Definir usuario_registrado Como Cadena
	Definir CONTRASENA_REGISTRADA Como Cadena
	// Datos de usuario registrados
	usuario_registrado <- 'AlissssT'
	CONTRASENA_REGISTRADA <- 'Torres0623'
	Escribir 'Bienvenido. Por favor, inicie sesión.'
	// Nombre de usuario
	Escribir 'Ingrese su nombre de usuario:'
	Leer usuario_ingresado
	// Solicitar contraseña
	Escribir 'Ingrese su contraseña:'
	Leer CONTRASENA_INGRESADA
	// Verificacion
	Si usuario_ingresado=usuario_registrado Y CONTRASENA_INGRESADA=CONTRASENA_REGISTRADA Entonces
		Escribir 'Inicio de sesión exitoso. Bienvenido!'
	SiNo
		Escribir 'Nombre de usuario o contraseña incorrectos. Intente nuevamente.'
	FinSi
FinAlgoritmo
