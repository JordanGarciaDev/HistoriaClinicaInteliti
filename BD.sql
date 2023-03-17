/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.4.11-MariaDB : Database - historiaclinica
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`historiaclinica` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `historiaclinica`;

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`description`) values (1,'superadministrador','superadministrador'),(2,'administrador','administrador'),(3,'usuarios','usuarios');

/*Table structure for table `historia` */

DROP TABLE IF EXISTS `historia`;

CREATE TABLE `historia` (
  `id` int(11) NOT NULL,
  `pacienteid` int(11) DEFAULT NULL,
  `observacion` text DEFAULT NULL,
  `fechareg` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `historia` */

/*Table structure for table `login_attempts` */

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `login_attempts` */

/*Table structure for table `pacientes` */

DROP TABLE IF EXISTS `pacientes`;

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identificacion` int(20) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `fNacim` date DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `estatura` int(5) DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `fechareg` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`,`identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pacientes` */

insert  into `pacientes`(`id`,`identificacion`,`nombres`,`apellidos`,`fNacim`,`sexo`,`estatura`,`peso`,`fechareg`) values (1,1234567890,'JORDAN ELIAS','GARCIA PERTUZ','1994-03-31','M',4,58,'2023-03-16 19:56:31'),(2,356774456,'JAIRO','MARTINEZ','1999-08-11','M',88,72,'2023-03-16 19:56:31'),(3,4567852,'CARMEN','ARIZA','1970-09-15','F',2,69.5,'2023-03-16 19:56:31');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`ip_address`,`username`,`password`,`salt`,`email`,`activation_code`,`forgotten_password_code`,`forgotten_password_time`,`remember_code`,`created_on`,`last_login`,`active`,`first_name`,`last_name`,`company`,`phone`) values (1,'::1','administrador','$2y$08$bssfYUe0ctWTWxKoat7ZJ.k7PmtEkrIl90uPFIbLy9IEOO0ozMY3y','','administrador','',NULL,NULL,NULL,1268889823,1679018042,1,'Administrador','.','Inteliti','123'),(15,'::1','ing.jordangarcia@gmail.com','$2y$08$bssfYUe0ctWTWxKoat7ZJ.k7PmtEkrIl90uPFIbLy9IEOO0ozMY3y',NULL,'ing.jordangarcia@gmail.com',NULL,NULL,NULL,NULL,1627481328,1676313138,1,'Jordan','Garcia','Inteliti','3045937472'),(24,'190.84.116.210','test','$2y$08$bssfYUe0ctWTWxKoat7ZJ.k7PmtEkrIl90uPFIbLy9IEOO0ozMY3y',NULL,'test@gmail.com',NULL,NULL,NULL,NULL,1675957774,NULL,1,'Dr','Pepito','Inteliti','123');

/*Table structure for table `users_groups` */

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

/*Data for the table `users_groups` */

insert  into `users_groups`(`id`,`user_id`,`group_id`) values (39,1,1),(38,15,1),(40,24,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
