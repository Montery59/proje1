-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Eki 2019, 16:52:39
-- Sunucu sürümü: 10.4.6-MariaDB
-- PHP Sürümü: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `deneme`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customertable`
--

CREATE TABLE `customertable` (
  `customerid` int(11) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `adress` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `customertable`
--

INSERT INTO `customertable` (`customerid`, `username`, `adress`) VALUES
(1, 'deneme1', 'sifre1'),
(2, 'deneme2', 'sifre2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `custominformation`
--

CREATE TABLE `custominformation` (
  `sid` int(11) NOT NULL,
  `id` int(10) DEFAULT NULL,
  `siparislistesi` varchar(1000) DEFAULT NULL,
  `fiyat` int(10) DEFAULT NULL,
  `indirim` varchar(10) DEFAULT NULL,
  `toplamfiyat` float DEFAULT NULL,
  `bolge` varchar(50) DEFAULT NULL,
  `siparissuresi` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `custominformation`
--

INSERT INTO `custominformation` (`sid`, `id`, `siparislistesi`, `fiyat`, `indirim`, `toplamfiyat`, `bolge`, `siparissuresi`) VALUES
(1, 1, 'Priz', 10, '0', 10, 'Ankara', '2day'),
(2, 2, 'BreadBoard', 5, '0', 5, 'Mersin', '1day');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `electronic devices`
--

CREATE TABLE `electronic devices` (
  `Names` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `number` int(10) NOT NULL,
  `Availability` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `electronic devices`
--

INSERT INTO `electronic devices` (`Names`, `price`, `number`, `Availability`) VALUES
('Priz', 10, 0, 100),
('BreadBoard', 5, 0, 100);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pricetable`
--

CREATE TABLE `pricetable` (
  `customerid` varchar(10) NOT NULL,
  `totalprice` varchar(10) CHARACTER SET utf8 NOT NULL,
  `discount` varchar(10) NOT NULL,
  `Date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `pricetable`
--

INSERT INTO `pricetable` (`customerid`, `totalprice`, `discount`, `Date`) VALUES
('1', '10', '0', '2019-09-27'),
('2', '5', '0', '2019-09-27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `profittable`
--

CREATE TABLE `profittable` (
  `totalsale` varchar(100) DEFAULT NULL,
  `grosssale` varchar(100) DEFAULT NULL,
  `netincome` varchar(100) DEFAULT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `profittable`
--

INSERT INTO `profittable` (`totalsale`, `grosssale`, `netincome`, `startdate`, `enddate`) VALUES
('15', '15', '15', '2019-09-27', '2019-09-27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `regiontable`
--

CREATE TABLE `regiontable` (
  `Region` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Estimatedtime` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `regiontable`
--

INSERT INTO `regiontable` (`Region`, `Estimatedtime`) VALUES
('Mersin', '1Days'),
('Ankara', '2Days'),
('Adana', '1Days'),
('others', '3Days');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `typeordering`
--

CREATE TABLE `typeordering` (
  `orderinglist` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `typeordering`
--

INSERT INTO `typeordering` (`orderinglist`) VALUES
('electronic devices');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `customertable`
--
ALTER TABLE `customertable`
  ADD PRIMARY KEY (`customerid`);

--
-- Tablo için indeksler `custominformation`
--
ALTER TABLE `custominformation`
  ADD PRIMARY KEY (`sid`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `customertable`
--
ALTER TABLE `customertable`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `custominformation`
--
ALTER TABLE `custominformation`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
