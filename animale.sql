-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 06:41 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animale`
--

-- --------------------------------------------------------

--
-- Table structure for table `angajat`
--

CREATE TABLE `angajat` (
  `id_angajat` int NOT NULL,
  `id_cabinet` int NOT NULL,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `varsta` int NOT NULL,
  `tel` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `salariu` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `angajat`
--

INSERT INTO `angajat` (`id_angajat`, `id_cabinet`, `nume`, `prenume`, `varsta`, `tel`, `email`, `salariu`) VALUES
(111, 1000, 'Vasile', 'Ion', 23, 946285723, 'ion@email.com', 3444),
(222, 1000, 'Vasile', 'Ioana', 41, 876491025, 'ioana@email.com', 3464),
(333, 1000, 'Arghir', 'Andrei', 49, 984618475, 'arghir@email.com', 2344),
(444, 1000, 'Arghir', 'Andreea', 24, 927462731, 'arghie@email.com', 3444),
(555, 1000, 'Alecu', 'Ion', 33, 735261735, 'mail@email.com', 2678),
(643, 1000, 'Arghanghel', 'Matei', 34, 927456731, 'arghie@email.com', 3224),
(491, 1000, 'Apostolu', 'Calin', 24, 927467021, 'arghie@email.com', 3744),
(829, 1000, 'Arghir', 'Mircea', 22, 787462731, 'arghie@email.com', 3124),
(298, 1000, 'Apostolu', 'Ana', 24, 692462731, 'arghie@email.com', 3484),
(499, 2000, 'Dima', 'Ana', 27, 999562731, 'arghie@email.com', 3434),
(475, 1000, 'Apostolu', 'Bogdan', 54, 555462731, 'arghie@email.com', 3224),
(101, 2000, 'Dima', 'Bogdan', 63, 934562731, 'arghie@email.com', 3884),
(591, 1000, 'Badea', 'Andreea', 65, 692462731, 'arghie@email.com', 1234),
(347, 2000, 'Dima', 'Teodora', 53, 978962731, 'arghie@email.com', 3564),
(420, 1000, 'Badea', 'Calin', 43, 999462731, 'arghie@email.com', 2224),
(330, 2000, 'Dima', 'Andreea', 44, 987762731, 'arghie@email.com', 3294),
(422, 1000, 'Badea', 'Bogdan', 42, 955462731, 'arghie@email.com', 5644),
(372, 2000, 'Zamfir', 'Mircea', 33, 976562731, 'arghie@email.com', 3444),
(443, 1000, 'Badea', 'Mircea', 44, 984362731, 'arghie@email.com', 2344),
(471, 2000, 'Zamfir', 'Andreea', 58, 944962731, 'arghie@email.com', 3444),
(458, 1000, 'Dumitru', 'Andreea', 33, 997662731, 'arghie@email.com', 4544),
(830, 2000, 'Zamfir', 'Teodora', 59, 992362731, 'arghie@email.com', 3434),
(573, 2000, 'Dumitru', 'Teodora', 32, 944462731, 'arghie@email.com', 1244),
(465, 2000, 'Dumitru', 'Ion', 33, 755561735, 'mail@email.com', 2678);

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `id_animal` int NOT NULL,
  `specie` varchar(145) NOT NULL,
  `stare` varchar(145) NOT NULL,
  `varsta` int NOT NULL,
  `gen` varchar(100) NOT NULL,
  `sosire` date NOT NULL,
  `plecare` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`id_animal`, `specie`, `stare`, `varsta`, `gen`, `sosire`, `plecare`) VALUES
(100, 'caine', 'sanatos', 2, 'baiat', '2023-02-01', '2023-02-01'),
(101, 'pisica', 'bolnav', 1, 'fata', '2023-02-01', '2023-02-04'),
(102, 'caine', 'sanatos', 5, 'fata', '2023-01-01', '2023-01-01'),
(103, 'papagal', 'sanatos', 4, 'baiat', '2023-03-01', '2023-03-01'),
(104, 'papagal', 'bolnav', 1, 'baiat', '2023-02-01', '2023-02-05'),
(105, 'pisica', 'sanatos', 2, 'baiat', '2023-01-03', '2023-01-03'),
(106, 'papagal', 'ranit', 3, 'baiat', '2023-02-01', '2023-02-06'),
(107, 'papagal', 'sanatos', 2, 'fata', '2023-03-01', '2023-03-01'),
(108, 'pisica', 'ranit', 2, 'baiat', '2023-02-04', '2023-02-12'),
(109, 'pisica', 'bolnav', 7, 'baiat', '2023-02-03', '2023-02-06'),
(110, 'caine', 'sanatos', 2, 'baiat', '2023-02-01', '2023-02-01'),
(111, 'caine', 'bolnav', 10, 'baiat', '2023-02-02', '2023-02-11'),
(112, 'caine', 'ranit', 8, 'fata', '2023-04-01', '2023-04-21'),
(113, 'papagal', 'sanatos', 2, 'baiat', '2023-03-06', '2023-03-06'),
(114, 'pisica', 'bolnav', 8, 'fata', '2023-02-04', '2023-02-07'),
(115, 'caine', 'sanatos', 5, 'baiat', '2023-02-02', '2023-02-02'),
(116, 'pisica', 'ranit', 1, 'fata', '2023-01-01', '2023-02-01'),
(117, 'papagal', 'bolnav', 8, 'fata', '2023-01-29', '2023-02-04'),
(118, 'pisica', 'ranit', 3, 'fata', '2023-01-06', '2023-01-10'),
(119, 'pisica', 'bolnav', 5, 'fata', '2023-01-01', '2023-01-11'),
(120, 'caine', 'sanatos', 3, 'fata', '2023-01-01', '2023-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `boala`
--

CREATE TABLE `boala` (
  `id_boala` int NOT NULL,
  `tip` varchar(145) NOT NULL,
  `gravitate` varchar(145) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `boala`
--

INSERT INTO `boala` (`id_boala`, `tip`, `gravitate`) VALUES
(1, 'parazitoza', 'mica'),
(2, 'parvoviroza', 'mica'),
(3, 'dermatita', 'mica'),
(4, 'foliculita', 'mica'),
(5, 'soboreea', 'medie'),
(6, 'alopecia', 'medie'),
(7, 'tumore de piele', 'mare'),
(8, 'infectie de piele', 'medie'),
(9, 'alergie', 'mica'),
(10, 'atopie', 'mica'),
(11, 'urticaria', 'medie'),
(12, 'raceala', 'mica'),
(13, 'salmoneloza', 'mica'),
(14, 'stenoza aortica', 'mare'),
(15, 'stenoza pulmonara', 'mare'),
(16, 'toxoplasmoza', 'medie'),
(17, 'tuberculoza', 'medie'),
(18, 'lyme', 'mica'),
(19, 'dirofilarioza', 'mare'),
(20, 'disautonomia', 'medie'),
(21, 'rana', 'variaza');

-- --------------------------------------------------------

--
-- Table structure for table `cabinet`
--

CREATE TABLE `cabinet` (
  `id_cabinet` int NOT NULL,
  `judet` varchar(145) NOT NULL,
  `localitate` varchar(145) NOT NULL,
  `strada` varchar(145) NOT NULL,
  `nr` int NOT NULL,
  `tel` int NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cabinet`
