
CREATE DATABASE `dbDataclinic`;
USE `dbDataclinic` ;

-- -----------------------------------------------------
-- Table `perfiles`
-- -----------------------------------------------------
CREATE TABLE `perfiles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`id`)
);

-- -----------------------------------------------------
-- Table `departamentos`
-- -----------------------------------------------------
CREATE TABLE `departamentos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `codigo` INT(2) NOT NULL UNIQUE,
  `nombre` VARCHAR(120) NULL,
  PRIMARY KEY (`id`)
);


-- -----------------------------------------------------
-- Table `ciudades`
-- -----------------------------------------------------
CREATE TABLE `ciudades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `codigo` INT(3) NOT NULL UNIQUE,
  `nombre` VARCHAR(120) NULL,
  `departamentos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_ciudades_departamentos`
    FOREIGN KEY (`departamentos_id`)
    REFERENCES `departamentos` (`codigo`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
);


-- -----------------------------------------------------
-- Table `direcciones`
-- -----------------------------------------------------
CREATE TABLE `direcciones` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `direccion` VARCHAR(255) NULL,
  `zona` VARCHAR(45) NULL,
  `ciudades_id` INT NOT NULL,
  `personas_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_direcciones_ciudades1`
    FOREIGN KEY (`ciudades_id`)
    REFERENCES `ciudades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_direcciones_personas1`
    FOREIGN KEY (`personas_id`)
    REFERENCES `personas` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
);


-- -----------------------------------------------------
-- Table `personas`
-- -----------------------------------------------------
CREATE TABLE `personas` (
  `id` INT NOT NULL,
  `nombres` VARCHAR(255) NULL,
  `apellidos` VARCHAR(255) NULL,
  `tipo_documento` VARCHAR(45) NULL,
  `documento` VARCHAR(45) NULL UNIQUE,
  `fecha_nacimiento` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  `celular` VARCHAR(45) NULL,
  `correo` VARCHAR(120) NULL,
  `genero` VARCHAR(1) NULL,
  `usuarios_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_personas_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
);


-- -----------------------------------------------------
-- Table `usuarios`
-- -----------------------------------------------------
CREATE TABLE `usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(120) NOT NULL,
  `password` VARCHAR(120) NOT NULL,
  `perfiles_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  INDEX `fk_usuarios_perfiles1_idx` (`perfiles_id` ASC) VISIBLE,
  INDEX `fk_usuarios_personas1_idx` (`personas_id` ASC) VISIBLE,
  CONSTRAINT `fk_usuarios_perfiles1`
    FOREIGN KEY (`perfiles_id`)
    REFERENCES `perfiles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);


-- -----------------------------------------------------
-- Table `modulos`
-- -----------------------------------------------------
CREATE TABLE `modulos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`id`)
);
  


