-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 30 mars 2022 à 16:09
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
-- Base de données : `pagination_paris_8`
--

-- --------------------------------------------------------

--
-- Structure de la table `pagination`
--

DROP TABLE IF EXISTS `pagination`;
CREATE TABLE IF NOT EXISTS `pagination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pagination`
--

INSERT INTO `pagination` (`id`, `name`, `type`, `size`) VALUES
(4, 'docs/dir1/dir1.1/dir1.1.1/tree-3330097_1920-1024x768.jpg', 'jpg', '786432'),
(5, 'docs/dir1/dir1.1/mango-1239347_1920-1024x683.jpg', 'jpg', '699392'),
(6, 'docs/dir1/dir1.1/papaya-771145_1920-1024x683.jpg', 'jpg', '699392'),
(7, 'docs/dir1/dir1.1/passion-fruit-3519303_1920-1024x683.jpg', 'jpg', '699392'),
(8, 'docs/dir1/food-3062139_1920-1024x683.jpg', 'jpg', '699392'),
(10, 'docs/dir1/guava-2880259_1920-1024x683.jpg', 'jpg', '699392'),
(11, 'docs/dir2/ARS_breadfruit49.jpg', 'jpg', '295920'),
(12, 'docs/dir2/iStock-1278315370-758x426.jpg', 'jpg', '322908'),
(13, 'docs/dir2/vegetable-3559112_1920-1024x577.png', 'png', '590848'),
(14, 'docs/dir2/yams-1557440_1920-1024x687.jpg', 'jpg', '703488'),
(15, 'docs/dir3/dir3.1/dir3.1.1/slide4-mineolas%2520citrus%2520tangelo-ugli-lam2-019-main-12.jpg', 'jpg', '250000'),
(16, 'docs/dir3/dir3.1/dir3.1.1/slide5-durian-durio-zibethinus-Lam2-03-main-12365052.png', 'png', '250000'),
(17, 'docs/dir3/dir3.1/dir3.1.1/slide6-Physalis-peruviana-LAM1-main-12365074.jpg', 'jpg', '250000'),
(18, 'docs/dir3/dir3.1/dir3.1.1/slide8-papaye-carica-retouche-main-12365051.jpg', 'jpg', '250000'),
(19, 'docs/dir3/dir3.1/pomegranate-3383814_1920-1024x680.png', 'png', '696320'),
(20, 'docs/dir3/dir3.1/slide2-jujube-zizyphus-jujuba-retouche-main-12365055.jpg', 'jpg', '250000'),
(21, 'docs/dir3/dir3.1/slide3-fruit-de-la-passion-passiflora-edulis-main-12365075.jpeg', 'jpeg', '250000'),
(22, 'docs/dir3/iStock-1279674489-758x426.jpg', 'jpg', '322908'),
(23, 'docs/dir3/iStock-1283279353-758x426.png', 'png', '322908'),
(24, 'docs/dir3/kiwano-2128077_1920-1024x576.jpg', 'jpg', '589824'),
(25, 'docs/dir3/lychee-419611_1920-1024x681.png', 'png', '697344'),
(26, 'docs/iStock-1202274909-758x379.png', 'png', '287282'),
(27, 'docs/iStock-1277110221-758x379.png', 'png', '287282'),
(28, 'docs/uploads/0.PNG', 'PNG', '248000'),
(29, 'docs/uploads/0775 92 89 13.png', 'png', '1440000'),
(32, 'docs/uploads/3.png', 'png', '124416'),
(33, 'docs/uploads/4.png', 'png', '252168'),
(34, 'docs/uploads/5.png', 'png', '1358298'),
(35, 'docs/uploads/6.png', 'png', '360000'),
(36, 'docs/uploads/7.png', 'png', '5096101');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
