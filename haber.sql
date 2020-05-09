-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 09 May 2020, 21:32:00
-- Sunucu sürümü: 10.4.10-MariaDB
-- PHP Sürümü: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `haber`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text DEFAULT NULL,
  `title_2` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`id`, `title`, `title_2`, `text`, `image`, `url`) VALUES
(7, 'Tmok', 'Tmok web site', '<p>TMOK olarak; gelişmiş yeni üretim teknolojisi ve yenilikçi malzeme bileşimleri ile körük<br>sektörüne yeni bir anlayış katmak amacı ile yola çıktık.<br>Bu amaçla 2020 yılında Kocaeli-Gebze’de kurulan TMOK şirketimiz, ülkemizde hızla<br>gelişmekte olan raylı sistemler sektöründeki;<br>-hızlı tren, metro, hafif raylı sistem ve yük trenlerinin hat-körük projelerinde,<br>-otobüs körükleri-geçit körükleri projelerinde;<br>-imalat, yedek parça ithalat-ihracat-pazarlama, bakım-onarım-montaj, servis gibi geniş bir<br>yelpazede çözümler üretmektedir.<br>Ayrıca TMOK olarak ithalat-ihracat, gümrükleme ve lojistik faaliyetlerimizle de raylı<br>sistemlerin ihtiyaçlarını karşılamaktayız.<br>*Türkiye’de hızla gelişmekte olan ulaşım sistemleri ağının ihtiyaçlarına proje ve çözüm<br>üreterek gelişmesine katkı sağlamak ve bu doğrultuda körük ürünlerinin kalite ve güvenlik<br>standartları kapsamında üretilmesine yardımcı olmak, ülkemizde henüz üretimi olmayan<br>yedek parça ekipmanları, malzemeleri üreterek hızlı ve güvenli bir şekilde ihraç etmek bizi biz<br>yapan amaçlardır. Bu amaçlarla yola çıkarak emin adımlarla sektörümüz ve ülkemiz için<br>ilerlemekteyiz.<br>Hedeflerimiz;<br>-Ülkemizde kullanılan geçit körüklerinin, lokomotif, metro, tramvay, yüksek hızlı tren, otobüs<br>körüklerinin tamamen yerli imkanlarla üretilmesini sağlamak.<br>-Yerli imkanlarla üretilen/üretilecek olan körük ve yedek parçaların ihracatını yaparak ülke<br>ekonomisine katkı da bulunmasını sağlamak.<br>-Servis, bakım ve onarım gibi hizmetleri en iyi, en güvenilir şekilde gerçekleştirmek.<br></p>', '1582661739..jpeg', '/haber/tmok');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

DROP TABLE IF EXISTS `hakkimizda`;
CREATE TABLE IF NOT EXISTS `hakkimizda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text DEFAULT NULL,
  `title_2` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`id`, `title`, `title_2`, `text`, `image`) VALUES
(1, 'Körük Hakkımızda Başlık', 'Körük Hakkımızda Alt Başlık', '<p>TMOK olarak; gelişmiş yeni üretim teknolojisi ve yenilikçi malzeme bileşimleri ile körük<br>sektörüne yeni bir anlayış katmak amacı ile yola çıktık.<br>Bu amaçla 2020 yılında Kocaeli-Gebze’de kurulan TMOK şirketimiz, ülkemizde hızla<br>gelişmekte olan raylı sistemler sektöründeki;<br>-hızlı tren, metro, hafif raylı sistem ve yük trenlerinin hat-körük projelerinde,<br>-otobüs körükleri-geçit körükleri projelerinde;<br>-imalat, yedek parça ithalat-ihracat-pazarlama, bakım-onarım-montaj, servis gibi geniş bir<br>yelpazede çözümler üretmektedir.<br>Ayrıca TMOK olarak ithalat-ihracat, gümrükleme ve lojistik faaliyetlerimizle de raylı<br>sistemlerin ihtiyaçlarını karşılamaktayız.<br>*Türkiye’de hızla gelişmekte olan ulaşım sistemleri ağının ihtiyaçlarına proje ve çözüm<br>üreterek gelişmesine katkı sağlamak ve bu doğrultuda körük ürünlerinin kalite ve güvenlik<br>standartları kapsamında üretilmesine yardımcı olmak, ülkemizde henüz üretimi olmayan<br>yedek parça ekipmanları, malzemeleri üreterek hızlı ve güvenli bir şekilde ihraç etmek bizi biz<br>yapan amaçlardır. Bu amaçlarla yola çıkarak emin adımlarla sektörümüz ve ülkemiz için<br>ilerlemekteyiz.<br>Hedeflerimiz;<br>-Ülkemizde kullanılan geçit körüklerinin, lokomotif, metro, tramvay, yüksek hızlı tren, otobüs<br>körüklerinin tamamen yerli imkanlarla üretilmesini sağlamak.<br>-Yerli imkanlarla üretilen/üretilecek olan körük ve yedek parçaların ihracatını yaparak ülke<br>ekonomisine katkı da bulunmasını sağlamak.<br>-Servis, bakım ve onarım gibi hizmetleri en iyi, en güvenilir şekilde gerçekleştirmek.</p>', 'ornek5.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

DROP TABLE IF EXISTS `iletisim`;
CREATE TABLE IF NOT EXISTS `iletisim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text DEFAULT NULL,
  `title_2` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`id`, `title`, `title_2`, `text`, `image`) VALUES
