Algoritmo RegistroUsuario
    Definir nombre, correo, usuario, pass Como Caracter
	Definir correoExistente Como Caracter
    // Definir un correo que simularemos como existente
	
    // Ingreso de datos del usuario
    Escribir "Ingrese el nombre completo:"
    Leer nombre
    Escribir "Ingrese el correo electrónico:"
    Leer correo
    Escribir "Ingrese el nombre de usuario:"
    Leer usuario
    Escribir "Ingrese la contraseña:"
    Leer pass
	// Correo que simularemos como existente
	correoExistente <- "uparelajuan2@gmail.com" 
	Si correo = correoExistente Entonces
		Escribir "ESTE CORREO YA ESTÁ VINCULADO A OTRA CUENTA, INTÉNTALO DE NUEVO"
		Escribir " REDIRIGIENDO AL INICIO"
		
	Sino
		Escribir "USUARIO ALMACENADO CORRECTAMENTE"
		Escribir " REDIRIGIENDO AL INICIO DE SESION"
		
	FinSi
FinAlgoritmo