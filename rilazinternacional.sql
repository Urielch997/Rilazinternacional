-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-04-2020 a las 02:45:02
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rilazinternacional`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivospublicados`
--

DROP TABLE IF EXISTS `archivospublicados`;
CREATE TABLE IF NOT EXISTS `archivospublicados` (
  `idArchivo` int(11) NOT NULL AUTO_INCREMENT,
  `publicacion` int(11) DEFAULT NULL,
  `ruta` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `type` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`idArchivo`),
  KEY `archivos_publicacion_fk` (`publicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `archivospublicados`
--

INSERT INTO `archivospublicados` (`idArchivo`, `publicacion`, `ruta`, `type`) VALUES
(1, 1, '1.png', 'title'),
(2, 2, '2.png', 'title'),
(3, 3, '3.jfif', 'title'),
(4, 4, '4.png', 'title'),
(5, 5, '4.png', 'title'),
(6, 6, '3.jfif', 'title');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

DROP TABLE IF EXISTS `equipos`;
CREATE TABLE IF NOT EXISTS `equipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(100) NOT NULL,
  `pdf` varchar(100) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `estado_MFP` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `imagen`, `pdf`, `titulo`, `tipo`, `marca`, `estado_MFP`) VALUES
(86, 'MS321dn.png', 'MS321.pdf', 'LEXMARK MS321dn', '1', 'Lexmark', 1),
(87, '506.jpg', 'e-Studio506es.pdf', 'TOSHIBA 506', '1', 'Toshiba', 1),
(88, '5008A.jpg', 'e-Studio5008Aes.pdf', 'TOSHIBA 5008A', '1', 'Toshiba', 1),
(90, '5005AC.jpg', 'e-Studio5005ACen.pdf', 'TOSHIBA 5005AC', '2', 'Toshiba', 2),
(91, '5055C.jpg', 'e-Studio5055Ces.pdf', 'TOSHIBA 5055C', '2', 'Toshiba', 2),
(92, '1207.jpg', 'e-Studio1207en.pdf', 'TOSHIBA 1207', '1', 'Toshiba', 2),
(93, 'MS421dn.png', 'MS421dn.pdf', 'LEXMARK MS421dn', '1', 'Lexmark', 1),
(94, 'MS521dn.png', 'MS521dn.pdf', 'LEXMARK MS521dn', '1', 'Lexmark', 1),
(95, 'MS621dn.png', 'MS621dn.pdf', 'LEXMARK MS621dn', '1', 'Lexmark', 1),
(96, 'MS622de.png', 'MS622de.pdf', 'LEXMARK MS622de', '1', 'Lexmark', 1),
(97, 'MX321adn.png', 'MX321.pdf', 'LEXMARK MX321adn', '1', 'Lexmark', 1),
(98, 'MX421ade.png', 'MX421.pdf', 'LEXMARK MX421ade', '1', 'Lexmark', 2),
(99, 'CS725.jpg', 'CS725es.pdf', 'LEXMARK CS725', '2', 'Lexmark', 1),
(100, 'CS820.jpg', 'CS820en.pdf', 'LEXMARK CS820', '2', 'Lexmark', 1),
(101, 'CX825.jpg', 'CX825es.pdf', 'LEXMARK CX825', '2', 'Lexmark', 1),
(102, 'CX860.jpg', '', 'CX860', '2', 'Lexmark', 1),
(103, 'M5170.jpg', '', 'M5170', '1', 'Lexmark', 1),
(104, 'MS610.jpg', '', 'MS610', '1', 'Lexmark', 1),
(105, 'MS810.jpg', '', 'MS810', '1', 'Lexmark', 1),
(106, 'MX410.jpg', '', 'MX410', '1', 'Lexmark', 1),
(107, 'MX711.jpg', '', 'MX711', '1', 'Lexmark', 1),
(108, 'XM3150.jpg', '', 'XM3150', '1', 'Lexmark', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hingreso`
--

DROP TABLE IF EXISTS `hingreso`;
CREATE TABLE IF NOT EXISTS `hingreso` (
  `idusuario` int(11) DEFAULT NULL,
  `fechaIngreso` datetime DEFAULT NULL,
  KEY `hIngreso_Usuario_Fk` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hingreso`
--

INSERT INTO `hingreso` (`idusuario`, `fechaIngreso`) VALUES
(1, '2020-02-07 09:55:34'),
(2, '2020-02-07 10:10:54'),
(1, '2020-02-07 01:38:19'),
(1, '2020-02-07 01:43:00'),
(7, '2020-02-07 01:44:09'),
(2, '2020-02-07 01:44:23'),
(1, '2020-02-07 01:44:33'),
(1, '2020-02-07 01:49:57'),
(1, '2020-02-07 01:51:47'),
(1, '2020-02-07 01:53:31'),
(7, '2020-02-07 01:55:16'),
(1, '2020-02-07 01:56:07'),
(3, '2020-02-07 01:56:53'),
(7, '2020-02-07 02:08:38'),
(7, '2020-02-07 02:12:25'),
(1, '2020-02-07 02:16:57'),
(1, '2020-02-07 02:33:32'),
(1, '2020-02-07 02:34:18'),
(1, '2020-02-07 02:37:48'),
(1, '2020-02-07 02:39:18'),
(9, '2020-02-07 02:40:11'),
(1, '2020-02-07 02:40:26'),
(1, '2020-02-07 04:38:03'),
(1, '2020-02-07 04:39:16'),
(2, '2020-02-07 04:39:33'),
(1, '2020-02-07 04:41:16'),
(1, '2020-02-08 09:39:39'),
(1, '2020-02-08 11:29:32'),
(3, '2020-02-08 11:37:30'),
(1, '2020-02-08 11:39:31'),
(3, '2020-02-08 11:40:33'),
(9, '2020-02-08 11:41:49'),
(1, '2020-02-11 08:00:57'),
(7, '2020-02-11 08:24:11'),
(1, '2020-02-11 08:25:13'),
(7, '2020-02-12 09:09:46'),
(1, '2020-02-12 09:10:37'),
(2, '2020-02-12 09:16:48'),
(1, '2020-02-12 09:17:49'),
(1, '2020-02-12 09:20:22'),
(1, '2020-02-12 03:25:31'),
(1, '2020-02-12 03:28:12'),
(1, '2020-02-12 03:44:57'),
(1, '2020-02-12 03:49:58'),
(1, '2020-02-12 03:54:49'),
(2, '2020-02-12 04:14:20'),
(1, '2020-02-12 04:17:54'),
(1, '2020-02-12 04:25:38'),
(1, '2020-02-12 04:52:43'),
(1, '2020-02-12 04:59:20'),
(1, '2020-02-12 05:00:38'),
(1, '2020-02-13 07:44:29'),
(1, '2020-02-13 04:20:58'),
(1, '2020-02-19 11:43:57'),
(1, '2020-02-19 02:41:09'),
(1, '2020-02-20 08:01:51'),
(1, '2020-02-20 11:26:12'),
(1, '2020-02-21 02:03:01'),
(1, '2020-02-21 04:26:57'),
(1, '2020-02-21 04:28:14'),
(1, '2020-02-21 04:32:49'),
(1, '2020-02-21 04:34:45'),
(1, '2020-02-21 04:36:57'),
(1, '2020-02-21 04:42:40'),
(1, '2020-02-21 04:44:35'),
(1, '2020-02-21 04:49:52'),
(1, '2020-02-21 04:53:29'),
(1, '2020-02-24 11:46:53'),
(1, '2020-02-24 04:32:41'),
(1, '2020-02-24 04:39:00'),
(1, '2020-02-26 04:57:27'),
(1, '2020-02-26 04:57:34'),
(1, '2020-02-26 05:04:57'),
(1, '2020-02-26 05:06:41'),
(1, '2020-02-27 07:42:03'),
(1, '2020-02-27 07:47:37'),
(1, '2020-02-27 11:09:13'),
(1, '2020-02-27 11:17:25'),
(1, '2020-02-27 11:29:05'),
(1, '2020-02-27 11:31:12'),
(1, '2020-02-27 01:18:41'),
(1, '2020-02-27 02:36:20'),
(1, '2020-02-27 03:51:24'),
(1, '2020-02-27 04:00:35'),
(1, '2020-02-27 04:08:01'),
(1, '2020-02-27 04:09:40'),
(1, '2020-02-28 08:27:48'),
(1, '2020-02-28 02:33:03'),
(1, '2020-02-28 03:00:21'),
(1, '2020-02-28 03:57:01'),
(1, '2020-02-29 08:52:36'),
(1, '2020-02-29 08:57:40'),
(1, '2020-02-29 09:37:35'),
(1, '2020-02-29 09:46:54'),
(1, '2020-02-29 10:56:40'),
(1, '2020-03-06 02:37:43'),
(1, '2020-03-06 02:54:00'),
(1, '2020-03-06 02:57:26'),
(1, '2020-03-07 08:35:16'),
(1, '2020-03-07 09:04:41'),
(1, '2020-03-07 09:18:07'),
(1, '2020-03-07 11:20:12'),
(1, '2020-03-07 11:20:24'),
(1, '2020-03-07 11:21:42'),
(1, '2020-03-07 11:22:12'),
(1, '2020-03-12 10:56:12'),
(1, '2020-03-12 11:11:56'),
(1, '2020-03-12 11:12:48'),
(1, '2020-03-12 11:16:50'),
(1, '2020-03-12 11:21:33'),
(1, '2020-03-12 11:24:34'),
(1, '2020-03-12 11:30:42'),
(1, '2020-03-12 01:34:54'),
(1, '2020-03-12 01:42:50'),
(1, '2020-03-12 01:43:20'),
(1, '2020-03-12 01:44:40'),
(1, '2020-03-12 02:00:05'),
(1, '2020-03-12 02:28:05'),
(1, '2020-03-12 03:16:59'),
(1, '2020-03-12 04:49:51'),
(1, '2020-03-12 05:00:37'),
(1, '2020-03-12 05:01:02'),
(1, '2020-03-13 11:21:19'),
(1, '2020-03-13 04:57:31'),
(1, '2020-03-14 09:54:19'),
(1, '2020-03-14 09:54:51'),
(1, '2020-03-14 10:10:32'),
(1, '2020-03-20 08:51:07'),
(1, '2020-03-20 03:38:08'),
(1, '2020-03-31 11:11:13'),
(1, '2020-03-31 11:21:12'),
(1, '2020-03-31 11:34:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE IF NOT EXISTS `marca` (
  `idMarca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `nombre`) VALUES
(1, 'TOSHIBA'),
(2, 'LEXMARK'),
(3, 'CANON'),
(4, 'HP'),
(5, 'KYOSERA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `idPerfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idPerfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `nombre`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'BASICO'),
(3, 'INVITADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

DROP TABLE IF EXISTS `publicacion`;
CREATE TABLE IF NOT EXISTS `publicacion` (
  `idPublicacion` int(11) NOT NULL AUTO_INCREMENT,
  `tipocontenido` int(11) DEFAULT NULL,
  `marca` int(11) DEFAULT NULL,
  `titulo` varchar(150) CHARACTER SET utf8mb4 DEFAULT NULL,
  `footer` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `contenido` varchar(500) DEFAULT NULL,
  `contenido2` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`idPublicacion`),
  KEY `tipoContenido_publicacion_fk` (`tipocontenido`),
  KEY `marca_publicacion_fk` (`marca`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`idPublicacion`, `tipocontenido`, `marca`, `titulo`, `footer`, `fecha`, `contenido`, `contenido2`) VALUES
(1, 2, 1, 'PAPERCUT', 'Potencia tu entorno de impresión', '2020-01-08', 'ipisicing elit. Explicabo praesentium vel minus nam? Reiciendis expedita et veritatis modi asperiores dolor enim adipisci aspernatur assumenda distinctio molestias minima, corporis ea cupiditate eum illum natus minus voluptatibus facilis veniam facere, excepturi inventore. Molestias quo, provident quam tempore explicabo a animi dignissimos quibusdam vel adipisci incidunt deleniti suscipit ea. Aliquid nulla adipisci magnam molestiae, odit expedita neque, veritatis mollitia, incidunt vero a quos o', 'Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, \"consecteur\", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de \"de Finnibus Bonorum et Malorum\" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", viene de una linea en la sección 1.10.32\r\n\r\nEl trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.'),
(2, 2, 2, 'PRINT AUDIT', ' solución de administración de usuarios de impresión', '2020-01-10', 'Auditoría de impresión Gestión de usuarios\r\n', 'Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, \"consecteur\", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de \"de Finnibus Bonorum et Malorum\" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", viene de una linea en la sección 1.10.32\r\n\r\nEl trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.'),
(3, 2, 3, 'CaptureOnTouch Pro', 'Escanee y organice de forma eficaz lotes de documentos', '2020-01-08', '\r\nEl software de escaneo rápido, fiable e intuitivo de Canon.', 'Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, \"consecteur\", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de \"de Finnibus Bonorum et Malorum\" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", viene de una linea en la sección 1.10.32\r\n\r\nEl trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.'),
(4, 2, 4, 'HP Access Control\r\nJob Accounting', 'Rastree la actividad, administre costos y restaure el control', '2020-01-02', 'Contabilidad de trabajos de control de acceso de HP, una solución JetAdvantage hace que sea fácil rastrear y recopilar datos con precisión', 'Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, \"consecteur\", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de \"de Finnibus Bonorum et Malorum\" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", viene de una linea en la sección 1.10.32\r\n\r\nEl trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.'),
(5, 1, 4, 'Hp HardWare publicacion', 'Publicacion de Hardware', '2020-01-14', 'Esta es la unica publicacion que se le debe mostrar en el Perfil de Administrador', 'Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, \"consecteur\", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de \"de Finnibus Bonorum et Malorum\" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", viene de una linea en la sección 1.10.32\r\n\r\nEl trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.'),
(6, 1, 3, 'hardware publicacion canon', 'efdgerthyer', '2020-01-14', 'ertyertyertyerty', 'Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, \"consecteur\", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de \"de Finnibus Bonorum et Malorum\" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", viene de una linea en la sección 1.10.32\r\n\r\nEl trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restricciones`
--

DROP TABLE IF EXISTS `restricciones`;
CREATE TABLE IF NOT EXISTS `restricciones` (
  `idConfig` int(11) NOT NULL AUTO_INCREMENT,
  `identificador` varchar(100) DEFAULT NULL,
  `perfil` int(11) DEFAULT NULL,
  `idTabla` int(11) DEFAULT NULL,
  PRIMARY KEY (`idConfig`)
) ENGINE=InnoDB AUTO_INCREMENT=472 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `restricciones`
--

INSERT INTO `restricciones` (`idConfig`, `identificador`, `perfil`, `idTabla`) VALUES
(457, 'tipocontenido', 3, 2),
(458, 'marca', 3, 5),
(468, 'marca', 2, 2),
(469, 'marca', 2, 3),
(470, 'marca', 2, 4),
(471, 'marca', 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocontenido`
--

DROP TABLE IF EXISTS `tipocontenido`;
CREATE TABLE IF NOT EXISTS `tipocontenido` (
  `idTipoContenido` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idTipoContenido`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipocontenido`
--

INSERT INTO `tipocontenido` (`idTipoContenido`, `nombre`) VALUES
(1, 'HARDWARE'),
(2, 'SOFTWARE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `Perfil` int(11) DEFAULT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `pass` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `direccion` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `numeroTelefono` varchar(60) CHARACTER SET utf8mb4 DEFAULT NULL,
  `correoElectronico` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `estado` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `Perfil_Usuario_FK` (`Perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `Perfil`, `nombre`, `username`, `pass`, `direccion`, `numeroTelefono`, `correoElectronico`, `estado`) VALUES
(1, 1, 'Admin', 'admin', '123', 'RILAZ SA DE CV ', '78826040 ', 'admin@gmail.com', 'ACTIVO'),
(2, 2, 'DANIEL BERMUDEZ', 'SOCRATES', 'SOCRATES', 'RILAZ SA DE CV', '78554578', 'SOCRATES@GMAIL.COM', ''),
(3, 1, 'URIEL HERNANDEZ', 'uriel', 'uriel', 'rilaz', '455464', 'exito@gmail.com', 'INACTIVO'),
(7, 3, 'Geovani', 'geo', 'geo', 'Colonia 5', '78826040', 'Correo@gmail.com', 'INACTIVO'),
(9, 3, 'OSCAR', 'OSCAR', '123456', 'HFKDJJKLS', '25365519', 'soluciones@rilaz.com.sv', 'INACTIVO'),
(10, 1, 'Daniel', 'asdas', 'sakdasj', 'daksd', 'dkj', 'djkaskljd', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivospublicados`
--
ALTER TABLE `archivospublicados`
  ADD CONSTRAINT `archivos_publicacion_fk` FOREIGN KEY (`publicacion`) REFERENCES `publicacion` (`idPublicacion`);

--
-- Filtros para la tabla `hingreso`
--
ALTER TABLE `hingreso`
  ADD CONSTRAINT `hIngreso_Usuario_Fk` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`);

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `marca_publicacion_fk` FOREIGN KEY (`marca`) REFERENCES `marca` (`idMarca`),
  ADD CONSTRAINT `tipoContenido_publicacion_fk` FOREIGN KEY (`tipocontenido`) REFERENCES `tipocontenido` (`idTipoContenido`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `Perfil_Usuario_FK` FOREIGN KEY (`Perfil`) REFERENCES `perfil` (`idPerfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
