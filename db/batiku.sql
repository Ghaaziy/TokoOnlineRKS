-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2021 pada 03.10
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batiku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `idAdmin` varchar(11) NOT NULL,
  `namaAdmin` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_admin`
--

INSERT INTO `tabel_admin` (`idAdmin`, `namaAdmin`, `email`, `password`) VALUES
('1', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kategori`
--

CREATE TABLE `tabel_kategori` (
  `idKategori` int(11) NOT NULL,
  `namaKategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_kategori`
--

INSERT INTO `tabel_kategori` (`idKategori`, `namaKategori`) VALUES
(1, 'novel'),
(2, 'cerpen'),
(3, 'cernak'),
(4, 'sejarah'),
(5, 'pelajaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_keranjang`
--

CREATE TABLE `tabel_keranjang` (
  `idKeranjang` varchar(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idProduk` varchar(11) NOT NULL,
  `namaProduk` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_komentar`
--

CREATE TABLE `tabel_komentar` (
  `idKomen` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_produk`
--

CREATE TABLE `tabel_produk` (
  `idProduk` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `keterangan` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_produk`
--

INSERT INTO `tabel_produk` (`idProduk`, `nama`, `gambar`, `keterangan`, `kategori`, `harga`, `stock`, `path`) VALUES
(21, 'Mariposa', '13', 'Cerita Glen Anggara adalah sebuah novel Indonesia karangan Luluk HF. Novel tersebut merupakan sempalan dari novel Mariposa. Novel tersebut direncanakan bakal diadaptasi ke dalam bentuk film bernama sama.', 'novel', 55000, 9, 'image/13.jpg'),
(33, 'Ayat-ayat Cinta', 'c391611ad97fa8a39fac7ba4777492bd', 'Ini adalah kisah cinta. Tapi bukan cuma sekadar kisah cinta yang biasa. Ini tentang bagaimana menghadapi turun-naiknya persoalan hidup dengan cara Islam. Fahri bin Abdillah adalah pelajar Indonesia yang berusaha menggapai gelar masternya di Al-Azhar. Berjibaku dengan panas-debu Mesir.', 'novel', 60000, 10, 'image/c391611ad97fa8a39fac7ba4777492bd.jpg'),
(34, 'I Want to Eat Your Pancreas', '9776a98810c049663b4c89e6331e7a06', 'A high school boy finds the diary of his classmate—only to discover that she’s dying. Yamauchi Sakura has been silently suffering from a pancreatic disease, and now exactly one person outside her family knows. He swears to her that he won’t tell anyone what he learned, ', 'novel', 45000, 5, 'image/9776a98810c049663b4c89e6331e7a06.jpg'),
(35, 'Cinta Itu Apaan', 'f85cb6480d00749d3c6e08e46fe2c46b', 'sebuah antologi cerpen keumpulan dari karya keren lomba cerpen yang diadakan BAKBUK.ID beberapa waktu yang lalu. Part 1 ini kita akan diajak berpetualang mengenal cinta dari berbagai sudut pandang. Bahkan cinta terhadap kematian, penasaran?', 'cerpen', 50000, 10, 'image/f85cb6480d00749d3c6e08e46fe2c46b.jpg'),
(36, 'Perempuan, Cinta, dan Kehidupan', '6fd6c42a2d626ae766510f09c12003f8', 'Perempuan, Cinta dan Kehidupan: Kumpulan Cerpen Indonesia – Malaysia merupakan sekumpulan cerpen dari dua negara yang terdiri dari 10 penulis cerpen Indonesia dan 10 cerpen penulis Malaysia, yang dikemas indah menjadi satu buku.\r\n\r\nSetiap cinta yang disajikan berisi tema, nilai, budaya, rasa, dan permasalahan berbeda-beda yang membuat pembaca berimajinasi membayangkan setiap jalan cerita indah dan unik di dalamnya.', 'cerpen', 55000, 9, 'image/6fd6c42a2d626ae766510f09c12003f8.jpg'),
(37, 'jejak Hitler di Nusantara', '86ab75cada15b8f8fec7a54bf22cb8f5', 'Bagaimana bisa sebuah permakaman militer Jerman dibangun di Cikopo? Mengapa ada U-boat yang karam di perairan Indonesia? Benarkah Hitler datang dengan U-boat ke Indonesia dan meninggal di Surabaya? Apakah Hitler memasok senjata bagi pejuang kemerdekaan kita? Siapa orang Indonesia yang bertugas dalam tentara Nazi?', 'sejarah', 60000, 10, 'image/86ab75cada15b8f8fec7a54bf22cb8f5.jpg'),
(38, 'Matematika', 'f19638fb2a9a851d99bf08638f27de4b', 'jual Buku TRIK CERDAS BANK SOAL MATEMATIKA kls 10,11,12 SMA/MA BARU YA', 'pelajaran', 40000, 20, 'image/f19638fb2a9a851d99bf08638f27de4b.jpg'),
(40, 'Ilmu Pengetahuan Alam', 'bf372f925b0b7c59f98ce775c3f5b0c9', 'Memuat segala hal tentang Ilmu pengetahuan Alam', 'pelajaran', 50000, 15, 'image/bf372f925b0b7c59f98ce775c3f5b0c9.jpg'),
(41, 'Imagine', 'a219ddf4262163cb89d9bb4f6cff6a41', 'Kumpulan dari cerpen cerpen', 'cernak', 45000, 10, 'image/a219ddf4262163cb89d9bb4f6cff6a41.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_transaksi`
--

CREATE TABLE `tabel_transaksi` (
  `idTransaksi` int(11) NOT NULL,
  `idUser` varchar(11) NOT NULL,
  `daftarBarang` text NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_transaksi`
--

INSERT INTO `tabel_transaksi` (`idTransaksi`, `idUser`, `daftarBarang`, `tanggal`, `total`) VALUES
(3, '1', '0', '0000-00-00', 2623000),
(4, '1', '0', '2017-06-07', 123000),
(5, '1', '0', '2017-06-07', 100000),
(7, '6', 'Mariposa, Kategori : novel, Jumlah : 1<br>', '2021-01-22', 55000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_trolly`
--

CREATE TABLE `tabel_trolly` (
  `idTrolly` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idProduk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_trolly`
--

INSERT INTO `tabel_trolly` (`idTrolly`, `idUser`, `idProduk`, `jumlah`, `harga`) VALUES
(1, 4, 28, 1, 205000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `idUser` int(11) NOT NULL,
  `namaUser` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`idUser`, `namaUser`, `email`, `password`, `alamat`, `telpon`) VALUES
(6, 'satrio', 'satrio@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'bengkulu', '082210191715');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indeks untuk tabel `tabel_kategori`
--
ALTER TABLE `tabel_kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indeks untuk tabel `tabel_keranjang`
--
ALTER TABLE `tabel_keranjang`
  ADD PRIMARY KEY (`idKeranjang`);

--
-- Indeks untuk tabel `tabel_komentar`
--
ALTER TABLE `tabel_komentar`
  ADD PRIMARY KEY (`idKomen`);

--
-- Indeks untuk tabel `tabel_produk`
--
ALTER TABLE `tabel_produk`
  ADD PRIMARY KEY (`idProduk`);

--
-- Indeks untuk tabel `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- Indeks untuk tabel `tabel_trolly`
--
ALTER TABLE `tabel_trolly`
  ADD PRIMARY KEY (`idTrolly`);

--
-- Indeks untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_komentar`
--
ALTER TABLE `tabel_komentar`
  MODIFY `idKomen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tabel_produk`
--
ALTER TABLE `tabel_produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tabel_trolly`
--
ALTER TABLE `tabel_trolly`
  MODIFY `idTrolly` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
