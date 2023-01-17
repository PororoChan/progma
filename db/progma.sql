/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 10.4.13-MariaDB : Database - progma
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`progma` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `progma`;

/*Table structure for table `msclass` */

DROP TABLE IF EXISTS `msclass`;

CREATE TABLE `msclass` (
  `classid` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) DEFAULT NULL,
  `classtitle` varchar(255) DEFAULT NULL,
  `backimg` varchar(255) DEFAULT NULL,
  `classauthor` varchar(255) DEFAULT NULL,
  `student` varchar(255) DEFAULT NULL,
  `ishidden` tinyint(1) DEFAULT NULL,
  `isactive` int(11) DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `createdby` int(11) NOT NULL,
  `updateddate` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  PRIMARY KEY (`classid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `msclass` */

/*Table structure for table `msfile` */

DROP TABLE IF EXISTS `msfile`;

CREATE TABLE `msfile` (
  `fileid` int(11) NOT NULL AUTO_INCREMENT,
  `owner` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `realname` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `createdby` int(11) NOT NULL,
  PRIMARY KEY (`fileid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `msfile` */

/*Table structure for table `mshistory` */

DROP TABLE IF EXISTS `mshistory`;

CREATE TABLE `mshistory` (
  `historid` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) DEFAULT NULL,
  `dateguidance` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `createdby` int(11) NOT NULL,
  PRIMARY KEY (`historid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `mshistory` */

/*Table structure for table `msresult` */

DROP TABLE IF EXISTS `msresult`;

CREATE TABLE `msresult` (
  `resid` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) DEFAULT NULL,
  `fromstudent` int(11) DEFAULT NULL,
  `teacherid` int(11) DEFAULT NULL,
  `taskstatus` varchar(255) DEFAULT NULL,
  `updateddate` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  `deleteddate` datetime DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL,
  PRIMARY KEY (`resid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `msresult` */

/*Table structure for table `msrole` */

DROP TABLE IF EXISTS `msrole`;

CREATE TABLE `msrole` (
  `roleid` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(255) DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `createdby` int(11) NOT NULL,
  `updateddate` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `msrole` */

/*Table structure for table `msuser` */

DROP TABLE IF EXISTS `msuser`;

CREATE TABLE `msuser` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `userdata` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(999) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `createdby` int(11) NOT NULL,
  `updateddate` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `msuser` */

insert  into `msuser`(`userid`,`fullname`,`userdata`,`birthdate`,`username`,`password`,`role`,`createddate`,`createdby`,`updateddate`,`updatedby`) values 
(2,'Super Admin',NULL,NULL,'admin','$2y$10$7GKFIt5m02Yo4nMsJgSmveBxZqN8Yunf2jHCa3SUNS99G.TDN0YgO',1,'2023-01-17 18:11:01',1,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
