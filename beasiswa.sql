-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2019 at 05:29 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `level` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `aspek_bmb`
--

CREATE TABLE `aspek_bmb` (
  `id_aspek` double NOT NULL,
  `nama_aspek` varchar(15) NOT NULL,
  `persentase` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aspek_bmb`
--

INSERT INTO `aspek_bmb` (`id_aspek`, `nama_aspek`, `persentase`) VALUES
(5, 'Akademik', 75),
(7, 'Ekstrakurikuler', 25);

-- --------------------------------------------------------

--
-- Table structure for table `aspek_bmm`
--

CREATE TABLE `aspek_bmm` (
  `id_aspek` double NOT NULL,
  `nama_aspek` varchar(15) NOT NULL,
  `persentase` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aspek_bmm`
--

INSERT INTO `aspek_bmm` (`id_aspek`, `nama_aspek`, `persentase`) VALUES
(9, 'Akademik', 20),
(10, 'Finansial', 80);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `headline` enum('Y','N') COLLATE latin1_general_ci DEFAULT NULL,
  `isi_berita` text COLLATE latin1_general_ci,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `username`, `judul`, `judul_seo`, `headline`, `isi_berita`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`) VALUES
(694, 0, '', 'BEASISWA MAHASISWA BERPRESTASI', 'beasiswa-mahasiswa-berprestasi', 'Y', '<p><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><span style="text-decoration: underline;">Syarat-syarat untuk Permohonan Beasiswa Mahasiswa Berprestasi</span>:</span></strong></p>\r\n<p><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp;</span></strong></p>\r\n<p><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">1) Scan Kartu Keluarga (KK) dan foto copy Elektronik Kartu Tanda Penduduk (EKTP)</span></strong></p>\r\n<p><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">2) Memiliki IPK minimal 3.25</span></strong></p>\r\n<p><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">3) Scan Surat pernyataan tidak sedang menerima Beasiswa atau Bantuan Biaya Pendidikan dari Anggaran Pendapatan dan belanja Negara (APBN) atau Anggaran Pendapatan dan Belanja Daerah (APBD)</span></strong></p>\r\n<p><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">4) Scan Kartu Mahasiswa</span></strong></p>\r\n<p><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">5) Minimal berada di semester 3</span></strong></p>\r\n<p><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">6) Scan Surat keterangan masih aktif kuliah dari kampus</span></strong></p>\r\n<p><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">7) Scan Transkrip Nilai</span></strong></p>\r\n<p><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">8) Scan rekening Bank atas nama Mahasiswa</span></strong></p>\r\n<p><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">9) Foto warna ukuran 3 x 4 cm 2 lbr</span></strong></p>\r\n<p><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">10) Scan Kartu Keterangan Aktif Organisasi jika ada</span></strong></p>\r\n<p><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">11) Scan Sertifikat Prestasi jika ada</span></strong></p>\r\n<p><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">&nbsp;</span></strong></p>\r\n<p><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">NB: Kumpulan Scan dilampirkan dalam 1 file rar</span></strong></p>', '', '0000-00-00', '00:00:00', '', 1, ''),
(145, 0, 'admin', 'HOME', 'home', 'Y', '<blockquote>\r\n<p style="text-align: justify;"><span style="font-size: small; font-family: georgia,palatino; color: #000000;">&nbsp;</span></p>\r\n<p><span><img src="../images/gedung.jpg" alt="" width="100%" /><br /></span></p>\r\n<p style="text-align: justify;">&nbsp;</p>\r\n<hr /><hr />\r\n<p style="text-align: justify;"><span style="font-size: small; font-family: georgia,palatino; color: #000000;">&nbsp;</span></p>\r\n<p style="text-align: justify;"><span style="font-size: small; font-family: georgia,palatino; color: #000000;">Politeknik Kesehatan Jambi merupakan institusi pendidikan tenaga kesehatan di Provinsi Jambi, berdiri berdasarkan surat keputusan Menteri Pendidikan Nasional No. 59123/MPN/2000 dan Surat Keputusan Menteri Kesehatan No. 298/Menkes/SK/IV/2001, Tanggal 16 April 2001. Poltekkes Jambi merupakan peleburan dari 4 (empat) institusi pendidikan bidang kesehatan yang berkedudukan di Kota Jambi yaitu Pendidikan Ahli Madya Keperawatan, Akademi Kebidanan Depkes, Akademi Kesehatan Gigi Depkes dan Akademi Kesehatan Lingkungan Depkes.<br /></span></p>\r\n<p style="text-align: justify;"><span style="font-size: small; font-family: georgia,palatino; color: #000000;">Politeknik Kesehatan Jambi memiliki program pemberian beasiswa kepada mahasiswanya dari Pemerintah Daerah. Jenis beasiswa ini ada 2 yaitu Bantuan Mahasiswa Miskin dan Beasiswa Mahasiswa Berprestasi.</span></p>\r\n</blockquote>', 'Kamis', '2014-11-13', '09:43:46', '', 498, ''),
(683, 0, '', 'KONTAK', 'kontak', 'Y', '<div class="foot_contact">\r\n<h2><span style="font-family: arial, helvetica, sans-serif;">POLITEKNIK KESEHATAN JAMBI</span></h2>\r\n<address><span style="font-family: arial, helvetica, sans-serif; font-size: small;">Jalan Haji Agus Salim</span><br /><span style="font-family: arial, helvetica, sans-serif; font-size: small;">No. 09, Paal Lima, Kota Baru</span><br /><span style="font-family: arial, helvetica, sans-serif; font-size: small;">Jambi, 36129</span></address>\r\n<ul>\r\n<li><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>Tel:</strong>&nbsp;0741-445 450</span></li>\r\n<li class="last"><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><strong>Email:</strong>&nbsp;&nbsp;<a href="../permohonan/kontak">poltekk_jambi@yahoo.com</a></span></li>\r\n</ul>\r\n</div>', '', '0000-00-00', '00:00:00', '', 1, ''),
(148, 0, 'admin', 'PENGUMUMAN', 'pengumuman', 'Y', '<p><strong>Pendaftaran BMM ( Bantuan Mahasiswa Miskin) Dibuka hingga 24 Maret 2018</strong></p>\r\n<p><strong><strong>Pendaftaran BMB ( Beasiswa Mahasiswa Berprestasi) Dibuka hingga 17 Maret 2018</strong></strong></p>\r\n<p>Mahasiswa dapat mendaftar langsung melalui akun masing-masing. Jika anda belum mempunyai akun, harap register terlebih dahulu. Harap melengkapi semua syarat yang telah ditentukan</p>', 'Kamis', '2014-11-13', '09:41:38', '', 223, ''),
(691, 0, '', 'BANTUAN MAHASISWA MISKIN', 'bantuan-mahasiswa-miskin', 'Y', '<h5><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><span style="text-decoration: underline;">Syarat-syarat untuk Permohonan Bantuan Mahasiswa Miskin</span>:</span></strong></h5>\r\n<p><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">1) Scan Kartu Keluarga (KK) dan foto copy Elektronik Kartu Tanda Penduduk (EKTP)</span></strong><br /><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">2) Memiliki IPK minimal 2,75</span></strong><br /><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">3) Scan Surat pernyataan tidak sedang menerima Beasiswa atau Bantuan Biaya Pendidikan dari Anggaran Pendapatan dan belanja Negara (APBN) atau Anggaran Pendapatan dan Belanja Daerah (APBD)</span></strong><br /><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">4) Scan Kartu Mahasiswa</span></strong><br /><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">5) Minimal berada di semester 3</span></strong><br /><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">6) Scan Surat keterangan masih aktif kuliah dari kampus</span></strong><br /><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">7) Scan Transkrip Nilai</span></strong><br /><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">8) Scan rekening Bank atas nama Mahasiswa</span></strong><br /><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">9) Foto warna ukuran 3 x 4 cm 2 lbr</span></strong><br /><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">10) Scan Kartu Keluarga Sejahtera (KKS) jika ada</span></strong><br /><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">11) Surat Keterangan Kurang Mampu dari Kepala Desa atau Lurah</span></strong><br /><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">12) Scan pembayaran PBB</span></strong><br /><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">13) Scan slip gaji orangtua</span></strong><br /><br /><strong><span style="font-family: arial, helvetica, sans-serif; font-size: medium;">NB: Kumpulan Scan dilampirkan dalam 1 file rar</span></strong></p>', '', '0000-00-00', '00:00:00', '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `selisih` double NOT NULL,
  `nilai` double NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`selisih`, `nilai`, `keterangan`) VALUES
(-4, 1, 'Kompetensi individu kurang 4 tingkat / level'),
(-3, 2, 'Kompetensi individu kurang 3 tingkat / level'),
(-2, 3, 'Kompetensi individu kurang 2 tingkat / level'),
(-1, 4, 'Kompetensi individu kurang 1 tingkat / level'),
(0, 5, 'Kompetensi sesuai dengan yang dibutuhkan'),
(1, 4.5, 'Kompetensi individu kelebihan 1 tingkat / level'),
(2, 3.5, 'Kompetensi individu kelebihan 2 tingkat / level'),
(3, 2.5, 'Kompetensi individu kelebihan 3 tingkat / level'),
(4, 1.5, 'Kompetensi individu kelebihan 4 tingkat / level');

-- --------------------------------------------------------

--
-- Table structure for table `factor`
--

CREATE TABLE `factor` (
  `id_factor` int(1) NOT NULL,
  `nama_factor` varchar(16) NOT NULL,
  `persentase` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factor`
--

INSERT INTO `factor` (`id_factor`, `nama_factor`, `persentase`) VALUES
(1, 'Core Factor', 60),
(2, 'Secondary Factor', 40);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_bmb`
--

CREATE TABLE `kriteria_bmb` (
  `no` int(1) NOT NULL,
  `nama_aspek` varchar(15) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `factor` enum('Core','Secondary') NOT NULL,
  `profil_target` int(1) NOT NULL,
  `jenis` enum('','Ada Rentang','Tidak Ada Rentang','') NOT NULL,
  `subkriteria` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_bmb`
--

INSERT INTO `kriteria_bmb` (`no`, `nama_aspek`, `nama_kriteria`, `factor`, `profil_target`, `jenis`, `subkriteria`) VALUES
(0, 'Akademik', 'IPK', 'Core', 5, 'Ada Rentang', 5),
(0, 'Ekstrakurikuler', 'Organisasi', 'Core', 5, 'Tidak Ada Rentang', 2),
(0, 'Ekstrakurikuler', 'Prestasi Non-Akademik', 'Secondary', 5, 'Tidak Ada Rentang', 2),
(0, 'Akademik', 'Semester', 'Secondary', 3, 'Tidak Ada Rentang', 5);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_bmm`
--

CREATE TABLE `kriteria_bmm` (
  `no` int(11) NOT NULL,
  `nama_aspek` varchar(15) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `factor` enum('Core','Secondary') NOT NULL,
  `profil_target` int(1) NOT NULL,
  `jenis` enum('','Ada Rentang','Tidak Ada Rentang','') NOT NULL,
  `subkriteria` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_bmm`
--

INSERT INTO `kriteria_bmm` (`no`, `nama_aspek`, `nama_kriteria`, `factor`, `profil_target`, `jenis`, `subkriteria`) VALUES
(1, 'Akademik', 'IPK', 'Core', 2, 'Ada Rentang', 5),
(6, 'Finansial', 'Jenis Tinggal', 'Secondary', 5, 'Tidak Ada Rentang', 5),
(4, 'Finansial', 'Jumlah Tanggungan', 'Core', 2, 'Tidak Ada Rentang', 3),
(3, 'Finansial', 'Penghasilan Orang Tua', 'Core', 4, 'Ada Rentang', 5),
(2, 'Akademik', 'Semester', 'Secondary', 3, 'Tidak Ada Rentang', 5),
(5, 'Finansial', 'Status Anak', 'Core', 3, 'Tidak Ada Rentang', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_bmb`
--

CREATE TABLE `mahasiswa_bmb` (
  `nama_mhs` varchar(50) NOT NULL,
  `nim` char(10) NOT NULL,
  `tempat_ttl` varchar(20) NOT NULL,
  `tanggal_ttl` date NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `prodi` enum('DIII Keperawatan','DIII Kebidanan','DIII Kesehatan Lingkungan','DIII Keperawatan Gigi','DIV Keperawatan','DIV Kebidanan','DIV Keperawatan Gigi') DEFAULT NULL,
  `vektor` int(11) NOT NULL,
  `ipk` double NOT NULL,
  `semester` varchar(2) NOT NULL,
  `no_hp_mhs` char(12) NOT NULL,
  `alamat_mhs` varchar(50) NOT NULL,
  `organisasi` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `prestasi` enum('Ada','Tidak Ada','') DEFAULT NULL,
  `nama_orangtua` varchar(25) NOT NULL,
  `alamat_orangtua` varchar(50) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `no_hp_orangtua` char(12) NOT NULL,
  `preferensi` double NOT NULL,
  `status` enum('Gagal BMB','Lulus BMB','','') NOT NULL,
  `berkas1` varchar(500) NOT NULL,
  `ktm2` varchar(500) NOT NULL,
  `aktifkuliah2` varchar(500) NOT NULL,
  `transkrip2` varchar(500) NOT NULL,
  `ktp2` varchar(500) NOT NULL,
  `aktiforganisasi` varchar(500) NOT NULL,
  `sertifikat` varchar(500) NOT NULL,
  `pasfoto2` varchar(500) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa_bmb`
--

INSERT INTO `mahasiswa_bmb` (`nama_mhs`, `nim`, `tempat_ttl`, `tanggal_ttl`, `jk`, `prodi`, `vektor`, `ipk`, `semester`, `no_hp_mhs`, `alamat_mhs`, `organisasi`, `prestasi`, `nama_orangtua`, `alamat_orangtua`, `pekerjaan`, `no_hp_orangtua`, `preferensi`, `status`, `berkas1`, `ktm2`, `aktifkuliah2`, `transkrip2`, `ktp2`, `aktiforganisasi`, `sertifikat`, `pasfoto2`, `tahun`) VALUES
('Lestari', 'KB3-15021', 'Jambi', '1998-07-07', 'Perempuan', 'DIII Kebidanan', 0, 3.7, '5', '085322017328', 'Sipin. Lrg Gotong Royong', 'Aktif', 'Tidak Ada', 'Erlyn Trisnawati', 'Sipin. Lrg Gotong Royong', 'Pegawai Swasta', '0853201732', 4.25, '', '', '', '', '', '', '', '', '', 2018),
('Eko Purnomo', 'KB3-15062', 'Jambi', '1997-07-06', 'Laki-Laki', 'DIII Keperawatan', 0, 3.31, '5', '089626264447', 'Jl. Barau-barau No.48 rt.24 Pakuan Baru, Jambi', 'Tidak Aktif', 'Tidak Ada', 'Wahyu Nugroho', 'Jl. Barau-barau No.48 rt.24 Pakuan Baru, Jambi', 'Swasta', '089626264447', 2.45, 'Lulus BMB', '', '', '', '', '', '', '', '', 2018),
('Rio Saputro', 'KB4-15033', 'Jambi', '1997-12-02', 'Laki-Laki', 'DIV Keperawatan', 0, 3.25, '5', '082380311143', 'Jl. Ir h Juanda Rt 25 no 22', 'Aktif', 'Tidak Ada', 'Azhar', 'Jl. Ir h Juanda Rt 25 no 22', 'PNS', '085288833381', 2.9, '', '', '', '', '', '', '', '', '', 2017),
('Nuraida', 'KB4-15049', 'Jambi', '1997-01-20', 'Perempuan', 'DIV Kebidanan', 0, 3.28, '5', '085340665281', 'Jl. Abdul Rahman Saleh RT.09 RW.03 No49.Paal Merah', 'Aktif', 'Tidak Ada', 'Sutarja', 'Jl. Abdul Rahman Saleh RT.09 RW.03 No49.Paal Merah', 'Guru', '081174999946', 2.9, '', '', '', '', '', '', '', '', '', 2017),
('Kurniawan', 'KB4-16034', 'Jambi', '1998-12-13', 'Laki-Laki', 'DIV Keperawatan', 0, 3.8, '3', '085669320956', 'Jl. PakisIII no110rt 27 Simpang4sipin, telanaipura', 'Aktif', 'Tidak Ada', 'Deden Hermawan', 'Jl. PakisIII no110rt 27 Simpang4sipin, telanaipura', 'Swasta', '082343421996', 3.8, '', '', '', '', '', '', '', '', '', 2017),
('Rahayu Dwiningsih', 'KB4-16035', 'Bangko', '1998-06-24', 'Perempuan', 'DIV Kebidanan', 0, 3.92, '3', '085757640238', 'Jl. H.Syamsudin Uban No 1 Rt.4 Kec. Tambak Sari', 'Tidak Aktif', 'Ada', 'Adi Wijaya', 'Jl. H.Syamsudin Uban No 1 Rt.4 Kec. Tambak Sari', 'Swasta', '085273100618', 4.1, '', '', '', '', '', '', '', '', '', 2017),
('Tyas Ningrum', 'KL3-1080', 'Jambi', '1998-03-01', 'Perempuan', 'DIII Kesehatan Lingkungan', 0, 3.45, '3', '08127345210', 'Jl. Pattimura rt.05 rw.02 Kec. Kenali Besar', 'Aktif', 'Tidak Ada', 'Cahyo Utomo', 'Jl. Pattimura rt.05 rw.02 Kec. Kenali Besar', 'PNS', '0811772035', 2.9, '', '', '', '', '', '', '', '', '', 2017),
('Eka Wahyudi', 'KL3-15045', 'Jambi', '1997-12-07', 'Laki-Laki', 'DIII Kesehatan Lingkungan', 0, 3.45, '5', '081277239696', 'Jln. H. Adam Malik, Beringin. Jambi', 'Tidak Aktif', 'Ada', 'Tien Angga', 'Jln. H. Adam Malik, Beringin. Jambi', 'PNS', '081277239696', 3.2, 'Lulus BMB', '', '', '', '', '', '', '', '', 2017),
('Vivin', 'KL3-15109', 'Jambi', '1997-01-04', 'Perempuan', 'DIII Kesehatan Lingkungan', 0, 3.33, '5', '085266789650', 'Jl. Suak kandis km7. Kumpeh ulu', 'Aktif', 'Ada', 'Dudung Iskandar', 'Jl. Suak kandis km7. Kumpeh ulu', 'PNS', '081366781060', 3.2, 'Lulus BMB', '', '', '', '', '', '', '', '', 2017),
('Yudi Iskandar', 'KL3-16072', 'Jambi', '1998-06-02', 'Laki-Laki', 'DIII Kesehatan Lingkungan', 0, 3.89, '3', '085261628192', 'Jl. Sultan Syahri Lrg Sederhana No18', 'Tidak Aktif', 'Tidak Ada', 'Agung Prasetio', 'Jl. Sultan Syahri Lrg Sederhana No18', 'Swasta', '089693798182', 3.8, '', '', '', '', '', '', '', '', '', 2017),
('Riza Dwi Yoga', 'KL3-16102', 'Jambi', '1998-06-20', 'Perempuan', 'DIII Kesehatan Lingkungan', 0, 3.66, '3', '082281167671', 'Perum Safira blok B15. Kel. Pasir Putih', 'Aktif', 'Tidak Ada', 'Tri Wahyudi', 'Perum Safira blok B15. Kel. Pasir Putih', 'Swasta', '085367765658', 3.35, '', '', '', '', '', '', '', '', '', 2017),
('Gana Septiani', 'KL3-16137', 'Sengeti', '1998-02-12', 'Perempuan', 'DIII Kesehatan Lingkungan', 0, 3.81, '3', '082307414482', 'Jl. Sri Bunting Lebak Bandung Jambi', 'Aktif', 'Tidak Ada', 'Parawin', 'Jl. Lintas Timur Rt.14 Kel. Sengeti', 'PNS', '082307579090', 3.8, '', '', '', '', '', '', '', '', '', 2017),
('Arlis Susanto', 'KP3-15111', 'Tungkal', '1997-03-16', 'Perempuan', 'DIII Keperawatan', 0, 3.25, '5', '082372303366', 'Jl. Abdulrahman Saleh No.1 Rt 06. Jambi', 'Aktif', 'Ada', 'Hada Suhandra', 'Jl. Abdulrahman Saleh No.1 Rt 06. Jambi', 'PNS', '089672770418', 3.2, 'Lulus BMB', '', '', '', '', '', '', '', '', 2017),
('Hasanah', 'KP3-16111', 'Jambi', '1998-05-31', 'Perempuan', 'DIII Keperawatan', 0, 3.25, '3', '089633241577', 'Jln. Husni Thamrin', 'Aktif', 'Ada', 'Adi Marsito', 'Jln. Husni Thamrin', 'Wiraswasta', '089633241577', 2.75, 'Lulus BMB', '', '', '', '', '', '', '', '', 2017),
('Keke WIjaanti', 'KP3-16143', 'Jambi', '1998-12-04', 'Perempuan', 'DIII Keperawatan', 0, 3.64, '3', '082377396069', 'Desa Sungai Duren Kec.Jambi Luar Kota. Muaro Jambi', 'Aktif', 'Tidak Ada', 'Yendra', 'Desa Sungai Duren Kec.Jambi Luar Kota. Muaro Jambi', 'Polisi', '081366687485', 3.35, '', '', '', '', '', '', '', '', '', 2017),
('Micco', 'KP4-14076', 'Muaro Tebo', '1996-07-14', 'Laki-Laki', 'DIV Keperawatan', 0, 3.55, '7', '085266371209', 'Jln. RA Kartini rt.07 no.40 Rimbo Bujang Jambi', 'Aktif', 'Tidak Ada', 'Samuel Anderson', 'Jln. RA Kartini rt.07 no.40 Rimbo Bujang Jambi', 'Polisi', '085266371209', 3.2, 'Lulus BMB', '', '', '', '', '', '', '', '', 2017),
('Sari Puspita', 'KP4-14100', 'Jambi', '1996-09-17', 'Perempuan', 'DIV Keperawatan', 0, 3.76, '7', '082271426621', 'Jl.Syelendra rt13 Kel.Rawasari, Kec.Kotabaru,Jambi', 'Tidak Aktif', 'Ada', 'Wisnu Koentjoro', 'Jl.Syelendra rt13 Kel.Rawasari, Kec.Kotabaru,Jambi', 'Pegawai Swasta', '081274131121', 3.5, '', '', '', '', '', '', '', '', '', 2017),
('Ajeng Wulandari', 'KP4-15040', 'M. Bulian', '1997-02-15', 'Perempuan', 'DIV Keperawatan', 0, 3.94, '5', '085267585965', 'Jl. Sentot Alibasa No.08', 'Tidak Aktif', 'Ada', 'Romlah Hayati', 'Jl. Sentot Alibasa No.08', 'PNS', '085266089906', 4.55, '', '', '', '', '', '', '', '', '', 2017),
('Else Rahmawati', 'KP4-16115', 'Tebo', '1998-02-26', 'Perempuan', 'DIV Keperawatan', 0, 3.55, '3', '082374949292', 'Jl. Ir. H Juanda No.6 SImpang 3 Sipin. Kota Baru', 'Aktif', 'Ada', 'Fahmi Wibowo', 'Rimbo Bujang. Unit B. Kab. Tebo', 'Usaha', '082387502626', 3.65, '', '', '', '', '', '', '', '', '', 2017),
('Diska Putri', 'PG3-16051', 'Bungo', '1998-05-04', 'Perempuan', 'DIII Keperawatan', 0, 3.9, '3', '085384579523', 'Perumahan Alamanda Asri 2 Blok H6', 'Aktif', 'Ada', 'Budi Setiawan', 'Perumahan Alamanda Asri 2 Blok H6', 'Wiraswasta', '081274072228', 4.55, '', '', '', '', '', '', '', '', '', 2017),
('Agus Saputra', 'PG3-16071', 'Jambi', '1998-05-13', 'Laki-Laki', 'DIII Keperawatan Gigi', 0, 3.89, '3', '081174626278', 'Jl. Serunai Malam III No. 60 Rt. 11', 'Tidak Aktif', 'Tidak Ada', 'Ahmad Fauzan', 'Jl. Serunai Malam III No. 60 Rt. 11', 'PNS', '082376128470', 3.8, '', '', '', '', '', '', '', '', '', 2017),
('Dian Safitri', 'PG4-1005', 'Padang', '1996-10-05', 'Perempuan', 'DIV Keperawatan Gigi', 0, 3.5, '7', '08526476199', 'Jl. Sersan Muslim, no.4  Kel. Thehok', 'Aktif', 'Ada', 'Surya AKbar', 'Jl. Sersan Muslim, no.4  Kel. Thehok', 'Dosen', '0812774666', 3.05, '', '', '', '', '', '', '', '', '', 2017),
('Maya Lestari', 'PG4-1086', 'Jambi', '1998-10-12', 'Perempuan', 'DIV Keperawatan Gigi', 0, 3.77, '3', '089732921', 'Jl. lirik rt 03 No 35 Kel. Kenali asam atas', 'Tidak Aktif', 'Ada', 'Ramdan Fauzi', 'Jl. lirik rt 03 No 35 Kel. Kenali asam atas', 'Guru', '085216392739', 3.65, '', '', '', '', '', '', '', '', '', 2017),
('Rosi', 'PG4-15061', 'Jambi', '1997-05-20', 'Perempuan', 'DIV Keperawatan Gigi', 0, 3.6, '5', '-', 'Jl. Arjuna Lr. Marene No.80 Rt.11', 'Tidak Aktif', 'Tidak Ada', 'Sri Wulansari', 'Jl. Arjuna Lr. Marene No.80 Rt.11', 'Dosen', '-', 3.35, 'Gagal BMB', '', '', '', '', '', '', '', '', 2017),
('tes', 'tes', '1', '7199-02-09', 'Laki-Laki', 'DIII Keperawatan', 0, 11, '1', '1', '1', 'Aktif', 'Ada', '1', '1', '1', '1', 0, 'Gagal BMB', '', '', '', '', '', '', '', '', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nama_mhs` varchar(50) NOT NULL,
  `nim` char(10) NOT NULL,
  `tempat_ttl` varchar(20) NOT NULL,
  `tanggal_ttl` date NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `prodi` enum('DIII Keperawatan','DIII Kebidanan','DIII Kesehatan Lingkungan','DIII Keperawatan Gigi','DIV Keperawatan','DIV Kebidanan','DIV Keperawatan Gigi') DEFAULT NULL,
  `vektor` int(11) NOT NULL,
  `ipk` double NOT NULL,
  `semester` varchar(2) NOT NULL,
  `no_hp_mhs` char(12) NOT NULL,
  `alamat_mhs` varchar(50) NOT NULL,
  `jenis_tinggal` enum('Orangtua','Wali','Kost','Asrama','Panti') DEFAULT NULL,
  `status_orangtua` enum('Lengkap','Yatim atau Piatu','Yatim Piatu') DEFAULT NULL,
  `jumlah_tanggungan` int(1) NOT NULL,
  `nama_orangtua` varchar(25) NOT NULL,
  `alamat_orangtua` varchar(50) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `penghasilan` double NOT NULL,
  `no_hp_orangtua` char(12) NOT NULL,
  `preferensi` double NOT NULL,
  `perhitungan` double NOT NULL,
  `status` enum('Gagal BMM','Lulus BMM') NOT NULL,
  `berkas1` varchar(500) NOT NULL,
  `ktm` varchar(500) NOT NULL,
  `aktifkuliah` varchar(500) NOT NULL,
  `transkrip` varchar(500) NOT NULL,
  `kk` varchar(500) NOT NULL,
  `ktp` varchar(500) NOT NULL,
  `slipgaji` varchar(500) NOT NULL,
  `pbb` varchar(500) NOT NULL,
  `suratmiskin` varchar(500) NOT NULL,
  `pasfoto` varchar(500) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nama_mhs`, `nim`, `tempat_ttl`, `tanggal_ttl`, `jk`, `prodi`, `vektor`, `ipk`, `semester`, `no_hp_mhs`, `alamat_mhs`, `jenis_tinggal`, `status_orangtua`, `jumlah_tanggungan`, `nama_orangtua`, `alamat_orangtua`, `pekerjaan`, `penghasilan`, `no_hp_orangtua`, `preferensi`, `perhitungan`, `status`, `berkas1`, `ktm`, `aktifkuliah`, `transkrip`, `kk`, `ktp`, `slipgaji`, `pbb`, `suratmiskin`, `pasfoto`, `tahun`) VALUES
('Retno Nurhayati', 'KB3-15009', 'Jambi', '1997-12-17', 'Perempuan', 'DIII Kebidanan', 0, 3.21, '5', '081274919994', 'Suka Karya', 'Wali', 'Yatim atau Piatu', 3, 'Ardi', 'Solo', 'Buruh', 1300000, '081274919994', 3.8, 0, 'Gagal BMM', '', '', '', '', '', '', '', '', '', '', 2018),
('Ilham Saputra', 'KB3-15065', 'Jambi', '1997-08-18', 'Laki-Laki', 'DIII Keperawatan', 0, 3.65, '5', '081224336393', 'Jl. Kapt. A Bakarudin', 'Panti', 'Yatim Piatu', 1, 'Nurul Agustina', 'Jl. Kapt. A Bakarudin', '-', 1000000, '081366321148', 4.58, 0, '', '', '', '', '', '', '', '', '', '', '', 2018),
('Maria', 'KB3-16097', 'Jambi', '1998-05-15', 'Perempuan', 'DIII Kebidanan', 0, 3.87, '3', '089668787949', 'Jl. H Ibrahim RT. 21 Rawasari, Jambi', 'Orangtua', 'Yatim atau Piatu', 4, 'Ismiati', 'Jl. H Ibrahim RT. 21 Rawasari, Jambi', 'swasta', 1800000, '085267779991', 3.06, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Jessica Ekawati', 'KB4-14021', 'Jambi', '1996-03-12', 'Perempuan', 'DIV Kebidanan', 0, 3.11, '7', '085758566693', 'Jl. Jambi - Palembang, rt. 18. Pondok Meja', 'Orangtua', 'Lengkap', 3, 'M. Ali', 'Jl. Jambi - Palembang, rt. 18. Pondok Meja', 'Wiraswasta', 1600000, '085267939446', 3.16, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Wulan', 'KB4-16002', 'Jambi', '1998-02-20', 'Perempuan', 'DIII Kebidanan', 0, 3.8, '3', '085368784420', 'Jl. Hasanudin. Talang Bakung. Jambi', 'Panti', 'Yatim Piatu', 1, 'Reny Oktavianti', 'Jl. Hasanudin. Talang Bakung, Jambi', '-', 1000000, '085368286080', 4.34, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Nurul Hidayah', 'KB4-16032', 'Jambi', '1998-08-08', 'Perempuan', 'DIV Kebidanan', 0, 2.98, '3', '081366965011', 'Jl. Raden Pamuk, rt. 4 . Kasang Jaya, Jambi Timur', 'Orangtua', 'Lengkap', 2, 'Eko Purnomo', 'Jl. Raden Pamuk, rt. 4 . Kasang Jaya, Jambi Timur', 'Buruh', 1450000, '085277665000', 3.16, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Fajar Pratama', 'KL3-15079', 'Jambi', '1997-06-25', 'Laki-Laki', 'DIII Kesehatan Lingkungan', 0, 3.5, '5', '082177660742', 'Jl. TP Sriwijaya. rt 20. Rawasari / Alam Barajo', 'Orangtua', 'Lengkap', 1, 'Ali Yandi', 'Jl. TP Sriwijaya. rt 20. Rawasari / Alam Barajo', 'Buruh', 1500000, '082366464740', 3.06, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Aulia Triastuti', 'KL3-16012', 'Jambi', '1998-10-05', 'Perempuan', 'DIII Kesehatan Lingkungan', 0, 3.6, '3', '081274569211', 'JL. Lingkar selatan I, Paal Merah.', 'Wali', 'Yatim atau Piatu', 2, 'Amrinah', 'Singkut', 'Buruh Cuci', 1250000, '081274569211', 3.58, 0, 'Lulus BMM', '', '', '', '', '', '', '', '', '', '', 2017),
('Dinda Maharani', 'KL3-16024', 'Palembang', '1998-12-29', 'Perempuan', 'DIII Kesehatan Lingkungan', 0, 3.63, '3', '085263211212', 'Kebun Handil, Jelutung', 'Kost', 'Lengkap', 3, 'Supardi', 'Jl. Tembus Patal Pusri Palembang', 'Swasta', 2000000, '081374521325', 3.66, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Sandra Dewi', 'KL3-16061', 'Palembang', '1998-01-11', 'Perempuan', 'DIII Kesehatan Lingkungan', 0, 3, '3', '081993099011', 'Jl. Ir. H Juanda no 6. Simpang 3 sipin kotabaru.', 'Kost', 'Yatim atau Piatu', 4, 'Didit Susanto', 'Jl. Palembang jambi, 109. kec. sungai lilin', 'WIraswasta', 2500000, '081294399006', 3.84, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Kartika Rahma', 'KL3-16070', 'Solo', '1998-04-23', 'Perempuan', 'DIII Kesehatan Lingkungan', 0, 3.41, '3', '085271728283', 'Jl. Patin 3 rt 31. Kelurahan Lingkar Selatan', 'Wali', 'Yatim Piatu', 2, 'Hari Subagio', 'Jl. Patin 3 rt 31. Kelurahan Lingkar Selatan', 'Buruh Pabrik', 1600000, '085271728283', 3.86, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Annisa', 'KL3-16099', 'Tungkal ulu', '1998-04-03', 'Perempuan', 'DIII Kesehatan Lingkungan', 0, 3.25, '3', '082368951212', 'Pakuan Baru, Jambi', 'Kost', 'Lengkap', 3, 'M. Syafi''i', 'Jl. Raden Usman, Kec. Tungkal Ulu.', 'Perawat', 1550000, '081271138041', 3.78, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Duma', 'KP3-16022', 'Jambi', '1998-03-10', 'Perempuan', 'DIII Keperawatan', 0, 2.9, '3', '082372895533', 'Perum KotaBaru Indah blok c19, RT 30. Kenali Besar', 'Wali', 'Yatim atau Piatu', 3, 'Nina Setiawati', 'Jl. Darham tungkal', 'Bidan', 1600000, '082372895530', 3.56, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Nana Rebina ', 'KP3-16082', 'Jambi', '1998-08-27', 'Perempuan', 'DIII Keperawatan', 0, 3.2, '3', '089987865510', 'Jl. Eka Jaya. RT 20 Kel.Eka Jaya Kec.Jambi Selatan', 'Orangtua', 'Lengkap', 4, 'Urin Siswantoro', 'Jl. Eka Jaya. RT 20 Kel.Eka Jaya Kec.Jambi Selatan', 'Usaha', 1900000, '082213001120', 3.2, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Hadi Utomo', 'KP3-16089', 'Serang', '1998-05-23', 'Laki-Laki', 'DIII Keperawatan', 0, 2.95, '3', '082281109921', 'Kota Baru', 'Kost', 'Lengkap', 2, 'Iskandar', 'Serang, Banten', 'Petani', 1600000, '082102112372', 3.8, 0, 'Lulus BMM', '', '', '', '', '', '', '', '', '', '', 2017),
('Reski Aditia', 'KP4-15063', 'Jambi', '1997-01-12', 'Laki-Laki', 'DIV Keperawatan', 0, 2.98, '5', '089602011828', 'Jl. Gunung Samaru Rt. 20 Payo Selincah, 36148', 'Orangtua', 'Lengkap', 1, 'Ruslandi', 'Jl. Gunung Samaru Rt. 20 Payo Selincah, 36148', 'Pegawai Swasta', 2350000, '089602011828', 2.96, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Arif Tri Wahyu', 'KP4-15096', 'Singkut', '1997-11-23', 'Laki-Laki', 'DIV Keperawatan', 0, 3.33, '5', '082368718933', 'Jl. Asparagus Simpang 3 sipin', 'Kost', 'Lengkap', 3, 'Amril Mukminin', 'Jl. Lintas Sumatra Singkut', 'Tani', 1700000, '081171745673', 3.9, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Ari Akbar', 'KP4-15131', 'Jambi', '1997-02-20', 'Laki-Laki', 'DIV Keperawatan', 0, 3.51, '5', '087812201013', 'Jl. Dharma II rt 08. Kenali Asam Bawah', 'Orangtua', 'Yatim atau Piatu', 3, 'Wuri Handayani', 'Jl. Dharma II rt 08. Kenali Asam Bawah', 'Wirausaha', 2150000, '085269091011', 3.14, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Bayu Sutrisna', 'PG3-15003', 'Jambi', '1997-03-08', 'Laki-Laki', 'DIII Keperawatan Gigi', 0, 2.75, '5', '081366068808', 'Jl. Sersan Muslim', 'Panti', 'Yatim Piatu', 1, 'Jamilah', 'Jl. Sersan Muslim', '-', 900000, '081366068808', 4.64, 0, 'Gagal BMM', '', '', '', '', '', '', '', '', '', '', 2017),
('Utami Apriliani', 'PG3-15190', 'Jambi', '1997-09-09', 'Perempuan', 'DIII Keperawatan Gigi', 0, 3.15, '5', '082201187289', 'Jl.  Dr. Purwadi. Kenali Besar, Jambi.', 'Orangtua', 'Lengkap', 3, 'Lambok Narhasil', 'Jl.  Dr. Purwadi. Kenali Besar, Jambi.', 'Wiraswasta', 1500000, '082201187289', 3.32, 0, 'Lulus BMM', '', '', '', '', '', '', '', '', '', '', 2017),
('Rizki', 'PG3-16078', 'Tebo', '1998-05-19', 'Perempuan', 'DIII Keperawatan Gigi', 0, 3.45, '3', '081273998533', 'Jln. Kimaja Simpang 3 Sipin, Kota baru Jambi', 'Kost', 'Lengkap', 1, 'Agus Joko Susilo', 'Jln. Padang lama. kec. tebo ulu. tebo', 'tani', 1400000, '', 3.7, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Mila Ricardo', 'PG3-16129', 'Jambi', '1998-04-07', 'Perempuan', 'DIII Keperawatan Gigi', 0, 2.91, '3', '0856900166', 'Jl. Ir H Juanda no 6. Simpang 3 sipin. Kotabaru', 'Kost', 'Lengkap', 3, 'Setyo Raharjo', 'Jl. SUngai tawar 29, Ilir barat II. Palembang', 'Buruh', 1800000, '085264612556', 3.72, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Juli Namirah', 'PG4-14155', 'Palembang', '1996-08-08', 'Perempuan', 'DIV Keperawatan Gigi', 0, 3.35, '7', '08138900709', 'Perumnas', 'Kost', 'Yatim atau Piatu', 1, 'Joni Saputra', 'Palembang', 'Swasta', 1100000, '085222401621', 3.82, 0, 'Gagal BMM', '', '', '', '', '', '', '', '', '', '', 2017),
('Lia Puspita Sari', 'PG4-15018', 'Jambi', '1997-12-19', 'Perempuan', 'DIII Keperawatan Gigi', 0, 2.76, '5', '089898352088', 'Jl. Aditya Warman no 28 The Hok. Jambi', 'Kost', 'Lengkap', 3, 'Wildan Putra', 'Jl. H Marzuki luwur. Tanjabtim', 'Usaha', 2000000, '082378792309', 3.84, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Andre Adinata', 'PG4-15040', 'Jambi', '1997-08-11', 'Laki-Laki', 'DIV Keperawatan Gigi', 0, 3.02, '5', '082177667064', 'Jl. Purnama rt. 13. Suka Karya', 'Orangtua', 'Lengkap', 3, 'Jadi Pamuas', 'Jl. Purnama rt 13. Suka karya', 'swasta', 1950000, '081575164424', 3.32, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Wahyu Desprayoga', 'PG4-15078', 'Jambi', '1997-08-12', 'Laki-Laki', 'DIV Keperawatan Gigi', 0, 3.12, '5', '082327241218', 'Jl. Pangeran antasari. rt 34, Talang banjar', 'Orangtua', 'Lengkap', 2, 'Gunawan', 'Jl. Pangeran antasari. Talang banjar', 'Swasta', 1900000, '082314270866', 3.4, 0, '', '', '', '', '', '', '', '', '', '', '', 2017),
('Tika Ginting', 'PG4-16014', 'Merangin', '1998-01-01', 'Perempuan', 'DIV Keperawatan Gigi', 0, 3.33, '3', '081366071999', 'jl. Sri gunting. Lebak bandung, jambi', 'Kost', 'Lengkap', 2, 'Maridia Ginting', 'jl. Poros no 12. desa rasau. Pamenang, merangin.', 'swasta', 1400000, '085289171126', 3.86, 0, 'Lulus BMM', '', '', '', '', '', '', '', '', '', '', 2017),
('tes', 'tes', 'o', '1997-12-07', 'Laki-Laki', 'DIII Keperawatan', 0, 1, '1', '1', '1', 'Orangtua', 'Lengkap', 1, 'a', 'a', 'a', 90, '900', 2.98, 0, 'Gagal BMM', 'white.rar', '', '', '', '', '', '', '', '', '', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteriabmb`
--

CREATE TABLE `subkriteriabmb` (
  `id_subkriteria` int(2) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `jenis` enum('','Ada Rentang','Tidak Ada Rentang','') NOT NULL,
  `rentang_bawah` double NOT NULL,
  `rentang_atas` double NOT NULL,
  `score` int(1) NOT NULL,
  `subkriteria` varchar(50) NOT NULL,
  `no_sub` int(1) NOT NULL,
  `kondisi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteriabmb`
--

INSERT INTO `subkriteriabmb` (`id_subkriteria`, `nama_kriteria`, `jenis`, `rentang_bawah`, `rentang_atas`, `score`, `subkriteria`, `no_sub`, `kondisi`) VALUES
(1, 'IPK', 'Ada Rentang', 3.25, 3.39, 1, '', 1, ''),
(2, 'IPK', 'Ada Rentang', 3.4, 3.54, 2, '', 2, ''),
(3, 'IPK', 'Ada Rentang', 3.55, 3.69, 3, '', 3, ''),
(4, 'IPK', 'Ada Rentang', 3.7, 3.84, 4, '', 4, ''),
(5, 'IPK', 'Ada Rentang', 3.85, 4, 5, '', 5, ''),
(6, 'Semester', 'Tidak Ada Rentang', 0, 0, 1, '7', 1, ''),
(7, 'Semester', 'Tidak Ada Rentang', 0, 0, 2, '6', 2, ''),
(8, 'Semester', 'Tidak Ada Rentang', 0, 0, 3, '5', 3, ''),
(9, 'Semester', 'Tidak Ada Rentang', 0, 0, 4, '4', 4, ''),
(10, 'Semester', 'Tidak Ada Rentang', 0, 0, 5, '3', 5, ''),
(11, 'Organisasi', 'Tidak Ada Rentang', 0, 0, 2, 'Tidak Aktif', 1, ''),
(12, 'Organisasi', 'Tidak Ada Rentang', 0, 0, 5, 'Aktif', 2, ''),
(13, 'Prestasi Non-Akademik', 'Tidak Ada Rentang', 0, 0, 2, 'Tidak Ada', 1, ''),
(14, 'Prestasi Non-Akademik', 'Tidak Ada Rentang', 0, 0, 5, 'Ada', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteriabmm`
--

CREATE TABLE `subkriteriabmm` (
  `id_subkriteria` int(2) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `jenis` enum('','Ada Rentang','Tidak Ada Rentang','') NOT NULL,
  `rentang_bawah` double NOT NULL,
  `rentang_atas` double NOT NULL,
  `score` int(1) NOT NULL,
  `subkriteria` varchar(50) NOT NULL,
  `no_sub` int(1) NOT NULL,
  `kondisi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteriabmm`
--

INSERT INTO `subkriteriabmm` (`id_subkriteria`, `nama_kriteria`, `jenis`, `rentang_bawah`, `rentang_atas`, `score`, `subkriteria`, `no_sub`, `kondisi`) VALUES
(36, 'IPK', 'Ada Rentang', 2.75, 2.99, 1, '', 1, ''),
(37, 'IPK', 'Ada Rentang', 3, 3.24, 2, '', 2, ''),
(38, 'IPK', 'Ada Rentang', 3.25, 3.49, 3, '', 3, ''),
(39, 'IPK', 'Ada Rentang', 3.5, 3.74, 4, '', 4, ''),
(40, 'IPK', 'Ada Rentang', 3.75, 4, 5, '', 5, ''),
(43, 'Semester', 'Tidak Ada Rentang', 0, 0, 1, '7', 1, ''),
(44, 'Semester', 'Tidak Ada Rentang', 0, 0, 2, '6', 2, ''),
(45, 'Semester', 'Tidak Ada Rentang', 0, 0, 3, '5', 3, ''),
(46, 'Semester', 'Tidak Ada Rentang', 0, 0, 4, '4', 4, ''),
(47, 'Semester', 'Tidak Ada Rentang', 0, 0, 5, '3', 5, ''),
(48, 'Jenis Tinggal', 'Tidak Ada Rentang', 0, 0, 1, 'Orangtua', 1, ''),
(49, 'Jenis Tinggal', 'Tidak Ada Rentang', 0, 0, 2, 'Wali', 2, ''),
(50, 'Jenis Tinggal', 'Tidak Ada Rentang', 0, 0, 3, 'Kost', 3, ''),
(51, 'Jenis Tinggal', 'Tidak Ada Rentang', 0, 0, 4, 'Asrama', 4, ''),
(52, 'Jenis Tinggal', 'Tidak Ada Rentang', 0, 0, 5, 'Panti', 5, ''),
(53, 'Jumlah Tanggungan', 'Tidak Ada Rentang', 0, 0, 1, '1', 1, ''),
(54, 'Jumlah Tanggungan', 'Tidak Ada Rentang', 0, 0, 2, '2', 2, ''),
(55, 'Jumlah Tanggungan', 'Tidak Ada Rentang', 0, 0, 3, '3', 3, ''),
(56, 'Penghasilan Orang Tua', 'Ada Rentang', 4000001, 100000000, 1, '', 1, ''),
(57, 'Penghasilan Orang Tua', 'Ada Rentang', 3000001, 4000000, 2, '', 2, ''),
(58, 'Penghasilan Orang Tua', 'Ada Rentang', 2000001, 3000000, 3, '', 3, ''),
(59, 'Penghasilan Orang Tua', 'Ada Rentang', 1000001, 2000000, 4, '', 4, ''),
(60, 'Penghasilan Orang Tua', 'Ada Rentang', 0, 1000000, 5, '', 5, ''),
(61, 'Status Anak', 'Tidak Ada Rentang', 0, 0, 1, 'Lengkap', 1, ''),
(62, 'Status Anak', 'Tidak Ada Rentang', 0, 0, 2, 'Yatim atau Piatu', 2, ''),
(63, 'Status Anak', 'Tidak Ada Rentang', 0, 0, 3, 'Yatim Piatu', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nim` char(10) NOT NULL,
  `password` varchar(11) NOT NULL,
  `level` enum('Y','N') NOT NULL,
  `nama_mhs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nim`, `password`, `level`, `nama_mhs`) VALUES
(4, 'KB3-15009', 'retno', 'Y', 'Gea Rulisca'),
(5, 'KP3-15111', 'arlis', 'Y', 'Arlis Susanto'),
(8, 'PG-15018', 'lia', 'Y', 'Lia Puspita Sari'),
(9, 'PG3-16129', 'mila', 'Y', 'Mila Ricardo'),
(10, 'KP3-16089', 'hadi', 'Y', 'Hadi Utomo'),
(11, 'PG3-15190', 'utami', 'Y', 'Utami Apriliani'),
(12, 'PG-14155', 'juli', 'Y', 'Juli Namirah'),
(13, 'PG3-15003', 'bayu', 'Y', 'Bayu Sutrisna'),
(14, 'KL3-16012', 'aulia', 'Y', 'Aulia Triastuti'),
(15, 'KB3-16032', 'nurul', 'Y', 'Nurul Hidayah'),
(16, 'KL3-15079', 'fajar', 'Y', 'Fajar Pratama'),
(17, 'KB4-14021', 'jessica', 'Y', 'Jessica Ekawati'),
(18, 'KB3-15065', 'ilham', 'Y', 'Ilham Saputra'),
(19, 'KL3-16099', 'anisa', 'Y', 'Anisa'),
(20, 'KB4-16002', 'wulan', 'Y', 'wulan'),
(21, 'PG3-16078', 'rizki', 'Y', 'Rizki'),
(22, 'KP3-16022', 'duma', 'Y', 'Duma'),
(23, 'KP4-15131', 'ari', 'Y', 'Ari Akbar'),
(24, 'KP4-15096', 'arif', 'Y', 'Arif Tri Wahyu'),
(25, 'KL3-16024', 'dinda', 'Y', 'Dinda Maharani'),
(26, 'KL3-16070', 'kartika', 'Y', 'Kartika Rahma'),
(27, 'KB3-16097', 'maria', 'Y', 'Maria'),
(28, 'KP4-15063', 'reski', 'Y', 'Reski Aditia'),
(29, 'KP3-16082', 'nana', 'Y', 'Nana Rebina'),
(30, 'KL3-16061', 'sandra', 'Y', 'Sandra Dewi'),
(31, 'PG4-1601', 'tika', 'Y', 'Tika Ginting'),
(32, 'PG4-15078', 'wahyu', 'Y', 'Wahyu Desprayoga'),
(33, 'PG4-15040', 'andre', 'Y', 'Andre Adinata'),
(34, 'KL3-15045', 'eka', 'Y', 'Eka Wahyudi'),
(35, 'PG3-16051', 'diska', 'Y', 'Diska Putri'),
(36, 'KP4-16115', 'else', 'Y', 'Else Rahmawati'),
(37, 'KP4-15040', 'ajeng', 'Y', 'Ajeng Wulandari'),
(38, 'PG3-16071', 'agus', 'Y', 'Agus Saputra'),
(39, 'PG4-16086', 'maya', 'Y', 'Maya Lestari'),
(40, 'KB4-15033', 'rio', 'Y', 'Rio Saputro'),
(41, 'KL3-16080', 'tyas', 'Y', 'Tyas Ningrum'),
(42, 'KB3-15021', 'lestari', 'Y', 'Lestari'),
(43, 'PG4-14005', 'dian', 'Y', 'Dian Safitri'),
(44, 'KP4-14100', 'sari', 'Y', 'Sari Puspita'),
(45, 'KP3-16143', 'keke', 'Y', 'Keke Wijayanti'),
(46, 'KL3-16137', 'gana', 'Y', 'Gana Septiani'),
(47, 'PG4-15061', 'rosi', 'Y', 'Rosi'),
(48, 'KP4-14076', 'micco', 'Y', 'Micco'),
(49, 'KB3-15062', 'eko', 'Y', 'Eko Purnomo'),
(50, 'KB4-15049', 'nuraida', 'Y', 'Nuraida'),
(51, 'KB4-16034', 'kurniawan', 'Y', 'Kurniawan'),
(52, 'KB4-16035', 'rahayu', 'Y', 'Rahayu Dwiningsih'),
(53, 'KL3-15109', 'vivin', 'Y', 'Vivin'),
(54, 'KL3-16072', 'yudi', 'Y', 'Yudi Iskandar'),
(55, 'KL3-16102', 'riza', 'Y', 'Riza Dwi Yoga'),
(56, 'KP3-16111', 'hasanah', 'Y', 'Hasanah'),
(57, 'tes', 'tes', 'Y', 'tes'),
(58, '8040140214', 'gea', 'Y', 'gea rulisca kandora');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `aspek_bmb`
--
ALTER TABLE `aspek_bmb`
  ADD PRIMARY KEY (`id_aspek`);

--
-- Indexes for table `aspek_bmm`
--
ALTER TABLE `aspek_bmm`
  ADD PRIMARY KEY (`id_aspek`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`selisih`),
  ADD UNIQUE KEY `nilai` (`nilai`);

--
-- Indexes for table `factor`
--
ALTER TABLE `factor`
  ADD PRIMARY KEY (`id_factor`);

--
-- Indexes for table `kriteria_bmb`
--
ALTER TABLE `kriteria_bmb`
  ADD PRIMARY KEY (`nama_kriteria`),
  ADD UNIQUE KEY `nama_kriteria` (`nama_kriteria`),
  ADD KEY `nama_aspek` (`nama_aspek`),
  ADD KEY `aspek_kriteria` (`nama_aspek`);

--
-- Indexes for table `kriteria_bmm`
--
ALTER TABLE `kriteria_bmm`
  ADD PRIMARY KEY (`nama_kriteria`),
  ADD UNIQUE KEY `nama_kriteria` (`nama_kriteria`),
  ADD KEY `nama_aspek` (`nama_aspek`),
  ADD KEY `aspek_kriteria` (`nama_aspek`);

--
-- Indexes for table `mahasiswa_bmb`
--
ALTER TABLE `mahasiswa_bmb`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `subkriteriabmb`
--
ALTER TABLE `subkriteriabmb`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indexes for table `subkriteriabmm`
--
ALTER TABLE `subkriteriabmm`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `aspek_bmb`
--
ALTER TABLE `aspek_bmb`
  MODIFY `id_aspek` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `aspek_bmm`
--
ALTER TABLE `aspek_bmm`
  MODIFY `id_aspek` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=695;
--
-- AUTO_INCREMENT for table `factor`
--
ALTER TABLE `factor`
  MODIFY `id_factor` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subkriteriabmb`
--
ALTER TABLE `subkriteriabmb`
  MODIFY `id_subkriteria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `subkriteriabmm`
--
ALTER TABLE `subkriteriabmm`
  MODIFY `id_subkriteria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
