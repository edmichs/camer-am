-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2018 at 10:20 AM
-- Server version: 5.7.13-log
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camer-am`
--

-- --------------------------------------------------------

--
-- Table structure for table `affection`
--

CREATE TABLE `affection` (
  `ID` int(10) NOT NULL,
  `Code` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `affection`
--

INSERT INTO `affection` (`ID`, `Code`, `Description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'M0010', 'ACCES PALUSTRE', '2018-12-26 11:36:04', '2018-12-26 11:36:04', '2018-12-26 11:36:04'),
(12, 'M0020', 'GRIPPE', '2018-12-26 11:36:04', '2018-12-26 11:36:04', '2018-12-26 11:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `assure`
--

CREATE TABLE `assure` (
  `ID` int(10) NOT NULL,
  `RemboursementsID` int(10) DEFAULT NULL,
  `PoliceID` int(10) NOT NULL,
  `SuccursaleID` int(10) NOT NULL,
  `Code_familleID` int(10) NOT NULL,
  `Type_EmployeID` int(10) NOT NULL,
  `ExerciceID` int(10) NOT NULL,
  `Matricule` varchar(255) DEFAULT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Avatar` varchar(255) DEFAULT NULL,
  `Lieu_naiss` varchar(255) DEFAULT NULL,
  `Datenaiss` date DEFAULT NULL,
  `Situa_marital` int(10) NOT NULL,
  `Type` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Fct_employe` varchar(255) DEFAULT NULL,
  `Observation` varchar(255) DEFAULT NULL,
  `Taux_couverture` float NOT NULL DEFAULT '0',
  `Plafond` float NOT NULL DEFAULT '0',
  `Encour_conso` float NOT NULL DEFAULT '0',
  `Solde` float NOT NULL DEFAULT '0',
  `Nationalite` varchar(255) DEFAULT NULL,
  `Date_incorporation` date DEFAULT NULL,
  `Discriminator` varchar(255) DEFAULT NULL,
  `AssureID` int(10) DEFAULT NULL,
  `Montant_prime` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assure`
--

INSERT INTO `assure` (`ID`, `RemboursementsID`, `PoliceID`, `SuccursaleID`, `Code_familleID`, `Type_EmployeID`, `ExerciceID`, `Matricule`, `Nom`, `Avatar`, `Lieu_naiss`, `Datenaiss`, `Situa_marital`, `Type`, `created_at`, `updated_at`, `deleted_at`, `Fct_employe`, `Observation`, `Taux_couverture`, `Plafond`, `Encour_conso`, `Solde`, `Nationalite`, `Date_incorporation`, `Discriminator`, `AssureID`, `Montant_prime`) VALUES
(2, NULL, 2, 5, 1, 1, 1, 'Matricule', 'Nom', NULL, 'Lieu_naiss', '2018-12-13', 1, NULL, '2018-12-13 15:03:10', '2018-12-13 15:03:10', '2018-12-13 15:03:10', 'Fct_employe', 'Observation', 0, 1, 0, 0, 'Nationalite', NULL, NULL, NULL, NULL),
(5, NULL, 2, 6, 1, 1, 1, 'Matricule', 'Nom complet', NULL, 'Douala', '2018-12-14', 1, NULL, '2018-12-14 13:42:07', '2018-12-14 13:42:07', '2018-12-14 13:42:07', 'Fct_employe', NULL, 80, 1000000, 1000000, 0, 'Nationalite', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bareme_prestation`
--

CREATE TABLE `bareme_prestation` (
  `ID` int(10) NOT NULL,
  `zonegeoID` int(10) NOT NULL,
  `PoliceID` int(10) NOT NULL,
  `Type_EmployeID` int(10) NOT NULL,
  `PrestationID` int(10) NOT NULL,
  `Base_remboursement` varchar(255) DEFAULT NULL,
  `Taux_rembrousement` float NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bonus_malus`
--

CREATE TABLE `bonus_malus` (
  `ID` int(10) NOT NULL,
  `AssureID` int(10) NOT NULL,
  `ExerciceID` int(10) NOT NULL,
  `Date_evenement` date DEFAULT NULL,
  `Montant` float NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Montant_prime` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bpc`
--

CREATE TABLE `bpc` (
  `ID` int(10) NOT NULL,
  `ExerciceID` int(10) NOT NULL,
  `AssureID` int(10) NOT NULL,
  `Numero_bpc` varchar(255) DEFAULT NULL,
  `Formation_sanitaire` varchar(255) DEFAULT NULL,
  `Centre_santeID` int(10) NOT NULL,
  `Medecin_conseilID` int(10) NOT NULL,
  `AffectionID` int(10) NOT NULL,
  `Date_declaration` date DEFAULT NULL,
  `Date_sinistre` date DEFAULT NULL,
  `PoliceID` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bpc`
--

INSERT INTO `bpc` (`ID`, `ExerciceID`, `AssureID`, `Numero_bpc`, `Formation_sanitaire`, `Centre_santeID`, `Medecin_conseilID`, `AffectionID`, `Date_declaration`, `Date_sinistre`, `PoliceID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 1, 5, 'BPC2201', NULL, 11, 19, 11, '2018-12-10', '2018-12-10', 2, '2018-12-26 13:25:47', '2018-12-26 13:25:47', '2018-12-26 13:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `categorie_prestation`
--

CREATE TABLE `categorie_prestation` (
  `ID` int(10) NOT NULL,
  `Libelle` varchar(255) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie_prestation`
--

INSERT INTO `categorie_prestation` (`ID`, `Libelle`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Soins Hospitaliers', 10, '2018-12-11 15:58:26', '2018-12-11 15:58:26', '2018-12-11 15:58:26'),
(2, 'Honoraire consultation médécin', 20, '2018-12-11 15:58:26', '2018-12-11 15:58:26', '2018-12-11 15:58:26'),
(3, 'Soins Externes', 30, '2018-12-11 15:59:06', '2018-12-11 15:59:06', '2018-12-11 15:59:06'),
(4, 'Analyses Médical', 40, '2018-12-11 15:59:06', '2018-12-11 15:59:06', '2018-12-11 15:59:06'),
(5, 'Maternité', 50, '2018-12-11 15:59:25', '2018-12-11 15:59:25', '2018-12-11 15:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `centre_sante`
--

CREATE TABLE `centre_sante` (
  `ID` int(10) NOT NULL,
  `Code` varchar(255) DEFAULT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Telephone` varchar(255) DEFAULT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Nom_contact` varchar(255) DEFAULT NULL,
  `Ville` varchar(255) DEFAULT NULL,
  `Quartier` varchar(255) DEFAULT NULL,
  `Pays` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `centre_sante`
--

INSERT INTO `centre_sante` (`ID`, `Code`, `Nom`, `Telephone`, `Adresse`, `Email`, `Nom_contact`, `Ville`, `Quartier`, `Pays`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'LQ', 'HOPITAL LAQUINTINIE', '243506800', 'DOUALA', NULL, NULL, 'DOUALA\r\n', ' AKWA', 'CAMEROUN', '2018-12-26 12:09:51', '2018-12-26 12:09:51', '2018-12-26 12:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `code_famille`
--

CREATE TABLE `code_famille` (
  `ID` int(10) NOT NULL,
  `Code` varchar(255) DEFAULT NULL,
  `Libelle` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `code_famille`
--

INSERT INTO `code_famille` (`ID`, `Code`, `Libelle`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '00', 'Assuré principal marié', '2018-12-05 03:58:56', '2018-12-05 03:58:56', '2018-12-05 03:58:56'),
(2, '01', 'Assuré principal célibataire', '2018-12-05 03:58:56', '2018-12-05 03:58:56', '2018-12-05 03:58:56'),
(4, '02', 'Conjoint 1', '2018-12-05 04:00:32', '2018-12-05 04:00:32', '2018-12-05 04:00:32'),
(5, '03', 'Conjoint 2', '2018-12-05 04:00:32', '2018-12-05 04:00:32', '2018-12-05 04:00:32'),
(6, '04', 'Conjoint 3', '2018-12-05 04:01:20', '2018-12-05 04:01:20', '2018-12-05 04:01:20'),
(7, '05', 'Conjoint 4', '2018-12-05 04:01:20', '2018-12-05 04:01:20', '2018-12-05 04:01:20'),
(8, '10', 'Enfant 1', '2018-12-05 04:01:58', '2018-12-05 04:01:58', '2018-12-05 04:01:58'),
(9, '11', 'Enfant 2', '2018-12-05 04:01:58', '2018-12-05 04:01:58', '2018-12-05 04:01:58'),
(10, '12', 'Enfant 3', '2018-12-05 04:02:57', '2018-12-05 04:02:57', '2018-12-05 04:02:57'),
(11, '13', 'Enfant 4', '2018-12-05 04:02:57', '2018-12-05 04:02:57', '2018-12-05 04:02:57'),
(12, '14', 'Enfant 5', '2018-12-05 04:04:40', '2018-12-05 04:04:40', '2018-12-05 04:04:40'),
(13, '15', 'Enfant 6', '2018-12-05 04:04:40', '2018-12-05 04:04:40', '2018-12-05 04:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `decompte`
--

CREATE TABLE `decompte` (
  `ID` int(10) NOT NULL,
  `RejetID` int(10) DEFAULT NULL,
  `BpcID` int(10) DEFAULT NULL,
  `zonegeoID` int(10) DEFAULT NULL,
  `AssureID` int(10) DEFAULT NULL,
  `GarantiID` int(10) DEFAULT NULL,
  `ExerciceID` int(10) DEFAULT NULL,
  `PrestationID` int(10) DEFAULT NULL,
  `PoliceID` int(10) DEFAULT NULL,
  `Nombre_piece` float DEFAULT NULL,
  `Date_jour` date DEFAULT NULL,
  `Numero_facture` varchar(255) DEFAULT NULL,
  `Beneficiare` varchar(255) DEFAULT NULL,
  `Date_declaration` date DEFAULT NULL,
  `Date_surveillance` date DEFAULT NULL,
  `Taux_remboursement` float DEFAULT NULL,
  `Montant_facture` float DEFAULT NULL,
  `Numero_decompte` varchar(255) DEFAULT NULL,
  `Plafond_garanti` float DEFAULT NULL,
  `Date_traitement` date DEFAULT NULL,
  `Nom_medecin` varchar(255) DEFAULT NULL,
  `Mode_paiement` varchar(255) DEFAULT NULL,
  `Validation_paiement` varchar(255) DEFAULT NULL,
  `Reference_paiement` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `decompte_prestation`
--

CREATE TABLE `decompte_prestation` (
  `ID` int(11) NOT NULL,
  `Libelle_prestation` varchar(255) DEFAULT NULL,
  `Code_prestation` varchar(255) DEFAULT NULL,
  `Plafond` float DEFAULT NULL,
  `Unite` float DEFAULT NULL,
  `Taux` float DEFAULT NULL,
  `Montant_declare` float DEFAULT NULL,
  `Montant_retenu` float DEFAULT NULL,
  `Montant_payer` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `Rejet` tinyint(1) DEFAULT NULL,
  `Motif_rejet` varchar(255) DEFAULT NULL,
  `Numero_decompte` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decompte_prestation`
--

INSERT INTO `decompte_prestation` (`ID`, `Libelle_prestation`, `Code_prestation`, `Plafond`, `Unite`, `Taux`, `Montant_declare`, `Montant_retenu`, `Montant_payer`, `created_at`, `updated_at`, `deleted_at`, `Rejet`, `Motif_rejet`, `Numero_decompte`) VALUES
(13, 'Auxilliaire Médécin Infirmier', '3', 750, 67, 80, 10000, 10000, 10000, NULL, NULL, NULL, 0, NULL, 'DECOMPTE12371'),
(14, 'Pétite Chirugie', '2', 750, 67, 80, 10000, 10000, 10000, NULL, NULL, NULL, 0, NULL, 'DECOMPTE12371'),
(15, 'Consultation Urgence JF', 'CDJF', 10000, 67, 80, 10000, 10000, 10000, NULL, NULL, NULL, NULL, NULL, 'DECOMPTE13984'),
(16, 'Consultation Professionelle', 'CP', 15000, 67, 80, 10000, 10000, 10000, NULL, NULL, NULL, 1, 'irrecevable', 'DECOMPTE11418'),
(17, 'Auxilliaire Médécin Infirmier', 'AMI', 750, 67, 80, 10000, 10000, 10000, NULL, NULL, NULL, 1, 'irrecevable', 'DECOMPTE11584'),
(18, 'Consultation Urgence JF', 'CDJF', 10000, 67, 80, 10000, 10000, 10000, NULL, NULL, NULL, 0, NULL, 'DECOMPTE15171'),
(19, 'Consultation Urgence JF', 'CDJF', 10000, 43, 43, 4666, 6788, 7677, NULL, NULL, NULL, 1, 'irrecevable', 'DECOMPTE15171');

-- --------------------------------------------------------

--
-- Table structure for table `etablissement`
--

CREATE TABLE `etablissement` (
  `ID` int(11) NOT NULL,
  `Raison_social` varchar(100) DEFAULT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Telephone` varchar(100) DEFAULT NULL,
  `Nom_contact` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etablissement`
--

INSERT INTO `etablissement` (`ID`, `Raison_social`, `Nom`, `Adresse`, `Email`, `Telephone`, `Nom_contact`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'SAAR', 'SAAR', 'BP XXXX DOUALA', 'info@saar.com', '655555555', 'LABINDA JEANNE', '2018-12-27 20:12:36', '2018-12-27 20:12:36', '2018-12-27 20:12:36'),
(3, 'AREA', 'AREA', 'BP YYY AKWA DOUALA', 'contact@area.com', '699999999', 'NGUIMEA PAUL', '2018-12-27 20:14:01', '2018-12-27 20:14:01', '2018-12-27 20:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `exercice`
--

CREATE TABLE `exercice` (
  `ID` int(10) NOT NULL,
  `Date_debut` date DEFAULT NULL,
  `Date_fin` date DEFAULT NULL,
  `Cloture` tinyint(1) NOT NULL,
  `Date_cloture` date DEFAULT NULL,
  `Code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exercice`
--

INSERT INTO `exercice` (`ID`, `Date_debut`, `Date_fin`, `Cloture`, `Date_cloture`, `Code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2018-01-01', '2018-12-31', 0, NULL, NULL, '2018-12-05 15:28:51', '2018-12-05 15:28:51', '2018-12-05 15:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `extrait_bpc`
--

CREATE TABLE `extrait_bpc` (
  `ID` int(10) NOT NULL,
  `Medecin_conseilID` int(10) NOT NULL,
  `AssureID` int(10) NOT NULL,
  `BpcID` int(10) NOT NULL,
  `Centre_santeID` int(11) NOT NULL,
  `AffectionID` int(10) NOT NULL,
  `PoliceID` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `extrait_decompte`
--

CREATE TABLE `extrait_decompte` (
  `ID` int(11) NOT NULL,
  `AffectionID` int(10) NOT NULL,
  `Description_soins` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `extrait_prestation`
--

CREATE TABLE `extrait_prestation` (
  `ID` int(11) NOT NULL,
  `PrestationID` int(10) NOT NULL,
  `bpcID` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `extrait_prestation`
--

INSERT INTO `extrait_prestation` (`ID`, `PrestationID`, `bpcID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 1, 18, '2018-12-26 13:25:47', '2018-12-26 13:25:47', '2018-12-26 13:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `garanti`
--

CREATE TABLE `garanti` (
  `ID` int(10) NOT NULL,
  `Code` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `garanti`
--

INSERT INTO `garanti` (`ID`, `Code`, `Description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'G100', 'AUTOMOBILE', '2018-12-11 16:00:23', '2018-12-11 16:00:23', '2018-12-11 16:00:23'),
(2, 'G200', 'DECES', '2018-12-11 16:00:23', '2018-12-11 16:00:23', '2018-12-11 16:00:23'),
(3, 'G300', 'FUNERAILLES', '2018-12-11 16:01:01', '2018-12-11 16:01:01', '2018-12-11 16:01:01'),
(4, 'G400', 'HABITATION', '2018-12-11 16:01:01', '2018-12-11 16:01:01', '2018-12-11 16:01:01'),
(5, 'G500', 'MALADIE', '2018-12-11 16:01:27', '2018-12-11 16:01:27', '2018-12-11 16:01:27'),
(6, 'G600', 'VOYAGE', '2018-12-11 16:01:27', '2018-12-11 16:01:27', '2018-12-11 16:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `incorporation`
--

CREATE TABLE `incorporation` (
  `ID` int(10) NOT NULL,
  `PoliceID` int(10) NOT NULL,
  `SuccursaleID` int(10) NOT NULL,
  `Code_familleID` int(10) NOT NULL,
  `Type_EmployeID` int(10) NOT NULL,
  `ExerciceID` int(10) NOT NULL,
  `Matricule` varchar(255) DEFAULT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Avatar` varchar(255) DEFAULT NULL,
  `Lieu_naiss` varchar(255) DEFAULT NULL,
  `Datenaiss` date DEFAULT NULL,
  `Situa_marital` int(10) NOT NULL,
  `Type` int(10) DEFAULT NULL,
  `Fct_employe` varchar(255) DEFAULT NULL,
  `Observation` varchar(255) DEFAULT NULL,
  `Nationalite` varchar(255) DEFAULT NULL,
  `Date_incorporation` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medecin`
--

CREATE TABLE `medecin` (
  `ID` int(10) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Telephone` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Matricule` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medecin_conseil`
--

CREATE TABLE `medecin_conseil` (
  `ID` int(10) NOT NULL,
  `Noms` varchar(255) DEFAULT NULL,
  `Telephone` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medecin_conseil`
--

INSERT INTO `medecin_conseil` (`ID`, `Noms`, `Telephone`, `Email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 'DR MAPUT', '692222333', 'maput@yahoo.fr', '2018-12-26 12:00:24', '2018-12-26 12:00:24', '2018-12-26 12:00:24'),
(19, 'DR  JOVIX', '677333444', 'jpalin@gmail.com', '2018-12-26 12:00:24', '2018-12-26 12:00:24', '2018-12-26 12:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `ID` int(10) NOT NULL,
  `EtablissementID` int(10) DEFAULT NULL,
  `SuccursaleID` int(10) NOT NULL,
  `ExerciceID` int(10) NOT NULL,
  `Date_souscription` date DEFAULT NULL,
  `Date_emission` date DEFAULT NULL,
  `Date_effet` date DEFAULT NULL,
  `Date_echeance` date DEFAULT NULL,
  `Prime_total` float DEFAULT NULL,
  `Accessoires` varchar(255) DEFAULT NULL,
  `Prime_nette` float DEFAULT NULL,
  `Plafond_garanti` float DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Numero_police` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`ID`, `EtablissementID`, `SuccursaleID`, `ExerciceID`, `Date_souscription`, `Date_emission`, `Date_effet`, `Date_echeance`, `Prime_total`, `Accessoires`, `Prime_nette`, `Plafond_garanti`, `Description`, `Numero_police`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, 5, 1, '2018-12-15', '2018-12-10', '2019-01-01', '2020-01-01', 10000000, '2000000', 8000000, 3000000, NULL, 'GDT346JY', '2018-12-13 10:57:02', '2018-12-13 10:57:02', '2018-12-13 10:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `prestation`
--

CREATE TABLE `prestation` (
  `ID` int(10) NOT NULL,
  `Categorie_PrestationID` int(10) NOT NULL,
  `Code_prestation` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Plafond` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prestation`
--

INSERT INTO `prestation` (`ID`, `Categorie_PrestationID`, `Code_prestation`, `Description`, `Plafond`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'J', 'Hospitalisation', 6000, '2018-12-11 16:03:09', '2018-12-11 16:03:09', '2018-12-11 16:03:09'),
(2, 1, 'PC', 'Pétite Chirugie', 750, '2018-12-11 16:03:09', '2018-12-11 16:03:09', '2018-12-11 16:03:09'),
(3, 1, 'AMI', 'Auxilliaire Médécin Infirmier', 750, '2018-12-11 16:04:49', '2018-12-11 16:04:49', '2018-12-11 16:04:49'),
(4, 2, 'C', 'Consultation générale', 10000, '2018-12-11 16:04:49', '2018-12-11 16:04:49', '2018-12-11 16:04:49'),
(5, 2, 'CS', 'Consultation Spéciale', 15000, '2018-12-11 16:05:41', '2018-12-11 16:05:41', '2018-12-11 16:05:41'),
(6, 2, 'CP', 'Consultation Professionelle', 15000, '2018-12-11 16:05:41', '2018-12-11 16:05:41', '2018-12-11 16:05:41'),
(7, 2, 'CDJF', 'Consultation Urgence JF', 10000, '2018-12-11 16:06:44', '2018-12-11 16:06:44', '2018-12-11 16:06:44'),
(8, 2, 'CSDN', 'Consultation Urgence DN', 15000, '2018-12-11 16:06:44', '2018-12-11 16:06:44', '2018-12-11 16:06:44'),
(9, 2, 'CPDN', 'Consultation Urgence DN', 30000, '2018-12-11 16:07:53', '2018-12-11 16:07:53', '2018-12-11 16:07:53'),
(10, 3, 'L', 'Lunettes', 1, '2018-12-11 16:07:53', '2018-12-11 16:07:53', '2018-12-11 16:07:53'),
(11, 3, 'SI', 'Soins Dentaires', 1, '2018-12-11 16:08:38', '2018-12-11 16:08:38', '2018-12-11 16:08:38'),
(12, 3, 'K', 'Imagerie-Echographie', 1000, '2018-12-11 16:08:38', '2018-12-11 16:08:38', '2018-12-11 16:08:38'),
(13, 4, 'B', 'Analyses Biologiques', 180, '2018-12-11 16:09:52', '2018-12-11 16:09:52', '2018-12-11 16:09:52'),
(14, 5, 'PHA', 'Frais post & pré-natal', NULL, '2018-12-11 16:09:52', '2018-12-11 16:09:52', '2018-12-11 16:09:52'),
(15, 5, 'ACN', 'Accouchement S', 60000, '2018-12-11 16:10:38', '2018-12-11 16:10:38', '2018-12-11 16:10:38'),
(16, 5, 'ACG', 'Accouchement M', 100000, '2018-12-11 16:10:38', '2018-12-11 16:10:38', '2018-12-11 16:10:38'),
(17, 5, 'ACC', 'Accouchement C', NULL, '2018-12-11 16:10:54', '2018-12-11 16:10:54', '2018-12-11 16:10:54');

-- --------------------------------------------------------

--
-- Table structure for table `rejet`
--

CREATE TABLE `rejet` (
  `ID` int(10) NOT NULL,
  `Motif` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `remboursements`
--

CREATE TABLE `remboursements` (
  `ID` int(10) NOT NULL,
  `PoliceID` int(10) NOT NULL,
  `PrestationID` int(10) NOT NULL,
  `DecompteID` int(10) NOT NULL,
  `ExerciceID` int(10) NOT NULL,
  `Montant_prestation` float NOT NULL,
  `Montant_retenu` float NOT NULL,
  `Montant_payer` float NOT NULL,
  `Taux_remboursement` float NOT NULL,
  `AssureID` int(10) NOT NULL,
  `statut` smallint(6) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `souscripteur`
--

CREATE TABLE `souscripteur` (
  `ID` int(10) NOT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `raison_social` varchar(255) DEFAULT NULL,
  `activite` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nom_contact` varchar(255) DEFAULT NULL,
  `localisation_geo` varchar(255) DEFAULT NULL,
  `nombre_total_assure` int(10) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `pays` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `souscripteur`
--

INSERT INTO `souscripteur` (`ID`, `statut`, `nom`, `raison_social`, `activite`, `adresse`, `telephone`, `email`, `nom_contact`, `localisation_geo`, `nombre_total_assure`, `ville`, `pays`, `created_at`, `updated_at`, `deleted_at`, `_token`) VALUES
(17, 'Societe', 'HYSACAM', NULL, 'HYGIENE ET SALUBRITE', 'BP 407 DLA BASSA', '677 777 777', 'contact@hys.com', 'BLAISE NONO', NULL, 300, NULL, NULL, '2018-12-26 17:23:23', '2018-12-26 17:23:23', '2018-12-26 17:23:23', ''),
(18, 'Societe', 'SECA', NULL, 'RAMASSAGE ORDURES', 'BP 15355 DLA', '699 888 777', 'contact@seca.com', 'PASCAL ELA', NULL, 70, NULL, NULL, '2018-12-26 17:23:23', '2018-12-26 17:23:23', '2018-12-26 17:23:23', ''),
(19, 'Association', 'ASSOCIATION JEUNES SAWA', NULL, 'CULTURE & LOISIRS', 'BP 150 DEIDO  DLA', '698 181 322', NULL, 'EDIMO LAURENT', NULL, 10, NULL, NULL, '2018-12-26 17:25:07', '2018-12-26 17:25:07', '2018-12-26 17:25:07', ''),
(20, 'Particulier', 'PANKA JOSUE', NULL, NULL, 'CITE SIC DLA', '699 281 347', NULL, 'PANKA JOSUE', NULL, 1, NULL, NULL, '2018-12-26 17:25:07', '2018-12-26 17:25:07', '2018-12-26 17:25:07', '');

-- --------------------------------------------------------

--
-- Table structure for table `succursale`
--

CREATE TABLE `succursale` (
  `ID` int(10) NOT NULL,
  `SouscripteurID` int(10) NOT NULL,
  `Statut` varchar(100) DEFAULT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Raison_social` varchar(255) DEFAULT NULL,
  `Activite` varchar(255) DEFAULT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `Telephone` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Nom_contact` varchar(255) DEFAULT NULL,
  `Localisation_geo` varchar(255) DEFAULT NULL,
  `Nombre_total_assure` int(10) DEFAULT NULL,
  `Ville` varchar(100) DEFAULT NULL,
  `Pays` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `succursale`
--

INSERT INTO `succursale` (`ID`, `SouscripteurID`, `Statut`, `Nom`, `Raison_social`, `Activite`, `Adresse`, `Telephone`, `Email`, `Nom_contact`, `Localisation_geo`, `Nombre_total_assure`, `Ville`, `Pays`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 17, 'Societe', 'HYSACAM DOUALA', '10010', 'HYGIENE ET SALUBRITE', 'DOUALA NYLON', '243507200', NULL, 'ETAME JOEL', NULL, 200, 'Douala', 'Cameroun', '2018-12-26 17:28:13', '2018-12-26 17:28:13', '2018-12-26 17:28:13'),
(8, 18, 'Societe', 'SECA DOUALA', '10020', 'RAMASSAGE DES ORDURES', 'DOUALA AKWA', '242376148', NULL, 'BIPANTOU MAURICE', NULL, 70, 'Douala', 'Cameroun', '2018-12-26 17:30:33', '2018-12-26 17:30:33', '2018-12-26 17:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `type_employe`
--

CREATE TABLE `type_employe` (
  `ID` int(10) NOT NULL,
  `Libelle` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_employe`
--

INSERT INTO `type_employe` (`ID`, `Libelle`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Directeur', '2018-12-08 04:31:47', '2018-12-08 04:31:47', '2018-12-08 04:31:47'),
(2, 'Cadres & Assimilés', '2018-12-08 04:31:47', '2018-12-08 04:31:47', '2018-12-08 04:31:47'),
(3, 'Agent de Maitrise', '2018-12-08 04:32:20', '2018-12-08 04:32:20', '2018-12-08 04:32:20'),
(4, 'Autres Employés', '2018-12-08 04:32:20', '2018-12-08 04:32:20', '2018-12-08 04:32:20'),
(5, 'Etrangers/Expatriés', '2018-12-08 04:32:45', '2018-12-08 04:32:45', '2018-12-08 04:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `zonegeo`
--

CREATE TABLE `zonegeo` (
  `ID` int(10) NOT NULL,
  `Code` varchar(255) DEFAULT NULL,
  `Libelle` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zonegeo`
--

INSERT INTO `zonegeo` (`ID`, `Code`, `Libelle`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Z1', 'Local', '2018-12-17 13:32:52', '2018-12-17 13:32:52', '2018-12-17 13:32:52'),
(2, 'Z2', 'Etranger', '2018-12-17 13:32:52', '2018-12-17 13:32:52', '2018-12-17 13:32:52'),
(3, 'Z3', 'Afrique', '2018-12-17 13:33:32', '2018-12-17 13:33:32', '2018-12-17 13:33:32'),
(4, 'Z4', 'Europe', '2018-12-17 13:33:32', '2018-12-17 13:33:32', '2018-12-17 13:33:32'),
(5, 'Z5', 'Nord Amérique', '2018-12-17 13:34:25', '2018-12-17 13:34:25', '2018-12-17 13:34:25'),
(6, 'Z6', 'Asie : Inde&Chine', '2018-12-17 13:34:25', '2018-12-17 13:34:25', '2018-12-17 13:34:25'),
(7, 'Z7', 'Autres', '2018-12-17 13:34:40', '2018-12-17 13:34:40', '2018-12-17 13:34:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affection`
--
ALTER TABLE `affection`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `assure`
--
ALTER TABLE `assure`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKAssure365218` (`ExerciceID`),
  ADD KEY `FKAssure702810` (`Type_EmployeID`),
  ADD KEY `FKAssure165230` (`Code_familleID`),
  ADD KEY `FKAssure168367` (`SuccursaleID`),
  ADD KEY `FKAssure375428` (`PoliceID`);

--
-- Indexes for table `bareme_prestation`
--
ALTER TABLE `bareme_prestation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKBareme_Pre876028` (`PrestationID`),
  ADD KEY `FKBareme_Pre958094` (`Type_EmployeID`),
  ADD KEY `FKBareme_Pre879855` (`PoliceID`),
  ADD KEY `FKBareme_Pre473173` (`zonegeoID`);

--
-- Indexes for table `bonus_malus`
--
ALTER TABLE `bonus_malus`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKBonus_Malu436144` (`ExerciceID`),
  ADD KEY `FKBonus_Malu409877` (`AssureID`);

--
-- Indexes for table `bpc`
--
ALTER TABLE `bpc`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKBpc875653` (`AssureID`),
  ADD KEY `FKBpc29632` (`ExerciceID`),
  ADD KEY `Centre_santeID` (`Centre_santeID`),
  ADD KEY `Medecin_conseilID` (`Medecin_conseilID`),
  ADD KEY `AffectionID` (`AffectionID`),
  ADD KEY `PoliceID` (`PoliceID`);

--
-- Indexes for table `categorie_prestation`
--
ALTER TABLE `categorie_prestation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `centre_sante`
--
ALTER TABLE `centre_sante`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `code_famille`
--
ALTER TABLE `code_famille`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `decompte`
--
ALTER TABLE `decompte`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Numero_decompte` (`Numero_decompte`),
  ADD KEY `FKDecompte535288` (`PoliceID`),
  ADD KEY `FKDecompte531461` (`PrestationID`),
  ADD KEY `FKDecompte695655` (`ExerciceID`),
  ADD KEY `FKDecompte336808` (`GarantiID`),
  ADD KEY `FKDecompte429913` (`AssureID`),
  ADD KEY `FKDecompte817740` (`zonegeoID`),
  ADD KEY `FKDecompte188861` (`BpcID`),
  ADD KEY `FKDecompte972695` (`RejetID`);

--
-- Indexes for table `decompte_prestation`
--
ALTER TABLE `decompte_prestation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `exercice`
--
ALTER TABLE `exercice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `extrait_bpc`
--
ALTER TABLE `extrait_bpc`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKextrait_bp403580` (`BpcID`),
  ADD KEY `FKextrait_bp215194` (`AssureID`),
  ADD KEY `FKextrait_bp581484` (`Medecin_conseilID`),
  ADD KEY `Centre_santeID` (`Centre_santeID`),
  ADD KEY `AffectionID` (`AffectionID`),
  ADD KEY `PoliceID` (`PoliceID`);

--
-- Indexes for table `extrait_decompte`
--
ALTER TABLE `extrait_decompte`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `extrait_prestation`
--
ALTER TABLE `extrait_prestation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BpcID` (`PrestationID`),
  ADD KEY `Extrait_bpcID` (`bpcID`);

--
-- Indexes for table `garanti`
--
ALTER TABLE `garanti`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `incorporation`
--
ALTER TABLE `incorporation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKIncorporate365218` (`ExerciceID`),
  ADD KEY `FKIncorporate702810` (`Type_EmployeID`),
  ADD KEY `FKIncorporate165230` (`Code_familleID`),
  ADD KEY `FKIncorporate168367` (`SuccursaleID`),
  ADD KEY `FKIncorporate375428` (`PoliceID`);

--
-- Indexes for table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `medecin_conseil`
--
ALTER TABLE `medecin_conseil`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Telephone` (`Telephone`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Numero_police` (`Numero_police`),
  ADD KEY `FKPolice842145` (`ExerciceID`),
  ADD KEY `FKPolice691439` (`SuccursaleID`),
  ADD KEY `FKPolice621241` (`EtablissementID`);

--
-- Indexes for table `prestation`
--
ALTER TABLE `prestation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKPrestation482124` (`Categorie_PrestationID`);

--
-- Indexes for table `rejet`
--
ALTER TABLE `rejet`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `remboursements`
--
ALTER TABLE `remboursements`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKRemboursem449287` (`ExerciceID`),
  ADD KEY `FKRemboursem280249` (`DecompteID`),
  ADD KEY `FKRemboursem777829` (`PrestationID`),
  ADD KEY `FKRemboursem781656` (`PoliceID`),
  ADD KEY `FKRemboursem676281` (`AssureID`);

--
-- Indexes for table `souscripteur`
--
ALTER TABLE `souscripteur`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `succursale`
--
ALTER TABLE `succursale`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `avoir` (`SouscripteurID`);

--
-- Indexes for table `type_employe`
--
ALTER TABLE `type_employe`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `zonegeo`
--
ALTER TABLE `zonegeo`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affection`
--
ALTER TABLE `affection`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `assure`
--
ALTER TABLE `assure`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bareme_prestation`
--
ALTER TABLE `bareme_prestation`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bonus_malus`
--
ALTER TABLE `bonus_malus`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bpc`
--
ALTER TABLE `bpc`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `categorie_prestation`
--
ALTER TABLE `categorie_prestation`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `centre_sante`
--
ALTER TABLE `centre_sante`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `code_famille`
--
ALTER TABLE `code_famille`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `decompte`
--
ALTER TABLE `decompte`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `decompte_prestation`
--
ALTER TABLE `decompte_prestation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `etablissement`
--
ALTER TABLE `etablissement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `exercice`
--
ALTER TABLE `exercice`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `extrait_bpc`
--
ALTER TABLE `extrait_bpc`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `extrait_decompte`
--
ALTER TABLE `extrait_decompte`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `extrait_prestation`
--
ALTER TABLE `extrait_prestation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `garanti`
--
ALTER TABLE `garanti`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `incorporation`
--
ALTER TABLE `incorporation`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medecin_conseil`
--
ALTER TABLE `medecin_conseil`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `police`
--
ALTER TABLE `police`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prestation`
--
ALTER TABLE `prestation`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `rejet`
--
ALTER TABLE `rejet`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `remboursements`
--
ALTER TABLE `remboursements`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `souscripteur`
--
ALTER TABLE `souscripteur`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `succursale`
--
ALTER TABLE `succursale`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `type_employe`
--
ALTER TABLE `type_employe`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `zonegeo`
--
ALTER TABLE `zonegeo`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assure`
--
ALTER TABLE `assure`
  ADD CONSTRAINT `FKAssure165230` FOREIGN KEY (`Code_familleID`) REFERENCES `code_famille` (`ID`),
  ADD CONSTRAINT `FKAssure168367` FOREIGN KEY (`SuccursaleID`) REFERENCES `succursale` (`ID`),
  ADD CONSTRAINT `FKAssure365218` FOREIGN KEY (`ExerciceID`) REFERENCES `exercice` (`ID`),
  ADD CONSTRAINT `FKAssure375428` FOREIGN KEY (`PoliceID`) REFERENCES `police` (`ID`),
  ADD CONSTRAINT `FKAssure702810` FOREIGN KEY (`Type_EmployeID`) REFERENCES `type_employe` (`ID`);

--
-- Constraints for table `bareme_prestation`
--
ALTER TABLE `bareme_prestation`
  ADD CONSTRAINT `FKBareme_Pre473173` FOREIGN KEY (`zonegeoID`) REFERENCES `zonegeo` (`ID`),
  ADD CONSTRAINT `FKBareme_Pre876028` FOREIGN KEY (`PrestationID`) REFERENCES `prestation` (`ID`),
  ADD CONSTRAINT `FKBareme_Pre879855` FOREIGN KEY (`PoliceID`) REFERENCES `police` (`ID`),
  ADD CONSTRAINT `FKBareme_Pre958094` FOREIGN KEY (`Type_EmployeID`) REFERENCES `type_employe` (`ID`);

--
-- Constraints for table `bonus_malus`
--
ALTER TABLE `bonus_malus`
  ADD CONSTRAINT `FKBonus_Malu409877` FOREIGN KEY (`AssureID`) REFERENCES `assure` (`ID`),
  ADD CONSTRAINT `FKBonus_Malu436144` FOREIGN KEY (`ExerciceID`) REFERENCES `exercice` (`ID`);

--
-- Constraints for table `bpc`
--
ALTER TABLE `bpc`
  ADD CONSTRAINT `FKBpc29632` FOREIGN KEY (`ExerciceID`) REFERENCES `exercice` (`ID`),
  ADD CONSTRAINT `FKBpc8755453` FOREIGN KEY (`Medecin_conseilID`) REFERENCES `medecin_conseil` (`ID`),
  ADD CONSTRAINT `FKBpc875634` FOREIGN KEY (`Centre_santeID`) REFERENCES `centre_sante` (`ID`),
  ADD CONSTRAINT `FKBpc875653` FOREIGN KEY (`AssureID`) REFERENCES `assure` (`ID`),
  ADD CONSTRAINT `FKBpc9855` FOREIGN KEY (`AffectionID`) REFERENCES `affection` (`ID`),
  ADD CONSTRAINT `FKBpc985523` FOREIGN KEY (`PoliceID`) REFERENCES `police` (`ID`);

--
-- Constraints for table `decompte`
--
ALTER TABLE `decompte`
  ADD CONSTRAINT `FKDecompte188861` FOREIGN KEY (`BpcID`) REFERENCES `bpc` (`ID`),
  ADD CONSTRAINT `FKDecompte336808` FOREIGN KEY (`GarantiID`) REFERENCES `garanti` (`ID`),
  ADD CONSTRAINT `FKDecompte429913` FOREIGN KEY (`AssureID`) REFERENCES `assure` (`ID`),
  ADD CONSTRAINT `FKDecompte531461` FOREIGN KEY (`PrestationID`) REFERENCES `prestation` (`ID`),
  ADD CONSTRAINT `FKDecompte535288` FOREIGN KEY (`PoliceID`) REFERENCES `police` (`ID`),
  ADD CONSTRAINT `FKDecompte695655` FOREIGN KEY (`ExerciceID`) REFERENCES `exercice` (`ID`),
  ADD CONSTRAINT `FKDecompte817740` FOREIGN KEY (`zonegeoID`) REFERENCES `zonegeo` (`ID`),
  ADD CONSTRAINT `FKDecompte972695` FOREIGN KEY (`RejetID`) REFERENCES `rejet` (`ID`);

--
-- Constraints for table `extrait_bpc`
--
ALTER TABLE `extrait_bpc`
  ADD CONSTRAINT `FKextrait_bp215194` FOREIGN KEY (`AssureID`) REFERENCES `assure` (`ID`),
  ADD CONSTRAINT `FKextrait_bp403580` FOREIGN KEY (`BpcID`) REFERENCES `bpc` (`ID`),
  ADD CONSTRAINT `FKextrait_bp564325` FOREIGN KEY (`PoliceID`) REFERENCES `police` (`ID`),
  ADD CONSTRAINT `FKextrait_bp581484` FOREIGN KEY (`Medecin_conseilID`) REFERENCES `medecin_conseil` (`ID`),
  ADD CONSTRAINT `FKextrait_bp786367` FOREIGN KEY (`Centre_santeID`) REFERENCES `centre_sante` (`ID`),
  ADD CONSTRAINT `FKextrait_bp986367` FOREIGN KEY (`AffectionID`) REFERENCES `affection` (`ID`);

--
-- Constraints for table `extrait_prestation`
--
ALTER TABLE `extrait_prestation`
  ADD CONSTRAINT `FKextrait_pres43215` FOREIGN KEY (`bpcID`) REFERENCES `bpc` (`ID`),
  ADD CONSTRAINT `FKextrait_pres56737` FOREIGN KEY (`PrestationID`) REFERENCES `prestation` (`ID`);

--
-- Constraints for table `incorporation`
--
ALTER TABLE `incorporation`
  ADD CONSTRAINT `FKIncorporate165230` FOREIGN KEY (`Code_familleID`) REFERENCES `code_famille` (`ID`),
  ADD CONSTRAINT `FKIncorporate168367` FOREIGN KEY (`SuccursaleID`) REFERENCES `succursale` (`ID`),
  ADD CONSTRAINT `FKIncorporate365218` FOREIGN KEY (`ExerciceID`) REFERENCES `exercice` (`ID`),
  ADD CONSTRAINT `FKIncorporate375428` FOREIGN KEY (`PoliceID`) REFERENCES `police` (`ID`),
  ADD CONSTRAINT `FKIncorporate702810` FOREIGN KEY (`Type_EmployeID`) REFERENCES `type_employe` (`ID`);

--
-- Constraints for table `police`
--
ALTER TABLE `police`
  ADD CONSTRAINT `FKPolice621241` FOREIGN KEY (`EtablissementID`) REFERENCES `etablissement` (`ID`),
  ADD CONSTRAINT `FKPolice842145` FOREIGN KEY (`ExerciceID`) REFERENCES `exercice` (`ID`);

--
-- Constraints for table `prestation`
--
ALTER TABLE `prestation`
  ADD CONSTRAINT `FKPrestation482124` FOREIGN KEY (`Categorie_PrestationID`) REFERENCES `categorie_prestation` (`ID`);

--
-- Constraints for table `remboursements`
--
ALTER TABLE `remboursements`
  ADD CONSTRAINT `FKRemboursem280249` FOREIGN KEY (`DecompteID`) REFERENCES `decompte` (`ID`),
  ADD CONSTRAINT `FKRemboursem449287` FOREIGN KEY (`ExerciceID`) REFERENCES `exercice` (`ID`),
  ADD CONSTRAINT `FKRemboursem676281` FOREIGN KEY (`AssureID`) REFERENCES `assure` (`ID`),
  ADD CONSTRAINT `FKRemboursem777829` FOREIGN KEY (`PrestationID`) REFERENCES `prestation` (`ID`),
  ADD CONSTRAINT `FKRemboursem781656` FOREIGN KEY (`PoliceID`) REFERENCES `police` (`ID`);

--
-- Constraints for table `succursale`
--
ALTER TABLE `succursale`
  ADD CONSTRAINT `avoir` FOREIGN KEY (`SouscripteurID`) REFERENCES `souscripteur` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
