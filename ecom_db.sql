-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2020 at 07:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_image`, `cat_desc`) VALUES
(1, 'Mobile Accesorries', 'http://place-hold.it/800x500', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500'),
(2, 'Example 2', 'http://place-hold.it/800x500', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` double NOT NULL,
  `tran_id` text NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Order Placed',
  `order_date` text NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `tran_id`, `Status`, `order_date`, `username`) VALUES
(154, 697, '22-08-20205f41007ac79cb', 'Order Placed', '22-08-2020 01:24:42 pm', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `short_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL DEFAULT 'https://place-hold.it/320x150/3ec1d5?text=This Is A Replacement Image By Mohit !',
  `full_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_description`, `short_desc`, `product_image`, `full_image`) VALUES
(14, 'nasjkg f Kitha ', 1, 675, 34, ' mskeh fgjbnfdjcb🙏🏻', 'asyhejdnsbvcnm,h', 'fullscreen.jpg', ''),
(16, 'demo1', 2, 22, 52, 'Product Descrption', 'Short Description', '', ''),
(17, 'Demo 2', 1, 14, 0, 'Product Description', 'Short Description', 'fullscreen.jpg', ''),
(18, 'dummy product', 2, 33, 24, 'product Description', 'Product Description', 'Camera Logon.png', ''),
(20, 'ertghogfdsahj', 2, 676, 346, 'teyruhlikj', 'tryuohgfgchvm,n;oiutyrsfgbnkhlytrytsgxnm,lpotiurdh', 'fullscreen.jpg', ''),
(21, 'ayntcghnsn', 1, 41, 11, 'qetrehtf', 'qwteyruyjfgg', 'fullscreen.jpg', ''),
(22, 'test', 2, 20, 17, 'ppoiuytrewqlkjhgfdsa,mnbvcx', 'qwertyuiopasdfghjklmnbvcx', 'Data Flow Diagram_ Level 1.png', ''),
(23, 'qweuytgnb d', 2, 22, 10, 'ejahrscefbgvniu4levtyrgc', 'waetdbgfcnevuis', 'fullscreen.jpg', ''),
(27, 'svgtbrscefai', 1, 364, 235647, 'wevbtrcn db', 'bvyetrucm bjnh', 'fullscreen.jpg', ''),
(36, 'jsdha cvg', 1, 45643, 345, 'viwaeyn ', 'vsir', 'fullscreen.jpg', ''),
(39, 'Demo 9', 1, 17, 13, 'This is A Demo Product This trial is done So that Move Uploaded file Function can Be Checked And Comfirmed\\r\\n', 'hfgyerkljfhjublkjfdhjbilhjrsrkfubykdtr,hgoi;vurfibym;isdrutbghnbrd,vitlgunbtbtiunjhgrmorfvmiusrytub,tyuhmnjgfgd.o;sfoikvckutcnygvmse.lduvtnerunbmyhudvhrtgp/es.jbhynisrmby,jvivngreyh;tpmiufdskghbkljk d/;kfnhjdvkujrynmtgv djmfvuydiogjk,ilbenhrytgia ievdu', 'logo.png', ''),
(40, 'j gaeshfgh', 1, 31, 14, 'sdjf wckneuSRHBvfwaecsirhvf', 'aweutrg4jyetsdgnfkursdautjf', 'oie_transparent.png', ''),
(41, 'ygewe eiuj', 1, 48, 20, 'wgyugdjheg ujwhduiwhdkw  uhdueiwhjb uheduhkjende', 'wtuqghjwuwju whhwuhqwuw hwuhuwqhwujn hwuhqwuwjn uwywujqhwgfd hiyhbvdhuwi huhwnwbw', 'TOC online assessment.docx', ''),
(42, 'ysehnsdy ', 1, 45, 14, 'dsjhsdnmg ueubwekjgeje udjjdehjse djjsisdjkd', 'ewdtr bdryruf b5turfe rgtfhtjhn rtytdre ytuujytt bjdjeij jwihhw hwhehe hwahwnwjnehj jhfuehwb  hdewuhuh huhdbd', 'TOC online assessment.docx', ''),
(43, 'mobile', 1, 3500, 14, 'ygasbjah uwhshwnj hwugwuh gwygjvsabbh gygwuwhuhw gygbsa', 'wtgwhtyw hwujwuyw ywhuwbv hwuhjw uhuuwwuyub  yugswuwhuw ywgybwbwhwh wggwuwhj ', 'CNS online assessment.docx', ''),
(44, 'eudj uh', 1, 34, 26, 'wyewhjey uwjshnw uwekwioqbwjb  hsuhnahb', 'wsywehegdhy uwgyuwhw uytyfhjgujui utytgiijugh hvbmcvzzaq', 'logo-via-logohub.svg', ''),
(45, 'fvnvvxhg', 1, 36, 16, 'syhsf ysrhsawya usahasnv poijh gygbsgs hsusahbbas', 'syshss shsajbsa sygshasy uhsgssj gusgshsjh ysbsahabwabuss hsuhsusdjdsj huhuhhsj husahusah', 'desktop.ini', ''),
(46, 'eiuhehds', 1, 97, 13, 'edsuhsu hieoiwwij  duhsj hdsuhjdshus sdhudhsjsd hsduhd', 'dsdsyg ushdj hsuhdjsdngn gushuhsb ushdus gud udshbsdbds good hwushng', 'desktop.ini', ''),
(47, 'gdehjg iwjdiej', 1, 23, 37, 'eyeh jwhdwk shdihd hdhwh hwausw hshsd hsuhh', 'asshgab uhsjanas hsuahjas sajnjsdnjs jshxjsajs jshshsj hsuh  ushjasjasnshd hsjsn', 'desktop.ini', ''),
(49, 'demo 5', 1, 223, 12, 'vhktrujgbviuhnye4ksytviwavmuyurmue,wcuetunybu5drc5vf.94wuitviu34yituybsergiuvosadf,jiucetyniorfujmbusgvmursidutg', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'logo-via-logohub.png', ''),
(50, 'demo 6', 2, 123.656, 12, 'vhktrujgbviuhnye4ksytviwavmuyurmue,wcuetunybu5drc5vf.94wuitviu34yituybsergiuvosadf,jiucetyniorfujmbusgvmursidutg', 'vhktrujgbviuhnye4ksytviwavmuyurmue,wcuetunybu5drc5vf.94wuitviu34yituybsergiuvosadf,jiucetyniorfujmbusgvmursidutg', 'https://place-hold.it/320x150/3ec1d5?text=This Is A Replacement Image By Mohit !', 'fullscreen.jpg'),
(51, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(52, 'demo 8', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(53, 'demo 8', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(54, 'demo 9', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(55, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(56, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(57, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(58, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(59, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(60, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(61, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(62, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(63, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(64, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(65, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(66, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(67, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(68, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(69, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(70, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(71, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(72, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(73, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(74, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(75, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(76, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(77, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(78, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(79, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(80, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(81, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(82, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(83, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(84, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(85, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(86, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(87, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(88, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(89, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(90, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(91, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(92, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(93, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(94, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(95, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(96, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(97, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(98, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(99, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(100, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(101, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(102, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(103, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(104, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(105, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(106, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(107, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(108, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(109, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(110, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(111, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(112, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(113, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(114, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(115, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(116, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg'),
(117, 'demo 7', 2, 1234, 23, 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'kjfdvgtuileryhuigbyhnirudyhgibuyrgtmuyhvureytiascu,reyvntu4eituhuewoiyunb', 'fullscreen.jpg', 'fullscreen.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `product_id`, `order_id`, `product_price`, `product_quantity`, `product_title`) VALUES
(101, 14, 154, 675, 1, 'nasjkg f Kitha '),
(102, 16, 154, 22, 2, 'demo1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `user_image` varchar(500) NOT NULL DEFAULT 'https://place-hold.it/320x150/3ec1d5?text=This Is A Replacement Image By Mohit !	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `user_image`) VALUES
(2, 'admin', 'admin', 'admin@mohithmarketing.com', 'https://place-hold.it/320x150/3ec1d5?text=This Is A Replacement Image By Mohit !	'),
(3, 'test', '12345', 'test@123.com', 'apple-icon.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
