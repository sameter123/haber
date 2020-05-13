-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 13 May 2020, 07:40:25
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
-- Tablo için tablo yapısı `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

DROP TABLE IF EXISTS `sayfalar`;
CREATE TABLE IF NOT EXISTS `sayfalar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text DEFAULT NULL,
  `title_2` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `alan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sayfalar`
--

INSERT INTO `sayfalar` (`id`, `title`, `title_2`, `text`, `alan`) VALUES
(1, 'Üyelik Sözleşmesi', 'Üyelik Sözleşmesi', '<h2><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\">KİŞİSEL VERİLERİN İŞLENMESİNE İLİŞKİN AYDINLATMA METNİ<br><br><br><o:p></o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><b>1. Aydınlatma Metni’nin Amacı ve Şirketimizin Veri Sorumlusu Konumu:<o:p></o:p></b></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><o:p>&nbsp;</o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\">Şirketimiz EDS PLASTİK VE KALIP ÜRETİM İÇ VE DIŞ TİC. LTD. ŞTİ. (“MR EDS” ve/veya “Şirket”), müşterilere ilişkin kişisel veriler bakımından 6698 sayılı Kişisel Verilerin Korunması Kanunu (“Kanun”) kapsamında “veri sorumlusu” sıfatına sahip olup işbu Aydınlatma Metni ile söz konusu Kanun uyarınca müşterilerin MR EDS tarafından gerçekleştirilen kişisel veri işleme faaliyetleri hakkında aydınlatılması hedeflenmektedir.<o:p></o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><o:p>&nbsp;</o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><b>2. Müşterilere Ait Kişisel Verilerin İşlenme Amacı:<o:p></o:p></b></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><o:p>&nbsp;</o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\">Müşterilere ait kişisel veriler, MR EDS tarafından sunulan ürün ve hizmetlerden ilgili kişileri faydalandırmak için gerekli çalışmaların iş birimleri tarafından yapılması ve ilgili iş süreçlerinin yürütülmesi, MR EDS tarafından yürütülen ticari faaliyetlerin gerçekleştirilmesi için ilgili iş birimleri tarafından gerekli çalışmaların yapılması ve buna bağlı iş süreçlerinin yürütülmesi, MR EDS’nin ticari ve/veya iş stratejilerinin planlanması ve icrası, MR EDS’nin ve MR EDS ile iş ilişkisi içerisinde olan ilgili kişilerin hukuki, teknik ve ticari iş güvenliğinin temini de dahil olmak üzere Kanun’un 5. ve 6. maddelerinde belirtilen kişisel veri işleme şartları ve amaçları çerçevesinde işlenmektedir. Kişisel verilerin işlenmesine ilişkin detaylı bilgilere MR EDS Tarafından 6698 sayılı Kanun Kapsamında Kişisel Verilerin İşlenmesi ve Korunmasına İlişkin Politika’dan ulaşılabilecektir.<br><br><o:p></o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><o:p>&nbsp;</o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><b>3. Müşterilerin Açık Rızası Doğrultusunda İşlenecek Kişisel Veriler ve İşleme Amaçları:<o:p></o:p></b></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><o:p>&nbsp;</o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\">Açık rıza doğrultusunda işlenecek kişisel veriler ve işleme amaçları Rıza Metni’nde belirtilmiştir.<o:p></o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><o:p>&nbsp;</o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><b>4. Müşterilere Ait Kişisel Verilerin Aktarımı:<o:p></o:p></b></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><o:p>&nbsp;</o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\">Müşterilere ait kişisel veriler, MR EDS tarafından sunulan ürün ve hizmetlerden ilgili kişileri faydalandırmak için gerekli çalışmaların iş birimleri tarafından yapılması ve ilgili iş süreçlerinin yürütülmesi, MR EDS tarafından yürütülen ticari faaliyetlerin gerçekleştirilmesi için ilgili iş birimleri tarafından gerekli çalışmaların yapılması ve buna bağlı iş süreçlerinin yürütülmesi, MR EDS’nin ticari ve/veya iş stratejilerinin planlanması ve icrası, MR EDS’nin ve MR EDS ile iş ilişkisi içerisinde olan ilgili kişilerin hukuki, teknik ve ticari iş güvenliğinin temini için gerekli olan aktivitelerin planlanması ve icrası da dahil olmak üzere Kanun’un 8. ve 9. maddelerinde belirtilen kişisel veri işleme şartları ve amaçları çerçevesinde EDS PLASTİK VE KALIP ÜRETİM İÇ VE DIŞ TİC. LTD. ŞTİ., Şirket yetkilileri, iştiraklerimiz, iş ortaklarımız, tedarikçilerimiz, hissedarlarımız, kanunen yetkili kamu kurum ve kuruluşları ile özel kurumlar ile paylaşılabilecektir.<o:p></o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><o:p>&nbsp;</o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><b>5. Kişisel Verilerin Toplanma Yöntemi ve Hukuki Sebebi:<o:p></o:p></b></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><o:p>&nbsp;</o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\">Kişisel veriler, müşterilerden elektronik ortamda toplanmaktadır. Yukarıda belirtilen hukuki sebeplerle toplanan kişisel veriler Kanun’un 5. ve 6. maddelerinde ve bu Aydınlatma Metni ve açık rıza gerekli olduğu hallerde Rıza Metni’nde belirtilen amaçlarla işlenebilmekte ve aktarılabilmektedir.<o:p></o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><o:p>&nbsp;</o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><b>6. Kişisel Veri Sahibi Olarak Müşterilerin Hakları:<o:p></o:p></b></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><o:p>&nbsp;</o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\">Kanun’un 11. maddesi uyarınca veri sahipleri; (I) kendileri ile ilgili kişisel veri işlenip işlenmediğini öğrenme, (II) kişisel verileri işlenmişse buna ilişkin bilgi talep etme, (III) kişisel verilerin işlenme amacını ve bunların amacına uygun kullanılıp kullanılmadığını öğrenme, (IV) yurt içinde veya yurt dışında kişisel verilerin aktarıldığı üçüncü kişileri bilme, (V) kişisel verilerin eksik veya yanlış işlenmiş olması hâlinde bunların düzeltilmesini isteme ve bu kapsamda yapılan işlemin kişisel verilerin aktarıldığı üçüncü kişilere bildirilmesini isteme, (VI) Kanun ve ilgili diğer kanun hükümlerine uygun olarak işlenmiş olmasına rağmen, işlenmesini gerektiren sebeplerin ortadan kalkması hâlinde kişisel verilerin silinmesini veya yok edilmesini isteme ve bu kapsamda yapılan işlemin kişisel verilerin aktarıldığı üçüncü kişilere bildirilmesini isteme, (VII) işlenen verilerin münhasıran otomatik sistemler vasıtasıyla analiz edilmesi suretiyle kişinin kendisi aleyhine bir sonucun ortaya çıkmasına itiraz etme ve (VIII) kişisel verilerin kanuna aykırı olarak işlenmesi sebebiyle zarara uğraması hâlinde zararın giderilmesini talep etme haklarına sahiptir.<o:p></o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><o:p>&nbsp;</o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\">Söz konusu hakların kullanımına ilişkin talepler, kişisel veri sahipleri tarafından MR EDS Tarafından 6698 sayılı Kanun Kapsamında Kişisel Verilerin İşlenmesi ve Korunmasına İlişkin Politika‘da belirtilen yöntemlerle iletilebilecektir. MR EDS, söz konusu talepleri değerlendirerek 30 gün içerisinde sonuçlandıracaktır. MR EDS’nin taleplere ilişkin olarak Kişisel Verileri Koruma Kurulu tarafından belirlenen (varsa) ücret tarifesi üzerinden ücret talep etme hakkı saklıdır.<br><br><br><br><o:p></o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><o:p>&nbsp;</o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><b>KİŞİSEL VERİLERİN İŞLENMESİNE İLİŞKİN RIZA METNİ<o:p></o:p></b></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><o:p>&nbsp;</o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\">Şirketimiz EDS PLASTİK VE KALIP ÜRETİM İÇ VE DIŞ TİC. LTD. ŞTİ. (“MR EDS” ve/veya “Şirket”), müşterilere ilişkin kişisel veriler bakımından 6698 sayılı Kişisel Verilerin Korunması Kanunu (“Kanun”) kapsamında “veri sorumlusu” sıfatına sahip olup işbu Rıza Metni ile söz konusu Kanun uyarınca müşterilerin MR EDS tarafından gerçekleştirilen ve aşağıda belirtilen kişisel veri işleme faaliyetlerine ilişkin açık rızalarının temini hedeflenmektedir.<o:p></o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><o:p>&nbsp;</o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\">Kanun’un 5/2 ile 6/3 maddesinde yer alan kişisel veri işleme şartlarının karşılanamadığı aşağıdaki durumlar için MR EDS tarafından kişisel verilerin işlenebilmesi için müşterilerin açık rızasının alınması gerekmektedir. Açık rıza gerektirmeyen süreçlere ilişkin olarak Aydınlatma Metni kapsamında veri işleme faaliyetleri sürdürülmekte olup açık rıza gerektiren süreçlerde de Aydınlatma Metni’nde belirtilen temel prensiplere uygun veri işlenmektedir.<o:p></o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\"><o:p>&nbsp;</o:p></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0);\">Bu kapsamda müşterilerin kişisel verileri MR EDS Tarafından 6698 sayılı Kanun Kapsamında Kişisel Verilerin İşlenmesi ve Korunmasına İlişkin Politika‘da Bölüm 3 – Madde IV altında belirtilen amaçlarla ve buradaki usule uygun olarak işlenmektedir. Buna göre kişisel veriler; müşterilere yönelik kampanyaların oluşturulması, MR EDS iş ortakları tarafından MR EDS müşterilerine MR EDS’de kullanabilecekleri özel fırsatların sunulması, çapraz satış yapılması, hedef kitle belirlenmesi, Müşteri hareketlerinin takip edilerek kullanıcı deneyimini arttırıcı faaliyetlerin yürütülmesi, MR EDS’ye ait internet sitesi ile mobil uygulamanın işleyişinin geliştirilmesi ve Müşteri ihtiyaçlarına göre kişiselleştirilmesi, doğrudan ve doğrudan olmayan pazarlama, kişiye özel pazarlama ve yeniden pazarlama faaliyetlerinin yürütülmesi, kişiye özel segmentasyon, hedefleme, analiz ve şirket içi raporlama faaliyetlerinin yürütülmesi, pazar araştırmaları, müşteri memnuniyeti aktivitelerinin planlanması ve icrası, MR EDS’nin sunduğu ürün ve hizmetlerin ilgili kişilerin beğeni, kullanım alışkanlıkları ve ihtiyaçlarına göre özelleştirilerek ilgili kişilere önerilmesi ve tanıtılması ile müşteri ilişkileri yönetimi süreçlerinin planlanması ve icrası amaçları da dahil olmak üzere genel anlamda MR EDS’nin ürün ve/veya hizmetlerinin satış ve pazarlama süreçlerinin planlanması ve icrası, MR EDS’nin sunduğu ürün ve/veya hizmetlere bağlılık oluşturulması ve/veya arttırılması süreçlerinin planlanması ve icrası kapsamında Müşteri’nin vereceği onayı doğrultusunda işlenebilecek ve bu amaçlara yönelik olarak Aydınlatma Metni’nde belirtilen taraflarla paylaşılabilecektir.<br><br>* Müşteri (son kullanıcı), ödeme yöntemine, üyeliğine ve siparişine ilişkin bilgilerin, ödemenin gerçekleştirilebilmesi ve ödeme usulsüzlüklerinin önlenmesi, araştırılması ve tespit edilmesini temin amacıyla iyzico Ödeme Hizmetleri A.Ş.’ye aktarılmasına ve iyzico tarafından https://www.iyzico.com/gizlilik-politikasi/ adresindeki Gizlilik Politikası’nın en güncel halinde açıklandığı şekilde işlenmesine ve saklanmasına rıza göstermektedir.<o:p></o:p></p></h2>', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` text DEFAULT NULL,
  `site_description` text DEFAULT NULL,
  `footer_text` text DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `favicon` text DEFAULT NULL,
  `meta_tag` text DEFAULT NULL,
  `analytics` text DEFAULT NULL,
  `tel_1` text DEFAULT NULL,
  `tel_2` text DEFAULT NULL,
  `email_1` text DEFAULT NULL,
  `email_2` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `adress` text DEFAULT NULL,
  `adress_iframe` text DEFAULT NULL,
  `robots` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_description`, `footer_text`, `icon`, `favicon`, `meta_tag`, `analytics`, `tel_1`, `tel_2`, `email_1`, `email_2`, `facebook`, `twitter`, `youtube`, `linkedin`, `instagram`, `adress`, `adress_iframe`, `robots`, `created_at`, `updated_at`) VALUES
(1, 'Deneme ad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` text CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `telefon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `telefon`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Samet Mert', 'Öztürk', 'sametmertozturk1@gmail.com', NULL, NULL, '$2y$10$TadssjLX6nLEgQfLHS.ISugvH6nECkvLrOPniZkoF49IjGS1ejxKO', 'wTyO7w0qho2muREWSOZ4gQP2Pe2BgZ1LPokmp6ePobB4i4OtjE6H0rnyHxJm', '2020-05-10 21:59:44', '2020-05-10 21:59:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
