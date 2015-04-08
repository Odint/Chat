-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 08 Avril 2015 à 16:31
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `last_con` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `login`, `nom`, `prenom`, `password`, `created_on`, `last_con`) VALUES
(31, 'J.Chirac31', 'Chirac', 'Jacques', '$2y$10$dIk6IE.CPcSTKNlC1tznPu18CCHTo24YVJvyCfq98NhMKDwrw35aG', '2015-04-08 13:42:49', '2015-04-08 16:31:58'),
(32, 'L.Jospin32', 'Jospin', 'Lionel', '$2y$10$MjWCgSXkr7pEH4..AIEEBuVWddgc8zhDhMnhTfPWeUaQ5MDbQH5Fu', '2015-04-08 14:14:37', '2015-04-08 15:11:31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
