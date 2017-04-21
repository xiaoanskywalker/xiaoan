SET time_zone = "+00:00";
DROP TABLE IF EXISTS `wtb_general_settings`;
CREATE TABLE IF NOT EXISTS `wtb_general_settings` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `wtb_general_settings` (`gid`, `name`, `keywords`, `description`) VALUES
(1, '小安社区', '小安社区', '小安社区，追求简单、极致');

DROP TABLE IF EXISTS `wtb_messages`;
CREATE TABLE IF NOT EXISTS `wtb_messages` (
  `postuser` text NOT NULL,
  `getuser` text NOT NULL,
  `message` text NOT NULL,
  `ifread` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `wtb_reply`;
CREATE TABLE IF NOT EXISTS `wtb_reply` (
  `rid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `user` text NOT NULL,
  `reply` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `wtb_titles`;
CREATE TABLE IF NOT EXISTS `wtb_titles` (
  `tid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `users` text NOT NULL,
  `titles` text NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `posts` text NOT NULL,
  `topictype` int(11) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `wtb_topic_settings`;
CREATE TABLE IF NOT EXISTS `wtb_topic_settings` (
  `tsid` int(11) NOT NULL DEFAULT '0',
  `prefix` text,
  PRIMARY KEY (`tsid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `wtb_topic_settings` (`tsid`, `prefix`) VALUES
(1, '【发帖前缀】');

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