-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2017 at 03:38 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `Foto`) VALUES
(1, 'Novrialdi', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'IMG_5403.jpg'),
(2, 'Tono', 'admin2', '25d55ad283aa400af464c76d713c07ad', '');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama`, `id_admin`) VALUES
(2, 'Sukajadi', 0),
(6, 'Marpoyan Damai', 0),
(8, 'Tampan', 0),
(9, 'Payung Sekaki', 0),
(10, 'Rumbai', 0),
(11, 'Rumbai Pesisir', 0),
(13, 'Pekanbaru Kota', 1),
(14, 'Lima Puluh', 1),
(15, 'Tenayan Raya', 1),
(16, 'Senapelan', 1),
(17, 'Sail', 1),
(19, 'Bukit Raya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `puskes`
--

CREATE TABLE `puskes` (
  `id_puskes` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `id_kecamatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `puskes`
--

INSERT INTO `puskes` (`id_puskes`, `nama`, `kategori`, `jenis`, `email`, `alamat`, `telp`, `lat`, `lng`, `gambar`, `id_kecamatan`) VALUES
(2, 'Awal Bros Panam', 'Rumah Sakit', 'Swasta', '', 'Jl. HR Soebrantas No 88, Tampan, Pekanbaru. Riau - 28292', '		+62 761 586888', 0.4638467724986561, 101.3902299106121, 'awal_bros_panam.jpg', '8'),
(3, 'Prima', 'Rumah Sakit', 'Swasta', 'info@rsprimapekanbaru.com', 'Jalan Bima No 1 Nangka Ujung', '0761 - 8419007 ', 0.49738795676632275, 101.40001595020294, 'prima.jpg', '8'),
(4, 'Eka Hospital', 'Rumah Sakit', 'Swasta', 'infoPKU@ekahospital.com', 'Jl. Ir Soekarno-Hatta Km 6.5, Pekanbaru, Riau 28282', '(+62-761) 698 99 99', 0.48240568492929703, 101.41968727111816, 'eka.jpg', '6'),
(5, ' Prof. Dr. Tabrani', 'Rumah Sakit', 'Swasta', 'rsprofdrtabranirab@yahoo.co.id', 'Jl. Jend. Sudirman, No. 410, Pekanbaru - Riau, 28282', '(0761) - 35464 / 35467', 0.5089062592241947, 101.4497085660696, 'tabrani.jpg', '6'),
(6, 'Tentara Tingkat IV Pekanbaru', 'Rumah Sakit', 'RSUD', '', 'Jl. Kesehatan No. 2, Kp. Bandar, Senapelan, Kota Pekanbaru, Riau', '	(0761) 22426', 0.5364446941284924, 101.44108057022095, 'rumah-sakit-tentara-tingkat-iv-pekanbaru.jpg', '16'),
(8, 'Eria Bunda', 'Rumah Sakit', 'Swasta', '', 'Jl. KH. Ahmad Dahlan No.163, Kp. Tengah, Sukajadi, Kota Pekanbaru, Riau 28122, Indonesia', '+62 761 23100', 0.5123514198802543, 101.4381093531847, 'rsiaeb_luar.jpg', '2'),
(9, 'Jiwa Tampan', 'Rumah Sakit', 'RSUD', '', 'Jl. HR. Soebrantas KM. 12.5, Simpang Baru, Tampan, Kota Pekanbaru, Riau 28293, Indonesia', '+62 761 63240', 0.46491827980488654, 101.38260841369629, 'rsj.jpg', '8'),
(10, 'Umum Daerah Arifin Achmad', 'Rumah Sakit', 'RSUD', 'rsudarifinachmad@riau.go.id', 'Jl. Diponegoro No.2, Sumahilang, Pekanbaru Kota, Kota Pekanbaru, Riau 28125, Indonesia', '		 0761 - 21618, 21657, 855702', 0.5234955429996724, 101.45236730575562, 'ariahmad.jpeg', '13'),
(11, 'Budhi Mulia', 'Rumah Sakit', 'Swasta', 'informasi_budhimulia@yahoo.com', 'Jalan Soekarno Hatta No. 226-228, Sidomulyo Tim., Pekanbaru, Kota Pekanbaru, Riau 28289', '07618417200', 0.47667132290678116, 101.41893558204174, 'budhimu.jpg', '6'),
(12, 'Annisa', 'Rumah Sakit', 'Swasta', '', 'Jl. Garuda No. 66 Tangkerang Tengah, Wonorejo, Marpoyan Damai, Kota Pekanbaru, Riau 28121', '(0761) 848652', 0.5070676772094144, 101.44777938723564, 'rsannisa.jpg', '6'),
(13, 'Ibu dan Anak Andini', 'Rumah Sakit', 'Swasta', '', 'Jl. Tuanku Tambusai No.55, Sukajadi, Pekanbaru. Riau - 28125', '(0761) 33612', 0.5030438494708686, 101.42843529582024, 'andini.JPG', '6'),
(14, 'MATA SMEC Pekanbaru', 'Rumah Sakit', 'Swasta', 'info@rsmatasmec.com', 'Jl. Arifin Ahmad No.58, Tengkerang Bar., Marpoyan Damai, Kota Pekanbaru, Riau 28289', '(0761) 565686', 0.4803078, 101.4402769, 'rumah-sakit-mata-smec.jpg', '6'),
(15, 'Universitas Riau', 'Rumah Sakit', 'RSUD', '', 'Kampus Bina Widya, Simpang Baru KM 12,5, Tampan, Simpang Baru, Tampan, Kota Pekanbaru, Riau 28293', '	0851-0560-300', 0.4695261616819373, 101.38047873973846, 'rsur.jpg', '8'),
(16, 'JMB Pekanbaru', 'Rumah Sakit', 'Swasta', '', 'Jl. Sekolah No.53, Limbungan Baru, Rumbai Pesisir, Kota Pekanbaru, Riau 28266', '(0761) 53171', 0.5603286712219598, 101.43788941204548, 'jmb.jpg', '11'),
(17, 'Syafira', 'Rumah Sakit', 'Swasta', 'info@rs-syafira.com', 'Jalan Jenderal Sudirman No.134 Pekanbaru, Riau', '(0761) 37927 - 37947', 0.49858015364182384, 101.45470418035984, 'syafira.jpg', '6'),
(18, 'Tni Au Lanud Pekanbaru', 'Rumah Sakit', 'RSUD', '', 'Jl. Adi Sucipto No.12, Maharatu, Marpoyan Damai, Kota Pekanbaru, Riau 28288', '(0761) 61456', 0.4633304641642433, 101.43014721572399, 'auri.jpeg', ''),
(19, 'Umum Daerah Petala Bumi', 'Rumah Sakit', 'RSUD', '', 'Jalan Dr. Soetomo No. 65, Sekip, Lima Puluh, Kota Pekanbaru, Riau 28155', '	(0761) 23024', 0.5289670186081705, 101.45699143409729, 'petala.jpg', '14'),
(20, 'Islam Ibnu Sina', 'Rumah Sakit', 'Swasta', 'info@rsibnusina.or.id', 'Jl. Melati No.60, Sukajadi, Pekanbaru. Riau - 28122', '(0411) 452917 / 452958', 0.5256298213720371, 101.43649868667126, 'RSI-ibnu-sina-pekanbaru.jpg', '2'),
(21, 'Ibu dan Anak Zainab', 'Rumah Sakit', 'Swasta', 'Rs_Zainab@yahoo.com', 'Jl.Ronggowarsito I No.1 Pekanbaru', '	(0761) 24000, 25444', 0.513795, 101.454695, 'zainab.jpg', '17'),
(22, 'Pekanbaru Medical Centre (Pmc)', 'Rumah Sakit', 'Swasta', '', 'Jl. Lembaga Pemasyarakatan No.25, Suka Maju, Sail, Kota Pekanbaru, Riau', '	(0761) 848100', 0.5089894044232816, 101.46219223737717, 'pmc.jpg', '17'),
(23, 'Bhayangkara Pekanbaru', 'Rumah Sakit', 'RSUD', 'rsb_pekanbaru@yahoo.com', ' Jl. RA Kartini No.14, Simpang Empat, Pekanbaru Kota, Kota Pekanbaru, Riau 28156, Indonesia', '	+62 761 47691', 0.5205224377043945, 101.44896291196346, 'RS-Bhayangkara-Pekanbaru-POLDA-Riau.jpg', '13'),
(24, 'Aulia Hospital', 'Rumah Sakit', 'Swasta', 'info@auliahospital.co.id', 'Jl. HR. Soebrantas No. 63, Tampan, Pekanbaru. Riau - 28291', ' (0761) 6700000', 0.4638896864364514, 101.38526849448681, 'aulia.jpg', '8'),
(25, 'Mata Pekanbaru', 'Rumah Sakit', 'Swasta', '', 'Jl. Soekarno - Hatta No.236, Sidomulyo Tim., Marpoyan Damai, Kota Pekanbaru, Riau 28282', '(0761) 7875191 , 7875192', 0.47553410554735137, 101.41863450407982, 'rsmata.jpg', '6'),
(26, 'Bina Kasih Pekanbaru', 'Rumah Sakit', 'Swasta', '', 'Jl. Samanhudi, No.3-5, Sago, Senapelan, Kota Pekanbaru, Riau', '	(0761) 21718', 0.5355797195735934, 101.44555985927582, 'binaksih.jpg', '16'),
(27, 'Ahmad Yani', 'Rumah Sakit', 'Swasta', '', ' JL. Ahmad Yani | No 73, Sukajadi, Pekanbaru. Riau - 28126', '			(0761) 23954', 0.5209274345390159, 101.4434590190649, 'ayani.jpg', '2'),
(28, 'Sansani', 'Rumah Sakit', 'Swasta', '', 'Jl. Soekarno Hatta, Sidomulyo Tim., Marpoyan Damai, Kota Pekanbaru, Riau', '(0761) 564666', 0.45535114878329297, 101.4186680316925, 'sansa.jpg', '6'),
(29, 'Santa Maria', 'Rumah Sakit', 'Swasta', 'rssmpku@gmail.com', 'Jalan Nangka, Sukajadi, Pekanbaru. Riau - 281260', '(0761) 22213', 0.527816399871734, 101.44239149987698, 'sm.jpg', '2'),
(30, 'Ibu dan Anak Labuh Baru', 'Rumah Sakit', 'RSUD', 'rsialabuhbaru80@yahoo.com', 'Jl. Durian No.43b, Labuh Baru Tim., Payung Sekaki, Kota Pekanbaru, Riau 28156', '(0761) 37564', 0.5170591772885886, 101.42657451331615, 'labuh.jpg', '9'),
(31, 'Lancang Kuning', 'Rumah Sakit', 'Swasta', '', 'Jalan Ronggowarsito Ujung | No.5a, Sail, Pekanbaru. Riau - 28132', '	(0761) 859273 / 859274', 0.5128150882081092, 101.46467696875334, 'lk.jpg', '17'),
(32, 'Payung Sekaki', 'Puskesmas', 'Non Rawat Inap', '', 'Jl. Fajar No.21 kec. Payung Sekaki', '0761 62563', 0.5119859, 101.4156958, 'pksps.jpg', '9'),
(33, 'Simpang Baru', 'Puskesmas', 'Non Rawat Inap', '', 'Jl. Flamboyan No. 100', '081268223111', 0.4804501, 101.3710682, 'smpbru.JPG', '8'),
(34, 'Sidomulyo', 'Puskesmas', 'Non Rawat Inap', '', 'Jl. Raya Pekanbaru - Bangkinang', '0761 63170', 0.4649642, 101.3988284, 'puskesmassidomulyo.jpg', '8'),
(35, 'RI Sidomulyo', 'Puskesmas', 'Rawat Inap', '', 'Jalan Garuda, Delima', '0761-705186', 0.4699251, 101.4060134, 'risudi.JPG', '8'),
(36, 'Harapan Raya', 'Puskesmas', 'Non Rawat Inap', '', 'Jl. Imam Munandar No.40', '		0761 26326', 0.4994874, 101.4559598, 'haray.jpg', '19'),
(38, 'Garuda', 'Puskesmas', 'Non Rawat Inap', '', 'Jl. Garuda No. 12 A', '0761 7051494', 0.4918515, 101.4447984, 'pgaruda.png', '6'),
(39, 'Tenayan Raya', 'Puskesmas', 'Rawat Inap', '', 'Jl. Budi Luhur', '	0761 3059830', 0.501994, 101.485681, 'ptenayan.JPG', '15'),
(40, 'Rejosari', 'Puskesmas', 'Non Rawat Inap', '', 'Jl. Taman sari No.3', '	0761 3059830', 0.5202509, 101.4829361, 'prejo.jpg', '15'),
(41, 'LIma Puluh', 'Puskesmas', 'Non Rawat Inap', '', 'Jl. Sumber Sari', '	076136436', 0.5403304, 101.4635235, 'lima_puluh.jpg', '14'),
(42, 'kecantikan aurellyn', 'Klinik', '', '', 'Jl.Jendral Sudirman No.175, Tengkerang Sel., Bukit Raya, Kota Pekanbaru, Riau 28125', '		(0761) 853555', 0.4959428, 101.4554789, 'AURELLYN-CLINIC.jpg', '19'),
(43, 'Al Kadriah ', 'Klinik', '', '', 'Jl. H. Rsoebratasno 148, Delima, Tampan, Kota Pekanbaru, Riau 28289', '(0761) 62265', 0.46408346968352376, 101.40906505286694, 'kadriah.JPG', '8'),
(44, 'Aisyiyah', 'Klinik', 'Pratama', '', 'Jl. KH Ahmad Dahlan NO 83', '', 0.514401, 101.437462, 'Klinik-Pratama-Aisyiyah (1).jpg', '2'),
(45, 'Aira Skin Care', 'Klinik', 'Pratama', '', 'Jl. T. Tambusai No. 18 EF', '(0761) 571656', 0.501024, 101.421192, 'aira.JPG', '6'),
(46, 'Annisa Medika 2', '', 'Pratama', '', 'Jl. HR. Soebrantas No. 107', '', 0.4634874, 101.4146383, 'medika2.jpg', '8'),
(47, 'Afiyah', 'Klinik', 'Pratama', '', 'Jl. Fajar IV Labuh Baru', '0811-765-362', 0.5123829, 101.4139222, '', '9'),
(48, 'Amanda Clinik', 'Klinik', 'Utama', '', 'JL. Kartini No.31', '	0812-7003-466', 0.520808, 101.451098, 'amnda.JPG', '13'),
(49, 'Auladi Medika', 'Klinik', 'Utama', '', 'Jl. H. Imam Munandar No.135Tengkerang Labuai, Bukit Raya, Pekanbaru City, Riau 28131, ', '			', 0.4999547, 101.4769742, 'auladi.jpg', '19'),
(50, 'Astrid Medika', 'Klinik', 'Pratama', '', 'Jl. Hangtuah Ujung Tenayan Raya', '	', 0.4861647, 101.5199887, 'astd.jpg', '15'),
(51, 'Amanah', 'Klinik', 'Pratama', '', 'Jl. Suka Karya No.124, Tuah Karya, Tampan, Kota Pekanbaru, Riau 28293', '', 0.457561, 101.3878655, 'amnah.jpg', '8'),
(52, ' Amanah Ayah Bunda', 'Klinik', 'Pratama', '', 'Soekarno Hatta-99C-D', '(0761) 6704164', 0.4796188, 101.4184848, '', '6'),
(53, 'Bina Kasih', 'Klinik', 'Pratama', '', 'jl. Riau no 51 D, kecamatan Payung Sekaki, Prkanbaru', '085107192227', 0.5350272, 101.421416, 'binakasih2.png', '9'),
(54, 'Bintang Jaya', 'Klinik', 'Pratama', '', 'KH. Ahmad Dahlan-99C', '0821-8939-9328', 0.4409576, 101.4481831, 'bintjaya.png', '6'),
(55, 'Anugerah Medika', 'Klinik', 'Pratama', '', 'KH. Nasution-120', '		', 0.468701, 101.454478, 'smpng3.png', '19'),
(56, 'Bunda Medical Centre', 'Klinik', 'Pratama', '', 'Jalan. Paus-32 F', '0851-0561-7614', 0.5693571, 101.438214, 'bmc.png', '11'),
(57, 'Cendana Husada', 'Klinik', 'Pratama', '', 'Jl. Jati No.76, Kp. Baru, Senapelan, Kota Pekanbaru, Riau 28155', '	(0761) 860479', 0.5375846, 101.4336106, '', '16'),
(58, 'Cahaya Amanah Medika', 'Klinik', 'Pratama', '', 'Hangtuah-01', '	', 0.5070167, 101.4973114, 'cahayaamanah.png', '15'),
(59, 'Circum Medika', 'Klinik', 'Pratama', '', 'Jl. Paus-88', '', 0.501258, 101.439286, '', '6'),
(61, 'Simpang Tiga', 'Puskesmas', 'Rawat Inap', '', 'Jl. Imam Munandar-40', '(0761) 26326', 0.499488, 101.456096, 'psimpangtga.JPG', '7'),
(62, 'Sail', 'Puskesmas', 'Non Rawat Inap', '', 'Jl. Hang Jebat No.15', '	(0761) 21640', 0.522332, 101.460711, 'psail.jpg', '17'),
(63, 'Langsat', 'Puskesmas', 'Non Rawat Inap', '', 'Jl. Langsat No.13', '(0761) 21051', 0.513432, 101.444202, 'plangsat.png', '2'),
(64, 'Melur', 'Puskesmas', 'Non Rawat Inap', '', 'Jl. Melur No.103', '(0761) 22508', 0.525365, 101.434511, 'pmelur.png', '2'),
(65, 'Senapelan', 'Puskesmas', 'Non Rawat Inap', '', 'Jl. Jati-04', '	', 0.537696, 101.435943, 'psenapelan.png', '16'),
(66, 'Muara Fajar', 'Puskesmas', 'Rawat Inap', '', 'Raya Pekanbaru Km 18 ', '', 0.623791, 101.421129, 'mfajr.JPG', '10'),
(67, 'Umban Sari', 'Puskesmas', 'Non Rawat Inap', '', 'Jalan Purnama Sari No.1', '(0761) 51764', 0.569418, 101.417201, 'pumban.png', '10'),
(68, 'Rumbai', 'Puskesmas', 'Non Rawat Inap', '', ' Jl. Sekolah No.52, Meranti Pandak', ' (0761) 53537', 0.560234, 101.44106, 'prumbai.png', '11'),
(69, 'Karya Wanita', 'Puskesmas', 'Rawat Inap', '', 'Jl. Raya Gabus No.3, Limbungan Baru', '(0761) 53126', 0.561565, 101.440387, 'pwanita.jpg', '11'),
(70, 'Rumbai Bukit', 'Puskesmas', 'Non Rawat Inap', '', 'Jl. Palas, Rumbai Bukit', '		', 0.607778, 101.401782, 'pbukit.png', '10'),
(71, 'Daffa', 'Klinik', 'Pratama', '', 'Paus-99B', '(0761) 9887748', 0.494712, 101.43842, 'daffa.png', '6'),
(72, 'Deliana', 'Klinik', 'Pratama', '', 'Soekarno Hatta-363', '', 0.433418, 101.42597, 'deliana.png', '8'),
(73, 'Dokter Keluarga', 'Klinik', 'Pratama', '', 'Jl. Jendral No.43, Labuh Baru Tim., Payung Sekaki, Kota Pekanbaru, Riau 28291', '(0761) 8400902', 0.523193, 101.422093, 'keluarga.png', '9'),
(74, 'Diva', 'Klinik', 'Pratama', '', 'Arifin Achmad-138D', '0821-7442-3322', 0.480295, 101.434703, 'diva.png', '6'),
(75, 'dr. Hasni', 'Klinik', 'Pratama', '', ' Jalan Hr. Subrantas, Tuah Karya', '(0761) 66056', 0.463739, 101.390871, 'hasni.png', '8'),
(76, 'dr. Eka', 'Klinik', 'Pratama', '', 'Jl. Yos Sudarso No.30', '(0761) 52760', 0.561665, 101.432766, 'eka.png', '10'),
(77, 'Eszquera', 'Klinik', 'Utama', '', 'Gatot Subroto-36C', '	0812-6184-9839', 0.52992, 101.454343, 'ezquera.png', '14'),
(78, 'Dokter Misbah Rumbai Medical Center', 'Klinik', 'Pratama', '', 'JL. Sembilang, No. 53, Rumbai', '0812-7650-454', 0.561619, 101.449495, 'misbah.png', '11'),
(79, 'dr. Herlinda', 'Klinik', 'Pratama', '', 'Jl. HR. Soebrantas Panam, Delima', '', 0.464647, 101.398142, 'herlinda.png', '8'),
(80, 'Dhuha Medika', 'Klinik', 'Pratama', '', 'jl. Soekarno Hatta-8', '(0761) 968353', 0.425363, 101.435102, 'darel.png', '6'),
(81, 'Dilla', 'Klinik', 'Pratama', '', 'Jl. Kartama No.51, Maharatu', '0812-6506-830', 0.443655, 101.438772, 'dilla.png', '6'),
(82, 'Harapan Medika', 'Klinik', 'Pratama', '', 'Jl. H. Imam Munandar No.41, Tengkerang Utara', '		', 0.499992, 101.455701, 'harapanmedika.png', '19'),
(83, 'Hasanah', 'Klinik', 'Pratama', '', 'Jl. Pangeran Hidayat, Sukarama', '	(0761) 854289', 0.524291, 101.445957, 'hasanah.png', '13'),
(84, 'Hangtuah', 'Klinik', 'Pratama', '', 'Jl. Hangtuah-38, Rejosari', '	', 0.518013, 101.484282, 'hangtuah.jpg', '15'),
(85, 'Indi Medika', 'Klinik', 'Pratama', '', 'Jl. Kaharuddin Nst No.98C, Maharatu', '(0761) 678280', 0.45658, 101.452465, 'indiamed.png', '6'),
(86, 'Indo Sehat', 'Klinik', 'Pratama', '', 'Jl. Kaharudin Nasution, No. 36 - 39', ' 0822-8849-8728', 0.438104, 101.446849, 'indosehat.png', '6'),
(87, 'Inpres', 'Klinik', 'Pratama', '', 'Jl. Inpres, Maharatu', '', 0.455631, 101.424711, 'inpres.png', '6'),
(88, 'Jambu Mawar', 'Klinik', 'Pratama', '', ' Jl. Jambu Mawar', '		', 0.538259, 101.411322, 'jambu.png', '9'),
(89, 'Kartika Utama', 'Klinik', 'Pratama', '', 'Jl. Jend. Ahmad Yani, Kota Baru', '', 0.529411, 101.442491, 'kartika.png', '1'),
(90, 'Kecantikan Natsha Skin', 'Klinik', 'Pratama', '', 'Jl. Dr. Sutomo No. 55, Sekip', '	(0761) 41878', 0.530236, 101.456701, 'natashaa.png', '14'),
(91, 'Keluarga Sehat dr. Bastian', 'Klinik', 'Pratama', '', 'Jl. Garuda Sakti KM.2, Simpang Baru', '0821-7171-1999', 0.479252, 101.366095, 'bastian.jpg', '8'),
(92, 'Kecantikan MMC Body Care', 'Klinik', 'Pratama', '', 'Jl. KH. Ahmad Dahlan No.29', '																	0852-8354-999', 0.514413, 101.437778, 'mmc.png', '2'),
(95, 'Awal bros Pekanbaru', 'Rumah Sakit', 'Swasta', '', 'Jalan Jend. Sudirman No. 117', '(0761) 47333', 0.496501, 101.456274, 'abospku.jpg', '19'),
(96, 'xyz', 'Rumah Sakit', 'RSUD', 'sshd@yahoo.com', 'jl.garuda', '077576', 0.5513678326116751, 101.44998550415039, '', '14');

