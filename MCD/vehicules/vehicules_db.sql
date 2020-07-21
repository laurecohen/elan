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


-- Listage de la structure de la base pour vehicules
CREATE DATABASE IF NOT EXISTS `vehicules` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `vehicules`;

-- Listage de la structure de la table vehicules. colorisation
CREATE TABLE IF NOT EXISTS `colorisation` (
  `id_couleur` int(11) NOT NULL,
  `id_voiture` int(11) NOT NULL,
  PRIMARY KEY (`id_couleur`,`id_voiture`),
  KEY `colorisation_voiture0_FK` (`id_voiture`),
  CONSTRAINT `colorisation_couleur_FK` FOREIGN KEY (`id_couleur`) REFERENCES `couleur` (`id_couleur`),
  CONSTRAINT `colorisation_voiture0_FK` FOREIGN KEY (`id_voiture`) REFERENCES `voiture` (`id_voiture`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table vehicules.colorisation : ~0 rows (environ)
/*!40000 ALTER TABLE `colorisation` DISABLE KEYS */;
INSERT INTO `colorisation` (`id_couleur`, `id_voiture`) VALUES
	(8, 1),
	(3, 2),
	(1, 3),
	(0, 4),
	(4, 4),
	(0, 5),
	(0, 6),
	(9, 7),
	(0, 8),
	(4, 8),
	(0, 9),
	(0, 10),
	(1, 11);
/*!40000 ALTER TABLE `colorisation` ENABLE KEYS */;

-- Listage de la structure de la table vehicules. couleur
CREATE TABLE IF NOT EXISTS `couleur` (
  `id_couleur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_couleur` varchar(50) NOT NULL,
  PRIMARY KEY (`id_couleur`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Listage des données de la table vehicules.couleur : ~0 rows (environ)
/*!40000 ALTER TABLE `couleur` DISABLE KEYS */;
INSERT INTO `couleur` (`id_couleur`, `nom_couleur`) VALUES
	(0, 'gris'),
	(1, 'blanc'),
	(2, 'noir'),
	(3, 'bleu'),
	(4, 'rouge'),
	(5, 'marron'),
	(6, 'beige'),
	(7, 'orange'),
	(8, 'vert'),
	(9, 'jaune');
/*!40000 ALTER TABLE `couleur` ENABLE KEYS */;

-- Listage de la structure de la table vehicules. marque
CREATE TABLE IF NOT EXISTS `marque` (
  `id_marque` int(11) NOT NULL AUTO_INCREMENT,
  `nom_marque` varchar(50) NOT NULL,
  `id_origine` int(11) NOT NULL,
  PRIMARY KEY (`id_marque`),
  KEY `marque_origine_FK` (`id_origine`),
  CONSTRAINT `marque_origine_FK` FOREIGN KEY (`id_origine`) REFERENCES `origine` (`id_origine`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Listage des données de la table vehicules.marque : ~0 rows (environ)
/*!40000 ALTER TABLE `marque` DISABLE KEYS */;
INSERT INTO `marque` (`id_marque`, `nom_marque`, `id_origine`) VALUES
	(1, 'Citroën', 0),
	(2, 'Dacia', 5),
	(3, 'Honda', 4),
	(4, 'Jeep', 6),
	(5, 'Kia', 7),
	(6, 'Mazda', 4),
	(7, 'Nissan', 4),
	(8, 'Peugeot', 0),
	(9, 'Renault', 0),
	(10, 'Subaru', 4),
	(11, 'Suzuki', 4),
	(12, 'Toyota', 4),
	(13, 'Volkswagen', 2),
	(14, 'Audi', 2),
	(15, 'Cadillac', 6),
	(16, 'Chevrolet', 6),
	(17, 'Infinity', 4),
	(18, 'Jaguar', 8),
	(19, 'Land Rover', 8),
	(20, 'Lexus', 4),
	(21, 'Mercedes', 2),
	(22, 'Mini', 8),
	(23, 'Volvo', 9),
	(24, 'Aston Martin', 8),
	(25, 'Lamborghini', 3),
	(26, 'Maserati', 3),
	(27, 'Porsche', 2),
	(28, 'Tesla', 6);
/*!40000 ALTER TABLE `marque` ENABLE KEYS */;

-- Listage de la structure de la table vehicules. modele
CREATE TABLE IF NOT EXISTS `modele` (
  `id_modele` int(11) NOT NULL AUTO_INCREMENT,
  `nom_modele` varchar(50) NOT NULL,
  `id_marque` int(11) NOT NULL,
  PRIMARY KEY (`id_modele`),
  KEY `modele_marque_FK` (`id_marque`),
  CONSTRAINT `modele_marque_FK` FOREIGN KEY (`id_marque`) REFERENCES `marque` (`id_marque`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Listage des données de la table vehicules.modele : ~0 rows (environ)
/*!40000 ALTER TABLE `modele` DISABLE KEYS */;
INSERT INTO `modele` (`id_modele`, `nom_modele`, `id_marque`) VALUES
	(1, '408', 8),
	(2, 'iOn', 8),
	(3, 'C-Zéro', 1),
	(4, 'C3', 1),
	(5, 'V90', 23),
	(6, 'S60', 23),
	(7, 'Civic', 3),
	(8, 'Clarity', 3),
	(9, 'Passat', 13),
	(10, 'Polo', 13);
/*!40000 ALTER TABLE `modele` ENABLE KEYS */;

-- Listage de la structure de la table vehicules. motorisation
CREATE TABLE IF NOT EXISTS `motorisation` (
  `id_motorisation` int(11) NOT NULL AUTO_INCREMENT,
  `nom_motorisation` varchar(50) NOT NULL,
  PRIMARY KEY (`id_motorisation`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table vehicules.motorisation : ~0 rows (environ)
/*!40000 ALTER TABLE `motorisation` DISABLE KEYS */;
INSERT INTO `motorisation` (`id_motorisation`, `nom_motorisation`) VALUES
	(1, 'Essence'),
	(2, 'Hybride'),
	(3, '100% Électrique'),
	(4, 'Diesel');
/*!40000 ALTER TABLE `motorisation` ENABLE KEYS */;

-- Listage de la structure de la table vehicules. origine
CREATE TABLE IF NOT EXISTS `origine` (
  `id_origine` int(11) NOT NULL AUTO_INCREMENT,
  `nom_pays` varchar(50) NOT NULL,
  PRIMARY KEY (`id_origine`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Listage des données de la table vehicules.origine : ~0 rows (environ)
/*!40000 ALTER TABLE `origine` DISABLE KEYS */;
INSERT INTO `origine` (`id_origine`, `nom_pays`) VALUES
	(0, 'France'),
	(2, 'Allemagne'),
	(3, 'Italie'),
	(4, 'Japon'),
	(5, 'Roumanie'),
	(6, 'États-Unis'),
	(7, 'Corée du Sud'),
	(8, 'Angleterre'),
	(9, 'Suède');
/*!40000 ALTER TABLE `origine` ENABLE KEYS */;

-- Listage de la structure de la table vehicules. voiture
CREATE TABLE IF NOT EXISTS `voiture` (
  `id_voiture` int(11) NOT NULL AUTO_INCREMENT,
  `num_immat` varchar(50) NOT NULL,
  `nb_portes` int(11) DEFAULT NULL,
  `id_motorisation` int(11) NOT NULL,
  `id_modele` int(11) NOT NULL,
  PRIMARY KEY (`id_voiture`),
  KEY `voiture_motorisation_FK` (`id_motorisation`),
  KEY `voiture_modele0_FK` (`id_modele`),
  CONSTRAINT `voiture_modele0_FK` FOREIGN KEY (`id_modele`) REFERENCES `modele` (`id_modele`),
  CONSTRAINT `voiture_motorisation_FK` FOREIGN KEY (`id_motorisation`) REFERENCES `motorisation` (`id_motorisation`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Listage des données de la table vehicules.voiture : ~0 rows (environ)
/*!40000 ALTER TABLE `voiture` DISABLE KEYS */;
INSERT INTO `voiture` (`id_voiture`, `num_immat`, `nb_portes`, `id_motorisation`, `id_modele`) VALUES
	(1, 'AQ-545-BV', 5, 4, 4),
	(2, 'GH-967-RD', 5, 1, 1),
	(3, 'WV-288-GA', 5, 3, 2),
	(4, 'MF-576-FY', 5, 4, 5),
	(5, 'YM-927-FD', 4, 1, 6),
	(6, 'GH-497-QY', 5, 3, 3),
	(7, 'YU-922-EP', 3, 1, 7),
	(8, 'QU-452-RF', 5, 3, 8),
	(9, 'ZQ-913-MA', 5, 1, 4),
	(10, 'AR-485-OP', 5, 1, 10),
	(11, 'YU-864-ED', 5, 1, 9);
/*!40000 ALTER TABLE `voiture` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
