-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Kas 2023, 18:21:16
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cevirimanga`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `kullaniciAdi` varchar(50) NOT NULL,
  `sifre` varchar(50) NOT NULL,
  `eklenenBolumSayisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `kullaniciAdi`, `sifre`, `eklenenBolumSayisi`) VALUES
(1, 'Enes Burak Dikici', 'sifremNeOlsaBenBilicemKiZaten2019', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolum`
--

CREATE TABLE `bolum` (
  `id` int(11) NOT NULL,
  `adi` varchar(70) NOT NULL,
  `ikinciAdi` varchar(70) NOT NULL,
  `bolumAdi` varchar(70) NOT NULL,
  `bolumSayisi` double NOT NULL,
  `resimLinki` varchar(300) NOT NULL,
  `eklenmeTarihi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `bolum`
--

INSERT INTO `bolum` (`id`, `adi`, `ikinciAdi`, `bolumAdi`, `bolumSayisi`, `resimLinki`, `eklenmeTarihi`) VALUES
(1, 'Chainsaw Man', '', 'Köpek ve Testere', 1, '', '2023-11-14 15:35:45'),
(2, 'Chainsaw Man', '', 'Pochita\'nın Olduğu Yer', 2, '', '2023-11-14 15:36:09'),
(3, 'Chainsaw Man', '', 'Tokyo\'ya Varış', 3, '', '2023-11-14 15:36:37'),
(4, 'Jujutsu Kaisen', '', 'Kör Edici Karanlık', 0.1, '', '2023-11-14 23:44:15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `manga`
--

CREATE TABLE `manga` (
  `id` int(11) NOT NULL,
  `adi` varchar(70) NOT NULL,
  `ikinciAdi` varchar(70) NOT NULL,
  `konusu` varchar(2000) NOT NULL,
  `puani` varchar(4) NOT NULL,
  `durumu` varchar(12) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `eklenmeTarihi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `manga`
--

INSERT INTO `manga` (`id`, `adi`, `ikinciAdi`, `konusu`, `puani`, `durumu`, `kategori`, `eklenmeTarihi`) VALUES
(1, 'Chainsaw Man', '', '    Denji\'nin basit bir hayali vardır; sevdiği kızla vakit geçirerek mutlu ve huzurlu bir hayat yaşamak. Ancak Denji, yakuza tarafından ezici borçlarını ödemek için şeytanları öldürmeye zorlandığından, bu gerçeklerden çok uzaktır. Evcil şeytanı Pochita\'yı bir silah olarak kullanan Denji, biraz para için her şeyi yapmaya hazırdır.\r\n\r\n    Ne yazık ki, yararlılığını yitirmiştir ve yakuza ile anlaşmalı bir şeytan tarafından öldürülür. Ancak olayların beklenmedik bir şekilde gelişmesiyle Pochita, Denji\'nin ölü bedeniyle birleşir ve ona bir testere şeytanının güçlerini bahşeder. Artık vücudunun bazı kısımlarını testereye dönüştürebilen Denji, yeni yeteneklerini düşmanlarını hızla ve acımasızca yok etmek için kullanır. Olay yerine gelen resmi şeytan avcılarının dikkatini çeker ve Kamu Güvenliği Bürosu\'nda onlardan biri olarak çalışması teklif edilir. Artık en zorlu düşmanlarla bile yüzleşebilecek olan Denji, basit gençlik hayallerine ulaşmak için hiçbir şeyden vazgeçmeyecektir.', '8.74', 'Devam ediyor', 'Aksiyon, Ödüllü, Doğaüstü', '2023-11-14 15:26:04'),
(3, 'Jujutsu Kaisen', '', '    Gözlerden uzakta, asırlardır süregelen bir çatışma devam ediyor. \"Lanetler\" olarak bilinen doğaüstü canavarlar gölgelerden insanlığa terör estirmekte ve \"Jujutsu\" büyücüleri olarak bilinen güçlü insanlar onları yok etmek için mistik sanatlar kullanmaktadır. Lise öğrencisi Yuuji Itadori, efsanevi Lanet Sukuna Ryoumen\'in kurumuş bir parmağını bulduğunda, kendini bir anda bu kanlı çatışmaya katılırken bulur.\r\n\r\n    Parmağın gücünden etkilenen bir Lanet tarafından saldırıya uğrayan Yuuji, kendini korumak için pervasızca bir karar verir ve bu süreçte Lanetlerle savaşma gücü kazanır ama aynı zamanda farkında olmadan kötü niyetli Sukuna\'yı bir kez daha dünyaya salar. Yuuji Sukuna\'yı kontrol edip kendi bedenine hapsedebilse de, Jujutsu dünyası Yuuji\'yi yok edilmesi gereken tehlikeli, üst düzey bir Lanet olarak sınıflandırır.\r\n\r\n    Gözaltına alınan ve ölüm cezasına çarptırılan Yuuji, Jujutsu Lisesi\'nde öğretmen olan Satoru Gojou ile tanışır ve Gojou, idamının yaklaşmasına rağmen onun için bir alternatif olduğunu açıklar. Sukuna için nadir bir araç olan Yuuji ölürse, Sukuna da yok olacaktır. Bu nedenle, Yuuji Sukuna\'nın diğer kalıntılarını tüketirse, Yuuji\'nin müteakip infazı kötü niyetli iblisi gerçekten ortadan kaldıracaktır. Dünyayı daha güvenli hale getirmek ve hayatını biraz daha uzun yaşamak için bu şansı değerlendiren Yuuji, Tokyo Prefectural Jujutsu Lisesi\'ne kaydolur ve sert ve acımasız bir savaş alanına balıklama atlar.', '8.53', 'Devam ediyor', 'Aksiyon, Doğaüstü', '2023-11-15 01:43:15'),
(7, 'One Punch Man', '', '    Üç yıl boyunca sıkı bir eğitimden geçen sıradan Saitama, herkesi ve her şeyi tek bir yumrukla alt etmesini sağlayan muazzam bir güç kazanmıştır. Yeni yeteneğini bir kahraman olarak iyi bir şekilde kullanmaya karar verir. Ancak canavarları kolayca alt etmekten kısa sürede sıkılır ve kahraman olma kıvılcımını geri getirmek için birinin ona meydan okumasını ister.\r\n\r\n    Saitama\'nın inanılmaz gücüne tanık olan bir cyborg olan Genos, Saitama\'nın çırağı olmaya kararlıdır. Bu süre zarfında Saitama, Kahramanlar Birliği\'nin bir parçası olmadığı için ne hak ettiği takdiri gördüğünü ne de insanlar tarafından tanındığını fark eder. İtibarını artırmak isteyen Saitama, Genos\'u öğrencisi olarak yanına alması karşılığında Genos\'un kendisine kaydolmasını sağlamaya karar verir. İkili birlikte, güçlü düşmanlar bulmayı ve bu süreçte saygı kazanmayı umarak gerçek kahramanlar olma yolunda ilerlemeye başlar', '8.75', 'Devam ediyor', 'Aksiyon, Komedi', '2023-11-16 14:41:24');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bolum`
--
ALTER TABLE `bolum`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `bolum`
--
ALTER TABLE `bolum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `manga`
--
ALTER TABLE `manga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