-- --------------------------------------------------------

--
-- Table structure for table `spesialis`
--

CREATE TABLE `spesialis` (
  `id_spesialis` int(11) NOT NULL,
  `jenis_spesialis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spesialis`
--

INSERT INTO `spesialis` (`id_spesialis`, `jenis_spesialis`) VALUES
(1, 'Umum'),
(2, 'Gigi'),
(3, 'Mata'),
(4, 'THT'),
(5, 'Jantung'),
(6, 'Kandungan'),
(7, 'Bedah'),
(8, 'Gizi'),
(9, 'Anak'),
(10, 'Penyakit Dalam'),
(11, 'Saraf'),
(12, 'Jiwa'),
(13, 'Ortopedi'),
(14, 'Fisioterapi');

-- --------------------------------------------------------

--
-- Table structure for table `spesialis_puskes`
--

CREATE TABLE `spesialis_puskes` (
  `id_puskes` int(11) NOT NULL,
  `id_spesialis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spesialis_puskes`
--

INSERT INTO `spesialis_puskes` (`id_puskes`, `id_spesialis`) VALUES
(3, '1, 3, 4, 7, 9, 10, 11, 13'),
(4, '1, 2, 3, 5, 6, 7, 8, 9, 11, 13'),
(5, '1, 2, 3, 4, 6, 7, 9, 10, 11, 13'),
(6, ''),
(8, ''),
(9, '1, 2, 9, 10, 11, 12'),
(10, '1, 2, 3, 4, 5, 7, 9, 10, 11, 13'),
(11, '1, 6, 9'),
(14, '3'),
(15, '1, 2, 6, 9, 10'),
(16, '1'),
(17, '1, 2, 3, 4, 5, 6, 9, 10, 11, 13'),
(20, '1, 2, 3, 4, 5, 6, 7, 9, 10, 11, 13'),
(13, '1, 6, 9'),
(12, '6, 9'),
(18, ''),
(19, '1, 2, 3, 4, 6, 7, 9, 10, 11, 13, 14'),
(22, ''),
(23, ''),
(24, '1, 2, 4, 5, 6, 7, 9, 10, 11, 12, 13'),
(25, '3'),
(26, '1, 2, 3, 4, 5, 9, 10, 11'),
(27, '1, 3, 4, 6, 9, 10, 11, 12'),
(28, '1, 8'),
(29, '1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13'),
(31, '1, 2, 6, 7, 9, 10, 11, 12'),
(2, '1, 2, 3, 5, 6, 7, 8, 9, 10, 11, 12, 13'),
(35, '1, 2, 4, 6, 9'),
(34, '1, 2, 9'),
(48, '1, 4, 7, 10, 12, 14'),
(51, '1, 2, 6'),
(95, '1, 2, 4, 5, 6, 7, 9, 10, 11, 12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `puskes`
--
ALTER TABLE `puskes`
  ADD PRIMARY KEY (`id_puskes`);

--
-- Indexes for table `spesialis`
--
ALTER TABLE `spesialis`
  ADD PRIMARY KEY (`id_spesialis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `puskes`
--
ALTER TABLE `puskes`
  MODIFY `id_puskes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `spesialis`
--
ALTER TABLE `spesialis`
  MODIFY `id_spesialis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
