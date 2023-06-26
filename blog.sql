-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Cze 2023, 16:36
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `blog`
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
  `haslo` varchar(200) NOT NULL,
  `id_adresu` int(5) NOT NULL,
  `data_urodzenia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `admini`
--

INSERT INTO `admini` (`id_admina`, `imie`, `nazwisko`, `login`, `haslo`, `id_adresu`, `data_urodzenia`) VALUES
(25, 'fa', 'fa', 'fa', '$2y$10$k6NzDw49N3utfPbH0Nh4jOTXUEFBekDe7RMY.ZAs6KOJ7WoPcUM/i', 3, '2023-06-08');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `adresy`
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
  `kalorie` int(10) NOT NULL,
  `zdjecie` varchar(100) DEFAULT NULL
) ;

--
-- Zrzut danych tabeli `przepisy`
--

INSERT INTO `przepisy` (`id`, `nazwa_potrawy`, `czas_przygotowania`, `skladniki`, `sposob_przygotowania`, `id_admina`, `kalorie`, `zdjecie`) VALUES
(17, 'hotdog', '', 'bułka hotdogowa lub połowa bagietki\r\nparówka\r\nser gouda\r\nmajonez\r\nketchup\r\ninne sosy według uznania', 'Bułkę naciąć tak aby nie przekroić jej do końca.\r\nWłożyć parówkę do bułki.\r\nNa parówkę, w środek bułki położyć pokrojony ser.\r\nWstawić do mikrofalówki na 2 minuty\r\nWyjąć i polać sosami.', 0, 0, 'hotdog.jpg'),
(20, 'asd', '123', 'asd', 'asd', 1, 123, 'hotdog.jpg');

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
-- AUTO_INCREMENT dla tabeli `admini`
--
ALTER TABLE `admini`
  MODIFY `id_admina` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT dla tabeli `adresy`
--
ALTER TABLE `adresy`
  MODIFY `id_adresu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `przepisy`
--
ALTER TABLE `przepisy`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
