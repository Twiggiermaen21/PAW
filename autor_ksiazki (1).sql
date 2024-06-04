-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 04, 2024 at 11:10 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ksiegarnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `autor_ksiazki`
--

CREATE TABLE `autor_ksiazki` (
  `idAutor_Ksiazki` int(11) NOT NULL,
  `Imie` varchar(45) NOT NULL,
  `Nazwisko` varchar(45) NOT NULL,
  `Data_urodzenia` date NOT NULL,
  `Kraj_pochodzenia` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `autor_ksiazki`
--

INSERT INTO `autor_ksiazki` (`idAutor_Ksiazki`, `Imie`, `Nazwisko`, `Data_urodzenia`, `Kraj_pochodzenia`) VALUES
(1, 'Adam', 'Mickiewicz', '1798-12-24', 'Litwa'),
(5, 'Olga', 'Tokarczuk', '1962-01-29', 'Polska'),
(7, 'Heather', 'Morris', '1987-02-01', 'USA'),
(8, 'Juliusz', 'Słowacki', '1849-04-03', 'Francja'),
(9, 'Remigiusz', 'Mróz', '1987-01-15', 'Polska'),
(10, 'Andrzej', 'Nowak', '1960-09-12', 'Polska'),
(11, 'Władysław', 'Reymont', '1867-03-01', 'Polska');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `autor_ksiazki`
--
ALTER TABLE `autor_ksiazki`
  ADD PRIMARY KEY (`idAutor_Ksiazki`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor_ksiazki`
--
ALTER TABLE `autor_ksiazki`
  MODIFY `idAutor_Ksiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
