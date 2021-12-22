-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 22 Des 2021 pada 04.12
-- Versi server: 5.7.33
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `phone_number`) VALUES
(33, 'Wahyu', 'Pribadi', 'wahyu@gmail.com', '081312304955'),
(34, 'Heihachi', 'Mishima', 'heihachi.mishima@mail.com', '081312495586'),
(36, 'Aziz', 'Andrean Sangaji', 'aziz.sangaji@gmail.com', '089867887566'),
(38, 'Bayu', 'Suhada', 'bayu.suhada@gmail.com', '081312495866'),
(39, 'John', 'Doe', 'john.doe@mail.com', '081312493844'),
(40, 'Sigit', 'Wahyudi', 'sgt.wahyudi@gmail.com', '0813124958555'),
(41, 'Prasetyo', 'Nugroho', 'prase@gmail.com', '0913124955849'),
(42, 'Syihabudin', 'Alawi', 'syialan@gmail.com', '081312493855'),
(43, 'Ilham', 'Fadhillah', 'hagurevx@gmail.com', '081312493844'),
(44, 'Dalgona', 'Coffee', 'dalgona.coffee@example.com', '081312493844');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
