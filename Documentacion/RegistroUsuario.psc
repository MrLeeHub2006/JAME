Algoritmo RegistroUsuario
    Definir nombre, correo, usuario, pass Como Caracter
	Definir correoExistente Como Caracter
    // Definir un correo que simularemos como existente
	
    // Ingreso de datos del usuario
    Escribir "Ingrese el nombre completo:"
    Leer nombre
    Escribir "Ingrese el correo electr�nico:"
    Leer correo
    Escribir "Ingrese el nombre de usuario:"
    Leer usuario
    Escribir "Ingrese la contrase�a:"
    Leer pass
	// Correo que simularemos como existente
	correoExistente <- "uparelajuan2@gmail.com" 
	Si correo = correoExistente Entonces
		Escribir "ESTE CORREO YA EST� VINCULADO A OTRA CUENTA, INT�NTALO DE NUEVO"
		Escribir " REDIRIGIENDO AL INICIO"
		
	Sino
		Escribir "USUARIO ALMACENADO CORRECTAMENTE"
		Escribir " REDIRIGIENDO AL INICIO DE SESION"
		
	FinSi
FinAlgoritmo