-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Creato il: Gen 16, 2026 alle 14:29
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `almaule`
--

DROP DATABASE IF EXISTS almaule;

CREATE DATABASE almaule;
USE almaule;

-- --------------------------------------------------------

--
-- Struttura della tabella `account`
--

CREATE TABLE `account` (
  `Username` varchar(20) NOT NULL,
  `codiceRuolo` int(11) NOT NULL,
  `Attivo` tinyint(1) NOT NULL DEFAULT 1,
  `Mail` varchar(70) NOT NULL,
  `Password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `account`
--

INSERT INTO `account` (`Username`, `codiceRuolo`, `Attivo`, `Mail`, `Password`) VALUES
('beagre003', 3, 1, 'beagre003@studio.unibo.it', 'StudPass004'),
('clarom001', 3, 1, 'clarom001@studio.unibo.it', 'StudPass003'),
('fedrus001', 2, 1, 'fedrus001@studio.unibo.it', 'ProfPass002'),
('ilabru001', 3, 1, 'ilabru001@studio.unibo.it', 'StudPass001'),
('marmar001', 2, 1, 'marmar001@studio.unibo.it', 'ProfPass001'),
('matrus001', 3, 1, 'matrus001@studio.unibo.it', 'StudPass002'),
('vinesp001', 1, 1, 'vinesp001@studio.unibo.it', 'ProfPass003');

-- --------------------------------------------------------

--
-- Struttura della tabella `aule`
--

CREATE TABLE `aule` (
  `CodiceAula` varchar(100) NOT NULL,
  `Laboratorio` tinyint(1) DEFAULT NULL,
  `CodiceSede` int(11) NOT NULL,
  `NumeroPiano` int(11) DEFAULT NULL,
  `NumeroPosti` int(11) DEFAULT NULL,
  `Accessibilita` tinyint(1) DEFAULT NULL,
  `Proiettore` tinyint(1) DEFAULT NULL,
  `Prese` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `aule`
--

INSERT INTO `aule` (`CodiceAula`, `Laboratorio`, `CodiceSede`, `NumeroPiano`, `NumeroPosti`, `Accessibilita`, `Proiettore`, `Prese`) VALUES
('1A', 0, 1, 1, 55, 1, 1, 1),
('2A', 0, 1, 2, 30, 0, 1, 0),
('2G', 0, 1, 2, 45, 1, 1, 1),
('ALBERTI 4', 0, 52, 1, 40, 1, 1, 1),
('ALBERTI 8', 0, 63, 0, 45, 1, 1, 1),
('ANFITEATRO AULA MARCHETTI', 0, 76, 0, 110, 1, 1, 1),
('AUDITORIUM', 0, 17, 0, 150, 1, 1, 0),
('AULA 1', 0, 24, 0, 50, 1, 1, 1),
('AULA 1', 0, 59, 1, 40, 0, 1, 0),
('AULA 1', 0, 74, 2, 65, 1, 1, 1),
('AULA 1 ex CRI', 0, 71, 0, 60, 1, 1, 1),
('AULA 1 INFERMIERISTICA', 0, 73, 1, 55, 1, 1, 0),
('AULA 1 SCIENZE FARMACEUTICHE', 0, 81, 1, 80, 1, 1, 0),
('AULA 1.1', 0, 44, 1, 50, 0, 1, 1),
('AULA 1.3', 0, 11, 1, 45, 1, 1, 1),
('AULA 1.3', 0, 46, 0, 40, 1, 0, 1),
('AULA 12', 0, 47, 2, 45, 1, 1, 0),
('AULA 2', 0, 19, 0, 40, 1, 1, 0),
('AULA 2', 0, 74, 2, 50, 1, 1, 0),
('AULA 2.0', 0, 61, 0, 50, 1, 1, 1),
('AULA 2.1', 0, 36, 2, 55, 0, 1, 1),
('AULA 2.5', 0, 57, 0, 70, 1, 1, 0),
('AULA 3', 0, 37, 1, 45, 1, 1, 1),
('AULA 32', 0, 5, 3, 40, 0, 1, 0),
('AULA 4', 0, 42, 0, 80, 1, 1, 0),
('AULA 5', 0, 47, 0, 60, 1, 1, 1),
('AULA 7.8', 0, 12, 1, 30, 0, 0, 1),
('AULA A', 0, 22, 0, 130, 1, 1, 1),
('AULA A', 0, 89, 0, 75, 1, 1, 1),
('AULA ATTILIO MENSA', 0, 48, 0, 100, 1, 1, 1),
('AULA AURELIANO AMATI', 0, 91, 0, 85, 1, 1, 1),
('AULA B', 0, 27, 0, 45, 1, 0, 1),
('AULA B', 0, 65, 0, 70, 1, 1, 1),
('AULA C', 0, 40, 0, 110, 1, 1, 1),
('AULA C', 0, 90, 1, 50, 0, 1, 0),
('AULA COLONNE', 0, 70, 2, 50, 0, 1, 0),
('AULA D', 0, 62, 1, 35, 0, 1, 0),
('AULA DONATONI', 0, 18, 1, 70, 0, 1, 1),
('AULA ERGO 2', 0, 55, 1, 45, 0, 1, 1),
('AULA ESERCITAZIONE', 0, 74, 3, 40, 1, 1, 1),
('AULA EUROPA 1', 0, 33, 0, 100, 1, 1, 1),
('AULA F', 0, 49, 0, 80, 1, 1, 1),
('AULA FILOPANTI', 0, 7, 0, 100, 1, 1, 1),
('AULA G3 GIULIO PISA', 0, 38, 2, 75, 1, 1, 0),
('AULA GARZANTI 1', 0, 83, 0, 90, 1, 1, 1),
('AULA II', 0, 26, 0, 60, 1, 1, 0),
('AULA III', 0, 30, 2, 70, 1, 1, 1),
('AULA INFORMATICA CARLO FRANCION', 1, 68, 1, 25, 1, 1, 1),
('AULA IV', 0, 3, 0, 60, 1, 1, 1),
('AULA M4 MICROSCOPI', 1, 39, 1, 25, 1, 0, 1),
('AULA MAGNA', 0, 31, 0, 145, 1, 1, 1),
('AULA MAGNA', 0, 41, 1, 135, 1, 1, 1),
('AULA MAGNA', 0, 64, 0, 150, 1, 1, 1),
('AULA MAGNA', 0, 79, 0, 130, 0, 1, 1),
('AULA MAGNA', 0, 80, 2, 120, 1, 1, 1),
('AULA MAGNA ANTROPOLOGIA', 0, 2, 3, 140, 1, 1, 0),
('AULA MAGNA BIOCHIMICA', 0, 65, 1, 130, 1, 1, 0),
('AULA MAGNA BRANZI', 0, 86, 0, 115, 1, 1, 1),
('AULA MAGNA DERMATOLOGIA', 0, 66, 1, 90, 1, 1, 1),
('AULA MAGNA INFERMIERISTICA FO', 0, 72, 0, 140, 1, 1, 1),
('AULA MAGNA PEDIATRIA', 0, 87, 1, 95, 1, 1, 0),
('AULA MAGNA SPISA', 0, 77, 0, 100, 1, 1, 1),
('AULA MAGNA TRIOSSI', 0, 43, 0, 125, 1, 1, 1),
('AULA MALATTIE INFETTIVE', 0, 75, 3, 40, 1, 0, 1),
('AULA MUCCIOLI', 0, 29, 1, 50, 0, 1, 0),
('AULA NASSIRYA', 0, 84, 0, 100, 1, 1, 1),
('AULA O BELMELORO LABORATORIO INFORMATICO', 1, 9, 3, 50, 1, 1, 1),
('AULA PINCHERLE', 0, 13, 2, 60, 1, 1, 1),
('AULA S. GIACOMO', 0, 51, 0, 50, 0, 1, 0),
('AULA S. GIOBBE', 0, 97, 0, 60, 1, 1, 0),
('AULA SEMINARI', 0, 23, 2, 30, 0, 0, 0),
('AULA SEMINARI', 0, 98, 0, 25, 1, 1, 1),
('AULA SERRA ZANETTI', 0, 25, 3, 65, 0, 1, 1),
('AULA SFAMENI', 0, 88, 0, 60, 1, 1, 1),
('AULA TIBILETTI', 0, 10, 2, 90, 0, 1, 0),
('AULA V', 0, 8, 0, 75, 1, 1, 0),
('AULA V', 0, 15, 1, 55, 0, 1, 0),
('AULA VII', 0, 32, 1, 40, 0, 1, 0),
('AULA ZANZANI', 0, 58, 0, 120, 1, 1, 1),
('AULA1', 0, 45, 0, 60, 1, 1, 0),
('AULETTA RANZANI', 0, 6, 0, 35, 1, 0, 1),
('BRIOLINI 1', 0, 93, 0, 40, 1, 1, 0),
('CLODIA 4', 0, 53, 0, 55, 1, 1, 0),
('DMR1', 0, 85, 1, 45, 0, 1, 0),
('H', 0, 78, 0, 35, 1, 0, 0),
('LAB 1', 1, 82, 0, 20, 1, 1, 1),
('LAB 1', 1, 96, 1, 30, 1, 1, 1),
('LAB INFORMATICA 1', 1, 34, 1, 35, 1, 1, 1),
('LAB P4 DIAMOND', 1, 4, 4, 25, 1, 1, 1),
('LAB P6 GRAPHENE', 1, 4, 6, 20, 1, 0, 1),
('LAB. RESTAURO', 1, 92, 0, 20, 1, 0, 1),
('LABORATORIO 2', 1, 20, 0, 25, 1, 0, 1),
('LABORATORIO 3', 1, 61, 1, 20, 1, 0, 1),
('LABORATORIO DI MICROSCOPIA', 1, 69, 3, 20, 1, 0, 1),
('LABORATORIO DIDATTICO', 1, 67, -1, 30, 1, 0, 1),
('LABORATORIO INFORMATICO', 1, 50, 0, 30, 1, 1, 1),
('LABORATORIO MICROBIOLOGIA', 1, 60, 0, 25, 1, 0, 1),
('NAVIGARE 1A', 0, 54, 0, 35, 1, 0, 1),
('SALA BERTI', 0, 21, 0, 85, 1, 1, 1),
('SALA LAUREE', 0, 2, 1, 80, 1, 1, 1),
('SALA MARTELLI', 0, 35, 1, 60, 1, 0, 0),
('SALA POETI', 0, 28, 1, 95, 1, 1, 1),
('TA-02', 0, 14, 0, 120, 1, 1, 1),
('TA-11', 0, 16, 0, 110, 1, 1, 1),
('TEATINI 2', 0, 56, 1, 60, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `localita`
--

CREATE TABLE `localita` (
  `CodiceLocalita` int(11) NOT NULL,
  `Citta` varchar(100) NOT NULL,
  `Provincia` varchar(2) NOT NULL,
  `Regione` varchar(25) NOT NULL,
  `Latitudine` float NOT NULL,
  `Longitudine` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `localita`
--

INSERT INTO `localita` (`CodiceLocalita`, `Citta`, `Provincia`, `Regione`, `Latitudine`, `Longitudine`) VALUES
(94, 'Bologna', 'BO', 'Emilia-Romagna', 44.4641, 11.3904),
(78, 'Bologna', 'BO', 'Emilia-Romagna', 44.4753, 11.3405),
(79, 'Bologna', 'BO', 'Emilia-Romagna', 44.4805, 11.3439),
(15, 'Bologna', 'BO', 'Emilia-Romagna', 44.4878, 11.3289),
(19, 'Bologna', 'BO', 'Emilia-Romagna', 44.4889, 11.3552),
(27, 'Bologna', 'BO', 'Emilia-Romagna', 44.4899, 11.3529),
(12, 'Bologna', 'BO', 'Emilia-Romagna', 44.4902, 11.3363),
(32, 'Bologna', 'BO', 'Emilia-Romagna', 44.4902, 11.3478),
(11, 'Bologna', 'BO', 'Emilia-Romagna', 44.4904, 11.3289),
(77, 'Bologna', 'BO', 'Emilia-Romagna', 44.4906, 11.364),
(28, 'Bologna', 'BO', 'Emilia-Romagna', 44.4911, 11.3536),
(18, 'Bologna', 'BO', 'Emilia-Romagna', 44.4912, 11.3388),
(23, 'Bologna', 'BO', 'Emilia-Romagna', 44.4912, 11.3485),
(102, 'Bologna', 'BO', 'Emilia-Romagna', 44.4921, 11.3875),
(89, 'Bologna', 'BO', 'Emilia-Romagna', 44.4922, 11.3304),
(91, 'Bologna', 'BO', 'Emilia-Romagna', 44.4922, 11.3648),
(92, 'Bologna', 'BO', 'Emilia-Romagna', 44.4922, 11.3649),
(71, 'Bologna', 'BO', 'Emilia-Romagna', 44.4925, 11.3573),
(68, 'Bologna', 'BO', 'Emilia-Romagna', 44.4931, 11.3604),
(76, 'Bologna', 'BO', 'Emilia-Romagna', 44.4938, 11.3581),
(66, 'Bologna', 'BO', 'Emilia-Romagna', 44.494, 11.3573),
(110, 'Bologna', 'BO', 'Emilia-Romagna', 44.4941, 11.3558),
(70, 'Bologna', 'BO', 'Emilia-Romagna', 44.4942, 11.3305),
(90, 'Bologna', 'BO', 'Emilia-Romagna', 44.4944, 11.3505),
(111, 'Bologna', 'BO', 'Emilia-Romagna', 44.4949, 11.3569),
(80, 'Bologna', 'BO', 'Emilia-Romagna', 44.4954, 11.3548),
(7, 'Bologna', 'BO', 'Emilia-Romagna', 44.4956, 11.3565),
(85, 'Bologna', 'BO', 'Emilia-Romagna', 44.4957, 11.3532),
(9, 'Bologna', 'BO', 'Emilia-Romagna', 44.4958, 11.3556),
(2, 'Bologna', 'BO', 'Emilia-Romagna', 44.496, 11.3545),
(24, 'Bologna', 'BO', 'Emilia-Romagna', 44.4962, 11.352),
(3, 'Bologna', 'BO', 'Emilia-Romagna', 44.4963, 11.3541),
(67, 'Bologna', 'BO', 'Emilia-Romagna', 44.4966, 11.3559),
(20, 'Bologna', 'BO', 'Emilia-Romagna', 44.4967, 11.3514),
(25, 'Bologna', 'BO', 'Emilia-Romagna', 44.4969, 11.3509),
(5, 'Bologna', 'BO', 'Emilia-Romagna', 44.497, 11.3523),
(10, 'Bologna', 'BO', 'Emilia-Romagna', 44.497, 11.3524),
(51, 'Bologna', 'BO', 'Emilia-Romagna', 44.497, 11.3537),
(103, 'Bologna', 'BO', 'Emilia-Romagna', 44.4972, 11.3418),
(83, 'Bologna', 'BO', 'Emilia-Romagna', 44.4972, 11.3564),
(30, 'Bologna', 'BO', 'Emilia-Romagna', 44.4978, 11.352),
(38, 'Bologna', 'BO', 'Emilia-Romagna', 44.4978, 11.3552),
(39, 'Bologna', 'BO', 'Emilia-Romagna', 44.4981, 11.3557),
(13, 'Bologna', 'BO', 'Emilia-Romagna', 44.4983, 11.3558),
(65, 'Bologna', 'BO', 'Emilia-Romagna', 44.4984, 11.3555),
(93, 'Bologna', 'BO', 'Emilia-Romagna', 44.4989, 11.3538),
(50, 'Bologna', 'BO', 'Emilia-Romagna', 44.499, 11.3536),
(40, 'Bologna', 'BO', 'Emilia-Romagna', 44.4991, 11.3528),
(101, 'Bologna', 'BO', 'Emilia-Romagna', 44.4992, 11.3525),
(41, 'Bologna', 'BO', 'Emilia-Romagna', 44.4999, 11.3548),
(8, 'Bologna', 'BO', 'Emilia-Romagna', 44.5001, 11.3579),
(31, 'Bologna', 'BO', 'Emilia-Romagna', 44.5002, 11.3549),
(45, 'Bologna', 'BO', 'Emilia-Romagna', 44.5004, 11.355),
(22, 'Bologna', 'BO', 'Emilia-Romagna', 44.5008, 11.3373),
(6, 'Bologna', 'BO', 'Emilia-Romagna', 44.5012, 11.3588),
(21, 'Bologna', 'BO', 'Emilia-Romagna', 44.5024, 11.33),
(104, 'Bologna', 'BO', 'Emilia-Romagna', 44.5045, 11.3925),
(105, 'Bologna', 'BO', 'Emilia-Romagna', 44.5102, 11.3832),
(14, 'Bologna', 'BO', 'Emilia-Romagna', 44.5136, 11.3184),
(16, 'Bologna', 'BO', 'Emilia-Romagna', 44.5137, 11.3186),
(42, 'Bologna', 'BO', 'Emilia-Romagna', 44.514, 11.4022),
(17, 'Bologna', 'BO', 'Emilia-Romagna', 44.5177, 11.2792),
(4, 'Bologna', 'BO', 'Emilia-Romagna', 44.5207, 11.3378),
(82, 'Bologna', 'BO', 'Emilia-Romagna', 44.5219, 11.3381),
(81, 'Bologna', 'BO', 'Emilia-Romagna', 44.5221, 11.3315),
(1, 'Bologna', 'BO', 'Emilia-Romagna', 44.5229, 11.3345),
(100, 'Budrio', 'BO', 'Emilia-Romagna', 44.4966, 11.3559),
(34, 'Cesena', 'FC', 'Emilia-Romagna', 44.0504, 12.1776),
(75, 'Cesena', 'FC', 'Emilia-Romagna', 44.1413, 12.2453),
(33, 'Cesena', 'FC', 'Emilia-Romagna', 44.1448, 12.2412),
(57, 'Cesena', 'FC', 'Emilia-Romagna', 44.1477, 12.2353),
(49, 'Cesena', 'FC', 'Emilia-Romagna', 44.1565, 12.2428),
(106, 'Cesenatico', 'FC', 'Emilia-Romagna', 44.2038, 12.3964),
(74, 'Faenza', 'RA', 'Emilia-Romagna', 44.2837, 11.883),
(95, 'Faenza', 'RA', 'Emilia-Romagna', 44.2925, 11.7827),
(107, 'Faenza', 'RA', 'Emilia-Romagna', 44.3088, 11.8967),
(44, 'Forlì', 'FC', 'Emilia-Romagna', 44.2007, 12.0637),
(69, 'Forlì', 'FC', 'Emilia-Romagna', 44.2042, 12.0198),
(73, 'Forlì', 'FC', 'Emilia-Romagna', 44.2142, 12.0631),
(47, 'Forlì', 'FC', 'Emilia-Romagna', 44.2175, 12.0443),
(58, 'Forlì', 'FC', 'Emilia-Romagna', 44.2181, 12.0508),
(86, 'Forlì', 'FC', 'Emilia-Romagna', 44.219, 12.0421),
(46, 'Forlì', 'FC', 'Emilia-Romagna', 44.2195, 12.0427),
(88, 'Forlì', 'FC', 'Emilia-Romagna', 44.2204, 12.0422),
(87, 'Forlì', 'FC', 'Emilia-Romagna', 44.2206, 12.0463),
(59, 'Imola', 'BO', 'Emilia-Romagna', 44.341, 11.7201),
(36, 'Imola', 'BO', 'Emilia-Romagna', 44.3528, 11.7109),
(37, 'Imola', 'BO', 'Emilia-Romagna', 44.3531, 11.7113),
(60, 'Imola', 'BO', 'Emilia-Romagna', 44.3533, 11.7078),
(72, 'Imola', 'BO', 'Emilia-Romagna', 44.3543, 11.708),
(35, 'Imola', 'BO', 'Emilia-Romagna', 44.3707, 11.6704),
(48, 'Ozzano dell\'Emilia', 'BO', 'Emilia-Romagna', 44.4357, 11.4877),
(43, 'Ravenna', 'RA', 'Emilia-Romagna', 44.4113, 12.1919),
(61, 'Ravenna', 'RA', 'Emilia-Romagna', 44.4149, 12.203),
(62, 'Ravenna', 'RA', 'Emilia-Romagna', 44.4157, 12.2026),
(64, 'Ravenna', 'RA', 'Emilia-Romagna', 44.4162, 12.1961),
(29, 'Ravenna', 'RA', 'Emilia-Romagna', 44.4173, 12.2019),
(26, 'Ravenna', 'RA', 'Emilia-Romagna', 44.4184, 12.197),
(96, 'Ravenna', 'RA', 'Emilia-Romagna', 44.4197, 12.1971),
(97, 'Ravenna', 'RA', 'Emilia-Romagna', 44.4211, 12.1954),
(84, 'Ravenna', 'RA', 'Emilia-Romagna', 44.4352, 12.1982),
(108, 'Riccione', 'RN', 'Emilia-Romagna', 44.064, 12.5673),
(56, 'Rimini', 'RN', 'Emilia-Romagna', 44.0604, 12.5699),
(52, 'Rimini', 'RN', 'Emilia-Romagna', 44.0608, 12.5696),
(63, 'Rimini', 'RN', 'Emilia-Romagna', 44.0616, 12.5697),
(99, 'Rimini', 'RN', 'Emilia-Romagna', 44.062, 12.57),
(98, 'Rimini', 'RN', 'Emilia-Romagna', 44.0627, 12.5647),
(55, 'Rimini', 'RN', 'Emilia-Romagna', 44.0627, 12.5729),
(53, 'Rimini', 'RN', 'Emilia-Romagna', 44.064, 12.5673),
(109, 'Rimini', 'RN', 'Emilia-Romagna', 44.0641, 12.568),
(54, 'Rimini', 'RN', 'Emilia-Romagna', 44.0649, 12.568);

-- --------------------------------------------------------

--
-- Struttura della tabella `piani`
--

CREATE TABLE `piani` (
  `Numero` int(11) NOT NULL,
  `CodiceSede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `piani`
--

INSERT INTO `piani` (`Numero`, `CodiceSede`) VALUES
(-2, 22),
(-1, 2),
(-1, 8),
(-1, 11),
(-1, 23),
(-1, 31),
(-1, 43),
(-1, 46),
(-1, 65),
(-1, 67),
(-1, 68),
(-1, 79),
(-1, 87),
(0, 1),
(0, 2),
(0, 3),
(0, 5),
(0, 6),
(0, 7),
(0, 8),
(0, 9),
(0, 10),
(0, 11),
(0, 12),
(0, 13),
(0, 14),
(0, 15),
(0, 16),
(0, 17),
(0, 18),
(0, 19),
(0, 20),
(0, 21),
(0, 22),
(0, 23),
(0, 24),
(0, 25),
(0, 26),
(0, 27),
(0, 28),
(0, 30),
(0, 31),
(0, 32),
(0, 33),
(0, 34),
(0, 36),
(0, 38),
(0, 39),
(0, 40),
(0, 41),
(0, 42),
(0, 43),
(0, 44),
(0, 45),
(0, 46),
(0, 47),
(0, 48),
(0, 49),
(0, 50),
(0, 51),
(0, 52),
(0, 53),
(0, 54),
(0, 57),
(0, 58),
(0, 59),
(0, 60),
(0, 61),
(0, 62),
(0, 63),
(0, 64),
(0, 65),
(0, 68),
(0, 71),
(0, 72),
(0, 73),
(0, 76),
(0, 77),
(0, 78),
(0, 79),
(0, 82),
(0, 83),
(0, 84),
(0, 85),
(0, 86),
(0, 88),
(0, 89),
(0, 91),
(0, 92),
(0, 93),
(0, 97),
(0, 98),
(1, 1),
(1, 2),
(1, 5),
(1, 6),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 18),
(1, 20),
(1, 22),
(1, 23),
(1, 25),
(1, 26),
(1, 28),
(1, 29),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 44),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 52),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 71),
(1, 73),
(1, 77),
(1, 80),
(1, 81),
(1, 85),
(1, 86),
(1, 87),
(1, 90),
(1, 93),
(1, 96),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 9),
(2, 10),
(2, 11),
(2, 13),
(2, 14),
(2, 20),
(2, 23),
(2, 25),
(2, 28),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 36),
(2, 37),
(2, 38),
(2, 46),
(2, 47),
(2, 48),
(2, 57),
(2, 58),
(2, 61),
(2, 65),
(2, 66),
(2, 68),
(2, 70),
(2, 74),
(2, 80),
(3, 2),
(3, 4),
(3, 5),
(3, 9),
(3, 10),
(3, 11),
(3, 13),
(3, 20),
(3, 25),
(3, 42),
(3, 44),
(3, 68),
(3, 69),
(3, 74),
(3, 75),
(4, 2),
(4, 4),
(4, 10),
(4, 13),
(5, 4),
(5, 13),
(5, 42),
(6, 4),
(6, 13),
(7, 4),
(7, 13),
(8, 13);

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `CodicePrenotazioni` int(11) NOT NULL,
  `CodiceAccount` varchar(20) NOT NULL,
  `CodiceAula` varchar(50) NOT NULL,
  `CodiceSede` int(11) NOT NULL,
  `DataPrenotazione` datetime NOT NULL,
  `NumeroPersone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `professori`
--

CREATE TABLE `professori` (
  `Matricola` bigint(20) UNSIGNED NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `Data_Di_Nascita` date NOT NULL,
  `Data_Assunzione` date NOT NULL,
  `CodiceAccount` varchar(20) NOT NULL,
  `Ordinario` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `professori`
--

INSERT INTO `professori` (`Matricola`, `Nome`, `Cognome`, `Data_Di_Nascita`, `Data_Assunzione`, `CodiceAccount`, `Ordinario`) VALUES
(1, 'Marco', 'Marino', '1967-06-24', '2002-03-21', 'marmar001', 1),
(2, 'Federica', 'Russo', '1986-10-10', '2020-05-22', 'fedrus001', 0),
(3, 'Vincenzo', 'Esposito', '1969-12-02', '2004-06-10', 'vinesp001', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `sedi`
--

CREATE TABLE `sedi` (
  `CodiceSede` int(11) NOT NULL,
  `Via` varchar(40) DEFAULT NULL,
  `Numero_Civico` varchar(10) NOT NULL,
  `CodiceLocalita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `sedi`
