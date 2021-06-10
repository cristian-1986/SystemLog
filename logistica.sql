-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-06-2021 a las 04:44:19
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `logistica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

DROP TABLE IF EXISTS `almacen`;
CREATE TABLE IF NOT EXISTS `almacen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `id_sede` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id`, `nombre`, `id_sede`) VALUES
(1, 'Pocito Central', 1),
(2, 'Media Agua Central', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calibre`
--

DROP TABLE IF EXISTS `calibre`;
CREATE TABLE IF NOT EXISTS `calibre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calibre`
--

INSERT INTO `calibre` (`id`, `nombre`, `descripcion`) VALUES
(1, '970 cc', 'VIDRIO'),
(2, '1.5 lt desc.', 'DESCARTABLE'),
(3, '2.25 lt retorn.', 'RETORNABLE'),
(4, '710 cc', ''),
(5, '500 cc', ''),
(6, '473 cc lata', ''),
(7, '3 litros ', ''),
(8, '2.25 desc.', ''),
(9, '740 cc', ''),
(10, '6.3 lts.', ''),
(11, '1.25 cc desc.', ''),
(12, '250 cc lata', ''),
(13, '250 cc pet', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camion`
--

DROP TABLE IF EXISTS `camion`;
CREATE TABLE IF NOT EXISTS `camion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `marca` varchar(30) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `dominio` varchar(10) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `observacion` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `camion`
--

INSERT INTO `camion` (`id`, `marca`, `tipo`, `dominio`, `modelo`, `observacion`) VALUES
(1, 'Ford', 'F-350', 'MMZ530', '2017', ''),
(2, 'Ford', 'T-750', 'NOY031', '2014', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camion_gastos`
--

DROP TABLE IF EXISTS `camion_gastos`;
CREATE TABLE IF NOT EXISTS `camion_gastos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_camion` int NOT NULL,
  `concepto` varchar(30) NOT NULL,
  `importe` float NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `camion_gastos`
--

INSERT INTO `camion_gastos` (`id`, `id_camion`, `concepto`, `importe`, `fecha`) VALUES
(1, 1, 'Cambio de Aceite 5.000 km', 4500.75, '2020-05-04'),
(2, 2, 'Cambio de Liquido de Freno ', 1070.65, '2020-05-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `localidad` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ramo_cliente` varchar(30) NOT NULL,
  `situacion_afip` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dni_cuil` varchar(30) NOT NULL,
  `domicilio` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `vendedor` int NOT NULL,
  `zona_entrega` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `localidad`, `ramo_cliente`, `situacion_afip`, `dni_cuil`, `domicilio`, `email`, `telefono`, `vendedor`, `zona_entrega`) VALUES
(1, 'Ariel', 'Rosales', 'Pocito', 'Almacen', 'Consumidor Final', '20455863', 'Lemos 7586 sur', 'arielr.99@gmail.com', '264455891', 1, 1),
(2, 'Gabriela', 'Zapata', 'Pocito', 'Kiosco', 'Monotributo', '2032186187', 'Mendoza 546 sur', 'gabriela@gmai.com', '264454568', 2, 2),
(3, 'Norma', 'Romero', 'Pocito', 'Almacén', 'Monotributo', '12155356', 'B° Sta Bárbara Mza C casa 12', 'norma@norma.com', '2644654686', 4, 5),
(4, 'Antonia', 'Pujado', 'Pocito', 'Kiosco', 'Inscripto', '15879789', 'Independencia 74 este', 'anto@anto.com.ar', '2645785124', 7, 1),
(5, 'Roberto', 'Zarate', 'Sarmiento', 'Autoservicio', 'Inscripto', '5454688', '25 de Mayo 546', 'roberto53@gmail.com', '2645454655', 5, 3),
(6, 'Carlos', 'Galvez', 'Sarmiento', 'Mayorista', 'Inscripto', '30-454666-2', 'Torrent 541', 'carlos.jon@live.com', '2645878799', 6, 4),
(7, 'Juan', 'Poblete', 'Sarmiento', 'Cons Final', 'Kiosco', '30255417', 'B° Chubut Mza A Casa 8', 'poblete@gmail.com.ar', '2644546788', 6, 0),
(8, 'Pedro', 'Correa', 'Pocito', 'Almacén', 'Inscripto', '30-546555-3', 'David Chavez 643 norte', 'pedro@mercadosrl.com.ar', '2645546543', 1, 2),
(9, 'Alejandra', 'Sanchez', 'Pocito', 'Kiosco', 'Monotributo', '20-5465444-5', 'Mendoza y calle 10', 'ale2000@gmail.com', '2644546545', 2, 2),
(10, 'Pedro', 'Correa', 'Pocito', 'Almacén', 'Inscripto', '30-546555-3', 'David Chavez 643 norte', 'ped@mercadosrl.com.ar', '2645546543', 1, 2),
(11, 'Pedro', 'Correa', 'Pocito', 'Almacén', 'Inscripto', '30-546555-3', 'David Chavez 643 norte', 'pd@mercadosrl.com.ar', '2645546543', 1, 2),
(12, 'Alejandra', 'Sanchez', 'Pocito', 'Kiosco', 'Monotributo', '20-5465444-5', 'Mendoza y calle 10', 'ale200@gmail.com', '2644546545', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_proveedor` int NOT NULL,
  `numero_compra` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `total_compra` float NOT NULL,
  `id_detalle_compra` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `id_proveedor`, `numero_compra`, `fecha`, `total_compra`, `id_detalle_compra`) VALUES
(1, 1, '00001', '0000-00-00', 89533.5, 1),
(2, 1, '00002', '0000-00-00', 103564, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

DROP TABLE IF EXISTS `detalle_compra`;
CREATE TABLE IF NOT EXISTS `detalle_compra` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `subtotal_compra` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `id_producto`, `cantidad`, `subtotal_compra`) VALUES
(1, 1, 100, 80000),
(2, 2, 100, 77000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

DROP TABLE IF EXISTS `detalle_pedido`;
CREATE TABLE IF NOT EXISTS `detalle_pedido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `subtotal` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id`, `id_producto`, `cantidad`, `subtotal`) VALUES
(1, 1, 2, 1605),
(2, 2, 2, 2405);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_producto`
--

DROP TABLE IF EXISTS `estado_producto`;
CREATE TABLE IF NOT EXISTS `estado_producto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_producto`
--

INSERT INTO `estado_producto` (`id`, `nombre`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

DROP TABLE IF EXISTS `inventario`;
CREATE TABLE IF NOT EXISTS `inventario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_mov_stock` int NOT NULL,
  `cantidad` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `id_mov_stock`, `cantidad`) VALUES
(1, 1, 100),
(2, 1, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE IF NOT EXISTS `marca` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `observacion` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`, `observacion`) VALUES
(1, 'Quilmes', 'Quilmes Clásica'),
(2, 'Andes', 'Rubia'),
(3, 'Pepsi', 'Regular'),
(4, '7up', 'Con Azucar'),
(5, 'Stout', 'Cerveza Negra'),
(6, 'Stella Artois', 'Premium'),
(7, 'Paso de los Toros', ''),
(8, 'Mirinda', ''),
(9, 'Budweiser', ''),
(10, 'Bajo Cero', ''),
(11, 'Corona', ''),
(12, 'Red Bull', ''),
(13, 'Gatorade', ''),
(14, 'Nestle Pureza Vital', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_stock`
--

DROP TABLE IF EXISTS `movimiento_stock`;
CREATE TABLE IF NOT EXISTS `movimiento_stock` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_tipo_movimiento` varchar(25) NOT NULL,
  `id_producto` varchar(25) NOT NULL,
  `id_almacen` varchar(25) NOT NULL,
  `id_almacen_destino` varchar(25) NOT NULL,
  `cantidad` int NOT NULL,
  `fecha_vto` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_tipo`
--

DROP TABLE IF EXISTS `movimiento_tipo`;
CREATE TABLE IF NOT EXISTS `movimiento_tipo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `operacion` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movimiento_tipo`
--

INSERT INTO `movimiento_tipo` (`id`, `nombre`, `operacion`) VALUES
(1, 'Ingreso por compra', 'Sumar al stock'),
(2, 'Egreso por venta', 'Restar al stock'),
(3, 'Movimiento entre sucursales', 'restar y sumar'),
(4, 'Ajuste por pérdida', 'restar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `num_pedido` int NOT NULL,
  `fecha` date NOT NULL,
  `total` float NOT NULL,
  `id_detalle` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `id_cliente`, `num_pedido`, `fecha`, `total`, `id_detalle`) VALUES
(1, 1, 1, '0000-00-00', 1650.3, 1),
(2, 2, 2, '0000-00-00', 2405, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_rubro` int NOT NULL,
  `id_marca` int NOT NULL,
  `id_sabor` int NOT NULL,
  `id_calibre` int NOT NULL,
  `id_estado` int NOT NULL,
  `unid_bulto` int NOT NULL,
  `stock_min` int NOT NULL,
  `precio_costo` float NOT NULL,
  `precio_venta` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `id_rubro`, `id_marca`, `id_sabor`, `id_calibre`, `id_estado`, `unid_bulto`, `stock_min`, `precio_costo`, `precio_venta`) VALUES
