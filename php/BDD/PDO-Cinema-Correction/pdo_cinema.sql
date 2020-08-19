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
  `date_acteur` date DEFAULT NULL,
  `sexe_acteur` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_acteur`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.acteur : ~15 rows (environ)
/*!40000 ALTER TABLE `acteur` DISABLE KEYS */;
INSERT INTO `acteur` (`id_acteur`, `nom_acteur`, `prenom_acteur`, `date_acteur`, `sexe_acteur`) VALUES
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
	(12, 'Doe', 'Jane', '1988-07-23', 'féminin'),
	(15, 'Willis', 'Bruce', '1955-03-19', 'masculin'),
	(16, 'Bedelia', 'Bonnie', '1946-03-25', 'féminin'),
	(17, 'Veljohnson', 'Reginald', '1952-08-16', 'masculin');
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
  `titre_film` varchar(50) NOT NULL,
  `annee_film` year(4) NOT NULL,
  `duree_film` int(11) NOT NULL,
  `synopsis` text,
  `affiche_film` varchar(255) DEFAULT NULL,
  `note_film` tinyint(4) DEFAULT NULL,
  `id_realisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `film_realisateur_FK` (`id_realisateur`),
  CONSTRAINT `film_realisateur_FK` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.film : ~12 rows (environ)
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` (`id_film`, `titre_film`, `annee_film`, `duree_film`, `synopsis`, `affiche_film`, `note_film`, `id_realisateur`) VALUES
	(1, 'Eraserhead', '1977', 89, 'Un homme est abandonné par son amie qui lui laisse la charge d\'un enfant prématuré, fruit de leur union. Il s\'enfonce dans un univers fantasmatique pour fuir cette cruelle réalité.', 'http://fr.web.img4.acsta.net/r_1280_720/pictures/17/05/04/15/15/200444.jpg', 3, 1),
	(2, 'Mulholland Drive', '2001', 146, 'A Hollywood, durant la nuit, Rita, une jeune femme, devient amnésique suite à un accident de voiture sur la route de Mulholland Drive. Elle fait la rencontre de Betty Elms, une actrice en devenir qui vient juste de débarquer à Los Angeles. Aidée par celle-ci, Rita tente de retrouver la mémoire ainsi que son identité.', 'http://fr.web.img6.acsta.net/r_1280_720/pictures/17/04/27/14/07/500364.jpg', 2, 1),
	(3, 'Elephant Man', '1980', 124, 'Londres, 1884. Le chirurgien Frederick Treves découvre un homme complètement défiguré et difforme, devenu une attraction de foire. John Merrick, " le monstre ", doit son nom de Elephant Man au terrible accident que subit sa mère. Alors enceinte de quelques mois, elle est renversée par un éléphant. Impressionné par de telles difformités, le Dr. Treves achète Merrick, l\'arrachant ainsi à la violence de son propriétaire, et à l\'humiliation quotidienne d\'être mis en spectacle. Le chirurgien pense alors que " le monstre " est un idiot congénital. Il découvre rapidement en Merrick un homme meurtri, intelligent et doté d\'une grande sensibilité.', 'http://fr.web.img5.acsta.net/r_1280_720/pictures/20/02/21/16/48/4302324.jpg', 4, 1),
	(4, 'The Rocky Horror Picture Show', '1975', 100, 'Une nuit d\'orage, la voiture de Janet et Brad, un couple coincé qui vient de se fiancer, tombe en panne. Obligés de se réfugier dans un mystérieux château, ils vont faire la rencontre de ses occupants pour le moins bizarres, qui se livrent à de bien étranges expériences.', 'http://fr.web.img2.acsta.net/r_1280_720/pictures/16/03/18/15/10/179712.jpg', 4, 2),
	(5, 'Thelma et Louise', '1991', 129, 'Deux amies, Thelma et Louise, frustrées par une existence monotone l\'une avec son mari, l\'autre avec son petit ami, décident de s\'offrir un week-end sur les routes magnifiques de l\'Arkansas. Premier arrêt, premier saloon, premiers ennuis et tout bascule. Un événement tragique va changer définitivement le cours de leurs vies.', 'http://fr.web.img2.acsta.net/r_1280_720/medias/nmedia/18/65/66/86/20421156.jpg', 4, 3),
	(6, 'Lucky', '2017', 88, 'Lucky est un vieux cow-boy solitaire. Il fume, fait des mots croisés et déambule dans une petite ville perdue au milieu du désert. Il passe ses journées à refaire le monde avec les habitants du coin. Il se rebelle contre tout et surtout contre le temps qui passe.', 'http://fr.web.img6.acsta.net/r_1280_720/pictures/17/12/18/17/29/1842406.jpg', 3, 4),
	(7, 'La montagne sacrée', '1974', 114, 'Après une série de procès et de tribulations, un voleur vagabond rencontre un maître spirituel qui lui présente sept personnages riches et puissants, représentant une planète du système solaire. Ensemble ils entreprennent un pèlerinage vers la Montagne Sacrée afin d\'en déloger les dieux qui y demeurent et atteindre l\'immortalité.', 'http://fr.web.img2.acsta.net/r_1280_720/medias/nmedia/18/63/70/50/18697912.jpg', 3, 5),
	(8, 'David Lynch: The Art Life', '2017', 88, 'Le film documentaire David Lynch: The Art Life est un portrait inédit de l’un des cinéastes les plus énigmatiques de sa génération. De son enfance idyllique dans une petite ville d’Amérique aux rues sombres de Philadelphie, David Lynch nous entraîne dans un voyage intime rythmé par le récit hypnotique qu’il fait de ses jeunes années. En associant les œuvres plastiques et musicales de David Lynch à ses expériences marquantes, le film lève le voile sur les zones inexplorées d’un univers de création totale.', '', 4, 1),
	(9, 'What Did Jack Do?', '2020', 17, NULL, '', 2, 1),
	(14, 'Piège de Cristal', '1988', 120, 'John McClane, policier new-yorkais, est venu rejoindre sa femme Holly, dont il est séparé depuis plusieurs mois, pour les fêtes de Noël dans le secret espoir d&#39;une réconciliation. Celle-ci est cadre dans une multinationale japonaise, la Nakatomi Corporation. Son patron, M. Takagi, donne une soirée en l&#39;honneur de ses employés, à laquelle assiste McClane. Tandis qu&#39;il s&#39;isole pour téléphoner, un commando investit l&#39;immeuble et coupe toutes les communications avec l&#39;extérieur...', 'http://fr.web.img6.acsta.net/r_1024_576/pictures/14/08/14/12/00/419467.jpg', 5, 7),
	(25, '58 minutes pour vivre', '1990', 123, 'L&#39;inspecteur de police McClane attend que l&#39;avion de son épouse atterrisse dans un aéroport international proche de Washington. D&#39;étranges allers et venues attirent son attention. Il suit des hommes qui communiquent discrètement entre eux jusqu&#39;au sous-sol de l&#39;aéroport. Là, des inconnus tirent sur lui et des mercenaires prennent le contrôle de l&#39;aeroport, coupant toute communication avec l&#39;extérieur. Les passagers des avions prêts a l&#39;atterrissage, dont la femme de McClane, n&#39;ont plus que cinquante-huit minutes pour vivre !', 'http://fr.web.img6.acsta.net/r_1024_576/medias/nmedia/18/36/04/14/19052566.jpg', 5, 8);
/*!40000 ALTER TABLE `film` ENABLE KEYS */;

-- Listage de la structure de la table cinema. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `nom_genre` varchar(32) NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.genre : ~14 rows (environ)
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
	(1, 'Comédie'),
	(2, 'Horreur'),
	(3, 'Fantastique'),
	(5, 'Drame'),
	(6, 'Thriller'),
	(7, 'Musical'),
	(8, 'Familial'),
	(9, 'Biopic'),
	(10, 'Comédie dramatique'),
	(11, 'Comédie musicale'),
	(12, 'Aventure'),
	(13, 'Documentaire'),
	(14, 'Science-Fiction'),
	(15, 'Western'),
	(17, 'Action');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Listage de la structure de la table cinema. genre_film
CREATE TABLE IF NOT EXISTS `genre_film` (
  `id_genre` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  PRIMARY KEY (`id_genre`,`id_film`),
  KEY `style_film_film0_FK` (`id_film`),
  CONSTRAINT `style_film_film0_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `style_film_genre_FK` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.genre_film : ~23 rows (environ)
