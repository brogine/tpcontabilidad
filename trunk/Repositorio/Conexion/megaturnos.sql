/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.5.16 : Database - megaturnos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`megaturnos` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `megaturnos`;

/*Table structure for table `clinicas` */

DROP TABLE IF EXISTS `clinicas`;

CREATE TABLE `clinicas` (
  `IdClinica` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Web` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdClinica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `clinicas` */

/*Table structure for table `especialidades` */

DROP TABLE IF EXISTS `especialidades`;

CREATE TABLE `especialidades` (
  `IdEspecialidad` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`IdEspecialidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `especialidades` */

/*Table structure for table `horarios` */

DROP TABLE IF EXISTS `horarios`;

CREATE TABLE `horarios` (
  `IdMedico` int(10) NOT NULL,
  `IdSucursal` int(10) NOT NULL,
  `DiasSemana` int(5) NOT NULL,
  `HoraInicio` time DEFAULT NULL,
  `HoraFin` time DEFAULT NULL,
  `Duracion` int(5) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IdMedico`,`IdSucursal`),
  KEY `FK_horarios_sucursal` (`IdSucursal`),
  CONSTRAINT `FK_horarios_medico` FOREIGN KEY (`IdMedico`) REFERENCES `usuarios` (`IdUsuario`),
  CONSTRAINT `FK_horarios_sucursal` FOREIGN KEY (`IdSucursal`) REFERENCES `sucursales` (`IdSucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `horarios` */

/*Table structure for table `localidades` */

DROP TABLE IF EXISTS `localidades`;

CREATE TABLE `localidades` (
  `IdLocalidad` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `IdProvincia` int(10) NOT NULL,
  PRIMARY KEY (`IdLocalidad`),
  KEY `FK_localidades` (`IdProvincia`),
  CONSTRAINT `FK_localidades_usuarios` FOREIGN KEY (`IdLocalidad`) REFERENCES `usuarios` (`IdLocalidad`),
  CONSTRAINT `FK_localidades` FOREIGN KEY (`IdProvincia`) REFERENCES `provincias` (`IdProvincia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `localidades` */

/*Table structure for table `medico_especialidad` */

DROP TABLE IF EXISTS `medico_especialidad`;

CREATE TABLE `medico_especialidad` (
  `IdMedico` int(10) NOT NULL,
  `IdEspecialidad` int(10) NOT NULL,
  `Matricula` int(50) DEFAULT NULL,
  PRIMARY KEY (`IdMedico`,`IdEspecialidad`),
  KEY `FK_medico_especialidad` (`IdEspecialidad`),
  CONSTRAINT `FK_medico_especialidad_usuario` FOREIGN KEY (`IdMedico`) REFERENCES `usuarios` (`IdUsuario`),
  CONSTRAINT `FK_medico_especialidad` FOREIGN KEY (`IdEspecialidad`) REFERENCES `especialidades` (`IdEspecialidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `medico_especialidad` */

/*Table structure for table `paises` */

DROP TABLE IF EXISTS `paises`;

CREATE TABLE `paises` (
  `IdPais` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`IdPais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `paises` */

/*Table structure for table `provincias` */

DROP TABLE IF EXISTS `provincias`;

CREATE TABLE `provincias` (
  `IdProvincia` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `IdPais` int(10) NOT NULL,
  PRIMARY KEY (`IdProvincia`),
  KEY `FK_provincias` (`IdPais`),
  CONSTRAINT `FK_provincias` FOREIGN KEY (`IdPais`) REFERENCES `paises` (`IdPais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `provincias` */

/*Table structure for table `sucursales` */

DROP TABLE IF EXISTS `sucursales`;

CREATE TABLE `sucursales` (
  `IdSucursal` int(10) NOT NULL AUTO_INCREMENT,
  `IdClinica` int(10) NOT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Telefono` int(50) DEFAULT NULL,
  `IdLocalidad` int(10) NOT NULL,
  PRIMARY KEY (`IdSucursal`,`IdClinica`),
  UNIQUE KEY `IdSucursal` (`IdSucursal`),
  KEY `FK_sucursales_clinicas` (`IdClinica`),
  CONSTRAINT `FK_sucursales_clinicas` FOREIGN KEY (`IdClinica`) REFERENCES `clinicas` (`IdClinica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sucursales` */

/*Table structure for table `turnos` */

DROP TABLE IF EXISTS `turnos`;

CREATE TABLE `turnos` (
  `IdTurno` int(20) NOT NULL AUTO_INCREMENT,
  `IdSucursal` int(10) NOT NULL,
  `IdMedico` int(10) NOT NULL,
  `IdUsuario` int(10) NOT NULL,
  `Hora` time DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IdTurno`),
  KEY `FK_turnos_paciente` (`IdUsuario`),
  KEY `FK_turnos_medico` (`IdMedico`),
  KEY `FK_turnos` (`IdSucursal`),
  CONSTRAINT `FK_turnos` FOREIGN KEY (`IdSucursal`) REFERENCES `sucursales` (`IdSucursal`),
  CONSTRAINT `FK_turnos_medico` FOREIGN KEY (`IdMedico`) REFERENCES `usuarios` (`IdUsuario`),
  CONSTRAINT `FK_turnos_paciente` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `turnos` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `IdUsuario` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Pass` varchar(32) NOT NULL,
  `IdLocalidad` int(10) NOT NULL,
  PRIMARY KEY (`IdUsuario`),
  KEY `FK_usuarios` (`IdLocalidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

/* Procedure structure for procedure `LocalidadesListar` */

/*!50003 DROP PROCEDURE IF EXISTS  `LocalidadesListar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `LocalidadesListar`(
	in p_idProvincia int
    )
BEGIN
	Select idLocalidad, Descripcion, idProvincia From localidad Where idProvincia = p_idProvincia;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `PaisesBuscar` */

/*!50003 DROP PROCEDURE IF EXISTS  `PaisesBuscar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PaisesBuscar`(
	in p_idPais INT
    )
BEGIN
	Select idPais, Descripcion From pais where idPais = p_idPais;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `PaisesListar` */

/*!50003 DROP PROCEDURE IF EXISTS  `PaisesListar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PaisesListar`()
BEGIN
Select idPais, Descripcion From Pais;
END */$$
DELIMITER ;

/* Procedure structure for procedure `PersonasAlta` */

/*!50003 DROP PROCEDURE IF EXISTS  `PersonasAlta` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PersonasAlta`(
		in 	p_DniCuitCuil 		varchar(20),
		in 	p_Apellido 		varchar(30),
		in 	p_Nombre 		varchar(30),
        
    in p_Pass varchar(10),
    in 	p_Email			varchar(50),
		in 	p_Telefono 		varchar(10)
		
        )
BEGIN
	INSERT INTo personas 
	(DniCuitCuil, Apellido, Nombre, Pass, Email, Telefono)
	Values	
	(
		p_DniCuitCuil, p_Apellido, p_Nombre, p_Pass, p_Email, p_Telefono
	);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `PersonasBuscar` */

/*!50003 DROP PROCEDURE IF EXISTS  `PersonasBuscar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PersonasBuscar`(
    in Dni varchar(20)
    
)
BEGIN
 select * from Personas where DniCuitCuil= Dni;
END */$$
DELIMITER ;

/* Procedure structure for procedure `PersonasMod` */

/*!50003 DROP PROCEDURE IF EXISTS  `PersonasMod` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PersonasMod`(
    in 	p_DniCuitCuil 		varchar(20),
		in 	p_Apellido 		varchar(30),
		in 	p_Nombre 		varchar(30),
        
    in p_Pass varchar(10),
    in 	p_Email			varchar(50),
		in 	p_Telefono 		varchar(10)
    )
BEGIN
	UPdate personas 
	set 
		Apellido = p_Apellido, 
		Nombre = p_Nombre, 
        
    Pass = p_Pass,
    
    Email = p_Email, 
		Telefono = p_Telefono
	where
	(
		DniCuitCuil = p_DniCuitCuil
	);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `ProvinciasBuscar` */

/*!50003 DROP PROCEDURE IF EXISTS  `ProvinciasBuscar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=``@`%` PROCEDURE `ProvinciasBuscar`(
	in p_idProvincia int
    )
BEGIN
	select idProvincia, Descripcion, idPais From provincia Where idProvincia = p_idProvincia;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `ProvinciasListar` */

/*!50003 DROP PROCEDURE IF EXISTS  `ProvinciasListar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ProvinciasListar`(
	in p_idPais int
    )
BEGIN
	Select idProvincia, Descripcion, idPais From provincia
	Where idPais = p_idPais;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `RubrosAlta` */

/*!50003 DROP PROCEDURE IF EXISTS  `RubrosAlta` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `RubrosAlta`(
    in p_Descripcion    varchar(100),
    in p_Estado         tinyint(1)
    )
BEGIN
	INSERT INTO rubros
	(Descripcion, Estado)
	VAlues
	(
		p_Descripcion, p_Estado
	);
END */$$
DELIMITER ;

/* Procedure structure for procedure `RubrosList` */

/*!50003 DROP PROCEDURE IF EXISTS  `RubrosList` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `RubrosList`()
BEGIN
    Select id, descripcion From rubros where Estado = 1;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
