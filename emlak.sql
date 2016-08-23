-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 Ağu 2016, 21:33:43
-- Sunucu sürümü: 5.6.25
-- PHP Sürümü: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `emlak`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `emlak`
--

CREATE TABLE IF NOT EXISTS `emlak` (
  `emlakID` int(11) NOT NULL,
  `ilan_baslik` varchar(233) COLLATE utf8_turkish_ci NOT NULL,
  `ilan_adres` varchar(233) COLLATE utf8_turkish_ci NOT NULL,
  `il_id` int(11) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `emlak`
--

INSERT INTO `emlak` (`emlakID`, `ilan_baslik`, `ilan_adres`, `il_id`, `lat`, `lng`, `date`) VALUES
(26, 'Mudanyada Satılık Arsa', 'Güzelyalı Mahallesi', 16, 40.350960, 28.917500, '2016-08-23 19:30:06'),
(27, 'Eskişehirde Satılık Ev', 'eskişehir ', 16, 39.798676, 30.483135, '2016-08-23 19:30:42'),
(28, 'Konyada Arazi', 'Konya Karaman..', 16, 38.003723, 32.710270, '2016-08-23 19:33:12');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `emlak`
--
ALTER TABLE `emlak`
  ADD PRIMARY KEY (`emlakID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `emlak`
--
ALTER TABLE `emlak`
  MODIFY `emlakID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
