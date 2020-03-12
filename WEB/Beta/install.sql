-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 12 mars 2020 à 08:44
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `WNP`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `IdAgence` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Libelle` varchar(50) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `Telephone` varchar(50) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Telephone2` varchar(50) NOT NULL,
  `Code_Region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`IdAgence`, `Nom`, `Libelle`, `Adresse`, `Telephone`, `Mail`, `Telephone2`, `Code_Region`) VALUES
(1, 'lille', 'lille1', '123 rue bidon', '0504010202', 'agencelille@gmail.com', '0705040205', 59),
(2, 'lesquin', 'lesquin1', '1 rue de l\'aéroport', '0405010203', 'agencelesquin@gmail.com', '0603030303', 59),
(3, 'Lyon', 'Lyon1', '32 rue de Lyon', '0665656565', 'agencelyon@gmail.com', '', 69);

-- --------------------------------------------------------

--
-- Structure de la table `Assistant_Telephonique`
--

CREATE TABLE `Assistant_Telephonique` (
  `Num_Matricule` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `dateembauche` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Code_Region` int(11) NOT NULL,
  `idAgence` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Assistant_Telephonique`
--

INSERT INTO `Assistant_Telephonique` (`Num_Matricule`, `Nom`, `Prenom`, `adresse`, `dateembauche`, `password`, `Code_Region`, `idAgence`) VALUES
(2, 'dupont', 'jean', '26 rue de limoge', '01/12/2019', '1234', 59, 1),
(6, 'billet', 'cindy', '8 rue osef', '01/01/2018', '1234', 69, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE `Client` (
  `Code_Client` int(11) NOT NULL,
  `Raison` varchar(50) NOT NULL,
  `Siren` varchar(50) NOT NULL,
  `Ape` varchar(50) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `Num_tel` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `IdAgence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Client`
--

INSERT INTO `Client` (`Code_Client`, `Raison`, `Siren`, `Ape`, `Adresse`, `Num_tel`, `Email`, `IdAgence`) VALUES
(1, 'Macron', 'siren1', 'ape1', '32 rue de lille', '0666666666', 'email1@gmail.com', 1),
(2, 'Castaner', 'siren2', 'ape2', '123 rue bison', '056585956', 'email2@gmail.com', 2),
(3, 'Philippe', 'siren3', 'ape3', '36 avenue du ciel ', '0405060205', 'email3@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contrat_maintenance`
--

