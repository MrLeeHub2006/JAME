-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3300
-- Generation Time: May 24, 2024 at 06:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `actividad_clase`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `Cod_Cliente` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellido` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cliente_empleado`
--

CREATE TABLE `cliente_empleado` (
  `ID` int(11) NOT NULL,
  `Cod_Empleado` int(11) NOT NULL,
  `Cod_Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detalle de factura`
--

CREATE TABLE `detalle de factura` (
  `Cod_Detalle` int(11) NOT NULL,
  `Cod_Factura` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dtl_factura_producto`
--

CREATE TABLE `dtl_factura_producto` (
  `ID` int(11) NOT NULL,
  `Cod_Detalle` int(11) NOT NULL,
  `Cod_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

CREATE TABLE `empleado` (
  `Cod_Empleado` int(11) NOT NULL,
  `Salario` decimal(10,0) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellido` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `empleado_grupo`
--

CREATE TABLE `empleado_grupo` (
  `ID` int(11) NOT NULL,
  `Cod_Empleado` int(11) NOT NULL,
  `Cod_Grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facturas`
--

CREATE TABLE `facturas` (
  `Cod_Facura` int(11) NOT NULL,
  `Tipo` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `factura_cliente`
--

CREATE TABLE `factura_cliente` (
  `ID` int(11) NOT NULL,
  `Cod_Factura` int(11) NOT NULL,
  `Cod_Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grupo`
--

CREATE TABLE `grupo` (
  `Cod_Grupo` int(11) NOT NULL,
  `Descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `Cod_Material` int(11) NOT NULL,
  `Tipo_Material` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `Cod_Producto` int(11) NOT NULL,
  `Marca` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `producto_material`
--

CREATE TABLE `producto_material` (
  `ID` int(11) NOT NULL,
  `Cod_Producto` int(11) NOT NULL,
  `Cod_Material` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `Cod_Proveedor` int(11) NOT NULL,
  `Razón_Social` varchar(255) NOT NULL,
  `Direccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proveedor_producto`
--

CREATE TABLE `proveedor_producto` (
  `ID` int(11) NOT NULL,
  `Cod_Proveedor` int(11) NOT NULL,
  `Cod_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Cod_Cliente`);

--
-- Indexes for table `cliente_empleado`
--
ALTER TABLE `cliente_empleado`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Cod_Cliente` (`Cod_Cliente`),
  ADD KEY `cliente_empleado_ibfk_1` (`Cod_Empleado`);

--
-- Indexes for table `detalle de factura`
--
ALTER TABLE `detalle de factura`
  ADD PRIMARY KEY (`Cod_Detalle`),
  ADD KEY `Cod_Factura` (`Cod_Factura`);

--
-- Indexes for table `dtl_factura_producto`
--
ALTER TABLE `dtl_factura_producto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Cod_Detalle` (`Cod_Detalle`),
  ADD KEY `dtl_factura_producto_ibfk_1` (`Cod_Producto`);

--
-- Indexes for table `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Cod_Empleado`);

--
-- Indexes for table `empleado_grupo`
--
ALTER TABLE `empleado_grupo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Cod_Empleado` (`Cod_Empleado`),
  ADD KEY `Cod_Grupo` (`Cod_Grupo`);

--
-- Indexes for table `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`Cod_Facura`);

--
-- Indexes for table `factura_cliente`
--
ALTER TABLE `factura_cliente`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Cod_Cliente` (`Cod_Cliente`),
  ADD KEY `Cod_Factura` (`Cod_Factura`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`Cod_Grupo`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`Cod_Material`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Cod_Producto`);

--
-- Indexes for table `producto_material`
--
ALTER TABLE `producto_material`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Cod_Material` (`Cod_Material`),
  ADD KEY `Cod_Referencia` (`Cod_Producto`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`Cod_Proveedor`);

--
-- Indexes for table `proveedor_producto`
--
ALTER TABLE `proveedor_producto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Cod_Producto` (`Cod_Producto`),
  ADD KEY `proveedor_producto_ibfk_1` (`Cod_Proveedor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Cod_Cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cliente_empleado`
--
ALTER TABLE `cliente_empleado`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detalle de factura`
--
ALTER TABLE `detalle de factura`
  MODIFY `Cod_Detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dtl_factura_producto`
--
ALTER TABLE `dtl_factura_producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empleado`
--
ALTER TABLE `empleado`
  MODIFY `Cod_Empleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empleado_grupo`
--
ALTER TABLE `empleado_grupo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facturas`
--
ALTER TABLE `facturas`
  MODIFY `Cod_Facura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `factura_cliente`
--
ALTER TABLE `factura_cliente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `Cod_Grupo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `Cod_Material` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `Cod_Producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producto_material`
--
ALTER TABLE `producto_material`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `Cod_Proveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proveedor_producto`
--
ALTER TABLE `proveedor_producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cliente_empleado`
--
ALTER TABLE `cliente_empleado`
  ADD CONSTRAINT `cliente_empleado_ibfk_1` FOREIGN KEY (`Cod_Empleado`) REFERENCES `empleado` (`Cod_Empleado`);

--
-- Constraints for table `detalle de factura`
--
ALTER TABLE `detalle de factura`
  ADD CONSTRAINT `detalle de factura_ibfk_1` FOREIGN KEY (`Cod_Factura`) REFERENCES `facturas` (`Cod_Facura`);

--
-- Constraints for table `dtl_factura_producto`
--
ALTER TABLE `dtl_factura_producto`
  ADD CONSTRAINT `dtl_factura_producto_ibfk_1` FOREIGN KEY (`Cod_Producto`) REFERENCES `producto` (`Cod_Producto`);

--
-- Constraints for table `empleado_grupo`
--
ALTER TABLE `empleado_grupo`
  ADD CONSTRAINT `empleado_grupo_ibfk_1` FOREIGN KEY (`Cod_Empleado`) REFERENCES `empleado` (`Cod_Empleado`),
  ADD CONSTRAINT `empleado_grupo_ibfk_2` FOREIGN KEY (`Cod_Grupo`) REFERENCES `grupo` (`Cod_Grupo`);

--
-- Constraints for table `factura_cliente`
--
ALTER TABLE `factura_cliente`
  ADD CONSTRAINT `factura_cliente_ibfk_1` FOREIGN KEY (`Cod_Cliente`) REFERENCES `cliente` (`Cod_Cliente`),
  ADD CONSTRAINT `factura_cliente_ibfk_2` FOREIGN KEY (`Cod_Factura`) REFERENCES `facturas` (`Cod_Facura`);

--
-- Constraints for table `producto_material`
--
ALTER TABLE `producto_material`
  ADD CONSTRAINT `producto_material_ibfk_1` FOREIGN KEY (`Cod_Material`) REFERENCES `material` (`Cod_Material`),
  ADD CONSTRAINT `producto_material_ibfk_2` FOREIGN KEY (`Cod_Producto`) REFERENCES `producto` (`Cod_Producto`);

--
-- Constraints for table `proveedor_producto`
--
ALTER TABLE `proveedor_producto`
  ADD CONSTRAINT `proveedor_producto_ibfk_1` FOREIGN KEY (`Cod_Proveedor`) REFERENCES `proveedor` (`Cod_Proveedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
