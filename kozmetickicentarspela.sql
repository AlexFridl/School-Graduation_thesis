-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 01:30 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kozmetickicentarspela`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id_blog` int(125) NOT NULL,
  `naslov_blog` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `text_blog` text COLLATE utf8_unicode_ci NOT NULL,
  `podnaslov_blog` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `putanja_slika_blog` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `postavljeno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id_blog`, `naslov_blog`, `text_blog`, `podnaslov_blog`, `status`, `putanja_slika_blog`, `postavljeno`) VALUES
(1, 'Kucna nega', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet', 1, 'kucna_nega.gif', 1630173915),
(2, 'Higijenski tretman lica', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet', 1, 'tretman_ciscenja_lica.gif', 1629990315),
(3, 'Antiage', 'Starenje ko??e po??inje dosta pre nego ??to mi vidimo prve bore i ostale znakove starenja na ko??i. Znakovi starenja ko??e su pokazatelji da na?? organizam  nije vi??e u stanju da izvr??ava sve funkcije regeneracije, kao ??to je to radio pre. Prvi znak starenja ko??e je nedostatak hidratacije, koji po??inje oko 20 ???te godine, a nakon toga se pojavljuje bez??ivotnost ko??e, koju mo??emo primetiti u samoj boji ko??e lica. Tre??i stadijum starenja je pojava solarnih pega i po??etni pad tonusa ko??e,gubitak ??vrsto??e, pojava prvih mimi??kih linija i nazolabijanih bora koje se vide i bez same mimike lica.  Kao poslednji stadijum starenja ko??e imamo pojavu slojeva ko??e koji ne uspevaju da se obnove. Starenje ko??e je neizbe??no a spoljni uticaji znatno uticu na starenje ko??e, kao ??to su izlaganje suncu UVA i UVB, zracenje plavog svetla(mobilni telefoni, kompjuter...), zagadjenje, Na starenje takodje jako uti??e stres, poreme??aj spavanja, pu??enje. Sve navedeno je okida?? slobodnim radikalima da proizvode oksidativni stres i da se dogadjaju razne degeneracije na strukturama na??e ko??e koji dovode do posledica starenja. Odabir preparata i aparaturnih metoda podmadjivanja odredjujemo za svakog klijenta zasebno na konsultacijama.', 'Starenje ko??e po??inje dosta pre nego ??to mi vidimo prve bore', 1, 'antiage.gif', 1629990315),
(4, 'Tretmani ??i????enja lica', 'Osnova negovane ko??e, le??i u redovnom praktikovanju tretmana ??i????enja,koji predstavljaju deo li??ne higijene lica.Samo ??iste pore mogu da prime aktivne kompronente i preparate ku??ne nege. Ovakvi tretmani podrazumevaju niz postupaka kojim se vr??i dubinsko ??i????enje ko??e. Protokol tretmana prilagodjava se potrebama klijenta u zavisnosti od tipa i stanja ko??e. Klasi??an tretman lica traje sat do sat i po vremena i preporu??ujemo da se radi jednom u mesec dana, u zavisnosti od individualnih potreba ko??e.', 'Osnova negovane ko??e, le??i u redovnom praktikovanju tretmana ??i????enja', 1, 'tretmani_ciscenja_lica.jpg', 1629990315),
(16, 'Vrste pilinga', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo malesuada quam eget tincidunt. Integer dolor tortor, hendrerit id maximus sed, venenatis sed sem. Etiam et vestibulum lectus. Fusce vel nunc ac purus hendrerit venenatis. Mauris a magna condimentum lectus ultrices congue vitae at libero. Vestibulum ut imperdiet odio. Maecenas nec turpis cursus, aliquet elit nec, luctus lacus. Integer volutpat lectus ut dictum fermentum. Sed placerat dui nulla, et mollis diam lacinia eu. Vivamus finibus tincidunt diam, vel pellentesque ante rutrum tincidunt. In hac habitasse platea dictumst. Nunc vel velit nec enim ullamcorper dictum.', 'Lorem ipsum dolor', 1, 'face.gif', 1632256230);

-- --------------------------------------------------------

--
-- Table structure for table `korisniks`
--

CREATE TABLE `korisniks` (
  `id_korisnik` int(11) NOT NULL,
  `korisnicko_ime` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `uloga_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisniks`
--

INSERT INTO `korisniks` (`id_korisnik`, `korisnicko_ime`, `lozinka`, `status`, `uloga_id`) VALUES
(2, 'alex', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(4, 'bloger', 'e10adc3949ba59abbe56e057f20f883e', 1, 2),
(5, 'zaposleni', 'e10adc3949ba59abbe56e057f20f883e', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `podacis`
--

CREATE TABLE `podacis` (
  `id` int(11) NOT NULL,
  `tekst` text COLLATE utf8_unicode_ci NOT NULL,
  `ulica` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `mesto` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `kontakt_tel` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `podaci_slika` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `podacis`
--

INSERT INTO `podacis` (`id`, `tekst`, `ulica`, `mesto`, `kontakt_tel`, `podaci_slika`) VALUES
(1, 'Ko??a je na?? najve??i organ kome je potrebna specifi??na nega, pogotovo u dana??nje vreme kada je zagadjenje sve ve??e i kada su UV zra??enja mnogo intezivnija u poredjenju pre samo par godina. Osim toga ??to ??elimo da na??a ko??a bude lepa, va??no je  razumeti da ko??a obavlja jako veliki spektar prirodnih funkcija koji nas ??tite, kako od spoljnih uticaja, tako i od bolesti . Ko??u moramo svakodnevno i pravilno negovati kako bi postigli ne samo lep izgled vec i unapredili na??e op??te zdravlje, po??ev??i od same higijene do kompleksnijih tretmana zavisno od indikacija ili odredjenih ko??nih bolesti.\r\nOsnovna funkcija ko??a je za??titna i endokrina funkcija, regulacija telesne temperature i hidratacija.Mi se radjamo sa prirodnim antioksidativnim kapacitetom ko??a, koji se sa vremenom smanjuje zbog kiseonika, koji pove??ava na?? oksidativni stres i na?? antioksidativni kapacitet pada. \r\nKo??a, kao najve??i organ na na??em telu deluje na spolja??nje kao i na unutra??nje uticaje, pa prilikom djagnostike i odabira tretmana  uzimamo u obzir mno??tvo faktora poput zdravstvenog stanja klijenta, navika i na??ina ??ivota, stepena izlo??enosti spolja??njim uticajima itd... Prvenstveno radimo na  adekvatnoj nezi ko??e i edukaciji klijenata,  tek nakon toga na estetski zathevnijim tretmanima. Lepa ko??a je negovana ko??a. Kako bi ko??u pravilno negovali moramo imati odredjeno znanje o ko??i, prvenstveno o va??em tipu i stanju ko??e, koje preparate koristiti, u kom redosledu i kada. U na??em salonu dobi??ete neophodno  znanje o va??oj ko??i i u kombinaciji sa redovnim odr??avanjem upozna??ete va??u novu ko??u.', 'Vojislav Vlahovica 10', '11550 Lazarevac', '065/60 35 105', 'spela_beauty6.gif');

-- --------------------------------------------------------

--
-- Table structure for table `slajders`
--

CREATE TABLE `slajders` (
  `id_slajder` int(11) NOT NULL,
  `naslov_slajder` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `putanja_slajder` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `postavljeno` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slajders`
--

INSERT INTO `slajders` (`id_slajder`, `naslov_slajder`, `putanja_slajder`, `postavljeno`, `status`) VALUES
(2, 'Face', 'slajder22.jpg', 1629979284, 1),
(3, 'spela_beauty5', 'spela_beauty1.gif', 1629979284, 1),
(5, 'Naslov', 'slajder23.jpg', 1630414077, 1);

-- --------------------------------------------------------

--
-- Table structure for table `terminis`
--

CREATE TABLE `terminis` (
  `id_termini` int(125) NOT NULL,
  `vreme` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `terminis`
--

INSERT INTO `terminis` (`id_termini`, `vreme`, `status`) VALUES
(1, '9-10', 1),
(2, '10-11', 1),
(3, '11-12', 1),
(4, '12-13', 1),
(5, '13-14', 1),
(6, '14-15', 1),
(7, '15-16\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tip_tretmanas`
--

CREATE TABLE `tip_tretmanas` (
  `id_tt` int(11) NOT NULL,
  `tt_naziv` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `tt_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tip_tretmanas`
--

INSERT INTO `tip_tretmanas` (`id_tt`, `tt_naziv`, `tt_status`) VALUES
(1, 'Tretmani lica', 1),
(2, 'Tretmani tela', 1),
(3, 'Masa??e', 0),
(5, 'Ne??to 1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tretmans`
--

CREATE TABLE `tretmans` (
  `id_tretman` int(11) NOT NULL,
  `t_naziv` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `text_tretman` varchar(6000) COLLATE utf8_unicode_ci NOT NULL,
  `t_status` int(11) NOT NULL,
  `tt_id` int(11) NOT NULL,
  `putanja_slika` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tretmans`
--

INSERT INTO `tretmans` (`id_tretman`, `t_naziv`, `text_tretman`, `t_status`, `tt_id`, `putanja_slika`) VALUES
(1, 'HydraFacial', 'Hydrofacial je najnovija, potpuno neivanzivna procedura ??i????enja,regeneracije i rejuvanacije ko??e. Aparatura koju koristimo u salonu je 2020 godi??te i predstavlja najnoviju tehnologiju u procesu hidradermoabrazije(??i????enje ko??e uz pomo?? pritiska vode). Zahvaljuju??i svojoj jedinstvenoj tehnologiji objedinjuje hidradermoabraziju,hemijski piling,automatizovanu, bezbolnu komedoekspresiju  i hidrataciju ko??e. Zahvaljuju??i vortex tehnologiji u procesu dubinskog ??i????enja ko??e i pra??njenja pora, nema tradicionalnog  manuelnog vadjenja mitisera. \r\nHydrofacial ne podrazumeva samo unapredjivanje izgleda i teksture ko??e, ve?? pobolj??ava kvalitet ko??e u celini. Kao rezultat redovnog konzumiranja hydrofacial tretmana dobijamo ??istu, blistavu i zdravu ko??u.\r\nSam tretman je prijatan, traje sat vremena, nema iritacije ni perioda oporavka, a rezultati su odmah vidljivi.\r\n', 1, 1, 'hidrafacial_tretman.gif'),
(2, 'Higijenski tretman', 'Higijenski tretma lica podrazumeva niz postupaka kojim se vr??i dubinsko ??i????enje ko??e procesom komedoeskspresije. Ovo je takodje prvi tretman koji ??ete uraditi u na??em salonu i kao takav uklju??uje pregled ko??e, dijagnostiku, razgovor o svemu ??to je va??no za tretiranje stanja va??e ko??e. Higijenski tretman baziran je na postupke, kojim se odstranjuju komedoni iz izvodnog kanala lojne ??lede i predstavlja osnovu za zdrave biolo??ke funkcije ,o??uvanja zdravlja i nege ko??e. Obi??no uklju??uje dva pilinga, mehani??ko ??i????enje ko??e i dve maske. Ta??an tok tretmana zavisi od stanja ko??e.', 1, 1, 'higijenski_tretman.jpg'),
(3, 'Tretman ultrazvu??ne ??patule', 'Tretman ultazvu??nom ??patulom predstavlja tretman 2 u 1, gde u jednom tretmanu o??istimo i intezivno nahranimo ko??u. Ko??u uz pomo?? aparata najpre tretiramo ultrazvu??nom  frekvencijom koja na ko??i stvara tanak sloj ozona, a zatim intezivnim ultrazvu??nim vibracijama omogu??ava  ??i????enje komedona, sebuma i svih ostalih ne??isto??a iz pora.Nakon ??i????enja prelazimo na intezivnu ishranu ko??e, apliciraju??i koktele od individualno odabranih sastojkaka koji predstavljaju adekvatan odgovor na va??e trenutno stanje ko??e. ', 1, 1, 'ultrazvucni tretman .jpg'),
(4, 'Mezoterapijski tretmani', 'Mezoterapija je na??in unosa aktivnih supstanci u dublje slojeve ko??a. Aparati sa kojim se izvodi mezoterapija u na??em salonu mogu biti dermapen i  mezogun, kao i neivanzivna mezoterapija bez igle, a odabir tehnike zavisi od stanja i potreba va??e ko??e. \r\nDermapen je jedan od najefikasnijih tretmana u na??em salonu, koji u kombinaciji sa hemijskim pilingom  ili radiotalasnim liftingom daje najbr??e vidljive rezultate u izbolj??avanju kvaliteta stanja ko??e.\r\nMezokokteli koji se koriste u mezoterapiji pripremaju se po individualnim potrebama ko??e, a za njih se koriste mezoserumi renomiranih kozmetolo??kih ku??a poput Eberlina, Fusiona i Mezoestetika.\r\n', 1, 1, 'mezoterapijski_tretmani.jpg'),
(5, 'Hemijski piling', 'Serija dobro odra??enih pilinga mo??e re??iti dugogodi??nje probleme sa hiperpigmentacijama (flekama), aknama, o??iljcima, a koriste se i u svrhu anti-age tretmana (ubla??avanje bora i vra??anje vitalnosti ko??e). Tako??e se mo??e uraditi pojedina??an tretman kao uvod u kompleksnije tretmane lica.\r\nSvrha svih hemijskih pilinga je u osnovi skidanje povr??inskog sloja ko??e ??to omogu??ava bolju hidrataciju i apsorpciju aktivnih sastojaka, tako??e uspostavljanje normalnog pH ko??e. Skidanjem povr??inskog sloja ko??a se regeneri??e, vra??a joj se tonus, ten se ujedna??ava, a nepravilnosti nestaju.\r\nHemijski piling se koristi za:\r\nUklanjanje hiperpigmentacija\r\nIzjedna??avanje tena\r\nLe??enje akni\r\nUbla??avanje o??iljaka\r\nRedukciju finih linija bora\r\nUbla??avanje rozacee\r\nUmirivanje seboroi??nog dermatitisa\r\nPreporu??en broj tretmana zavisi od tipa ko??e, kao i njenog trenutnog stanja, i odre??uje ga kozmetolog. Nakon hemijskog pilinga ko??a mo??e biti crvena i osetljiva.\r\n', 1, 1, 'hemijski_piling.jpg'),
(6, 'Radiotalasni lifting', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo malesuada quam eget tincidunt. Integer dolor tortor, hendrerit id maximus sed, venenatis sed sem. Etiam et vestibulum lectus. Fusce vel nunc ac purus hendrerit venenatis. Mauris a magna condimentum lectus ultrices congue vitae at libero. Vestibulum ut imperdiet odio. Maecenas nec turpis cursus, aliquet elit nec, luctus lacus. Integer volutpat lectus ut dictum fermentum. Sed placerat dui nulla, et mollis diam lacinia eu. Vivamus finibus tincidunt diam, vel pellentesque ante rutrum tincidunt. In hac habitasse platea dictumst. Nunc vel velit nec enim ullamcorper dictum.', 1, 1, 'radiotalasni_lifting.jpg'),
(7, 'HIFU tretman za zatezanje ko??e', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo malesuada quam eget tincidunt. Integer dolor tortor, hendrerit id maximus sed, venenatis sed sem. Etiam et vestibulum lectus. Fusce vel nunc ac purus hendrerit venenatis. Mauris a magna condimentum lectus ultrices congue vitae at libero. Vestibulum ut imperdiet odio. Maecenas nec turpis cursus, aliquet elit nec, luctus lacus. Integer volutpat lectus ut dictum fermentum. Sed placerat dui nulla, et mollis diam lacinia eu. Vivamus finibus tincidunt diam, vel pellentesque ante rutrum tincidunt. In hac habitasse platea dictumst. Nunc vel velit nec enim ullamcorper dictum.', 1, 1, 'HIFU.jpg'),
(8, 'Specijalizovani tretmani', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo malesuada quam eget tincidunt. Integer dolor tortor, hendrerit id maximus sed, venenatis sed sem. Etiam et vestibulum lectus. Fusce vel nunc ac purus hendrerit venenatis. Mauris a magna condimentum lectus ultrices congue vitae at libero. Vestibulum ut imperdiet odio. Maecenas nec turpis cursus, aliquet elit nec, luctus lacus. Integer volutpat lectus ut dictum fermentum. Sed placerat dui nulla, et mollis diam lacinia eu. Vivamus finibus tincidunt diam, vel pellentesque ante rutrum tincidunt. In hac habitasse platea dictumst. Nunc vel velit nec enim ullamcorper dictum.', 1, 1, 'specijalizovani_tretmani.jpg'),
(9, 'Tretmani o??ne regije', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo malesuada quam eget tincidunt. Integer dolor tortor, hendrerit id maximus sed, venenatis sed sem. Etiam et vestibulum lectus. Fusce vel nunc ac purus hendrerit venenatis. Mauris a magna condimentum lectus ultrices congue vitae at libero. Vestibulum ut imperdiet odio. Maecenas nec turpis cursus, aliquet elit nec, luctus lacus. Integer volutpat lectus ut dictum fermentum. Sed placerat dui nulla, et mollis diam lacinia eu. Vivamus finibus tincidunt diam, vel pellentesque ante rutrum tincidunt. In hac habitasse platea dictumst. Nunc vel velit nec enim ullamcorper dictum.', 1, 1, 'tretmani_ocne_regije.jpg'),
(10, 'Casmari tretmani', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo malesuada quam eget tincidunt. Integer dolor tortor, hendrerit id maximus sed, venenatis sed sem. Etiam et vestibulum lectus. Fusce vel nunc ac purus hendrerit venenatis. Mauris a magna condimentum lectus ultrices congue vitae at libero. Vestibulum ut imperdiet odio. Maecenas nec turpis cursus, aliquet elit nec, luctus lacus. Integer volutpat lectus ut dictum fermentum. Sed placerat dui nulla, et mollis diam lacinia eu. Vivamus finibus tincidunt diam, vel pellentesque ante rutrum tincidunt. In hac habitasse platea dictumst. Nunc vel velit nec enim ullamcorper dictum.', 1, 1, 'casmari_tretman.jpg'),
(11, 'Led terapija', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo malesuada quam eget tincidunt. Integer dolor tortor, hendrerit id maximus sed, venenatis sed sem. Etiam et vestibulum lectus. Fusce vel nunc ac purus hendrerit venenatis. Mauris a magna condimentum lectus ultrices congue vitae at libero. Vestibulum ut imperdiet odio. Maecenas nec turpis cursus, aliquet elit nec, luctus lacus. Integer volutpat lectus ut dictum fermentum. Sed placerat dui nulla, et mollis diam lacinia eu. Vivamus finibus tincidunt diam, vel pellentesque ante rutrum tincidunt. In hac habitasse platea dictumst. Nunc vel velit nec enim ullamcorper dictum.', 1, 1, 'spela_beauty6.gif'),
(12, 'Masa??e lica', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo malesuada quam eget tincidunt. Integer dolor tortor, hendrerit id maximus sed, venenatis sed sem. Etiam et vestibulum lectus. Fusce vel nunc ac purus hendrerit venenatis. Mauris a magna condimentum lectus ultrices congue vitae at libero. Vestibulum ut imperdiet odio. Maecenas nec turpis cursus, aliquet elit nec, luctus lacus. Integer volutpat lectus ut dictum fermentum. Sed placerat dui nulla, et mollis diam lacinia eu. Vivamus finibus tincidunt diam, vel pellentesque ante rutrum tincidunt. In hac habitasse platea dictumst. Nunc vel velit nec enim ullamcorper dictum.', 1, 1, 'face.gif'),
(13, 'Pametni paketi ??? kombinovani tretmani lica', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo malesuada quam eget tincidunt. Integer dolor tortor, hendrerit id maximus sed, venenatis sed sem. Etiam et vestibulum lectus. Fusce vel nunc ac purus hendrerit venenatis. Mauris a magna condimentum lectus ultrices congue vitae at libero. Vestibulum ut imperdiet odio. Maecenas nec turpis cursus, aliquet elit nec, luctus lacus. Integer volutpat lectus ut dictum fermentum. Sed placerat dui nulla, et mollis diam lacinia eu. Vivamus finibus tincidunt diam, vel pellentesque ante rutrum tincidunt. In hac habitasse platea dictumst. Nunc vel velit nec enim ullamcorper dictum.', 1, 1, 'pametni_paketi_lica.jpeg'),
(14, 'Aparturni tretmani oblikovanja tela', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo malesuada quam eget tincidunt. Integer dolor tortor, hendrerit id maximus sed, venenatis sed sem. Etiam et vestibulum lectus. Fusce vel nunc ac purus hendrerit venenatis. Mauris a magna condimentum lectus ultrices congue vitae at libero. Vestibulum ut imperdiet odio. Maecenas nec turpis cursus, aliquet elit nec, luctus lacus. Integer volutpat lectus ut dictum fermentum. Sed placerat dui nulla, et mollis diam lacinia eu. Vivamus finibus tincidunt diam, vel pellentesque ante rutrum tincidunt. In hac habitasse platea dictumst. Nunc vel velit nec enim ullamcorper dictum.', 1, 2, 'radiotalasni_lifting_ruku.gif'),
(15, 'Neinvazivni mezoterapijski tretmani tela', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo malesuada quam eget tincidunt. Integer dolor tortor, hendrerit id maximus sed, venenatis sed sem. Etiam et vestibulum lectus. Fusce vel nunc ac purus hendrerit venenatis. Mauris a magna condimentum lectus ultrices congue vitae at libero. Vestibulum ut imperdiet odio. Maecenas nec turpis cursus, aliquet elit nec, luctus lacus. Integer volutpat lectus ut dictum fermentum. Sed placerat dui nulla, et mollis diam lacinia eu. Vivamus finibus tincidunt diam, vel pellentesque ante rutrum tincidunt. In hac habitasse platea dictumst. Nunc vel velit nec enim ullamcorper dictum.', 1, 2, 'neinvanzivni_tretmani_tela.jpg'),
(16, 'Anticelulit program', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo malesuada quam eget tincidunt. Integer dolor tortor, hendrerit id maximus sed, venenatis sed sem. Etiam et vestibulum lectus. Fusce vel nunc ac purus hendrerit venenatis. Mauris a magna condimentum lectus ultrices congue vitae at libero. Vestibulum ut imperdiet odio. Maecenas nec turpis cursus, aliquet elit nec, luctus lacus. Integer volutpat lectus ut dictum fermentum. Sed placerat dui nulla, et mollis diam lacinia eu. Vivamus finibus tincidunt diam, vel pellentesque ante rutrum tincidunt. In hac habitasse platea dictumst. Nunc vel velit nec enim ullamcorper dictum.', 1, 2, 'pakovanja_tela.jpg'),
(17, '\r\nPakovanja tela sa vakum tehnikom i limfnom dren...\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo malesuada quam eget tincidunt. Integer dolor tortor, hendrerit id maximus sed, venenatis sed sem. Etiam et vestibulum lectus. Fusce vel nunc ac purus hendrerit venenatis. Mauris a magna condimentum lectus ultrices congue vitae at libero. Vestibulum ut imperdiet odio. Maecenas nec turpis cursus, aliquet elit nec, luctus lacus. Integer volutpat lectus ut dictum fermentum. Sed placerat dui nulla, et mollis diam lacinia eu. Vivamus finibus tincidunt diam, vel pellentesque ante rutrum tincidunt. In hac habitasse platea dictumst. Nunc vel velit nec enim ullamcorper dictum.', 1, 2, 'pakovanja_tela.jpg'),
(18, 'Pakovanja tela', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo malesuada quam eget tincidunt. Integer dolor tortor, hendrerit id maximus sed, venenatis sed sem. Etiam et vestibulum lectus. Fusce vel nunc ac purus hendrerit venenatis. Mauris a magna condimentum lectus ultrices congue vitae at libero. Vestibulum ut imperdiet odio. Maecenas nec turpis cursus, aliquet elit nec, luctus lacus. Integer volutpat lectus ut dictum fermentum. Sed placerat dui nulla, et mollis diam lacinia eu. Vivamus finibus tincidunt diam, vel pellentesque ante rutrum tincidunt. In hac habitasse platea dictumst. Nunc vel velit nec enim ullamcorper dictum.', 1, 2, 'tretmani_tela.gif'),
(19, 'Masa??e', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo malesuada quam eget tincidunt. Integer dolor tortor, hendrerit id maximus sed, venenatis sed sem. Etiam et vestibulum lectus. Fusce vel nunc ac purus hendrerit venenatis. Mauris a magna condimentum lectus ultrices congue vitae at libero. Vestibulum ut imperdiet odio. Maecenas nec turpis cursus, aliquet elit nec, luctus lacus. Integer volutpat lectus ut dictum fermentum. Sed placerat dui nulla, et mollis diam lacinia eu. Vivamus finibus tincidunt diam, vel pellentesque ante rutrum tincidunt. In hac habitasse platea dictumst. Nunc vel velit nec enim ullamcorper dictum.', 1, 2, 'masaze.jpg'),
(20, 'Pametni paketi ??? kombinovani tretmani tela', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo malesuada quam eget tincidunt. Integer dolor tortor, hendrerit id maximus sed, venenatis sed sem. Etiam et vestibulum lectus. Fusce vel nunc ac purus hendrerit venenatis. Mauris a magna condimentum lectus ultrices congue vitae at libero. Vestibulum ut imperdiet odio. Maecenas nec turpis cursus, aliquet elit nec, luctus lacus. Integer volutpat lectus ut dictum fermentum. Sed placerat dui nulla, et mollis diam lacinia eu. Vivamus finibus tincidunt diam, vel pellentesque ante rutrum tincidunt. In hac habitasse platea dictumst. Nunc vel velit nec enim ullamcorper dictum.', 0, 2, 'pakovanja_tela.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ulogas`
--

CREATE TABLE `ulogas` (
  `id_uloga` int(11) NOT NULL,
  `naziv` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ulogas`
--

INSERT INTO `ulogas` (`id_uloga`, `naziv`, `status`) VALUES
(1, 'admin', 1),
(2, 'bloger', 1),
(3, 'zaposleni', 1);

-- --------------------------------------------------------

--
-- Table structure for table `zakazanos`
--

CREATE TABLE `zakazanos` (
  `id_zakazano` int(250) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datum` int(11) NOT NULL,
  `br_tel` int(11) NOT NULL,
  `tretman_id` int(11) NOT NULL,
  `status_termina` int(11) NOT NULL,
  `termin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zakazanos`
--

INSERT INTO `zakazanos` (`id_zakazano`, `ime`, `prezime`, `email`, `datum`, `br_tel`, `tretman_id`, `status_termina`, `termin_id`) VALUES
(1, 'Aleksandra', 'Fridl', 'bebelak@gmail.com', 2147472000, 69123456, 2, 1, 1),
(3, 'Alex', 'Fridl', 'pera@gmail.com', 1631059200, 692610393, 17, 1, 2),
(6, 'Aleksandra', 'Fridl', 'pera@gmail.com', 1631232000, 692610393, 14, 1, 4),
(8, 'Alex', 'Vesic', 'pera@gmail.com', 1631232000, 692610393, 14, 1, 3),
(10, 'Alex', 'Fridl', 'pera@gmail.com', 1631318400, 692610393, 11, 1, 2),
(11, 'Alex', 'Fridl', 'pera@gmail.com', 1631232000, 692610393, 14, 1, 2),
(12, 'Alex', 'Fridl', 'pera@gmail.com', 1632441600, 692610393, 11, 0, 1),
(13, 'Aleksandra', 'Stevin', 'alex@gmail.com', 1631232000, 692610393, 12, 1, 7),
(15, 'Mladen', 'Jeremic', 'petar@gmail.com', 1631923200, 692610393, 19, 1, 1),
(19, 'Super', 'Mario', 'super@gmail.com', 1631318400, 63123456, 3, 1, 1),
(20, 'Denis', 'Napast', 'denis@gmail.com', 1631318400, 63123456, 12, 1, 7),
(21, 'Alex', 'Fridl', 'petar@gmail.com', 1631318400, 692610393, 17, 1, 6),
(22, 'Alex', 'Vesic', 'pera@gmail.com', 1631577600, 692610393, 4, 1, 1),
(23, 'Mladen', 'Vesic', 'lazar@gmail.com', 1631664000, 692610393, 3, 1, 7),
(24, 'Milica', 'Harizanov', 'alex@gmail.com', 1631577600, 692610393, 10, 1, 2),
(25, 'Mladen', 'Jeremic', 'petar@gmail.com', 1631577600, 692610393, 19, 1, 4),
(26, 'Jelena', 'Jankovic', 'jeca@gmail.com', 1631664000, 69123456, 1, 0, 1),
(28, 'Aleksandra', 'Jeremic', 'bebelak@gmail.com', 1632268800, 692610393, 18, 1, 1),
(29, 'Milica', 'Harizanov', 'lazar@gmail.com', 1632355200, 692610393, 15, 1, 2),
(30, 'Aleksandra', 'Jeremic', 'bebelak@gmail.com', 1632960000, 69123456, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `korisniks`
--
ALTER TABLE `korisniks`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD KEY `uloga_id` (`uloga_id`);

--
-- Indexes for table `podacis`
--
ALTER TABLE `podacis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slajders`
--
ALTER TABLE `slajders`
  ADD PRIMARY KEY (`id_slajder`);

--
-- Indexes for table `terminis`
--
ALTER TABLE `terminis`
  ADD PRIMARY KEY (`id_termini`);

--
-- Indexes for table `tip_tretmanas`
--
ALTER TABLE `tip_tretmanas`
  ADD PRIMARY KEY (`id_tt`);

--
-- Indexes for table `tretmans`
--
ALTER TABLE `tretmans`
  ADD PRIMARY KEY (`id_tretman`),
  ADD KEY `id_tretman` (`tt_id`);

--
-- Indexes for table `ulogas`
--
ALTER TABLE `ulogas`
  ADD PRIMARY KEY (`id_uloga`);

--
-- Indexes for table `zakazanos`
--
ALTER TABLE `zakazanos`
  ADD PRIMARY KEY (`id_zakazano`),
  ADD KEY `id_termini` (`termin_id`),
  ADD KEY `tretman_id` (`tretman_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id_blog` int(125) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `korisniks`
--
ALTER TABLE `korisniks`
  MODIFY `id_korisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `podacis`
--
ALTER TABLE `podacis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slajders`
--
ALTER TABLE `slajders`
  MODIFY `id_slajder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `terminis`
--
ALTER TABLE `terminis`
  MODIFY `id_termini` int(125) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tip_tretmanas`
--
ALTER TABLE `tip_tretmanas`
  MODIFY `id_tt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tretmans`
--
ALTER TABLE `tretmans`
  MODIFY `id_tretman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ulogas`
--
ALTER TABLE `ulogas`
  MODIFY `id_uloga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zakazanos`
--
ALTER TABLE `zakazanos`
  MODIFY `id_zakazano` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisniks`
--
ALTER TABLE `korisniks`
  ADD CONSTRAINT `id_uloga` FOREIGN KEY (`uloga_id`) REFERENCES `ulogas` (`id_uloga`);

--
-- Constraints for table `tretmans`
--
ALTER TABLE `tretmans`
  ADD CONSTRAINT `id_tretman` FOREIGN KEY (`tt_id`) REFERENCES `tip_tretmanas` (`id_tt`);

--
-- Constraints for table `zakazanos`
--
ALTER TABLE `zakazanos`
  ADD CONSTRAINT `id_termini` FOREIGN KEY (`termin_id`) REFERENCES `terminis` (`id_termini`),
  ADD CONSTRAINT `zakazanos_ibfk_1` FOREIGN KEY (`tretman_id`) REFERENCES `tretmans` (`id_tretman`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