(1, 'Quilmes litro', 1, 1, 1, 1, 1, 12, 10, 850.3, 1280.5),
(2, 'Andes litro', 1, 2, 2, 1, 1, 12, 10, 830, 1250.5),
(3, 'Pepsi 1.5 lt', 2, 3, 3, 2, 1, 6, 5, 550.3, 895),
(4, '7up 2.25 lt', 2, 4, 4, 3, 1, 8, 6, 673.3, 954.8),
(5, 'Red Bull', 4, 12, 9, 12, 1, 4, 50, 380.25, 465.5),
(6, 'Gatorade Mza.', 5, 13, 6, 5, 1, 6, 50, 423.87, 571.5),
(7, 'Agua Nestle ', 3, 14, 10, 10, 1, 2, 50, 216.89, 330),
(8, 'Corona', 1, 11, 1, 4, 1, 6, 20, 430, 520.35),
(9, 'Budweiser', 1, 9, 1, 1, 1, 12, 50, 1425.35, 1610.12),
(10, 'Stella Lata', 1, 6, 1, 6, 1, 6, 10, 582.75, 705.5),
(11, 'Quilmes lata', 1, 1, 1, 6, 1, 6, 100, 445.71, 520.1),
(12, 'Stout lata', 1, 5, 2, 6, 1, 6, 50, 435.79, 510.15),
(13, 'PDT Pomelo ', 2, 7, 7, 8, 1, 8, 30, 897, 1020),
(14, 'Mirinda 1.5', 2, 8, 8, 2, 1, 6, 100, 605.47, 720);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `domicilio` varchar(30) NOT NULL,
  `cuit` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `mail`, `telefono`, `domicilio`, `cuit`) VALUES
