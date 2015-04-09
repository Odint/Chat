-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 09 Avril 2015 à 13:47
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

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
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(32) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text NOT NULL,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `user`, `date`, `message`, `ip`) VALUES
(1, 'zerzer', '2015-04-07 10:06:14', 'sdfsdfsdfsdfsdfsdf', ''),
(2, 'dsfsdfsf', '2015-04-07 10:58:37', 'sdffdsfsdf', ''),
(3, 'test', '2015-04-07 11:11:22', 'test', ''),
(4, 'zerzer', '2015-04-07 11:15:06', 'zerzertre', ''),
(5, 'test', '2015-04-07 11:20:36', 'zetzetzetzet', ''),
(6, 'test', '2015-04-07 11:23:11', 'yoyoyoyo', ''),
(7, 'grtyrty', '2015-04-07 11:27:08', '', ''),
(8, 'grtyrty', '2015-04-07 11:31:43', 'sdfrefe', ''),
(9, 'zerze', '2015-04-07 11:39:13', 'tijirtjyr', ''),
(11, 'test10', '2015-04-07 12:20:20', '10 sa bug', ''),
(12, 'test', '2015-04-07 12:30:47', 'yo les mec', ''),
(13, 'test', '2015-04-07 12:31:21', 'bon a voir si sa marche\n', ''),
(14, 'test', '2015-04-07 12:31:36', 'je crois quil ya un petit temp de latence', ''),
(15, 'tes', '2015-04-07 12:32:25', 'bon a+++', ''),
(16, 'tt', '2015-04-07 12:33:33', 'test', ''),
(17, 'lali', '2015-04-07 12:34:40', 'yo', ''),
(18, '55', '2015-04-07 13:11:24', 'yohohohohoho', ''),
(19, 'rt', '2015-04-07 13:17:40', 'test selon jP', ''),
(20, 'rt', '2015-04-07 13:17:59', '??????', ''),
(21, 'retert', '2015-04-07 13:22:29', '????', '127.0.0.1'),
(22, 'JeanPhil', '2015-04-07 13:39:26', 'Propre !', '192.168.3.24'),
(23, 'JeanPhil', '2015-04-07 13:39:42', 'Hey hey hey', '192.168.3.24'),
(24, 'julien', '2015-04-07 13:39:52', 'coucou\n', '192.168.3.100'),
(25, 'retert', '2015-04-07 13:41:06', 'hgQSQSKDNQSLKD\nhdcbsdcsdcsdc', '127.0.0.1'),
(26, 'julien', '2015-04-07 13:41:46', 'lilili', '192.168.3.100'),
(27, 'd', '2015-04-08 09:43:43', 'fd', '::1'),
(28, 'fd', '2015-04-08 09:44:26', 'sdf', '::1'),
(29, 'sdf', '2015-04-08 09:45:01', 'sdfdsf', '::1'),
(30, 'dd', '2015-04-08 09:58:09', 'fdp', '::1'),
(31, 'dd', '2015-04-08 09:59:52', 'fdp', '::1'),
(32, 'dd', '2015-04-08 10:02:56', 'fdp', '::1'),
(33, 'sdf', '2015-04-08 10:10:06', 'tes qu''un fdp', '::1'),
(34, 't', '2015-04-08 10:11:33', 'test fdp', '::1'),
(35, 'ee', '2015-04-08 10:16:45', 'test [CensurÃ©]', '::1'),
(36, 'tt', '2015-04-08 12:10:33', 'fdp', '::1'),
(37, 'tt', '2015-04-08 12:13:20', 'con', '::1'),
(38, 'sdf', '2015-04-08 12:15:36', 'tetetet con', '::1'),
(39, 'sdf', '2015-04-08 12:16:20', 'test con', '::1'),
(40, 'tt', '2015-04-08 12:17:25', 'te con', '::1'),
(41, 'tete', '2015-04-08 12:22:40', 'espece de con', '::1'),
(43, 'k.aymane32', '2015-04-08 12:58:42', '''"''''''"ok', '::1'),
(49, 'k.aymane32', '2015-04-08 13:27:31', 'tes q''un con', '::1'),
(50, 'k.aymane32', '2015-04-08 13:51:15', 'bouscula', '::1'),
(51, 'k.aymane32', '2015-04-08 14:55:05', 'test', '::1'),
(52, 'k.aymane32', '2015-04-08 14:55:21', 'aeraer', '::1'),
(53, 'k.aymane32', '2015-04-09 07:34:03', 'salut \n', '::1'),
(54, 'k.aymane32', '2015-04-09 07:39:56', 'salut', '::1'),
(55, 'k.aymane32', '2015-04-09 07:40:09', 'test', '::1'),
(56, 'J.Chirac31', '2015-04-09 07:44:19', 'TEST yo', '192.168.3.24'),
(57, 'k.aymane32', '2015-04-09 08:04:00', 'test', '::1'),
(58, 'k.aymane32', '2015-04-09 08:04:20', 'test scroll', '::1'),
(59, 'k.aymane32', '2015-04-09 08:05:34', 'test', '::1'),
(60, 'k.aymane32', '2015-04-09 08:11:30', 'erzr', '::1'),
(61, 'k.aymane32', '2015-04-09 08:12:13', 'test', '::1'),
(62, 'k.aymane32', '2015-04-09 08:12:26', 'yo', '::1'),
(63, 'k.aymane32', '2015-04-09 08:15:52', 'yo', '::1'),
(64, 'k.aymane32', '2015-04-09 08:16:05', 'lalalala', '::1'),
(65, 'k.aymane32', '2015-04-09 08:16:39', 'testzer', '::1'),
(66, 'k.aymane32', '2015-04-09 08:16:53', 'test scroll', '::1'),
(67, 'k.aymane32', '2015-04-09 08:18:13', 'test scroll', '::1'),
(68, 'k.aymane32', '2015-04-09 08:23:34', 'yooyoyoyo', '::1'),
(69, 'k.aymane32', '2015-04-09 08:23:46', 'test scroll\n', '::1'),
(70, 'k.aymane32', '2015-04-09 08:24:52', 'test', '::1'),
(71, 'J.Chirac31', '2015-04-09 08:26:33', 'Oui pas mal bien jouÃ©', '192.168.3.24'),
(72, 'J.Chirac31', '2015-04-09 08:26:44', 'test', '192.168.3.24'),
(73, 'J.Chirac31', '2015-04-09 08:36:54', 'yo', '192.168.3.24'),
(74, 'k.aymane32', '2015-04-09 09:53:33', ':angry tu m''enerve', '::1'),
(75, 'k.aymane32', '2015-04-09 09:58:31', ':angry , :smile , :sad', '::1'),
(76, 'k.aymane32', '2015-04-09 10:08:18', 'encule, :smile', '::1'),
(77, 'k.aymane32', '2015-04-09 10:13:49', '@j.ouali34 yo bien', '::1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `login`, `nom`, `prenom`, `password`, `created_on`, `last_con`) VALUES
(31, 'J.Chirac31', 'Chirac', 'Jacques', '$2y$10$dIk6IE.CPcSTKNlC1tznPu18CCHTo24YVJvyCfq98NhMKDwrw35aG', '2015-04-08 13:42:49', '2015-04-09 10:37:03'),
(32, 'k.aymane32', 'aymane', 'khouaji', '$2y$10$nzspCxh9uvUTAzzWQWe/1OMnkPZPZlCJeW9O1TrgHxt58RVtIyxaq', '2015-04-08 14:43:04', '2015-04-09 13:33:54'),
(33, 'j.ouali33', 'ouali', 'julien', '$2y$10$YBsXj7wx1ywIt.DuOJdraOlaGkRH3ETE3m5chohhIcjBgKRBUnQ6S', '2015-04-08 16:11:42', '2015-04-08 16:11:42'),
(34, 'j.ouali34', 'ouali', 'julien', '$2y$10$1bN1g6S9RvXu61ulpbl3O.zmHcfrnaUS/dtxYQOa1.caJqO.kb9Aq', '2015-04-09 09:35:23', '2015-04-09 12:19:03'),
(35, 'd.sdfsdf35', 'sdfsdf', 'dsfsdf', '$2y$10$q2smpH.TLQPhqXEEDqLBX.N6tmyYuC//c6VRv3wRP2zuuQMjymNua', '2015-04-09 12:23:19', '2015-04-09 12:23:19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
