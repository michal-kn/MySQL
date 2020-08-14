-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Lut 2018, 20:25
-- Wersja serwera: 10.1.26-MariaDB
-- Wersja PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `portal`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osoby`
--

CREATE TABLE `osoby` (
  `imie` varchar(21) NOT NULL,
  `nazwisko` varchar(21) NOT NULL,
  `plec` varchar(1) NOT NULL,
  `wiek` int(11) NOT NULL,
  `wojewodztwo` varchar(21) NOT NULL,
  `telefon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `osoby`
--

INSERT INTO `osoby` (`imie`, `nazwisko`, `plec`, `wiek`, `wojewodztwo`, `telefon`) VALUES
('Agnieszka', 'Gruszka', 'k', 20, 'Dolnoslaskie', '777123636'),
('Katarzyna', 'Kluska', 'k', 23, 'Podkarpackie', '123123123'),
('Aleksandra', 'Kowalska', 'k', 33, 'Mazowieckie', '456456543'),
('Zbyszek', 'Krosta', 'm', 18, 'Lodzkie', '222333444'),
('Dawid', 'Nowak', 'm', 42, 'Mazowieckie', '144511232'),
('Jacek', 'Placek', 'm', 51, 'Opolskie', '123456789'),
('Krzysztof', 'Polak', 'm', 37, 'Warminsko-mazurskie', '987654321'),
('Maria', 'Tytus', 'k', 19, 'Dolnoslaskie', '121212122'),
('Anna', 'Wojak', 'k', 24, 'Malopolskie', '324234521');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `osoby`
--
ALTER TABLE `osoby`
  ADD PRIMARY KEY (`nazwisko`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
