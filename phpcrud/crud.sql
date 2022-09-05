-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 28 juin 2021 à 19:14
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `phpcrud`
--

-- --------------------------------------------------------

--
-- Structure de la table `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `crud`
--

INSERT INTO `crud` (`id`, `Nom`, `Email`, `Contact`, `Image`) VALUES
(3, 'Jason', 'jason@gmail.com', '0456', 'uploads/IMG_20190622_135821102.jpg'),
(4, 'ravakaharisoa', 'tinah@gmail.com', '1234', 'uploads/IMG_20200607_131846.JPG');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
