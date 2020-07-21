-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 21, 2020 at 07:07 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `acteur`
--

CREATE TABLE `acteur` (
  `id_acteur` int(11) NOT NULL,
  `nom_acteur` varchar(50) NOT NULL,
  `prenom_acteur` varchar(50) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `sexe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acteur`
--

INSERT INTO `acteur` (`id_acteur`, `nom_acteur`, `prenom_acteur`, `date_naissance`, `sexe`) VALUES
(1, 'Nance', 'Jack', '1943-12-21', 'masculin'),
(2, 'Stewart', 'Charlotte', '1941-02-27', 'féminin'),
(3, 'Watts', 'Naomi', '1968-09-28', 'féminin'),
(4, 'Harring', 'Laura', '1964-03-31', 'féminin'),
(5, 'Hopkins', 'Anthony', '1937-12-31', 'masculin'),
(6, 'Hurt', 'John', '1940-01-22', 'masculin'),
(7, 'Sarandon', 'Susan', '1946-10-04', 'féminin'),
(8, 'Curry', 'Tim', '1946-04-19', 'masculin'),
(9, 'Davis', 'Geena', '1956-01-21', 'féminin');

-- --------------------------------------------------------

--
-- Table structure for table `casting`
--

CREATE TABLE `casting` (
  `id_film` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `casting`
--

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
(5, 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `annee_sortie` date NOT NULL,
  `duree` int(11) NOT NULL,
  `synopsis` text,
  `affiche` varchar(255) DEFAULT NULL,
  `note` tinyint(4) DEFAULT NULL,
  `id_realisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `titre`, `annee_sortie`, `duree`, `synopsis`, `affiche`, `note`, `id_realisateur`) VALUES
(1, 'Eraserhead', '1977-09-28', 89, NULL, NULL, NULL, 1),
(2, 'Mulholland Drive', '2001-10-12', 146, NULL, NULL, NULL, 1),
(3, 'Elephant Man', '1980-10-03', 124, NULL, NULL, NULL, 1),
(4, 'The Rocky Horror Picture Show', '1975-08-14', 100, NULL, NULL, NULL, 2),
(5, 'Thelma et Louise', '1991-08-29', 129, NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `nom_genre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

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
(11, 'Comédie musicale');

-- --------------------------------------------------------

--
-- Table structure for table `realisateur`
--

CREATE TABLE `realisateur` (
  `id_realisateur` int(11) NOT NULL,
  `nom_realisateur` varchar(50) NOT NULL,
  `prenom_realisateur` varchar(50) NOT NULL,
  `date_realisateur` date DEFAULT NULL,
  `sexe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realisateur`
--

INSERT INTO `realisateur` (`id_realisateur`, `nom_realisateur`, `prenom_realisateur`, `date_realisateur`, `sexe`) VALUES
(1, 'Lynch', 'David', '1946-01-20', 'masculin'),
(2, 'Sharman', 'Jim', '1945-03-12', 'masculin'),
(3, 'Scott', 'Ridley', '1937-11-30', 'masculin');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nom_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

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
(10, 'Thelma Dickinson');

-- --------------------------------------------------------

--
-- Table structure for table `style_film`
--

CREATE TABLE `style_film` (
  `id_genre` int(11) NOT NULL,
  `id_film` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `style_film`
--

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
(10, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acteur`
--
ALTER TABLE `acteur`
  ADD PRIMARY KEY (`id_acteur`);

--
-- Indexes for table `casting`
--
ALTER TABLE `casting`
  ADD PRIMARY KEY (`id_film`,`id_acteur`,`id_role`),
  ADD KEY `casting_acteur0_FK` (`id_acteur`),
  ADD KEY `casting_role1_FK` (`id_role`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `film_realisateur_FK` (`id_realisateur`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `realisateur`
--
ALTER TABLE `realisateur`
  ADD PRIMARY KEY (`id_realisateur`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `style_film`
--
ALTER TABLE `style_film`
  ADD PRIMARY KEY (`id_genre`,`id_film`),
  ADD KEY `style_film_film0_FK` (`id_film`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acteur`
--
ALTER TABLE `acteur`
  MODIFY `id_acteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `realisateur`
--
ALTER TABLE `realisateur`
  MODIFY `id_realisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `casting`
--
ALTER TABLE `casting`
  ADD CONSTRAINT `casting_acteur0_FK` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  ADD CONSTRAINT `casting_film_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `casting_role1_FK` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_realisateur_FK` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`);

--
-- Constraints for table `style_film`
--
ALTER TABLE `style_film`
  ADD CONSTRAINT `style_film_film0_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `style_film_genre_FK` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`);
