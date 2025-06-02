-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 09 mai 2022 à 00:33
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `evinp4y`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `InitCap`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InitCap` ()  BEGIN

END$$

DROP PROCEDURE IF EXISTS `Moyenne_Credit`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Moyenne_Credit` ()  BEGIN
 insert into statistique values(NOW(), "Moyenne crédit photographe", (select AVG(credits) from users where type_connection = 0));
END$$

DROP PROCEDURE IF EXISTS `new_procedure`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `new_procedure` ()  BEGIN

END$$

--
-- Fonctions
--
DROP FUNCTION IF EXISTS `client_sans_credit`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `client_sans_credit` (`letype` INT) RETURNS INT(4) BEGIN
declare nbclient integer;
Set nbclient = (Select count(nom) From users Where credits = 0 and type_connection = letype);
RETURN nbclient;
END$$

DROP FUNCTION IF EXISTS `client_sans_credits`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `client_sans_credits` () RETURNS INT(11) BEGIN
declare nbClients int;
set NbClients = (Select count(*) from users where credit = 0);
RETURN NbClients;
END$$

DROP FUNCTION IF EXISTS `InitCap`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `InitCap` (`ligne` VARCHAR(30)) RETURNS VARCHAR(30) CHARSET latin1 BEGIN
set ligne = concat(upper(substr(ligne, 1, 1)), lower(substr(ligne, 2, length(ligne))));
RETURN ligne;
END$$

DROP FUNCTION IF EXISTS `InitCap2`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `InitCap2` (`chaine` VARCHAR(20)) RETURNS VARCHAR(20) CHARSET utf8 BEGIN 
declare machaine varchar(20);
set machaine=concat(upper(substring(chaine,1,1)),lower(substring(chaine,2,length(chaine)-1)));
Return machaine;
END$$

DROP FUNCTION IF EXISTS `nbrphoto`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `nbrphoto` (`id` INT) RETURNS INT(11) BEGIN
declare res int;
if (select idusers from users where users.idusers=id and type_connection=1) is null then return -1;
end if;
Select count(*) into res from users,photos where users.idusers=photos.id_users and users.idusers=id;
RETURN res;
END$$

DROP FUNCTION IF EXISTS `total_poids`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `total_poids` () RETURNS INT(11) BEGIN

RETURN 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

DROP TABLE IF EXISTS `achat`;
CREATE TABLE IF NOT EXISTS `achat` (
  `id_achat` int(11) NOT NULL AUTO_INCREMENT,
  `nom_article` varchar(50) NOT NULL,
  `photoArticle` varchar(50) NOT NULL,
  `prix_article` double NOT NULL,
  `acheteur` int(11) NOT NULL,
  PRIMARY KEY (`id_achat`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `achat`
--

INSERT INTO `achat` (`id_achat`, `nom_article`, `photoArticle`, `prix_article`, `acheteur`) VALUES
(1, '23', 'Non', 24, 63),
(2, '23', 'Array', 24, 63),
(3, '23', 'Test', 25, 63),
(16, '23', '', 25, 63),
(15, '23', '', 25, 20),
(14, 'Moi', 'images (2).jfif', 100, 80),
(13, '23', '', 25, 30),
(12, '23', '', 25, 63);

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de l''article',
  `nom_article` varchar(50) NOT NULL COMMENT 'Nom de l''article',
  `quantite` int(11) NOT NULL COMMENT 'Quantité article',
  `prix_article` float NOT NULL COMMENT 'Prix de l''article',
  `photoArticle` varchar(400) NOT NULL COMMENT 'Image article',
  `reference` varchar(50) NOT NULL COMMENT 'Référence',
  `categorie` varchar(50) NOT NULL COMMENT 'Catégorie produit',
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `nom_article`, `quantite`, `prix_article`, `photoArticle`, `reference`, `categorie`) VALUES
(123, 'Fille', 23, 21, 'téléchargé (1).jfif', '76QSDDS', 'Oeuvres'),
(122, 'Vache', 10, 75, 'images (2).jfif', 'AZE123', 'Photographie'),
(121, 'Sculpture', 10, 12, 'téléchargé (2).jfif', '21312', 'Sculpture');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `Categorie` varchar(25) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `Categorie`) VALUES
(1, ' Peinture'),
(2, 'Graffiti'),
(3, 'Photographie'),
(4, 'Sculpture'),
(5, 'Dessin'),
(6, 'Oeuvres');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant',
  `Nom` varchar(50) NOT NULL COMMENT 'Nom Utilisateur',
  `Prenom` varchar(100) NOT NULL COMMENT 'Prénom Utilisateur',
  `Mail` varchar(100) NOT NULL COMMENT 'Mail Utilisateur',
  `mdp` varchar(80) NOT NULL COMMENT 'Mot de passe utilisateur',
  `Type` varchar(25) NOT NULL DEFAULT 'client' COMMENT 'Type de compte',
  `photoUser` varchar(255) NOT NULL COMMENT 'Image profil',
  `etat` varchar(10) NOT NULL DEFAULT 'valid' COMMENT 'Etat du compte\r\n',
  `Credit` varchar(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `Nom`, `Prenom`, `Mail`, `mdp`, `Type`, `photoUser`, `etat`, `Credit`) VALUES
(63, 'Evin', 'Baptiste', 'baptiste.evin@gmail.com', '$2y$10$kH18TJ3TbibWmXfXTlJvQu0fi356W3ezdKeSnL9PAJ1hamtbs/9.K', 'admin', 'user.png', 'valid', '109'),
(80, 'Darras', 'Iona', 'iona.darras@gmail.com', '$2y$10$7KEOrxfw42i35YCJPJ1CX.TPffkxuVQOxggleZAEBsbYGd5uGkFz2', 'client', 'user.png', 'banni', '4'),
(95, 'Montebello', 'Clement', 'clem.mont@gmail.com', '$2y$10$aFBe/rzuD2908Th/.RE3uOZqiJSxrZmpxwlLANjb6x8JeKJOqXPVC', 'photographe', 'images (2).jfif', 'valid', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
