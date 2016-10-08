-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Eki 2016, 12:47:16
-- Sunucu sürümü: 10.1.13-MariaDB
-- PHP Sürümü: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `db_mekhan`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_auth`
--

CREATE TABLE `li_auth` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `members` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `services` tinytext COLLATE utf8_unicode_ci,
  `bids` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `customers` tinytext COLLATE utf8_unicode_ci,
  `slider` tinytext COLLATE utf8_unicode_ci,
  `gallery` tinytext COLLATE utf8_unicode_ci,
  `categories` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `pages` tinytext COLLATE utf8_unicode_ci,
  `users` tinytext COLLATE utf8_unicode_ci,
  `logs` tinytext COLLATE utf8_unicode_ci,
  `definitions` tinytext COLLATE utf8_unicode_ci,
  `settings` tinytext COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `li_auth`
--

INSERT INTO `li_auth` (`id`, `user_id`, `members`, `services`, `bids`, `customers`, `slider`, `gallery`, `categories`, `pages`, `users`, `logs`, `definitions`, `settings`) VALUES
(1, 1, 'insert,list,status,update,delete', 'list,status,update,delete', 'list,status,update,delete', 'insert,list,status,priority,update,delete', 'insert,list,status,priority,update,delete', 'insert,list,status,priority,update,delete', 'insert,list,status,priority,update,delete', 'insert,list,status,priority,update,delete', 'insert,list,status,update,delete', 'list', 'update', 'update'),
(12, 2, 'insert,list,status,update,delete', 'list,status,update,delete', 'list,status,update,delete', 'insert,list,status,priority,update,delete', 'insert,list,status,priority,update,delete', 'insert,list,status,priority,update,delete', 'insert,list,status,priority,update,delete', 'insert,list,status,priority,update,delete', 'insert,list,status,update,delete', 'list', 'update', 'update'),
(13, 3, '', '', '', 'insert,list,status,priority,update,delete', 'insert,list,status,priority,update', 'insert,list,status,priority,update,delete', '', 'insert,list,status,priority,update,delete', 'insert,list,status,update', 'list', 'update', 'update');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_bids`
--

CREATE TABLE `li_bids` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `tel` tinytext COLLATE utf8_unicode_ci,
  `county` int(11) NOT NULL,
  `town` int(11) NOT NULL,
  `title` tinytext COLLATE utf8_unicode_ci,
  `details` longtext COLLATE utf8_unicode_ci,
  `amount` tinytext COLLATE utf8_unicode_ci,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `hit` int(11) NOT NULL DEFAULT '1',
  `ip` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `times` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_blog`
--

CREATE TABLE `li_blog` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `img` text NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `link` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `li_blog`
--

INSERT INTO `li_blog` (`id`, `title`, `img`, `content`, `date`, `link`, `status`) VALUES
(7, 'Yazı Adına Bak', '/uplo4ds/files/2911813.jpg', 'Yazı İçeriği', '2016-10-23', 'yazi-adina-bak', 1),
(8, '3. Yazı', '/uplo4ds/files/bfc099d3-973f-4cfb-88c2-111a5cf514f9.jpg', '3. Yazı İçeriği Buraya Gelecek', '2016-10-16', '3-yazi', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_boats`
--