--

INSERT INTO `cabinet` (`id_cabinet`, `judet`, `localitate`, `strada`, `nr`, `tel`, `email`) VALUES
(1000, 'Prahova', 'Ploiesti', 'Aleea Zamora', 12, 734869001, 'cabinet1@gmail.com'),
(2000, 'Arad', 'Ineu', 'Aleea Armat', 33, 738500716, 'cabinet2@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `control`
--

CREATE TABLE `control` (
  `id_veterinar` int NOT NULL,
  `id_animal` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `control`
--

INSERT INTO `control` (`id_veterinar`, `id_animal`) VALUES
(10001, 100),
(12221, 101),
(10002, 102),
(10011, 103),
(10011, 104),
(10002, 105),
(10221, 106),
(10221, 107),
(10331, 108),
(10331, 109),
(10031, 110),
(10009, 111),
(10004, 112),
(10051, 113),
(10041, 114),
(10201, 115),
(10002, 116),
(10002, 117),
(10051, 118),
(10051, 119),
(10051, 120);

-- --------------------------------------------------------

--
-- Table structure for table `foloseste`
--

CREATE TABLE `foloseste` (
  `id_veterinar` int NOT NULL,
  `id_animal` int NOT NULL,
  `id_tratament` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `foloseste`
--

INSERT INTO `foloseste` (`id_veterinar`, `id_animal`, `id_tratament`) VALUES
(10001, 101, 1),
(10011, 104, 11),
(10221, 106, 2),
(10331, 108, 3),
(10331, 109, 4),
(10009, 111, 5),
(10004, 112, 6),
(10041, 114, 7),
(10002, 116, 8),
(10002, 117, 9),
(10051, 118, 10);

-- --------------------------------------------------------

--
-- Table structure for table `lucreaza`
--

CREATE TABLE `lucreaza` (
  `id_cabinet` int NOT NULL,
  `id_angajat` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lucreaza`
--

INSERT INTO `lucreaza` (`id_cabinet`, `id_angajat`) VALUES
(1000, 111),
(1000, 222),
(1000, 333),
(1000, 444),
(1000, 555),
(1000, 643),
(1000, 491),
(1000, 829),
(1000, 298),
(2000, 499),
(1000, 475),
(2000, 101),
(1000, 591),
(2000, 347),
(1000, 420),
(2000, 330),
(1000, 422),
(2000, 372),
(1000, 443),
(2000, 471),
(1000, 458),
(2000, 830),
(2000, 573),
(2000, 465);

-- --------------------------------------------------------

--
-- Table structure for table `sufera`
--

CREATE TABLE `sufera` (
  `id_animal` int NOT NULL,
  `id_boala` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sufera`
--

INSERT INTO `sufera` (`id_animal`, `id_boala`) VALUES
(101, 2),
(106, 21),
(104, 1),
(108, 2),
(109, 7),
(111, 2),
(112, 21),
(114, 12),
(1016, 21),
(117, 12),
(118, 21);

-- --------------------------------------------------------

--
-- Table structure for table `tratament`
--

CREATE TABLE `tratament` (
  `id_tratament` int NOT NULL,
  `id_animal` int NOT NULL,
  `id_boala` int NOT NULL,
  `tip` varchar(145) NOT NULL,
  `zona` varchar(255) NOT NULL,
  `durata(zile)` int NOT NULL,
  `pret(ron)` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tratament`
--

INSERT INTO `tratament` (`id_tratament`, `id_animal`, `id_boala`, `tip`, `zona`, `durata(zile)`, `pret(ron)`) VALUES
(1, 101, 2, 'tratabil', 'interior', 2, 65),
(11, 104, 1, 'tratabil', 'interior', 4, 165),
(2, 106, 21, 'tratabil', 'aripa stanga', 23, 365),
(3, 108, 2, 'tratabil', 'picior fata dreapta', 45, 405),
(4, 109, 7, 'tratabil', 'spate', 3, 1000),
(5, 111, 2, 'tratabil', 'interior', 2, 65),
(6, 112, 21, 'tratabil', 'cap', 7, 365),
(7, 114, 12, 'tratabil', 'interior', 3, 45),
(8, 116, 21, 'tratabil', 'picior spate stang', 14, 425),
(9, 117, 12, 'tratabil', 'interior', 2, 65),
(10, 118, 21, 'tratabil', 'coada', 14, 635);

-- --------------------------------------------------------

--
-- Table structure for table `veterinar`
--

CREATE TABLE `veterinar` (
  `id_veterinar` int NOT NULL,
  `id_angajat` int NOT NULL,
  `specialitate` varchar(145) NOT NULL,
  `vechime` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `veterinar`
--

INSERT INTO `veterinar` (`id_veterinar`, `id_angajat`, `specialitate`, `vechime`) VALUES
(10001, 111, 'Dermatolog', 1),
(12221, 222, 'Dermatolog', 15),
(10002, 333, 'Dermatolog', 17),
(10011, 444, 'Dermatolog', 2),
(10221, 555, 'Chirurg', 11),
(10331, 643, 'Chirurg', 10),
(13301, 491, 'Dermatolog', 2),
(10003, 829, 'Dermatolog', 1),
(10031, 298, 'Dermatolog', 1),
(10071, 101, 'Cardiolog', 31),
(10009, 420, 'Chirurg', 19),
(12301, 330, 'Cardiolog', 21),
(10004, 443, 'Cardiolog', 22),
(10021, 499, 'Dermatolog', 3),
(10321, 475, 'Cardiolog', 23),
(10051, 347, 'Chirurg', 28),
(15201, 422, 'Chirurg', 19),
(10005, 372, 'Cardiolog', 11),
(10041, 465, 'Dermatolog', 11),
(10201, 591, 'Cardiolog', 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angajat`
--
ALTER TABLE `angajat`
  ADD PRIMARY KEY (`id_angajat`),
  ADD KEY `id_cabinet` (`id_cabinet`);

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_animal`);

--
-- Indexes for table `boala`
--
ALTER TABLE `boala`
  ADD PRIMARY KEY (`id_boala`);

--
-- Indexes for table `cabinet`
--
ALTER TABLE `cabinet`
  ADD PRIMARY KEY (`id_cabinet`);

--
-- Indexes for table `control`
--
ALTER TABLE `control`
  ADD KEY `id_veterinar` (`id_veterinar`),
  ADD KEY `id_veterinar_2` (`id_veterinar`),
  ADD KEY `id_animal` (`id_animal`);

--
-- Indexes for table `foloseste`
--
ALTER TABLE `foloseste`
  ADD KEY `id_veterinar` (`id_veterinar`),
  ADD KEY `id_animal` (`id_animal`),
  ADD KEY `id_tratament` (`id_tratament`);

--
-- Indexes for table `lucreaza`
--
ALTER TABLE `lucreaza`
  ADD KEY `id_cabinet` (`id_cabinet`),
  ADD KEY `id_angajat` (`id_angajat`);

--
-- Indexes for table `sufera`
--
ALTER TABLE `sufera`
  ADD KEY `id_animal` (`id_animal`),
  ADD KEY `id_boala` (`id_boala`);

--
-- Indexes for table `tratament`
--
ALTER TABLE `tratament`
  ADD PRIMARY KEY (`id_tratament`),
  ADD KEY `id_animal` (`id_animal`),
  ADD KEY `id_boala` (`id_boala`);

--
-- Indexes for table `veterinar`
--
ALTER TABLE `veterinar`
  ADD PRIMARY KEY (`id_veterinar`),
  ADD KEY `id_angajat` (`id_angajat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