-- -----------------------------------------------------
-- Table `operaciones`
-- -----------------------------------------------------
CREATE TABLE `operaciones` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `modulos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_operaciones_modulos1_idx` (`modulos_id` ASC) VISIBLE,
  CONSTRAINT `fk_operaciones_modulos1`
    FOREIGN KEY (`modulos_id`)
    REFERENCES `modulos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);


-- -----------------------------------------------------
-- Table `perfil_operaciones`
-- -----------------------------------------------------
CREATE TABLE `perfil_operaciones` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `perfiles_id` INT NOT NULL,
  `operaciones_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_perfil_operaciones_perfiles1_idx` (`perfiles_id` ASC) VISIBLE,
  INDEX `fk_perfil_operaciones_operaciones1_idx` (`operaciones_id` ASC) VISIBLE,
  CONSTRAINT `fk_perfil_operaciones_perfiles1`
    FOREIGN KEY (`perfiles_id`)
    REFERENCES `perfiles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfil_operaciones_operaciones1`
    FOREIGN KEY (`operaciones_id`)
    REFERENCES `operaciones` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table `pacientes`
-- -----------------------------------------------------
CREATE TABLE `pacientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `personas_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pacientes_personas1_idx` (`personas_id` ASC) VISIBLE,
  CONSTRAINT `fk_pacientes_personas1`
    FOREIGN KEY (`personas_id`)
    REFERENCES `personas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);
-- -----------------------------------------------------
-- Table `historia_clinica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `historia_clinica` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `estado` INT NOT,
  `placa` VARCHAR(45) NULL,
  `movil` VARCHAR(10) NULL,
  `horas_espera` INT(3) NULL,
  `fecha` DATE NULL,
  `motivo` TEXT NULL,
  `diagnostico` TEXT NULL,
  `observacion` TEXT NULL,
  `des_entrada_paciente` TEXT NULL,
  `des_novedad_paciente` TEXT NULL,
  `triage` INT(1) NULL,
  `sv_ta` VARCHAR(45) NULL,
  `tam` VARCHAR(45) NULL,
  `tc` VARCHAR(45) NULL,
  `sapo2` VARCHAR(45) NULL,
  `fr` VARCHAR(45) NULL,
  `fc` VARCHAR(45) NULL,
  `fcf` VARCHAR(45) NULL,
  `hora_solicitud` TIME NULL,
  `hora_salida` TIME NULL,
  `hora_llegada` TIME NULL,
  `hora_final` TIME NULL,
  `tipo_traslado` VARCHAR(45) NULL,
  `tipo_recorrido` VARCHAR(45) NULL,
  `ips_remitente` VARCHAR(255) NULL,
  `ips_receptora` VARCHAR(255) NULL,
  `ips_contraremision` VARCHAR(255) NULL,
  `medico` VARCHAR(255) NULL,
  `conductor` VARCHAR(255) NULL,
  `tipo_auxiliar` VARCHAR(45) NULL,
  `auxiliar` VARCHAR(255) NULL,
  `edad_paciente` VARCHAR(45) NULL,
  `sintomas` VARCHAR(255) NULL,
  `alergias` VARCHAR(255) NULL,
  `patologias` VARCHAR(255) NULL,
  `medicamentos` VARCHAR(255) NULL,
  `eventos_previos` VARCHAR(255) NULL,
  `ultima_ingesta` VARCHAR(255) NULL,
  `toxicos` VARCHAR(255) NULL,
  `gineco` VARCHAR(255) NULL,
  `quirurgico` VARCHAR(255) NULL,
  `examen_fisico` TEXT NULL,
  `tipo_seguridad` VARCHAR(45) NULL,
  `seguridad` VARCHAR(45) NULL,
  `tipo_historia` VARCHAR(45) NULL,
  `pacientes_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_historia_clinica_pacientes1`
    FOREIGN KEY (`pacientes_id`)
    REFERENCES `pacientes` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
);


-- -----------------------------------------------------
-- Table `procedimientos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `procedimientos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL,
  PRIMARY KEY (`id`)
);


-- -----------------------------------------------------
-- Table `procedimiento_historia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `procedimiento_historia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `historia_clinica_id` INT NOT NULL,
  `procedimientos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_proceso_historia_historia_clinica1`
    FOREIGN KEY (`historia_clinica_id`)
    REFERENCES `historia_clinica` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_proceso_historia_procedimientos1`
    FOREIGN KEY (`procedimientos_id`)
    REFERENCES `procedimientos` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
  );


-- -----------------------------------------------------
-- Table `soportes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soportes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(255) NULL,
  `historia_clinica_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_soportes_historia_clinica1`
    FOREIGN KEY (`historia_clinica_id`)
    REFERENCES `historia_clinica` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
);


-- -----------------------------------------------------
-- Table `firmas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `firmas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `asignacion` VARCHAR(45) NULL,
  `urlFirma` VARCHAR(255) NULL,
  `historia_clinica_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_firmas_historia_clinica1`
    FOREIGN KEY (`historia_clinica_id`)
    REFERENCES `historia_clinica` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
);

