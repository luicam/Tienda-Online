-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2021 a las 20:14:57
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
(1, 'BATTLE ROYALE', 'En inglés, battle royale, algunas veces referido en español como batalla real, ​​​ es un género de videojuegos que combina los elementos de un videojuego de supervivencia con la jugabilidad de un último jugador en pie.'),
(2, 'RPG', 'Se trata de un juego que lleva a los participantes a asumir un rol o papel, interpretando a un personaje. De este modo los jugadores se desenvuelven en historias ficticias que se van construyendo a partir de las decisiones que toman los distintos par'),
(3, 'acción-aventura', 'Un videojuego de acción-aventura, también llamado videoaventura, es un videojuego que combina elementos del género aventura con elementos del género acción.'),
(4, 'SHOOTER', 'Los videojuegos de disparos, tiros o shooters conforman un género que engloba un amplio número de subgéneros que tienen la característica común de permitir controlar un personaje que, por norma general, dispone de un arma (mayoritariamente de fuego) '),
(5, 'SANDBOX', 'El sandbox en un modo o género de videojuegos en el que el protagonista puede ir realizando las misiones o cumplir los objetivos que desee a su gusto sin seguir ningún orden establecido. En estos videojuegos podemos encontrar un mundo abierto con un '),
(6, 'lucha', 'Un videojuego de lucha, pelea o combate, es un videojuego que se basa en manejar un luchador o un grupo de luchadores, ya sea dando golpes, usando poderes mágicos o armas (incluyendo las de fuego), arrojando objetos o aplicando llaves. Este género se'),
(7, 'simulación', 'Los videojuegos de simulación son videojuegos que intentan recrear situaciones de la vida real. Los videojuegos de simulación reproducen sensaciones que en realidad no están sucediendo.'),
(8, 'deportes', 'En general, los deportes virtuales son recreaciones visuales de eventos deportivos derivados de deportes de fantasía e inspirados en eventos deportivos reales. ... Esa es la razón por la que podemos clasificar este tipo de juegos en algún lugar entre'),
(9, 'terror', 'El horror o terror es un género literario que se define por la sensación que causa: miedo. Nöel Carroll en su libro The Philosophy of Horror explica que la característica más importante del género horror es el efecto del que se causa en la audiencia,');

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
(1, 1),
(3, 14);

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
(1, 1, 1, 0),
(2, 14, 1, 0);

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
(1, 1, '2021-05-02', 1),
(2, 1, '2021-05-30', 3);

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
(1, 'CALL OF DUTY WAR ZONE', 'Call of Duty: Warzone es un videojuego de disparos en primera persona, perteneciente al Battle royale gratuito, lanzado el 10 de marzo de 2020 para PlayStation 4, Xbox One y Microsoft Windows.', 20, 99, 'upload/juegos/codwz.jpg', 1),
(2, 'PlayerUnknown\'s Battlegrounds', 'PlayerUnknown\'s Battlegrounds (estilizado como PUBG) es un videojuego de batalla en línea multijugador masivo desarrollado por Brendan Greene y publicado por Bluehole para Microsoft Windows, Xbox One, PlayStation 4, Android e iOS.', 20, 30, 'upload/juegos/pubg.jpg', 1),
(3, 'Microsoft Flight Simulator', 'Microsoft Flight Simulator es una serie de simuladores de vuelo creada por SubLOGIC en 1979 pero comercializada por Microsoft desde 1982.', 99, 60, 'upload/juegos/fs.jpg', 7),
(4, 'Mortal Kombat 11', 'Mortal Kombat 11 es un videojuego de lucha desarrollado por NetherRealm Studios y publicado por Warner Bros. Interactive Entertainment. Se ejecuta en una versión muy modificada de Unreal Engine 3, ​ es la undécima entrega principal de la serie Mortal', 60, 10, 'upload/juegos/mk11.jpg', 6),
(5, 'Tekken 7', 'Tekken 7 es un videojuego de lucha desarrollado y distribuido por Namco Bandai Games. El juego es la séptima entrega principal de la saga Tekken y el primero en utilizar el motor gráfico Unreal Engine. Fue estrenado inicialmente en Japón para máquina', 70, 40, 'upload/juegos/t7.jpg', 6),
(6, 'FORNITE', 'Fortnite es un videojuego del año 2017 desarrollado por la empresa Epic Games, lanzado como diferentes paquetes de software que presentan diferentes modos de juego, pero que comparten el mismo motor de juego y mecánicas. Fue anunciado en los Spike Vi', 20, 55, 'upload/juegos/f.jpg', 1),
(7, 'SS: Kill the Justice League', 'Suicide Squad: Kill the Justice League es un videojuego desarrollado por Rocksteady Studios, y distribuido por Warner Bros. Interactive Entertainment, para las plataformas PlayStation 5, Xbox Series X|S y Microsoft Windows, basado en el equipo de los', 99, 99, 'upload/juegos/sqkjl.jpg', 3),
(8, 'Cyberpunk 2077', 'Cyberpunk 2077 es un videojuego desarrollado y publicado por CD Projekt, que se lanzó para Microsoft Windows, PlayStation 4, y Xbox One el 10 de diciembre de 2020, y posteriormente en PlayStation 5, Xbox Series X|S y Google Stadia.', 79, 50, 'upload/juegos/cp.jpg', 2),
(9, 'Baldur\'s Gate 3', 'Baldur\'s Gate III es un próximo videojuego de rol que está siendo desarrollado y publicado por Larian Studios. Es el tercer juego principal de la serie Baldur\'s Gate, basado en el sistema de rol de mesa Dungeons & Dragons.', 50, 80, 'upload/juegos/bg.jpg', 2),
(10, 'Red Dead Redemption 2', 'Red Dead Redemption 2 es un videojuego de acción-aventura western, en un mundo abierto y en perspectiva de primera y tercera persona, ​ con componentes para un jugador y multijugador.​ Fue desarrollado por Rockstar Games. Es la precuela de Red Dead R', 70, 12, 'upload/juegos/rdr2.png', 3),
(11, 'Elden Ring', 'Elden Ring será un juego de rol de acción desarrollado por FromSoftware y publicado por Bandai Namco Entertainment. El juego es un esfuerzo de colaboración entre el director del juego Hidetaka Miyazaki y el novelista de fantasía George R. R. Martin.', 80, 99, 'upload/juegos/er.jpg', 3),
(12, 'Grand Theft Auto V', 'Grand Theft Auto V es un videojuego de acción-aventura de mundo abierto desarrollado por el estudio Rockstar North y distribuido por Rockstar Games. Fue lanzado el 17 de septiembre de 2013 para las consolas PlayStation 3 y Xbox 360.​', 20, 50, 'upload/juegos/gta5.jpg', 3),
(13, 'Minecraft', 'Minecraft es un videojuego de mundo abierto donde la exploración y las construcciones son fundamentales. ... Al ser un videojuego de mundo abierto, no tiene una misión concreta (salvo alguno de sus modos de juego) y consiste en la construcción libre ', 10, 20, 'upload/juegos/m.jpg', 5),
(14, 'FIFA 21', 'FIFA 21 es un videojuego de fútbol del año 2020 disponible para Microsoft Windows, PlayStation 4, Xbox One y Nintendo Switch el 9 de octubre de 2020, y también es el primer videojuego de la serie FIFA para PlayStation 5 y Xbox Series X|S. El juego es', 50, 77, 'upload/juegos/fifa.jpg', 8),
(15, 'Super Smash Bros. Ultimate', 'Super Smash Bros. Ultimate es un videojuego de lucha crossover de la serie Super Smash Bros. desarrollada por Bandai Namco Games y Sora Ltd. y publicado por Nintendo. Este salió a la venta para Nintendo Switch a nivel mundial el 7 de diciembre de 201', 60, 66, 'upload/juegos/ssbu.png', 6),
(16, 'Resident Evil Village', 'Resident Evil Village es un videojuego perteneciente al género de horror de supervivencia desarrollado y publicado por Capcom. la novena entrega de la serie principal de Resident Evil y secuela narrativa,', 70, 55, 'upload/juegos/village.jpg', 9),
(17, 'a', 'a', 1, 2, 'upload/juegos/a.jpg', 1);

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
(1, 'attnluismiguel@gmail.com', '4c882dcb24bcb1bc225391a602feca7c', 'luis miguel', 'camacho', 'CALLE PLAYA DE MARBELLA, 2', 1),
(2, 'pepe@gmail.com', '005a65fa2d534dc1c4a5f5994f374879', 'pepe', 'epep', 'CALLE PLAYA DE CONIL, 1', 0),
(3, 'l@l.com', '123', 'l', 'm', 'a', 0);

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
  ADD PRIMARY KEY (`USUARIO_ID_USUARIO`,`PRODUCTO_ID_PRODUCTO`),
  ADD KEY `USUARIO_ID_USUARIO` (`USUARIO_ID_USUARIO`),
  ADD KEY `PRODUCTO_ID_PRODUCTO` (`PRODUCTO_ID_PRODUCTO`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`PEDIDO_ID_PEDIDO`,`PRODUCTO_ID_PRODUCTO`),
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
  ADD PRIMARY KEY (`USUARIO_ID_USUARIO`,`PRODUCTO_ID_PRODUCTO`),
  ADD KEY `USUARIO_ID_USUARIO` (`USUARIO_ID_USUARIO`),
  ADD KEY `PRODUCTO_ID_PRODUCTO` (`PRODUCTO_ID_PRODUCTO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_CATEGORIA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `ID_PEDIDO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_PRODUCTO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