CREATE TABLE `li_boats` (
  `id` int(11) NOT NULL,
  `urunkod` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `title` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `footer_fotograf` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ozellik` text COLLATE utf8_unicode_ci NOT NULL,
  `renk` text COLLATE utf8_unicode_ci NOT NULL,
  `sfiyat` text COLLATE utf8_unicode_ci NOT NULL,
  `marka` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `markaseo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `kisi_basi` int(11) NOT NULL,
  `ozel_k` int(11) NOT NULL,
  `yolcu_k` int(11) NOT NULL,
  `acenta_f` int(11) NOT NULL,
  `rehber_f` int(11) NOT NULL,
  `toptan_f` int(11) NOT NULL,
  `kalkis_n` text COLLATE utf8_unicode_ci NOT NULL,
  `varis_n` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tarih1` date NOT NULL,
  `tarih2` date NOT NULL,
  `tarih3` date NOT NULL,
  `footer_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `li_boats`
--

INSERT INTO `li_boats` (`id`, `urunkod`, `title`, `footer_fotograf`, `ozellik`, `renk`, `sfiyat`, `marka`, `markaseo`, `kisi_basi`, `ozel_k`, `yolcu_k`, `acenta_f`, `rehber_f`, `toptan_f`, `kalkis_n`, `varis_n`, `priority`, `status`, `tarih1`, `tarih2`, `tarih3`, `footer_link`) VALUES
(1, '', 'asdasdasdcadfasdffgnhdfghnd', '/uplo4ds/files/2875552.jpg', 'null', '[]', '[]', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, 1, '0000-00-00', '0000-00-00', '0000-00-00', 'adsfvsdf');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_boat_cats`
--

CREATE TABLE `li_boat_cats` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `fotograf` text NOT NULL,
  `cokiyi` int(11) NOT NULL,
  `sorunlu` int(11) NOT NULL,
  `garanti` int(11) NOT NULL,
  `sarj` int(11) NOT NULL,
  `kulaklik` int(11) NOT NULL,
  `gb8` int(11) NOT NULL,
  `gb16` int(11) NOT NULL,
  `gb32` int(11) NOT NULL,
  `gb64` int(11) NOT NULL,
  `gb128` int(11) NOT NULL,
  `fiyat` int(11) NOT NULL,
  `marka` varchar(250) NOT NULL,
  `markaseo` varchar(250) NOT NULL,
  `renk` text NOT NULL,
  `status` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `li_boat_cats`
--

INSERT INTO `li_boat_cats` (`id`, `title`, `fotograf`, `cokiyi`, `sorunlu`, `garanti`, `sarj`, `kulaklik`, `gb8`, `gb16`, `gb32`, `gb64`, `gb128`, `fiyat`, `marka`, `markaseo`, `renk`, `status`, `priority`) VALUES
(5, 'Ahs Yatçılık', '/uploads/files/samsung/samsun g/samsung tamir/ipad /samsung-g928-galaxy-s6-edge-32gb-gold_441615-18.jpeg', 100, 1250, 50, 50, 50, 0, 100, 100, 100, 100, 1200, 'Gezi Tekneleri', 'gezi-tekneleri', '["Siyah","Beyaz"]', 1, 0),
(6, 'Club Marina', '/uploads/files/samsung/apple /APPLE 6S.png', 250, 1000, 50, 25, 25, 0, 10, 0, 190, 290, 2000, 'Davet Tekneleri', 'davet-tekneleri', '["Beyaz","Siyah","Gold","Rose Gold"]', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_categories`
--

CREATE TABLE `li_categories` (
  `id` int(11) NOT NULL,
  `top_id` int(11) NOT NULL DEFAULT '0',
  `title` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `seo_url` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `fotograf` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `times` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `li_categories`
--

INSERT INTO `li_categories` (`id`, `top_id`, `title`, `seo_url`, `fotograf`, `priority`, `status`, `times`, `link`) VALUES
(275, 0, 'adag', 'adag', '/uplo4ds/files/reklam.jpg', 0, 1, '2016-09-26 07:50:45', 'http://facebook.com/');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_county`
--

CREATE TABLE `li_county` (
  `id` int(11) NOT NULL,
  `constant` varchar(225) NOT NULL DEFAULT 'ilce',
  `value` text NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '100'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `li_county`
--

INSERT INTO `li_county` (`id`, `constant`, `value`, `parent_id`) VALUES
(52, 'il', 'Adana', 0),
(53, 'il', 'Adıyaman', 0),
(54, 'il', 'Afyonkarahisar', 0),
(55, 'il', 'Ağrı', 0),
(56, 'il', 'Amasya', 0),
(57, 'il', 'Ankara', 0),
(58, 'il', 'Antalya', 0),
(59, 'il', 'Artvin', 0),
(60, 'il', 'Aydın', 0),
(61, 'il', 'Balıkesir', 0),
(62, 'il', 'Bilecik', 0),
(63, 'il', 'Bingöl', 0),
(64, 'il', 'Bitlis', 0),
(65, 'il', 'Bolu', 0),
(66, 'il', 'Burdur', 0),
(67, 'il', 'Bursa', 0),
(68, 'il', 'Çanakkale', 0),
(69, 'il', 'Çankırı', 0),
(70, 'il', 'Çorum', 0),
(71, 'il', 'Denizli', 0),
(72, 'il', 'Diyarbakır', 0),
(73, 'il', 'Edirne', 0),
(74, 'il', 'Elazığ', 0),
(75, 'il', 'Erzincan', 0),
(76, 'il', 'Erzurum', 0),
(77, 'il', 'Eskişehir', 0),
(78, 'il', 'Gaziantep', 0),
(79, 'il', 'Giresun', 0),
(80, 'il', 'Gümüşhane', 0),
(81, 'il', 'Hakkari', 0),
(82, 'il', 'Hatay', 0),
(83, 'il', 'Isparta', 0),
(84, 'il', 'Mersin', 0),
(85, 'il', 'İstanbul', 0),
(86, 'il', 'İzmir', 0),
(87, 'il', 'Kars', 0),
(88, 'il', 'Kastamonu', 0),
(89, 'il', 'Kayseri', 0),
(90, 'il', 'Kırklareli', 0),
(91, 'il', 'Kırşehir', 0),
(92, 'il', 'Kocaeli', 0),
(93, 'il', 'Konya', 0),
(94, 'il', 'Kütahya', 0),
(95, 'il', 'Malatya', 0),
(96, 'il', 'Manisa', 0),
(97, 'il', 'Kahramanmaraş', 0),
(98, 'il', 'Mardin', 0),
(99, 'il', 'Muğla', 0),
(100, 'il', 'Muş', 0),
(101, 'il', 'Nevşehir', 0),
(102, 'il', 'Niğde', 0),
(103, 'il', 'Ordu', 0),
(104, 'il', 'Rize', 0),
(105, 'il', 'Sakarya', 0),
(106, 'il', 'Samsun', 0),
(107, 'il', 'Siirt', 0),
(108, 'il', 'Sinop', 0),
(109, 'il', 'Sivas', 0),
(110, 'il', 'Tekirdağ', 0),
(111, 'il', 'Tokat', 0),
(112, 'il', 'Trabzon', 0),
(113, 'il', 'Tunceli', 0),
(114, 'il', 'Şanlıurfa', 0),
(115, 'il', 'Uşak', 0),
(116, 'il', 'Van', 0),
(117, 'il', 'Yozgat', 0),
(118, 'il', 'Zonguldak', 0),
(119, 'il', 'Aksaray', 0),
(120, 'il', 'Bayburt', 0),
(121, 'il', 'Karaman', 0),
(122, 'il', 'Kırıkkale', 0),
(123, 'il', 'Batman', 0),
(124, 'il', 'Şırnak', 0),
(125, 'il', 'Bartın', 0),
(126, 'il', 'Ardahan', 0),
(127, 'il', 'Iğdır', 0),
(128, 'il', 'Yalova', 0),
(129, 'il', 'Karabük', 0),
(130, 'il', 'Kilis', 0),
(131, 'il', 'Düzce', 0),
(132, 'ilce', 'Efeler', 60),
(133, 'ilce', 'Bozdoğan', 60),
(134, 'ilce', 'Buharkent', 60),
(135, 'ilce', 'Çine', 60),
(136, 'ilce', 'Didim', 60),
(137, 'ilce', 'Germencik', 60),
(138, 'ilce', 'İncirliova', 60),
(139, 'ilce', 'Karacasu', 60),
(140, 'ilce', 'Karpuzlu', 60),
(141, 'ilce', 'Koçarlı', 60),
(142, 'ilce', 'Köşk', 60),
(143, 'ilce', 'Kuşadası', 60),
(144, 'ilce', 'Kuyucak', 60),
(145, 'ilce', 'Nazilli', 60),
(146, 'ilce', 'Söke', 60),
(147, 'ilce', 'Sultanhisar', 60),
(148, 'ilce', 'Yenipazar', 60),
(149, 'ilce', 'Merkez', 66),
(150, 'ilce', 'Ağlasun', 66),
(151, 'ilce', 'Altınyayla', 66),
(152, 'ilce', 'Bucak', 66),
(153, 'ilce', 'Çavdır', 66),
(154, 'ilce', 'Çeltikçi', 66),
(155, 'ilce', 'Gölhisar', 66),
(156, 'ilce', 'Karamanlı', 66),
(157, 'ilce', 'Kemer', 66),
(158, 'ilce', 'Tefenni', 66),
(159, 'ilce', 'Yeşilova', 66),
(160, 'ilce', 'Merkez', 83),
(161, 'ilce', 'Aksu', 83),
(162, 'ilce', 'Atabey', 83),
(163, 'ilce', 'Eğirdir', 83),
(164, 'ilce', 'Gelendost', 83),
(165, 'ilce', 'Gönen', 83),
(166, 'ilce', 'Keçiborlu', 83),
(167, 'ilce', 'Senirkent', 83),
(168, 'ilce', 'Sütçüler', 83),
(169, 'ilce', 'Şarkikaraağaç', 83),
(170, 'ilce', 'Uluborlu', 83),
(171, 'ilce', 'Yalvaç', 83),
(172, 'ilce', 'Yenişarbademli', 83),
(211, 'ilce', 'Aladağ', 52),
(212, 'ilce', 'Ceyhan', 52),
(213, 'ilce', 'Çukurova', 52),
(214, 'ilce', 'Feke', 52),
(215, 'ilce', 'İmamoğlu', 52),
(216, 'ilce', 'Karaisalı', 52),
(217, 'ilce', 'Karataş', 52),
(218, 'ilce', 'Kozan', 52),
(219, 'ilce', 'Pozantı', 52),
(220, 'ilce', 'Saimbeyli', 52),
(221, 'ilce', 'Sarıçam', 52),
(222, 'ilce', 'Seyhan', 52),
(223, 'ilce', 'Tufanbeyli', 52),
(224, 'ilce', 'Yumurtalık', 52),
(225, 'ilce', 'Yüreğir', 52),
(226, 'ilce', 'Besni', 53),
(227, 'ilce', 'Çelikhan', 53),
(228, 'ilce', 'Gerger', 53),
(229, 'ilce', 'Gölbaşı', 53),
(230, 'ilce', 'Kahta', 53),
(231, 'ilce', 'Samsat', 53),
(232, 'ilce', 'Sincik', 53),
(233, 'ilce', 'Tut', 53),
(234, 'ilce', 'Basmakçı', 54),
(235, 'ilce', 'Bayat', 54),
(236, 'ilce', 'Bolvadin', 54),
(237, 'ilce', 'Çay', 54),
(238, 'ilce', 'Çobanlar', 54),
(239, 'ilce', 'Dazkırı', 54),
(240, 'ilce', 'Dinar', 54),
(241, 'ilce', 'Emirdağ', 54),
(242, 'ilce', 'Evciler', 54),
(243, 'ilce', 'Hocalar', 54),
(244, 'ilce', 'İhsaniye', 54),
(245, 'ilce', 'İscehisar', 54),
(246, 'ilce', 'Kızılören', 54),
(247, 'ilce', 'Sandıklı', 54),
(248, 'ilce', 'Sinanpaşa', 54),
(249, 'ilce', 'Sultandağı', 54),
(250, 'ilce', 'Şuhut', 54),
(251, 'ilce', 'Diyadin', 55),
(252, 'ilce', 'Doğubeyazıt', 55),
(253, 'ilce', 'Eleşkirt', 55),
(254, 'ilce', 'Hamur', 55),
(255, 'ilce', 'Patnos', 55),
(256, 'ilce', 'Taşlıçay', 55),
(257, 'ilce', 'Tutak', 55),
(258, 'ilce', 'Göynücek', 56),
(259, 'ilce', 'Gümüşhacıköy', 56),
(260, 'ilce', 'Hamamözü', 56),
(261, 'ilce', 'Merzifon', 56),
(262, 'ilce', 'Suluova', 56),
(263, 'ilce', 'Taşova', 56),
(264, 'ilce', 'Akyurt', 57),
(265, 'ilce', 'Altındağ', 57),
(266, 'ilce', 'Ayaş', 57),
(267, 'ilce', 'Bala', 57),
(268, 'ilce', 'Beypazarı', 57),
(269, 'ilce', 'Çamlıdere', 57),
(270, 'ilce', 'Çankaya', 57),
(271, 'ilce', 'Çubuk', 57),
(272, 'ilce', 'Elmadağ', 57),
(273, 'ilce', 'Etimesgut', 57),
(274, 'ilce', 'Evren', 57),
(275, 'ilce', 'Gölbaşı', 57),
(276, 'ilce', 'Güdül', 57),
(277, 'ilce', 'Haymana', 57),
(278, 'ilce', 'Kalecik', 57),
(279, 'ilce', 'Kazan', 57),
(280, 'ilce', 'Keçiören', 57),
(281, 'ilce', 'Kızılcahamam', 57),
(282, 'ilce', 'Mamak', 57),
(283, 'ilce', 'Nallıhan', 57),
(284, 'ilce', 'Polatlı', 57),
(285, 'ilce', 'Pursaklar', 57),
(286, 'ilce', 'Sincan', 57),
(287, 'ilce', 'Şereflikoçhisar', 57),
(288, 'ilce', 'Yenimahalle', 57),
(289, 'ilce', 'Akseki', 58),
(290, 'ilce', 'Aksu', 58),
(291, 'ilce', 'Alanya', 58),
(292, 'ilce', 'Demre', 58),
(293, 'ilce', 'Döşemealtı', 58),
(294, 'ilce', 'Elmalı', 58),
(295, 'ilce', 'Finike', 58),
(296, 'ilce', 'Gazipaşa', 58),
(297, 'ilce', 'Gündoğmuş', 58),
(298, 'ilce', 'İbradi', 58),
(299, 'ilce', 'Kaş', 58),
(300, 'ilce', 'Kemer', 58),
(301, 'ilce', 'Kepez', 58),
(302, 'ilce', 'Konyaaltı', 58),
(303, 'ilce', 'Korkuteli', 58),
(304, 'ilce', 'Kumluca', 58),
(305, 'ilce', 'Manavgat', 58),
(306, 'ilce', 'Muratpaşa', 58),
(307, 'ilce', 'Serik', 58),
(308, 'ilce', 'Ardanuç', 59),
(309, 'ilce', 'Arhavi', 59),
(310, 'ilce', 'Borçka', 59),
(311, 'ilce', 'Hopa', 59),
(312, 'ilce', 'Murgul', 59),
(313, 'ilce', 'Şavşat', 59),
(314, 'ilce', 'Yusufeli', 59),
(315, 'ilce', 'Ayvalık', 61),
(316, 'ilce', 'Balya', 61),
(317, 'ilce', 'Bandırma', 61),
(318, 'ilce', 'Bigadiç', 61),
(319, 'ilce', 'Burhaniye', 61),
(320, 'ilce', 'Dursunbey', 61),
(321, 'ilce', 'Edremit', 61),
(322, 'ilce', 'Erdek', 61),
(323, 'ilce', 'Gömeç', 61),
(324, 'ilce', 'Gönen', 61),
(325, 'ilce', 'Havran', 61),
(326, 'ilce', 'İvrindi', 61),
(327, 'ilce', 'Kepsut', 61),
(328, 'ilce', 'Manyas', 61),
(329, 'ilce', 'Marmara', 61),
(330, 'ilce', 'Savaştepe', 61),
(331, 'ilce', 'Sındırgı', 61),
(332, 'ilce', 'Susurluk', 61),
(333, 'ilce', 'Bozüyük', 62),
(334, 'ilce', 'Gölpazarı', 62),
(335, 'ilce', 'İnhisar', 62),
(336, 'ilce', 'Osmaneli', 62),
(337, 'ilce', 'Pazaryeri', 62),
(338, 'ilce', 'Söğüt', 62),
(339, 'ilce', 'Yenipazar', 62),
(340, 'ilce', 'Adaklı', 63),
(341, 'ilce', 'Genç', 63),
(342, 'ilce', 'Karlıova', 63),
(343, 'ilce', 'Kığı', 63),
(344, 'ilce', 'Solhan', 63),
(345, 'ilce', 'Yayladere', 63),
(346, 'ilce', 'Yedisu', 63),
(347, 'ilce', 'Adilcevaz', 64),
(348, 'ilce', 'Ahlat', 64),
(349, 'ilce', 'Güroymak', 64),
(350, 'ilce', 'Hizan', 64),
(351, 'ilce', 'Mutki', 64),
(352, 'ilce', 'Tatvan', 64),
(353, 'ilce', 'Dörtdivan', 65),
(354, 'ilce', 'Gerede', 65),
(355, 'ilce', 'Göynük', 65),
(356, 'ilce', 'Kıbrısçık', 65),
(357, 'ilce', 'Mengen', 65),
(358, 'ilce', 'Mudurnu', 65),
(359, 'ilce', 'Seben', 65),
(360, 'ilce', 'Yeniçağa', 65),
(371, 'ilce', 'Büyükorhan', 67),
(372, 'ilce', 'Gemlik', 67),
(373, 'ilce', 'Gürsu', 67),
(374, 'ilce', 'Harmancık', 67),
(375, 'ilce', 'İnegöl', 67),
(376, 'ilce', 'İznik', 67),
(377, 'ilce', 'Karacabey', 67),
(378, 'ilce', 'Keleş', 67),
(379, 'ilce', 'Kestel', 67),
(380, 'ilce', 'Mudanya', 67),
(381, 'ilce', 'Mustafakemalpaşa', 67),
(382, 'ilce', 'Nilüfer', 67),
(383, 'ilce', 'Orhaneli', 67),
(384, 'ilce', 'Orhangazi', 67),
(385, 'ilce', 'Osmangazi', 67),
(386, 'ilce', 'Yenişehir', 67),
(387, 'ilce', 'Yıldırım', 67),
(388, 'ilce', 'Ayvacık', 68),
(389, 'ilce', 'Bayramiç', 68),
(390, 'ilce', 'Biga', 68),
(391, 'ilce', 'Bozcaada', 68),
(392, 'ilce', 'Çan', 68),
(393, 'ilce', 'Eceabat', 68),
(394, 'ilce', 'Ezine', 68),
(395, 'ilce', 'Gelibolu', 68),
(396, 'ilce', 'Gökçeada', 68),
(397, 'ilce', 'Lapseki', 68),
(398, 'ilce', 'Yenice', 68),
(399, 'ilce', 'Atkaracalar', 69),
(400, 'ilce', 'Bayramören', 69),
(401, 'ilce', 'Çerkeş', 69),
(402, 'ilce', 'Eldivan', 69),
(403, 'ilce', 'Ilgaz', 69),
(404, 'ilce', 'Kızılırmak', 69),
(405, 'ilce', 'Korgun', 69),
(406, 'ilce', 'Kurşunlu', 69),
(407, 'ilce', 'Orta', 69),
(408, 'ilce', 'Şabanözü', 69),
(409, 'ilce', 'Yapraklı', 69),
(410, 'ilce', 'Alaca', 70),
(411, 'ilce', 'Bayat', 70),
(412, 'ilce', 'Boğazkale', 70),
(413, 'ilce', 'Dodurga', 70),
(414, 'ilce', 'İskilp', 70),
(415, 'ilce', 'Kargı', 70),
(416, 'ilce', 'Laçin', 70),
(417, 'ilce', 'Mecitözü', 70),
(418, 'ilce', 'Oğuzlar', 70),
(419, 'ilce', 'Ortaköy', 70),
(420, 'ilce', 'Osmancık', 70),
(421, 'ilce', 'Sungurlu', 70),
(422, 'ilce', 'Uğurludağ', 70),
(423, 'ilce', 'Acıpayam', 71),
(424, 'ilce', 'Akköy', 71),
(425, 'ilce', 'Babadağ', 71),
(426, 'ilce', 'Baklan', 71),
(427, 'ilce', 'Bekilli', 71),
(428, 'ilce', 'Beyağaç', 71),
(429, 'ilce', 'Bozkurt', 71),
(430, 'ilce', 'Buldan', 71),
(431, 'ilce', 'Çal', 71),
(432, 'ilce', 'Çameli', 71),
(433, 'ilce', 'Çardak', 71),
(434, 'ilce', 'Çivril', 71),
(435, 'ilce', 'Güney', 71),
(436, 'ilce', 'Honaz', 71),
(437, 'ilce', 'Kale', 71),
(438, 'ilce', 'Sarayköy', 71),
(439, 'ilce', 'Serinhisar', 71),
(440, 'ilce', 'Tavas', 71),
(441, 'ilce', 'Bağlar', 72),
(442, 'ilce', 'Bismil', 72),
(443, 'ilce', 'Çermik', 72),
(444, 'ilce', 'Çınar', 72),
(445, 'ilce', 'Çüngüş', 72),
(446, 'ilce', 'Dicle', 72),
(447, 'ilce', 'Eğil', 72),
(448, 'ilce', 'Ergani', 72),
(449, 'ilce', 'Hani', 72),
(450, 'ilce', 'Hazro', 72),
(451, 'ilce', 'Kayapınar', 72),
(452, 'ilce', 'Kocaköy', 72),
(453, 'ilce', 'Kulp', 72),
(454, 'ilce', 'Lice', 72),
(455, 'ilce', 'Silvan', 72),
(456, 'ilce', 'Sur', 72),
(457, 'ilce', 'Yenişehir', 72),
(458, 'ilce', 'Enez', 73),
(459, 'ilce', 'Havsa', 73),
(460, 'ilce', 'İpsala', 73),
(461, 'ilce', 'Keşan', 73),
(462, 'ilce', 'Lalapaşa', 73),
(463, 'ilce', 'Meriç', 73),
(464, 'ilce', 'Süloğlu', 73),
(465, 'ilce', 'Uzunköprü', 73),
(466, 'ilce', 'Ağın', 74),
(467, 'ilce', 'Alacakaya', 74),
(468, 'ilce', 'Arıcak', 74),
(469, 'ilce', 'Baskil', 74),
(470, 'ilce', 'Karakoçan', 74),
(471, 'ilce', 'Keban', 74),
(472, 'ilce', 'Kovancılar', 74),
(473, 'ilce', 'Maden', 74),
(474, 'ilce', 'Palu', 74),
(475, 'ilce', 'Sivrice', 74),
(476, 'ilce', 'Çayırlı', 75),
(477, 'ilce', 'İliç', 75),
(478, 'ilce', 'Kemah', 75),
(479, 'ilce', 'Kemaliye', 75),
(480, 'ilce', 'Otlukbeli', 75),
(481, 'ilce', 'Refahiye', 75),
(482, 'ilce', 'Tercan', 75),
(483, 'ilce', 'Üzümlü', 75),
(484, 'ilce', 'Aşkale', 76),
(485, 'ilce', 'Aziziye', 76),
(486, 'ilce', 'Çat', 76),
(487, 'ilce', 'Hınıs', 76),
(488, 'ilce', 'Horasan', 76),
(489, 'ilce', 'İspir', 76),
(490, 'ilce', 'Karaçoban', 76),
(491, 'ilce', 'Karayazı', 76),
(492, 'ilce', 'Köprüköy', 76),
(493, 'ilce', 'Narman', 76),
(494, 'ilce', 'Oltu', 76),
(495, 'ilce', 'Olur', 76),
(496, 'ilce', 'Palandöken', 76),
(497, 'ilce', 'Pasinler', 76),
(498, 'ilce', 'Pazaryolu', 76),
(499, 'ilce', 'Şenkaya', 76),
(500, 'ilce', 'Tekman', 76),
(501, 'ilce', 'Tortum', 76),
(502, 'ilce', 'Uzundere', 76),
(503, 'ilce', 'Yakutiye', 76),
(504, 'ilce', 'Alpu', 77),
(505, 'ilce', 'Beylikova', 77),
(506, 'ilce', 'Çifteler', 77),
(507, 'ilce', 'Günyüzü', 77),
(508, 'ilce', 'Han', 77),
(509, 'ilce', 'İnönü', 77),
(510, 'ilce', 'Mahmudiye', 77),
(511, 'ilce', 'Mihalgazi', 77),
(512, 'ilce', 'Mihalıççık', 77),
(513, 'ilce', 'Odunpazarı', 77),
(514, 'ilce', 'Sarıcakaya', 77),
(515, 'ilce', 'Seyitgazi', 77),
(516, 'ilce', 'Sivrihisar', 77),
(517, 'ilce', 'Tepebaşı', 77),
(518, 'ilce', 'Araban', 78),
(519, 'ilce', 'İslahiye', 78),
(520, 'ilce', 'Karkamış', 78),
(521, 'ilce', 'Nizip', 78),
(522, 'ilce', 'Nurdağı', 78),
(523, 'ilce', 'Oğuzeli', 78),
(524, 'ilce', 'Şahinbey', 78),
(525, 'ilce', 'Şehit Kamil', 78),
(526, 'ilce', 'Yavuzeli', 78),
(527, 'ilce', 'Alucra', 79),
(528, 'ilce', 'Bulancak', 79),
(529, 'ilce', 'Çamoluk', 79),
(530, 'ilce', 'Çanakçı', 79),
(531, 'ilce', 'Dereli', 79),
(532, 'ilce', 'Doğankent', 79),
(533, 'ilce', 'Espiye', 79),
(534, 'ilce', 'Eynesil', 79),
(535, 'ilce', 'Görele', 79),
(536, 'ilce', 'Güce', 79),
(537, 'ilce', 'Keşap', 79),
(538, 'ilce', 'Piraziz', 79),
(539, 'ilce', 'Şebinkarahisar', 79),
(540, 'ilce', 'Tirebolu', 79),
(541, 'ilce', 'Yağlıdere', 79),
(542, 'ilce', 'Kelkit', 80),
(543, 'ilce', 'Köse', 80),
(544, 'ilce', 'Kürtün', 80),
(545, 'ilce', 'Siran', 80),
(546, 'ilce', 'Torul', 80),
(547, 'ilce', 'Çukurca', 81),
(548, 'ilce', 'Şemdinli', 81),
(549, 'ilce', 'Yüksekova', 81),
(550, 'ilce', 'Altınözü', 82),
(551, 'ilce', 'Belen', 82),
(552, 'ilce', 'Dörtyol', 82),
(553, 'ilce', 'Erzin', 82),
(554, 'ilce', 'Hassa', 82),
(555, 'ilce', 'İskenderun', 82),
(556, 'ilce', 'Kırıkhan', 82),
(557, 'ilce', 'Kumlu', 82),
(558, 'ilce', 'Samandağ', 82),
(559, 'ilce', 'Yayladağ', 82),
(560, 'ilce', 'Akdeniz', 84),
(561, 'ilce', 'Anamur', 84),
(562, 'ilce', 'Aydıncık', 84),
(563, 'ilce', 'Bozyazı', 84),
(564, 'ilce', 'Çamlıyayla', 84),
(565, 'ilce', 'Erdemli', 84),
(566, 'ilce', 'Gülnar', 84),
(567, 'ilce', 'Mezitli', 84),
(568, 'ilce', 'Mut', 84),
(569, 'ilce', 'Silifke', 84),
(570, 'ilce', 'Tarsus', 84),
(571, 'ilce', 'Toroslar', 84),
(572, 'ilce', 'Yenişehir', 84),
(573, 'ilce', 'Adalar', 85),
(574, 'ilce', 'Arnavutköy', 85),
(575, 'ilce', 'Ataşehir', 85),
(576, 'ilce', 'Avcılar', 85),
(577, 'ilce', 'Bağcılar', 85),
(578, 'ilce', 'Bahçelievler', 85),
(579, 'ilce', 'Bakırköy', 85),
(580, 'ilce', 'Başakşehir', 85),
(581, 'ilce', 'Bayrampaşa', 85),
(582, 'ilce', 'Beşiktaş', 85),
(583, 'ilce', 'Beykoz', 85),
(584, 'ilce', 'Beylikdüzü', 85),
(585, 'ilce', 'Beyoğlu', 85),
(586, 'ilce', 'Büyükçekmece', 85),
(587, 'ilce', 'Çatalca', 85),
(588, 'ilce', 'Çekmeköy', 85),
(589, 'ilce', 'Esenler', 85),
(590, 'ilce', 'Esenyurt', 85),
(591, 'ilce', 'Eyüp', 85),
(592, 'ilce', 'Fatih', 85),
(593, 'ilce', 'Gaziosmanpaşa', 85),
(594, 'ilce', 'Güngören', 85),
(595, 'ilce', 'Kadıköy', 85),
(596, 'ilce', 'Kağıthane', 85),
(597, 'ilce', 'Kartal', 85),
(598, 'ilce', 'Küçükçekmece', 85),
(599, 'ilce', 'Maltepe', 85),
(600, 'ilce', 'Pendik', 85),
(601, 'ilce', 'Sancaktepe', 85),
(602, 'ilce', 'Sarıyer', 85),
(603, 'ilce', 'Silivri', 85),
(604, 'ilce', 'Sultanbeyli', 85),
(605, 'ilce', 'Sultangazi', 85),
(606, 'ilce', 'Şile', 85),
(607, 'ilce', 'Şişli', 85),
(608, 'ilce', 'Tuzla', 85),
(609, 'ilce', 'Ümraniye', 85),
(610, 'ilce', 'Üsküdar', 85),
(611, 'ilce', 'Zeytinburnu', 85),
(612, 'ilce', 'Aliağa', 86),
(613, 'ilce', 'Balçova', 86),
(614, 'ilce', 'Bayındır', 86),
(615, 'ilce', 'Bayraklı', 86),
(616, 'ilce', 'Bergama', 86),
(617, 'ilce', 'Beydağ', 86),
(618, 'ilce', 'Bornova', 86),
(619, 'ilce', 'Buca', 86),
(620, 'ilce', 'Çeşme', 86),
(621, 'ilce', 'Çiğli', 86),
(622, 'ilce', 'Dikili', 86),
(623, 'ilce', 'Foça', 86),
(624, 'ilce', 'Gaziemir', 86),
(625, 'ilce', 'Güzelbahçe', 86),
(626, 'ilce', 'Karabağlar', 86),
(627, 'ilce', 'Karaburun', 86),
(628, 'ilce', 'Karşıyaka', 86),
(629, 'ilce', 'Kemalpaşa', 86),
(630, 'ilce', 'Kınık', 86),
(631, 'ilce', 'Kiraz', 86),
(632, 'ilce', 'Konak', 86),
(633, 'ilce', 'Menderes', 86),
(634, 'ilce', 'Menemen', 86),
(635, 'ilce', 'Narlıdere', 86),
(636, 'ilce', 'Ödemiş', 86),
(637, 'ilce', 'Seferihisar', 86),
(638, 'ilce', 'Selçuk', 86),
(639, 'ilce', 'Tire', 86),
(640, 'ilce', 'Torbalı', 86),
(641, 'ilce', 'Urla', 86),
(642, 'ilce', 'Akyaka', 87),
(643, 'ilce', 'Arpaçay', 87),
(644, 'ilce', 'Digor', 87),
(645, 'ilce', 'Kağızman', 87),
(646, 'ilce', 'Sarıkamış', 87),
(647, 'ilce', 'Selim', 87),
(648, 'ilce', 'Susuz', 87),
(649, 'ilce', 'Abana', 88),
(650, 'ilce', 'Ağlı', 88),
(651, 'ilce', 'Araç', 88),
(652, 'ilce', 'Azdavay', 88),
(653, 'ilce', 'Bozkurt', 88),
(654, 'ilce', 'Cide', 88),
(655, 'ilce', 'Çatalzeytin', 88),
(656, 'ilce', 'Daday', 88),
(657, 'ilce', 'Devrekani', 88),
(658, 'ilce', 'Doğanyurt', 88),
(659, 'ilce', 'Hanönü', 88),
(660, 'ilce', 'İhsangazi', 88),
(661, 'ilce', 'İnebolu', 88),
(662, 'ilce', 'Küre', 88),
(663, 'ilce', 'Pınarbaşı', 88),
(664, 'ilce', 'Seydiler', 88),
(665, 'ilce', 'Şenpazar', 88),
(666, 'ilce', 'Taşköprü', 88),
(667, 'ilce', 'Tosya', 88),
(668, 'ilce', 'Akkışla', 89),
(669, 'ilce', 'Bünyan', 89),
(670, 'ilce', 'Develi', 89),
(671, 'ilce', 'Felahiye', 89),
(672, 'ilce', 'Hacılar', 89),
(673, 'ilce', 'İncesu', 89),
(674, 'ilce', 'Kocasinan', 89),
(675, 'ilce', 'Melikgazi', 89),
(676, 'ilce', 'Özvatan', 89),
(677, 'ilce', 'Pınarbaşı', 89),
(678, 'ilce', 'Sarıoğlan', 89),
(679, 'ilce', 'Sarız', 89),
(680, 'ilce', 'Talas', 89),
(681, 'ilce', 'Tomarza', 89),
(682, 'ilce', 'Yahyalı', 89),
(683, 'ilce', 'Yeşilhisar', 89),
(684, 'ilce', 'Babaeski', 90),
(685, 'ilce', 'Demirköy', 90),
(686, 'ilce', 'Kofçaz', 90),
(687, 'ilce', 'Lüleburgaz', 90),
(688, 'ilce', 'Pehlivanköy', 90),
(689, 'ilce', 'Pınarhisar', 90),
(690, 'ilce', 'Vize', 90),
(691, 'ilce', 'Akçakent', 91),
(692, 'ilce', 'Akpınar', 91),
(693, 'ilce', 'Boztepe', 91),
(694, 'ilce', 'Çiçekdağı', 91),
(695, 'ilce', 'Kaman', 91),
(696, 'ilce', 'Mucur', 91),
(697, 'ilce', 'Başiskele', 92),
(698, 'ilce', 'Çayırova', 92),
(699, 'ilce', 'Darıca', 92),
(700, 'ilce', 'Derince', 92),
(701, 'ilce', 'Dilovası', 92),
(702, 'ilce', 'Gebze', 92),
(703, 'ilce', 'Gölcük', 92),
(704, 'ilce', 'İzmit', 92),
(705, 'ilce', 'Kandıra', 92),
(706, 'ilce', 'Karamürsel', 92),
(707, 'ilce', 'Kartepe', 92),
(708, 'ilce', 'Körfez', 92),
(709, 'ilce', 'Ahırlı', 93),
(710, 'ilce', 'Akören', 93),
(711, 'ilce', 'Akşehir', 93),
(712, 'ilce', 'Altınekin', 93),
(713, 'ilce', 'Beyşehir', 93),
(714, 'ilce', 'Bozkır', 93),
(715, 'ilce', 'Cihanbeyli', 93),
(716, 'ilce', 'Çeltik', 93),
(717, 'ilce', 'Çumra', 93),
(718, 'ilce', 'Derbent', 93),
(719, 'ilce', 'Derebucak', 93),
(720, 'ilce', 'Doğanhisar', 93),
(721, 'ilce', 'Emirgazi', 93),
(722, 'ilce', 'Ereğli', 93),
(723, 'ilce', 'Güneysınır', 93),
(724, 'ilce', 'Hadim', 93),
(725, 'ilce', 'Halkapınar', 93),
(726, 'ilce', 'Hüyük', 93),
(727, 'ilce', 'Ilgın', 93),
(728, 'ilce', 'Kadınhanı', 93),
(729, 'ilce', 'Karapınar', 93),
(730, 'ilce', 'Karatay', 93),
(731, 'ilce', 'Kulu', 93),
(732, 'ilce', 'Meram', 93),
(733, 'ilce', 'Sarayönü', 93),
(734, 'ilce', 'Selçuklu', 93),
(735, 'ilce', 'Seydişehir', 93),
(736, 'ilce', 'Taşkent', 93),
(737, 'ilce', 'Tuzlukçu', 93),
(738, 'ilce', 'Yalıhüyük', 93),
(739, 'ilce', 'Yunak', 93),
(740, 'ilce', 'Merkez', 94),
(741, 'ilce', 'Altıntaş', 94),
(742, 'ilce', 'Aslanapa', 94),
(743, 'ilce', 'Çavdarhisar', 94),
(744, 'ilce', 'Domaniç', 94),
(745, 'ilce', 'Dumlupınar', 94),
(746, 'ilce', 'Emet', 94),
(747, 'ilce', 'Gediz', 94),
(748, 'ilce', 'Hisarcık', 94),
(749, 'ilce', 'Pazarlar', 94),
(750, 'ilce', 'Simav', 94),
(751, 'ilce', 'Şaphane', 94),
(752, 'ilce', 'Tavşanlı', 94),
(753, 'ilce', 'Merkez', 95),
(754, 'ilce', 'Akçadağ', 95),
(755, 'ilce', 'Arapgir', 95),
(756, 'ilce', 'Arguvan', 95),
(757, 'ilce', 'Battalgazi', 95),
(758, 'ilce', 'Darende', 95),
(759, 'ilce', 'Doğanşehir', 95),
(760, 'ilce', 'Doğanyol', 95),
(761, 'ilce', 'Hekimhan', 95),
(762, 'ilce', 'Kale', 95),
(763, 'ilce', 'Kuluncak', 95),
(764, 'ilce', 'Pütürge', 95),
(765, 'ilce', 'Yazıhan', 95),
(766, 'ilce', 'Yeşilyurt', 95),
(767, 'ilce', 'Şehzadeler - Yunusemre', 96),
(768, 'ilce', 'Ahmetli', 96),
(769, 'ilce', 'Akhisar', 96),
(770, 'ilce', 'Alaşehir', 96),
(771, 'ilce', 'Demirci', 96),
(772, 'ilce', 'Gölmarmara', 96),
(773, 'ilce', 'Gördes', 96),
(774, 'ilce', 'Kırkağaç', 96),
(775, 'ilce', 'Köprübaşı', 96),
(776, 'ilce', 'Kula', 96),
(777, 'ilce', 'Salihli', 96),
(778, 'ilce', 'Sarıgöl', 96),
(779, 'ilce', 'Saruhanlı', 96),
(780, 'ilce', 'Selendi', 96),
(781, 'ilce', 'Soma', 96),
(782, 'ilce', 'Turgutlu', 96),
(783, 'ilce', 'Onikişubat', 97),
(784, 'ilce', 'Afşin', 97),
(785, 'ilce', 'Andırın', 97),
(786, 'ilce', 'Çağlayancerit', 97),
(787, 'ilce', 'Ekinözü', 97),
(788, 'ilce', 'Elbistan', 97),
(789, 'ilce', 'Göksun', 97),
(790, 'ilce', 'Nurhak', 97),
(791, 'ilce', 'Pazarcık', 97),
(792, 'ilce', 'Türkoğlu', 97),
(793, 'ilce', 'Merkez', 98),
(794, 'ilce', 'Dargeçit', 98),
(795, 'ilce', 'Derik', 98),
(796, 'ilce', 'Kızıltepe', 98),
(797, 'ilce', 'Mazıdağı', 98),
(798, 'ilce', 'Midyat', 98),
(799, 'ilce', 'Nusaybin', 98),
(800, 'ilce', 'Ömerli', 98),
(801, 'ilce', 'Savur', 98),
(802, 'ilce', 'Yeşilli', 98),
(803, 'ilce', 'Merkez', 99),
(804, 'ilce', 'Bodrum', 99),
(805, 'ilce', 'Dalaman', 99),
(806, 'ilce', 'Datça', 99),
(807, 'ilce', 'Fethiye', 99),
(808, 'ilce', 'Kavaklıdere', 99),
(809, 'ilce', 'Köyçeğiz', 99),
(810, 'ilce', 'Marmaris', 99),
(811, 'ilce', 'Milas', 99),
(812, 'ilce', 'Ortaca', 99),
(813, 'ilce', 'Ula', 99),
(814, 'ilce', 'Yatağan', 99),
(815, 'ilce', 'Merkez', 100),
(816, 'ilce', 'Bulanık', 100),
(817, 'ilce', 'Hasköy', 100),
(818, 'ilce', 'Korkut', 100),
(819, 'ilce', 'Malazgirt', 100),
(820, 'ilce', 'Varto', 100),
(821, 'ilce', 'Merkez', 101),
(822, 'ilce', 'Acıgöl', 101),
(823, 'ilce', 'Avanos', 101),
(824, 'ilce', 'Derinkuyu', 101),
(825, 'ilce', 'Gülşehir', 101),
(826, 'ilce', 'Hacıbektaş', 101),
(827, 'ilce', 'Kozaklı', 101),
(828, 'ilce', 'Ürgüp', 101),
(829, 'ilce', 'Merkez', 102),
(830, 'ilce', 'Altınhisar', 102),
(831, 'ilce', 'Bor', 102),
(832, 'ilce', 'Çamardı', 102),
(833, 'ilce', 'Çiftlik', 102),
(834, 'ilce', 'Ulukışla', 102),
(835, 'ilce', 'Merkez', 103),
(836, 'ilce', 'Akkuş', 103),
(837, 'ilce', 'Aybastı', 103),
(838, 'ilce', 'Çamaş', 103),
(839, 'ilce', 'Çatalpınar', 103),
(840, 'ilce', 'Çaybaşı', 103),
(841, 'ilce', 'Fatsa', 103),
(842, 'ilce', 'Gölköy', 103),
(843, 'ilce', 'Gülyalı', 103),
(844, 'ilce', 'Gürgentepe', 103),
(845, 'ilce', 'İkizce', 103),
(846, 'ilce', 'Karadüz', 103),
(847, 'ilce', 'Kabataş', 103),
(848, 'ilce', 'Korgan', 103),
(849, 'ilce', 'Kumru', 103),
(850, 'ilce', 'Mesudiye', 103),
(851, 'ilce', 'Perşembe', 103),
(852, 'ilce', 'Ulubey', 103),
(853, 'ilce', 'Ünye', 103),
(854, 'ilce', 'Merkez', 104),
(855, 'ilce', 'Ardeşen', 104),
(856, 'ilce', 'Çamlıhemşin', 104),
(857, 'ilce', 'Çayeli', 104),
(858, 'ilce', 'Derepazarı', 104),
(859, 'ilce', 'Fındıklı', 104),
(860, 'ilce', 'Güneysu', 104),
(861, 'ilce', 'Hemşin', 104),
(862, 'ilce', 'İkizdere', 104),
(863, 'ilce', 'İyidere', 104),
(864, 'ilce', 'Kalkandere', 104),
(865, 'ilce', 'Pazar', 104),
(866, 'ilce', 'Merkez', 105),
(867, 'ilce', 'Adapazarı', 105),
(868, 'ilce', 'Akyazı', 105),
(869, 'ilce', 'Arifiye', 105),
(870, 'ilce', 'Erenler', 105),
(871, 'ilce', 'Ferizli', 105),
(872, 'ilce', 'Geyve', 105),
(873, 'ilce', 'Hendek', 105),
(874, 'ilce', 'Karapürçek', 105),
(875, 'ilce', 'Karasu', 105),
(876, 'ilce', 'Kaynarca', 105),
(877, 'ilce', 'Kocaali', 105),
(878, 'ilce', 'Pamukova', 105),
(879, 'ilce', 'Sapanca', 105),
(880, 'ilce', 'Serdivan', 105),
(881, 'ilce', 'Söğütlü', 105),
(882, 'ilce', 'Taraklı', 105),
(883, 'ilce', 'Merkez', 106),
(884, 'ilce', 'Alaçam', 106),
(885, 'ilce', 'Asarcık', 106),
(886, 'ilce', 'Atakum', 106),
(887, 'ilce', 'Ayvacık', 106),
(888, 'ilce', 'Bafra', 106),
(889, 'ilce', 'Canik', 106),
(890, 'ilce', 'Çarşamba', 106),
(891, 'ilce', 'Havza', 106),
(892, 'ilce', 'İlkadım', 106),
(893, 'ilce', 'Kavak', 106),
(894, 'ilce', 'Ladik', 106),
(895, 'ilce', 'Ondokuzmayız', 106),
(896, 'ilce', 'Salıpazarı', 106),
(897, 'ilce', 'Tekkeköy', 106),
(898, 'ilce', 'Terme', 106),
(899, 'ilce', 'Vezirköprü', 106),
(900, 'ilce', 'Yakakent', 106),
(901, 'ilce', 'Merkez', 107),
(902, 'ilce', 'Aydınlar', 107),
(903, 'ilce', 'Baykan', 107),
(904, 'ilce', 'Eruh', 107),
(905, 'ilce', 'Kurtalan', 107),
(906, 'ilce', 'Pervari', 107),
(907, 'ilce', 'Şirvan', 107),
(908, 'ilce', 'Merkez', 108),
(909, 'ilce', 'Ayancık', 108),
(910, 'ilce', 'Boyabat', 108),
(911, 'ilce', 'Dikmen', 108),
(912, 'ilce', 'Durağan', 108),
(913, 'ilce', 'Erfelek', 108),
(914, 'ilce', 'Gerze', 108),
(915, 'ilce', 'Saraydüzü', 108),
(916, 'ilce', 'Türkeli', 108),
(917, 'ilce', 'Merkez', 109),
(918, 'ilce', 'Akıncılar', 109),
(919, 'ilce', 'Altınyayla', 109),
(920, 'ilce', 'Divriği', 109),
(921, 'ilce', 'Doğanşar', 109),
(922, 'ilce', 'Gemerek', 109),
(923, 'ilce', 'Gölova', 109),
(924, 'ilce', 'Gürün', 109),
(925, 'ilce', 'Hafik', 109),
(926, 'ilce', 'İmranlı', 109),
(927, 'ilce', 'Kangal', 109),
(928, 'ilce', 'Koyulhisar', 109),
(929, 'ilce', 'Suşehri', 109),
(930, 'ilce', 'Şarkışla', 109),
(931, 'ilce', 'Ulaş', 109),
(932, 'ilce', 'Yıldızeli', 109),
(933, 'ilce', 'Zara', 109),
(934, 'ilce', 'Merkez', 110),
(935, 'ilce', 'Çerkezköy', 110),
(936, 'ilce', 'Çorlu', 110),
(937, 'ilce', 'Hayrabolu', 110),
(938, 'ilce', 'Malkara', 110),
(939, 'ilce', 'Marmaraereğlisi', 110),
(940, 'ilce', 'Muratlı', 110),
(941, 'ilce', 'Saray', 110),
(942, 'ilce', 'Şarköy', 110),
(943, 'ilce', 'Merkez', 111),
(944, 'ilce', 'Almus', 111),
(945, 'ilce', 'Artova', 111),
(946, 'ilce', 'Başçiftlik', 111),
(947, 'ilce', 'Erbaa', 111),
(948, 'ilce', 'Niksar', 111),
(949, 'ilce', 'Pazar', 111),
(950, 'ilce', 'Reşadiye', 111),
(951, 'ilce', 'Sulusaray', 111),
(952, 'ilce', 'Turhal', 111),
(953, 'ilce', 'Yeşilyurt', 111),
(954, 'ilce', 'Zile', 111),
(955, 'ilce', 'Merkez', 112),
(956, 'ilce', 'Akçaabat', 112),
(957, 'ilce', 'Araklı', 112),
(958, 'ilce', 'Arsin', 112),
(959, 'ilce', 'Beşikdüzü', 112),
(960, 'ilce', 'Çarşıbaşı', 112),
(961, 'ilce', 'Çaykara', 112),
(962, 'ilce', 'Dernekpazarı', 112),
(963, 'ilce', 'Düzköy', 112),
(964, 'ilce', 'Hayrat', 112),
(965, 'ilce', 'Köprübaşı', 112),
(966, 'ilce', 'Maçka', 112),
(967, 'ilce', 'Of', 112),
(968, 'ilce', 'Sürmene', 112),
(969, 'ilce', 'Şalpazarı', 112),
(970, 'ilce', 'Tonya', 112),
(971, 'ilce', 'Vakfıkebir', 112),
(972, 'ilce', 'Yomra', 112),
(973, 'ilce', 'Merkez', 113),
(974, 'ilce', 'Çemişgezek', 113),
(975, 'ilce', 'Hozat', 113),
(976, 'ilce', 'Mazgirt', 113),
(977, 'ilce', 'Nazımiye', 113),
(978, 'ilce', 'Ovacık', 113),
(979, 'ilce', 'Pertek', 113),
(980, 'ilce', 'Pülümür', 113),
(981, 'ilce', 'Merkez', 114),
(982, 'ilce', 'Akçakale', 114),
(983, 'ilce', 'Birecik', 114),
(984, 'ilce', 'Bozova', 114),
(985, 'ilce', 'Ceylanpınarı', 114),
(986, 'ilce', 'Halfeti', 114),
(987, 'ilce', 'Harran', 114),
(988, 'ilce', 'Hilvan', 114),
(989, 'ilce', 'Siverek', 114),
(990, 'ilce', 'Suruç', 114),
(991, 'ilce', 'Viranşehir', 114),
(992, 'ilce', 'Merkez', 115),
(993, 'ilce', 'Banaz', 115),
(994, 'ilce', 'Eşme', 115),
(995, 'ilce', 'Karahallı', 115),
(996, 'ilce', 'Sivaslı', 115),
(997, 'ilce', 'Ulubey', 115),
(998, 'ilce', 'Merkez', 116),
(999, 'ilce', 'Bahçesaray', 116),
(1000, 'ilce', 'Başkale', 116),
(1001, 'ilce', 'Çaldıran', 116),
(1002, 'ilce', 'Çatak', 116),
(1003, 'ilce', 'Edremit', 116),
(1004, 'ilce', 'Erciş', 116),
(1005, 'ilce', 'Gevaş', 116),
(1006, 'ilce', 'Gürpınar', 116),
(1007, 'ilce', 'Muradiye', 116),
(1008, 'ilce', 'Özalp', 116),
(1009, 'ilce', 'Saray', 116),
(1010, 'ilce', 'Merkez', 117),
(1011, 'ilce', 'Akdağmadeni', 117),
(1012, 'ilce', 'Aydıncık', 117),
(1013, 'ilce', 'Boğazlıyan', 117),
(1014, 'ilce', 'Çandır', 117),
(1015, 'ilce', 'Çayıralan', 117),
(1016, 'ilce', 'Çekerek', 117),
(1017, 'ilce', 'Kadışehri', 117),
(1018, 'ilce', 'Saraykent', 117),
(1019, 'ilce', 'Sarıkaya', 117),
(1020, 'ilce', 'Sorgun', 117),
(1021, 'ilce', 'Şefaatli', 117),
(1022, 'ilce', 'Yenifakılı', 117),
(1023, 'ilce', 'Yerköy', 117),
(1024, 'ilce', 'Merkez', 118),
(1025, 'ilce', 'Alaplı', 118),
(1026, 'ilce', 'Çaycuma', 118),
(1027, 'ilce', 'Devrek', 118),
(1028, 'ilce', 'Ereğli', 118),
(1029, 'ilce', 'Gökçebey', 118),
(1030, 'ilce', 'Merkez', 119),
(1031, 'ilce', 'Ağaçören', 119),
(1032, 'ilce', 'Eskil', 119),
(1033, 'ilce', 'Gülağaç', 119),
(1034, 'ilce', 'Güzelyurt', 119),
(1035, 'ilce', 'Ortaköy', 119),
(1036, 'ilce', 'Sarıyahşi', 119),
(1037, 'ilce', 'Merkez', 120),
(1038, 'ilce', 'Aydıntepe', 120),
(1039, 'ilce', 'Demirözü', 120),
(1040, 'ilce', 'Merkez', 121),
(1041, 'ilce', 'Ayrancı', 121),
(1042, 'ilce', 'Başyayla', 121),
(1043, 'ilce', 'Ermenek', 121),
(1044, 'ilce', 'Kazımkarabekir', 121),
(1045, 'ilce', 'Sarıveliler', 121),
(1046, 'ilce', 'Merkez', 122),
(1047, 'ilce', 'Bahşili', 122),
(1048, 'ilce', 'Balışeyh', 122),
(1049, 'ilce', 'Çelebi', 122),
(1050, 'ilce', 'Delice', 122),
(1051, 'ilce', 'Karakeçili', 122),
(1052, 'ilce', 'Keskin', 122),
(1053, 'ilce', 'Sulakyurt', 122),
(1054, 'ilce', 'Yahşiyan', 122),
(1055, 'ilce', 'Merkez', 123),
(1056, 'ilce', 'Beşiri', 123),
(1057, 'ilce', 'Gercüş', 123),
(1058, 'ilce', 'Hasankeyf', 123),
(1059, 'ilce', 'Kozluk', 123),
(1060, 'ilce', 'Sason', 123),
(1061, 'ilce', 'Merkez', 124),
(1062, 'ilce', 'Beytüşşebap', 124),
(1063, 'ilce', 'Cizre', 124),
(1064, 'ilce', 'Güçlükonak', 124),
(1065, 'ilce', 'İdil İlçesi', 124),
(1066, 'ilce', 'Silopi', 124),
(1067, 'ilce', 'Uludere', 124),
(1068, 'ilce', 'Merkez', 125),
(1069, 'ilce', 'Amasra', 125),
(1070, 'ilce', 'Kurucasile', 125),
(1071, 'ilce', 'Ulus', 125),
(1072, 'ilce', 'Merkez', 126),
(1073, 'ilce', 'Çıldır', 126),
(1074, 'ilce', 'Damal', 126),
(1075, 'ilce', 'Göle', 126),
(1076, 'ilce', 'Hanak', 126),
(1077, 'ilce', 'Posof', 126),
(1078, 'ilce', 'Merkez', 127),
(1079, 'ilce', 'Aralık', 127),
(1080, 'ilce', 'Karakoyunlu', 127),
(1081, 'ilce', 'Tuzluca', 127),
(1082, 'ilce', 'Merkez', 128),
(1083, 'ilce', 'Altınova', 128),
(1084, 'ilce', 'Armutlu', 128),
(1085, 'ilce', 'Çınarcık', 128),
(1086, 'ilce', 'Çiftlikköy', 128),
(1087, 'ilce', 'Termal', 128),
(1088, 'ilce', 'Merkez', 129),
(1089, 'ilce', 'Eflani', 129),
(1090, 'ilce', 'Eskipazar', 129),
(1091, 'ilce', 'Ovacık', 129),
(1092, 'ilce', 'Safranbolu', 129),
(1093, 'ilce', 'Yenice', 129),
(1094, 'ilce', 'Merkez', 130),
(1095, 'ilce', 'Elbeyli', 130),
(1096, 'ilce', 'Musabeyli', 130),
(1097, 'ilce', 'Polateli', 130),
(1098, 'ilce', 'Merkez', 131),
(1099, 'ilce', 'Akçakoca', 131),
(1100, 'ilce', 'Cumayeri', 131),
(1101, 'ilce', 'Çilimli', 131),
(1102, 'ilce', 'Gölkaya', 131),
(1103, 'ilce', 'Gümüşova', 131),
(1104, 'ilce', 'Kaynaşlı', 131),
(1105, 'ilce', 'Yığılca', 131),
(1106, 'ilce', 'Merkez', 52),
(1107, 'ilce', 'Merkez', 53),
(1108, 'ilce', 'Merkez', 54),
(1109, 'ilce', 'Merkez', 55),
(1110, 'ilce', 'Merkez', 56),
(1111, 'ilce', 'Merkez', 57),
(1112, 'ilce', 'Merkez', 58),
(1113, 'ilce', 'Merkez', 59),
(1114, 'ilce', 'Merkez', 61),
(1115, 'ilce', 'Merkez', 62),
(1116, 'ilce', 'Merkez', 63),
(1117, 'ilce', 'Merkez', 64),
(1118, 'ilce', 'Merkez', 65),
(1119, 'ilce', 'Merkez', 67),
(1120, 'ilce', 'Merkez', 68),
(1121, 'ilce', 'Merkez', 69),
(1122, 'ilce', 'Merkez', 70),
(1123, 'ilce', 'Merkez', 71),
(1124, 'ilce', 'Merkez', 72),
(1125, 'ilce', 'Merkez', 73),
(1126, 'ilce', 'Merkez', 74),
(1127, 'ilce', 'Merkez', 75),
(1128, 'ilce', 'Merkez', 76),
(1129, 'ilce', 'Merkez', 77),
(1130, 'ilce', 'Merkez', 78),
(1131, 'ilce', 'Merkez', 79),
(1132, 'ilce', 'Merkez', 80),
(1133, 'ilce', 'Merkez', 81),
(1134, 'ilce', 'Merkez', 82),
(1135, 'ilce', 'Merkez', 84),
(1136, 'ilce', 'Merkez', 86),
(1137, 'ilce', 'Merkez', 87),
(1138, 'ilce', 'Merkez', 88),
(1139, 'ilce', 'Merkez', 89),
(1140, 'ilce', 'Merkez', 90),
(1141, 'ilce', 'Merkez', 91),
(1142, 'ilce', 'Merkez', 92),
(1143, 'ilce', 'Merkez', 93),
(1153, 'il', 'Osmaniye', 0),
(1154, 'ilce', 'Merkez', 1153),
(1155, 'ilce', 'Bahçe', 1153),
(1156, 'ilce', 'Düziçi', 1153),
(1157, 'ilce', 'Hasanbeyli', 1153),
(1158, 'ilce', 'Kadirli', 1153),
(1159, 'ilce', 'Sumbas', 1153),
(1160, 'ilce', 'Toprakkale', 1153),
(1161, 'ilce', 'Yunusemre', 96);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_customers`
--

CREATE TABLE `li_customers` (
  `id` int(11) NOT NULL,
  `fullname` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `email` tinytext COLLATE utf8_unicode_ci,
  `password` tinytext COLLATE utf8_unicode_ci,
  `tel` tinytext COLLATE utf8_unicode_ci,
  `tel2` tinytext COLLATE utf8_unicode_ci,
  `address` text COLLATE utf8_unicode_ci,
  `note` longtext COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `times` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `li_customers`
--

INSERT INTO `li_customers` (`id`, `fullname`, `email`, `password`, `tel`, `tel2`, `address`, `note`, `status`, `times`) VALUES
(9, 'mesut seçkin', 'mesut.seckin@gmail.com', '5c6036c9ddc0e58330575e34d87599ae', '', '', '', '', 1, '2016-03-13 08:53:47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_haberler`
--

CREATE TABLE `li_haberler` (
  `id` int(11) NOT NULL,
  `baslik` varchar(250) NOT NULL,
  `icerik` text NOT NULL,
  `img` text NOT NULL,
  `status` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `tarih` date NOT NULL,
  `link` text NOT NULL,
  `kategori` text NOT NULL,
  `etkinlik_mekan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `li_haberler`
--

INSERT INTO `li_haberler` (`id`, `baslik`, `icerik`, `img`, `status`, `priority`, `tarih`, `link`, `kategori`, `etkinlik_mekan`) VALUES
(23, 'MEkan Etkinlik Test', 'asdhsdlhasdhasödfhvasldfhvaskjldfvhaskldfhakjldshfjavshdfkjlhavsdkjlfhaskjldasdhsdlhasdhasödfhvasldfhvaskjldfvhaskldfhakjldshfjavshdfkjlhavsdkjlfhaskjldasdhsdlhasdhasödfhvasldfhvaskjldfvhaskldfhakjldshfjavshdfkjlhavsdkjlfhaskjldasdhsdlhasdhasödfhvasldfhvaskjldfvhaskldfhakjldshfjavshdfkjlhavsdkjlfhaskjld', '/uplo4ds/files/2875552(1).jpg', 1, 0, '2016-10-04', 'mekan-etkinlik-test', 'galeri', 'Kanka Görsel '),
(24, 'dsfbgsdfgsdfg', 'sdfvsjdfksdjfgşlsdjfgsdfvsjdfksdjfgşlsdjfgsdfvsjdfksdjfgşlsdjfgsdfvsjdfksdjfgşlsdjfgsdfvsjdfksdjfgşlsdjfgsdfvsjdfksdjfgşlsdjfgsdfvsjdfksdjfgşlsdjfgsdfvsjdfksdjfgşlsdjfgsdfvsjdfksdjfgşlsdjfgsdfvsjdfksdjfgşlsdjfg', '/uplo4ds/files/2911813.jpg', 1, 0, '0000-00-00', 'dsfbgsdfgsdfg', 'genel', 'Mekan Adına Bak '),
(25, 'asdfvasdfvasdfasdfa', '', '/uplo4ds/files/2875552.jpg', 1, 0, '0000-00-00', 'asdfvasdfvasdfasdfa', 'genel', ''),
(26, 'dsfgbsdgfsdfgbsdfg', '', '/uplo4ds/files/2875552.jpg', 1, 0, '2016-10-30', 'dsfgbsdgfsdfgbsdfg', 'galeri', 'Kanka Görsel '),
(27, 'gfjgfhjmgfhjgfhjgfmhjfghjmf', 'ghjmgfhjngfhjgfhj', 'http://localhost/mekhan2.dev//uploads/no-img.jpg', 1, 0, '0000-00-00', 'gfjgfhjmgfhjgfhjgfmhjfghjmf', 'genel', ''),
(28, 'dfghndfnhdfghndfghdfgh', '', 'http://localhost/mekhan2.dev//uploads/no-img.jpg', 1, 0, '0000-00-00', 'dfghndfnhdfghndfghdfgh', 'genel', ''),
(29, 'sdfbgsdfgbsdf', 'bsdgfbsdfg', 'http://localhost/mekhan2.dev//uploads/no-img.jpg', 1, 0, '0000-00-00', 'sdfbgsdfgbsdf', 'genel', ''),
(30, 'adsfvasdfvasf', 'asdfvsadfvas', 'http://localhost/mekhan2.dev//uploads/no-img.jpg', 1, 0, '0000-00-00', 'adsfvasdfvasf', 'genel', ''),
(31, 'sdfgbsdgf', '', 'http://localhost/mekhan2.dev//uploads/no-img.jpg', 1, 0, '0000-00-00', 'sdfgbsdgf', 'genel', ''),
(32, 'Video Etkinlik', 'Videolu Etkinlik Videolu Etkinlik Videolu Etkinlik Videolu Etkinlik Videolu Etkinlik', '/uplo4ds/images/Kostum Partisi (1).jpg', 1, 0, '2016-09-16', 'video-etkinlik', 'video', ''),
(33, 'Videolu Etkinliklerimizden 2', 'Videolu Etkinliklerimizden 2Videolu Etkinliklerimizden 2Videolu Etkinliklerimizden 2Videolu Etkinliklerimizden 2Videolu Etkinliklerimizden 2', '/uplo4ds/images/sokakta-cilgin-parti-cadilar-bayrami-halloween-new-york-spring-caddesi-1030609.jpg', 1, 0, '2016-09-25', 'videolu-etkinliklerimizden-2', 'video', ''),
(34, 'dgbsdfg', 'sfdg', '/uplo4ds/files/2875552.jpg', 1, 0, '0000-00-00', 'dgbsdfg', 'genel', ''),
(35, 'ahmetmehmet', 'dfsgdsfg', '/uplo4ds/files/2875552.jpg', 1, 0, '2016-09-09', 'ahmetmehmet', 'genel', 'Kanka Görsel ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_iletisim`
--

CREATE TABLE `li_iletisim` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `mesaj` text NOT NULL,
  `tarih` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_logs`
--

CREATE TABLE `li_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `log_type` enum('login','insert','update','delete','other') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'other',
  `log` longtext COLLATE utf8_unicode_ci NOT NULL,
  `times` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `li_logs`
--

INSERT INTO `li_logs` (`id`, `user_id`, `log_type`, `log`, `times`) VALUES
(1, 1, 'delete', 'IP: ::1 - Piri Reis - Slider Silindi Silinen ID: 9', '2016-09-26 07:43:22'),
(2, 1, 'delete', 'IP: ::1 - Piri Reis - Slider Silindi Silinen ID: 19', '2016-09-26 07:43:25'),
(3, 1, 'delete', 'IP: ::1 - Piri Reis - Slider Silindi Silinen ID: 20', '2016-09-26 07:43:26'),
(4, 1, 'delete', 'IP: ::1 - Piri Reis - Slider Silindi Silinen ID: 21', '2016-09-26 07:43:29'),
(5, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Marka Eklendi Eklenen ID: 275', '2016-09-26 07:50:45'),
(6, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Slider Eklendi Eklenen ID: 22', '2016-09-26 08:00:24'),
(7, 1, 'delete', 'IP: ::1 - Piri Reis - Slider Silindi Silinen ID: 22', '2016-09-26 08:00:58'),
(8, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 9', '2016-09-26 08:07:14'),
(9, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 9', '2016-09-26 08:07:42'),
(10, 1, 'delete', 'IP: ::1 - Piri Reis - Kategori Silindi Silinen ID: 273', '2016-09-26 12:10:31'),
(11, 1, 'update', 'IP: ::1 - Piri Reis - Marka Güncellendi Güncellenen ID: 275', '2016-09-26 12:10:39'),
(12, 1, 'login', 'IP: ::1 - Piri Reis - Giriş Yapıldı ', '2016-09-26 18:20:27'),
(13, 1, 'login', 'IP: ::1 - Piri Reis - Giriş Yapıldı ', '2016-09-27 07:41:19'),
(14, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 14', '2016-09-27 07:44:27'),
(15, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 15', '2016-09-27 07:57:05'),
(16, 1, 'delete', 'IP: ::1 - Piri Reis - Haber Silindi Silinen ID: 9', '2016-09-27 08:39:50'),
(17, 1, 'delete', 'IP: ::1 - Piri Reis - Haber Silindi Silinen ID: 10', '2016-09-27 08:39:54'),
(18, 1, 'delete', 'IP: ::1 - Piri Reis - Haber Silindi Silinen ID: 11', '2016-09-27 08:39:57'),
(19, 1, 'delete', 'IP: ::1 - Piri Reis - Haber Silindi Silinen ID: 12', '2016-09-27 08:40:00'),
(20, 1, 'delete', 'IP: ::1 - Piri Reis - Haber Silindi Silinen ID: 13', '2016-09-27 10:21:33'),
(21, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 15', '2016-09-27 10:22:08'),
(22, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 16', '2016-09-27 10:22:56'),
(23, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 17', '2016-09-27 10:23:20'),
(24, 1, 'login', 'IP: ::1 - Piri Reis - Giriş Yapıldı ', '2016-09-28 08:49:05'),
(25, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 18', '2016-09-28 09:07:40'),
(26, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 19', '2016-09-28 09:11:06'),
(27, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 18', '2016-09-28 09:15:53'),
(28, 1, 'delete', 'IP: ::1 - Piri Reis - Haber Silindi Silinen ID: 19', '2016-09-28 09:17:48'),
(29, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-28 09:20:53'),
(30, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-28 09:21:47'),
(31, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-28 09:40:23'),
(32, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-28 09:40:30'),
(33, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-28 09:40:47'),
(34, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 15', '2016-09-28 09:41:22'),
(35, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-28 09:41:42'),
(36, 1, 'delete', 'IP: ::1 - Piri Reis - Haber Silindi Silinen ID: 18', '2016-09-28 09:42:16'),
(37, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 15', '2016-09-28 09:42:23'),
(38, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 16', '2016-09-28 09:43:07'),
(39, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 16', '2016-09-28 09:43:15'),
(40, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 16', '2016-09-28 09:43:40'),
(41, 1, 'delete', 'IP: ::1 - Piri Reis - Haber Silindi Silinen ID: 16', '2016-09-28 09:43:46'),
(42, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 15', '2016-09-28 09:43:57'),
(43, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 15', '2016-09-28 09:44:02'),
(44, 1, 'delete', 'IP: ::1 - Piri Reis - Haber Silindi Silinen ID: 15', '2016-09-28 09:44:20'),
(45, 1, 'delete', 'IP: ::1 - Piri Reis - Haber Silindi Silinen ID: 17', '2016-09-28 09:44:23'),
(46, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-28 09:44:45'),
(47, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-28 09:45:00'),
(48, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 20', '2016-09-28 09:45:49'),
(49, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 20', '2016-09-28 09:45:58'),
(50, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 20', '2016-09-28 09:46:02'),
(51, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 20', '2016-09-28 09:46:44'),
(52, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 20', '2016-09-28 09:47:10'),
(53, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 21', '2016-09-28 09:48:13'),
(54, 1, 'delete', 'IP: ::1 - Piri Reis - Haber Silindi Silinen ID: 20', '2016-09-28 09:49:54'),
(55, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 21', '2016-09-28 09:52:00'),
(56, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 22', '2016-09-28 09:52:53'),
(57, 1, 'delete', 'IP: ::1 - Piri Reis - Haber Silindi Silinen ID: 22', '2016-09-28 09:53:48'),
(58, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 23', '2016-09-28 09:58:26'),
(59, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-28 09:58:43'),
(60, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-28 10:00:37'),
(61, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 23', '2016-09-28 10:05:16'),
(62, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-28 10:05:28'),
(63, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 21', '2016-09-28 10:05:41'),
(64, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-28 10:10:40'),
(65, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-28 10:10:44'),
(66, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-28 10:10:50'),
(67, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 21', '2016-09-28 10:11:01'),
(68, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 23', '2016-09-28 10:31:25'),
(69, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-28 10:37:11'),
(70, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 21', '2016-09-28 10:37:30'),
(71, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-28 10:38:38'),
(72, 1, 'login', 'IP: ::1 - Piri Reis - Giriş Yapıldı ', '2016-09-28 17:18:40'),
(73, 1, 'update', 'IP: ::1 - Piri Reis - Haber Pasif Edildi ID: 14', '2016-09-28 17:18:45'),
(74, 1, 'update', 'IP: ::1 - Piri Reis - Haberler Aktif Edildi ID: 14', '2016-09-28 17:18:46'),
(75, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-28 17:18:54'),
(76, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 24', '2016-09-28 17:23:18'),
(77, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 25', '2016-09-28 17:23:27'),
(78, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 26', '2016-09-28 17:23:39'),
(79, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 27', '2016-09-28 17:23:51'),
(80, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 28', '2016-09-28 17:24:01'),
(81, 1, 'login', 'IP: ::1 - Piri Reis - Giriş Yapıldı ', '2016-09-29 09:03:54'),
(82, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 29', '2016-09-29 10:02:39'),
(83, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-29 10:33:13'),
(84, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 30', '2016-09-29 10:54:36'),
(85, 1, 'delete', 'IP: ::1 - Piri Reis - Haber Silindi Silinen ID: 21', '2016-09-29 10:54:51'),
(86, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 31', '2016-09-29 11:06:29'),
(87, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 32', '2016-09-29 11:40:59'),
(88, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 33', '2016-09-29 11:43:16'),
(89, 1, 'login', 'IP: ::1 - Piri Reis - Giriş Yapıldı ', '2016-09-30 06:47:17'),
(90, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 34', '2016-09-30 06:50:15'),
(91, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Haber Eklendi Eklenen ID: 35', '2016-09-30 06:51:00'),
(92, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Slider Eklendi Eklenen ID: 23', '2016-09-30 07:41:31'),
(93, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 23', '2016-09-30 07:54:30'),
(94, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 23', '2016-09-30 07:56:44'),
(95, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 23', '2016-09-30 08:00:25'),
(96, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 23', '2016-09-30 08:01:26'),
(97, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 23', '2016-09-30 08:16:37'),
(98, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 23', '2016-09-30 08:18:47'),
(99, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 23', '2016-09-30 08:19:31'),
(100, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 23', '2016-09-30 08:21:10'),
(101, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Mekan Eklendi Eklenen ID: 24', '2016-09-30 08:25:07'),
(102, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 24', '2016-09-30 08:26:26'),
(103, 1, 'delete', 'IP: ::1 - Piri Reis - Slider Silindi Silinen ID: 23', '2016-09-30 08:26:58'),
(104, 1, 'delete', 'IP: ::1 - Piri Reis - Slider Silindi Silinen ID: 24', '2016-09-30 08:27:24'),
(105, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Mekan Eklendi Eklenen ID: 25', '2016-09-30 08:27:49'),
(106, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 25', '2016-09-30 08:28:33'),
(107, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 25', '2016-09-30 08:30:14'),
(108, 1, 'delete', 'IP: ::1 - Piri Reis - Slider Silindi Silinen ID: 25', '2016-09-30 08:31:21'),
(109, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Mekan Eklendi Eklenen ID: 26', '2016-09-30 08:32:15'),
(110, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Mekan Eklendi Eklenen ID: 27', '2016-09-30 08:37:32'),
(111, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 26', '2016-09-30 08:42:57'),
(112, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Mekan Eklendi Eklenen ID: 28', '2016-09-30 08:43:25'),
(113, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 27', '2016-09-30 10:47:49'),
(114, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 26', '2016-09-30 10:48:45'),
(115, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 27', '2016-09-30 10:49:54'),
(116, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 28', '2016-09-30 10:49:58'),
(117, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 26', '2016-09-30 11:01:37'),
(118, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-30 11:55:00'),
(119, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 23', '2016-09-30 11:57:29'),
(120, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 23', '2016-09-30 11:57:47'),
(121, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 30', '2016-09-30 11:58:29'),
(122, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-30 11:59:10'),
(123, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 23', '2016-09-30 12:04:36'),
(124, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 23', '2016-09-30 12:13:13'),
(125, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-09-30 12:13:29'),
(126, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 23', '2016-09-30 12:13:36'),
(127, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 24', '2016-09-30 12:13:52'),
(128, 1, 'login', 'IP: ::1 - Piri Reis - Giriş Yapıldı ', '2016-09-30 18:52:17'),
(129, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 28', '2016-09-30 19:52:10'),
(130, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 28', '2016-09-30 19:52:22'),
(131, 1, 'login', 'IP: ::1 - Piri Reis - Giriş Yapıldı ', '2016-10-01 07:27:48'),
(132, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-10-01 10:19:08'),
(133, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-10-01 10:26:28'),
(134, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 14', '2016-10-01 10:52:32'),
(135, 1, 'login', 'IP: ::1 - Piri Reis - Çıkış Yapıldı ', '2016-10-01 11:40:14'),
(136, 1, 'login', 'IP: ::1 - Piri Reis - Giriş Yapıldı ', '2016-10-01 11:40:27'),
(137, 1, 'login', 'IP: ::1 - Piri Reis - Çıkış Yapıldı ', '2016-10-01 11:40:33'),
(138, 1, 'login', 'IP: ::1 - Piri Reis - Giriş Yapıldı ', '2016-10-01 11:40:47'),
(139, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Yazı Eklendi Eklenen ID: 0', '2016-10-01 11:51:42'),
(140, 1, 'login', 'IP: ::1 - Piri Reis - Giriş Yapıldı ', '2016-10-03 08:17:26'),
(141, 1, 'login', 'IP: ::1 - Piri Reis - Giriş Yapıldı ', '2016-10-03 11:00:08'),
(142, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Yazı Eklendi Eklenen ID: 3', '2016-10-03 11:49:45'),
(143, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Yazı Eklendi Eklenen ID: 4', '2016-10-03 11:58:03'),
(144, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Yazı Eklendi Eklenen ID: 5', '2016-10-03 12:16:35'),
(145, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 5', '2016-10-03 12:16:49'),
(146, 1, 'delete', 'IP: ::1 - Piri Reis - Haber Silindi Silinen ID: 14', '2016-10-03 12:22:51'),
(147, 1, 'delete', 'IP: ::1 - Piri Reis - Yazı Silindi Silinen ID: 5', '2016-10-03 12:24:54'),
(148, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Yazı Eklendi Eklenen ID: 6', '2016-10-03 12:25:17'),
(149, 1, 'login', 'IP: ::1 - Piri Reis - Giriş Yapıldı ', '2016-10-04 06:32:06'),
(150, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Yazı Eklendi Eklenen ID: 7', '2016-10-04 07:05:21'),
(151, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Yazı Eklendi Eklenen ID: 8', '2016-10-04 07:05:48'),
(152, 1, 'delete', 'IP: ::1 - Piri Reis - Yazı Silindi Silinen ID: 6', '2016-10-04 07:05:55'),
(153, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 23', '2016-10-04 07:12:32'),
(154, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 23', '2016-10-04 07:14:02'),
(155, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 23', '2016-10-04 07:17:44'),
(156, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 35', '2016-10-04 07:20:54'),
(157, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 26', '2016-10-04 07:21:29'),
(158, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 23', '2016-10-04 07:31:07'),
(159, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 23', '2016-10-04 07:58:54'),
(160, 1, 'update', 'IP: ::1 - Piri Reis - haberler Bilgiler Güncellendi ID: 23', '2016-10-04 07:59:17'),
(161, 1, 'update', 'IP: ::1 - Piri Reis - Marka Güncellendi Güncellenen ID: 275', '2016-10-04 08:01:16'),
(162, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 26', '2016-10-04 08:13:56'),
(163, 1, 'delete', 'IP: ::1 - Piri Reis - Slider Silindi Silinen ID: 27', '2016-10-04 08:15:13'),
(164, 1, 'delete', 'IP: ::1 - Piri Reis - Slider Silindi Silinen ID: 26', '2016-10-04 08:15:16'),
(165, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Mekan Eklendi Eklenen ID: 29', '2016-10-04 08:18:24'),
(166, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Mekan Eklendi Eklenen ID: 30', '2016-10-04 08:22:17'),
(167, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 30', '2016-10-04 08:29:13'),
(168, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 29', '2016-10-04 08:32:21'),
(169, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 28', '2016-10-04 08:36:02'),
(170, 1, 'update', 'IP: ::1 - Piri Reis - Slider Bilgiler Güncellendi Güncellenen ID: 28', '2016-10-04 08:36:57'),
(171, 1, 'insert', 'IP: ::1 - Piri Reis - Yeni Mekan Eklendi Eklenen ID: 31', '2016-10-04 09:01:27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_members`
--

CREATE TABLE `li_members` (
  `id` int(11) NOT NULL,
  `ad` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `password` tinytext COLLATE utf8_unicode_ci,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `il` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ilce` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adres` text COLLATE utf8_unicode_ci NOT NULL,
  `tarih` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `li_members`
--

INSERT INTO `li_members` (`id`, `ad`, `email`, `password`, `tel`, `il`, `ilce`, `adres`, `tarih`, `status`) VALUES
(54325034, 'akillipanda', 'info@akillipanda.com', '03152008', '02122121270', 'İstanbul', 'Beşiktaş', 'xxxx', '2016-02-25', 1),
(58473521, 'EMC Bilişim', 'emcbilisimcom@gmail.com', '123456x', '146656434534', 'İstanbul', '-- İlçe --', 'kadıköy', '2016-07-27', 1),
(92083885, 'seyfullah', 'unalseyfullah@gmail.com', '123456', '1243534', 'Van', '-- İlçe --', 'jbshkjnhkv', '2016-07-25', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_pages`
--

CREATE TABLE `li_pages` (
  `id` int(11) NOT NULL,
  `top_id` int(11) NOT NULL DEFAULT '0',
  `title` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `seo_url` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8_unicode_ci,
  `keywords` tinytext COLLATE utf8_unicode_ci,
  `times` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `priority` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `li_pages`
--

INSERT INTO `li_pages` (`id`, `top_id`, `title`, `seo_url`, `content`, `description`, `keywords`, `times`, `priority`, `status`) VALUES
(93, 0, 'Üyelik Sözleşmesi', 'uyelik-sozlesmesi', '<p><strong>&Uuml;YELİK ve GİZLİLİK S&Ouml;ZLEŞMESİ</strong></p>\r\n\r\n<p><strong>1. Taraflar</strong></p>\r\n\r\n<p><strong>a)</strong>&nbsp;akillipanda.com&nbsp;&nbsp;internet sitesinin faaliyetlerini y&uuml;r&uuml;ten Gayrettepe Mah. Elifoğlu Sok.No:16/2 Yeşilyurt Apt. Beşiktaş - İstanbul adresinde mukim PHOTONS İNTERNET TEKNOLOJİLERİ SAN. VE TİC. LTD. ŞTİ (Bundan b&ouml;yle &ldquo;Akıllı Panda&rdquo; olarak anılacaktır).</p>\r\n\r\n<p><strong>b)</strong>&nbsp;akillipanda.com&nbsp;&nbsp;internet sitesine &uuml;ye olan internet kullanıcısı (&quot;&Uuml;ye&quot;)</p>\r\n\r\n<p><strong>2. S&ouml;zleşmenin Konusu</strong></p>\r\n\r\n<p>İşbu S&ouml;zleşmenin konusu Akıllı Panda&rsquo;nın sahip olduğu internet sitesi&nbsp;akillipanda.com&nbsp;dan &uuml;yenin faydalanma şartlarının belirlenmesidir.</p>\r\n\r\n<p><strong>3. Tarafların Hak ve Y&uuml;k&uuml;ml&uuml;l&uuml;kleri</strong></p>\r\n\r\n<p><strong>3.1.</strong>&nbsp;&Uuml;ye,&nbsp;akillipanda.com&nbsp;&nbsp;internet sitesine &uuml;ye olurken verdiği kişisel ve diğer sair bilgilerin kanunlar &ouml;n&uuml;nde doğru olduğunu, Akıllı Panda &#39;in bu bilgilerin ger&ccedil;eğe aykırılığı nedeniyle uğrayacağı t&uuml;m zararları aynen ve derhal tazmin edeceğini beyan ve taahh&uuml;t eder.</p>\r\n\r\n<p><strong>3.2.</strong>&nbsp;&Uuml;ye, Akıllı Panda tarafından kendisine verilmiş olan şifreyi başka kişi ya da kuruluşlara veremez, &uuml;yenin s&ouml;z konusu şifreyi kullanma hakkı bizzat kendisine aittir. Bu sebeple doğabilecek t&uuml;m sorumluluk ile &uuml;&ccedil;&uuml;nc&uuml; kişiler veya yetkili merciler tarafından Akıllı Panda &#39;ya karşı ileri s&uuml;r&uuml;lebilecek t&uuml;m iddia ve taleplere karşı, Akıllı Panda &#39;nın s&ouml;z konusu izinsiz kullanımdan kaynaklanan her t&uuml;rl&uuml; tazminat ve sair talep hakkı saklıdır.</p>\r\n\r\n<p><strong>3.3.</strong>&nbsp;&Uuml;ye&nbsp;akillipanda.com&nbsp;&nbsp;internet sitesini kullanırken yasal mevzuat h&uuml;k&uuml;mlerine riayet etmeyi ve bunları ihlal etmemeyi baştan kabul ve taahh&uuml;t eder. Aksi takdirde, doğacak t&uuml;m hukuki ve cezai y&uuml;k&uuml;ml&uuml;l&uuml;kler tamamen ve m&uuml;nhasıran &uuml;yeyi bağlayacaktır.</p>\r\n\r\n<p><strong>3.4.</strong>&nbsp;&Uuml;ye,&nbsp;akillipanda.com&nbsp;&nbsp;internet sitesini hi&ccedil;bir şekilde kamu d&uuml;zenini bozucu, genel ahlaka aykırı, başkalarını rahatsız ve taciz edici şekilde, yasalara aykırı bir ama&ccedil; i&ccedil;in, başkalarının fikri ve telif haklarına tecav&uuml;z edecek şekilde kullanamaz. Ayrıca, &uuml;ye başkalarının hizmetleri kullanmasını &ouml;nleyici veya zorlaştırıcı faaliyet (spam, virus, truva atı, vb.) ve işlemlerde bulunamaz.</p>\r\n\r\n<p><strong>3.5.</strong>&nbsp;akillipanda.com&nbsp;internet sitesinde &uuml;yeler tarafından beyan edilen, yazılan, kullanılan fikir ve d&uuml;ş&uuml;nceler, tamamen &uuml;yelerin kendi kişisel g&ouml;r&uuml;şleridir ve g&ouml;r&uuml;ş sahibini bağlar. Bu g&ouml;r&uuml;ş ve d&uuml;ş&uuml;ncelerin Akıllı Panda ile hi&ccedil;bir ilgi ve bağlantısı yoktur. Akıllı Panda &#39;nın &uuml;yenin beyan edeceği fikir ve g&ouml;r&uuml;şler nedeniyle &uuml;&ccedil;&uuml;nc&uuml; kişilerin uğrayabileceği zararlardan ve &uuml;&ccedil;&uuml;nc&uuml; kişilerin beyan edeceği fikir ve g&ouml;r&uuml;şler nedeniyle &uuml;yenin uğrayabileceği zararlardan dolayı herhangi bir sorumluluğu bulunmamaktadır.</p>\r\n\r\n<p><strong>3.6.</strong>&nbsp;Akıllı Panda, &uuml;ye verilerinin yetkisiz kişilerce okunmasından ve &uuml;ye yazılım ve verilerine gelebilecek zararlardan dolayı sorumlu olmayacaktır. &Uuml;ye,&nbsp;akillipanda.com&nbsp;&nbsp;internet sitesinin kullanılmasından dolayı uğrayabileceği herhangi bir zarar y&uuml;z&uuml;nden Akıllı Panda &#39;dan tazminat talep etmemeyi peşinen kabul etmiştir.</p>\r\n\r\n<p><strong>3.7.</strong>&nbsp;&Uuml;ye, diğer internet kullanıcılarının yazılımlarına ve verilerine izinsiz olarak ulaşmamayı veya bunları kullanmamayı kabul etmiştir. Aksi takdirde, bundan doğacak hukuki ve cezai sorumluluklar tamamen &uuml;yeye aittir.</p>\r\n\r\n<p><strong>3.8.</strong>&nbsp;İşbu &uuml;yelik s&ouml;zleşmesi i&ccedil;erisinde sayılan maddelerden bir ya da birka&ccedil;ını ihlal eden &uuml;ye işbu ihlal nedeniyle cezai ve hukuki olarak şahsen sorumlu olup, Akıllı Panda&rsquo;yı bu ihlallerin hukuki ve cezai sonu&ccedil;larından ari tutacaktır. Ayrıca; işbu ihlal nedeniyle, olayın hukuk alanına intikal ettirilmesi halinde, Akıllı Panda &#39;nın &uuml;yeye karşı &uuml;yelik s&ouml;zleşmesine uyulmamasından dolayı tazminat talebinde bulunma hakkı saklıdır.</p>\r\n\r\n<p><strong>3.9.</strong>&nbsp;Akıllı Panda &#39;nın her zaman tek taraflı olarak gerektiğinde &uuml;yenin &uuml;yeliğini silme, m&uuml;şteriye ait dosya, belge ve bilgileri silme hakkı vardır. &Uuml;ye işbu tasarrufu &ouml;nceden kabul eder. Bu durumda, Akıllı Panda &#39;nın hi&ccedil;bir sorumluluğu yoktur.</p>\r\n\r\n<p><strong>3.10.</strong>&nbsp;akillipanda.com&nbsp;internet sitesi yazılım ve tasarımı ETICARET m&uuml;lkiyetinde olup, bunlara ilişkin telif hakkı ve/veya diğer fikri m&uuml;lkiyet hakları ilgili kanunlarca korunmakta olup, bunlar&nbsp;&nbsp;&uuml;ye tarafından izinsiz kullanılamaz, iktisap edilemez ve değiştirilemez. Bu web sitesinde adı ge&ccedil;en başkaca şirketler ve &uuml;r&uuml;nleri sahiplerinin ticari markalarıdır ve ayrıca fikri m&uuml;lkiyet hakları kapsamında korunmaktadır.</p>\r\n\r\n<p><strong>3.11.</strong>&nbsp;Akıllı Panda tarafından&nbsp;&nbsp;akillipanda.com internet sitesinin iyileştirilmesi, geliştirilmesine y&ouml;nelik olarak ve/veya yasal mevzuat &ccedil;er&ccedil;evesinde siteye erişmek i&ccedil;in kullanılan İnternet servis sağlayıcısının adı ve Internet Protokol (IP) adresi, Siteye erişilen tarih ve saat, sitede bulunulan sırada erişilen sayfalar ve siteye doğrudan bağlanılmasını sağlayan Web sitesinin Internet adresi gibi birtakım bilgiler toplanabilir.</p>\r\n\r\n<p><strong>3.12.</strong>&nbsp;Akıllı Panda kullanıcılarına daha iyi hizmet sunmak, &uuml;r&uuml;nlerini ve hizmetlerini iyileştirmek, sitenin kullanımını kolaylaştırmak i&ccedil;in kullanımını kullanıcılarının &ouml;zel tercihlerine ve ilgi alanlarına y&ouml;nelik &ccedil;alışmalarda &uuml;yelerin kişisel bilgilerini kullanabilir. Akıllı Panda, &uuml;yenin&nbsp;akillipanda.com&nbsp;&nbsp;internet sitesi &uuml;zerinde yaptığı hareketlerin kaydını bulundurma hakkını saklı tutar.</p>\r\n\r\n<p><strong>3.13.</strong>&nbsp;Akıllı Panda&rsquo;ya&nbsp;&uuml;ye olan kişi, y&uuml;r&uuml;rl&uuml;kte bulunan ve/veya y&uuml;r&uuml;rl&uuml;ğe alınacak uygulamalar kapsamında Akıllı Panda iştiraki olan t&uuml;m şirketler tarafından&nbsp; kendisine &uuml;r&uuml;n ve hizmet tanıtımları, reklamlar, kampanyalar, avantajlar, anketler &nbsp;ve diğer m&uuml;şteri memnuniyeti uygulamaları sunulmasına izin verdiğini beyan ve kabul eder. &nbsp;&Uuml;ye, Akıllı Panda&rsquo;ya &uuml;ye olurken ve/veya başka yollarla ge&ccedil;mişte vermiş olduğu ve/veya gelecekte vereceği kişisel ve alışveriş bilgilerinin ve alışveriş ve/veya t&uuml;ketici davranış bilgilerinin&nbsp; yukarıdaki ama&ccedil;larla toplanmasına, Akıllı Panda &nbsp;iştiraki olan t&uuml;m şirketler ile paylaşılmasına, Akıllı Panda iştiraki olan t&uuml;m şirketler tarafından kullanılmasına ve arşivlenmesine izin verdiğini beyan ve kabul eder. &Uuml;ye aksini bildirmediği s&uuml;rece &nbsp;&uuml;yeliği sona erdiğinde de &nbsp;verilerin toplanmasına, Akıllı Panda iştiraki olan t&uuml;m şirketler ile paylaşılmasına, Akıllı Panda iştiraki olan t&uuml;m şirketler tarafından kullanılmasına ve arşivlenmesine izin verdiğini beyan ve kabul eder. &Uuml;ye aksini bildirmediği &nbsp;s&uuml;rece Akıllı Panda ve Akıllı Panda iştiraki olan t&uuml;m şirketlerin&nbsp; kendisi ile &nbsp;internet, telefon, SMS, &nbsp;vb iletişim kanalları kullanarak irtibata ge&ccedil;mesine izin verdiğini beyan ve kabul eder. &Uuml;ye yukarıda bahsi ge&ccedil;en bilgilerin toplanması, &nbsp;paylaşılması, kullanılması, arşivlenmesi ve kendisine erişilmesi nedeniyle doğrudan ve/veya dolaylı maddi ve/veya manevi menfi ve/veya m&uuml;spet, velhasıl herhangi bir zarara uğradığı konusunda talepte bulunmayacağını ve Akıllı Panda iştiraki olan şirketleri sorumlu tutmayacağını beyan ve kabul eder. &Uuml;ye veri paylaşım tercihlerini değiştirmek isterse, bu talebini Akıllı Panda&rsquo;nın m&uuml;şteri hizmetleri &ccedil;ağrı merkezlerine &nbsp;iletebilir.</p>\r\n\r\n<p><strong>3.14.</strong>&nbsp;Akıllı Panda, &uuml;yenin kişisel bilgilerini yasal bir zorunluluk olarak istendiğinde veya (a) yasal gereklere uygun hareket etmek veya Akıllı Panda&rsquo;ya tebliğ edilen yasal işlemlere uymak; (b) Akıllı Panda ve Akıllı Panda web sitesi ailesinin haklarını ve m&uuml;lkiyetini korumak ve savunmak i&ccedil;in gerekli olduğuna iyi niyetle kanaat getirdiği hallerde a&ccedil;ıklayabilir.</p>\r\n\r\n<p><strong>3.15.</strong>&nbsp;Akıllı Panda web sitesinin vir&uuml;s ve benzeri ama&ccedil;lı yazılımlardan arındırılmış olması i&ccedil;in mevcut imkanlar dahilinde tedbir alınmıştır. Bunun yanında nihai g&uuml;venliğin sağlanması i&ccedil;in kullanıcının, kendi vir&uuml;s koruma sistemini tedarik etmesi ve gerekli korunmayı sağlaması gerekmektedir. Bu bağlamda &uuml;ye Akıllı Panda web sitesi&#39;ne girmesiyle, kendi yazılım ve işletim sistemlerinde oluşabilecek t&uuml;m hata ve bunların doğrudan yada dolaylı sonu&ccedil;larından kendisinin sorumlu olduğunu kabul etmiş sayılır.</p>\r\n\r\n<p><strong>3.16.</strong>&nbsp;Akıllı Panda&nbsp;sitenin i&ccedil;eriğini dilediği zaman değiştirme, kullanıcılara sağlanan herhangi bir hizmeti değiştirme yada sona erdirme veya Akıllı Panda&nbsp;web sitesi&#39;nde kayıtlı kullanıcı bilgi ve verilerini silme hakkını saklı tutar.</p>\r\n\r\n<p><strong>3.17.</strong>&nbsp;Akıllı Panda, &uuml;yelik s&ouml;zleşmesinin koşullarını hi&ccedil;bir şekil ve surette &ouml;n ihbara ve/veya ihtara gerek kalmaksızın her zaman değiştirebilir, g&uuml;ncelleyebilir veya iptal edebilir. Değiştirilen, g&uuml;ncellenen yada y&uuml;r&uuml;rl&uuml;kten kaldırılan her h&uuml;k&uuml;m, yayın tarihinde t&uuml;m &uuml;yeler bakımından h&uuml;k&uuml;m ifade edecektir.</p>\r\n\r\n<p><strong>3.18.</strong>&nbsp;Taraflar Akıllı Panda&rsquo; ya ait t&uuml;m bilgisayar kayıtlarının tek ve ger&ccedil;ek m&uuml;nhasır delil olarak, HUMK madde 287&#39;ye uygun şekilde esas alınacağını ve s&ouml;z konusu kayıtların bir delil s&ouml;zleşmesi teşkil ettiği hususunu kabul ve beyan eder.</p>\r\n\r\n<p><strong>3.19.</strong>&nbsp;Akıllı Panda, iş bu &uuml;yelik s&ouml;zleşmesi uyarınca, &uuml;yelerinin kendisinde kayıtlı elektronik posta adreslerine bilgilendirme mailleri ve cep telefonlarına bilgilendirme SMS leri g&ouml;nderme yetkisine sahip olmakla beraber, &uuml;ye işbu &uuml;yelik s&ouml;zleşmesini onaylamasıyla beraber bilgilendirme maillerinin elektronik posta adresine ve bilgilendirme SMS lerinin cep telefonuna g&ouml;nderilmesini kabul etmiş sayılacaktır. &Uuml;ye mail ve/veya SMS almaktan vazge&ccedil;mek istemesi durumunda Benim Sayfam &nbsp;b&ouml;l&uuml;m&uuml;ndeki Tercihlerim kısmından mail ve/veya SMS g&ouml;nderim iptal işlemini ger&ccedil;ekleştirebilecektir.</p>\r\n\r\n<p><strong>4. S&ouml;zleşmenin Feshi</strong></p>\r\n\r\n<p>İşbu s&ouml;zleşme &uuml;yenin &uuml;yeliğini iptal etmesi veya Akıllı Panda tarafından &uuml;yeliğinin iptal edilmesine kadar y&uuml;r&uuml;rl&uuml;kte kalacaktır.&nbsp;Akillipanda&nbsp;&uuml;yenin &uuml;yelik s&ouml;zleşmesinin herhangi bir h&uuml;km&uuml;n&uuml; ihlal etmesi durumunda &uuml;yenin &uuml;yeliğini iptal ederek s&ouml;zleşmeyi tek taraflı olarak feshedebilecektir.</p>\r\n\r\n<p><strong>5. İhtilafların Hali</strong></p>\r\n\r\n<p>İşbu s&ouml;zleşmeye ilişkin ihtilaflarda İstanbul Mahkemeleri ve İcra Daireleri yetkilidir.</p>\r\n\r\n<p><strong>6. Y&uuml;r&uuml;rl&uuml;k</strong></p>\r\n\r\n<p>&Uuml;yenin, &uuml;yelik kaydı yapması &uuml;yenin &uuml;yelik s&ouml;zleşmesinde yer alan t&uuml;m maddeleri okuduğu ve &uuml;yelik s&ouml;zleşmesinde yer alan maddeleri kabul ettiği anlamına gelir. İşbu S&ouml;zleşme &uuml;yenin &uuml;ye olması anında akdedilmiş ve karşılıklı olarak y&uuml;r&uuml;rl&uuml;l&uuml;ğe girmiştir.</p>', '', '', '2016-02-23 11:18:28', 0, 1),
(94, 0, 'Hakkımızda', 'hakkimizda', '<p>Hayallerinize yelken a&ccedil;ın...</p>\r\n\r\n<p>Filosunu her ge&ccedil;en yıl daha da b&uuml;y&uuml;ten Piri Reis Yat&ccedil;ılık, kendi yatlarını işletmekte ve kiraya vermektedir. T&uuml;m yıl boyunca eğitim ve kiralama hizmetlerini profesyonel bir kadroyla aralıksız veren Piri Reis Yat&ccedil;ılık, &uuml;&ccedil; tarafı denizlerle &ccedil;evrili olan &uuml;lkemizde yat&ccedil;ılığın yaygınlaşması ve gelişmesi i&ccedil;in gereken desteği ve katkıyı sunmaktan gurur duymaktadır.</p>\r\n\r\n<p>Siz de hayallerinize &quot;yelken a&ccedil;mak&quot; istiyorsanız, Marmaris Netsel Marina&#39;da buluşalım, hayallerinize birlikte &quot;yelken a&ccedil;alım...&quot;</p>', '', '', '2016-06-30 12:01:39', 0, 1),
(101, 0, 'Mesafeli Satış Sözleşmesi', 'mesafeli-satis-sozlesmesi', '<p>1- Taraflar: Bu Mesafeli Satış S&ouml;zleşmesi (bundan sonra &lsquo;S&ouml;zleşme&rsquo; olarak anılacaktır) Gayrettepe Mah.elifoğlu Sok.Yeşilyurt Apt. No: 16/2 &nbsp;adresinde faaliyet g&ouml;steren Photons İnternet Teknolojileri San. ve Tic. Ltd. Şti. (Tel: 0212 212 12 070) (e-posta: info@akillipanda.com) (Mecidiyek&ouml;y VD,7290578827 MERSIS No: 0385069023800015)(bundan sonra &ldquo;akillipanda&rdquo; olarak anılacaktır) ile www.akillipanda.com web sitesi &uuml;zerinden kayıt formunu doldurarak bu S&ouml;zleşme&rsquo;yi elektronik ortamda imzalamış web kullanıcısı ger&ccedil;ek veya t&uuml;zel kişi &ldquo;&Uuml;ye&rdquo; arasındadır.</p>\r\n\r\n<p>2- S&ouml;zleşme&rsquo;nin Konusu: S&ouml;zleşme&rsquo;nin konusu &Uuml;ye&rsquo;ye ait cep telefonu ve/veya tablet (kısaca &ldquo;cihaz&rdquo;) ile ilgili arıza bildirimini ve/veya talebini takiben, arızalı ve/veya bakımı yapılacak Cihazın &Uuml;ye&rsquo;nin bildireceği adresten teslim alınması, tamirat ve/veya bakım s&uuml;resi esnasında &Uuml;ye&rsquo;nin talebi olması halinde kullanımı i&ccedil;in &ldquo;Yedek Telefon Hizmeti başlığı altında belirtilen&rdquo; cep telefonunun t&uuml;m tamir s&uuml;resi boyunca ge&ccedil;erli olacak kira bedeli karşılığında &Uuml;ye&rsquo;ye emaneten bırakılması, bildirilen arızanın giderilerek ve/veya bakım hizmetinin temin edilmesini takiben Cihazın &Uuml;ye&rsquo;ye teslimi, emaneten bırakılan Cihazın ise iade alınmasına ilişkin h&uuml;k&uuml;m ve koşulların d&uuml;zenlenmesidir.</p>\r\n\r\n<p>3- Yerinde Tamir: Yerinde tamir hizmeti, arızalı Cihazın tamirinin Cihazın Akıllı Panda&rsquo;ya teslimini takiben en ge&ccedil; 5 saat i&ccedil;inde ger&ccedil;ekleştirildiği hızlandırılmış bir tamir hizmeti olup, &Uuml;ye dilerse bu hizmeti www.akillipanda.com web sitesi &uuml;zerinden tercih edebilir. Bu hizmette &Uuml;ye isterse, tamir işlemi esnasında kullanabileceği yedek telefon hizmetinden de istifade edebilir.</p>\r\n\r\n<p>4- Hizmetin Vergiler Dahil Toplam Fiyatı: Aşağıda belirtilen tamir ve/veya bakım bedelleri, &Uuml;ye tarafından bildirilen arıza ve/veya talep edilen bakım hizmeti işi esas alınarak tahmini olarak hesaplanmıştır. Cihazın Akıllı Panda tarafından a&ccedil;ılmasını takiben tespit edilecek tamir ve/veya bakım bedelleri ayrıca fiyatlandırılarak &Uuml;ye&rsquo;nin se&ccedil;tiği uzaktan iletişim ara&ccedil;ları ile &Uuml;ye&rsquo;ye bildirilecek, bu fiyatın onay s&uuml;resi de ayrıca belirtilecektir. &Uuml;ye yine uzaktan iletişim ara&ccedil;ları vasıtasıyla bu fiyata nihai şekilde onay verir. Belirtilen s&uuml;re i&ccedil;inde, &Uuml;ye tarafından bu fiyat(lar) onaylanmadığı takdirde, işlemlere başlanmaz; tamir ve/veya bakıma konu Cihaz &Uuml;ye&rsquo;ye iade edilir. Akıllı Panda arıza tamir ve bakım tarifesi, t&uuml;m vergiler de dahil olmak &uuml;zere, www.akillipanda.com web sitesi &uuml;zerinde g&ouml;sterilmektedir.</p>\r\n\r\n<p>Tahmini Arıza Bedeli&nbsp;&nbsp; &nbsp;-<br />\r\nBakım Hizmeti Bedeli&nbsp;&nbsp; &nbsp;-<br />\r\nYerinde Tamir Bedeli&nbsp;&nbsp; &nbsp;-<br />\r\nYedek Telefon Kira Bedeli&nbsp;&nbsp; &nbsp;-<br />\r\n5- &Ouml;deme: &Ouml;demeler kapıda nakit veya kredi kartı POS cihazından &ouml;deme ile ger&ccedil;ekleştirilir.</p>\r\n\r\n<p>6-Teslimat: Cihaz, Akıllı Panda&rsquo;ya teslim edildikten ve Akıllı Panda tarafından Cihaz a&ccedil;ılıp ilave fiyatlandırma s&ouml;z konusu ise bu fiyatlandırma &Uuml;ye tarafından onaylandıktan itibaren en ge&ccedil; 5 g&uuml;n i&ccedil;inde Cihazın tamir ve/veya bakımı tamamlanarak &Uuml;ye&rsquo;ye teslim edilir. Yerinde tamir hizmetinin tercih edilmesi halinde Cihaz, &Uuml;ye&rsquo;nin bildireceği adresten teslim alındıktan itibaren 5 saat i&ccedil;inde tamiri ger&ccedil;ekleştirilerek &Uuml;ye&rsquo;ye iade edilir. Bununla birlikte, Cihaz&rsquo;da ilave maliyete neden olan bir arızanın tespiti halinde bu, fiyatlandırmaya yansıyacağı gibi Cihaz&rsquo;ın azami tamir s&uuml;resine de yansıyabilir. Bu halde Akıllı Panda , tamir s&uuml;resinde uzama olacağını &Uuml;ye&rsquo;ye bildirir.</p>\r\n\r\n<p>7- &Uuml;yeliğin Sona Erdirilmesi: Akıllı Panda, mevzuatı ihlal teşkil eder herhangi bir fiilin tespiti &uuml;zerine her hangi bir gerek&ccedil;e g&ouml;stermeden, bildirimsiz ve tazminatsız olarak, ilgili &Uuml;ye&rsquo;nin &uuml;yeliğini dondurabilir, &uuml;yelikten yasaklayabilir. &Uuml;yeliğin dondurulması ve ya sona erdirilmesi durumunda Akıllı Panda&rsquo;dan herhangi bir ad altında tazminat talebinde bulunulamaz. &Uuml;yeliği dondurulan veya &uuml;yelikten yasaklanan kullanıcının başka bir kullanıcı hesabı ile &uuml;ye olması yasaktır.</p>\r\n\r\n<p>8- S&ouml;zleşmenin Onayı: &Uuml;yelik S&ouml;zleşmesi&rsquo;nde belirtilen bilgileri doldurup veya &uuml;yelik ger&ccedil;ekleştirmeden işlem yapma se&ccedil;eneğini tercih ederek işbu S&ouml;zleşmede belirtilen şartları onaylayan, gizlilik politikasına uygun davranacağını taahh&uuml;t eden &Uuml;ye&rsquo;nin &uuml;yelik işlemini ger&ccedil;ekleştirebilir ve S&ouml;zleşmenin t&uuml;m h&uuml;k&uuml;mlerini kabul etmiş sayılır. &Uuml;yelik &uuml;cretsizdir.</p>\r\n\r\n<p>9 &ndash; &Uuml;ye&rsquo;nin Hak ve Y&uuml;k&uuml;ml&uuml;l&uuml;kleri<br />\r\n9.1. &Uuml;ye www.akillipanda.com web sitesi &uuml;zerinden ger&ccedil;ekleştireceği her t&uuml;rl&uuml; işlem ve eylemde işbu S&ouml;zleşme koşullarına, yasalara, ahlaka ve adaba, temel ve ticari d&uuml;r&uuml;stl&uuml;k ilkelerine uyacağını kabul ve taahh&uuml;t eder.<br />\r\n9.2. Akıllı Panda, y&uuml;r&uuml;rl&uuml;kteki mevzuat uyarınca yetkili makamlardan usul&uuml;ne uygun olarak talep gelmesi halinde &Uuml;ye&rsquo;nin kendisinde bulunan bilgilerini ilgili yetkili/resmi makamlarla paylaşabilir.<br />\r\n9.3. &Uuml;ye, &uuml;yelik esnasında veya sipariş verirken kullandığı kullanıcı adı, şifre, &ouml;deme bilgileri ile varsa sair şahsi bilgilerinin doğruluğunu kabul eder. &Uuml;ye bu bilgilerin doğru olmasından ve 3. şahıslarla paylaşılmasından bizzat kendisi sorumludur.<br />\r\n9.4. &Uuml;ye, hizmet bedellerini kredi kartı veya nakit ile &ouml;deme yapabilmekte olup, fiyatlandırmanın nihai onayını takiben t&uuml;m bedellerin &ouml;demesini tek seferde yapmakla y&uuml;k&uuml;ml&uuml;d&uuml;r. Eksik &ouml;deme halinde, işlemlere başlanmaz.<br />\r\n10- Cayma Hakkı: 6502 Sayılı T&uuml;keticinin Korunması Hakkında Kanun ve ilgili mevzuat h&uuml;k&uuml;mlerince &Uuml;ye, on d&ouml;rt g&uuml;n i&ccedil;inde herhangi bir gerek&ccedil;e g&ouml;stermeksizin ve cezai şart &ouml;demeksizin cayma hakkına sahiptir. Cayma hakkının kullanıldığına dair bildirimin bu s&uuml;re i&ccedil;inde Akıllı Panda&rsquo;ya y&ouml;neltilmiş olması yeterlidir.</p>\r\n\r\n<p>Taraflarca aksi kararlaştırılmadığı takdirde, &Uuml;ye&rsquo;nin istekleri veya a&ccedil;ık&ccedil;a &Uuml;ye&rsquo;nin kişisel ihtiya&ccedil;ları doğrultusunda hazırlanan, niteliği itibari ile geri g&ouml;nderilmeye elverişli olmayan ve &ccedil;abuk bozulma tehlikesi olan veya son kullanma tarihi ge&ccedil;me ihtimali olan malların teslimine ilişkin s&ouml;zleşmelerde &Uuml;ye&rsquo;nin cayma hakkı yoktur.</p>\r\n\r\n<p>Cayma hakkı s&uuml;resi sona ermeden &ouml;nce, &Uuml;ye&rsquo;nin onayı ile hizmetin ifasına başlanması durumunda &Uuml;ye&rsquo;nin cayma hakkı yoktur.</p>\r\n\r\n<p>11- Yedek Telefon Hizmeti: Yedek telefon, arıza ve/veya bakım esnasında &Uuml;ye&rsquo;nin mağdur olmaması i&ccedil;in ve &Uuml;ye&rsquo;nin talebi halinde sunulan bir hizmettir. Yedek telefon olarak Apple iPhone 4S, Apple iPhone 5, Samsung S3, Samsung S4 veya LG G2 marka ve model cep telefonlarından birisi uygunluk durumuna g&ouml;re, teslim tutanağı karşılığında &Uuml;ye&rsquo;ye teslim edilir. Yedek telefonda &Uuml;ye&rsquo;nin ihmali, kusuru veya kastı ile herhangi bir zarar veya ziyan meydana gelmesi halinde Akıllı Panda bu nedenle uğradığı t&uuml;m m&uuml;spet ve menfi zararları &Uuml;ye tarafından tazmin edilecektir.</p>\r\n\r\n<p>12- S&ouml;zleşme Değişiklikleri: Akıllı Panda, işbu S&ouml;zleşmeyi tek taraflı olarak uygun g&ouml;receği bir zamanda değiştirebilir. Bu değişiklik www.akillipanda.com web sitesinden bildirilecektir.</p>\r\n\r\n<p>13- M&uuml;cbir Sebepler: M&uuml;cbir sebep sayılan t&uuml;m durumlarda, Akıllı Panda işbu S&ouml;zleşme ile belirlenen edimlerinden herhangi birini ge&ccedil; veya eksik ifa etme veya ger&ccedil;ekleştiremezse, &Uuml;ye her ne nam altında olursa olsun tazminat, &uuml;cret ve sair &ouml;deme talep edilemeyecektir. M&uuml;cbir sebep, doğal afet, isyan, savaş, grev, halk ayaklanması, iletişim sorunları, altyapı ve internet arızaları, sisteme ilişkin iyileştirme veya yenileştirme &ccedil;alışmaları ve bu sebeple meydana gelebilecek arızalar, elektrik kesintisi ve k&ouml;t&uuml; hava koşulları da d&acirc;hil ve fakat bunlarla sınırlı olmamak kaydıyla ilgili tarafın makul kontrol&uuml; haricinde ger&ccedil;ekleşen olaylar olarak yorumlanacaktır.</p>\r\n\r\n<p>14- Bilgi G&uuml;venliği ve Yedekleme: Cihazın Akıllı Panda&rsquo;ya teslimi esnasında Cihazdaki t&uuml;m kişisel bilgilerin, telefon rehberi, SMS, MMS, e-posta ve ileride ortaya &ccedil;ıkabilecek sair iletişim mecraları, fotoğraflar, uygulamalar, not defteri, notlar, ajanda, takvim, hesaplar da dahil fakat bunlarla sınırlı olmaksızın Cihazın i&ccedil;inde yer alan her t&uuml;rl&uuml; bilginin yedeklerinin alınmasından bizzat &Uuml;ye sorumludur. Akıllı Panda, hizmet esnasında veya hizmetin ifasından sonra dahi bu bilgilerin eksik, hatalı veya tamamen ortadan kaltığına dair hi&ccedil;bir talebi kabul etmez. Bu hususta &Uuml;ye m&uuml;nferiden sorumludur.</p>\r\n\r\n<p>15- Yetkili Mahkeme: İşbu S&ouml;zleşmenin ifasından doğabilecek ihtilafların halli i&ccedil;in İstanbul (&Ccedil;ağlayan) Mahkemeleri ile İcra Daireleri yetkilidir. &Uuml;YE işbu S&ouml;zleşmeden doğabilecek ihtilaflarda www.akillipanda.com web sitesi i&ccedil;eriği ve veri tabanında &uuml;ye ve/veya mal ve/veya hizmet ile ilgili olarak tutulan her t&uuml;rl&uuml; bilgi, yazışma, kayıt, mikrofiş de dahil fakat bunlarla sınırlı olmaksızın ayrıca Akıllı Panda&rsquo;nın ticari, defter, kayıt ve belgelerinin tek, m&uuml;nhasır, kesin bağlayıcı delil teşkil edeceğini kabul ve taahh&uuml;t eder.</p>', '', '', '2016-07-18 06:31:27', 0, 0),
(95, 0, 'Nasıl Çalışır ?', 'nasil-calisir', '<p><span style="font-size:14px;"><span style="font-family:arial,helvetica,sans-serif;"><strong style="line-height: 1.6;">Eski telefonunuzu değerinde satabileceğiniz Yeni telefonunuzu da uygun fiyatlara alabileceğiniz bir programdır</strong><strong style="line-height: 1.6;">.</strong>İster&nbsp;&uuml;st model telefon isterseniz de farklı markaların telefonlarını uygun fiyat avantajları ile garantili olarak sahip olabilirsiniz tek yapmanız gereken adımları takip etmek;</span></span></p>\r\n\r\n<p><span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;">Peki, telefonunuzu nasıl değiştireceksiniz?</span></span></p>\r\n\r\n<ol>\r\n	<li><span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;">Eski telefonunuza akillipanda.com dan teklif alınır</span></span></li>\r\n	<li><span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;">Dilediğiniz telefonu dilediğiniz telefonu se&ccedil;er sepetinize eklersiniz</span></span></li>\r\n	<li><span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;">Sepette eski telefonunuz indirim olarak g&ouml;r&uuml;n&uuml;r, kalan tutarı dilediğiniz şekilde &ouml;demesini ger&ccedil;ekleştirebilirsiniz</span></span></li>\r\n	<li><span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;">Telefonunuzu Akıllı Panda Teknik Servisinin değerlendirmesi i&ccedil;in &uuml;cretsiz kargo ile g&ouml;nderilir.</span></span></li>\r\n	<li><span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;">Teknik Servisin onaylamasından hemen sonra se&ccedil;miş olduğunuz telefon &uuml;cretsiz kargoyla size en hızlı bir şekilde size ulaştırılır.</span></span></li>\r\n	<li><span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;">En hızı, g&uuml;venilir ve garantili olarak yeni telefonunuza sahip olabilirsiniz&nbsp;</span></span></li>\r\n</ol>', '', '', '2016-07-18 06:31:26', 0, 0),
(100, 0, 'Teknik Servis Açıklamaları', 'teknik-servis-aciklamalari', '<p><img alt="" src="/uploads/images/demo/Genau-untersucht-die-Wirkung-von-Standards.jpg" style="width: 300px; height: 200px; float: right;" />&nbsp; &nbsp;Telefonunuzda ki ekran kırığı, tuş sorunları, sıvı teması, ses sorunları vb. teknik sorunları ister kapınızda isterseniz de &uuml;cretsiz kargo ile&nbsp;merkezimize&nbsp;g&ouml;ndererek&nbsp;Akıllı&nbsp;Panda uzman teknik servislerimiz tarafından ortadan kaldırıyoruz</p>\r\n\r\n<p><strong>&nbsp; &nbsp;Akıllı Panda Teknik servis nasıl işler ?</strong></p>\r\n\r\n<ol>\r\n	<li>Telefonunuzdaki sorunları akıllı teknik servis sayfasın da se&ccedil;ilir</li>\r\n	<li>servis s&uuml;resi belirlenir (6 saat kapıda onarım ya da 48 saat kargo g&ouml;nderimi )</li>\r\n	<li>&nbsp;&ouml;deme se&ccedil;enekleri kullanılarak &ouml;deme işlemi tamamlanır ve s&uuml;re&ccedil; başlar</li>\r\n</ol>\r\n\r\n<p><strong>&nbsp; &nbsp;Bilinmesi gerekenler</strong></p>\r\n\r\n<ul>\r\n	<li>Kapıda onarım sadece istanbul i&ccedil;in ge&ccedil;erlidir</li>\r\n	<li>Kargo se&ccedil;eneğindeki&nbsp; &uuml;r&uuml;n teknik ekibimize kargo teslimatı yapıldıktan sonra 48 saat i&ccedil;inde tamamlanır</li>\r\n	<li>Kapıda onarım i&ccedil;in extra hizmet fiyatlandırması eklenir</li>\r\n	<li>Kargo dahil fiyatlandırma yapılır .</li>\r\n</ul>', '', '', '2016-07-18 06:31:25', 0, 0),
(102, 0, 'Hesap Bilgilerimiz', 'hesap-bilgilerimiz', '<p><strong>Photons İnternet Teknolojileri San. ve Tic.&nbsp;Ltd. &nbsp;Şti.</strong></p>\r\n\r\n<p><strong>Denizbank - Şişli Şubesi</strong></p>\r\n\r\n<p>&nbsp;Hesap No / Şube&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;<strong>3070 - 12585319-351</strong></p>\r\n\r\n<p>&nbsp;IBAN No &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;<strong>TR06 0013 4000 0125 8531 9000 01</strong>&nbsp;</p>', '', '', '2016-07-18 06:31:24', 0, 0),
(103, 0, 'GİZLİLİK SÖZLEŞMESİ', 'gizlilik-sozlesmesi', '<p>Alıcı tarafından iş bu s&ouml;zleşmede &nbsp;belirtilen &nbsp;bilgiler ile &nbsp;&ouml;deme yapmak amacı ile satıcıya bildirdiği bilgiler satıcı &nbsp;tarafından 3. şahıslarla paylaşılmayacaktır.</p>\r\n\r\n<p><br />\r\nSatıcı &nbsp;bu bilgileri sadece idari/ yasal zorunluluğun mevcudiyeti &ccedil;er&ccedil;evesinde a&ccedil;ıklayabilecektir. Araştırma ehliyeti belgelenmiş her t&uuml;rl&uuml; adli soruşturma dahilinde satıcı &nbsp;kendisinden istenen bilgiyi elinde bulunduruyorsa ilgili makama sağlayabilir.</p>\r\n\r\n<p><br />\r\nKredi Kartı bilgileri kesinlikle saklanmaz, kredi kartı bilgileri sadece tahsilat işlemi sırasında ( akillipanda.com ) ilgili bankalara g&uuml;venli bir şekilde iletilerek provizyon alınması i&ccedil;in kullanılır ve provizyon sonrası sistemden silinir.</p>\r\n\r\n<p><br />\r\nAlıcıya ait e-posta adresi, posta adresi ve telefon gibi bilgiler yalnızca satıcı &nbsp;tarafından standart &uuml;r&uuml;n teslim ve bilgilendirme prosed&uuml;rleri i&ccedil;in kullanılır. Bazı d&ouml;nemlerde kampanya bilgileri, yeni &uuml;r&uuml;nler hakkında bilgiler, promosyon bilgileri alıcıya onayı sonrasında g&ouml;nderilebilir.<br />\r\n&nbsp;</p>', '', '', '2016-07-18 06:31:23', 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_reklam`
--

CREATE TABLE `li_reklam` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `type` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `li_reklam`
--

INSERT INTO `li_reklam` (`id`, `img`, `link`, `status`, `type`, `title`) VALUES
(1, '/uplo4ds/files/reklam.jpg', 'asdfascdf1123123', 1, 123, 'sadfsdfasdf');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_remember`
--

CREATE TABLE `li_remember` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `token` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `times` datetime NOT NULL,
  `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `li_remember`
--

INSERT INTO `li_remember` (`id`, `user_id`, `email`, `token`, `times`, `ip`) VALUES
(6, 1, 'info@akillipanda.com', '40fc9e51b4dfdab734a5406886eb9b75', '2016-02-25 21:04:05', '46.197.149.188');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_rezervasyon`
--

CREATE TABLE `li_rezervasyon` (
  `id` int(11) NOT NULL,
  `uyeid` int(11) NOT NULL,
  `boat_id` smallint(3) DEFAULT NULL,
  `tur` varchar(255) NOT NULL,
  `siparisno` varchar(25) NOT NULL,
  `odemetipi` varchar(25) NOT NULL,
  `binisadres` tinytext NOT NULL,
  `inisadres` tinytext NOT NULL,
  `fiyat` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `aciklama` text NOT NULL,
  `tarih` date NOT NULL,
  `kiralama_s` tinytext NOT NULL,
  `kisi_s` tinyint(11) NOT NULL,
  `teslimatadres` varchar(250) NOT NULL,
  `faturaadres` varchar(250) NOT NULL,
  `k_tarih` datetime NOT NULL,
  `odeme_siparis_no` varchar(250) NOT NULL,
  `ek_secenek` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_services`
--

CREATE TABLE `li_services` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `county` tinytext COLLATE utf8_unicode_ci,
  `town` tinytext COLLATE utf8_unicode_ci,
  `cat_id` int(11) NOT NULL,
  `title` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `tel` tinytext COLLATE utf8_unicode_ci,
  `times` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  `ip` tinytext COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `li_services`
--

INSERT INTO `li_services` (`id`, `member_id`, `county`, `town`, `cat_id`, `title`, `details`, `tel`, `times`, `status`, `ip`) VALUES
(1002, 5, '57,85,92,110', NULL, 205, 'İnşaat Helikopterli Şap Zemin', 'Limitsiz İnşaat Endüstriyel Zemin Kaplama Helikopterli Şap Uygulaması usta ve ekip hizmetleri. Otopark Şapı, Hava alanı zemini, Dış mekan saha zemin şapı, Lojistik Endüstriyel zemin yapım hizmetleri.', '0543 231 44 03', '2015-11-02 10:01:48', 1, NULL),
(1003, 7, '86', '612,613,616,618,620,622', 244, 'Yasar deneme', 'yasar denemenin detayları', '0555 011 21 21', '2015-11-02 15:35:29', 0, NULL),
(1004, 5, '', NULL, 244, 'Online Yazılım Sistemleri', 'Mobil - Desktop - Web Online yazılım çözümleri sunan firmamız 2005 den beri gereksinime uygun yazılımlar yapmaktadır.', '0543 231 44 03', '2015-11-02 10:01:48', 0, NULL),
(1005, 10, '', NULL, 244, 'Online Yazılım Hizmetleri', 'Mobil - Desktop - Web Online yazılım çözümleri sunan firmamız 2005 den beri gereksinime uygun yazılımlar yapmaktadır. CRM - ERP', '0850 302 83 62', '2015-11-02 10:01:48', 1, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_sessions`
--

CREATE TABLE `li_sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_settings`
--

CREATE TABLE `li_settings` (
  `id` int(11) NOT NULL,
  `title` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `keywords` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `tel` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `tel2` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `email` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `smtp_host` tinytext COLLATE utf8_unicode_ci,
  `smtp_email` tinytext COLLATE utf8_unicode_ci,
  `smtp_pass` tinytext COLLATE utf8_unicode_ci,
  `definitions` longtext COLLATE utf8_unicode_ci,
  `note` longtext COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `li_settings`
--

INSERT INTO `li_settings` (`id`, `title`, `description`, `keywords`, `tel`, `tel2`, `email`, `address`, `smtp_host`, `smtp_email`, `smtp_pass`, `definitions`, `note`) VALUES
(1, 'Mekhan', 'Mekhan', 'Mekhan', '0212 123 45 67', '', 'info@mekhan.com', 'mekhan.com', 'smtp.mandrillapp.com', 'no-reply@akillipanda.com', 'R24mIMIxZJXKkjbc-KXX7A', '[{"group":"social","id":"google-plus","name":"google-plus","status":"1","val1":"","val2":""},{"group":"social","id":"instagram","name":"instagram","status":"1","val1":"","val2":""}]', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_slider`
--

CREATE TABLE `li_slider` (
  `id` int(11) NOT NULL,
  `title` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `img` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `kategori` text COLLATE utf8_unicode_ci NOT NULL,
  `il` text COLLATE utf8_unicode_ci NOT NULL,
  `ilce` text COLLATE utf8_unicode_ci NOT NULL,
  `extra` text COLLATE utf8_unicode_ci NOT NULL,
  `fiyat` int(11) NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `telefon` int(11) NOT NULL,
  `map` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `li_slider`
--

INSERT INTO `li_slider` (`id`, `title`, `img`, `content`, `priority`, `status`, `kategori`, `il`, `ilce`, `extra`, `fiyat`, `link`, `telefon`, `map`) VALUES
(28, 'Kanka Görsel', '/uplo4ds/files/agnet mehmet.jpg', 'Kanka Görsel', 0, 1, 'Restaurant', 'İstanbul', 'Kadıköy', 'Extralar', 0, 'kanka-gorsel', 2129091214, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12049.219280652687!2d29.099843087048338!3d40.974805686809454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cac64ec95f4c6b%3A0xf8fba47cb7db40af!2zS296eWF0YcSfxLE!5e0!3m2!1str!2str!4v1475568747776" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>'),
(29, 'Mekan Adı', '/uplo4ds/files/2875552.jpg', 'Mekan Açıklama', 0, 1, 'Bar', 'İstanbul', 'Kadıköy', 'Sınırsız İçki', 250, 'mekan-adi', 212, ''),
(30, 'Mekan Adı 1', '/uplo4ds/images/sokakta-cilgin-parti-cadilar-bayrami-halloween-new-york-spring-caddesi-1030609.jpg', 'Mekan Açıklaması', 0, 1, 'Restaurant', 'İstanbul', 'Kadıköy', 'Extralar', 350, 'mekan-adi-1', 2147483647, ''),
(31, 'Vay Be MEkana Bak', '/uplo4ds/files/2911813.jpg', 'Mekanımıza Hepiniz Davetlisiniz', 0, 1, 'Restaurant', 'İzmir', 'Kadıköy', 'Her Gün İndirim', 1, 'vay-be-mekana-bak', 2147483647, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48196.53389932641!2d29.072076235718022!3d40.97527547391078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x26cd171cd77fa587!2sManolya+Pastaneleri-Sahray%C4%B1cedit+%C5%9Eubesi!5e0!3m2!1str!2str!4v1475571652744" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_users`
--

CREATE TABLE `li_users` (
  `id` int(11) NOT NULL,
  `username` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `password` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `email` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `fullname` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `tel` tinytext COLLATE utf8_unicode_ci,
  `img` tinytext COLLATE utf8_unicode_ci,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `li_users`
--

INSERT INTO `li_users` (`id`, `username`, `password`, `email`, `fullname`, `tel`, `img`, `status`) VALUES
(1, 'admin', 'akillipanda2016', 'info@akillipanda.com', 'Piri Reis', '', '2016.06.18-12.00.22-admin.png', 1),
(3, 'emc', '72fab8b1bcb539aa1db83f17f43f6366', 'info@emcbilisim.com', 'Emc Bilişim', '0850 302 83 62', '2015.10.22-03.36.01-emc.png', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `li_yorum`
--

CREATE TABLE `li_yorum` (
  `id` int(11) NOT NULL,
  `boat_id` int(11) NOT NULL,
  `yorum` varchar(255) NOT NULL,
  `oy` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `li_yorum`
--

INSERT INTO `li_yorum` (`id`, `boat_id`, `yorum`, `oy`) VALUES
(1, 87, 'selam', 3),
(2, 87, 'oldu mu', 4),
(3, 87, 'hadi bakalım sonuca', 1),
(4, 87, 'hadi bakalım sonuca', 1),
(5, 87, 'hadi bakalım sonuca', 1),
(6, 87, 'bu kez tamam', 5);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `li_auth`
--
ALTER TABLE `li_auth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `li_bids`
--
ALTER TABLE `li_bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Tablo için indeksler `li_blog`
--
ALTER TABLE `li_blog`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `li_boats`
--
ALTER TABLE `li_boats`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `li_boat_cats`
--
ALTER TABLE `li_boat_cats`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `li_categories`
--
ALTER TABLE `li_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`top_id`);

--
-- Tablo için indeksler `li_county`
--
ALTER TABLE `li_county`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `li_customers`
--
ALTER TABLE `li_customers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `li_haberler`
--
ALTER TABLE `li_haberler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `li_iletisim`
--
ALTER TABLE `li_iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `li_logs`
--
ALTER TABLE `li_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `li_members`
--
ALTER TABLE `li_members`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `li_pages`
--
ALTER TABLE `li_pages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `li_reklam`
--
ALTER TABLE `li_reklam`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `li_remember`
--
ALTER TABLE `li_remember`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `li_rezervasyon`
--
ALTER TABLE `li_rezervasyon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Tablo için indeksler `li_services`
--
ALTER TABLE `li_services`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `li_sessions`
--
ALTER TABLE `li_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Tablo için indeksler `li_settings`
--
ALTER TABLE `li_settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `li_slider`
--
ALTER TABLE `li_slider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `li_users`
--
ALTER TABLE `li_users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `li_yorum`
--
ALTER TABLE `li_yorum`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `li_auth`
--
ALTER TABLE `li_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Tablo için AUTO_INCREMENT değeri `li_bids`
--
ALTER TABLE `li_bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `li_blog`
--
ALTER TABLE `li_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Tablo için AUTO_INCREMENT değeri `li_boats`
--
ALTER TABLE `li_boats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- Tablo için AUTO_INCREMENT değeri `li_boat_cats`
--
ALTER TABLE `li_boat_cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Tablo için AUTO_INCREMENT değeri `li_categories`
--
ALTER TABLE `li_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;
--
-- Tablo için AUTO_INCREMENT değeri `li_county`
--
ALTER TABLE `li_county`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1162;
--
-- Tablo için AUTO_INCREMENT değeri `li_customers`
--
ALTER TABLE `li_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Tablo için AUTO_INCREMENT değeri `li_haberler`
--
ALTER TABLE `li_haberler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Tablo için AUTO_INCREMENT değeri `li_iletisim`
--
ALTER TABLE `li_iletisim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `li_logs`
--
ALTER TABLE `li_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;
--
-- Tablo için AUTO_INCREMENT değeri `li_members`
--
ALTER TABLE `li_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97869188;
--
-- Tablo için AUTO_INCREMENT değeri `li_pages`
--
ALTER TABLE `li_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- Tablo için AUTO_INCREMENT değeri `li_reklam`
--
ALTER TABLE `li_reklam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `li_remember`
--
ALTER TABLE `li_remember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Tablo için AUTO_INCREMENT değeri `li_rezervasyon`
--
ALTER TABLE `li_rezervasyon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `li_services`
--
ALTER TABLE `li_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;
--
-- Tablo için AUTO_INCREMENT değeri `li_settings`
--
ALTER TABLE `li_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `li_slider`
--
ALTER TABLE `li_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Tablo için AUTO_INCREMENT değeri `li_users`
--
ALTER TABLE `li_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- Tablo için AUTO_INCREMENT değeri `li_yorum`
--
ALTER TABLE `li_yorum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
