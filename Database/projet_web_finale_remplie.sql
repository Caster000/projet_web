-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 15 nov. 2019 à 13:04
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `id_activite` int(11) NOT NULL AUTO_INCREMENT,
  `activite` varchar(254) COLLATE utf8_bin NOT NULL,
  `description` varchar(254) COLLATE utf8_bin NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `recurrence` varchar(254) COLLATE utf8_bin NOT NULL,
  `urlImage` varchar(254) COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `prix` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL,
  PRIMARY KEY (`id_activite`),
  KEY `Activite_Personne_FK` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id_activite`, `activite`, `description`, `visible`, `recurrence`, `urlImage`, `date`, `prix`, `id_personne`) VALUES
(1, 'Stand AFNIC', 'Un stand à côté de l\'accueil avec un intervenant qui vous présente diverses notions sur le WEB.', 1, 'Unique', '/projet_web/storage/app/public/images/activite/logo_AFNIC.jpg', '2019-11-14', 0, 2),
(2, 'CES-E-Sport', 'Activités vidéo-ludiques en tout genre, chaque jeudi en salle 121.', 1, 'Hebdomadaire', '/projet_web/storage/app/public/images/activite/logo_CesESport.jpg', '2019-11-21', 0, 2),
(3, 'Vente de crêpes', 'Vente de crêpes pour encaisser le début de l\'hiver, devant l\'accueil !', 1, 'Unique', '/projet_web/storage/app/public/images/activite/crepes_activite.jpg', '2019-12-02', 1, 2),
(4, 'Barrathon', 'Faire la tournée des bars entre amis, c\'est la meilleure chose qui soit ! :)', 0, 'Trimestrielle', '/projet_web/storage/app/public/images/activite/bieres_activite.jpg', '2019-11-28', 25, 2);

-- --------------------------------------------------------

--
-- Structure de la table `campus`
--

DROP TABLE IF EXISTS `campus`;
CREATE TABLE IF NOT EXISTS `campus` (
  `id_campus` int(11) NOT NULL AUTO_INCREMENT,
  `campus` varchar(254) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_campus`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `campus`
--