/*!40000 ALTER TABLE `genre_film` DISABLE KEYS */;
INSERT INTO `genre_film` (`id_genre`, `id_film`) VALUES
	(2, 1),
	(3, 1),
	(5, 1),
	(3, 2),
	(5, 2),
	(6, 2),
	(5, 3),
	(9, 3),
	(12, 3),
	(1, 4),
	(7, 4),
	(11, 4),
	(10, 5),
	(5, 6),
	(3, 7),
	(5, 7),
	(9, 8),
	(13, 8),
	(5, 9),
	(6, 14),
	(17, 14),
	(6, 25),
	(17, 25);
/*!40000 ALTER TABLE `genre_film` ENABLE KEYS */;

-- Listage de la structure de la table cinema. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_realisateur` varchar(50) NOT NULL,
  `prenom_realisateur` varchar(50) NOT NULL,
  `date_realisateur` date DEFAULT NULL,
  `sexe_realisateur` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.realisateur : ~5 rows (environ)
/*!40000 ALTER TABLE `realisateur` DISABLE KEYS */;
INSERT INTO `realisateur` (`id_realisateur`, `nom_realisateur`, `prenom_realisateur`, `date_realisateur`, `sexe_realisateur`) VALUES
	(1, 'Lynch', 'David', '1946-01-20', 'masculin'),
	(2, 'Sharman', 'Jim', '1945-03-12', 'masculin'),
	(3, 'Scott', 'Ridley', '1937-11-30', 'masculin'),
	(4, 'Lynch', 'John Carroll', '1963-08-01', 'masculin'),
	(5, 'Jodorowsky', 'Alejandro', '1929-02-07', 'masculin'),
	(7, 'McTiernan', 'John', NULL, NULL),
	(8, 'Harlin', 'Renny', NULL, NULL);
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

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
