-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 26, 2024 at 12:44 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cybercentrum`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE `komentarze` (
  `id_komentarza` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `id_posta` int(11) NOT NULL,
  `tresc` varchar(2000) NOT NULL,
  `data_wstawienia` datetime DEFAULT current_timestamp(),
  `czy_usuniete` tinyint(1) DEFAULT 0,
  `kto_usunal` int(11) DEFAULT NULL,
  `data_usuniecia` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posty`
--

CREATE TABLE `posty` (
  `id_posta` int(11) NOT NULL,
  `tytul_posta` varchar(50) NOT NULL,
  `tresc` varchar(5000) DEFAULT NULL,
  `data_utworzenia` datetime DEFAULT current_timestamp(),
  `id_uzytkownika` int(11) NOT NULL,
  `czy_usuniete` tinyint(1) DEFAULT 0,
  `kto_usunal` int(11) DEFAULT NULL,
  `data_usuniecia` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `powiadomienia`
--

CREATE TABLE `powiadomienia` (
  `id_powiadomienia` int(11) NOT NULL,
  `temat` varchar(50) DEFAULT NULL,
  `tresc` text DEFAULT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `czy_odczytane` tinyint(1) DEFAULT 0,
  `autor_powiadomienia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `role`
--

CREATE TABLE `role` (
  `id_roli` int(11) NOT NULL,
  `nazwa_roli` varchar(50) NOT NULL,
  `czy_aktywna` tinyint(1) DEFAULT 1,
  `data_zaimplementowania` datetime DEFAULT NULL,
  `data_dezaktywacji` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `role_uzytkownikow`
--

CREATE TABLE `role_uzytkownikow` (
  `id` int(11) NOT NULL,
  `id_roli` int(11) NOT NULL,
  `id_uzytkownika` int(11) DEFAULT NULL,
  `data_nadania` datetime DEFAULT current_timestamp(),
  `data_odebrania` datetime DEFAULT NULL,
  `kto_nadal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_uzytkownika` int(11) NOT NULL,
  `nazwa_uzytkownika` varchar(50) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_rejestracji` datetime DEFAULT current_timestamp(),
  `o_mnie` varchar(255) DEFAULT NULL,
  `konto_aktywne` tinyint(1) NOT NULL DEFAULT 1,
  `data_dezaktywacji` datetime DEFAULT NULL,
  `kto_zarejestrowal` int(11) DEFAULT NULL,
  `rola` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zgloszenia`
--

CREATE TABLE `zgloszenia` (
  `id_zgloszenia` int(11) NOT NULL,
  `id_zglaszajacego` int(11) NOT NULL,
  `tresc_zgloszenia` varchar(2500) DEFAULT NULL,
  `data_zgloszenia` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD PRIMARY KEY (`id_komentarza`),
  ADD KEY `id_posta` (`id_posta`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`),
  ADD KEY `kto_usunal` (`kto_usunal`);

--
-- Indeksy dla tabeli `posty`
--
ALTER TABLE `posty`
  ADD PRIMARY KEY (`id_posta`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`),
  ADD KEY `kto_usunal` (`kto_usunal`);

--
-- Indeksy dla tabeli `powiadomienia`
--
ALTER TABLE `powiadomienia`
  ADD PRIMARY KEY (`id_powiadomienia`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`),
  ADD KEY `powiadomienia_ibfk_2` (`autor_powiadomienia`);

--
-- Indeksy dla tabeli `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_roli`);

--
-- Indeksy dla tabeli `role_uzytkownikow`
--
ALTER TABLE `role_uzytkownikow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`),
  ADD KEY `id_roli` (`id_roli`),
  ADD KEY `kto_nadal` (`kto_nadal`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id_uzytkownika`),
  ADD KEY `kto_zarejestrowal` (`kto_zarejestrowal`),
  ADD KEY `fk_rola` (`rola`);

--
-- Indeksy dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD PRIMARY KEY (`id_zgloszenia`),
  ADD KEY `id_zglaszajacego` (`id_zglaszajacego`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `id_komentarza` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posty`
--
ALTER TABLE `posty`
  MODIFY `id_posta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `powiadomienia`
--
ALTER TABLE `powiadomienia`
  MODIFY `id_powiadomienia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_roli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_uzytkownikow`
--
ALTER TABLE `role_uzytkownikow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zgloszenia`
--
ALTER TABLE `zgloszenia`
  MODIFY `id_zgloszenia` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentarze`
--
ALTER TABLE `komentarze`
  ADD CONSTRAINT `komentarze_ibfk_1` FOREIGN KEY (`id_posta`) REFERENCES `posty` (`id_posta`),
  ADD CONSTRAINT `komentarze_ibfk_2` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`),
  ADD CONSTRAINT `komentarze_ibfk_3` FOREIGN KEY (`kto_usunal`) REFERENCES `uzytkownicy` (`id_uzytkownika`);

--
-- Constraints for table `posty`
--
ALTER TABLE `posty`
  ADD CONSTRAINT `posty_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`),
  ADD CONSTRAINT `posty_ibfk_2` FOREIGN KEY (`kto_usunal`) REFERENCES `uzytkownicy` (`id_uzytkownika`);

--
-- Constraints for table `powiadomienia`
--
ALTER TABLE `powiadomienia`
  ADD CONSTRAINT `powiadomienia_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`),
  ADD CONSTRAINT `powiadomienia_ibfk_2` FOREIGN KEY (`autor_powiadomienia`) REFERENCES `uzytkownicy` (`id_uzytkownika`);

--
-- Constraints for table `role_uzytkownikow`
--
ALTER TABLE `role_uzytkownikow`
  ADD CONSTRAINT `role_uzytkownikow_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`),
  ADD CONSTRAINT `role_uzytkownikow_ibfk_2` FOREIGN KEY (`id_roli`) REFERENCES `role` (`id_roli`),
  ADD CONSTRAINT `role_uzytkownikow_ibfk_3` FOREIGN KEY (`kto_nadal`) REFERENCES `uzytkownicy` (`id_uzytkownika`);

--
-- Constraints for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD CONSTRAINT `fk_rola` FOREIGN KEY (`rola`) REFERENCES `role` (`id_roli`),
  ADD CONSTRAINT `uzytkownicy_ibfk_1` FOREIGN KEY (`kto_zarejestrowal`) REFERENCES `uzytkownicy` (`id_uzytkownika`);

--
-- Constraints for table `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD CONSTRAINT `zgloszenia_ibfk_1` FOREIGN KEY (`id_zglaszajacego`) REFERENCES `uzytkownicy` (`id_uzytkownika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
