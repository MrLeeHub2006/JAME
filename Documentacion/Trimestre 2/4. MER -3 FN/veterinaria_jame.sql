-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3300
-- Tiempo de generación: 31-05-2024 a las 22:44:29
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria_jame`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_compras`
--

CREATE TABLE `carrito_compras` (
  `ID_CarritoCompras` int(15) NOT NULL,
  `ID_Compra` int(15) NOT NULL,
  `ID_Producto` int(15) NOT NULL,
  `Cantidad_CarritoCompras` int(15) NOT NULL,
  `PrecioUnitario_CarritoCompras` int(12) NOT NULL,
  `PrecioTotal_CarritoCompras` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cdc_venta_producto`
--

CREATE TABLE `cdc_venta_producto` (
  `ID` int(11) NOT NULL,
  `ID_CarritoCompras` int(11) NOT NULL,
  `ID_Venta` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `ID_Cita` int(12) NOT NULL,
  `ID_Usuario` int(12) NOT NULL,
  `Fecha_Cita` date NOT NULL,
  `Hora_Cita` date NOT NULL,
  `Motivo_Cita` varchar(50) NOT NULL,
  `Estado_Cita` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita_usuario_mascota`
--

CREATE TABLE `cita_usuario_mascota` (
  `ID` int(11) NOT NULL,
  `ID_Cita` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Mascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `ID_Compra` int(12) NOT NULL,
  `Fecha_Compra` date NOT NULL,
  `Cantidad_Compra` int(12) NOT NULL,
  `Descripción_Compra` text NOT NULL,
  `MetodoPago_Compra` tinyint(1) NOT NULL,
  `NumeroFactura_Compra` int(15) NOT NULL,
  `PrecioUni_Compra` int(15) NOT NULL,
  `Precio_Total` int(15) NOT NULL,
  `ID_producto` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_producto`
--

CREATE TABLE `compra_producto` (
  `ID` int(11) NOT NULL,
  `ID_Compra` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `ID_Mascota` int(11) NOT NULL,
  `Nombre_Mascota` varchar(255) NOT NULL,
  `Edad_Mascota` int(11) NOT NULL,
  `Fechanaci_Mascota` date NOT NULL,
  `Raza_Mascota` varchar(50) NOT NULL,
  `ID_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota_usuario`
--

CREATE TABLE `mascota_usuario` (
  `ID` int(11) NOT NULL,
  `ID_Mascota` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `ID_Pedido` int(12) NOT NULL,
  `ID_Compra` int(12) NOT NULL,
  `Cantidad_Pedido` int(12) NOT NULL,
  `PrecioUni_Pedido` int(10) NOT NULL,
  `PrecioTotal_Pedido` int(10) NOT NULL,
  `MetodoPago_Pedido` text NOT NULL,
  `Fecha_Pedido` date NOT NULL,
  `Estado_Pedido` text NOT NULL,
  `Descripcion_Pedido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_compra`
--

CREATE TABLE `pedido_compra` (
  `ID` int(11) NOT NULL,
  `ID_Pedido` int(11) NOT NULL,
  `ID_Compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `ID_Perfil` int(12) NOT NULL,
  `ID_Usuario` int(12) NOT NULL,
  `Tipo_Perfil` text NOT NULL,
  `Descripcion_Perfil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfi_usuario`
--

CREATE TABLE `perfi_usuario` (
  `ID` int(11) NOT NULL,
  `ID_Perfil` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_Producto` int(12) NOT NULL,
  `Nombre_Producto` text NOT NULL,
  `Descripción_Producto` varchar(12) NOT NULL,
  `Precio_Producto` int(10) NOT NULL,
  `Categoria_Producto` text NOT NULL,
  `Marca_Producto` text NOT NULL,
  `ID_ Compra` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` int(10) NOT NULL,
  `Nombre_Usuario` text NOT NULL,
  `Apellido_Usuario` text NOT NULL,
  `Email_Usuario` text NOT NULL,
  `Contraseña_Usuario` varchar(15) NOT NULL,
  `Telefono_Usuario` int(15) NOT NULL,
  `Direccion_Usuario` varchar(20) NOT NULL,
  `Rol_Usuario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID_Venta` int(15) NOT NULL,
  `ID_Usuario` int(15) NOT NULL,
  `Fecha_Venta` date NOT NULL,
  `Monto_Venta` int(15) NOT NULL,
  `MetodoPago_Venta` text NOT NULL,
  `Estado_Venta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_usuario_producto`
--

CREATE TABLE `venta_usuario_producto` (
  `ID` int(11) NOT NULL,
  `ID_Venta` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  ADD PRIMARY KEY (`ID_CarritoCompras`),
  ADD UNIQUE KEY `ID_Usuario` (`ID_Compra`),
  ADD UNIQUE KEY `ID_Producto` (`ID_Producto`),
  ADD UNIQUE KEY `ID_Compra` (`ID_Compra`);

--
-- Indices de la tabla `cdc_venta_producto`
--
ALTER TABLE `cdc_venta_producto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_CarritoCompras` (`ID_CarritoCompras`),
  ADD KEY `ID_Producto` (`ID_Producto`),
  ADD KEY `ID_Venta` (`ID_Venta`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`ID_Cita`),
  ADD UNIQUE KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `cita_usuario_mascota`
--
ALTER TABLE `cita_usuario_mascota`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Cita` (`ID_Cita`),
  ADD KEY `ID_Mascota` (`ID_Mascota`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`ID_Compra`),
  ADD UNIQUE KEY `ID_producto` (`ID_producto`);

--
-- Indices de la tabla `compra_producto`
--
ALTER TABLE `compra_producto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Compra` (`ID_Compra`),
  ADD KEY `ID_Producto` (`ID_Producto`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`ID_Mascota`);

--
-- Indices de la tabla `mascota_usuario`
--
ALTER TABLE `mascota_usuario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Mascota` (`ID_Mascota`),
  ADD KEY `ID_Perfil` (`ID_Perfil`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ID_Pedido`),
  ADD UNIQUE KEY `ID_Usuario` (`ID_Compra`),
  ADD UNIQUE KEY `ID_Compra` (`ID_Compra`);

--
-- Indices de la tabla `pedido_compra`
--
ALTER TABLE `pedido_compra`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Compra` (`ID_Compra`),
  ADD KEY `ID_Pedido` (`ID_Pedido`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`ID_Perfil`),
  ADD UNIQUE KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `perfi_usuario`
--
ALTER TABLE `perfi_usuario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Perfil` (`ID_Perfil`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_Producto`),
  ADD UNIQUE KEY `ID_ Compra` (`ID_ Compra`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID_Venta`),
  ADD UNIQUE KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `venta_usuario_producto`
--
ALTER TABLE `venta_usuario_producto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Producto` (`ID_Producto`),
  ADD KEY `ID_Usuario` (`ID_Usuario`),
  ADD KEY `ID_Venta` (`ID_Venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  MODIFY `ID_CarritoCompras` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cdc_venta_producto`
--
ALTER TABLE `cdc_venta_producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `ID_Cita` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cita_usuario_mascota`
--
ALTER TABLE `cita_usuario_mascota`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra_producto`
--
ALTER TABLE `compra_producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `ID_Mascota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascota_usuario`
--
ALTER TABLE `mascota_usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `ID_Pedido` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido_compra`
--
ALTER TABLE `pedido_compra`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `ID_Perfil` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfi_usuario`
--
ALTER TABLE `perfi_usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_Producto` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID_Venta` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `venta_usuario_producto`
--
ALTER TABLE `venta_usuario_producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  ADD CONSTRAINT `carrito_compras_ibfk_1` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID_Producto`),
  ADD CONSTRAINT `carrito_compras_ibfk_2` FOREIGN KEY (`ID_Compra`) REFERENCES `compras` (`ID_Compra`);

--
-- Filtros para la tabla `cdc_venta_producto`
--
ALTER TABLE `cdc_venta_producto`
  ADD CONSTRAINT `cdc_venta_producto_ibfk_1` FOREIGN KEY (`ID_CarritoCompras`) REFERENCES `carrito_compras` (`ID_CarritoCompras`),
  ADD CONSTRAINT `cdc_venta_producto_ibfk_2` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID_Producto`),
  ADD CONSTRAINT `cdc_venta_producto_ibfk_3` FOREIGN KEY (`ID_Venta`) REFERENCES `ventas` (`ID_Venta`);

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`);

--
-- Filtros para la tabla `cita_usuario_mascota`
--
ALTER TABLE `cita_usuario_mascota`
  ADD CONSTRAINT `cita_usuario_mascota_ibfk_1` FOREIGN KEY (`ID_Cita`) REFERENCES `citas` (`ID_Cita`),
  ADD CONSTRAINT `cita_usuario_mascota_ibfk_2` FOREIGN KEY (`ID_Mascota`) REFERENCES `mascota` (`ID_Mascota`),
  ADD CONSTRAINT `cita_usuario_mascota_ibfk_3` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`ID_producto`) REFERENCES `producto` (`ID_Producto`);

--
-- Filtros para la tabla `compra_producto`
--
ALTER TABLE `compra_producto`
  ADD CONSTRAINT `compra_producto_ibfk_1` FOREIGN KEY (`ID_Compra`) REFERENCES `compras` (`ID_Compra`),
  ADD CONSTRAINT `compra_producto_ibfk_2` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID_Producto`);

--
-- Filtros para la tabla `mascota_usuario`
--
ALTER TABLE `mascota_usuario`
  ADD CONSTRAINT `mascota_usuario_ibfk_1` FOREIGN KEY (`ID_Mascota`) REFERENCES `mascota` (`ID_Mascota`),
  ADD CONSTRAINT `mascota_usuario_ibfk_2` FOREIGN KEY (`ID_Perfil`) REFERENCES `perfil` (`ID_Perfil`),
  ADD CONSTRAINT `mascota_usuario_ibfk_3` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`ID_Compra`) REFERENCES `compras` (`ID_Compra`);

