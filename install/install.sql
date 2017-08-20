/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /install/install.sql
 */
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*
DROP TABLE IF EXISTS `wtb_blockuser`
CREATE TABLE IF NOT EXISTS `wtb_blockuser` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `blockuid` int(11) NOT NULL,
  `startblock` datetime NOT NULL,
  `endblock`datetime NOT NULL,
  `operateuid` int(11) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
*/

DROP TABLE IF EXISTS `wtb_reply`;
CREATE TABLE IF NOT EXISTS `wtb_reply` (
  `rid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `user` text NOT NULL,
  `reply` text NOT NULL,
  `date` datetime NOT NULL,
  `ifread` int(11) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `wtb_settings`;
CREATE TABLE IF NOT EXISTS `wtb_settings` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `webname` text NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `prefix` text,
  `opened` int(11) NOT NULL,
  `allowpost` int(11) NOT NULL,
  `allowreg` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `wtb_titles`;
CREATE TABLE IF NOT EXISTS `wtb_titles` (
  `tid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `users` text NOT NULL,
  `titles` text NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `posts` text NOT NULL,
  `topictype` int(11) NOT NULL COMMENT '0：被删除贴1：普通贴2：置顶帖3：精华帖4:置顶精华帖',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `wtb_users`;
CREATE TABLE IF NOT EXISTS `wtb_users` (
  `uid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `usr` text NOT NULL,
  `pwd` text NOT NULL,
  `email` text NOT NULL,
  `admingp` int(11) NOT NULL,
  `sex` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `regtime` datetime NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;