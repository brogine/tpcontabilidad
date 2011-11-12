/*
SQLyog Ultimate v9.02 
MySQL - 5.1.36-community-log : Database - megaturnos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`megaturnos` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `megaturnos`;

/*Table structure for table `localidad` */

DROP TABLE IF EXISTS `localidad`;

CREATE TABLE `localidad` (
  `idLocalidad` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  `idProvincia` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idLocalidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `localidad` */

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `DniCuitCuil` int(11) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`DniCuitCuil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `login` */

/*Table structure for table `pais` */

DROP TABLE IF EXISTS `pais`;

CREATE TABLE `pais` (
  `idPais` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`idPais`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pais` */

insert  into `pais`(`idPais`,`Descripcion`) values (1,'Argentina'),(2,'Peru');

/*Table structure for table `personas` */

DROP TABLE IF EXISTS `personas`;

CREATE TABLE `personas` (
  `DniCuitCuil` int(50) NOT NULL,
  `Apellido` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Nombre` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Telefono` int(50) DEFAULT NULL,
  `Celular` int(50) DEFAULT NULL,
  `idLocalidad` int(10) DEFAULT NULL,
  `Estado` tinyint(1) NOT NULL DEFAULT '1',
  `Email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Domicilio` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`DniCuitCuil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `personas` */

/*Table structure for table `provincia` */

DROP TABLE IF EXISTS `provincia`;

CREATE TABLE `provincia` (
  `idProvincia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  `idPais` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idProvincia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `provincia` */

insert  into `provincia`(`idProvincia`,`Descripcion`,`idPais`) values (1,'Neuquen',1);

/*Table structure for table `rubros` */

DROP TABLE IF EXISTS `rubros`;

CREATE TABLE `rubros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `rubros` */

insert  into `rubros`(`id`,`descripcion`,`estado`) values (1,'Fisioterapeuta',1),(2,'PsicÃ³logo',1),(3,'Nutricionista',1);

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
		in 	p_DniCuitCuil 		int,
		in 	p_Apellido 		varchar(30),
		in 	p_Nombre 		varchar(30),
		in 	p_Telefono 		int,
		in 	p_Celular 		int,
		in 	p_Email			varchar(50),
		in 	p_idLocalidad 		int,
		IN 	p_Domicilio		varchar(50),
		in 	p_Estado 		Boolean
    )
BEGIN
	INSERT INTo personas 
	(DniCuitCuil, Apellido, Nombre, Telefono, Celular, Email, idLocalidad, Domicilio, Estado)
	VAlues	
	(
		p_DniCuitCuil, p_Apellido, p_Nombre, p_Telefono, p_Celular, p_Email, p_idLocalidad, p_Domicilio, p_Estado
	);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `PersonasMod` */

/*!50003 DROP PROCEDURE IF EXISTS  `PersonasMod` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PersonasMod`(
		IN 	p_DniCuitCuil 		INT,
		IN 	p_Apellido 		VARCHAR(30),
		IN 	p_Nombre 		VARCHAR(30),
		IN 	p_Telefono 		INT,
		IN 	p_Celular 		INT,
		IN 	p_Email			VARCHAR(50),
		IN 	p_idLocalidad 		INT,
		IN 	p_Domicilio		VARCHAR(50),
		IN 	p_Estado 		BOOLEAN
    )
BEGIN
	UPdate personas 
	set 
		Apellido = p_Apellido, 
		Nombre = p_Nombre, 
		Telefono = p_Telefono, 
		Celular = p_Celular, 
		Email = p_Email, 
		idLocalidad = p_idLocalidad, 
		Domicilio = p_Domicilio, 
		Estado = p_Estado
	where
	(
		DniCuitCuil = p_DniCuitCuil
	);
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
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