INSERT INTO `campus` (`id_campus`, `campus`) VALUES
(1, 'Arras'),
(2, 'Bordeaux'),
(3, 'La Rochelle'),
(4, 'Lille'),
(5, 'Lyon'),
(6, 'Nancy'),
(7, 'Nanterre'),
(8, 'Nice'),
(9, 'Reims'),
(10, 'Rouen'),
(11, 'Orléans'),
(12, 'Pau'),
(13, 'St-Nazaire'),
(14, 'Strasbourg'),
(15, 'Toulouse');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(254) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `categorie`) VALUES
(1, 'T-Shirt'),
(2, 'Pull'),
(3, 'Pantalon'),
(4, 'Chaussures'),
(5, 'Goodies'),
(6, 'Nourriture');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `valider` tinyint(1) NOT NULL,
  `id_personne` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `Commande_Personne_FK` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `valider`, `id_personne`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(600) COLLATE utf8_bin NOT NULL,
  `visible` tinyint(4) NOT NULL,
  `id_personne` int(11) NOT NULL,
  `id_photo` int(11) NOT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `Commentaire_Personne_FK` (`id_personne`),
  KEY `Commentaire_Photo0_FK` (`id_photo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `commentaire`, `visible`, `id_personne`, `id_photo`) VALUES
(1, 'Super jeu ça ! Je viendrai participer avec plaisir (après mon projet WEB) ! :)', 1, 2, 1),
(2, 'Oh non moi je voulais que l\'autre gagne ! :(', 0, 2, 3),
(3, 'Menthez pas ! Vous aimez tous le mojito ! :)', 1, 2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `Quantite` int(11) NOT NULL,
  PRIMARY KEY (`id_produit`,`id_commande`),
  KEY `CONTENIR_Commande0_FK` (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`id_produit`, `id_commande`, `Quantite`) VALUES
(2, 1, 1),
(3, 2, 1),
(5, 1, 2),
(5, 2, 1),
(7, 2, 1),
(11, 2, 3),
(12, 1, 1),
(13, 1, 1),
(13, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `inscrire`
--

DROP TABLE IF EXISTS `inscrire`;
CREATE TABLE IF NOT EXISTS `inscrire` (
  `id_personne` int(11) NOT NULL,
  `id_activite` int(11) NOT NULL,
  PRIMARY KEY (`id_personne`,`id_activite`),
  KEY `INSCRIRE_Activite0_FK` (`id_activite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `inscrire`
--

INSERT INTO `inscrire` (`id_personne`, `id_activite`) VALUES
(3, 1),
(4, 1),
(1, 2),
(2, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `liker`
--

DROP TABLE IF EXISTS `liker`;
CREATE TABLE IF NOT EXISTS `liker` (
  `id_photo` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL,
  PRIMARY KEY (`id_photo`,`id_personne`),
  KEY `LIKER_Personne0_FK` (`id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `liker`
--

INSERT INTO `liker` (`id_photo`, `id_personne`) VALUES
(1, 1),
(1, 2),
(5, 2),
(6, 2),
(8, 2);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(254) COLLATE utf8_bin NOT NULL,
  `email` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(254) COLLATE utf8_bin NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_campus` int(11) NOT NULL,
  PRIMARY KEY (`id_personne`),
  KEY `Personne_Role_FK` (`id_role`),
  KEY `Personne_CAMPUS0_FK` (`id_campus`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `email`, `password`, `id_role`, `id_campus`) VALUES
(1, 'Chevallier', 'Baptiste', 'chevallier.baptiste@viacesi.fr', '$2y$10$SZhwo2065JMEDJIM3FbRe.UNG3G0q/fRS.FePv2s.NJcLv24YYhci', 1, 5),
(2, 'Clappe', 'Bruno', 'bruno.clappe@viacesi.fr', '$2y$10$wsnBJTjpYiPeoRj/z7Cfe.FGIJYh5wTafpaUTrJtQQO/MvIIvdq3W', 2, 5),
(3, 'Noel', 'Mathéo', 'matheo.noel@viacesi.fr', '$2y$10$z36Z5DkKGsjHu9mmMYYaU.wra9f1qWk/rw0JA2dO9fnFMMCoIygje', 3, 5),
(4, 'Vedier', 'Antoine', 'antoine.vedier@viacesi.fr', '$2y$10$h6Be4Pb.SljmFWSQpl55JuiLT8TKqvn8iIzO17EESbYxu19Fjhe7W', 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(254) COLLATE utf8_bin NOT NULL,
  `urlImage` varchar(254) COLLATE utf8_bin NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `id_personne` int(11) NOT NULL,
  `id_activite` int(11) NOT NULL,
  PRIMARY KEY (`id_photo`),
  KEY `Photo_Personne_FK` (`id_personne`),
  KEY `Photo_Activite0_FK` (`id_activite`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id_photo`, `titre`, `urlImage`, `visible`, `id_personne`, `id_activite`) VALUES
(1, '1573822083League_of_Legends.jpg', 'images/activite/2/1573822083League_of_Legends.jpg', 1, 1, 2),
(2, '1573822083LAN.jpg', 'images/activite/2/1573822083LAN.jpg', 1, 2, 2),
(3, '1573822405Gagnant_esport.jpg', 'images/activite/2/1573822405Gagnant_esport.jpg', 1, 2, 2),
(4, '1573822921biere_amitie.jpg', 'images/activite/4/1573822921biere_amitie.jpg', 0, 2, 4),
(5, '1573822921whisky.jfif', 'images/activite/4/1573822921whisky.jfif', 0, 2, 4),
(6, '1573822921mojito.jpg', 'images/activite/4/1573822921mojito.jpg', 0, 2, 4),
(7, '1573822921bieres_activite.jpg', 'images/activite/4/1573822921bieres_activite.jpg', 1, 2, 4),
(8, '1573822921Sortes_bieres.jpeg', 'images/activite/4/1573822921Sortes_bieres.jpeg', 1, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) COLLATE utf8_bin NOT NULL,
  `description` varchar(254) COLLATE utf8_bin NOT NULL,
  `prix` float NOT NULL,
  `urlImage` varchar(254) COLLATE utf8_bin NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `Produit_Categorie_FK` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom`, `description`, `prix`, `urlImage`, `id_categorie`) VALUES
(1, 'Chaussure Montagne', 'Des chaussures de montagne estampillées BDE ! De bonne facture, elles conviendront parfaitement à vos pieds, tout ça pour un prix réduit !', 38, '/projet_web/storage/app/public/images/articles/chaussure_montagne', 4),
(2, 'Carottes', 'Venez savourer 1kg de carottes BIO au BDE !', 2, '/projet_web/storage/app/public/images/articles/carottes', 6),
(3, 'Coussin', 'Un formidable coussin très doux. Un côté \"Relax\" et un côté \"Again...\". Tout ce qu\'il vous faut pour vos journées au CESI !', 8, '/projet_web/storage/app/public/images/articles/coussin', 5),
(4, 'Housse Ordinateur', 'Une magnifique housse d\'ordinateur ajustée à votre PC !', 10, '/projet_web/storage/app/public/images/articles/housse_ordinateur', 5),
(5, 'Pantalon Cargo', 'Un pantalon qui saura marquer votre appartenance à l\'équipe d\'intervention CESI.', 20, '/projet_web/storage/app/public/images/articles/pantalon_cargo', 3),
(6, 'Pantalon Trekking', 'Un pantalon souple pour toutes les activités de la vie associative, à bas prix !', 20, '/projet_web/storage/app/public/images/articles/pantalon_trekking', 3),
(7, 'Pomme', 'Pour une petite faim, une pomme saura vous rassasier. Ou même si vous voulez planter un pommier...', 0.6, '/projet_web/storage/app/public/images/articles/pomme_granny', 6),
(8, 'Porte-Clefs', 'Un porte-clefs tout ce qu\'il y a de plus simple mais avec le logo du BDE !', 1, '/projet_web/storage/app/public/images/articles/porteclef', 5),
(9, 'Snickers', 'Un snack très sucré, directement prêt et emballé pour vous et vos neurones en hypoglycémie.', 0.8, '/projet_web/storage/app/public/images/articles/snickers', 6),
(10, 'Stylo', 'Un stylo à bille simple, avec la marque du BDE.', 0.5, '/projet_web/storage/app/public/images/articles/stylo_bille_blanc', 5),
(11, 'Stylo Plume', 'Un stylo plume pour les plus exigeants, estampillé avec le nom de votre BDE préféré !', 1, '/projet_web/storage/app/public/images/articles/stylo_plume', 5),
(12, 'Sweatshirt', 'LE sweatshirt du BDE, l\'unique, l\'immanquable ! Fait main en France avec un coton 100% éthique !', 28, '/projet_web/storage/app/public/images/articles/sweatshirt', 2),
(13, 'T-Shirt', 'Un t-shirt parfait pour porter les couleurs de votre BDE en toute occasion !', 9, '/projet_web/storage/app/public/images/articles/tshirt', 1);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(254) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'Etudiant'),
(2, 'BDE'),
(3, 'CESI');

-- --------------------------------------------------------

--
-- Structure de la table `voter`
--

DROP TABLE IF EXISTS `voter`;
CREATE TABLE IF NOT EXISTS `voter` (
  `id_activite` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL,
  PRIMARY KEY (`id_activite`,`id_personne`),
  KEY `VOTER_Personne0_FK` (`id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `Activite_Personne_FK` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `Commande_Personne_FK` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `Commentaire_Personne_FK` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `Commentaire_Photo0_FK` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id_photo`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `CONTENIR_Commande0_FK` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`),
  ADD CONSTRAINT `CONTENIR_Produit_FK` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `inscrire`
--
ALTER TABLE `inscrire`
  ADD CONSTRAINT `INSCRIRE_Activite0_FK` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`),
  ADD CONSTRAINT `INSCRIRE_Personne_FK` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `liker`
--
ALTER TABLE `liker`
  ADD CONSTRAINT `LIKER_Personne0_FK` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `LIKER_Photo_FK` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id_photo`);

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `Personne_CAMPUS0_FK` FOREIGN KEY (`id_campus`) REFERENCES `campus` (`id_campus`),
  ADD CONSTRAINT `Personne_Role_FK` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `Photo_Activite0_FK` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`),
  ADD CONSTRAINT `Photo_Personne_FK` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `Produit_Categorie_FK` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);

--
-- Contraintes pour la table `voter`
--
ALTER TABLE `voter`
  ADD CONSTRAINT `VOTER_Activite_FK` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`),
  ADD CONSTRAINT `VOTER_Personne0_FK` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
