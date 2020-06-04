SET NAMES utf8;
SET FOREIGN_KEY_CHECKS=0;


DROP TABLE IF EXISTS `reai_user`;
CREATE TABLE `reai_user` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(35)  DEFAULT '1610017000@qq.com',
  `status` smallint(2) DEFAULT 0,
  `time` int(10) unsigned NOT NULL,
  `ip` varchar(20) NOT NULL,
  `encrypt` char(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `reai_article` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL DEFAULT '0',
  `author` char(10) NOT NULL DEFAULT '0',
  `label` varchar(80) NOT NULL DEFAULT '0',
  `type` char(20) NOT NULL DEFAULT '暂无',
  `cateid` int(5) DEFAULT NULL,
  `status` char(10) NOT NULL DEFAULT '0',
  `content` text,
  `time` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `recommend` int(2) DEFAULT '1',
  `coverimg` varchar(100) DEFAULT NULL,
  `slideimg` varchar(100) DEFAULT NULL,
  `zan` int(6) DEFAULT '0',
  `comment` int(6) DEFAULT '0',
  `traffic` int(7) DEFAULT '0',
  `file` varchar(100) DEFAULT NULL,
  `filename` varchar(20) DEFAULT NULL,
  `filesize` varchar(20) DEFAULT NULL,
  `download` int(7) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `reai_artlabel` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `labelname` char(20) NOT NULL DEFAULT '0',
  `labelid` smallint(5) NOT NULL DEFAULT '0',
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `reai_arttype` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `typename` char(30) NOT NULL DEFAULT '0',
  `cateid` smallint(5) NOT NULL DEFAULT '0',
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `reai_basic` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `webname` varchar(20) NOT NULL DEFAULT '0',
  `basicid` smallint(1) DEFAULT '1',
  `description` varchar(100) NOT NULL DEFAULT '0',
  `keywords` varchar(100) NOT NULL DEFAULT '0',
  `url` varchar(100) NOT NULL DEFAULT '0',
  `artcopyright` varchar(200) NOT NULL DEFAULT '0',
  `copyright` varchar(200) NOT NULL DEFAULT '0',
  `lbstatus` char(5) NOT NULL DEFAULT 'true',
  `status` char(5) NOT NULL DEFAULT 'true',
  `weblogo` varchar(100) DEFAULT NULL,
  `template` varchar(20) DEFAULT 'default',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `reai_basic` (`id`, `webname`, `basicid`, `description`, `keywords`, `url`, `artcopyright`, `copyright`, `lbstatus`, `status`, `weblogo`,`template`) VALUES
	(1, '热爱CMS——zreai.com', 1, '热爱CMS网站描述', '热爱CMS——zreai.com', 'http://localhost', '热爱CMS文章版权', '热爱CMS底部版权', 'true', 'true', '\\public\\system/weblogo/logo.png','default');


CREATE TABLE IF NOT EXISTS `reai_liuyan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` char(30) NOT NULL,
  `time` char(30) NOT NULL,
  `ip` char(30) NOT NULL,
  `uid` int(10) NOT NULL,
  `content` varchar(200) NOT NULL,
  `status` int(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `reai_menu` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `menuname` char(10) NOT NULL,
  `url` varchar(100) NOT NULL,
  `order` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

