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
  `cont_telefono1` int(10) NOT NULL,
  `cont_telefono2` int(10) NOT NULL,
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

INSERT INTO `tbl_contacto` (`cont_id`, `cont_nombre`, `cont_apellido`, `cont_email`, `cont_telefono1`, `cont_telefono2`, `cont_foto`, `cont_direccion1`, `cont_direccion2`, `cont_cumpleaños`, `cont_notas`, `usu_id`) VALUES
(1, 'marc', 'petit', 'mpetit92@gmail.com', 636388745, 936573788, 'img/mpetit.png', 'plaça de les palmeres num. 2 ', 'av. mare de deu belvitge', '1992-09-16', 'Esto es una nota', 2),
(2, 'Eric', 'Petit', 'eric@gmail.com', 67628655, 936373888, 'img/epetit', 'plaça de les palmeres num. 2', 'av. mare de deu belvitge', '1994-02-18', 'hola!!!', 1);

INSERT INTO `tbl_contacto` (`cont_id`,`cont_nombre`,`cont_apellido`,`cont_email`,`cont_telefono1`,`cont_telefono2`,`cont_foto`,`cont_direccion1`,`cont_direccion2`,`cont_cumpleaños`,`usu_id`) 
VALUES 
(NULL,"Thaddeus","Stuart","Mauris.vel@eusem.ca","804635263","572635065","7","Torrent de Olla, 219 08012 Barcelona","Blind River","1994-08-11",2),
(NULL,"Brock","Howe","sagittis.semper@placerategetvenenatis.net","305717080","227174950","5","Passeig de Gràcia, 48 08007 Barcelona","Verrebroek","1994-08-04",4),
(NULL,"Herrod","Hines","non@natoquepenatibuset.edu","738636980","745112807","9"," C/Les Glories Esq. C/ Llacunna, 155","Chartres","1994-12-12",2),
(NULL,"Channing","Spence","mauris@facilisiSed.net","433104586","130983953","19","Paseo Potosí, 2","Vancouver","1994-12-04",1),
(NULL,"Quintessa","Maynard","urna@ullamcorperviverraMaecenas.co.uk","265804966","653348226","47","Ctra. Nacional II, Km. 588","Cabo de Hornos","1994-06-10",6),
(NULL,"Leroy","Rich","diam@cursusnonegestas.net","842570114","355681938","41","Ctra. Manresa A Berga, Km. 1","Price","1994-12-10",8),
(NULL,"Gil","Church","ac.urna@dis.org","849542038","170610958","47","Avda. Barcelona, 41-49","Giustino","1994-03-02",5),
(NULL,"Ulysses","Harvey","sociis.natoque.penatibus@urnanecluctus.ca","948365494","549806050","13","C/ La Llotja, 6","Andacollo","1994-04-07",1),
(NULL,"Tarik","Norman","Mauris@egetdictumplacerat.co.uk","066404230","913847291","33","C/ CONSELL DE CENT, 366","Hijuelas","1994-08-11",5),
(NULL,"Nora","Bowman","montes.nascetur.ridiculus@sagittissemper.edu","250855678","633986791","25","C/ MALLORCA, 135","Schulen","1994-07-06",9);

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
(3,"Dieter","7979","Phasellus.nulla@elementumategestas.ca","4.jpg"),
(4,"Palmer","3106","sed@velfaucibusid.net","6.jpg"),
(5,"Quamar","2731","eu.lacus.Quisque@ullamcorper.edu","3.jpg"),
(6,"Mannix","9750","dignissim@facilisisvitae.com","4.jpg"),
(7,"Macon","8381","non.cursus@eros.ca","6.jpg"),
(8,"Silas","6890","bibendum@risusatfringilla.org","1.jpg"),
(9,"Nicholas","6554","luctus@eget.com","9.jpg"),
(10,"Macon","5080","tellus.Aenean.egestas@rutrum.co.uk","6.jpg");

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