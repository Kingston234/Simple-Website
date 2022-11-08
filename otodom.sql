-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Lis 2021, 12:29
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `otodom`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ogloszenia`
--

CREATE TABLE `ogloszenia` (
  `id` int(11) NOT NULL,
  `miasto` varchar(50) NOT NULL,
  `metraz` int(11) NOT NULL,
  `rodzaj` varchar(50) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `cena` int(15) NOT NULL,
  `jaki` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ogloszenia`
--

INSERT INTO `ogloszenia` (`id`, `miasto`, `metraz`, `rodzaj`, `email`, `cena`, `jaki`, `link`) VALUES
(1, 'Kraśnik', 40, 'Mieszkanie', 'OTODOM@ONET.PL', 500, 'Wynajem', ''),
(2, 'Kraśnik', 40, 'Mieszkanie', 'OTODOM@ONET.PL', 500, 'Wynajem', ''),
(3, 'Warszawa', 67, 'Mieszkanie', 'OTODOM@ONET.PL', 2200, 'Wynajem', ''),
(4, 'Warszawa', 44, 'Mieszkanie', 'OTODOM@ONET.PL', 600, 'Wynajem', ''),
(5, 'Kraśnik', 46, 'Mieszkanie', 'OTODOM@ONET.PL', 790, 'Wynajem', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `email` varchar(150) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(100) NOT NULL,
  `tel` int(9) NOT NULL,
  `haslo` varchar(30) NOT NULL,
  `reset` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`email`, `imie`, `nazwisko`, `tel`, `haslo`, `reset`) VALUES
('OTODOM@ONET.PL', 'TYMEK', 'PLIZGA', 123456789, '!QAZ@WSX', 9991);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ogloszenia`
--
ALTER TABLE `ogloszenia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `ogloszenia`
--
ALTER TABLE `ogloszenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `ogloszenia`
--
ALTER TABLE `ogloszenia`
  ADD CONSTRAINT `ogloszenia_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
