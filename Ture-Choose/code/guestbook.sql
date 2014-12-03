-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.0-m2-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema guestbook
--

CREATE DATABASE IF NOT EXISTS guestbook;
USE guestbook;

--
-- Definition of table `tb_messages`
--

DROP TABLE IF EXISTS `tb_messages`;
CREATE TABLE `tb_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `visitor` varchar(45) CHARACTER SET utf8 NOT NULL,
  `url` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `body` text CHARACTER SET utf8,
  `create_at` datetime NOT NULL,
  `title` varchar(45) CHARACTER SET utf8 NOT NULL,
  `reply` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ;

--
-- Dumping data for table `tb_messages`
--

/*!40000 ALTER TABLE `tb_messages` DISABLE KEYS */;
INSERT INTO `tb_messages` (`id`,`visitor`,`url`,`body`,`create_at`,`title`,`reply`) VALUES 
 (1,'祝红涛','http://www.itzcn.com','你好，想和你的留言本做个连接交换。我的已做好，窗内学院。','2011-08-14 00:00:00','交换友情连接','你的窗内学院，做的不错嘛，非常有特色。能和这样的网站做连接，非常荣幸。'),
 (2,'zht','http://www.itzcn.com','这个留言本真不错呀。','2011-08-07 00:00:00','留言测试 ',NULL);
/*!40000 ALTER TABLE `tb_messages` ENABLE KEYS */;


 

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
