-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 11 déc. 2019 à 19:50
-- Version du serveur :  5.7.28
-- Version de PHP :  7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `naimo_WNP`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`IdAgence`, `Nom`, `Libelle`, `Adresse`, `Telephone`, `Mail`, `Telephone2`, `Code_Region`) VALUES
(1, 'Naidkkd', 'kdkdk', 'kdkdk', 'kdkdk', 'kkdkd', 'kdkd', 0);

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
  `Code_Region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Client`
--

INSERT INTO `Client` (`Code_Client`, `Raison`, `Siren`, `Ape`, `Adresse`, `Num_tel`, `Email`, `IdAgence`) VALUES
(1, 'Ziiodujd', 'dkdkd', 'kdkdkd', 'kdkdkd', 'kdkdkd', 'kdkddk', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Contrat_Maintenance`
--

CREATE TABLE `Contrat_Maintenance` (
  `NumerodeContrat` int(11) NOT NULL,
  `dateSignature` varchar(50) NOT NULL,
  `dateEcheance` varchar(50) NOT NULL,
  `Date_Renouvellement` varchar(50) NOT NULL,
  `Code_Client` int(11) NOT NULL,
  `RefTypeContrat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Controller`
--

CREATE TABLE `Controller` (
  `NumSerie` int(11) NOT NULL,
  `Numero_Fiche` int(11) NOT NULL,
  `temps_passe` varchar(50) DEFAULT NULL,
  `commentaire` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`Num_Matricule`, `Nom`, `Prenom`, `adresse`, `dateembauche`, `password`) VALUES
(1, 'Gallouj', 'Naim', '7 chemin de traverse', '3/01/12', 'test'),
(2, 'Billet', 'Wendy', '6 rue des cranes', '12/01/1196', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `Famille_de_produit`
--

CREATE TABLE `Famille_de_produit` (
  `code_famille` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Intervention`
--

CREATE TABLE `Intervention` (
  `Numero_Fiche` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `date_visite` varchar(200) DEFAULT NULL,
  `heure_visite` varchar(50) DEFAULT NULL,
  `Num_Matricule` int(11) DEFAULT NULL,
  `Code_Client` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Intervention`
--

INSERT INTO `Intervention` (`Numero_Fiche`, `adresse`, `date_visite`, `heure_visite`, `Num_Matricule`, `Code_Client`) VALUES
(1, 'issou', '2022-03-20', '2', 1, 1),
(2, 'lol', NULL, NULL, NULL, NULL),
(3, 'lul', NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Region`
--

CREATE TABLE `Region` (
  `Code_Region` int(11) NOT NULL,
  `Libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Region`
--

INSERT INTO `Region` (`Code_Region`, `Libelle`) VALUES
(0, 'Nord pas de kalé');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Technicien`
--

INSERT INTO `Technicien` (`Num_Matricule`, `Telephone_Mobile`, `Qualification`, `adresse`, `Nom`, `Prenom`, `adresse_employe`, `dateembauche`, `password`, `IdAgence`) VALUES
(1, '0787960391', 'Ingénieur Cyber Sécurité', '6 rue louis montois', 'Gallouj', 'Naïm', '6 rue louis montois ', '1/01/2022', 'test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `TypeContrat`
--

CREATE TABLE `TypeContrat` (
  `RefTypeContrat` int(11) NOT NULL,
  `Detailintervention` varchar(200) NOT NULL,
  `TauxApplicable` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `TypeMateriel`
--

CREATE TABLE `TypeMateriel` (
  `Ref` int(11) NOT NULL,
  `Libelle` varchar(50) NOT NULL,
  `code_famille` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD KEY `Assistant_Telephonique_Region0_FK` (`Code_Region`);

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`Code_Client`),
  ADD KEY `Client_agence_FK` (`IdAgence`);

--
-- Index pour la table `Contrat_Maintenance`
--
ALTER TABLE `Contrat_Maintenance`
  ADD PRIMARY KEY (`NumerodeContrat`),
  ADD UNIQUE KEY `Contrat_Maintenance_Client_AK` (`Code_Client`),
  ADD KEY `Contrat_Maintenance_TypeContrat0_FK` (`RefTypeContrat`);

--
-- Index pour la table `Controller`
--
ALTER TABLE `Controller`
  ADD KEY `Controller_NumSerie_FK` (`NumSerie`),
  ADD KEY `Controller_Numero_Fiche_FK` (`Numero_Fiche`);

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
-- Index pour la table `TypeContrat`
--
ALTER TABLE `TypeContrat`
  ADD PRIMARY KEY (`RefTypeContrat`);

--
-- Index pour la table `TypeMateriel`
--
ALTER TABLE `TypeMateriel`
  ADD PRIMARY KEY (`Ref`),
  ADD KEY `TypeMateriel_Famille_de_produit_FK` (`code_famille`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Famille_de_produit`
--
ALTER TABLE `Famille_de_produit`
  MODIFY `code_famille` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `TypeContrat`
--
ALTER TABLE `TypeContrat`
  MODIFY `RefTypeContrat` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `Assistant_Telephonique_employe_FK` FOREIGN KEY (`Num_Matricule`) REFERENCES `employe` (`Num_Matricule`);

--
-- Contraintes pour la table `Client`
--
ALTER TABLE `Client`
  ADD CONSTRAINT `Client_agence_FK` FOREIGN KEY (`IdAgence`) REFERENCES `agence` (`IdAgence`);

--
-- Contraintes pour la table `Contrat_Maintenance`
--
ALTER TABLE `Contrat_Maintenance`
  ADD CONSTRAINT `Contrat_Maintenance_Client_FK` FOREIGN KEY (`Code_Client`) REFERENCES `Client` (`Code_Client`),
  ADD CONSTRAINT `Contrat_Maintenance_TypeContrat0_FK` FOREIGN KEY (`RefTypeContrat`) REFERENCES `TypeContrat` (`RefTypeContrat`);

--
-- Contraintes pour la table `Controller`
--
ALTER TABLE `Controller`
  ADD CONSTRAINT `Controller_NumSerie_FK` FOREIGN KEY (`NumSerie`) REFERENCES `Materiel` (`NumSerie`),
  ADD CONSTRAINT `Controller_Numero_Fiche_FK` FOREIGN KEY (`Numero_Fiche`) REFERENCES `Intervention` (`Numero_Fiche`);

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
