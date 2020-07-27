-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour cinema
CREATE DATABASE IF NOT EXISTS `cinema` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cinema`;

-- Listage de la structure de la table cinema. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_acteur` varchar(50) NOT NULL,
  `prenom_acteur` varchar(50) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `sexe` varchar(10) NOT NULL,
  PRIMARY KEY (`id_acteur`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.acteur : ~12 rows (environ)
/*!40000 ALTER TABLE `acteur` DISABLE KEYS */;
INSERT INTO `acteur` (`id_acteur`, `nom_acteur`, `prenom_acteur`, `date_naissance`, `sexe`) VALUES
	(1, 'Nance', 'Jack', '1970-12-21', 'masculin'),
	(2, 'Stewart', 'Charlotte', '1970-02-27', 'féminin'),
	(3, 'Watts', 'Naomi', '1968-09-28', 'féminin'),
	(4, 'Harring', 'Laura', '1964-03-31', 'féminin'),
	(5, 'Hopkins', 'Anthony', '1937-12-31', 'masculin'),
	(6, 'Hurt', 'John', '1940-01-22', 'masculin'),
	(7, 'Sarandon', 'Susan', '1946-10-04', 'féminin'),
	(8, 'Curry', 'Tim', '1946-04-19', 'masculin'),
	(9, 'Davis', 'Geena', '1956-01-21', 'féminin'),
	(10, 'Lynch', 'David', '1946-01-20', 'masculin'),
	(11, 'Jodorowsky', 'Alejandro', '1929-02-07', 'masculin'),
	(12, 'Doe', 'Jane', '1988-07-23', 'féminin');
/*!40000 ALTER TABLE `acteur` ENABLE KEYS */;

-- Listage de la structure de la table cinema. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_film`,`id_acteur`,`id_role`),
  KEY `casting_acteur0_FK` (`id_acteur`),
  KEY `casting_role1_FK` (`id_role`),
  CONSTRAINT `casting_acteur0_FK` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `casting_film_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `casting_role1_FK` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.casting : ~14 rows (environ)
/*!40000 ALTER TABLE `casting` DISABLE KEYS */;
INSERT INTO `casting` (`id_film`, `id_acteur`, `id_role`) VALUES
	(1, 1, 1),
	(1, 2, 2),
	(2, 3, 3),
	(2, 4, 4),
	(3, 5, 5),
	(3, 6, 6),
	(4, 7, 7),
	(5, 7, 9),
	(4, 8, 8),
	(5, 9, 10),
	(6, 10, 11),
	(8, 10, 13),
	(9, 10, 13),
	(7, 11, 13);
/*!40000 ALTER TABLE `casting` ENABLE KEYS */;

-- Listage de la structure de la table cinema. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `annee_sortie` date NOT NULL,
  `duree` int(11) NOT NULL,
  `synopsis` text,
  `affiche` varchar(255) DEFAULT NULL,
  `note` tinyint(4) DEFAULT NULL,
  `id_realisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `film_realisateur_FK` (`id_realisateur`),
  CONSTRAINT `film_realisateur_FK` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.film : ~9 rows (environ)
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` (`id_film`, `titre`, `annee_sortie`, `duree`, `synopsis`, `affiche`, `note`, `id_realisateur`) VALUES
	(1, 'Eraserhead', '1977-09-28', 89, NULL, NULL, NULL, 1),
	(2, 'Mulholland Drive', '2001-10-12', 146, NULL, NULL, NULL, 1),
	(3, 'Elephant Man', '1980-10-03', 124, NULL, NULL, NULL, 1),
	(4, 'The Rocky Horror Picture Show', '1975-08-14', 100, NULL, NULL, NULL, 2),
	(5, 'Thelma et Louise', '1991-08-29', 129, NULL, NULL, NULL, 3),
	(6, 'Lucky', '2017-12-13', 88, NULL, NULL, NULL, 4),
	(7, 'La montagne sacrée', '1974-01-16', 114, NULL, NULL, NULL, 5),
	(8, 'David Lynch: The Art Life', '2017-02-15', 88, NULL, NULL, NULL, 1),
	(9, 'What Did Jack Do?', '2020-01-20', 17, NULL, NULL, NULL, 1);
/*!40000 ALTER TABLE `film` ENABLE KEYS */;

-- Listage de la structure de la table cinema. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `nom_genre` varchar(32) NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.genre : ~13 rows (environ)
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
	(1, 'Comédie'),
	(2, 'Horreur'),
	(3, 'Fantastique'),
	(4, 'Western'),
	(5, 'Drame'),
	(6, 'Thriller'),
	(7, 'Musical'),
	(8, 'Familial'),
	(9, 'Biopic'),
	(10, 'Comédie dramatique'),
	(11, 'Comédie musicale'),
	(12, 'Aventure'),
	(13, 'Documentaire');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Listage de la structure de la table cinema. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_realisateur` varchar(50) NOT NULL,
  `prenom_realisateur` varchar(50) NOT NULL,
  `date_realisateur` date DEFAULT NULL,
  `sexe` varchar(10) NOT NULL,
  PRIMARY KEY (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.realisateur : ~5 rows (environ)
/*!40000 ALTER TABLE `realisateur` DISABLE KEYS */;
INSERT INTO `realisateur` (`id_realisateur`, `nom_realisateur`, `prenom_realisateur`, `date_realisateur`, `sexe`) VALUES
	(1, 'Lynch', 'David', '1946-01-20', 'masculin'),
	(2, 'Sharman', 'Jim', '1945-03-12', 'masculin'),
	(3, 'Scott', 'Ridley', '1937-11-30', 'masculin'),
	(4, 'Lynch', 'John Carroll', '1963-08-01', 'masculin'),
	(5, 'Jodorowsky', 'Alejandro', '1929-02-07', 'masculin');
/*!40000 ALTER TABLE `realisateur` ENABLE KEYS */;

-- Listage de la structure de la table cinema. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(100) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.role : ~13 rows (environ)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `nom_role`) VALUES
	(1, 'Henry Spencer'),
	(2, 'Mary X'),
	(3, 'Betty Elms'),
	(4, 'Rita'),
	(5, 'Dr. Frederick Treves'),
	(6, 'John Merrick, Elephant Man'),
	(7, 'Janet Weiss'),
	(8, 'Docteur Frank-N-Furter'),
	(9, 'Louise Sawyer'),
	(10, 'Thelma Dickinson'),
	(11, 'Howard'),
	(12, 'L\'alchimiste'),
	(13, 'David Lynch');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Listage de la structure de la table cinema. style_film
CREATE TABLE IF NOT EXISTS `style_film` (
  `id_genre` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  PRIMARY KEY (`id_genre`,`id_film`),
  KEY `style_film_film0_FK` (`id_film`),
  CONSTRAINT `style_film_film0_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `style_film_genre_FK` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.style_film : ~18 rows (environ)
/*!40000 ALTER TABLE `style_film` DISABLE KEYS */;
INSERT INTO `style_film` (`id_genre`, `id_film`) VALUES
	(2, 1),
	(3, 1),
	(5, 1),
	(3, 2),
	(5, 2),
	(6, 2),
	(9, 3),
	(1, 4),
	(7, 4),
	(11, 4),
	(10, 5),
	(5, 6),
	(3, 7),
	(5, 7),
	(12, 7),
	(9, 8),
	(13, 8),
	(5, 9);
/*!40000 ALTER TABLE `style_film` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
