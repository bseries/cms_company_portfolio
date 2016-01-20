CREATE TABLE `portfolio_projects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cover_media_id` int(11) unsigned NOT NULL,
  `order` int(11) unsigned DEFAULT NULL,
  `title` varchar(250) NOT NULL DEFAULT '',
  `client` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `teaser` text,
  `body` text NOT NULL,
  `is_promoted` tinyint(1) DEFAULT '0',
  `is_published` tinyint(1) DEFAULT '0',
  `published` date DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `is_published` (`is_published`),
  KEY `is_promoted` (`is_promoted`),
  KEY `order` (`order`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
