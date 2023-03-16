-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2022 at 09:29 PM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispcoke_isa`
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
  `ParentNames` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ParentEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ParentPhone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_new_students`
--

INSERT INTO `add_new_students` (`id`, `suID`, `suEMAIL`, `surNAME`, `firstNAME`, `lastNAME`, `Faculty`, `Nationality`, `Course`, `Residence`, `phoneNUMBER`, `passportNUMBER`, `ParentNames`, `ParentEmail`, `ParentPhone`, `created_at`, `updated_at`) VALUES
(1, '157065', 'Bansari.pindoriya@strathmore.edu', 'Pindoriya', 'Bansari', 'Parbat', 'strathmore institution', 'indian', 'ACCA', 'NAIROBI WEST', '07895474352', 'T8275178', 'Pindoriya', 'Bansari.pindoriya@strathmore.edu', '07895474352', '2022-03-25 07:50:11', '2022-04-25 04:50:01'),
(2, '134919', 'ariane292001@gmail.com', 'Aruna', 'Mapilanga', 'Ariane', 'SUBS', 'CONGOLESE', 'BCOM', 'Qwetu', '717850402', 'op0205048', 'Aruna Mapilanga Ariane', 'ariane292001@gmail.com', '717850402', '2022-03-25 09:39:52', '2022-03-25 09:39:52'),
(3, '134591', 'ouobanella@gmail.com', 'Ouoba Sianwa', 'Annicken', 'Ornella', 'SUBS', 'Burkina faso', 'BCOM', 'Qwetu', '758955192', 'A2303257', 'Ouoba Sianwa  Annicken', 'ouobanella@gmail.com', '758955192', '2022-03-25 09:48:03', '2022-03-25 09:48:03'),
(4, '134059', 'jonathanbigomo@gmail.com', 'Jonathan', 'Jonathan', 'Bigomokero', 'SI', 'CONGOLESE', 'CIM', 'Qwetu', '708746789', 'OP0403221', 'Jonathan Bigomokero', 'jonathanbigomo@gmail.com', '708746789', '2022-03-25 09:58:08', '2022-03-25 10:57:03'),
(5, '122874', 'ezra.barenzi@strathmore.edu', 'Imanzi Ezra Kevin Barenzi', 'kevin', 'Barenzi', 'SLS', 'Ugandan', 'LLB', 'Qwetu', '717535893', 'A00099232', 'Imanzi Ezra Kevin Barenzi', 'ezra.barenzi@strathmore.edu', '717535893', '2022-03-25 10:02:38', '2022-03-25 10:02:38'),
(6, '134227', 'mushagalusa.kabomboro@strathmore.edu', 'Nicolas', 'Mushagalusa', 'Kabomboro', 'SI', 'CONGOLESE', 'DBM', 'Qwetu', '769248480', 'OP0586622', 'Nicolas Mushagalusa', 'mushagalusa.kabomboro@strathmore.edu', '769248480', '2022-03-25 10:08:32', '2022-03-25 10:08:32'),
(7, '134141', 'zindamoyen2@gmail.com', 'Aicha', 'Aicha', 'Mbongo', 'SCES', 'CAR', 'BBIT', 'Qwetu', '770998729', 'o00171140', 'Alain Mbongo', 'zindamoyen@yahoo.com', '722998729', '2022-03-25 10:12:40', '2022-04-26 09:26:26'),
(8, '134671', 'nathanmugishoicloud@icloud.com', 'Mutakomwa', 'Nathan', 'Mugisho', 'SCES', 'Congolese', 'BICS', 'Qwetu', '742666091', 'OP0453406', 'Mutakomwa Nathan Mugisho', 'nathanmugishoicloud@icloud.com', '742666091', '2022-03-25 10:16:54', '2022-03-25 10:16:54'),
(9, '134315', 'anotida.chinembiri@strathmore.edu', 'Chinembiri Anotida Gerald Takadiwa', 'Anotida', 'Takadiwa', 'SI', 'Zimbabwean', 'DBM', 'Qwetu', '710435844', 'DN221962', 'Chinembiri Anotida Gerald Takadiwa', 'anotida.chinembiri@strathmore.edu', '710435844', '2022-03-25 10:20:47', '2022-03-25 10:20:47'),
(10, '134469', 'deliraduk@gmail.com', 'Iradukunda,', 'Delicia', 'Joyce Peace', 'SI', 'Burundian', 'CDS', 'Qwetu', '759000000', 'OP0251517', 'Iradukunda, Delicia Joyce Peace', 'deliraduk@gmail.com', '759000000', '2022-03-25 10:25:56', '2022-06-10 10:22:42'),
(11, '134252', 'annie.uwamahoro@strathmore.edu', 'Uwamahoro, Annie Glenda', 'Annie', 'Glenda', 'SI', 'Burundian', 'ICDL', 'Qwetu', '25761839174', '0P0238951', 'Uwamahoro, Annie Glenda', 'annie.uwamahoro@strathmore.edu', '25761839174', '2022-03-25 10:35:27', '2022-03-25 10:35:27'),
(12, '134477', 'mubembe.claude@strathmore.edu', 'Claude', 'Mubembe', 'Claude', 'SI', 'CONGOLESE', 'CCNA', 'Qwetu', '708835384', 'OP0477230', 'Mubembe, Claude', 'mubembe.claude@strathmore.edu', '708835384', '2022-03-25 10:54:45', '2022-03-28 04:27:12'),
(13, '113701', 'Nzundu.Mushizi@strathmore.edu', 'Mushizi', 'A-Mala', 'Remy', 'SI', 'Congolese', 'DBIT', 'Qwetu', '795367807', 'OP0412229', 'Mushizi, Nzundu-A-Mala Pol-Remy', 'Nzundu.Mushizi@strathmore.edu', '795367807', '2022-03-28 03:58:16', '2022-03-28 07:57:23'),
(14, '134384', 'keza.bucko@strathmore.edu', 'Keza', 'Bucko', 'Yasmine', 'SI', 'CONGOLESE', 'DBM', 'Qwetu', '794674565', 'OP0609040', 'Keza, Bucko Yasmine', 'keza.bucko@strathmore.edu', '794674565', '2022-03-28 04:05:20', '2022-03-28 07:57:11'),
(15, '134065', 'somda.anselme@strathmore.edu', 'Somda, Fr. Beter Nir Anselme', 'Fr.Beter', 'Anselme', 'SI', 'Burkina Faso', 'MAPE-15', 'Qwetu', '794587363', 'A3013935', 'Somda, Fr. Beter Nir Anselme', 'somda.anselme@strathmore.edu', '794587363', '2022-03-28 04:48:19', '2022-03-28 04:48:19'),
(16, '121891', 'salomon.kulondwa@strathmore.edu', 'Kulondwa', 'Salomon', 'Metre', 'SCES', 'Congolese', 'BICS', 'Funguo Estate', '0797325314', 'OP0588226', 'Kalimira Metre Thierry', 'thierrymetre@yahoo.fr', '0975277716', '2022-03-28 05:23:06', '2022-03-28 05:23:06'),
(17, '148533', 'christian.kabumba@strathmore.edu', 'Christian', 'KABUMBA', 'HARERIMANA', 'Computing', 'Congolese', 'BICS', 'Qwetu Wilson View', '0704395430', 'OP0572902', 'MUGISHA HARERIMANA James', 'kabumbachris2018@gmail.com', '243998676815', '2022-03-28 05:26:10', '2022-03-28 05:41:00'),
(18, '112905', 'mike.rutomera@strathmore.edu', 'Rutomera', 'Mike', 'Rutomera', 'SIMS', 'Burundian', 'BBS-Act', 'Madaraka', '0110938806', 'OP0279305', 'Liberate NAKIMANA', 'nakimana@cenap.bi', '025775925635', '2022-03-28 05:26:38', '2022-03-28 05:40:40'),
(19, '123198', 'kizito.matua@strathmore.edu', 'Matua kizito', 'Matua', 'Kizito', 'SBS', 'Ugandan', 'Bcom', 'Langata', '0790546421', 'A00309807', 'Reidun Lilleli', 'reidun.lilleli@gmail.com', '4795074166', '2022-03-28 05:27:17', '2022-03-28 05:27:17'),
(20, '121977', 'joseph.munvihano@strathmore.edu', 'Munv\'ihano', 'Joseph', 'Mugwarhiriza', 'SCES', 'Congolese', 'BSEEE', 'Lynx apartments, Mbagathi way', '0743920585', 'OP 0826871', 'Mugwarhiriza Mufungizi Alain and Julienne Bafurume', 'josmunvi2505@gmail.com', '0112082764', '2022-03-28 05:28:26', '2022-03-28 05:28:26'),
(21, '121899', 'marie.merveille@strathmore.edu', 'Merveille', 'Marie', 'Kaseme', 'SCES', 'Congolese', 'BBIT', 'Madaraka Estate', '0743920575', 'OP0560358', 'Mpala Laini Jeannette', 'None', '243821804870', '2022-03-28 05:30:10', '2022-03-28 05:30:10'),
(22, '147073', 'lwanzo.sikwaya@strathmore.edu', 'Sikwaya', 'lwanzo', 'Dieumerci', 'SI', 'Congolese', 'DBIT', 'nairobi', '115161652', 'OP0755803', 'Sikwaya Muhindo Leon', 'Sikwaya2014@gmail.com', '0998299361', '2022-03-28 05:32:03', '2022-03-28 05:32:03'),
(23, '112407', 'Bhavin.arjun0204@gmail.com', 'Bhanderi', 'Bhavin', 'Arjun', 'SUBS', 'Indian', 'BCOM', 'Langata Epco village 2', '0731823285', 'R9993149', 'Arjun Lakhman Bhanderi', 'Arjun.enterprise@yahoo.com', '0737370794', '2022-03-28 05:33:39', '2022-03-28 05:33:39'),
(24, '136704', 'bonitanamatovu@gmail.com', 'NAMATOVU', 'BONITA', 'MARIA', 'SHSS', 'UGANDAN', 'BIS', 'QWETU RESIDENCES WILSONVIEW', '0742787684', 'A00264783', 'JAMES MUWONGE', 'jim.muwonge@gmail.com', '256772407860', '2022-03-28 05:34:17', '2022-03-28 05:34:17'),
(25, '121641', 'danisha.asasira@strathmore.edu', 'Asasira', 'Danisha', 'Erina', 'SBS', 'Ugandan', 'BCOM', 'Qwetu Wilson View', '0759411573', 'A00126824', 'Twinomuriisa Hope', 'hopebirutsya@gmail.com', '0782848149', '2022-03-28 05:37:42', '2022-03-28 05:37:42'),
(26, '114970', 'makutanolucien@gmail.com', 'makutano', 'Nzalinzali', 'Lucien', 'SECS', 'Congolese', 'BICS', 'Airport View Estate', '759714984', 'OP0445896', 'Kahindo Kahandavikya', 'kahindakahandavukya@gmail.com', '994178400', '2022-03-28 05:38:46', '2022-03-28 05:41:41'),
(27, '114261', 'davis.kadiayi@strathmore.edu', 'Davis', 'Kadiayi', 'Vuete', 'Strathmore business school', 'Congolese', 'BCOM', 'Syokimau, Katani road, Katani villas', '0700165108', 'OP0183191', 'Etienne mwandale', 'etiennemwandale@gmail.com', '254738177201', '2022-03-28 05:39:04', '2022-03-28 05:44:25'),
(28, '121284', 'Cibalonza.Gracia@strathmore.edu', 'Gracia', 'Chibalonza', 'Inès', 'School of Humanity and Social Science', 'Congolese', 'BIS', 'South b, Oloika place apartments', '0746292743', 'OP0412243', 'Chibalonza Mirindi Jacques', 'Jacqueschibal@gmail.com', '0764985945', '2022-03-28 05:41:43', '2022-03-28 05:43:50'),
(29, '148216', 'jonaskarera2000@gmail.com', 'Karera', 'Jonas', 'Karera', 'SI', 'Rwanda', 'ACCA-FT', 'Nairobi', '795010499', 'PC576527', 'Karera Jonas', 'johnrwaka@yahoo.com', '0788303394', '2022-03-28 05:46:22', '2022-03-28 06:54:09'),
(30, '111011', 'Philippa.mangare@strathmore.edu', 'Mangare', 'Philippa', 'Peter', 'Strathmore University Business School', 'Tanzanian', 'BCOM', 'Qwetu living wilsonview', '0768701702', 'TAE067814', 'Peter Mangare', 'Pmangare@bbl.co.tz', '255754695183', '2022-03-28 05:48:35', '2022-03-28 05:58:11'),
(31, '092942', 'Bwinja.mastaki@strathmore.edu', 'Mastaki', 'Ghislain', 'Bwinja', 'Strathmore University Business School', 'Congolese', 'MMA', 'Mbagathi Way', '254718851714', 'OP0314847', 'Mastaki Muhasha Justin', 'Muhashajustin@gmail.com', '0994406610', '2022-03-28 05:49:35', '2022-03-28 05:57:45'),
(32, '112068', 'josephine.lwanga@strathmore.edu', 'Lwanga', 'Josephine', 'Nabukenya', 'SBS', 'UGANDA', 'BCOM', 'Qwetu Wilson view', '0792141750', 'A00300679', 'Lwanga Joseph Kamoga', 'lwajoka@yahoo.com', '256774456662', '2022-03-28 05:51:30', '2022-03-28 05:51:30'),
(33, '136357', 'nandini.bhanderi@strathmore.edu', 'Bhanderi', 'Nandini', 'Arjun', 'SBS', 'Indian', 'BCOM', 'Nairobi Kenya', '254750144744', 'R9993145', 'Arjun Lakhman Bhanderi and Jasuben Arjun Bhanderi', 'Jasubhanderi@gmail.com', '254737370794', '2022-03-28 05:55:29', '2022-03-28 05:58:38'),
(34, '124244', 'ngoezume.ebontane@strathmore.edu', 'Ngoezume', 'Ebontane', 'N/A', 'SI', 'Cameroonian', 'CPA', 'Qwetu Student Residence WilsonView', '254716198261', '0622283', 'Nzume Alobwede Stephen', 'nzume2005@gmail.com', '237676226134', '2022-03-28 06:10:43', '2022-03-28 06:10:43'),
(35, '112223', 'romuald.ashuza@strathmore.edu', 'Kangwenye', 'Ashuza', 'Romuald', 'SCES', 'Congolese', 'BBIT', 'Lynx Apartments, Mbagathi Way, Nairobi', '25474242021856', 'OP 0383424', 'Theophile Kangwenye', 'N/A', '243997766793', '2022-03-28 06:21:28', '2022-03-28 06:21:28'),
(37, '147369', 'morisho.buroko@strathmore.edu', 'Buroko', 'Morisho', 'Paris', 'SCES', 'CONGOLESE', 'BICS', 'Qwetu', '254703790105', 'OP0928914', 'Wilfried Buroko', 'wilfriedburoko@gmail.com', '243990732222', '2022-03-28 06:37:31', '2022-05-10 04:35:45'),
(38, '112356', 'Bella.Gateka@strathmore.edu', 'Gateka', 'Bella', 'Evangeline', 'SHSS', 'Burundi', 'BIS', 'Nairobi', '0796733208', 'OP0220674', 'Ndayirukiye Sylvestre', 'Ndayisy59@gmail.com', '25769960843', '2022-03-28 06:42:30', '2022-03-28 06:54:36'),
(39, '147510', 'thelma.ndagire@strathmore.edu', 'Thelma Ndagire', 'Ndagire', 'Ndagire', 'SUBS', 'Ugandan', 'BCOM', 'Qwetu', '254745553705', 'A00456728', 'Thelma Ndagire', 'thelma.ndagire@strathmore.edu', '254745553705', '2022-03-28 06:45:47', '2022-03-28 06:45:47'),
(40, '147481', 'karl.luyima@strathmore.edu', 'Karl Luyima Kulumbera', 'Luyima', 'Kulumbera', 'SCES', 'Ugandan', 'BBIT', 'Qwetu Residences', '254769345990', 'A00285572', 'Sheila Nabachwa Muwanga', 'smn_81@yahoo.com', '+256773486911', '2022-03-28 06:50:20', '2022-04-21 11:16:11'),
(41, '112927', 'guy.bisumbagutira@strathmore.edu', 'Bisumbagutira', 'Guy', 'Cesar', 'SBS', 'Burundian', 'BCOM', 'Nairobi,Langata', '0769091551', 'OP0216917', 'Burikukiye Marie-Claire', 'burikukiye@yahoo.fr', '72372614', '2022-03-28 06:52:48', '2022-03-28 06:55:07'),
(42, '145701', 'david.kwizera@strathomore.edu', 'Kwizera', 'David', 'Levi', 'SBS', 'Burundian', 'BFS', 'Nairobi west', '0799692771', 'OP0287288', 'Minoni André Théophile', 'atminoni@gmail.com', '25772222778', '2022-03-28 06:54:46', '2022-03-28 06:54:46'),
(43, '138817', 'beata.muwema@strathmore.edu', 'Muwema Beata Mutesi', 'Mutesi', 'Beata', 'SHSS', 'Ugandan', 'BAC', 'Qwetu', '254710401246', 'A00306963', 'Muwema Beata Mutesi', 'beata.muwema@strathmore.edu', '254710401246', '2022-03-28 06:55:40', '2022-03-28 06:55:40'),
(44, '148060', 'Minta.mboutchouang@strathmore.edu', 'Mboutchouang', 'Dorcas Isabelle', 'Minta', 'School of accountancy', 'Cameroonian', 'ACCA', 'Qwetu Wilson view', '0113830992', '0953238', 'Nouwou Debora spse Mboutchouang', 'Mboutchdebora@gmail.com', '237696044312', '2022-03-28 06:56:03', '2022-03-28 06:56:03'),
(45, '148193', 'elizabethcee04@gmail.com', 'Nassiwa', 'Cynthia', 'Elizabeth', 'SI', 'Ugandan', 'DBIT', 'Qwetu', '254707304165', 'A00536186', 'assiwa Cynthia Elizabeth', 'elizabethcee04@gmail.com', '254707304165', '2022-03-28 06:59:36', '2022-03-28 06:59:36'),
(46, '148403', 'beletemerveille39@gmail.com', 'Belete Gimbali Merveille', 'Merveille', 'Gimbali', 'SCES', 'CONGOLESE', 'BBIT', 'Qwetu', '254717870312', 'OP0742003', 'Belete Gimbali Merveille', 'beletemerveille39@gmail.com', '254717870312', '2022-03-28 07:05:26', '2022-03-28 07:05:26'),
(47, '138789', 'Dignite.ndayishimiye@strathmore .edu', 'Ndayishimiye', 'Dignite', 'Marie Rosine', 'Sbs', 'Burundi a', 'BSCM', 'Qwetu , Wilson view', '0719506882', 'Op0252725', 'Dushimimana Protais', 'Dushimep@yahoo.fr', '719506882', '2022-03-28 07:05:28', '2022-03-28 07:05:28'),
(48, '123814', 'dlinkajoelle@gmail.com', 'Dushime', 'Linka', 'Joelle', '-', 'Burundian', 'ACCA', 'Athi river', '0781115771', 'OP0261782', 'NDAYE ELYSEE', 'endaye2005@yahoo.fr', '025779938991', '2022-03-28 07:08:51', '2022-03-28 07:08:51'),
(49, '114257', 'Bin.nsungu@strathmore.edu', 'Luc', 'Nsungu', 'Bin Lengwe', 'SBS', 'Congolese', 'BCOM', 'Madaraka , westpointe Shady Acres', '0792134105', 'OP0319664', 'Venance Lengwe Bin Kaumba', 'venancelengwe@yahoo.fr', '243819716160', '2022-03-28 07:14:27', '2022-03-28 07:14:27'),
(50, '148508', 'keansel.nabulime@strathmore.edu', 'Nabulime Keansel Geraldine Nanteza', 'Keansel', 'Nanteza', 'SI', 'Ugandan', 'DBM', 'Qwetu', '254758980692', 'B1077551', 'Nabulime Keansel Geraldine Nanteza', 'keansel.nabulime@strathmore.edu', '254758980692', '2022-03-28 07:20:42', '2022-03-28 07:20:42'),
(51, '137656', 'amaranyanzi1@gmail.com', 'Nyanzi', 'Amara', 'Eridad', 'SCES', 'Ugandan', 'ICS', 'Magharibi Place', '254795823703', 'A00300360', 'Eridad Nyanzi', 'eridad.nyanzi@gmail.com', '256772642167', '2022-03-28 07:21:35', '2022-03-28 07:21:35'),
(52, '146421', 'clarissa.kobusingye@strathmore.edu', 'Kobusingye Clarissa', 'Clarissa', 'Kobusingye', 'SCES', 'Ugandan', 'BICS', 'Qwetu', '256787701717', 'A00540371', 'Kobusingye Clarissa', 'clarissa.kobusingye@strathmore.edu', '256787701717', '2022-03-28 07:24:41', '2022-03-28 07:29:13'),
(53, '146628', 'Faith.nyamwiza@strathmore.edu', 'Nyamwiza Faith', 'Faith', 'Nyamwiza', 'SUBS', 'Rwandan', 'BCOM', 'Qwetu', '254702870858', 'PC352467', 'Nyamwiza Faith', 'Faith.nyamwiza@strathmore.edu', '254702870858', '2022-03-28 07:27:36', '2022-03-28 07:28:55'),
(54, '138898', 'amani.patrick@strathmore.edu', 'Patrick Amani Lusenge', 'Lusenge', 'Amani', 'SCES', 'CONGOLESE', 'BBIT', 'Qwetu', '254741534006', 'OP0821768', 'Patrick Amani Lusenge', 'amani.patrick@strathmore.edu', '254741534006', '2022-03-28 07:33:12', '2022-03-28 07:33:12'),
(55, '112162', 'Rosine.biringanine@strathmore.edu', 'Biringanine', 'Rosine', 'Ninawabana', 'School of Computing and Engineering Sciences', 'Congolese', 'BBIT', 'Madaraka Capital Court', '0742021874', 'OP0393759', 'Biringanine Juvenal Ruhara and Pendague M’MUDAHIGWA Espérance', 'Ninawabanar@gmail.com', '0895996389', '2022-03-28 07:34:40', '2022-03-28 07:34:40'),
(56, '136484', 'jacinta.mutoni@strathmore.edu', 'Jacinta Muhwezi Mutoni', 'Mutoni', 'Muhwezi', 'SUBS', 'Rwandan', 'BCOM', 'Qwetu', '254113262622', 'Travel Document', 'Jacinta Muhwezi Mutoni', 'jacinta.mutoni@strathmore.edu', '254113262622', '2022-03-28 07:37:28', '2022-03-28 07:37:28'),
(57, '145977', 'hannah.achom@strathmore.edu', 'Hannah Achom', 'Achom', 'Achom', 'SUBS', 'Ugandan', 'BCOM', 'Qwetu', '254794700752', 'A00173384', 'Hannah Achom', 'hannah.achom@strathmore.edu', '254794700752', '2022-03-28 07:40:15', '2022-03-28 07:40:15'),
(58, '147723', 'hamisa.mrua@strathmore.edu', 'Mrua Hamisa Hamis', 'Hamisa', 'Hamis', 'SI', 'Tanzanian', 'DBIT', 'Qwetu', '254797816729', 'TAE408450', 'Mrua Hamisa Hamis', 'hamisa.mrua@strathmore.edu', '254797816729', '2022-03-28 07:44:56', '2022-03-28 07:44:56'),
(59, '146321', 'chiedza.bopoto@strathmore.edu', 'Bopoto', 'Chiedza', 'Michelle', 'SBS', 'Zimbabwean', 'MDF', 'Wambco Apartments , Nairobi West', '254113329500', 'GN447779', 'Linda Bopoto and Kizito Bopoto', 'lindabopoto@gmail.com', '263772856500', '2022-03-28 07:46:42', '2022-03-28 08:03:52'),
(60, '138726', 'yunmi.choi@strathmore.edu', 'Yunmi choi', 'Choi', 'Choi', 'SHSS', 'Chinese', 'BIS', 'Qwetu', '254745718620', 'M419H4799', 'Yunmi choi', 'yunmi.choi@strathmore.edu', '254745718620', '2022-03-28 07:51:08', '2022-03-28 07:51:08'),
(61, '111128', 'jeremie.sekamonyo@strathmore.edu', 'Sekamonyo', 'Jeremie', 'Ishimwe', 'SCES', 'Congolese', 'BBIT', 'Nairobi, Langata', '0743300247', 'OP0721334', 'Marc Sekamonyo & Perside Muhawe', 'nkizinkikojeremie20@gmail.com', '0743300247', '2022-03-28 07:54:26', '2022-03-28 07:54:26'),
(62, '146656', 'charmaine.twagira@strathmore.edu', 'Twagira Twagira Chermain Keza', 'Chermain', 'Keza', 'SHSS', 'Ugandan', 'BIS', 'Qwetu', '254743880474', 'B1555511', 'Twagira Twagira Chermain Keza', 'charmaine.twagira@strathmore.edu', '254743880474', '2022-03-28 08:01:19', '2022-03-28 08:01:19'),
(63, '147074', 'alphonce.ndowo@strathmore.edu', 'Ndowo', 'Alphonce', 'Philip', 'SMC', 'Tanzanian', 'Bcom', 'Karen', '0700813458', 'TAE 191403', 'Philip Alphonce Ndowo', 'ajfinancialofficenrb@gmail.com', '0706597207', '2022-03-28 08:02:15', '2022-03-28 08:02:15'),
(64, '148694', 'junee-noella.igiraneza@strathmore.edu', 'IGIRANEZA', 'Junée -Noëlla', 'IGIRANEZA', 'SBS', 'Burundi', 'BCOM', 'Nairobi -Kenya', '0790286378', 'OP0233757', 'NTAMPERA Emile &MINANI Judith', 'ntemile@gmail.com', '0718836239', '2022-03-28 08:02:24', '2022-03-28 08:04:19'),
(65, '147736', 'ekonyupiussanz@gmail.com', 'Opuno Pius Ekonyu', 'Pius', 'Ekonyu', 'SI', 'Ugandan', 'CFA', 'Qwetu', '254101202468', 'A00565107', 'Opuno Pius Ekonyu', 'ekonyupiussanz@gmail.com', '254101202468', '2022-03-28 08:04:11', '2022-03-28 08:04:11'),
(66, '147771', 'danette.sajjabi@strathmore.edu', 'Sajjabi Danette Nalunkuuma', 'Nalunkuuma', 'Danette', 'SI', 'Ugandan', 'DBIT', 'Qwetu', '254112640441', 'A00590025', 'Sajjabi Danette Nalunkuuma', 'danette.sajjabi@strathmore.edu', '254112640441', '2022-03-28 08:06:36', '2022-03-28 08:06:36'),
(67, '136228', 'mohamed.bawoh@strathmore.edu', 'Bawoh Mohamed', 'Mohamed', 'Mohamed', 'SUBS', 'Sierra Leone', 'BCOM', 'Qwetu', '254748362271', 'ER082279', 'Bawoh Mohamed', 'mohamed.bawoh@strathmore.edu', '254748362271', '2022-03-28 08:10:15', '2022-03-28 08:10:15'),
(68, '146456', 'lubambo.cito@strathmore.edu', 'Cito Lubambo Roland', 'Roland', 'Lubambo', 'SUBS', 'CONGOLESE', 'BCOM', 'Qwetu', '254768324969', 'OP0829329', 'Cito Lubambo Roland', 'lubambo.cito@strathmore.edu', '254768324969', '2022-03-28 08:15:08', '2022-03-28 08:15:08'),
(69, '138424', 'lubambo.divine@strathmore.edu', 'Divine Lubambo Salama', 'Lubambo', 'Salama', 'SUBS', 'CONGOLESE', 'BCOM', 'Qwetu', '254769609898', 'OP0748117', 'Divine Lubambo Salama', 'lubambo.divine@strathmore.edu', '254769609898', '2022-03-28 08:18:11', '2022-03-28 08:18:11'),
(71, '148395', 'savant.ndayahoze@strathmore.edu', 'Ndayahoze', 'Savant', 'Ndayahoze', 'SUBS', 'Burundian', 'BCOM', 'Qwetu', '254799965869', 'PC578605', 'Savant Ndayahoze', 'savant.ndayahoze@strathmore.edu', '254799965869', '2022-03-28 08:26:19', '2022-03-28 08:55:29'),
(72, '114914', 'paola.mafurebo@strathmore.edu', 'Mafurebo', 'Paola', 'Nyiramigabo', 'SHSS', 'Rwandan', 'BIS', 'Magharibi Place', '0740204077', 'PC291814', 'Isabelle Sebatigita', 'Isebatigita@gmail.com', '0788567948', '2022-03-28 08:44:36', '2022-03-28 08:44:36'),
(74, '102555', 'hope.msoffe@strathmore.edu', 'Msoffe', 'Hope', 'Rebecca', 'SBS', 'Tanzanian', 'BCOM & ACCA', 'Madaraka, Orange Court', '0743043694', 'TAE087935', 'Teddy Gabriel Msoffe', 'tmsoffe@gmail.com', '31680218636', '2022-03-28 08:54:08', '2022-03-28 08:54:59'),
(75, '137260', 'cecilia.keenja@strathmore.edu', 'Keenja', 'Cecilia', 'Amani', 'SBS', 'Tanzanian', 'BCOM', 'Westpointe  shady acres, madaraka', '0115698500', 'TAE352834', 'Amani Keenja', 'akeenja@gmail.com', '0657215544', '2022-03-28 09:37:08', '2022-03-28 09:37:08'),
(76, '137309', 'Doris.kasaizi @strathmore.edu', 'Kasaizi', 'Doris', 'Abeid', 'SBS', 'Tanzanian', 'BFS', 'Westpointe', '0769601777', 'TAE366526', 'Abeid Kasaizi', 'ceo@redeso.or.tz', '0789290660', '2022-03-28 09:45:00', '2022-03-28 10:08:10'),
(77, '134529', 'dyness.kasaizi@strathmore.edu', 'Kasaizi', 'Dyness', 'Abeid', 'FIT', 'Tanzanian', 'BBIT', 'West pointe shady acres madaraka', '0792751109', 'TAE264751', 'Abeid Kasaizi', 'ceo@redeso.or.tz', '0789290660', '2022-03-28 09:46:42', '2022-03-28 09:46:42'),
(78, '148525', 'kelvin.mugisha@strathmore.edu', 'Mugisha', 'Kelvin', 'Trevor', 'SI', 'Ugandan', 'DBM', 'Parralel Four', '254768497890', 'A00606789', 'Boniface Mugisha', 'sbmugisha@gmail.com', '256772402110', '2022-03-28 10:00:13', '2022-06-20 08:45:31'),
(79, '91803', 'david.adeola@strathmore.edu', 'David Adeola', 'Adeola', 'Adeola', 'SCES', 'Nigerian', 'BICS', 'Qwetu', '254799062033', 'A05002359', 'David Adeola', 'david.adeola@strathmore.edu', '254799062033', '2022-03-28 10:02:41', '2022-03-28 10:02:41'),
(80, '146616', 'juliana.nabiryo@strathmore.edu', 'Nbiryo Juliana Yvonne', 'Juliana', 'Yvonne', 'SUBS', 'Ugandan', 'BCOM', 'Qwetu', '254759014881', 'A00441019', 'Nbiryo Juliana Yvonne', 'juliana.nabiryo@strathmore.edu', '254759014881', '2022-03-28 10:06:46', '2022-03-28 10:06:46'),
(81, '148135', 'Trirennywt8@gmail.com', 'Wafula Trezah', 'Trezah', 'Trezah', 'SHSS', 'Ugandan', 'BIS', 'Qwetu Residences', '254790158719', 'A00416068', 'Wafula Renny Mike', 'wafular@unhcr.org', '251938484669', '2022-03-28 10:10:27', '2022-05-13 10:13:40'),
(82, '147680', 'zara.komuntale@strathmore.edu', 'Zara Komuntale Muhangi', 'Komuntale', 'Muhangi', 'SHSS', 'Ugandan', 'BAC', 'Qwetu', '254114481618', 'B1086935', 'Zara Komuntale Muhangi', 'zara.komuntale@strathmore.edu', '254114481618', '2022-03-28 10:14:06', '2022-03-28 10:14:06'),
(83, '146221', 'emily.olowo@strathmore.edu', 'Emily Katherine Olowo', 'Katherine', 'Olowo', 'SHSS', 'Ugandan', 'BAC', 'Qwetu', '254741233962', 'B1086534', 'Emily Katherine Olowo', 'emily.olowo@strathmore.edu', '254741233962', '2022-03-28 10:17:41', '2022-03-28 10:17:41'),
(84, '137155', 'angella.kyesubire@strathmore.edu', 'Kyesbure', 'Angella', 'Kyesbure', 'SUBS', 'Ugandan', 'BCOM', 'Qwetu', '254795077422', 'A00211727', 'Angella Kyesbure', 'angella.kyesubire@strathmore.edu', '254795077422', '2022-03-28 10:36:33', '2022-06-10 10:07:39'),
(85, '122691', 'janice.apolot@strathmore.edu', 'Apolot', 'Janice', 'Gabriella', 'Strathmore Business School', 'Ugandan', 'BCOM', 'Qwetu Wilson view', '0111590472', 'A00675076', 'Apolot Jane Rose', 'japolot70@gmail.com', '255762049240', '2022-03-28 10:40:56', '2022-03-29 02:17:33'),
(86, '135981', 'berlina.ria@strathmore.edu', 'Nininahazwe Ria-Berlina', 'Ria', 'Berlina', 'SIMS', 'Burundian', 'BBS FE', 'Qwetu', '254796429941', 'OP0230340', 'NKUNZIMANA DESIRE', 'nkunzidesire@yahoo.com', '25779970773', '2022-03-28 10:43:18', '2022-04-12 04:25:39'),
(87, '113692', 'Bulonza.ntumwa@strathmore.edu', 'Steeve', 'Bulonza', 'Ntumwa', 'FIT', 'Congolese', 'BBIT', 'Kayole', '0790153605', 'OP0434223', 'Leon Ntumwa and Mamy Masimane', 'mamymasimane79@gmail.com', '0713172002', '2022-03-28 11:06:58', '2022-03-28 11:06:58'),
(88, '123687', 'simon.iragaba@strathmore.edu', 'Iragaba', 'Simon', 'Peter', 'SIMS', 'Ugandan', 'BBS-ACT', 'ParallelFour', '0718735594', 'A00103604', 'Edward Martin Rwarinda', 'edwardmartin.rwarinda@gmail.com', '0776171096', '2022-03-28 14:01:02', '2022-03-29 02:18:00'),
(89, '102909', 'bonita.mdendu@strathmore.edu', 'Mdendu', 'Bonita', 'Brighton', 'SBS', 'Tanzanian', 'BCOM', 'Madaraka, Orange Court', '0757623662', 'TAE 163564', 'Brighton Piniel Mdendu', 'rosebrighton98@gmail.com', '255756024414', '2022-03-28 16:44:42', '2022-03-29 02:16:52'),
(90, '123324', 'Noella.Sota@strathmore.edu', 'Sota', 'Kelly', 'Noella', 'SCES', 'Burundian', 'BBIT', 'Langata', '0115300302', 'OP0236603', 'Nibizi Chantal', 'nibizi30@yahoo.fr', '79939459', '2022-03-28 19:18:39', '2022-03-28 19:18:39'),
(91, '113306', 'wingabire.arnaud@strathmore.edu', 'WINGABIRE', 'Arnaud', 'Boris', 'Faculty of Information Technology (SCES)', 'Burundian', 'BBIT', 'Madaraka', '254742388037', 'OP0242780', 'Ezéchiel NSABIMANA', 'nsabieze@gmail.com', '25769059899', '2022-03-29 02:35:28', '2022-03-29 02:35:28'),
(92, '147257', 'glensh21@gmail.com', 'Glen', 'Shema', 'Shema', 'SBS', 'Rwandan', 'Bcom', 'Magharibi place', '0113300229', 'PC609285', 'Batoni Florence', 'fbatoni2@gmail.com', '0783576174', '2022-03-29 05:29:57', '2022-03-29 05:53:48'),
(93, '147886', 'muhindo.beldi@strathmore.edu', 'Beldi', 'Muhindo', 'Kamuha', 'SI', 'Congolese', 'DBIT', 'Mbagathi way', '791105405', 'OP0865915', 'Kasereka Kamuha Paulin', 'kaserekapaulin01@gmail.com', '810810422', '2022-03-29 05:53:50', '2022-03-29 05:53:50'),
(94, '146062', 'Kamondocynthia@gmail.com', 'Kamondo', 'Cynthia', 'Kamondo', 'Student', 'Rwandese', 'Acca', 'Qwetu hostels', '254715430076', 'PC630990', 'Nyinawamwiza Petronille', 'Pnyinawamwiza@edcl.rw', '250788640856', '2022-03-29 06:24:30', '2022-03-29 06:30:15'),
(95, '144807', 'balimunsialbert@gmail.com', 'BASIIMA', 'ALBERT', 'BALIMUNSI', 'Institute', 'Ugandan', 'DBIT', 'Qwetu Wilson view', '0798836033', 'B1694517', 'Peter balimunsi', 'peterbalimunsi@gmail.com', '0772458646', '2022-03-29 06:40:23', '2022-03-29 06:43:28'),
(96, '147859', 'elizabeth.nansenja@strathmore.edu', 'NANSENJA', 'ELIZABETH', 'ANN', 'STRATHMORE INSTITUTION', 'Ugandan', 'BCOM', 'Madaraka', '0700736984', 'A00481921', 'WAMBUZI MATHIAS', 'mwambuzi@iavi.or.ug', '256779136022', '2022-03-29 06:59:38', '2022-03-29 06:59:38'),
(97, '147517', 'kevin.kalule@strathmore.edu', 'Kalule', 'Kevin', 'William', 'S.I', 'Ugandan', 'DBM', 'Qwetu Wilson view', '0792039121', 'A00479831', 'Namutebi juliet', 'julie_na@yahoo.com', '0756617444', '2022-03-29 07:22:04', '2022-03-29 09:07:50'),
(99, '136488', 'eric.ssempiira@strathmore.com', 'Kabali', 'Eric', 'Ssempiira', 'Strathmore Business School', 'UGANDAN', 'BCOM', 'Kampala', '254745931906', 'B1393254', 'NANSUBUGA ZAITUNI', 'zaitunikabali58@gmail.com', '254745931906', '2022-03-29 07:38:31', '2022-03-29 09:08:04'),
(100, '123483', 'maj.justina@strathmore.edu', 'Kanwie', 'Justina', 'Ma-J', 'STH', 'Liberian', 'BHM', 'Madaraka Central Court', '254798195877', 'PP0070227', 'Sextus F. Kanwie', 'Sextuskanwie@gmail.com', '231776492076', '2022-03-29 07:45:17', '2022-03-29 07:45:17'),
(101, '113605', 'Alison.muguluma@strathmore.edu', 'Muguluma', 'Alison', 'Nakigozi', 'SLS', 'Ugandan', 'LLB', 'Qwetu Wilson view', '0791991760', 'A00584261', 'Ann Namatovu Muguluma', 'annmuguluma@gmail.com', '0752741459', '2022-03-29 08:11:05', '2022-03-31 07:37:42'),
(102, '119983', 'fortune.bernadette@strathmore.edu', 'Simo', 'Bernadette', 'La Fortune', 'Strathmore Business School', 'Cameroonian', 'BCOM', 'Lavington West Estate', '00254742197115', '0694895', 'Sietchepin Bertrand Olivier', 'simolafortune@gmail.com', '00254759746994', '2022-03-29 09:26:36', '2022-03-29 11:09:46'),
(103, '113697', 'destin.karume@strathmore.edu', 'Emmanuel', 'Destin', 'Karume', 'SCES', 'Congolese', 'BBIT', 'Nairobi West', '0740354802', 'OP0434267', 'Nsimire Christine', '-', '0853999865', '2022-03-29 11:04:52', '2022-03-29 11:04:52'),
(104, '121762', 'david.iragi@strathmore.edu', 'David', 'Iragi', 'Bakulikira', 'SCES', 'Congolese', 'BBIT', 'skylark apartments', '254757840422', 'OP0447118', 'Sylvie Chuna', 'sylvienzogorechuma@gmail.com', '243997728431', '2022-03-29 11:33:46', '2022-03-29 11:33:46'),
(105, '147064', 'ritabruyelledushime92@gmail.com', 'DUSHIME', 'Bruyelle', 'Rita', 'FIT', 'Burundian', 'BBIT', 'Burundi', '0111430052', 'OP0233498', 'KARENZO Marie Rose', 'karenzomarierose71@gmail.com', '25769983429', '2022-03-29 14:54:36', '2022-03-29 14:54:36'),
(106, '146252', 'Jerry.Banga@strathmore.edu', 'Jerry', 'Banga', 'Gerard', 'FIT', 'Congolese', 'BICS', 'South C magharibi place', '0715423129', 'OP 0208169', 'Aimee Mpala Ndakala', 'Aimeendakala@yahoo.com', '0114094292', '2022-03-30 05:40:16', '2022-03-30 05:40:16'),
(107, '149266', 'bandrasellah001@gmail.com', 'Mwiza', 'Sandra', 'Bellah', 'Business', 'Rwandan', 'BCOM', 'Parallel four hostels', '0787924754', 'PC615022', 'Erisa H. Mutabazi', 'herimuta@gmail.com', '0788307792', '2022-03-30 09:38:21', '2022-03-31 07:27:07'),
(108, '138471', 'Leiris.Mucuremesha@strathmore.edu', 'Nola', 'Mucuremesha', 'Leiris', 'SBS', 'Burundian', 'Bcom', 'Kafoca', '0742003360', 'OP0246962', 'Ntahomvukiye Alexandre, Bucumi Emerence', 'emerencebucumi20@gmail.com', '79178831', '2022-03-30 10:08:43', '2022-03-31 07:27:40'),
(109, '146706', 'Sian.Mwiza@strathmore.edu', 'Mwiza', 'Sian', 'Rwihimba.', 'School of humanities and social sciences', 'Rwandan', 'DIR', 'Qwetu hostels', '2540115201799', 'PC670972', 'Bagwaneza Susan', 'susan.bagwaneza@gmail.com', '250788387986', '2022-03-31 07:29:37', '2022-03-31 07:34:36'),
(110, '147130', 'prekshat.keinth@strathmore.edu', 'Keinth', 'Prekshat', 'Gulshan', 'SI', 'Indian', 'ACCA', 'Ngara, Harekrishna', '0113558880', 'P7176496', 'Gulshan Kumar Keinth', 'gkenkents@gmail.com', '255715376841', '2022-03-31 08:35:03', '2022-03-31 08:35:03'),
(111, '147381', 'chihambanya.erika@strathmore.edu', 'Chihambanya', 'Erika', 'Angèle', 'SBS', 'Congolese', 'BSCM', 'Magharibi Place', '0794637653', 'OP0875591', 'Janvier Ruboneka Chihambanya', 'rjanvierchi@gmail.com', '0817006994', '2022-03-31 14:48:21', '2022-03-31 14:48:21'),
(112, '147910', 'Becky.Ayuen@Strathmore.edu', 'Ayuen', 'Becky Alek', 'Malaak', 'SCES', 'South Sudanese', 'BICS', 'Langata,Nairobi', '254796902774', 'R00547323', 'Malaak Ayuen Ajok', 'Malaakayuen18@gmail.com', '211911843243', '2022-04-06 08:41:02', '2022-04-07 17:25:17'),
(113, '145921', 'serge.kambale@strathmore.edu', 'Mulemba', 'Serge', 'Kambale', 'SCES', 'CONGOLESE', 'BBIT', 'Qwetu Residences', '254740772300', 'OP0601335', 'Kataliko Mulemba Moise', 'kataliko22@gmail.com', '243998383655', '2022-04-08 10:33:39', '2022-04-08 10:33:39'),
(114, '136256', 'druscilla.nankamba @strathmore.edu', 'Rosemary', 'Druscilla', 'Nankamba', 'Business', 'Ugandan', 'Bcom', 'QWEtu Wilson view', '0114066788', 'A00290492', 'Dr Lugemwa Benedict', 'bslugemwa@icloud.com', '0772425662', '2022-04-08 10:59:50', '2022-04-08 10:59:50'),
(115, '136921', 'Nancy.mtenga@strathmore.edu', 'Elias', 'Nancy', 'Mtenga', 'SBS', 'Tanzanian', 'BCOM', 'Keri Residence', '0113098964', 'TAE351388', 'Elias Mtenga', 'Eliassianga@gmail.com', '255754329066', '2022-04-08 11:10:58', '2022-04-08 11:10:58'),
(116, '122269', 'Fahima.shariff@strathmore.edu', 'Salum', 'Fahima', 'Shariff', 'SUBS', 'Tanzanian', 'BCOM', 'Qwetu wilsonview', '0759172309', 'TAE267019', 'Nasem Ally', 'Nasemally4@gmail.com', '255655730081', '2022-04-08 11:15:19', '2022-04-08 11:15:19'),
(117, '136225', 'edwina.mwami@strathmore.edu', 'Aliwayoki', 'Edwina', 'Mwami', 'SBS', 'UGANDAN', 'BCOM', 'Qwetu Hurlingham', '245758431275', 'B1573712', 'Enock Mwami', 'enockmwami@yahoo.com', '256772583191', '2022-04-08 11:18:18', '2022-04-08 16:25:29'),
(118, '122689', 'vanessa.butele@strathmore.edu', 'Kanyunyuzi', 'Vanessa', 'Butele', 'SMC', 'Ugandan', 'BCOM', 'Madaraka', '0701442224', 'A00094651', 'Henry Butele & Joweriah Butele', 'buteleh@gmail.com & jbutele@gmail.com', '0702200177', '2022-04-08 11:26:06', '2022-04-08 11:26:06'),
(119, '12213', 'Chantal.kansiime@strathmore.edu', 'Atukunda', 'Chantal', 'Kansiime', 'Strathmore Business School', 'Ugandan', 'BCOM', 'Uganda', '0721311781', 'A00095743', 'Frank Kansiime', 'fkansiime@gmail.com', '0772506520', '2022-04-08 14:29:11', '2022-04-08 16:25:09'),
(120, '122291', 'belindanyakake@gmail.com', 'Belinda', 'Nyakake', 'Nissi', 'SBS', 'Ugandan', 'BCOM', 'Madaraka', '0719789453', 'A00111999', 'Patrick Kagenda', 'pkagenda@dcareug.com', '256752463808', '2022-04-08 15:19:54', '2022-04-08 15:19:54'),
(121, '137152', 'Karan.saini@strathmore.edu', 'Singh', 'Karan', 'Saini', 'Strathmore Business School', 'British', 'BCOM', '17 Suswa Road, 3rd parklands, Nairobi, Kenya', '0702439139', '124212037', 'Dr. Roop Saini', 'Drsaini@yahoo.com', '0722712512', '2022-04-08 15:48:32', '2022-04-08 15:48:32'),
(122, '148308', 'milcah.amanya@strathmore.edu', 'Milcah', 'Amanya', 'Byoona', 'Sbs', 'Ugandan', 'BCOM', 'Qwetu wilson', '0115355816', 'B1388411', 'Ruth Byoona Ekirapa', 'ruthbyoona@gmail.com', '0772408191', '2022-04-08 15:51:24', '2022-04-08 16:24:52'),
(123, '146331', 'rebecca.kiesse@strathmore.edu', 'Rebecca', 'Kiesse', 'Ntemonono', 'Sbs', 'Congolese', 'BCOM', 'Langata', '0798882361', 'OP 0734466', 'Enock Zola Ntemonono', 'enockzola254@gmail.com', '0745686691', '2022-04-08 15:51:36', '2022-04-08 15:51:36'),
(124, '146648', 'angel.namubiru@strathmore.edu', 'Kirabo Phillipa', 'Angel', 'Namubiru', 'SBS', 'Ugandan', 'BCOM', 'Qwetu student residences', '0769280111', 'A00692002', 'Juliet Catherine Mbabaali', 'kmbabaali@gmail.com', '0776690939', '2022-04-08 15:51:48', '2022-04-08 15:51:48'),
(125, '146409', 'khalayirebecca08@gmail.com', 'None', 'Khalayi', 'Rebecca', 'SBS', 'UGANDAN', 'BCOM', 'Qwetu', '0794382230', 'A006318535', 'Dr. Juliet Babirye', 'jnbabirye@yahoo.co.uk', '0741279772', '2022-04-08 15:52:05', '2022-04-08 15:52:05'),
(126, '146584', 'tshongo.johnny@strathmore.edu', 'Tshongo', 'Johnny', 'Visso', 'SUBS', 'Congolese', 'BCOM', 'Malibu Court, Madaraka shopping center', '0791809407', 'OP0589993', 'Dedy Mutima Vira/ Patrice Kasereka Visso', 'mutimavira@gmail.com/ v.kasereka@bcc.cd', '0818134905', '2022-04-08 15:54:12', '2022-04-08 15:54:12'),
(127, '146403', 'warren.eyul@strathmore.edu', 'Eyul', 'Warren', 'Phillip', 'SBS', 'Ugandan', 'Bcom', 'Quetu wilson', '0797332237', 'A00141550', 'Dr. Eyul James', 'tikejames@gmail.com', '0752222855', '2022-04-08 15:55:45', '2022-04-08 15:55:45'),
(128, '138062', 'Kaleebu.Gwokyalya@strathmore.edu', 'Gwokyalya B.', 'Kaleebu', 'Marcella', 'SBS', 'Ugandan', 'BCOM', 'Madaraka', '0799668961', 'A00303560', 'Pontiano Kaleebu', 'pontiano.kaleebu@mrcuganda.org', '0772500905', '2022-04-08 15:56:55', '2022-04-08 15:56:55'),
(129, '145579', 'Mukasa.makula@strathmore.edu', 'Mukasa', 'Makula', 'Vera Pearl', 'Sbs', 'Ugandan', 'BSCM', 'Madaraka estate', '0741122443', 'A00438441', 'Dr. Barbara mukasa', 'Barbaramukasa@mildmay.or.ug', '256772700816', '2022-04-08 15:58:07', '2022-04-08 15:58:07'),
(130, '148872', 'Tafadzwa.Mandere@strathmore.edu', 'Hazel', 'Tafadzwa', 'Mandere', 'Strathmore Business School', 'Zimbabwean', 'BCOM', 'Matundu lane , Matundu Villas', '0797694558', 'FN76956', 'Morris Mandere', 'Morris.Mandere@sc.com', '0742968601', '2022-04-08 15:59:01', '2022-04-08 15:59:01'),
(131, '146722', 'sheba.mugarra@strathmore.edu', 'Marlene', 'Sheba', 'Mugarra', 'SBS', 'Ugandan', 'BCOM', 'Keri hostel Madaraka', '254791192947', 'B1081082', 'Christine Arinaitwe Mugarra', 'caarinaitwe97@gmail.com', '256782362007', '2022-04-08 16:01:23', '2022-04-08 16:24:13'),
(132, '148871', 'mugange.josue@strathmore.edu', 'Mugaruka', 'Josue', 'Mugangu', 'Strathmore Business school', 'Congolese', 'BCOM', 'Seefar Apartments', '0115888918', 'OP 0727231', 'Mugangu Baguma', 'mugangubaguma@gmail.com', '243971307752', '2022-04-08 16:02:48', '2022-04-08 16:02:48'),
(133, '146246', 'musahaha.mathe@strathmore.edu', 'Musabaha', 'Mathe', 'Jstice', 'SBS', 'congolese', 'BCOM', 'Parallele four', '0794866662', 'OP0203869', 'Katembo Musabaha Justin', 'musabahajustin@gmail.com', '0717084440', '2022-04-08 16:04:04', '2022-04-08 16:04:04'),
(134, '146717', 'exauceemugoli@gmail.com', 'Mugoli', 'Exaucee', 'Alindwa', 'SBS', 'Congolese', 'BCOM', 'Qwetu Student Resident Hurlingham', '0759822223', 'OP0763093', 'Noel Moshi Chigashamwa', 'chigamoshi@yahoo.fr', '243817000043', '2022-04-08 16:11:53', '2022-04-08 16:24:33'),
(135, '146060', 'jean.mbeshi@strathmore.edu', 'Jean', 'Mbeshi', 'Kabenamualu', 'SBS', 'Congolese', 'BCOM', 'South B Alabama flyt', '0796165922', 'OP 0725519', 'Frédéric Kabenamualu and Beatrice Ngalula Kabenamualu', 'keinofrederic@yahoo.fr', '243825531405', '2022-04-08 16:44:50', '2022-04-08 16:44:50'),
(136, '147237', 'Ashuza.muhayangabo@strathmore.edu', 'Ashuza', 'Muhayangabo', 'Christelle Aurélie', 'Supply chain and operation management', 'Congolese', 'School of business', 'Madaraka', '746769791', 'OP0878213', 'Muhayangabo Mukembanyi Rigo- Fraterne', 'Rigofraterne@gmail.com', '0972194019', '2022-04-08 17:32:11', '2022-04-08 17:32:11'),
(137, '135918', 'providence.mukashyaka@strathmore.edu', '....', 'Mukashyaka', 'Providence', 'SBS', 'Rwandan', 'BCOM', 'Rwanda', '0702082301', 'PC044050', 'Nyirabitegeye marie claire', 'providence.mukashyaka@strathmore.edu', '0786007073', '2022-04-08 17:36:59', '2022-04-08 17:36:59'),
(138, '123996', 'viaregyshu@gmail.com', 'Kalungi', 'Tracy', 'Shumbusho', 'Strathmore Business School', 'Tanzanian', 'BCOM', 'Ustawi Court, Madaraka.', '254742276369', 'TAE146298', 'Projest Katabazi Shumbusho', 'projest.shumbusho@gmail.com', '255784783054', '2022-04-08 17:45:55', '2022-04-12 08:30:02'),
(139, '122687', 'Mary.Namyenya@strathmore.edu', 'Mary', 'Namyenya', 'Assumpta', 'Strathmore Business School', 'Ugandan', 'BCOM', 'Keri Residence', '0717100260', 'A00089554', 'Agnes Nsubuga', 'agnesnsubuga5@gmail.com', '0772426942', '2022-04-08 21:02:35', '2022-04-12 08:29:36'),
(140, '146914', 'nalwoga.kyambadde@strathmore.edu', 'Nalwoga', 'Kayla', 'Kyambadde', 'SBS', 'Ugandan', 'BCOM', 'Madaraka', '0795392969', 'A00586351', 'Joyce Kavuma', 'joikavuma@yahoo.com', '0772603336', '2022-04-08 23:19:14', '2022-04-08 23:19:14'),
(141, '147630', 'julianakalembe1@gmail.com', 'Julia', 'Nakalembe', 'Faith', 'Business school', 'Ugandan', 'Bcom', 'Muyenga', '0703298134', 'B1100744', 'Daniel Kayiwa', 'dkayiwa2@gmail.com', '0772436948', '2022-04-09 02:27:14', '2022-04-09 02:27:14'),
(142, '122233', 'denzel.maniple@strathmore.edu', 'Everd', 'Denzel', 'Maniple', 'Business school', 'Ugandan', 'Bcom', 'Madaraka', '0114538995', 'A00665631', 'Maniple Everd Bikaitwoha', 'maniple77@gmail.com', '077592506', '2022-04-09 02:45:57', '2022-04-09 02:45:57'),
(143, '137738', 'maria.kisakye@strathmore.edu', 'Ulrika', 'Maria', 'Kisakye', 'SUBS', 'Uganda', 'BCOM', 'Qwetu Residences- Hurlingham', '0740850587', 'A00562022', 'Monica Nakimuli', 'monica@dashandling.com', '0772412041', '2022-04-09 02:55:33', '2022-04-12 08:29:23'),
(144, '135533', 'Ashley.ainomugisha@strathmore.edu', 'Mary', 'Ashley', 'Ainomugisha', 'SBS', 'Ugandan', 'BCOM', 'Madaraka Estate', '0112678964', 'A00285135', 'Judith Owembabazi', 'judithowemb@gmail.com', '0772419989', '2022-04-09 03:24:27', '2022-04-12 08:29:52'),
(145, '136766', 'masetemark.2000@gmail.com', 'Akiiki', 'Masete', 'Mark', 'SBS', 'Ugandan', 'BCOM', 'Qwetu Wilson view student residence', '0743602262', 'A00261290', 'Watenga Stanley', 'watengastanley@gmail.com', '0772500976', '2022-04-09 03:29:07', '2022-04-09 03:29:07'),
(146, '145667', 'daniellemagenyi@gmail.com', 'Magenyi', 'Danielle', 'Cindy', 'Strathmore Buiness School', 'Ugandan', 'BCOM', 'Qwetu Student Residences', '254742768872', 'A00438888', 'Juliet Kizza Ssekyaya', 'jmkizza@hotmail.com', '256752626069', '2022-04-09 03:38:10', '2022-04-12 08:28:56'),
(147, '147528', 'elizabeth.kageye@strathmore.edu', 'Ndahura', 'Kageye', 'Elizabeth', 'SCM', 'Ugandan', 'BFS', 'Kampala', '0741834286', 'A00470326', 'Ndahura Patrick', 'musongora2005@gmail.com', '0782347627', '2022-04-09 04:38:15', '2022-04-09 04:38:15'),
(148, '121857', 'Daniel.ntabo@strathmore.edu', 'Wa Ntabo', 'Daniel', 'Ntabo', 'SUBS', 'Congolese', 'BCOM', 'Qwetu/students residence/Wilson', '0711733657', 'OP 0603783', 'Ntabo Kissa Jean-Paul', 'jpaulkinta27@gmail.com', '243853719321', '2022-04-09 05:56:18', '2022-04-09 05:56:18'),
(149, '142210', 'shernil.senfuka@strathmore.edu', 'SERA', 'SHERNIL', 'SENFUKA', 'SBS', 'UGANDAN', 'BCOM', 'QWETU WILSON VIEW', '0706507643', 'A00021703', 'SAUDAH NAMAYANJA', 'ssenfukaronald@yahoo.com', '0782389743', '2022-04-09 07:13:58', '2022-04-09 07:13:58'),
(150, '140636', 'Mansi.venugopal@strathmore.edu', 'Venugopal', 'Mansi', 'Venugopal', 'SUBS', 'Indian', 'Bcom', 'Mpaka road, mpaka villas', '0734955182', 'S7717969', 'Shubha Venugopal', 'Anandashubha@gmail.com', '0734858983', '2022-04-09 07:18:43', '2022-04-09 07:18:43'),
(151, '144870', 'nishitha.nandyala@strathmore.edu', '-', 'Nishitha', 'Nandyala', 'SBS', 'Indian', 'BCOM', 'Anmol residencies, along general mathenge', '0704111030', 'V6623375', 'Venkata Jagadish Nandyala', 'jagadish.bpl@btfgroup.com', '0737111030', '2022-04-09 07:32:17', '2022-04-09 07:32:17'),
(152, '146716', 'brown.beni@strathmore.edu', 'BROWN', 'BENI', 'ITANGIVYIZA', 'SBS', 'BURUNDI', 'BCOM', 'NAIROBI WEST', '0794031252', 'OP0288765', 'NDAYIZEYE NORMAND', 'normand.ndayizeye@gmail.com', '25779961484', '2022-04-09 07:52:04', '2022-04-09 07:52:04'),
(153, '135466', 'delicia.kezakimana@strathmore.edu', '.', 'Delicia', 'Kezakimana', 'SBS', 'Burundian', 'Bcom', 'Nairobi', '254748361664', 'OP0254196', 'Renee Micheline Nizigiyimana', 'Niremic@yahoo.com', '25779993631', '2022-04-09 09:18:14', '2022-04-09 09:18:14'),
(154, '134888', 'emmanuel.sseggujja@strathmore.edu', 'Joseph', 'Emmanuel', 'Sseggujja', 'Strathmore University Business School', 'Ugandan', 'BCOM', 'Qwetu', '0113090659', 'A00262230', 'Muzaaya Anna Maria Lukeera', 'lukeera@hotmail.com', '0772221255', '2022-04-09 12:23:26', '2022-04-12 08:29:09'),
(155, '136116', 'Emily.Munezero@strathmore.edu', 'Princia', 'Emily', 'Munezero', 'SBS', 'Burundian', 'BFS', 'Nairobi west', '0703573766', '0P0308729', 'Nizigiyimana Renée Micheline', 'niremic@yahoo.fr', '25779993631', '2022-04-09 13:27:35', '2022-04-09 13:27:35'),
(156, '147529', 'benjamin.etanu@strathmore.edu', 'Emiau', 'Benjamin', 'Etanu', 'SBS', 'Ugandan', 'BCOM', 'Qwetu Wilson', '0702464071', 'A00513641', 'Edward Etanu', 'eotanu@gmail.com', '0772605464', '2022-04-10 00:55:00', '2022-04-10 00:55:00'),
(157, '136549', 'Pkeitirima22@gmail.com', '-', 'Peter', 'Keitirima', 'Sbs', 'Ugandan', 'Bcom', 'Qwetu', '0746090563', 'A00349691', 'Keitirima John eudes', 'Keitirima@yahoo.com', '0759592128', '2022-04-10 03:28:42', '2022-04-10 03:28:42'),
(158, '123111', 'zhengyang.shi@gmail.com', '/', 'Shi', 'Zhengyang', 'SBS', 'China', 'BCOM', 'kafoca', '0741176161', 'EE9563115', 'Shi Lihong', '911156193@qq.com', '13761892366', '2022-04-10 06:30:30', '2022-04-12 08:28:04'),
(159, '146166', 'juliananabiryo7@gmail.com', 'Yvonne', 'Juliana', 'Nabiryo', 'Strathmore Business School', 'Ugandan', 'BCOM', 'Kyaliwajjala, Namugongo', '0759014881', 'A00441019', 'Moses Kagoda Kitimbo', 'moseskagoda@gmail.com', '256772434155', '2022-04-10 15:17:03', '2022-04-12 08:28:38'),
(160, '146868', 'hannah.kirabo@strathmore.edu', 'Hannah', 'Kirabo', 'Ssonko', 'Subs', 'Ugandan', 'BCOM', 'Jogoo road', '0797085007', 'A00417739', 'Kayongo Barbra', 'barbrakayongo01@gmail.com', '256782020763', '2022-04-10 16:31:42', '2022-04-12 08:28:29'),
(161, '147274', 'emmanuelrukundo12@gmail.com', '..', 'Rukundo', 'Emmanuel', 'Sbs', 'Rwandan', 'BCOM', 'Magharibi place', '0793380341', 'PC608323', 'Rukundo Emmanuel', 'mataresarl@yahoo.com', '250780608615', '2022-04-11 10:48:43', '2022-04-11 10:48:43'),
(162, '147076', 'Rodneykirungi@gmail.com', 'Ansgar', 'Rodney', 'Kirungi', 'Strathmore business school', 'Ugandan', 'BCOM', 'Qwetu wilson view', '254115474553', 'A00077557', 'Freda Proscovia Bugenyi Kaija', 'Nampagi@gmail.com', '256772488620', '2022-04-11 10:58:47', '2022-04-12 08:28:20'),
(163, '137616', 'ngaleu.chouadeu@strathmore.edu', 'Ngaleu', 'Ange Hilary', 'Chouadeu', 'SBS', 'Cameroonian', 'BCOM', 'Qwetu, Wilson view', '254743283789', '1167455', 'Tchemeni Elise Alliance', 'awansi@yahoo.fr', '237699320825', '2022-04-11 14:23:00', '2022-04-11 14:23:00'),
(164, '136455', 'trevor.lia@strathmore.edu', 'LIA', 'TREVOR', 'MCDONALD', 'SHSS', 'UGANDAN', 'BIS', 'MALIBU APARTMENT, MADARAKA ESTATE', '254748952351', 'B0920214', 'FLORENCE ACENG', 'florenceaceng@gmail.com', '256784270440', '2022-04-12 05:57:54', '2022-04-12 05:57:54'),
(165, '148905', 'Estifanos.Gebremedhin@strathmore.edu', 'Solomon', 'Estifanos', 'Gebremedhin', 'SCES', 'Ethiopian', 'BICS', 'Riverside drive', '0113584511', 'EQ0036279', 'Solomon Gebremedhin Hailemichael', 'estifanos.gebremedhin@strathmore.edu', '256759745310', '2022-04-12 08:30:06', '2022-04-12 08:31:42'),
(166, '149010', 'BethelhemTesfaye95@gmail.com', 'Tesfaye', 'Bethelhem', 'Haileselassie', 'SCES', 'Ethiopian', 'BICS', 'Nairobi', '0115190303', 'EP4619915', 'Tesfaye Haileselassie Adera', 'Tesfayehsadera@gmail.com', '0114324100', '2022-04-12 09:44:21', '2022-04-13 10:19:38'),
(167, '114740', 'livia.musiitwa@strathmore.edu', 'Sanctify', 'Livia', 'Musiitwa', 'SBS', 'Ugandan', 'BCom', 'Orange court', '254745552202', 'A00684416', 'Joseph Musiitwa', 'Jmusiitwa@gmail.com', '256702711712', '2022-04-12 12:23:10', '2022-04-12 12:23:10'),
(168, '147731', 'louiseturyabahika@strathmore.edu', 'Ayebare', 'Turyabahika', 'Louise', 'SBS', 'Ugandan', 'BCOM', 'Qwetu Wilson view', '254757909955', 'A00443929', 'Turyabahika Joseph', 'jturyabahika@gmail.com', '256772500828', '2022-04-13 03:17:10', '2022-04-13 10:50:35'),
(169, '122872', 'abigail.ocan@strathmore.edu', 'Church', 'Abigail', 'Ocan', 'Law', 'Ugandan', 'LLB', 'Magharibi place', '0700172926', 'A00099686', 'Hilda Ndanguzi Ocan', 'Hildaocan@gmail.com', '0772411856', '2022-04-13 06:03:28', '2022-04-13 06:03:28'),
(170, '14903', 'jessemusa2020@gmail.com', 'N/A', 'Jesse', 'Wasolo', 'Instute of management and Technology', 'Ugandan', 'DBIT', 'Mbale', '0', 'B1446435', 'Namarome Leah', 'nama.leah@gmail.com', '256772322156', '2022-04-14 04:49:04', '2022-04-14 04:49:04'),
(171, '147636', 'Sara.nakiganda@strathmore.edu', 'Musisi', 'Sara', 'Nakiganda', 'SIMS', 'Ugandan', 'BBS-ACT', 'Parallel four hostels', '0114046855', 'A00695799', 'Rita Tamale Musisi', 'rtamale@mapenzi.ug', '0752670056', '2022-04-14 09:52:36', '2022-04-16 18:32:19'),
(172, '148751', 'Pamella.chuma@strathmore.edu', 'Alinafe', 'Pamella', 'Chuma', 'SI', 'Malawian', 'DIR', 'Qwetu Hurlingham', '254742088255', 'MA634831', 'Patience Fatsani Scott', 'chumapatience21@gmail.com', '265999230477', '2022-04-15 03:52:02', '2022-04-16 18:31:54'),
(173, '134819', 'sarah.bahati@strathmore.edu', 'LUNA', 'BAHATI', 'SARAH', 'SUBS', 'Congolese', 'BCOM', 'TULIA COURT', '254703828802', 'OP0436137', 'FAIDA BAHATI', 'bahatilunah@gmail.com', '243997759313', '2022-04-19 05:21:04', '2022-04-19 05:21:04'),
(174, '138351', 'munerenkana.balola@strathmore.edu', 'MUNYERENKANA', 'BALOLA', 'AGNES', 'SUBS', 'Congolese', 'BCOM', 'KAHAWA WEST', '254757679539', '06/DGM/RDC/LPTLP/42357/2020', 'CIZUNGU KWINJA SEVERINE', 'agnesbalola@gmail.com', '243859479370', '2022-04-19 05:51:08', '2022-04-19 10:07:52'),
(175, '119876', 'yao.joseline@strathmore.edu', 'Amenan', 'Joseline', 'Yao', 'SUBS', 'IVORIAN', 'BCOM', 'Highrise', '0745410989', '20AD15921', 'Kouadio Bruno Yao', 'amenan254@gmail.com', '0745410989', '2022-04-19 08:31:02', '2022-04-19 08:31:02'),
(176, '147526', 'rasheli.uwamaria@strathmore.edu', 'Rasheli', 'Rasheli', 'Uwamaria', 'School of Humanities and Social Sciences', 'Ugandan', 'BIS', 'Parallel four hostel', '0113292309', 'A00525036', 'Bakomeza Denis', 'bakomeza@gmail.com', '0778583675', '2022-04-19 10:06:23', '2022-04-19 10:08:06'),
(177, '136404', 'victor.bururu@strathmore.edu', 'Victor', 'Tanatswa', 'Bururu', 'SBS', 'Zimbabwean', 'BSCM', 'Qwetu Wilson view', '0745057725', 'AS006149', 'Collen Bururu', 'bururucollen@gmail.com', '0724537371', '2022-04-19 14:27:51', '2022-04-19 14:27:51'),
(178, '137106', 'laeticia.djimingarlaeticia@strathmore.edu', 'Laeticia', 'Djimingar', 'Antoinette', 'Sbs', 'Chadian', 'Bcom', 'Madaraka', '0742626790', 'R0474122', 'Djimingar Arsène', 'adjimingar@gmail.com', '0023566246751', '2022-04-19 14:46:14', '2022-04-19 14:46:14'),
(179, '119906', 'Diana.munezero@strathmore.edu', 'Diana', 'Munezero', 'Diana', 'SBS', 'Rwandan', 'Bcom', 'Qwetu students residence', '254790412865', 'PC342110', 'Mutoni Justine', 'mutonijust@gmail.com', '0780659719', '2022-04-19 14:46:20', '2022-04-19 14:46:20'),
(180, '113837', 'delino.gayweh@strathmore.edu', 'Karmah', 'Delino', 'Gayweh', 'SIMS', 'Liberia', 'BBS-FE', 'Olive Court (Hostel)', '0723529810', 'PP0033381', 'Aagon Dennis Gayweh', 'delino.gayweh@strathmore.edu', '231776874050', '2022-04-19 15:00:01', '2022-04-27 06:21:17'),
(181, '112718', 'deborah.lamunu@strathmore.edu', 'Otonga', 'Deborah', 'Lamunu', 'SBS', 'Ugandan', 'BCOM', 'Kampala', '254721115471', 'B1638890', 'Otonga Michael Ochan', 'motonga@gmail.com', '256704238885', '2022-04-19 15:06:41', '2022-04-19 15:06:41'),
(182, '120415', 'emmanuel.agre@strathmore.edu', 'Kouadjo Amos', 'Yann Emmanuel', 'Agre', 'SCES', 'IVORIAN', 'BBIT', 'Woodley', '254799673045', '20AC62903', 'Agre Kouadjo Bernard', 'bernagre63@gmail.com', '2250505879552', '2022-04-19 15:19:09', '2022-04-19 15:19:09'),
(183, '117862', 'sarah.kamuzora@strathmore.edu', 'Israel', 'Sarah', 'Kamuzora', 'SBS', 'Tanzanian', 'BCOM', 'South C, Nairobi', '0115545017', 'TAE274076', 'ISRAEL KAMUZORA', 'ikamuzora@gmail.com', '255766872279', '2022-04-19 15:28:30', '2022-04-20 13:02:47'),
(184, '146158', 'precious.ikechukwu@strathmore.edu', 'Precious', 'Ikechukwu', 'Chinecherem', 'Humanities', 'Nigerian', 'BAC', 'Parallel 4 hostels', '0702460249', 'A09566549', 'Mrs Chinyere Josephine nwosu', 'tenaciousprecious572@gmail.com', '651591017', '2022-04-19 15:31:45', '2022-04-20 13:04:34'),
(185, '136371', 'vunangajoseph@gmail.com', 'DUA', 'Joseph', 'VUNANGA', 'SCES', 'Congolese', 'ICS', 'Qwetu Wilsonview, Keri road', '740019948', 'OP 0613342', 'VUNANGA KHARAKABIRE Meschack', 'meschvunanga@yahoo.fr', '0998682223', '2022-04-19 15:55:53', '2022-04-19 15:55:53'),
(186, '133863', 'jeanmirembe06@gmail.com', 'Jean', 'Mirembe', 'Faith', 'SIMS', 'Ugandan', 'BBS-ACT', 'Nairobi', '254769693899', 'B1731095', 'Mujuni Jimrex', 'mujunijimrex@gmail.com', '256772501015', '2022-04-19 16:29:11', '2022-04-20 13:01:44'),
(187, '123558', 'levi.zwannah@strathmore.edu', 'Kamara', 'Levi', 'Zwannah', 'SCES', 'Liberian', 'BICS', 'Madaraka', '0740958965', 'L221277', 'Boimah J Z Kamara', 'jboimahkz@gmail.com', '231886440780', '2022-04-19 21:13:42', '2022-04-19 21:13:42'),
(188, '146720', 'hellenlois.salibaba@strathmore.edu', 'Harold', 'Hellenlois', 'Salibaba', 'Business', 'Tanzanian', 'BCOM', 'Akila 1', '0714980772', 'TAE071440', 'Mary Harold Shoo', 'Mary@harsho.com', '0787287409', '2022-04-20 05:04:48', '2022-04-20 05:04:48');
INSERT INTO `add_new_students` (`id`, `suID`, `suEMAIL`, `surNAME`, `firstNAME`, `lastNAME`, `Faculty`, `Nationality`, `Course`, `Residence`, `phoneNUMBER`, `passportNUMBER`, `ParentNames`, `ParentEmail`, `ParentPhone`, `created_at`, `updated_at`) VALUES
(189, '122475', 'amen.gamed@strathmore.edu', 'Tamene', 'Amen', 'Gemeda', 'FIT', 'Ethiopian', 'BICS', 'Madaraka', '254791872361', 'EP4863062', 'Tezerash Tafesse', 'amentamene@gmail.com', '+251921458720', '2022-04-20 07:54:03', '2022-04-22 08:47:43'),
(190, '122688', 'Branton.atwiine@strathmore.edu', 'BRANTON', 'ATWIINE', 'John', 'SBS', 'Ugandan', 'BCOM', 'Madaraka', '254716618137', 'A00297090', 'Kyarimpa Lillian', 'Kyarimpalillian@gmail.com', '256759806825', '2022-04-20 14:40:46', '2022-04-22 08:45:52'),
(191, '138451', 'joseph.kimaro44@starthmore.edu', 'robson', 'joseph', 'kimaro', 'sI', 'Tanzanian', 'DBM', 'madaraka', '0741464497', 'TAE116569', 'olga Robson kimaro', 'joebeinlord44@gmail.com', '0627726513', '2022-04-21 06:57:29', '2022-04-22 08:45:42'),
(192, '149074', 'emedrophicmekus02@gmail.com', 'Confidence', 'Emeka', 'Sylvanus', 'Business', 'Nigerian', 'BCOM', 'Eden Phase Iv Nakuru', '0740096994', 'A09210847', 'Faith Adaeze Sylvanus', 'emedrophicmekus02@gmail.com', '2548168834645', '2022-04-21 08:16:06', '2022-04-22 08:45:18'),
(193, '148446', 'seyionayinka@gmail.com', 'Deborah', 'Oluwaseyifunmi', 'Onayinka', 'School of computing and engineering sciences', 'Nigerian', 'BBIT', 'Qwetu wilsonview, madaraka estate, Keri road', '254741443624', 'A10259000', 'Onayinka Oluyemi', 'ooluwaranmilowo@gmail.com', '2348124539655', '2022-04-21 10:30:41', '2022-04-22 08:44:47'),
(194, '124377', 'Bradley.mburi@strathmore.edu', 'JERRY', 'BRADLEY', 'MBURI', 'STRATHMORE BUSINESS SCHOOL', 'TANZANIAN', 'BCOM', 'Keri road, madaraka estate', '0794669905', 'TAE177210', 'MONICA SAMWEL MASHEE', 'Monica.mashee@gmail.com', '0757494444', '2022-04-21 13:51:39', '2022-04-22 08:44:34'),
(195, '147558', 'Kanumaericruje@gmail.com', 'Eric', 'Kanuma', 'Ruje', 'Professiona courses', 'Rwandan', 'Acca', 'Madaraka', '0113887783', 'Pc 669135', 'Umutesi anizia nyirindadi', 'mutesianiza@gmail.com', '250788519763', '2022-04-22 06:43:00', '2022-04-22 06:43:00'),
(196, '147973', 'timothy.olwit@strathmore.edu', 'Apunyo', 'Timothy', 'Olwit', 'Strathmore university', 'Ugandan', 'DIR', 'West Nairobi', '0748633131', 'A00598441', 'Teddy Atim', 'atimapunyo@gmail.com', '0772425888', '2022-04-22 07:36:48', '2022-04-22 08:44:21'),
(197, '112525', 'monica.giramia@strathmore.edu', 'Ikol', 'Monica', 'Giramia', 'Sbs', 'Ugandan', 'BCOM', 'Nairobi west', '0768916683', 'B1656950', 'Simon Edward Omoding', 'si.omoding@gmail.com', '0752665775', '2022-04-22 08:08:28', '2022-04-22 08:08:28'),
(198, '137327', 'ajunalindah@gmail.com', '-', 'Ajuna', 'Lindah', 'Humanities and social sciences', 'Ugandan', 'BAC', 'Qwetu Wilson view', '0768317266', 'A00275931', 'Sarah Murungi', 'Sarahmurungi@gmail.com', '256700236050', '2022-04-22 08:18:40', '2022-04-22 08:19:17'),
(199, '147523', 'marilynkaren2@gmail.com', 'Marilyn', 'Karen', 'Nalukenge', 'Business School', 'Ugandan', 'BCOM', 'Madaraka', '0746154774', 'A00472625', 'Namutebi Juliet', 'julie_na@yahoo.com', '0756617444', '2022-04-22 08:44:50', '2022-04-22 08:44:50'),
(200, '147410', 'Christopher.Mollel@strathmore.edu', 'Christopher', 'Derick', 'Loiruck', 'Bussiness', 'Tanzanian', 'BCOM', 'Qwetu Wilson View', '254746983376', 'TAE337807', 'Christopher Loiruck Mollel', 'Cploiruck@gmail.com', '255786285612', '2022-04-22 15:46:47', '2022-04-27 06:19:35'),
(201, '146907', 'Jennifer.Kewe@strathmore.edu', 'Sosthenes', 'Jennifer', 'Kewe', 'Business', 'Tanzanian', 'BCOM', 'Qwetu Wilson View Madaraka', '254112141036', 'TAE067650', 'Sosthenes Kewe and Faraja Massawa', 'Sostheneskewe45@gmail.com', '255756776336', '2022-04-22 15:46:59', '2022-04-27 06:19:19'),
(202, '135545', 'vjwashima@gmail.com/vaileth.james@strathmore.edu', 'James', 'Vaileth', 'Washima', 'SBS', 'Tanzanian', 'BCOM', 'Madaraka Kafoka Hostels', '0113104858', 'TAE130099', 'Mrs. Washima', 'beatha.baghayo@go.tz', '255687336213', '2022-04-23 11:00:27', '2022-04-27 06:20:26'),
(204, '136222', 'mwampambakarin@gmail.com', 'Daniel', 'Karin', 'Mwampamba', 'SBS', 'Tanzanian', 'BCOM', 'Madaraka', '0114442611', 'TAE 037680', 'Isabella Daniel Mwampamba', 'Isabellaafricafoundation@gmail.com', '0762756046', '2022-04-26 09:04:24', '2022-04-26 09:04:24'),
(205, '145718', 'Doreen.keddey@strathmore.edu', 'Afua Achaama Enyonam', 'Doreen', 'Keddey', 'SLS', 'Ghanaian', 'Bachelor of Law', 'Keri Residence', '0704365092', 'G2596905', 'Maj. Samuel Kwame Dzibodi Keddey (Rtd)', 'kkeddey@gmail.com', '0765290630', '2022-04-26 10:23:04', '2022-04-26 10:23:04'),
(206, '146639', 'sheba.tinditina@strathmore.edu', 'Byamukama', 'Tinditina', 'Sheba', 'Strathmore Institute of Mathematical Sciences', 'UGANDAN', 'BBS-FE', 'Madaraka', '745778803', 'A00591994', 'Barungi Merina', 'bmerinab7@gmail.com', '756000111', '2022-04-27 08:55:59', '2022-04-28 04:47:36'),
(207, '146911', 'samuela.ssengooba@strathmore.edu', 'Freda', 'Samuela', 'Ssengooba', 'Strathmore Institute of Mathematical Sciences', 'Ugandan', 'BBS-FE', 'Madaraka', '704506451', 'A00591083', 'Ssengooba Freddie Peter', 'Freddie.Ssengooba@gmail.com', '772509316', '2022-04-27 08:58:59', '2022-04-28 04:47:51'),
(208, '147335', 'Genevieve.Isha@strathmore.edu', 'Rukiko', 'Isha', 'Geneviève', 'SHSS', 'Congolese', 'BAC', 'Magharibi Place', '254796414152', 'OP0970701', 'Rachel Kabunga', 'Rachelkabunga2017@gmail.com', '243822000226', '2022-04-29 09:17:32', '2022-04-29 09:17:32'),
(209, '147490', 'Laura.Namata@Strathmore.edu', 'Cecilia', 'Laura', 'Namata', 'SIMS', 'Ugandan', 'BBS-FENG', 'Parallel four hostels', '254114240625', 'A00661791', 'Lugemwa Henry Kyanjo', 'hklugemwa@gmail.com', '256772748007', '2022-05-05 05:14:40', '2022-05-05 06:03:17'),
(210, '147580', 'margret.ayet@strathmore.edu', 'Margret', 'Ayet', 'Ocum', 'SIMS', 'South Sudanese', 'BBS-FENG', 'Qwetu Students’ Residences WilsonView', '0112470005', 'R00387730', 'Ocum Genes Karlo', 'ocumkarlo@gmail.com', '0923144949', '2022-05-05 05:16:51', '2022-05-05 06:03:48'),
(211, '146686', 'aliinda.nabulo@strathmore.edu', 'Nabulo', 'Aliinda', 'Nabulo', 'SIMS', 'Ugandan', 'BBS FENG', 'Qwetu student residences Wilson view', '254114269338', 'A00591893', 'John Muyonga', 'jhmuyonga@gmail.com', '256772673153', '2022-05-05 05:24:23', '2022-05-05 05:24:23'),
(212, '148848', 'Daniel.Nhial@strathmore.edu', 'Mangong', 'Daniel', 'Baak', 'SCES', 'South Sudanese', 'BICS', 'Syokimau', '0703804001', 'R00203050', 'Martha Adut Kuol', 'james@solidarityministriesafrica.org', '0792956602', '2022-05-05 05:42:42', '2022-05-05 05:42:42'),
(213, '147379', 'Joseph.ngoma@strathmore.edu', 'MAKIDI', 'Joseph', 'NGOMA', 'SBS', 'Congolese', 'BCOM', 'Qwetu Hurlingham', '0757825761', 'OP0944792', 'Etienne MAKIDI NGOMA', 'engomak@yahoo.fr', '00243852324805', '2022-05-06 06:12:52', '2022-05-06 06:12:52'),
(214, '127323', 'elisante.ayo@strathmore.edu', 'Elisante', 'Maureen', 'Ayo', 'FIT', 'Tanzanian', 'BBIT', 'Madaraka', '0797769625', 'TAE112989', 'Philomena Raphael', 'philoamsi@gmail.com', '255757600960', '2022-05-09 08:03:33', '2022-05-09 08:03:33'),
(215, '147857', 'Ntumba.Mpinguyabo@strathmore.edu', 'Ntumba', 'Mpinguyabo', 'Shekinah', 'SCES', 'Congolese', 'BICS', 'Qwetu wilson view', '254702692580', 'Op061886', 'Mwanza Tshibay Julie', 'Juliemwanza11@gmail.com', '00243815490230', '2022-05-10 04:38:29', '2022-05-10 08:28:01'),
(216, '148042', 'najjumangella20@gmail.com', 'ANGELLA', 'KATAMBA', 'NAJJUMA', 'SI', 'Ugandan', 'Dip. BCE', 'Qwetu jogoo road', '0757096870', 'B1166339', 'DR.ACHILLES KATAMBA', 'axk95@case.edu', '0772575038', '2022-05-11 04:42:58', '2022-05-25 10:42:36'),
(217, '136497', 'sidona.kahika@strathmore.edu', 'Tumwebaze', 'Sidona', 'Kahika', 'SIMS', 'Ugandan', 'BBS-FE', 'Qwetu WilsonView', '254115075919', 'A00285916', 'Bernard Tumwebaze', 'bktumwebaze2@gmail.com', '256772440851', '2022-05-13 07:32:38', '2022-05-27 08:52:47'),
(218, '124152', 'zainab.masato@strathmore.edu', 'Zainab', 'Masato', 'Suleiman', 'SUBS', 'Tanzanian', 'Bcom', 'Qwetu Residences', '254714655026', 'TAE241323', 'Suleiman Masato', 'masatosuleiman@gmail.com', '255754277338', '2022-05-13 07:41:06', '2022-05-13 07:41:06'),
(219, '147513', 'anormanangel@gmail.com', 'NORMAN', 'ANGEL', 'AGONG', 'Institute of Mathematical Sciences', 'UGANDAN', 'MSc. Data Science and Analytics', 'Qwetu Hostel', '254704265566', 'A00293379', 'ANGEL JOHN', 'ielyetu@gmail.com', '256777194721', '2022-05-13 09:33:55', '2022-05-27 08:52:14'),
(220, '136640', 'shivandrucy@gmail.com', 'MUBIRU', 'SHIVAN', 'NANTONO', 'SCES', 'UGANDAN', 'BICS', 'QWETU RESIDENCE WILSON VIEW', '254798441003', 'A00362763', 'KABONESA HARRIET', 'hkabona0@gmail.com', '256702464434', '2022-05-13 11:02:50', '2022-05-16 04:30:58'),
(221, '146866', 'Rebecca.Kamoga@strathmore.edu', 'Grace', 'Rebecca', 'Kamoga', 'SIMS', 'Ugandan', 'BBS-ACT', 'Nairobi', '07069187225', 'B1736113', 'Joseph Kamoga', 'kamogajos@yahoo.com', '256772472546', '2022-05-13 13:22:29', '2022-05-27 08:51:05'),
(222, '138367', 'mwenzangu.ombeni@strathmore.edu', 'Mwenzangu', 'Ombeni', 'Faraja', 'SCES', 'Congolese', 'ICS', 'Amani court 516, Tassia, embakasi', '254729054607', 'OP0678749', 'Daudi Faraja Patrick', 'Farajapaty@yahoo.com', '254720549193', '2022-05-16 03:26:49', '2022-05-16 03:26:49'),
(223, '148524', 'daisy.akankunda@strathmore.edu', 'Daisy', 'Akankunda', 'Daisy', 'SBS', 'Ugandan', 'BCOM', 'Qwetu Wilson View', '0740358345', 'A00614855', 'Kamusiime Penelope', 'kamusiimepenelope@gmail.com', '0772321954', '2022-05-26 10:36:47', '2022-05-26 10:43:21'),
(224, '148892', 'jackrobert479233@gmail.com', 'Jack', 'Wegulo', 'Robert', 'School of humanities and social sciences', 'Ugandan', 'BIS', 'Kampala', '256750622720', 'CM0104210CR9AD', 'Egessa Juma Jackson', 'egessajackson@gmail.com', '256774692871', '2022-05-26 10:53:39', '2022-05-27 08:50:43'),
(225, '149459', 'lisa.busingye@strathmore.edu', 'Batamuriza', 'Lisa', 'Busingye', 'SUBS', 'Ugandan', 'BCOM', 'Qwetu Wilsonview', '0725725434', 'A00710718', 'Harrison Busingye', 'harrisonrrbusingye94@gmail.com', '0743106839', '2022-05-26 10:57:43', '2022-05-26 10:57:43'),
(226, '137628', 'Clara.Otieno@strathmore.edu', 'Thomas', 'Clara', 'Otieno', 'SI', 'Tanzanian', 'DBM', 'Highrise estate', '254704708359', 'TAE401349', 'Thomas L. Otieno', 'Otieno@diamondtrust.co.tz', '255786662444', '2022-05-27 09:00:56', '2022-05-27 17:27:25'),
(227, '148341', 'elyon.shima@strathmore.edu', '-', 'Elyon', 'Shima', 'SCES', 'Rwandese', 'BICS', 'Nairobi, Kenya', '0736216984', 'PC675952', 'Ruth Musasangohe', 'ruthka2001@yahoo.fr', '0720207864', '2022-06-02 06:49:25', '2022-06-02 06:49:25'),
(228, '147437', 'michael.elisama@strathmore.edu', 'Michael', 'Chaplain', 'Elisama', 'SCES', 'South Sudanese', 'CNS', 'Nairobi', '254719292903', 'r00560611', 'Jesca Wude Murye', 'jescanamurye@gmail.com', '0727990794', '2022-06-03 07:28:09', '2022-06-03 07:28:09'),
(229, '094675', 'Jonathan.Monama@strathmore.edu', 'Jonathan', 'Monama', 'Jonathan', 'SCES', 'DRC', 'BBIT', 'Prime time apartment, langata road', '0723995378', 'OP0498359', 'Monama Ndo Fida', 'Fridamonama@hotmail.com', '0032466473598', '2022-06-05 02:41:28', '2022-06-05 02:41:28'),
(230, '151044', 'evalineamos3@gmail.com', 'Amosi', 'Evaline', 'Moseti', 'SUBS', 'Tanzanian', 'Bachelor of commerce', 'Mlolongo', '0115661708', 'TAE212138', 'Chacha Mwita Moseti', 'cmoseti2@gmail.com', '255765669659', '2022-06-07 05:04:27', '2022-06-07 05:04:27'),
(231, '148214', 'Tevin.Ddumba@strathmore.edu', 'Tevin', 'Ddumba', 'Makumbi', 'School of business', 'Ugandan', 'BCOM', 'Madaraka', '0795181324', 'A00600188', 'Emmanuel Makumbi', 'emakumbi@gmail.com', '256772712856', '2022-06-07 08:10:22', '2022-06-07 08:10:22'),
(232, '134893', 'Joel.agaba@strathmore.edu', '(None)', 'Joel', 'Agaba', 'SUBS', 'Ugandan', 'BCOM', 'Qwetu Student residences Wilson view', '0115484333', 'A00311224', 'Josephat Nuwabeine', 'nuwabeine@gmail.com', '0772323231', '2022-06-09 05:51:37', '2022-06-09 09:30:32'),
(233, '146927', 'rachael.aloyo@strathmore.edu', 'RACHEAL', 'ALOYO', 'MARIA', 'SI', 'UGANDAN', 'DBM', 'Parallel Four Hostels', '0799180184', 'A00462475', 'Christine Lanyero', 'contransporters@gmail.com', '256772594914', '2022-06-09 09:24:23', '2022-06-09 09:24:23'),
(234, '147927', 'ralph.lisa@strathmore.edu', 'Ralph', 'lisa', 'Kyarua', 'SI', 'TANZANIAN', 'DBM', 'Parralel Four', '254704057816', 'TAE230314', 'Matilda Abel Marealle', 'matildamarealle@gmail.com', '255754296375', '2022-06-09 09:29:22', '2022-06-10 10:05:45'),
(235, '148756', 'rwabashi.kengu@strathmore.edu', 'RWABASHI', 'KENGU', 'JUDITH', 'SUBS', 'Congolese', 'BCOM', 'AKILA APARTMENT, MBAGATHI WAY', '254708320397', 'OP1074528', 'Mapendo Bibishe', 'rwabashi.kengu@strathmore.edu', '243891658272', '2022-06-14 06:31:03', '2022-06-14 06:31:03'),
(236, '136538', 'nicole.kajuga@strathmore.edu', 'Ankunda', 'Nicole', 'Kajuga', 'SIMS', 'Ugandan', 'BBS-FENG', 'Qwetu Wilson View', '254113080574', 'A00393972', 'Paul Kajuga', 'kajugap971@gmail.com', '256772454924', '2022-06-17 06:57:38', '2022-06-17 06:57:38'),
(237, '134068', 'joy.mulumbi@strathmore.edu', 'Kavugho', 'Joy', 'Mulumbi', 'SBS', 'Congolese', 'BCOM', 'Madaraka, Westpoint', '0719441424', 'OP0787093', 'Kavugho Kalumbi', 'kavughomulumbi@gmail.com', '0995601605', '2022-06-20 02:24:32', '2022-06-20 02:24:32'),
(238, '148197', 'Jennifer.acomo@strathmore.edu', 'Jennifer', 'Acomo', 'Joyce', 'STH', 'Ugandan', 'BTM', 'Qwetu Wilson view', '254790895479', 'B1558528', 'Felix Orech', 'felixorech@yahoo.com', '256772487773', '2022-06-20 07:24:46', '2022-06-24 06:24:28'),
(239, '148472', 'moun.akuei@strathmore.edu', 'MARIAMA', 'MOUN', 'AJUET', 'SI', 'South Sudanese', 'DBM', 'QWETU WILSON VIEW', '254759731745', 'R00385174', 'MARIAMA AJUET', 'marianaajuet@yahoo.com', '211924000000', '2022-06-20 08:40:02', '2022-06-20 08:40:02'),
(240, '148102', 'moses.tibayeita@strathmore.edu', 'Moses', 'Tibayeita', 'Ryan', 'Strathmore Institute', 'Ugandan', 'DBM', 'Qwetu Student Residences', '254757457879', 'A00542154', 'Innocent Tibayeita Bagumira', 'bagumira78@gmail.com', '256753000546', '2022-06-20 08:40:27', '2022-06-24 06:21:35'),
(241, '134889', 'jonathan.sentomero@strathmore.edu', 'Sentomero', 'Jonathan', 'Kakembo', 'SIMS', 'Ugandan', 'BBS-FENG', 'QWETU WILSON VIEW', '254112938773', 'A00699053', 'Barbara Sentomero', 'Barbara.kayaga@gmail.com', '256758880149', '2022-06-20 09:59:34', '2022-06-20 09:59:34'),
(242, '151311', 'arsene.ndimanya@strathmore.edu', 'Ndimanya', 'Akilimali', 'Arsene', 'SI', 'DRC', 'DBM', 'Links Apartment, Mbagathi way', '254746315411', 'OP0244644', 'Ndimanya Blaise', 'arsenendimanya2022@gmail.com', '243996485908', '2022-06-21 09:50:24', '2022-06-21 09:50:24'),
(243, '147637', 'Diana.Nanyonga@O365.strathmore.edu', 'Madrine', 'Diana', 'Nanyonga', 'SIMS', 'Ugandan', 'BBS-ACT', 'Parallel Four Hostels Mbagathi', '254112403261', 'A00704146', 'Mrs Nagujja Margaret', 'magdenise@yahoo.com', '256772501651', '2022-06-23 16:17:53', '2022-06-24 06:21:57');

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
(1, 'Approved', 'Chirhalwirwa', 'Lebon Jesus', 'OP0581106', 'lebon.chirha@strathmore.edu', '122648', 'Democratic Republic of the Congo', '2022-04-13', '1649418320.Lebon_ProgressReport-122648.pdf', '1649418320.Lebon_ProgressReport-122648.pdf', '1649418320.Lebon_ProgressReport-122648.pdf', '1649418320.Lebon_ProgressReport-122648.pdf', '2022-04-08 08:44:00', '2022-05-25 11:29:05');

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
  `Residence` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(4, 'Chirhalwirwa', 'lebon', '122648', 'lebon.chirha@strathmore.edu', 'Qwetu Residences', 'BCOM', 'OP0581106', '254716396650', 'CONGOLESE', 'SUBS', NULL, '2022-04-08 17:50:08', '2022-04-08 17:50:08');

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
(1, 'users-create', 'Create Users', 'Create Users', '2022-03-25 07:49:32', '2022-03-25 07:49:32'),
(2, 'users-read', 'Read Users', 'Read Users', '2022-03-25 07:49:32', '2022-03-25 07:49:32'),
(3, 'users-update', 'Update Users', 'Update Users', '2022-03-25 07:49:32', '2022-03-25 07:49:32'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2022-03-25 07:49:32', '2022-03-25 07:49:32'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2022-03-25 07:49:32', '2022-03-25 07:49:32'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2022-03-25 07:49:32', '2022-03-25 07:49:32'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2022-03-25 07:49:32', '2022-03-25 07:49:32'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2022-03-25 07:49:32', '2022-03-25 07:49:32'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2022-03-25 07:49:32', '2022-03-25 07:49:32'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2022-03-25 07:49:32', '2022-03-25 07:49:32');

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
(1, 'superadministrator', 'Superadministrator', 'Superadministrator', '2022-03-25 07:49:32', '2022-03-25 07:49:32'),
(2, 'administrator', 'Administrator', 'Administrator', '2022-03-25 07:49:33', '2022-03-25 07:49:33'),
(3, 'InternationalStudent', 'InternationalStudent', 'InternationalStudent', '2022-03-25 07:49:33', '2022-03-25 07:49:33');

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
(2, 15, 'App\\Models\\User'),
(3, 17, 'App\\Models\\User'),
(3, 18, 'App\\Models\\User'),
(3, 19, 'App\\Models\\User'),
(3, 20, 'App\\Models\\User');

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
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `surNAME`, `otherNAMES`, `suID`, `email`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nyambura', 'Thomas Macharia', '03187', 'tnyambura@strathmore.edu', '1', NULL, '$2y$10$nKqNtnYKKM.XIsUJ6eQ5NOmzeULj.6NTFFZJ90QyYi3KGco6FjY.C', NULL, NULL, '2022-04-07 17:08:04'),
(15, 'Wambogo', 'Michael Owiti', '01570', 'Mowiti@strathmore.edu', '1', NULL, '$2y$10$kxVjpAVuCeYzYELScKtIfeWzlE6AKaOQxHWHz.94.1b0tiNjhwVy.', NULL, '2022-04-07 17:22:52', '2022-04-07 17:22:52'),
(17, 'Chirhalwirwa', 'lebon', '122648', 'lebon.chirha@strathmore.edu', '1', NULL, '$2y$10$kSvDusQu64Seigoj8SapxufdHIpQd2hIQwiyTNMxdIJjefcseLkq2', NULL, '2022-04-08 08:57:31', '2022-04-08 08:57:31'),
(18, 'Apunyo', 'Timothy Olwit', '147973', 'timothy.olwit@strathmore.edu', '1', NULL, '$2y$10$nZ5Sz99ZMUV9uEDrp3/Cyuv339JursBXfv8qlCP5OLc6orA86MeCu', NULL, '2022-04-22 07:56:57', '2022-04-22 07:56:57'),
(19, 'Gemeda', 'Amen Tamene', '122475', 'amen.gamed@strathmore.edu', '1', NULL, '$2y$10$cWiq2f.bGO0M035HsNhaOuDnhIZg4/rAWdZbduZlPGn4I1pdE5H6S', 'qTOsRSk5e26tnMJObXOlKmkn2Bita34boIoS8beYTDCpBbcUeHRnqFh0rnlX', '2022-05-05 07:01:59', '2022-05-05 07:22:13'),
(20, 'KOKO', 'SAFARI JEAN-LUC', '113699', 'safari.koko@strathmore.edu', '1', NULL, '$2y$10$SUhnppgdyhjH6mCV.jI/euOvk0BesFC1AE.4CrEWFHuSAzVilHpVy', NULL, '2022-05-25 11:27:09', '2022-05-25 11:27:09');

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
  ADD UNIQUE KEY `buddies_email_unique` (`email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `applyvisaextensions`
--
ALTER TABLE `applyvisaextensions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apply_kpps`
--
ALTER TABLE `apply_kpps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buddies`
--
ALTER TABLE `buddies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buddies_allocation`
--
ALTER TABLE `buddies_allocation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buddies_requests`
--
ALTER TABLE `buddies_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
