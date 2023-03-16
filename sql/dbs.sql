-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 11:23 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isa`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_new_students`
--

CREATE TABLE `add_new_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `suID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suEMAIL` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surNAME` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstNAME` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastNAME` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Faculty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Course` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Residence` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNUMBER` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passportNUMBER` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_new_students`
--

INSERT INTO `add_new_students` (`id`, `suID`, `suEMAIL`, `surNAME`, `firstNAME`, `lastNAME`, `Faculty`, `Nationality`, `Course`, `Residence`, `phoneNUMBER`, `passportNUMBER`, `created_at`, `updated_at`) VALUES
(1, '03188', 'abc@gmail.com', 'Wambogo', 'gsgrsdf', 'vdsgfsD', 'asdbD', 'Ugandan', 'vfdzvsfb', 'Mombasa Road', '254798645390', 'AB4351TG', '2021-09-27 08:35:44', '2021-09-27 08:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `applyvisaextensions`
--

CREATE TABLE `applyvisaextensions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Initiated',
  `surNAME` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otherNAMES` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passportNUMBER` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suEMAIL` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateofENTRY` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Biodata` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passportPIC` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entryVISA` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currentVISA` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applyvisaextensions`
--

INSERT INTO `applyvisaextensions` (`id`, `status`, `surNAME`, `otherNAMES`, `passportNUMBER`, `suEMAIL`, `suID`, `Nationality`, `dateofENTRY`, `Biodata`, `passportPIC`, `entryVISA`, `currentVISA`, `created_at`, `updated_at`) VALUES
(1, 'In Progress', 'Oloo', 'Isaya Ogumbe', 'ab72617sb', 'Iloo@gmail.com', '09000', 'Bahamas', '2021-09-13', '1632735344.bate approval.pdf', '1632735344.BuddyAllocations (1).pdf', '1632735344.BuddyAllocations (2).pdf', '1632735344.chanda approval.pdf', '2021-09-27 06:35:44', '2021-09-27 09:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `apply_kpps`
--

CREATE TABLE `apply_kpps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surNAME` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otherNAMES` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passportNUMBER` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Course` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Residence` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suEMAIL` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateofENTRY` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNUMBER` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passportPICTURE` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biodataPAGE` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currentVISA` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardiansID` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commitmentLETTER` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `academicTRANSCRIPTS` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policeCLEARANCE` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Faculty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buddies`
--

CREATE TABLE `buddies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surNAME` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otherNAMES` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Residence` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PassportNUMBER` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNUMBER` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Faculty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buddies`
--

