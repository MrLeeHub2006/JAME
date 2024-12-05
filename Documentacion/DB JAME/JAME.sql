CREATE SCHEMA JAME;
CREATE TABLE Usuario(
Id_usuario INT PRIMARY KEY,
Nombre_usuario VARCHAR (255),
apellido_Usuario VARCHAR (255),
Email_Usuario VARCHAR(255),
Contraseña_Usuario VARCHAR(255),
Telefono_Usuario varchar(15),
Direccion_Usuario VARCHAR(255),
rol_Usuario BOOLEAN
);

INSERT INTO Usuario (Id_usuario, Nombre_usuario, apellido_Usuario, Email_Usuario, Contraseña_Usuario, Telefono_Usuario, Direccion_Usuario, rol_Usuario) VALUES 
(1141714794, 'Martin', 'Moya', 'mail.com', '1100110011', '3115929738', 'Cra 123 b #152-90', true), 
(1020738735, 'Juan', 'Uparela', 'mail.com', '07jnjo', '3138335417', 'Cra 123 b #152-90', true), 
(1025532382, 'Alisson', 'Torres', 'mail.com', '061206', '3214138943', 'Cra 123 b #152-90', false), 
(1016010584, 'Diego', 'Sanchez', 'mail.com', 'lupita1', '3024681153', 'Cra 123 b #152-90', false); 
select *from usuario;
DROP TABLE USUARIO;

/*Create table mascotas*/
CREATE TABLE mascotas(
ID_Mascota INT PRIMARY KEY,
Nombre_mascota VARCHAR (255),
Edad_mascota INT,
Fechanaci_mascota DATE,
Raza_Mascota VARCHAR(255),
Id_usuario INT,
FOREIGN KEY (Id_Usuario) REFERENCES usuario (Id_usuario)
);

INSERT INTO mascotas (ID_Mascota, Nombre_mascota, Edad_mascota, Fechanaci_mascota, Raza_Mascota, Id_Usuario) VALUES 
(100, 'Keyla', 3 , '2021-10-16', 'Buldog French', 1025532382), 
(101,  'Napoleon', 1 , '2023-04-17', 'Buldog french', 1020738735), 
(102, 'Ema', 3 , '2021-05-23', 'Gato asiatico', 1016010584);
 DROP TABLE mascotas;
/*Create table venta */

CREATE TABLE Venta(
Id_venta INT PRIMARY KEY,
Fecha_venta DATE,
Monto_venta DECIMAL(10,2),
MetodoPago_Venta VARCHAR(20),
Estado_Venta BOOLEAN,
Id_Usuario INT,
Id_producto INT,
FOREIGN KEY (Id_Usuario) REFERENCES usuario (Id_usuario)
);

INSERT INTO Venta (Id_venta, Fecha_venta, Monto_venta, MetodoPago_Venta, Estado_Venta, Id_Usuario, ID_Producto) VALUES 
(100, '2024-05-20', 50000.00 , 'efectivo', true, 1025532382, 001), 
(101,  '2024-05-11', 450000.00, 'Nequi', false, 1020738735, 002), 
(102, '2021-05-23', 30000.12 , 'efectivo', true , 1016010584, 003);


/*Create table Carrito_de_Compras*/

CREATE TABLE Carrito_de_Compras(
ID_CarritoCompras INT PRIMARY KEY,
Cantidad_CarritoCompras INT,
PrecioUnitario_CarritoCompras INT,
PrecioTotal_CarritoCompras INT,
Id_venta INT, 
FOREIGN KEY (Id_Venta) REFERENCES venta (Id_venta)
);

INSERT INTO carrito_de_compras (ID_CarritoCompras, Cantidad_CarritoCompras, PrecioUnitario_CarritoCompras, PrecioTotal_CarritoCompras, Id_venta, Id_producto) VALUES 
(005, 8, 55.800, 82.000, 100, 001 ), 
(008, 1, 50.800, 990.000, 101, 002 ), 
(011, 3, 55.800, 55.800, 102, 003 );

/*Create table Producto*/

CREATE TABLE Producto (
ID_Producto INT PRIMARY KEY,
Nombre_Producto VARCHAR(255),
Descripción_Producto VARCHAR(255),
Precio_Producto INT,
Categoria_Producto VARCHAR (255),
Marca_Producto VARCHAR (255),
id_cate INT,
FOREIGN KEY (id_cate) REFERENCES categoria (id_cate)
);


INSERT INTO Producto (ID_Producto, Nombre_Producto, Descripción_Producto, Precio_Producto, Categoria_Producto, Marca_Producto) VALUES 
(005, 'Purina dog chow', 'purina para perro adulto', 82.000, 'Alimentos', 'Purina'), 
(008, 'Guacal', 'Guacal para mascota grande', 990.000, 'Objetos de cuidado', 'BIUM' ), 
(011, 'Desparacitante de 2kg-4kg', 'Desparacitante para perros y gatos peso kg pequeños', 55.800, 'Medicamentos', 'Nextgard' );

