-- ----------------------------------------------------------------------
-- MySQL Migration Toolkit
-- SQL Create Script
-- ----------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;

CREATE DATABASE IF NOT EXISTS `picturesdb`
  CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `picturesdb`;
-- -------------------------------------
-- Tables

DROP TABLE IF EXISTS `picturesdb`.`friends`;
CREATE TABLE `picturesdb`.`friends` (
  `friendid` INT(11) NOT NULL AUTO_INCREMENT,
  `userid` INT(11) NOT NULL,
  `otheruserid` INT(11) NOT NULL,
  PRIMARY KEY (`friendid`)
)
ENGINE = INNODB;

DROP TABLE IF EXISTS `picturesdb`.`messages`;
CREATE TABLE `picturesdb`.`messages` (
  `messageid` INT(11) NOT NULL AUTO_INCREMENT,
  `touserid` INT(11) NOT NULL,
  `fromuserid` INT(11) NOT NULL,
  `subject` TEXT NOT NULL,
  `body` LONGTEXT NOT NULL,
  `isread` TINYINT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`messageid`)
)
ENGINE = INNODB;

DROP TABLE IF EXISTS `picturesdb`.`pictures`;
CREATE TABLE `picturesdb`.`pictures` (
  `pictureid` INT(11) NOT NULL AUTO_INCREMENT,
  `userid` INT(11) NOT NULL,
  `description` TEXT NOT NULL,
  `filepath` TEXT NOT NULL,
  `filesize` DOUBLE NOT NULL,
  `filetype` TEXT NOT NULL,
  `public` TINYINT(1) NOT NULL DEFAULT '0',
  `filename` TEXT NOT NULL,
  `isProfilePic` TINYINT(1) NOT NULL DEFAULT '0',
  `thumbPath` TEXT NOT NULL,
  PRIMARY KEY (`pictureid`)
)
ENGINE = INNODB;

DROP TABLE IF EXISTS `picturesdb`.`users`;
CREATE TABLE `picturesdb`.`users` (
  `userid` INT(11) NOT NULL AUTO_INCREMENT,
  `name` TEXT NOT NULL,
  `email` TEXT NOT NULL,
  `password` TEXT NOT NULL,
  `lastLogin` DATETIME NOT NULL,
  PRIMARY KEY (`userid`)
)
ENGINE = INNODB;



SET FOREIGN_KEY_CHECKS = 1;

-- ----------------------------------------------------------------------
-- EOF

