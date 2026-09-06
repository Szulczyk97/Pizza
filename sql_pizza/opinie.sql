-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 01, 2025 at 05:37 PM
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
-- Database: `pizzeria`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinie`
--

CREATE TABLE `opinie` (
  `id` int(11) NOT NULL,
  `autor` varchar(20) NOT NULL,
  `zawartosc` varchar(200) NOT NULL,
  `czas` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `opinie`
--

INSERT INTO `opinie` (`id`, `autor`, `zawartosc`, `czas`) VALUES
(1, 'Anna Oleśnicka', 'Kebab przeciętny, a sam sos bardzo słaby, bez wyrazu i zbyt wodnisty. Pizza uratowała zamówienie, ale do kebaba raczej nie wrócę.', '12:33,07.09.2025'),
(2, 'Markus7', 'Zajebista pizza, dobre tortille i bardzo miła obsługa. Z czystym sumieniem mogę polecić to miejsce każdemu!', '16:42,23.09.2025'),
(3, 'Anon-24', 'Pizza smakuje tragicznie, ale kebaby są nawet okej. Reszty dań nie próbowałem. Ogólnie dupy nie urywa, ale od biedy może być.', '09:06,11.10.2025'),
(4, 'Zośka304', 'Obsługa ma chyba wywalone na klientów, a czas oczekiwania to jakaś kpina. Jedzenie przyszło chłodne, choć kebab w sumie nie był najgorszy... Podsumowując bardzo przeciętnie.', '21:48,19.10.2025'),
(5, 'Piotrek_91', 'Naleśniki spoko, ciasto okej, ale nadzienia mogli dać więcej. Może być.', '14:20,24.10.2025');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `opinie`
--
ALTER TABLE `opinie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `opinie`
--
ALTER TABLE `opinie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
