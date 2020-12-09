-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2020 a las 05:25:05
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
(7, 44803, 99628, 200, 'j6g5pr6e', '2020-12-09');

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
(67929, 'Buen proyecto', '4/12/2020', 'kalexd', '38576', 85418, NULL);

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
(38576, 'yu@yu.com'),
(43490, 'esban@gmail.com'),
(44796, 'kelvinalexander@gmail.com'),
(80102, 'yu@yu.com'),
(81490, 'kelvinalexander@gmail.com'),
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
(17, 'MultimediaProyectos/yeff/1662_original.jpg', 44803, NULL);

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
(26884, 'Yefry', 'Luis', 'Ortiz', 'Orellana', 26884, 26884, '0801-1996-15145', NULL, 'Col. San Miguel, calle tocoa casa 5502, Teguc', '504', '2020-10-13', '504'),
(33216, 'Elvin', 'Fabricio', 'Luque', 'Adalma', 33216, 33216, '74498585959', NULL, 'Col. San Miguel, calle tocoa casa 5502, Teguc', '504', '1995-02-08', 'Honduras'),
(38576, 'Yunior', 'Marel', 'Cerrato', 'Dominguez', 38576, 38576, '12345', 'f1.jpg', 'yuniorcerrato26@gmail.com', '1234', '2020-10-13', '504'),
(81490, 'Kelvin', 'Alexander', 'Cerrato', 'Dominguez', 81490, 81490, '1029384756', NULL, 'Campamento Olancho', '1029', '1992-06-24', 'Honduras'),
(90373, 'Yefry', 'Rolando', 'Ortiz', 'Zero', 90373, 90373, '0801199615145', NULL, 'Col. San Miguel, calle tocoa casa 5502, Teguc', '504', '2020-10-13', '504'),
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
(44803, 'Historietas ', 5, 'lo mejor', 90373, 0, 1500, NULL),
(47960, 'neles', 1, 'nnsnsnnsns', 90373, 1, 238, '0000-00-00'),
(90009, 'muestar', 1, 'nnfeoneon', 90373, 1, 2000, '0000-00-00'),
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
(17084, '+359 - 435336563'),
(26884, '31958353'),
(33216, '31958353'),
(38576, '+504 - 621546751'),
(43490, '+504 - 95055281'),
(44796, '+49 - 90127834'),
(80102, '+504 - 6752125'),
(81490, '+504 - 10293890'),
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
(17084, 'ceci', '$2y$10$uqnGxS6Jy.I9QBkiEZ8HQ.MQjDbTF7LfQaf7nj3zUDihBn7OY0..y', 2, 17084),
(26884, 'yeff', '$2y$10$8d3ZdymaekYsbFBosyHvp.OibbePK/WpKxMX/N8nxr7DXW/I2mOTG', 1, 26884),
(33216, 'elfort', '$2y$10$bQoist.NXil4Ve32AZ7hReOkPjrSt78kfCHkUXPN3RhEutWvYN0w.', 3, 33216),
(38576, 'yuniorcd', '$2y$10$gXPzKiaP5Ay2hLPVafvQneIbXARPIWXOmxD2BcThznHrrMd11zuiO', 1, 38576),
(81490, 'kalexd', '$2y$10$z801q6Zam0qM2u6zlOwTO.bxLUipcU5EFy7aGE/0ZtcVHOmSTk7Hm', 3, 81490),
(90373, 'yeff', '$2y$10$cQFYcnZXRWaxI1mL.N9cfucX0F9l.aoxLWfJdUgZIeqFrz4wu8Knu', 1, 90373),
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
  MODIFY `idActualizacion` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `aportepatrocinador`
--
ALTER TABLE `aportepatrocinador`
  MODIFY `idAportePatrocinador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `multimediaproyecto`
--
ALTER TABLE `multimediaproyecto`
  MODIFY `idImagenesProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
