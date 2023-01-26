-- --------------------------------------------------------
-- Host:                         87.98.167.165
-- Server version:               10.1.48-MariaDB-0ubuntu0.18.04.1 - Ubuntu 18.04
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for wdpai
CREATE DATABASE IF NOT EXISTS `wdpai` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci */;
USE `wdpai`;

-- Dumping structure for function wdpai.CalcTasks
DELIMITER //
CREATE FUNCTION `CalcTasks`(user_id INT) RETURNS int(11)
BEGIN

   DECLARE users INT;

    SET users = (SELECT COUNT(*) FROM tasks WHERE user_id = user_id);


   RETURN users;

END//
DELIMITER ;

-- Dumping structure for table wdpai.session
CREATE TABLE IF NOT EXISTS `session` (
  `id_user` int(11) DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `expire` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id_user` (`id_user`),
  CONSTRAINT `FK_session_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- Dumping data for table wdpai.session: ~1 rows (approximately)
INSERT INTO `session` (`id_user`, `token`, `expire`) VALUES
	(7, '67e5c7d82aa7a6ee882a1a77691b0439a823fa9e4634fe445ca2cbd97cf4e71a', '2023-01-27 10:19:49');

-- Dumping structure for view wdpai.session_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `session_view` (
	`id` INT(11) NOT NULL,
	`username` VARCHAR(150) NULL COLLATE 'utf8mb4_polish_ci',
	`email` VARCHAR(255) NULL COLLATE 'utf8mb4_polish_ci',
	`password` VARCHAR(255) NULL COLLATE 'utf8mb4_polish_ci',
	`group` VARCHAR(50) NULL COLLATE 'utf8mb4_polish_ci',
	`id_user` INT(11) NULL,
	`token` VARCHAR(255) NULL COLLATE 'utf8mb4_polish_ci',
	`expire` TIMESTAMP NULL
) ENGINE=MyISAM;

-- Dumping structure for table wdpai.tasks
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `task_name` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `task_description` mediumtext COLLATE utf8mb4_polish_ci,
  `done` tinyint(4) DEFAULT '0',
  `task_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tasks_user` (`user_id`),
  CONSTRAINT `FK_tasks_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- Dumping data for table wdpai.tasks: ~6 rows (approximately)
INSERT INTO `tasks` (`id`, `user_id`, `task_name`, `task_description`, `done`, `task_date`) VALUES
	(1, 2, 'asd', 'asd', 0, '2023-01-24'),
	(4, 2, 'asdasd', 'asdasd', 1, '2023-01-29'),
	(13, 2, 'jkjkkk', 'ghggh', 1, '2023-01-25'),
	(14, 2, 'asfasf', 'asdasd', 0, '2023-01-26'),
	(15, 2, 'asdasdasd', 'asdasdasd', 1, '2023-01-25'),
	(16, 2, 'asdasdasd', 'asdasdasd', 1, '2023-01-25');

-- Dumping structure for table wdpai.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `group` varchar(50) COLLATE utf8mb4_polish_ci DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- Dumping data for table wdpai.users: ~5 rows (approximately)
INSERT INTO `users` (`id`, `username`, `email`, `password`, `group`) VALUES
	(2, 'admin', 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
	(3, 'kaiser', 'kkk@gmail.com', '12345', 'user'),
	(4, 'uzytnik', 'uzytnik@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
	(6, 'test_user', 'test_user@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
	(7, 'test_user2', 'test_user2@gmail.com', '202cb962ac59075b964b07152d234b70', 'user');

-- Dumping structure for table wdpai.user_history
CREATE TABLE IF NOT EXISTS `user_history` (
  `user_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- Dumping data for table wdpai.user_history: ~3 rows (approximately)
INSERT INTO `user_history` (`user_id`, `amount`, `time`) VALUES
	(5, 5, '2023-01-25 20:34:26'),
	(6, 6, '2023-01-26 11:17:39'),
	(7, 7, '2023-01-26 11:19:37');

-- Dumping structure for view wdpai.user_history_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `user_history_view` (
	`id` INT(11) NOT NULL,
	`username` VARCHAR(150) NULL COLLATE 'utf8mb4_polish_ci',
	`email` VARCHAR(255) NULL COLLATE 'utf8mb4_polish_ci',
	`password` VARCHAR(255) NULL COLLATE 'utf8mb4_polish_ci',
	`group` VARCHAR(50) NULL COLLATE 'utf8mb4_polish_ci',
	`user_id` INT(11) NULL,
	`amount` INT(11) NOT NULL,
	`time` TIMESTAMP NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for table wdpai.user_tasks
CREATE TABLE IF NOT EXISTS `user_tasks` (
  `user_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  KEY `FK__users` (`user_id`),
  KEY `FK__tasks` (`task_id`),
  CONSTRAINT `FK__tasks` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK__users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- Dumping data for table wdpai.user_tasks: ~0 rows (approximately)

-- Dumping structure for trigger wdpai.after_users_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `after_users_insert` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO `user_history` (user_id, amount) VALUES (NEW.id, NEW.id)//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for view wdpai.session_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `session_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `session_view` AS select `users`.`id` AS `id`,`users`.`username` AS `username`,`users`.`email` AS `email`,`users`.`password` AS `password`,`users`.`group` AS `group`,`session`.`id_user` AS `id_user`,`session`.`token` AS `token`,`session`.`expire` AS `expire` from (`users` join `session` on((`users`.`id` = `session`.`id_user`)));

-- Dumping structure for view wdpai.user_history_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `user_history_view`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `user_history_view` AS select `users`.`id` AS `id`,`users`.`username` AS `username`,`users`.`email` AS `email`,`users`.`password` AS `password`,`users`.`group` AS `group`,`user_history`.`user_id` AS `user_id`,`user_history`.`amount` AS `amount`,`user_history`.`time` AS `time` from (`users` join `user_history` on((`users`.`id` = `user_history`.`user_id`)));

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
