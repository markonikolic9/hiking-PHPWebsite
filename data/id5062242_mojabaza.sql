-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2019 at 08:13 PM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id5062242_mojabaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `brend`
--

CREATE TABLE `brend` (
  `id_b` int(10) NOT NULL,
  `naziv_brend` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brend`
--

INSERT INTO `brend` (`id_b`, `naziv_brend`) VALUES
(1, 'Polar'),
(2, 'Scoot');

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `id_ka` int(10) NOT NULL,
  `naziv_kategorija` varchar(35) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`id_ka`, `naziv_kategorija`) VALUES
(1, 'Gradski'),
(2, 'Planinski'),
(3, 'Hibrid');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id_k` int(10) NOT NULL,
  `ime` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sifra` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_u` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_k`, `ime`, `prezime`, `email`, `sifra`, `id_u`) VALUES
(1, 'Marko', 'Nikolic', 'marko@gmail.com', '4dacbbf8c6ad88182d6271c0fc910d00', 1),
(3, 'Filip', 'Petrovic', 'filip@gmail.com', '77f5f0a8309f2908bbee19133f0d202b', 2),
(4, 'Stefan', 'Dimitrijevic', 'stefan@gmail.com', '09befe735194a855a3f93a8033362fdf', 2),
(6, 'Stefan', 'Akstentijevic', 'bata@gmail.com', '26b8def8b35da2e56672990eb806adc9', 2),
(7, 'Marko', 'Mutavdzic', 'mutavdzic@gmail.com', '4dacbbf8c6ad88182d6271c0fc910d00', 2),
(8, 'Filip', 'Petrovic', 'filip.petrovic.pn@gmail.com', 'caaaf492d105cb5fd9dee00516cddf43', 2),
(9, 'Mile', 'Mile', 'mijuskoalex@gmail.com', 'f6d9899c19684e08534153eb71cbfc0e', 1),
(10, 'Dusan', 'Srbulovic', 'dusan@gmail.com', '5d1f12a0b36f04ec9ae9a5cadaa53aa9', 2),
(11, 'Veljko', 'Nikodijevic', 'veljko@gmail.com', '26eec2d86e834649947c18c982770553', 2),
(12, 'Veljko', 'Nikodijevic', 'vex@gmail.com', '26eec2d86e834649947c18c982770553', 2);

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `id_korpa` int(10) NOT NULL,
  `ime` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` int(15) NOT NULL,
  `vreme` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(10) NOT NULL,
  `id_k` int(10) NOT NULL,
  `id_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korpa`
--

INSERT INTO `korpa` (`id_korpa`, `ime`, `prezime`, `adresa`, `telefon`, `vreme`, `cena`, `id_k`, `id_p`) VALUES
(1, 'Filip', 'Petrovic', 'Alekse Santica 13', 65223366, '1553093770', 221990, 3, 6),
(2, 'Stefan', 'Dimitrijevic', 'Cara Lazara 11', 61254125, '1553093867', 27990, 4, 14),
(3, 'Stefan', 'Dimitrijevic', 'Cara Lazara 11', 61254125, '1553093867', 146880, 4, 9),
(4, 'Stefan', 'Aksentijevic', 'Ruzveltova 123', 63359685, '1553094034', 71990, 6, 3),
(5, 'Marko', 'Mutavdzic', 'Dalmatinska 16', 60256321, '1553094076', 68830, 7, 1),
(6, 'Filip', 'Petrovic', 'Cara Lazara 11', 62553366, '1553107921', 32990, 3, 7),
(7, 'Filip', 'Petrovic', 'Cara Lazara 13', 62217759, '1553114320', 313990, 8, 5),
(8, 'Filip', 'Petrovic', 'Cara Lazara 13', 62217759, '1553114320', 49990, 8, 10),
(9, 'Aleksandar', 'Mijuskovic', 'Kraljevacka 66/11', 69602227, '1553118614', 68830, 9, 1),
(10, 'Dadda', 'Dadasd', 'Ddasdad 12', 602312312, '1553460201', 313990, 3, 5),
(11, 'Dusan', 'Presiv', 'Bulevar 11', 62334488, '1554465543', 25490, 10, 12);

-- --------------------------------------------------------

--
-- Table structure for table `navmeni`
--

CREATE TABLE `navmeni` (
  `id_n` int(10) NOT NULL,
  `naziv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `putanja` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(10) DEFAULT NULL,
  `pozicija` int(10) NOT NULL,
  `prikaz` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `navmeni`
--

INSERT INTO `navmeni` (`id_n`, `naziv`, `putanja`, `parent`, `pozicija`, `prikaz`) VALUES
(1, 'POČETNA', 'index.models', NULL, 0, 0),
(2, 'BICIKLI', '#', NULL, 1, 0),
(3, 'GRADSKI', 'bicikli.models?kategorija=1', 2, 2, 0),
(4, 'PLANINSKI', 'bicikli.models?kategorija=2', 2, 3, 0),
(5, 'HIBRID', 'bicikli.models?kategorija=3', 2, 4, 0),
(6, 'KONTAKT', 'index.models?page=kontakt', NULL, 5, 0),
(7, 'REGISTRACIJA', 'index.models?page=registracija', NULL, 6, 1),
(8, 'PRIJAVI SE', 'index.models?page=logovanje', NULL, 7, 1),
(9, 'ODJAVI ME', 'odjava.models', NULL, 8, 2),
(10, 'ADMIN PANEL', 'admin/pages/index.models', NULL, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `odgovori`
--

CREATE TABLE `odgovori` (
  `id_o` int(10) NOT NULL,
  `naziv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_pi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `odgovori`
--

INSERT INTO `odgovori` (`id_o`, `naziv`, `id_pi`) VALUES
(1, 'Ujutru', 1),
(2, 'Popodne', 1),
(3, 'Uveče', 1);

-- --------------------------------------------------------

--
-- Table structure for table `odgovori_korisnik`
--

CREATE TABLE `odgovori_korisnik` (
  `id_ok` int(10) NOT NULL,
  `id_o` int(10) NOT NULL,
  `id_k` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `odgovori_korisnik`
--

INSERT INTO `odgovori_korisnik` (`id_ok`, `id_o`, `id_k`) VALUES
(6, 3, 3),
(7, 1, 4),
(9, 2, 6),
(10, 3, 7),
(11, 3, 8),
(12, 1, 9),
(13, 3, 1),
(14, 3, 10),
(15, 3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `pitanje`
--

CREATE TABLE `pitanje` (
  `id_pi` int(10) NOT NULL,
  `naziv_pitanje` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `marker` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pitanje`
--

INSERT INTO `pitanje` (`id_pi`, `naziv_pitanje`, `marker`) VALUES
(1, 'Koje je vaše omiljeno doba dana za vožnju?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id_p` int(10) NOT NULL,
  `naziv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `putanja` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(10) NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `id_ka` int(10) NOT NULL,
  `id_b` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id_p`, `naziv`, `putanja`, `alt`, `cena`, `opis`, `id_ka`, `id_b`) VALUES
(1, 'SCOTT SPEEDSTER 50 (24) asdasd', 'images/a1.jpg', 'SCOTT SPEEDSTER 50 (24)', 68830, '\"\"Izdržljiv i trajan Performance bicikl sa atributima takmičarskog bicikla.Dizajniran da bude lagan i efikasan po razumnoj ceni.\r\nRam od duplo tanjenog aluminijuma i dokazana geometrija, pružaju udobnost i veliku upravljivost.\"\r\n        \"\r\n        ', 3, 2),
(3, 'SCOTT SUB COMFORT 10 MEN', 'images/a3.jpg', 'SCOTT SUB COMFORT 10 MEN', 71990, 'Moderan, gradski bicikl za odlazak do posla i vožnju po gradu, za vozače koji vole brzinu, komfor i efikasnost.', 1, 2),
(4, 'SCOTT SCALE PREMIUM', 'images/a4.jpg', 'SCOTT SCALE PREMIUM', 79990, 'Scale - dizajniran za maksimalnu efikasnost sa minimalnom težinom. \r\nRam proizveden IMP3 carbon tehnologijom i SDS sistem za apsorbciju vibracija i iritirajućih blagih udaraca, obezbeđuje maksimalan prenos snage i precizno rukovanje.', 2, 2),
(5, 'SCOTT SCALE 920', 'images/a5.jpg', 'SCOTT SCALE 920', 313990, 'Scott Scale 920 je kompletno redizajniran za 2017 godinu. Geometrija inspirisana trkama na najvišem nivou, Shimano i Syncros komponente kombinuju hard tail koji prolazi prvi kroz cilj.', 2, 2),
(6, 'SCOTT SCALE 935', 'images/a6.jpg', 'SCOTT SCALE 935', 221990, 'Scott Scale 935 poseduje super lagani Scale 2 Carbon Fiber ram. Scale 935 dolazi u potpunosti opremljen FOX 32 Float Performance viljuškom sa tri moda rada, zajedno sa Scott RideLoc Remote Lockout-om za optimizaciju vožnje.', 2, 2),
(7, 'POLAR MIRAGE COMP 29 black-green-yellow', 'images/a7.jpg', 'POLAR MIRAGE COMP 29 black-green-yellow', 32990, 'Lagan i robustan aluminijumski ram, pouzdana i udobna Suntour suspenzija, Shimano precizne i trajne komponente, omogućavaju performanse bez kompromisa, u rekreativnoj vožnji na uređenim i neuređenim stazama.', 2, 1),
(9, 'SCOTT METRIX 20 Disc (CD20)', 'images/a9.jpg', 'SCOTT METRIX 20 Disc (CD20)', 146880, '\"Metrix nudi efikasnost drumske bicikle, bez potrebe da izgledate kao takmičar. Za opušteni stil vožnje i sa udobnom pozicijom sedenja.\"\r\n        ', 3, 1),
(10, 'SCOTT SPEEDSTER 50 FB (CD16)', 'images/a10.jpg', 'SCOTT SPEEDSTER 50 FB (CD16)', 49990, 'Speedster je ekonomična, laka i efikasna mašina. Optimizovan oblik alu cevi i dokazana geometrija, pružaju komfor i veliku upravljivost.\r\nShimano komponente, obezbeđuju preciznost, pouzdanost i trajnost.\r\nIdealna kombinacija za duge i brze vožnje.', 3, 2),
(11, 'SCOTT ADDICT RC TIAGRA (CD20)', 'images/a11.jpg', 'SCOTT ADDICT RC TIAGRA (CD20)', 99990, 'Sportska geometrija laganog karbonskog rama pruža udobnost i odlično upravljanje, Shimano komponente obezbeđuju preciznost, pouzdanost i trajnost.\r\nIdealna kombinacija za duge i brze vožnje.', 3, 2),
(12, 'POLAR GLIDER black-blue', 'images/a12.jpg', 'POLAR GLIDER black-blue', 25490, 'Bicikl je oduvek bio sredstvo transporta i komunikacije. Danas, sve više ljudi bira bicikl kao alternativni prevoz i jeftino rešenje za urbanu mobilnost. “Gradski” modeli nude neprevaziđen komfor, pre svega zbog uspravnijeg položaja pri vožnji, većih točkova, udobnijeg sedišta i drugih detalja, što nimalo ne umanjuje njihovu sposobnost da se koriste za razonodu i rekreaciju.', 1, 1),
(13, 'POLAR HELIX grey-blue', 'images/a13.jpg', 'POLAR HELIX grey-blue', 27990, 'Bicikl je oduvek bio sredstvo transporta i komunikacije. Danas, sve više ljudi bira bicikl kao alternativni prevoz i jeftino rešenje za urbanu mobilnost. “Gradski” modeli nude neprevaziđen komfor, pre svega zbog uspravnijeg položaja pri vožnji, većih točkova, udobnijeg sedišta i drugih detalja, što nimalo ne umanjuje njihovu sposobnost da se koriste za razonodu i rekreaciju.', 1, 1),
(14, 'POLAR ATHENA white-pink', 'images/a14.jpg', 'POLAR ATHENA white-pink', 27990, 'Bicikl je oduvek bio sredstvo transporta i komunikacije. Danas, sve više ljudi bira bicikl kao alternativni prevoz i jeftino rešenje za urbanu mobilnost. “Gradski” modeli nude neprevaziđen komfor, pre svega zbog uspravnijeg položaja pri vožnji, većih točkova, udobnijeg sedišta i drugih detalja, što nimalo ne umanjuje njihovu sposobnost da se koriste za razonodu i rekreaciju.', 1, 1),
(15, 'SCOTT SUB COMFORT 30 LADY', 'images/a15.jpg', 'SCOTT SUB COMFORT 30 LADY', 61750, 'Moderan, gradski bicikl za odlazak do posla i vožnju po gradu, za vozače koji vole brzinu, komfor i efikasnost.', 1, 2),
(16, 'SCOTT SUB COMFORT 20 MEN', 'images/a16.jpg', 'SCOTT SUB COMFORT 20 MEN', 25500, '\"\"\"Scott SUB Comfort 20, karakterištike udobna geometrija namenjena za svakodnevnu upotrebu, sa Shimano komponentama, Racktime Standit pak tregerom i AXA svetlima, Scott SUB Comfort 20 ima sve što je potrebno za treking ture.\"\r\n        \"\r\n        \"\r\n        ', 1, 2),
(17, 'Smederevkaerwe', '1553460334bigstock-Teacher-reading-a-book-with-a-98584373-810x540.jpg', 'ddas', 870, '                    dasd                        ', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id_u` int(10) NOT NULL,
  `naziv` varchar(35) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id_u`, `naziv`) VALUES
(1, 'admin'),
(2, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brend`
--
ALTER TABLE `brend`
  ADD PRIMARY KEY (`id_b`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`id_ka`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id_k`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_u` (`id_u`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`id_korpa`),
  ADD KEY `id_k` (`id_k`),
  ADD KEY `id_p` (`id_p`);

--
-- Indexes for table `navmeni`
--
ALTER TABLE `navmeni`
  ADD PRIMARY KEY (`id_n`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `odgovori`
--
ALTER TABLE `odgovori`
  ADD PRIMARY KEY (`id_o`),
  ADD KEY `id_p` (`id_pi`);

--
-- Indexes for table `odgovori_korisnik`
--
ALTER TABLE `odgovori_korisnik`
  ADD PRIMARY KEY (`id_ok`),
  ADD KEY `id_o` (`id_o`),
  ADD KEY `id_k` (`id_k`);

--
-- Indexes for table `pitanje`
--
ALTER TABLE `pitanje`
  ADD PRIMARY KEY (`id_pi`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `id_k` (`id_ka`),
  ADD KEY `id_b` (`id_b`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brend`
--
ALTER TABLE `brend`
  MODIFY `id_b` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id_ka` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_k` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `id_korpa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `navmeni`
--
ALTER TABLE `navmeni`
  MODIFY `id_n` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `odgovori`
--
ALTER TABLE `odgovori`
  MODIFY `id_o` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `odgovori_korisnik`
--
ALTER TABLE `odgovori_korisnik`
  MODIFY `id_ok` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pitanje`
--
ALTER TABLE `pitanje`
  MODIFY `id_pi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id_p` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id_u` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`id_u`) REFERENCES `uloga` (`id_u`);

--
-- Constraints for table `korpa`
--
ALTER TABLE `korpa`
  ADD CONSTRAINT `korpa_ibfk_1` FOREIGN KEY (`id_k`) REFERENCES `korisnik` (`id_k`) ON DELETE CASCADE,
  ADD CONSTRAINT `korpa_ibfk_2` FOREIGN KEY (`id_p`) REFERENCES `proizvodi` (`id_p`) ON DELETE CASCADE;

--
-- Constraints for table `navmeni`
--
ALTER TABLE `navmeni`
  ADD CONSTRAINT `navmeni_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `navmeni` (`id_n`);

--
-- Constraints for table `odgovori`
--
ALTER TABLE `odgovori`
  ADD CONSTRAINT `odgovori_ibfk_1` FOREIGN KEY (`id_pi`) REFERENCES `pitanje` (`id_pi`);

--
-- Constraints for table `odgovori_korisnik`
--
ALTER TABLE `odgovori_korisnik`
  ADD CONSTRAINT `odgovori_korisnik_ibfk_1` FOREIGN KEY (`id_o`) REFERENCES `odgovori` (`id_o`) ON DELETE CASCADE,
  ADD CONSTRAINT `odgovori_korisnik_ibfk_2` FOREIGN KEY (`id_k`) REFERENCES `korisnik` (`id_k`) ON DELETE CASCADE;

--
-- Constraints for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD CONSTRAINT `proizvodi_ibfk_1` FOREIGN KEY (`id_b`) REFERENCES `brend` (`id_b`) ON DELETE CASCADE,
  ADD CONSTRAINT `proizvodi_ibfk_2` FOREIGN KEY (`id_ka`) REFERENCES `kategorija` (`id_ka`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
