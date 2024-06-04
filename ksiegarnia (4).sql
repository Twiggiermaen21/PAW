-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 04, 2024 at 11:28 AM
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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazki`
--

CREATE TABLE `ksiazki` (
  `idKsiazki` int(11) NOT NULL,
  `Tytul` varchar(45) NOT NULL,
  `Cena` double NOT NULL,
  `Ilosc_stron` int(11) NOT NULL,
  `opis` varchar(1000) DEFAULT NULL,
  `Ilosc_sztuk` int(11) NOT NULL,
  `img_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ksiazki`
--

INSERT INTO `ksiazki` (`idKsiazki`, `Tytul`, `Cena`, `Ilosc_stron`, `opis`, `Ilosc_sztuk`, `img_url`) VALUES
(19, 'Pan Tadeusz', 23.22, 213, 'to jest pan tadeusz', 0, 'images/PanTadeusz.jpg'),
(20, 'Bieguni', 12.22, 457, 'to sa bieguni', 0, 'images/982396-352x500.jpg'),
(21, 'Tatuażysta z Auschwitz', 23.99, 320, 'to jest tatuazysta', 0, 'images/tatua.jpg'),
(22, 'Konrad Wallenrod', 34.21, 321, 'Konrad Wallenrod, powieść historyczna z dziejów litewskich i pruskich – powieść poetycka napisana przez Adama Mickiewicza na zsyłce w Moskwie, prawdopodobnie między rokiem 1825 a 1828, wydana zaś w lutym 1828 przez drukarnię Karola Kraya; uważana za jeden z najbardziej znanych poematów polskiego romantyzmu', 0, 'images/images (1).jpg'),
(23, 'Ballady i romanse', 21.32, 432, 'Ballady i romanse – zbiór ballad Adama Mickiewicza, wydany w 1822 w Wilnie jako część pierwszego tomu Poezyj. Uważany jest za początek rozwoju gatunku ballady w literaturze polskiej oraz za manifest polskiego romantyzmu.', 0, 'images/images (2).jpg'),
(24, 'Prowadź swój pług przez kości umarłych', 54.12, 500, 'Prowadź swój pług przez kości umarłych – powieść Olgi Tokarczuk wydana w 2009 roku nakładem Wydawnictwa Literackiego, nominowana do Nagrody Literackiej Nike 2010. Tytuł jest cytatem z poematu Williama Blake’a Zaślubiny Nieba i Piekła.', 0, 'images/prowadz_swoj_plug_przez_kosci_umarlych_tokarczuk.jpg'),
(25, 'Zgubiona dusza', 32.12, 432, 'Zgubiona dusza – książka Olgi Tokarczuk z ilustracjami Joanny Concejo wydana w 2017 r. nakładem Wydawnictwa Format.', 0, 'images/zgubiona-dusza.jpg'),
(26, 'Empuzjon', 34.98, 345, 'Empuzjon. Horror przyrodoleczniczy – powieść wydana przez Olgę Tokarczuk 1 czerwca 2022 roku nakładem Wydawnictwa Literackiego. Jest to jej pierwsza książka wydana po otrzymaniu literackiej Nagrody Nobla.', 0, 'images/images (3).jpg'),
(27, 'Cilka&#39;s Journey: A Novel', 39.99, 432, 'Ta książka podobała się 91% użytkowników', 0, 'images/71sZSvkZYWL._AC_UF894,1000_QL80_DpWeblab_.jpg'),
(28, 'Three Sisters', 21.11, 249, 'From international bestselling author Heather Morris comes the breath-taking conclusion to „The Tattooist of Auschwitz” trilogy. When they are girls, Cibi, ...', 0, 'images/images (5).jpg'),
(29, 'Balladyna', 12.53, 398, 'Balladyna – dramat romantyczny w pięciu aktach, napisany przez Juliusza Słowackiego w Genewie w 1834 roku, a wydany w Paryżu w roku 1839.', 0, 'images/images (6).jpg'),
(30, 'Zemsta', 20, 124, 'Zemsta – komedia Aleksandra Fredry w czterech aktach. Dokładna data powstania sztuki nie jest znana. Według Eugeniusza Kucharskiego mogła powstać w latach 1832–1833. Zemsta po raz pierwszy drukiem ukazała w 1838 we Lwowie w tomie V zbiorowego wydania dzieł Fredry.', 0, 'images/zemsta-wydanie-z-opracowaniem-b-iext128954935.jpg'),
(31, 'Ekspozycja', 50, 590, 'Ekspozycja – polska powieść kryminalna Remigiusza Mroza wydana w 2015 przez wydawnictwo Filia. Książka jest pierwszym tomem z serii Komisarz Forst. W 2016 autor powieści ogłosił, że sprzedał prawa do zekranizowania historii.', 0, 'images/3d2491405c5b848f5-ekspozycja.jpg'),
(32, 'Behawiorysta', 69.99, 765, '&#34;Zamachowiec zajmuje przedszkole, grożąc że zabije wychowawców i dzieci. Policja jest bezsilna, a mężczyzna nie przedstawia żadnych żądań. Nikt nie wie, dlaczego wziął zakladników, ani co zamierza osiągnąć. Sytuację komplikuje fakt, że transmisja na żywo z przedszkola pojawia się w internecie', 0, 'images/images (7).jpg'),
(33, 'Kasacja', 80.99, 876, 'Kasacja – polski thriller prawniczy autorstwa Remigiusza Mroza, wydany po raz pierwszy przez Wydawnictwo Czwarta Strona w 2015.', 0, 'images/7109DAbdZpL._AC_UF1000,1000_QL80_DpWeblab_.jpg'),
(34, 'Wojna i dziedzictwo: historia najnowsza', 45.12, 999, 'Książka „Wojna i dziedzictwo. Historia najnowsza” Andrzeja Nowaka to rozważania na temat kondycji i sytuacji Polski we współczesnym świecie. W zamieszczonych esejach profesor łączy przeszłość z teraźniejszością.', 0, 'images/i-wojna-i-dziedzictwo-historia-najnowsza.webp'),
(35, 'Klęska imperium zła: rok 1920', 34.95, 642, 'Dla Andrzeja Nowaka klęska bolszewików z sierpnia 1920 roku jest przyczynkiem do przeanalizowania dziejów polsko-rosyjskich. Sam opis wojny polsko-bolszewickiej ...', 0, 'images/9923.jpg'),
(36, 'Metamorfozy Imperium Rosyjskiego 1721-1921', 45.08, 654, 'Metamorfozy Imperium Rosyjskiego 1721-1921. Geopolityka, ody i narody. Andrzej Nowak. Rosja przeciwko Polsce, Europie, światu. Książka, dzięki której łatwiej ...', 0, 'images/images (8).jpg'),
(37, 'Księgi Jakubowe', 67.99, 643, 'Księgi Jakubowe albo Wielka podróż przez siedem granic, pięć języków i trzy duże religie, nie licząc tych małych – powieść historyczna Olgi Tokarczuk, wydana w październiku 2014 nakładem Wydawnictwa Literackiego.', 0, 'images/878323-352x500.jpg'),
(38, 'Czuły narrator', 24.22, 412, 'Czuły narrator – zbiór esejów Olgi Tokarczuk wydany w 2020 roku nakładem Wydawnictwa Literackiego.', 0, 'images/czuly_narrator_6058822d8ec11.png'),
(39, 'Sonety krymskie', 19.99, 288, 'Sonety krymskie to cykl 18 sonetów, będących opisem wyprawy Adama Mickiewicza na Krym jesienią 1825 roku. Pierwszy raz opublikowane zostały rok później, ...', 0, 'images/sonety-krymskie_NUqqIkE.jpg'),
(40, 'Chłopi', 34.99, 234, 'Chłopi – powieść społeczno-obyczajowa Władysława Stanisława Reymonta publikowana w odcinkach w latach 1902–1908 w „Tygodniku Ilustrowanym”, wydana w latach 1904–1909 w Warszawie w wydawnictwie „Gebethner i Wolff”. Pisarz otrzymał za ten utwór literacką Nagrodę Nobla w 1924', 0, 'images/63d09b46c85f2c1cad281-chlopi.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazki_has_autor_ksiazki`
--

