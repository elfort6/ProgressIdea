-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generaciÃ³n: 14-10-2020 a las 00:25:29
-- VersiÃ³n del servidor: 10.4.13-MariaDB
-- VersiÃ³n de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `progressidea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amonestaciones`
--

CREATE TABLE `amonestaciones` (
  `idAmonestaciones` int(11) NOT NULL,
  `descripcion` varchar(160) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correo`
--

CREATE TABLE `correo` (
  `idCorreo` int(11) NOT NULL,
  `correo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `correo`
--

INSERT INTO `correo` (`idCorreo`, `correo`) VALUES
(71176, 'yeffcode@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimediaproyecto`
--

CREATE TABLE `multimediaproyecto` (
  `idImagenesProyecto` int(11) NOT NULL,
  `rutaImagen` varchar(45) NOT NULL,
  `Proyecto_idProyecto` int(11) NOT NULL,
  `rutaVideo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idRegistro` int(11) NOT NULL,
  `primerNombrel` varchar(45) NOT NULL,
  `segundoNombre` varchar(45) NOT NULL,
  `primerApellido` varchar(45) NOT NULL,
  `segundoApellido` varchar(45) NOT NULL,
  `Correo_idCorreo` int(11) NOT NULL,
  `Telefono_idTelefono` int(11) NOT NULL,
  `numId` varchar(45) NOT NULL,
  `imagen` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `codigoPostal` varchar(45) NOT NULL,
  `fechaNacimiento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idRegistro`, `primerNombrel`, `segundoNombre`, `primerApellido`, `segundoApellido`, `Correo_idCorreo`, `Telefono_idTelefono`, `numId`, `imagen`, `direccion`, `codigoPostal`, `fechaNacimiento`) VALUES
(71176, 'Yefry', 'Aryani', 'Lainez', 'Jobs', 71176, 71176, '0801199615145', 'img', 'Col. Humuya, Casa 1025, Tegucigalpa, Honduras', '0101', '2020-10-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `idProyecto` int(11) NOT NULL,
  `nombreproyecto` varchar(45) NOT NULL,
  `Categoria_idCategoria` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reaccion`
--

CREATE TABLE `reaccion` (
  `Usuario_idUsuario` int(11) NOT NULL,
  `Proyecto_idProyecto` int(11) NOT NULL,
  `comentario` varchar(160) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `like` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sancionproyecto`
--

CREATE TABLE `sancionproyecto` (
  `idSancionProyecto` int(11) NOT NULL,
  `descripcion` varchar(160) DEFAULT NULL,
  `Proyecto_idProyecto` int(11) NOT NULL,
  `administrador_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `idTelefono` int(11) NOT NULL,
  `numeroTelefono` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`idTelefono`, `numeroTelefono`) VALUES
(71176, '+50497894224');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodeusuario`
--

CREATE TABLE `tipodeusuario` (
  `idTipoDeUsuario` int(11) NOT NULL,
  `tipoUsuario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipodeusuario`
--

INSERT INTO `tipodeusuario` (`idTipoDeUsuario`, `tipoUsuario`) VALUES
(71176, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contrasenia` varchar(45) NOT NULL,
  `TipoDeUsuario_idTipoDeUsuario` int(11) NOT NULL,
  `Proyecto_idProyecto` int(11) DEFAULT NULL,
  `Persona_idRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `contrasenia`, `TipoDeUsuario_idTipoDeUsuario`, `Proyecto_idProyecto`, `Persona_idRegistro`) VALUES
(71176, 'yeffcode', '$2y$10$XxphaCQoZwmg7jLVZNvFNOa.AuBQUcyYMXI374', 71176, NULL, 71176);

--
-- Ãndices para tablas volcadas
--

--
-- Indices de la tabla `amonestaciones`
--
ALTER TABLE `amonestaciones`
  ADD PRIMARY KEY (`idAmonestaciones`),
  ADD KEY `fk_Amonestaciones_Usuario1` (`Usuario_idUsuario`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `correo`
--
ALTER TABLE `correo`
  ADD PRIMARY KEY (`idCorreo`);

--
-- Indices de la tabla `multimediaproyecto`
--
ALTER TABLE `multimediaproyecto`
  ADD PRIMARY KEY (`idImagenesProyecto`),
  ADD KEY `fk_ImagenesProyecto_Proyecto1` (`Proyecto_idProyecto`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idRegistro`),
  ADD KEY `fk_RegistroPersonas_Correo` (`Correo_idCorreo`),
  ADD KEY `fk_RegistroPersonas_Telefono1` (`Telefono_idTelefono`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`idProyecto`),
  ADD KEY `fk_Proyecto_Categoria1` (`Categoria_idCategoria`);

--
-- Indices de la tabla `reaccion`
--
ALTER TABLE `reaccion`
  ADD PRIMARY KEY (`Usuario_idUsuario`,`Proyecto_idProyecto`),
  ADD KEY `fk_Usuario_has_Proyecto_Proyecto1` (`Proyecto_idProyecto`);

--
-- Indices de la tabla `sancionproyecto`
--
ALTER TABLE `sancionproyecto`
  ADD PRIMARY KEY (`idSancionProyecto`),
  ADD KEY `fk_SancionProyecto_Proyecto1` (`Proyecto_idProyecto`),
  ADD KEY `fk_SancionProyecto_Usuario1` (`administrador_idUsuario`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`idTelefono`);

--
-- Indices de la tabla `tipodeusuario`
--
ALTER TABLE `tipodeusuario`
  ADD PRIMARY KEY (`idTipoDeUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_Login_TipoDeUsuario1` (`TipoDeUsuario_idTipoDeUsuario`),
  ADD KEY `fk_Usuario_Proyecto1` (`Proyecto_idProyecto`),
  ADD KEY `fk_Usuario_Persona1` (`Persona_idRegistro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `multimediaproyecto`
--
ALTER TABLE `multimediaproyecto`
  MODIFY `idImagenesProyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amonestaciones`
--
ALTER TABLE `amonestaciones`
  ADD CONSTRAINT `fk_Amonestaciones_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `multimediaproyecto`
--
ALTER TABLE `multimediaproyecto`
  ADD CONSTRAINT `fk_ImagenesProyecto_Proyecto1` FOREIGN KEY (`Proyecto_idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_RegistroPersonas_Correo` FOREIGN KEY (`Correo_idCorreo`) REFERENCES `correo` (`idCorreo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RegistroPersonas_Telefono1` FOREIGN KEY (`Telefono_idTelefono`) REFERENCES `telefono` (`idTelefono`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `fk_Proyecto_Categoria1` FOREIGN KEY (`Categoria_idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reaccion`
--
ALTER TABLE `reaccion`
  ADD CONSTRAINT `fk_Usuario_has_Proyecto_Proyecto1` FOREIGN KEY (`Proyecto_idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_has_Proyecto_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sancionproyecto`
--
ALTER TABLE `sancionproyecto`
  ADD CONSTRAINT `fk_SancionProyecto_Proyecto1` FOREIGN KEY (`Proyecto_idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SancionProyecto_Usuario1` FOREIGN KEY (`administrador_idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Login_TipoDeUsuario1` FOREIGN KEY (`TipoDeUsuario_idTipoDeUsuario`) REFERENCES `tipodeusuario` (`idTipoDeUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_Persona1` FOREIGN KEY (`Persona_idRegistro`) REFERENCES `persona` (`idRegistro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_Proyecto1` FOREIGN KEY (`Proyecto_idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
