-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 22, 2026 alle 01:15
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
('beagre003', 3, 1, 'beagre003@studio.unibo.it', '123'),
('clarom001', 3, 0, 'clarom001@studio.unibo.it', 'StudPass003'),
('fedrus001', 2, 1, 'fedrus001@studio.unibo.it', 'ProfPass002'),
('ilabru001', 3, 1, 'ilabru001@studio.unibo.it', 'StudPass001'),
('marmar001', 2, 0, 'marmar001@studio.unibo.it', '456'),
('matrus001', 3, 1, 'matrus001@studio.unibo.it', 'StudPass002'),
('vinesp001', 1, 1, 'vinesp001@studio.unibo.it', '789');

-- --------------------------------------------------------

--
-- Struttura della tabella `aule`
--

CREATE TABLE `aule` (
  `CodiceAula` int(11) NOT NULL,
  `NomeAula` varchar(120) NOT NULL,
  `CodiceSede` int(11) NOT NULL,
  `NumeroPiano` varchar(50) NOT NULL,
  `NumeroPosti` int(11) NOT NULL,
  `Accessibilita` tinyint(1) NOT NULL,
  `Proiettore` tinyint(1) NOT NULL,
  `Prese` tinyint(1) NOT NULL,
  `Laboratorio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `aule`
--

INSERT INTO `aule` (`CodiceAula`, `NomeAula`, `CodiceSede`, `NumeroPiano`, `NumeroPosti`, `Accessibilita`, `Proiettore`, `Prese`, `Laboratorio`) VALUES
(1, '2G', 1, 'Piano Secondo', 48, 0, 1, 0, 0),
(2, '2A', 1, 'Piano Secondo', 139, 0, 1, 1, 0),
(3, '1A', 1, 'Piano Primo', 63, 1, 1, 0, 0),
(4, 'AULA IV', 3, 'Piano Terra', 62, 1, 1, 0, 0),
(5, '1G', 1, 'Piano Primo', 122, 1, 0, 0, 0),
(6, 'AULA O BELMELORO LABORATORIO INFORMATICO', 9, 'Piano Terzo', 82, 0, 1, 0, 1),
(7, 'AULA N BELMELORO LABORATORIO INFORMATICO', 9, 'Piano Terzo', 111, 1, 1, 0, 1),
(8, 'AULA P BELMELORO', 9, 'Piano Terra', 91, 0, 0, 0, 0),
(9, 'AULA 7.8', 12, 'Piano Primo', 96, 0, 1, 0, 0),
(10, 'AULA 7.5', 12, 'Piano Primo', 53, 1, 1, 0, 0),
(11, 'AULA 7.11', 12, 'Piano Terra', 47, 1, 1, 0, 0),
(12, 'AUDITORIUM', 17, 'Piano Terra', 100, 1, 0, 1, 0),
(13, 'LABORATORIO 2 (Accesso da Via Zamboni, 34)', 20, 'Piano Terra', 126, 0, 1, 0, 1),
(14, 'LABORATORIO 3 (Accesso da Via Zamboni, 34)', 20, 'Piano Terra', 50, 1, 1, 1, 1),
(15, 'TEATRO', 17, 'Piano Terra', 52, 1, 1, 0, 0),
(16, 'AULA A (Accesso da Via Zamboni, 34)', 20, 'Piano Primo', 146, 1, 1, 1, 0),
(17, 'AULA 2 (Accesso da Via Zamboni, 32)', 20, 'Piano Secondo', 120, 0, 0, 1, 0),
(18, 'AULA C (Accesso da Via Zamboni, 34)', 20, 'Piano Primo', 59, 1, 1, 1, 0),
(19, 'AULA D (Accesso da Via Zamboni, 34)', 20, 'Piano Terzo', 139, 1, 1, 1, 0),
(20, 'AULA B (Accesso da Via Zamboni, 34)', 20, 'Piano Primo', 131, 0, 0, 1, 0),
(21, 'AULA E (Accesso da Via Zamboni, 34)', 20, 'Piano Primo', 144, 1, 1, 1, 0),
(22, 'AULA II', 28, 'Piano Terra', 72, 1, 1, 0, 0),
(23, 'AULA IV', 28, 'Piano Primo', 52, 1, 1, 0, 0),
(24, 'SALA POETI', 30, 'Piano Primo', 52, 0, 1, 1, 0),
(25, 'AULA VII', 31, 'Piano Primo', 90, 0, 1, 1, 0),
(26, 'AULA II', 31, 'Piano Terra', 111, 1, 1, 1, 0),
(27, 'AULA VIII', 31, 'Piano Secondo Ammezzato', 117, 0, 1, 0, 0),
(28, 'AULA I', 31, 'Piano Terra', 34, 1, 1, 1, 0),
(29, 'AULA IX', 31, 'Piano Primo Ammezzato', 59, 1, 1, 0, 0),
(30, 'STUDIO 53', 31, 'Piano Primo', 42, 1, 0, 1, 0),
(31, 'AULA V', 31, 'Piano Primo', 37, 0, 1, 0, 0),
(32, 'AULA VI', 31, 'Piano Primo', 124, 1, 1, 0, 0),
(33, 'AULA SEMINARI', 20, 'Piano Primo', 70, 1, 1, 1, 0),
(34, 'AULA MANSARDA', 20, 'Piano Primo', 107, 1, 1, 0, 0),
(35, 'LAB  INFORMATICA 1', 35, 'Piano Primo', 110, 1, 1, 1, 1),
(36, 'LAB INFORMATICA 2', 35, 'Piano Secondo', 92, 1, 1, 1, 1),
(37, 'AULA ANFITEATRO POMBENI', 35, 'Piano Primo', 134, 0, 1, 0, 0),
(38, 'AULA A', 35, 'Piano Primo', 73, 1, 1, 1, 0),
(39, 'AULA E', 35, 'Piano Primo', 81, 1, 1, 0, 0),
(40, 'AULA F', 35, 'Piano Primo', 58, 0, 1, 0, 0),
(41, 'AULA V', 28, 'Piano Primo', 95, 0, 1, 0, 0),
(42, 'SALETTA SEMINARI', 17, 'Piano Terra', 80, 0, 1, 1, 0),
(43, 'SALA POLIVALENTE SPAZIO CINEMA', 17, 'Piano Terra', 111, 0, 1, 1, 0),
(44, 'AULA 2', 37, 'Piano Primo', 61, 0, 1, 1, 0),
(45, 'AULA VI', 3, 'Piano Terra', 104, 0, 1, 0, 0),
(46, 'AULA V', 3, 'Piano Terra', 113, 0, 1, 0, 0),
(47, 'AULA B', 41, 'Piano Terra', 23, 0, 0, 1, 0),
(48, 'AULA VII', 3, 'Piano Secondo', 65, 1, 1, 1, 0),
(49, 'AULA M2 P.GAZZI', 42, 'Piano Terra', 109, 0, 1, 0, 0),
(50, 'AULA A EST', 41, 'Piano Terra', 23, 1, 0, 0, 0),
(51, 'AULA 4', 44, 'Piano Terra', 58, 0, 1, 1, 0),
(52, 'AULA 5', 44, 'Piano Terra', 43, 1, 1, 1, 0),
(53, 'AULA 7', 44, 'Piano Terra', 143, 0, 1, 0, 0),
(54, 'LABORATORIO BIOLOGIA 1', 44, 'Piano Primo', 25, 0, 0, 1, 1),
(55, 'AULA 7.4', 12, 'Piano Primo', 59, 1, 1, 1, 0),
(56, 'AULA Q', 9, 'Piano Terra', 28, 0, 0, 1, 0),
(57, 'AULA 6', 20, 'Piano Terra', 127, 1, 1, 1, 0),
(58, 'AULA MAGNA', 35, 'Piano Terra', 106, 1, 1, 1, 0),
(59, 'AULA C', 35, 'Piano Primo Ammezzato', 33, 0, 1, 1, 0),
(60, 'EX EMEROTECA - SALA DOTTORANDI', 30, 'Piano Terra', 97, 0, 0, 0, 0),
(61, 'AULA 3', 61, 'Piano Primo', 53, 1, 1, 1, 0),
(62, 'AULA I - MAGNA', 3, 'Piano Terra', 92, 0, 1, 1, 0),
(63, 'AULA C', 41, 'Piano Terra', 28, 0, 0, 0, 0),
(64, 'AULA M4 MICROSCOPI', 42, 'Piano Primo', 34, 0, 1, 1, 0),
(65, 'AULA A OVEST', 41, 'Piano Terra', 28, 1, 1, 1, 0),
(66, 'AULA III', 3, 'Piano Terra', 51, 1, 1, 1, 0),
(67, 'AULA II', 3, 'Piano Terra', 138, 1, 0, 1, 0),
(68, 'E', 1, 'Piano Terra', 93, 1, 0, 0, 0),
(69, 'C', 1, 'Piano Terra', 133, 0, 0, 0, 0),
(70, '1L', 1, 'Piano Primo', 42, 1, 1, 1, 0),
(71, '1E', 1, 'Piano Primo', 97, 1, 1, 1, 0),
(72, '1B', 1, 'Piano Primo', 84, 1, 1, 1, 0),
(73, 'LABORATORIO 1', 64, 'Piano Terra', 29, 1, 1, 0, 1),
(74, 'AULA E2', 65, 'Piano Terra', 51, 1, 0, 0, 0),
(75, 'AULA 4 BODONIANA', 64, 'Piano Primo', 84, 0, 0, 1, 0),
(76, 'H', 66, 'Piano Terra', 144, 1, 1, 0, 0),
(77, 'L', 66, 'Piano Terra', 92, 0, 1, 1, 0),
(78, 'I', 66, 'Piano Terra', 86, 1, 1, 1, 0),
(79, 'LABORATORIO M', 66, 'Piano Terra', 49, 0, 0, 1, 1),
(80, 'AULA D', 35, 'Piano Primo', 129, 0, 0, 1, 0),
(81, 'AULA 1', 61, 'Piano Primo', 82, 1, 1, 0, 0),
(82, 'AULA 2', 61, 'Piano Primo', 150, 1, 1, 1, 0),
(83, 'AULA 1', 68, 'Piano Primo', 136, 0, 1, 1, 0),
(84, 'AULA 1', 67, 'Piano Primo', 137, 0, 1, 1, 0),
(85, 'SETTORE 3', 68, 'Piano Terra', 91, 1, 1, 1, 0),
(86, 'SETTORE 3', 67, 'Piano Terra', 117, 1, 1, 0, 0),
(87, 'SETTORE 4', 68, 'Piano Terra', 102, 0, 1, 0, 0),
(88, 'SETTORE 4', 67, 'Piano Terra', 92, 1, 1, 1, 0),
(89, 'AULA 15', 44, 'Piano Primo', 85, 1, 0, 1, 0),
(90, 'AULA MAGNA', 44, 'Piano Terra', 28, 1, 1, 0, 0),
(91, 'AULA 3', 44, 'Piano Terra', 76, 0, 1, 0, 0),
(92, 'AULA 9', 44, 'Piano Terra', 22, 1, 1, 1, 0),
(93, 'AULA GUARNIERI', 44, 'Piano Terra', 40, 0, 1, 0, 0),
(94, '2F', 1, 'Piano Secondo', 135, 1, 0, 0, 0),
(95, 'AULA 2', 30, 'Piano Terra', 133, 1, 0, 0, 0),
(96, 'AULA E BELMELORO', 9, 'Piano Secondo', 25, 1, 0, 1, 0),
(97, 'AULA E1', 65, 'Piano Terra', 41, 0, 1, 1, 0),
(98, 'AULA E3', 65, 'Piano Terra', 97, 0, 1, 1, 0),
(99, 'AULA I', 28, 'Piano Terra', 86, 0, 1, 0, 0),
(100, 'ALBERTI 8', 73, 'Piano Terra', 63, 1, 0, 1, 0),
(101, 'ALBERTI 9', 73, 'Piano Terra', 28, 1, 1, 1, 0),
(102, 'AULA 10 \"AULA MAGNA\"', 74, 'Piano Secondo', 82, 0, 1, 0, 0),
(103, 'AULA 1 BODONIANA', 64, 'Piano Terra', 25, 1, 1, 0, 0),
(104, 'AULA 1 ex CRI', 82, 'Piano Terra', 94, 0, 1, 1, 0),
(105, 'LABORATORIO LINGUISTICO 1', 30, 'Piano Secondo', 56, 1, 1, 1, 1),
(106, 'AULA 1', 30, 'Piano Terra', 109, 0, 1, 0, 0),
(107, 'AULA JEMOLO', 30, 'Piano Primo', 36, 1, 1, 0, 0),
(108, 'AULA 5', 30, 'Piano Terra', 138, 0, 1, 0, 0),
(109, 'AULA 7', 30, 'Piano Terra', 20, 1, 1, 1, 0),
(110, 'AULA 3', 30, 'Piano Terra', 20, 1, 0, 1, 0),
(111, 'AULA E-LEARNIING', 44, 'Piano Quinto', 106, 1, 1, 1, 0),
(112, 'AULA 10-11', 30, 'Piano Terra', 32, 1, 1, 1, 0),
(113, 'AULA 4', 30, 'Piano Terra', 80, 0, 0, 1, 0),
(114, 'AULA ARDIGO\'', 30, 'Piano Primo', 45, 0, 0, 0, 0),
(115, 'AULA SEMINARI', 44, 'Piano Terzo', 139, 1, 1, 0, 0),
(116, 'AULA SEMINARI SDE', 30, 'Piano Primo', 28, 0, 1, 0, 0),
(117, 'BIANCA', 86, 'Piano Terra', 138, 1, 1, 0, 0),
(118, 'ANFITEATRO (AULA MARCHETTI) - Accesso da Via di Barbiano 1/10', 90, 'Piano Terra', 108, 0, 1, 0, 0),
(119, 'AULA 6', 30, 'Piano Terra', 61, 0, 0, 0, 0),
(120, 'A', 1, 'Piano Terra', 45, 1, 1, 0, 0),
(121, 'B', 1, 'Piano Terra', 72, 1, 1, 1, 0),
(122, 'F', 1, 'Piano Terra', 64, 1, 1, 1, 0),
(123, '1F', 1, 'Piano Primo', 111, 0, 0, 1, 0),
(124, '1D', 1, 'Piano Primo', 105, 0, 1, 1, 0),
(125, '1C', 1, 'Piano Primo', 111, 1, 1, 0, 0),
(126, 'D', 1, 'Piano Terra', 133, 0, 1, 0, 0),
(127, '2C', 1, 'Piano Secondo', 48, 1, 1, 0, 0),
(128, '2D', 1, 'Piano Secondo', 136, 0, 1, 0, 0),
(129, '1I', 1, 'Piano Primo', 35, 1, 1, 1, 0),
(130, '1H', 1, 'Piano Primo', 98, 0, 1, 0, 0),
(131, 'AULA M1 C.ANDREATTA', 42, 'Piano Terra', 94, 1, 0, 0, 0),
(132, 'LABORATORIO ERCOLANI', 65, 'Piano Primo Interrato', 22, 1, 1, 1, 1),
(133, 'AULA MAGNA', 37, 'Piano Primo', 84, 1, 1, 1, 0),
(134, 'AULA MAGNA', 94, 'Piano Secondo', 93, 0, 1, 1, 0),
(135, 'AULA 3', 94, 'Piano Secondo', 122, 0, 1, 0, 0),
(136, 'AULA 1', 94, 'Piano Secondo', 101, 1, 1, 1, 0),
(137, 'LABORATORIO NATURALISTICO UMIDO', 94, 'Piano Primo', 135, 1, 1, 1, 1),
(138, 'LABORATORIO BIOLOGIA MOLECOLARE', 94, 'Piano Primo', 34, 1, 1, 0, 1),
(139, 'LABORATORIO EX MICROSCOPIA', 94, 'Piano Primo', 65, 0, 1, 0, 1),
(140, 'AULA AFFRESCHI (Accesso da Via Zamboni, 34)', 20, 'Piano Terra', 134, 1, 1, 0, 0),
(141, 'AULA RUFFILLI', 30, 'Piano Primo', 77, 1, 1, 1, 0),
(142, 'AULA DI VIRGILIO (accesso da Via dei Bersaglieri, 6)', 30, 'Piano Terra', 21, 0, 1, 1, 0),
(143, 'AULA GARZANTI 1', 99, 'Piano Terra', 99, 1, 0, 0, 0),
(144, 'AULA MAGNA \"BRANZI\"', 102, 'Piano Terra', 114, 1, 1, 1, 0),
(145, 'AULA CAPUZZI', 102, 'Piano Terra', 104, 0, 1, 1, 0),
(146, 'AULA BONORA', 102, 'Piano Primo', 104, 1, 1, 0, 0),
(147, 'AULA BIGARI', 102, 'Piano Terra', 54, 1, 1, 0, 0),
(148, 'AULA C', 105, 'Piano Primo', 87, 1, 1, 1, 0),
(149, 'AULA 27 ex CRI', 82, 'Piano Primo', 21, 0, 0, 0, 0),
(150, 'AULA B', 105, 'Piano Primo', 88, 1, 1, 0, 0),
(151, 'AULA 2 ex CRI', 82, 'Piano Terra', 89, 1, 1, 1, 0),
(152, 'AULA 1', 109, 'Piano Secondo', 101, 1, 1, 1, 0),
(153, 'AULA ESERCITAZIONE', 109, 'Piano Terzo', 107, 0, 0, 0, 0),
(154, 'AULA 2', 109, 'Piano Secondo', 129, 1, 1, 1, 0),
(155, 'AULA MULTIMEDIALE MASTER', 61, 'Piano Secondo', 71, 1, 1, 0, 0),
(156, 'AULA MULTIMEDIALE SLAVE', 61, 'Piano Secondo', 41, 0, 1, 1, 0),
(157, 'AULA MAGNA (AULA MANZOLI) - Accesso da Via di Barbiano 1/10', 90, 'Piano Terra', 84, 1, 1, 1, 0),
(158, 'AULA A', 105, 'Piano Primo', 136, 1, 0, 1, 0),
(159, 'CLID 2', 102, 'Piano Terra', 124, 0, 1, 1, 0),
(160, 'CLID 1', 102, 'Piano Terra', 88, 1, 0, 0, 0),
(161, 'AULA PNEUMOLOGIA', 110, 'Piano Terra', 111, 1, 1, 0, 0),
(162, 'ROSSA', 86, 'Piano Terra', 105, 0, 1, 1, 0),
(163, 'AULA 10 ex CRI', 82, 'Piano Primo', 76, 0, 1, 0, 0),
(164, 'AULA 11 ex CRI', 82, 'Piano Primo', 73, 1, 0, 1, 0),
(165, 'AULA MAGNA IGIENE', 86, 'Piano Terra', 125, 0, 1, 1, 0),
(166, 'AULA 2 BODONIANA', 64, 'Piano Terra', 112, 0, 1, 1, 0),
(167, 'AULA MAGNA', 1, 'Piano Terra', 149, 0, 1, 1, 0),
(168, 'RED LAB', 115, 'Piano Primo', 76, 1, 1, 0, 1),
(169, 'AULA CINI', 116, 'Piano Terra', 103, 0, 1, 0, 0),
(170, 'AULA VECCHI', 116, 'Piano Terra', 40, 0, 1, 0, 0),
(171, 'AULA KORAK', 116, 'Piano Terra', 145, 0, 1, 1, 0),
(172, 'AULA INFORMATICA', 61, 'Piano Primo', 79, 0, 0, 0, 0),
(173, 'AULA 2', 44, 'Piano Terra', 139, 0, 1, 1, 0),
(174, 'AULA 12', 44, 'Piano Primo', 107, 1, 1, 1, 0),
(175, 'AULA 11', 44, 'Piano Primo', 79, 0, 1, 0, 0),
(176, 'AULA INFORMATICA 1', 44, 'Piano Primo', 135, 0, 1, 0, 0),
(177, 'AULA INFORMATICA 2', 44, 'Piano Primo', 129, 0, 1, 0, 0),
(178, 'AULA 10', 44, 'Piano Terra', 40, 1, 1, 1, 0),
(179, 'AULA 13', 44, 'Piano Primo', 42, 0, 1, 0, 0),
(180, 'AULA AURELIANO AMATI', 118, 'Piano Terra', 36, 1, 1, 0, 0),
(181, 'AULA 5 BODONIANA', 64, 'Piano Secondo', 79, 0, 0, 1, 0),
(182, 'ALBERTI 10', 73, 'Piano Terra', 83, 1, 0, 1, 0),
(183, 'AULA MAGNA', 115, 'Piano Terra', 53, 1, 0, 0, 0),
(184, 'AULA B', 35, 'Piano Primo', 84, 0, 1, 1, 0),
(185, 'AULA 8', 30, 'Piano Primo', 138, 1, 0, 0, 0),
(186, 'AULA B', 126, 'Piano Secondo', 26, 0, 1, 1, 0),
(187, 'AULA C', 126, 'Piano Primo', 89, 1, 1, 1, 0),
(188, 'AULA A', 126, 'Piano Secondo', 112, 1, 0, 1, 0),
(189, 'AULA 11', 74, 'Piano Secondo', 77, 0, 1, 1, 0),
(190, 'ANGHERA\' 3', 115, 'Piano Terra', 120, 1, 0, 0, 0),
(191, 'ALBERTI 11', 73, 'Piano Primo', 46, 0, 1, 0, 0),
(192, 'GREY LAB', 73, 'Piano Primo', 40, 1, 1, 1, 1),
(193, 'LABORATORIO 1 (Accesso da Via Zamboni, 34)', 20, 'Piano Terra', 40, 0, 1, 1, 1),
(194, 'AULA A BELMELORO', 9, 'Piano Terra', 34, 0, 0, 1, 0),
(195, 'AULA 2', 74, 'Piano Terra', 30, 0, 1, 1, 0),
(196, 'AULA I BELMELORO', 9, 'Piano Primo', 37, 1, 1, 0, 0),
(197, 'AULA 12', 74, 'Piano Secondo', 48, 1, 1, 0, 0),
(198, 'AULA L BELMELORO', 9, 'Piano Secondo', 66, 0, 1, 0, 0),
(199, 'AULA H BELMELORO', 9, 'Piano Primo', 86, 1, 1, 1, 0),
(200, 'AULA SEMINARI', 127, 'Piano Terra', 44, 0, 1, 1, 0),
(201, 'AULA 8 \"SALA DELLE FESTE\"', 74, 'Piano Primo', 147, 0, 0, 0, 0),
(202, 'AULA 5', 74, 'Piano Terra', 109, 1, 1, 0, 0),
(203, 'AULA M BELMELORO', 9, 'Piano Secondo', 82, 0, 1, 0, 0),
(204, 'AULA 3 BALDISERRI', 74, 'Piano Terra', 54, 0, 1, 1, 0),
(205, 'AULA 4', 74, 'Piano Terra', 73, 1, 1, 0, 0),
(206, 'GREEN LAB', 115, 'Piano Primo', 97, 1, 0, 0, 1),
(207, 'AULA 7.6', 12, 'Piano Primo', 115, 1, 1, 0, 0),
(208, '2E', 1, 'Piano Secondo', 131, 1, 1, 1, 0),
(209, '2B', 1, 'Piano Secondo', 65, 0, 1, 0, 0),
(210, 'AULA INFORMATICA', 20, 'Piano Secondo', 90, 1, 1, 0, 0),
(211, 'AULA M3', 42, 'Piano Terra', 65, 0, 1, 1, 0),
(212, 'AULA GERSHEVITCH', 28, 'Piano Primo', 82, 1, 1, 1, 0),
(213, 'AULA FARNETI', 30, 'Piano Primo', 73, 1, 1, 1, 0),
(214, 'LABORATORIO 2', 64, 'Piano Terra', 131, 1, 1, 1, 1),
(215, 'ANGHERA\' 2', 115, 'Piano Terra', 148, 0, 1, 1, 0),
(216, 'AULA F BELMELORO', 9, 'Piano Secondo', 38, 1, 1, 1, 0),
(217, 'AULA B BELMELORO', 9, 'Piano Primo', 60, 1, 1, 0, 0),
(218, 'AULA G BELMELORO', 9, 'Piano Terra', 50, 0, 1, 1, 0),
(219, 'AULA 6 \"TRIBUNALE\"', 74, 'Piano Terra', 136, 0, 1, 1, 0),
(220, 'AULA C BELMELORO', 9, 'Piano Primo', 96, 1, 1, 1, 0),
(221, 'AULA D BELMELORO', 9, 'Piano Primo', 70, 0, 1, 1, 0),
(222, 'SALA RUSSELL', 131, 'Piano Terra', 124, 0, 0, 0, 0),
(223, 'AULA 9 \"SALA DELLE ARMI\"', 74, 'Piano Primo', 94, 0, 0, 0, 0),
(224, 'AULA 14', 44, 'Piano Primo', 81, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `authsessions`
--

CREATE TABLE `authsessions` (
  `CodiceSessione` int(11) NOT NULL,
  `CodiceAccount` varchar(20) NOT NULL,
  `ExpirationDate` datetime NOT NULL,
  `ForceExpired` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `authsessions`
--

INSERT INTO `authsessions` (`CodiceSessione`, `CodiceAccount`, `ExpirationDate`, `ForceExpired`) VALUES
(1, 'beagre003', '2026-02-01 01:12:45', 0),
(2, 'vinesp001', '2026-02-01 00:47:24', 0),
(3, 'marmar001', '2026-01-31 15:44:02', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `citta`
--

CREATE TABLE `citta` (
  `CodiceCitta` int(11) NOT NULL,
  `Nome` varchar(92) NOT NULL,
  `Latitudine` float NOT NULL,
  `Longitudine` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `citta`
--

INSERT INTO `citta` (`CodiceCitta`, `Nome`, `Latitudine`, `Longitudine`) VALUES
(1, 'Bologna', 44.4949, 11.3426),
(2, 'Faenza', 44.2854, 11.883),
(3, 'Forlì', 44.2227, 12.0407),
(4, 'Cesena', 44.1398, 12.2434),
(5, 'Ozzano dell\'Emilia', 44.4419, 11.4722),
(6, 'Cesenatico', 44.2008, 12.4),
(7, 'Ravenna', 44.4184, 12.2035),
(8, 'Rimini', 44.0678, 12.5695),
(9, 'Imola', 44.3593, 11.7119);

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `CodicePrenotazione` int(11) NOT NULL,
  `CodiceAula` int(11) NOT NULL,
  `CodiceAccount` varchar(20) NOT NULL,
  `NumeroPersone` int(11) NOT NULL,
  `DataPrenotazione` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prenotazioni`
--

INSERT INTO `prenotazioni` (`CodicePrenotazione`, `CodiceAula`, `CodiceAccount`, `NumeroPersone`, `DataPrenotazione`) VALUES
(1, 138, 'beagre003', 5, '2026-01-17 08:00:00'),
(2, 4, 'beagre003', 15, '2026-02-19 11:00:00'),
(3, 109, 'beagre003', 18, '2026-01-21 11:00:00'),
(4, 109, 'beagre003', 20, '2026-01-21 17:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `professori`
--

CREATE TABLE `professori` (
  `Matricola` bigint(20) UNSIGNED NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `DataNascita` date NOT NULL,
  `DataAssunzione` date NOT NULL,
  `CodiceAccount` varchar(20) NOT NULL,
  `Ordinario` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `professori`
--

INSERT INTO `professori` (`Matricola`, `Nome`, `Cognome`, `DataNascita`, `DataAssunzione`, `CodiceAccount`, `Ordinario`) VALUES
(1, 'Marco', 'Marino', '1967-06-24', '2002-03-21', 'marmar001', 1),
(2, 'Federica', 'Russo', '1986-10-10', '2020-05-22', 'fedrus001', 0),
(3, 'Vincenzo', 'Esposito', '1969-12-02', '2004-06-10', 'vinesp001', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `sedi`
--

CREATE TABLE `sedi` (
  `CodiceSede` int(11) NOT NULL,
  `Via` varchar(120) NOT NULL,
  `Latitudine` float NOT NULL,
  `Longitudine` float NOT NULL,
  `CodiceCitta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `sedi`
--

INSERT INTO `sedi` (`CodiceSede`, `Via`, `Latitudine`, `Longitudine`, `CodiceCitta`) VALUES
(111, 'Centro protesi INAIL - Via Rabuina, 14 - 40054 Vigorso - Budrio', 44.4966, 11.3559, 1),
(128, 'Corso d\'Augusto, 237 - Rimini', 44.0627, 12.5647, 8),
(97, 'Corso della Repubblica - Forlì', 44.219, 12.0421, 3),
(98, 'Corso della Repubblica, 136-138 - Forlì', 44.2193, 12.0472, 3),
(35, 'Piazza Aldo Moro, 90 - Cesena', 44.0504, 12.1776, 4),
(5, 'Piazza Antonino Scaravilli, 1-2 - Bologna', 44.497, 11.3523, 1),
(42, 'Piazza di Porta San Donato, 1 - Bologna', 44.4981, 11.3557, 1),
(89, 'Piazza di Porta San Donato, 2 - Bologna', 44.4983, 11.3561, 1),
(13, 'Piazza di Porta San Donato, 5 - Bologna', 44.4983, 11.3558, 1),
(100, 'Piazza Giovan Battista Morgagni, 2 - Forlì', 44.2204, 12.0422, 3),
(49, 'Piazza Goidanich, 60 - Cesena', 44.1565, 12.2428, 4),
(24, 'Piazza S.Giovanni in Monte, 2 - Bologna', 44.4912, 11.3485, 1),
(58, 'Piazzale della Vittoria, 15 - Forlì', 44.2181, 12.0508, 3),
(69, 'Piazzale Giovanni dalle Bande Nere, 11 - Imola', 44.3533, 11.7078, 9),
(83, 'Piazzale Giovanni dalle Bande Nere, 11 - Imola', 44.3543, 11.708, 9),
(19, 'Piazzetta Giorgio Morandi, 2 - Bologna', 44.4889, 11.3552, 1),
(17, 'Piazzetta Pier Paolo Pasolini, 5/b - Bologna', 44.5177, 11.2792, 1),
(56, 'Piazzetta Teatini, 10 - Rimini', 44.0604, 12.5699, 8),
(119, 'Piazzetta Teatini, 13 - Rimini', 44.0608, 12.5696, 8),
(73, 'Piazzetta Teatini, 13 - Rimini', 44.0616, 12.5697, 8),
(104, 'Policlinico S. Orsola-Malpighi, Pad. 5, Bologna', 44.4984, 11.3555, 1),
(120, 'Scuola per il Restauro del Mosaico, Via San Vitale 17, Ravenna', 44.1477, 12.2353, 7),
(30, 'Strada Maggiore, 45 - Bologna', 44.4911, 11.3536, 1),
(45, 'Via Alberto Missiroli, 8 - Ravenna', 44.4113, 12.1919, 7),
(105, 'Via Altura, 3 - Bologna', 44.4641, 11.3904, 1),
(36, 'Via Angelo Mariani, 5 - Ravenna', 44.4173, 12.2019, 7),
(68, 'Via Antonio Ascari 15 - Imola', 44.341, 11.7201, 9),
(67, 'Via Antonio Ascari 17 - Imola', 44.341, 11.7201, 9),
(23, 'Via Azzo Gardino, 19-23-25-27-29 - Bologna', 44.5008, 11.3373, 1),
(18, 'Via Barberia, 4-4/2 - Bologna', 44.4912, 11.3388, 1),
(96, 'Via Bartolomeo Lombardini, 5 - Forlì', 44.219, 12.0421, 3),
(114, 'Via Bastioni Settentrionali, 45 - Rimini', 44.0641, 12.568, 8),
(92, 'Via Belmeloro, 10-12 - Bologna', 44.4954, 11.3548, 1),
(95, 'Via Belmeloro, 4-6 - Bologna', 44.4957, 11.3532, 1),
(9, 'Via Beniamino Andreatta, 8 - Bologna', 44.4958, 11.3556, 1),
(6, 'Via Camillo Ranzani, 14 - Bologna', 44.5012, 11.3588, 1),
(80, 'Via Carlo Forlanini, 34 - Forlì', 44.2042, 12.0198, 3),
(31, 'Via Cartoleria, 5 - Bologna', 44.4902, 11.3478, 1),
(21, 'Via Centotrecento, 18 - Bologna', 44.4987, 11.3508, 1),
(53, 'Via Clodia, 43 - Rimini', 44.064, 12.5673, 8),
(54, 'Via dei Mille, 39 - Rimini', 44.0649, 12.568, 8),
(124, 'Via del Bidente - Rimini', 44.064, 12.5673, 8),
(113, 'Via del Pilastro, 8 - Bologna', 44.5102, 11.3832, 1),
(112, 'Via del Terrapieno, 27 - Bologna', 44.5045, 11.3925, 1),
(94, 'Via dell\'Agricoltura, 5 - Ravenna', 44.4352, 12.1982, 7),
(57, 'Via dell\'Università, 50 - Cesena', 44.1477, 12.2353, 4),
(63, 'Via della beverara 123 - Bologna', 44.5221, 11.3315, 1),
(1, 'Via della beverara 123 - Bologna', 44.5229, 11.3345, 1),
(32, 'Via delle Belle Arti, 41 - Bologna', 44.4978, 11.352, 1),
(115, 'Via Domenico Angherà, 22 - Rimini', 44.062, 12.57, 8),
(59, 'VIA Emilia 25 - Imola', 44.3707, 11.6704, 9),
(123, 'Via Euterpe n. 7 Rimini', 44.064, 12.5673, 8),
(122, 'Via Fiandrini - Ravenna', 44.4211, 12.1954, 7),
(38, 'Via Filippo Re, 10 - Bologna', 44.5004, 11.355, 1),
(43, 'Via Filippo Re, 6 - Bologna', 44.4999, 11.3548, 1),
(33, 'Via Filippo Re, 8 - Bologna', 44.5002, 11.3549, 1),
(46, 'VIA Fiume Abbandonato 132 - Ravenna', 44.4113, 12.1919, 7),
(108, 'Via Flaminia - Rimini', 44.2837, 11.883, 2),
(84, 'Via Francesco Balilla Pratella, 10 - Forlì', 44.2142, 12.0631, 3),
(3, 'Via Francesco Selmi, 2 - Bologna', 44.4963, 11.3541, 1),
(131, 'Via Galliera, 3 - Bologna', 44.4972, 11.3418, 1),
(39, 'Via Giacomo della Torre, 5 - Forlì', 44.2195, 12.0427, 3),
(99, 'Via Giovanni Fronticelli Baldelli, 16 - Forlì', 44.2206, 12.0463, 3),
(90, 'Via Giulio Cesare Pupilli, 1 - Bologna', 44.4753, 11.3405, 1),
(91, 'Via Giulio Cesare Pupilli, 1 - Bologna', 44.4805, 11.3439, 1),
(60, 'Via Giuseppe Garibaldi, 24 - Imola', 44.3528, 11.7109, 9),
(61, 'Via Giuseppe Garibaldi, 37 - Imola', 44.3531, 11.7113, 9),
(106, 'Via Giuseppe Massarenti, 1 - Bologna', 44.4938, 11.3581, 1),
(77, 'Via Giuseppe Massarenti, 1 - Bologna', 44.494, 11.3573, 1),
(103, 'Via Giuseppe Massarenti, 11 - Bologna', 44.4922, 11.3648, 1),
(88, 'Via Giuseppe Massarenti, 13 - Bologna', 44.4922, 11.3649, 1),
(129, 'Via Giuseppe Massarenti, 9 - Bologna', 44.4929, 11.3604, 1),
(79, 'Via Giuseppe Massarenti, 9 - Bologna', 44.4931, 11.3604, 1),
(110, 'Via Giuseppe Massarenti, vari - Bologna', 44.4921, 11.3875, 1),
(28, 'Via Giuseppe Pasolini, 23 - Ravenna', 44.4184, 12.197, 7),
(116, 'Via Granarolo, 62 - Faenza', 44.3088, 11.8967, 2),
(72, 'Via Guaccimanni, 42 - Ravenna', 44.4157, 12.2026, 7),
(27, 'Via Guerrazzi, 20 - Bologna', 44.4908, 11.351, 1),
(75, 'Via Guglielmo Oberdan, 1 - Ravenna', 44.4162, 12.1961, 7),
(41, 'Via Irnerio, 42 - Bologna', 44.4991, 11.3528, 1),
(132, 'Via Irnerio, 42 - Bologna', 44.4992, 11.3525, 1),
(50, 'Via Irnerio, 46 - Bologna', 44.499, 11.3536, 1),
(76, 'Via Irnerio, 48 - Bologna', 44.4984, 11.3555, 1),
(87, 'Via Irnerio, 49 - Bologna', 44.4989, 11.3538, 1),
(47, 'Via Luciano Montaspro, 97 - Forlì', 44.2007, 12.0637, 3),
(22, 'Via Ludovico Berti, 2/7 - Bologna', 44.5024, 11.33, 1),
(125, 'Via Monte Rosa, 60,  Riccione', 44.064, 12.5673, 8),
(93, 'Via Piero Gobetti, 85 - Bologna', 44.5207, 11.3378, 1),
(4, 'Via Piero Gobetti, 87 - Bologna', 44.5207, 11.3378, 1),
(66, 'Via Piero Gobetti, 93/2 - Bologna', 44.5219, 11.3381, 1),
(107, 'Via Pietro Albertoni, 15 - Bologna', 44.4906, 11.364, 1),
(52, 'Via Quintino Sella, 13 - Rimini', 44.0608, 12.5696, 8),
(55, 'Via Roma, 47 - Rimini', 44.0627, 12.5729, 8),
(64, 'Via San Donato, 13-19/2 - Bologna', 44.4991, 11.3579, 1),
(86, 'Via San Giacomo, 12 - Bologna', 44.4967, 11.3553, 1),
(78, 'Via San Giacomo, 14 - Bologna', 44.4966, 11.3559, 1),
(51, 'Via San Giacomo, 3 - Bologna', 44.497, 11.3537, 1),
(85, 'Via San Giovanni Bosco, 1 - Faenza', 44.2837, 11.883, 2),
(109, 'Via San Lorenzino, 23 - Cesena', 44.1413, 12.2453, 4),
(29, 'Via San Petronio vecchio, 32 - Bologna', 44.4899, 11.3529, 1),
(70, 'Via San Vitale, 114-116-118 - Bologna', 44.4941, 11.3558, 1),
(121, 'Via San Vitale, 28 e 30 - Ravenna', 44.4197, 12.1971, 7),
(102, 'Via San Vitale, 59-61-61/2 - Bologna', 44.4944, 11.3505, 1),
(81, 'Via Sant\'Isaia, 90 - Bologna', 44.4942, 11.3305, 1),
(12, 'Via Saragozza, 8-10 - Bologna', 44.4902, 11.3363, 1),
(2, 'Via Selmi, 3 - Bologna', 44.496, 11.3545, 1),
(118, 'Via Tebano, 54 - Faenza', 44.2925, 11.7827, 2),
(48, 'Via Tolara di Sopra, 54 - Ozzano dell\'Emilia', 44.4357, 11.4877, 5),
(117, 'Via Tolara di Sopra, snc - Ozzano dell\'Emilia', 44.4357, 11.4877, 5),
(71, 'Via Tombesi dall\'Ova, 55 - Ravenna', 44.4149, 12.203, 7),
(101, 'Via Ugo Foscolo, 7 - Bologna', 44.4922, 11.3304, 1),
(14, 'Via Umberto Terracini, 28 - Bologna', 44.5136, 11.3184, 1),
(16, 'Via Umberto Terracini, 34 - Bologna', 44.5137, 11.3186, 1),
(74, 'Via Zamboni, 22 - Bologna', 44.4958, 11.349, 1),
(26, 'Via Zamboni, 32 - Bologna', 44.4969, 11.3509, 1),
(25, 'Via Zamboni, 33 - Bologna', 44.4962, 11.352, 1),
(20, 'Via Zamboni, 34 - Bologna', 44.4967, 11.3514, 1),
(10, 'Via Zamboni, 38 - Bologna', 44.497, 11.3524, 1),
(62, 'Via Zamboni, 67 - Bologna', 44.4978, 11.3552, 1),
(37, 'Viale Carlo Berti Pichat, 5 - Bologna', 44.4995, 11.3562, 1),
(8, 'Viale Carlo Berti Pichat, 6-6/2 - Bologna', 44.5001, 11.3579, 1),
(11, 'Viale del Risorgimento, 2 - Bologna', 44.4904, 11.3289, 1),
(15, 'Viale del Risorgimento, 4 - Bologna', 44.4878, 11.3289, 1),
(34, 'Viale Europa, 115 - Cesena', 44.1448, 12.2412, 4),
(40, 'Viale Filippo Corridoni, 20 - Forlì', 44.2175, 12.0443, 3),
(82, 'Viale Gian Battista Ercolani, 6 - Bologna', 44.4925, 11.3573, 1),
(44, 'Viale Giuseppe Fanin, 40-50 - Bologna', 44.514, 11.4022, 1),
(126, 'Viale Magrini, 31 - Cesenatico', 44.2038, 12.3964, 6),
(65, 'Viale Quirico Filopanti, 1-3 - Bologna', 44.4972, 11.3564, 1),
(7, 'Viale Quirico Filopanti, 5 - Bologna', 44.4956, 11.3565, 1),
(127, 'Viale Quirico Filopanti, 9 - Bologna', 44.4949, 11.3569, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `segnalazioni`
--

CREATE TABLE `segnalazioni` (
  `CodiceSegnalazione` int(11) NOT NULL,
  `CodicePrenotazione` int(11) NOT NULL,
  `CodiceAccount` varchar(20) NOT NULL,
  `Descrizione` varchar(250) DEFAULT NULL,
  `Stato` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `segnalazioni`
--

INSERT INTO `segnalazioni` (`CodiceSegnalazione`, `CodicePrenotazione`, `CodiceAccount`, `Descrizione`, `Stato`) VALUES
(1, 1, 'beagre003', 'La classe era sporca, non si capisce per quale motivo ci fosse una fetta di salame attaccata al muro', 1),
(2, 4, 'beagre003', 'Se le luci non si accendono più non è colpa della sottoscritta, la matricola Matteo Tonelli è responsabile, ha svitato tutto', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `studenti`
--

CREATE TABLE `studenti` (
  `Matricola` bigint(20) UNSIGNED NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `DataNascita` date NOT NULL,
  `CodiceAccount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `studenti`
--

INSERT INTO `studenti` (`Matricola`, `Nome`, `Cognome`, `DataNascita`, `CodiceAccount`) VALUES
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
  ADD PRIMARY KEY (`CodiceAula`),
  ADD UNIQUE KEY `NomeAula` (`NomeAula`,`CodiceSede`,`NumeroPiano`),
  ADD KEY `CodiceSede` (`CodiceSede`);

--
-- Indici per le tabelle `authsessions`
--
ALTER TABLE `authsessions`
  ADD PRIMARY KEY (`CodiceSessione`),
  ADD KEY `CodiceAccount` (`CodiceAccount`);

--
-- Indici per le tabelle `citta`
--
ALTER TABLE `citta`
  ADD PRIMARY KEY (`CodiceCitta`);

--
-- Indici per le tabelle `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`CodicePrenotazione`),
  ADD UNIQUE KEY `CodiceAula` (`CodiceAula`,`DataPrenotazione`),
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
  ADD UNIQUE KEY `Via` (`Via`,`Latitudine`,`Longitudine`,`CodiceCitta`);

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
-- AUTO_INCREMENT per la tabella `aule`
--
ALTER TABLE `aule`
  MODIFY `CodiceAula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT per la tabella `authsessions`
--
ALTER TABLE `authsessions`
  MODIFY `CodiceSessione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `citta`
--
ALTER TABLE `citta`
  MODIFY `CodiceCitta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  MODIFY `CodicePrenotazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `sedi`
--
ALTER TABLE `sedi`
  MODIFY `CodiceSede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT per la tabella `segnalazioni`
--
ALTER TABLE `segnalazioni`
  MODIFY `CodiceSegnalazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  ADD CONSTRAINT `aule_ibfk_1` FOREIGN KEY (`CodiceSede`) REFERENCES `sedi` (`CodiceSede`);

--
-- Limiti per la tabella `authsessions`
--
ALTER TABLE `authsessions`
  ADD CONSTRAINT `authsessions_ibfk_1` FOREIGN KEY (`CodiceAccount`) REFERENCES `account` (`Username`);

--
-- Limiti per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD CONSTRAINT `prenotazioni_ibfk_1` FOREIGN KEY (`CodiceAula`) REFERENCES `aule` (`CodiceAula`),
  ADD CONSTRAINT `prenotazioni_ibfk_2` FOREIGN KEY (`CodiceAccount`) REFERENCES `account` (`Username`);

--
-- Limiti per la tabella `professori`
--
ALTER TABLE `professori`
  ADD CONSTRAINT `professori_ibfk_1` FOREIGN KEY (`CodiceAccount`) REFERENCES `account` (`Username`);

--
-- Limiti per la tabella `segnalazioni`
--
ALTER TABLE `segnalazioni`
  ADD CONSTRAINT `segnalazioni_ibfk_1` FOREIGN KEY (`CodicePrenotazione`) REFERENCES `prenotazioni` (`CodicePrenotazione`),
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
