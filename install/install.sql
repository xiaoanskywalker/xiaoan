SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
DROP TABLE IF EXISTS `wtb_general_settings`;
DROP TABLE IF EXISTS `wtb_messages`;
DROP TABLE IF EXISTS `wtb_reply`;
DROP TABLE IF EXISTS `wtb_titles`;
DROP TABLE IF EXISTS `wtb_userinfo`;
DROP TABLE IF EXISTS `wtb_users`;
DROP TABLE IF EXISTS `wtb_topic_settings`;
CREATE TABLE IF NOT EXISTS `wtb_topic_settings` (`tsid` int(11) DEFAULT NULL,`prefix` text) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `wtb_topic_settings` (`tsid`, `prefix`) VALUES(1, null);
CREATE TABLE IF NOT EXISTS `wtb_general_settings` (`gid` int(11) NOT NULL AUTO_INCREMENT,`name` text NOT NULL,`keywords` text NOT NULL,`description` text NOT NULL,`linkname` text NOT NULL,`linkurl` text NOT NULL,PRIMARY KEY (`gid`)) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
INSERT INTO `wtb_general_settings` (`gid`, `name`, `keywords`, `description`, `linkname`, `linkurl`) VALUES(1, '小安社区', '您的站点', '小安社区，追求简单、极致', '小安社区', 'http://xiaoanbbs.cn');
CREATE TABLE IF NOT EXISTS `wtb_messages` (`postuser` text NOT NULL,`getuser` text NOT NULL,`message` text NOT NULL,`ifread` int(11) NOT NULL,`time` datetime NOT NULL,`tid` int(11) NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `wtb_reply` (`rid` mediumint(8) NOT NULL AUTO_INCREMENT,`tid` int(11) NOT NULL,`user` text NOT NULL,`reply` text NOT NULL,`date` datetime NOT NULL,PRIMARY KEY (`rid`)) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;
CREATE TABLE IF NOT EXISTS `wtb_titles` (`tid` mediumint(8) NOT NULL AUTO_INCREMENT,`users` text NOT NULL,`titles` text NOT NULL,`date` datetime NOT NULL DEFAULT '0000-00-00 00:00:01',`posts` text NOT NULL,`topictype` int(11) NOT NULL,PRIMARY KEY (`tid`)) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;
CREATE TABLE IF NOT EXISTS `wtb_userinfo` (`uid` int(11) NOT NULL,`sex` int(11) NOT NULL,`birthday` date NOT NULL,`regtime` datetime NOT NULL,`email` text NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `wtb_users` (`uid` mediumint(8) NOT NULL AUTO_INCREMENT,`usr` text NOT NULL,`pwd` text NOT NULL,`email` text NOT NULL,`admingp` int(11) NOT NULL, PRIMARY KEY (`uid`)) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;