/*Create table citas*/

CREATE TABLE Citas (
ID_Cita INT PRIMARY KEY,
Id_Usuario INT,
Fecha_Cita DATE,
Hora_Cita time,
Motivo_Cita VARCHAR (255),
Estado_Cita VARCHAR (255),
Id_mascota INT,
FOREIGN KEY (Id_mascota) REFERENCES mascotas (Id_mascota),
FOREIGN KEY (Id_Usuario) REFERENCES usuario (Id_Usuario)
);

INSERT INTO Citas (ID_Cita, Id_Usuario, Fecha_Cita, Hora_Cita, Motivo_Cita, Estado_Cita, Id_mascota) VALUES 
(011, 1141714794, '2023-07-16', '08:00:00', 'Grooming', 'finalizado', 100), 
(022, 1020738735, '2023-07-17', '09:00:00', 'Medicina', 'finalizado', 101), 
(013, 1025532382, '2023-07-16', '10:00:00', 'Grooming', 'Pendiente', 102);

/*CREATE TABLE COMPRAS*/
CREATE TABLE Compras (
Id_compra INT PRIMARY KEY,
Fecha_Compra date,
Cantidad_Compra INT,
Descripción_Compra VARCHAR(255),
MetodoPago_Compra BOOLEAN,
NumeroFactura_Compra INT (255),
PrecioUni_Compra INT,
Precio_Total INT,
Id_producto INT,
FOREIGN KEY (Id_producto) REFERENCES producto (ID_Producto)
);	

INSERT INTO compras (Id_compra, Fecha_Compra, Cantidad_Compra, Descripción_Compra, MetodoPago_Compra, NumeroFactura_Compra, PrecioUni_Compra, Precio_Total, Id_producto) VALUES 
(11, '2023-07-16', 1 , 'pedido de max', true, 525210 ,100.000, 800.000, 005),
(12, '2023-07-16', 5 , 'medicina vacunas', false, 505010 , 50.000, 101.000, 008), 
(13, '2023-07-16', 7 , 'pedido oky doggy', false, 512010 , 30.000, 300.000 , 011);

/* create table perfil*/
CREATE TABLE perfil (
ID_Perfil INT PRIMARY KEY,
ID_Usuario INT, 
Tipo_Perfil BOOLEAN, 
Descripcion_Perfil VARCHAR(255),
FOREIGN KEY (ID_Usuario) REFERENCES usuario (ID_Usuario)
);

INSERT INTO PERFIL (ID_Perfil, ID_Usuario, Tipo_Perfil, Descripcion_Perfil) VALUES
(01,1141714794, TRUE, 'Perfil de Martin Lee Moya Llano CEO de la veterinaria'),
(02, 1020738735, False, 'Perfil de Juan jose uparela Sosa Cliente de la veterinaria'),
(03, 1025532382, false, 'Perfil de alisson daniela torres Romero cliente de la veterianria');

/*create table pedido*/

create table pedido(
ID_Pedido INT Primary key,
ID_Venta INT,
Cantidad_Pedido INT,
PrecioTotal_Pedido INT,
MetodoPago_Pedido BOOLEAN,
Fecha_Pedido DATE,
Estado_Pedido BOOLEAN,
Descripcion_Pedido varchar(255),
ID_CarritoCompras INT,
FOREIGN KEY (Id_Venta) REFERENCES Venta (Id_venta),
FOREIGN KEY (ID_CarritoCompras) REFERENCES carrito_de_compras (ID_CarritoCompras)
);

insert INTO pedido (ID_Pedido, ID_Venta, Cantidad_Pedido, PrecioTotal_Pedido, MetodoPago_Pedido, Fecha_Pedido, Estado_Pedido, Descripcion_Pedido,ID_CarritoCompras) VALUES 
(001, 100, 3, 180.000, true, '2023-08-04', true, 'recoger en el negocio por la señora Maria Moreno, a las 2 pm', 005),
(001, 101, 4, 130.000, false, '2023-08-04', true, 'recoger en el negocio por la señora alisson torres, a las 3 pm', 008),
(001, 102, 1, 100.200, true, '2023-08-04', false, 'recoger en el negocio por el señor  Juan Uparela, a las 4 pm', 011);

/*Create table categorias*/
create table categoria(
id_cate INT PRIMARY KEY,
nombre_Categoria varchar(255),
Descripción_Categoria varchar(255)
);

INSERT INTO categoria(id_cate, nombre_Categoria, Descripción_Categoria)values
(005, 'Alimentos', 'Aqui se almacenaran todos los productos del stock de alimentos'),
(006, 'entretenimiento', 'Aqui se almacenan productos del stock para el entretenimiento y juegos'),
(009, 'medicamentos','Aqui se almacenan productos del stock de salud y cuidado de la mascota')