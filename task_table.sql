-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 27 mai 2021 à 00:44
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `todo`
--

-- --------------------------------------------------------

--
-- Structure de la table `task_table`
--

DROP TABLE IF EXISTS `task_table`;
CREATE TABLE IF NOT EXISTS `task_table` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(300) NOT NULL,
  `task_description` varchar(30000) NOT NULL,
  `added_tiime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_begin` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `statut` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `task_table`
--

INSERT INTO `task_table` (`id`, `task_name`, `task_description`, `added_tiime`, `date_begin`, `date_end`, `statut`) VALUES
(32, 'mangÃ©', 'tous les jours', '2021-05-24 15:17:03', '2021-02-01', '2021-09-30', 1),
(33, 'Ã©tudier', 'tous les jours', '2021-05-24 15:21:25', '2021-05-18', '2021-06-11', 2),
(34, 'dte', 'ednhdetjhthjte', '2021-05-24 15:21:25', '2021-05-18', '2021-06-19', 3),
(35, 'visione', '', '2021-05-24 15:48:01', '2021-05-18', '2021-07-10', 1),
(36, '', 'matin midi soir', '2021-05-24 15:48:01', '2021-05-17', '2021-07-10', 12),
(39, 'visionnÃ©', 'tous les jours', '2021-05-26 15:51:16', '2021-05-10', '2021-07-16', 3),
(41, 'rien', '', '2021-05-26 19:24:49', '2021-05-04', '2021-06-18', 2),
(42, 'ikycccccccc', 'fffffffffffffffffffffffffffffffffffffffffff', '2021-05-26 20:49:57', '2021-05-03', '2021-07-09', 2),
(43, 'mangÃ©', 'matin midi sor', '2021-05-26 22:36:41', '2021-05-03', '2021-05-15', 11),
(44, 'ddddddd', '', '2021-05-26 23:17:00', '2021-05-02', '2021-05-29', 12),
(47, 'rummmsssssssssssssswwwwwwwwww', '', '2021-05-27 00:00:22', NULL, NULL, 1),
(48, 'borche', 'matin midi sor', '2021-05-27 00:41:52', '2021-05-04', '2021-07-10', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
