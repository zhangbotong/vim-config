-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014-10-30 15:20:03
-- 服务器版本： 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rocboss`
--

-- --------------------------------------------------------

--
-- 表的结构 `roc_balance`
--

CREATE TABLE IF NOT EXISTS `roc_balance` (
  `bid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `balance` mediumint(8) NOT NULL,
  `changed` mediumint(8) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `roc_balance`
--

INSERT INTO `roc_balance` (`bid`, `uid`, `type`, `balance`, `changed`, `time`) VALUES
(1, 2, 1, 20, 20, 1414564118),
(2, 2, 3, 22, 2, 1414564474),
(3, 2, 3, 24, 2, 1414567413);

-- --------------------------------------------------------

--
-- 表的结构 `roc_club`
--

CREATE TABLE IF NOT EXISTS `roc_club` (
  `cid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `clubname` char(26) NOT NULL,
  `position` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`cid`),
  UNIQUE KEY `clubname` (`clubname`),
  KEY `position` (`position`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `roc_club`
--

INSERT INTO `roc_club` (`cid`, `clubname`, `position`) VALUES
(1, '微世界', 1);

-- --------------------------------------------------------

--
-- 表的结构 `roc_commend`
--

CREATE TABLE IF NOT EXISTS `roc_commend` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `tid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`,`uid`,`tid`),
  KEY `uid` (`uid`),
  KEY `fuid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `roc_favorite`
--

CREATE TABLE IF NOT EXISTS `roc_favorite` (
  `fid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `fuid` mediumint(8) NOT NULL,
  `uid` mediumint(8) NOT NULL,
  `tid` mediumint(8) NOT NULL,
  PRIMARY KEY (`fid`),
  KEY `fuid` (`fuid`,`fid`),
  KEY `id` (`tid`,`fuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `roc_follow`
--

CREATE TABLE IF NOT EXISTS `roc_follow` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `fuid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`fuid`),
  KEY `uid` (`uid`),
  KEY `fuid` (`fuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `roc_notification`
--

CREATE TABLE IF NOT EXISTS `roc_notification` (
  `nid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `atuid` mediumint(8) NOT NULL,
  `uid` mediumint(8) NOT NULL,
  `tid` mediumint(8) NOT NULL,
  `pid` mediumint(8) NOT NULL,
  `isread` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0',
  PRIMARY KEY (`nid`),
  KEY `atuid` (`atuid`,`isread`,`nid`),
  KEY `tid` (`tid`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `roc_reply`
--

CREATE TABLE IF NOT EXISTS `roc_reply` (
  `pid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `tid` mediumint(8) NOT NULL,
  `uid` mediumint(8) NOT NULL,
  `message` varchar(200) NOT NULL,
  `pictures` varchar(265) NOT NULL,
  `client` varchar(14) NOT NULL,
  `posttime` int(10) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `tid` (`tid`,`pid`),
  KEY `uid` (`uid`,`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `roc_resetpwd`
--

CREATE TABLE IF NOT EXISTS `roc_resetpwd` (
  `uid` mediumint(8) NOT NULL,
  `code` char(32) NOT NULL,
  `dateline` int(10) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `roc_topic`
--

CREATE TABLE IF NOT EXISTS `roc_topic` (
  `tid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `cid` mediumint(8) NOT NULL,
  `message` text NOT NULL,
  `pictures` varchar(265) NOT NULL,
  `client` varchar(14) NOT NULL,
  `posttime` int(11) NOT NULL,
  `lasttime` int(11) NOT NULL,
  `istop` tinyint(1) unsigned zerofill NOT NULL,
  `comments` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`,`cid`),
  KEY `uid` (`uid`,`tid`),
  KEY `cid` (`cid`,`lasttime`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `roc_topic`
--

INSERT INTO `roc_topic` (`tid`, `uid`, `cid`, `message`, `pictures`, `client`, `posttime`, `lasttime`, `istop`, `comments`) VALUES
(1, 2, 1, 'woshi', '', '', 1414564474, 1414564474, 0, 0),
(2, 2, 1, 'sldfgjd [p][ 2014年10月29日 15:23:58最后修改 ]', '', '', 1414567413, 1414567413, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `roc_user`
--

CREATE TABLE IF NOT EXISTS `roc_user` (
  `uid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `nickname` char(26) NOT NULL,
  `email` char(36) NOT NULL,
  `signature` varchar(32) NOT NULL,
  `password` char(32) NOT NULL,
  `regtime` int(11) NOT NULL,
  `lasttime` int(11) NOT NULL,
  `qqid` char(32) NOT NULL,
  `money` mediumint(8) NOT NULL,
  `groupid` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `nickname` (`nickname`),
  KEY `email` (`email`),
  KEY `qqid` (`qqid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `roc_user`
--

INSERT INTO `roc_user` (`uid`, `nickname`, `email`, `signature`, `password`, `regtime`, `lasttime`, `qqid`, `money`, `groupid`) VALUES
(1, 'admin', '913600299@qq.com', '我是站长！', '06adf8d0a71507dfc7702545c440053c', 1414564038, 1414564038, '', 20, 9),
(2, '张航', '1679195580@qq.com', '', 'e10adc3949ba59abbe56e057f20f883e', 1414564118, 1414567413, '', 24, 1);

-- --------------------------------------------------------

--
-- 表的结构 `roc_whisper`
--

CREATE TABLE IF NOT EXISTS `roc_whisper` (
  `wid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `atuid` mediumint(8) NOT NULL,
  `uid` mediumint(8) NOT NULL,
  `message` varchar(255) NOT NULL,
  `posttime` int(11) NOT NULL,
  `isread` tinyint(1) NOT NULL DEFAULT '0',
  `del_flag` mediumint(8) NOT NULL,
  PRIMARY KEY (`wid`),
  KEY `atuid` (`atuid`,`isread`,`wid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