--
-- Filtros para la tabla `pedido_compra`
--
ALTER TABLE `pedido_compra`
  ADD CONSTRAINT `pedido_compra_ibfk_1` FOREIGN KEY (`ID_Compra`) REFERENCES `compras` (`ID_Compra`),
  ADD CONSTRAINT `pedido_compra_ibfk_2` FOREIGN KEY (`ID_Pedido`) REFERENCES `pedido` (`ID_Pedido`);

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`);

--
-- Filtros para la tabla `perfi_usuario`
--
ALTER TABLE `perfi_usuario`
  ADD CONSTRAINT `perfi_usuario_ibfk_1` FOREIGN KEY (`ID_Perfil`) REFERENCES `perfil` (`ID_Perfil`),
  ADD CONSTRAINT `perfi_usuario_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `compras` (`ID_Compra`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`);

--
-- Filtros para la tabla `venta_usuario_producto`
--
ALTER TABLE `venta_usuario_producto`
  ADD CONSTRAINT `venta_usuario_producto_ibfk_1` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID_Producto`),
  ADD CONSTRAINT `venta_usuario_producto_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`),
  ADD CONSTRAINT `venta_usuario_producto_ibfk_3` FOREIGN KEY (`ID_Venta`) REFERENCES `ventas` (`ID_Venta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