--

INSERT INTO `sedi` (`CodiceSede`, `Via`, `Numero_Civico`, `CodiceLocalita`) VALUES
(93, 'Corso d\'Augusto', '237', 97),
(34, 'Piazza Aldo Moro', '90', 34),
(5, 'Piazza Antonino Scaravilli', '1-2', 5),
(39, 'Piazza di Porta San Donato', '1', 39),
(13, 'Piazza di Porta San Donato', '5', 13),
(84, 'Piazza Giovan Battista Morgagni', '2', 87),
(49, 'Piazza Goidanich', '60', 49),
(23, 'Piazza S.Giovanni in Monte', '2', 23),
(58, 'Piazzale della Vittoria', '15', 58),
(60, 'Piazzale Giovanni dalle Bande Nere', '11', 60),
(19, 'Piazzetta Giorgio Morandi', '2', 19),
(17, 'Piazzetta Pier Paolo Pasolini', '5/b', 17),
(56, 'Piazzetta Teatini', '10', 56),
(63, 'Piazzetta Teatini', '13', 63),
(28, 'Strada Maggiore', '45', 28),
(43, 'Via Alberto Missiroli', '8', 43),
(90, 'Via Altura', '3', 93),
(29, 'Via Angelo Mariani', '5', 29),
(59, 'Via Antonio Ascari', '17', 59),
(22, 'Via Azzo Gardino', '19-23-25-2', 22),
(18, 'Via Barberia', '4-4/2', 18),
(82, 'Via Bartolomeo Lombardini', '5', 85),
(96, 'Via Bastioni Settentrionali', '45', 102),
(77, 'Via Belmeloro', '10-12', 79),
(81, 'Via Belmeloro', '4-6', 84),
(9, 'Via Beniamino Andreatta', '8', 9),
(6, 'Via Camillo Ranzani', '14', 6),
(69, 'Via Carlo Forlanini', '34', 69),
(32, 'Via Cartoleria', '5', 32),
(53, 'Via Clodia', '43', 53),
(94, 'Via Coriano', '38', 98),
(54, 'Via dei Mille', '39', 54),
(80, 'Via dell\'Agricoltura', '5', 83),
(57, 'Via dell\'Università', '50', 57),
(1, 'Via della beverara', '123', 1),
(30, 'Via delle Belle Arti', '41', 30),
(35, 'VIA Emilia', '25', 35),
(95, 'Via Euterpe', '7', 100),
(45, 'Via Filippo Re', '10', 45),
(41, 'Via Filippo Re', '6', 41),
(31, 'Via Filippo Re', '8', 31),
(72, 'Via Francesco Balilla Pratella', '10', 73),
(3, 'Via Francesco Selmi', '2', 3),
(46, 'Via Giacomo della Torre', '5', 46),
(83, 'Via Giovanni Fronticelli Baldelli', '16', 86),
(76, 'Via Giulio Cesare Pupilli', '1', 78),
(36, 'Via Giuseppe Garibaldi', '24', 36),
(37, 'Via Giuseppe Garibaldi', '37', 37),
(66, 'Via Giuseppe Massarenti', '1', 66),
(87, 'Via Giuseppe Massarenti', '11', 90),
(88, 'Via Giuseppe Massarenti', '13', 91),
(68, 'Via Giuseppe Massarenti', '9', 68),
(26, 'Via Giuseppe Pasolini', '23', 26),
(62, 'Via Guaccimanni', '42', 62),
(64, 'Via Guglielmo Oberdan', '1', 64),
(40, 'Via Irnerio', '42', 40),
(50, 'Via Irnerio', '46', 50),
(65, 'Via Irnerio', '48', 65),
(89, 'Via Irnerio', '49', 92),
(44, 'Via Luciano Montaspro', '97', 44),
(21, 'Via Ludovico Berti', '2/7', 21),
(4, 'Via Piero Gobetti', '87', 4),
(78, 'Via Piero Gobetti', '93/2', 81),
(75, 'Via Pietro Albertoni', '15', 77),
(52, 'Via Quintino Sella', '13', 52),
(55, 'Via Roma', '47', 55),
(67, 'Via San Giacomo', '14', 67),
(51, 'Via San Giacomo', '3', 51),
(73, 'Via San Giovanni Bosco', '1', 74),
(74, 'Via San Lorenzino', '23', 75),
(27, 'Via San Petronio vecchio', '32', 27),
(97, 'Via San Vitale', '114-116-11', 103),
(92, 'Via San Vitale', '28 e 30', 95),
(86, 'Via San Vitale', '59-61-61/2', 89),
(70, 'Via Sant\'Isaia', '90', 70),
(12, 'Via Saragozza', '8-10', 12),
(2, 'Via Selmi', '3', 2),
(91, 'Via Tebano', '54', 94),
(48, 'Via Tolara di Sopra', '54', 48),
(61, 'Via Tombesi dall\'Ova', '55', 61),
(85, 'Via Ugo Foscolo', '7', 88),
(14, 'Via Umberto Terracini', '28', 14),
(16, 'Via Umberto Terracini', '34', 16),
(25, 'Via Zamboni', '32', 25),
(24, 'Via Zamboni', '33', 24),
(20, 'Via Zamboni', '34', 20),
(10, 'Via Zamboni', '38', 10),
(38, 'Via Zamboni', '67', 38),
(8, 'Viale Carlo Berti Pichat', '6-6/2', 8),
(11, 'Viale del Risorgimento', '2', 11),
(15, 'Viale del Risorgimento', '4', 15),
(33, 'Viale Europa', '115', 33),
(47, 'Viale Filippo Corridoni', '20', 47),
(71, 'Viale Gian Battista Ercolani', '6', 71),
(42, 'Viale Giuseppe Fanin', '40-50', 42),
(79, 'Viale Quirico Filopanti', '1-3', 82),
(7, 'Viale Quirico Filopanti', '5', 7),
(98, 'Viale Quirico Filopanti', '9', 104);

