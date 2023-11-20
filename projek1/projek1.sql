-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2023 pada 08.33
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `deskripsi_barang` text DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL,
  `tanggal_barang` date DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `deskripsi_barang`, `harga`, `tanggal_barang`, `stok`, `gambar`) VALUES
(1, 'Produk A', 'Deskripsi Produk A', 100.00, '2023-10-17', 50, '1.jpeg'),
(2, 'Produk B', 'Deskripsi Produk B', 150.00, '2023-10-18', 30, '1.jpeg'),
(3, 'Produk C', 'Deskripsi Produk C', 200.00, '2023-10-19', 20, '1.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `mobile` int(13) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `roleId` int(11) NOT NULL,
  `umur` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `email`, `jk`, `tgl_lahir`, `mobile`, `alamat`, `roleId`, `umur`, `jabatan`, `foto`) VALUES
(1, 'asas', 'rendyariesta0@gmail.com', 'laki-laki', '2023-11-01', 82323232, NULL, 20, 0, 'Pegawai', NULL),
(2, 'sdsd', 'rain123@gmail.com', 'cewek', '2023-11-01', 0, 'sdsdsdsd', 20, 21, 'sdsdsdsd', NULL),
(3, 'sdsd', 'rain123@gmail.com', 'cewek', '2023-11-01', 0, 'sdsdsdsd', 20, 21, '12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_pesanan`
--

CREATE TABLE `laporan_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_pesanan` date NOT NULL DEFAULT current_timestamp(),
  `status_pesanan` varchar(50) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan_pesanan`
--

INSERT INTO `laporan_pesanan` (`id_pesanan`, `jumlah`, `tanggal_pesanan`, `status_pesanan`, `id_users`, `id_barang`) VALUES
(1, 10, '2023-10-24', 'proses', 8, 1),
(2, 10, '2023-10-24', 'proses', 8, 3),
(3, 7, '2023-11-18', 'Sudah Dibayar', 8, 1),
(4, 10, '2023-11-18', 'Belum Bayar', 8, 1),
(5, 10, '2023-11-18', 'Belum Bayar', 8, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('admin','user','karyawan') NOT NULL,
  `ibu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_user`, `username`, `password`, `level`, `ibu`) VALUES
(1, 'admin1', 'vangke', 'admin', ''),
(17, 'rendy', '1203kd', 'user', 'milan'),
(20, 'asasa', 'asasa', 'karyawan', 'siti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pesanan`, `metode_pembayaran`, `total_harga`) VALUES
('0', 3, 'VA', 700);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `roleId` int(11) NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `jk`, `tgl_lahir`, `mobile`, `roleId`, `createAt`, `updateAt`) VALUES
(1, 'admin', 'admin@admin.com', 'laki-laki', '2023-11-01', '81287905057', 1, '2023-11-18 06:01:14', '2023-11-18 06:01:14'),
(8, 'Rendy Ariesta Chandra', 'rendyariesta0@gmail.com', 'laki-laki', '2002-04-03', '081289898989', 17, '2023-10-23 04:01:29', '2023-10-23 04:01:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `roleId` (`roleId`);

--
-- Indeks untuk tabel `laporan_pesanan`
--
ALTER TABLE `laporan_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roleId` (`roleId`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `laporan_pesanan`
--
ALTER TABLE `laporan_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `login` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laporan_pesanan`
--
ALTER TABLE `laporan_pesanan`
  ADD CONSTRAINT `laporan_pesanan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_pesanan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `laporan_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `login` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
