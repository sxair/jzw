drop database  if exists jzw;
set names utf8; 
create database jzw;
use jzw;
CREATE TABLE  `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_card` char(18) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `question` varchar(55) NOT NULL,
  `answer` varchar(55) NOT NULL,
  `position` int(3) NOT NULL DEFAULT 0,
  `positionname` varchar(55) NOT NULL DEFAULT '',
  `type` tinyint NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name`(`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE  `checkid` (
  `id` int(10) NOT NULL,
  `id_card` char(18) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES `user`(`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `zhaogong` (
	`zhaogong_id` int(10) NOT NULL AUTO_INCREMENT,
	`createtime` datetime NOT NULL,
	`user_id` int(10) NOT NULL,
	`title` char(50) NOT NULL,
	`type` int(2) NOT NULL DEFAULT 0,
	`name` char(20) NOT NULL,
	`sex` char(1) NOT NULL,
	`phone` bigint(13) NOT NULL,
	`qq` bigint(12) NOT NULL,
	`fgongzi` int(5) NOT NULL DEFAULT 0,
	`sgongzi` int(5) NOT NULL DEFAULT 0,
	`position` int(3) NOT NULL DEFAULT 0,
 	`positionname` varchar(55) NOT NULL ,
 	`jiedao` varchar(50) NOT NULL,
 	`xueli` int(1) NOT NULL DEFAULT 0,
 	`shisu` int(1) NOT NULL,
 	`content` text NOT NULL, 
 	`status` int(1) NOT NULL DEFAULT 0,
	PRIMARY KEY (`zhaogong_id`),
	FOREIGN KEY (`user_id`) REFERENCES `user`(`id`)
)ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `qiuzhi` (
	`qiuzhi_id` int(10) NOT NULL AUTO_INCREMENT,
	`createtime` datetime NOT NULL,
	`user_id` int(10) NOT NULL,
	`title` varchar(50) NOT NULL,
	`type` int(2) NOT NULL DEFAULT 0,
	`name` char(20) NOT NULL,
	`sex` char(1) NOT NULL,
	`birth` date NOT NULL,
	`phone` bigint(13) NOT NULL,
	`qq` bigint(12) ,
	`fgongzi` int(5) NOT NULL DEFAULT 0,
	`sgongzi` int(5) NOT NULL DEFAULT 0,
	`position` int(3) NOT NULL DEFAULT 0,
 	`positionname` varchar(55) NOT NULL DEFAULT '',
	`xueli` int(5) NOT NULL,
	`shisu` int(1) NOT NULL,
	`status` int(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (`qiuzhi_id`),
    FOREIGN KEY (`user_id`) REFERENCES `user`(`id`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `jiazhenggongsi` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`name` varchar(100) NOT NULL,
	`url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `jzadmin` (
	`id` char(20) NOT NULL,
	`password` char(32) NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
insert into `jzadmin` values ('admin','202cb962ac59075b964b07152d234b70');