-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2018 at 07:52 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `korisnici`
--

-- --------------------------------------------------------

--
-- Table structure for table `dojmovi`
--

CREATE TABLE `dojmovi` (
  `idDojma` int(11) NOT NULL,
  `idPosiljaoca` int(11) NOT NULL,
  `idPrimaoca` int(11) NOT NULL,
  `dojam` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `dojmovi`
--

INSERT INTO `dojmovi` (`idDojma`, `idPosiljaoca`, `idPrimaoca`, `dojam`) VALUES
(1, 23, 24, 'sgasgagsasgasgaskdjbamsnb da,sndb,asjbdas,dab,sdjbas'),
(2, 23, 24, 'drugi\r\n'),
(3, 23, 24, 'treci'),
(4, 23, 24, 'sgasgagsasgasgaskdjbamsnb da,sndb,asjbdas,dab,sdjbassagasgas asughkasjgkags kjagskfjgaskjfgak jgsakjfgkagfkjagfkjagsfkjagsfjasgkfjagskfagsfkjasf'),
(5, 23, 24, 'sgasgasgasgasgasgawsgagsa\r\nsaglakhslgkhaslgkhaslkghalsk\r\n,skagklsgblaksg'),
(7, 23, 25, 'sagasg'),
(9, 23, 24, 'radi\r\n'),
(10, 26, 23, 'Dojam neki');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` text COLLATE utf8_bin NOT NULL,
  `prezime` text COLLATE utf8_bin NOT NULL,
  `email` varchar(128) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `aktivacijskiKod` int(4) NOT NULL,
  `aktivan` varchar(5) COLLATE utf8_bin NOT NULL DEFAULT 'nije',
  `profilna` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'profilne/default.jpg',
  `mjestoStanovanja` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `brojTelefona` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `email`, `password`, `aktivacijskiKod`, `aktivan`, `profilna`, `mjestoStanovanja`, `brojTelefona`) VALUES
(23, 'Irhad', 'Šarić', 'irhad.saric@hotmail.com', '$2y$12$SccJ5ZiEucDvw7i6gpI9ceZ95StW8AX6kyoiqRjUOtsxgj3.q0kzu', 2994, 'jeste', 'profilne/23.jpg', 'Hadžići', '+38762888555'),
(24, 'Mujo', 'Mujić', 'mujo.mujke@live.com', '$2y$12$TRwXpJlh/ds/NCXwL7RPfuugDoUQncnwt7l4Gh2l.7/lwime5H0Oy', 8699, 'nije', 'profilne/default.jpg', NULL, NULL),
(25, 'hahah', 'shsfsf', 'sfasfasfasf@ssss.ca', '$2y$12$L0jNai2YU8uNEoAyEcASvuDo/rWE2dhgp/VE3qWYF/91SzxrglNeW', 7915, 'jeste', 'profilne/25.jpg', NULL, NULL),
(26, 'Dženan', 'Bećković', 'dzenan.b@hotmail.com', '$2y$12$bxvF1l7usyhGRNs.16CEpeIHdFNOK3EOceAt.6t.qVuQJrOOZyVXm', 7502, 'jeste', 'profilne/26.jpg', NULL, NULL),
(27, 'Mirza', 'Ridžal', 'mikka123@hotmail.com', '$2y$12$lYdvQw0FVFH1K1U6Xncl/uutoz8825B4Yrv3/2TxWHAcs9y7U/KUG', 7769, 'jeste', 'profilne/default.jpg', NULL, NULL),
(28, 'Ahmed', 'Zekić', 'ahmed.zekic@live.com', '$2y$12$Dqf.ZTBgg.Dv9cgCbTfwI.cumWUH50CPMFchqhrDES7AIFWywHdx6', 9123, 'jeste', 'profilne/default.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `username`, `msg`) VALUES
(1, 'pokusaj2', 'pokusaj2'),
(2, 'pokusaj2', 'pokusaj224214'),
(3, 'pokusaj2', 'pokusaj2242143'),
(4, 'pokusaj2', '2'),
(5, 'pokusaj2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `poruke`
--

CREATE TABLE `poruke` (
  `idPoruke` int(11) NOT NULL,
  `idPosiljaoca` int(11) NOT NULL,
  `idPrimaoca` int(11) NOT NULL,
  `procitana` tinyint(4) NOT NULL DEFAULT '0',
  `sadrzaj` varchar(500) COLLATE utf8_bin NOT NULL,
  `vrijemeSlanja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `poruke`
--

INSERT INTO `poruke` (`idPoruke`, `idPosiljaoca`, `idPrimaoca`, `procitana`, `sadrzaj`, `vrijemeSlanja`) VALUES
(1, 23, 25, 1, 'Saljem poruku sa svog na 25', '2018-03-09 14:42:19'),
(2, 23, 25, 0, 'Saljem poruku sa svog na 25', '2018-03-09 14:45:18'),
(3, 23, 25, 0, 'stasf', '2018-03-09 14:45:34'),
(4, 23, 25, 0, 'test', '2018-03-09 14:47:42'),
(5, 23, 25, 0, 'test2', '2018-03-09 14:48:00'),
(6, 25, 23, 0, 'hahu 1\r\n', '2018-03-14 21:52:14'),
(7, 23, 26, 0, 'sagasg', '2018-03-16 21:40:14'),
(8, 23, 25, 0, 'asgasg', '2018-03-16 21:48:03'),
(9, 23, 25, 0, 'asgadg', '2018-03-16 21:48:16'),
(10, 23, 25, 0, 'asgadgasga', '2018-03-16 21:49:04'),
(11, 26, 23, 0, 'sagasg', '2018-03-16 21:49:31'),
(12, 23, 26, 0, 'mrs', '2018-03-16 21:49:55'),
(13, 23, 26, 0, 'sag', '2018-03-16 21:50:47'),
(14, 23, 26, 0, 'sag', '2018-03-16 21:51:01'),
(15, 23, 26, 0, 'sag', '2018-03-16 21:51:03'),
(16, 23, 26, 0, 'sag', '2018-03-16 21:52:00'),
(17, 23, 26, 0, 'sag', '2018-03-16 21:52:01'),
(18, 23, 26, 0, 'sag', '2018-03-16 21:52:01'),
(19, 23, 26, 0, 'sag', '2018-03-16 21:52:02'),
(20, 23, 26, 0, 'asg', '2018-03-16 21:52:53'),
(21, 26, 23, 0, 'sag', '2018-03-16 21:53:25'),
(22, 26, 23, 0, 'sag', '2018-03-16 21:53:26'),
(23, 26, 23, 0, 'sag', '2018-03-16 21:53:26'),
(24, 23, 26, 0, '0212415', '2018-03-16 21:55:36'),
(25, 23, 26, 0, 'asfas', '2018-03-16 21:56:36'),
(26, 23, 26, 0, 'asfas', '2018-03-16 21:56:39'),
(27, 23, 26, 0, '5', '2018-03-16 21:57:17'),
(28, 23, 26, 0, 'asg', '2018-03-16 21:57:48'),
(29, 23, 26, 0, 'asg', '2018-03-16 21:57:49'),
(30, 23, 26, 0, 'asg', '2018-03-16 21:57:49'),
(31, 23, 26, 0, 'asg', '2018-03-16 21:57:49'),
(32, 23, 26, 0, 'asg', '2018-03-16 21:57:49'),
(33, 23, 26, 0, 'sghas', '2018-03-16 22:08:36'),
(34, 23, 26, 0, 'sag', '2018-03-16 22:09:29'),
(35, 23, 26, 0, 'sag', '2018-03-16 22:14:56'),
(36, 23, 26, 0, 'sag', '2018-03-16 22:16:36'),
(37, 23, 26, 0, 'sag', '2018-03-16 22:16:42'),
(38, 23, 26, 0, 'sagasga', '2018-03-16 22:17:29'),
(39, 23, 26, 0, 'sga', '2018-03-16 22:18:49'),
(40, 23, 26, 0, 'asg', '2018-03-16 22:19:14'),
(41, 23, 26, 0, 'sag', '2018-03-16 22:24:56'),
(42, 23, 26, 0, 'sagsa', '2018-03-16 22:25:13'),
(43, 23, 26, 0, 'rd', '2018-03-16 22:28:37'),
(44, 23, 26, 0, 'rd', '2018-03-16 22:28:55'),
(45, 23, 26, 0, 'rd', '2018-03-16 22:28:55'),
(46, 23, 26, 0, 'rd', '2018-03-16 22:28:56'),
(47, 23, 26, 0, 'rd', '2018-03-16 22:28:56'),
(48, 23, 26, 0, 'gjf', '2018-03-16 22:28:59'),
(49, 23, 26, 0, 'gjf', '2018-03-16 22:29:04'),
(50, 23, 26, 0, 'sag', '2018-03-16 22:31:07'),
(51, 23, 26, 0, 'sag2', '2018-03-16 22:31:20'),
(52, 23, 26, 0, 'sag', '2018-03-16 22:37:33'),
(53, 23, 26, 0, 'sag', '2018-03-16 22:37:35'),
(54, 23, 26, 0, 'sag', '2018-03-16 22:37:35'),
(55, 23, 26, 0, 'sag', '2018-03-16 22:37:36'),
(56, 23, 26, 0, 's', '2018-03-16 22:37:56'),
(57, 23, 26, 0, 's', '2018-03-16 22:37:58'),
(58, 26, 23, 0, 'jel ravno ovo', '2018-03-16 22:39:35'),
(59, 26, 23, 0, 'ludilo', '2018-03-16 22:39:46'),
(60, 26, 23, 0, 'ludilo2', '2018-03-16 22:39:55'),
(61, 23, 26, 0, 'sukurac', '2018-03-16 22:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `idRute` int(11) NOT NULL,
  `idVozaca` int(11) NOT NULL,
  `polaziste` varchar(500) COLLATE utf8_bin NOT NULL,
  `odrediste` varchar(500) COLLATE utf8_bin NOT NULL,
  `datum` date NOT NULL,
  `vrijeme` time NOT NULL,
  `drzava` text COLLATE utf8_bin NOT NULL,
  `nacinPlacanja` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`idRute`, `idVozaca`, `polaziste`, `odrediste`, `datum`, `vrijeme`, `drzava`, `nacinPlacanja`) VALUES
(7, 23, 'Sarajevo, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', 'Hadžići, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', '2018-01-01', '02:02:00', 'Bosna i Hercegovina', 'kes'),
(8, 26, 'Buća Potok, Adema Buće, Sarajevo, Bosnia and Herzegovina', 'Pofalići, Sarajevo, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', '2018-01-18', '19:30:00', 'Bosna i Hercegovina', 'besplatno'),
(9, 26, 'Sarajevo, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', 'Konjic, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', '2018-01-31', '14:22:00', 'Bosna i Hercegovina', 'Keš'),
(10, 23, 'Zenica, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', 'Sarajevo, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', '2018-02-13', '02:02:00', 'Bosna i Hercegovina', 'Keš'),
(11, 23, 'Tuzla, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', 'Zenica, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', '2018-01-24', '01:02:00', 'Bosna i Hercegovina', 'Keš'),
(12, 23, 'Zürich, Switzerland', 'San Francisco, CA, United States', '2018-01-25', '19:02:00', 'Bosna i Hercegovina', 'Keš'),
(13, 23, 'Zapopan, Mexico', 'Jamaica', '2018-01-09', '14:02:00', 'Srbija', 'Keš'),
(14, 23, 'Hadžići, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', 'Sarajevo, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', '2018-01-02', '13:00:00', 'Bosna i Hercegovina', 'Keš'),
(15, 23, 'Tarčin, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', 'Sarajevo, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', '2018-01-31', '07:07:00', 'Bosna i Hercegovina', 'Besplatno'),
(16, 23, 'Sarajevo, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', 'Vratnik, Sarajevo, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', '2018-02-01', '08:00:00', 'Srbija', 'Besplatno'),
(17, 23, 'Leskovac', 'Belgrade', '2018-02-01', '13:40:00', 'Srbija', 'Keš'),
(18, 23, 'Dubrovnik, Croatia', 'Zadar, Croatia', '2018-02-01', '08:00:00', 'Hrvatska', 'Keš'),
(19, 23, 'Zagreb, Croatia', 'Vukovar, Croatia', '2018-02-02', '20:15:00', 'Hrvatska', 'Keš'),
(20, 23, 'Rijeka, Croatia', 'Pag, Croatia', '2018-02-03', '07:00:00', 'Hrvatska', 'Besplatno'),
(21, 23, 'Travnik, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', 'Zenica, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', '2018-02-03', '13:25:00', 'Bosna i Hercegovina', 'Besplatno'),
(22, 23, 'Pofalići, Sarajevo, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', 'Vratnik, Sarajevo, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', '2018-01-31', '14:00:00', 'Bosna i Hercegovina', 'Keš'),
(23, 23, 'Sarajevo City Hall, Obala Kulina bana, Sarajevo, Bosnia and Herzegovina', 'Stadion Grbavica, Zvornička, Sarajevo, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', '2018-01-31', '15:15:00', 'Bosna i Hercegovina', 'Besplatno'),
(24, 23, 'Baščaršija, Sarajevo, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', 'Lukavica, Republika Srpska, Bosnia and Herzegovina', '2018-01-31', '21:00:00', 'Bosna i Hercegovina', 'Besplatno'),
(25, 26, 'Skadarlija, Belgrade', 'Kneza Mihaila, Belgrade', '2018-02-01', '15:15:00', 'Srbija', 'Keš'),
(26, 26, 'Vrnjačka Banja', 'Borča', '2018-02-01', '18:00:00', 'Srbija', 'Keš'),
(27, 26, 'Zemun, Belgrade', 'Zvezdara 2, Belgrade', '2018-01-31', '13:00:00', 'Srbija', 'Keš'),
(28, 26, 'Zagreb, Croatia', 'Sljeme, Croatia', '2018-02-03', '04:00:00', 'Hrvatska', 'Keš'),
(29, 26, 'Istra, Croatia', 'Sesvete, Croatia', '2018-01-31', '13:00:00', 'Hrvatska', 'Besplatno'),
(30, 26, 'Sedrenik, Sarajevo, Bosnia and Herzegovina', 'Švrakino Selo, Sarajevo, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', '2018-02-02', '18:00:00', 'Bosna i Hercegovina', 'Besplatno'),
(31, 26, 'Aneks, Sarajevo, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', 'Ilidža, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', '2018-02-03', '23:00:00', 'Bosna i Hercegovina', 'Keš'),
(32, 26, 'Rakovica, Belgrade', 'Raskršće, Tuzla, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', '2018-02-07', '02:02:00', 'Bosna i Hercegovina', 'Besplatno'),
(33, 27, 'Bugojno, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', 'Fojnica, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', '2018-02-01', '17:55:00', 'Bosna i Hercegovina', 'Keš'),
(34, 27, 'Niš', 'Novi Pazar', '2018-02-01', '05:22:00', 'Srbija', 'Besplatno'),
(35, 27, 'Imotski, Croatia', 'Livno, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', '2018-01-31', '13:01:00', 'Hrvatska', 'Keš'),
(36, 27, 'Hadžići, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', 'Konjic, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', '2018-02-01', '05:55:00', 'Bosna i Hercegovina', 'Besplatno'),
(37, 27, 'Višnjik, Sarajevo, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', 'Bjelave, Sarajevo, Bosnia and Herzegovina', '2018-02-02', '20:45:00', 'Bosna i Hercegovina', 'Besplatno'),
(38, 25, 'Konjic, Bosnia and Herzegovina', 'Sarajevo, Bosnia and Herzegovina', '2018-03-23', '18:00:00', 'Bosna i Hercegovina', 'Keš'),
(39, 25, '', '', '1970-01-01', '00:00:00', 'Bosna i Hercegovina', ''),
(40, 23, '', '', '1970-01-01', '00:00:00', 'Bosna i Hercegovina', ''),
(41, 23, '', '', '1970-01-01', '00:00:00', 'Bosna i Hercegovina', '');

-- --------------------------------------------------------

--
-- Table structure for table `sponzori`
--

CREATE TABLE `sponzori` (
  `idSponzora` int(11) NOT NULL,
  `nazivSponzora` varchar(150) COLLATE utf8_bin NOT NULL,
  `velicinaDonacije` decimal(10,0) NOT NULL,
  `valuta` text COLLATE utf8_bin NOT NULL,
  `datumDonacije` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dojmovi`
--
ALTER TABLE `dojmovi`
  ADD PRIMARY KEY (`idDojma`),
  ADD UNIQUE KEY `idDojma` (`idDojma`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poruke`
--
ALTER TABLE `poruke`
  ADD PRIMARY KEY (`idPoruke`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`idRute`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dojmovi`
--
ALTER TABLE `dojmovi`
  MODIFY `idDojma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `poruke`
--
ALTER TABLE `poruke`
  MODIFY `idPoruke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `idRute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
