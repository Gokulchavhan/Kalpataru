-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2019 at 09:54 PM
-- Server version: 10.1.38-MariaDB-0+deb9u1
-- PHP Version: 7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kalpataru_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `profile_picture` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `approve` tinyint(4) NOT NULL DEFAULT '0',
  `validation_code` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `profile_picture`, `password`, `approve`, `validation_code`, `date_time`) VALUES
(1, 'Subrata', 'Das', 'subratadas606@gmail.com', 'b32271b511b02eac6a6e2074d761feac.jpg', 'fcea920f7412b5da7be0cf42b8c93759', 5, '132436', '0000-00-00 00:00:00'),
(5, 'Sitaram', 'Das', 'sitaramdas84@gmail.com', '', 'd581148af60f9babf8ac259b3b47c933', 1, '0', '2019-04-20 20:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `assign_service`
--

CREATE TABLE `assign_service` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `service_status` tinyint(4) NOT NULL DEFAULT '0',
  `city_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_service`
--

INSERT INTO `assign_service` (`id`, `service_id`, `city_id`, `date_time`, `status`, `service_status`, `city_status`) VALUES
(1, 4, 1, '2019-05-02 00:00:00', 0, 0, 0),
(2, 5, 1, '2019-05-02 00:00:00', 0, 0, 0),
(3, 1, 1, '2019-05-02 00:00:00', 0, 0, 0),
(4, 2, 1, '2019-05-02 00:00:00', 0, 0, 0),
(5, 6, 1, '2019-05-02 00:00:00', 0, 0, 0),
(6, 9, 1, '2019-05-02 00:00:00', 0, 0, 0),
(7, 8, 1, '2019-05-02 00:00:00', 0, 0, 0),
(8, 3, 1, '2019-05-02 00:00:00', 0, 0, 0),
(9, 7, 1, '2019-05-02 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assign_service_category`
--

CREATE TABLE `assign_service_category` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `city_status` tinyint(4) NOT NULL DEFAULT '0',
  `assign_service_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_service_category`
--

INSERT INTO `assign_service_category` (`id`, `service_id`, `city_id`, `name`, `date_time`, `status`, `city_status`, `assign_service_status`) VALUES
(1, 1, 1, 'Carpet Cleaning', '2019-05-02 00:00:00', 0, 0, 0),
(2, 1, 1, 'Sofa Cleaning', '2019-05-02 00:00:00', 0, 0, 0),
(3, 1, 1, 'Bathroom Deap Cleaning', '2019-05-02 00:00:00', 0, 0, 0),
(4, 1, 1, 'Home Deep cleaning', '2019-05-02 00:00:00', 0, 0, 0),
(5, 1, 1, 'Kitchen Deep Cleaning', '2019-05-02 00:00:00', 0, 0, 0),
(6, 4, 1, 'AC Service and Repair', '2019-05-02 00:00:00', 0, 0, 0),
(7, 4, 1, 'Refrigerator Repair', '2019-05-02 00:00:00', 0, 0, 0),
(8, 4, 1, 'Washing Machine Repair', '2019-05-02 00:00:00', 0, 0, 0),
(9, 4, 1, 'Microwave Repair', '2019-05-02 00:00:00', 0, 0, 0),
(10, 3, 1, 'Leak Repair', '2019-05-02 00:00:00', 0, 0, 0),
(11, 3, 1, 'Toilet Repair', '2019-05-02 00:00:00', 0, 0, 0),
(12, 3, 1, 'Garbage Disposal Repair', '2019-05-02 00:00:00', 0, 0, 0),
(13, 3, 1, 'Water Heater Services', '2019-05-02 00:00:00', 0, 0, 0),
(14, 3, 1, 'Sewer Repair', '2019-05-02 00:00:00', 0, 0, 0),
(15, 2, 1, 'Switch/Outlet', '2019-05-02 00:00:00', 0, 0, 0),
(16, 2, 1, 'New Device', '2019-05-02 00:00:00', 0, 0, 0),
(17, 2, 1, 'Light Fixture', '2019-05-02 00:00:00', 0, 0, 0),
(18, 2, 1, 'Keyless Light Fixture', '2019-05-02 00:00:00', 0, 0, 0),
(19, 2, 1, 'Door Bell Transformer', '2019-05-02 00:00:00', 0, 0, 0),
(20, 2, 1, '120V Stack Switch', '2019-05-02 00:00:00', 0, 0, 0),
(21, 2, 1, 'UL Brace Electricaox', '2019-05-02 00:00:00', 0, 0, 0),
(22, 9, 1, 'Residential Painting Service', '2019-05-02 00:00:00', 0, 0, 0),
(23, 9, 1, 'Bungalow Painting Services', '2019-05-02 00:00:00', 0, 0, 0),
(24, 9, 1, 'Wall Painting Service', '2019-05-02 00:00:00', 0, 0, 0),
(25, 2, 1, 'Interior and Exterior Painting Service', '2019-05-02 00:00:00', 0, 0, 0),
(26, 2, 1, 'Ceiling Painting Service', '2019-05-02 00:00:00', 0, 0, 0),
(27, 9, 1, '3D Wall Painting Services', '2019-05-02 00:00:00', 0, 0, 0),
(28, 7, 1, 'Change the engine oil', '2019-05-02 00:00:00', 0, 0, 0),
(29, 7, 1, 'Replace the oil filter,the air filter,the fuel filter,  the cabin filter,  the spark plugs.', '2019-05-02 00:00:00', 0, 0, 0),
(30, 7, 1, 'Check for any Error codes in the ECU and take corrective action.', '2019-05-02 00:00:00', 0, 0, 0),
(31, 7, 1, 'Check for proper operation of all lights, wipers etc.', '2019-05-02 00:00:00', 0, 0, 0),
(32, 7, 1, 'Check Brake Pads/Liners, Brake Discs/Drums, and replace if worn out.', '2019-05-02 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `city_id` varchar(25) NOT NULL,
  `date_time` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`, `city_id`, `date_time`, `status`) VALUES
(1, 'Durgapur', 'K310319DUR001', '2019-03-31', 0),
(2, 'Asansol', 'K310319ASA002', '2019-03-31', 1),
(3, 'Kolkata', 'K310319KOL003', '2019-03-31', 1),
(4, 'Kharagpur', 'K310319KHA004', '2019-03-31', 1),
(5, 'Midnapure', 'K310319MID005', '2019-03-31', 1),
(6, 'Mumbai City', 'K090419MUM001', '2019-04-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complete_orders`
--

CREATE TABLE `complete_orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `service_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `service_category_id` int(11) NOT NULL,
  `service_price_id` int(11) NOT NULL,
  `service_time_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `m_number` varchar(20) NOT NULL,
  `address` varchar(150) NOT NULL,
  `city` varchar(50) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `card_no` varchar(50) NOT NULL,
  `epr_year` varchar(20) NOT NULL,
  `cvc` varchar(20) NOT NULL,
  `working_duration` varchar(25) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `service_id` varchar(25) NOT NULL,
  `city_id` varchar(25) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `qualification_id` int(11) NOT NULL,
  `identity_id` int(11) NOT NULL,
  `emp_id` varchar(15) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `profile_picture` varchar(50) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `card_no` varchar(50) NOT NULL,
  `card_img_f` varchar(50) NOT NULL,
  `card_img_b` varchar(50) NOT NULL,
  `reg_no` varchar(50) NOT NULL,
  `q_img_f` varchar(50) NOT NULL,
  `q_img_b` varchar(50) NOT NULL,
  `p_img_1` varchar(50) NOT NULL,
  `p_img_2` varchar(50) NOT NULL,
  `p_img_3` varchar(50) NOT NULL,
  `p_img_4` varchar(50) NOT NULL,
  `about` varchar(500) NOT NULL,
  `approve` tinyint(4) NOT NULL DEFAULT '0',
  `validation_code` text NOT NULL,
  `apply_date_time` datetime NOT NULL,
  `date_time` date NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `service_id`, `city_id`, `gender_id`, `qualification_id`, `identity_id`, `emp_id`, `first_name`, `last_name`, `profile_picture`, `birthday`, `mobile_no`, `email`, `card_no`, `card_img_f`, `card_img_b`, `reg_no`, `q_img_f`, `q_img_b`, `p_img_1`, `p_img_2`, `p_img_3`, `p_img_4`, `about`, `approve`, `validation_code`, `apply_date_time`, `date_time`, `password`) VALUES
(1, '6', '1', 1, 10, 2, 'KT030519GEY001 ', 'Arup', 'Panda', '', '03/15/1996', '9002510692', 'aruppanda15@gmail.com', 'WPL96584F', 'a5901294915dd5ea96d8ea9c4e47596e.jpg', 'b875a9b460f45c9be6a172e1fa9194e8.jpg', 'MYTRS9658J', 'baebdbc175d1d8866f63bc0eafffa073.jpg', '893782c2235d83cb37b34a13133a3fd2.jpg', '0bbc27c11c7bfa014c79eb38bfbba90a.png', '35983fef88e83c9b740ab207414ba980.png', '7721bc338d5ffffb7f9acf0c850a4034.png', '37d0b86629496cff3f58ebd86345b1b7.png', 'A meeting was convened: no one denied my talents, but no one could gainsay my defects. In a kindly but firm way, my bosses said to me, &ldquo;Sacks, you are a menace in the lab. Why don&rsquo;t you go and see patients&mdash;you&rsquo;ll do less harm.&rdquo; Such was the ignoble beginning of a clinical career.', 0, '', '2019-05-03 00:41:18', '2019-05-03', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, '5', '1', 1, 10, 2, 'KT030519CAR002 ', 'Ramanath', 'Mandal', '', '01/13/1994', '9002494499', 'ramanath784@gmail.com', 'BHK8795R', '5c390f32d5b620fbb8660429450cdf92.jpg', 'a029c022a6a37d07daa5db358425759d.jpg', 'KHL7594P', 'f9f56a416efed2d095feb7060949243d.jpg', '8fd09793cf6efcbc1690476020eefd45.jpg', 'a43017f91dd442f128dd1e6741a13929.png', '6cdf6c5481aa3d515c9f1060a2aa03f7.png', '1375eb4feb4b3f2cab46c35fceaa7f25.png', '5e7d7d79dcfab76596779a651261f02b.png', 'A meeting was convened: no one denied my talents, but no one could gainsay my defects. In a kindly but firm way, my bosses said to me, &ldquo;Sacks, you are a menace in the lab. Why don&rsquo;t you go and see patients&mdash;you&rsquo;ll do less harm.&rdquo; Such was the ignoble beginning of a clinical career.', 0, 'SExPYAKN', '2019-05-03 00:41:20', '2019-05-03', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, '4', '1', 1, 10, 4, 'KT030519APP003 ', 'Amiya', 'Maity', '7ebbbeb0839b6d465dab2f9078ed1e6d.jpg', '08/24/1995', '7407172834', 'amiyamaity23@gmail.com', 'WB1765O', 'd3c704bedc1cd5f5c92397404bc27dd2.jpg', '26ca17c26acb23915a0d71d6dd518b61.jpg', 'MCA26578L', '757fcc474886a6e5467fc36614c98480.jpg', '353e4436d06337fefe2e262bced1d6a3.jpg', 'e1af6ba161b7f72123f06e2cb21ea91a.png', '29f79cc69e5aea0ed52431ea35161497.png', '4735c284f34d82cadcab14f0c6da40a8.png', '3819629d1b3f9afaef6e10d6527a4876.png', 'A meeting was convened: no one denied my talents, but no one could gainsay my defects. In a kindly but firm way, my bosses said to me, &ldquo;Sacks, you are a menace in the lab. Why don&rsquo;t you go and see patients&mdash;you&rsquo;ll do less harm.&rdquo; Such was the ignoble beginning of a clinical career.', 0, '', '2019-05-03 00:41:21', '2019-05-03', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, '2', '1', 1, 11, 3, 'KT030519ELE004 ', 'Rajat', 'Chakrabarty', '', '08/08/1995', '9735199398', 'talk2subrata@yahoo.com', 'WB19357P', '3770a14e963e4742709a022309a610fe.jpg', '3f59f42edb4997d05c4566ef6ee203c0.jpg', 'WBUT12365V', 'db1c757f7eb7414f868f82236a7316c9.jpg', '301303b59559c61c3738d5e776709c31.jpg', 'ebd35bf363b06ff4e3de9751fd5291e0.jpg', '62f3df2dcc89bd8c40f495e603f2608c.jpg', 'd72bdd21d1885e5686262bbf02df73ed.jpg', '84e4f5356e78d64394c67fce6a7624a6.jpg', 'A meeting was convened: no one denied my talents, but no one could gainsay my defects. In a kindly but firm way, my bosses said to me, &ldquo;Sacks, you are a menace in the lab. Why don&rsquo;t you go and see patients&mdash;you&rsquo;ll do less harm.&rdquo; Such was the ignoble beginning of a clinical career.', 0, 'o1X4FyKe', '2019-05-03 00:43:22', '2019-05-03', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, '7', '1', 1, 6, 2, 'KT030519VEH005 ', 'Debabrata', 'Maity', '', '10/25/1996', '9851149591', 'debabratamaity108@gmail.com', 'BHK9861M', 'be445d5459840a1148e3717bb7bfbbfa.jpg', '115659f90aaa002cf309ebed18cf2c87.jpg', 'WBUT9875P', '55a71bfd7ca6d0f4b93fbac126d7a8c5.jpg', 'f1d52c5b49ec93022c58e9c38fe9713c.jpg', 'ad56099648d50c3d6181eae17e64c9fe.jpg', '7d9e4a8f23ac7349b74ff747fa32fcf2.jpg', '913a146a46f9643b403a2a8f4cffac03.jpg', 'ff50d178285f475ba3000c95d78ffe67.jpg', 'A meeting was convened: no one denied my talents, but no one could gainsay my defects. In a kindly but firm way, my bosses said to me, &ldquo;Sacks, you are a menace in the lab. Why don&rsquo;t you go and see patients&mdash;you&rsquo;ll do less harm.&rdquo; Such was the ignoble beginning of a clinical career.', 0, '', '2019-05-03 00:43:25', '2019-05-03', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, '7', '1', 1, 7, 4, 'KT030519VEH006 ', 'Santu', 'Jana', 'bbd57c469d2fd7b3ab38b8f1a8ce3f07.jpg', '12/15/1990', '9564561235', 'santujana04@gmail.com', 'WB12345', '036e2cd194d15cdd3e119b5aa1d2045a.jpg', '07a0427a39eb8755995f3ad39c2ee56d.jpg', 'MAKAUT12345', 'ce8a0f12e318b4c27393be7540be20cc.jpg', '1da6f86fe9d40aacb75a6f72f5b6465f.jpg', 'a8c594fe65162bdfb03d003533002ac4.png', '76df5e8ec43b637871ee8df010c2d062.png', '6a35656fa8ace6a517cdb3b3000ff973.png', '348959c3caedb3976e424db3804d31b2.png', 'A meeting was convened: no one denied my talents, but no one could gainsay my defects. In a kindly but firm way, my bosses said to me, &ldquo;Sacks, you are a menace in the lab. Why don&rsquo;t you go and see patients&mdash;you&rsquo;ll do less harm.&rdquo; Such was the ignoble beginning of a clinical career.', 0, '', '2019-05-03 00:43:28', '2019-05-03', '827ccb0eea8a706c4c34a16891f84e7b'),
(7, '9', '1', 1, 10, 3, 'KT030519PAI007 ', 'Kingsukh', 'Roy', '', '01/27/1994', '9932311891', 'talk2subra@gmail.com', '123456789', '299d96ea30b6803e94bb80c32e90b724.jpg', '3425e6f6f1016ac247af6cd2e03a1d81.jpg', '123456', '0b444b789088d558742afb1558b434c7.jpg', '379bd5de789d820670d80ced46d898cb.jpg', '57400994b397fa6a8fdbcb543470a831.jpg', 'c94a5c0a0e7fafc7193efcaefd9391cb.jpg', 'c05f8eaf8697e4252b1c5446c5355c9e.jpg', '293b9a76f1ecc536f3069551a9436036.jpg', 'A meeting was convened: no one denied my talents, but no one could gainsay my defects. In a kindly but firm way, my bosses said to me, &ldquo;Sacks, you are a menace in the lab. Why don&rsquo;t you go and see patients&mdash;you&rsquo;ll do less harm.&rdquo; Such was the ignoble beginning of a clinical career.', 0, '', '2019-05-03 00:43:31', '2019-05-03', '827ccb0eea8a706c4c34a16891f84e7b'),
(8, '2', '1', 1, 10, 2, 'KT030519ELE008 ', 'Sitaram', 'Das', '', '02/03/1995', '8158998582', 'sitaramdas84@gmail.com', '123456789', '0e25e3fe54ef82b82adebb7220812d1e.jpg', 'e4036e1c7e3795328bc25800b7394ec1.jpg', '12345', '8cf687d72dd2cd0172608435f20b5cf6.jpg', '5e501af1ac20d312e8fc1cbc6bd63181.jpg', '05d773ae291cd2a7ce6f3298a134544b.jpg', 'fbe2c1a267bc57ce0c2d2ba5e4ceb57b.jpg', 'd155e26811aaf2d48f1c6652d5d9686a.jpg', 'c7ff9ae211c3b12bd6288db23d4f92a3.jpg', 'A meeting was convened: no one denied my talents, but no one could gainsay my defects. In a kindly but firm way, my bosses said to me, &ldquo;Sacks, you are a menace in the lab. Why don&rsquo;t you go and see patients&mdash;you&rsquo;ll do less harm.&rdquo; Such was the ignoble beginning of a clinical career.', 0, '', '2019-05-03 00:43:33', '2019-05-03', '827ccb0eea8a706c4c34a16891f84e7b'),
(9, '9', '1', 1, 10, 5, 'KT030519PAI009 ', 'Subra', 'Das', '', '01/27/1994', '9932259291', 'subratadasbca@gmail.com', '123456789101', 'd5dcf33dd28484ac96f1a0edc42eb003.jpg', 'a46397d43e2f72affc309b2366d535b4.jpg', '123456', '719cf701dbb0d17606b45fc01c53114c.jpg', 'acdb17bb32b170fa3fe32bc04aefc8fd.jpg', 'ef662c0d588cdc251f9b3f9f6fb5dcc2.jpg', 'fd473c5033ab572ebcec649cdfb79d7d.jpg', 'b79f5eb660f43a1efe1e27baa6756a6f.jpg', 'c3269e0315959674a08f2afee2d84d68.jpg', 'A meeting was convened: no one denied my talents, but no one could gainsay my defects. In a kindly but firm way, my bosses said to me, &ldquo;Sacks, you are a menace in the lab. Why don&rsquo;t you go and see patients&mdash;you&rsquo;ll do less harm.&rdquo; Such was the ignoble beginning of a clinical career.', 0, '0', '2019-05-03 00:43:37', '2019-05-03', 'e10adc3949ba59abbe56e057f20f883e'),
(10, '4', '1', 1, 10, 2, 'KT030519APP010 ', 'Subhasish', 'Neogi', '2399ca94fcde6038482c8f8875515515.jpg', '05/19/1993', '6296983369', 'subhashisneogi19@gmail.com', 'STA1298OP', '70ce7a69e4d8173e5cbf3dd87e5b234c.jpg', 'e44250a797449fb33af606293efac4a6.jpg', 'KHTR5864P', '5d6c683a00f133ef5814fd7cbd47e960.jpg', 'b54c0700de8ede67240f551e22dab16d.jpg', '438b385db9e6cd28def98d316b0dc7aa.jpg', '5326591a7f233046f543f739ae9197a9.jpg', 'd7c26e75df336f573c7e9fcac5df7634.jpg', 'a0c124ce6fd186502eb9f0a8e909632b.jpg', 'A meeting was convened: no one denied my talents, but no one could gainsay my defects. In a kindly but firm way, my bosses said to me, &ldquo;Sacks, you are a menace in the lab. Why don&rsquo;t you go and see patients&mdash;you&rsquo;ll do less harm.&rdquo; Such was the ignoble beginning of a clinical career.', 0, '', '2019-05-03 00:48:35', '2019-05-03', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `employee_request`
--

CREATE TABLE `employee_request` (
  `id` int(11) NOT NULL,
  `service_id` varchar(25) NOT NULL,
  `city_id` varchar(25) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `qualification_id` int(11) NOT NULL,
  `identity_id` int(11) NOT NULL,
  `emp_id` varchar(15) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `card_no` varchar(50) NOT NULL,
  `card_img_f` varchar(50) NOT NULL,
  `card_img_b` varchar(50) NOT NULL,
  `reg_no` varchar(50) NOT NULL,
  `q_img_f` varchar(50) NOT NULL,
  `q_img_b` varchar(50) NOT NULL,
  `p_img_1` varchar(50) NOT NULL,
  `p_img_2` varchar(50) NOT NULL,
  `p_img_3` varchar(50) NOT NULL,
  `p_img_4` varchar(50) NOT NULL,
  `about` varchar(500) NOT NULL,
  `approve` tinyint(4) NOT NULL DEFAULT '0',
  `apply_date_time` datetime NOT NULL,
  `date_time` date NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender_id` varchar(25) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender_id`, `gender`, `status`) VALUES
(1, 'KPT-1565', 'Male', 0),
(2, 'KPT-6755', 'Female', 1),
(3, 'KPT-6333', 'Others', 1);

-- --------------------------------------------------------

--
-- Table structure for table `identity`
--

CREATE TABLE `identity` (
  `id` int(11) NOT NULL,
  `card_name` varchar(50) NOT NULL,
  `date_time` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identity`
--

INSERT INTO `identity` (`id`, `card_name`, `date_time`, `status`) VALUES
(2, 'Pan Card', '2019-03-17', 0),
(3, 'Driver Licence', '2019-03-17', 0),
(4, 'Voter Card', '2019-03-21', 0),
(5, 'Aadhar  Card', '2019-04-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `subject` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `fullname`, `email`, `subject`, `mobile`, `message`, `date_time`, `status`) VALUES
(1, 'Rahul Das', 'rahuldas@gmail.com', 'Add more service', '8158998582', 'I am a student of your department. I won&rsquo;t be able to attend classes for a while as my father is ill and I need to look after him. I promise to cope up with my course. Please allow me leave for &mdash;&mdash; time. I will be very grateful to you.', '2019-05-07 17:18:46', 1),
(2, 'Tapan Pandit', 'pandittapan@gmail.com', 'Add more service category', '9932311891', 'I have written the letter based on your request, hope uncle is doing fine now.\r\n\r\nYou need to mention in the letter\r\n\r\nWhether he is responding well now?\r\nAlso, what kind of problem he has faced yesterday?\r\n\r\nThe aforesaid things, I have mentioned in the letter, \r\nClick below and check yourself', '2019-05-07 17:19:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `service_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `service_category_id` int(11) NOT NULL,
  `service_price_id` int(11) NOT NULL,
  `service_time_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `m_number` varchar(20) NOT NULL,
  `address` varchar(150) NOT NULL,
  `city` varchar(50) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `card_no` varchar(50) NOT NULL,
  `epr_year` varchar(20) NOT NULL,
  `cvc` varchar(20) NOT NULL,
  `working_duration` varchar(25) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `ratting` tinyint(4) NOT NULL DEFAULT '0',
  `comment` tinyint(4) DEFAULT '0',
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `service_id`, `gender_id`, `service_category_id`, `service_price_id`, `service_time_id`, `user_id`, `emp_id`, `f_name`, `l_name`, `email`, `m_number`, `address`, `city`, `landmark`, `postcode`, `card_no`, `epr_year`, `cvc`, `working_duration`, `status`, `ratting`, `comment`, `date_time`) VALUES
(1, '20190503C162', 4, 1, 7, 1, 6, 4, 3, 'Atanu', 'Das', 'atanudas@gmail.com', '09002494499', 'Moyna', 'Tamluk', 'Mayna School', '721445', '12345', '123', '123', '2.3', 1, 1, 1, '2019-05-03 01:00:18'),
(2, '201905039DC1', 4, 1, 7, 1, 5, 3, 10, 'Abhijit', 'Pandit', 'subratadas@gmail.com', '9932311891', 'Purunda', 'Egra', 'Belda railway station', '721445', '12345', '123', '123', '4', 1, 1, 0, '2019-05-03 01:15:46'),
(3, '20190503EDD8', 4, 1, 9, 1, 6, 2, 10, 'Tapan', 'Pandit', 'subratadas@gmail.com', '9932311891', 'Purunda', 'Egra', 'Belda railway station', '721445', '12345', '123', '325', '2.42', 1, 1, 1, '2019-05-03 01:26:50'),
(4, '20190503109A', 4, 1, 7, 1, 6, 1, 10, 'Debabrata', 'Das', 'subratadas@gmail.com', '9932311891', 'Purunda', 'Egra', 'Belda railway station', '721445', '12345', '12/7', '129', '2.15', 1, 1, 1, '2019-05-03 01:33:28'),
(5, '20190503AAB7', 9, 1, 24, 1, 7, 1, 7, 'Debabrata', 'Das', 'subratadas@gmail.com', '9932311891', 'Purunda', 'Egra', 'Belda railway station', '721445', '12345', '12/9', '125', '6', 1, 1, 1, '2019-05-03 01:37:21'),
(6, '2019050335C8', 7, 1, 31, 1, 5, 1, 6, 'Debabrata', 'Das', 'subratadas@gmail.com', '9932311891', 'Purunda', 'Egra', 'Belda railway station', '721445', '123456789', '12/8', '121', '3.25', 1, 1, 1, '2019-05-03 01:48:13'),
(7, '20190503C219', 7, 1, 28, 1, 8, 2, 6, 'Tapan', 'Pandit', 'subratadas@gmail.com', '9932311891', 'Purunda', 'Egra', 'Belda railway station', '721445', '12365248954', '25/5', '652', '1', 1, 1, 1, '2019-05-03 01:52:20'),
(8, '201905033DFD', 7, 1, 31, 1, 6, 2, 6, 'Tapan', 'Pandit', 'subratadas@gmail.com', '9932311891', 'Purunda', 'Egra', 'Belda railway station', '721445', '96574632', '12/8', '654', '3.52', 1, 1, 1, '2019-05-03 01:56:31'),
(9, '20190503D285', 2, 1, 17, 1, 8, 2, 4, 'Tapan', 'Pandit', 'subratadas@gmail.com', '9932311891', 'Purunda', 'Egra', 'Belda railway station', '721445', '96587446546548', '12/8', '365', '1', 1, 1, 1, '2019-05-03 01:59:09'),
(10, '201905036C7F', 4, 1, 6, 1, 6, 5, 10, 'Samsuddin', 'Md', 'subrata.15@gmail.com', '9434246279', 'SRIKANTHA, MOYNA,, PURBA MEDINIPUR, WEST BENGAL', 'PURBA MEDINIPUR', 'West Bengal', '721629', '16587645465', '645546', '123', '2.56', 1, 0, 0, '2019-05-03 02:10:04'),
(11, '201905032805', 2, 1, 20, 1, 7, 5, 4, 'Samsuddin', 'Md', 'subrata.15@gmail.com', '09434246279', 'SRIKANTHA, MOYNA,, PURBA MEDINIPUR, WEST BENGAL', 'PURBA MEDINIPUR', 'West Bengal', '721629', '123654789', '12/9', '123', '2.36', 1, 1, 1, '2019-05-03 02:11:02'),
(12, '20190503BB7A', 4, 1, 8, 1, 6, 6, 3, 'Rahul', 'Das', 'subratadas@gmail.com', '9932311891', 'Bardhaman', 'Bardhaman', 'Bardhaman railway station', '721445', '123456987', '12345', '12/8', '3.20', 1, 1, 1, '2019-05-03 07:31:22'),
(13, '2019050356A7', 4, 1, 8, 1, 6, 1, 3, 'Atanu', 'Das', 'atanudas@gmail.com', '09002494499', 'Moyna', 'Tamluk', 'Mayna School', '721445', '464646464', '4444445', '4545', '', 1, 0, 0, '2019-05-03 12:13:58'),
(14, '201905070F69', 4, 1, 8, 1, 6, 1, 10, 'Debabrata', 'Das', 'subratadas@gmail.com', '9932311891', 'Purunda', 'Egra', 'Belda railway station', '721445', '12345', '12345', '123', '3.30', 1, 0, 0, '2019-05-07 17:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `id` int(11) NOT NULL,
  `q_id` varchar(25) NOT NULL,
  `q_name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`id`, `q_id`, `q_name`, `status`, `date_time`) VALUES
(1, '0', 'Bachelor of Arts: BA', 0, '2019-03-21'),
(2, '0', 'Bachelor of Business Administration: BBA', 0, '2019-03-21'),
(3, '0', 'Bachelor of Science: BSc', 0, '2019-03-21'),
(4, '0', 'Bachelor of Commerce: Bcom', 0, '2019-03-21'),
(5, '0', 'Bachelor of Computer Applications: BCA', 0, '2019-03-21'),
(6, '0', 'Bachelor of Engineering: BE', 0, '2019-03-21'),
(7, '0', 'Bachelor of Technology: BTech', 0, '2019-03-21'),
(8, '0', 'Master of Arts (M.A.)', 0, '2019-03-21'),
(9, '0', 'Master of Business Administration (M.B.A.)', 0, '2019-03-21'),
(10, '0', 'Master of Computer Applications (M.C.A.)', 0, '2019-03-21'),
(11, '0', 'Master of Engineering (M.Eng.)', 0, '2019-03-21'),
(12, '0', 'Master of Science (M.Sc.)', 0, '2019-03-21'),
(13, '0', 'Master of Technology (M.Tech.)', 0, '2019-03-21'),
(14, '0', 'Master of Commerce (M.Com.)', 0, '2019-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `ratting`
--

CREATE TABLE `ratting` (
  `id` int(11) NOT NULL,
  `value` varchar(25) NOT NULL,
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratting`
--

INSERT INTO `ratting` (`id`, `value`, `service_id`, `user_id`, `emp_id`, `order_id`, `comment`, `date_time`) VALUES
(1, '5', 4, 4, 3, 1, 'Technicians were trained and cordial, Highly satisfied', '2019-05-03 01:04:16'),
(2, '3', 4, 3, 10, 2, '0', '2019-05-03 01:18:01'),
(3, '5', 4, 2, 10, 3, 'Good prompt assessment and quality of work', '2019-05-03 01:28:15'),
(4, '5', 4, 1, 10, 4, 'Very honest and sufficient. Does an excellent job in very leas time frame', '2019-05-03 01:34:10'),
(5, '5', 9, 1, 7, 5, 'Very professional, Very polite and humble in nature. Was on time.', '2019-05-03 01:38:29'),
(6, '5', 7, 1, 6, 6, 'The experience was good. But I am not sure for what I have been charged 1020/-.', '2019-05-03 01:49:20'),
(7, '5', 7, 2, 6, 7, 'Excellent work! Very calm and were polite', '2019-05-03 01:52:46'),
(8, '3', 7, 2, 6, 8, 'Professional and competent commendable work.', '2019-05-03 01:57:12'),
(9, '4', 2, 2, 4, 9, 'The perfect job is d. He is really hard working. Neat and tidy work.', '2019-05-03 02:01:10'),
(10, '5', 2, 5, 4, 11, 'Very professional in his job...', '2019-05-03 02:11:24'),
(11, '4', 4, 6, 3, 12, 'Good service , good behavior , value for money', '2019-05-03 07:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_id` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `about` varchar(500) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `date_time` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `city_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_id`, `name`, `about`, `img1`, `img2`, `date_time`, `status`, `city_status`) VALUES
(1, 'K020519CLE001', 'Cleaning', 'Cleaning is the process of removing unwanted substances, such as dirt, infectious agents, and other impurities, from an object or environment.', 'fa542fad879e969407dbd1400b6284af.png', '30f3af41353b046080335400a346bd9e.png', '2019-05-02', 0, 0),
(2, 'K020519ELE002', 'Electrical', 'Electricity is the presence and flow of electric charge. Using electricity we can transfer energy in ways that allow us to accomplish common chores.', '15f1dcf74216ac14c5c463a028454340.png', 'c3a3f20bc75ab7a26c4305daaeaaccb9.png', '2019-05-02', 0, 0),
(3, 'K020519PLU003', 'Plumbing', 'Plumbing is any system that conveys fluids for a wide range of applications. Plumbing uses pipes, tanks, and other apparatuses to convey fluids.', '0cc3469f18663b0aa1563db7446cd25e.png', '64f754455cac84046033c4c76bb389b2.png', '2019-05-02', 0, 0),
(4, 'K020519APP004', 'Appliances', 'Appliances a device, an electrical one that is used in the home, such as a refrigerator or washing machine: electrical/home/household/kitchen appliances.', 'ece58849532f41b60018baf742d9d964.png', '5de2fe562569e4faaa0010983eb968c6.png', '2019-05-02', 0, 0),
(5, 'K020519CAR005', 'Carpentry', 'The homes we live in and the furniture we sit on would not have been made possible without the skilled trade known as carpentry.', 'bea6655dd5cd43a543efcc875dfcd68c.png', '794d97660810e9f6d616424cc08eda24.png', '2019-05-02', 0, 0),
(6, 'K020519GEY006', 'Geyser Service', 'A garden is a planned space, usually outdoors, set aside for the display, cultivation, or enjoyment of plants and other forms of nature.', '88fe9df69ab3ebce99d8aaff9877e741.png', 'fe4e59f900b4452a49294bce6d2d1b69.png', '2019-05-02', 0, 0),
(7, 'K020519VEH007', 'Vehicle Care', 'An automobile repair shop is an establishment where automobiles are repaired by auto mechanics and technicians.', '73d050b17c90e1bbe303192a520a5705.png', '20c4a8c33453f70f9c8faef8b894c220.png', '2019-05-02', 0, 0),
(8, 'K020519PES008', 'Pest Control', 'Pest control is the regulation or management of a species defined as a pest, a member of the animal kingdom that impacts adversely on human activities.', 'a40c1c65ea0592d0302c095fe9129bd7.png', 'a6e81641371f27e4b757c3ffac1bf65e.png', '2019-05-02', 0, 0),
(9, 'K020519PAI009', 'Painting', 'A house painter and decorator is a tradesman responsible for the painting and decorating of buildings, and is also known as a decorator or house painter.', 'cec33f1007c6a441e817ec72421a5362.png', '8b772d3d8ffc2f9c904a3f9992cdeedc.png', '2019-05-02', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_price`
--

CREATE TABLE `service_price` (
  `id` int(11) NOT NULL,
  `price_id` varchar(25) NOT NULL,
  `price` int(50) NOT NULL,
  `price_name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_price`
--

INSERT INTO `service_price` (`id`, `price_id`, `price`, `price_name`, `status`) VALUES
(1, 'KPT-299', 299, 'Service charge per hour', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_time`
--

CREATE TABLE `service_time` (
  `id` int(11) NOT NULL,
  `time_id` varchar(25) NOT NULL,
  `time_to` varchar(25) NOT NULL,
  `time_from` varchar(25) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_time`
--

INSERT INTO `service_time` (`id`, `time_id`, `time_to`, `time_from`, `status`) VALUES
(1, 'KPT-9:00am-10:00am', '9:00am', '10:00am', 1),
(2, 'KPT-10:00am-11:00am', '10:00am', '11:00am', 1),
(3, 'KPT-11:00am-12:00pm', '11:00am', '12:00pm', 1),
(4, 'KPT-12:00pm-1:00pm', '12:00pm', '1:00pm', 0),
(5, 'KPT-1:00pm-2:00pm', '1:00pm', '2:00pm', 0),
(6, 'KPT-2:00pm-3:00pm', '2:00pm', '3:00pm', 0),
(7, 'KPT-3:00pm-4:00pm', '3:00pm', '4:00pm', 0),
(8, 'KPT-4:00pm-5:00pm', '4:00pm', '5:00pm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `employee_id`, `date_time`, `status`) VALUES
(1, 3, '2019-05-03 00:00:00', 0),
(2, 7, '2019-05-03 00:00:00', 0),
(3, 10, '2019-05-03 00:00:00', 0),
(4, 4, '2019-05-03 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `email` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `fullname`, `email`, `mobile_no`, `date_time`) VALUES
(1, 'KT020519001\n', 'Debabrata Das', 'debabratadas711@gmail.com', '9734990919', '2019-05-02'),
(2, 'KT020519002\n', 'Tapan Pandit', 'debabratamaity108@gmail.c', '9851149591', '2019-05-02'),
(3, 'KT020519003\n', 'Abijit Pandit', 'talk2subra@gmail.com', '9609039800', '2019-05-02'),
(4, 'KT020519004\n', 'Subra Das', 'mr.subrata.15@gmail.com', '9732421718', '2019-05-02'),
(5, 'KT030519001\n', 'Md Samsuddin', 'subrata.15@gmail.com', '9434246279', '2019-05-03'),
(6, 'KT030519002\n', 'Rahul Das', 'das.rahul19122015@gmail.c', '9735199398', '2019-05-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_service`
--
ALTER TABLE `assign_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `assign_service_category`
--
ALTER TABLE `assign_service_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `city_id` (`city_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `complete_orders`
--
ALTER TABLE `complete_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD KEY `service_category_id` (`service_category_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `service_price_id` (`service_price_id`),
  ADD KEY `service_time_id` (`service_time_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_request_ibfk_1` (`service_id`),
  ADD KEY `employee_request_ibfk_2` (`city_id`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `qualification_id` (`qualification_id`),
  ADD KEY `identity_id` (`identity_id`);

--
-- Indexes for table `employee_request`
--
ALTER TABLE `employee_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_request_ibfk_1` (`service_id`),
  ADD KEY `employee_request_ibfk_2` (`city_id`),
  ADD KEY `qualification_id` (`qualification_id`),
  ADD KEY `identity_id` (`identity_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identity`
--
ALTER TABLE `identity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD KEY `service_category_id` (`service_category_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `service_price_id` (`service_price_id`),
  ADD KEY `service_time_id` (`service_time_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratting`
--
ALTER TABLE `ratting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_id` (`service_id`);

--
-- Indexes for table `service_price`
--
ALTER TABLE `service_price`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `price` (`price`),
  ADD UNIQUE KEY `price_id` (`price_id`);

--
-- Indexes for table `service_time`
--
ALTER TABLE `service_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `assign_service`
--
ALTER TABLE `assign_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `assign_service_category`
--
ALTER TABLE `assign_service_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `complete_orders`
--
ALTER TABLE `complete_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `employee_request`
--
ALTER TABLE `employee_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `identity`
--
ALTER TABLE `identity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `ratting`
--
ALTER TABLE `ratting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `service_price`
--
ALTER TABLE `service_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `service_time`
--
ALTER TABLE `service_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_service`
--
ALTER TABLE `assign_service`
  ADD CONSTRAINT `assign_service_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `assign_service_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);

--
-- Constraints for table `assign_service_category`
--
ALTER TABLE `assign_service_category`
  ADD CONSTRAINT `assign_service_category_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `assign_service_category_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);

--
-- Constraints for table `employee_request`
--
ALTER TABLE `employee_request`
  ADD CONSTRAINT `employee_request_ibfk_4` FOREIGN KEY (`qualification_id`) REFERENCES `qualification` (`id`),
  ADD CONSTRAINT `employee_request_ibfk_5` FOREIGN KEY (`identity_id`) REFERENCES `identity` (`id`),
  ADD CONSTRAINT `employee_request_ibfk_6` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`service_price_id`) REFERENCES `service_price` (`id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`service_time_id`) REFERENCES `service_time` (`id`),
  ADD CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ratting`
--
ALTER TABLE `ratting`
  ADD CONSTRAINT `ratting_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `ratting_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ratting_ibfk_3` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `ratting_ibfk_4` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