CREATE TABLE `ksiazki_has_autor_ksiazki` (
  `Autor_Ksiazki_idAutor_Ksiazki` int(11) NOT NULL,
  `Ksiazki_idKsiazki` int(11) NOT NULL,
  `idKsiazki_has_Autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ksiazki_has_autor_ksiazki`
--

INSERT INTO `ksiazki_has_autor_ksiazki` (`Autor_Ksiazki_idAutor_Ksiazki`, `Ksiazki_idKsiazki`, `idKsiazki_has_Autor`) VALUES
(1, 19, 13),
(5, 20, 14),
(7, 21, 15),
(1, 22, 16),
(1, 23, 17),
(5, 24, 18),
(5, 25, 19),
(5, 26, 20),
(7, 27, 21),
(7, 28, 22),
(8, 29, 23),
(8, 30, 24),
(9, 31, 25),
(9, 32, 26),
(9, 33, 27),
(10, 34, 28),
(10, 35, 29),
(10, 36, 30),
(5, 37, 31),
(5, 38, 32),
(1, 39, 33),
(11, 40, 34);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `platnosci`
--

CREATE TABLE `platnosci` (
  `idPlatnosci` int(11) NOT NULL,
  `Kwota` double NOT NULL,
  `Data_Platnosci` date NOT NULL,
  `Rodzaj_płatnosci` varchar(45) NOT NULL,
  `idUzytkownik` int(11) NOT NULL,
  `KodPlatnosci` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `platnosci`
--

INSERT INTO `platnosci` (`idPlatnosci`, `Kwota`, `Data_Platnosci`, `Rodzaj_płatnosci`, `idUzytkownik`, `KodPlatnosci`) VALUES
(51, 169.86, '2024-05-19', 'Przelew Bankowy', 2, 'b11595f6b8cf02b0c040472f95817a6d'),
(52, 1553.22, '2024-05-19', 'Gotowka', 2, '64d184048aab43d3debf7e0b319f0123'),
(53, 21.32, '2024-05-19', 'Przelew Bankowy', 2, '4352649bc200aee55f7247254f972e1c'),
(54, 377.05, '2024-05-19', 'Gotowka', 2, '7867cbc34652586d62b43c48abb5ce6b'),
(55, 311.1, '2024-05-19', 'Gotowka', 7, '399be7472da9a585f6ed723e6d3828c4'),
(56, 499.3, '2024-05-20', 'Blik', 8, '3d66f53a743d3d9a14e7da1f58af601f'),
(57, 499.3, '2024-05-20', 'Blik', 8, '2aca8c8532141f95f0bab777b369f619'),
(58, 23.99, '2024-05-20', 'Przelew Bankowy', 8, 'bf7b2b075774ae138b3de9709c1885b1'),
(59, 270.72, '2024-05-20', 'Gotowka', 8, 'c0407e0f4241397410b4a733500dfc29'),
(60, 447.85, '2024-05-21', 'Gotowka', 9, 'ecd5ba970f64f5d27e1e0b59f0ec6acb'),
(61, 447.85, '2024-05-21', 'Gotowka', 9, 'b133a06545fc3ec13c06464072c3f8a0'),
(62, 447.85, '2024-05-21', 'Gotowka', 9, '030b0588ded565f616c362a01a5b237b'),
(63, 447.85, '2024-05-21', 'Przelew Bankowy', 9, 'ff4ba704dd2b2a6ffce6e13b47a1887b'),
(64, 447.85, '2024-05-21', 'Gotowka', 9, 'b63afea631da6fa677d62ae6fa25cb5e'),
(65, 447.85, '2024-05-21', 'Gotowka', 9, 'a14d895490037b00b2fe994c911c5fda'),
(66, 255.4, '2024-05-21', 'Przelew Bankowy', 2, 'b4ceaa462c63a6733ca84ee02ed12ace'),
(67, 255.4, '2024-05-21', 'Przelew Bankowy', 2, 'ad81119d481cbf83a15eb649fff0a054'),
(68, 255.4, '2024-05-21', 'Przelew Bankowy', 2, '1bdf935c32ad215a5e361b3be9d41e5b'),
(69, 255.4, '2024-05-21', 'Przelew Bankowy', 2, '9d91aef38396c69ddb07a153ff249cd6'),
(70, 12.22, '2024-05-21', 'Gotowka', 2, '6023938a6ff7b97c75e75777ff5d20e8'),
(71, 12.22, '2024-05-21', 'Blik', 2, '01fd96a3a72e120481c31acc7c7f8373'),
(72, 12.22, '2024-05-21', 'Gotowka', 2, '9a9ee48a98bb4b5c66f90604a33e337f'),
(73, 12.22, '2024-05-21', 'Gotowka', 2, 'dbf18685671052063ef679999a99b8ec'),
(74, 12.22, '2024-05-21', 'Gotowka', 2, 'a991152fa03e114985e8906c6484e354'),
(75, 12.22, '2024-05-21', 'Gotowka', 2, 'e332d1d502975d37e02a19f82cf4d60b'),
(76, 12.22, '2024-05-21', 'Blik', 2, 'fd8c9eea48b75f183ac70e7cf0c23c25'),
(77, 12.22, '2024-05-21', 'Blik', 2, 'a254ff86731d62ba416cbcabf3f14a5a'),
(78, 23.22, '2024-05-21', 'Przelew Bankowy', 2, '8f7a611bcd7589e6d135e8efb96cd839'),
(79, 23.22, '2024-05-21', 'Przelew Bankowy', 2, 'd9beb213367494ad0a815993fcc74f70'),
(80, 23.22, '2024-05-21', 'Blik', 2, 'b79b282d14d71d7501f375fb244cd006'),
(81, 23.22, '2024-05-21', 'Blik', 2, 'b0604ff1fa30490e8dd0dab1b917a7e6'),
(82, 12.22, '2024-05-21', 'Blik', 2, 'a412890945f87919b29f4014a4b5d0b2'),
(83, 12.22, '2024-05-21', 'Blik', 2, 'a34582f301db8d832dad250c0e198221'),
(84, 58.17, '2024-05-27', 'Przelew Bankowy', 10, 'f290e720b61b050f7d674bc7dd02144b'),
(85, 23.22, '2024-06-02', 'Blik', 11, '0b651625aaaa21cea199cec51f512bbd'),
(86, 12.22, '2024-06-03', 'Przelew Bankowy', 2, '378ed695ddfb6993ecad5204ff62ca04'),
(87, 47.66, '2024-06-03', 'Gotowka', 12, '0baea51955adb0eee152240a5f30f74a'),
(88, 12.22, '2024-06-03', 'Gotowka', 13, 'da2ad7d698e07eb818d8078d4a3a1638'),
(89, 12.22, '2024-06-04', 'Przelew Bankowy', 14, 'c6902a70b7a10c2caac1bc56b5849225');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rola`
--

CREATE TABLE `rola` (
  `idRola` int(11) NOT NULL,
  `NazwaRoli` varchar(45) NOT NULL,
  `Aktywnosc` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `OstatnieUzycie` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rola`
--

INSERT INTO `rola` (`idRola`, `NazwaRoli`, `Aktywnosc`, `OstatnieUzycie`) VALUES
(1, 'Admin', 001, '2024-06-04 10:05:35'),
(2, 'Pracownik', 001, '2024-06-03 16:47:52'),
(3, 'Kupujacy', 001, '2024-06-04 10:05:13');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `idUzytkownik` int(11) NOT NULL,
  `Imie` varchar(45) NOT NULL,
  `Nazwisko` varchar(45) NOT NULL,
  `Data_aktualizacji` datetime NOT NULL,
  `Id_aktualizacji` int(11) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Haslo` varchar(45) NOT NULL,
  `Data_utworzenia` datetime NOT NULL,
  `aktywny` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `uzytkownik`
--

INSERT INTO `uzytkownik` (`idUzytkownik`, `Imie`, `Nazwisko`, `Data_aktualizacji`, `Id_aktualizacji`, `Email`, `Haslo`, `Data_utworzenia`, `aktywny`) VALUES
(2, 'Kacper', 'Pudełko', '2024-06-02 18:21:21', 2, 'kacper.pudelko.kpk@gmail.com', '1234567890', '2024-05-13 13:41:07', 1),
(7, 'Pracownik', 'Adnrzejk', '2024-06-03 17:11:28', 2, 'Pracownik@gmail.com', '123123123123', '2024-05-19 20:26:36', 0),
(8, 'autor', 'autor', '0000-00-00 00:00:00', 0, 'autor@gmail.com', '1234567890', '2024-05-19 20:28:51', 1),
(9, 'Adam', 'Nowak', '0000-00-00 00:00:00', 0, 'Nowak@gmail.com', '1234567890', '2024-05-21 10:50:53', 0),
(10, 'Olga', 'Mickiewicz', '0000-00-00 00:00:00', 0, '123@gmail.com', '123123123123', '2024-05-27 12:50:10', 1),
(11, 'micha', 'pup', '0000-00-00 00:00:00', 0, 'mi@gmail.com', '1234567890', '2024-06-02 18:03:44', 1),
(12, 'kacper', 'pp', '0000-00-00 00:00:00', 0, 'pp@gmail.com', '123123123123', '2024-06-03 16:46:16', 1),
(13, 'kupujacy', 'adam', '2024-06-03 17:09:04', 13, 'kup@gmail.com', '123123123123', '2024-06-03 17:03:02', 1),
(14, '1212', '12', '0000-00-00 00:00:00', 0, '333@gmail.com', '123123123123', '2024-06-04 10:05:05', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik_has_rola`
--

CREATE TABLE `uzytkownik_has_rola` (
  `Uzytkownik_idUzytkownik` int(11) NOT NULL,
  `Rola_idRola` int(11) NOT NULL,
  `Data_nadania` datetime NOT NULL,
  `Data_zabrania` datetime NOT NULL,
  `idUzytkownik_has_Rola` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `uzytkownik_has_rola`
--

INSERT INTO `uzytkownik_has_rola` (`Uzytkownik_idUzytkownik`, `Rola_idRola`, `Data_nadania`, `Data_zabrania`, `idUzytkownik_has_Rola`) VALUES
(2, 1, '2024-05-13 13:41:07', '0000-00-00 00:00:00', 2),
(8, 2, '2024-05-19 20:28:51', '0000-00-00 00:00:00', 8),
(9, 3, '2024-05-21 10:50:53', '0000-00-00 00:00:00', 9),
(10, 3, '2024-05-27 12:50:10', '0000-00-00 00:00:00', 10),
(11, 3, '2024-06-02 18:03:44', '0000-00-00 00:00:00', 11),
(2, 3, '2024-06-03 12:37:44', '2024-06-03 12:37:44', 14),
(7, 2, '2024-06-03 16:39:45', '0000-00-00 00:00:00', 20),
(7, 3, '2024-06-03 16:40:14', '0000-00-00 00:00:00', 21),
(12, 2, '2024-06-03 16:47:16', '0000-00-00 00:00:00', 23),
(13, 3, '2024-06-03 17:03:02', '0000-00-00 00:00:00', 24),
(7, 1, '2024-06-03 17:11:38', '0000-00-00 00:00:00', 25),
(2, 2, '2024-06-03 17:23:42', '0000-00-00 00:00:00', 26),
(8, 1, '2024-06-03 17:29:54', '0000-00-00 00:00:00', 28),
(8, 3, '2024-06-03 17:30:07', '0000-00-00 00:00:00', 29),
(14, 3, '2024-06-04 10:05:05', '0000-00-00 00:00:00', 30);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wiadomosci`
--

CREATE TABLE `wiadomosci` (
  `idWiadomosci` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `wiadomosci`
--

INSERT INTO `wiadomosci` (`idWiadomosci`, `Name`, `Email`, `Text`) VALUES
(1, 'kacper.pudelko.kpk@gmail.', 'kacper', 'elo elo'),
(2, 'kacper.pudelko.kpk@gmail.', '13', '1231312');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `idzamowienia` int(11) NOT NULL,
  `Uzytkownik_idUzytkownik` int(11) NOT NULL,
  `Data_zamowienia` datetime NOT NULL,
  `Platnosci_idPlatnosci` int(11) NOT NULL,
  `Adres` varchar(45) NOT NULL,
  `KodZamowienia` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `zamowienia`
--

INSERT INTO `zamowienia` (`idzamowienia`, `Uzytkownik_idUzytkownik`, `Data_zamowienia`, `Platnosci_idPlatnosci`, `Adres`, `KodZamowienia`) VALUES
(51, 2, '2024-05-19 19:09:13', 51, 'dom 12312313123', 'b1172267faf39e8c9358c33c0f53e33e'),
(52, 2, '2024-05-19 19:09:32', 52, '12312312313123', 'c24b0715faa66e058d506f60ad8f28b9'),
(53, 2, '2024-05-19 19:09:57', 53, '98dom123 warszawa', 'f69da8a8ec2d2542a54053d9636d8bc7'),
(54, 2, '2024-05-19 19:20:06', 54, 'dom0031dom 123', '5fa0593fd98a0109f0c70b51d4ee22c1'),
(55, 7, '2024-05-19 20:35:48', 55, 'user dom 43-200 warszawa', 'ec10806df51a54acfb77a2ddca3ffe1c'),
(56, 8, '2024-05-20 13:37:32', 56, 'ulicowa 12 43-123 poznac', 'f162211a9d2e6093d414e40e41e543a8'),
(57, 8, '2024-05-20 13:38:00', 57, 'ulicowa 12 43-123 poznac', '0a500713396fe63bbc28fd912ee79eeb'),
(58, 8, '2024-05-20 14:28:20', 58, '321 warszaw 213', '623de620d42bd7c830f0c8447286f1e3'),
(59, 8, '2024-05-20 14:31:10', 59, 'sosnowiec 23 54-231 katowice', '705df2e189f57afe1f5d402ed309d7d8'),
(60, 9, '2024-05-21 10:52:44', 60, 'Szkolna 21 43-212 Warszawa', '69c43578b0805926cfc93a3662fe53e0'),
(61, 9, '2024-05-21 10:52:46', 61, 'Szkolna 21 43-212 Warszawa', '0610ea77cca4e82199da098879e2833b'),
(62, 9, '2024-05-21 10:52:52', 62, 'Szkolna 21 43-212', 'b39f980a49fd177e0da6b1bbf61722a4'),
(63, 9, '2024-05-21 10:52:56', 63, 'Szkolna 21 43-212', '3f4dc9e6025f1ed9cfbac64d56d18b7f'),
(64, 9, '2024-05-21 10:54:17', 64, 'Szkolna 21', 'd29a3fdc799368e044e802410a110341'),
(65, 9, '2024-05-21 10:55:27', 65, 'Szkolna 21', 'e3e4150e553dfa74af379f0d9deccc58'),
(66, 2, '2024-05-21 10:56:07', 66, 'dom 123 warszaw', '803a7a1fb1375f4c5a1389515f15d367'),
(67, 2, '2024-05-21 10:56:09', 67, 'dom 123 warszaw', '6d6f38996ac0c637989ea66ddb4831b8'),
(68, 2, '2024-05-21 10:56:19', 68, 'dom 123 warszaw', 'db661b3ef5d43eba866a81584ee2146a'),
(69, 2, '2024-05-21 15:08:43', 69, 'dom 123 warszaw', '0bf2cba80ddd36fd5b0849966b3a3aa6'),
(73, 2, '2024-05-21 15:16:17', 73, 'dom 1239754', '31211ec1efebfa37e15a050ce8248a72'),
(74, 2, '2024-05-21 15:16:20', 74, 'dom 1239754', '6f1b20209fbee02bb8f91dc10589e661'),
(75, 2, '2024-05-21 15:18:03', 75, 'dom 1239754', '146c2a9d7a3f111025b43d81096ffccf'),
(76, 2, '2024-05-21 15:18:12', 76, 'dom 123874653', '23581f0d5d903d81cf555bba2df2ffb0'),
(77, 2, '2024-05-21 15:18:16', 77, 'dom 123874653', '8f61ecb1ba9347ad911fcc19ca5ece79'),
(78, 2, '2024-05-21 15:18:54', 78, 'dom 1235412342', 'e7ce9b593cae00026ec8368e4dcd6e08'),
(79, 2, '2024-05-21 15:21:54', 79, 'dom 1235412342', 'ca5b626b7a19f93cab5584a1ff36fad9'),
(80, 2, '2024-05-21 15:22:16', 80, '1234e3q424rwewerwer', '570bafbcfefdb19882b8ec9a413057ad'),
(81, 2, '2024-05-21 15:22:28', 81, 'werwerwerwr', '8c42dbb809a3c297f94e1306ce366da1'),
(82, 2, '2024-05-21 15:22:57', 82, 'dom 123 warszaw', '23b2bdbddc3af2046603115b2d751b54'),
(83, 2, '2024-05-21 15:25:30', 83, 'dom 123 warszaw', '5249635436287846508db7e7097a89d3'),
(84, 10, '2024-05-27 16:25:28', 84, 'dom 123 olga 2123', '19a5c3eea05e2cf9f135fee279a394fd'),
(85, 11, '2024-06-02 18:04:16', 85, 'kora 123 43-200 sa', 'd49f2612abd05e7a14828aecb142b85c'),
(86, 2, '2024-06-03 11:29:59', 86, 'dom 1231231313123', 'ff66d6a4cdeedf3d29fc26fb17fe688f'),
(87, 12, '2024-06-03 16:46:40', 87, 'pp dom 123 warszwa', '0b02bfeb43aa2ac4ff1e8c087ce462d6'),
(88, 13, '2024-06-03 17:03:24', 88, 'dom 123231312', '12def929cdc59231978de6d8270f81c9'),
(89, 14, '2024-06-04 10:05:23', 89, 'dom 1233213 wes', '0dd20977798e0ae25b7c100212b72fb4');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia_has_ksiazki`
--

CREATE TABLE `zamowienia_has_ksiazki` (
  `idZamowienia_has_ksiazki` int(11) NOT NULL,
  `zamowienia_idzamówienia` int(11) NOT NULL,
  `Ksiazki_idKsiazki` int(11) NOT NULL,
  `Ilosc_ksiazek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `zamowienia_has_ksiazki`
--

INSERT INTO `zamowienia_has_ksiazki` (`idZamowienia_has_ksiazki`, `zamowienia_idzamówienia`, `Ksiazki_idKsiazki`, `Ilosc_ksiazek`) VALUES
(122, 51, 19, 1),
(123, 51, 20, 12),
(124, 52, 21, 2),
(125, 52, 22, 44),
(126, 53, 23, 1),
(127, 54, 19, 1),
(128, 54, 20, 1),
(129, 54, 21, 1),
(130, 54, 22, 1),
(131, 54, 23, 1),
(132, 54, 24, 1),
(133, 54, 31, 1),
(134, 54, 32, 1),
(135, 54, 37, 1),
(136, 54, 39, 1),
(137, 55, 19, 1),
(138, 55, 21, 12),
(139, 56, 20, 1),
(140, 56, 24, 9),
(141, 57, 20, 1),
(142, 57, 24, 9),
(143, 58, 21, 1),
(144, 59, 34, 6),
(145, 60, 21, 13),
(146, 60, 37, 2),
(147, 61, 21, 13),
(148, 61, 37, 2),
(149, 62, 21, 13),
(150, 62, 37, 2),
(151, 63, 21, 13),
(152, 63, 37, 2),
(153, 64, 21, 13),
(154, 64, 37, 2),
(155, 65, 21, 13),
(156, 65, 37, 2),
(157, 66, 19, 1),
(158, 66, 20, 19),
(159, 67, 19, 1),
(160, 67, 20, 19),
(161, 68, 19, 1),
(162, 68, 20, 19),
(163, 69, 19, 1),
(164, 69, 20, 19),
(170, 75, 20, 1),
(171, 76, 20, 1),
(172, 77, 20, 1),
(173, 78, 19, 1),
(174, 79, 19, 1),
(175, 80, 19, 1),
(176, 81, 19, 1),
(177, 82, 20, 1),
(178, 83, 20, 1),
(179, 84, 19, 1),
(180, 84, 35, 1),
(181, 85, 19, 1),
(182, 86, 20, 1),
(183, 87, 19, 1),
(184, 87, 20, 2),
(185, 88, 20, 1),
(186, 89, 20, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `autor_ksiazki`
--
ALTER TABLE `autor_ksiazki`
  ADD PRIMARY KEY (`idAutor_Ksiazki`);

--
-- Indeksy dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD PRIMARY KEY (`idKsiazki`),
  ADD UNIQUE KEY `Tytul` (`Tytul`);

--
-- Indeksy dla tabeli `ksiazki_has_autor_ksiazki`
--
ALTER TABLE `ksiazki_has_autor_ksiazki`
  ADD PRIMARY KEY (`idKsiazki_has_Autor`),
  ADD KEY `fk_Ksiazki_has_Autor_Ksiazki_Autor_Ksiazki1_idx` (`Autor_Ksiazki_idAutor_Ksiazki`),
  ADD KEY `fk_Ksiazki_has_Autor_Ksiazki_Ksiazki1_idx` (`Ksiazki_idKsiazki`);

--
-- Indeksy dla tabeli `platnosci`
--
ALTER TABLE `platnosci`
  ADD PRIMARY KEY (`idPlatnosci`),
  ADD UNIQUE KEY `KodPlatnosci` (`KodPlatnosci`);

--
-- Indeksy dla tabeli `rola`
--
ALTER TABLE `rola`
  ADD PRIMARY KEY (`idRola`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`idUzytkownik`),
  ADD UNIQUE KEY `Email_UNIQUE` (`Email`);

--
-- Indeksy dla tabeli `uzytkownik_has_rola`
--
ALTER TABLE `uzytkownik_has_rola`
  ADD PRIMARY KEY (`idUzytkownik_has_Rola`),
  ADD KEY `fk_Uzytkownik_has_Rola_Uzytkownik1_idx` (`Uzytkownik_idUzytkownik`),
  ADD KEY `fk_Uzytkownik_has_Rola_Rola1_idx` (`Rola_idRola`);

--
-- Indeksy dla tabeli `wiadomosci`
--
ALTER TABLE `wiadomosci`
  ADD PRIMARY KEY (`idWiadomosci`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`idzamowienia`),
  ADD UNIQUE KEY `KodZamowienia` (`KodZamowienia`),
  ADD KEY `fk_zamówienia_Uzytkownik1_idx` (`Uzytkownik_idUzytkownik`),
  ADD KEY `fk_zamowienia_Platnosci1_idx` (`Platnosci_idPlatnosci`);

--
-- Indeksy dla tabeli `zamowienia_has_ksiazki`
--
ALTER TABLE `zamowienia_has_ksiazki`
  ADD PRIMARY KEY (`idZamowienia_has_ksiazki`),
  ADD KEY `fk_zamówienia_has_Ksiazki_zamówienia1_idx` (`zamowienia_idzamówienia`),
  ADD KEY `fk_zamówienia_has_Ksiazki_Ksiazki1_idx` (`Ksiazki_idKsiazki`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor_ksiazki`
--
ALTER TABLE `autor_ksiazki`
  MODIFY `idAutor_Ksiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ksiazki`
--
ALTER TABLE `ksiazki`
  MODIFY `idKsiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `ksiazki_has_autor_ksiazki`
--
ALTER TABLE `ksiazki_has_autor_ksiazki`
  MODIFY `idKsiazki_has_Autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `platnosci`
--
ALTER TABLE `platnosci`
  MODIFY `idPlatnosci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `rola`
--
ALTER TABLE `rola`
  MODIFY `idRola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `idUzytkownik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `uzytkownik_has_rola`
--
ALTER TABLE `uzytkownik_has_rola`
  MODIFY `idUzytkownik_has_Rola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `wiadomosci`
--
ALTER TABLE `wiadomosci`
  MODIFY `idWiadomosci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `idzamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `zamowienia_has_ksiazki`
--
ALTER TABLE `zamowienia_has_ksiazki`
  MODIFY `idZamowienia_has_ksiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ksiazki_has_autor_ksiazki`
--
ALTER TABLE `ksiazki_has_autor_ksiazki`
  ADD CONSTRAINT `fk_Ksiazki_has_Autor_Ksiazki_Autor_Ksiazki1` FOREIGN KEY (`Autor_Ksiazki_idAutor_Ksiazki`) REFERENCES `autor_ksiazki` (`idAutor_Ksiazki`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ksiazki_has_Autor_Ksiazki_Ksiazki1` FOREIGN KEY (`Ksiazki_idKsiazki`) REFERENCES `ksiazki` (`idKsiazki`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `uzytkownik_has_rola`
--
ALTER TABLE `uzytkownik_has_rola`
  ADD CONSTRAINT `fk_Uzytkownik_has_Rola_Rola1` FOREIGN KEY (`Rola_idRola`) REFERENCES `rola` (`idRola`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Uzytkownik_has_Rola_Uzytkownik1` FOREIGN KEY (`Uzytkownik_idUzytkownik`) REFERENCES `uzytkownik` (`idUzytkownik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `fk_zamowienia_Platnosci1` FOREIGN KEY (`Platnosci_idPlatnosci`) REFERENCES `platnosci` (`idPlatnosci`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_zamówienia_Uzytkownik1` FOREIGN KEY (`Uzytkownik_idUzytkownik`) REFERENCES `uzytkownik` (`idUzytkownik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `zamowienia_has_ksiazki`
--
ALTER TABLE `zamowienia_has_ksiazki`
  ADD CONSTRAINT `fk_zamówienia_has_Ksiazki_Ksiazki1` FOREIGN KEY (`Ksiazki_idKsiazki`) REFERENCES `ksiazki` (`idKsiazki`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_zamówienia_has_Ksiazki_zamówienia1` FOREIGN KEY (`zamowienia_idzamówienia`) REFERENCES `zamowienia` (`idzamowienia`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
