-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 20 nov. 2024 à 14:55
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
-- Base de données : `site_marchand`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int DEFAULT NULL,
  `date_commande` date DEFAULT NULL,
  `produit` varchar(255) DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `description` text,
  `prix` decimal(10,2) NOT NULL,
  `stock` int NOT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `prix`, `stock`, `categorie`, `image_url`) VALUES
(1, 'One Piece tome 1', 'Tome 1', '7.00', 1, 'One piece', '/site-marchand/img/opt1.jpg'),
(2, 'One Piece tome 2', 'Tome 2', '7.00', 5, 'One piece', '/site-marchand/img/opt2.jpg'),
(3, 'One Piece tome 3', 'Tome 3', '7.00', 3, 'One piece', '/site-marchand/img/opt3.jpg'),
(4, 'One piece tome 4', 'Tome 4 ', '7.00', 7, 'One piece', '/site-marchand/img/opt4.jpg'),
(5, 'One piece tome 5', 'Tome 5', '7.00', 9, 'One piece', '/site-marchand/img/opt5.jpg'),
(6, 'Naruto tome 1', 'Tome 1', '3.00', 60, 'Naruto', '/site-marchand/img/nt1.jpg'),
(7, 'Naruto tome 2', 'Tome 2', '3.00', 99, 'Naruto', '/site-marchand/img/nt2.jpg'),
(8, 'Naruto tome 3', 'Tome 3', '3.00', 54, 'Naruto', '/site-marchand/img/nt3.jpg'),
(9, 'Naruto tome 4', 'Tome 4', '3.00', 11, 'Naruto', '/site-marchand/img/nt4.jpg'),
(10, 'My Hero Academia tome 1', 'Tome 1', '6.95', 57, 'My hero academia', '/site-marchand/img/mhat1.jpg'),
(11, 'My Hero Academia tome 2', 'Tome 2', '6.95', 53, 'My hero academia', '/site-marchand/img/mhat2.jpg'),
(12, 'My Hero Academia tome 3', 'Tome 3', '6.95', 73, 'My hero academia', '/site-marchand/img/mhat3.jpg'),
(13, 'My Hero Academia tome 4', 'Tome 4', '6.95', 79, 'My hero academia', '/site-marchand/img/mhat4.jpg'),
(14, 'My Hero Academia tome 5', 'Tome 5', '6.95', 91, 'My hero academia', '/site-marchand/img/mhat5.jpg'),
(15, 'Dragon Ball Z tome 1 ', 'Tome 1', '10.00', 21, 'Dragon Ball Z', '/site-marchand/img/dbz1.jpg'),
(16, 'Dragon Ball Z tome 2', 'Tome 2', '10.00', 81, 'Dragon Ball Z', '/site-marchand/img/dbz2.jpg'),
(17, 'Dragon Ball Z tome 3', 'Tome 3', '10.00', 14, 'Dragon Ball Z', '/site-marchand/img/dbz3.jpg'),
(18, 'Dragon Ball Z tome 4', 'Tome 4', '10.00', 16, 'Dragon Ball Z', '/site-marchand/img/dbz4.jpg'),
(19, 'Dragon Ball Z tome 5', 'Tome 5', '10.00', 67, 'Dragon Ball Z', '/site-marchand/img/dbz5.jpg'),
(20, 'Jujutsu Kaisen tome 1', 'Tome 1', '6.95', 60, 'Jujutsu Kaisen', '/site-marchand/img/jkt1.jpg'),
(21, 'Jujutsu Kaisen tome 2', 'Tome 2', '6.95', 67, 'Jujutsu Kaisen', '/site-marchand/img/jkt2.jpg'),
(22, 'Jujutsu Kaisen tome 3', 'Tome 3', '6.95', 10, 'Jujutsu Kaisen', '/site-marchand/img/jkt3.jpg'),
(23, 'Jujutsu Kaisen tome 4', 'Tome 4', '6.95', 17, 'Jujutsu Kaisen', '/site-marchand/img/jkt4.jpg'),
(24, 'Jujutsu Kaisen tome 5', 'Tome 5', '6.95', 56, 'Jujutsu Kaisen', '/site-marchand/img/jkt5.jpg'),
(25, 'Jujutsu Kaisen tome 6', 'Tome 6', '6.95', 87, 'Jujutsu Kaisen', '/site-marchand/img/jkt6.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `identifiant` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