INSERT INTO `buddies` (`id`, `surNAME`, `otherNAMES`, `suID`, `email`, `Residence`, `course`, `PassportNUMBER`, `phoneNUMBER`, `Nationality`, `Faculty`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Oloo', 'Murume', '01587', 'ignatius@gmail.com', 'Utawala', 'bcom', 'ab72617sbop', '2549879', 'Ugandan', 'FIT', NULL, '2021-09-27 06:37:48', '2021-09-27 06:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `buddies_allocation`
--

CREATE TABLE `buddies_allocation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Buddy_otherNAMES` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Buddy_suID` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NewSTD_surNAME` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NewSTD_otherNAMES` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NewSTD_passportNUMBER` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NewSTD_course` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NewSTD_suID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NewSTD_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NewSTD_Faculty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passportNUMBER` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NewSTD_Nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buddies_allocation`
--

INSERT INTO `buddies_allocation` (`id`, `Buddy_otherNAMES`, `Buddy_suID`, `NewSTD_surNAME`, `NewSTD_otherNAMES`, `NewSTD_passportNUMBER`, `NewSTD_course`, `NewSTD_suID`, `NewSTD_email`, `NewSTD_Faculty`, `passportNUMBER`, `NewSTD_Nationality`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Murume', '01587', 'Oloo', 'Isaya Ogumbe', 'adhj7t', 'bcom', '09000', 'Iloo@gmail.com', 'FIT', NULL, 'Bahamas', NULL, '2021-09-27 06:38:03', '2021-09-27 06:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `buddies_requests`
--

CREATE TABLE `buddies_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surNAME` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otherNAMES` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `YearOfStudy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PassportNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Faculty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buddies_requests`
--

INSERT INTO `buddies_requests` (`id`, `surNAME`, `otherNAMES`, `suID`, `email`, `course`, `YearOfStudy`, `PassportNumber`, `Nationality`, `Faculty`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Oloo', 'Isaya Ogumbe', '09000', 'Iloo@gmail.com', 'bcom', '4 th', 'adhj7t', 'Bahamas', 'FIT', NULL, '2021-09-27 06:36:06', '2021-09-27 06:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `short_code`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'af', NULL, NULL),
(2, 'Albania', 'al', NULL, NULL),
(3, 'Algeria', 'dz', NULL, NULL),
(4, 'American Samoa', 'as', NULL, NULL),
(5, 'Andorra', 'ad', NULL, NULL),
(6, 'Angola', 'ao', NULL, NULL),
(7, 'Anguilla', 'ai', NULL, NULL),
(8, 'Antarctica', 'aq', NULL, NULL),
(9, 'Antigua and Barbuda', 'ag', NULL, NULL),
(10, 'Argentina', 'ar', NULL, NULL),
(11, 'Armenia', 'am', NULL, NULL),
(12, 'Aruba', 'aw', NULL, NULL),
(13, 'Australia', 'au', NULL, NULL),
(14, 'Austria', 'at', NULL, NULL),
(15, 'Azerbaijan', 'az', NULL, NULL),
(16, 'Bahamas', 'bs', NULL, NULL),
(17, 'Bahrain', 'bh', NULL, NULL),
(18, 'Bangladesh', 'bd', NULL, NULL),
(19, 'Barbados', 'bb', NULL, NULL),
(20, 'Belarus', 'by', NULL, NULL),
(21, 'Belgium', 'be', NULL, NULL),
(22, 'Belize', 'bz', NULL, NULL),
(23, 'Benin', 'bj', NULL, NULL),
(24, 'Bermuda', 'bm', NULL, NULL),
(25, 'Bhutan', 'bt', NULL, NULL),
(26, 'Bolivia', 'bo', NULL, NULL),
(27, 'Bosnia and Herzegovina', 'ba', NULL, NULL),
(28, 'Botswana', 'bw', NULL, NULL),
(29, 'Brazil', 'br', NULL, NULL),
(30, 'British Indian Ocean Territory', 'io', NULL, NULL),
(31, 'British Virgin Islands', 'vg', NULL, NULL),
(32, 'Brunei', 'bn', NULL, NULL),
(33, 'Bulgaria', 'bg', NULL, NULL),
(34, 'Burkina Faso', 'bf', NULL, NULL),
(35, 'Burundi', 'bi', NULL, NULL),
(36, 'Cambodia', 'kh', NULL, NULL),
(37, 'Cameroon', 'cm', NULL, NULL),
(38, 'Canada', 'ca', NULL, NULL),
(39, 'Cape Verde', 'cv', NULL, NULL),
(40, 'Cayman Islands', 'ky', NULL, NULL),
(41, 'Central African Republic', 'cf', NULL, NULL),
(42, 'Chad', 'td', NULL, NULL),
(43, 'Chile', 'cl', NULL, NULL),
(44, 'China', 'cn', NULL, NULL),
(45, 'Christmas Island', 'cx', NULL, NULL),
(46, 'Cocos Islands', 'cc', NULL, NULL),
(47, 'Colombia', 'co', NULL, NULL),
(48, 'Comoros', 'km', NULL, NULL),
(49, 'Cook Islands', 'ck', NULL, NULL),
(50, 'Costa Rica', 'cr', NULL, NULL),
(51, 'Croatia', 'hr', NULL, NULL),
(52, 'Cuba', 'cu', NULL, NULL),
(53, 'Curacao', 'cw', NULL, NULL),
(54, 'Cyprus', 'cy', NULL, NULL),
(55, 'Czech Republic', 'cz', NULL, NULL),
(56, 'Democratic Republic of the Congo', 'cd', NULL, NULL),
(57, 'Denmark', 'dk', NULL, NULL),
(58, 'Djibouti', 'dj', NULL, NULL),
(59, 'Dominica', 'dm', NULL, NULL),
(60, 'Dominican Republic', 'do', NULL, NULL),
(61, 'East Timor', 'tl', NULL, NULL),
(62, 'Ecuador', 'ec', NULL, NULL),
(63, 'Egypt', 'eg', NULL, NULL),
(64, 'El Salvador', 'sv', NULL, NULL),
(65, 'Equatorial Guinea', 'gq', NULL, NULL),
(66, 'Eritrea', 'er', NULL, NULL),
(67, 'Estonia', 'ee', NULL, NULL),
(68, 'Ethiopia', 'et', NULL, NULL),
(69, 'Falkland Islands', 'fk', NULL, NULL),
(70, 'Faroe Islands', 'fo', NULL, NULL),
(71, 'Fiji', 'fj', NULL, NULL),
(72, 'Finland', 'fi', NULL, NULL),
(73, 'France', 'fr', NULL, NULL),
(74, 'French Polynesia', 'pf', NULL, NULL),
(75, 'Gabon', 'ga', NULL, NULL),
(76, 'Gambia', 'gm', NULL, NULL),
(77, 'Georgia', 'ge', NULL, NULL),
(78, 'Germany', 'de', NULL, NULL),
(79, 'Ghana', 'gh', NULL, NULL),
(80, 'Gibraltar', 'gi', NULL, NULL),
(81, 'Greece', 'gr', NULL, NULL),
(82, 'Greenland', 'gl', NULL, NULL),
(83, 'Grenada', 'gd', NULL, NULL),
(84, 'Guam', 'gu', NULL, NULL),
(85, 'Guatemala', 'gt', NULL, NULL),
(86, 'Guernsey', 'gg', NULL, NULL),
(87, 'Guinea', 'gn', NULL, NULL),
(88, 'Guinea-Bissau', 'gw', NULL, NULL),
(89, 'Guyana', 'gy', NULL, NULL),
(90, 'Haiti', 'ht', NULL, NULL),
(91, 'Honduras', 'hn', NULL, NULL),
(92, 'Hong Kong', 'hk', NULL, NULL),
(93, 'Hungary', 'hu', NULL, NULL),
(94, 'Iceland', 'is', NULL, NULL),
(95, 'India', 'in', NULL, NULL),
(96, 'Indonesia', 'id', NULL, NULL),
(97, 'Iran', 'ir', NULL, NULL),
(98, 'Iraq', 'iq', NULL, NULL),
(99, 'Ireland', 'ie', NULL, NULL),
(100, 'Isle of Man', 'im', NULL, NULL),
(101, 'Israel', 'il', NULL, NULL),
(102, 'Italy', 'it', NULL, NULL),
(103, 'Ivory Coast', 'ci', NULL, NULL),
(104, 'Jamaica', 'jm', NULL, NULL),
(105, 'Japan', 'jp', NULL, NULL),
(106, 'Jersey', 'je', NULL, NULL),
(107, 'Jordan', 'jo', NULL, NULL),
(108, 'Kazakhstan', 'kz', NULL, NULL),
(109, 'Kenya', 'ke', NULL, NULL),
(110, 'Kiribati', 'ki', NULL, NULL),
(111, 'Kosovo', 'xk', NULL, NULL),
(112, 'Kuwait', 'kw', NULL, NULL),
(113, 'Kyrgyzstan', 'kg', NULL, NULL),
(114, 'Laos', 'la', NULL, NULL),
(115, 'Latvia', 'lv', NULL, NULL),
(116, 'Lebanon', 'lb', NULL, NULL),
(117, 'Lesotho', 'ls', NULL, NULL),
(118, 'Liberia', 'lr', NULL, NULL),
(119, 'Libya', 'ly', NULL, NULL),
(120, 'Liechtenstein', 'li', NULL, NULL),
(121, 'Lithuania', 'lt', NULL, NULL),
(122, 'Luxembourg', 'lu', NULL, NULL),
(123, 'Macau', 'mo', NULL, NULL),
(124, 'North Macedonia', 'mk', NULL, NULL),
(125, 'Madagascar', 'mg', NULL, NULL),
(126, 'Malawi', 'mw', NULL, NULL),
(127, 'Malaysia', 'my', NULL, NULL),
(128, 'Maldives', 'mv', NULL, NULL),
(129, 'Mali', 'ml', NULL, NULL),
(130, 'Malta', 'mt', NULL, NULL),
(131, 'Marshall Islands', 'mh', NULL, NULL),
(132, 'Mauritania', 'mr', NULL, NULL),
(133, 'Mauritius', 'mu', NULL, NULL),
(134, 'Mayotte', 'yt', NULL, NULL),
(135, 'Mexico', 'mx', NULL, NULL),
(136, 'Micronesia', 'fm', NULL, NULL),
(137, 'Moldova', 'md', NULL, NULL),
(138, 'Monaco', 'mc', NULL, NULL),
(139, 'Mongolia', 'mn', NULL, NULL),
(140, 'Montenegro', 'me', NULL, NULL),
(141, 'Montserrat', 'ms', NULL, NULL),
(142, 'Morocco', 'ma', NULL, NULL),
(143, 'Mozambique', 'mz', NULL, NULL),
(144, 'Myanmar', 'mm', NULL, NULL),
(145, 'Namibia', 'na', NULL, NULL),
(146, 'Nauru', 'nr', NULL, NULL),
(147, 'Nepal', 'np', NULL, NULL),
(148, 'Netherlands', 'nl', NULL, NULL),
(149, 'Netherlands Antilles', 'an', NULL, NULL),
(150, 'New Caledonia', 'nc', NULL, NULL),
(151, 'New Zealand', 'nz', NULL, NULL),
(152, 'Nicaragua', 'ni', NULL, NULL),
(153, 'Niger', 'ne', NULL, NULL),
(154, 'Nigeria', 'ng', NULL, NULL),
(155, 'Niue', 'nu', NULL, NULL),
(156, 'North Korea', 'kp', NULL, NULL),
(157, 'Northern Mariana Islands', 'mp', NULL, NULL),
(158, 'Norway', 'no', NULL, NULL),
(159, 'Oman', 'om', NULL, NULL),
(160, 'Pakistan', 'pk', NULL, NULL),
(161, 'Palau', 'pw', NULL, NULL),
(162, 'Palestine', 'ps', NULL, NULL),
(163, 'Panama', 'pa', NULL, NULL),
(164, 'Papua New Guinea', 'pg', NULL, NULL),
(165, 'Paraguay', 'py', NULL, NULL),
(166, 'Peru', 'pe', NULL, NULL),
(167, 'Philippines', 'ph', NULL, NULL),
(168, 'Pitcairn', 'pn', NULL, NULL),
(169, 'Poland', 'pl', NULL, NULL),
(170, 'Portugal', 'pt', NULL, NULL),
(171, 'Puerto Rico', 'pr', NULL, NULL),
(172, 'Qatar', 'qa', NULL, NULL),
(173, 'Republic of the Congo', 'cg', NULL, NULL),
(174, 'Reunion', 're', NULL, NULL),
(175, 'Romania', 'ro', NULL, NULL),
(176, 'Russia', 'ru', NULL, NULL),
(177, 'Rwanda', 'rw', NULL, NULL),
(178, 'Saint Barthelemy', 'bl', NULL, NULL),
(179, 'Saint Helena', 'sh', NULL, NULL),
(180, 'Saint Kitts and Nevis', 'kn', NULL, NULL),
(181, 'Saint Lucia', 'lc', NULL, NULL),
(182, 'Saint Martin', 'mf', NULL, NULL),
(183, 'Saint Pierre and Miquelon', 'pm', NULL, NULL),
(184, 'Saint Vincent and the Grenadines', 'vc', NULL, NULL),
(185, 'Samoa', 'ws', NULL, NULL),
(186, 'San Marino', 'sm', NULL, NULL),
(187, 'Sao Tome and Principe', 'st', NULL, NULL),
(188, 'Saudi Arabia', 'sa', NULL, NULL),
(189, 'Senegal', 'sn', NULL, NULL),
(190, 'Serbia', 'rs', NULL, NULL),
(191, 'Seychelles', 'sc', NULL, NULL),
(192, 'Sierra Leone', 'sl', NULL, NULL),
(193, 'Singapore', 'sg', NULL, NULL),
(194, 'Sint Maarten', 'sx', NULL, NULL),
(195, 'Slovakia', 'sk', NULL, NULL),
(196, 'Slovenia', 'si', NULL, NULL),
(197, 'Solomon Islands', 'sb', NULL, NULL),
(198, 'Somalia', 'so', NULL, NULL),
(199, 'South Africa', 'za', NULL, NULL),
(200, 'South Korea', 'kr', NULL, NULL),
(201, 'South Sudan', 'ss', NULL, NULL),
(202, 'Spain', 'es', NULL, NULL),
(203, 'Sri Lanka', 'lk', NULL, NULL),
(204, 'Sudan', 'sd', NULL, NULL),
(205, 'Suriname', 'sr', NULL, NULL),
(206, 'Svalbard and Jan Mayen', 'sj', NULL, NULL),
(207, 'Swaziland', 'sz', NULL, NULL),
(208, 'Sweden', 'se', NULL, NULL),
(209, 'Switzerland', 'ch', NULL, NULL),
(210, 'Syria', 'sy', NULL, NULL),
(211, 'Taiwan', 'tw', NULL, NULL),
(212, 'Tajikistan', 'tj', NULL, NULL),
(213, 'Tanzania', 'tz', NULL, NULL),
(214, 'Thailand', 'th', NULL, NULL),
(215, 'Togo', 'tg', NULL, NULL),
(216, 'Tokelau', 'tk', NULL, NULL),
(217, 'Tonga', 'to', NULL, NULL),
(218, 'Trinidad and Tobago', 'tt', NULL, NULL),
(219, 'Tunisia', 'tn', NULL, NULL),
(220, 'Turkey', 'tr', NULL, NULL),
(221, 'Turkmenistan', 'tm', NULL, NULL),
(222, 'Turks and Caicos Islands', 'tc', NULL, NULL),
(223, 'Tuvalu', 'tv', NULL, NULL),
(224, 'U.S. Virgin Islands', 'vi', NULL, NULL),
(225, 'Uganda', 'ug', NULL, NULL),
(226, 'Ukraine', 'ua', NULL, NULL),
(227, 'United Arab Emirates', 'ae', NULL, NULL),
(228, 'United Kingdom', 'gb', NULL, NULL),
(229, 'United States', 'us', NULL, NULL),
(230, 'Uruguay', 'uy', NULL, NULL),
(231, 'Uzbekistan', 'uz', NULL, NULL),
(232, 'Vanuatu', 'vu', NULL, NULL),
(233, 'Vatican', 'va', NULL, NULL),
(234, 'Venezuela', 've', NULL, NULL),
(235, 'Vietnam', 'vn', NULL, NULL),
(236, 'Wallis and Futuna', 'wf', NULL, NULL),
(237, 'Western Sahara', 'eh', NULL, NULL),
(238, 'Yemen', 'ye', NULL, NULL),
(239, 'Zambia', 'zm', NULL, NULL),
(240, 'Zimbabwe', 'zw', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_12_084551_create_add_new_students_table', 1),
(5, '2021_04_12_194735_create_apply_kpps_table', 1),
(6, '2021_04_13_084110_create_applyvisaextensions_table', 1),
(7, '2021_04_15_182337_students_tables', 1),
(8, '2021_04_15_183042_users_admin_table', 1),
(9, '2021_04_24_105529_create_countries_table', 1),
(10, '2021_04_26_185256_laratrust_setup_tables', 1),
(11, '2021_08_24_080027_buddies_table', 1),
(12, '2021_08_24_092059_buddy__requests', 1),
(13, '2021_08_24_092559_buddy_allocations', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2021-09-27 06:33:08', '2021-09-27 06:33:08'),
(2, 'users-read', 'Read Users', 'Read Users', '2021-09-27 06:33:08', '2021-09-27 06:33:08'),
(3, 'users-update', 'Update Users', 'Update Users', '2021-09-27 06:33:08', '2021-09-27 06:33:08'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2021-09-27 06:33:08', '2021-09-27 06:33:08'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2021-09-27 06:33:08', '2021-09-27 06:33:08'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2021-09-27 06:33:08', '2021-09-27 06:33:08'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2021-09-27 06:33:08', '2021-09-27 06:33:08'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2021-09-27 06:33:08', '2021-09-27 06:33:08'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2021-09-27 06:33:08', '2021-09-27 06:33:08'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2021-09-27 06:33:08', '2021-09-27 06:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadministrator', 'Superadministrator', 'Superadministrator', '2021-09-27 06:33:08', '2021-09-27 06:33:08'),
(2, 'administrator', 'Administrator', 'Administrator', '2021-09-27 06:33:09', '2021-09-27 06:33:09'),
(3, 'InternationalStudent', 'InternationalStudent', 'InternationalStudent', '2021-09-27 06:33:10', '2021-09-27 06:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(2, 2, 'App\\Models\\User'),
(3, 3, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surNAME` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otherNAMES` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `surNAME`, `otherNAMES`, `suID`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nyambura', 'Thomas Macharia', '03187', 'tmacharia@gmail.com', NULL, '$2y$10$Ockllxn4L0e4yvMYfHE89OrMxqVhufoBnE.EyVS2VqwvQ7eXOxGLC', NULL, NULL, NULL),
(2, 'Wambogo', 'Michael Owiti', '01570', 'mowiti@strathmore.edu', NULL, '$2y$10$iP.sPvFnbeTCR/FeuSdCTeo.rYz6/Dk4PQ4CnhVLlI2eL4k8hCIUS', NULL, '2021-09-27 06:34:40', '2021-09-27 06:34:40'),
(3, 'Oloo', 'Isaya Ogumbe', '09000', 'Iloo@gmail.com', NULL, '$2y$10$p7IyJRwauFpVL9Tr81I3ju1Wm9YPE2uylzEkRNPrOdPHrWzTk3Cha', NULL, '2021-09-27 06:34:51', '2021-09-27 06:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `users_admin_table`
--

CREATE TABLE `users_admin_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `suID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suEMAIL` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surNAME` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otherNAMES` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passportNUMBER` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Residence` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNUMBER` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_students_table`
--

CREATE TABLE `users_students_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `suID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suEMAIL` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surNAME` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otherNAMES` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passportNUMBER` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Course` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Residence` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOB` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateofENTRY` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNUMBER` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_new_students`
--
ALTER TABLE `add_new_students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `add_new_students_suid_unique` (`suID`),
  ADD UNIQUE KEY `add_new_students_suemail_unique` (`suEMAIL`);

--
-- Indexes for table `applyvisaextensions`
--
ALTER TABLE `applyvisaextensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply_kpps`
--
ALTER TABLE `apply_kpps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buddies`
--
ALTER TABLE `buddies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buddies_suid_unique` (`suID`),
  ADD UNIQUE KEY `buddies_email_unique` (`email`),
  ADD UNIQUE KEY `buddies_residence_unique` (`Residence`);

--
-- Indexes for table `buddies_allocation`
--
ALTER TABLE `buddies_allocation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buddies_allocation_newstd_suid_unique` (`NewSTD_suID`),
  ADD UNIQUE KEY `buddies_allocation_newstd_email_unique` (`NewSTD_email`);

--
-- Indexes for table `buddies_requests`
--
ALTER TABLE `buddies_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buddies_requests_suid_unique` (`suID`),
  ADD UNIQUE KEY `buddies_requests_email_unique` (`email`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_suid_unique` (`suID`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_admin_table`
--
ALTER TABLE `users_admin_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_admin_table_suid_unique` (`suID`),
  ADD UNIQUE KEY `users_admin_table_suemail_unique` (`suEMAIL`);

--
-- Indexes for table `users_students_table`
--
ALTER TABLE `users_students_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_students_table_suid_unique` (`suID`),
  ADD UNIQUE KEY `users_students_table_suemail_unique` (`suEMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_new_students`
--
ALTER TABLE `add_new_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applyvisaextensions`
--
ALTER TABLE `applyvisaextensions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apply_kpps`
--
ALTER TABLE `apply_kpps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buddies`
--
ALTER TABLE `buddies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buddies_allocation`
--
ALTER TABLE `buddies_allocation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buddies_requests`
--
ALTER TABLE `buddies_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_admin_table`
--
ALTER TABLE `users_admin_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_students_table`
--
ALTER TABLE `users_students_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
