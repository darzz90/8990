/*
SQLyog Ultimate - MySQL GUI v8.2 
MySQL - 5.5.53 : Database - 8990_loans_2017
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

/*Table structure for table `tbl_000_branchcode` */

DROP TABLE IF EXISTS `tbl_000_branchcode`;

CREATE TABLE `tbl_000_branchcode` (
  `branch_code` int(11) NOT NULL,
  PRIMARY KEY (`branch_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_000_branchcode` */

/*Table structure for table `tbl_000_branches` */

DROP TABLE IF EXISTS `tbl_000_branches`;

CREATE TABLE `tbl_000_branches` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_code` varchar(20) NOT NULL,
  `branch_address` varchar(255) NOT NULL,
  `branch_province` varchar(100) NOT NULL,
  `branch_city` varchar(100) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_000_branches` */

insert  into `tbl_000_branches`(`branch_id`,`branch_code`,`branch_address`,`branch_province`,`branch_city`) values (1,'BRANCH - 17 - 0001','subangdako','cebu','mandaue city'),(2,'BRANCH - 17 - 0002','magallanes street','cebu','cebu city'),(3,'BRANCH - 17 - 0003','barangay tibay marcos street','valenzuela','valenzuela city');

/*Table structure for table `tbl_000_userrights` */

DROP TABLE IF EXISTS `tbl_000_userrights`;

CREATE TABLE `tbl_000_userrights` (
  `rights_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user_id` int(11) NOT NULL,
  `fk_menu_id` int(11) NOT NULL,
  PRIMARY KEY (`rights_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_000_userrights` */

insert  into `tbl_000_userrights`(`rights_id`,`fk_user_id`,`fk_menu_id`) values (1,1,1),(2,1,2),(3,1,3),(4,1,4);

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

/*Table structure for table `tbl_000_usertype` */

DROP TABLE IF EXISTS `tbl_000_usertype`;

CREATE TABLE `tbl_000_usertype` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_description` varchar(255) NOT NULL,
  `IsActive` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `tbl_000_usertype` */

insert  into `tbl_000_usertype`(`user_type_id`,`user_type_description`,`IsActive`,`created_date`,`updated_date`) values (1,'Sales',1,'2017-07-20 04:48:25',NULL),(2,'Administration',1,'2017-07-20 05:15:26',NULL),(3,'Accounting',1,'2017-07-20 05:16:52',NULL),(4,'Systsem Administrator',1,'2017-07-20 05:39:23',NULL),(5,'Cashier',1,'2017-07-20 07:38:34',NULL),(6,'Accounting - Head',1,'2017-07-20 07:39:37',NULL),(7,'Manager',1,'2017-07-20 07:40:05',NULL),(8,'taken out approver',1,'2017-07-21 10:03:28',NULL);

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
