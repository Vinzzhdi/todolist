-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Jun 2025 pada 19.41
-- Versi server: 8.0.30
-- Versi PHP: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii_todolist`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `task`
--

CREATE TABLE `task` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `nama_tugas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `deadline` datetime DEFAULT NULL,
  `is_selesai` tinyint(1) DEFAULT '0',
  `guru_pengampu` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `checklist_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `task`
--

INSERT INTO `task` (`id`, `user_id`, `nama_tugas`, `deskripsi`, `deadline`, `is_selesai`, `guru_pengampu`, `checklist_at`) VALUES
(1, 1, 'Todolist ', 'deadline hari senin', '2025-06-14 00:00:00', 1, 'Bu Dinda', NULL),
(3, 1, 'Todolist ', 'todolist flutter', '2025-06-14 00:00:00', 1, 'Bu Rosy', NULL),
(4, 1, 'Belajar midlane', 'zhask', '2025-07-05 00:00:00', 1, 'Pak Haris', NULL),
(5, 1, 'Belajar ps', 'belajar bermain ps', '2025-06-14 00:00:00', 1, 'Pak Rizqi', NULL),
(6, 1, 'Belajar ps', 'adawdda', '2025-06-25 00:00:00', 1, 'Pak Haris', NULL),
(7, 1, 'Belajar midlane', 'adadda', '2025-06-15 00:00:00', 1, 'Bu Dinda', '2025-06-16 02:48:43'),
(8, 2, 'Flutter', 'Todolist + Kalkulator', '2025-06-14 00:00:00', 0, 'Bu Rosy', NULL),
(9, 4, 'tugas1', 'tugas1', '2025-06-20 00:00:00', 0, 'Bu Reny', NULL),
(10, 4, 'tugas2', 'tugas', '2025-06-19 00:00:00', 1, 'Pak Rusdi', NULL),
(11, 4, 'Flutter', 'flutter 1', '2025-06-18 00:00:00', 1, 'Pak Rizqi', '2025-06-16 02:12:18'),
(12, 4, 'tugas 3', 'kata1', '2025-06-17 00:00:00', 1, 'Bu Dinda', '2025-06-16 02:08:43'),
(13, 4, 'todolist ', 'todolist1', '2025-06-16 00:00:00', 1, 'Bu Rosy', '2025-06-16 03:01:01'),
(14, 1, 'Todolist ', 'ada tugas', '2025-06-16 00:00:00', 1, 'Bu Dinda', '2025-06-16 02:51:00'),
(16, 1, 'Belajar ps', 'ps 2', '2025-06-30 00:00:00', 0, 'Pak Rizqi', NULL),
(17, 1, 'hadroh', 'katakata', '2025-06-23 00:00:00', 1, 'Pak Rusdi', '2025-06-16 02:56:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'Hidayat', 'tatul123'),
(2, 'Ridwan', 'kamil123'),
(3, 'Dimas', 'simsum123'),
(4, 'dinda', '111111');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `task`
--
ALTER TABLE `task`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
