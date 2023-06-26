-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 12, 2023 at 01:33 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admini`
--

CREATE TABLE `admini` (
  `id_admina` int(5) NOT NULL,
  `imie` varchar(20) NOT NULL,
  `nazwisko` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `haslo` varchar(20) NOT NULL,
  `id_adresu` int(5) NOT NULL,
  `data_urodzenia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admini`
--

INSERT INTO `admini` (`id_admina`, `imie`, `nazwisko`, `login`, `haslo`, `id_adresu`, `data_urodzenia`) VALUES
(1, 'Genowefa', 'Gryciuk', 'ggprzepis', 'zgerypala123', 1, '1983-12-07'),
(2, 'Marian', 'Pryncypałka', 'marpryn', 'marpryn123', 2, '1993-04-07'),
(3, 'Cezary', 'Kieł', 'cekiel', 'cekiel1234', 3, '2004-06-10');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adresy`
--

CREATE TABLE `adresy` (
  `id_adresu` int(5) NOT NULL,
  `miasto` varchar(20) NOT NULL,
  `ulica` varchar(20) NOT NULL,
  `nr_domu` varchar(20) NOT NULL,
  `nr_mieszkania` varchar(20) DEFAULT NULL,
  `kod_pocztowy` varchar(6) NOT NULL,
  `kraj` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adresy`
--

INSERT INTO `adresy` (`id_adresu`, `miasto`, `ulica`, `nr_domu`, `nr_mieszkania`, `kod_pocztowy`, `kraj`) VALUES
(1, 'Warszawa', 'Nowy Świat', '12', NULL, '12-330', 'Polska'),
(2, 'Białystok', 'Piastowska', '5', '3', '15-215', 'Polska'),
(3, 'Katowice', 'Spodkowa', '3', '31', '11-233', 'Polska');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przepisy`
--

CREATE TABLE `przepisy` (
  `id` int(5) NOT NULL,
  `nazwa_potrawy` varchar(20) NOT NULL,
  `czas_przygotowania` varchar(4) NOT NULL,
  `skladniki` text NOT NULL,
  `sposob_przygotowania` varchar(500) NOT NULL,
  `id_admina` int(5) NOT NULL,
  `kalorie` varchar(10) NOT NULL,
  `zdjecie` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `przepisy`
--

INSERT INTO `przepisy` (`id`, `nazwa_potrawy`, `czas_przygotowania`, `skladniki`, `sposob_przygotowania`, `id_admina`, `kalorie`, `zdjecie`) VALUES
(1, 'placki ziemniaczane', '30 m', '1 kg ziemniaków\r\n1 cebula\r\n1 jajko\r\n2 łyżki mąki ziemniaczanej\r\nsól i pieprz do smaku', '\r\nZiemniaki obrać i zetrzeć na tarce.\r\nCebulę posiekać drobno i dodać do ziemniaków.\r\nDodać jajko i mąkę ziemniaczaną. Doprawić solą i pieprzem.\r\nDokładnie wymieszać składniki.\r\nSmażyć placki na patelni z rozgrzanym olejem, aż z obu stron się zrumienią.\r\nSerwować na ciepło.', 1, '400 kcal', NULL),
(2, 'chleb w jajku', '10 m', '4 kromki chleba pszennego\r\n1 jajko\r\nmleko\r\nłyżeczka przyprawy typu \"kucharek\"\r\nsól i pieprz do smaku', 'Wymieszaj w misce jajka, mleko, szczyptę soli oraz przyprawę kucharek.\r\nRozgrzej patelnię i dodaj kawałek masła.\r\nZamocz kromki chleba tostowego w przygotowanym wcześniej mieszanką z jajek i mleka, jedną po drugiej, na kilka sekund z każdej strony, aż będą dobrze nasączone.\r\nPrzełóż kromki chleba na rozgrzaną patelnię i smaż na złoty kolor z obu stron, około 2-3 minut na każdej stronie.', 1, '300', NULL),
(3, 'hot dog', '5', 'bułka hotdogowa lub połowa bagietki\r\nparówka\r\nser gouda\r\nmajonez\r\nketchup\r\ninne sosy według uznania', 'Bułkę naciąć tak aby nie przekroić jej do końca.\r\nWłożyć parówkę do bułki.\r\nNa parówkę, w środek bułki położyć pokrojony ser.\r\nWstawić do mikrofalówki na 2 minuty\r\nWyjąć i polać sosami.', 2, '250', NULL),
(5, 'Kurwaplacki', '', 'kurwa placek 1', 'zrob placki', 0, '', NULL),
(6, 'siema', '', 'siema', 'siema', 0, '', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admini`
--
ALTER TABLE `admini`
  ADD PRIMARY KEY (`id_admina`);

--
-- Indeksy dla tabeli `adresy`
--
ALTER TABLE `adresy`
  ADD PRIMARY KEY (`id_adresu`);

--
-- Indeksy dla tabeli `przepisy`
--
ALTER TABLE `przepisy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admini`
--
ALTER TABLE `admini`
  MODIFY `id_admina` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `adresy`
--
ALTER TABLE `adresy`
  MODIFY `id_adresu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `przepisy`
--
ALTER TABLE `przepisy`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
