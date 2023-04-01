-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 01 avr. 2023 à 12:24
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `urls`
--

DROP TABLE IF EXISTS `urls`;
CREATE TABLE IF NOT EXISTS `urls` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `long_url` varchar(255) NOT NULL,
  `short_url` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `short_url` (`short_url`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `urls`
--

INSERT INTO `urls` (`id`, `user_id`, `long_url`, `short_url`) VALUES
(5, 1, 'http://localhost/taff/projet-php/url.php', '546704cc'),
(6, 1, 'http://localhost/taff/projet-php/login.php', 'a33951f5'),
(7, 1, 'http://localhost/taff/projet-php/logout.php', '4815b641'),
(8, 1, 'http://localhost/taff/projet-php/logout.php', 'a751bec6'),
(9, 1, 'http://localhost/phpmyadmin/index.php?route=/database/structure&server=1&db=projet&table=projet', 'b75ae0e6'),
(10, 1, 'https://chat.openai.com/chat/0c5dc58f-b426-497c-8199-ffe210535fb3', 'aaf3d7b5');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'Realex', '$2y$10$yGuDtGbXIQOvPjdQZyqwI.zsmXbv6Mb1E9swdZguIuE1WRkq7Pz3m'),
(2, 'Eva', '$2y$10$6w78NrRHuEsAfp8QGrGf4efaT1CUL8xUEMxeLEfDPYj3mK.UnSmGa'),
(3, 'Alexis', '$2y$10$Hjp.A7DWuejmsqg6Lgpoy.1.wniJTMqSD0GfkEHTCvv.7uqP7lJZa');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
