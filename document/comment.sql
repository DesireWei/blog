-- 留言板，建表
CREATE TABLE `blog_comment`(
	`comment_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`username` VARCHAR(30) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	`subject` VARCHAR(255) NOT NULL,
	`message` TEXT NOT NULL,
	`status` TINYINT NOT NULL DEFAULT 0
) ENGINE=INNODB DEFAULT CHARSET=utf8;

-- 修改表
ALTER TABLE `blog_comment` ADD `addtime` INT NOT NULL AFTER `status`;