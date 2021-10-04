-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 22, 2021 at 10:50 AM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webframework`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutdepartments`
--

CREATE TABLE `aboutdepartments` (
  `id` bigint UNSIGNED NOT NULL,
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ensubtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malsubtitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malcontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `components_id` tinyint(1) NOT NULL,
  `iconclass` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepagestatus` tinyint NOT NULL DEFAULT '0',
  `contributor_status` int NOT NULL DEFAULT '0',
  `contributor_userid` int NOT NULL,
  `contributor_timestamp` timestamp NULL DEFAULT NULL,
  `moderator_status` int NOT NULL DEFAULT '0',
  `moderator_userid` int NOT NULL,
  `moderator_timestamp` timestamp NULL DEFAULT NULL,
  `approve_status` int NOT NULL DEFAULT '0',
  `approve_userid` int NOT NULL,
  `approve_timestamp` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aboutdepartments`
--

INSERT INTO `aboutdepartments` (`id`, `entooltip`, `maltooltip`, `entitle`, `maltitle`, `ensubtitle`, `malsubtitle`, `encontent`, `malcontent`, `components_id`, `iconclass`, `homepagestatus`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_status`, `moderator_userid`, `moderator_timestamp`, `approve_status`, `approve_userid`, `approve_timestamp`, `status`, `users_id`, `created_at`) VALUES
(1, 'aaaa', 'asadasd', 'asdasd', 'asdasd', 'dfdfsdf', 'asdasd', 'asdasd', 'asdads', 1, 'asddfsdf', 0, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 1, 4, '2021-04-21 05:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint UNSIGNED NOT NULL,
  `poster` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ensubtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malsubtitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enauthor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malauthor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enbrief` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malbrief` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `encontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malcontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepagestatus` tinyint NOT NULL DEFAULT '0',
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `activitytypes_id` bigint UNSIGNED NOT NULL,
  `contributor_status` int NOT NULL DEFAULT '0',
  `contributor_userid` int NOT NULL DEFAULT '0',
  `contributor_timestamp` timestamp NULL DEFAULT NULL,
  `moderator_remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `moderator_status` int NOT NULL DEFAULT '0',
  `moderator_userid` int NOT NULL DEFAULT '0',
  `moderator_timestamp` timestamp NULL DEFAULT NULL,
  `approve_remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `approve_status` int NOT NULL DEFAULT '0',
  `approve_userid` int NOT NULL DEFAULT '0',
  `approve_timestamp` timestamp NULL DEFAULT NULL,
  `lock_status` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `poster`, `alt`, `entooltip`, `maltooltip`, `entitle`, `maltitle`, `ensubtitle`, `malsubtitle`, `enauthor`, `malauthor`, `enbrief`, `malbrief`, `encontent`, `malcontent`, `homepagestatus`, `startdate`, `enddate`, `activitytypes_id`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_remarks`, `moderator_status`, `moderator_userid`, `moderator_timestamp`, `approve_remarks`, `approve_status`, `approve_userid`, `approve_timestamp`, `lock_status`, `status`, `users_id`, `created_at`) VALUES
(5, 'activity2304202109:05:15.jpg', 'fdfd', 'gfgdf', 'gfdg', 'fggdf', 'fgddfg', 'gfdg', 'fgdfg', 'gfdgf', 'fgf', 'gffd', 'fgfgf', 'fgfdgfd', 'fgdfg', 1, '2021-04-23', '2021-04-23', 1, 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, 0, 1, 5, '2021-04-23 03:35:15'),
(7, 'activity2604202111:10:04.png', 'jhjk', 'dfgdfg', 'dfgdfg', 'dfgd', 'fgdfgd', 'xcv', 'ghfghfg', 'tghfgh', 'fghfg', 'rte', 'rtertert', 'rtertert', 'rte', 1, '2021-04-26', '2021-04-26', 1, 0, 0, NULL, '', 0, 0, NULL, '', 2, 3, '2021-04-26 05:40:04', 0, 1, 3, '2021-04-26 05:40:04'),
(8, 'activity2604202111:12:15.png', 'vbn', 'xcv', 'xcvx', 'ccccccccccc', 'cxvxcv', 'xcvxcv', 'xcv', 'xcvxcv', 'xcvx', 'cvxcvx', 'cvxcvxcv', 'xcvx', 'xcvxcvxcv', 1, '2021-04-26', '2021-04-26', 1, 1, 5, '2021-04-27 09:35:46', 'remarks', 2, 11, '2021-04-27 09:44:36', 'apppp', 2, 14, '2021-04-27 10:10:19', 1, 1, 5, '2021-04-26 05:42:15'),
(9, 'activity0705202111:47:09.png', 'alt', 'dfsdf', 'മലയാളം', 'activityy', 'മലയാളം', 'fgdfgd', 'മലയാളം', 'ghfghf', 'മലയാളം', '<p>fdgfd<br></p>', '<p>dfgdfg<br></p>', '<p>fdgfg<br></p>', '<p>dfgfg<br></p>', 1, '2021-05-07', '2021-05-07', 1, 2, 5, '2021-05-07 06:24:52', 'sss', 0, 11, '2021-05-07 06:33:58', 'rejected', 0, 14, '2021-05-07 06:37:52', 0, 1, 5, '2021-05-07 06:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `activitytypes`
--

CREATE TABLE `activitytypes` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activitytypes`
--

INSERT INTO `activitytypes` (`id`, `entitle`, `maltitle`, `status`, `users_id`, `created_at`) VALUES
(1, 'sdfsdf', 'sdfsdf', 1, 4, '2021-04-12 02:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `activityuploads`
--

CREATE TABLE `activityuploads` (
  `id` bigint UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activities_id` bigint UNSIGNED NOT NULL,
  `filetypes_id` bigint UNSIGNED NOT NULL,
  `contenttypes_id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activityuploads`
--

INSERT INTO `activityuploads` (`id`, `file`, `alt`, `entitle`, `maltitle`, `size`, `duration`, `activities_id`, `filetypes_id`, `contenttypes_id`, `status`, `users_id`, `created_at`) VALUES
(3, 'activityupload1505202121:15:02.jpg', 'hjg', 'fgdgfg', 'hjjg', '1.2', '2.4', 5, 7, 4, 1, 3, '2021-04-23 04:03:10'),
(5, 'activityupload1505202121:17:35.jpg', 'alt', 'act ulo', 'മലയാളം', '1.2', '2.4', 5, 7, 4, 1, 3, '2021-05-08 10:45:26'),
(6, 'activityupload1505202121:17:53.jpg', 'alt', 'ggggg', 'മലയാളം', '22', '1.5', 7, 7, 4, 1, 3, '2021-05-09 16:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `appdepartments`
--

CREATE TABLE `appdepartments` (
  `id` bigint UNSIGNED NOT NULL,
  `deptcategories_id` int NOT NULL,
  `departments_id` int NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabout` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malabout` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enstructure` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malstructure` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `encontact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malcontact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enrelatedlinks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malrelatedlinks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enservices` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malservices` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contributor_status` int NOT NULL DEFAULT '0',
  `contributor_userid` int NOT NULL DEFAULT '0',
  `contributor_timestamp` timestamp NULL DEFAULT NULL,
  `moderator_status` int NOT NULL DEFAULT '0',
  `moderator_userid` int NOT NULL DEFAULT '0',
  `moderator_timestamp` timestamp NULL DEFAULT NULL,
  `moderator_remarks` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `approve_status` int NOT NULL DEFAULT '0',
  `approve_userid` int NOT NULL DEFAULT '0',
  `approve_timestamp` timestamp NULL DEFAULT NULL,
  `approve_remarks` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `lock_status` int NOT NULL DEFAULT '0',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appdepartments`
--

INSERT INTO `appdepartments` (`id`, `deptcategories_id`, `departments_id`, `entitle`, `maltitle`, `enabout`, `malabout`, `enstructure`, `malstructure`, `encontact`, `malcontact`, `enrelatedlinks`, `malrelatedlinks`, `enservices`, `malservices`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_status`, `moderator_userid`, `moderator_timestamp`, `moderator_remarks`, `approve_status`, `approve_userid`, `approve_timestamp`, `approve_remarks`, `status`, `lock_status`, `users_id`, `created_at`) VALUES
(1, 1, 1, 'Agriculture Development and Farmers Welfare', 'fgdfgd', '<p>\r\nThe department is mainly committed to the development of schemes and programs to increase the production of food crops and cash crops in the state, and to facilitate the effective implementation of these schemes.\r\n</p><p> \r\nThe Department aims to introduce technology to the farmers in order to increase the production of each crops, to provide high productivity seedlings, timely supply of tools, fertilizers and pesticides. Apart from this, the department has also been initiated to provide the farmers with their approval. The department emphasizes the three components of agricultural research, agro-education and agrarian expansion. The department has its own  agriculture land and an engineering section that promotes agriculture development.\r\n</p>', 'dfsdfsdf', '<table class=\"table table-bordered\"><tbody><tr><td><b>Adv. V. S. Sunil Kumar<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Minister for Agriculture</b><br></td><td>Room No. 300<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; 1st Floor<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Secretariat (Annex II)<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Thiruvananthapuram<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Phone: 0471- 2333091/2335075<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Fax :0471- 2333775<br></td></tr><tr><td><b>Department</b><br></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Office of the Registrar of&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Co-operative&nbsp; Societies<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Statue, Thiruvananthapuram-1<br></td></tr><tr><td><b>Smt. Ishita Roy IAS<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Principal Secretary &amp; APC</b><br></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Room No. 102<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; 1st Floor<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Annex II, Secretariat <br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Ph-0471-2333042, 2518398<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Mobile: 8826272707 <br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; E-mail: apc.agri@kerala.gov.in<br></td></tr></tbody></table><br>', 'sdfsdf', '<table class=\"table table-bordered\"><tbody><tr><td><b>Designation</b></td><td><b>Address</b></td><td><b>Ph.No(O)</b></td></tr><tr><td>Addl. Director of Agriculture (CP)</td><td>  <p> Directorate of Agriculture</p> <p> Vikas Bhavan TVPM, Pin: 695 033</p></td><td>2304741 / 9447864070 / 2304230</td></tr><tr><td>Addl. Director of Agriculture (Plg)</td><td>  <p> Directorate of Agriculture</p> <p> Vikas Bhavan TVPM, Pin: 695 033</p></td><td>2308382</td></tr></tbody></table><br>', 'dfsdfsd', '<table class=\"table table-bordered\"><tbody><tr><td>Department of Agriculture, Government of Kerala</td><td><strong><a href=\"http://www.keralaagriculture.gov.in/\" style=\"color: rgb(35, 103, 173); text-decoration-line: none;\" target=\"_blank\" title=\"External website which opens in a new window\">www.keralaagriculture.gov.in</a></strong></td></tr><tr><td>Farm Information Bureau</td><td><strong><a href=\"http://fibkerala.gov.in/\" style=\"color: rgb(35, 103, 173); text-decoration-line: none;\" target=\"_blank\" title=\"External website which opens in a new window\">www.fibkerala.gov.in</a></strong></td></tr><tr><td>Kerala Karshaka Sahakarana Federation Ltd.</td><td><strong><a href=\"http://www.kerafed.com/\" style=\"color: rgb(35, 103, 173); text-decoration-line: none;\" target=\"_blank\" title=\"External website which opens in a new window\">www.kerafed.com</a></strong></td></tr></tbody></table><br>', 'xfgdg<br>', '<div class=\"panel\" style=\"display: block;\"> <div style=\"text-align: justify;\"> <div> <b><u>EA1</u></b></div> <ol class=\"agri1\"><li> <strong>Establishment papers except disciplinary action of the following officers of Agriculture Department.</strong> <ul class=\"agri\"><li> Additional Director</li><li> Joint Director</li><li> Deputy Director</li><li> Assistant Director</li><li> Assistant Engineer</li><li> Assistant Executive Engineer</li><li> Executive Engineer</li><li> Assistant Soil Chemist</li><li> Senior Grade Scientific Assistant.</li></ul> </li><li> <strong>Delegation of powers of the officers of Agriculture Department.</strong></li><li> <strong>Special Rules of Agricultural State Services.</strong></li><li> <strong>DPC I of Agriculture Department.</strong></li><li> <strong>Revision of orders and manuals of Agriculture Department</strong></li><li> <strong>Miscellaneous LA Questions of the section.</strong></li></ol><br></div> </div>', 'sdfsdfsdf', 1, 7, '2021-04-28 06:18:38', 2, 13, '2021-04-29 07:52:26', 'final', 2, 6, '2021-04-29 07:57:05', 'donedfsdfsd', 1, 1, 3, '2021-04-27 00:36:05'),
(2, 1, 3, 'Ayush', 'മലയാളം', 'Department of Ayush was formed as a separate department on 18 June 2015 \r\nby delinking the subject \'Ayush\' from the then existing Health and \r\nFamily Welfare Department, to ensure a more focused approach towards \r\nissues relating to the healthcare, research and education sector of \r\nAyurveda, Yoga &amp; Naturopathy, Unani, Siddha and Homoeotherapy \r\npractices in the State. The AYUSH especially Ayurveda and Homeopathy \r\nplay an important role in the healthcare delivery system in Kerala. <br>', 'മലയാളം', '<table class=\"table table-bordered\"><tbody><tr><td><b>Smt. K. K. Shailaja Teacher<br> Minister for Health, Social Justice and Woman and Child Development</b></td><td>Room No. 216,<br> 3rd Floor,<br> North Sandwich Block,<br> Secretariat<br> Phone: 0471- 2327876/2327976<br> Mob :9447982200/ 7034430000<br> Fax :0471- 2327016</td></tr><tr><td><b>Department</b></td><td>  5th Floor<br> Annex II<br> Secretariat<br> Thiruvananthapuram</td></tr><tr><td><div> <b>Dr. Rajan N. Khobragade IAS</b></div><b> </b><div><b> Principal Secretary</b></div></td><td><div> Room No. 603</div> <div> 6th Floor</div> <div> Annexe II</div> <div> Secretariat</div> <div> Phone: 2518255, 2327865</div> <div> E-mail: secy.hlth@kerala.gov.in</div></td></tr></tbody></table>', 'മലയാളം', '<table class=\"table table-bordered\"><tbody><tr><td><b>Sl no.</b></td><td>  <b>Department Sections.</b></td><td>  <b>Address &amp; Phone No.</b></td></tr><tr><td>1<br></td><td>  Section A</td><td>  5th Floor<br> Annex II<br> Secretariat<br> Tel:-0471-2518066</td></tr><tr><td>2<br></td><td>  Section B<br></td><td>  5th Floor<br> Annex II<br> Secretariat<br> Tel:-0471-2518562</td></tr></tbody></table>', 'മലയാളം', 'fdgfd', 'മലയാളം', 'xgdxgfdx', 'മലയാളം', 0, 0, NULL, 0, 0, NULL, '0', 0, 0, NULL, '0', 1, 0, 3, '2021-05-20 11:15:01'),
(3, 1, 1, 'csvcds', 'സന്ദേശത്തിന്റെ', '', '', '', '', '', '', '', '', '', '', 0, 0, NULL, 0, 0, NULL, '0', 0, 0, NULL, '0', 1, 0, 3, '2021-06-16 06:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `appsections`
--

CREATE TABLE `appsections` (
  `id` bigint UNSIGNED NOT NULL,
  `ensectionname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malsectionname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ensectiondetails` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malsectiondetails` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `appdepartments_id` bigint UNSIGNED NOT NULL,
  `contributor_status` int NOT NULL DEFAULT '0',
  `contributor_userid` int NOT NULL DEFAULT '0',
  `contributor_timestamp` timestamp NULL DEFAULT NULL,
  `moderator_status` int NOT NULL DEFAULT '0',
  `moderator_userid` int NOT NULL DEFAULT '0',
  `moderator_remarks` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `moderator_timestamp` timestamp NULL DEFAULT NULL,
  `approve_status` int NOT NULL DEFAULT '0',
  `approve_userid` int NOT NULL DEFAULT '0',
  `approve_remarks` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `approve_timestamp` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `lock_status` int NOT NULL DEFAULT '0',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appsections`
--

INSERT INTO `appsections` (`id`, `ensectionname`, `malsectionname`, `ensectiondetails`, `malsectiondetails`, `appdepartments_id`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_status`, `moderator_userid`, `moderator_remarks`, `moderator_timestamp`, `approve_status`, `approve_userid`, `approve_remarks`, `approve_timestamp`, `status`, `lock_status`, `users_id`, `created_at`) VALUES
(3, 'ssssssssssss', 'ghgjhuoou', 'ddddddddd', 'grtdttggg', 1, 0, 0, NULL, 0, 0, '0', NULL, 0, 0, '0', NULL, 1, 0, 7, '2021-04-27 11:18:09'),
(4, 'shabee', 'shabee', 'shabee', 'shabee', 1, 1, 7, '2021-04-28 08:57:11', 2, 13, 'sdsfsfdsff', '2021-04-28 09:15:55', 2, 6, 'finish', '2021-04-29 06:29:41', 1, 1, 7, '2021-04-28 08:57:11'),
(5, 'gfdgfg', 'fgdfgfg', 'gdsgdfg', 'dfgdfgdf', 1, 1, 7, '2021-04-29 06:07:23', 2, 13, 'try', '2021-04-29 06:27:07', 2, 6, 'gfdfgfg', '2021-04-29 08:22:31', 1, 1, 7, '2021-04-29 06:07:23'),
(6, 'fsafd', 'sffgsdg', 'dfdsfsd', 'dfsffdf', 1, 1, 7, '2021-04-29 08:23:40', 3, 13, '0', '2021-04-29 09:17:52', 0, 0, '0', NULL, 1, 0, 7, '2021-04-29 08:23:40'),
(7, 'dffsfd', 'dxfdxfd', 'dxffddx', 'dtdtr', 1, 0, 0, NULL, 0, 0, '0', NULL, 2, 3, '0', '2021-05-05 19:04:49', 1, 0, 3, '2021-05-05 19:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `archivepolicies`
--

CREATE TABLE `archivepolicies` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archivepolicies`
--

INSERT INTO `archivepolicies` (`id`, `entitle`, `maltitle`, `status`, `users_id`, `created_at`) VALUES
(1, 'aaaa', 'aaaa', 1, 1, '2021-04-20 04:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `articlecategories`
--

CREATE TABLE `articlecategories` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articlecategories`
--

INSERT INTO `articlecategories` (`id`, `entitle`, `status`, `users_id`, `created_at`) VALUES
(1, 'Informations', 1, 4, '2021-04-12 01:35:13'),
(2, 'asdasd', 1, 4, '2021-04-13 00:43:50'),
(3, 'sds', 1, 4, '2021-04-13 00:53:35'),
(4, 'SASAS', 1, 4, '2021-04-13 00:54:25'),
(5, 'assad', 1, 4, '2021-04-14 23:40:53'),
(6, 'sasaa', 1, 4, '2021-04-14 23:41:29'),
(7, 'sss', 1, 4, '2021-04-14 23:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint UNSIGNED NOT NULL,
  `poster` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ensubtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malsubtitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enauthor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malauthor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enbrief` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malbrief` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `encontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malcontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `components_id` tinyint(1) NOT NULL,
  `homepagestatus` tinyint NOT NULL DEFAULT '0',
  `extras` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `articlecategories_id` bigint UNSIGNED NOT NULL,
  `contributor_status` int NOT NULL DEFAULT '0' COMMENT '0=Default, 1=Entered',
  `contributor_userid` int NOT NULL DEFAULT '0',
  `contributor_timestamp` timestamp NULL DEFAULT NULL,
  `moderator_remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `moderator_status` int NOT NULL DEFAULT '0' COMMENT '0=Default, 1=Viewed, 2=Verified, 3=Rejected',
  `moderator_userid` int NOT NULL DEFAULT '0',
  `moderator_timestamp` timestamp NULL DEFAULT NULL,
  `approve_remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `approve_status` int NOT NULL DEFAULT '0' COMMENT '0=Default, 1=Viewed, 2=Approved, 3=Rejected',
  `approve_userid` int NOT NULL DEFAULT '0',
  `approve_timestamp` timestamp NULL DEFAULT NULL,
  `lock_status` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `poster`, `alt`, `entooltip`, `maltooltip`, `entitle`, `maltitle`, `ensubtitle`, `malsubtitle`, `enauthor`, `malauthor`, `enbrief`, `malbrief`, `encontent`, `malcontent`, `components_id`, `homepagestatus`, `extras`, `articlecategories_id`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_remarks`, `moderator_status`, `moderator_userid`, `moderator_timestamp`, `approve_remarks`, `approve_status`, `approve_userid`, `approve_timestamp`, `lock_status`, `status`, `users_id`, `created_at`) VALUES
(1, 'article1605202112:39:59.jpg', 'alt', 'tool', 'മലയാളം', 'Title of Authors', 'മലയാളം', 'sub', 'മലയാളംമലയാളം', 'author name', 'മലയാളംമലയാളം', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It \r\nhas roots in a piece of classical Latin literature from 45 BC, making it\r\n over 2000 years old.</p>', '<p>മലയാളംമലയാളം<br></p>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It \r\nhas roots in a piece of classical Latin literature from 45 BC, making it\r\n over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature</p>', '<p>മലയാളംമലയാളംമലയാളംമലയാളം</p>', 1, 1, 'ddd', 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, 3, '2021-05-16 07:09:59', 0, 1, 3, '2021-05-16 07:09:59'),
(2, 'article1605202112:41:26.jpg', 'alt', 'toolg', 'മലയാളം', 'Title of the article', 'മലയാളം', 'sub', 'മലയാളംമലയാളം', 'author name', 'മലയാളംമലയാളം', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It \r\nhas roots in a piece of classical Latin literature from 45 BC, making it\r\n over 2000 years old. </p>', '<p>മലയാളംമലയാളംമലയാളംമലയാളം<br></p>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It \r\nhas roots in a piece of classical Latin literature from 45 BC, making it\r\n over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. </p>', '<p>മലയാളംമലയാളംമലയാളംമലയാളംമലയാളംമലയാളംമലയാളംമലയാളം<br></p>', 1, 1, 'ddd', 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, 3, '2021-05-16 07:11:26', 0, 1, 3, '2021-05-16 07:11:26'),
(3, 'article1905202112:51:14.jpg', 'alt', 'ccdgf', 'മലയാളം', 'Government', 'മലയാളം', 'subhggh', 'മലയാളംമലയാളം', 'author name', 'മലയാളംമലയാളം', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It \r\nhas roots in a piece of classical Latin literature from 45 BC, making it\r\n over 2000 years old.</p>', '<p>മലയാളംമലയാളംമലയാളംമലയാളം<br></p>', '<p>ghhgfhghg<br></p>', '<p>മലയാളംമലയാളംമലയാളംമലയാളംമലയാളംമലയാളം<br></p>', 21, 1, 'ddd', 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, 3, '2021-05-19 07:21:14', 0, 1, 3, '2021-05-19 07:21:14'),
(4, 'article1905202113:39:14.jpg', 'alt', 'Department', 'മലയാളം', 'Department', 'മലയാളം', 'zxczxc', 'മലയാളംമലയാളം', 'author name', 'മലയാളംമലയാളം', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It \r\nhas roots in a piece of classical Latin literature from 45 BC, making it\r\n over 2000 years old.</p>', '<p>മലയാളംമലയാളം<br></p>', '<p>gdfdfgdf<br></p>', '<p>മലയാളംമലയാളംമലയാളംമലയാളം<br></p>', 21, 1, 'ddd', 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, 4, '2021-05-19 08:09:14', 0, 1, 4, '2021-05-19 08:09:14');
INSERT INTO `articles` (`id`, `poster`, `alt`, `entooltip`, `maltooltip`, `entitle`, `maltitle`, `ensubtitle`, `malsubtitle`, `enauthor`, `malauthor`, `enbrief`, `malbrief`, `encontent`, `malcontent`, `components_id`, `homepagestatus`, `extras`, `articlecategories_id`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_remarks`, `moderator_status`, `moderator_userid`, `moderator_timestamp`, `approve_remarks`, `approve_status`, `approve_userid`, `approve_timestamp`, `lock_status`, `status`, `users_id`, `created_at`) VALUES
(5, 'article2105202114:39:43.jpg', 'alt', 'sdfsdf', 'മലയാളം', 'State', 'മലയാളം', 'subhggh', 'മലയാളംമലയാളം', 'author name', 'മലയാളംമലയാളം', '<p style=\"text-align: justify;\"> As per Indian Constitution, Kerala \r\nGovernment has three estates namely the Legislature, the Executive and \r\nthe Judiciary. Each estate has its own functions to perform.</p> <p style=\"text-align: justify;\"> &nbsp;</p> <p style=\"text-align: justify;\">\r\n Legislature is the law-making body. Kerala follows a unicameral \r\nlegislative system, i.e. there is only one house for State legislature; \r\nnamely the Legislative Assembly. The total members in the Kerala \r\nlegislative assembly is 141. Of these, 140 are elected directly by the \r\npeople on the basis of adult suffrage and one member is nominated from \r\nthe Latin Community, which falls under the minority category. The \r\nmembers of the Legislative Assembly elect one of the members as it\'s \r\nSpeaker and another as Deputy Speaker. The Speaker presides over the \r\nmeetings of the House and conducts the business of the government. In \r\nhis absence, the Deputy Speaker performs the duties of the speaker.</p>', '<p>മലയാളംമലയാളം<br></p>', '<p> </p><p style=\"text-align: justify;\">\r\n The Governor appoints the leader of the majority party in the \r\nLegislative Assembly as the Chief Minister. The other ministers are \r\nappointed by the Governor on the advice of the Chief Minister. The Chief\r\n Minister is the head of the elected Government and heads the Council of\r\n Ministers. The council of ministers is collectively responsible to the \r\nLegislative Assembly.</p> <p style=\"text-align: justify;\"> &nbsp;</p> <p style=\"text-align: justify;\">\r\n Judiciary is separated from the Executive and the Legislature and the \r\nConstitution provides an independent and impartial Judiciary. The \r\njudiciary comprises the Kerala High Court and a system of lower courts. \r\nThe high court holds the seats of Chief Justice and 26 permanent and two\r\n additional temporary justices. The High Court of Kerala is the apex \r\ncourt for the State and also hears cases from the Union Territory of \r\nLakshadweep.</p> <p style=\"text-align: justify;\"> &nbsp;</p> <p style=\"text-align: justify;\">\r\n Auxiliary authorities known as panchayats for which elections are&nbsp; held\r\n in every five years, govern local affairs. After the 74th Amendmend of \r\nthe Constitution, Kerala is following a three-tier panchayat Raj system,\r\n comprising District Panchayat, Block Panchayat and Village Panchayat.</p><p style=\"text-align: justify;\"><a href=\"http://www.niyamasabha.org/codes/ginfo_6.htm\" target=\"_blank\">Council of Ministers Since 1957</a></p><p style=\"text-align: justify;\"><b>Chief Ministers Since 1957</b></p><p style=\"text-align: justify;\"><br><b><!--[if gte mso 9]><xml>\r\n <o:OfficeDocumentSettings>\r\n  <o:AllowPNG/>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:EnableOpenTypeKerning/>\r\n   <w:DontFlipMirrorIndents/>\r\n   <w:OverrideTableStyleHps/>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val=\"Cambria Math\"/>\r\n   <m:brkBin m:val=\"before\"/>\r\n   <m:brkBinSub m:val=\"&#45;-\"/>\r\n   <m:smallFrac m:val=\"off\"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val=\"0\"/>\r\n   <m:rMargin m:val=\"0\"/>\r\n   <m:defJc m:val=\"centerGroup\"/>\r\n   <m:wrapIndent m:val=\"1440\"/>\r\n   <m:intLim m:val=\"subSup\"/>\r\n   <m:naryLim m:val=\"undOvr\"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"true\"\r\n  DefSemiHidden=\"true\" DefQFormat=\"false\" DefPriority=\"99\"\r\n  LatentStyleCount=\"267\">\r\n  <w:LsdException Locked=\"false\" Priority=\"0\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Normal\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"heading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"35\" QFormat=\"true\" Name=\"caption\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"10\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" Name=\"Default Paragraph Font\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"11\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtitle\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"22\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Strong\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"20\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"59\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Table Grid\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Placeholder Text\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"No Spacing\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Revision\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"34\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"List Paragraph\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"29\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"30\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"19\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"21\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"31\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"32\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"33\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Book Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"37\" Name=\"Bibliography\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" QFormat=\"true\" Name=\"TOC Heading\"/>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin-top:0in;\r\n	mso-para-margin-right:0in;\r\n	mso-para-margin-bottom:10.0pt;\r\n	mso-para-margin-left:0in;\r\n	line-height:115%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:\"Calibri\",\"sans-serif\";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;}\r\ntable.MsoTableGrid\r\n	{mso-style-name:\"Table Grid\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-priority:59;\r\n	mso-style-unhide:no;\r\n	border:solid windowtext 1.0pt;\r\n	mso-border-alt:solid windowtext .5pt;\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-border-insideh:.5pt solid windowtext;\r\n	mso-border-insidev:.5pt solid windowtext;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:\"Calibri\",\"sans-serif\";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;}\r\n</style>\r\n<![endif]-->\r\n\r\n</b></p><table class=\"MsoTableGrid\" style=\"border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;\r\n mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt\" cellspacing=\"0\" cellpadding=\"0\" border=\"1\">\r\n <tbody><tr style=\"mso-yfti-irow:0;mso-yfti-firstrow:yes;height:6.75pt\">\r\n  <td rowspan=\"2\" style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:6.75pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal\" align=\"center\"><strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;\r\n  mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:\r\n  &quot;Times New Roman&quot;;mso-bidi-theme-font:minor-bidi\">Name of Chief Minister</span></strong></p>\r\n  </td>\r\n  <td colspan=\"2\" style=\"width:319.2pt;border:solid windowtext 1.0pt;\r\n  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:\r\n  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:6.75pt\" width=\"426\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal\" align=\"center\"><strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;\r\n  mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:\r\n  &quot;Times New Roman&quot;;mso-bidi-theme-font:minor-bidi\">Tenure</span></strong></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:1;height:6.75pt\">\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:6.75pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal\" align=\"center\"><b style=\"mso-bidi-font-weight:normal\">From</b></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:6.75pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal\" align=\"center\"><b style=\"mso-bidi-font-weight:normal\">To</b></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:2\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. E. M. S. Namboodiripad</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">05 April 1957</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">31 July 1959</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:3\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. Pattom A. Thanu Pillai</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">22 February 1960</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">26 September 1962</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:4\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. R. Sankar</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">26 September 1962</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">10 September 1964</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:5\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. E. M. S. Namboodiripad</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">06 March 1967</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">01 November 1969</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:6\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. C. Achutha Menon</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">01 November 1969</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">01 August 1970</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:7\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. C. Achutha Menon</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">04&nbsp; October 1970</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">25 March 1977</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:8\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. K. Karunakaran</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">25 March 1977</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">25 April 1977</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:9\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. A. K. Antony</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">27 April 1977</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">27 October 1978</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:10\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. P. K. Vasudevan Nair</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">29 October 1978</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">07 October 1979</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:11\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. C. H. Mohammed Koya</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">12 October 1979</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">01 December 1979</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:12\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. E. K. Nayanar</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">25 January 1980</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">20 October 1981</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:13\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. K. Karunakaran</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">28 December 1981</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">17 March 1982</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:14\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. K. Karunakaran</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">24 May 1982</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">25 March 1987</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:15\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. E. K. Nayanar</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">26 March 1987</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">17 June 1991</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:16\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. K. Karunakaran</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">24 June 1991</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">16 March 1995</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:17\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. A. K. Antony</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">22 March 1995</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">09 May 1996</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:18\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. E. K. Nayanar</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">20 May 1996</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">13 May 2001</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:19\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. A. K. Antony</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">17 May 2001</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">29 August 2004</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:20\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. Oommen Chandy</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">31 August 2004</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">12 May 2006</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:21\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. V. S. Achuthanandan</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">18 May 2006</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">14 May 2011</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:22\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. Oommen Chandy</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">18 May 2011</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">20 May 2016</span></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:23;mso-yfti-lastrow:yes\">\r\n  <td style=\"width:159.6pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;Shri. Pinarayi Vijayan</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">25 May 2016</span></p>\r\n  </td>\r\n  <td style=\"width:159.6pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"213\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n<p style=\"text-align: justify;\"><br><br></p>', '<p>മലയാളംമലയാളം<br></p>', 21, 1, 'ddd', 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, 4, '2021-05-21 09:18:00', 0, 1, 4, '2021-05-21 09:09:43');
INSERT INTO `articles` (`id`, `poster`, `alt`, `entooltip`, `maltooltip`, `entitle`, `maltitle`, `ensubtitle`, `malsubtitle`, `enauthor`, `malauthor`, `enbrief`, `malbrief`, `encontent`, `malcontent`, `components_id`, `homepagestatus`, `extras`, `articlecategories_id`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_remarks`, `moderator_status`, `moderator_userid`, `moderator_timestamp`, `approve_remarks`, `approve_status`, `approve_userid`, `approve_timestamp`, `lock_status`, `status`, `users_id`, `created_at`) VALUES
(6, 'article2205202111:42:00.jpg', 'alt', 'sdfsdf', 'മലയാളം', 'Districts', 'മലയാളം', 'cxdfd', 'മലയാളംമലയാളം', 'author name', 'മലയാളംമലയാളം', '<p>\r\n\r\n</p><p class=\"MsoNormal\"><b>Thiruvananthapuram</b></p>\r\n\r\n<p class=\"MsoNormal\">Thiruvananthapuram, the jewel in the emerald necklace that\r\nKerala is for the Indian sub-continent, must surely have been a must-see\r\ndestination for ages, long before National Geographic Traveller classified it\r\nas one. Surely, long before Sage Parasurama, according to local legend, threw\r\nhis divine battle axe from Kanyakumari to Gokarnam to wrest Kerala, \'God\'s Own\r\nLand\' from Varuna the Sea God; before the times of mythical Mahabali the\r\ndemocratic and just ruler of this wonderful land who was sent down to the\r\nnetherworld through deceit. It doesn\'t take any flights of fancy to imagine\r\nthat this land fired the imaginations of intrepid travellers and explorers like\r\nColumbus, Vasco da Gama, Marco Polo, Fa Hien, and quite possibly, countless\r\nothers from the pages of history, recorded or not.</p><br><p><!--[if gte mso 9]><xml>\r\n <o:OfficeDocumentSettings>\r\n  <o:AllowPNG/>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:EnableOpenTypeKerning/>\r\n   <w:DontFlipMirrorIndents/>\r\n   <w:OverrideTableStyleHps/>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val=\"Cambria Math\"/>\r\n   <m:brkBin m:val=\"before\"/>\r\n   <m:brkBinSub m:val=\"&#45;-\"/>\r\n   <m:smallFrac m:val=\"off\"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val=\"0\"/>\r\n   <m:rMargin m:val=\"0\"/>\r\n   <m:defJc m:val=\"centerGroup\"/>\r\n   <m:wrapIndent m:val=\"1440\"/>\r\n   <m:intLim m:val=\"subSup\"/>\r\n   <m:naryLim m:val=\"undOvr\"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"true\"\r\n  DefSemiHidden=\"true\" DefQFormat=\"false\" DefPriority=\"99\"\r\n  LatentStyleCount=\"267\">\r\n  <w:LsdException Locked=\"false\" Priority=\"0\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Normal\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"heading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"35\" QFormat=\"true\" Name=\"caption\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"10\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" Name=\"Default Paragraph Font\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"11\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtitle\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"22\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Strong\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"20\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"59\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Table Grid\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Placeholder Text\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"No Spacing\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Revision\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"34\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"List Paragraph\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"29\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"30\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"19\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"21\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"31\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"32\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"33\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Book Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"37\" Name=\"Bibliography\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" QFormat=\"true\" Name=\"TOC Heading\"/>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin-top:0in;\r\n	mso-para-margin-right:0in;\r\n	mso-para-margin-bottom:10.0pt;\r\n	mso-para-margin-left:0in;\r\n	line-height:115%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:\"Calibri\",\"sans-serif\";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;}\r\n</style>\r\n<![endif]--></p>', '<p>മലയാളംമലയാളം<br></p>', '<p class=\"MsoNormal\"><b>Kollam</b></p>\r\n\r\n<p class=\"MsoNormal\">Kollam or Quilon, an old sea port town on the Arabian coast,\r\nstands on the Ashtamudi Lake. Kollam, the erstwhile Desinganadu, had a\r\nsustained commercial reputation from the days of the Phoenicians and the\r\nRomans. Fed by the Chinese trade, it was regarded by Ibn Batuta, as one of the\r\nfive ports , which he had seen in the course of his travels during a period of\r\ntwenty four years, in the 14th century. Kollam District which is a veritable\r\nKerala in miniature is gifted with unique representative features - sea, lakes,\r\nplains, mountains, rivers, streams, backwaters, forest, vast green fields and\r\ntropical crop of every variety both food crop and cash crop.</p>\r\n\r\n<p class=\"MsoNormal\"><b>Pathanamthitta</b></p>\r\n\r\n<p class=\"MsoNormal\">Pathanamthitta is a combination of two words Pathanam and\r\nThitta, which mean an array of houses on the river side. This district was\r\nformed on 1st November 1982 in the interest of the hastening process of\r\ndevelopment. It is presumed that the regions presently under the district were\r\nformerly under the Pandalam reign which had connections with the Pandya\r\nKingdom. Pathanamthitta now includes portions of the erstwhile Kollam Alappuzha\r\nand Idukki districts. Pathanamthitta, Adoor, Ranni, Konni and Kozhencherry are\r\nsome of the important places taken from Kollam district, whereas Thiruvalla and\r\nMallappally are the major places taken from Alappuzha district.</p>\r\n\r\n<p class=\"MsoNormal\"><b>Alappuzha</b></p>\r\n\r\n<p class=\"MsoNormal\">Alappuzha is a landmark between the broad Arabian Sea and a\r\nnet work of rivers flowing into it. In the early first decade of the 20th\r\nCentury the then Viceroy of the Indian Empire, Lord Curzon made a visit in the\r\nState to Alleppey, now Alappuzha. Fascinated by the Scenic beauty of the place,\r\nin joy and amazement, he said, Here nature has spent up on the land her richest\r\nbounties. In his exhilaration, it is said, he exclaimed, Alleppey, the Venice\r\nof the East. Thus the sobriquet found its place in the world Tourism Map. The\r\npresence of a port and a pier, criss -cross roads and numerous bridges across\r\nthem, a long and unbroken sea coast might have motivated him to make this comparison.\r\nAlleppey has a wonderful past. Though the present town owes its existence to\r\nthe sagacious Diwan Rajakesavadas in the second half of 18th century, district\r\nof Alappuzha figures in classified Literature. Kuttanad, the rice bowl of\r\nKerala with the unending stretch of paddy fields, small streams and canals with\r\nlush green coconut palms , was well known even from the early periods of the\r\nSangam age. History says Alappuzha had trade relations with ancient Greece and\r\nRome in B.C and in the Middle Ages.</p>\r\n\r\n<p class=\"MsoNormal\"><b>Kottayam</b></p>\r\n\r\n<p class=\"MsoNormal\">Kottayam is located in central Kerala and is also the\r\nadministrative capital of Kottayam district. Bordered by the lofty and mighty\r\nWestern Ghats on the east and the Vembanad Lake and paddy fields of Kuttanad on\r\nthe west, Kottayam is a land of unique characteristics. Panoramic backwater\r\nstretches, lush paddy fields, highlands, hills and hillocks, extensive rubber\r\nplantations, places associated with many legends and a totally literate people\r\nhave given Kottayam District the enviable title: The land of letters, legends,\r\nlatex and lakes. The city is an important trading center of spices and\r\ncommercial crops, especially rubber.</p>\r\n\r\n<p class=\"MsoNormal\"><b>Idukki</b></p>\r\n\r\n<p class=\"MsoNormal\">This beautiful high range district of Kerala is\r\ngeographically known for its hills and dense forests. For the people of Kerala,\r\nIdukki is always associated with power generation. About 66% of the State\'s\r\npower needs come from the Hydroelectric Power Projects in Idukki. The district\r\naccounts for 12.9 per cent of the area of Kerala and only 3.7 per cent of the\r\npopulation of Kerala. Idukki district was formed on 26 January 1972. The\r\ndistrict consists of Devikulam, Udumbanchola and Peermedu taluks of the\r\nerstwhile Kottayam district and Thodupuzha taluk (excluding two villages\r\nManjallore and Kalloorkadu) of the erstwhile Ernakulam district. At the time of\r\nformation the district headquarters started functioning at Kottayam and from\r\nthere it was shifted to Painavu in Thodupuzha taluk in June 1976, where it is\r\nproposed to build a new planned forest township.</p>\r\n\r\n<p class=\"MsoNormal\"><b>Ernakulam</b></p>\r\n\r\n<p class=\"MsoNormal\">Ernakulam District was formed on 1 April 1958, from the\r\ntaluks of Aluva, Kunnathunadu, Kochi, Kanayannur, and Paravoor, which were\r\nformerly part of Thrissur District. Initially the district headquarters was at\r\nErnakulam, which gave the district its name the headquarters was later shifted\r\nto Kakkanad. The word/name Ernakulam is derived from a Tamil word Erayanarkulam\r\nwhich means abode of Lord Shiva. Ernakulam district is situated almost at the\r\nmiddle of Kerala State and on the coast of the Arabian Sea. It is also the most\r\nindustrially advanced and flourishing District of Kerala.</p>\r\n\r\n<p class=\"MsoNormal\"><b>Thrissur</b></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;\">The history of Thrissur District\r\nfrom the 9th to the 12th centuries is the history of Kulasekharas of\r\nMahodayapuram and the history since 12th century is the history of the rise and\r\ngrowth of Perumpadappu Swarupam. In the course of its long and chequered\r\nhistory, the Perumpadappu Swarupam had its capital at different places. We\r\nlearn from the literary works of the period that the Perumpadappu Swarupam had\r\nits headquarters at Mahodayapuram and that a number of Naduvazhies in Southern\r\nand Central Kerala recognized the supremacy of the Perumpadappu Moopil. The\r\nPerumpadappu Moopil is even referred to as the \"Kerala Chakravarthi\"\r\nin the \"Sivavilasam\" and some other works. One of the landmarks in\r\nthe history of the Perumpadapu Swarupam is the foundation of a new era called\r\nPudu Vaipu Era. The Pudu Vaipu Era is traditionally believed to have commenced\r\nfrom the date on which the island of Vypeen was formed, following a massive\r\nflood.</span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\nnormal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n\r\n<p class=\"MsoNormal\"><b>Palakkad</b></p>\r\n\r\n<p class=\"MsoNormal\">Palakkad is one of the few districts in Kerala that has no\r\ncoastline. The district opens the state to the rest of the country through the\r\nPalakkad Gap with a width of 32 to 40 km. Its geographical position, historical\r\nbackground, educational status, tourism hot-spots and above all, the\r\ndevelopment activities that are carried out, are wide and varied. The district\r\nis one of the main granaries of Kerala and its economy is primarily\r\nagricultural. The district is also the land of palmyrahs. The present Palakkad\r\ndistrict, as an administrative unit, was formed on the first of January 1957,\r\ncomprising Palakad, Perinthalmanna, Ponnani, Ottapalam, Alathur and Chittur.\r\nLater when Malappuram District was formed excluding Thritala firka of Ponnani\r\nTaluk, Mankada firka and excluding Karkidamkunnu &amp; Chetalloor amsoms of\r\nPerinthelmanna Taluk are transferred to that district and a new taluk was\r\nformed namely Mannarkkad. In 2013, Ottapalam taluk was bifurcated and Pattambi\r\ntaluk was formed.</p>\r\n\r\n<p class=\"MsoNormal\"><b>Malappuram</b></p>\r\n\r\n<p class=\"MsoNormal\">Malappuram (literally, a land a tops hills) is situated 50\r\nkm southeast of Kozhikode, bounded by the Nilgiri Hills in the east, the\r\nArabian sea in the west and Thrissur and Palakkad districts in the south.\r\nMalappuram is enriched by three great rivers flowing through it - the Chaliyar,\r\nthe Kadalundi and the Bharathappuzha. Malappuram has a rich and eventful\r\nhistory. It was the military headquarters of the Zamorins of Kozhikode since\r\nancient times. This district was the venue for many of the Mappila revolts\r\n(uprisings against the British East India Company in Kerala) between 1792 and\r\n1921. It was a famous centre for Hindu - Vedic learning and Islamic philosophy\r\nand a place of cultural heritage.</p>\r\n\r\n<p class=\"MsoNormal\"><b>Kozhikode</b></p>\r\n\r\n<p class=\"MsoNormal\">Opening up the gateway of India to Vasco-da-Gama the\r\nadventurous Portuguese navigator in 1498, Kozhikode has carved for itself a\r\nlandmark in the history of India. The land of the ancient Zamorins had many\r\nmore things to offer to the western world other than the savoury spices for\r\nwhich they even ventured to discover a sea route. Occupying a prominent place\r\nin the international trade map of the country right from the 13th century\r\nKozhikode paved the way for trade tourism in India. This trade centre is\r\nregaining much of its ancient glory by opening up air routes to Persian Gulf\r\nand other regions.</p>\r\n\r\n<p class=\"MsoNormal\"><b>Wayand</b></p>\r\n\r\n<p class=\"MsoNormal\">Wayanad District came into existence on 1st November, 1980\r\nas the 12th District of Kerala consisting of Mananthavady, Sulthan Bathery and\r\nVythiri taluks. The name Wayanad is derived from Vayal Nadu which means the\r\nland of paddy fields. It is a picturesque plateau situated at a height between\r\n700 m and 2100 m above the mean sea level nested among the mountains of the\r\nWestern Ghats on the eastern portion of north Kerala, bordering the states of\r\nTamil Nadu and Karnataka. The district was carved out from the then Kozhikode\r\nand Kannur districts. About 885.92 sq. km of area is under forest. The culture\r\nof Wayanad is mainly tribal oriented. Though considered as backward, this\r\ndistrict is perhaps one of the biggest foreign exchange earners of the State,\r\nwith its production of cash crops like pepper, cardamom, coffee, tea, spices\r\nand other condiments.</p>\r\n\r\n<p class=\"MsoNormal\"><b>Kannur</b></p>\r\n\r\n<p class=\"MsoNormal\">Kannur district derived its name from the location of its\r\nheadquarters at Kannur town. The old name \'Cannanore\' is the anglicised form of\r\nthe Malayalam word Kannur. According to one opinion, \'Kannur\' is a derivation\r\nfrom Kanathur, an ancient village, the name of which survives even today in one\r\nof the wards of Kannur Municipality. Another version is that Kannur might have\r\nassumed its name from one of the , deities of the Hindu pantheon, a compound of\r\ntwo words, Kannan (Lord Krishna) and Ur (place) making it the place of Lord\r\nKrishna. In this context, it is worth mentioning that the deity of the Katalayi\r\nSreekrishna temple was originally installed in a shrine at Katalayi Kotta in\r\nthe south eastern part of the present Kannur town.</p>\r\n\r\n<p class=\"MsoNormal\"><b>Kasargod</b></p>\r\n\r\n<p class=\"MsoNormal\">Lying at the northern tip of Kerala bounded by the Western\r\nGhats in the east and Arabian sea in the west; twelve rivers flowing across its\r\nterrain, Kasaragod is an enchanting beauty of Nature\'s creations. There are\r\ndifferent views on the derivation of the name \"KASARAGOD\". One view\r\nis that it is the combination of two Sanskrit words Kaasaara (which means lake\r\nor pond) and Kroda (which means a place where treasure is kept). Another view\r\nis that it is the place where Kaasaraka trees (Strychnos nux vomica or\r\nKaanjiram or Kaaraskara) are in abundance. Both views are relevant as there are\r\nlarge number of rivers, lakes and ponds in the coastal belt of the district\r\nbesides thick flora consisting of innumerable varieties of trees, shrubs etc.\r\nparticularly plenty of Kaasaraka trees. Many Arab travellers, who came to\r\nKerala between 9th and 14th centuries A.D., visited Kasaragod as it was then an\r\nimportant trade centre. They called this area Harkwillia. Mr. Barbose, the\r\nPortuguese traveller,who visited Kumbla near Kasaragod in 1514, had recorded\r\nthat rice was exported to Male Island whence coir was imported. Dr.Francis\r\nBuchanan, who was the family doctor of Lord Wellesly, visited Kasaragod in\r\n1800. In his travelogue, he has included information on the political and communal\r\nset-up in places like Athiparamba, Kavvai, Nileshwar, Bekkal, Chandragiri and\r\nManjeshwar.</p>', '<p>മലയാളംമലയാളം<br></p>', 21, 1, 'ddd', 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, 4, '2021-05-22 06:12:00', 0, 1, 4, '2021-05-22 06:12:00');
INSERT INTO `articles` (`id`, `poster`, `alt`, `entooltip`, `maltooltip`, `entitle`, `maltitle`, `ensubtitle`, `malsubtitle`, `enauthor`, `malauthor`, `enbrief`, `malbrief`, `encontent`, `malcontent`, `components_id`, `homepagestatus`, `extras`, `articlecategories_id`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_remarks`, `moderator_status`, `moderator_userid`, `moderator_timestamp`, `approve_remarks`, `approve_status`, `approve_userid`, `approve_timestamp`, `lock_status`, `status`, `users_id`, `created_at`) VALUES
(7, 'article2705202114:40:08.jpg', 'alt', 'tool', 'മലയാളം', 'Contact Us', 'മലയാളം', 'cxdfd', 'മലയാളംമലയാളം', 'author name', 'മലയാളംമലയാളം', '<h2 class=\"portlet-title\"><span class=\"portlet-title-text\" tabindex=\"0\">Kerala State IT Mission, Department of Electronics and Information Technology</span></h2>', '<p>മലയാളംമലയാളം<br></p>', '<p>\r\n\r\n</p><table class=\"MsoTableGrid\" style=\"border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;\r\n mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt\" cellspacing=\"0\" cellpadding=\"0\" border=\"1\">\r\n <tbody><tr style=\"mso-yfti-irow:0;mso-yfti-firstrow:yes\">\r\n  <td style=\"width:239.4pt;border:solid windowtext 1.0pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"319\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal;mso-outline-level:2\"><b><span style=\"font-size:18.0pt;\r\n  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Kerala\r\n  State IT Mission, Department of </span></b></p>\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal;mso-outline-level:2\"><b><span style=\"font-size:18.0pt;\r\n  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Electronics\r\n  and Information Technology</span></b></p>\r\n  </td>\r\n  <td style=\"width:239.4pt;border:solid windowtext 1.0pt;\r\n  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:\r\n  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"319\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal;mso-outline-level:2\"><b><span style=\"font-size:18.0pt;\r\n  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Information\r\n  Public Relations Department </span></b></p>\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal;mso-outline-level:2\"><b><span style=\"font-size:18.0pt;\r\n  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></b></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:1;mso-yfti-lastrow:yes\">\r\n  <td style=\"width:239.4pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"319\" valign=\"top\">\r\n  <table class=\"MsoNormalTable\" style=\"mso-cellspacing:1.5pt;mso-yfti-tbllook:1184;mso-table-lspace:2.5pt;\r\n   margin-left:.25pt;mso-table-rspace:2.25pt;mso-table-anchor-vertical:paragraph;\r\n   mso-table-anchor-horizontal:column;mso-table-left:left\" cellpadding=\"0\" border=\"0\" align=\"left\">\r\n   <tbody><tr style=\"mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes\">\r\n    <td style=\"width:368.25pt;padding:.75pt .75pt .75pt .75pt\" width=\"491\">\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><b><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Sri.\r\n    K Mohammed Y Safirulla IAS</span></b><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Secretary</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Department\r\n    of Electronics and Information Technology</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Room\r\n    No. 656,South Block,</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Secretariat</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Ph-0471-\r\n    2518313</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">E-mail:&nbsp;\r\n    secy.itd@kerala.gov.in</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><b><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Dr.\r\n    Chithra S. IAS</span></b><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Director</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">E-mail:\r\n    director.ksitm@kerala.gov.in&nbsp;</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Tel:\r\n    +91 471 2726881</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><b><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">N.\r\n    Jayaraj</span></b><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Head\r\n    e-Governance</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">E-mail:\r\n    jayaraj.ksitm@kerala.gov.in</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Help\r\n    Desk</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Tel:\r\n    +91 471 2726881, 2314307, 2725646</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Fax:\r\n    +91 471 2314284</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">E-mail:\r\n    helpdesk.ksitm@kerala.gov.in</span></p>\r\n    </td>\r\n   </tr>\r\n  </tbody></table>\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span><b><span style=\"font-size:18.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:\r\n  &quot;Times New Roman&quot;\"></span></b></p>\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal;mso-outline-level:2\"><b><span style=\"font-size:18.0pt;\r\n  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Citizen\r\n  Call Centre </span></b></p>\r\n  <table class=\"MsoNormalTable\" style=\"mso-cellspacing:1.5pt;mso-yfti-tbllook:1184;mso-table-lspace:2.5pt;\r\n   margin-left:.25pt;mso-table-rspace:2.25pt;mso-table-anchor-vertical:paragraph;\r\n   mso-table-anchor-horizontal:column;mso-table-left:left\" cellpadding=\"0\" border=\"0\" align=\"left\">\r\n   <tbody><tr style=\"mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes\">\r\n    <td style=\"padding:.75pt .75pt .75pt .75pt\">\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">155 300/2335523 (From Landline\r\n    Nos)</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">0471-155 300/0471-2335523(From\r\n    Mobile Networks)</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n    </td>\r\n   </tr>\r\n  </tbody></table>\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span><b><span style=\"font-size:18.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:\r\n  &quot;Times New Roman&quot;\">Secretariat Enquiry </span></b></p>\r\n  <table class=\"MsoNormalTable\" style=\"mso-cellspacing:1.5pt;mso-yfti-tbllook:1184;mso-table-lspace:2.5pt;\r\n   margin-left:.25pt;mso-table-rspace:2.25pt;mso-table-anchor-vertical:paragraph;\r\n   mso-table-anchor-horizontal:column;mso-table-left:left\" cellpadding=\"0\" border=\"0\" align=\"left\">\r\n   <tbody><tr style=\"mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes\">\r\n    <td style=\"padding:.75pt .75pt .75pt .75pt\">\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">Tel: 0471- 2336576</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><b><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">Other than office hours from\r\n    5.30 pm- 9.30 am</span></b><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">Tel: 0471- 2327558/ 2518202</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><b><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">Secretariat Fax Centre</span></b><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:\r\n    &quot;Times New Roman&quot;\"></span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">Fax: 0471- 2333115</span></p>\r\n    </td>\r\n   </tr>\r\n  </tbody></table>\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal;mso-outline-level:2\"><b><span style=\"font-size:18.0pt;\r\n  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></b></p>\r\n  </td>\r\n  <td style=\"width:239.4pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"319\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><b><span style=\"font-size:12.0pt;font-family:\r\n  &quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></b></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><b><span style=\"font-size:12.0pt;font-family:\r\n  &quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Sri. P.\r\n  Venugopal IAS</span></b><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Secretary</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Room No. 395</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">1st Floor, Main Block, Government\r\n  Secretariat</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Tel: 2518451 / 2338533</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">E-mail: secy.prd@kerala.gov.in</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><b><span style=\"font-size:12.0pt;font-family:\r\n  &quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Sri.&nbsp;\r\n  S. Harikishore IAS</span></b><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Director</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Tel: 0471-2327782, 2518443</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">E-mail: prddirector@gmail.com</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><b><span style=\"font-size:12.0pt;font-family:\r\n  &quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Sri. K.\r\n  Abdul Rasheed</span></b><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Additional Director (Electronic\r\n  Media Division)&nbsp;</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Information &amp; Public Relations\r\n  Department&nbsp;</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Ground Floor, South Block</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Government Secretariat&nbsp;</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Tel: 0471-2325689, 2518337</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><b><span style=\"font-size:12.0pt;font-family:\r\n  &quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Web\r\n  &amp; New Media, I&amp;PRD</span></b><span style=\"font-size:12.0pt;\r\n  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Tel: 0471-2322150</span></p>\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal;mso-outline-level:2\"><span style=\"font-size:12.0pt;\r\n  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Email:\r\n  webprd@kerala.gov.in</span><b><span style=\"font-size:18.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></b></p>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n<p><!--[if gte mso 9]><xml>\r\n <o:OfficeDocumentSettings>\r\n  <o:AllowPNG/>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:EnableOpenTypeKerning/>\r\n   <w:DontFlipMirrorIndents/>\r\n   <w:OverrideTableStyleHps/>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val=\"Cambria Math\"/>\r\n   <m:brkBin m:val=\"before\"/>\r\n   <m:brkBinSub m:val=\"&#45;-\"/>\r\n   <m:smallFrac m:val=\"off\"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val=\"0\"/>\r\n   <m:rMargin m:val=\"0\"/>\r\n   <m:defJc m:val=\"centerGroup\"/>\r\n   <m:wrapIndent m:val=\"1440\"/>\r\n   <m:intLim m:val=\"subSup\"/>\r\n   <m:naryLim m:val=\"undOvr\"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"true\"\r\n  DefSemiHidden=\"true\" DefQFormat=\"false\" DefPriority=\"99\"\r\n  LatentStyleCount=\"267\">\r\n  <w:LsdException Locked=\"false\" Priority=\"0\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Normal\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"heading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"35\" QFormat=\"true\" Name=\"caption\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"10\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" Name=\"Default Paragraph Font\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"11\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtitle\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"22\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Strong\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"20\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"59\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Table Grid\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Placeholder Text\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"No Spacing\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Revision\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"34\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"List Paragraph\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"29\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"30\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"19\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"21\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"31\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"32\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"33\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Book Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"37\" Name=\"Bibliography\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" QFormat=\"true\" Name=\"TOC Heading\"/>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin-top:0in;\r\n	mso-para-margin-right:0in;\r\n	mso-para-margin-bottom:10.0pt;\r\n	mso-para-margin-left:0in;\r\n	line-height:115%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:\"Calibri\",\"sans-serif\";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;}\r\ntable.MsoTableGrid\r\n	{mso-style-name:\"Table Grid\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-priority:59;\r\n	mso-style-unhide:no;\r\n	border:solid windowtext 1.0pt;\r\n	mso-border-alt:solid windowtext .5pt;\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-border-insideh:.5pt solid windowtext;\r\n	mso-border-insidev:.5pt solid windowtext;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:\"Calibri\",\"sans-serif\";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;}\r\n</style>\r\n<![endif]--></p>', '<p>\r\n\r\n</p><table class=\"MsoTableGrid\" style=\"border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;\r\n mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt\" cellspacing=\"0\" cellpadding=\"0\" border=\"1\">\r\n <tbody><tr style=\"mso-yfti-irow:0;mso-yfti-firstrow:yes\">\r\n  <td style=\"width:239.4pt;border:solid windowtext 1.0pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"319\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal;mso-outline-level:2\"><b><span style=\"font-size:18.0pt;\r\n  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Kerala\r\n  State IT Mission, Department of </span></b></p>\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal;mso-outline-level:2\"><b><span style=\"font-size:18.0pt;\r\n  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Electronics\r\n  and Information Technology</span></b></p>\r\n  </td>\r\n  <td style=\"width:239.4pt;border:solid windowtext 1.0pt;\r\n  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:\r\n  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"319\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal;mso-outline-level:2\"><b><span style=\"font-size:18.0pt;\r\n  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Information\r\n  Public Relations Department </span></b></p>\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal;mso-outline-level:2\"><b><span style=\"font-size:18.0pt;\r\n  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></b></p>\r\n  </td>\r\n </tr>\r\n <tr style=\"mso-yfti-irow:1;mso-yfti-lastrow:yes\">\r\n  <td style=\"width:239.4pt;border:solid windowtext 1.0pt;\r\n  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;\r\n  padding:0in 5.4pt 0in 5.4pt\" width=\"319\" valign=\"top\">\r\n  <table class=\"MsoNormalTable\" style=\"mso-cellspacing:1.5pt;mso-yfti-tbllook:1184;mso-table-lspace:2.5pt;\r\n   margin-left:.25pt;mso-table-rspace:2.25pt;mso-table-anchor-vertical:paragraph;\r\n   mso-table-anchor-horizontal:column;mso-table-left:left\" cellpadding=\"0\" border=\"0\" align=\"left\">\r\n   <tbody><tr style=\"mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes\">\r\n    <td style=\"width:368.25pt;padding:.75pt .75pt .75pt .75pt\" width=\"491\">\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><b><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Sri.\r\n    K Mohammed Y Safirulla IAS</span></b><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Secretary</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Department\r\n    of Electronics and Information Technology</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Room\r\n    No. 656,South Block,</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Secretariat</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Ph-0471-\r\n    2518313</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">E-mail:&nbsp;\r\n    secy.itd@kerala.gov.in</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><b><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Dr.\r\n    Chithra S. IAS</span></b><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Director</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">E-mail:\r\n    director.ksitm@kerala.gov.in&nbsp;</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Tel:\r\n    +91 471 2726881</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><b><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">N.\r\n    Jayaraj</span></b><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Head\r\n    e-Governance</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">E-mail:\r\n    jayaraj.ksitm@kerala.gov.in</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Help\r\n    Desk</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Tel:\r\n    +91 471 2726881, 2314307, 2725646</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Fax:\r\n    +91 471 2314284</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    text-align:justify;line-height:normal\"><span style=\"font-size:12.0pt;\r\n    font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">E-mail:\r\n    helpdesk.ksitm@kerala.gov.in</span></p>\r\n    </td>\r\n   </tr>\r\n  </tbody></table>\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span><b><span style=\"font-size:18.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:\r\n  &quot;Times New Roman&quot;\"></span></b></p>\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal;mso-outline-level:2\"><b><span style=\"font-size:18.0pt;\r\n  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Citizen\r\n  Call Centre </span></b></p>\r\n  <table class=\"MsoNormalTable\" style=\"mso-cellspacing:1.5pt;mso-yfti-tbllook:1184;mso-table-lspace:2.5pt;\r\n   margin-left:.25pt;mso-table-rspace:2.25pt;mso-table-anchor-vertical:paragraph;\r\n   mso-table-anchor-horizontal:column;mso-table-left:left\" cellpadding=\"0\" border=\"0\" align=\"left\">\r\n   <tbody><tr style=\"mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes\">\r\n    <td style=\"padding:.75pt .75pt .75pt .75pt\">\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">155 300/2335523 (From Landline\r\n    Nos)</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">0471-155 300/0471-2335523(From\r\n    Mobile Networks)</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n    </td>\r\n   </tr>\r\n  </tbody></table>\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span><b><span style=\"font-size:18.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:\r\n  &quot;Times New Roman&quot;\">Secretariat Enquiry </span></b></p>\r\n  <table class=\"MsoNormalTable\" style=\"mso-cellspacing:1.5pt;mso-yfti-tbllook:1184;mso-table-lspace:2.5pt;\r\n   margin-left:.25pt;mso-table-rspace:2.25pt;mso-table-anchor-vertical:paragraph;\r\n   mso-table-anchor-horizontal:column;mso-table-left:left\" cellpadding=\"0\" border=\"0\" align=\"left\">\r\n   <tbody><tr style=\"mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes\">\r\n    <td style=\"padding:.75pt .75pt .75pt .75pt\">\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">Tel: 0471- 2336576</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><b><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">Other than office hours from\r\n    5.30 pm- 9.30 am</span></b><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">Tel: 0471- 2327558/ 2518202</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><b><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">Secretariat Fax Centre</span></b><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:\r\n    &quot;Times New Roman&quot;\"></span></p>\r\n    <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;\r\n    line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n    mso-fareast-font-family:&quot;Times New Roman&quot;\">Fax: 0471- 2333115</span></p>\r\n    </td>\r\n   </tr>\r\n  </tbody></table>\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal;mso-outline-level:2\"><b><span style=\"font-size:18.0pt;\r\n  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></b></p>\r\n  </td>\r\n  <td style=\"width:239.4pt;border-top:none;border-left:\r\n  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;\r\n  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt\" width=\"319\" valign=\"top\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><b><span style=\"font-size:12.0pt;font-family:\r\n  &quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></b></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><b><span style=\"font-size:12.0pt;font-family:\r\n  &quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Sri. P.\r\n  Venugopal IAS</span></b><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Secretary</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Room No. 395</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">1st Floor, Main Block, Government\r\n  Secretariat</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Tel: 2518451 / 2338533</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">E-mail: secy.prd@kerala.gov.in</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><b><span style=\"font-size:12.0pt;font-family:\r\n  &quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Sri.&nbsp;\r\n  S. Harikishore IAS</span></b><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Director</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Tel: 0471-2327782, 2518443</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">E-mail: prddirector@gmail.com</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><b><span style=\"font-size:12.0pt;font-family:\r\n  &quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Sri. K.\r\n  Abdul Rasheed</span></b><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Additional Director (Electronic\r\n  Media Division)&nbsp;</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Information &amp; Public Relations\r\n  Department&nbsp;</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Ground Floor, South Block</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Government Secretariat&nbsp;</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Tel: 0471-2325689, 2518337</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><b><span style=\"font-size:12.0pt;font-family:\r\n  &quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Web\r\n  &amp; New Media, I&amp;PRD</span></b><span style=\"font-size:12.0pt;\r\n  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\n  justify;line-height:normal\"><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\">Tel: 0471-2322150</span></p>\r\n  <p class=\"MsoNormal\" style=\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\r\n  line-height:normal;mso-outline-level:2\"><span style=\"font-size:12.0pt;\r\n  font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;\">Email:\r\n  webprd@kerala.gov.in</span><b><span style=\"font-size:18.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\n  mso-fareast-font-family:&quot;Times New Roman&quot;\"></span></b></p>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n<p><!--[if gte mso 9]><xml>\r\n <o:OfficeDocumentSettings>\r\n  <o:AllowPNG/>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:EnableOpenTypeKerning/>\r\n   <w:DontFlipMirrorIndents/>\r\n   <w:OverrideTableStyleHps/>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val=\"Cambria Math\"/>\r\n   <m:brkBin m:val=\"before\"/>\r\n   <m:brkBinSub m:val=\"&#45;-\"/>\r\n   <m:smallFrac m:val=\"off\"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val=\"0\"/>\r\n   <m:rMargin m:val=\"0\"/>\r\n   <m:defJc m:val=\"centerGroup\"/>\r\n   <m:wrapIndent m:val=\"1440\"/>\r\n   <m:intLim m:val=\"subSup\"/>\r\n   <m:naryLim m:val=\"undOvr\"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"true\"\r\n  DefSemiHidden=\"true\" DefQFormat=\"false\" DefPriority=\"99\"\r\n  LatentStyleCount=\"267\">\r\n  <w:LsdException Locked=\"false\" Priority=\"0\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Normal\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"heading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"35\" QFormat=\"true\" Name=\"caption\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"10\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" Name=\"Default Paragraph Font\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"11\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtitle\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"22\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Strong\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"20\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"59\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Table Grid\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Placeholder Text\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"No Spacing\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Revision\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"34\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"List Paragraph\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"29\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"30\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"19\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"21\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"31\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"32\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"33\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Book Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"37\" Name=\"Bibliography\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" QFormat=\"true\" Name=\"TOC Heading\"/>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin-top:0in;\r\n	mso-para-margin-right:0in;\r\n	mso-para-margin-bottom:10.0pt;\r\n	mso-para-margin-left:0in;\r\n	line-height:115%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:\"Calibri\",\"sans-serif\";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;}\r\ntable.MsoTableGrid\r\n	{mso-style-name:\"Table Grid\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-priority:59;\r\n	mso-style-unhide:no;\r\n	border:solid windowtext 1.0pt;\r\n	mso-border-alt:solid windowtext .5pt;\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-border-insideh:.5pt solid windowtext;\r\n	mso-border-insidev:.5pt solid windowtext;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:\"Calibri\",\"sans-serif\";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;}\r\n</style>\r\n<![endif]--></p>', 21, 1, 'ddd', 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, 4, '2021-05-27 09:10:08', 0, 1, 4, '2021-05-27 09:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `articleuploads`
--

CREATE TABLE `articleuploads` (
  `id` bigint UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `articles_id` bigint UNSIGNED NOT NULL,
  `filetypes_id` bigint UNSIGNED NOT NULL,
  `contenttypes_id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ensubtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malsubtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contributor_status` int NOT NULL DEFAULT '0',
  `contributor_userid` int NOT NULL DEFAULT '0',
  `contributor_timestamp` timestamp NULL DEFAULT NULL,
  `moderator_status` int NOT NULL DEFAULT '0',
  `moderator_userid` int NOT NULL DEFAULT '0',
  `moderator_timestamp` timestamp NULL DEFAULT NULL,
  `approve_status` int NOT NULL DEFAULT '0',
  `approve_userid` int NOT NULL DEFAULT '0',
  `approve_timestamp` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `file`, `alt`, `entitle`, `maltitle`, `ensubtitle`, `malsubtitle`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_status`, `moderator_userid`, `moderator_timestamp`, `approve_status`, `approve_userid`, `approve_timestamp`, `status`, `users_id`, `created_at`) VALUES
(1, 'banner2106202113:25:11.jpg', 'rrrfd', 'rdfgdfgdgfffhh', 'dsdg', 'fgdfgd', 'dfgdgfdf', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 1, 3, '2021-04-16 06:38:26'),
(2, 'banner2106202113:25:23.jpg', 'banneralt', 'banner', 'ബാനർ', 'bannerbannerbanner', 'ബാനർ ബാനർ ബാനർ', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 1, 3, '2021-05-12 08:22:48'),
(3, 'banner2106202113:25:36.jpg', 'banneraltss', 'ccczxczx', 'മലയാളം', 'bannerbannerbanner', 'ബാനർ ബാനർ ബാനർ', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 1, 3, '2021-05-12 08:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `buttons`
--

CREATE TABLE `buttons` (
  `id` bigint UNSIGNED NOT NULL,
  `file` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iconclass` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colorclass` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `components_id` bigint NOT NULL DEFAULT '0',
  `articles_id` bigint NOT NULL DEFAULT '0',
  `menulinktypes_id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `committees`
--

INSERT INTO `committees` (`id`, `entitle`, `maltitle`, `status`, `users_id`, `created_at`) VALUES
(1, 'CommitteeA', 'fdfghh', 1, 9, '2021-04-12 04:15:27'),
(3, 'gfdffg', '654565', 1, 2, '2021-05-06 06:42:30'),
(4, 'shabeeba', 'മൂല്യനിർണ്ണയം', 1, 2, '2021-05-06 07:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `communicationattachments`
--

CREATE TABLE `communicationattachments` (
  `id` bigint UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `communications_id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `communicationattachments`
--

INSERT INTO `communicationattachments` (`id`, `file`, `communications_id`, `status`, `users_id`, `created_at`) VALUES
(2, '60753cdb6b319_Screenshot from 2021-03-26 15-47-20.png', 3, 1, 2, '2021-04-13 01:10:29'),
(3, '60753d29785bf_Screenshot from 2021-03-26 15-47-37.png', 4, 1, 2, '2021-04-13 01:11:46'),
(4, '60753df0e487d_Screenshot from 2021-03-26 15-45-44.png', 5, 1, 2, '2021-04-13 01:15:06'),
(5, '6075431de3353_Screenshot from 2021-03-26 15-48-46.png', 16, 1, 2, '2021-04-13 01:37:32'),
(6, '60754383c66db_Screenshot from 2021-03-26 15-47-49.png', 17, 1, 2, '2021-04-13 01:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `communications`
--

CREATE TABLE `communications` (
  `id` bigint UNSIGNED NOT NULL,
  `subject` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `communicationto` bigint UNSIGNED NOT NULL,
  `communicationtypes_id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `communications`
--

INSERT INTO `communications` (`id`, `subject`, `content`, `communicationto`, `communicationtypes_id`, `status`, `users_id`, `created_at`) VALUES
(1, 'Test', 'hdsfhhgajsgd hjgdgjhasgdgasd ghjhgsdjhgasd jhgjhgjhsd jhgjhgjhgd nahgsdhgvahbsnd', 1, 2, 1, 2, '2021-04-13 00:29:52'),
(3, 'Test Mail', 'fghfgh', 1, 2, 1, 2, '2021-04-13 01:10:29'),
(4, 'Test Mailddd', 'xvxcv', 1, 2, 1, 2, '2021-04-13 01:11:46'),
(5, 'hgasfhgsd', 'dfiugydiurtg', 1, 2, 1, 2, '2021-04-13 01:15:06'),
(6, 'hgasfhgsd', 'dfiugydiurtg', 1, 2, 1, 2, '2021-04-13 01:18:19'),
(7, 'hgasfhgsd', 'dfiugydiurtg', 1, 2, 1, 2, '2021-04-13 01:19:01'),
(8, 'hgasfhgsd', 'dfiugydiurtg', 1, 2, 1, 2, '2021-04-13 01:21:55'),
(9, 'hgasfhgsd', 'dfiugydiurtg', 1, 2, 1, 2, '2021-04-13 01:23:58'),
(10, 'hgasfhgsd', 'dfiugydiurtg', 1, 2, 1, 2, '2021-04-13 01:24:32'),
(11, 'hgasfhgsd', 'dfiugydiurtg', 1, 2, 1, 2, '2021-04-13 01:26:40'),
(12, 'hgasfhgsd', 'dfiugydiurtg', 1, 2, 1, 2, '2021-04-13 01:27:44'),
(13, 'hgasfhgsd', 'dfiugydiurtg', 1, 2, 1, 2, '2021-04-13 01:27:50'),
(14, 'hgasfhgsd', 'dfiugydiurtg', 1, 2, 1, 2, '2021-04-13 01:28:55'),
(15, 'hgasfhgsd', 'dfiugydiurtg', 1, 2, 1, 2, '2021-04-13 01:29:42'),
(16, 'hgasfhgsd dd', 'hfhfgh ddf', 1, 2, 1, 2, '2021-04-13 01:37:31'),
(17, 'ertwet', 'etertert erertert', 1, 2, 2, 2, '2021-04-13 01:39:21'),
(18, 'ertwet', 'etertert erertert', 1, 2, 1, 2, '2021-04-13 01:42:09'),
(19, 'ertwet', 'etertert erertert', 1, 2, 1, 2, '2021-04-13 01:46:04'),
(20, 'ertwet', 'etertert erertert', 1, 2, 1, 2, '2021-04-13 01:48:34'),
(21, 'ertwet', 'etertert erertert', 1, 2, 1, 2, '2021-04-13 01:50:46'),
(22, 'ertwet', 'etertert erertert', 1, 2, 1, 2, '2021-04-13 01:53:10'),
(23, 'ertwet', 'etertert erertert', 1, 2, 1, 2, '2021-04-13 01:54:43'),
(24, 'ertwet', 'etertert erertert', 1, 2, 1, 2, '2021-04-13 01:56:02'),
(25, 'ertwet', 'etertert erertert', 1, 2, 1, 2, '2021-04-13 02:02:49'),
(29, 'Test', 'yerery', 1, 1, 2, 9, '2021-04-26 03:54:15'),
(30, 'vfhkgkhhkhk', 'dcsfdsfgdfgdf', 1, 1, 1, 9, '2021-04-26 03:54:27'),
(31, 'fdfggfdg', 'fdgdfghgfhghgh', 1, 1, 1, 9, '2021-04-26 03:57:15'),
(32, 'aaaaaaaaaaaassssssss', 'addwdwd dfwefgefe', 1, 2, 1, 9, '2021-04-26 03:57:50'),
(34, 'aaaaaaaaaaaassssssss', 'addwdwd dfwefgefe', 1, 1, 1, 9, '2021-04-26 04:01:10'),
(35, 'aaaaaaaaaaaassssssss', 'addwdwd dfwefgefe', 1, 1, 1, 9, '2021-04-26 04:14:39'),
(36, 'aaaaaaaaaaaassssssss', 'addwdwd dfwefgefe', 1, 1, 1, 9, '2021-04-26 04:14:49'),
(37, 'aaaaaaaaaaaassssssss', 'addwdwd dfwefgefe', 1, 1, 1, 9, '2021-04-26 04:16:28'),
(38, 'sddddddddddd', 'sadddddddd', 1, 1, 1, 10, '2021-04-26 05:44:24'),
(39, 'cdvxv', '<p>cvcxvc</p>', 1, 2, 1, 2, '2021-05-05 18:45:17'),
(40, 'cdvxv', '<p>cvcxvc</p>', 1, 2, 1, 2, '2021-05-05 18:45:18'),
(41, 'cdvxv', '<p>cvcxvc</p>', 1, 2, 1, 2, '2021-05-05 18:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `communicationtypes`
--

CREATE TABLE `communicationtypes` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `communicationtypes`
--

INSERT INTO `communicationtypes` (`id`, `entitle`, `status`, `users_id`, `created_at`) VALUES
(1, 'SMS', 1, 1, '2021-04-13 04:52:20'),
(2, 'Email', 1, 1, '2021-04-13 04:52:20'),
(7, 'shabeeba', 1, 1, '2021-05-10 07:03:28'),
(9, 'dfgfdgfdg fgfg', 1, 1, '2021-07-20 10:17:34'),
(10, 'vcbcv', 1, 1, '2021-07-20 10:19:22'),
(11, 'vcbvb', 1, 1, '2021-07-20 10:19:40'),
(12, 'gdfgfg', 1, 1, '2021-07-20 10:19:51'),
(13, 'fdgdfg', 1, 1, '2021-07-20 10:20:03'),
(14, 'fdgfdg', 1, 1, '2021-07-20 10:20:12'),
(15, 'dfggfdg', 1, 1, '2021-07-20 10:20:31'),
(16, 'wrefdfdx', 1, 1, '2021-07-20 10:22:42'),
(17, 'wrwr', 1, 1, '2021-07-20 10:23:58'),
(18, 'sdSAD', 1, 1, '2021-07-20 10:24:09'),
(19, 'SADasd', 1, 1, '2021-07-20 10:24:19'),
(20, 'aSDSadsd', 1, 1, '2021-07-20 10:24:35'),
(21, 'ffsdfds', 1, 1, '2021-07-20 10:24:48'),
(22, 'dsfdsfd', 1, 1, '2021-07-20 10:25:02'),
(23, 'dsfdsfwqewqe', 1, 1, '2021-07-20 10:25:18'),
(24, 'rfref', 1, 1, '2021-07-20 10:25:29'),
(25, 'sddaaaa', 1, 1, '2021-07-22 04:37:17'),
(26, 'rtfdgdf', 1, 1, '2021-07-22 04:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `componentarticles`
--

CREATE TABLE `componentarticles` (
  `id` bigint UNSIGNED NOT NULL,
  `iconclass` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ensubtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malsubtitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malcontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `components_id` tinyint(1) NOT NULL,
  `homepagestatus` tinyint NOT NULL DEFAULT '0',
  `maplinks` text COLLATE utf8mb4_unicode_ci,
  `contributor_status` int NOT NULL DEFAULT '0',
  `contributor_userid` int NOT NULL DEFAULT '0',
  `contributor_timestamp` timestamp NULL DEFAULT NULL,
  `moderator_remarks` text COLLATE utf8mb4_unicode_ci,
  `moderator_status` int NOT NULL DEFAULT '0',
  `moderator_userid` int NOT NULL DEFAULT '0',
  `moderator_timestamp` timestamp NULL DEFAULT NULL,
  `approve_remarks` text COLLATE utf8mb4_unicode_ci,
  `approve_status` int NOT NULL DEFAULT '0',
  `approve_userid` int NOT NULL DEFAULT '0',
  `approve_timestamp` timestamp NULL DEFAULT NULL,
  `lock_status` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `componentarticles`
--

INSERT INTO `componentarticles` (`id`, `iconclass`, `entooltip`, `maltooltip`, `entitle`, `maltitle`, `ensubtitle`, `malsubtitle`, `encontent`, `malcontent`, `components_id`, `homepagestatus`, `maplinks`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_remarks`, `moderator_status`, `moderator_userid`, `moderator_timestamp`, `approve_remarks`, `approve_status`, `approve_userid`, `approve_timestamp`, `lock_status`, `status`, `users_id`, `created_at`) VALUES
(1, 'sdfsdf', 'sdfsdf', 'sdfsdf', 'sdfsdfdf', 'sdfsdf', 'sdfsdf', 'sdfsdf', 'ASAsasdasa', 'fsdfsdfsdf', 3, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 4, '2021-04-21 09:38:33'),
(2, 'sssssss', 'eeeee', 'sdsdfsf', 'sdfsdf', 'sdfsdf', 'sdfdfgdf', 'dfgdfg', 'dfgdfg', 'sdfsdf', 5, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 4, '2021-04-21 09:49:21'),
(3, 'cccccc', 'asad', 'ddddd', 'cccc', 'ccccccc', 'cccccc', 'cccccc', 'cccccccc', 'ccccccc', 6, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 4, '2021-04-21 10:00:36'),
(4, 'sfsdfsdfsdfsfs', 'aaaaaa', 'rrrr', 'ccccc', 'hhhhhh', 'iiiiii', 'vvvvvv', 'eeeeeeee', 'sdfsdfsfsdfsf', 7, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 4, '2021-04-21 10:10:16'),
(5, 'dsssssssss', 'ssssss', 'sssssss', 'ddddddd', 'ddddddd', 'fffffffff', 'bbbbbbbb', 'dfgdfgdfg', 'sdfsdfsdfsdf', 8, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 4, '2021-04-21 10:21:19'),
(6, 'asdasd', 'sssss', 'dfdfd', 'dfgdfg', 'dfgdfg', 'fghghjghj', 'hjkhjkhjk', 'sdfsdfs', 'dfsdfsdfg', 9, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 4, '2021-04-21 10:34:36'),
(7, 'ggggggg', 'dfgdfg', 'gggggg', 'ggggg', 'ggggg', 'gggggg', 'gggggggg', 'gggggg', 'ggggg', 10, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 4, '2021-04-21 11:59:20'),
(8, 'sdfsdfsf', 'ssssss', 'eeeee', 'rrrrrrr', 'vvvvv', 'iiiiii', 'cccccc', 'eeeeeee', 'sdfsdfsdf', 11, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 4, '2021-04-21 12:10:54'),
(9, 'asdasd', 'zczxczxc', 'zczxczxc', 'Contacts', 'zxczxc', 'zxczxc', 'ZXZxasda', 'Address line 1 <br>\r\n            Address line 1 <br>\r\n            Address line 1 <br>\r\n            Address line 1 <br>\r\n            <i class=\"fas fa-phone-alt\"></i>&nbsp; 99999999999 <br>\r\n            <i class=\"fas fa-at\"></i>&nbsp; email@email.com', 'asdas', 12, 0, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.611509550513!2d76.9624495496608!3d8.439755793901169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b05a52aa94e35b7%3A0xb2bc2f81bdc7c7c7!2sCDIT%2C+Karinkadamugal%2C+Thiruvananthapuram%2C+Kerala+695027!5e0!3m2!1sen!2sin!4v1549270335292', 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 4, '2021-04-22 03:36:13'),
(10, 'sdfsdfsdf', 'sdsdf', 'sdfsd', 'sdfsdf', 'sdfsdf', 'sdfsdf', 'sdfsdf', 'sdfsd', 'sdfsd', 13, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 4, '2021-04-22 04:03:32'),
(11, 'asdasd', 'asass', 'adasdsda', 'asdasd', 'asdasd', 'asdas', 'asdasd', 'asdasd', 'asdas', 14, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 4, '2021-04-22 04:27:11'),
(12, 'dfgdfgdfgdfgdfg', 'aaassd', 'ddfdfgdgf', 'dfgdfgdg', 'dfgdfgdg', 'dgdfgdf', 'dfggdgdf', 'fgdfgdfgdfgdfg', 'dfgdfg', 15, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 4, '2021-04-22 05:07:39'),
(13, 'asdasdasd', 'asdasdasd', 'asdasdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 16, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 4, '2021-04-22 05:40:38'),
(14, 'pppppppp', 'asdasdasd', 'pppppp', 'ppppp', 'ppppp', 'ppppp', 'pppp', 'pppppp', 'ppppp', 17, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 4, '2021-04-22 05:54:42'),
(15, 'sdfsdfsdf', 'asasasd', 'asdasd', 'ddddd', 'fffff', 'sdfsdf', 'sdfsdf', 'sdfsdfsdfsdf', 'sdfsdf', 17, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 4, '2021-04-22 06:07:20'),
(16, 'fddddddd', 'fffff', 'sfsdf', 'fhfjfgj', 'ghjghjgj', 'vbnvbn', 'vbnvbn', 'vbnvbnvbn', 'fghfghfgh', 18, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 4, '2021-04-22 06:08:33'),
(17, 'sdfsf', 'sdfsdf', 'sdfsdf', 'ssss', 'sdfsf', 'sdfsdf', 'dsdds', 'sdfsdf', 'sdfsdf', 19, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 4, '2021-04-25 07:07:05'),
(18, 'xcvxv', 'tool', 'maltool', 'about portal', 'hfgjdfhg', 'sdfsdf', 'dfsdf', 'xcvxcvxcvx', 'xcvxcv', 5, 1, NULL, 1, 5, '2021-04-29 11:02:18', 'ccc', 2, 11, '2021-04-29 11:16:15', 'apprr', 2, 14, '2021-04-29 11:31:38', 1, 1, 5, '2021-04-29 11:02:18'),
(19, 'sdfsd', 'dfgdfg', 'dfgdfg', 'About dept', 'About dept', 'dfsdfsd', 'dsfsdf', 'dfsdfsdf', 'sdfsdf', 4, 1, NULL, 1, 5, '2021-04-30 05:10:43', 'sssss', 2, 11, '2021-04-30 05:18:28', 'dddd', 2, 14, '2021-04-30 05:25:05', 1, 1, 5, '2021-04-30 05:10:43'),
(20, 'sdfsd', 'zzz', 'xxx', 'whats', 'sss', 'sdasd', 'asdfsd', 'fsdf', 'sdf', 3, 1, NULL, 1, 5, '2021-04-30 06:57:48', 'dsfsd', 2, 11, '2021-04-30 07:26:59', 'efsd', 2, 14, '2021-04-30 07:29:15', 1, 1, 5, '2021-04-30 06:57:48'),
(21, 'vbvcbcvb', 'tool', 'maltool', 'Whats New', 'Whats New', 'adas', 'cvxcv', 'dsdfsd', 'xczxczxc', 3, 1, NULL, 1, 5, '2021-05-03 05:36:17', 'rrrrr', 3, 11, '2021-05-03 06:29:58', NULL, 0, 0, NULL, 0, 1, 5, '2021-05-03 05:36:17'),
(22, 'vbcvcbcv', 'vcxcvcx', 'fvcxvc', 'cxvcb', 'vbccvbc', 'bvcbcvb', 'vcbvcb', 'vbcbvb', 'cbvbvcb', 4, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, 4, '2021-05-05 11:48:07', 0, 1, 4, '2021-05-05 11:48:07'),
(23, 'erwerw', 'vbcv', 'മലയാളം', 'abt dept', 'മലയാളം', 'fgdfgd', 'മലയാളം', '<p>dfsfs<br></p>', '<p>dsfsdf<br></p>', 4, 1, NULL, 1, 5, '2021-05-08 10:29:15', NULL, 1, 11, '2021-05-16 17:15:57', NULL, 0, 0, NULL, 0, 1, 5, '2021-05-08 10:29:15'),
(24, 'czxc', 'vbcv', 'മലയാളം', 'test', 'മലയാളം', 'fgdfgd', 'മലയാളം', '<p>cxvz<br></p>', '<p>zczc<br></p>', 5, 1, NULL, 1, 5, '2021-05-08 10:32:56', NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 5, '2021-05-08 10:32:56'),
(25, 'NAVAS K', 'NAVAS K', 'നവാസ്', 'navas', 'നവാസ്', 'dfgs', 'നവാസ്', '<p>hgfhdsfasgdhjhDFGFHMDDFGVGFDDFGHFD</p>', '<p>നവാസ്നവാസ്നവാസ്നവാസ്നവാസ്<br></p>', 4, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, 4, '2021-07-20 11:01:39', 0, 1, 4, '2021-07-20 11:01:39'),
(26, 'NAVAS', 'NAVAS K', 'നവാസ്നവ', 'navas', 'നവാസ്', 'dfgs', 'നവാസ്', '<p>നവാസ്നവാസ്നവാസ്നവാസ്നവാസ്<br></p>', '<p>asdfghjkasdvsdav</p>', 4, 0, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, 4, '2021-07-22 05:15:12', 0, 1, 4, '2021-07-22 05:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `componentpermissions`
--

CREATE TABLE `componentpermissions` (
  `id` bigint UNSIGNED NOT NULL,
  `components_id` bigint UNSIGNED NOT NULL,
  `usertypes_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `componentpermissions`
--

INSERT INTO `componentpermissions` (`id`, `components_id`, `usertypes_id`, `status`, `users_id`, `created_at`) VALUES
(1, 1, '1,2', 1, 1, '2021-04-08 04:04:12'),
(2, 2, '1,2', 1, 1, '2021-04-08 05:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` tinyint NOT NULL,
  `sitestatus` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`id`, `entitle`, `order`, `sitestatus`, `status`, `users_id`, `created_at`) VALUES
(1, 'Component Master', 1, 0, 1, 1, '2021-04-08 00:32:23'),
(2, 'Header Button', 2, 0, 1, 1, '2021-04-08 05:08:51'),
(3, 'Whats new', 3, 0, 1, 1, '2021-04-08 05:08:51'),
(4, 'About department', 4, 0, 1, 1, '2021-04-08 05:08:51'),
(5, 'About Portal', 5, 0, 1, 1, '2021-04-08 05:08:51'),
(6, 'Contact us', 6, 0, 1, 1, '2021-04-08 05:08:51'),
(7, 'Archive policy', 7, 0, 1, 1, '2021-04-08 05:08:51'),
(8, 'Support centers', 8, 0, 1, 1, '2021-04-08 05:08:51'),
(9, 'Help', 9, 0, 1, 1, '2021-04-08 05:08:51'),
(10, 'Guidelines', 10, 0, 1, 1, '2021-04-08 05:08:51'),
(11, 'Service info', 11, 0, 1, 1, '2021-04-08 05:08:51'),
(12, 'Address with map', 12, 0, 1, 1, '2021-04-08 05:08:51'),
(13, 'Site compatibility info', 13, 0, 1, 1, '2021-04-08 05:08:51'),
(14, 'Digital info', 14, 0, 1, 1, '2021-04-08 05:08:51'),
(15, 'Copyright Policy', 15, 0, 1, 1, '2021-04-08 05:08:51'),
(16, 'Hyperlink Policy', 16, 0, 1, 1, '2021-04-08 05:08:51'),
(17, 'Privacy Policy', 17, 0, 1, 1, '2021-04-08 05:08:51'),
(18, 'Terms and Condition', 18, 0, 1, 1, '2021-04-08 05:08:51'),
(19, 'Service Link', 19, 0, 1, 1, '2021-04-08 05:08:51'),
(21, 'Article', 20, 0, 1, 4, '2021-05-19 07:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `contenttypes`
--

CREATE TABLE `contenttypes` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contenttypes`
--

INSERT INTO `contenttypes` (`id`, `entitle`, `maltitle`, `status`, `users_id`, `created_at`) VALUES
(1, 'Audio', 'audio', 1, 1, '2021-04-19 01:45:06'),
(2, 'Video', 'video', 1, 1, '2021-04-19 01:45:14'),
(3, 'Animation', 'animation', 1, 1, '2021-04-19 01:45:28'),
(4, 'Poster', 'poster', 1, 1, '2021-04-19 01:45:37'),
(5, 'Document', 'document', 1, 1, '2021-04-19 01:45:52'),
(6, 'test', 'സന്ദേശത്തിന്റെ', 1, 1, '2021-05-05 11:51:08'),
(7, 'gfd', 'മൂല്യനിർണ്ണയം', 1, 1, '2021-05-06 06:28:19'),
(8, 'sadasdasdas', 'മൂല്യനിർണ്ണയം', 1, 1, '2021-05-08 12:48:23'),
(10, 'asdasdasd', 'മൂല്യനിർണ്ണയം', 1, 1, '2021-05-08 13:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `deptcategories_id` int NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `deptcategories_id`, `entitle`, `maltitle`, `status`, `users_id`, `created_at`) VALUES
(1, 1, 'Agriculture Development & Farmers\' Welfare', '', 1, 1, '2021-04-07 09:20:56'),
(3, 2, 'Ayush', 'sss', 1, 2, '2021-04-23 03:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `deptcategories`
--

CREATE TABLE `deptcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deptcategories`
--

INSERT INTO `deptcategories` (`id`, `entitle`, `maltitle`, `status`, `users_id`, `created_at`) VALUES
(1, 'Sectt Dept', 'Sectt Dept', 1, 1, '2021-04-23 00:57:19'),
(2, 'Directorate', 'Directorate', 1, 1, '2021-04-23 10:28:22'),
(4, 'sdfsdfs', 'സന്ദേശത്തിന്റെ', 1, 1, '2021-05-06 06:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `deptintroductions`
--

CREATE TABLE `deptintroductions` (
  `id` bigint UNSIGNED NOT NULL,
  `file1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enuser1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maluser1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endesg1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maldesg1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enuser2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maluser2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endesg2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maldesg2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ensubtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malsubtitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enbrief` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malbrief` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `encontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malcontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepagestatus` tinyint NOT NULL DEFAULT '1',
  `contributor_status` int NOT NULL DEFAULT '0',
  `contributor_userid` int NOT NULL DEFAULT '0',
  `contributor_timestamp` timestamp NULL DEFAULT NULL,
  `moderator_remarks` text COLLATE utf8mb4_unicode_ci,
  `moderator_status` int NOT NULL DEFAULT '0',
  `moderator_userid` int NOT NULL DEFAULT '0',
  `moderator_timestamp` timestamp NULL DEFAULT NULL,
  `approve_remarks` text COLLATE utf8mb4_unicode_ci,
  `approve_status` int NOT NULL DEFAULT '0',
  `approve_userid` int NOT NULL DEFAULT '0',
  `approve_timestamp` timestamp NULL DEFAULT NULL,
  `lock_status` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deptintroductions`
--

INSERT INTO `deptintroductions` (`id`, `file1`, `alt1`, `enuser1`, `maluser1`, `endesg1`, `maldesg1`, `file2`, `alt2`, `enuser2`, `maluser2`, `endesg2`, `maldesg2`, `entooltip`, `maltooltip`, `entitle`, `maltitle`, `ensubtitle`, `malsubtitle`, `enbrief`, `malbrief`, `encontent`, `malcontent`, `homepagestatus`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_remarks`, `moderator_status`, `moderator_userid`, `moderator_timestamp`, `approve_remarks`, `approve_status`, `approve_userid`, `approve_timestamp`, `lock_status`, `status`, `users_id`, `created_at`) VALUES
(6, 'user12106202119:03:03.png', 'aaa', 'Shri. Arif Mohammed', 'മലയാളം', 'Governor', 'മലയാളംമലയാളം', 'user22106202119:03:03.png', 'abbbb', 'Shri. Pinarayi Vijay', 'മലയാളം', 'Chief Minister', 'മലയാളംമലയാളം', 'sdfsdf', 'sdfsdf', 'Title of Authors', 'മലയാളംമലയാളം', 'cxdfd', 'മലയാളംമലയാളം', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,<br>', '<h2 class=\"qrShPb kno-ecr-pt PZPZlf mfMhoc\" data-local-attribute=\"d3bn\" data-attrid=\"title\" data-ved=\"2ahUKEwj-qeDw-8jwAhUPb30KHQGQCJ8Q3B0oATAmegQIThAL\"><span>മലയാളം</span></h2><h2 class=\"qrShPb kno-ecr-pt PZPZlf mfMhoc\" data-local-attribute=\"d3bn\" data-attrid=\"title\" data-ved=\"2ahUKEwj-qeDw-8jwAhUPb30KHQGQCJ8Q3B0oATAmegQIThAL\"><span>മലയാളം</span></h2><br>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived<br>', '<h2 class=\"qrShPb kno-ecr-pt PZPZlf mfMhoc\" data-local-attribute=\"d3bn\" data-attrid=\"title\" data-ved=\"2ahUKEwj-qeDw-8jwAhUPb30KHQGQCJ8Q3B0oATAmegQIThAL\"><span>മലയാളം</span></h2><h2 class=\"qrShPb kno-ecr-pt PZPZlf mfMhoc\" data-local-attribute=\"d3bn\" data-attrid=\"title\" data-ved=\"2ahUKEwj-qeDw-8jwAhUPb30KHQGQCJ8Q3B0oATAmegQIThAL\"><span>മലയാളം</span></h2><h2 class=\"qrShPb kno-ecr-pt PZPZlf mfMhoc\" data-local-attribute=\"d3bn\" data-attrid=\"title\" data-ved=\"2ahUKEwj-qeDw-8jwAhUPb30KHQGQCJ8Q3B0oATAmegQIThAL\"><span>മലയാളം</span></h2><br>', 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, 4, '2021-06-21 13:33:03', 0, 1, 4, '2021-06-21 13:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `entitle`, `maltitle`, `status`, `users_id`, `created_at`) VALUES
(1, 'desgn', 'മൂല്യനിർണ്ണയം', 2, 2, '2021-04-07 09:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` bigint UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `downloadtypes_id` bigint UNSIGNED NOT NULL,
  `archivepolicies_id` bigint UNSIGNED NOT NULL,
  `filetypes_id` bigint UNSIGNED NOT NULL,
  `contenttypes_id` bigint UNSIGNED NOT NULL,
  `displaystatus` int NOT NULL DEFAULT '0',
  `icon` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contributor_status` int NOT NULL DEFAULT '0',
  `contributor_userid` int NOT NULL DEFAULT '0',
  `contributor_timestamp` timestamp NULL DEFAULT NULL,
  `moderator_remarks` text COLLATE utf8mb4_unicode_ci,
  `moderator_status` int NOT NULL DEFAULT '0',
  `moderator_userid` int NOT NULL DEFAULT '0',
  `moderator_timestamp` timestamp NULL DEFAULT NULL,
  `approve_remarks` text COLLATE utf8mb4_unicode_ci,
  `approve_status` int NOT NULL DEFAULT '0',
  `approve_userid` int NOT NULL DEFAULT '0',
  `approve_timestamp` timestamp NULL DEFAULT NULL,
  `lock_status` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `file`, `alt`, `entitle`, `maltitle`, `size`, `duration`, `downloadtypes_id`, `archivepolicies_id`, `filetypes_id`, `contenttypes_id`, `displaystatus`, `icon`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_remarks`, `moderator_status`, `moderator_userid`, `moderator_timestamp`, `approve_remarks`, `approve_status`, `approve_userid`, `approve_timestamp`, `lock_status`, `status`, `users_id`, `created_at`) VALUES
(1, 'download2004202104:45:46.png', 'dfdfdmmm', 'dfgdgggg', 'fgdfgd', '1.2', '1.5', 1, 1, 6, 4, 1, 'gfhfgh', 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 3, '2021-04-19 23:15:46'),
(2, 'download2104202107:30:31.png', 'rrrfd', 'rdfgdfgdg', 'dsdg', 'ssd', 'fsdfs', 1, 1, 6, 4, 1, 'erwerw', 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 5, '2021-04-21 02:00:31'),
(3, 'download2104202107:31:11.png', 'rrrfd', 'testttttt', 'dsdg', 'ssd', 'fsdfs', 1, 1, 6, 4, 1, 'erwerw', 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 5, '2021-04-21 02:01:11'),
(7, 'download0505202109:31:39.png', 'rrrfd', 'hhhh', 'fghfg', 'hgfh', 'fhhj', 1, 1, 6, 4, 1, 'ghj', 1, 5, '2021-05-05 04:18:06', NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 1, 5, '2021-05-05 04:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `downloadtypes`
--

CREATE TABLE `downloadtypes` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `downloadtypes`
--

INSERT INTO `downloadtypes` (`id`, `entitle`, `maltitle`, `status`, `users_id`, `created_at`) VALUES
(1, 'dddd', 'dddd', 1, 1, '2021-04-20 04:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `enquestion` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malquestion` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enanswer` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malanswer` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `enquestion`, `malquestion`, `enanswer`, `malanswer`, `status`, `users_id`, `created_at`) VALUES
(1, 'how are you', 'how are you', 'how are you', 'how are you', 1, 4, '2021-04-25 05:52:44'),
(2, 'sasdasd', 'asdasd', 'dfdfg', 'dfgdfgdfg', 1, 4, '2021-04-25 05:55:47'),
(3, 'dddddd', 'adasdasdasd', 'asdasd', 'asdasd', 1, 4, '2021-04-25 05:59:02'),
(4, 'sddddd', 'gggggg', 'ffffff', 'ggggg', 1, 4, '2021-04-25 05:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` bigint NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `mobile`, `email`, `subject`, `content`, `status`, `created_at`) VALUES
(1, 'Name', 9874563210, 'ghgd@ghjs.com', 'ghghfhfg', 'tfhfghfgh', 1, '2021-06-11 12:10:38'),
(2, 'vcbdcvb', 9874563210, 'dsf@fg.dsx', 'ghghfhfg', 'asdxfcgsdfg', 1, '2021-06-11 12:12:44'),
(3, 'aaaaaaa', 9874563210, 'anu@ggg.comfgdfg', 'ghghfhfg', 'asdasddasasd', 1, '2021-06-30 03:46:38'),
(4, 'ffff', 9874563210, 'siteadmin@cdit.org', 'ghghfhfg', 'dxfgdfgdfg', 1, '2021-06-30 03:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `filetypes`
--

CREATE TABLE `filetypes` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `contenttypes_id` bigint UNSIGNED NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filetypes`
--

INSERT INTO `filetypes` (`id`, `entitle`, `maltitle`, `status`, `contenttypes_id`, `users_id`, `created_at`) VALUES
(1, 'mp3', 'mp3', 1, 1, 1, '2021-04-19 01:49:02'),
(2, 'mp4', 'mp4', 1, 2, 1, '2021-04-19 01:49:16'),
(3, 'mov', 'mov', 1, 2, 1, '2021-04-19 01:49:42'),
(4, 'ogg', 'ogg', 1, 2, 1, '2021-04-19 01:50:01'),
(5, 'webp', 'webp', 1, 3, 1, '2021-04-19 01:50:21'),
(6, 'png', 'png', 1, 4, 1, '2021-04-19 01:50:45'),
(7, 'jpg', 'jpg', 1, 4, 1, '2021-04-19 01:50:56'),
(8, 'pdf', 'pdf', 1, 5, 1, '2021-04-19 01:52:02'),
(9, 'doc', 'doc', 1, 5, 1, '2021-04-19 01:52:13'),
(10, 'docx', 'docx', 1, 5, 1, '2021-04-19 01:52:23'),
(12, 'shabeeba324', 'മൂല്യനിർണ്ണയം', 1, 1, 1, '2021-05-06 06:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `footerlinks`
--

CREATE TABLE `footerlinks` (
  `id` bigint UNSIGNED NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iconclass` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footerlinks`
--

INSERT INTO `footerlinks` (`id`, `url`, `iconclass`, `entitle`, `maltitle`, `entooltip`, `maltooltip`, `status`, `users_id`, `created_at`) VALUES
(1, 'https://www.india.gov.in/', 'gggggg', 'National Portal of India', 'eeee', 'This opens an external website', 'fffff', 1, 4, '2021-04-19 00:40:48'),
(2, 'https://www.mygov.in/', 'gggggg', 'myGov', 'eeee', 'This opens an external website', 'fffff', 1, 4, '2021-04-19 00:40:48'),
(3, 'https://prd.kerala.gov.in/', 'gggggg', 'I&PRD', 'eeee', 'This opens an external website', 'fffff', 1, 4, '2021-04-19 00:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `footermenus`
--

CREATE TABLE `footermenus` (
  `id` bigint UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malcontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footermenus`
--

INSERT INTO `footermenus` (`id`, `file`, `alt`, `entitle`, `maltitle`, `encontent`, `malcontent`, `status`, `users_id`, `created_at`) VALUES
(1, '', '', 'About the portal', 'പോര്‍ട്ടലിനെക്കുറിച്ച്', 'This is the Official State Service Portal of Kerala. The portal is owned by Kerala State Information Technology Mission and the content managed by Information Public Relations Department. Designed and developed by Tata Consultancy Services (TCS) the portal has been developed following the State Service Delivery Gateway (SSDG) project, formulated under the National e-Governance Plan (NeGP) for providing easy and convenient services to the citizens through remote access. ', 'This is the Official State Service Portal of Kerala. The portal is owned by Kerala State Information Technology Mission and the content managed by Information Public Relations Department. Designed and developed by Tata Consultancy Services (TCS) the portal has been developed following the State Service Delivery Gateway (SSDG) project, formulated under the National e-Governance Plan (NeGP) for providing easy and convenient services to the citizens through remote access. ', 1, 2, '2021-05-27 02:44:29'),
(2, '', 'ASDASDASD', 'Hyperlink policy', 'Hyperlink policy', 'The hyperlinking policy enumerates the detailed criteria and guidelines with respect to hyperlinks with other sites. The basic hyperlinking practices and rules should ideally be common across the websites of a any Government entity e.g., State/Ministry.', 'The hyperlinking policy enumerates the detailed criteria and guidelines with respect to hyperlinks with other sites. The basic hyperlinking practices and rules should ideally be common across the websites of a any Government entity e.g., State/Ministry.', 1, 2, '2021-05-27 02:44:29'),
(3, '', 'Privacy', 'Privacy policy', 'Privacy policy', 'A Privacy Policy is a statement or a legal document that states how a company or website collects, handles and processes data of its customers and visitors. It explicitly describes whether that information is kept confidential, or is shared with or sold to third parties.', 'A Privacy Policy is a statement or a legal document that states how a company or website collects, handles and processes data of its customers and visitors. It explicitly describes whether that information is kept confidential, or is shared with or sold to third parties.', 1, 2, '2021-05-27 02:50:19'),
(4, '', 'Disclaimer', 'Disclaimer', 'Disclaimer', '\r\n\r\nAlthough information and contents of various departmental websites of this portal have been put with care and diligence, Government of Kerala does not take responsibility on how this information is used or the consequences of its use. In case of any inconsistency/confusion, the user should contact the concerned Department/Officer of Kerala Government for further clarifications.\r\n\r\nThis is the State Portal of Government of Kerala developed with an objective to provide single source of information for all government matters and all transactional government services for citizens, businesses and overseas people. The content in this portal is the result of the collaborative effort of all Departments, Public Sector Undertakings (PSUs), Commissions, Universities, Boards, and other Institutions under Government of Kerala. Information Public Relations Department manages the content of this State Portal of Government of Kerala. This Portal is the Mission Mode Project under the E-Governance Plan, developed by CDIT and owned by Kerala State IT Mission (KSITM).\r\n', 'This is the State Portal of Government of Kerala developed with an objective to provide single source of information for all government matters and all transactional government services for citizens, businesses and overseas people. The content in this portal is the result of the collaborative effort of all Departments, Public Sector Undertakings (PSUs), Commissions, Universities, Boards, and other Institutions under Government of Kerala. Information Public Relations Department manages the content of this State Portal of Government of Kerala. This Portal is the Mission Mode Project under the E-Governance Plan, developed by CDIT and owned by Kerala State IT Mission (KSITM).', 1, 2, '2021-05-27 02:50:19'),
(5, '', 'Copyright', 'Copyright Policy', 'Copyright Policy', 'A Privacy Policy is a statement or a legal document that states how a company or website collects, handles and processes data of its customers and visitors. It explicitly describes whether that information is kept confidential, or is shared with or sold to third parties.', 'A Privacy Policy is a statement or a legal document that states how a company or website collects, handles and processes data of its customers and visitors. It explicitly describes whether that information is kept confidential, or is shared with or sold to third parties.', 1, 2, '2021-05-27 02:50:19'),
(6, '', 'Terms', 'Terms and Conditions', 'Terms and Conditions', 'A Privacy Policy is a statement or a legal document that states how a company or website collects, handles and processes data of its customers and visitors. It explicitly describes whether that information is kept confidential, or is shared with or sold to third parties.', 'A Privacy Policy is a statement or a legal document that states how a company or website collects, handles and processes data of its customers and visitors. It explicitly describes whether that information is kept confidential, or is shared with or sold to third parties.', 1, 2, '2021-05-27 02:50:19'),
(7, '', 'ggggg', 'Guidelines', 'Guidelines', 'A Privacy Policy is a statement or a legal document that states how a company or website collects, handles and processes data of its customers and visitors. It explicitly describes whether that information is kept confidential, or is shared with or sold to third parties.', 'A Privacy Policy is a statement or a legal document that states how a company or website collects, handles and processes data of its customers and visitors. It explicitly describes whether that information is kept confidential, or is shared with or sold to third parties.', 1, 2, '2021-05-27 02:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ensubtitle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `malsubtitle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iconclass` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `file`, `alt`, `entitle`, `maltitle`, `ensubtitle`, `malsubtitle`, `iconclass`, `status`, `users_id`, `created_at`) VALUES
(1, '', '', 'This is the state portal of the Government of Kerala. Designed and Developed by C-DIT. Portal owned by Kerala state IT Mission, Content owned and updated by I&PRD', 'This portal is part of the Government of Kerala state portal. <br>Portal is owned by KSITM and contents are owned by I &amp; PRD. <br>Portal is designed and developed by C-DIT. <br>', 'Copyrights Government of Kerala.', 'Government of Kerala ', 'far fa-copyright', 1, 1, '2021-05-27 02:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `poster` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activities_id` int NOT NULL,
  `contributor_status` int NOT NULL DEFAULT '0',
  `contributor_userid` int NOT NULL DEFAULT '0',
  `contributor_timestamp` timestamp NULL DEFAULT NULL,
  `moderator_remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `moderator_status` int NOT NULL DEFAULT '0',
  `moderator_userid` int NOT NULL DEFAULT '0',
  `moderator_timestamp` timestamp NULL DEFAULT NULL,
  `approve_remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `approve_status` int NOT NULL DEFAULT '0',
  `approve_userid` int NOT NULL DEFAULT '0',
  `approve_timestamp` timestamp NULL DEFAULT NULL,
  `lock_status` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `poster`, `alt`, `date`, `entitle`, `maltitle`, `entooltip`, `maltooltip`, `activities_id`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_remarks`, `moderator_status`, `moderator_userid`, `moderator_timestamp`, `approve_remarks`, `approve_status`, `approve_userid`, `approve_timestamp`, `lock_status`, `status`, `users_id`, `created_at`) VALUES
(7, 'gallery1405202116:58:31.jpg', 'alt', '2021-05-14', 'Gal One', 'മലയാളം', 'sdfsdf', 'മലയാളംമലയാളം', 5, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, 3, '2021-05-14 11:28:31', 0, 1, 3, '2021-05-14 11:28:31'),
(8, 'gallery1405202116:59:11.jpg', 'vxcv', '2021-05-14', 'Gal Two', 'മലയാളം', 'sdfsdf', 'മലയാളം', 7, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, 3, '2021-05-14 11:29:11', 0, 1, 3, '2021-05-14 11:29:11'),
(9, 'gallery1405202116:59:38.jpg', 'alt', '2021-05-14', 'Gal Three', 'മലയാളം', 'tool', 'മലയാളം', 7, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, 3, '2021-05-14 11:29:38', 0, 1, 3, '2021-05-14 11:29:38'),
(10, 'gallery1405202117:00:03.jpg', 'alt', '2021-05-14', 'Gal Four', 'മലയാളം', 'sdfsdf', 'മലയാളം', 7, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, 3, '2021-05-14 11:30:03', 0, 1, 3, '2021-05-14 11:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `galleryitems`
--

CREATE TABLE `galleryitems` (
  `id` bigint UNSIGNED NOT NULL,
  `poster` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `galleries_id` int NOT NULL DEFAULT '0',
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contributor_status` int NOT NULL DEFAULT '0',
  `contributor_userid` int NOT NULL DEFAULT '0',
  `contributor_timestamp` timestamp NULL DEFAULT NULL,
  `moderator_remarks` text COLLATE utf8mb4_unicode_ci,
  `moderator_status` int NOT NULL DEFAULT '0',
  `moderator_userid` int NOT NULL DEFAULT '0',
  `moderator_timestamp` timestamp NULL DEFAULT NULL,
  `approve_remarks` text COLLATE utf8mb4_unicode_ci,
  `approve_status` int NOT NULL DEFAULT '0',
  `approve_userid` int NOT NULL DEFAULT '0',
  `approve_timestamp` timestamp NULL DEFAULT NULL,
  `lock_status` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleryitems`
--

INSERT INTO `galleryitems` (`id`, `poster`, `alt`, `galleries_id`, `entooltip`, `maltooltip`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_remarks`, `moderator_status`, `moderator_userid`, `moderator_timestamp`, `approve_remarks`, `approve_status`, `approve_userid`, `approve_timestamp`, `lock_status`, `status`, `users_id`, `created_at`) VALUES
(6, 'galleryitem0605202114:21:35.png', 'dddd', 2, 'vbcv', 'dfgdfg', 0, 0, NULL, NULL, 0, 0, NULL, NULL, 1, 0, NULL, 0, 1, 3, '2021-05-06 08:51:35'),
(7, 'galleryitem1605202111:55:34.jpg', 'alttt', 7, 'etoolzXZ', 'മൂല്യനിർണ്ണയം', 0, 0, NULL, NULL, 0, 0, NULL, NULL, 1, 0, NULL, 0, 1, 3, '2021-05-16 06:25:34'),
(8, 'galleryitem1605202111:59:01.jpg', 'alttt', 7, 'etoolzXZ', 'മൂല്യനിർണ്ണയം', 0, 0, NULL, NULL, 0, 0, NULL, NULL, 1, 0, NULL, 0, 1, 3, '2021-05-16 06:29:01'),
(9, 'galleryitem1605202112:04:45.jpg', 'alttt', 8, 'etoolzXZ', 'മൂല്യന', 0, 0, NULL, NULL, 0, 0, NULL, NULL, 1, 0, NULL, 0, 1, 3, '2021-05-16 06:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `hierarchies`
--

CREATE TABLE `hierarchies` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hierarchies`
--

INSERT INTO `hierarchies` (`id`, `entitle`, `maltitle`, `status`, `users_id`, `created_at`) VALUES
(1, 'Hierarchy', 'dfgdfgmmm', 1, 2, '2021-04-09 00:34:50'),
(3, 'shabeeba', 'മൂല്യനിർണ്ണയം', 1, 2, '2021-05-06 07:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `infolinks`
--

CREATE TABLE `infolinks` (
  `id` bigint UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepagestatus` tinyint NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `entitle`, `status`, `users_id`, `created_at`) VALUES
(1, 'English', 1, 1, '2021-04-11 23:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `livestreamings`
--

CREATE TABLE `livestreamings` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `livestreamings`
--

INSERT INTO `livestreamings` (`id`, `entitle`, `maltitle`, `url`, `date`, `status`, `users_id`, `created_at`) VALUES
(4, 'test', 'fdsfds', 'https://bitmovin-a.akamaihd.net/content/playhouse-vr/m3u8s/105560.m3u8', '2021-04-23', 1, 12, '2021-04-23 04:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logotype` int NOT NULL DEFAULT '0' COMMENT '0=Default 1=Header Logo 2=Footer Logo 3=State Widget Logo 4=India Widget Logo 5=Certifications 6=Others',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `file`, `alt`, `url`, `entooltip`, `maltooltip`, `logotype`, `status`, `users_id`, `created_at`) VALUES
(2, 'logo2006202121:39:07.png', 'altttmm', 'utttt', 'etools', 'mtool', 1, 1, 4, '2021-05-04 18:41:51'),
(3, 'logo2706202113:12:53.png', 'alt', 'https://india.gov.in', 'India Gov', 'മലയാളം', 4, 1, 4, '2021-05-29 07:42:21'),
(4, 'logo2706202113:13:12.png', 'altgg', 'https://www.mygov.in/', 'MyGov', 'മലയാളംമലയാളം', 4, 1, 4, '2021-05-29 07:44:29'),
(5, 'logo2706202113:13:28.png', 'altbb', 'https://www.digitalindia.gov.in/', 'Digital India', 'രൂപരേഖ', 4, 1, 4, '2021-05-29 07:45:07'),
(6, 'logo2506202113:42:22.jpg', 'altyy', 'https://prd.kerala.gov.in/', 'PRD', 'സർക്കാർ', 3, 1, 4, '2021-05-29 07:46:58'),
(8, 'logo2706202113:14:21.png', 'althh', 'http://cdn.prdlive.trtech.in/', 'PRD Live', 'സർക്കാർ', 3, 1, 4, '2021-05-29 07:48:44'),
(9, 'logo2706202112:54:58.png', 'stqc', 'ddd', 'stqc', 'മലയാളം', 2, 1, 4, '2021-06-27 07:24:58'),
(10, 'logo2706202112:57:08.png', 'altyytg', 'utttt', 'etoolsttt', 'മലയാളം', 2, 1, 4, '2021-06-27 07:27:08'),
(12, 'logo2706202112:58:24.png', 'csm', 'utttt', 'fgf', 'മലയാളം', 2, 1, 4, '2021-06-27 07:28:24'),
(13, 'logo2706202112:58:02.png', 'wcag', 'utttt', 'etoolshy', 'മലയാളം', 2, 1, 4, '2021-06-27 07:28:02'),
(14, 'logo2706202113:16:52.png', 'altttmmh', 'https://data.gov.in/', 'datgov', 'മലയാളം', 4, 1, 4, '2021-06-27 07:46:52'),
(15, 'logo2706202113:14:39.png', 'altbbzz', 'https://www.keralanews.gov.in/', 'Kerala News', 'ബന്ധപ്പെടുക', 3, 1, 4, '2021-05-29 07:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `longalerts`
--

CREATE TABLE `longalerts` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ensubtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malsubtitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enbrief` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malbrief` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `encontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malcontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepagestatus` tinyint NOT NULL DEFAULT '1',
  `contributor_status` int NOT NULL DEFAULT '0',
  `contributor_userid` int NOT NULL DEFAULT '0',
  `contributor_timestamp` timestamp NULL DEFAULT NULL,
  `moderator_remarks` text COLLATE utf8mb4_unicode_ci,
  `moderator_status` int NOT NULL DEFAULT '0',
  `moderator_userid` int NOT NULL DEFAULT '0',
  `moderator_timestamp` timestamp NULL DEFAULT NULL,
  `approve_remarks` text COLLATE utf8mb4_unicode_ci,
  `approve_status` int NOT NULL DEFAULT '0',
  `approve_userid` int NOT NULL DEFAULT '0',
  `approve_timestamp` timestamp NULL DEFAULT NULL,
  `lock_status` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `longalerts`
--

INSERT INTO `longalerts` (`id`, `entitle`, `maltitle`, `ensubtitle`, `malsubtitle`, `enbrief`, `malbrief`, `encontent`, `malcontent`, `homepagestatus`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_remarks`, `moderator_status`, `moderator_userid`, `moderator_timestamp`, `approve_remarks`, `approve_status`, `approve_userid`, `approve_timestamp`, `lock_status`, `status`, `users_id`, `created_at`) VALUES
(1, 'aaaaa', 'ssss', 'xxdddddd', 'ASasA', 'zczxc', 'zxczxc', 'dddddd', 'ASSSsASAs', 0, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 2, 4, '2021-04-27 09:24:50'),
(2, 'This is a sample alert message', 'ലോങ്ങ് അലേർട്ട് ', 'dfsdfsd', 'dsfsdf', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 'ലോങ്ങ് അലേർട്ട് ലോങ്ങ് അലേർട്ട് ലോങ്ങ് അലേർട്ട് ', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked updated. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis est facilisis enim, est id. Laoreet nibh placerat viverra maecenas sit cursus. Ultricies urna, tellus odio donec malesuada. Donec at commodo vestibulum cras. Eu porttitor in lorem pellentesque pretium elit sapien Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis est facilisis enim, est id. Laoreet nibh placerat viverra maecenas sit cursus.', 'ലോങ്ങ് അലേർട്ട് ലോങ്ങ് അലേർട്ട് ലോങ്ങ് അലേർട്ട് ലോങ്ങ് അലേർട്ട് ലോങ്ങ് അലേർട്ട് ', 1, 1, 5, '2021-04-29 07:00:36', 'sss', 2, 11, '2021-04-29 08:48:30', NULL, 1, 14, '2021-04-29 08:50:51', 1, 1, 5, '2021-04-29 07:00:36'),
(3, 'qqqqqqq', 'എഴുത്ത് ഉപകരണങ്ങൾ', 'qqqqqq', 'എഴുത്ത് ഉപകരണങ്ങൾ', '<p>asdasdas<br></p>', '<p>എഴുത്ത് ഉപകരണങ്ങൾ</p>', '<p>rrrrrrrr<br></p>', '<p>എഴുത്ത് ഉപകരണങ്ങൾ</p>', 0, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, 4, '2021-05-08 17:37:30', 0, 2, 4, '2021-05-08 17:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `mainmenus`
--

CREATE TABLE `mainmenus` (
  `id` bigint UNSIGNED NOT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iconclass` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menulinktypes_id` bigint UNSIGNED NOT NULL,
  `pointto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mainmenus`
--

INSERT INTO `mainmenus` (`id`, `file`, `iconclass`, `entitle`, `maltitle`, `entooltip`, `maltooltip`, `menulinktypes_id`, `pointto`, `status`, `users_id`, `created_at`) VALUES
(1, 'jjjj', 'ddd', 'About Kerala', 'കേരളത്തെ കുറിച്ച്', 'About Kerala', 'കേരളത്തെ കുറിച്ച്', 6, 'abcde', 1, 4, '2021-05-18 07:45:37'),
(2, 'jjjjjjjjjjjj', 'ddd', 'Government', 'സർക്കാർ', 'Government', 'സർക്കാർ', 6, 'abcde', 1, 4, '2021-05-18 07:46:47'),
(3, 'jjjj', 'ddd', 'Services', 'സേവനങ്ങൾ', 'Services', 'സേവനങ്ങൾ', 6, 'abcde', 1, 4, '2021-05-18 08:04:12'),
(4, '7', 'ddd', 'Contact Us', 'ബന്ധപ്പെടുക', 'Contact Us', 'ബന്ധപ്പെടുക', 4, 'abcde', 1, 4, '2021-05-18 08:07:55'),
(6, 'feedback', 'ddd', 'Feedback', 'രൂപരേഖ', 'sdfsdf', 'മലയാളം', 5, 'abcde', 1, 4, '2021-05-24 15:17:16'),
(7, 'gallerypreview', 'ddd', 'Gallery', 'രൂപരേഖ', 'sdfsdf', 'മലയാളം', 5, 'abcde', 1, 4, '2021-05-27 11:00:18'),
(8, 'mainmenu2705202116:47:40.pdf', 'ddd', 'GO Order', 'രൂപരേഖ', 'sdfsdf', 'മലയാളം', 3, 'abcde', 1, 4, '2021-05-27 11:17:40'),
(9, 'sitemap', 'ddd', 'Sitemap', 'രൂപരേഖ', 'tool', 'മലയാളം', 5, 'abcde', 1, 4, '2021-06-07 08:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `mediaalerts`
--

CREATE TABLE `mediaalerts` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ensubtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malsubtitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enbrief` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malbrief` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `encontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malcontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepagestatus` tinyint NOT NULL DEFAULT '1',
  `filetypes_id` bigint UNSIGNED NOT NULL,
  `contenttypes_id` bigint UNSIGNED NOT NULL,
  `contributor_status` int NOT NULL DEFAULT '0',
  `contributor_userid` int NOT NULL DEFAULT '0',
  `contributor_timestamp` timestamp NULL DEFAULT NULL,
  `moderator_remarks` text COLLATE utf8mb4_unicode_ci,
  `moderator_status` int NOT NULL DEFAULT '0',
  `moderator_userid` int NOT NULL DEFAULT '0',
  `moderator_timestamp` timestamp NULL DEFAULT NULL,
  `approve_remarks` text COLLATE utf8mb4_unicode_ci,
  `approve_status` int NOT NULL DEFAULT '0',
  `approve_userid` int NOT NULL DEFAULT '0',
  `approve_timestamp` timestamp NULL DEFAULT NULL,
  `lock_status` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mediaalerts`
--

INSERT INTO `mediaalerts` (`id`, `entitle`, `maltitle`, `ensubtitle`, `malsubtitle`, `enbrief`, `malbrief`, `encontent`, `malcontent`, `poster`, `alt`, `file`, `size`, `duration`, `homepagestatus`, `filetypes_id`, `contenttypes_id`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_remarks`, `moderator_status`, `moderator_userid`, `moderator_timestamp`, `approve_remarks`, `approve_status`, `approve_userid`, `approve_timestamp`, `lock_status`, `status`, `users_id`, `created_at`) VALUES
(7, 'This is a sample alert message', 'അലേർട്ട് ', 'fgdfg', 'dfg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years', 'അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് ', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked updated. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis est facilisis enim, est id. Laoreet nibh placerat viverra maecenas sit cursus. Ultricies urna, tellus odio donec malesuada. Donec at commodo vestibulum cras. Eu porttitor in lorem pellentesque pretium elit sapien Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis est facilisis enim, est id. Laoreet nibh placerat viverra maecenas sit cursus.', 'അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് അലേർട്ട് ', NULL, 'dfgdfg', 'media0307202112:13:56.jpg', '1.2', '1.5', 1, 7, 4, 1, 5, '2021-04-29 09:45:53', 'ghfh', 2, 11, '2021-04-29 10:08:22', 'cccc', 2, 14, '2021-04-29 10:33:30', 1, 1, 5, '2021-04-29 09:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `mediaalertsold`
--

CREATE TABLE `mediaalertsold` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ensubtitle` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `malsubtitle` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enbrief` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `malbrief` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `encontent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `malcontent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepagestatus` tinyint NOT NULL DEFAULT '1',
  `filetypes_id` bigint UNSIGNED NOT NULL,
  `contenttypes_id` bigint UNSIGNED NOT NULL,
  `contributor_status` int NOT NULL DEFAULT '0',
  `contributor_userid` int NOT NULL,
  `contributor_timestamp` timestamp NULL DEFAULT NULL,
  `moderator_status` int NOT NULL DEFAULT '0',
  `moderator_userid` int NOT NULL,
  `moderator_timestamp` timestamp NULL DEFAULT NULL,
  `approve_status` int NOT NULL DEFAULT '0',
  `approve_userid` int NOT NULL,
  `approve_timestamp` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `membershiprequests`
--

CREATE TABLE `membershiprequests` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offices_id` bigint UNSIGNED NOT NULL,
  `departments_id` bigint UNSIGNED NOT NULL,
  `designations_id` bigint UNSIGNED NOT NULL,
  `mobile` bigint NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membershiprequests`
--

INSERT INTO `membershiprequests` (`id`, `name`, `offices_id`, `departments_id`, `designations_id`, `mobile`, `email`, `status`, `users_id`, `created_at`) VALUES
(1, 'dddeeff', 1, 1, 1, 9856321001, 'ajay@cdit.org', 1, 2, '2021-04-09 05:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `menulinktypes`
--

CREATE TABLE `menulinktypes` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menulinktypes`
--

INSERT INTO `menulinktypes` (`id`, `entitle`, `status`, `users_id`, `created_at`) VALUES
(1, 'Anchor', 1, 1, '2021-04-08 09:33:51'),
(2, 'URL', 1, 1, '2021-04-08 09:33:51'),
(3, 'File', 1, 1, '2021-04-08 09:33:51'),
(4, 'Article', 1, 1, '2021-04-08 09:33:51'),
(5, 'Form', 1, 1, '2021-04-08 09:33:51'),
(6, 'Sub', 1, 4, '2021-05-18 07:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_07_044210_create_usertypes_table', 1),
(5, '2021_04_07_045041_create_components_table', 1),
(6, '2021_04_07_045330_create_menulinktypes_table', 1),
(7, '2021_04_07_045603_create_articlecategories_table', 1),
(8, '2021_04_07_045756_create_activitytypes_table', 1),
(9, '2021_04_07_045958_create_designations_table', 1),
(10, '2021_04_07_050146_create_departments_table', 1),
(11, '2021_04_07_050327_create_hierarchies_table', 1),
(12, '2021_04_07_050540_create_staffcategories_table', 1),
(13, '2021_04_07_050701_create_contenttypes_table', 1),
(14, '2021_04_07_050923_create_filetypes_table', 1),
(15, '2021_04_07_051103_create_downloadtypes_table', 1),
(16, '2021_04_07_051205_create_archivepolicies_table', 1),
(17, '2021_04_07_051306_create_sitesettings_table', 1),
(18, '2021_04_07_051408_create_sitecontrollabels_table', 1),
(19, '2021_04_07_051527_create_communicationtypes_table', 1),
(20, '2021_04_07_052043_create_languages_table', 1),
(21, '2021_04_07_052155_create_componentpermissions_table', 2),
(22, '2021_04_07_052305_create_logos_table', 2),
(23, '2021_04_07_052353_create_titles_table', 2),
(24, '2021_04_07_052500_create_banners_table', 3),
(25, '2021_04_07_052603_create_promocampaigns_table', 3),
(26, '2021_04_07_052657_create_footers_table', 3),
(27, '2021_04_07_052752_create_footermenus_table', 3),
(28, '2021_04_07_052913_create_footerlinks_table', 3),
(29, '2021_04_07_053018_create_socialmedia_table', 3),
(30, '2021_04_07_053227_create_galleries_table', 3),
(31, '2021_04_07_053347_create_galleryitems_table', 3),
(32, '2021_04_07_053507_create_newsletters_table', 3),
(33, '2021_04_07_053604_create_newslettervolumes_table', 3),
(34, '2021_04_07_053731_create_mainmenus_table', 3),
(35, '2021_04_07_053928_create_submenus_table', 3),
(36, '2021_04_07_054050_create_articles_table', 3),
(37, '2021_04_07_054219_create_articleuploads_table', 3),
(38, '2021_04_07_054419_create_activities_table', 3),
(39, '2021_04_07_054556_create_activityuploads_table', 3),
(40, '2021_04_07_054917_create_buttons_table', 3),
(41, '2021_04_07_055015_create_downloads_table', 3),
(43, '2021_04_07_055205_create_shortalerts_table', 3),
(44, '2021_04_07_055244_create_longalerts_table', 4),
(46, '2021_04_07_055451_create_communicationattachments_table', 4),
(47, '2021_04_07_055544_create_offices_table', 4),
(50, '2021_04_07_060008_create_committees_table', 6),
(51, '2021_04_07_060051_create_staffcommittees_table', 7),
(52, '2014_10_12_000000_create_users_table', 8),
(55, '2021_04_08_083121_create_faqs_table', 9),
(56, '2021_04_08_083244_create_componentarticles_table', 10),
(57, '2021_04_08_083401_create_servicelinks_table', 11),
(58, '2021_04_08_083453_create_infolinks_table', 12),
(59, '2021_04_08_083543_create_widgetlinks_table', 13),
(60, '2021_04_08_083717_create_appdepartments_table', 14),
(61, '2021_04_08_083816_create_appsections_table', 15),
(62, '2021_04_07_055715_create_membershiprequests_table', 16),
(63, '2021_04_07_055109_create_deptintroductions_table', 17),
(64, '2021_04_20_085209_create_whatsnews_table', 18),
(65, '2021_04_20_114605_create_livestreamings_table', 19),
(66, '2021_04_21_110542_create_aboutdepartments_table', 20),
(67, '2021_04_23_052209_create_deptcategories_table', 21),
(69, '2021_04_27_160155_create_mediaalerts_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint UNSIGNED NOT NULL,
  `poster` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contributor_status` int NOT NULL DEFAULT '0',
  `contributor_userid` int NOT NULL DEFAULT '0',
  `contributor_timestamp` timestamp NULL DEFAULT NULL,
  `moderator_remarks` text COLLATE utf8mb4_unicode_ci,
  `moderator_status` int NOT NULL DEFAULT '0',
  `moderator_userid` int NOT NULL DEFAULT '0',
  `moderator_timestamp` timestamp NULL DEFAULT NULL,
  `approve_remarks` text COLLATE utf8mb4_unicode_ci,
  `approve_status` int NOT NULL DEFAULT '0',
  `approve_userid` int NOT NULL DEFAULT '0',
  `approve_timestamp` timestamp NULL DEFAULT NULL,
  `lock_status` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `poster`, `alt`, `entitle`, `maltitle`, `entooltip`, `maltooltip`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_remarks`, `moderator_status`, `moderator_userid`, `moderator_timestamp`, `approve_remarks`, `approve_status`, `approve_userid`, `approve_timestamp`, `lock_status`, `status`, `users_id`, `created_at`) VALUES
(4, 'newsletter2804202115:46:59.png', 'cvxcv', 'ttttddddd', 'dddddddddd', 'vbcb', 'dxfcvb', 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, 3, '2021-04-28 10:16:59', 0, 1, 3, '2021-04-28 10:16:59'),
(5, 'newsletter2804202115:48:17.png', 'alt', 'ddddddddddd', 'dddddddd', 'bnvbn', 'asd', 1, 5, '2021-04-28 10:18:17', 'rrrrr', 2, 11, '2021-04-28 10:35:40', 'ffff', 2, 14, '2021-04-28 10:43:20', 1, 1, 5, '2021-04-28 10:18:17'),
(6, 'newsletter1605202120:35:15.jpg', 'xxxx', 'Title of div', 'vxcv', 'vccvb', 'vbcvb', 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, 3, '2021-05-16 15:05:15', 0, 1, 3, '2021-05-06 18:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `newslettervolumes`
--

CREATE TABLE `newslettervolumes` (
  `id` bigint UNSIGNED NOT NULL,
  `newsletters_id` int NOT NULL DEFAULT '0',
  `poster` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `releasedate` date NOT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filetypes_id` bigint UNSIGNED NOT NULL,
  `contenttypes_id` bigint UNSIGNED NOT NULL,
  `archivepolicies_id` int NOT NULL,
  `contributor_status` int NOT NULL DEFAULT '0',
  `contributor_userid` int NOT NULL DEFAULT '0',
  `contributor_timestamp` timestamp NULL DEFAULT NULL,
  `moderator_remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `moderator_status` int NOT NULL DEFAULT '0',
  `moderator_userid` int NOT NULL DEFAULT '0',
  `moderator_timestamp` timestamp NULL DEFAULT NULL,
  `approve_remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `approve_status` int NOT NULL DEFAULT '0',
  `approve_userid` int NOT NULL DEFAULT '0',
  `approve_timestamp` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newslettervolumes`
--

INSERT INTO `newslettervolumes` (`id`, `newsletters_id`, `poster`, `alt`, `entitle`, `maltitle`, `entooltip`, `maltooltip`, `releasedate`, `size`, `duration`, `filetypes_id`, `contenttypes_id`, `archivepolicies_id`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_remarks`, `moderator_status`, `moderator_userid`, `moderator_timestamp`, `approve_remarks`, `approve_status`, `approve_userid`, `approve_timestamp`, `status`, `users_id`, `created_at`) VALUES
(3, 0, 'newslettervol2604202106:41:51.jpg', 'ggdfdsf', 'hgfghf', 'ghfgh', 'ghfgh', 'ghfgh', '2021-04-26', '43543', 'fdf', 7, 4, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 1, 8, '2021-04-26 01:11:51'),
(6, 6, 'newslettervol2805202117:12:19.pdf', 'alt', 'Newletter volumeI', 'മലയാളം', 'Profile', 'മലയാളം', '2021-05-28', '2.2', '2.2', 8, 5, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 1, 3, '2021-05-28 11:42:19'),
(7, 6, 'newslettervol2805202117:13:05.pdf', 'alt', 'News letter two', 'മലയാളം', 'tool', 'സർക്കാർ', '2021-05-28', '2.2', '2.2', 8, 5, 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 1, 3, '2021-05-28 11:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` bigint UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enaddress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `maladdress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumbers` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `file`, `alt`, `entitle`, `maltitle`, `enaddress`, `maladdress`, `phonenumbers`, `map`, `email`, `status`, `users_id`, `created_at`) VALUES
(1, 'dddd', 'poster', 'ddd', 'ddd', 'sdsd', 'drfdfgdfg', '9874563210, 9999999999', 'https://goo.gl/maps/1oYzBCyARx6kooL4A', 'sds@fgh.cfg', 2, 2, '2021-04-07 09:21:42'),
(3, 'office0505202121:51:33.png', 'rtr', 'rrrrr', 'tttyuty', 'yutyu', 'tyuty', '9876543210', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15786.112952295332!2d76.94690951926479!3d8.447899502803327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b05bb2faaaaaaab%3A0x68a8aa95aabee7', 'ggg@gg.ggg', 1, 2, '2021-05-05 16:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promocampaigns`
--

CREATE TABLE `promocampaigns` (
  `id` bigint UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ensubtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malsubtitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malcontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `endesc` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maldesc` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filetypes_id` bigint UNSIGNED NOT NULL,
  `contenttypes_id` bigint UNSIGNED NOT NULL,
  `displaystatus` int NOT NULL DEFAULT '0',
  `icon` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promocampaigns`
--

INSERT INTO `promocampaigns` (`id`, `file`, `alt`, `entitle`, `maltitle`, `ensubtitle`, `malsubtitle`, `encontent`, `malcontent`, `endesc`, `maldesc`, `size`, `duration`, `filetypes_id`, `contenttypes_id`, `displaystatus`, `icon`, `status`, `users_id`, `created_at`) VALUES
(1, 'banner1904202106:45:41.png', 'alt', 'hfghf', 'gfhfghfg', 'hfghfghf', 'ghfghfg', 'ftghfhfg fghfghfghf fhfh', 'fghfghgfh fghfghfgh', 'hcbcvbcb dfgdfgdfg', 'cfhfthfg fh fg hfgh fghfghfgh', '1.2', '2.2', 1, 1, 0, 'gfhfgh', 1, 3, '2021-04-19 01:15:41'),
(2, 'banner1904202109:06:31.png', 'alt', 'dsdfsdf', 'xvxcv', 'xcv', 'xdsdfsdfs', 'sdfsdf', 'sdfsdfsdfsdf', 'sdfsdfsd', 'fsdfsdf', '1.2', '1.5', 6, 4, 1, 'gfhfgh', 1, 3, '2021-04-19 03:36:31'),
(3, 'promocampaign1005202101:10:28.png', 'alt', 'ggggg', 'മലയാളം', 'tryrt', 'മലയാളം', 'vxcxcvx', 'cvxcvxcv', 'xcvxcv', 'xcvxc', '22', '1.5', 6, 4, 1, 'ghfgh', 1, 3, '2021-05-09 19:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `servicelinks`
--

CREATE TABLE `servicelinks` (
  `id` bigint UNSIGNED NOT NULL,
  `iconclass` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepagestatus` tinyint NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shortalerts`
--

CREATE TABLE `shortalerts` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ensubtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malsubtitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malcontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepagestatus` tinyint NOT NULL DEFAULT '1',
  `contributor_status` int NOT NULL DEFAULT '0',
  `contributor_userid` int NOT NULL DEFAULT '0',
  `contributor_timestamp` timestamp NULL DEFAULT NULL,
  `moderator_remarks` text COLLATE utf8mb4_unicode_ci,
  `moderator_status` int NOT NULL DEFAULT '0',
  `moderator_userid` int NOT NULL DEFAULT '0',
  `moderator_timestamp` timestamp NULL DEFAULT NULL,
  `approve_remarks` text COLLATE utf8mb4_unicode_ci,
  `approve_status` int NOT NULL DEFAULT '0',
  `approve_userid` int NOT NULL DEFAULT '0',
  `approve_timestamp` timestamp NULL DEFAULT NULL,
  `lock_status` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shortalerts`
--

INSERT INTO `shortalerts` (`id`, `entitle`, `maltitle`, `ensubtitle`, `malsubtitle`, `encontent`, `malcontent`, `homepagestatus`, `contributor_status`, `contributor_userid`, `contributor_timestamp`, `moderator_remarks`, `moderator_status`, `moderator_userid`, `moderator_timestamp`, `approve_remarks`, `approve_status`, `approve_userid`, `approve_timestamp`, `lock_status`, `status`, `users_id`, `created_at`) VALUES
(1, 'sadas', 'aaaa', 'asss', 'ssss', 'jjj', 'jjjjjjj', 1, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 0, 4, '2021-04-27 07:49:12'),
(2, 'dfgd', 'fgdfgd', 'dfsdfsd', 'xdsdfsdfs', 'sdasd', 'asdasd', 2, 0, 0, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, 0, 0, 4, '2021-04-29 05:09:25'),
(3, 'short alert', 'ഷോർട്ട് അലെർട് ', 'dad', 'asdasd', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'ഷോർട്ട് അലെർട് ഷോർട്ട് അലെർട് ഷോർട്ട് അലെർട് ', 1, 1, 5, '2021-04-29 05:34:43', 'remarks', 2, 11, '2021-04-29 05:55:19', 'dddd', 2, 14, '2021-04-29 06:05:04', 1, 1, 5, '2021-04-29 05:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `sitecontrollabels`
--

CREATE TABLE `sitecontrollabels` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitecontrollabels`
--

INSERT INTO `sitecontrollabels` (`id`, `entitle`, `maltitle`, `status`, `users_id`, `created_at`) VALUES
(1, 'Add new', 'asdasd', 1, 1, '2021-04-12 00:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `sitesettings`
--

CREATE TABLE `sitesettings` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `titlevalues` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitesettings`
--

INSERT INTO `sitesettings` (`id`, `entitle`, `enabled`, `titlevalues`, `status`, `users_id`, `created_at`) VALUES
(2, 'CMAP value', '0', '0', 1, 1, '2021-05-04 13:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` bigint UNSIGNED NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iconclass` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `url`, `iconclass`, `entitle`, `maltitle`, `entooltip`, `maltooltip`, `status`, `users_id`, `created_at`) VALUES
(1, 'https://www.facebook.com/keralainformation/', 'fab fa-facebook-f', 'Facebook', 'social media', 'social media', 'social media', 1, 4, '2021-04-19 00:59:27'),
(2, 'https://twitter.com/keralainfoiprd', 'fab fa-twitter', 'Twitter', 'cvbcvb', 'cccccc', 'vvvvvv', 1, 4, '2021-04-19 23:49:30'),
(3, 'https://www.youtube.com/iprdkerala', 'fab fa-youtube', 'Twitter', 'cvbcvb', 'cccccc', 'vvvvvv', 1, 4, '2021-04-19 23:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offices_id` bigint UNSIGNED NOT NULL,
  `departments_id` bigint UNSIGNED NOT NULL,
  `designations_id` bigint UNSIGNED NOT NULL,
  `staffcategories_id` bigint UNSIGNED NOT NULL,
  `hierarchies_id` bigint UNSIGNED NOT NULL,
  `mobile` bigint NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joindate` date NOT NULL,
  `poster` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `malname`, `offices_id`, `departments_id`, `designations_id`, `staffcategories_id`, `hierarchies_id`, `mobile`, `email`, `joindate`, `poster`, `alt`, `status`, `users_id`, `created_at`) VALUES
(2, 'test', 'fgdffg', 1, 1, 1, 1, 1, 9856321001, 'ffgfg@drg.dfg', '2021-04-12', 'staff1204202110:43:08.png', 'jhjk', 2, 2, '2021-04-12 05:13:08'),
(3, 'fgdffffffffffff', 'dfffffffffffff', 1, 1, 1, 1, 1, 1478523699, 'dfdg@ffg.fdg', '2021-04-26', 'staff2604202108:30:50.jpg', 'fgdgf', 1, 9, '2021-04-26 03:00:50');

-- --------------------------------------------------------

--
-- Table structure for table `staffcategories`
--

CREATE TABLE `staffcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffcategories`
--

INSERT INTO `staffcategories` (`id`, `entitle`, `maltitle`, `status`, `users_id`, `created_at`) VALUES
(1, 'staffcate', '', 2, 1, '2021-04-07 09:19:29'),
(6, 'shabeeba', 'മൂല്യനിർണ്ണയം', 1, 2, '2021-05-06 07:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `staffcommittees`
--

CREATE TABLE `staffcommittees` (
  `id` bigint UNSIGNED NOT NULL,
  `staffs_id` bigint UNSIGNED NOT NULL,
  `committees_id` bigint UNSIGNED NOT NULL,
  `hierarchies_id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffcommittees`
--

INSERT INTO `staffcommittees` (`id`, `staffs_id`, `committees_id`, `hierarchies_id`, `status`, `users_id`, `created_at`) VALUES
(5, 2, 1, 1, 2, 9, '2021-04-26 03:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `submenus`
--

CREATE TABLE `submenus` (
  `id` bigint UNSIGNED NOT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iconclass` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentmenu` bigint NOT NULL,
  `menulinktypes_id` bigint UNSIGNED NOT NULL,
  `pointto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submenus`
--

INSERT INTO `submenus` (`id`, `file`, `iconclass`, `entitle`, `maltitle`, `entooltip`, `maltooltip`, `parentmenu`, `menulinktypes_id`, `pointto`, `status`, `users_id`, `created_at`) VALUES
(1, '5', 'ddd', 'State', 'രൂപരേഖ', 'Profile', 'രൂപരേഖ', 1, 4, 'abcde', 1, 4, '2021-05-18 14:37:13'),
(2, '6', 'ddd', 'Districts', 'സാമൂഹികം-സാംസ്കാരികം', 'SocioCultural', 'സാമൂഹികം സാംസ്കാരികം', 1, 4, 'abcde', 1, 4, '2021-05-18 14:53:39'),
(4, '4', 'ddd', 'Departments', 'വകുപ്പുകൾ', 'Departments', 'വകുപ്പുകൾ', 2, 4, 'dsdfsdfsf', 1, 4, '2021-05-18 14:56:31'),
(5, '6', 'ddd', 'History', 'സാമൂഹികം-സാംസ്കാരികം', 'SocioCultural', 'സാമൂഹികം സാംസ്കാരികം', 1, 4, 'abcde', 1, 4, '2021-05-18 14:53:39'),
(6, '6', 'ddd', 'Economy', 'സാമൂഹികം-സാംസ്കാരികം', 'SocioCultural', 'സാമൂഹികം സാംസ്കാരികം', 1, 4, 'abcde', 1, 4, '2021-05-18 14:53:39'),
(7, '6', 'ddd', 'Elections', 'സാമൂഹികം-സാംസ്കാരികം', 'SocioCultural', 'സാമൂഹികം സാംസ്കാരികം', 1, 4, 'abcde', 1, 4, '2021-05-18 14:53:39'),
(8, 'http://score.kerala.gov.in/', 'ddd', 'CR Submission', 'രൂപരേഖ', 'sdfsdf', 'മലയാളം', 3, 2, 'abcde', 1, 4, '2021-05-24 14:58:23'),
(9, 'feedback', 'ddd', 'Application Form', 'രൂപരേഖ', 'sdfsdf', 'മലയാളം', 2, 5, 'abcde', 1, 4, '2021-05-24 15:56:16'),
(10, '6', 'ddd', 'Literature', 'സാമൂഹികം-സാംസ്കാരികം', 'SocioCultural', 'സാമൂഹികം സാംസ്കാരികം', 1, 4, 'abcde', 1, 4, '2021-05-18 14:53:39'),
(11, '6', 'ddd', 'Tourism', 'സാമൂഹികം-സാംസ്കാരികം', 'SocioCultural', 'സാമൂഹികം സാംസ്കാരികം', 1, 4, 'abcde', 1, 4, '2021-05-18 14:53:39'),
(12, '6', 'ddd', 'Festivals', 'സാമൂഹികം-സാംസ്കാരികം', 'SocioCultural', 'സാമൂഹികം സാംസ്കാരികം', 1, 4, 'abcde', 1, 4, '2021-05-18 14:53:39'),
(14, 'submenu2705202116:58:08.pdf', 'ddd', 'GO Order', 'രൂപരേഖ', 'sdfsdf', 'മലയാളം', 2, 3, 'abcde', 1, 4, '2021-05-27 11:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ensubtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malsubtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `entitle`, `maltitle`, `ensubtitle`, `malsubtitle`, `status`, `users_id`, `created_at`) VALUES
(1, 'Official Web Portal', 'കേരള പോർട്ടൽ ', 'subr', 'subgss', 2, 4, '2021-04-16 02:15:35'),
(2, 'cvx', 'മൂല്യനിർണ്ണയം', 'xcvxzc', 'മൂല്യനിർണ്ണയം', 2, 4, '2021-05-04 18:43:33'),
(4, 'FGHJKL', 'മൂല്യനിർണ്ണയം', 'DFGHJK', 'മൂല്യനിർണ്ണയം', 2, 4, '2021-05-07 04:58:15'),
(5, 'GOVERNMENT OF KERALA', 'കേരള പോർട്ടൽ', 'Official Web Portal', 'subgss', 1, 4, '2021-06-20 14:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `malname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` bigint NOT NULL DEFAULT '0',
  `staffcategories_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `designations_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `departments_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `offices_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `2fa` tinyint(1) NOT NULL DEFAULT '0',
  `otp` tinyint NOT NULL DEFAULT '0',
  `otpsentts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `otpverifiedts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usertypes_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `password_reset` int NOT NULL DEFAULT '0',
  `users_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `malname`, `mobile`, `staffcategories_id`, `designations_id`, `departments_id`, `offices_id`, `2fa`, `otp`, `otpsentts`, `otpverifiedts`, `usertypes_id`, `status`, `password_reset`, `users_id`, `created_at`) VALUES
(1, 'Admin', 'admin@cdit.org', NULL, '$2y$10$fPy7brcJz0pCk45blfl7N.WAi/9AMQbo40CcysVWCPjGorss3PKUm', NULL, NULL, 0, 1, 1, 1, 1, 0, 0, '2021-04-07 09:24:19', '2021-04-07 09:24:19', 1, 2, 1, 1, '2021-04-07 09:24:19'),
(2, 'App Admin', 'appadmin@cdit.org', NULL, '$2y$10$fPy7brcJz0pCk45blfl7N.WAi/9AMQbo40CcysVWCPjGorss3PKUm', NULL, NULL, 0, 1, 1, 1, 1, 0, 0, '2021-04-07 09:24:19', '2021-04-07 09:24:19', 2, 1, 0, 1, '2021-04-07 09:24:19'),
(3, 'Web Admin', 'webadmin@cdit.org', NULL, '$2y$10$cVr9FIRKqqa0W4tQzmQ24OABNb1S0iNfmaml156il/Jy8dJ2XbRtS', NULL, 'Web Admin', 9995140577, 1, 1, 1, 1, 0, 0, '2021-04-09 11:23:24', '2021-04-09 11:23:24', 4, 1, 0, 1, '2021-04-09 05:53:24'),
(4, 'Site Admin', 'siteadmin@cdit.org', NULL, '$2y$10$fPy7brcJz0pCk45blfl7N.WAi/9AMQbo40CcysVWCPjGorss3PKUm', NULL, 'Site Admin', 9877412365, 1, 1, 1, 1, 0, 0, '2021-04-12 05:45:47', '2021-04-12 05:45:47', 3, 1, 0, 1, '2021-04-12 00:15:47'),
(5, 'Editor', 'editor@cdit.org', NULL, '$2y$10$Lts1GW3goERqpX9fF.8foOt/cZbwf8tJ8pIIO.csTOep16C4FG4ZS', NULL, 'Editor', 9995140577, 1, 1, 1, 1, 0, 0, '2021-04-21 06:29:09', '2021-04-21 06:29:09', 5, 1, 0, 1, '2021-04-21 00:59:09'),
(6, 'Dept Head', 'depthead@cdit.org', NULL, '$2y$10$86/EJp0X8D/2gPA59JEoceo9RUzdXrAlttUQXQzOTAdPuSp0GWi7a', NULL, 'Dept Head', 9988774451, 1, 1, 1, 1, 0, 0, '2021-04-22 11:29:59', '2021-04-22 11:29:59', 14, 1, 0, 6, '2021-04-22 05:59:59'),
(7, 'Dept Asst', 'deptasst@cdit.org', NULL, '$2y$10$iDGpo10tUUZFhhhwqG8rfuMTAj.3b6/z5/I9CiWp.jMxkdJMos/Ii', NULL, 'Dept Asst', 9856321001, 1, 1, 1, 1, 0, 0, '2021-04-23 08:54:12', '2021-04-23 08:54:12', 15, 1, 0, 1, '2021-04-23 03:24:12'),
(8, 'Photo Editor', 'photoeditor@cdit.org', NULL, '$2y$10$x8B3T5GfBJn2WHO.g7fPYu/yq67ok54JvaEMXv4Qe26gRk80IgJcG', NULL, 'Photo Editor', 9656998658, 1, 1, 1, 1, 0, 0, '2021-04-23 09:56:06', '2021-04-23 09:56:06', 6, 1, 0, 1, '2021-04-23 04:26:06'),
(9, 'App Manager', 'appmanager@cdit.org', NULL, '$2y$10$s.Bffsp2eSnHKyh37i0NQO3UHTGfu2cx5SYeB4uqpKXJ6zC2euy4e', NULL, 'App Manager', 9656996856, 1, 1, 1, 1, 0, 0, '2021-04-26 07:15:44', '2021-04-26 07:15:44', 9, 1, 0, 1, '2021-04-26 01:45:44'),
(10, 'App Client', 'appclient@cdit.org', NULL, '$2y$10$IXKF.wNOmIqgH4BHjsEYxO6k8cal1DvfXwXty6OBC61u1vK.CfZAG', NULL, 'App Client', 1253698565, 1, 1, 1, 1, 0, 0, '2021-04-26 10:52:01', '2021-04-26 10:52:01', 10, 1, 0, 1, '2021-04-26 05:22:01'),
(11, 'Moderator', 'moderator@cdit.org', NULL, '$2y$10$8gSxBzhB.N1jUYzSDE4zb.eXWT/Cp7IdfhKTjWMfbCHosSUe.i7NW', NULL, 'Moderator', 9876543210, 1, 1, 1, 1, 0, 0, '2021-04-26 11:14:22', '2021-04-26 11:14:22', 7, 1, 0, 1, '2021-04-26 05:44:22'),
(12, 'Live Streaming', 'livestreaming@cdit.org', NULL, '$2y$10$MFVaR2Xq6n6kkZ55zuZWkehTallz2YjM9AXCINtHhZA6dLUSOWzPC', NULL, 'Live Streaming', 8978987890, 1, 1, 1, 1, 0, 0, '2021-04-26 11:20:16', '2021-04-26 11:20:16', 12, 1, 0, 1, '2021-04-26 05:50:16'),
(13, 'Dept SO', 'deptso@cdit.org', NULL, '$2y$10$TIGNC36v30gIkIonWWMO/Obxht6t/yLoSkFXDaaSu0QA036oyMH3O', NULL, 'Dept SO', 2596325698, 1, 1, 1, 1, 0, 0, '2021-04-27 06:40:24', '2021-04-27 06:40:24', 16, 1, 0, 1, '2021-04-27 06:40:24'),
(14, 'Publisher', 'publisher@cdit.org', NULL, '$2y$10$GRKfZI1hlAlwdlIQvd5EsOXwn2KBd5XKWYlCxaXra/aQSjNonTS2O', NULL, 'Publisher', 9638527410, 1, 1, 1, 1, 0, 0, '2021-04-27 07:13:53', '2021-04-27 07:13:53', 8, 1, 0, 1, '2021-04-27 07:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `id` bigint UNSIGNED NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`id`, `entitle`, `status`, `users_id`, `created_at`) VALUES
(1, 'Admin', 1, 1, '2021-04-07 09:22:20'),
(2, 'App Admin', 1, 1, '2021-04-07 06:27:18'),
(3, 'Site Admin', 1, 1, '2021-04-12 00:45:38'),
(4, 'Web Admin', 1, 1, '2021-04-16 02:25:41'),
(5, 'Editor', 1, 1, '2021-04-21 00:48:39'),
(6, 'Photo Editor', 1, 1, '2021-04-22 05:55:05'),
(7, 'Moderator', 1, 1, '2021-04-22 05:55:17'),
(8, 'Publisher', 1, 1, '2021-04-22 05:55:27'),
(9, 'App Manager', 1, 1, '2021-04-22 05:55:40'),
(10, 'App Client', 1, 1, '2021-04-22 05:55:50'),
(11, 'Contributor', 1, 1, '2021-04-22 05:57:34'),
(12, 'Live Streaming', 1, 1, '2021-04-22 05:57:43'),
(13, 'Analytics', 1, 1, '2021-04-22 05:57:53'),
(14, 'Department Heads', 1, 1, '2021-04-22 05:58:08'),
(15, 'Dept Asst', 1, 1, '2021-04-23 03:22:44'),
(16, 'Dept SO', 1, 1, '2021-04-23 03:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `whatsnews`
--

CREATE TABLE `whatsnews` (
  `id` bigint UNSIGNED NOT NULL,
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ensubtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malsubtitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malcontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `components_id` tinyint(1) NOT NULL,
  `iconclass` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepagestatus` tinyint NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whatsnews`
--

INSERT INTO `whatsnews` (`id`, `entooltip`, `maltooltip`, `entitle`, `maltitle`, `ensubtitle`, `malsubtitle`, `encontent`, `malcontent`, `components_id`, `iconclass`, `homepagestatus`, `status`, `users_id`, `created_at`) VALUES
(1, 'iiiiiiiii', 'uuuuu', 'Resilient Kerala Program (PforR)- Draft Report on ESSA(English) (Malayalam) rt on ESSA(English)(Malayalam', 'eeeeee', 'asdasdfffff', 'fffff', 'dddd', 'aaaaaa', 1, 'sssss', 0, 1, 4, '2021-04-20 05:35:33'),
(2, 'iiiiiiiii', 'uuuuu', 'Resilient Kerala Program (PforR)- Draft Report on ESSA(English) (Malayalam) rt on ESSA(English)(Malayalam', 'eeeeee', 'asdasdfffff', 'fffff', 'dddd', 'aaaaaa', 1, 'sssss', 0, 1, 4, '2021-04-20 05:35:33'),
(3, 'iiiiiiiii', 'uuuuu', 'Resilient Kerala Program (PforR)- Draft Report on ESSA(English) (Malayalam) rt on ESSA(English)(Malayalam', 'eeeeee', 'asdasdfffff', 'fffff', 'dddd', 'aaaaaa', 1, 'sssss', 0, 1, 4, '2021-04-20 05:35:33'),
(4, 'iiiiiiiii', 'uuuuu', 'Resilient Kerala Program (PforR)- Draft Report on ESSA(English) (Malayalam) rt on ESSA(English)(Malayalam', 'eeeeee', 'asdasdfffff', 'fffff', 'dddd', 'aaaaaa', 1, 'sssss', 0, 1, 4, '2021-04-20 05:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `widgetlinks`
--

CREATE TABLE `widgetlinks` (
  `id` bigint UNSIGNED NOT NULL,
  `fileval` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maltitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ensubtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malsubtitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `malcontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepagestatus` tinyint NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `menulinktypes_id` bigint NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widgetlinks`
--

INSERT INTO `widgetlinks` (`id`, `fileval`, `file`, `alt`, `entooltip`, `maltooltip`, `entitle`, `maltitle`, `ensubtitle`, `malsubtitle`, `encontent`, `malcontent`, `homepagestatus`, `status`, `menulinktypes_id`, `users_id`, `created_at`) VALUES
(2, 'https://www.kerala.gov.in/', 'widgetlink2106202116:53:11.jpg', 'alt', 'ssdf', 'മലയാളം', 'Citizen Services', 'മലയാളം', 'Lorem ipsum dolor sit amet consectetur adipiscing', 'മലയാളം', 'Lorem ipsum dolor sit amet consectetur adipiscing', 'sdfsdf', 1, 1, 2, 3, '2021-05-12 09:19:17'),
(3, 'https://www.kerala.gov.in/', 'widgetlink2106202116:54:38.jpg', 'ralt', 'dfsdf', 'മലയാളം', 'Noticeboard', 'മലയാളം', 'Lorem ipsum dolor sit amet consectetur adipiscing', 'മലയാളം', 'dsfsdfsd', 'sdfsdf', 1, 1, 2, 3, '2021-05-12 09:19:55'),
(4, 'https://www.kerala.gov.in/', 'widgetlink2106202116:22:26.jpg', 'alt', 'tool', 'മലയാളം', 'Document Repository', 'മലയാളം', 'Lorem ipsum dolor sit amet consectetur adipiscing', 'മലയാളം', 'dsdfgsdf', 'മലയാളം മലയാളം മലയാളം', 1, 1, 2, 3, '2021-05-14 05:57:40'),
(5, 'https://www.kerala.gov.in/', 'widgetlink2106202117:01:03.jpg', 'alt', 'toolh', 'മലയാളം', 'Dashboard', 'മലയാളം', 'Lorem ipsum dolor sit amet consectetur adipiscing', 'മലയാളം', 'dfgdfgdfg', 'മലയാളംമലയാളംമലയാളം', 1, 1, 2, 3, '2021-05-14 05:58:36'),
(6, '7', 'widgetlink2106202117:07:13.jpg', 'alt', 'toolhhjg', 'മലയാളം', 'Media', 'മലയാളം', 'Lorem ipsum dolor sit amet consectetur adipiscing', 'മലയാളം', 'ghfghf', 'മലയാളംമലയാളം', 1, 1, 4, 3, '2021-05-14 05:59:00'),
(7, 'https://cmo.kerala.gov.in/', 'widgetlink2106202117:05:06.jpg', 'alt', 'sdfsdf', 'മലയാളം', 'Grievance Redressal', 'മലയാളം', 'Lorem ipsum dolor sit amet consectetur adipiscing', 'മലയാളംമലയാളം', 'gfdgdfg', 'മലയാളംമലയാളംമലയാളംമലയാളംമലയാളംമലയാളംമലയാളംമലയാളം', 0, 1, 2, 3, '2021-06-14 11:23:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutdepartments`
--
ALTER TABLE `aboutdepartments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aboutdepartments_users_id_foreign` (`users_id`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_activitytypes_id_foreign` (`activitytypes_id`),
  ADD KEY `activities_users_id_foreign` (`users_id`);

--
-- Indexes for table `activitytypes`
--
ALTER TABLE `activitytypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activitytypes_users_id_foreign` (`users_id`);

--
-- Indexes for table `activityuploads`
--
ALTER TABLE `activityuploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activityuploads_filetypes_id_foreign` (`filetypes_id`),
  ADD KEY `activityuploads_contenttypes_id_foreign` (`contenttypes_id`),
  ADD KEY `activityuploads_users_id_foreign` (`users_id`),
  ADD KEY `activityuploads_activities_id_foreign` (`activities_id`);

--
-- Indexes for table `appdepartments`
--
ALTER TABLE `appdepartments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appdepartments_users_id_foreign` (`users_id`);

--
-- Indexes for table `appsections`
--
ALTER TABLE `appsections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appsections_appdepartments_id_foreign` (`appdepartments_id`),
  ADD KEY `appsections_users_id_foreign` (`users_id`);

--
-- Indexes for table `archivepolicies`
--
ALTER TABLE `archivepolicies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archivepolicies_users_id_foreign` (`users_id`);

--
-- Indexes for table `articlecategories`
--
ALTER TABLE `articlecategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articlecategories_users_id_foreign` (`users_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_articlecategories_id_foreign` (`articlecategories_id`),
  ADD KEY `articles_users_id_foreign` (`users_id`);

--
-- Indexes for table `articleuploads`
--
ALTER TABLE `articleuploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articleuploads_filetypes_id_foreign` (`filetypes_id`),
  ADD KEY `articleuploads_contenttypes_id_foreign` (`contenttypes_id`),
  ADD KEY `articleuploads_users_id_foreign` (`users_id`),
  ADD KEY `articleuploads_articles_id_foreign` (`articles_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_users_id_foreign` (`users_id`);

--
-- Indexes for table `buttons`
--
ALTER TABLE `buttons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buttons_menulinktypes_id_foreign` (`menulinktypes_id`),
  ADD KEY `buttons_users_id_foreign` (`users_id`);

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `committees_users_id_foreign` (`users_id`);

--
-- Indexes for table `communicationattachments`
--
ALTER TABLE `communicationattachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `communicationattachments_communications_id_foreign` (`communications_id`),
  ADD KEY `communicationattachments_users_id_foreign` (`users_id`);

--
-- Indexes for table `communications`
--
ALTER TABLE `communications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `communicationto` (`communicationto`),
  ADD KEY `communicationtypes_id` (`communicationtypes_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `communicationtypes`
--
ALTER TABLE `communicationtypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `communicationtypes_users_id_foreign` (`users_id`);

--
-- Indexes for table `componentarticles`
--
ALTER TABLE `componentarticles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `componentarticles_users_id_foreign` (`users_id`);

--
-- Indexes for table `componentpermissions`
--
ALTER TABLE `componentpermissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `componentpermissions_components_id_foreign` (`components_id`),
  ADD KEY `componentpermissions_users_id_foreign` (`users_id`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`),
  ADD KEY `components_users_id_foreign` (`users_id`);

--
-- Indexes for table `contenttypes`
--
ALTER TABLE `contenttypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contenttypes_users_id_foreign` (`users_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_users_id_foreign` (`users_id`);

--
-- Indexes for table `deptcategories`
--
ALTER TABLE `deptcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deptcategories_users_id_foreign` (`users_id`);

--
-- Indexes for table `deptintroductions`
--
ALTER TABLE `deptintroductions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deptintroductions_users_id_foreign` (`users_id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designations_users_id_foreign` (`users_id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `downloads_downloadtypes_id_foreign` (`downloadtypes_id`),
  ADD KEY `downloads_archivepolicies_id_foreign` (`archivepolicies_id`),
  ADD KEY `downloads_filetypes_id_foreign` (`filetypes_id`),
  ADD KEY `downloads_contenttypes_id_foreign` (`contenttypes_id`),
  ADD KEY `downloads_users_id_foreign` (`users_id`);

--
-- Indexes for table `downloadtypes`
--
ALTER TABLE `downloadtypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `downloadtypes_users_id_foreign` (`users_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_users_id_foreign` (`users_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filetypes`
--
ALTER TABLE `filetypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filetypes_contenttypes_id_foreign` (`contenttypes_id`),
  ADD KEY `filetypes_users_id_foreign` (`users_id`);

--
-- Indexes for table `footerlinks`
--
ALTER TABLE `footerlinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `footerlinks_users_id_foreign` (`users_id`);

--
-- Indexes for table `footermenus`
--
ALTER TABLE `footermenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `footermenus_users_id_foreign` (`users_id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `footers_users_id_foreign` (`users_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_users_id_foreign` (`users_id`);

--
-- Indexes for table `galleryitems`
--
ALTER TABLE `galleryitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleryitems_users_id_foreign` (`users_id`);

--
-- Indexes for table `hierarchies`
--
ALTER TABLE `hierarchies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hierarchies_users_id_foreign` (`users_id`);

--
-- Indexes for table `infolinks`
--
ALTER TABLE `infolinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infolinks_users_id_foreign` (`users_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_users_id_foreign` (`users_id`);

--
-- Indexes for table `livestreamings`
--
ALTER TABLE `livestreamings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livestreamings_users_id_foreign` (`users_id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logos_users_id_foreign` (`users_id`);

--
-- Indexes for table `longalerts`
--
ALTER TABLE `longalerts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `longalerts_users_id_foreign` (`users_id`);

--
-- Indexes for table `mainmenus`
--
ALTER TABLE `mainmenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mainmenus_menulinktypes_id_foreign` (`menulinktypes_id`),
  ADD KEY `mainmenus_users_id_foreign` (`users_id`);

--
-- Indexes for table `mediaalerts`
--
ALTER TABLE `mediaalerts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mediaalerts_filetypes_id_foreign` (`filetypes_id`),
  ADD KEY `mediaalerts_contenttypes_id_foreign` (`contenttypes_id`),
  ADD KEY `mediaalerts_users_id_foreign` (`users_id`);

--
-- Indexes for table `mediaalertsold`
--
ALTER TABLE `mediaalertsold`
  ADD PRIMARY KEY (`id`),
  ADD KEY `longalerts_filetypes_id_foreign` (`filetypes_id`),
  ADD KEY `longalerts_contenttypes_id_foreign` (`contenttypes_id`),
  ADD KEY `longalerts_users_id_foreign` (`users_id`);

--
-- Indexes for table `membershiprequests`
--
ALTER TABLE `membershiprequests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membershiprequests_offices_id_foreign` (`offices_id`),
  ADD KEY `membershiprequests_departments_id_foreign` (`departments_id`),
  ADD KEY `membershiprequests_designations_id_foreign` (`designations_id`),
  ADD KEY `membershiprequests_users_id_foreign` (`users_id`);

--
-- Indexes for table `menulinktypes`
--
ALTER TABLE `menulinktypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menulinktypes_users_id_foreign` (`users_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newsletters_users_id_foreign` (`users_id`);

--
-- Indexes for table `newslettervolumes`
--
ALTER TABLE `newslettervolumes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newslettervolumes_filetypes_id_foreign` (`filetypes_id`),
  ADD KEY `newslettervolumes_contenttypes_id_foreign` (`contenttypes_id`),
  ADD KEY `newslettervolumes_users_id_foreign` (`users_id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offices_users_id_foreign` (`users_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `promocampaigns`
--
ALTER TABLE `promocampaigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promocampaigns_filetypes_id_foreign` (`filetypes_id`),
  ADD KEY `promocampaigns_contenttypes_id_foreign` (`contenttypes_id`),
  ADD KEY `promocampaigns_users_id_foreign` (`users_id`);

--
-- Indexes for table `servicelinks`
--
ALTER TABLE `servicelinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicelinks_users_id_foreign` (`users_id`);

--
-- Indexes for table `shortalerts`
--
ALTER TABLE `shortalerts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shortalerts_users_id_foreign` (`users_id`);

--
-- Indexes for table `sitecontrollabels`
--
ALTER TABLE `sitecontrollabels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sitecontrollabels_users_id_foreign` (`users_id`);

--
-- Indexes for table `sitesettings`
--
ALTER TABLE `sitesettings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sitesettings_users_id_foreign` (`users_id`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `socialmedia_users_id_foreign` (`users_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffcategories`
--
ALTER TABLE `staffcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staffcategories_users_id_foreign` (`users_id`);

--
-- Indexes for table `staffcommittees`
--
ALTER TABLE `staffcommittees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staffcommittees_committees_id_foreign` (`committees_id`),
  ADD KEY `staffcommittees_hierarchies_id_foreign` (`hierarchies_id`),
  ADD KEY `staffcommittees_users_id_foreign` (`users_id`),
  ADD KEY `staffcommittees_staffs_id_foreign` (`staffs_id`);

--
-- Indexes for table `submenus`
--
ALTER TABLE `submenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submenus_menulinktypes_id_foreign` (`menulinktypes_id`),
  ADD KEY `submenus_users_id_foreign` (`users_id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titles_users_id_foreign` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_staffcategories_id_foreign` (`staffcategories_id`),
  ADD KEY `users_designations_id_foreign` (`designations_id`),
  ADD KEY `users_departments_id_foreign` (`departments_id`),
  ADD KEY `users_offices_id_foreign` (`offices_id`),
  ADD KEY `users_usertypes_id_foreign` (`usertypes_id`),
  ADD KEY `users_users_id_foreign` (`users_id`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whatsnews`
--
ALTER TABLE `whatsnews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `whatsnews_users_id_foreign` (`users_id`);

--
-- Indexes for table `widgetlinks`
--
ALTER TABLE `widgetlinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `widgetlinks_users_id_foreign` (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutdepartments`
--
ALTER TABLE `aboutdepartments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `activitytypes`
--
ALTER TABLE `activitytypes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `activityuploads`
--
ALTER TABLE `activityuploads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appdepartments`
--
ALTER TABLE `appdepartments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appsections`
--
ALTER TABLE `appsections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `archivepolicies`
--
ALTER TABLE `archivepolicies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articlecategories`
--
ALTER TABLE `articlecategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `articleuploads`
--
ALTER TABLE `articleuploads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buttons`
--
ALTER TABLE `buttons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `communicationattachments`
--
ALTER TABLE `communicationattachments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `communications`
--
ALTER TABLE `communications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `communicationtypes`
--
ALTER TABLE `communicationtypes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `componentarticles`
--
ALTER TABLE `componentarticles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `componentpermissions`
--
ALTER TABLE `componentpermissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contenttypes`
--
ALTER TABLE `contenttypes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deptcategories`
--
ALTER TABLE `deptcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deptintroductions`
--
ALTER TABLE `deptintroductions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `downloadtypes`
--
ALTER TABLE `downloadtypes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `filetypes`
--
ALTER TABLE `filetypes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `footerlinks`
--
ALTER TABLE `footerlinks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `footermenus`
--
ALTER TABLE `footermenus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `galleryitems`
--
ALTER TABLE `galleryitems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hierarchies`
--
ALTER TABLE `hierarchies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `infolinks`
--
ALTER TABLE `infolinks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `livestreamings`
--
ALTER TABLE `livestreamings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `longalerts`
--
ALTER TABLE `longalerts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mainmenus`
--
ALTER TABLE `mainmenus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mediaalerts`
--
ALTER TABLE `mediaalerts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mediaalertsold`
--
ALTER TABLE `mediaalertsold`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membershiprequests`
--
ALTER TABLE `membershiprequests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menulinktypes`
--
ALTER TABLE `menulinktypes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `newslettervolumes`
--
ALTER TABLE `newslettervolumes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promocampaigns`
--
ALTER TABLE `promocampaigns`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `servicelinks`
--
ALTER TABLE `servicelinks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shortalerts`
--
ALTER TABLE `shortalerts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sitecontrollabels`
--
ALTER TABLE `sitecontrollabels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sitesettings`
--
ALTER TABLE `sitesettings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staffcategories`
--
ALTER TABLE `staffcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staffcommittees`
--
ALTER TABLE `staffcommittees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `submenus`
--
ALTER TABLE `submenus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `whatsnews`
--
ALTER TABLE `whatsnews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `widgetlinks`
--
ALTER TABLE `widgetlinks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aboutdepartments`
--
ALTER TABLE `aboutdepartments`
  ADD CONSTRAINT `aboutdepartments_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_activitytypes_id_foreign` FOREIGN KEY (`activitytypes_id`) REFERENCES `activitytypes` (`id`),
  ADD CONSTRAINT `activities_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `activitytypes`
--
ALTER TABLE `activitytypes`
  ADD CONSTRAINT `activitytypes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `activityuploads`
--
ALTER TABLE `activityuploads`
  ADD CONSTRAINT `activityuploads_activities_id_foreign` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activityuploads_contenttypes_id_foreign` FOREIGN KEY (`contenttypes_id`) REFERENCES `contenttypes` (`id`),
  ADD CONSTRAINT `activityuploads_filetypes_id_foreign` FOREIGN KEY (`filetypes_id`) REFERENCES `filetypes` (`id`),
  ADD CONSTRAINT `activityuploads_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `appdepartments`
--
ALTER TABLE `appdepartments`
  ADD CONSTRAINT `appdepartments_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `appsections`
--
ALTER TABLE `appsections`
  ADD CONSTRAINT `appsections_appdepartments_id_foreign` FOREIGN KEY (`appdepartments_id`) REFERENCES `appdepartments` (`id`),
  ADD CONSTRAINT `appsections_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `archivepolicies`
--
ALTER TABLE `archivepolicies`
  ADD CONSTRAINT `archivepolicies_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `articlecategories`
--
ALTER TABLE `articlecategories`
  ADD CONSTRAINT `articlecategories_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_articlecategories_id_foreign` FOREIGN KEY (`articlecategories_id`) REFERENCES `articlecategories` (`id`),
  ADD CONSTRAINT `articles_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `articleuploads`
--
ALTER TABLE `articleuploads`
  ADD CONSTRAINT `articleuploads_articles_id_foreign` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `articleuploads_contenttypes_id_foreign` FOREIGN KEY (`contenttypes_id`) REFERENCES `contenttypes` (`id`),
  ADD CONSTRAINT `articleuploads_filetypes_id_foreign` FOREIGN KEY (`filetypes_id`) REFERENCES `filetypes` (`id`),
  ADD CONSTRAINT `articleuploads_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `buttons`
--
ALTER TABLE `buttons`
  ADD CONSTRAINT `buttons_menulinktypes_id_foreign` FOREIGN KEY (`menulinktypes_id`) REFERENCES `menulinktypes` (`id`),
  ADD CONSTRAINT `buttons_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `committees`
--
ALTER TABLE `committees`
  ADD CONSTRAINT `committees_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `communicationattachments`
--
ALTER TABLE `communicationattachments`
  ADD CONSTRAINT `communicationattachments_communications_id_foreign` FOREIGN KEY (`communications_id`) REFERENCES `communications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `communicationattachments_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `communications`
--
ALTER TABLE `communications`
  ADD CONSTRAINT `communications_ibfk_1` FOREIGN KEY (`communicationto`) REFERENCES `committees` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `communications_ibfk_2` FOREIGN KEY (`communicationtypes_id`) REFERENCES `communicationtypes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `communications_ibfk_3` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `communicationtypes`
--
ALTER TABLE `communicationtypes`
  ADD CONSTRAINT `communicationtypes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `componentarticles`
--
ALTER TABLE `componentarticles`
  ADD CONSTRAINT `componentarticles_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `componentpermissions`
--
ALTER TABLE `componentpermissions`
  ADD CONSTRAINT `componentpermissions_components_id_foreign` FOREIGN KEY (`components_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `componentpermissions_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `components`
--
ALTER TABLE `components`
  ADD CONSTRAINT `components_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `contenttypes`
--
ALTER TABLE `contenttypes`
  ADD CONSTRAINT `contenttypes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `deptcategories`
--
ALTER TABLE `deptcategories`
  ADD CONSTRAINT `deptcategories_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `deptintroductions`
--
ALTER TABLE `deptintroductions`
  ADD CONSTRAINT `deptintroductions_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `designations`
--
ALTER TABLE `designations`
  ADD CONSTRAINT `designations_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_archivepolicies_id_foreign` FOREIGN KEY (`archivepolicies_id`) REFERENCES `archivepolicies` (`id`),
  ADD CONSTRAINT `downloads_contenttypes_id_foreign` FOREIGN KEY (`contenttypes_id`) REFERENCES `contenttypes` (`id`),
  ADD CONSTRAINT `downloads_downloadtypes_id_foreign` FOREIGN KEY (`downloadtypes_id`) REFERENCES `downloadtypes` (`id`),
  ADD CONSTRAINT `downloads_filetypes_id_foreign` FOREIGN KEY (`filetypes_id`) REFERENCES `filetypes` (`id`),
  ADD CONSTRAINT `downloads_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `downloadtypes`
--
ALTER TABLE `downloadtypes`
  ADD CONSTRAINT `downloadtypes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `filetypes`
--
ALTER TABLE `filetypes`
  ADD CONSTRAINT `filetypes_contenttypes_id_foreign` FOREIGN KEY (`contenttypes_id`) REFERENCES `contenttypes` (`id`),
  ADD CONSTRAINT `filetypes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `footerlinks`
--
ALTER TABLE `footerlinks`
  ADD CONSTRAINT `footerlinks_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `footermenus`
--
ALTER TABLE `footermenus`
  ADD CONSTRAINT `footermenus_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `footers`
--
ALTER TABLE `footers`
  ADD CONSTRAINT `footers_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `galleryitems`
--
ALTER TABLE `galleryitems`
  ADD CONSTRAINT `galleryitems_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `hierarchies`
--
ALTER TABLE `hierarchies`
  ADD CONSTRAINT `hierarchies_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `infolinks`
--
ALTER TABLE `infolinks`
  ADD CONSTRAINT `infolinks_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `livestreamings`
--
ALTER TABLE `livestreamings`
  ADD CONSTRAINT `livestreamings_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `logos`
--
ALTER TABLE `logos`
  ADD CONSTRAINT `logos_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `longalerts`
--
ALTER TABLE `longalerts`
  ADD CONSTRAINT `longalerts_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mainmenus`
--
ALTER TABLE `mainmenus`
  ADD CONSTRAINT `mainmenus_menulinktypes_id_foreign` FOREIGN KEY (`menulinktypes_id`) REFERENCES `menulinktypes` (`id`),
  ADD CONSTRAINT `mainmenus_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mediaalerts`
--
ALTER TABLE `mediaalerts`
  ADD CONSTRAINT `mediaalerts_contenttypes_id_foreign` FOREIGN KEY (`contenttypes_id`) REFERENCES `contenttypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mediaalerts_filetypes_id_foreign` FOREIGN KEY (`filetypes_id`) REFERENCES `filetypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mediaalerts_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `membershiprequests`
--
ALTER TABLE `membershiprequests`
  ADD CONSTRAINT `membershiprequests_departments_id_foreign` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `membershiprequests_designations_id_foreign` FOREIGN KEY (`designations_id`) REFERENCES `designations` (`id`),
  ADD CONSTRAINT `membershiprequests_offices_id_foreign` FOREIGN KEY (`offices_id`) REFERENCES `offices` (`id`),
  ADD CONSTRAINT `membershiprequests_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `menulinktypes`
--
ALTER TABLE `menulinktypes`
  ADD CONSTRAINT `menulinktypes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD CONSTRAINT `newsletters_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `newslettervolumes`
--
ALTER TABLE `newslettervolumes`
  ADD CONSTRAINT `newslettervolumes_contenttypes_id_foreign` FOREIGN KEY (`contenttypes_id`) REFERENCES `contenttypes` (`id`),
  ADD CONSTRAINT `newslettervolumes_filetypes_id_foreign` FOREIGN KEY (`filetypes_id`) REFERENCES `filetypes` (`id`),
  ADD CONSTRAINT `newslettervolumes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `offices`
--
ALTER TABLE `offices`
  ADD CONSTRAINT `offices_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `promocampaigns`
--
ALTER TABLE `promocampaigns`
  ADD CONSTRAINT `promocampaigns_contenttypes_id_foreign` FOREIGN KEY (`contenttypes_id`) REFERENCES `contenttypes` (`id`),
  ADD CONSTRAINT `promocampaigns_filetypes_id_foreign` FOREIGN KEY (`filetypes_id`) REFERENCES `filetypes` (`id`),
  ADD CONSTRAINT `promocampaigns_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `servicelinks`
--
ALTER TABLE `servicelinks`
  ADD CONSTRAINT `servicelinks_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `shortalerts`
--
ALTER TABLE `shortalerts`
  ADD CONSTRAINT `shortalerts_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sitecontrollabels`
--
ALTER TABLE `sitecontrollabels`
  ADD CONSTRAINT `sitecontrollabels_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sitesettings`
--
ALTER TABLE `sitesettings`
  ADD CONSTRAINT `sitesettings_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD CONSTRAINT `socialmedia_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `staffcategories`
--
ALTER TABLE `staffcategories`
  ADD CONSTRAINT `staffcategories_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `staffcommittees`
--
ALTER TABLE `staffcommittees`
  ADD CONSTRAINT `staffcommittees_committees_id_foreign` FOREIGN KEY (`committees_id`) REFERENCES `committees` (`id`),
  ADD CONSTRAINT `staffcommittees_hierarchies_id_foreign` FOREIGN KEY (`hierarchies_id`) REFERENCES `hierarchies` (`id`),
  ADD CONSTRAINT `staffcommittees_staffs_id_foreign` FOREIGN KEY (`staffs_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staffcommittees_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `submenus`
--
ALTER TABLE `submenus`
  ADD CONSTRAINT `submenus_menulinktypes_id_foreign` FOREIGN KEY (`menulinktypes_id`) REFERENCES `menulinktypes` (`id`),
  ADD CONSTRAINT `submenus_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `titles`
--
ALTER TABLE `titles`
  ADD CONSTRAINT `titles_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_departments_id_foreign` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `users_designations_id_foreign` FOREIGN KEY (`designations_id`) REFERENCES `designations` (`id`),
  ADD CONSTRAINT `users_offices_id_foreign` FOREIGN KEY (`offices_id`) REFERENCES `offices` (`id`),
  ADD CONSTRAINT `users_staffcategories_id_foreign` FOREIGN KEY (`staffcategories_id`) REFERENCES `staffcategories` (`id`),
  ADD CONSTRAINT `users_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `users_usertypes_id_foreign` FOREIGN KEY (`usertypes_id`) REFERENCES `usertypes` (`id`);

--
-- Constraints for table `whatsnews`
--
ALTER TABLE `whatsnews`
  ADD CONSTRAINT `whatsnews_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `widgetlinks`
--
ALTER TABLE `widgetlinks`
  ADD CONSTRAINT `widgetlinks_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