-- --------------------------------------------------------

--
-- Struttura della tabella `segnalazioni`
--

CREATE TABLE `segnalazioni` (
  `CodiceSegnalazione` int(11) NOT NULL,
  `CodicePrenotazione` int(11) NOT NULL,
  `CodiceAccount` varchar(20) NOT NULL,
  `Descrizione` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `studenti`
--

CREATE TABLE `studenti` (
  `Matricola` bigint(20) UNSIGNED NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `Data_Di_Nascita` date NOT NULL,
  `CodiceAccount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `studenti`
--

INSERT INTO `studenti` (`Matricola`, `Nome`, `Cognome`, `Data_Di_Nascita`, `CodiceAccount`) VALUES
(4, 'Ilaria', 'Bruno', '2006-03-19', 'ilabru001'),
(5, 'Matteo', 'Russo', '2004-04-20', 'matrus001'),
(6, 'Claudia', 'Romano', '2005-05-21', 'clarom001'),
(7, 'Beatrice', 'Greco', '2006-06-22', 'beagre003');

-- --------------------------------------------------------

--
-- Struttura della tabella `tipi_account`
--

CREATE TABLE `tipi_account` (
  `ID` int(11) NOT NULL,
  `Tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tipi_account`
--

INSERT INTO `tipi_account` (`ID`, `Tipo`) VALUES
(1, 'Admin'),
(2, 'Professore'),
(3, 'Studente');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Mail` (`Mail`),
  ADD KEY `codiceRuolo` (`codiceRuolo`);

--
-- Indici per le tabelle `aule`
--
ALTER TABLE `aule`
  ADD PRIMARY KEY (`CodiceAula`,`CodiceSede`),
  ADD KEY `NumeroPiano` (`NumeroPiano`,`CodiceSede`);

--
-- Indici per le tabelle `localita`
--
ALTER TABLE `localita`
  ADD PRIMARY KEY (`CodiceLocalita`),
  ADD UNIQUE KEY `CAP` (`Citta`,`Provincia`,`Regione`,`Latitudine`,`Longitudine`) USING BTREE;

--
-- Indici per le tabelle `piani`
--
ALTER TABLE `piani`
  ADD PRIMARY KEY (`Numero`,`CodiceSede`),
  ADD KEY `CodiceSede` (`CodiceSede`);

--
-- Indici per le tabelle `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`CodicePrenotazioni`),
  ADD UNIQUE KEY `CodiceAula` (`CodiceAula`,`CodiceSede`,`DataPrenotazione`),
  ADD KEY `CodiceAccount` (`CodiceAccount`);

--
-- Indici per le tabelle `professori`
--
ALTER TABLE `professori`
  ADD PRIMARY KEY (`Matricola`),
  ADD KEY `CodiceAccount` (`CodiceAccount`);

--
-- Indici per le tabelle `sedi`
--
ALTER TABLE `sedi`
  ADD PRIMARY KEY (`CodiceSede`),
  ADD UNIQUE KEY `Via` (`Via`,`Numero_Civico`,`CodiceLocalita`),
  ADD KEY `CodiceLocalita` (`CodiceLocalita`);

--
-- Indici per le tabelle `segnalazioni`
--
ALTER TABLE `segnalazioni`
  ADD PRIMARY KEY (`CodiceSegnalazione`),
  ADD KEY `CodicePrenotazione` (`CodicePrenotazione`),
  ADD KEY `CodiceAccount` (`CodiceAccount`);

--
-- Indici per le tabelle `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`Matricola`),
  ADD KEY `CodiceAccount` (`CodiceAccount`);

--
-- Indici per le tabelle `tipi_account`
--
ALTER TABLE `tipi_account`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Tipo` (`Tipo`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `localita`
--
ALTER TABLE `localita`
  MODIFY `CodiceLocalita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  MODIFY `CodicePrenotazioni` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `sedi`
--
ALTER TABLE `sedi`
  MODIFY `CodiceSede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT per la tabella `segnalazioni`
--
ALTER TABLE `segnalazioni`
  MODIFY `CodiceSegnalazione` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `tipi_account`
--
ALTER TABLE `tipi_account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`codiceRuolo`) REFERENCES `tipi_account` (`ID`);