CREATE TABLE IF NOT EXISTS `registro_temperatura` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `temperatura` VARCHAR(45) NULL,
  `humedad` VARCHAR(45) NULL,
  `hora` VARCHAR(45) NULL,
  `jornada` VARCHAR(45) NULL,
  `fecha` VARCHAR(45) NULL,
  `personas_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_temperatura_personas1_idx` (`personas_id` ASC) VISIBLE,
  CONSTRAINT `fk_temperatura_personas1`
    FOREIGN KEY (`personas_id`)
    REFERENCES `personas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

CREATE TABLE IF NOT EXISTS `control_oxigeno` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numeroCilindro` INT NULL,
  `fecha` DATE,
  `fugas` BOOLEAN NULL,
  `abolladura` BOOLEAN NULL,
  `nivelAdecuado` BOOLEAN NULL,
  `cierreValvula` BOOLEAN NULL,
  `personas_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_control_oxigeno_personas1`
    FOREIGN KEY (`personas_id`)
    REFERENCES `personas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

CREATE TABLE IF NOT EXISTS `tipo_historia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `reuniones` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tema` VARCHAR(45) NULL,
  `fecha` DATE NULL,
  `hora` VARCHAR(45) NULL,
  `contenido` TEXT NULL,
  `observaciones` TEXT NULL,
  `firmaInstructor` VARCHAR(45) NULL,
  `cedulaInstructor` VARCHAR(45) NULL,
  `cargoInstructor` VARCHAR(45) NULL,
  `firmaCoordinador` VARCHAR(45) NULL,
  `cedulaCoordinador` VARCHAR(45) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `reunion_asistentes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  `telefono` VARCHAR(45) NULL,
  `cargo` VARCHAR(45) NULL,
  `firma` VARCHAR(45) NULL,
  `reuniones_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_asistentes_reuniones`
    FOREIGN KEY (`reuniones_id`)
    REFERENCES `reuniones` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
);
CREATE TABLE IF NOT EXISTS `lavadero` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `observaciones` TEXT NULL,
  `mes` VARCHAR(45) NULL,
  `año` VARCHAR(45) NULL,
  PRIMARY KEY (`id`)
);
CREATE TABLE IF NOT EXISTS `lavadero_desinfeccion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NULL,
  `hora` VARCHAR(45) NULL,
  `observaciones` TEXT NULL,
  `firma` VARCHAR(45) NULL,
  `lavadero_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_lavedero_desinfeccion`
    FOREIGN KEY (`lavadero_id`)
    REFERENCES `lavedero` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
);
CREATE TABLE IF NOT EXISTS `desinfeccion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `observaciones` TEXT NULL,
  `mes` VARCHAR(45) NULL,
  `año` VARCHAR(45) NULL,
  PRIMARY KEY (`id`)
);
CREATE TABLE IF NOT EXISTS `desinfeccion_ambulancias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NULL,
  `hora` VARCHAR(45) NULL,
  `desinfectante` VARCHAR(45) NULL,
  `motivo` TEXT NULL,
  `firma` VARCHAR(45) NULL,
  `desinfeccion_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_desinfeccion_ambulancia`
    FOREIGN KEY (`desinfeccion_id`)
    REFERENCES `desinfeccion` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
);

CREATE TABLE IF NOT EXISTS `ambulancias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `placa` VARCHAR(45) NULL,
  `movil` VARCHAR(45) NULL,
  `marca` VARCHAR(45) NULL,
  `modelo` VARCHAR(45) NULL,
  `tipo_carroceria` VARCHAR(45) NULL,
  `linea` VARCHAR(45) NULL,
  `realizado` VARCHAR(45) NULL,
  `revisado` VARCHAR(45) NULL,
  `aprovado` VARCHAR(45) NULL,
  `fechaActualizacion` DATE NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `ambulancias_documentos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(255) NULL,
  `ambulancias_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_ambulancias_documentos`
    FOREIGN KEY (`ambulancias_id`)
    REFERENCES `ambulancias` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
);
CREATE TABLE IF NOT EXISTS `ambulancias_control` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `empresa` VARCHAR(45) NULL,
  `placa` VARCHAR(45) NULL,
  `servicios` VARCHAR(45) NULL,
  `inspector` VARCHAR(45) NULL,
  `razon` VARCHAR(45) NULL,
  `revision` TEXT NULL,
  PRIMARY KEY (`id`)
);
CREATE TABLE IF NOT EXISTS `ambulancias_mantenimientos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `kilometros` VARCHAR(45) NULL,
  `fecha` DATE NULL,
  `mantenimiento` TEXT NULL,
  `responsable` VARCHAR(45) NULL,
  `observacion` TEXT NULL,
  `movil` VARCHAR(45) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `cilindros` (
  `id` INT NOT NULL AUTO_INCREMENT, 
  `numero` INT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `desestimiento` (
  `id` INT NOT NULL AUTO_INCREMENT, 
  `nombre` VARCHAR(45) NULL,
  `cedula` VARCHAR(45) NULL,
  `expedida` VARCHAR(45) NULL,
  `paciente` VARCHAR(45) NULL,
  `parentesco` VARCHAR(45) NULL,
  `causas` VARCHAR(45) NULL,
  `dia` VARCHAR(45) NULL,
  `mes` VARCHAR(45) NULL,
  `año` VARCHAR(45) NULL,
  `testigo` VARCHAR(45) NULL,
  `cedulaTestigo` VARCHAR(45) NULL,
  `auxiliarAmbulancia` VARCHAR(45) NULL,
  `firmaPaciente` VARCHAR(45) NULL,
  `cedulaPaciente` VARCHAR(45) NULL,
  `historia_clinica_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_desestimiento_historia_clinica1`
    FOREIGN KEY (`historia_clinica_id`)
    REFERENCES `historia_clinica` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
);

CREATE TABLE IF NOT EXISTS `encuestas` (
  `id` INT NOT NULL AUTO_INCREMENT, 
  `trato` INT NULL,
  `velocidad` INT NULL,
  `comodidad` INT NULL,
  `calificacion` INT NULL,
  `recomendacion` INT NULL,
  `sugerencias` TEXT NULL,
  `nombre` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  `cedula` VARCHAR(45) NULL,
  `historia_clinica_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_encuestas_historia_clinica1`
    FOREIGN KEY (`historia_clinica_id`)
    REFERENCES `historia_clinica` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
);
INSERT INTO permissions (name, slug, description, created_at, updated_at) VALUES ('Navegar ambulancias','Ambulancias.index', 'Lista y navega todas las ambulancias del sistema', '2020-10-19 06:00:00', '2020-10-19 06:00:00');
INSERT INTO permissions (name, slug, description, created_at, updated_at) VALUES ('Ver detalle de ambulancias','Ambulancias.show', 'Ver en detalle cada ambulancias del sistema', '2020-10-19 06:00:00', '2020-10-19 06:00:00');
INSERT INTO permissions (name, slug, description, created_at, updated_at) VALUES ('Creacion de ambulancias','Ambulancias.create', 'Crear cualquier ambulancias en el sistema', '2020-10-19 06:00:00', '2020-10-19 06:00:00');
INSERT INTO permissions (name, slug, description, created_at, updated_at) VALUES ('Edicion de ambulancias','Ambulancias.edit', 'Editar cualquier ambulancias en el sistema', '2020-10-19 06:00:00', '2020-10-19 06:00:00');
INSERT INTO permissions (name, slug, description, created_at, updated_at) VALUES ('Eliminar una ambulancias','Ambulancias.destroy', 'Eliminar cualquier ambulancias en el sistema', '2020-10-19 06:00:00', '2020-10-19 06:00:00');

INSERT INTO permissions (name, slug, description, created_at, updated_at) VALUES ('Navegar control ambulancias','Controles.index', 'Lista y navega todas las control ambulancias del sistema', '2020-10-19 06:00:00', '2020-10-19 06:00:00');
INSERT INTO permissions (name, slug, description, created_at, updated_at) VALUES ('Ver detalle de control ambulancias','Controles.show', 'Ver en detalle cada control ambulancias del sistema', '2020-10-19 06:00:00', '2020-10-19 06:00:00');
INSERT INTO permissions (name, slug, description, created_at, updated_at) VALUES ('Creacion de control ambulancias','Controles.create', 'Crear cualquier control ambulancias en el sistema', '2020-10-19 06:00:00', '2020-10-19 06:00:00');
INSERT INTO permissions (name, slug, description, created_at, updated_at) VALUES ('Edicion de control ambulancias','Controles.edit', 'Editar cualquier control ambulancias en el sistema', '2020-10-19 06:00:00', '2020-10-19 06:00:00');
INSERT INTO permissions (name, slug, description, created_at, updated_at) VALUES ('Eliminar una control ambulancias','Controles.destroy', 'Eliminar cualquier control ambulancias en el sistema', '2020-10-19 06:00:00', '2020-10-19 06:00:00');

INSERT INTO permissions (name, slug, description, created_at, updated_at) VALUES ('Navegar mantenimientos ambulancias','Mantenimientos.index', 'Lista y navega todas las mantenimientos ambulancias del sistema', '2020-10-19 06:00:00', '2020-10-19 06:00:00');
INSERT INTO permissions (name, slug, description, created_at, updated_at) VALUES ('Ver detalle de mantenimientos ambulancias','Mantenimientos.show', 'Ver en detalle cada mantenimientos ambulancias del sistema', '2020-10-19 06:00:00', '2020-10-19 06:00:00');
INSERT INTO permissions (name, slug, description, created_at, updated_at) VALUES ('Creacion de mantenimientos ambulancias','Mantenimientos.create', 'Crear cualquier mantenimientos ambulancias en el sistema', '2020-10-19 06:00:00', '2020-10-19 06:00:00');
INSERT INTO permissions (name, slug, description, created_at, updated_at) VALUES ('Edicion de mantenimientos ambulancias','Mantenimientos.edit', 'Editar cualquier mantenimientos ambulancias en el sistema', '2020-10-19 06:00:00', '2020-10-19 06:00:00');
INSERT INTO permissions (name, slug, description, created_at, updated_at) VALUES ('Eliminar una mantenimientos ambulancias','Mantenimientos.destroy', 'Eliminar cualquier mantenimientos ambulancias en el sistema', '2020-10-19 06:00:00', '2020-10-19 06:00:00');
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
