-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2020 a las 00:32:30
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

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
-- Estructura de tabla para la tabla `actualizacionesproyecto`
--

CREATE TABLE `actualizacionesproyecto` (
  `idActualizacion` int(255) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `Proyecto_idProyecto` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`, `descripcion`) VALUES
(1, 'Tecnologia', 'relacionado con software, hardware, robotica,'),
(2, 'Arte', 'relacionado con la expresion de dicipplinas a'),
(3, 'Deporte', 'relacionado con software, hardware, robotica,'),
(4, 'Video Juegos', 'relacionado con la expresion de dicipplinas a'),
(5, 'Comics y Libros', 'relacionado con la literatura'),
(6, 'Animaciones', 'Animacion digital'),
(7, 'Cine', 'Relacionado con peliculas y novelas'),
(8, 'Ciencia', 'relacionado con investigaciones cientificas'),
(9, 'Documentales', 'relacionado con investigaciones y documentale'),
(10, 'Musica', 'relacionado con canto e instrumentos');

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
(26884, 'yefryyo@gmail.com'),
(38576, 'yu@yu.com'),
(80102, 'yu@yu.com'),
(90373, 'yeffcode@gmail.com'),
(91567, 'yunio@yunior.yu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimediaproyecto`
--

CREATE TABLE `multimediaproyecto` (
  `idImagenesProyecto` int(11) NOT NULL,
  `rutaImagen` varchar(255) DEFAULT NULL,
  `Proyecto_idProyecto` int(11) NOT NULL,
  `rutaVideo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `multimediaproyecto`
--

INSERT INTO `multimediaproyecto` (`idImagenesProyecto`, `rutaImagen`, `Proyecto_idProyecto`, `rutaVideo`) VALUES
(1, '../../MultimediaProyectos/yuniorcd/wp6248410.jpg', 51427, NULL),
(2, '../../MultimediaProyectos/yuniorcd/wp5191917.jpg', 89194, NULL),
(3, '../MultimediaProyectos/yeff/compu.jpg', 49531, NULL),
(4, '../MultimediaProyectos/yeff/concepto-del-desarrollo-de-la-programación-web-73959563.jpg', 66325, NULL);

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
  `fechaNacimiento` date NOT NULL,
  `pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idRegistro`, `primerNombrel`, `segundoNombre`, `primerApellido`, `segundoApellido`, `Correo_idCorreo`, `Telefono_idTelefono`, `numId`, `imagen`, `direccion`, `codigoPostal`, `fechaNacimiento`, `pais`) VALUES
(26884, 'Yefry', 'Rolando', 'Ortiz', 'Orellana', 26884, 26884, '0801-1996-15145', 'img', 'Col. San Miguel, calle tocoa casa 5502, Teguc', '504', '2020-10-13', '504'),
(38576, 'Yunior', 'Marel', 'Cerrato', 'Dominguez', 38576, 38576, '12345', 'img', 'yuiyiu, uasyufias', '1234', '2020-10-13', '504'),
(90373, 'Yefry', 'Rolando', 'Ortiz', 'Zero', 90373, 90373, '0801199615145', 'img', 'Col. San Miguel, calle tocoa casa 5502, Teguc', '504', '2020-10-13', '504');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `idProyecto` int(11) NOT NULL,
  `nombreproyecto` varchar(45) NOT NULL,
  `Categoria_idCategoria` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`idProyecto`, `nombreproyecto`, `Categoria_idCategoria`, `descripcion`, `Usuario_idUsuario`) VALUES
(16180, 'Nuevo proeycto', 1, 'dhfgkjsgdj jksdhkfj jkdfs', 38576),
(49531, 'Pulpe Barata App', 2, 'Mejores cerveceria Hondureña.', 26884),
(51427, 'Nuevo proyecto', 3, 'hadf jkdsfhkjdafh sagha', 38576),
(66325, 'PulpeCerca', 1, 'Mas cerca de tu casa', 90373),
(89194, 'Ultima prueba', 9, 'Esta es la ultima prueba antes de dormir', 38576);

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
-- Estructura de tabla para la tabla `recuperacioncuenta`
--

CREATE TABLE `recuperacioncuenta` (
  `	idRecuperacion` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `fechaExpiracion` date NOT NULL,
  `fechaCreacion` date NOT NULL,
  `idUsuario` int(11) NOT NULL
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
(26884, '31958353'),
(38576, '+504 - 621546751'),
(80102, '+504 - 6752125'),
(90373, '31958353'),
(91567, '+504 - 512437');

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
(1, 'Emprendedor'),
(2, 'Patrocinador'),
(3, 'Administrador'),
(4, 'Moderador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `TipoDeUsuario_idTipoDeUsuario` int(11) NOT NULL,
  `Persona_idRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `contrasenia`, `TipoDeUsuario_idTipoDeUsuario`, `Persona_idRegistro`) VALUES
(26884, 'yeff', '$2y$10$8d3ZdymaekYsbFBosyHvp.OibbePK/WpKxMX/N8nxr7DXW/I2mOTG', 1, 26884),
(38576, 'yuniorcd', '$2y$10$gXPzKiaP5Ay2hLPVafvQneIbXARPIWXOmxD2BcThznHrrMd11zuiO', 1, 38576),
(90373, 'yeff', '$2y$10$cQFYcnZXRWaxI1mL.N9cfucX0F9l.aoxLWfJdUgZIeqFrz4wu8Knu', 1, 90373);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actualizacionesproyecto`
--
ALTER TABLE `actualizacionesproyecto`
  ADD PRIMARY KEY (`idActualizacion`),
  ADD KEY `fk_actualizacionesproyecto_idProyecto` (`Proyecto_idProyecto`);

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
  ADD KEY `fk_Proyecto_Categoria1` (`Categoria_idCategoria`),
  ADD KEY `fk_Proyecto_Usuario1` (`Usuario_idUsuario`);

--
-- Indices de la tabla `reaccion`
--
ALTER TABLE `reaccion`
  ADD PRIMARY KEY (`Usuario_idUsuario`,`Proyecto_idProyecto`),
  ADD KEY `fk_Usuario_has_Proyecto_Proyecto1` (`Proyecto_idProyecto`);

--
-- Indices de la tabla `recuperacioncuenta`
--
ALTER TABLE `recuperacioncuenta`
  ADD PRIMARY KEY (`	idRecuperacion`),
  ADD KEY `fk_recuperacioncuenta_Usuario1` (`idUsuario`);

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
  ADD KEY `fk_Usuario_Persona1` (`Persona_idRegistro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actualizacionesproyecto`
--
ALTER TABLE `actualizacionesproyecto`
  MODIFY `idActualizacion` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `multimediaproyecto`
--
ALTER TABLE `multimediaproyecto`
  MODIFY `idImagenesProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actualizacionesproyecto`
--
ALTER TABLE `actualizacionesproyecto`
  ADD CONSTRAINT `fk_actualizacionesproyecto_idProyecto` FOREIGN KEY (`Proyecto_idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `amonestaciones`
--
ALTER TABLE `amonestaciones`
  ADD CONSTRAINT `fk_Amonestaciones_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `multimediaproyecto`
--
ALTER TABLE `multimediaproyecto`
  ADD CONSTRAINT `fk_ImagenesProyecto_Proyecto1` FOREIGN KEY (`Proyecto_idProyecto`) REFERENCES `proyecto` (`idProyecto`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_RegistroPersonas_Correo` FOREIGN KEY (`Correo_idCorreo`) REFERENCES `correo` (`idCorreo`),
  ADD CONSTRAINT `fk_RegistroPersonas_Telefono1` FOREIGN KEY (`Telefono_idTelefono`) REFERENCES `telefono` (`idTelefono`);

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `fk_Proyecto_Categoria1` FOREIGN KEY (`Categoria_idCategoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `fk_Proyecto_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `reaccion`
--
ALTER TABLE `reaccion`
  ADD CONSTRAINT `fk_Usuario_has_Proyecto_Proyecto1` FOREIGN KEY (`Proyecto_idProyecto`) REFERENCES `proyecto` (`idProyecto`),
  ADD CONSTRAINT `fk_Usuario_has_Proyecto_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `recuperacioncuenta`
--
ALTER TABLE `recuperacioncuenta`
  ADD CONSTRAINT `fk_recuperacioncuenta_Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `sancionproyecto`
--
ALTER TABLE `sancionproyecto`
  ADD CONSTRAINT `fk_SancionProyecto_Proyecto1` FOREIGN KEY (`Proyecto_idProyecto`) REFERENCES `proyecto` (`idProyecto`),
  ADD CONSTRAINT `fk_SancionProyecto_Usuario1` FOREIGN KEY (`administrador_idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Login_TipoDeUsuario1` FOREIGN KEY (`TipoDeUsuario_idTipoDeUsuario`) REFERENCES `tipodeusuario` (`idTipoDeUsuario`),
  ADD CONSTRAINT `fk_Usuario_Persona1` FOREIGN KEY (`Persona_idRegistro`) REFERENCES `persona` (`idRegistro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;