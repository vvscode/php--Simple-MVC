CREATE DATABASE `st_mvc`;

USE `st_mvc`;

DROP TABLE IF EXISTS `st_users`;

CREATE TABLE `st_users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(50) NOT NULL,
  `authkey` CHAR(32) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `isAdmin` TINYINT(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_LOGIN` (`login`),
  KEY `UNIQUE_NAME` (`name`)
) ENGINE=INNODB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `st_users` (
  `login`,
  `authkey`,
  `name`,
  `isAdmin`
) 
VALUES
  (
    'admin',
    'admin',
    'Главный администратор',
    1
  ),
  (
    'demo',
    'demo',
    'Демо пользователь',
    0
  ),
  (
    'user',
    'user',
    'Пользователь, просто пользователь',
    0
  ),
  (
    'test',
    'test',
    'Тестовый пользователь',
    0
  ),
  (
    'root',
    'R00t',
    'Самый самый главный',
    1
  );