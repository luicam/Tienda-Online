-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2021 a las 20:08:42
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda online`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_CATEGORIA` int(10) NOT NULL,
  `NOMBRE_CATEGORIA` varchar(25) NOT NULL,
  `DESCRIPCION_CATEGORIA` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_CATEGORIA`, `NOMBRE_CATEGORIA`, `DESCRIPCION_CATEGORIA`) VALUES
(1, 'BATTLE ROYALE', 'En inglés, battle royale, algunas veces referido en español como batalla real, ​​​ es un género de videojuegos que combina los elementos de un videojuego de supervivencia con la jugabilidad de un último jugador en pie.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `USUARIO_ID_USUARIO` int(11) NOT NULL,
  `PRODUCTO_ID_PRODUCTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`USUARIO_ID_USUARIO`, `PRODUCTO_ID_PRODUCTO`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `PEDIDO_ID_PEDIDO` int(10) NOT NULL,
  `PRODUCTO_ID_PRODUCTO` int(10) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `DEVUELTO` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`PEDIDO_ID_PEDIDO`, `PRODUCTO_ID_PRODUCTO`, `CANTIDAD`, `DEVUELTO`) VALUES
(1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `ID_PEDIDO` int(10) NOT NULL,
  `COMPRADO` int(1) NOT NULL,
  `FECHA` date NOT NULL,
  `USUARIO_ID_USUARIO` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`ID_PEDIDO`, `COMPRADO`, `FECHA`, `USUARIO_ID_USUARIO`) VALUES
(1, 1, '2021-05-02', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_PRODUCTO` int(10) NOT NULL,
  `NOMBRE_PRODUCTO` varchar(50) NOT NULL,
  `DESCRIPCION` varchar(250) NOT NULL,
  `PRECIO` double NOT NULL,
  `STOCK` int(10) NOT NULL,
  `IMAGEN` varchar(100) NOT NULL,
  `CATEGORIA_ID_CATEGORIA` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_PRODUCTO`, `NOMBRE_PRODUCTO`, `DESCRIPCION`, `PRECIO`, `STOCK`, `IMAGEN`, `CATEGORIA_ID_CATEGORIA`) VALUES
(1, 'CALL OF DUTY WAR ZONE', 'Call of Duty: Warzone es un videojuego de disparos en primera persona, perteneciente al Battle royale gratuito, lanzado el 10 de marzo de 2020 para PlayStation 4, Xbox One y Microsoft Windows.', 20, 99, './upload/juegos/codwz.jpeg', 1),
(6, 'FORNITE', 'Fortnite es un videojuego del año 2017 desarrollado por la empresa Epic Games, lanzado como diferentes paquetes de software que presentan diferentes modos de juego, pero que comparten el mismo motor de juego y mecánicas. Fue anunciado en los Spike Vi', 20, 55, './upload/juegos/f.jpeg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(10) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `NOMBRE` varchar(25) NOT NULL,
  `APELLIDOS` varchar(25) NOT NULL,
  `DIRECCION` varchar(100) NOT NULL,
  `ADMIN` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `EMAIL`, `PASSWORD`, `NOMBRE`, `APELLIDOS`, `DIRECCION`, `ADMIN`) VALUES
(1, 'attnluismiguel@gmail.com', '4c882dcb24bcb1bc225391a602feca7c', 'luis', 'camacho', 'CALLE PLAYA DE MARBELLA 2', 1),
(2, 'pepe@gmail.com', '005a65fa2d534dc1c4a5f5994f374879', 'pepe', 'perez', 'CALLE PLAYA DE CONIL 1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `COMENTARIO` varchar(1000) NOT NULL,
  `PUNTUACION` int(2) NOT NULL,
  `USUARIO_ID_USUARIO` int(11) NOT NULL,
  `PRODUCTO_ID_PRODUCTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`COMENTARIO`, `PUNTUACION`, `USUARIO_ID_USUARIO`, `PRODUCTO_ID_PRODUCTO`) VALUES
('Me parece un juego maravilloso y bastante completo en la saga de call of duty porque al ser el segundo batle royale de la franquicia mejoraron muchas cosas y una de mis cosas favoritas en este cod es la movilidad el sprint tactico fue una gran inovacion tambien la mayoria de las armas estan balanceadas osea si hay armas mas fuertes que otras pero como unas 6 armas estan casi al mismo nivel y la sensacion de los  momentos epicos en la batalla jugando con tus amigos es epica y mas aun en la final y la sensacion de ganar es legendaria y mas aun si es tu primera win y esa es mi reseña muy buen juego con buena movilidad y buenas armas y gran experiencia el unico defecto que le encuentro son las ratas que usan r9 de fuego y el espacio pero lo demas perfecto.', 10, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD KEY `USUARIO_ID_USUARIO` (`USUARIO_ID_USUARIO`),
  ADD KEY `PRODUCTO_ID_PRODUCTO` (`PRODUCTO_ID_PRODUCTO`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD KEY `PEDIDO_ID_PEDIDO` (`PEDIDO_ID_PEDIDO`),
  ADD KEY `PRODUCTO_ID_PRODUCTO` (`PRODUCTO_ID_PRODUCTO`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ID_PEDIDO`),
  ADD KEY `USUARIO_ID_USUARIO` (`USUARIO_ID_USUARIO`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_PRODUCTO`),
  ADD KEY `CATEGORIA_ID_CATEGORIA` (`CATEGORIA_ID_CATEGORIA`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD KEY `USUARIO_ID_USUARIO` (`USUARIO_ID_USUARIO`),
  ADD KEY `PRODUCTO_ID_PRODUCTO` (`PRODUCTO_ID_PRODUCTO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_CATEGORIA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `ID_PEDIDO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_PRODUCTO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `COMPRA_PRODUCTO_FK` FOREIGN KEY (`PRODUCTO_ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `COMPRA_USUARIO_FK` FOREIGN KEY (`USUARIO_ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `DETALLE_PEDIDO_PEDIDO_FK` FOREIGN KEY (`PEDIDO_ID_PEDIDO`) REFERENCES `pedido` (`ID_PEDIDO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `DETALLE_PEDIDO_PRODUCTO_FK` FOREIGN KEY (`PRODUCTO_ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `PEDIDO_USUARIO_FK` FOREIGN KEY (`USUARIO_ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `PRODUCTO_CATEGORIA_FK` FOREIGN KEY (`CATEGORIA_ID_CATEGORIA`) REFERENCES `categoria` (`ID_CATEGORIA`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `VALORACION_PRODUCTO_FK` FOREIGN KEY (`PRODUCTO_ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `VALORACION_USUARIO_FK` FOREIGN KEY (`USUARIO_ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
