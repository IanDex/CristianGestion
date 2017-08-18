-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-08-2017 a las 18:29:02
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_pro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aqui`
--

CREATE TABLE `aqui` (
  `dato1` varchar(45) NOT NULL,
  `dato2` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aqui`
--

INSERT INTO `aqui` (`dato1`, `dato2`) VALUES
('1', '12'),
('2', 'name'),
('3', 'dato3'),
('4', 'dato4'),
('5', 'dato5'),
('6', 'dato6'),
('1', '12'),
('2', 'name'),
('4', 'dato4'),
('5', 'dato5'),
('6', 'dato6'),
('1', '12'),
('2', 'name'),
('4', 'dato4'),
('5', 'dato5'),
('6', 'dato6'),
('1', '12'),
('1', '12'),
('1', '12'),
('1', '12'),
('1', '12'),
('2', 'name'),
('3', 'dato3'),
('4', 'dato4'),
('5', 'dato5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `idAs` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` int(2) NOT NULL,
  `N_max` int(2) NOT NULL,
  `H_Inicio` varchar(45) NOT NULL,
  `H_Final` varchar(45) NOT NULL,
  `description` int(11) NOT NULL,
  `ciclo` int(11) NOT NULL,
  `aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`idAs`, `name`, `price`, `N_max`, `H_Inicio`, `H_Final`, `description`, `ciclo`, `aula`) VALUES
(10, 'Calculo', 20, 30, '08:00', '10:00', 26, 7, 3),
(11, '12', 1, 12, '13:01', '13:41', 26, 7, 3),
(12, 'EL Brayan', 15, 30, '06:00', '08:00', 26, 7, 3),
(13, 'Fisica', 15, 30, '10:00', '12:00', 44, 9, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `idAl` int(11) NOT NULL,
  `NombreAl` varchar(45) NOT NULL,
  `Numero` int(5) NOT NULL,
  `Cap` int(2) NOT NULL,
  `Estado` varchar(34) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`idAl`, `NombreAl`, `Numero`, `Cap`, `Estado`) VALUES
(3, 'Ambiente A', 101, 40, 'Activo'),
(4, 'Ambiente B', 30, 39, 'Activo'),
(5, 'Ambiente c', 8, 30, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo`
--

CREATE TABLE `ciclo` (
  `idC` int(10) UNSIGNED NOT NULL,
  `NombreC` varchar(255) NOT NULL,
  `Nivel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciclo`
--

INSERT INTO `ciclo` (`idC`, `NombreC`, `Nivel`) VALUES
(7, 'Temporal', 'Superior'),
(8, 'Prueba', 'medio'),
(9, 'Mecatronica', '124');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclos`
--

CREATE TABLE `ciclos` (
  `idC` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Nivel` varchar(45) DEFAULT NULL,
  `lol` varchar(77) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciclos`
--

INSERT INTO `ciclos` (`idC`, `Nombre`, `Nivel`, `lol`) VALUES
(16654, '26', '11', '13:41 '),
(16655, '26', '10', '10:00 '),
(16656, '26', '10', '10:00 '),
(16657, '26', '11', '13:41 '),
(16658, '26', '11', '13:41 '),
(16659, '26', '11', '13:41 '),
(16660, '26', '11', '13:41 '),
(16661, '10', 'Calculo', 'Calculo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE `fecha` (
  `idF` int(11) NOT NULL,
  `Inicio` varchar(45) NOT NULL,
  `Final` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idHora` int(11) NOT NULL,
  `Asignatura` int(11) NOT NULL,
  `Estudiante` int(11) NOT NULL,
  `Profesor` int(11) NOT NULL,
  `Aula` int(11) NOT NULL,
  `Ciclo` int(11) NOT NULL,
  `Inicio` varchar(10) NOT NULL,
  `Final` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idHora`, `Asignatura`, `Estudiante`, `Profesor`, `Aula`, `Ciclo`, `Inicio`, `Final`) VALUES
(92, 10, 45, 26, 3, 7, '08:00', '10:00'),
(93, 11, 45, 26, 3, 7, '13:01', '13:41'),
(94, 12, 45, 26, 3, 7, '06:00', '08:00'),
(95, 13, 45, 44, 5, 9, '10:00', '12:00'),
(96, 10, 38, 26, 3, 7, '08:00', '10:00'),
(97, 11, 38, 26, 3, 7, '13:01', '13:41'),
(98, 12, 38, 26, 3, 7, '06:00', '08:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `idN` int(11) NOT NULL,
  `N_final` int(2) NOT NULL,
  `P_50` int(2) NOT NULL,
  `S_50` int(2) NOT NULL,
  `Estudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`idN`, `N_final`, `P_50`, `S_50`, `Estudiante`) VALUES
(2, 0, 3, 4, 28),
(6, 0, 4, 2, 36),
(10, 0, 3, 4, 40),
(11, 0, 3, 5, 41),
(12, 0, 3, 2, 42),
(13, 0, 3, 2, 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `idP` int(11) NOT NULL,
  `Nombrepro` varchar(45) NOT NULL,
  `C_min` int(2) NOT NULL,
  `C_max` int(2) NOT NULL,
  `ciclo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`idP`, `Nombrepro`, `C_min`, `C_max`, `ciclo`) VALUES
(1, '452', 2, 2, 7),
(2, '1', 1, 1, 8),
(3, '1', 1, 1, 9),
(4, 'Prueba', 10, 30, 7),
(5, 'Minas', 10, 35, 9),
(8, '000', 11, 11, 11),
(9, '2', 2, 2, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `idP` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `TipoDoc` varchar(5) NOT NULL,
  `Doc` varchar(45) NOT NULL,
  `Tel` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `Profesion` varchar(45) NOT NULL,
  `Seguro` varchar(45) NOT NULL,
  `antig` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `Obser` text NOT NULL,
  `user` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `fecha` varchar(45) NOT NULL,
  `materias` tinyint(1) NOT NULL DEFAULT '1',
  `dato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prueba`
--

INSERT INTO `prueba` (`idP`, `Nombre`, `Apellido`, `TipoDoc`, `Doc`, `Tel`, `email`, `foto`, `Profesion`, `Seguro`, `antig`, `tipo`, `Obser`, `user`, `pass`, `fecha`, `materias`, `dato`) VALUES
(25, 'Cristtian', 'Fabian', 'C.C', '1052413105', '3105517529', 'cristtian799@gmail.com', 'images/user4.png', 'none', 'none', 'none', 'Admin', 'none', 'cristtian', '2017', 'none', 0, 0),
(26, 'Diego', 'Ojeda', 'C.C', '123456789', '123456789', 'diego@gmail.com', '../Vista/images/\'.123456789.avatar2.png', 'Calculo', 'si', '0', 'Profesor', '', '123456789', '123456789', 'Wednesday 01 February 2017', 0, 0),
(27, 'Camilo', 'Robles', 'C.C', '0000', '000000', 'camilo@lol', 'images/0000avatar4.png', 'Aseo', 'no', '5 meses', 'Profesor', '', '0000', '0000', 'Tuesday 01 August 2017', 0, 0),
(31, 'Santiago', '12345', 'T.I', '12345', '12345', 'cristtian799@gmail.com', 'images/12345', 'Algebra', 'sin', '3 meses', 'Profesor', 'okalo', '12345', '12345', 'Saturday 19 August 2017', 0, 0),
(38, 'Fernanda', 'Rojas', 'C.C', '98765', '2554545', 'email.@gmail.com', 'images/thumb-rugter-hauer.jpg', '4', 'none', 'none', 'Estudiante', 'no', '98765', '98765', 'Friday 04 August 2017', 1, 26),
(39, 'JuAn', 'Azcarate', 'T.I', '112233', '23456', 'algocorreo@mail.com', 'images/thumb-kevin-spacey.jpg', '1', 'none', 'none', 'Estudiante', 'jaf', '112233', '112233', 'Friday 04 August 2017', 0, 0),
(40, 'Ana', 'Tibaduiza', 'T.I', '654321', '321456', 'ana@mail.com', 'images/thumb-steve-mcqueen.jpg', '2', 'none', 'none', 'Estudiante', 'df', '654321', '654321', 'Friday 04 August 2017', 0, 0),
(41, 'Nat', 'Salcedo', 'T.I', '889900', '2345678765', 'natalia@gmailcom', 'images/thumb-marlon-brando.jpg', '2', 'none', 'none', 'Estudiante', 'df', '889900', '889900', 'Friday 04 August 2017', 0, 0),
(42, 'Brayan el', 'Cardenas', 'C.C', '334455', '234567', 'elbrayan@gmail.com', 'images/thumb-dustin-hoffman.jpg', '1', 'none', 'none', 'Estudiante', 'we', '334455', '334455', 'Friday 04 August 2017', 0, 0),
(43, 'Leydi', 'Rojas', 'C.C', '2345', '23456', '1234@DFGHJ', 'images/2345thumb-joaquin-phoenix.jpg', 'Economia', '23', '2 mese', 'Profesor', 'ss', '2345', '2345', 'Friday 11 August 2017', 0, 0),
(44, 'Peter', 'Alarcon', 'C.C', '123', '3456756643', 'correo@gmail.com', 'images/123thumb-robert-de-niro.jpg', 'Fisica', 's1', '4 meses', 'Profesor', 'ninguna', '123', '123', 'Friday 04 August 2017', 0, 0),
(45, 'Gustavo', 'Jimenez', 'C.E', '64', '1234567888', 'gj@gmail.com', 'images/thumb-jack-nicholson.jpg', '5', 'none', 'none', 'Estudiante', 'ninguna', '64', '64', 'Friday 04 August 2017', 1, 0),
(46, 'Carlitos', 'Caro', 'C.C', '444447', '3245678', 'asd@gmail.ovcm', 'images/thumb-kevin-spacey.jpg', '5', 'none', 'none', 'Estudiante', 'ninguajn', '444447', '444447', 'Friday 04 August 2017', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`idAs`);

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`idAl`);

--
-- Indices de la tabla `ciclo`
--
ALTER TABLE `ciclo`
  ADD PRIMARY KEY (`idC`);

--
-- Indices de la tabla `ciclos`
--
ALTER TABLE `ciclos`
  ADD PRIMARY KEY (`idC`);

--
-- Indices de la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD PRIMARY KEY (`idF`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idHora`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`idN`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`idP`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`idP`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `idAs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `idAl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ciclo`
--
ALTER TABLE `ciclo`
  MODIFY `idC` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `ciclos`
--
ALTER TABLE `ciclos`
  MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16662;
--
-- AUTO_INCREMENT de la tabla `fecha`
--
ALTER TABLE `fecha`
  MODIFY `idF` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idHora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `idN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