(1, 'İletişim', 'Tmok iletişim bilgileri', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `istatistik`
--

DROP TABLE IF EXISTS `istatistik`;
CREATE TABLE IF NOT EXISTS `istatistik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `page` varchar(255) DEFAULT NULL,
  `device` text DEFAULT NULL,
  `browser` text DEFAULT NULL,
  `ms` text DEFAULT NULL,
  `tekil` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `istatistik`
--

INSERT INTO `istatistik` (`id`, `ip`, `date`, `page`, `device`, `browser`, `ms`, `tekil`) VALUES
(1, '127.0.0.1', '2020-02-21 14:41:56', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 1),
(2, '127.0.0.1', '2020-02-21 14:46:15', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(3, '127.0.0.1', '2020-02-21 14:46:20', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(4, '127.0.0.1', '2020-02-21 15:08:40', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(5, '127.0.0.1', '2020-02-21 15:24:05', 'anasayfa', 'Windows 10', 'Chrome', 'SYSTEM', 0),
(17, '127.0.0.1', '2020-02-22 12:05:02', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 1),
(18, '127.0.0.1', '2020-02-22 12:05:09', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(19, '127.0.0.1', '2020-02-22 20:26:28', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(20, '127.0.0.1', '2020-02-24 12:10:17', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 1),
(21, '127.0.0.1', '2020-02-24 12:11:00', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(22, '127.0.0.1', '2020-02-24 12:11:06', 'anasayfa', 'iPhone', 'Handheld Browser', 'MOBILE', 0),
(23, '127.0.0.1', '2020-02-24 12:11:09', 'anasayfa', 'Linux', 'Safari', 'SYSTEM', 0),
(24, '127.0.0.1', '2020-02-24 15:13:42', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(25, '127.0.0.1', '2020-02-25 16:49:50', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 1),
(26, '127.0.0.1', '2020-02-25 19:30:22', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(27, '127.0.0.1', '2020-02-25 19:30:26', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(28, '127.0.0.1', '2020-02-25 19:30:39', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(29, '127.0.0.1', '2020-02-25 19:30:47', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(30, '127.0.0.1', '2020-02-25 19:31:02', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(31, '127.0.0.1', '2020-02-25 19:32:26', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(32, '127.0.0.1', '2020-02-25 23:01:27', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(33, '127.0.0.1', '2020-02-25 23:07:20', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(34, '127.0.0.1', '2020-02-25 23:08:58', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(35, '127.0.0.1', '2020-02-25 23:10:54', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(36, '127.0.0.1', '2020-02-25 23:11:31', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(37, '127.0.0.1', '2020-02-25 23:11:45', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(38, '127.0.0.1', '2020-02-25 23:12:07', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(39, '127.0.0.1', '2020-02-25 23:12:12', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(40, '127.0.0.1', '2020-02-25 23:12:17', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(41, '127.0.0.1', '2020-02-25 23:12:21', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(42, '127.0.0.1', '2020-02-25 23:12:26', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(43, '127.0.0.1', '2020-02-25 23:14:10', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(44, '127.0.0.1', '2020-02-25 23:14:34', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(45, '127.0.0.1', '2020-02-25 23:14:49', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(46, '127.0.0.1', '2020-02-25 23:15:42', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(47, '127.0.0.1', '2020-02-25 23:16:24', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(48, '127.0.0.1', '2020-02-25 23:17:00', 'urun/tren-korugu', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(49, '127.0.0.1', '2020-02-25 23:18:07', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(50, '127.0.0.1', '2020-02-25 23:18:32', 'urun/tren-korugu', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(51, '127.0.0.1', '2020-02-25 23:18:49', 'calisma/calisma-1', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(52, '127.0.0.1', '2020-02-26 15:33:44', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 1),
(53, '127.0.0.1', '2020-02-26 15:44:07', 'haber/tmok', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(54, '127.0.0.1', '2020-02-26 15:44:53', 'haber/tmok', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(55, '127.0.0.1', '2020-02-26 15:45:06', 'haber/tmok', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(56, '127.0.0.1', '2020-02-26 15:45:12', 'haber/tmok', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(57, '127.0.0.1', '2020-02-26 15:45:20', 'haber/tmok', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(58, '127.0.0.1', '2020-02-26 15:45:33', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(59, '127.0.0.1', '2020-02-26 15:46:08', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(60, '127.0.0.1', '2020-02-26 15:46:40', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(61, '127.0.0.1', '2020-02-26 15:47:08', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(62, '127.0.0.1', '2020-02-26 15:47:18', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(63, '127.0.0.1', '2020-02-26 15:47:37', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(64, '127.0.0.1', '2020-02-26 15:47:49', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(65, '127.0.0.1', '2020-02-26 15:48:01', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(66, '127.0.0.1', '2020-02-26 15:48:11', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(67, '127.0.0.1', '2020-02-26 16:04:55', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(68, '127.0.0.1', '2020-02-26 16:05:27', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(69, '127.0.0.1', '2020-02-26 16:09:00', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(70, '127.0.0.1', '2020-02-26 16:09:22', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(71, '127.0.0.1', '2020-02-26 16:09:39', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(72, '127.0.0.1', '2020-02-26 16:10:21', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(73, '127.0.0.1', '2020-02-26 16:10:44', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(74, '127.0.0.1', '2020-02-26 16:11:06', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(75, '127.0.0.1', '2020-02-26 16:11:26', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(76, '127.0.0.1', '2020-02-26 16:12:21', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(77, '127.0.0.1', '2020-02-26 18:55:58', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(78, '127.0.0.1', '2020-02-26 18:56:54', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(79, '127.0.0.1', '2020-02-26 18:59:27', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(80, '127.0.0.1', '2020-05-06 02:32:03', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 1),
(81, '127.0.0.1', '2020-05-06 02:33:00', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(82, '127.0.0.1', '2020-05-06 02:33:10', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(83, '127.0.0.1', '2020-05-06 02:54:23', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(84, '127.0.0.1', '2020-05-06 02:55:06', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0),
(85, '127.0.0.1', '2020-05-06 02:59:46', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sametmertozturk1@gmail.com', 'GbGPK8RSlP78OIL6BCSkpjvRSQhMoFePU99Yjrn7', '2020-02-12 19:03:57'),
('sametmertozturk1@gmail.com', 'YbXiVaSC5abjM0B12AtqI3nJHnKGOUJZ0ycJ2qzY', '2020-02-12 19:04:12'),
('sametmertozturk1@gmail.com', 'BF6ULciaS1uMlGJxR5DrAxzdg8Zrj1jsBYTWWfUm', '2020-02-12 19:04:21'),
('sametmertozturk1@gmail.com', 'SHSSvKEMPFFu4M0Ln0wB6w6U4R0wYfQyOScGzvel', '2020-02-12 19:04:39'),
('sametmertozturk1@gmail.com', 'IokzqxJC3ar0DzcxyUiDmlU7CReUUtVrlFXzx5ki', '2020-02-12 19:05:16'),
('sametmertozturk1@gmail.com', 'A26BeXAVxlq17PZoNybCLINgY4OBx4rfp8vfOihF', '2020-02-12 19:05:52'),
('sametmertozturk1@gmail.com', 'MEHTMiKZ2OcUYe3pONwWLZsue3WuKF2FOOGWWU4w', '2020-02-12 19:25:15'),
('sametmertozturk1@gmail.com', 'T6AHBeHELRcUOSIfziws7e5AZiHIinJ0zUyxf8xR', '2020-02-12 19:25:44'),
('sametmertozturk1@gmail.com', 'd1DacoYkZl5lwJHM7ITmPlXM1ephkIEdyTmSCfnr', '2020-02-12 19:25:55'),
('sametmertozturk1@gmail.com', '2KeJPJbMGI2GTwXzpbFLYvthisS6ytorWi4xarSQ', '2020-02-12 19:26:34'),
('sametmertozturk1@gmail.com', 'lIENyDYgj7IUjaod8krpTU8FiycsncCJQnhwWFms', '2020-02-12 19:27:34'),
('sametmertozturk1@gmail.com', '7K0YNBNLZ91LGJeiNd8EeNzu2TJGI2DmY2Q5Vlty', '2020-02-12 19:30:36'),
('sametmertozturk1@gmail.com', '0swwwyScKzZxLbmKb5ufiNr8KVX74NMQF32a6M7Z', '2020-02-12 19:33:30'),
('sametmertozturk1@gmail.com', 'prWrku3yq1QDNyqEWn6RhGtpvOWqDD8MXoi5oswq', '2020-02-13 15:44:06');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projeler`
--

DROP TABLE IF EXISTS `projeler`;
CREATE TABLE IF NOT EXISTS `projeler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text DEFAULT NULL,
  `title_2` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `urun` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `projeler`
--

INSERT INTO `projeler` (`id`, `title`, `title_2`, `text`, `image`, `url`, `urun`) VALUES
(1, 'Örnek Çalışma 1', 'Örnek Çalışma 1 alt başlık', NULL, 'ornek8.jpg', '/calisma/calisma-1', 1),
(2, 'Deneme proje', 'deneme proje alt başlık', '<p>Proje metni</p><p><br></p><p><b>proje</b><br></p>', '1582652851..jpeg', 'deneme-proje', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` text DEFAULT NULL,
  `robots` int(11) DEFAULT 1,
  `description` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `tel1` text DEFAULT NULL,
  `tel2` text DEFAULT NULL,
  `adres1` text DEFAULT NULL,
  `adres2` text DEFAULT NULL,
  `footer_text` text DEFAULT NULL,
  `analytics` text DEFAULT NULL,
  `meta` text DEFAULT NULL,
  `favicon` text NOT NULL,
  `logo` text NOT NULL,
  `author_name` text DEFAULT 'Eleganza Ajans',
  `author_link` text NOT NULL DEFAULT 'https://eleganzaajans.com',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `robots`, `description`, `twitter`, `facebook`, `linkedin`, `instagram`, `youtube`, `email`, `tel1`, `tel2`, `adres1`, `adres2`, `footer_text`, `analytics`, `meta`, `favicon`, `logo`, `author_name`, `author_link`) VALUES
