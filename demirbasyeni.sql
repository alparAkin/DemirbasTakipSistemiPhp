-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 May 2024, 19:32:31
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `demirbasyeni`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bilgilerdemirbas`
--

CREATE TABLE `bilgilerdemirbas` (
  `ad` char(50) NOT NULL,
  `soyad` char(50) NOT NULL,
  `sicilnumarasi` int(11) UNSIGNED NOT NULL,
  `unvan` varchar(50) NOT NULL,
  `bolum` varchar(50) NOT NULL,
  `eposta` varchar(90) NOT NULL,
  `oda_numarası` int(11) NOT NULL,
  `ise_baslama_tarihi` date NOT NULL,
  `notlar` varchar(90) NOT NULL,
  `kullaniciadi` varchar(50) NOT NULL,
  `sifre` varchar(27) NOT NULL,
  `marka` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `aciklama` varchar(50) NOT NULL,
  `verildigiTarih` date DEFAULT current_timestamp(),
  `kasaDemirbasNo` int(50) NOT NULL,
  `calisanSicilNo` int(50) NOT NULL,
  `isletimSistemi` varchar(50) NOT NULL,
  `islemciMarkaModel` varchar(50) NOT NULL,
  `ram` int(50) NOT NULL,
  `sabitDiskKapasitesi` int(50) NOT NULL,
  `ekranKarti` varchar(50) NOT NULL,
  `pcModel` varchar(50) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `islemciHizi` int(50) NOT NULL COMMENT 'ghz',
  `cekirdekSayisi` int(50) NOT NULL,
  `monitorBoyutu` int(50) NOT NULL COMMENT 'inç'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `bilgilerdemirbas`
--

INSERT INTO `bilgilerdemirbas` (`ad`, `soyad`, `sicilnumarasi`, `unvan`, `bolum`, `eposta`, `oda_numarası`, `ise_baslama_tarihi`, `notlar`, `kullaniciadi`, `sifre`, `marka`, `model`, `aciklama`, `verildigiTarih`, `kasaDemirbasNo`, `calisanSicilNo`, `isletimSistemi`, `islemciMarkaModel`, `ram`, `sabitDiskKapasitesi`, `ekranKarti`, `pcModel`, `islemciHizi`, `cekirdekSayisi`, `monitorBoyutu`) VALUES
('Alpar', 'Akıns', 11111, 'VFX Artist', 'Director', 'alparakin@gmail.com', 7, '2026-05-14', '', 'alparakin', '123456', 'SONY', 'FX3', 'Cinema Camera', '2026-06-16', 1234567890, 0, 'amd', 'i9', 64, 500, 'tümleşik', 'legion', 4, 3, 23),
('Alper', 'Çağlar', 22222, 'Scriptwriter', 'Director', 'alper@caglararts.com', 10, '2016-05-10', '', 'alpercaglar', '1234567', 'ARRI', 'ALEXA 35', 'Cinema Camera', '2024-05-20', 345678, 0, 'win11', 'i9-13900K', 128, 1, 'tümleşik', 'ASUS PRO ART', 4, 3, 32),
('Koray', 'Birand', 33333, 'Fashion Photographer', 'Production Coordinator', 'koraybirand@gmail.com', 10, '2015-05-07', '', 'koraybirand', '06007', 'FUJIFILM', 'X100VI', 'Camera', '2015-05-08', 999999, 0, 'win11', 'i9-13900K', 128, 1, 'tümleşik', 'ASUS PRO ART', 4, 3, 27),
('Cristopher', 'Nolan', 44444, 'Scriptwriter', 'Director', 'nolan@gmail.com', 11, '2014-05-01', '', 'nolan', '99999', 'RED DIGITAL', 'KOMODO - X', 'Cinema Camera', '2014-05-02', 666666, 0, 'win11', 'i5-12600K', 16, 500, 'tümleşik', 'LENOVO', 4, 3, 24);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bilgilerdemirbas`
--
ALTER TABLE `bilgilerdemirbas`
  ADD PRIMARY KEY (`sicilnumarasi`),
  ADD UNIQUE KEY `eposta` (`eposta`),
  ADD UNIQUE KEY `kullaniciadi` (`kullaniciadi`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bilgilerdemirbas`
--
ALTER TABLE `bilgilerdemirbas`
  MODIFY `sicilnumarasi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
