/*
SQLyog Ultimate - MySQL GUI v8.2 
MySQL - 5.5.5-10.1.25-MariaDB : Database - 8990_loans_2017
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`8990_loans_2017` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `8990_loans_2017`;

/*Table structure for table `mgr_securitypolicies` */

DROP TABLE IF EXISTS `mgr_securitypolicies`;

CREATE TABLE `mgr_securitypolicies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `passwordLength` int(11) DEFAULT NULL,
  `passwordDigit` int(11) DEFAULT NULL,
  `passwordSpecial` int(11) DEFAULT NULL,
  `ispasswordreuse` tinyint(1) DEFAULT NULL,
  `passwordChangeFreq` int(11) DEFAULT NULL,
  `loginAttempts` int(11) DEFAULT NULL,
  `sessionTimeout` int(11) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `updatedBy` varchar(255) DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `mgr_securitypolicies` */

insert  into `mgr_securitypolicies`(`id`,`passwordLength`,`passwordDigit`,`passwordSpecial`,`ispasswordreuse`,`passwordChangeFreq`,`loginAttempts`,`sessionTimeout`,`createdBy`,`createdDate`,`updatedBy`,`updatedDate`) values (5,8,2,1,1,30,5,30,'sa','2017-07-25 05:45:07','sa','2017-07-25 07:36:52');

/*Table structure for table `mgr_usertypes` */

DROP TABLE IF EXISTS `mgr_usertypes`;

CREATE TABLE `mgr_usertypes` (
  `id` bigint(50) NOT NULL AUTO_INCREMENT,
  `utyCode` varchar(50) NOT NULL,
  `utyDesc` varchar(255) DEFAULT NULL,
  `isOfficer` tinyint(1) DEFAULT NULL,
  `CreatedBy` varchar(255) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `UpdatedBy` varchar(255) DEFAULT NULL,
  `UpdatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`utyCode`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `mgr_usertypes` */

insert  into `mgr_usertypes`(`id`,`utyCode`,`utyDesc`,`isOfficer`,`CreatedBy`,`CreatedDate`,`UpdatedBy`,`UpdatedDate`) values (6,'AC','Accounting',0,'sa','2017-07-25 07:20:18','sa','2017-07-25 07:35:13'),(8,'SysAdmin','systsem administrator',1,'sa','2017-07-25 07:20:40',NULL,NULL);

/*Table structure for table `tbl_000_branch` */

DROP TABLE IF EXISTS `tbl_000_branch`;

CREATE TABLE `tbl_000_branch` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `BranchCode` varchar(50) NOT NULL,
  `BranchName` varchar(255) DEFAULT NULL,
  `AddressLine1` varchar(255) DEFAULT NULL,
  `AddressLine2` varchar(255) DEFAULT NULL,
  `ContactPerson` varchar(255) DEFAULT NULL,
  `TelNo` varchar(255) DEFAULT NULL,
  `FaxNo` varchar(255) DEFAULT NULL,
  `CellNo` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `IsActive` tinyint(1) DEFAULT NULL,
  `CreatedBy` varchar(255) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `UpdatedBy` varchar(255) DEFAULT NULL,
  `UpdatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`BranchCode`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_000_branch` */

insert  into `tbl_000_branch`(`id`,`BranchCode`,`BranchName`,`AddressLine1`,`AddressLine2`,`ContactPerson`,`TelNo`,`FaxNo`,`CellNo`,`Email`,`IsActive`,`CreatedBy`,`CreatedDate`,`UpdatedBy`,`UpdatedDate`) values (8,'CBU','Cebu Branch',NULL,NULL,NULL,'9209748581',NULL,'9173263322',NULL,NULL,'sa','2017-07-25 07:31:13',NULL,NULL),(9,'DVO','Davao Branch',NULL,NULL,NULL,'9209748581',NULL,'9173263322',NULL,NULL,'sa','2017-07-25 07:31:27',NULL,NULL);

/*Table structure for table `tbl_000_users` */

DROP TABLE IF EXISTS `tbl_000_users`;

CREATE TABLE `tbl_000_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IsActive` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `branch_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

/*Data for the table `tbl_000_users` */

insert  into `tbl_000_users`(`id`,`name`,`username`,`password`,`remember_token`,`IsActive`,`user_type_id`,`branch_code`,`created_at`,`updated_at`) values (1,'administrator','sa','$2y$10$5zt8VertYlDpirqDCNGzQud5RNBpIi.NLgAbYDefpkM5vfJS4kPoa','is6zuL0HdbExkrw77CbdhNdpMpq6OTIZjS0IPMIAEDAc2D5ryDSsyBVn5SH3',1,4,'0','2017-07-19 09:00:10','2017-07-20 04:36:09'),(2,'eduardo morales','eduxd','$2y$10$bRmMJ2pVk6eM7cJVV/0.eeS3J3cmo/F5jT2haXr5GBOQwMMaZz92S',NULL,1,5,'BRANCH - 17 - 0002','2017-07-22 03:06:12','2017-07-22 03:06:12'),(3,'system administrator','admin','$2y$10$L5X4/GpssJ7jk/aeyzeFa.MnYTVuqxAcERV/92Vyz6ZB6vsWz.PGq','PDVot2O7wYzAORoUE1rdrZNyVShWYTqEoQjOqAqrjcvPZZhv5VCOs4bZmMGu',1,2,'BRANCH - 17 - 0001','2017-07-22 11:20:12','2017-07-22 13:03:17');

/*Table structure for table `tbl_menuitem` */

DROP TABLE IF EXISTS `tbl_menuitem`;

CREATE TABLE `tbl_menuitem` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menuTitle` varchar(100) NOT NULL,
  `menuLink` varchar(100) NOT NULL,
  `lineId` int(11) NOT NULL,
  `sub_menu` int(11) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menuitem` */

insert  into `tbl_menuitem`(`menu_id`,`menuTitle`,`menuLink`,`lineId`,`sub_menu`) values (1,'user','user',1,0),(2,'user type','user_type',2,0),(3,'menu item','menu_item',3,0),(4,'parameters','#',4,0),(5,'branches','branches',1,1);

/*Table structure for table `tbl_menuitemsub` */

DROP TABLE IF EXISTS `tbl_menuitemsub`;

CREATE TABLE `tbl_menuitemsub` (
  `menu_sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_menu_id` int(11) NOT NULL,
  `menu_sub` varchar(50) NOT NULL,
  `LineId` varchar(50) NOT NULL,
  PRIMARY KEY (`menu_sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menuitemsub` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
