-- 建库
CREATE DATABASE `myblog`;

-- 选库
USE `myblog`;

-- 用户表
CREATE TABLE blog_user(
	`user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`username` VARCHAR(255) NOT NULL UNIQUE,
	`password` VARCHAR(255) NOT NULL,
	`status` TINYINT NOT NULL,
	`addtime` INT NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8;

-- 添加1条数据
INSERT INTO `blog_user` (username, password, status, addtime) VALUES ('admin', md5('adminxdl'), 1, UNIX_TIMESTAMP());

-- 更新数据库的记录
UPDATE `blog_user` SET `password` = md5('adminxdl');