CREATE TABLE `contrat_maintenance` (
  `num_contrat` int(11) NOT NULL,
  `date_signature` date NOT NULL,
  `date_eche` date NOT NULL,
  `date_renouv` date DEFAULT NULL,
  `code_client` int(11) NOT NULL,
  `ref_contrat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contrat_maintenance`
--

INSERT INTO `contrat_maintenance` (`num_contrat`, `date_signature`, `date_eche`, `date_renouv`, `code_client`, `ref_contrat`) VALUES
(1, '2019-07-01', '2020-07-01', NULL, 1, 1),
(2, '2020-01-01', '2021-01-01', NULL, 2, 3),
(3, '2020-01-01', '2021-01-01', NULL, 3, 2),
(4, '2019-12-06', '2020-12-06', '2020-12-07', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `controller`
--

CREATE TABLE `controller` (
  `id` int(11) NOT NULL,
  `intervention` int(11) NOT NULL,
  `materiel` int(11) NOT NULL,
  `temps_passe` int(11) NOT NULL,
  `commentaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `controller`
--

INSERT INTO `controller` (`id`, `intervention`, `materiel`, `temps_passe`, `commentaire`) VALUES
(1, 147147147, 123, 45, 'osef');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `Num_Matricule` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `dateembauche` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`Num_Matricule`, `Nom`, `Prenom`, `adresse`, `dateembauche`, `password`, `role`) VALUES
(1, 'billet', 'wendy', '34 rue de lille', '01/09/2018', 'test', 1),
(2, 'dupont', 'jean', '26 rue de limoge ', '01/12/2019', '1234', 1),
(3, 'martin', 'paul', '147 rue de paris', '01/11/2019', 'test', 0),
(4, 'clouet', 'alice', '33 rue luve ', '01/01/2018', 'alice', 1),
(5, 'clouet', 'jm', '32 rue rien ', '01/01/2018', '1234', 0),
(6, 'billet', 'cindy', '8 rue osef', '01/01/2018', '1234', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Famille_de_produit`
--

CREATE TABLE `Famille_de_produit` (
  `code_famille` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Famille_de_produit`
--

INSERT INTO `Famille_de_produit` (`code_famille`, `libelle`) VALUES
(1, 'grande_surface');

-- --------------------------------------------------------

--
-- Structure de la table `Intervention`
--

CREATE TABLE `Intervention` (
  `Numero_Fiche` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `date_visite` date NOT NULL,
  `heure_visite` varchar(50) NOT NULL,
  `Num_Matricule` int(11) NOT NULL,
  `Code_Client` int(11) NOT NULL,
  `km` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Intervention`
--

INSERT INTO `Intervention` (`Numero_Fiche`, `adresse`, `date_visite`, `heure_visite`, `Num_Matricule`, `Code_Client`, `km`) VALUES
(1, '35 rue de la paix', '2020-02-22', '6666666666666666666', 3, 1, 0),
(2, '33 rue de la paix', '2020-02-22', '5000000000000000', 5, 1, 0),
(3, '33 rue de la paix', '2020-02-22', '50', 5, 2, 0),
(5, '33 rue de la paix', '2020-02-22', '50', 5, 2, 0),
(9, '33 rue de la paix', '2020-02-22', '50', 5, 2, 0),
(12, '33 rue de la paix', '2020-02-22', '50', 5, 2, 0),
(15, '33 rue de la paix', '2020-02-22', '50', 5, 2, 0),
(41, '32 rue de la paix du ciel', '2020-03-11', '15:30', 3, 1, 8),
(45, '33 rue de la paix', '2020-02-22', '50', 5, 2, 0),
(56, '33 rue de la paix', '2020-02-22', '50', 5, 2, 0),
(66, '33 rue de la paix', '2020-02-22', '50', 5, 2, 0),
(78, '33 rue de la paix', '2020-02-22', '50', 5, 2, 0),
(99, '33 rue de la paix', '2020-02-22', '50', 5, 2, 0),
(112, '3 rue du chou', '2020-03-10', '15', 3, 1, 2),
(200, '33 rue de la paix', '2020-02-22', '50', 5, 2, 0),
(1133, '32 rue de la paix', '2020-02-19', '14', 3, 2, 0),
(1234, '34 rue de la paix', '2020-02-22', '501', 5, 1, 0),
(8888888, '33 rue de la paix', '2020-02-22', '50', 3, 2, 0),
(12141214, '32 rue de la paix ', '2020-03-07', '15', 3, 2, 0),
(47484748, '32 rue de la paix', '2020-03-09', '15:36', 3, 1, 6),
(47484749, '3 rue du chou', '2020-03-09', '15:30', 3, 2, 8),
(147147147, '32 rue de la paix du ciel', '2020-03-07', '1533', 3, 1, 6),
(777777777, '33 rue de la paix', '2020-02-22', '50', 5, 2, 0),
(996969696, '33 rue de la paix', '2020-02-22', '50', 5, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Materiel`
--

CREATE TABLE `Materiel` (
  `NumSerie` int(11) NOT NULL,
  `date_vente` varchar(50) NOT NULL,
  `date_installation` varchar(50) NOT NULL,
  `prix_vente` varchar(50) NOT NULL,
  `emplacement` varchar(50) NOT NULL,
  `Ref` int(50) NOT NULL,
  `NumerodeContrat` int(50) NOT NULL,
  `Code_Client` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Materiel`
--

INSERT INTO `Materiel` (`NumSerie`, `date_vente`, `date_installation`, `prix_vente`, `emplacement`, `Ref`, `NumerodeContrat`, `Code_Client`) VALUES
(123, '01/01/2018', '02/01/2018', '120', '32 rue de lille', 1, 1, 1),
(1313, '01/01/2018', '02/01/2018', '150', '33 rue nulle', 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Region`
--

CREATE TABLE `Region` (
  `Code_Region` int(11) NOT NULL,
  `Libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Region`
--

INSERT INTO `Region` (`Code_Region`, `Libelle`) VALUES
(59, 'nord'),
(69, 'Rhone');

-- --------------------------------------------------------

--
-- Structure de la table `Technicien`
--

CREATE TABLE `Technicien` (
  `Num_Matricule` int(11) NOT NULL,
  `Telephone_Mobile` varchar(50) NOT NULL,
  `Qualification` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `adresse_employe` varchar(50) NOT NULL,
  `dateembauche` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `IdAgence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Technicien`
--

INSERT INTO `Technicien` (`Num_Matricule`, `Telephone_Mobile`, `Qualification`, `adresse`, `Nom`, `Prenom`, `adresse_employe`, `dateembauche`, `password`, `IdAgence`) VALUES
(3, '', 'bts tech', '147 rue de paris', 'martin', 'paul', '147 rue de paris', '01/11/2019', 'test', 1),
(5, '06050406', 'bts tech', '32 rue rien', 'clouet', 'jm', '32 rue rien', '01/01/2018', '1234', 3);

-- --------------------------------------------------------

--
-- Structure de la table `TypeMateriel`
--

CREATE TABLE `TypeMateriel` (
  `Ref` int(11) NOT NULL,
  `Libelle` varchar(50) NOT NULL,
  `code_famille` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `TypeMateriel`
--

INSERT INTO `TypeMateriel` (`Ref`, `Libelle`, `code_famille`) VALUES
(1, 'caisse', 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_contrat`
--

CREATE TABLE `type_contrat` (
  `ref` int(11) NOT NULL,
  `detail_Intervention` varchar(255) DEFAULT NULL,
  `taux` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_contrat`
--

INSERT INTO `type_contrat` (`ref`, `detail_Intervention`, `taux`) VALUES
(1, NULL, 2),
(2, NULL, 3),
(3, NULL, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`IdAgence`),
  ADD KEY `agence_Region_FK` (`Code_Region`);

--
-- Index pour la table `Assistant_Telephonique`
--
ALTER TABLE `Assistant_Telephonique`
  ADD PRIMARY KEY (`Num_Matricule`),
  ADD KEY `Assistant_Telephonique_Region0_FK` (`Code_Region`),
  ADD KEY `Assistant_Telephonique_agence_IdAgence_fk` (`idAgence`);

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`Code_Client`),
  ADD KEY `Client_agence_FK` (`IdAgence`);

--
-- Index pour la table `contrat_maintenance`
--
ALTER TABLE `contrat_maintenance`
  ADD PRIMARY KEY (`num_contrat`),
  ADD KEY `ref_contrat` (`ref_contrat`),
  ADD KEY `code_client` (`code_client`);

--
-- Index pour la table `controller`
--
ALTER TABLE `controller`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materiel` (`materiel`),
  ADD KEY `intervention` (`intervention`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`Num_Matricule`);

--
-- Index pour la table `Famille_de_produit`
--
ALTER TABLE `Famille_de_produit`
  ADD PRIMARY KEY (`code_famille`);

--
-- Index pour la table `Intervention`
--
ALTER TABLE `Intervention`
  ADD PRIMARY KEY (`Numero_Fiche`),
  ADD KEY `Intervention_Technicien_FK` (`Num_Matricule`),
  ADD KEY `Intervention_Client0_FK` (`Code_Client`);

--
-- Index pour la table `Materiel`
--
ALTER TABLE `Materiel`
  ADD PRIMARY KEY (`NumSerie`),
  ADD UNIQUE KEY `Materiel_Maintenance_AK` (`Code_Client`),
  ADD KEY `Materiel_Ref_FK` (`Ref`),
  ADD KEY `Materiel_NumerodeContrat_FK` (`NumerodeContrat`);

--
-- Index pour la table `Region`
--
ALTER TABLE `Region`
  ADD PRIMARY KEY (`Code_Region`);

--
-- Index pour la table `Technicien`
--
ALTER TABLE `Technicien`
  ADD PRIMARY KEY (`Num_Matricule`),
  ADD KEY `Technicien_agence0_FK` (`IdAgence`);

--
-- Index pour la table `TypeMateriel`
--
ALTER TABLE `TypeMateriel`
  ADD PRIMARY KEY (`Ref`),
  ADD KEY `TypeMateriel_Famille_de_produit_FK` (`code_famille`);

--
-- Index pour la table `type_contrat`
--
ALTER TABLE `type_contrat`
  ADD PRIMARY KEY (`ref`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contrat_maintenance`
--
ALTER TABLE `contrat_maintenance`
  MODIFY `num_contrat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `controller`
--
ALTER TABLE `controller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Famille_de_produit`
--
ALTER TABLE `Famille_de_produit`
  MODIFY `code_famille` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `type_contrat`
--
ALTER TABLE `type_contrat`
  MODIFY `ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agence`
--
ALTER TABLE `agence`
  ADD CONSTRAINT `agence_Region_FK` FOREIGN KEY (`Code_Region`) REFERENCES `Region` (`Code_Region`);

--
-- Contraintes pour la table `Assistant_Telephonique`
--
ALTER TABLE `Assistant_Telephonique`
  ADD CONSTRAINT `Assistant_Telephonique_Region0_FK` FOREIGN KEY (`Code_Region`) REFERENCES `Region` (`Code_Region`),
  ADD CONSTRAINT `Assistant_Telephonique_agence_IdAgence_fk` FOREIGN KEY (`idAgence`) REFERENCES `agence` (`IdAgence`),
  ADD CONSTRAINT `Assistant_Telephonique_employe_FK` FOREIGN KEY (`Num_Matricule`) REFERENCES `employe` (`Num_Matricule`);

--
-- Contraintes pour la table `Client`
--
ALTER TABLE `Client`
  ADD CONSTRAINT `Client_agence_FK` FOREIGN KEY (`IdAgence`) REFERENCES `agence` (`IdAgence`);

--
-- Contraintes pour la table `contrat_maintenance`
--
ALTER TABLE `contrat_maintenance`
  ADD CONSTRAINT `contrat_maintenance_ibfk_1` FOREIGN KEY (`ref_contrat`) REFERENCES `type_contrat` (`ref`),
  ADD CONSTRAINT `contrat_maintenance_ibfk_2` FOREIGN KEY (`code_client`) REFERENCES `Client` (`Code_Client`);

--
-- Contraintes pour la table `controller`
--
ALTER TABLE `controller`
  ADD CONSTRAINT `controller_ibfk_1` FOREIGN KEY (`materiel`) REFERENCES `Materiel` (`NumSerie`),
  ADD CONSTRAINT `controller_ibfk_2` FOREIGN KEY (`intervention`) REFERENCES `Intervention` (`Numero_Fiche`);

--
-- Contraintes pour la table `Intervention`
--
ALTER TABLE `Intervention`
  ADD CONSTRAINT `Intervention_Client0_FK` FOREIGN KEY (`Code_Client`) REFERENCES `Client` (`Code_Client`),
  ADD CONSTRAINT `Intervention_Technicien_FK` FOREIGN KEY (`Num_Matricule`) REFERENCES `Technicien` (`Num_Matricule`);

--
-- Contraintes pour la table `Materiel`
--
ALTER TABLE `Materiel`
  ADD CONSTRAINT `Materiel_NumerodeContrat_FK` FOREIGN KEY (`NumerodeContrat`) REFERENCES `Contrat_Maintenance` (`NumerodeContrat`),
  ADD CONSTRAINT `Materiel_Ref_FK` FOREIGN KEY (`Ref`) REFERENCES `TypeMateriel` (`Ref`);

--
-- Contraintes pour la table `Technicien`
--
ALTER TABLE `Technicien`
  ADD CONSTRAINT `Technicien_agence0_FK` FOREIGN KEY (`IdAgence`) REFERENCES `agence` (`IdAgence`),
  ADD CONSTRAINT `Technicien_employe_FK` FOREIGN KEY (`Num_Matricule`) REFERENCES `employe` (`Num_Matricule`);

--
-- Contraintes pour la table `TypeMateriel`
--
ALTER TABLE `TypeMateriel`
  ADD CONSTRAINT `TypeMateriel_Famille_de_produit_FK` FOREIGN KEY (`code_famille`) REFERENCES `Famille_de_produit` (`code_famille`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
