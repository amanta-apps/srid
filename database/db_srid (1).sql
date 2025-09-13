-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2025 at 11:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_srid`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_databuruh`
--

CREATE TABLE `table_databuruh` (
  `pernr` varchar(8) NOT NULL,
  `namekar` varchar(80) NOT NULL,
  `statsactive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_databuruh`
--

INSERT INTO `table_databuruh` (`pernr`, `namekar`, `statsactive`) VALUES
('90003252', 'Bambang Sutrisno', 1),
('90003560', 'Muchamad Azis', 1),
('90004054', 'Robert Chandra', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_datacoc_d`
--

CREATE TABLE `table_datacoc_d` (
  `documenid` int(11) NOT NULL,
  `documenname` varchar(40) NOT NULL,
  `documenaddress` text NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datacoc_d`
--

INSERT INTO `table_datacoc_d` (`documenid`, `documenname`, `documenaddress`, `createdon`, `createdby`, `changedon`, `changedby`) VALUES
(9, 'a', '10092025102347^^Elegance in Earthy Tones.png', '2025-09-10 10:23:47', '90003560', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_datacoc_e`
--

CREATE TABLE `table_datacoc_e` (
  `calenderid` int(11) NOT NULL,
  `eventname` text NOT NULL,
  `eventstart` date NOT NULL,
  `eventfinish` date NOT NULL,
  `eventfacilitor` varchar(40) NOT NULL,
  `eventorganizer` varchar(40) NOT NULL,
  `eventtopics` varchar(40) NOT NULL,
  `eventlocation` varchar(40) NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL,
  `descriptions1` text NOT NULL,
  `descriptions2` text NOT NULL,
  `statsevent` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datacoc_e`
--

INSERT INTO `table_datacoc_e` (`calenderid`, `eventname`, `eventstart`, `eventfinish`, `eventfacilitor`, `eventorganizer`, `eventtopics`, `eventlocation`, `createdon`, `createdby`, `changedon`, `changedby`, `descriptions1`, `descriptions2`, `statsevent`) VALUES
(1, 'HALAL BIHALAL', '2025-04-10', '2025-04-11', 'HR', 'HR', 'SILATURAHMI BERSAMA ANTAR DEPARTEMEN', 'AGRO WISATA SIDOMUNCUL', '2025-08-29 03:57:50', '90003560', '2025-08-29 03:57:50', '90003560', '', '', 'E_PLAN');

-- --------------------------------------------------------

--
-- Table structure for table `table_datacoc_h`
--

CREATE TABLE `table_datacoc_h` (
  `cocid` int(11) NOT NULL,
  `cocdescriptions` text NOT NULL,
  `cochead` varchar(40) NOT NULL,
  `statsactive` int(11) NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL,
  `deletedon` datetime NOT NULL,
  `deletedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datacoc_h`
--

INSERT INTO `table_datacoc_h` (`cocid`, `cocdescriptions`, `cochead`, `statsactive`, `createdon`, `createdby`, `changedon`, `changedby`, `deletedon`, `deletedby`) VALUES
(1, 'Code of Conduct atau Kode Etik Perusahaan adalah pedoman penting yang dirancang untuk memastikan bahwa setiap individu yang terlibat dalam operasional perusahaan bertindak dengan integritas, profesionalisme, dan tanggung jawab. Kode etik ini mencerminkan nilai-nilai dasar perusahaan yang harus dijunjung tinggi oleh seluruh karyawan dan pihak terkait lainnya dalam berinteraksi satu sama lain, dengan pelanggan, serta dengan mitra bisnis. Dengan adanya kode etik, diharapkan tercipta lingkungan kerja yang harmonis, saling menghargai, dan penuh kepercayaan, yang pada gilirannya akan mendukung pencapaian tujuan perusahaan secara berkelanjutan.\n\nPenerapan Code of Conduct tidak hanya penting untuk menjaga reputasi dan kredibilitas perusahaan, tetapi juga untuk menciptakan budaya perusahaan yang etis dan transparan. Kode etik ini berfungsi sebagai acuan dalam pengambilan keputusan sehari-hari, serta sebagai upaya untuk mencegah terjadinya pelanggaran hukum atau peraturan yang dapat merugikan perusahaan dan individu di dalamnya. Dengan mematuhi prinsip-prinsip yang tercantum dalam kode etik, setiap pihak dapat berkontribusi dalam membangun citra positif perusahaan serta memastikan bahwa semua kegiatan dilakukan sesuai dengan standar moral dan etika yang tinggi.', 'Clash Of Clans', 1, '2025-09-01 11:37:46', '90003560', '2025-09-01 13:01:54', '90003560', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_datadirections`
--

CREATE TABLE `table_datadirections` (
  `directionsid` int(11) NOT NULL,
  `drtext` text NOT NULL,
  `destinations` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datadirections`
--

INSERT INTO `table_datadirections` (`directionsid`, `drtext`, `destinations`) VALUES
(1, '../assets/galery/dokumen_coc/', 'coc'),
(2, '../assets/galery/dokumen_wlkp/', 'wlkp'),
(3, '../assets/galery/dokumen_pkwt/', 'pkwt'),
(4, '../assets/galery/dokumen_lks/', 'lks'),
(5, '../assets/galery/dokumen_lks_image/', 'lks img'),
(6, '../assets/galery/dokumen_draft_sp/', 'sp'),
(7, '../assets/galery/dokumen_farkes/', 'farkes'),
(8, '../assets/galery/dokumen_farkes_img/', 'farkes img'),
(9, '../assets/galery/dokumen_p2k3/', 'P2k3'),
(10, '../assets/galery/dokumen_sidak_p2k3/', 'Sidak'),
(11, '../assets/galery/dokumen_sido/', 'Sido Bungah'),
(12, '../assets/galery/dokumen_notice/', 'Notice');

-- --------------------------------------------------------

--
-- Table structure for table `table_datafarkes_d`
--

CREATE TABLE `table_datafarkes_d` (
  `documenid` int(11) NOT NULL,
  `documenname` varchar(40) NOT NULL,
  `documenaddress` text NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datafarkes_d`
--

INSERT INTO `table_datafarkes_d` (`documenid`, `documenname`, `documenaddress`, `createdon`, `createdby`, `changedon`, `changedby`) VALUES
(1, 'LKS1', '03092025131745^^Elegance.png', '2025-08-29 05:17:23', '90003560', '2025-09-03 13:17:45', '90003560'),
(2, 'Tes', '10092025083639^^Elegance in Earthy Tones.png', '2025-09-10 08:36:33', '90003560', '2025-09-10 08:36:39', '90003560'),
(3, 'OKe', '10092025084017^^Elegance in Earthy Tones.png', '2025-09-10 08:40:17', '90003560', '0000-00-00 00:00:00', ''),
(4, 'Tes', '10092025084040^^Elegance in Earthy Tones.png', '2025-09-10 08:40:37', '90003560', '2025-09-10 08:40:40', '90003560');

-- --------------------------------------------------------

--
-- Table structure for table `table_datafarkes_g`
--

CREATE TABLE `table_datafarkes_g` (
  `imgid` int(11) NOT NULL,
  `imgthemes` varchar(40) NOT NULL,
  `imgaddress` text NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datafarkes_g`
--

INSERT INTO `table_datafarkes_g` (`imgid`, `imgthemes`, `imgaddress`, `createdon`, `createdby`, `changedon`, `changedby`) VALUES
(1, 'CPB Online', 'CPB Online.png', '2025-08-29 05:23:46', '90003560', '2025-08-29 05:23:46', '90003560');

-- --------------------------------------------------------

--
-- Table structure for table `table_datafarkes_h`
--

CREATE TABLE `table_datafarkes_h` (
  `farkesid` int(11) NOT NULL,
  `farkesdescriptions` text NOT NULL,
  `farkesheader` varchar(40) NOT NULL,
  `statsactive` int(11) NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL,
  `deletedon` datetime NOT NULL,
  `deletedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datafarkes_h`
--

INSERT INTO `table_datafarkes_h` (`farkesid`, `farkesdescriptions`, `farkesheader`, `statsactive`, `createdon`, `createdby`, `changedon`, `changedby`, `deletedon`, `deletedby`) VALUES
(1, 'Istilah ini umum dipakai di lingkungan BPJS Kesehatan atau instansi terkait ketika ada teguran resmi kepada fasilitas kesehatan (FKTP/RS) karena melanggar perjanjian kerja sama, standar pelayanan, atau ketentuan regulasi.', 'Surat Peringatan Fasilitas Kesehatan.', 1, '2025-09-10 08:24:56', '90003560', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_datafarkes_n`
--

CREATE TABLE `table_datafarkes_n` (
  `newsid` int(11) NOT NULL,
  `newseditor` varchar(40) NOT NULL,
  `newscontent` text NOT NULL,
  `newstitle` text NOT NULL,
  `statsactive` int(11) NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL,
  `deletedon` datetime NOT NULL,
  `deletedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datafarkes_n`
--

INSERT INTO `table_datafarkes_n` (`newsid`, `newseditor`, `newscontent`, `newstitle`, `statsactive`, `createdon`, `createdby`, `changedon`, `changedby`, `deletedon`, `deletedby`) VALUES
(1, 'ChatGPT', 'Dalam rangka memperkuat hubungan industrial yang harmonis, dinamis, dan berkeadilan, perusahaan menyelenggarakan pertemuan rutin Lembaga Kerja Sama (LKS) Bipartit pada hari [tanggal], bertempat di [lokasi/kantor perusahaan]. Pertemuan ini dihadiri oleh perwakilan manajemen dan serikat pekerja/karyawan yang tergabung dalam struktur LKS Bipartit.\n\nPertemuan tersebut membahas sejumlah isu strategis terkait ketenagakerjaan, seperti peningkatan kesejahteraan karyawan, evaluasi program kesehatan dan keselamatan kerja (K3), serta tindak lanjut atas masukan-masukan dari unit kerja. Selain itu, disampaikan juga pencapaian perusahaan dalam beberapa bulan terakhir dan rencana kerja jangka pendek yang akan melibatkan partisipasi aktif dari karyawan.\n\nKetua LKS Bipartit, [Nama], menegaskan pentingnya forum ini sebagai sarana dialog terbuka dan solutif antara pihak manajemen dan pekerja. “LKS Bipartit bukan hanya forum formal, tetapi juga ruang untuk menyampaikan aspirasi dan mencari solusi bersama secara musyawarah. Tujuan akhirnya adalah menciptakan hubungan kerja yang kondusif dan produktif,” ujarnya.\n\nManajemen perusahaan juga menyampaikan apresiasi atas kerja sama dan komunikasi yang selama ini telah terjalin baik. Diharapkan ke depan, keberadaan LKS Bipartit semakin memberikan kontribusi positif terhadap iklim kerja di lingkungan perusahaan.\n\nPertemuan ditutup dengan penandatanganan notulen serta kesepakatan bersama untuk menindaklanjuti berbagai poin diskusi melalui program kerja yang lebih terukur dan tepat sasaran.', 'Penguatan LKS Bipartit: Membangun Komunikasi yang ', 1, '2025-08-29 05:20:22', '90003560', '2025-08-29 05:20:22', '90003560', '0000-00-00 00:00:00', ''),
(5, 'Sehubungan dengan adanya acara pertanian', 'HR', 'Senin Seragam Bebas', 1, '2025-09-03 14:20:39', '90003560', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(6, 'a', 'a', 'a', 1, '2025-09-10 08:55:38', '90003560', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_datalks_d`
--

CREATE TABLE `table_datalks_d` (
  `documenid` int(11) NOT NULL,
  `documenname` varchar(40) NOT NULL,
  `documenaddress` text NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table_datalks_g`
--

CREATE TABLE `table_datalks_g` (
  `imgid` int(11) NOT NULL,
  `imgthemes` varchar(40) NOT NULL,
  `imgaddress` text NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table_datalks_h`
--

CREATE TABLE `table_datalks_h` (
  `lksid` int(11) NOT NULL,
  `lksdescriptions` text NOT NULL,
  `lksheader` varchar(40) NOT NULL,
  `statsactive` int(11) NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL,
  `deletedon` datetime NOT NULL,
  `deletedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datalks_h`
--

INSERT INTO `table_datalks_h` (`lksid`, `lksdescriptions`, `lksheader`, `statsactive`, `createdon`, `createdby`, `changedon`, `changedby`, `deletedon`, `deletedby`) VALUES
(1, 'LKS Bipartit (Lembaga Kerja Sama Bipartit) adalah forum komunikasi dan konsultasi yang dibentuk secara bersama antara pengusaha dan perwakilan pekerja di tingkat perusahaan. Lembaga ini bertujuan untuk menciptakan hubungan industrial yang harmonis, dinamis, dan berkeadilan melalui dialog sosial antara kedua belah pihak. LKS Bipartit berfungsi sebagai sarana penyelesaian masalah ketenagakerjaan secara musyawarah, serta tempat bertukar informasi mengenai kebijakan atau hal-hal yang menyangkut kepentingan pekerja dan perusahaan.\n\nPembentukan LKS Bipartit diwajibkan bagi perusahaan yang mempekerjakan paling sedikit 50 orang pekerja, sesuai dengan ketentuan dalam Peraturan Menteri Ketenagakerjaan Nomor 32 Tahun 2008. Lembaga ini terdiri dari wakil pengusaha dan wakil pekerja/buruh dengan jumlah yang sama banyak, dan masa kerja minimal dua tahun. Keberadaan LKS Bipartit diharapkan dapat menjadi wadah dialog internal yang efektif, sehingga potensi konflik dapat diminimalkan dan produktivitas kerja dapat meningkat.', 'Lembaga Kerja Sama', 1, '2025-08-29 05:15:51', '90003560', '2025-09-03 11:22:37', '90003560', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_datalks_n`
--

CREATE TABLE `table_datalks_n` (
  `newsid` int(11) NOT NULL,
  `newseditor` varchar(40) NOT NULL,
  `newscontent` text NOT NULL,
  `newstitle` text NOT NULL,
  `statsactive` int(11) NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL,
  `deletedon` datetime NOT NULL,
  `deletedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datalks_n`
--

INSERT INTO `table_datalks_n` (`newsid`, `newseditor`, `newscontent`, `newstitle`, `statsactive`, `createdon`, `createdby`, `changedon`, `changedby`, `deletedon`, `deletedby`) VALUES
(1, 'ChatGPT', 'Dalam rangka memperkuat hubungan industrial yang harmonis, dinamis, dan berkeadilan, perusahaan menyelenggarakan pertemuan rutin Lembaga Kerja Sama (LKS) Bipartit pada hari [tanggal], bertempat di [lokasi/kantor perusahaan]. Pertemuan ini dihadiri oleh perwakilan manajemen dan serikat pekerja/karyawan yang tergabung dalam struktur LKS Bipartit.\n\nPertemuan tersebut membahas sejumlah isu strategis terkait ketenagakerjaan, seperti peningkatan kesejahteraan karyawan, evaluasi program kesehatan dan keselamatan kerja (K3), serta tindak lanjut atas masukan-masukan dari unit kerja. Selain itu, disampaikan juga pencapaian perusahaan dalam beberapa bulan terakhir dan rencana kerja jangka pendek yang akan melibatkan partisipasi aktif dari karyawan.\n\nKetua LKS Bipartit, [Nama], menegaskan pentingnya forum ini sebagai sarana dialog terbuka dan solutif antara pihak manajemen dan pekerja. “LKS Bipartit bukan hanya forum formal, tetapi juga ruang untuk menyampaikan aspirasi dan mencari solusi bersama secara musyawarah. Tujuan akhirnya adalah menciptakan hubungan kerja yang kondusif dan produktif,” ujarnya.\n\nManajemen perusahaan juga menyampaikan apresiasi atas kerja sama dan komunikasi yang selama ini telah terjalin baik. Diharapkan ke depan, keberadaan LKS Bipartit semakin memberikan kontribusi positif terhadap iklim kerja di lingkungan perusahaan.\n\nPertemuan ditutup dengan penandatanganan notulen serta kesepakatan bersama untuk menindaklanjuti berbagai poin diskusi melalui program kerja yang lebih terukur dan tepat sasaran.', 'Penguatan LKS Bipartit: Membangun Komunikasi yang ', 1, '2025-08-29 05:20:22', '90003560', '2025-08-29 05:20:22', '90003560', '0000-00-00 00:00:00', ''),
(5, 'Sehubungan dengan adanya acara pertanian', 'HR', 'Senin Seragam Bebas', 1, '2025-09-03 14:20:39', '90003560', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_datanotice_d`
--

CREATE TABLE `table_datanotice_d` (
  `documenid` int(11) NOT NULL,
  `noticeid` int(11) NOT NULL,
  `imgnotice` text NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table_datanotice_h`
--

CREATE TABLE `table_datanotice_h` (
  `noticeid` int(11) NOT NULL,
  `header` varchar(40) NOT NULL,
  `descriptions` text NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table_datap2k3_d`
--

CREATE TABLE `table_datap2k3_d` (
  `documenid` int(11) NOT NULL,
  `documenname` varchar(40) NOT NULL,
  `documenaddress` text NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table_datap2k3_h`
--

CREATE TABLE `table_datap2k3_h` (
  `p2k3id` int(11) NOT NULL,
  `p2k3descriptions` text NOT NULL,
  `p2k3header` varchar(40) NOT NULL,
  `statsactive` int(11) NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL,
  `deletedon` datetime NOT NULL,
  `deletedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datap2k3_h`
--

INSERT INTO `table_datap2k3_h` (`p2k3id`, `p2k3descriptions`, `p2k3header`, `statsactive`, `createdon`, `createdby`, `changedon`, `changedby`, `deletedon`, `deletedby`) VALUES
(1, '📌 Definisi\nP2K3 adalah badan/organisasi di perusahaan yang dibentuk oleh pengusaha dan pekerja untuk membantu menerapkan serta mengawasi pelaksanaan Keselamatan dan Kesehatan Kerja (K3) sesuai peraturan perundangan.\n\n📌 Dasar Hukum\n\nUU No. 1 Tahun 1970 tentang Keselamatan Kerja\n\nPermenaker RI No. 04/MEN/1987 tentang P2K3 serta tata cara penunjukan Ahli K3\n\n📌 Tugas utama P2K3\n\nMemberi saran dan pertimbangan kepada pengusaha tentang K3\n\nMembantu merencanakan, melaksanakan, dan mengevaluasi program K3\n\nMengkaji dan menindaklanjuti kecelakaan kerja/penyakit akibat kerja\n\nMembantu pelaksanaan pelatihan, kampanye, dan sosialisasi K3\n\n📌 Anggota\n\nPerwakilan pengusaha (manajemen)\n\nPerwakilan pekerja/buruh\n\nAhli K3 (sebagai sekretaris P2K3)', 'Panitia Pembina Keselamatan & Kesehatan', 1, '2025-09-10 15:41:48', '90003560', '2025-09-10 15:43:45', '90003560', '2025-09-10 15:43:59', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_datap2k3_n`
--

CREATE TABLE `table_datap2k3_n` (
  `newsid` int(11) NOT NULL,
  `newseditor` varchar(40) NOT NULL,
  `newscontent` text NOT NULL,
  `newstitle` text NOT NULL,
  `statsactive` int(11) NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL,
  `deletedon` datetime NOT NULL,
  `deletedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datap2k3_n`
--

INSERT INTO `table_datap2k3_n` (`newsid`, `newseditor`, `newscontent`, `newstitle`, `statsactive`, `createdon`, `createdby`, `changedon`, `changedby`, `deletedon`, `deletedby`) VALUES
(1, 'e', 'e', 'e', 0, '2025-09-10 15:51:58', '90003560', '2025-09-10 15:52:08', '90003560', '2025-09-10 15:53:50', '90003560');

-- --------------------------------------------------------

--
-- Table structure for table `table_datap2k3_s`
--

CREATE TABLE `table_datap2k3_s` (
  `p2k3id` int(11) NOT NULL,
  `tglsidak` date NOT NULL,
  `pernr` varchar(8) NOT NULL,
  `unitid` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datap2k3_s`
--

INSERT INTO `table_datap2k3_s` (`p2k3id`, `tglsidak`, `pernr`, `unitid`, `catatan`, `createdon`, `createdby`) VALUES
(5, '2025-09-17', '90003252', 11121112, '<p>a</p>', '2025-09-11 13:27:10', '90003560');

-- --------------------------------------------------------

--
-- Table structure for table `table_datap2k3_sd`
--

CREATE TABLE `table_datap2k3_sd` (
  `documenid` int(11) NOT NULL,
  `p2k3id` int(11) NOT NULL,
  `imgsidak` text NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datap2k3_sd`
--

INSERT INTO `table_datap2k3_sd` (`documenid`, `p2k3id`, `imgsidak`, `createdon`, `createdby`) VALUES
(49, 5, '11092025132710^^04092025155852^^01092025151118^^Elegance in Earthy Tones.png', '2025-09-11 13:27:10', '90003560'),
(50, 5, '11092025132710^^Elegance.png', '2025-09-11 13:27:10', '90003560'),
(51, 5, '11092025132710^^01092025151118^^Elegance in Earthy Tones.png', '2025-09-11 13:27:10', '90003560'),
(52, 5, '11092025132710^^CPB Online.png', '2025-09-11 13:27:10', '90003560'),
(53, 5, '11092025132710^^sidomuncul.png', '2025-09-11 13:27:10', '90003560'),
(54, 5, '11092025132710^^sidomuncul (2).png', '2025-09-11 13:27:10', '90003560'),
(55, 5, '11092025132710^^document.pdf', '2025-09-11 13:27:10', '90003560');

-- --------------------------------------------------------

--
-- Table structure for table `table_datapkb`
--

CREATE TABLE `table_datapkb` (
  `norevisi` int(11) NOT NULL,
  `descriptions` varchar(40) NOT NULL,
  `link` text NOT NULL,
  `text_descriptions` text NOT NULL,
  `statsactive` int(11) NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL,
  `deletedon` datetime NOT NULL,
  `deletedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datapkb`
--

INSERT INTO `table_datapkb` (`norevisi`, `descriptions`, `link`, `text_descriptions`, `statsactive`, `createdon`, `createdby`, `changedon`, `changedby`, `deletedon`, `deletedby`) VALUES
(1, 'PKB', 'http://pkb-online.sidomuncul.co.id/', 'Perjanjian Kerja Bersama (PKB) merupakan dokumen hukum yang sangat penting dalam hubungan industrial antara pengusaha dan pekerja atau buruh dalam suatu perusahaan atau organisasi. Sebagai landasan dasar bagi keduanya, PKB memiliki peranan strategis dalam menciptakan suasana kerja yang harmonis, adil, dan transparan. PKB berfungsi sebagai pedoman yang mengatur hak dan kewajiban baik bagi pengusaha maupun pekerja, serta memberikan perlindungan hukum bagi kedua belah pihak dalam segala aspek pekerjaan. Pengenalan terhadap PKB menjadi sangat krusial, tidak hanya bagi manajemen perusahaan dan serikat pekerja, tetapi juga bagi setiap individu yang terlibat dalam dunia kerja. PKB juga membantu untuk mencegah terjadinya konflik yang dapat merugikan kedua belah pihak, dengan menyediakan mekanisme penyelesaian sengketa yang jelas dan efektif. Seiring dengan perkembangan dunia kerja yang semakin dinamis, PKB juga perlu disesuaikan dengan kebutuhan dan tantangan yang ada, baik yang berkaitan dengan aspek kesejahteraan, perlindungan sosial, maupun upaya peningkatan produktivitas dan kualitas kerja. Oleh karena itu, pemahaman yang mendalam mengenai perjanjian ini menjadi sangat penting agar dapat tercapai hubungan industrial yang saling menguntungkan, sesuai dengan ketentuan perundang-undangan yang berlaku. Dalam konteks ini, buku ini bertujuan untuk memberikan wawasan yang lebih mendalam mengenai pengertian, tujuan, serta proses penyusunan dan penerapan Perjanjian Kerja Bersama di lingkungan perusahaan, dengan harapan agar informasi ini dapat menjadi acuan dan pedoman bagi semua pihak yang terlibat dalam dunia industri dan ketenagakerjaan.', 1, '2025-03-24 03:30:30', '90003560', '2025-03-24 03:30:30', '90003560', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_datapkwt_d`
--

CREATE TABLE `table_datapkwt_d` (
  `documenid` int(11) NOT NULL,
  `documenname` text NOT NULL,
  `documenaddress` text NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table_datapkwt_h`
--

CREATE TABLE `table_datapkwt_h` (
  `pkwtid` int(11) NOT NULL,
  `pkwtdescriptions` text NOT NULL,
  `pkwtheader` varchar(40) NOT NULL,
  `statsactive` int(11) NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL,
  `deletedon` datetime NOT NULL,
  `deletedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datapkwt_h`
--

INSERT INTO `table_datapkwt_h` (`pkwtid`, `pkwtdescriptions`, `pkwtheader`, `statsactive`, `createdon`, `createdby`, `changedon`, `changedby`, `deletedon`, `deletedby`) VALUES
(1, 'Perjanjian Kerja Waktu Tertentu (PKWT) adalah perjanjian kerja antara pekerja dan pemberi kerja untuk hubungan kerja dalam jangka waktu tertentu atau untuk pekerjaan tertentu, yang diatur oleh Undang-Undang Ketenagakerjaan dan pengawasannya dilakukan oleh Dinas Ketenagakerjaan (Disnaker). PKWT biasanya digunakan untuk pekerjaan yang bersifat sementara, musiman, atau proyek yang memiliki batas waktu penyelesaian. Disnaker memiliki peran penting dalam memastikan pelaksanaan PKWT sesuai dengan ketentuan hukum yang berlaku, termasuk kewajiban pencatatan PKWT oleh perusahaan agar tercatat secara resmi dan dapat diawasi, guna melindungi hak-hak pekerja dan mencegah penyalahgunaan kontrak kerja sementara.', 'Perjanjian Kerja Waktu Tertentu', 1, '2025-08-29 05:07:22', '90003560', '2025-09-02 10:29:48', '90003560', '0000-00-00 00:00:00', ''),
(2, 'tes', 'tes', 0, '2025-09-02 10:30:02', '90003560', '0000-00-00 00:00:00', '', '2025-09-02 10:30:08', '90003560');

-- --------------------------------------------------------

--
-- Table structure for table `table_datasido_e`
--

CREATE TABLE `table_datasido_e` (
  `sidoid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `eventname` varchar(80) NOT NULL,
  `tgleventfrom` date NOT NULL,
  `tgleventto` date NOT NULL,
  `descriptions` text NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table_datasido_h`
--

CREATE TABLE `table_datasido_h` (
  `sidoid` int(11) NOT NULL,
  `sidodescriptions` text NOT NULL,
  `sidoheader` varchar(40) NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datasido_h`
--

INSERT INTO `table_datasido_h` (`sidoid`, `sidodescriptions`, `sidoheader`, `createdon`, `createdby`, `changedon`, `changedby`) VALUES
(2, 'Acara ini digelar dengan mengusung tema “Sido Bungah” yang berarti menjadi bahagia. Tema ini dipilih sebagai wujud semangat untuk menghadirkan suasana penuh keceriaan, kebersamaan, dan rasa syukur dalam setiap langkah. Melalui rangkaian kegiatan yang inspiratif, edukatif, dan menghibur, acara ini diharapkan mampu mempererat persaudaraan serta menumbuhkan energi positif di tengah masyarakat.', 'Sido Bungah', '2025-09-11 14:51:52', '90003560', '2025-09-11 14:52:41', '90003560');

-- --------------------------------------------------------

--
-- Table structure for table `table_datasido_sd`
--

CREATE TABLE `table_datasido_sd` (
  `documenid` int(11) NOT NULL,
  `sidoid` int(11) NOT NULL,
  `imgsido` text NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table_datasp_d`
--

CREATE TABLE `table_datasp_d` (
  `documenid` int(11) NOT NULL,
  `spid` int(11) NOT NULL,
  `documenname` varchar(80) NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `createdon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datasp_d`
--

INSERT INTO `table_datasp_d` (`documenid`, `spid`, `documenname`, `createdby`, `createdon`) VALUES
(1, 1, '04092025155852^^Elegance.png', '90003560', '2025-09-04 15:58:52'),
(2, 1, '04092025155852^^01092025151118^^Elegance in Earthy Tones.png', '90003560', '2025-09-04 15:58:52'),
(3, 1, '04092025155852^^CPB Online.png', '90003560', '2025-09-04 15:58:52'),
(4, 1, '04092025155852^^sidomuncul.png', '90003560', '2025-09-04 15:58:52'),
(5, 1, '04092025155852^^sidomuncul (2).png', '90003560', '2025-09-04 15:58:52'),
(6, 1, '04092025155852^^document.pdf', '90003560', '2025-09-04 15:58:52'),
(7, 1, '04092025155852^^Surat Lamaran Kerja.pdf', '90003560', '2025-09-04 15:58:52'),
(8, 1, '04092025155852^^Resume.pdf', '90003560', '2025-09-04 15:58:52'),
(9, 1, '04092025155852^^f102.pdf', '90003560', '2025-09-04 15:58:52'),
(10, 2, '09092025104211^^K100.XLSX', '90003560', '2025-09-09 10:42:11'),
(11, 3, '09092025104553^^Elegance in Earthy Tones.png', '90003560', '2025-09-09 10:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `table_datasp_doc`
--

CREATE TABLE `table_datasp_doc` (
  `spid` int(11) NOT NULL,
  `nodocumen` varchar(40) NOT NULL,
  `tglpelanggaran` date NOT NULL,
  `pernr` varchar(8) NOT NULL,
  `unitid` int(11) NOT NULL,
  `unitbagian` varchar(80) NOT NULL,
  `idviolation` int(11) NOT NULL,
  `sancid` int(11) NOT NULL,
  `jadwalrekon` date NOT NULL,
  `eksekutor` varchar(8) NOT NULL,
  `spstatus` varchar(5) NOT NULL,
  `createdon_renc` datetime NOT NULL,
  `createdby_renc` varchar(8) NOT NULL,
  `postingdate_real` datetime NOT NULL,
  `postingby_real` varchar(8) NOT NULL,
  `deletedon` datetime NOT NULL,
  `deletedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datasp_doc`
--

INSERT INTO `table_datasp_doc` (`spid`, `nodocumen`, `tglpelanggaran`, `pernr`, `unitid`, `unitbagian`, `idviolation`, `sancid`, `jadwalrekon`, `eksekutor`, `spstatus`, `createdon_renc`, `createdby_renc`, `postingdate_real`, `postingby_real`, `deletedon`, `deletedby`) VALUES
(1, 'SP/HRD/025/IX/2025', '2025-09-04', '90003560', 11121112, 'Staff', 2, 1, '2025-09-04', '90003252', 'CLSD', '2025-09-04 15:58:52', '90003560', '2025-09-09 00:00:00', '90003560', '0000-00-00 00:00:00', ''),
(2, 'SP/HRD/025/IX/2025', '2025-09-09', '90003252', 11121112, 'Staff', 1, 1, '2025-09-09', '90003252', 'NEW', '2025-09-09 10:42:11', '90003560', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 'SP/HRD/025/IX/2025', '2025-09-09', '90003252', 11121112, 'Staff', 1, 1, '2025-09-09', '90003252', 'DEL', '2025-09-09 10:45:52', '90003560', '0000-00-00 00:00:00', '', '2025-09-10 11:21:17', '90003560');

-- --------------------------------------------------------

--
-- Table structure for table `table_datasp_s`
--

CREATE TABLE `table_datasp_s` (
  `sancid` int(11) NOT NULL,
  `descriptions` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datasp_s`
--

INSERT INTO `table_datasp_s` (`sancid`, `descriptions`) VALUES
(1, 'STT'),
(2, 'SP 1'),
(3, 'SP 2'),
(4, 'SP 3'),
(5, 'SKORSING'),
(6, 'SP Pertama Dan Terakhir'),
(7, 'PHK');

-- --------------------------------------------------------

--
-- Table structure for table `table_datasp_v`
--

CREATE TABLE `table_datasp_v` (
  `idviolation` int(11) NOT NULL,
  `descriptions` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datasp_v`
--

INSERT INTO `table_datasp_v` (`idviolation`, `descriptions`) VALUES
(1, 'K3'),
(2, 'Indispliner'),
(3, 'Lingkungan'),
(4, 'Lain - lain');

-- --------------------------------------------------------

--
-- Table structure for table `table_datastats`
--

CREATE TABLE `table_datastats` (
  `idstats` int(11) NOT NULL,
  `stats` varchar(5) NOT NULL,
  `descriptions` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datastats`
--

INSERT INTO `table_datastats` (`idstats`, `stats`, `descriptions`) VALUES
(0, 'NEW', 'News'),
(1, 'CRTD', 'Created'),
(2, 'REL', 'release'),
(3, 'CLSD', 'Closed'),
(99, 'DEL', 'Delete');

-- --------------------------------------------------------

--
-- Table structure for table `table_datatask`
--

CREATE TABLE `table_datatask` (
  `taskid` int(11) NOT NULL,
  `descriptions` varchar(40) NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datatask`
--

INSERT INTO `table_datatask` (`taskid`, `descriptions`, `createdon`, `createdby`) VALUES
(1, 'Futsal', '2025-09-11 10:03:46', '90003560'),
(2, 'Pingpong', '2025-09-11 10:03:46', '90003560'),
(3, 'VollyBall', '2025-09-11 10:03:46', '90003560'),
(4, 'Foot Ball', '2025-09-11 10:03:46', '90003560');

-- --------------------------------------------------------

--
-- Table structure for table `table_dataunit`
--

CREATE TABLE `table_dataunit` (
  `unitid` int(11) NOT NULL,
  `descriptions` varchar(80) NOT NULL,
  `costcentre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_dataunit`
--

INSERT INTO `table_dataunit` (`unitid`, `descriptions`, `costcentre`) VALUES
(11121112, 'Teknik', 'S100S002');

-- --------------------------------------------------------

--
-- Table structure for table `table_datauser`
--

CREATE TABLE `table_datauser` (
  `pernr` varchar(8) NOT NULL,
  `personname` varchar(40) NOT NULL,
  `initialpassword` varchar(32) NOT NULL,
  `emailuser` varchar(40) NOT NULL,
  `lockeduser` int(11) NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datauser`
--

INSERT INTO `table_datauser` (`pernr`, `personname`, `initialpassword`, `emailuser`, `lockeduser`, `createdon`, `createdby`, `changedon`, `changedby`) VALUES
('90003560', 'Muchamad Azis', '202cb962ac59075b964b07152d234b70', 'muchamad.azis@sidomuncul.co.id', 0, '2025-08-28 11:15:04', '90003560', '2025-08-28 11:15:04', '90003560');

-- --------------------------------------------------------

--
-- Table structure for table `table_datawlkp_d`
--

CREATE TABLE `table_datawlkp_d` (
  `documenid` int(11) NOT NULL,
  `documenname` text NOT NULL,
  `documenaddress` text NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table_datawlkp_h`
--

CREATE TABLE `table_datawlkp_h` (
  `wlkpid` int(11) NOT NULL,
  `wlkpdescriptions` text NOT NULL,
  `wlkpheader` varchar(80) NOT NULL,
  `statsactive` int(11) NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(8) NOT NULL,
  `changedon` datetime NOT NULL,
  `changedby` varchar(8) NOT NULL,
  `deletedon` datetime NOT NULL,
  `deletedby` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_datawlkp_h`
--

INSERT INTO `table_datawlkp_h` (`wlkpid`, `wlkpdescriptions`, `wlkpheader`, `statsactive`, `createdon`, `createdby`, `changedon`, `changedby`, `deletedon`, `deletedby`) VALUES
(1, 'WLKP (Wajib Lapor Ketenagakerjaan di Perusahaan) adalah kewajiban setiap perusahaan untuk melaporkan secara berkala informasi ketenagakerjaan kepada Dinas Ketenagakerjaan setempat. Informasi yang dilaporkan meliputi jumlah tenaga kerja, status hubungan kerja, jabatan, pendidikan, upah, serta data lainnya yang terkait dengan ketenagakerjaan di perusahaan. Pelaporan ini bertujuan untuk menyediakan data yang akurat bagi pemerintah dalam menyusun kebijakan ketenagakerjaan, serta sebagai bentuk transparansi dan pengawasan terhadap perlindungan tenaga kerja.\n\nWLKP biasanya dilakukan secara daring melalui sistem yang disediakan oleh Disnaker, seperti aplikasi wajib lapor online yang bisa diakses oleh perusahaan. Kewajiban ini diatur dalam Undang-Undang Nomor 7 Tahun 1981 tentang Wajib Lapor Ketenagakerjaan di Perusahaan, dan pelanggaran terhadap kewajiban ini dapat dikenakan sanksi administratif. Dengan melakukan WLKP, perusahaan turut berpartisipasi dalam upaya peningkatan kualitas dan perlindungan tenaga kerja di Indonesia.', 'Wajib Lapor Ketenagakerjaan di Perusahaan', 0, '2025-08-29 04:52:44', '90003560', '2025-09-02 09:11:42', '90003560', '2025-09-10 10:24:05', '90003560');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_databuruh`
--
ALTER TABLE `table_databuruh`
  ADD PRIMARY KEY (`pernr`);

--
-- Indexes for table `table_datacoc_d`
--
ALTER TABLE `table_datacoc_d`
  ADD PRIMARY KEY (`documenid`);

--
-- Indexes for table `table_datacoc_e`
--
ALTER TABLE `table_datacoc_e`
  ADD PRIMARY KEY (`calenderid`);

--
-- Indexes for table `table_datacoc_h`
--
ALTER TABLE `table_datacoc_h`
  ADD PRIMARY KEY (`cocid`);

--
-- Indexes for table `table_datadirections`
--
ALTER TABLE `table_datadirections`
  ADD PRIMARY KEY (`directionsid`);

--
-- Indexes for table `table_datafarkes_d`
--
ALTER TABLE `table_datafarkes_d`
  ADD PRIMARY KEY (`documenid`);

--
-- Indexes for table `table_datafarkes_g`
--
ALTER TABLE `table_datafarkes_g`
  ADD PRIMARY KEY (`imgid`);

--
-- Indexes for table `table_datafarkes_h`
--
ALTER TABLE `table_datafarkes_h`
  ADD PRIMARY KEY (`farkesid`);

--
-- Indexes for table `table_datafarkes_n`
--
ALTER TABLE `table_datafarkes_n`
  ADD PRIMARY KEY (`newsid`);

--
-- Indexes for table `table_datalks_d`
--
ALTER TABLE `table_datalks_d`
  ADD PRIMARY KEY (`documenid`);

--
-- Indexes for table `table_datalks_g`
--
ALTER TABLE `table_datalks_g`
  ADD PRIMARY KEY (`imgid`);

--
-- Indexes for table `table_datalks_h`
--
ALTER TABLE `table_datalks_h`
  ADD PRIMARY KEY (`lksid`);

--
-- Indexes for table `table_datalks_n`
--
ALTER TABLE `table_datalks_n`
  ADD PRIMARY KEY (`newsid`);

--
-- Indexes for table `table_datanotice_d`
--
ALTER TABLE `table_datanotice_d`
  ADD PRIMARY KEY (`documenid`);

--
-- Indexes for table `table_datanotice_h`
--
ALTER TABLE `table_datanotice_h`
  ADD PRIMARY KEY (`noticeid`);

--
-- Indexes for table `table_datap2k3_d`
--
ALTER TABLE `table_datap2k3_d`
  ADD PRIMARY KEY (`documenid`);

--
-- Indexes for table `table_datap2k3_h`
--
ALTER TABLE `table_datap2k3_h`
  ADD PRIMARY KEY (`p2k3id`);

--
-- Indexes for table `table_datap2k3_n`
--
ALTER TABLE `table_datap2k3_n`
  ADD PRIMARY KEY (`newsid`);

--
-- Indexes for table `table_datap2k3_s`
--
ALTER TABLE `table_datap2k3_s`
  ADD PRIMARY KEY (`p2k3id`);

--
-- Indexes for table `table_datap2k3_sd`
--
ALTER TABLE `table_datap2k3_sd`
  ADD PRIMARY KEY (`documenid`);

--
-- Indexes for table `table_datapkb`
--
ALTER TABLE `table_datapkb`
  ADD PRIMARY KEY (`norevisi`);

--
-- Indexes for table `table_datapkwt_d`
--
ALTER TABLE `table_datapkwt_d`
  ADD PRIMARY KEY (`documenid`);

--
-- Indexes for table `table_datapkwt_h`
--
ALTER TABLE `table_datapkwt_h`
  ADD PRIMARY KEY (`pkwtid`);

--
-- Indexes for table `table_datasido_e`
--
ALTER TABLE `table_datasido_e`
  ADD PRIMARY KEY (`sidoid`);

--
-- Indexes for table `table_datasido_h`
--
ALTER TABLE `table_datasido_h`
  ADD PRIMARY KEY (`sidoid`);

--
-- Indexes for table `table_datasido_sd`
--
ALTER TABLE `table_datasido_sd`
  ADD PRIMARY KEY (`documenid`);

--
-- Indexes for table `table_datasp_d`
--
ALTER TABLE `table_datasp_d`
  ADD PRIMARY KEY (`documenid`);

--
-- Indexes for table `table_datasp_doc`
--
ALTER TABLE `table_datasp_doc`
  ADD PRIMARY KEY (`spid`);

--
-- Indexes for table `table_datasp_s`
--
ALTER TABLE `table_datasp_s`
  ADD PRIMARY KEY (`sancid`);

--
-- Indexes for table `table_datasp_v`
--
ALTER TABLE `table_datasp_v`
  ADD PRIMARY KEY (`idviolation`);

--
-- Indexes for table `table_datastats`
--
ALTER TABLE `table_datastats`
  ADD PRIMARY KEY (`idstats`);

--
-- Indexes for table `table_datatask`
--
ALTER TABLE `table_datatask`
  ADD PRIMARY KEY (`taskid`);

--
-- Indexes for table `table_dataunit`
--
ALTER TABLE `table_dataunit`
  ADD PRIMARY KEY (`unitid`);

--
-- Indexes for table `table_datauser`
--
ALTER TABLE `table_datauser`
  ADD PRIMARY KEY (`pernr`);

--
-- Indexes for table `table_datawlkp_d`
--
ALTER TABLE `table_datawlkp_d`
  ADD PRIMARY KEY (`documenid`);

--
-- Indexes for table `table_datawlkp_h`
--
ALTER TABLE `table_datawlkp_h`
  ADD PRIMARY KEY (`wlkpid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_datacoc_d`
--
ALTER TABLE `table_datacoc_d`
  MODIFY `documenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `table_datacoc_e`
--
ALTER TABLE `table_datacoc_e`
  MODIFY `calenderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_datacoc_h`
--
ALTER TABLE `table_datacoc_h`
  MODIFY `cocid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_datadirections`
--
ALTER TABLE `table_datadirections`
  MODIFY `directionsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `table_datafarkes_d`
--
ALTER TABLE `table_datafarkes_d`
  MODIFY `documenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_datafarkes_g`
--
ALTER TABLE `table_datafarkes_g`
  MODIFY `imgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_datafarkes_h`
--
ALTER TABLE `table_datafarkes_h`
  MODIFY `farkesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_datafarkes_n`
--
ALTER TABLE `table_datafarkes_n`
  MODIFY `newsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_datalks_d`
--
ALTER TABLE `table_datalks_d`
  MODIFY `documenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_datalks_g`
--
ALTER TABLE `table_datalks_g`
  MODIFY `imgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_datalks_h`
--
ALTER TABLE `table_datalks_h`
  MODIFY `lksid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_datalks_n`
--
ALTER TABLE `table_datalks_n`
  MODIFY `newsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_datanotice_d`
--
ALTER TABLE `table_datanotice_d`
  MODIFY `documenid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_datanotice_h`
--
ALTER TABLE `table_datanotice_h`
  MODIFY `noticeid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_datap2k3_d`
--
ALTER TABLE `table_datap2k3_d`
  MODIFY `documenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_datap2k3_h`
--
ALTER TABLE `table_datap2k3_h`
  MODIFY `p2k3id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_datap2k3_n`
--
ALTER TABLE `table_datap2k3_n`
  MODIFY `newsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_datap2k3_s`
--
ALTER TABLE `table_datap2k3_s`
  MODIFY `p2k3id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_datap2k3_sd`
--
ALTER TABLE `table_datap2k3_sd`
  MODIFY `documenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `table_datapkb`
--
ALTER TABLE `table_datapkb`
  MODIFY `norevisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_datapkwt_d`
--
ALTER TABLE `table_datapkwt_d`
  MODIFY `documenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_datapkwt_h`
--
ALTER TABLE `table_datapkwt_h`
  MODIFY `pkwtid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_datasido_e`
--
ALTER TABLE `table_datasido_e`
  MODIFY `sidoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_datasido_h`
--
ALTER TABLE `table_datasido_h`
  MODIFY `sidoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_datasido_sd`
--
ALTER TABLE `table_datasido_sd`
  MODIFY `documenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_datasp_d`
--
ALTER TABLE `table_datasp_d`
  MODIFY `documenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table_datasp_doc`
--
ALTER TABLE `table_datasp_doc`
  MODIFY `spid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_datasp_s`
--
ALTER TABLE `table_datasp_s`
  MODIFY `sancid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_datasp_v`
--
ALTER TABLE `table_datasp_v`
  MODIFY `idviolation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_datastats`
--
ALTER TABLE `table_datastats`
  MODIFY `idstats` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `table_datatask`
--
ALTER TABLE `table_datatask`
  MODIFY `taskid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_datawlkp_d`
--
ALTER TABLE `table_datawlkp_d`
  MODIFY `documenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_datawlkp_h`
--
ALTER TABLE `table_datawlkp_h`
  MODIFY `wlkpid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
