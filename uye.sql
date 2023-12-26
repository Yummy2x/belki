-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 Mar 2016, 22:30:54
-- Sunucu sürümü: 5.5.27
-- PHP Sürümü: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `vt_emlak`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye`
--

CREATE TABLE IF NOT EXISTS `uye` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `uye`
--

INSERT INTO `uye` (`id`, `kullanici`, `sifre`) VALUES
(1, 'admin', 123);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
