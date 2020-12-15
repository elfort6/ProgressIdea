-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-12-2020 a las 01:17:51
-- Versión del servidor: 10.4.14-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u296419032_progressIdea`
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
-- Estructura de tabla para la tabla `aportepatrocinador`
--

CREATE TABLE `aportepatrocinador` (
  `idAportePatrocinador` int(11) NOT NULL,
  `Proyecto_idProyecto` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `monto` float NOT NULL,
  `idTransaccion` varchar(200) NOT NULL,
  `fechaTransaccion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aportepatrocinador`
--

INSERT INTO `aportepatrocinador` (`idAportePatrocinador`, `Proyecto_idProyecto`, `Usuario_idUsuario`, `monto`, `idTransaccion`, `fechaTransaccion`) VALUES
(1, 44803, 99628, 149, '552ssa8e', '2020-12-09'),
(2, 44803, 99628, 51, 'qfxk6yst', '2020-12-09'),
(3, 44803, 99628, 100, '5avfdgxv', '2020-12-09'),
(4, 44803, 99628, 200, 'et19j8hj', '2020-12-09'),
(5, 44803, 99628, 319.5, 'ashckb0z', '2020-12-09'),
(6, 99905, 99628, 5000, '3n0qxne0', '2020-12-09'),
(7, 44803, 99628, 200, 'j6g5pr6e', '2020-12-09'),
(8, 94406, 99628, 50, '5dyge3tj', '2020-12-09'),
(9, 94406, 37755, 25, 'fy8n9avp', '2020-12-14'),
(10, 1180, 37755, 25, '7rvqsgj2', '2020-12-14'),
(11, 1180, 37755, 25, 'f8cwg7sz', '2020-12-15'),
(12, 1180, 37755, 30, '22pg38pk', '2020-12-15'),
(13, 1180, 37755, 84.5, 'e9t833pt', '2020-12-15');

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
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `usuarioc` varchar(50) NOT NULL,
  `usuarioactual` varchar(50) NOT NULL,
  `idproyecto_proyecto` int(11) NOT NULL,
  `visto` int(2) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `descripcion`, `fecha`, `usuarioc`, `usuarioactual`, `idproyecto_proyecto`, `visto`) VALUES
(67929, 'Buen proyecto', '4/12/2020', 'kalexd', '38576', 85418, NULL),
(39541, 'Este es muy bueno', '9/12/2020', 'yeff', '90373', 94406, 0),
(53669, 'Me gustan este tipo de comics!', '9/12/2020', 'AMLO', '40546', 1180, 0);

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
(17084, 'yeffcode@gmail.com'),
(26884, 'yefryyo@gmail.com'),
(33216, 'yeffcode@gmail.com'),
(37755, 'elfort6@gmail.com'),
(38576, 'yu@yu.com'),
(40546, 'bijo@gm.com'),
(43490, 'esban@gmail.com'),
(44796, 'kelvinalexander@gmail.com'),
(80102, 'yu@yu.com'),
(81490, 'kelvinalexander@gmail.com'),
(84299, 'elfort6@gmail.com'),
(90373, 'yeffcode@gmail.com'),
(91567, 'yunio@yunior.yu'),
(99628, 'amlo@gmail.com');

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
(17, 'MultimediaProyectos/yeff/1662_original.jpg', 44803, NULL),
(20, 'MultimediaProyectos/ana/comics1.jpg', 1180, NULL),
(21, 'MultimediaProyectos/ana/arte1.jpg', 36334, NULL),
(22, 'MultimediaProyectos/ana/deporte2.jpg', 87404, NULL),
(23, 'MultimediaProyectos/yeff21/juegos2.jpg', 43418, NULL),
(24, 'MultimediaProyectos/yeff21/tecno3.jpg', 30344, NULL),
(25, 'MultimediaProyectos/yuniorcd/arte3.jpg', 84745, NULL),
(26, 'MultimediaProyectos/yuniorcd/comics3.jpg', 22431, NULL),
(27, 'MultimediaProyectos/yuniorcd/deporte3.jpg', 68521, NULL);

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
  `imagen` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) NOT NULL,
  `codigoPostal` varchar(45) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idRegistro`, `primerNombrel`, `segundoNombre`, `primerApellido`, `segundoApellido`, `Correo_idCorreo`, `Telefono_idTelefono`, `numId`, `imagen`, `direccion`, `codigoPostal`, `fechaNacimiento`, `pais`) VALUES
