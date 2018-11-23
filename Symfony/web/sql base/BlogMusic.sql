-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 23 Novembre 2018 à 17:08
-- Version du serveur :  5.7.24-0ubuntu0.16.04.1
-- Version de PHP :  7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `BlogMusic`
--

-- --------------------------------------------------------

--
-- Structure de la table `Category`
--

CREATE TABLE `Category` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Category`
--

INSERT INTO `Category` (`Id`, `Name`) VALUES
(1, 'Rock'),
(2, 'Dance'),
(3, 'Rap'),
(4, 'Pop'),
(5, 'Electro'),
(6, 'Latino'),
(7, 'Jazz'),
(8, 'Classique'),
(9, 'J-pop'),
(10, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `Comment`
--

CREATE TABLE `Comment` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Post`
--

CREATE TABLE `Post` (
  `Id` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Content` text NOT NULL,
  `CreationTimesTamp` datetime DEFAULT NULL,
  `Author_id` int(11) NOT NULL,
  `Categorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Post`
--

INSERT INTO `Post` (`Id`, `Title`, `Content`, `CreationTimesTamp`, `Author_id`, `Categorie_id`) VALUES
(1, 'Mon Premier Article', 'ud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n  			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n  			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat', NULL, 2, 1),
(2, 'Le second', 'gfd', NULL, 2, 2),
(3, 'Mon troisième article', 'ud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatatud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatatud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatatud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat', NULL, 2, 7);

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(120) NOT NULL,
  `Description` text,
  `Img` varchar(30) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Users`
--

INSERT INTO `Users` (`Id`, `FirstName`, `LastName`, `Email`, `Password`, `Description`, `Img`, `Status`) VALUES
(2, 'Grand ', 'salutation ', 'root', '$2y$11$1859604eb27947e103823eblHWpBOOZ9y0iN.s2pU1x5uaLklAbqG', 'fsdfdsfdsfdsfsd', NULL, 'user'),
(3, 'Grand ', 'salutation ', 'root', '$2y$11$2be420dbb2cf5e509b068OW4wFjpBbajcDVM5BvkgQw0PAC3URlPa', NULL, NULL, 'user');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Category`
--
ALTER TABLE `Category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Post`
--
ALTER TABLE `Post`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
