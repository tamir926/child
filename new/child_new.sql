-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2022 at 07:31 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poppy`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(6) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(1) NOT NULL,
  `forum_id` int(4) NOT NULL,
  `customer` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `forum_id`, `customer`, `reply`, `text`) VALUES
(1, 5, '7', '', ''),
(2, 5, '7', '', 'Байнаа байна'),
(3, 5, '7', '', 'Байнаа байна'),
(4, 5, '7', '', 'Байнаа байна'),
(5, 4, '7', '', 'Bi bas bnaa.'),
(6, 4, '7', '', 'Bi bas bnaa.'),
(7, 4, '7', '', 'Bi bas bnaa.'),
(8, 4, '7', '6', 'Bi bas bnaa.');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(6) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star` int(1) NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `image`, `star`, `about`, `tel`) VALUES
(1, 'Бурмаа', '', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc libero ipsum, ultrices id leo quis, ornare rutrum tellus. Quisque aliquam lobortis risus, a sollicitudin quam facilisis convallis. Fusce convallis velit ac vestibulum pellentesque. In at sagittis turpis. Vestibulum porttitor, erat sit amet lacinia eleifend, mi mi congue ante, non viverra ante ex non risus. Duis eu augue congue, suscipit neque et, feugiat dolor. In ac tincidunt dolor, ac sodales turpis. Curabitur ultrices tellus vitae velit porta, et ornare neque egestas. Mauris gravida, ante at efficitur iaculis, mauris lectus suscipit sapien, vitae elementum tortor tortor vitae ligula. Morbi sed sem eleifend nisl ornare egestas vel vel velit. Suspendisse eget feugiat ante, at semper lacus. Donec ullamcorper felis et malesuada dapibus. Aliquam auctor vulputate velit, in ultrices arcu ultricies a. ', 89161843),
(2, 'Хорлоо', '', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc libero ipsum, ultrices id leo quis, ornare rutrum tellus. Quisque aliquam lobortis risus, a sollicitudin quam facilisis convallis. Fusce convallis velit ac vestibulum pellentesque. In at sagittis turpis. Vestibulum porttitor, erat sit amet lacinia eleifend, mi mi congue ante, non viverra ante ex non risus. Duis eu augue congue, suscipit neque et, feugiat dolor. In ac tincidunt dolor, ac sodales turpis. Curabitur ultrices tellus vitae velit porta, et ornare neque egestas. Mauris gravida, ante at efficitur iaculis, mauris lectus suscipit sapien, vitae elementum tortor tortor vitae ligula. Morbi sed sem eleifend nisl ornare egestas vel vel velit. Suspendisse eget feugiat ante, at semper lacus. Donec ullamcorper felis et malesuada dapibus. Aliquam auctor vulputate velit, in ultrices arcu ultricies a. ', 93433030);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(1) NOT NULL,
  `customer` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `customer`, `text`) VALUES
(2, '7', 'Tselmeg olsood baina'),
(4, '7', ''),
(5, '7', 'Tselmeg olsood baina'),
(6, '7', ''),
(7, '7', ''),
(8, '7', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(6) NOT NULL,
  `surname` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` int(8) NOT NULL,
  `mail` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rd` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` int(3) DEFAULT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_day` int(28) NOT NULL DEFAULT 0,
  `duration` int(12) NOT NULL DEFAULT 0,
  `last_day` int(24) NOT NULL DEFAULT 0,
  `notification` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(164) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crcated` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `surname`, `name`, `tel`, `mail`, `rd`, `weight`, `password`, `full_day`, `duration`, `last_day`, `notification`, `token`, `crcated`) VALUES
(1, 'aagii1', 'aagii2', 90909090, 'aagii@gmail.com', 'er10101010', NULL, '1234', 1, 7, 0, '', 'MN87affc9f7c02408532a1cdd8d3c2685b', 0),
(6, '64', '64', 90909091, 'aagii@gmail.com', 'er10101010', 80, '1234', 1, 12, 12, '1', 'MN5209880b2c60228e5ef91ee58a2b2def', 1),
(7, 'Солир', 'Тамир', 99161843, 'tamir926@yahoo.com', 'УС84092637', 100, '123', 1, 0, 3, '3', 'MN43a50bcbffe9561ab42b60a9fea41c76', 0),
(8, '', 'ts', 80808080, 'ts.hh1@gmail.com', NULL, NULL, '0000', 0, 0, 0, NULL, 'MN14b74a5f6af73450382e922aba93dbc9', 0),
(9, NULL, 'B', 60606060, 'bold@ondo.mn', NULL, NULL, '999', 0, 0, 0, NULL, NULL, 0),
(10, NULL, 'B', 78787878, 'bold@ondo.mn', NULL, NULL, '999', 0, 0, 0, NULL, NULL, 0),
(11, NULL, 'Tamir', 89435053, 'candyfantasty@gmail.com', NULL, NULL, '123456', 15, 6, 18, NULL, 'MNf51a8eeef727071307a857d138615e96', 0),
(12, NULL, 'ts', 99111199, 'tselmegnasanbat123@gmail.com', NULL, NULL, '1234', 0, 0, 0, NULL, 'MNc07a00dacd607c128acb6348a23fa800', 0),
(13, NULL, 'davka', 80182084, 'davaatseren1213@gmail.com', NULL, NULL, '1234', 0, 0, 0, NULL, 'MNc43d8d9f51f5570a5d867c0830488479', 0),
(14, NULL, 'altangerel', 99597246, 'altangerelotis@gmail.com', NULL, NULL, '12345678', 3, 3, 6, NULL, 'MN417027be299629e8b1875da27273954f', 0),
(15, NULL, 'tseegi', 99025768, 'Tsetsegdolgor88@gmail.com', NULL, NULL, 'Tsuu881205', 27, 4, 12, NULL, 'MN5683ad98b2818a2cabcfadfc6722fd74', 0),
(16, NULL, 'goyoo', 99999901, 'test@gmail.com', NULL, NULL, '123456', 7, 6, 27, NULL, 'MNec747ac7c4adbd1a02ede40d39127bbc', 0),
(17, NULL, 'test2', 99999902, 'test2@gmail.com', NULL, NULL, '123456', 0, 0, 0, NULL, 'MN189ea9f50afc925618d7aa9f0a6e39c2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(6) NOT NULL,
  `title` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `discription`, `createdAt`, `updatedAt`) VALUES
(1, 'Хоногт томуугаар хүндэрсэн 50-200 хүүхэд эмнэлэгт хандаж байна', 'https://news.mn/wp-content/uploads/2022/06/nuur-810x500-1-1.jpg', 'Covid-19-ийн хоногт батлагдах тохиолдлын тоо буурсан ч ханиад томуугийн тархалт оргилдоо хүрч буйг эмч мэргэжилтнүүд сануулж буй. Тухайлбал, Монголд томуугийн тархалт 10-12, 3-4 дүгээр сард болдог. Энэ жилийн хаврын дэгдэлт хожуу эхэлсэн. Аймгуудад ч томуугийн тархалт өөр өөр түвшинд ангилагдаж байгаа аж. Дэлхий нийтээр ажиглавал Covid-19-ийн дараах томуугийн өвчлөлийн дүр зураг А хүрээний H3N2 илүү давамгай тархалттай байна. Монгол Улсын хувьд ч ялгаагүй адил байгааг ХӨСҮТ-өөс анхааруулсан. Мөн амьсгалын замын вирусийн өвчлөл бүртгэгдсэн байна. Тиймээс цар тахлын дараа өвөрмөц онцлогтой томуугийн улирал үргэлжилж буйг анхааруулж байгаа юм. Томуугийн тархалттай холбоотой ЭХЭМҮТ-ийн яаралтай тусламжийн тасагт хандах хүүхдүүдийн тоо нэмэгдэж эхэлжээ.\r\n\r\nТодруулбал, сүүлийн гурван сар Эх хүүхдийн эрүүл мэндийн үндэсний төвийн ачаалал нэмэгдсэн байна. Яаралтай тусламж авахаар ирж буй хүүхдүүдийн дийлэнх хувь нь H3N2 томуугийн шинж тэмдэгтэй хүүхдүүд байгаа аж. Энэ нь Covid-19-ийн омикрон хувилбарын шинж тэмдэгтэй төстэй. Гэхдээ 1-3 дугаар сартай харьцуулахад эмнэлгийн ачаалал 25 хувиар буурсан үзүүлэлттэй байна.\r\n\r\n    Долоо хоногт 5000 гаруй хүүхэд, яаралтай тусламжаар 1600-1800 хүүхдэд үйлчилж байна. Үүнийг өдрөөр нь авч үзвэл хоногт 250-450 хүүхэд эмнэлгийн тусламж авахаар хандаж байгаа аж.\r\n\r\nЗургадугаар сараас томуу, томуу төст ханиад хүүхдүүдийн дунд дэгдэлт өндөр болж байна. Өмнөх хоёр жилийн Covid-19-ийн үетэй харьцуулахад буурахгүй, ижил түвшинд байгаа. Эцэг, эхчүүд хүүхдээ олон нийтийн газар дагуулж явах, халдвар хамгааллын дэглэмээ баримтлахгүй байгаагаас үүдэж томуу, томуу төст өвчин дэгдэж байгаа. Цар тахлын давалгаа дууссан гэж иргэд тайвширч болохгүй. Хүүхдийн өвчлөл цаашид ч өсөх эрсдэлтэй байна гэдгийг ЭХЭМҮТ-ийн Эмчилгээ эрхэлсэн дэд захирал Т.Болормаа хэлсэн юм.\r\n\r\nЭХ НЯЛХАСААС ГАДНА ӨРХИЙН ЭМНЭЛГҮҮД Ч АЧААЛАЛТАЙ БАЙНА\r\n\r\nСҮХБААТАР ДҮҮРГИЙН “ЭНХ СҮНДЭР” ӨЭМТ-ИЙН ДАРГА Г.ЭНХТУЯА:\r\n\r\n-Covid-19-өөр өвдсөн, хүүхдүүд нь томуугаар хүндэрсэн гээд эмч ажилчид хомсдолтой байна. Иргэд уцаартай, бухимдалтай харилцаж байгаагаас үүдэж эмч, сувилагчид стресстэх, олон дахин нэг зүйлийг нь тайлбарлаж өгөх, үл ойлголцол гарах гээд бэрхшээл их. Одоо бидэнд тулгамдаж байгаа хамгийн чухал асуудал бол ачаалал. Хүн хүч багатай байгаа ч өрх дээр үндсэн үлэг оношилгоог хийх ёстой. Мөн эрт илрүүлэг эхэлсэн учраас хоёр эмч өдөр бүр сургуулиуд дээр очиж үзлэг хийж байна.\r\n\r\n    Өмнө нь өдрөөс өдөрт Covid-19-ийн тохиолдол ихсч бол одоо томуугийн тархалт эрчимтэй тархаж байна. Уг нь жил бүрийн гуравдугаар сард томуугийн идэвхжилт дуусдаг. Харин энэ жил тавдугаар сараас томуугийн тархалт идэвхжиж байна.\r\n\r\nТиймээс иргэд амны хаалтыг тогтмол зүүх хэрэгтэй. Манай хорооны тухайд нийт 11 мянга гаруй хүн амтай. Үүний тал хувь нь хүүхдүүд. Тавдугаар сар гарснаас хойш 0-17 насныхны дунд томуу, томуу төст өвчин, амьсгалын замын халдварын тохиолдол эрс ихэссэн. Энэ удаагийн томуугийн онцлог нь хүүхдүүд маш хурдан хүндэрч, хатгаа болж байна.\r\n\r\n    Эмнэлэг дээр ирж байгаа хүүхдүүдэд гол төлөв хоолой барих, халуурах шинж тэмдэгтэй байгаа. Хүндэрсэн тохиолдолд бие нь сульдаж, унтаа болох идэвхгүй болох зэрэг шинжүүд ажиглагдаж байна.\r\n\r\nГол төлөв 4-9 насны хүүхдүүд томуугаар хүндрэх нь их байгаа. 10-аас дээш насныхан өвдсөн ч эдгэрэх нь хурдан байгаа гэсэн үг. Гэхдээ энэ нь хүүхдэд олон төрлийн эм өгөөд, анагааж байна гээд гэрээр эмчлэх нь зөв гэж ойлгож болохгүй. Мөн хүүхдүүдээс гадна Covid-19-ийн шинж тэмдэг илэрсэн гээд түргэвчилсэн тест барьж ирж байгаа хүмүүс байна. Бидний зүгээс тестээ аваад ирвэл үзэж өгнө. Гэхдээ ихэнхдээ Covid-19 биш шинэ төрлийн томуугаар өвдсөн байгаа. Бидний зүгээс антибиотик гэхээс илүү халуун уух зүйл хэрэглэж, дархлаагаа сайн дэмжихийг зөвлөж байна.', '2022-06-16 08:49:33', NULL),
(2, 'Харшил эхээс удамших магадлал 70-80 хувьтай байдаг', 'https://news.mn/wp-content/uploads/2017/07/%D1%85%D0%B0%D1%80%D1%88%D0%B8%D0%BB-810x500.jpg', 'Сүүлийн үед монголчууд элдэв янзын харшлаар өвчлөх болсон. Найман сартай хүүхдээс наян настай хөгшин хүртэл харшил тусч байна. Монгол хуурай уур амьсгалтай байдаг нь ургамлын тоос тархаж, харшил үүсэх нөхцлийг бүрдүүлдэг аж. Харшил өвчин нь бидний хүрээлэн буй орчинд тархсан олон төрлийн харшил төрүүлэгч зүйлүүд хамар, нүдний салст бүрхүүл, хоол боловсруулах болон амьсгалын зам, арьсаар нэвтрэн орж, хүний дархлаа тогтоход нөлөөлснөөр тухайн зүйлд хэт мэдрэгшил үүсгэдэг.  Ингэснээр  аливаа нэг зүйлд хүн хэт мэдрэмтгий болж, харшил үүсдэг аж. Манай оронд тоосны харшил, ургамлын гаралтай харшил их тохиолддог талаар эмч мэргэжилтнүүд хэлж байнс.\r\n\r\nМөн  хоол амтлагч зэрэг цочроогч нөлөө ихтэй хоол хүнс, хийжүүлсэн ундаа зэргийг хүнсэндээ их хэрэглэх нь харшлаар өвчлөх магадлалыг нэмэгдүүлдэг аж.\r\n\r\nЗуны улиралд ургамлын тоос тоосонцрын харшил ихэсдэг. Уг өвчин хэрхэн үүсдэг талаар болон эмчилгээ, урьдчилан сэргийлэлтийн талаар “DULGUUNMED” эмнэлгийн арьс харшлын их эмч С.Хулантай ярилцлаа.\r\n\r\n-Манайд ихэвчлэн ямар төрлийн харшлууд тохиолддог вэ?\r\n\r\n-Манай оронд амьсгалын замын харшилд ургамлын тоос тоосонцрын харшлын өвчин, арьсны харшлын өвчнүүдийн хувьд чонон хөрвөс, хордлого харшлын дерматит, нарны харшил зэрэг харшлууд ихэвчлэн тохиолддог. Сүүлийн үед ялангуяа бага насны хүүхдүүдийн дунд чонон хөрвөс  ихээр гарч байна.\r\n\r\n-Харшлын өвчин бүрэн эдгэрдэг талаар иргэдийн дунд эргэлзээтэй асуултууд их гардаг энэ талаар?\r\n\r\n-Харшил нь эдгэрдэг биш эмчлэгддэг өвчин.  Тухайн өвчтөнд ямар нэгэн зовуурь шаналгаагүй, ажил хөдөлмөрөө хэвийн хийх боломжтой. Гэхдээ харшил авсан зүйлтэйгээ ойр байх үед сэдрэх магадлал өндөр байдаг. Тоосны харшилтай хүн тоостой газар очвол харшил хөдөлнө, идэхийг хориглосон хүнсээ идвэл харшил хөдөлнө. Тиймээс үүнийг бүрэн төгс эдгэрсэн гэж тооцох боломжгүй.\r\n\r\n-Харшил улирлын чанартай өвчин гэгддэг. Манай улсад ямар улиралд ихэвчлэн харшил илэрдэг вэ?\r\n\r\n-Хаврын улиралд ургамлын харшлаас сэргийлэх угтах эмчилгээ хийгддэг. Энэ эмчилгээнд хамрагдсанаар ургамлын харшил эрс багасах, хөдлөхгүй байх боломжуудыг олгодог. Тиймээс дархлаа заслын эмчилгээг хаврын улиралд хийнэ. Харин намрын улиралд өвс ногоо хатаж хүмүүсийн ургамлын харшил намддаг учир ургамлын харшлаар үзүүлэх хүний тоо эрс багасдаг.\r\n\r\n-Зуны цагт иргэд ямар харшлаар хамгийн түгээмэл өвчилж байна вэ?\r\n\r\n-Улирлын шинж чанартайгаар манай төв дээр амьсгалын замын харшлын өвчтэй хүмүүс маш ихээр үзүүлж байгаа. Тэр дундаа хог ургамал буюу шарилжны харшилтай хүмүүсийн харшил одоо ид үедээ хөдөлж байгаа. Энэ хүмүүс эмчид үзүүлж, шинж тэмдэг зовууриа хэлээд эмчилгээний аргуудаас тохиромжтойг нь сонгон хэрэглэх хэрэгтэй. Долдугаар сарын 15-наас  есдүгээр сарын 1-ний хугацаанд хүмүүсийн ургамлын харшил хөдлөх шинж тэмдэг нь хамгийн хурц үедээ байдаг.\r\n\r\n-Харшил удамшдаг уу?\r\n\r\n-Харшил удамшдаг. Гэхдээ харшилтай хүн бүрийн хүүхдэд дамждаг гэсэн үг биш. Удамших магадлал 70-80 хувьтай. Ер нь эхийн талыг дагаж удамших магадлалтай байдаг. Ирж үзүүлж буй хүүхдүүдийг судлахад аав, ээжийнх нь аль нэг нь харшлын өвчинтэй, шинж тэмдэгтэй байх нь бий. Тухайлбал, эхчүүд жирэмсэн үедээ харшил өдөөгчийг их хэмжээгээр хэрэглэх юм бол хүүхэд харшилтай төрөх магадлалтай. Энэ тохиолдолд хүүхдийг төрснийх нь дараа эмчийн хяналтад байлгаж, яг ямар харшил давамгайлж байна, түүнд зориулсан эмчилгээ хийлгэх хэрэгтэй. Орчин үед энэ өвчнөөр бага насны хүүхэд их хэмжээгээр өвчилж байгаа. Учир нь бага насны хүүхэд орчны бохирдолд илүү мэдрэг байдгаас гадна сүүлийн жилүүдэд агаарын тоосжилт урьд урьдынхаас илүү нэмэгдэж байгаа. Олдмол харшлын хувьд ихэвчлэн 5-6 насны хүүхдэд анхны шинж тэмдэг илэрдэг.\r\n\r\n-Харшлын шинж тэмдэг илрэх үед иргэд дур мэдэн харшлын эм хэрэглэдэг. Үүний сөрөг нөлөө нь юу вэ?\r\n\r\nЭнэ нь маш буруу.  Ямар оноштой хүн байх, хэдэн настай байх, хөхүүл жирэмсэн эсэх гэдгээс хамаараад эмч эмийн сонголтоо хийдэг. Түүнээс гадна эмийн тунг тааруулах асуудал яригдана. Тиймээс эмчийн зааваргүй эм хэрэглэх нь эрсдэл дагуулж байдаг. Ялангуяа иргэдийн дунд Хлорфенамин эмийг эмчийн зааваргүй хэрэглэх нь түгээмэл болж. Эмчийн зааваргүй хэрэглэх гэж байгаа бол эмийн хайрцаг дээрх заавар зөвлөгөө, хориглох заалтыг шалгаж байж хэрэглэх хэрэгтэй юм', '2022-06-16 08:50:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `tel` int(12) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `tel`, `name`, `email`, `password`) VALUES
(1, 80808080, 'ts', 'ts.hh1@gmail.com', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(4) NOT NULL,
  `shortname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 't' COMMENT ' t-text,i-image,f-file,c-textarea ',
  `update_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='settings';

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `shortname`, `name`, `value`, `description`, `type`, `update_date`) VALUES
(1, 'admin_username', 'Админ нэвтрэх нэр', 'magnate', 'Админ панелд нэвтрэх нууц нэр', 't', '2018-08-05 22:17:24'),
(2, 'admin_pass', 'Админы нууц үг', '123', 'Админ панелд нэвтрэх нууц үг', 't', '2018-08-05 22:18:17'),
(3, 'admin_email', 'Админ мэдэгдэл авах имэйл', 'tamir926@yahoo.com', 'Админ панелд нэвтрэх нууц үг', 't', '2018-08-05 22:19:06'),
(9, 'orders_per_page', 'Нэг удаад харуулах захиалгын тоо', '3', 'Анхны утга 30', 't', '2018-08-08 23:33:08'),
(11, 'admin_avatar', 'Админы зураг', 'uploads/202212/0417416311_thumb.jpg', 'Зурган файлын бүтэн хаяг байна.', 'i', '2018-08-29 08:42:06'),
(21, 'base_url', 'Сайтын байрших хаяг', 'https://starlight-soft.com/mntrux/', 'Сайтын байрших хаяг бүтнээр. Жнь:http://app.nvts.mn/', 't', '2018-09-30 16:59:01'),
(22, 'admin_name', 'Админы нэр', 'Тамир', 'Админы нэр', 't', '2019-08-28 21:09:54'),
(24, 'global_power', 'Системийг зогсоох', '1', 'Системийг зогсоох', 'b', '2019-11-30 03:09:36'),
(26, 'timezone', 'Цагийн бүс', '+8', 'timezone', 't', '2020-01-06 22:22:40'),
(37, 'admin_theme', 'Админы загвар', '0', 'Админы загвар', 't', '2021-03-19 23:24:07'),
(38, 'page_rows', 'Хуудаслалт', '50', 'Нэг хуудсанд харагдах бичиглэл', 't', '2021-06-04 21:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(2) NOT NULL,
  `image` varchar(256) CHARACTER SET latin1 NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `dd` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `image`, `title`, `description`, `link`, `dd`) VALUES
(8, 'uploads/202211/0509192206.jpg', 'Монголын бүтээмжийн төв алсын зайн сургалт', 'mpo-org.mn', 'http://mpo-org.mn', 0),
(9, 'uploads/202211/0510004912.jpg', 'Монголын бүтээмжийн төв сургалт', 'mpo-org.mn', 'http://mpo-org.mn', 1),
(14, 'uploads/202211/0510249972.jpg', '', '', 'http://mpo-org.mn', 2),
(15, 'uploads/202211/0511361071.jpg', '', '', 'http://mpo-org.mn', 3),
(16, 'uploads/202211/0512165354.jpg', '', '', 'http://mpo-org.mn', 4),
(17, 'uploads/202211/0512396087.jpg', '', '', '', 7),
(18, 'uploads/202211/0512523578.jpg', '', '', '', 8),
(19, 'uploads/202211/0513057709.jpg', '', '', '', 9),
(20, 'uploads/202211/0514305975.jpg', '', '', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id` int(6) NOT NULL,
  `doctor_id` int(6) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `timeout` int(1) NOT NULL,
  `payment` int(100) NOT NULL,
  `user_category` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `doctor_id`, `date`, `time`, `customer`, `comment`, `verified`, `timeout`, `payment`, `user_category`, `created_at`) VALUES
(4, 2, '2022-06-10', '15:00', '1', 'Sain baina u emchee.', 0, 0, 0, 0, '2022-06-10 07:43:54'),
(5, 2, '2022-06-10', '16:00', '1', 'Sain baina u emchee.', 0, 0, 0, 0, '2022-06-10 07:43:58'),
(6, 2, '2022-06-10', '18:00', '1', 'Sain baina u emchee.', 0, 0, 0, 0, '2022-06-10 07:44:02'),
(7, 2, '2022-06-10', '19:00', '1', 'Sain baina u emchee.', 0, 0, 0, 0, '2022-06-10 07:44:41'),
(11, 1, '2022-06-10', '08:00', '6', 'Sain baina u emchee.', 0, 0, 0, 0, '2022-06-13 03:24:31'),
(12, 1, '2022-06-10', '08:00', '6', 'Sain baina u emchee.', 0, 0, 0, 0, '2022-06-16 08:28:31'),
(14, 1, '2022-06-10', '08:00', '7', 'Sain baina u emchee.', 0, 0, 0, 0, '2022-06-16 08:30:30'),
(15, 1, '2022-06-10', '08:00', '7', 'Sain baina u emchee.', 0, 0, 0, 0, '2022-06-16 08:30:32'),
(16, 1, '2022-06-10', '08:00', '7', 'Sain baina u emchee.', 0, 0, 0, 0, '2022-06-16 08:30:33'),
(17, 1, '2022-06-10', '08:00', '7', 'Sain baina u emchee.', 0, 0, 0, 0, '2022-06-16 08:32:19'),
(18, 1, '2022-06-10', '08:00', '7', 'Sain baina u emchee.', 0, 0, 0, 0, '2022-06-16 08:32:21'),
(19, 1, '2022-06-10', '08:00', '7', 'Sain baina u emchee.', 0, 0, 0, 0, '2022-06-16 08:32:22'),
(20, 1, '2022-06-10', '08:00', '7', 'Sain baina u emchee.', 0, 0, 0, 0, '2022-06-16 08:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `tutorial_id` int(2) NOT NULL,
  `image` varchar(256) CHARACTER SET latin1 NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `dd` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`tutorial_id`, `image`, `title`, `description`, `link`, `dd`) VALUES
(1, 'uploads/202212/05545586121042022-1650501491-1845187274-1_6Y4t2fx.jpg', 'Тест2', 'Өөрийн сарын тэмдэгийн мөчлөгийг системтэй хөтөлж өөрийн эрүүл мэндээ хянаарай', '#', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_id` (`forum_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tel` (`tel`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `shortname` (`shortname`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`tutorial_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `tutorial_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
