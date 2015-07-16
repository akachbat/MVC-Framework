-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.5.24-log - MySQL Community Server (GPL)
-- Serveur OS:                   Win32
-- HeidiSQL Version:             9.1.0.4925
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de table mvc_framework. admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Export de données de la table mvc_framework.admin : 1 rows
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `login`, `password`, `email`, `description`) VALUES
	(1, 'adiligo', '88d1c0dbafdde7a9151d4a4ecbc593f18c5a420b', 'adil_igo@hotmail.com', '<p>Bonjour je m\'appele <b>Adil Kachbat</b></p>\r\n<p>Jeune marocain,etudiant en dÃ©vÃ©loppement informatique passionnÃ©\r\npar le web, et les nouvelles technologies.</p>\r\n<p><b>Pour me contacter </b><a href="contact.php">cliquer ici<a/></p>');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


-- Export de la structure de table mvc_framework. articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET latin1 NOT NULL,
  `contenu` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_creation` datetime NOT NULL,
  `tag` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='articles du blog';

-- Export de données de la table mvc_framework.articles : 2 rows
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `titre`, `contenu`, `date_creation`, `tag`) VALUES
	(24, 'Liquorice ice cream', 'Liquorice ice cream jelly jujubes tootsie roll lemon drops liquorice cake liquorice. Liquorice sugar plum marzipan pastry cookie apple pie. Pastry tiramisu soufflé tart danish. Pudding tootsie roll tiramisu sesame snaps oat cake lollipop lollipop jelly.', '2015-07-16 12:06:26', ''),
	(23, 'Pie halvah biscuit', 'Pie halvah biscuit candy dessert sweet roll gummies candy canes. Jelly beans candy macaroon tiramisu. Carrot cake gummi bears sugar plum. Oat cake jelly ice cream gingerbread toffee gummies tart.', '2015-07-16 12:05:43', '');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;


-- Export de la structure de table mvc_framework. commentaires
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `auteur` varchar(255) CHARACTER SET latin1 NOT NULL,
  `commentaire` text CHARACTER SET latin1 NOT NULL,
  `date_commentaire` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci COMMENT='les commentaires du blog';

-- Export de données de la table mvc_framework.commentaires : 4 rows
/*!40000 ALTER TABLE `commentaires` DISABLE KEYS */;
INSERT INTO `commentaires` (`id`, `id_article`, `auteur`, `commentaire`, `date_commentaire`) VALUES
	(40, 23, 'annother guest', 'lorem', '2015-07-16 12:29:49'),
	(39, 23, 'guest', 'Carrot cake gummi bears sugar plum', '2015-07-16 12:27:05');
/*!40000 ALTER TABLE `commentaires` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
