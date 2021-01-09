-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2021 at 08:18 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poker`
--

-- --------------------------------------------------------

--
-- Table structure for table `enigme`
--

DROP TABLE IF EXISTS `enigme`;
CREATE TABLE IF NOT EXISTS `enigme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `indice` varchar(100) NOT NULL,
  `solution` varchar(20) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'false',
  `nb_essai` int(11) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enigme`
--

INSERT INTO `enigme` (`id`, `titre`, `indice`, `solution`, `status`, `nb_essai`) VALUES
(1, 'Compter les jetons par couleurs', 'Il faut maintenant les compter', '7583', 'false', 3),
(2, 'Assemblage des différents bouts de code ', 'Assemblez-les', '2487', 'false', 3),
(3, 'Code morse', 'S O S', '8475', 'false', 3),
(4, 'Code couleurs des cartes', 'Tout est question de couleur', '4795', 'false', 3),
(5, 'Addition des dates de sortie des films', 'A + B', '7384', 'false', 3),
(6, 'Mesurer la distance entre les deux repères ', 'De X à X', '348', 'false', 3),
(7, 'Enigme final', 'rien', '1478', 'false', 3);

-- --------------------------------------------------------

--
-- Table structure for table `indication`
--

DROP TABLE IF EXISTS `indication`;
CREATE TABLE IF NOT EXISTS `indication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indication`
--

INSERT INTO `indication` (`id`, `contenu`) VALUES
(1, '_____ ____ __ _______ _ _______'),
(2, '_S___ ____ S_ ____I__ _ ____L__'),
(3, '_S___ K___ S_ _O__I_L _ ___TL__'),
(4, 'HS__G KH__ S_ _O__I_L _ _S_TL__'),
(5, 'HS__G KH__ SH _O_TI_L H _S_TL_A'),
(6, 'HS_LG KH_Z SH JOHTI_L H JS_TL_A'),
(7, 'HSSLG KHUZ SH JOHTIYL H JSLTLUA');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
