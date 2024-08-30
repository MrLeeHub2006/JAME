Proceso Recuperar_Contrasena
	Definir usuario Como Caracter
	Definir correo Como Caracter
	Definir nueva_contraseña Como Caracter
	Definir confirmar_contraseña Como Caracter
	Definir correo_registrado Como Caracter
	Definir usuario_registrado Como Caracter
	Definir contraseña_nueva_establecida Como Logico
	
	// Simulación de datos de usuario registrados
	usuario_registrado <- "08_drt"
	correo_registrado <- "alidatorres0623@gmail.com"
	
	Escribir "Bienvenido al sistema de recuperación de contraseñas."
	Escribir "Ingrese su nombre de usuario:"
	Leer usuario
	
	Escribir "Ingrese su correo electrónico registrado:"
	Leer correo
	
	// Verificar la identidad del usuario
	Si usuario = usuario_registrado Y correo = correo_registrado Entonces
		Escribir "Verificación exitosa. Ahora puede restablecer su contraseña."
		
		Repetir
			Escribir "Ingrese la nueva contraseña:"
			Leer nueva_contraseña
			
			Escribir "Confirme la nueva contraseña:"
			Leer confirmar_contraseña
			
			Si nueva_contraseña = confirmar_contraseña Entonces
				Escribir "Contraseña restablecida con éxito."
				contraseña_nueva_establecida <- Verdadero
			Sino
				Escribir "Las contraseñas no coinciden. Intente de nuevo."
				contraseña_nueva_establecida <- Falso
			Fin Si
		Hasta Que contraseña_nueva_establecida = Verdadero
	Sino
		Escribir "La información ingresada no coincide con nuestros registros. No se puede restablecer la contraseña."
	Fin Si
	
	Escribir "Gracias por utilizar el sistema de recuperación de contraseñas."
Fin Proceso