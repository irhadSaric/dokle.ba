-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 04:58 PM
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
(25, 'hahah', 'shsfsf', 'sfasfasfasf@ssss.ca', '$2y$12$L0jNai2YU8uNEoAyEcASvuDo/rWE2dhgp/VE3qWYF/91SzxrglNeW', 7915, 'jeste', 'profilne/default.jpg', NULL, NULL),
(26, 'Dženan', 'Bećković', 'dzenan.b@hotmail.com', '$2y$12$bxvF1l7usyhGRNs.16CEpeIHdFNOK3EOceAt.6t.qVuQJrOOZyVXm', 7502, 'jeste', 'profilne/default.jpg', NULL, NULL),
(27, 'Mirza', 'Ridžal', 'mikka123@hotmail.com', '$2y$12$lYdvQw0FVFH1K1U6Xncl/uutoz8825B4Yrv3/2TxWHAcs9y7U/KUG', 7769, 'jeste', 'profilne/default.jpg', NULL, NULL),
(28, 'Ahmed', 'Zekić', 'ahmed.zekic@live.com', '$2y$12$Dqf.ZTBgg.Dv9cgCbTfwI.cumWUH50CPMFchqhrDES7AIFWywHdx6', 9123, 'jeste', 'profilne/default.jpg', NULL, NULL);

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
(37, 27, 'Višnjik, Sarajevo, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina', 'Bjelave, Sarajevo, Bosnia and Herzegovina', '2018-02-02', '20:45:00', 'Bosna i Hercegovina', 'Besplatno');

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
-- AUTO_INCREMENT for table `poruke`
--
ALTER TABLE `poruke`
  MODIFY `idPoruke` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `idRute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