(1, 'Cerveceria Quilmes', 'cerveceria@quilmes.com.ar', '261482335', 'Cervantes 1313 oeste', '30-22445566-8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'Admin'),
(2, 'Supervisor de Reparto'),
(3, 'Supervisor de Deposito'),
(4, 'Supervisor de Ventas'),
(5, 'Vendedor'),
(6, 'Encargado de Reposición');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro_producto`
--

DROP TABLE IF EXISTS `rubro_producto`;
CREATE TABLE IF NOT EXISTS `rubro_producto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rubro_producto`
--

INSERT INTO `rubro_producto` (`id`, `nombre`) VALUES
(1, 'Cervezas'),
(2, 'Gaseosas'),
(3, 'Aguas'),
(4, 'Energizantes'),
(5, 'Isotónicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sabor`
--

DROP TABLE IF EXISTS `sabor`;
CREATE TABLE IF NOT EXISTS `sabor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `detalle` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sabor`
--

INSERT INTO `sabor` (`id`, `nombre`, `detalle`) VALUES
(1, 'Rubia', 'Clásica'),
(2, 'Negra', ''),
(3, 'Lima Limón', 'Dulce'),
(4, 'Cola', 'Free'),
(5, 'Blue', ''),
(6, 'Manzana', ''),
(7, 'Pomelo', ''),
(8, 'Naranja', ''),
(9, 'Free sin azúcar', ''),
(10, 'Mineral', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

DROP TABLE IF EXISTS `sede`;
CREATE TABLE IF NOT EXISTS `sede` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `domicilio` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id`, `nombre`, `domicilio`) VALUES
(1, 'Pocito', 'Marcos Salazar 50 oeste'),
(2, 'Media Agua', 'Torrent 51 sur');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apellido` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_rol` int NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `email`, `password`, `id_rol`, `Timestamp`, `activo`) VALUES
(72, 'Andrea', 'Flores', 'and@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '2021-05-25 12:42:02', ''),
(73, 'Javier ', 'Mostazo', 'javi@javi.com', '202cb962ac59075b964b07152d234b70', 2, '2021-05-25 12:45:00', ''),
(75, 'Cristian', 'Reca', 'cristian@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2021-05-25 13:42:37', ''),
(77, 'Mario', 'Estrella', 'mario@mario.com', '202cb962ac59075b964b07152d234b70', 3, '2021-05-31 22:55:53', ''),
(87, 'dfa', 'fad', 'fdasf@dfasd.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, '2021-06-02 00:08:39', ''),
(88, 'fadsf', 'dfaasd', 'fadsf@dfa.com', '048664c119ec4c57c625b0e0283f0bf9', 0, '2021-06-02 00:09:31', ''),
(91, 'DFASD', 'DFA', 'D@FDASF.COM', '618bd1d295599e46937ee2e6b76cb7c4', 0, '2021-06-02 00:27:12', ''),
(92, 'Fernando ', 'Molla', 'molla@hotmail.com', 'd0fc11a75fa2999dec45162de4f2bf79', 6, '2021-06-02 10:24:27', ''),
(94, 'Rodrigo', 'Doncell', 'rodgi@gmail.com', 'd0fc11a75fa2999dec45162de4f2bf79', 4, '2021-06-10 01:49:21', ''),
(95, 'Mauricio', 'Maldonado', 'mauri@eflores.com.ar', 'b0c09409dc6113b210c1ed5f43824355', 1, '2021-06-10 01:50:07', ''),
(96, 'Yesica', 'Ortiz', 'yesica@gmail.com', 'd0fc11a75fa2999dec45162de4f2bf79', 5, '2021-06-10 01:50:52', ''),
(97, 'Omar', 'Chaparro', 'omar@live.com', 'd0fc11a75fa2999dec45162de4f2bf79', 0, '2021-06-10 01:51:20', ''),
(98, 'Omar', 'Chaparro', 'omar@live.com.ar', '2197d721bd28a3d0f01d876a90c1e714', 0, '2021-06-10 01:51:43', ''),
(99, 'Omar', 'Chaparro', 'omar@gmail.com', 'd0fc11a75fa2999dec45162de4f2bf79', 5, '2021-06-10 01:52:08', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

DROP TABLE IF EXISTS `vendedor`;
CREATE TABLE IF NOT EXISTS `vendedor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `domicilio` varchar(30) NOT NULL,
  `telefono` varchar(18) NOT NULL,
  `rol` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`id`, `nombre`, `apellido`, `email`, `domicilio`, `telefono`, `rol`) VALUES
(1, 'Alejandro', 'Guardia', 'ale@live.com', 'Gral Acha 737 s', '2545556546', 5),
(2, 'Maxi', 'Mari', 'maxi@gmail.com', 'Aberastain 123 sur', '2644834132', 5),
(3, 'Anibal', 'Martinez', 'anibal@gmail.com', 'Mendoza 153 sur', '2644837832', 5),
(4, 'Yesica', 'Ortiz', 'yesi@hotmail.com', 'Calle 12 y ruta 40', '2644887765', 5),
(5, 'Omar', 'Chaparro', 'gonzi@live.com.ar', 'Gral Acha 99 sur', '2645888763', 5),
(6, 'Jorge', 'Godoy', 'jog5454@gmail.com', 'Uruguay 535 norte', '2646536785', 5),
(7, 'Pedro', 'Marin', 'maring@hotmail.com', 'Libertador 5435 este', '2645332218', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona_entrega`
--

DROP TABLE IF EXISTS `zona_entrega`;
CREATE TABLE IF NOT EXISTS `zona_entrega` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `id_vendedor` int NOT NULL,
  `id_camion` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `zona_entrega`
--

INSERT INTO `zona_entrega` (`id`, `nombre`, `id_vendedor`, `id_camion`) VALUES
(1, 'Pocito_Norte', 1, 2),
(2, 'Pocito_Sur', 2, 1),
(3, 'Pedernal_Sarmiento', 1, 2),
(4, 'Sarmiento_Centrol', 2, 2),
(5, 'Pocito_Centro', 4, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
