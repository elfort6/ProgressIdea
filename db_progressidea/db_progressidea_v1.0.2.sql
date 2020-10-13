CREATE SCHEMA IF NOT EXISTS `progressidea` DEFAULT CHARACTER SET utf8 ;
USE `progressidea` ;


CREATE TABLE IF NOT EXISTS `progressidea`.`Correo` (
  `idCorreo` INT NOT NULL AUTO_INCREMENT,
  `correo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCorreo`))



-- -----------------------------------------------------
-- Table `progressidea`.`Telefono`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `progressidea`.`Telefono` (
  `idTelefono` INT NOT NULL AUTO_INCREMENT,
  `numeroTelefono` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTelefono`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `progressidea`.`Persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `progressidea`.`Persona` (
  `idRegistro` INT NOT NULL AUTO_INCREMENT,
  `primerNombrel` VARCHAR(45) NOT NULL,
  `segundoNombre` VARCHAR(45) NOT NULL,
  `primerApellido` VARCHAR(45) NOT NULL,
  `segundoApellido` VARCHAR(45) NOT NULL,
  `Correo_idCorreo` INT NOT NULL,
  `Telefono_idTelefono` INT NOT NULL,
  `numId` VARCHAR(45) NOT NULL,
  `imagen` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `codigoPostal` VARCHAR(45) NOT NULL,
  `fechaNacimiento` DATE NOT NULL,
  PRIMARY KEY (`idRegistro`),
  CONSTRAINT `fk_RegistroPersonas_Correo`
    FOREIGN KEY (`Correo_idCorreo`)
    REFERENCES `progressidea`.`Correo` (`idCorreo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_RegistroPersonas_Telefono1`
    FOREIGN KEY (`Telefono_idTelefono`)
    REFERENCES `progressidea`.`Telefono` (`idTelefono`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `progressidea`.`TipoDeUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `progressidea`.`TipoDeUsuario` (
  `idTipoDeUsuario` INT NOT NULL AUTO_INCREMENT,
  `tipoUsuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoDeUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `progressidea`.`Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `progressidea`.`Categoria` (
  `idCategoria` INT NOT NULL,
  `nombreCategoria` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `progressidea`.`Proyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `progressidea`.`Proyecto` (
  `idProyecto` INT NOT NULL,
  `nombreproyecto` VARCHAR(45) NOT NULL,
  `Categoria_idCategoria` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idProyecto`),
  CONSTRAINT `fk_Proyecto_Categoria1`
    FOREIGN KEY (`Categoria_idCategoria`)
    REFERENCES `progressidea`.`Categoria` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `progressidea`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `progressidea`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NOT NULL,
  `contrasenia` VARCHAR(45) NOT NULL,
  `TipoDeUsuario_idTipoDeUsuario` INT NOT NULL,
  `Proyecto_idProyecto` INT NULL,
  `Persona_idRegistro` INT NOT NULL,
  PRIMARY KEY (`idUsuario`),
  CONSTRAINT `fk_Login_TipoDeUsuario1`
    FOREIGN KEY (`TipoDeUsuario_idTipoDeUsuario`)
    REFERENCES `progressidea`.`TipoDeUsuario` (`idTipoDeUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_Proyecto1`
    FOREIGN KEY (`Proyecto_idProyecto`)
    REFERENCES `progressidea`.`Proyecto` (`idProyecto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_Persona1`
    FOREIGN KEY (`Persona_idRegistro`)
    REFERENCES `progressidea`.`Persona` (`idRegistro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `progressidea`.`MultimediaProyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `progressidea`.`MultimediaProyecto` (
  `idImagenesProyecto` INT NOT NULL AUTO_INCREMENT,
  `rutaImagen` VARCHAR(45) NOT NULL,
  `Proyecto_idProyecto` INT NOT NULL,
  `rutaVideo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idImagenesProyecto`),
  CONSTRAINT `fk_ImagenesProyecto_Proyecto1`
    FOREIGN KEY (`Proyecto_idProyecto`)
    REFERENCES `progressidea`.`Proyecto` (`idProyecto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `progressidea`.`Reaccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `progressidea`.`Reaccion` (
  `Usuario_idUsuario` INT NOT NULL,
  `Proyecto_idProyecto` INT NOT NULL,
  `comentario` VARCHAR(160) NULL,
  `fecha` DATE NULL,
  `like` INT NULL,
  PRIMARY KEY (`Usuario_idUsuario`, `Proyecto_idProyecto`),
  CONSTRAINT `fk_Usuario_has_Proyecto_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `progressidea`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_Proyecto_Proyecto1`
    FOREIGN KEY (`Proyecto_idProyecto`)
    REFERENCES `progressidea`.`Proyecto` (`idProyecto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `progressidea`.`Amonestaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `progressidea`.`Amonestaciones` (
  `idAmonestaciones` INT NOT NULL,
  `descripcion` VARCHAR(160) NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idAmonestaciones`),
  CONSTRAINT `fk_Amonestaciones_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `progressidea`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `progressidea`.`SancionProyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `progressidea`.`SancionProyecto` (
  `idSancionProyecto` INT NOT NULL,
  `descripcion` VARCHAR(160) NULL,
  `Proyecto_idProyecto` INT NOT NULL,
  `administrador_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idSancionProyecto`),
  CONSTRAINT `fk_SancionProyecto_Proyecto1`
    FOREIGN KEY (`Proyecto_idProyecto`)
    REFERENCES `progressidea`.`Proyecto` (`idProyecto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SancionProyecto_Usuario1`
    FOREIGN KEY (`administrador_idUsuario`)
    REFERENCES `progressidea`.`Usuario` (`idUsuario`))



