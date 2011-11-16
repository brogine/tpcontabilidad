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

/*Table structure for table `localidad` */

DROP TABLE IF EXISTS `localidad`;

CREATE TABLE `localidad` (
  `idLocalidad` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  `idProvincia` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idLocalidad`),
  KEY `FK_localidad` (`idProvincia`),
  CONSTRAINT `FK_localidad` FOREIGN KEY (`idProvincia`) REFERENCES `provincia` (`idProvincia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `localidad` */

insert  into `localidad`(`idLocalidad`,`Descripcion`,`idProvincia`) values (1,'Neuquen',1),(2,'Plottier',1);

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
  `DniCuitCuil` varchar(20) NOT NULL,
  `Apellido` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Nombre` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Pass` varchar(10) NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Telefono` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`DniCuitCuil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `personas` */

insert  into `personas`(`DniCuitCuil`,`Apellido`,`Nombre`,`Pass`,`Email`,`Telefono`) values ('31166408','Giovi','Nicolas','4474722','ngiovi@hotmail.com','4474722'),('32166408','Giovi','Nicolas','4474722','ngiovi@hotmail.com','4474722');

/*Table structure for table `provincia` */

DROP TABLE IF EXISTS `provincia`;

CREATE TABLE `provincia` (
  `idProvincia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  `idPais` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idProvincia`),
  KEY `FK_provincia` (`idPais`),
  CONSTRAINT `FK_provincia` FOREIGN KEY (`idPais`) REFERENCES `pais` (`idPais`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `provincia` */

insert  into `provincia`(`idProvincia`,`Descripcion`,`idPais`) values (1,'Neuquen',1),(3,'Rio Negro',1);

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
