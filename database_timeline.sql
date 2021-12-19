-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Des 2021 pada 13.58
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_timeline`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` varchar(10) NOT NULL,
  `USERNAME` varchar(128) DEFAULT NULL,
  `PASSWORD` mediumtext DEFAULT NULL,
  `LAST_LOGIN` varchar(40) DEFAULT NULL,
  `JABATAN` varchar(15) DEFAULT NULL,
  `FULLNAME` varchar(128) DEFAULT NULL,
  `JENKEL` varchar(10) DEFAULT NULL,
  `NO_TELP` varchar(20) DEFAULT NULL,
  `ALAMAT` mediumtext DEFAULT NULL,
  `PHOTO` mediumtext DEFAULT NULL,
  `DTE_CREATED` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `USERNAME`, `PASSWORD`, `LAST_LOGIN`, `JABATAN`, `FULLNAME`, `JENKEL`, `NO_TELP`, `ALAMAT`, `PHOTO`, `DTE_CREATED`) VALUES
('AD001', 'Admin', '202cb962ac59075b964b07152d234b70', '01-12-2021 03:20:38', 'Direktur', 'Admin', 'Laki-laki', '0882', 'jonggol', 'oppa.jpg', '2021-11-17'),
('AD002', 'Robbi', '9c73eab551e651a17ff4a452ebddcdee', NULL, 'Direktur', 'Robbi Hably Minassholihyn', NULL, NULL, NULL, 'default.png', '2021-11-24'),
('AD003', 'David', '464e07afc9e46359fb480839150595c5', NULL, 'Admin', 'David Surya Effendi', NULL, NULL, NULL, 'default.png', '2021-11-24'),
('AD004', 'Dharul', '3500820721ec8f8c49a13a303f71ccb2', NULL, 'Supervisor', 'Adharul Isyraq Hakam', NULL, NULL, NULL, 'default.png', '2021-11-24'),
('AD005', 'Ade', '4b30d9300100025b97ddd0585eb06fdc', NULL, 'Admin', 'Ade Windu Kencana', NULL, NULL, NULL, 'default.png', '2021-11-24'),
('AD006', 'Dea', '88c0662af754142eeca06c35d2d19d37', '01-12-2021 03:06:35', 'Karyawan', 'Dea Amanda', NULL, NULL, NULL, 'default.png', '2021-11-24'),
('AD007', 'Jaka', '6fe30b43639255f4af25fb07f21fc34e', NULL, 'Admin', 'Jaka', NULL, NULL, NULL, 'default.png', '2021-11-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_proyek`
--

CREATE TABLE `anggota_proyek` (
  `ID_AP` varchar(11) NOT NULL,
  `FULLNAME` varchar(120) NOT NULL,
  `ID_PROYEK` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota_proyek`
--

INSERT INTO `anggota_proyek` (`ID_AP`, `FULLNAME`, `ID_PROYEK`) VALUES
('AP000009', 'Adharul Isyraq Hakam', 'PY0002'),
('AP000016', 'Adharul Isyraq Hakam', 'PY0004'),
('AP000017', 'Robbi Hably Minassholihyn', 'PY0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_mingguan`
--

CREATE TABLE `laporan_mingguan` (
  `ID_LAPORAN` varchar(15) NOT NULL,
  `ID_PROYEK` varchar(11) NOT NULL,
  `TANGGAL` date NOT NULL,
  `FILE_LAPORAN` varchar(255) NOT NULL,
  `KENDALA` text NOT NULL,
  `CATATAN` text NOT NULL,
  `STATUS` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan_mingguan`
--

INSERT INTO `laporan_mingguan` (`ID_LAPORAN`, `ID_PROYEK`, `TANGGAL`, `FILE_LAPORAN`, `KENDALA`, `CATATAN`, `STATUS`, `created_at`) VALUES
('LPM000006', 'PY0003', '2021-11-24', 'Contoh_laporan_iconplus23.docx', 'Tidak ada', 'Tidak ada', 'Selesai', '2021-11-30 10:39:36'),
('LPM000008', 'PY0001', '2021-11-04', 'Contoh_laporan_iconplus25.docx', 'Ada', 'Ada', 'Dalam Pekerjaan', '2021-11-30 10:38:01'),
('LPM000009', 'PY0001', '2021-11-19', 'Contoh_laporan_iconplus26.docx', '-', '-', 'Belum Dimulai', '2021-11-30 11:38:04'),
('LPM000010', 'PY0003', '2021-11-11', 'Contoh_laporan_iconplus27.docx', '-', '-', 'Dalam Pekerjaan', '2021-11-30 11:38:27'),
('LPM000011', 'PY0002', '2021-11-18', 'Contoh_laporan_iconplus28.docx', '-', '-', 'Belum Dimulai', '2021-11-30 11:42:39'),
('LPM000012', 'PY0004', '2021-11-30', 'Contoh_laporan_iconplus29.docx', '-', '-', 'Belum Dimulai', '2021-11-30 12:43:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoring`
--

CREATE TABLE `monitoring` (
  `NO_MONITORING` varchar(11) NOT NULL,
  `ID_PROYEK` varchar(11) NOT NULL,
  `TANGGAL` date NOT NULL,
  `PROGRES` int(11) NOT NULL,
  `DANA_TURUN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `monitoring`
--

INSERT INTO `monitoring` (`NO_MONITORING`, `ID_PROYEK`, `TANGGAL`, `PROGRES`, `DANA_TURUN`) VALUES
('NMTR000001', 'PY0003', '2021-11-18', 90, 44000000),
('NMTR000002', 'PY0002', '2021-11-10', 50, 30000000),
('NMTR000003', 'PY0004', '2021-11-20', 100, 22000000),
('NMTR000004', 'PY0001', '2021-11-10', 100, 52000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `ID_PROGRAM` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `NO_SURAT` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `PERIHAL` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `TGL_SURAT` date DEFAULT NULL,
  `NAMA_PROGRAM` varchar(128) CHARACTER SET utf8mb4 DEFAULT NULL,
  `DIVISI` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `PEMBERI_KERJA` varchar(128) CHARACTER SET utf8mb4 DEFAULT NULL,
  `KATEGORI` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `TGL_SELESAI` date DEFAULT NULL,
  `DOKUMEN` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`ID_PROGRAM`, `NO_SURAT`, `PERIHAL`, `TGL_SURAT`, `NAMA_PROGRAM`, `DIVISI`, `PEMBERI_KERJA`, `KATEGORI`, `TGL_SELESAI`, `DOKUMEN`) VALUES
('P00001', 'N/001/P-2021', '-', '2021-11-24', 'Pemasangan Kabel Jaringan', 'Divisi Jaringan', 'Direksi', 'KPI Korporat', '2021-12-04', 'Contoh_laporan_iconplus5.docx'),
('P00002', 'N/002/P-2021', '-', '2021-11-25', 'Pengadaan jaringan listrik', 'Divisi Kelistrikan', 'PLN Pusat', 'KPI Korporat', '2021-11-25', 'Contoh_laporan_iconplus6.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `ID_PROYEK` varchar(11) NOT NULL,
  `PIC` varchar(128) NOT NULL,
  `TGL_AWAL` date NOT NULL,
  `TGL_AKHIR` date NOT NULL,
  `DURASI` int(11) NOT NULL,
  `ID_PROGRAM` varchar(15) NOT NULL,
  `NAMA_PROYEK` text NOT NULL,
  `ANGGARAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`ID_PROYEK`, `PIC`, `TGL_AWAL`, `TGL_AKHIR`, `DURASI`, `ID_PROGRAM`, `NAMA_PROYEK`, `ANGGARAN`) VALUES
('PY0001', 'GM', '2021-11-09', '2021-11-17', 5, 'P00002', 'Pemasangan kabel jaringan jakarta utara', 60000000),
('PY0002', 'GM', '2021-11-24', '2021-11-26', 22, 'P00002', 'Pemasangan kabel jaringan 1', 50000000),
('PY0003', 'GN', '2021-11-17', '2021-11-26', 30, 'P00002', 'Pengadaan jaringan listrik daerah A', 45000000),
('PY0004', 'GM', '2021-11-18', '2021-11-30', 22, 'P00001', 'Pengadaan jaringan internet daerah sentul', 20000000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indeks untuk tabel `anggota_proyek`
--
ALTER TABLE `anggota_proyek`
  ADD PRIMARY KEY (`ID_AP`),
  ADD KEY `idproyek_proyek_anggotaproyek` (`ID_PROYEK`);

--
-- Indeks untuk tabel `laporan_mingguan`
--
ALTER TABLE `laporan_mingguan`
  ADD PRIMARY KEY (`ID_LAPORAN`),
  ADD KEY `laporanmingguan_idproyek` (`ID_PROYEK`);

--
-- Indeks untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`NO_MONITORING`),
  ADD KEY `idproyek_proyek_monitoring` (`ID_PROYEK`);

--
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`ID_PROGRAM`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`ID_PROYEK`),
  ADD KEY `idprogram_proyek_program` (`ID_PROGRAM`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota_proyek`
--
ALTER TABLE `anggota_proyek`
  ADD CONSTRAINT `idproyek_proyek_anggotaproyek` FOREIGN KEY (`ID_PROYEK`) REFERENCES `proyek` (`ID_PROYEK`);

--
-- Ketidakleluasaan untuk tabel `laporan_mingguan`
--
ALTER TABLE `laporan_mingguan`
  ADD CONSTRAINT `laporanmingguan_idproyek` FOREIGN KEY (`ID_PROYEK`) REFERENCES `proyek` (`ID_PROYEK`);

--
-- Ketidakleluasaan untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  ADD CONSTRAINT `idproyek_proyek_monitoring` FOREIGN KEY (`ID_PROYEK`) REFERENCES `proyek` (`ID_PROYEK`);

--
-- Ketidakleluasaan untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `idprogram_proyek_program` FOREIGN KEY (`ID_PROGRAM`) REFERENCES `program` (`ID_PROGRAM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