(17084, 'Cecilia', 'Luz', 'Rodriguez', 'Lopeteggui', 17084, 17084, '98989898987788', NULL, 'Tegucigalpa', '11110', '2020-10-13', '359'),
(26884, 'Yefry', 'Luis', 'Ortiz', 'Orellana', 26884, 26884, '0801-1996-15145', 'fotoPerfiles/yeff/yeff.jpeg', 'Col. San Miguel, calle tocoa casa 5502, Teguc', '504', '2020-10-13', '504'),
(33216, 'Elvin', 'Fabricio', 'Luque', 'Adalma', 33216, 33216, '74498585959', NULL, 'Col. San Miguel, calle tocoa casa 5502, Teguc', '504', '1995-02-08', 'Honduras'),
(37755, 'elvin', 'Elvin Saul', 'Ruiz', 'fortin', 37755, 37755, '08011998060741', NULL, 'carrizal', '12101', '2021-01-10', 'Honduras'),
(38576, 'Yunior', 'Marel', 'Cerrato', 'Dominguez', 38576, 38576, '12345', 'f1.jpg', 'yuniorcerrato26@gmail.com', '1234', '2020-10-13', '504'),
(40546, 'Ana', 'Luisa', 'Hidalgo', 'Ortiz', 40546, 40546, '7363782929292', NULL, 'Col. San Miguel, calle tocoa casa 5502', '11101', '1992-10-14', 'Honduras'),
(81490, 'Kelvin', 'Alexander', 'Cerrato', 'Dominguez', 81490, 81490, '1029384756', NULL, 'Campamento Olancho', '1029', '1992-06-24', 'Honduras'),
(84299, 'elvin', 'Elvin Saul', 'Ruiz', 'fortin', 84299, 84299, '0801199806074', NULL, 'carrizal.', '12101', '2020-12-30', 'Honduras'),
(90373, 'Yefry', 'Rolando', 'Ortiz', 'Zero', 90373, 90373, '0801199615145', 'fotoPerfiles/yeff21/yeff21.jpeg', 'Col. San Miguel, calle tocoa casa 5502, Teguc', '504', '2020-10-13', '504'),
(99628, 'Andres', 'Manuel', 'Lopez', 'Obrador', 99628, 99628, '1234576', NULL, 'Mexico DF', '456', '2020-10-13', '52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `idProyecto` int(11) NOT NULL,
  `nombreproyecto` varchar(45) NOT NULL,
  `Categoria_idCategoria` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Suspendido` int(2) DEFAULT NULL,
  `montoDeseado` float NOT NULL,
  `fechaVencimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`idProyecto`, `nombreproyecto`, `Categoria_idCategoria`, `descripcion`, `Usuario_idUsuario`, `Suspendido`, `montoDeseado`, `fechaVencimiento`) VALUES
(1180, 'Historietas El Exito', 5, 'Lo mejor en comics!! Busca Ya!', 40546, 1, 3500, '2020-12-25'),
(22431, 'ElComicon', 5, 'Tus comics a tu mano ya!', 38576, 1, 1250, '2020-12-30'),
(30344, 'TuTechno', 1, 'Mejores visualizaciones graficas!!!', 90373, 1, 2800, '2020-12-31'),
(36334, 'PintaVos', 2, 'Lo mejor en artes ilustrativos!', 40546, 1, 1500, '2020-12-27'),
(43418, 'MadridGames', 4, 'Lo mejor en ventas de videojuegos!', 90373, 1, 5500, '2020-12-25'),
(44803, 'Historietas ', 5, 'lo mejor', 90373, 0, 1500, NULL),
(47960, 'neles', 1, 'nnsnsnnsns', 90373, 1, 238, '0000-00-00'),
(68521, 'FutDriver', 3, 'Te coloco en equipos y te preparo!', 38576, 1, 4500, '2020-12-20'),
(84745, 'LaArte', 2, 'Nuestros Artes son lo mas elegantes.', 38576, 1, 1900, '2020-12-29'),
(87404, 'SportYou', 3, 'Los mejor del deporte!', 40546, 1, 2500, '2020-12-24'),
(90009, 'muestar', 1, 'nnfeoneon', 90373, 1, 2000, '0000-00-00'),
(94406, 'Lo beuno', 1, 'sisisisi', 90373, 1, 5000, '2020-12-25'),
(96029, 'buenanza', 1, 'simeeeeen', 90373, 1, 2000, '0000-00-00'),
(99905, 'LaBuena', 1, 'smimimimimi', 90373, 1, 30000, '2020-12-10');

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

