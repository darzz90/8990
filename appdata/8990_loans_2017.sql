/*
SQLyog Ultimate v12.09 (32 bit)
MySQL - 5.5.56 : Database - 8990_loans_2017
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_000_branch` */

insert  into `tbl_000_branch`(`id`,`BranchCode`,`BranchName`,`AddressLine1`,`AddressLine2`,`ContactPerson`,`TelNo`,`FaxNo`,`CellNo`,`Email`,`IsActive`,`CreatedBy`,`CreatedDate`,`UpdatedBy`,`UpdatedDate`) values (10,'CBU','Cebu Branch',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(11,'DAV','Davao Branch',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(12,'ILO','Ilo-Ilo Branch',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(13,'MLA','Manila',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(14,'NLZ','NLUZON BRANCH',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(15,'SLZ','SLUZON BRANCH',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00');

/*Table structure for table `tbl_000_userbranch` */

DROP TABLE IF EXISTS `tbl_000_userbranch`;

CREATE TABLE `tbl_000_userbranch` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `branch_id` bigint(20) DEFAULT NULL,
  `branch_name` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `lineid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `branch_id` (`branch_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tbl_000_userbranch_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `tbl_000_branch` (`id`),
  CONSTRAINT `tbl_000_userbranch_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_000_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_000_userbranch` */

/*Table structure for table `tbl_000_userrights` */

DROP TABLE IF EXISTS `tbl_000_userrights`;

CREATE TABLE `tbl_000_userrights` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `usrtype_id` bigint(20) NOT NULL,
  `submenu_id` int(11) NOT NULL,
  `canView` tinyint(1) DEFAULT NULL,
  `canAdd` tinyint(1) DEFAULT NULL,
  `canUpdate` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usrtype_id` (`usrtype_id`),
  KEY `submenu_id` (`submenu_id`),
  CONSTRAINT `tbl_000_userrights_ibfk_1` FOREIGN KEY (`usrtype_id`) REFERENCES `tbl_000_usertypes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_000_userrights_ibfk_2` FOREIGN KEY (`submenu_id`) REFERENCES `tbl_menuitemsub` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_000_userrights` */

insert  into `tbl_000_userrights`(`id`,`usrtype_id`,`submenu_id`,`canView`,`canAdd`,`canUpdate`) values (128,11,100,0,1,1),(129,11,101,0,1,1),(130,11,102,1,1,1),(131,11,103,1,1,1),(132,11,104,1,1,1),(133,11,105,1,1,1),(134,11,106,1,1,1),(135,11,107,1,1,1),(136,11,108,1,1,1),(137,11,109,1,1,1),(138,11,110,1,1,1),(139,11,111,1,1,1),(140,11,112,1,1,1),(141,11,113,1,1,1),(142,11,114,1,1,1),(143,11,115,1,1,1),(144,11,116,1,1,1),(145,11,117,1,1,1),(146,11,118,1,1,1),(147,11,119,1,1,1),(148,11,120,1,1,1),(149,11,121,1,1,1),(150,11,122,1,1,1),(151,11,123,1,1,1),(152,11,124,1,1,1),(153,11,125,1,1,1),(154,11,126,1,1,1),(155,11,127,1,1,1),(156,11,128,1,1,1),(157,11,129,1,1,1),(158,11,130,1,1,1),(159,11,131,1,1,1),(160,11,132,1,1,1),(161,11,133,1,1,1),(162,11,134,1,1,1),(163,11,135,1,1,1),(164,11,136,1,1,1),(165,11,137,1,1,1),(166,11,138,1,1,1),(167,11,139,1,1,1),(168,11,140,1,1,1),(169,11,141,1,1,1),(170,11,142,1,1,1),(171,11,143,1,1,1),(172,11,144,1,1,1),(173,11,145,1,1,1),(174,11,146,1,1,1),(175,11,147,1,1,1),(176,11,148,1,1,1),(177,11,149,1,1,1),(178,11,150,1,1,1),(179,11,151,1,1,1),(180,11,152,1,1,1),(181,11,153,1,1,1),(182,11,154,1,1,1),(183,11,155,1,1,1),(184,11,156,1,1,1),(185,11,157,1,1,1),(186,11,158,1,1,1),(187,11,159,1,1,1),(188,11,160,1,1,1),(189,11,161,1,1,1),(190,11,162,1,1,1),(191,11,163,1,1,1),(192,11,164,1,1,1),(193,11,165,1,1,1),(194,11,166,1,1,1),(195,11,167,1,1,1),(196,11,168,1,1,1),(197,11,169,1,1,1),(198,11,170,1,1,1),(199,11,171,1,1,1),(200,11,172,1,1,1),(201,11,173,1,1,1),(202,11,174,1,1,1),(203,11,175,1,1,1),(204,11,176,1,1,1),(205,11,177,1,1,1),(206,11,178,1,1,1),(207,11,179,1,1,1),(208,11,180,1,1,1),(209,11,181,1,1,1),(210,11,182,1,1,1),(211,11,183,1,1,1),(212,11,184,1,1,1);

/*Table structure for table `tbl_000_users` */

DROP TABLE IF EXISTS `tbl_000_users`;

CREATE TABLE `tbl_000_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isActive` int(11) NOT NULL,
  `usertype_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addressline1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addressline2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telNo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellNo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

/*Data for the table `tbl_000_users` */

insert  into `tbl_000_users`(`id`,`fname`,`username`,`password`,`remember_token`,`isActive`,`usertype_id`,`created_at`,`updated_at`,`lname`,`mname`,`addressline1`,`addressline2`,`telNo`,`cellNo`,`email`) values (1,'administrator','admin','$2y$10$iiJ.2BACbhfH3tlVt5mNzeHeXORvouquVaw5GFYp4KvMfLnt9tJuq','aDJqDZlt8Yoy1RQF21XTcnDtYEam6rkKGh1oMgejdmJmICeHmHUcIDK4nM8c',1,11,'2017-07-19 09:00:10','2017-08-06 12:34:36','admin','admin','admin','admin','123-4567','09123456789','d.awit@bpsolutions.biz');

/*Table structure for table `tbl_000_usertypes` */

DROP TABLE IF EXISTS `tbl_000_usertypes`;

CREATE TABLE `tbl_000_usertypes` (
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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_000_usertypes` */

insert  into `tbl_000_usertypes`(`id`,`utyCode`,`utyDesc`,`isOfficer`,`CreatedBy`,`CreatedDate`,`UpdatedBy`,`UpdatedDate`) values (10,'AC','Accountant',1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(11,'AD\r\n','ADMIN OPERATION',1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(12,'AG','AGM - CREDIT AND COLLECTION\r\n',1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(13,'AO\r\n','CC CEBU AO - TEMP\r\n',1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(14,'AT\r\n','ACCOUNTING-PDC PROCESS\r\n',1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(15,'AU\r\n','AUDIT',0,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(16,'BA\r\n','Credit and Collection Bookkeeper with Approval',0,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(17,'C1\r\n','CC-Frontline',1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(18,'C2\r\n','CCManager-With Edit POF',1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(19,'C3\r\n','CC-With Enter Payment v2',1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(20,'C4\r\n','CC-reinstated(w/Edit POF)',1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(21,'CA\r\n','CASHIER with Debit memo',0,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(22,'CB','Credit & Collection Bookkeeper\r\n',0,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(23,'CD\r\n','CEBU-DAVAO ACCESS',0,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(24,'CS','CASHIER',0,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(25,'CT','CC CEBU AO - TEMP2',1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(26,'DS','DAVAO SPECIAL RIGHTS',0,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(27,'F2','FRONTLINE-TRANSFER ACCOUNT',0,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(28,'MC','CREDIT AND COLLECTION MANAGER',1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(29,'PA','Parameters Administrator',0,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(30,'RA','RESERVATION APPROVER',1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(31,'RG\r\n','Reports Generator',1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(32,'SC','Software Consultant',0,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(33,'SG','SGV',0,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(34,'SL','CC-Supervisor-Luzon',1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(35,'SU','SYSMANAGER',0,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(36,'SV','CC-Supervisor-Vismin',0,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(37,'TA\r\n','TAKEOUT APPROVER',1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(38,'TC','Technical Staff',0,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(39,'TD','Technical Davao',0,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(40,'TU','TREASURY GROUP\r\n',1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(41,'V2','CC with enterpayment V2',1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00'),(42,'VW','VIEW ARA',1,'admin','2017-08-04 00:00:00','admin','2017-08-04 00:00:00');

/*Table structure for table `tbl_menuitem` */

DROP TABLE IF EXISTS `tbl_menuitem`;

CREATE TABLE `tbl_menuitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `menu_description` varchar(225) CHARACTER SET utf8 DEFAULT NULL,
  `line_id` int(11) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menuitem` */

insert  into `tbl_menuitem`(`id`,`menu_name`,`menu_description`,`line_id`,`isActive`) values (1,'Setup','Setup Menu',1,1),(2,'Sales','Sales Menu',2,1),(3,'Transactions','Transaction Menu',3,1),(4,'Reports','Report Menu',4,1),(5,'Utilities','Utilitie Menu',5,1);

/*Table structure for table `tbl_menuitemsub` */

DROP TABLE IF EXISTS `tbl_menuitemsub`;

CREATE TABLE `tbl_menuitemsub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `submenu_parent` int(11) unsigned DEFAULT NULL,
  `submenu_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `submenu_url` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `submenu_desc` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `isNewmn` tinyint(1) DEFAULT NULL,
  `isNewmn_sub` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  CONSTRAINT `tbl_menuitemsub_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menuitem` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menuitemsub` */

insert  into `tbl_menuitemsub`(`id`,`menu_id`,`submenu_parent`,`submenu_name`,`submenu_url`,`submenu_desc`,`isActive`,`isNewmn`,`isNewmn_sub`) values (100,1,0,'Branch','branch','Branch',1,0,0),(101,1,0,'User Types','user_type','User Types',1,0,0),(102,1,0,'Access Rights',NULL,'Access Rights',1,0,0),(103,1,0,'Users','user','Users',1,0,0),(104,1,0,'User Administration',NULL,'User Administration',1,1,0),(105,1,104,'User Activation',NULL,'User Activation',1,0,0),(106,1,104,'Reset Password',NULL,'Reset Password',1,0,0),(107,1,0,'Security Administration',NULL,'Security Administration',1,1,0),(108,1,107,'Security Policies','security_policy','Security Policies',1,0,0),(109,1,107,'Upload Menu Items',NULL,'Upload Menu Items',1,0,0),(110,1,0,'Area',NULL,'Area',1,1,0),(111,1,110,'Regions',NULL,'Regions',1,0,0),(112,1,110,'Provinces',NULL,'Provinces',1,0,0),(113,1,110,'Cities/Municipalites',NULL,'Cities/Municipalites',1,0,0),(114,1,110,'Barangays',NULL,'Barangays',1,0,0),(115,1,0,'Loans',NULL,'Loans',1,1,0),(116,1,115,'Payment Mode',NULL,'Payment Mode',1,0,0),(117,1,115,'Amortization',NULL,'Amortization',1,0,0),(118,1,115,'Compotation',NULL,'Compotation',1,0,0),(119,1,0,'Others',NULL,'Others',1,1,0),(120,1,119,'Business Unit',NULL,'Business Unit',1,0,0),(121,1,119,'Developers',NULL,'Developers',1,0,0),(122,1,119,'Financing',NULL,'Financing',1,0,0),(123,1,119,'Financing Frims',NULL,'Financing Frims',1,0,0),(124,1,119,'Insurance Providers',NULL,'Insurance Providers',1,0,0),(125,1,119,'Other Transactions',NULL,'Other Transactions',1,0,0),(126,2,0,'Unit for Sale',NULL,'Unit for Sale',1,1,0),(127,2,126,'Projects',NULL,'Projects',1,0,0),(128,2,126,'Model',NULL,'Model',1,0,0),(129,2,126,'Units Inventory',NULL,'Units Inventory',1,0,0),(130,2,0,'Customers',NULL,'Customers',1,0,0),(131,2,0,'Accounts',NULL,'Accounts',1,1,0),(132,2,131,'Reservations',NULL,'Reservations',1,0,0),(133,2,131,'Take Out',NULL,'Take Out',1,0,0),(134,2,131,'Enter Spot Cash',NULL,'Enter Spot Cash',1,0,0),(135,2,131,'Accounts ',NULL,'Accounts ',1,0,0),(136,2,131,'Amortization Schedule',NULL,'Amortization Schedule',1,0,0),(137,2,131,'AR Ledger',NULL,'AR Ledger',1,0,0),(138,2,0,'Checks',NULL,'Checks',1,1,0),(139,2,138,'Postdated',NULL,'Postdated',1,0,1),(140,2,139,'Postdated',NULL,'Postdated',1,0,0),(141,2,139,'Reports',NULL,'Reports',1,0,0),(142,2,138,'Guaranted',NULL,'Guaranted',1,0,1),(143,2,142,'Guaranted',NULL,'Guaranted',1,0,0),(144,2,142,'Reports',NULL,'Reports',1,0,0),(145,2,0,'Cancellations',NULL,'Cancellations',1,0,0),(146,2,0,'Reinstatement',NULL,'Reinstatement',1,0,0),(147,2,0,'Tags',NULL,'Tags',1,1,0),(148,2,147,'Accounts ',NULL,'Accounts ',1,0,0),(149,2,147,'Accounts  Tag Ledger Report',NULL,'Accounts  Tag Ledger Report',1,0,0),(150,3,0,'Payment Orders',NULL,'Payment Orders',1,1,0),(151,3,150,'Orders',NULL,'Orders',1,0,0),(152,3,150,'Orders Penalties',NULL,'Orders Penalties',1,0,0),(153,3,0,'Payments',NULL,'Payments',1,1,0),(154,3,153,'Difine OR Start Series',NULL,'Difine OR Start Series',1,0,0),(155,3,153,'Payment',NULL,'Payment',1,0,0),(156,3,153,'Cancel/Uncancel OR',NULL,'Cancel/Uncancel OR',1,0,0),(157,3,153,'Reports',NULL,'Reports',1,0,0),(158,3,0,'Deposit PDCs',NULL,'Deposit PDCs',1,1,0),(159,3,158,'Check for Deposit',NULL,'Check for Deposit',1,0,0),(160,3,158,'Deposit Transmital List',NULL,'Deposit Transmital List',1,0,0),(161,3,158,'OR/AR For Batch No',NULL,'OR/AR For Batch No',1,0,0),(162,3,158,'Deposit Date',NULL,'Deposit Date',1,0,0),(163,3,158,'Approved Batch of Checks',NULL,'Approved Batch of Checks',1,0,0),(164,3,158,'Returned Checks',NULL,'Returned Checks',1,1,1),(165,3,164,'Difine Checks',NULL,'Difine Checks',1,0,0),(166,3,164,'Edit Checks',NULL,'Edit Checks',1,0,0),(167,3,158,'Unxclude Checks',NULL,'Unxclude Checks',1,0,0),(168,3,158,'Batch Listing',NULL,'Batch Listing',1,0,0),(169,3,158,'Default Payment Report',NULL,'Default Payment Report',1,0,0),(170,3,158,'PDCs Collection Report',NULL,'PDCs Collection Report',1,0,0),(171,3,0,'Migration',NULL,'Migration',1,1,0),(172,3,171,'Migrated Accounts ',NULL,'Migrated Accounts ',1,0,0),(173,3,171,'Update Migrated Dates',NULL,'Update Migrated Dates',1,0,0),(174,3,171,'Reports',NULL,'Reports',1,0,0),(175,3,0,'Adjustments',NULL,'Adjustments',1,1,0),(176,3,175,'Debit',NULL,'Debit',1,0,0),(177,3,175,'Credit',NULL,'Credit',1,0,0),(178,3,175,'Reports',NULL,'Reports',1,0,0),(179,3,0,'Assumption',NULL,'Assumption',1,1,0),(180,3,179,'Accounts for assumption',NULL,'Accounts for assumption',1,0,0),(181,3,179,'Assumed Accounts',NULL,'Assumed Accounts',1,0,0),(182,3,0,'Transfer Accounts',NULL,'Transfer Accounts',1,1,0),(183,3,182,'Accounts for transfer',NULL,'Accounts for transfer',1,0,0),(184,3,182,'Change Customer',NULL,'Change Customer',1,0,0);

/*Table structure for table `tbl_securitypolicies` */

DROP TABLE IF EXISTS `tbl_securitypolicies`;

CREATE TABLE `tbl_securitypolicies` (
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_securitypolicies` */

insert  into `tbl_securitypolicies`(`id`,`passwordLength`,`passwordDigit`,`passwordSpecial`,`ispasswordreuse`,`passwordChangeFreq`,`loginAttempts`,`sessionTimeout`,`createdBy`,`createdDate`,`updatedBy`,`updatedDate`) values (5,8,2,1,1,30,5,30,'sa','2017-07-25 05:45:07','sa','2017-07-25 07:36:52');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
