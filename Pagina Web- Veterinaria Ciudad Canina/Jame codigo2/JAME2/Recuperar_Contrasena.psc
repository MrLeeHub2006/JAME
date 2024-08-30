Proceso Recuperar_Contrasena
	Definir usuario Como Caracter
	Definir correo Como Caracter
	Definir nueva_contrase�a Como Caracter
	Definir confirmar_contrase�a Como Caracter
	Definir correo_registrado Como Caracter
	Definir usuario_registrado Como Caracter
	Definir contrase�a_nueva_establecida Como Logico
	
	// Simulaci�n de datos de usuario registrados
	usuario_registrado <- "08_drt"
	correo_registrado <- "alidatorres0623@gmail.com"
	
	Escribir "Bienvenido al sistema de recuperaci�n de contrase�as."
	Escribir "Ingrese su nombre de usuario:"
	Leer usuario
	
	Escribir "Ingrese su correo electr�nico registrado:"
	Leer correo
	
	// Verificar la identidad del usuario
	Si usuario = usuario_registrado Y correo = correo_registrado Entonces
		Escribir "Verificaci�n exitosa. Ahora puede restablecer su contrase�a."
		
		Repetir
			Escribir "Ingrese la nueva contrase�a:"
			Leer nueva_contrase�a
			
			Escribir "Confirme la nueva contrase�a:"
			Leer confirmar_contrase�a
			
			Si nueva_contrase�a = confirmar_contrase�a Entonces
				Escribir "Contrase�a restablecida con �xito."
				contrase�a_nueva_establecida <- Verdadero
			Sino
				Escribir "Las contrase�as no coinciden. Intente de nuevo."
				contrase�a_nueva_establecida <- Falso
			Fin Si
		Hasta Que contrase�a_nueva_establecida = Verdadero
	Sino
		Escribir "La informaci�n ingresada no coincide con nuestros registros. No se puede restablecer la contrase�a."
	Fin Si
	
	Escribir "Gracias por utilizar el sistema de recuperaci�n de contrase�as."
Fin Proceso