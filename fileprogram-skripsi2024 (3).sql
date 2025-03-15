-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2024 at 06:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fileprogram-skripsi2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_tikets`
--

CREATE TABLE `data_tikets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namawst` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_tikets`
--

INSERT INTO `data_tikets` (`id`, `namawst`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Pantai Pangandaran + Batuhiu', '20000', '2024-07-09 15:29:12', '2024-07-09 15:29:12'),
(2, 'Pantai Batukaras + Madasari', '15000', '2024-07-09 15:36:54', '2024-07-09 15:37:10'),
(3, 'Green Canyon (Cukang Taneuh)', '10000', '2024-07-09 15:38:18', '2024-07-09 15:38:18'),
(4, 'Pantai Karapyak', '6000', '2024-07-09 15:38:43', '2024-07-09 15:38:43'),
(5, 'Curug Bojong', '10000', '2024-07-09 15:40:00', '2024-07-09 15:40:00'),
(6, 'Pantai Karang nini', '7500', '2024-07-09 15:41:08', '2024-07-09 15:41:08'),
(7, 'Body Rafting Santirah', '125000', '2024-07-09 15:41:34', '2024-07-09 15:41:34'),
(8, 'Body Rafting Ciwayang', '150000', '2024-07-09 15:42:08', '2024-07-09 15:42:08'),
(9, 'Taman Wisata Alam (Cagar Alam)', '16000', '2024-09-27 15:35:34', '2024-09-27 15:35:34'),
(10, 'Body Rafting Citumang', '110000', '2024-09-27 15:36:59', '2024-09-27 15:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `data_wisatas`
--

CREATE TABLE `data_wisatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `readmore` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imgheader` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_wisatas`
--

INSERT INTO `data_wisatas` (`id`, `title`, `image`, `deskripsi`, `readmore`, `fasilitas`, `imgheader`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Pantai Pangandaran', 'uploads/1720547621.jpg', 'Pantai Pangandaran merupakan salah satu obyek wisata alam yang dimiliki oleh Kabupaten Pangandaran. Pantai Pangandaran terletak di sebelah tenggara Jawa Barat, tepatnya di Desa Pangandaran dan', 'Pananjung, sekitar 222 km dari selatan Bandung, Kecamatan Pangandaran,Kabupaten Pangandaran, Provinsi Jawa Barat. Pantai Pangandaran memiliki berbagai keistimewaan diantaranya Dapat Melihat matahari terbit dan tenggelam dari satu tempat sama, terdapat pantai dengan pasir putih, bisa digunakan untuk berenang,  terdapat tanaman laut dengan ikan - ikan yang bagus dll. Di Pantai Pangandaran sendiri terdapat beberapa tempat yang dapat dikunjungi yaitu seperti Pantai Timur, Pasir Putih dan Pantai Barat Pangandaran.', '1,2,3,4,5,6,8,9,10,11,12,13,15,17,18,20,23', 'uploads/1720547621.png', 'Pangandaran, Kec. Pangandaran, Kab. Pangandaran, Jawa Barat 46396.', '2024-07-09 10:53:41', '2024-07-09 10:53:41'),
(2, 'Pantai Karapyak', 'uploads/1720547796.jpg', 'Pantai Karapyak merupakan salah satu pantai yang berada di Pangandaran yang terletak di Desa Bagolo Kecamatan Kalipucang. Destinasi ini memiliki daya tarik wisata berupa hamparan pasir putih', 'yang dipadukan dengan bebatuan karang sepanjang garis pantainya. Pantai Karapyak juga merupakan salah satu spot yang pas untuk melihat terbit dan tenggelamnya matahari. Walaupun tidak bisa digunakan untuk berenang, destinasi wisata Pantai Karapyak memiliki sisi eksotis tersendiri dibalut hamparan pasir putih yang memanjakan mata, nyiur kelapa yang melambai disentuh hembusan angin nan sejuk berpadu dengan desir ombak, semua itu bersatu padu memberikan kesan bagi para wisatawan yang datang.', '1,2,3,4,5,6,7,19', 'uploads/1720547796.png', 'Bagolo, Kec. Kalipucang, Kab. Pangandaran, Jawa Barat 46397', '2024-07-09 10:56:36', '2024-07-09 10:56:36'),
(3, 'Pantai Batuhiu', 'uploads/1720547894.jpg', 'Pantai Batu Hiu merupakan destinasi wisata alam yang menawarkan keindahan laut lepas Samudera Hindia dari bukit karang. Pantai Batu Hiu kerap disebut sebagai Tanah Lot nya Jawa Barat karena memiliki batu karang yang menjorok ke tengah laut seperti halnya Tanah Lot di Pulau Bali. Selain itu, terdapat sebuah', 'batu karang di tengah laut yang bentuknya menyerupai ikan hiu. Pantai Batu Hiu menjadi tujuan favorit wisatawan yang ingin beristirahat sembari menghabiskan bekal makan siang karena memiliki hamparan rumput yang hijau, ditumbuhi vegetasi Pandan Wong yang memberikan nuansa teduh serta semilir angin laut yang semakin menambah kenyamaan wisatawan untuk bersantai menghilangkan lelah setelah menjelajahi destinasi wisata lain yang berada di Kabupaten Pangandaran. Pantai Batu Hiu juga kerap menjadi lokasi foto shoot pre-wedding karena memiliki panorama alam yang indah.', '1,2,3,5,6,14,21', 'uploads/1720547894.png', 'Jl. Raya Parigi, Ciliang, Kec. Parigi, Kabupaten Ciamis, Jawa Barat 46393', '2024-07-09 10:58:14', '2024-07-09 10:58:14'),
(4, 'Pantai Batukaras', 'uploads/1720548118.jpg', 'Pantai Batukaras merupakan salah satu destinasi wisata pantai yang berlokasi di Desa Batukaras, Kecamatan Cijulang, Pangandaran. Pantai Batukaras menawarkan daya tarik pantai yang', 'landai, ombak yang bagus untuk berenang, berselancar dan permainan air seperti banana boat dan sebagai spot yang tepat untuk bersantai menikmati sunset dan sunrise.  Batukaras menawarkan beberapa tempat yang cocok untuk berkemah dan hiking diantaranya adalah Karangnunggal yaitu pantai terpencil di area Batukaras yang memiliki bukit karang menjulang tinggi di bibir pantai yang sangat indah.  Pantai dengan ombak yang landai menjadikan pantai Batukaras sebagai tempat favorit wisatawan mancanegara dan wisatawan domestik yang memiliki hobi untuk berselancar,', '1,2,3,4,5,6,8,12,14,17,22,23', 'uploads/1720548118.png', '7F6W+PPC, Batukaras, Kec. Cijulang, Kab. Pangandaran, Jawa Barat 46394', '2024-07-09 11:01:58', '2024-07-09 11:01:58'),
(5, 'Cukang Taneuh/Green Canyon', 'uploads/1720548417.jpg', 'Green Canyon merupakan wisata alam berupa aliran sungai yang diapit oleh dua buah bukit bebatuan yang menembus gua. Pada mulut goa dihiasi gemercik tetesan air yang menyerupai hujan abadi yang memberikan kesan kesempurnaan akan', 'keindahan alam. Green Canyon terletak di Desa Kertayasa, Kecamatan Cijulang, Kabupaten Pangandaran ini memiliki beberapa titik atraksi wisata diantaranya Gua Cukang Taneuh, Batu Tengah, Batu Payung dan Pemandian Putri. Green Canyon menawarkan aktivitas wisata mulai dari berperahu untuk wisatawan yang hanya ingin sekedar menikmati pemandangan alam, berenang, body rafting, terjun ke dalam air dan menjelajahi tebing bagi wisatawan yang menyukai tantangan yang memacu adrenalin. Waktu yang tepat untuk berkunjung ke Green Canyon adalah musim kemarau, karena ketika musim hujan turun maka debit air sungai akan naik. Green Canyon buka setiap hari mulai dari jam 08.00 WIB – 16.00 WIB, kecuali hari Jumat buka jam 13.00 WIB – 16.00 WIB.', '1,2,3,5,6,8,13,17,25', 'uploads/1720548417.png', 'Jl. Raya Cijulang, RT.02/RW.10, Dusun. Karangpaci, Kertayasa, Kec. Cijulang, Kab. Pangandaran, Jawa Barat 46394', '2024-07-09 11:06:57', '2024-07-09 11:06:57'),
(6, 'Body Rafting Citumang', 'uploads/1720548642.jpg', 'Citumang adalah salah satu obyek wisata air yang berada di Pangandaran. Citumang merupak obyek wisata terbaik untuk melakukan aktivitas wisata berupa body rafting yang cocok sebagai', 'wisata keluarga. Aktivitas yang bisa dilakukan di citumang selain body rafting adalah melompat dari tebing kemudian menceburkan diri ke sungai, kemudian terdapat satu spot berupa tangga tambang yang terletak di atas sungai sebagai akses ke atas pohon yang tinggi kemudian dari atas pohon tersebut bisa melompat ke sungai. Selain itu Citumang juga memiliki spot lainnya berupa kolam terapi ikan yang lokasinya terletak dekat gua dan menjadi start awal memulai aktivitas body rafting.', '2,3,5,6,19,23', 'uploads/1720548642.png', 'Citumang Parkir 1 Sukamanah, Bojong, Kec. Parigi, Kab. Pangandaran, Jawa Barat 46393', '2024-07-09 11:10:42', '2024-07-09 11:10:42'),
(7, 'Taman Wisala Alam (Cagar Alam)', 'uploads/1720548746.jpg', 'Cagar Alam Pangandaran adalah salah satu kawasan konservasi alam yang terletak di Desa Pangandaran. Masih berada satu kawasan dengan Pantai Pangandaran, Taman Wisata Alam (TWA) Cagar Alam Pangandaran dapat diakses melalui pintu', 'masuk jalur Pantai Barat maupun Pantai Timur Pangandaran. Selain itu wisatawan juga dapat menyewa perahu dari Pantai Barat Pangandaran menuju Pantai Pasir Putih Cagar Alam Pangandaran. Memasuki kawasan Cagar Alam, Wisatawan dapat melihat keragaman flora dan fauna seperti kera ekor panjang, Lutung, Rusa, Kalong, Landak Jawa, Biawak dan Bunga Raflesia serta beragam peninggalan sejarah seperti Situs Batu Kalde, Situs Gua Parat, Situs Batu Meja, Goa Jepang, Goa Lanang, Goa Panggung dan Pemandian Cirengganis. Selain daya tarik flora fauna dan budaya, wisatawan juga dapat melalukan snorkeling di area Pantai Pasir Putih. Pantai Pasir Putih merupakan Salah satu spot foto instagramable dan disukai wisatawan yaitu bangkai kapal penangkap ikan yang ditenggelamkan oleh Ibu Susi Pudjiastuti yang sewaktu itu menjabat sebagai Menteri Kelutan dan Perikanan Republik Indonesia. Keindahan pasir putih dan serunya snorkeling di kawasan ini membuat wisatawan betah untuk berlama-lama disini.', '1,2,3,5,6,24', 'uploads/1720548746.png', 'Pananjung, Kec. Pangandaran, Kab. Pangandaran, Jawa Barat 46396', '2024-07-09 11:12:26', '2024-07-09 11:12:26'),
(8, 'Pantai Karang Nini', 'uploads/1720548870.jpg', 'Pantai Karang Nini merupakan salah satu Pantai yang berada di Pangandaran lebih tepatnya berada di Emplak, Kec.Kalipucang. Seperti namanya, Pantai ini menyajikan pemandangan batu karang yang menjadi daya tarik', 'utama dari objek wisata ini. Wisatawan dapat menikmati pemandangan dari batu karang yang memecah ombak. Destinasi wana wisata ini merupakan surga tersembunyi. Ombaknya yang landai dan panorama pantainya yang tenang merupakan keunikannya. Selain itu kita juga bisa menikmati keindahan Karang Nini dari menara pandang ataupun dari ketinggian bukit sembari memandang birunya samudera lepas. Tidak hanya bukit, hutan dan pantai, disini juga terdapat mata air sumur tujuh yang dipercaya oleh masyarakat setempat dapat membuat awet muda. Di lokasi ini juga terdapat Muara Cipambokongan yang memiliki keunikan. Saat air laut surut wisatawan bisa melihat langsung berbagai jenis ikan hias dilekukan-lekukan terumbu karangnya. Suasana di tempat wisata ini masih tergolong asri dan cukup tenang. Cocok  untuk wisata yang ingin melepas penat atau mengisi liburan di akhir pekan.', '1,2,3,5,6,7,14,16', 'uploads/1720548870.png', 'Emplak, Kecamatan Kalipucang, Emplak, Kec. Kalipucang, Kab. Pangandaran, Jawa Barat 46397', '2024-07-09 11:14:30', '2024-07-09 11:14:30'),
(9, 'Curug Bojong', 'uploads/1720549013.jpg', 'Curug Bojong merupakan salah satu wisata air terjun yang berada di Desa Sukahurip  Kecamatan Pangandaran dan Kabupaten Pangandaran. Jaraknya sekitar 10 kilometer dari', 'Pantai Pangandaran menuju arah bukit Desa Sukahurip. Sepanjang perjalanan menuju Curug Bojong pengunjung akan disuguhi panorama khas pedesaan mulai dari persawahan yang hijau, kawasan perkampungan, jalan yang menanjak dan turunan serta pepohonan yang rindang. Air terjun Curug Bojong berbentuk tebing batuan hitam setinggi lebih dari 20 meter ini berdiri kokoh, bermandikan aliran air sungai.', '14,23,26', 'uploads/1720549013.png', '9M3J+J29, Sukahurip, Kec. Pangandaran, Kabupaten Ciamis, Jawa Barat 46396', '2024-07-09 11:16:53', '2024-07-09 11:16:53'),
(10, 'Pantai Madasari', 'uploads/1720549099.jpg', 'Pantai Madasari merupakan salah satu Pantai yang di ujung barat Pangandaran. Pantai Madasari ini salah satu pantai eksotis tersembunyi yang kini mulai', 'ramai dikunjungi. Madasari memiliki panorama yang sangat indah dengan hamparan pasir yang luas terbentang disepanjang pantainya. Hal yang paling unik di Pantai ini adalah keberadaan terumbu karang yang membentuk sekumpulan pulau – pulau kecil yang menyajikan pemandangan luar biasa dengan batuan karang yang cantik dan menjadi daya tarik bagi para wisatawan, terutama para pencinta fotograpi.', '2,3,5,6,7', 'uploads/1720549099.png', 'Jl. Pantai Wisata, Masawah, Kec. Cimerak, Kab. Pangandaran, Jawa Barat 46595', '2024-07-09 11:18:19', '2024-07-09 11:18:19'),
(11, 'Body Rafting Santirah', 'uploads/1720549276.jpg', 'Santirah merupakan salah satu objek wisata yang cocok untuk melakukan body rafting. Lokasi wisata ini terletak di Desa Selasari, Kecamatan Parigi, Kabupaten Pangandaran. Lokasi wisata Santirah ini sangat cocok untuk', 'yang suka alam yang alami karena suasana alamnya masih alami.  Santirah ini bisa dikatakan sebagai miniaturnya Green Canyon karena view sepanjang aliran sungai dihiasi batuan tebing juga seperti Green Canyon namun lebar sungai tidak terlalu lebar. Di sungai santirah, selain tebing dan pohon rindang, kamu bisa melihat beberapa air terjun.', '3,5,6,23,24', 'uploads/1720549276.png', 'Selasari, Kec. Parigi, Kab. Pangandaran, Jawa Barat 46393', '2024-07-09 11:21:16', '2024-07-09 11:21:16'),
(12, 'Body Rafting Ciwayang', 'uploads/1720549346.jpeg', 'Ciwayang Body Rafting merupakan salah satu destinasi wisata air yang terdapat di Desa Cimindi Kabupaten Pangandaran, Jawa Barat. Ciwayang adalah hulu sungai Green Canyon, sama seperti Green Canyon terdapat', 'relieve bebatuan di kanan kiri sungai yang eksotis. Sungai Ciwayang berada diantara tebing - tebing tinggi dan pepohonan rindang sehingga sangat terasa suasana alamnya. Ciwayang Body Rafting akan mengajak pengunjung menyusuri sungai dengan panjang trek 2,5 kilometer dengan 2 sampai 4 jam pengarungan. Selain itu terdapat spot jumping yang menjadi andalan di Sungai Ciwayang yang menguji andrenalin.', '3,5,6,23,24', 'uploads/1720549346.png', 'Jl. Jurago, Cimindi, Cigugur, Kab. Pangandaran, Jawa Barat 46392', '2024-07-09 11:22:26', '2024-07-09 11:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imgicon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaicon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `imgicon`, `namaicon`, `created_at`, `updated_at`) VALUES
(1, 'icons/1720469649.png', 'Hotel/Penginapan/Pondok', '2024-07-08 13:14:09', '2024-07-08 13:14:09'),
(2, 'icons/1720471183.png', 'Masjid/Mushola', '2024-07-08 13:18:13', '2024-07-09 04:33:02'),
(3, 'icons/1720533860.png', 'Tempat Parkir', '2024-07-09 07:04:20', '2024-07-09 07:04:20'),
(4, 'icons/1720546189.png', 'Cafe/Coffe Shop', '2024-07-09 10:29:49', '2024-07-09 10:29:49'),
(5, 'icons/1720546239.png', 'Toilet/Kamar Mandi Umun', '2024-07-09 10:30:39', '2024-07-09 10:30:39'),
(6, 'icons/1720546287.png', 'Restoran/Tempat Makan', '2024-07-09 10:31:27', '2024-07-09 10:31:27'),
(7, 'icons/1720546338.png', 'Tempat Perkemahan', '2024-07-09 10:32:18', '2024-07-09 10:32:18'),
(8, 'icons/1720546378.png', 'Pusat Informasi', '2024-07-09 10:32:58', '2024-07-09 10:32:58'),
(9, 'icons/1720546414.png', 'Tempat Pelayanan Pos & Telekomunikasi', '2024-07-09 10:33:34', '2024-07-09 10:33:34'),
(10, 'icons/1720546450.png', 'Tempat Money Changer', '2024-07-09 10:34:10', '2024-07-09 10:34:10'),
(11, 'icons/1720546503.png', 'Penyewaan ATV', '2024-07-09 10:35:03', '2024-07-09 10:35:03'),
(12, 'icons/1720546533.png', 'Banana Boat', '2024-07-09 10:35:33', '2024-07-09 10:35:33'),
(13, 'icons/1720546565.png', 'Penyewaan Perahu', '2024-07-09 10:36:05', '2024-07-09 10:36:05'),
(14, 'icons/1720546683.png', 'Pendopo/Gazebo', '2024-07-09 10:38:03', '2024-07-09 10:38:03'),
(15, 'icons/1720546725.png', 'Penyewaan Kuda', '2024-07-09 10:38:45', '2024-07-09 10:38:45'),
(16, 'icons/1720546755.png', 'Jogging Track', '2024-07-09 10:39:15', '2024-07-09 10:39:15'),
(17, 'icons/1720546831.png', 'Pasar Wisata/Pusat Oleh - Oleh', '2024-07-09 10:40:31', '2024-07-09 10:40:31'),
(18, 'icons/1720546859.png', 'Penyewaan Odong - odong', '2024-07-09 10:40:59', '2024-07-09 10:40:59'),
(19, 'icons/1720546901.png', 'Rest Area', '2024-07-09 10:41:41', '2024-07-09 10:41:41'),
(20, 'icons/1720546924.png', 'Penyewaan Sepeda', '2024-07-09 10:42:04', '2024-07-09 10:42:04'),
(21, 'icons/1720546965.png', 'Cendera Mata/Souvenir', '2024-07-09 10:42:45', '2024-07-09 10:42:45'),
(22, 'icons/1720547000.png', 'Penyewaan Papan Selancar', '2024-07-09 10:43:20', '2024-07-09 10:43:20'),
(23, 'icons/1720547036.png', 'Tempat Berenang', '2024-07-09 10:43:56', '2024-07-09 10:43:56'),
(24, 'icons/1720547164.png', 'Pemandu Wisata/Tour Guide', '2024-07-09 10:46:04', '2024-07-09 10:46:04'),
(25, 'icons/1720547191.png', 'Ruang Tunggu', '2024-07-09 10:46:31', '2024-07-09 10:46:31'),
(26, 'icons/1720547248.png', 'Air Terjun', '2024-07-09 10:47:28', '2024-07-09 10:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `datawisataid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `datawisataid`, `created_at`, `updated_at`, `latitude`, `longitude`) VALUES
(1, 1, '2024-08-04 05:02:11', '2024-08-06 15:37:47', -7.6961485, 108.6538016),
(2, 2, '2024-08-04 13:51:38', '2024-08-06 15:43:34', -7.6949938, 108.7593771),
(3, 3, '2024-08-04 14:00:05', '2024-08-06 15:42:16', -7.6923479, 108.5371547),
(4, 4, '2024-08-04 14:02:21', '2024-08-06 15:33:57', -7.7373972, 108.4976061),
(5, 5, '2024-08-06 15:39:22', '2024-08-06 15:39:22', -7.7349673, 108.4564475),
(6, 6, '2024-08-06 15:46:59', '2024-08-06 15:48:22', -7.6510832, 108.5374965),
(7, 7, '2024-08-06 15:49:38', '2024-08-06 15:51:03', -7.7054233, 108.6585302),
(8, 8, '2024-08-06 15:53:01', '2024-08-06 15:53:59', -7.6831999, 108.7353005),
(9, 9, '2024-08-06 15:55:20', '2024-08-06 15:56:28', -7.6459185, 108.6800969),
(10, 10, '2024-08-06 15:58:00', '2024-08-06 15:58:00', -7.7923535, 108.4963971),
(11, 11, '2024-08-06 15:59:22', '2024-08-06 15:59:22', -7.6204821, 108.5203904),
(12, 12, '2024-08-06 16:00:47', '2024-08-06 16:00:47', -7.6528775, 108.4485747);

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayarans`
--

CREATE TABLE `metode_pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metode_pembayarans`
--

INSERT INTO `metode_pembayarans` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'BCA', '2024-07-19 13:33:11', '2024-07-19 13:33:11'),
(2, 'MANDIRI', '2024-07-19 13:43:26', '2024-07-19 13:43:26'),
(3, 'BRI', '2024-07-19 13:43:57', '2024-07-19 13:43:57'),
(4, 'OVO', '2024-07-19 13:44:43', '2024-07-19 13:44:43'),
(5, 'GOPAY', '2024-07-19 13:45:46', '2024-07-19 13:45:46'),
(6, 'LINK AJA', '2024-07-19 13:46:21', '2024-07-19 13:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_06_175536_create_permission_tables', 1),
(6, '2024_07_06_180604_create_products_table', 2),
(7, '2014_10_12_100000_create_password_resets_table', 3),
(8, '2024_07_08_185311_create_data_wisatas_table', 3),
(9, '2024_07_08_193012_create_fasilitas_table', 4),
(10, '2024_07_09_204335_create_pengunjung_auths_table', 5),
(11, '2024_07_09_213304_create_data_tikets_table', 5),
(12, '2024_07_12_233134_add_datapengunjung_column_to_pengunjung_auths_table', 6),
(13, '2024_07_13_152612_create_pengunjungs_table', 7),
(14, '2024_07_13_153430_drop_datapengunjung_column_to_pengunjung_auths_table', 7),
(15, '2024_07_13_153513_drop_pengunjung_auths_table', 7),
(16, '2024_07_13_154259_drop_datapengunjung_column_to_pengunjung_auths_table', 8),
(17, '2024_07_13_154344_drop_pengunjung_auths_table', 8),
(18, '2024_07_14_111959_drop_pengunjungs_table', 9),
(20, '2024_07_14_114215_create_pengunjungs_table', 10),
(21, '2024_07_17_183151_create_pesan_tikets_table', 11),
(22, '2024_07_17_214328_drop_pesan_tikets_table', 11),
(23, '2024_07_17_221949_create_pesantikets_table', 12),
(24, '2024_07_17_222754_create_ordertikets_table', 12),
(25, '2024_07_17_223746_drop_ordertikets_table', 13),
(26, '2024_07_17_225155_add_datawisataid_column_to_pesantikets_table', 14),
(27, '2024_07_19_154237_create_pembayarans_table', 15),
(28, '2024_07_19_194250_create_metode_pembayarans_table', 16),
(29, '2024_07_19_204838_add_metodeid_column_to_pembayarans_table', 17),
(30, '2024_07_19_225657_add_orderid_column_to_pembayarans_table', 18),
(31, '2024_07_19_230732_add_kode_column_to_pembayarans_table', 19),
(32, '2024_07_19_233033_drop_kode_column_to_pembayarans_table', 20),
(33, '2024_07_20_001325_drop_pembayarans_table', 21),
(34, '2024_07_20_002958_create_pembayarans_table', 22),
(35, '2024_07_20_003302_create_metodeid_columnt_to_pembayarans_table', 23),
(36, '2024_07_20_003415_add_metodeid_column_to_pembayarans_table', 23),
(37, '2024_07_20_003615_drop_metodeid_columnt_to_pembayarans', 24),
(38, '2024_07_21_225623_add_namakehadiran_column_to_pembayarans', 25),
(39, '2024_07_25_011857_drop_namakehadiran_column_to_pembayarans_table', 26),
(40, '2024_07_25_021724_add_kehadiran_columnt_to_pesantikets_table', 27),
(41, '2024_07_25_033255_drop_kehadiran_column_to_pembayarans_table', 28),
(42, '2024_07_25_041633_add_pesantiketid_column_to_pembayarans_table', 29),
(43, '2024_07_25_162130_add_total_column_to_pembayarans_table', 30),
(44, '2024_07_25_234444_add_kehadiran_column_to_pembayarans_table', 31),
(45, '2024_07_26_005919_add_hargatiket_column_to_pesantikets_table', 32),
(46, '2024_07_26_035248_add_totalharga_column_to_pesantikets_table', 33),
(47, '2024_07_26_035933_drop_kehadiran_to_pembayarans_table', 34),
(48, '2024_07_26_113529_create_notifications_table', 35),
(49, '2024_07_27_162344_add_kode_column_to_pembayarans_table', 36),
(50, '2024_07_27_174827_create_reviews_table', 37),
(51, '2024_07_28_094840_drop_reviews_table', 38),
(52, '2024_07_28_095122_create_reviews_table', 39),
(53, '2024_07_29_093730_create_wisatawan_column_to_pesantikets_table', 40),
(54, '2024_07_29_094333_add_wisatawan_column_to_pesantikets_table', 41),
(55, '2024_08_04_111436_create_locations_table', 42),
(56, '2024_08_04_194508_create_photos_table', 43),
(57, '2024_08_06_235924_drop_products_table', 44),
(58, '2024_08_22_204415_drop_alamat_column_to_pesantikets_table', 45),
(59, '2024_08_22_204647_add_nohp_column_to_pesantikets_table', 46),
(60, '2024_08_22_205434_drop_alamatp_column_to_pengunjungs_table', 47),
(61, '2024_09_27_222641_add_datawstid_column_to_reviews_table', 48),
(62, '2024_09_28_055631_create_orders_table', 49),
(63, '2024_09_28_061450_drop_column_status_to_pesantikets_table', 50),
(64, '2024_09_28_061737_add_status_column_to_pesantikets_table', 51),
(65, '2024_09_28_083833_drop_pembayaran_column_to_pembayarans_table', 52),
(66, '2024_09_28_084459_add_pembayarannama_column_to_pembayarans_table', 53),
(67, '2024_09_28_104641_add_token_column_to_pesantikets_table', 54),
(68, '2024_09_28_110613_drop_token_column_to_pesantikets_table', 55),
(69, '2024_09_28_110751_add_tokensnap_columnt_to_pesantikets_table', 56),
(70, '2024_09_28_122407_drop_tjwisata_column_to_pembayarans_table', 57),
(71, '2024_09_28_181530_drop_snaptoken_column_to_pesantikets_table', 58);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 9),
(1, 'App\\Models\\User', 12),
(1, 'App\\Models\\User', 16),
(1, 'App\\Models\\User', 17),
(5, 'App\\Models\\User', 3),
(6, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0e4886b9-1847-4146-945d-ba7e431fdb42', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 1, '{\"body\":\"Kode Transaksi :. 5879087029\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Michael Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar?5879087029\"}', '2024-08-22 09:03:46', '2024-08-06 16:20:24', '2024-08-22 09:03:46'),
('0ff76774-a316-4775-8b6d-2582d24574cd', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 17, '{\"body\":\"Kode Transaksi :. 5298983942\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Putri Asri Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar\"}', NULL, '2024-10-25 15:02:11', '2024-10-25 15:02:11'),
('100acc57-3202-4cbb-bc5d-519db341e257', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 15, '{\"body\":\"Kode Transaksi :. 4435907139\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Muhammad Seno Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar\"}', NULL, '2024-08-22 13:57:13', '2024-08-22 13:57:13'),
('10736892-ccd2-4028-8f50-947a181f88bd', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 15, '{\"body\":\"Kode Transaksi :. 4435907139\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Muhammad Seno Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar?4435907139\"}', NULL, '2024-08-24 09:49:34', '2024-08-24 09:49:34'),
('10d193ea-c59d-4a02-a39c-16516df7b5bb', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 1, '{\"body\":\"Kode Transaksi :. 4943747687\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Putri Asri Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/pesantiket\"}', '2024-07-29 05:54:19', '2024-07-29 05:48:12', '2024-07-29 05:54:19'),
('15957025-1b4b-4a47-a8d1-07f3f6160183', 'App\\Notifications\\UlasanNotification', 'App\\Models\\User', 17, '{\"body\":\"Michael\",\"title\":\"Review Pengunjung\",\"messages\":\"Ulasan :. good wisatanya\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/reviewpengunjung\"}', '2024-09-29 17:33:37', '2024-09-27 17:10:23', '2024-09-29 17:33:37'),
('1b182ce6-83d4-44ba-bd7f-55f2749aecdf', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 17, '{\"body\":\"Kode Transaksi :. 7731511142\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Muhammad Seno Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar\"}', '2024-09-29 17:33:01', '2024-09-28 04:21:38', '2024-09-29 17:33:01'),
('236d0b54-f003-467c-9798-7918bc513be5', 'App\\Notifications\\UlasanNotification', 'App\\Models\\User', 1, '{\"body\":\"Michael\",\"title\":\"Review Pengunjung\",\"messages\":\"Ulasan :. A good website that makes it easy for visitors to order tickets\\ud83d\\udc4d\\ud83c\\udffb\\ud83e\\udd29\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/reviewpengunjung\"}', '2024-08-22 09:04:19', '2024-08-01 17:18:55', '2024-08-22 09:04:19'),
('25ee21fc-84a0-4f85-8ec7-ba0c1ae5a429', 'App\\Notifications\\UlasanNotification', 'App\\Models\\User', 8, '{\"body\":\"Michael\",\"title\":\"Review Pengunjung\",\"messages\":\"Ulasan :. A good website that makes it easy for visitors to order tickets\\ud83d\\udc4d\\ud83c\\udffb\\ud83e\\udd29\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/reviewpengunjung\"}', NULL, '2024-08-01 17:18:56', '2024-08-01 17:18:56'),
('27ed9045-dfd1-4121-8b38-d523b5e14cb2', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 8, '{\"body\":\"Kode Transaksi :. 7119528387\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Michael Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar?7119528387\"}', NULL, '2024-08-01 06:35:12', '2024-08-01 06:35:12'),
('2d7ba5a4-92d3-4fe9-8dda-e3bb25c65c48', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 1, '{\"body\":\"Kode Transaksi :. 4423261819\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Putri Asri Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar?4423261819\"}', '2024-08-22 09:04:28', '2024-08-22 09:01:13', '2024-08-22 09:04:28'),
('2e6ef471-438e-4187-a9f8-47e2246bcb75', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 9, '{\"body\":\"Kode Transaksi :. 4423261819\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Putri Asri Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar\"}', NULL, '2024-08-15 02:10:50', '2024-08-15 02:10:50'),
('2eb63592-b641-4fd8-970e-1b905bdcc9e8', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 8, '{\"body\":\"Kode Transaksi :. 5879087029\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Michael Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar\"}', NULL, '2024-08-02 12:27:46', '2024-08-02 12:27:46'),
('36957546-cd53-4bc8-ba04-a06e19620685', 'App\\Notifications\\UlasanNotification', 'App\\Models\\User', 17, '{\"body\":\"Michael\",\"title\":\"Review Pengunjung\",\"messages\":\"Ulasan :. Pantai yang bagus dan indah untuk melepaskan penat\\ud83d\\udc4d\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/reviewpengunjung\"}', '2024-09-30 15:04:58', '2024-09-30 15:02:40', '2024-09-30 15:04:58'),
('4071f7dc-9d80-4f8a-9239-4abb6470253f', 'App\\Notifications\\UlasanNotification', 'App\\Models\\User', 17, '{\"body\":\"Putri Asri\",\"title\":\"Review Pengunjung\",\"messages\":\"Ulasan :. Tempatnya enak untuk rafting dan masih asri juga suasananya\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/reviewpengunjung\"}', '2024-09-30 15:05:08', '2024-09-29 17:43:56', '2024-09-30 15:05:08'),
('43d4bdca-cdd2-4051-9985-6642af98883e', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 1, '{\"body\":\"Kode Transaksi :. 4423261819\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Putri Asri Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar\"}', '2024-08-22 09:02:59', '2024-08-15 02:10:50', '2024-08-22 09:02:59'),
('46132d51-86f4-4957-bf57-88b542936971', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 1, '{\"body\":\"Kode Transaksi :. 4943747687\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Putri Asri Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/pesantiket\\/pembayaran\\/detail\\/4943747687\"}', '2024-07-29 05:54:59', '2024-07-29 05:50:04', '2024-07-29 05:54:59'),
('49974208-cc7b-4233-8900-67dc7e520032', 'App\\Notifications\\UlasanNotification', 'App\\Models\\User', 17, '{\"body\":\"Putri Asri\",\"title\":\"Review Pengunjung\",\"messages\":\"Ulasan :. Pantainya bagus bisa dipakai untuk berenang\\ud83e\\udd29\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/reviewpengunjung\"}', '2024-09-29 17:32:14', '2024-09-28 17:25:53', '2024-09-29 17:32:14'),
('51ea2b00-7a01-4577-a8de-a1d37faab949', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 1, '{\"body\":\"Kode Transaksi :. 4423261819\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Putri Asri Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar?4423261819\"}', '2024-08-22 09:46:56', '2024-08-22 09:36:32', '2024-08-22 09:46:56'),
('52ad19f1-81c8-4b18-a922-56f63ae36524', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 17, '{\"body\":\"Kode Transaksi :. 7260800729\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Putri Asri Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar\"}', '2024-09-29 17:30:01', '2024-09-23 08:17:07', '2024-09-29 17:30:01'),
('54e3574a-1a74-40ae-b3c2-d431171da0aa', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 1, '{\"body\":\"Kode Transaksi :. 7119528387\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Michael Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/pesantiket\"}', '2024-08-01 06:56:55', '2024-08-01 05:40:54', '2024-08-01 06:56:55'),
('5600fb04-7c39-44c5-8c16-f9cce26758fd', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 9, '{\"body\":\"Kode Transaksi :. 5879087029\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Michael Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar?5879087029\"}', NULL, '2024-08-06 16:20:24', '2024-08-06 16:20:24'),
('5907bb37-9aad-4932-ac92-204cc21e4ca6', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 8, '{\"body\":\"Kode Transaksi :. 3107714045\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Muhammad Seno Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/pesantiket\"}', NULL, '2024-07-29 03:11:25', '2024-07-29 03:11:25'),
('594e6f7a-2d83-48f0-a6e2-7bf24f790b09', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 17, '{\"body\":\"Kode Transaksi :. 3614014176\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Michael Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar\"}', '2024-09-30 15:05:17', '2024-09-30 14:04:44', '2024-09-30 15:05:17'),
('608e8cea-ca77-41fc-bab7-4318b0585e9c', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 13, '{\"body\":\"Kode Transaksi :. 4423261819\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Putri Asri Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar?4423261819\"}', '2024-08-22 09:39:42', '2024-08-22 09:36:33', '2024-08-22 09:39:42'),
('62a8f464-f0d8-4e61-b216-d42aab90ef67', 'App\\Notifications\\UlasanNotification', 'App\\Models\\User', 17, '{\"body\":\"Muhammad Seno\",\"title\":\"Review Pengunjung\",\"messages\":\"Ulasan :. pantainya bagus banget\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/reviewpengunjung\"}', '2024-09-29 17:33:28', '2024-09-27 17:27:43', '2024-09-29 17:33:28'),
('6585f384-8d71-4352-a887-b3bbc6931727', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 1, '{\"body\":\"Kode Transaksi :. 9801757607\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Muhammad Seno Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/pesantiket\"}', '2024-07-30 02:21:02', '2024-07-29 05:40:40', '2024-07-30 02:21:02'),
('66b7397f-7bc6-4015-96fd-1bd54d61cf75', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 8, '{\"body\":\"Kode Transaksi :. 9801757607\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Muhammad Seno Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/pesantiket\"}', NULL, '2024-07-29 05:40:40', '2024-07-29 05:40:40'),
('68d31f46-932b-4110-aeed-d1896f426564', 'App\\Notifications\\UlasanNotification', 'App\\Models\\User', 17, '{\"body\":\"Michael\",\"title\":\"Review Pengunjung\",\"messages\":\"Ulasan :. nice place, interesting\\ud83e\\udd29\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/reviewpengunjung\"}', NULL, '2024-10-07 07:22:44', '2024-10-07 07:22:44'),
('6b21602f-7cf0-44dd-9b17-6d258f0f1b9a', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 17, '{\"body\":\"Kode Transaksi :. 9632244045\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Putri Asri Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar\"}', NULL, '2024-10-18 02:20:29', '2024-10-18 02:20:29'),
('6c9c8e35-96db-4a1e-b3c4-6dc2ffee08aa', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 17, '{\"body\":\"Kode Transaksi :. 4557489373\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Michael Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar\"}', '2024-10-07 04:33:51', '2024-09-30 16:25:44', '2024-10-07 04:33:51'),
('721fd7b6-d59e-4d3a-b838-5036a2117beb', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 1, '{\"body\":\"Kode Transaksi :. 3107714045\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Muhammad Seno Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/pesantiket\\/pembayaran\\/detail\\/3107714045\"}', '2024-07-29 03:15:49', '2024-07-29 03:13:59', '2024-07-29 03:15:49'),
('7bd92a6e-cd61-4ff1-8768-0d1436540558', 'App\\Notifications\\UlasanNotification', 'App\\Models\\User', 17, '{\"body\":\"Muhammad Seno\",\"title\":\"Review Pengunjung\",\"messages\":\"Ulasan :. bagus tempatnya\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/reviewpengunjung\"}', '2024-09-29 17:33:59', '2024-09-27 16:19:39', '2024-09-29 17:33:59'),
('7e0a4f94-f32c-4ccd-922f-918d2a1ae772', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 17, '{\"body\":\"Kode Transaksi :. 6644137425\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Putri Asri Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar\"}', '2024-09-29 17:32:23', '2024-09-28 17:04:25', '2024-09-29 17:32:23'),
('8021c201-5d77-4f9a-937e-72bcaf4d0730', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 17, '{\"body\":\"Kode Transaksi :. 6571085482\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Muhammad Seno Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar\"}', '2024-09-29 17:32:41', '2024-09-28 11:39:39', '2024-09-29 17:32:41'),
('80ca3385-a0db-45bb-b829-423dc3641f6c', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 1, '{\"body\":\"Kode Transaksi :. 3107714045\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Muhammad Seno Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/pesantiket\\/pembayaran\\/detail\\/3107714045\"}', '2024-07-29 05:51:56', '2024-07-29 04:54:10', '2024-07-29 05:51:56'),
('869b93e4-9bd5-456e-b98f-bb461f9e382a', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 1, '{\"body\":\"Kode Transaksi :. 3107714045\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Muhammad Seno Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/pesantiket\"}', '2024-07-29 03:14:30', '2024-07-29 03:11:25', '2024-07-29 03:14:30'),
('87a4cc70-69e9-4e3c-9277-4adc782314c5', 'App\\Notifications\\UlasanNotification', 'App\\Models\\User', 17, '{\"body\":\"Muhammad Seno\",\"title\":\"Review Pengunjung\",\"messages\":\"Ulasan :. Pantainya bagus fasilitas juga cukup lengkap\\ud83d\\udc4d\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/reviewpengunjung\"}', '2024-09-30 15:19:24', '2024-09-30 15:11:43', '2024-09-30 15:19:24'),
('88b0d679-bc8b-4f32-a716-f282ef7b9eb0', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 13, '{\"body\":\"Kode Transaksi :. 4423261819\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Putri Asri Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar?4423261819\"}', '2024-08-22 09:15:09', '2024-08-22 09:08:54', '2024-08-22 09:15:09'),
('95b29823-af14-4cc5-b1e3-318afac69d9d', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 17, '{\"body\":\"Kode Transaksi :. 4168154340\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Putri Asri Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar\"}', '2024-09-29 17:32:32', '2024-09-28 16:42:46', '2024-09-29 17:32:32'),
('99459f23-2726-4679-9e46-43c703f243cb', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 17, '{\"body\":\"Kode Transaksi :. 9821305110\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Putri Asri Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar\"}', NULL, '2024-10-18 03:12:34', '2024-10-18 03:12:34'),
('a36eb084-b6a2-4dd4-b72d-84d5db8abede', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 13, '{\"body\":\"Kode Transaksi :. 4423261819\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Putri Asri Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar?4423261819\"}', '2024-08-22 09:09:20', '2024-08-22 09:01:13', '2024-08-22 09:09:20'),
('a3f1f9fc-04d4-4c68-a016-c5f25cf99438', 'App\\Notifications\\UlasanNotification', 'App\\Models\\User', 17, '{\"body\":\"Putri Asri\",\"title\":\"Review Pengunjung\",\"messages\":\"Ulasan :. Tempatnya enak untuk kegiatan rafting dan suasananya juga masih asri\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/reviewpengunjung\"}', '2024-09-29 17:31:42', '2024-09-28 17:36:43', '2024-09-29 17:31:42'),
('c31ae0b8-3810-4d23-80d2-9e523e8755e7', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 1, '{\"body\":\"Kode Transaksi :. 4423261819\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Putri Asri Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar?4423261819\"}', '2024-08-22 09:47:07', '2024-08-22 09:08:54', '2024-08-22 09:47:07'),
('c814c1e2-cb88-46c8-afd0-945091d12a27', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 17, '{\"body\":\"Kode Transaksi :. 7260800729\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Putri Asri Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar?7260800729\"}', '2024-09-29 17:34:11', '2024-09-23 08:23:06', '2024-09-29 17:34:11'),
('d033b456-3d7f-418a-9c50-9b78870a89f9', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 8, '{\"body\":\"Kode Transaksi :. 4943747687\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Putri Asri Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/pesantiket\"}', NULL, '2024-07-29 05:48:12', '2024-07-29 05:48:12'),
('dcfac166-6282-43f7-86ac-30916e264b33', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 8, '{\"body\":\"Kode Transaksi :. 3107714045\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Muhammad Seno Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/pesantiket\\/pembayaran\\/detail\\/3107714045\"}', NULL, '2024-07-29 04:54:11', '2024-07-29 04:54:11'),
('dd9f7604-6f16-4b66-9886-1b48211efdca', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 1, '{\"body\":\"Kode Transaksi :. 5879087029\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Michael Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar\"}', '2024-08-22 09:04:07', '2024-08-02 12:27:46', '2024-08-22 09:04:07'),
('e08ac186-7d15-4e88-ae7f-035b5ad522c6', 'App\\Notifications\\UlasanNotification', 'App\\Models\\User', 17, '{\"body\":\"Putri Asri\",\"title\":\"Review Pengunjung\",\"messages\":\"Ulasan :. Tempatnya enak untuk kegiatan rafting dan suasananya juga masih asri\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/reviewpengunjung\"}', '2024-09-29 17:32:06', '2024-09-28 17:36:05', '2024-09-29 17:32:06'),
('e5c3d9ba-4ba3-4873-a820-25b6cc7d655f', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 8, '{\"body\":\"Kode Transaksi :. 9801757607\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Muhammad Seno Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar?9801757607\"}', NULL, '2024-07-30 08:37:42', '2024-07-30 08:37:42'),
('e9b7950b-ebe8-473a-b1eb-080276f8c1a3', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 8, '{\"body\":\"Kode Transaksi :. 4943747687\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Putri Asri Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/pesantiket\\/pembayaran\\/detail\\/4943747687\"}', NULL, '2024-07-29 05:50:04', '2024-07-29 05:50:04'),
('eab7ed7c-8a41-4245-8829-1e3af0e67969', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 8, '{\"body\":\"Kode Transaksi :. 3107714045\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Muhammad Seno Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/pesantiket\\/pembayaran\\/detail\\/3107714045\"}', NULL, '2024-07-29 03:13:59', '2024-07-29 03:13:59'),
('f09f571e-7058-4b73-a117-749f723f9359', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 1, '{\"body\":\"Kode Transaksi :. 7119528387\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Michael Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar?7119528387\"}', '2024-08-01 07:05:12', '2024-08-01 06:35:12', '2024-08-01 07:05:12'),
('f19479ec-c5a5-4c9c-b748-05afcd449f19', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 17, '{\"body\":\"Kode Transaksi :. 2407745004\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Muhammad Seno Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar\"}', '2024-09-29 17:33:17', '2024-09-27 23:24:51', '2024-09-29 17:33:17'),
('f96af768-e2a6-4bd5-be67-fc9841325cb7', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 8, '{\"body\":\"Kode Transaksi :. 7119528387\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Michael Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/pesantiket\"}', NULL, '2024-08-01 05:40:54', '2024-08-01 05:40:54'),
('fd0bce95-2d5b-459b-a504-27cb7a65a28c', 'App\\Notifications\\PesanTiketNotification', 'App\\Models\\User', 17, '{\"body\":\"Kode Transaksi :. 6397684580\",\"title\":\"Pesan Tiket Wisata\",\"messages\":\"Putri Asri Melakukan Pemesanan Tiket.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar\"}', NULL, '2024-10-18 03:19:05', '2024-10-18 03:19:05'),
('ff9151e0-c508-48b0-b621-3f83b570a907', 'App\\Notifications\\PembayaranNotification', 'App\\Models\\User', 1, '{\"body\":\"Kode Transaksi :. 9801757607\",\"title\":\"Pembayaran Pesanan Tiket\",\"messages\":\"Muhammad Seno Telah melakukan upload bukti pembayaran\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/detail-unkonfirbayar?9801757607\"}', '2024-07-30 08:40:08', '2024-07-30 08:37:42', '2024-07-30 08:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `wisatawan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargatiket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalharga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kehadiran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Unpaid','Paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengunjungs`
--

CREATE TABLE `pengunjungs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengunjungs`
--

INSERT INTO `pengunjungs` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Putri Asri', 'putri@gmail.com', '$2y$10$AyUb2ipLapHsW/QsTGYRfObZ2Ym88P1Z4xqfTOStGan4uwsS8Lo9C', NULL, '2024-07-17 15:41:56', '2024-07-17 15:41:56'),
(2, 'Muhammad Seno', 'seno@gmail.com', '$2y$10$teTWbsu/C110MS52yYVAmOpMBVtRTDWe7/DGIoOZl5iLWvCHxr4Xm', NULL, '2024-07-17 18:37:21', '2024-07-28 22:53:54'),
(3, 'Michael', 'michael@gmail.com', '$2y$10$BkX4UI1QBGmdt2tYCzTZCODbFqmLQ5b7F62M04F34zAqy1YDz2L9S', NULL, '2024-08-01 04:28:43', '2024-08-01 04:28:43'),
(4, 'rosila', 'rosila15@gmail.com', '$2y$10$lDTO5SKomPgiP6cnLnbxDeeMiMEWIU/NH4NvkusCnj24cEIbjexCu', NULL, '2024-10-25 16:13:40', '2024-10-25 16:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2024-07-06 12:12:17', '2024-07-06 12:12:17'),
(2, 'role-create', 'web', '2024-07-06 12:12:19', '2024-07-06 12:12:19'),
(3, 'role-edit', 'web', '2024-07-06 12:12:19', '2024-07-06 12:12:19'),
(4, 'role-delete', 'web', '2024-07-06 12:12:19', '2024-07-06 12:12:19'),
(6, 'product-create', 'web', '2024-07-06 12:12:21', '2024-07-06 12:12:21'),
(7, 'product-edit', 'web', '2024-07-06 12:12:21', '2024-07-06 12:12:21'),
(8, 'product-delete', 'web', '2024-07-06 12:12:22', '2024-07-06 12:12:22'),
(9, 'user-list', 'web', NULL, NULL),
(10, 'user-create', 'web', NULL, NULL),
(11, 'user-edit', 'web', NULL, NULL),
(12, 'user-delete', 'web', NULL, NULL),
(13, 'menu-list', 'web', NULL, NULL),
(14, 'menu-create', 'web', NULL, NULL),
(15, 'menu-edit', 'web', NULL, NULL),
(16, 'menu-delete', 'web', NULL, NULL),
(17, 'wisata-list', 'web', NULL, NULL),
(18, 'wisata-create', 'web', NULL, NULL),
(19, 'wisata-edit', 'web', NULL, NULL),
(20, 'wisata-delete', 'web', NULL, NULL),
(21, 'wisata-show', 'web', NULL, NULL),
(22, 'fasilitas-list', 'web', NULL, NULL),
(23, 'fasilitas-create', 'web', NULL, NULL),
(24, 'fasilitas-delete', 'web', NULL, NULL),
(25, 'fasilitas-edit', 'web', NULL, NULL),
(26, 'tiket-list', 'web', NULL, NULL),
(27, 'tiket-create', 'web', NULL, NULL),
(28, 'tiket-edit', 'web', NULL, NULL),
(29, 'tiket-delete', 'web', NULL, NULL),
(30, 'metodepembayaran-list', 'web', NULL, NULL),
(31, 'metodepembayaran-create', 'web', NULL, NULL),
(32, 'metodepembayaran-edit', 'web', NULL, NULL),
(33, 'metodepembayaran-delete', 'web', NULL, NULL),
(34, 'pesantiket-list', 'web', NULL, NULL),
(35, 'pesantiket-show', 'web', NULL, NULL),
(36, 'cek-tiket', 'web', NULL, NULL),
(37, 'pengunjung-list', 'web', NULL, NULL),
(38, 'ulasan-list', 'web', NULL, NULL),
(39, 'ulasan-delete', 'web', NULL, NULL),
(40, 'notif-list', 'web', NULL, NULL),
(41, 'wrapper-list', 'web', NULL, NULL),
(42, 'laporan-print', 'web', NULL, NULL),
(43, 'alamat-list', 'web', NULL, NULL),
(44, 'foto-list', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesantikets`
--

CREATE TABLE `pesantikets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `datatiketid` bigint(20) UNSIGNED NOT NULL,
  `hargatiket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wisatawan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalharga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Unpaid','Paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kehadiran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesantikets`
--

INSERT INTO `pesantikets` (`id`, `kode_transaksi`, `name`, `nohp`, `datatiketid`, `hargatiket`, `wisatawan`, `qty`, `totalharga`, `tanggal`, `status`, `kehadiran`, `created_at`, `updated_at`) VALUES
(1, '6571085482', 'Muhammad Seno', '089765435678', 1, '20000', 'domestik', '3', '60000', '2024-09-29', 'Paid', '1', '2024-09-28 11:39:34', '2024-09-30 13:47:49'),
(2, '4168154340', 'Putri Asri', '076436785432', 2, '15000', 'domestik', '2', '30000', '2024-09-29', 'Paid', '1', '2024-09-28 16:42:39', '2024-09-29 19:23:53'),
(3, '6644137425', 'Putri Asri', '076436785432', 10, '110000', 'domestik', '5', '550000', '2024-09-30', 'Paid', '1', '2024-09-28 17:04:25', '2024-09-30 13:33:52'),
(4, '3614014176', 'Michael', '093476892345', 1, '20000', 'domestik', '4', '80000', '2024-09-30', 'Paid', '1', '2024-09-30 14:04:38', '2024-09-30 14:53:46'),
(5, '4557489373', 'Michael', '093476892345', 3, '10000', 'mancanegara', '8', '80000', '2024-10-01', 'Paid', '1', '2024-09-30 16:25:43', '2024-10-07 04:10:39'),
(6, '9632244045', 'Putri Asri', '089765435678', 1, '20000', 'domestik', '2', '40000', '2024-10-18', 'Paid', '1', '2024-10-18 02:19:58', '2024-10-25 15:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `datawisataid` bigint(20) UNSIGNED NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `datawisataid`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 'galeri/1722777972.jpg', '2024-08-04 13:26:12', '2024-08-04 13:26:12'),
(3, 3, 'galeri/1722781246.jpg', '2024-08-04 14:20:46', '2024-08-04 14:20:46'),
(4, 1, 'galeri/1722960125.jpg', '2024-08-06 16:02:05', '2024-08-06 16:02:05'),
(5, 1, 'galeri/1722960147.jpg', '2024-08-06 16:02:27', '2024-08-06 16:02:27'),
(6, 4, 'galeri/1722960190.jpeg', '2024-08-06 16:03:10', '2024-08-06 16:03:10'),
(7, 10, 'galeri/1722960276.jpg', '2024-08-06 16:04:36', '2024-08-06 16:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `datawisataid` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `datawisataid`, `name`, `email`, `review`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'Putri Asri', 'putri@gmail.com', 'Tempatnya enak untuk rafting dan masih asri juga suasananya', 5, '0', '2024-09-29 17:43:52', '2024-09-29 19:30:59'),
(2, 1, 'Michael', 'michael@gmail.com', 'Pantai yang bagus dan indah untuk melepaskan penat👍', 5, '0', '2024-09-30 15:02:39', '2024-10-25 16:13:04'),
(3, 1, 'Muhammad Seno', 'seno@gmail.com', 'Pantainya bagus fasilitas juga cukup lengkap👍', 5, '0', '2024-09-30 15:11:43', '2024-09-30 16:23:09'),
(4, 5, 'Michael', 'michael@gmail.com', 'nice place, interesting🤩', 4, '0', '2024-10-07 07:22:39', '2024-10-07 07:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-07-06 12:15:03', '2024-07-06 12:15:03'),
(5, 'Petugas Tiket', 'web', '2024-07-10 07:36:08', '2024-07-10 07:36:08'),
(6, 'Super Admin', 'web', '2024-08-22 10:03:04', '2024-08-22 10:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 6),
(2, 6),
(3, 6),
(4, 6),
(9, 6),
(10, 6),
(11, 6),
(12, 6),
(13, 6),
(14, 6),
(15, 6),
(16, 6),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(34, 1),
(35, 1),
(36, 5),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(42, 1),
(42, 6),
(43, 1),
(44, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Savani', 'admin@gmail.com', NULL, '$2y$10$iSJepPouGQhyw4M7T6jMk.CXeEN6pjD/XWQSdbNtORCeS1KfRKToy', 'BWe1JdzyFNbfWBrFqJqjItjd5RtKfQWnZmkOEOC3XqsUKFIczugimoAFVOFE', '2024-07-06 12:15:03', '2024-07-09 04:23:11'),
(3, 'Anwar Abdul', 'anwar@gmail.com', NULL, '$2y$10$C6krJnerFQvVhHxI5MrPOO0ROfbrUlwOMZtKRscYKq.z9gnAS6R4S', 'fiJsdb2MTXqPCbSuqQJ2atxU2BDKjxih39m7ZMV2S0lCQp4a2TO4VUBx9m4B', '2024-07-21 16:39:32', '2024-07-21 16:39:32'),
(17, 'Muhammad Abdul', 'mabdul@gmail.com', NULL, '$2y$10$vJTygqrnM7pwbl1Ack6p6OEv.F0z4MKVHLqwvebA9NqeyniSyy5BW', 'xV1FQVDmvEh9elf21fYvoytqmTEN5lccIyW1Is2y8aPTgSEdDgoUtjqld6d0', '2024-09-23 06:38:31', '2024-09-23 06:38:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_tikets`
--
ALTER TABLE `data_tikets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_wisatas`
--
ALTER TABLE `data_wisatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_datawisataid_foreign` (`datawisataid`);

--
-- Indexes for table `metode_pembayarans`
--
ALTER TABLE `metode_pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengunjungs`
--
ALTER TABLE `pengunjungs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengunjungs_email_unique` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesantikets`
--
ALTER TABLE `pesantikets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesantikets_datatiketid_foreign` (`datatiketid`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_datawisataid_foreign` (`datawisataid`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_datawisataid_foreign` (`datawisataid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_tikets`
--
ALTER TABLE `data_tikets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_wisatas`
--
ALTER TABLE `data_wisatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `metode_pembayarans`
--
ALTER TABLE `metode_pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengunjungs`
--
ALTER TABLE `pengunjungs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesantikets`
--
ALTER TABLE `pesantikets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_datawisataid_foreign` FOREIGN KEY (`datawisataid`) REFERENCES `data_wisatas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pesantikets`
--
ALTER TABLE `pesantikets`
  ADD CONSTRAINT `pesantikets_datatiketid_foreign` FOREIGN KEY (`datatiketid`) REFERENCES `data_tikets` (`id`);

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_datawisataid_foreign` FOREIGN KEY (`datawisataid`) REFERENCES `data_wisatas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_datawisataid_foreign` FOREIGN KEY (`datawisataid`) REFERENCES `data_wisatas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
