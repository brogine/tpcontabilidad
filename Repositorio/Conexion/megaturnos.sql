/*
SQLyog Enterprise - MySQL GUI v8.12 
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
  `Nombre` varchar(100) NOT NULL,
  `idLocalidad` int(10) NOT NULL,
  `Telefono` varchar(50) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Domicilio` varchar(100) DEFAULT NULL,
  `Foto` varchar(200) DEFAULT NULL,
  `idClinica` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idClinica`),
  KEY `FK_clinicas_login` (`Email`),
  KEY `FK_clinicas` (`idLocalidad`),
  CONSTRAINT `FK_clinicas` FOREIGN KEY (`idLocalidad`) REFERENCES `localidad` (`idLocalidad`),
  CONSTRAINT `FK_clinicas_login` FOREIGN KEY (`Email`) REFERENCES `login` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `clinicas` */

insert  into `clinicas`(`Nombre`,`idLocalidad`,`Telefono`,`Email`,`Domicilio`,`Foto`,`idClinica`) values ('Pasteur',1,'123456','pas@algo.com','lala 123','',4),('Castro Rendon',2,'4454647','castro@rendon.com','avenida argentina 123','',5);

/*Table structure for table `especialidades` */

DROP TABLE IF EXISTS `especialidades`;

CREATE TABLE `especialidades` (
  `idEspecialidad` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idEspecialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `especialidades` */

insert  into `especialidades`(`idEspecialidad`,`Nombre`) values (1,'Pediatra'),(2,'Psicólogo'),(3,'Dermatólogo');

/*Table structure for table `horarios` */

DROP TABLE IF EXISTS `horarios`;

CREATE TABLE `horarios` (
  `IdMedico` int(10) NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `diaSemana` int(10) NOT NULL,
  `duracion` int(4) NOT NULL,
  PRIMARY KEY (`IdMedico`,`horaInicio`,`horaFin`,`diaSemana`),
  CONSTRAINT `FK_horarios` FOREIGN KEY (`IdMedico`) REFERENCES `medicos` (`IdPersona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `horarios` */

/*Table structure for table `localidad` */

DROP TABLE IF EXISTS `localidad`;

CREATE TABLE `localidad` (
  `idLocalidad` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `idProvincia` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idLocalidad`),
  KEY `FK_localidad` (`idProvincia`),
  CONSTRAINT `FK_localidad` FOREIGN KEY (`idProvincia`) REFERENCES `provincia` (`idProvincia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `localidad` */

insert  into `localidad`(`idLocalidad`,`Nombre`,`idProvincia`) values (1,'Neuquen',1),(2,'Plottier',1);

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `Email` varchar(100) NOT NULL,
  `Pass` varchar(35) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`Email`,`Pass`) values ('castro@rendon.com','e10adc3949ba59abbe56e057f20f883e'),('pas@algo.com','1a1dc91c907325c69271ddf0c944bc72'),('sdfgsdfg','sdg');

/*Table structure for table `medicos` */

DROP TABLE IF EXISTS `medicos`;

CREATE TABLE `medicos` (
  `IdClinica` int(10) NOT NULL,
  `IdPersona` int(10) NOT NULL,
  PRIMARY KEY (`IdPersona`),
  KEY `FK_medicos_clinica` (`IdClinica`),
  CONSTRAINT `FK_medicos_clinica` FOREIGN KEY (`IdClinica`) REFERENCES `clinicas` (`idClinica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `medicos` */

insert  into `medicos`(`IdClinica`,`IdPersona`) values (4,0);

/*Table structure for table `medicos_especialidad` */

DROP TABLE IF EXISTS `medicos_especialidad`;

CREATE TABLE `medicos_especialidad` (
  `IdPersona` int(10) NOT NULL,
  `IdEspecialidad` int(10) NOT NULL,
  PRIMARY KEY (`IdPersona`,`IdEspecialidad`),
  KEY `FK_medicos_especialidad_2` (`IdEspecialidad`),
  CONSTRAINT `FK_medicos_especialidad` FOREIGN KEY (`IdPersona`) REFERENCES `medicos` (`IdPersona`),
  CONSTRAINT `FK_medicos_especialidad_2` FOREIGN KEY (`IdEspecialidad`) REFERENCES `especialidades` (`idEspecialidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `medicos_especialidad` */

insert  into `medicos_especialidad`(`IdPersona`,`IdEspecialidad`) values (0,3);

/*Table structure for table `pais` */

DROP TABLE IF EXISTS `pais`;

CREATE TABLE `pais` (
  `idPais` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`idPais`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pais` */

insert  into `pais`(`idPais`,`Nombre`) values (1,'Argentina'),(2,'Peru');

/*Table structure for table `personas` */

DROP TABLE IF EXISTS `personas`;

CREATE TABLE `personas` (
  `Apellido` varchar(30) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefono` varchar(10) DEFAULT NULL,
  `IdPersona` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`IdPersona`),
  KEY `FK_personas_login` (`Email`),
  CONSTRAINT `FK_personas` FOREIGN KEY (`IdPersona`) REFERENCES `medicos` (`IdPersona`),
  CONSTRAINT `FK_personas_login` FOREIGN KEY (`Email`) REFERENCES `login` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `personas` */

/*Table structure for table `provincia` */

DROP TABLE IF EXISTS `provincia`;

CREATE TABLE `provincia` (
  `idProvincia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `idPais` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idProvincia`),
  KEY `FK_provincia` (`idPais`),
  CONSTRAINT `FK_provincia` FOREIGN KEY (`idPais`) REFERENCES `pais` (`idPais`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `provincia` */

insert  into `provincia`(`idProvincia`,`Nombre`,`idPais`) values (1,'Neuquen',1),(3,'Rio Negro',1),(4,'Peruka',2),(5,'Xuxa',2);

/*Table structure for table `turnos` */

DROP TABLE IF EXISTS `turnos`;

CREATE TABLE `turnos` (
  `IdTurno` int(10) NOT NULL,
  `Fecha` datetime NOT NULL,
  `IdMedico` int(10) NOT NULL,
  `IdPaciente` int(10) NOT NULL,
  `Estado` int(3) DEFAULT '0',
  `horaInicio` varchar(5) NOT NULL,
  `horaFin` varchar(5) NOT NULL,
  PRIMARY KEY (`IdTurno`),
  KEY `FK_turnos_persona` (`IdPaciente`),
  KEY `FK_turnos_medico` (`IdMedico`),
  CONSTRAINT `FK_turnos_medico` FOREIGN KEY (`IdMedico`) REFERENCES `personas` (`IdPersona`),
  CONSTRAINT `FK_turnos_persona` FOREIGN KEY (`IdPaciente`) REFERENCES `personas` (`IdPersona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `turnos` */

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