--
-- Volcado de datos para la tabla `reaccion`
--

INSERT INTO `reaccion` (`Usuario_idUsuario`, `Proyecto_idProyecto`, `comentario`, `fecha`, `like`) VALUES
(33216, 94406, '', '2020-12-09', 5),
(37755, 1180, '', '2020-12-14', 3),
(38576, 30344, '', '2020-12-10', 5),
(99628, 94406, '', '2020-12-09', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperacioncuenta`
--

CREATE TABLE `recuperacioncuenta` (
  `idRecuperacion` varchar(250) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `fechaExpiracion` date NOT NULL,
  `fechaCreacion` date NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recuperacioncuenta`
--

INSERT INTO `recuperacioncuenta` (`idRecuperacion`, `estado`, `fechaExpiracion`, `fechaCreacion`, `idUsuario`) VALUES
('$2y$10$j7kw/4klkL2J3og3PTTIE.RCPhW3I6LPeGdfpT9u/ucZjYxA6FQ1K', '1', '2020-12-15', '2020-12-14', 37755),
('$2y$10$jmI75ylKV3/L5az9oca9H.aIzSjw1RLbRxNPTELdIp6Ap9NAPA.jK', '1', '2020-12-15', '2020-12-14', 37755),
('$2y$10$Qs/lfsf0JNhv0v2MsNEc5uPR4yPdV6KqYLQ.x2miCooTmKGbmDWxq', '1', '2020-12-16', '2020-12-15', 37755);

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
(17084, '+359 - 435336563'),
(26884, '31958353'),
(33216, '31958353'),
(37755, '32750306'),
(38576, '+504 - 621546751'),
(40546, '+504 - 76879897'),
(43490, '+504 - 95055281'),
(44796, '+49 - 90127834'),
(80102, '+504 - 6752125'),
(81490, '+504 - 10293890'),
(84299, '32750306'),
(90373, '31958353'),
(91567, '+504 - 512437'),
(99628, '+52 - 524621756');

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
(33216, 'elfort', '$2y$10$bQoist.NXil4Ve32AZ7hReOkPjrSt78kfCHkUXPN3RhEutWvYN0w.', 3, 33216),
(37755, 'elfort6', '$2y$10$5v0BJUlo416EYti40izmG.e3X99TAvjUEMKoFxDY0iwl.pKD1HkFi', 2, 37755),
(38576, 'yuniorcd', '$2y$10$gXPzKiaP5Ay2hLPVafvQneIbXARPIWXOmxD2BcThznHrrMd11zuiO', 1, 38576),
(40546, 'ana', '$2y$10$qnEsX/RAjZIt/xbqQLUi3Op2LcL4kS11ySp0W2uRCqCt30hXN8uvi', 1, 40546),
(84299, 'elfort1', '$2y$10$SLyeJfXi3MUyT3N0a0Iub.A4WBt4oEJKNmNtx14s5uX5vEXnNaO6e', 1, 84299),
(90373, 'yeff21', '$2y$10$cQFYcnZXRWaxI1mL.N9cfucX0F9l.aoxLWfJdUgZIeqFrz4wu8Knu', 1, 90373),
(99628, 'AMLO', '$2y$10$rTvsGq79NdJwKP.13OlWju9OmVk0rO.w6rtWUCfTxMvnXay/GPmCi', 2, 99628);

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
-- Indices de la tabla `aportepatrocinador`
--
ALTER TABLE `aportepatrocinador`
  ADD PRIMARY KEY (`idAportePatrocinador`),
  ADD KEY `fk_aporteproyecto_idProyecto` (`Proyecto_idProyecto`),
  ADD KEY `fk_aporteusuario` (`Usuario_idUsuario`);

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
  ADD PRIMARY KEY (`idRecuperacion`),
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
  MODIFY `idActualizacion` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `aportepatrocinador`
--
ALTER TABLE `aportepatrocinador`
  MODIFY `idAportePatrocinador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `multimediaproyecto`
--
ALTER TABLE `multimediaproyecto`
  MODIFY `idImagenesProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
-- Filtros para la tabla `aportepatrocinador`
--
ALTER TABLE `aportepatrocinador`
  ADD CONSTRAINT `fk_aporteproyecto_idProyecto` FOREIGN KEY (`Proyecto_idProyecto`) REFERENCES `proyecto` (`idProyecto`),
  ADD CONSTRAINT `fk_aporteusuario` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`);

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