(1, 'Haber', 1, 'Haber description', '#', '#', '#', '#', '#', 'haber@haber.com', '0531 123 4567', NULL, 'İstanbul', NULL, 'Copyright © 2020. Her Hakkı Saklıdır.', NULL, NULL, '', '', 'Ifeelcode', 'https://ifeelcode.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text DEFAULT NULL,
  `title_2` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`id`, `title`, `title_2`, `text`, `image`) VALUES
(1, 'Körük 1 başlık', 'Körük 1 alt yazı', NULL, 'ornek1.jpg'),
(2, 'Körük 2 başlık', 'Körük 2 alt yazı', NULL, 'ornek2.jpg'),
(3, 'Körük 3 başlık', 'Körük 3 alt yazı', NULL, 'ornek3.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

DROP TABLE IF EXISTS `urunler`;
CREATE TABLE IF NOT EXISTS `urunler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text DEFAULT NULL,
  `title_2` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `title`, `title_2`, `text`, `image`, `url`) VALUES
(1, 'Tren Körüğü', 'Tren (İkincil) Hava Süspansiyon Sistemleri; Tmok’un ana hedefi; oluşturulan bu güçlü bağı, stratejik hamlelerle kalıcı hale getirmek, yenilikçi ve değerlere önem veren anlayışın devamlılığını sağlamaktır', 'Tren (İkincil) Hava Süspansiyon Sistemleri; Tmok’un ana hedefi; oluşturulan bu güçlü bağı, stratejik hamlelerle kalıcı hale getirmek, yenilikçi ve değerlere önem veren anlayışın devamlılığını sağlamaktır.\r\n\r\nUzun yıllara dayanan deneyim, yüksek teknoloji, kaliteli işgücü ile Tmok, hava süspansiyon sistemlerindeki uzmanlığını raylara da yansıtarak bu alanda yatırımlar yapmıştır. Yapılan bu yatırımlar ile birlikte Tmok, Türkiye\'de tren körüğünü üreten firmalar listesine girmeye hak kazanmıştır.\r\n\r\nTmok, raylı sistemler süspansiyon sistemleri sektöründe sadece yerel pazara hizmet veren değil, global bir oyuncu olmak için çalışmalarına büyük bir enerjiyle devam etmektedir.', '1582653351..jpeg', '/urun/tren-korugu'),
(2, 'Otobüs Körüğü', 'Otobüslerde yolların yapısından kaynaklanan salınımlar, titreşimler ve ani şokları absorbe edip sürüş konforunu iyileştirme ihtiyacından doğmuştur ', NULL, 'ornek6.jpg', '/urun/otobus-korugu'),
(3, 'Metro Körüğü', 'Otobüslerde yolların yapısından kaynaklanan salınımlar, titreşimler ve ani şokları absorbe edip sürüş konforunu iyileştirme ihtiyacından doğmuştur ', NULL, 'ornek7.jpg', '/urun/metro-korugu');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` text CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eleganza', 'Ajans', 'admin@universitev.com', NULL, '$2y$10$g23sH56Ie6uRrDT3riy5YOlDeCYslqawwwr0WrX1wGUuCfnnhRzim', NULL, '2020-02-10 00:42:39', '2020-02-09 21:42:39'),
(4, 'Ömer', 'Duman', 'dumaniomer@outlook.com.tr', NULL, '$2y$10$SRwM6knx29dqQHS1.rs00./O8DBc2rKZMw.s9F275KqRj0kcVM2iO', NULL, '2020-02-16 13:22:08', '2020-02-16 10:22:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