--
-- Limiti per la tabella `aule`
--
ALTER TABLE `aule`
  ADD CONSTRAINT `aule_ibfk_1` FOREIGN KEY (`NumeroPiano`,`CodiceSede`) REFERENCES `piani` (`Numero`, `CodiceSede`);

--
-- Limiti per la tabella `piani`
--
ALTER TABLE `piani`
  ADD CONSTRAINT `piani_ibfk_1` FOREIGN KEY (`CodiceSede`) REFERENCES `sedi` (`CodiceSede`);

--
-- Limiti per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD CONSTRAINT `prenotazioni_ibfk_1` FOREIGN KEY (`CodiceAccount`) REFERENCES `account` (`Username`),
  ADD CONSTRAINT `prenotazioni_ibfk_2` FOREIGN KEY (`CodiceAula`,`CodiceSede`) REFERENCES `aule` (`CodiceAula`, `CodiceSede`);

--
-- Limiti per la tabella `professori`
--
ALTER TABLE `professori`
  ADD CONSTRAINT `professori_ibfk_1` FOREIGN KEY (`CodiceAccount`) REFERENCES `account` (`Username`);

--
-- Limiti per la tabella `sedi`
--
ALTER TABLE `sedi`
  ADD CONSTRAINT `sedi_ibfk_1` FOREIGN KEY (`CodiceLocalita`) REFERENCES `localita` (`CodiceLocalita`);

--
-- Limiti per la tabella `segnalazioni`
--
ALTER TABLE `segnalazioni`
  ADD CONSTRAINT `segnalazioni_ibfk_1` FOREIGN KEY (`CodicePrenotazione`) REFERENCES `prenotazioni` (`CodicePrenotazioni`),
  ADD CONSTRAINT `segnalazioni_ibfk_2` FOREIGN KEY (`CodiceAccount`) REFERENCES `account` (`Username`);

--
-- Limiti per la tabella `studenti`
--
ALTER TABLE `studenti`
  ADD CONSTRAINT `studenti_ibfk_1` FOREIGN KEY (`CodiceAccount`) REFERENCES `account` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
