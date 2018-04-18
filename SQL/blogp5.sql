-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 05 avr. 2018 à 16:45
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blogp5`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `chapo` text,
  `content` mediumtext NOT NULL,
  `date_add` datetime NOT NULL,
  `date_edit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`article_id`, `title`, `author`, `chapo`, `content`, `date_add`, `date_edit`) VALUES
(1, 'Premier post', 'admin', 'A lire', 'lor sit amet, per ex nobis decore oportere. Odio stet contentiones eu mea. Ea error zril blandit mei, volumus explicari repudiandae no est, qui nonumy definitionem eu. Latine aeterno dignissim mea cu.\r\n\r\nDicunt officiis pri no, mei etiam delenit efficiantur et, audiam platonem ex mel. Ex tibique adolescens pri. Meis dicunt placerat vim at, rebum harum no sea, vel vitae gubergren ex. Pri dicit saepe vocibus eu, ius nulla tation minimum ne. At mea purto brute appetere, eum et error possit percipitur.\r\n\r\nAtqui nobis semper an eos, usu error malorum at, vis eripuit aliquando at. Ne duis graecis sit, nam summo intellegebat cu. His no soluta graece, vel in oportere neglegentur. Mea te labitur petentium, ei commodo quaestio mea. Mel alia solet explicari at, ne vim altera possim repudiandae. Pericula adolescens vis ei, cu has ocurreret contentiones.\r\n\r\nOratio omnesque an quo, definitionem concludaturque sed ne, duo te atqui numquam voluptua. Nam no primis recusabo argumentum. Vidit patrioque argumentum in vim, partiendo liberavisse eu qui. Nec prompta senserit et, modo nihil corrumpit an qui, odio semper similique at nec. Vel ea postea ceteros torquatos, esse reprimique id mea. Ut suas malis persecuti pri.\r\n\r\nEt eligendi percipit qui. In vim case iusto nostrud, te sed debitis suavitate, quem prodesset dissentias eam et. Diam consequat usu te, tale tantas omnesque vis in. Has modus tibique iudicabit an, erat autem deterruisset ne pri, ancillae consetetur nec ne. Vero diceret maiestatis te sit.', '2018-04-05 14:55:49', '2018-04-05 18:40:30');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `date_add` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `date_edit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `FK_Comments_user_id` (`user_id`),
  KEY `FK_Comments_post_id` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `content`, `date_add`, `user_id`, `article_id`, `date_edit`, `author`) VALUES
(1, 'GJ', '2018-04-05 14:55:49', 1, 1, '2018-04-05 18:30:38', 'Jack');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `permission` smallint(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `date_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_edit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `permission`, `email`, `username`, `password`, `date_add`, `date_edit`) VALUES
(1, 1, 'example@example.com', 'Nana', 'ouioui', '2018-04-05 18:45:09', '2018-04-05 18:45:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
