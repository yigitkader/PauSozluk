-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 09 May 2018, 08:09:18
-- Sunucu sürümü: 5.6.35
-- PHP Sürümü: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `PauSozluk`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `BASLIK`
--

CREATE TABLE `BASLIK` (
  `ID` int(11) NOT NULL,
  `BASLIK` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `BASLIK_ICERIK` text COLLATE utf8_turkish_ci NOT NULL,
  `YAZAR_ID` int(11) NOT NULL,
  `YAZAR_AD` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `TARIH` date NOT NULL,
  `STAR` int(11) NOT NULL DEFAULT '0',
  `ETIKET` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `BASLIK`
--

INSERT INTO `BASLIK` (`ID`, `BASLIK`, `BASLIK_ICERIK`, `YAZAR_ID`, `YAZAR_AD`, `TARIH`, `STAR`, `ETIKET`) VALUES
(1, 'İlk Gonderi', 'merhaba paü sözlük', 1, '', '2007-05-20', 0, 'paü'),
(2, 'Paüde Bahar Senlikleri', 'Bahar senlikleri baslıyor, ünlü rapci yigit konserdeee!!', 1, '', '2007-05-20', 0, 'sondakika'),
(3, 'DENEME', 'DENEME', 2, 'suleyman', '2007-05-20', 0, 'deneme'),
(4, 'shehehe', 'dhasdasdkas', 1, 'yigit', '2007-05-20', 0, 'lalal'),
(5, 'sadasd', 'dskflsd', 1, 'yigit', '2007-05-20', 0, 'Array'),
(6, 'sadad', 'as', 1, 'yigit', '2007-05-20', 0, 'Array'),
(7, 'dsfdssd', 'sdfdsfds', 1, 'yigit', '2007-05-20', 0, 'Array'),
(11, 'sadad', 'sdsfssd', 1, 'yigit', '2008-05-20', 0, 'dsfsdf'),
(12, 'Yangın cıktı', 'denizlinin orta yerinde yangın', 1, 'yigit', '2008-05-20', 0, 'sondakika'),
(13, 'yeni', 'dsfklsdflsd', 1, 'yigit', '2008-05-20', 0, 'gündem'),
(14, 'sahte alarm', 'sdsfsdfds', 1, 'yigit', '2008-05-20', 0, 'son dakika'),
(15, 'star', 'deneme', 1, 'yigit', '2008-05-20', 5, 'sdsfsd'),
(16, 'dssdf', 'dsfsdfk', 1, 'yigit', '2008-05-20', 32, 'gündem');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `USER`
--

CREATE TABLE `USER` (
  `ID` int(11) NOT NULL,
  `MAIL_ADRES` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `KULLANICI_ADI` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `SIFRE` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `UYE_DURUMU` int(11) NOT NULL DEFAULT '2',
  `RESIM_URL` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `USER`
--

INSERT INTO `USER` (`ID`, `MAIL_ADRES`, `KULLANICI_ADI`, `SIFRE`, `UYE_DURUMU`, `RESIM_URL`) VALUES
(1, 'yigit@gmail.com', 'yigit', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'img-user/-pic-3845.png'),
(2, 'slu@gmail.com', 'suleyman', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'img-user/-pic-4703.jpg');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `BASLIK`
--
ALTER TABLE `BASLIK`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `YAZAR_ID` (`YAZAR_ID`);

--
-- Tablo için indeksler `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `BASLIK`
--
ALTER TABLE `BASLIK`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Tablo için AUTO_INCREMENT değeri `USER`
--
ALTER TABLE `USER`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `BASLIK`
--
ALTER TABLE `BASLIK`
  ADD CONSTRAINT `baslik_ibfk_1` FOREIGN KEY (`YAZAR_ID`) REFERENCES `USER` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
