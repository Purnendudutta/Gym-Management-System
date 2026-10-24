-- Database Table Schema — FITNESS FREEK (Deep Red Edition)

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Table structure for table `user_form`
CREATE TABLE IF NOT EXISTS `user_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Admin account with Purnendu Dutta
INSERT INTO `user_form` (`name`, `email`, `password`, `user_type`) VALUES
('Purnendu Dutta', 'purnendudutta521@gmail.com', MD5('Purnendu@521'), 'admin')
ON DUPLICATE KEY UPDATE 
  `name` = 'Purnendu Dutta',
  `password` = MD5('Purnendu@521'),
  `user_type` = 'admin';

COMMIT;
