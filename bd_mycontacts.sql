-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2017 a las 16:27:11
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_mycontacts`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contacto`
--

CREATE TABLE `tbl_contacto` (
  `cont_id` int(3) NOT NULL,
  `cont_nombre` varchar(20) NOT NULL,
  `cont_apellido` varchar(20) NOT NULL,
  `cont_email` varchar(30) NOT NULL,
  `cont_telefono` int(9) NOT NULL,
  `cont_foto` varchar(50) NOT NULL,
  `cont_direccion1` varchar(50) NOT NULL,
  `cont_direccion2` varchar(50) NOT NULL,
  `cont_cumpleaños` date NOT NULL,
  `cont_notas` varchar(50) NOT NULL,
  `usu_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_contacto`
--

INSERT INTO `tbl_contacto` (`cont_id`, `cont_nombre`, `cont_apellido`, `cont_email`, `cont_telefono`, `cont_foto`, `cont_direccion1`, `cont_direccion2`, `cont_cumpleaños`, `cont_notas`, `usu_id`) VALUES
(1, 'marc', 'petit', 'mpetit92@gmail.com', 636388745, 'img/mpetit.png', 'plaça de les palmeres num. 2 ', 'av. mare de deu belvitge', '1992-09-16', 'Esto es una nota', 2),
(2, 'Eric', 'Petit', 'eric@gmail.com', 67628655, 'img/epetit', 'plaça de les palmeres num. 2', 'av. mare de deu belvitge', '1994-02-18', 'hola!!!', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `usu_id` int(3) NOT NULL,
  `usu_nombre` varchar(20) NOT NULL,
  `usu_password` varchar(8) NOT NULL,
  `usu_email` varchar(50) NOT NULL,
  `usu_foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`usu_id`, `usu_nombre`, `usu_password`, `usu_email`, `usu_foto`) VALUES
(1, 'mpetit', '12345', 'mpetit92@gmail.com', 'img/mpetit.png'),
(2, 'epetit', '12345', 'epetit@gmail.com', 'img/epetit.png'),
(3, 'admin', 'admin', 'admin@email.com', 'img/admin.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_contacto`
--
ALTER TABLE `tbl_contacto`
  ADD PRIMARY KEY (`cont_id`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_contacto`
--
ALTER TABLE `tbl_contacto`
  MODIFY `cont_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `usu_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


ALTER TABLE `tbl_contacto`

  ADD CONSTRAINT `FK_usu_id` FOREIGN KEY (`usu_id`) REFERENCES `tbl_usuario` (`usu_id`);