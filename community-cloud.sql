-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2019 at 11:16 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computer_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` int(11) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `image`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, '1.jpg', 'Robort Space Research', 'Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedwhen an unknown printer took a galley of type and scrambled.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>\r\n                                <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\r\n                                <p><span>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry\'s standard dummy type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchan scrambled.</span></p>\r\n                                <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedwhen an unknown printer took a galley of type and scrambled.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged', '2019-08-17 18:00:00', NULL),
(2, '2.jpg', 'UI-UX Web Design', 'Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedwhen an unknown printer took a galley of type and scrambled.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>\r\n                                <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\r\n                                <p><span>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry\'s standard dummy type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchan scrambled.</span></p>\r\n                                <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedwhen an unknown printer took a galley of type and scrambled.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged', '2019-08-17 23:06:00', NULL),
(3, '3.jpg', 'Space Rounded Research', 'Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedwhen an unknown printer took a galley of type and scrambled.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>\r\n                                <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\r\n                                <p><span>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry\'s standard dummy type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchan scrambled.</span></p>\r\n                                <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedwhen an unknown printer took a galley of type and scrambled.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged', '2019-08-15 23:06:00', NULL),
(4, '4.jpg', 'Medical Machines', '<p><strong>Bimply dummy</strong> text of the printing and typesetting istryrem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedwhen an unknown printer took a galley of type and scrambled.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\r\n\r\n<p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry&#39;s standard dummy type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchan scrambled.</p>\r\n\r\n<p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedwhen an unknown printer took a galley of type and scrambled.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>', '2019-08-19 23:06:00', '2019-08-24 13:41:37'),
(5, '5.jpg', 'Gymplash Study', 'Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedwhen an unknown printer took a galley of type and scrambled.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>\r\n                                <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\r\n                                <p><span>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry\'s standard dummy type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchan scrambled.</span></p>\r\n                                <p>Bimply dummy text of the printing and typesetting istryrem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedwhen an unknown printer took a galley of type and scrambled.when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged', '2019-08-18 23:06:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(160) NOT NULL,
  `email` varchar(160) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL,
  `remember_token` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sakib', 'admin@admin.com', 'admin', '$2y$10$MZswK2SzTHQrrVXWDnEFn.YiloJusIxFi8GQM6nr3mXa4CtObCcgm', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `session` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`id`, `name`, `session`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Executive Committee(Male)', 'Autumn 2018- Spring 2019', '309iblHSv3.jpeg', 1, NULL, '2019-08-24 16:12:22'),
(2, 'Executive Committee(Male)', 'Autumn 2017- Spring 2018', '9jkIG1Aw5h.jpeg', 0, NULL, '2019-08-24 16:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `committee_members`
--

CREATE TABLE `committee_members` (
  `id` int(11) NOT NULL,
  `committee_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `content` longtext,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `fb_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `committee_members`
--

INSERT INTO `committee_members` (`id`, `committee_id`, `name`, `image`, `position`, `content`, `phone`, `email`, `linkedin_url`, `fb_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Iaamanur Rahman', '1.jpg', 'General Secretary', '<p><s><strong>Lorem ipsum</strong></s> dolor sit amet, consectetur adipiscing elit. Sed ultricies nibh vitae turpis blandit commodo. Suspendisse a diam tempus, fermentum dui auctor, mollis lacus. In eu eleifend felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam quis mauris tortor. Sed tincidunt id justo at consectetur. Suspendisse potenti. In hac habitasse platea dictumst. Aenean tempor ornare scelerisque. Sed malesuada mi tellus, vel tincidunt tellus ultrices id. Proin mollis nibh ultrices nisi rhoncus suscipit. Ut interdum quam vel volutpat vulputate. Phasellus felis nisi, ornare sit amet venenatis eu, aliquet sit amet erat. Quisque elementum eu diam vel varius. Donec in est odio. Pellentesque placerat condimentum metus a imperdiet. Etiam lobortis viverra fringilla. Maecenas ut massa ac augue tristique bibendum. Vestibulum sit amet mi sed risus pretium volutpat. In egestas neque turpis, et tempus diam viverra rhoncus. Integer commodo lectus sed sem imperdiet aliquam. Sed maximus nisi massa, cursus pharetra nisi tincidunt vel. Nam scelerisque tristique arcu, sit amet pharetra massa. Pellentesque faucibus lorem mauris, vitae posuere diam auctor nec. Aliquam at ex neque. Mauris risus orci, scelerisque nec sagittis ut, lobortis vel sem. Pellentesque vel erat feugiat, maximus risus eu, tristique nulla. Morbi vel consectetur nisl, sed luctus mauris. Sed pellentesque, arcu quis rhoncus lobortis, quam eros vestibulum ante, ut faucibus est nisi ac erat. Donec feugiat, ex vel auctor venenatis, ante diam suscipit magna, sit amet pellentesque tortor metus sollicitudin magna. Integer tempor elementum ex, placerat hendrerit urna commodo fermentum. Nulla congue feugiat arcu, ut mattis ex lobortis eget. Nullam ut sem sit amet est iaculis sagittis quis et ante. Phasellus fringilla ultricies vulputate. Morbi nec sem ligula. Sed porttitor, mauris a pulvinar malesuada, velit arcu tincidunt nunc, rutrum finibus velit sem ut ligula. Proin dictum, lorem eu elementum congue, sapien turpis convallis odio, in viverra neque augue eu magna.</p>', '018000000', 'ss@ee.co', 'url', 'url', NULL, '2019-08-24 14:47:18'),
(2, 1, 'Ahasanul kalam akib', '2.jpg', 'Assistant General Secretary', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultricies nibh vitae turpis blandit commodo. Suspendisse a diam tempus, fermentum dui auctor, mollis lacus. In eu eleifend felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam quis mauris tortor. Sed tincidunt id justo at consectetur. Suspendisse potenti. In hac habitasse platea dictumst. Aenean tempor ornare scelerisque. Sed malesuada mi tellus, vel tincidunt tellus ultrices id.\r\n\r\nProin mollis nibh ultrices nisi rhoncus suscipit. Ut interdum quam vel volutpat vulputate. Phasellus felis nisi, ornare sit amet venenatis eu, aliquet sit amet erat. Quisque elementum eu diam vel varius. Donec in est odio. Pellentesque placerat condimentum metus a imperdiet. Etiam lobortis viverra fringilla. Maecenas ut massa ac augue tristique bibendum. Vestibulum sit amet mi sed risus pretium volutpat. In egestas neque turpis, et tempus diam viverra rhoncus. Integer commodo lectus sed sem imperdiet aliquam.\r\n\r\nSed maximus nisi massa, cursus pharetra nisi tincidunt vel. Nam scelerisque tristique arcu, sit amet pharetra massa. Pellentesque faucibus lorem mauris, vitae posuere diam auctor nec. Aliquam at ex neque. Mauris risus orci, scelerisque nec sagittis ut, lobortis vel sem. Pellentesque vel erat feugiat, maximus risus eu, tristique nulla. Morbi vel consectetur nisl, sed luctus mauris. Sed pellentesque, arcu quis rhoncus lobortis, quam eros vestibulum ante, ut faucibus est nisi ac erat. Donec feugiat, ex vel auctor venenatis, ante diam suscipit magna, sit amet pellentesque tortor metus sollicitudin magna. Integer tempor elementum ex, placerat hendrerit urna commodo fermentum. Nulla congue feugiat arcu, ut mattis ex lobortis eget. Nullam ut sem sit amet est iaculis sagittis quis et ante. Phasellus fringilla ultricies vulputate. Morbi nec sem ligula. Sed porttitor, mauris a pulvinar malesuada, velit arcu tincidunt nunc, rutrum finibus velit sem ut ligula. Proin dictum, lorem eu elementum congue, sapien turpis convallis odio, in viverra neque augue eu magna.\r\n\r\n', '018000000', 'ss@ee.co', 'url', 'url', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `reg_fee` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_number` varchar(255) NOT NULL,
  `deadline` timestamp NULL DEFAULT NULL,
  `type` enum('individual','team') NOT NULL DEFAULT 'individual',
  `max_member` int(11) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `image`, `title`, `content`, `date`, `location`, `start_time`, `end_time`, `reg_fee`, `payment_method`, `payment_number`, `deadline`, `type`, `max_member`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '1.jpg', 'Intra University Programming Contest', 'Intra University Programming Contest is going to be held on August 28, 2019. Contest will take place in two groups, Junior (1st- 4th semester) and Senior (5th – 8th semester).\r\nA selection test may take place if requires.\r\n\r\nCONTEST TYPE: Individual\r\nCONTEST DATE: August 28, 2019\r\nREG. DEADLINE: August 24, 2019\r\nREG. FEE: 100 taka\r\n\r\nREGISTRATION PROCESS:\r\n1. Pay the event fee via bKash .keep your transaction ID, sender number.\r\n2. Fillup the registration link : http://bit.ly/CSE_FEST_Programming_Contest\r\n\r\nBkash payment numbers(all personal numbers/use Send money option):\r\n01829-447355\r\n01521-527954 \r\n01611-810071\r\n\r\nFor any query Contact with: Akib (01521-527954)\r\n\r\n', '2019-08-27 18:00:00', 'IIUC Campus, Kumira', '10:00 am', '2:00 pm', '300 BDT', 'Bkash', '018800000', '2019-08-24 18:00:00', 'individual', 1, 'admin', '2019-08-17 02:33:00', '2019-08-16 18:00:00'),
(2, '2.jpg', 'Web Development Competition', 'Department of Computer Science & Engineering of IIUC is going to arrange a Web Development Competition as part of CSE Fest 2019. Students of IIUC are invited to participate in this competition. Participants may form groups. Number of members in a group should not exceed three (3). Participants will require demonstrating their Website and poster presentation in respective stalls. Necessary documentation should be submitted.\r\n\r\n• RULES: \r\n1. Every team should develop a website on community management (For example: IIUC Computer Club.\r\n2. There are some feature requirements. Requirements should be fulfilled\r\n3. Need to present full project based on web or desktop in front of judges. \r\n4. Each team should bring their own laptops and accessories on the event day.\r\n5. You need to display the features of your website using a printed poster (PVC/art paper)\r\n\r\n• FEATURE REQUIREMENTS (Every team must include these features in their website):\r\nNotices/News || Executive Body details || Contact details of Faculty members, lab assistance & office stuff, executives || Achievements || Club Events Activities (Past) || Photo Gallary/Archive (Event wise) || Previous GS/AGS profile\r\n\r\n• CONTEST TYPE: Team; maximum 3 members per team.\r\n• REG. DEADLINE: 24-08-2019\r\n• CONTEST DATE: TBA\r\n• REG. FEE: 300 taka/per team\r\n\r\n• REGISTRATION PROCESS:\r\n1. Pay the event fee via:\r\n>Cash: Pay the Cash & Collect your TOKEN NUMBER by submitting your ID, NAME, Dept., Semester & EVENT FEE to:\r\n*For Male: Shafique Uddin Haider, PLAB-1, Administrative Building-4/AB4.\r\n*For Female: Farhana Yeasmin, Lab-3/Room 402, Female Science Academic Buiiding. \r\nor\r\n>bKash: Pay the EVENT FEE(310/-) to these numbers(all personal numbers/use Send money option): \r\n01521-527954, 01829-447355 or 01611-810071. Use referance : CSEFestWD\r\nKeep the transection ID & Sender Number.\r\n\r\n2. Fillup The registration form: bit.ly/CSEFest2019_WebDevelopment\r\n\r\n• For any query Contact with: Kafil Uddin Tasin', '2019-08-26 18:00:00', 'IIUC Campus, Kumira', '10:00 am', '2:00 pm', '500 BDT', 'Bkash', '018000000000', '2019-08-27 18:00:00', 'team', 3, 'admin', '2019-08-17 17:00:00', NULL),
(3, '3.jpg', 'Intra Department Football Tournament', 'The postponded Football Tournament will start from 24th August! ⚽️⚽️⚽️\r\n\r\n• Team Submission Deadline: 19th August\r\n• Draw: 20 or 21st August\r\n• Fee: 600 taka per team.\r\n\r\n• Form: bit.ly/CSEFest2019_FootballForm\r\n\r\n• Submit The Form to :\r\nAhsanul Kalam Akib (01839231133)\r\nOr, Reazul Karim (01777169996)\r\n\r\n• GLIMPSE OF RULES AND REGULATIONS: \r\n> Only ONE TEAM will be allowed from each semester.\r\n> It will be a knock-out tournament.\r\n> Students must play in his respective semester’s team; no students will be allowed in more than one team. Student ID will be verified in this regard.\r\n> Team details: 15 players per team (9 on-fields, 4 extras and 2 reserve players).\r\n> Time: Full match: 50 min || Half Time: 25 min || Break: 10 min.\r\n> Each team must have their own colored jersey/clothes.\r\n> All matches will be played using standard laws of Football (except Offside and Substitution).\r\n> In case of substitution, rolling substitution is allowed.\r\n> Decisions made in all matters by the referees on the field of play shall be final.\r\n> The tournament committee reserves the right to amend these guidelines at any time if it considers such action for the best interests of the competition, and all teams must follow that.', '2019-08-28 18:00:00', 'IIUC Campus, Kumira', '10:00 am', '2:00 pm', '500 BDT', 'Bkash', '018000000000', '2019-08-24 18:00:00', 'team', 3, 'admin', '2019-08-17 17:00:00', NULL),
(4, '3.jpg', 'INDOOR GAMES COMPETITION', '<p>CSE FEST INDOOR GAMES COMPETITION registration is now open for all departments! &bull; PUBG Mobile (Only for male &amp; No emulator) &gt; Competition type: Squad (Per team 4 members) &gt; Map: Erangle Classic &gt; A player can play only with one team. &gt; Squad can add One additional player in case of changing any team member later and have to pay 100tk extra as penalty for that (But remember a player can be with one team only) &gt; In case of slow wifi internet speed players have to come with their own personal mobile data connection. &gt; Reg fee : 200/- &bull; NFS Most Wanted (For male-female both) &gt; Competition type: Individual &gt; Laps: 3 &gt; Reg, Fee: 100/- &bull; Chess (For male-female both) &gt; Competition type: Individual &gt; Reg, Fee: 50/- &bull; Rubik&#39;s Cube (For male-female both) &gt; Competition type: Individual &gt; Reg, Fee: 30/- &bull; REG. DEADLINE: 24-08-2019 &bull; CONTEST DATE: TBA &bull; REGISTRATION PROCESS: 1. Pay the event fee via: &gt; Cash: Collect your TOKEN NUMBER by submitting your ID, NAME, Dept., Semester &amp; EVENT FEE to: *For Male: Md. Jahirul Islam, CN Lab, 1st floor, Administrative Building-4/AB4. *For Female: Farhana Yeasmin, Lab-3/Room 402, Female Science Academic Buiiding. or &gt; bKash(except for Rubik&#39;s Cube): Pay the EVENT FEE to these numbers(all personal numbers/use Send money option): 01611-810071, 01829-447355 or 01521-527954. Use referance : CSEFestPUBG for PUBG, CSEFestNFS for NFS, CSEFestChess for Chess. Keep the transection ID &amp; Sender Number. 2. Fillup the registration form: bit.ly/CSEFest2019_IndoorGames &bull; For any query Contact with: AKM Yasar (01854318433) &amp; Female can contact with Murshida Akther Visit http://computerclub.iiuc.ac.bd/CSEFest2019 for more Rules and Details [Note: CSE FEST Indoor Gaming Committee can take changes in the rules and can take action as well if requires.]</p>', '2019-08-28 17:03:06', 'IIUC Campus, Kumira', '10:00 am', '2:00 pm', '500 BDT', 'Bkash', '018000000000', '2019-08-25 17:59:00', 'team', 3, 'admin', '2019-08-18 17:00:00', '2019-08-26 17:03:06'),
(5, '3.jpg', 'Idea Generation', 'Introducing \"Idea Generation\" as a part of CSE FEST 2019, which is going to be held on 28th August.\r\nIf you are innovative and enthusiastic to express your idea in a big platform then this is for you.\r\n\r\n• CONTEST TYPE: Team; minimum 2, maaximum 3 members per team.\r\n\r\n• REG. DEADLINE: 20-08-2019\r\n• PRSENTATION SUBMISSION DEADLINE: 21-08-2019\r\n• SELECTION: 25-08-2019 (if needed)\r\n• CONTEST DATE: TBA\r\n\r\n• REG. FEE: 100 taka\r\n\r\n• REGISTRATION PROCESS:\r\n1. Pay the event fee via:\r\n>Cash Collect your TOKEN NUMBER by submitting your ID, NAME, Dept., Semester & EVENT FEE to:\r\n*For Male: Shafique Uddin Haider, PLAB-1, Administrative Building-4/AB4.\r\n*For Female: Farhana Yeasmin, Lab-3/Room 402, Female Science Academic Buiiding. \r\nor\r\n>bKash: Pay the EVENT FEE(102/-) to these numbers(all personal numbers/use Send money option): \r\n01829-447355, 01521-527954 or 01611-810071.\r\nUse referance : CSEFestIG\r\nKeep the transection ID & Sender Number.\r\n\r\n2. Fillup The registration form: bit.ly/CSEFest2019_IdeaGeneration\r\n\r\n• For any query Contact with: Iaamanur Rahman', '2019-08-27 18:00:00', 'IIUC Campus, Kumira', '10:00 am', '2:00 pm', '500 BDT', 'Bkash', '018000000000', '2019-08-24 18:00:00', 'team', 3, 'admin', '2019-08-15 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frontend_data`
--

CREATE TABLE `frontend_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `og_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_2` text COLLATE utf8mb4_unicode_ci,
  `about_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faculty_members` int(11) NOT NULL,
  `achievements` int(11) NOT NULL,
  `publications` int(11) NOT NULL,
  `club_members` int(11) NOT NULL,
  `fb_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rss_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontend_data`
--

INSERT INTO `frontend_data` (`id`, `title`, `description`, `keywords`, `og_img`, `footer`, `phone`, `email`, `address`, `about_1`, `about_2`, `about_img`, `video_url`, `faculty_members`, `achievements`, `publications`, `club_members`, `fb_url`, `twitter_url`, `linkedin_url`, `rss_url`, `pinterest_url`, `google_plus_url`, `created_at`, `updated_at`) VALUES
(1, 'IIUC COMPUTER CLUB', 'The Science of today is the Technology of tomorrow', 'iiuc computer club, iiuc, computer club', '', 'The Science of today is the Technology of tomorrow', '+ 123 456 78910', 'computerclub@gmail.com', 'Kumira, Chittagong-4318, Bangladesh', 'About IIUC Computer Club', 'IIUC has a well structured computer club run by the students with active supervision of the teachers. This computer club publishes digital magazines, organize different contests like software contest, quiz contest, programming contest etc. Members of Computer Club also take part in social and humanitarian activity with high enthusiasm. One of the mammoth events that IIUC Computer Club organizes every year is an IT Festival which attracts participants from other departments of IIUC and from different universities also.', 'about.jpeg', 'http://www.youtube.com/watch?v=JvlCu0BBel4', 44, 58, 14, 888, 'http://fb.com', NULL, NULL, NULL, NULL, 'url', '2019-08-16 18:00:00', '2019-08-26 16:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `gallary_folders`
--

CREATE TABLE `gallary_folders` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallary_folders`
--

INSERT INTO `gallary_folders` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'IoT Workshop by BdOSN', '1.jpg', '2019-08-15 18:00:00', '2019-08-24 15:21:29'),
(2, 'Grace Hopper Girls Programming Camp', '11.jpg', '2019-08-18 18:00:00', '2019-08-15 18:00:00'),
(3, 'Bdapps Technical Session', '22.jpg', '2019-08-19 18:00:00', '2019-08-15 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) UNSIGNED NOT NULL,
  `folder_id` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `folder_id`, `img_url`, `created_at`, `updated_at`) VALUES
(1, 1, '1.jpg', '2019-08-16 18:00:00', NULL),
(2, 1, '2.jpg', '2019-08-16 18:00:00', NULL),
(3, 1, '3.jpg', '2019-08-16 18:00:00', NULL),
(4, 1, '4.jpg', '2019-08-16 18:00:00', NULL),
(5, 1, '5.jpg', '2019-08-16 18:00:00', NULL),
(6, 1, '6.jpg', '2019-08-16 18:00:00', NULL),
(7, 1, '7.jpg', '2019-08-16 18:00:00', NULL),
(8, 1, '8.jpg', '2019-08-16 18:00:00', NULL),
(9, 1, '10.jpg', '2019-08-16 18:00:00', NULL),
(10, 2, '11.jpg', '2019-08-16 18:00:00', NULL),
(11, 2, '12.jpg', '2019-08-16 18:00:00', NULL),
(12, 2, '13.jpg', '2019-08-16 18:00:00', NULL),
(13, 2, '14.jpg', '2019-08-16 18:00:00', NULL),
(14, 2, '15.jpg', '2019-08-16 18:00:00', NULL),
(15, 2, '16.jpg', '2019-08-16 18:00:00', NULL),
(16, 2, '17.jpg', '2019-08-16 18:00:00', NULL),
(17, 2, '18.jpg', '2019-08-16 18:00:00', NULL),
(18, 2, '19.jpg', '2019-08-16 18:00:00', NULL),
(19, 2, '20.jpg', '2019-08-16 18:00:00', NULL),
(20, 2, '21.jpg', '2019-08-16 18:00:00', NULL),
(21, 3, '22.jpg', '2019-08-16 18:00:00', NULL),
(22, 3, '23.jpg', '2019-08-16 18:00:00', NULL),
(23, 3, '24.jpg', '2019-08-16 18:00:00', NULL),
(24, 3, '25.jpg', '2019-08-16 18:00:00', NULL),
(25, 3, '26.jpg', '2019-08-16 18:00:00', NULL),
(26, 3, '27.jpg', '2019-08-16 18:00:00', NULL),
(27, 3, '28.jpg', '2019-08-16 18:00:00', NULL),
(28, 3, '29.jpg', '2019-08-16 18:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `individual_members`
--

CREATE TABLE `individual_members` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `tshirt_size` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `reg_confirm` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `individual_members`
--

INSERT INTO `individual_members` (`id`, `event_id`, `name`, `email`, `phone`, `gender`, `institute`, `department`, `semester`, `student_id`, `tshirt_size`, `transaction_id`, `sender`, `reg_confirm`, `created_at`, `updated_at`) VALUES
(4, 1, 'sk Labib', 'rabi@iname.com', '17549580650', 'male', 'iiuc', 'cse', '6TH', 'C163088', NULL, '6v86876v876687', '0980809', 1, '2019-08-23 20:10:23', '2019-08-23 20:10:34'),
(5, NULL, 'sk Labib', 'rabi@iname.com', '17549580650', 'male', 'iiuc', 'cse', '4TH', 'c171211', NULL, '6v86876v876687', '0980809', 0, '2019-08-24 10:27:32', '2019-08-24 10:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(1) NOT NULL DEFAULT '1',
  `driver` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host` varchar(260) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` varchar(260) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_address` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(260) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encryption` varchar(260) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(260) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `driver`, `host`, `port`, `from_address`, `from_name`, `encryption`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'smtp.gmail.com', '587', 'test@mail.com', 'Dept. of CSE, IIUC', 'tls', '', '', NULL, '2019-05-23 12:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `type` enum('faculty_members','lab_assistance','office_stuff') NOT NULL DEFAULT 'faculty_members',
  `position` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fb_url` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `type`, `position`, `name`, `image`, `content`, `phone`, `email`, `fb_url`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'faculty_members', 'Associate Professor and Chairman', 'Mr. Tanveer Ahsan', '1.jpg', NULL, '018888', 'sss@hhh.co', 'url', 'null', 1, '', NULL, '2019-08-24 11:50:54'),
(2, 'faculty_members', 'Professor & Coordinator, MCSE Program', 'Mr. Mohammed Shamsul Alam', '2.jpg', NULL, '018888', 'sss@hhh.co', 'url', 'null', 1, '', NULL, NULL),
(3, 'faculty_members', 'Associate Professor', 'Dr. Abdul Kadar Muhammad Masum', '3.jpg', '<p><s><strong>Eimply </strong></s><em><s><strong>dummy</strong></s> </em>text of the printing and typesetting industry. Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text type and scrambled it to make a type specimen book. Eimply dummy text of the printing and typesetting industry. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text type and scrambled it to make a type specimen book.</p>', '01888888888', 'moh4mmadsakib@gmail.com', 'url', '$2y$10$KcdJgDw8ejCoW31w8B7aSu/9UZi5fmmj9rAFg9unh2yiJdWue8oqG', 1, '2zxw04qD7BAcFvEfsiu5JQWhJD8RLsnvfQSdgLfWZlQOSU00aHhw7wt05wIU', NULL, '2019-08-24 11:28:24'),
(9, 'office_stuff', 'Senior Director', 'sk Labib', '1Brx8lblsE.jpeg', NULL, '1754958065', 'rabi@iname.com', NULL, NULL, 0, NULL, '2019-08-24 11:55:17', '2019-08-24 11:55:17'),
(4, 'faculty_members', 'Associate Professor', 'Mr. Mohammad Mahadi Hassan', '4.jpg', NULL, '018888', 'sss@hhh.co', 'url', 'null', 1, '', NULL, NULL),
(5, 'lab_assistance', 'Senior Lab Technician', 'Md. Shahin Miah', NULL, NULL, '018888', 'sss@hhh.co', NULL, NULL, 0, '', NULL, '2019-08-24 11:50:42'),
(6, 'lab_assistance', 'Senior Lab Technician', 'Md. Nezam Uddin', NULL, NULL, '01817526961', 'sss@hhh.co', NULL, NULL, 0, '', NULL, NULL),
(7, 'office_stuff', 'Senior Assistant Director', 'Md. Jamal Uddin', NULL, NULL, '01768674457', 'mjamalpatiya@gmail.com', NULL, NULL, 0, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `type` varchar(20) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `type`, `image`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'IoT Workshop by BdOSN', '২৪ শে জুলাই ২০১৯, রোজ বুধবার বাংলাদেশ অপেন সোর্স নেটওয়ার্কস (BDOSN) কর্তৃক আয়োজিত, আই আই উ সি কম্পিউটার ক্লাব এবং আই ই ই ই স্টুডেন্ট ব্র্যাঞ্চ এর সহযোগীতায় ইন্টারনেট অফ থিংকস (IoT) কর্মশালা অনুষ্ঠিত হয়।\r\n\r\nউক্ত অনুষ্ঠানে প্রধান অতিথি হিসেবে উপস্থিত ছিলেন সাইন্স এন্ড ইঞ্জিনিয়ারিং ফ্যাকাল্টির সম্মানিত ডিন প্রফেসর ডাঃ মোঃ দেলাওয়ার হোসেন স্যার এবং কম্পিউটার সায়েন্স এন্ড ইঞ্জিনিয়ারিং বিভাগের সম্মানিত শিক্ষক প্রফেসর মোঃ শামসুল আলম স্যার।\r\n\r\nতাছাড়া বিশেষ অতিথি হিসেবে উপস্থিত ছিলেন চট্টগ্রাম শাখা বাইনারি ইমেজের সি ই ও (CEO) আরাফাত রহমান এবং কম্পিউটার সায়েন্স এন্ড ইঞ্জিনিয়ারিং বিভাগের সম্মানিত চেয়ারম্যান ও আই আই ইউ সি কম্পিউটার ক্লাব এর সভাপতি তানভীর আহসান স্যার।\r\n\r\nঅনুষ্ঠান শুরু হয় পবিত্র কুরআন থেকে তিলাওয়াতের মাধ্যমে। এরপর স্বাগত বক্তব্য নিয়ে আসেন মঞ্জুর আলম স্যার, সহকারি অধ্যাপক সি এস ই ডিপার্টমেন্ট ভাইস প্রেসিডেন্ট আই আই ইউ সি কম্পিউটার ক্লাব। তিনি তার বক্তব্যে অতিথিদের ধন্যবাদ জানান।\r\n\r\nঅনুষ্ঠানের মূল কার্যক্রম শুরু হয় অতিথিদের আই ও টি এর কার্যকারিতা শীর্ষক আলোচনার মাধ্যমে। আই ও টি সম্পর্কিত বিভিন্ন প্রজেক্টে প্রদর্শন যার মূল ভিত্তি আরডুইনো এবং রাস্পবেরি পাই। প্রজেক্টে প্রদর্শন এবং আই ও টি এর ধারণা দেওয়াই ছিল এই কর্মশালার মূল উদ্দেশ্য।\r\n\r\nঅনুষ্ঠান সঞ্চালনার দায়িত্বে ছিলেন আই ই ই ই স্টুডেন্ট ব্র্যাঞ্চ এর চেয়ারপার্সন এবং আই আই ইউ সি কম্পিউটার ক্লাবের অফিস সেক্রেটারি এস. এম. আজমাঈন\r\n\r\nউল্লেখ্য, প্রায় ৩০ জন ছাত্রের উপস্থিতিতে সি ল্যাব-২ তে উক্ত কর্মশালা টি অনুষ্ঠিত হয়।', 'news', '1.jpg', 'admin', 1, '2019-08-17 07:13:25', '2019-08-16 18:00:00'),
(2, 'Competitive Programming', '<p><strong>Very often</strong> I hear a question which I want to answer here. First of all, I may not be the right or the best person to answer this but as I was shot multiple times with the same query I&rsquo;ll be trying to make things a little easier for you. So the question is &ldquo;Brother, I am an ACM ICPC regional aspirant, what is the appropriate way to start as a complete beginner ?&rdquo; or sometimes it&rsquo;s like &ldquo;I am not being able to prosper in this Competitive Programming arena. What should I do?&rdquo; . First you should understand that, Programming and Coding are two different things. Programming is basically solving a problem using Logic and Math with the help of Data Structure and Algorithms where coding is making the computer understand how to solve the problem. . Let me begin from answering where you should start from. Anyone who came in contact with me with the context of Competitive Programming, I asked them to go through the BdMO Problem (Increasing difficulty gradually). For those who don&rsquo;t know what is BdMO, it is basically stands for Bangladesh Mathematical Olympiad. Teams that usually do comparatively good definitely has a background building with strong math bricks. If possible the IMO problems should also come into consideration. Some good books for this purpose is &ldquo;The Art and Craft of Problem Solving - Paul&rdquo;, &ldquo;104 Number Theory Problems&rdquo;, &ldquo;102 Combinatorics Problem&rdquo; and others. . Now, if you are good at math and you solve most of the problems which are mentioned above, then you are almost(!) an awesome programmer. Now, you have to make the computer understand how you want to solve a problem. This is where coding required. Simple coding that you learn in your first / second semester is enough to make complex problem solved until you have good knowledge of problem solving. . So, now you are an amateur programmer who will do great in comparison to many but you are still not among the best, as you should be selected in the regional.From now, you should be more focused on problem solving based on algorithms and Data Structure. There is no doubt that &ldquo;Introduction to Algorithms - Cormen (and 3 others) &ldquo; is more like the bible of Algorithm for beginners. You should be reading each word with a calm mind to be in the best side. This book is so fat, that used to use it as a pillow sometimes (:D). After completing this book you can look into some other books like &ldquo;Competitive Programming 3&rdquo; , &ldquo;Competitive Programmer&rsquo;s Handbook&rdquo;, &ldquo;প্রোগ্রামিং কনটেস্ট ডেটা স্ট্রাকচার ও অ্যালগরিদম&rdquo; and many more. I basically followed the blog of Shafayet. As a primary resource you should select a book. I preferred CP3, like many others in this universe. . Now, you are already a master if you focused upper mentioned steps. But sometimes there is a block which you have to come over. You have to come with a game plan to do in this arena. I followed, a technique &ldquo;A day, A problem&rdquo; solving a problem from LightOJ everyday. As most of you know that Light OJ has only 400 problems having a good difficulty level, it pushed my level up very well. .</p>\r\n\r\n<p>N.B. : The above mentioned process is completely based on my own thoughts and understanding which may or may not work for you. .</p>\r\n\r\n<p>----------------------------------------</p>\r\n\r\n<p><strong>Written by: Mohammad Sheikh Ghazanfar Programmer, Chief ERP</strong></p>', 'Programming', NULL, 'admin', 1, '2019-08-17 17:47:40', '2019-08-23 16:03:19'),
(3, 'Bdapps Technical Session', '<p><strong>৩রা জুলাই ২০১৯</strong>, রোজ বুধবার আই আই ইউ সি কম্পিউটার ক্লাব কর্তৃক আয়োজিত Bdapps Technical Session সেমিনার অনুষ্ঠিত হয়৷ অতিথিদের মধ্যে ছিলেন Bdapps এর কর্ডিনেটর একেম তৌফিকুর রহমান, Bdapps এর অপারেটর ম্যানেজার শাফাআত পারভেজ, Bdapps এর এসআর কোঅর্ডিনেটর শুভজিৎ ঘোষ। অনুষ্ঠান শুরু হয় পবিত্র কুরআন থেকে তিলাওয়াতের মাধ্যমে। এরপর স্বাগত বক্তব্য নিয়ে আসেন অ্যাসোসিয়েট প্রফেসর শহীদুল ইসলাম খান স্যার। উনি উনার স্বাগত বক্তব্যে অতিথিদের ধন্যবাদ জানান। অনুষ্ঠানের মূল কার্যক্রম শুরু হয় অতিথিদের অ্যান্ড্রয়েড অ্যাপস এর কার্যকারিতা এবং অ্যাপস তৈরি করে মানুষের কর্মসংস্থান বৃদ্ধি ও এর মান কিভাবে বাড়ানো যায় এই শীর্ষক আলোচনার মাধ্যমে। অ্যান্ড্রয়েড অ্যাপস তৈরি এর মাধ্যমে কর্মসস্থান সৃষ্টি ও তার থেকে বিজনেস গঠন করা নিয়ে বক্তব্য রাখেন Bdapps এর কর্ডিনেটর একেম তৌফিকুর রহমান। Bdapps এর কার্যকারিতা এবং অন্যান্য বিজনেস কোম্পানির সাথে সম্পর্ক গঠন ও আইটি দিয়ে কর্মসস্থানের সৃষ্টি ইত্যাদি নিয়ে বক্তব্য রাখেন Bdapps এর অপারেটর ম্যানেজার শাফাআত পারভেজ। অনুষ্ঠান সঞ্চালনার দায়িত্বে ছিলেন কম্পিউটার ক্লাবের জেনারেল সেক্রেটারি আইমানুর রহমান রাফিদ। উল্লেখ্য, প্রায় ৬০ জন ছাত্রের উপস্থিতিতে সেমিনার হল এ এই প্রোগ্রামটি অনুষ্ঠিত হয়।</p>', 'news', '3.jpg', 'admin', 1, '2019-08-17 21:19:19', '2019-08-24 16:11:43'),
(4, 'Programming Contest : Spring\'19', 'গতকাল (৮ই মে, ২০১৯ | বুধবার) কম্পিউটার ক্লাব আয়োজিত ইন্ট্রা ইউনিভার্সিটি প্রোগ্রামিং কন্টেস্ট স্প্রিং-২০১৯ অনুষ্ঠিত হয় । প্রতিযোগিতায় ৫১ জন প্রতিযোগী অংশগ্রহণ করেছিল।\r\n\r\nসিনিয়র কন্টেস্টেন্টদের মধ্যে বিজয়ী হয়েছেন সাদ মাহমুদ, প্রথম রানার্সআপ হয়েছেন নাইম মাহমুদ, দ্বিতীয় রানার্সআপ হয়েছেন মোহাম্মদ মিনহাজুল ইসলাম ।\r\nজুনিয়র কন্টেস্টেন্টদের মধ্যে বিজয়ী হয়েছেন নাঈমুল হক, প্রথম রানার্সআপ হয়েছেন ঈশান এবং দ্বিতীয় রানার্সআপ হয়েছেন সাজিদ চৌধুরী।\r\n\r\nপুরস্কার বিতরণী অনুষ্ঠানে উপস্থিত ছিলেন প্রফেসর শামসুল আলম স্যার ও লেকচারার জামিল বিন আসাদ স্যার। জামিল স্যার তার স্বাগত বক্তব্যে প্রোগ্রামিং কন্টেস্টে ছাত্রদের সফলতার কথা তুলে ধরেন। এরপর প্রফেসর শামসুল আলম স্যার বিজয়ীদের মাঝে পুরস্কার তুলে দেন এবং ছাত্রদের প্রোগ্রামিংয়ে বিভিন্ন সফলতার কথা তুলে ধরেন এবং প্রবলেম সলভিং এর ব্যাপারে সিনিয়রদের জুনিয়রদের প্রতি যত্ন দেওয়ার ব্যাপারে উপদেশ দেন।\r\n\r\nএছাড়াও পুরস্কার বিতরণী অনুষ্ঠানে উপস্থিত ছিলেন, সিএসই ডিপার্টমেন্টের সফল প্রোগ্রামার মোহাম্মদ শেখ গাজানফার। তিনি কনটেস্ট প্রব্লেম সেট নিয়ে আলোচনা করেন।\r\n\r\n', 'news', '4.jpg', 'admin', 1, '2019-08-14 12:00:59', '2019-08-23 14:50:33'),
(5, 'Urgent Notice', 'বিশ্ববিদ্যালয়ের একাডেমিক সকল কার্যক্রমের পাশাপাশি বিশ্ববিদ্যালয়ের বাস সেবাও বন্ধ থাকায় আগামীকালের সেমিনারটি হবে না। পরবর্তী সময় জানিয়ে দেওয়া হবে।', 'notice', NULL, 'admin', 1, '2019-08-15 18:00:00', '2019-08-16 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`student_id`, `email`, `token`, `status`, `created_at`) VALUES
('admin@admin.com', 'admin@admin.com', 'tJzsd1ut7qoMwyY6MSFjvYKWdh3mBi', 1, '2019-08-22 09:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `secret` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `secret`, `filename`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '565v564f5646s5d465456g6', 'demo.txt', 'C++ Tutorial', 'admin', '2019-08-20 18:00:00', NULL),
(2, '565v564f5646s587y878687', 'demo2.txt', 'Algorithm resource', 'admin', '2019-08-20 04:10:00', NULL),
(3, '565v564f5646s587y8787687', 'demo.txt', 'Data structure', 'admin', '2019-08-19 04:10:00', NULL),
(4, '565v564f5646s587y8876875v7576576', 'software.zip', 'Software engineering files', 'admin', '2019-08-20 15:38:00', NULL),
(5, '565v564f553456s587y8876875v7576576', 'System.zip', 'System analysis files', 'admin', '2019-08-22 15:38:00', NULL),
(6, 'IfIXXVxq3repriiphr1Omax6NyiA3zxu', 'Class Schedule Male .pdf', 'Class routine male', 'Dr. Abdul Kadar Muhammad Masum', '2019-08-22 09:35:55', '2019-08-22 09:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `resource_settings`
--

CREATE TABLE `resource_settings` (
  `allowed_file` varchar(255) NOT NULL,
  `max_size` varchar(255) NOT NULL,
  `secure_folder` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resource_settings`
--

INSERT INTO `resource_settings` (`allowed_file`, `max_size`, `secure_folder`, `created_at`, `updated_at`) VALUES
('zip,txt,pdf,doc,docx', '1024', 'test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A SEMINAR ON ‘HIGHER EDUCATION’', 'IIUC Computer Club organized another event on Higher Education Guideline Program with the guidance of the two Ex- IIUCian\'s', '1-1.jpg', 1, NULL, '2019-08-26 15:11:52'),
(2, 'WORKSHOP ON RUBY ON RAILS', 'Pro-VC of IIUC delivering his speech on WORKSHOP ON RUBY ON RAILS event', '1-2.jpg', 1, NULL, NULL),
(3, 'Seminar on \'Telepresence Robotics', 'On 18th May, a seminar titled “Telepresence Robotics: An Emerging Internet of Things (IoT) based Robotics Technology” was held at IIUC, organized by IIUC Computer Club', '1-3.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` varchar(12) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `academic_year` varchar(45) NOT NULL,
  `email_verify` int(1) NOT NULL DEFAULT '0',
  `admin_verify` int(1) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `verify_secret` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `image`, `gender`, `email`, `phone`, `password`, `academic_year`, `email_verify`, `admin_verify`, `active`, `verify_secret`, `remember_token`, `created_at`, `updated_at`) VALUES
('11122234', 'Touhid', NULL, 'male', 'xevidod@smart-mail.top', '17549580650', '$2y$10$FgDQcpHb9OFsewVw6bm6K.cWsmqCVgoa64fFdRQo.U2nSgTKF.gx2', 'Autumn 2016', 1, 1, 1, 1, NULL, NULL, '2019-08-26 14:07:58', '2019-08-26 14:23:27'),
('11122233', 'Sakib', 'BPJ9s0z2JF.jpeg', 'male', 'moh4mmadsakib@gmail.com', '01888888888', '$2y$10$8ItTCmbyp4/MjN1Sm8UZ1erAT3ivfutQHnbeWX8tiG0Mndtg3n.eO', 'Autumn 2016', 1, 1, 1, 1, NULL, 'Q1IAgckerES8uh5t9VgNqDG0vz1oeqkNUvcz0BW4BDHk1om5qPfPv1LDXP1I', '2019-08-21 15:07:31', '2019-08-26 14:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `team_info`
--

CREATE TABLE `team_info` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_gender` varchar(255) NOT NULL,
  `team_email` varchar(255) NOT NULL,
  `total_team_member` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `reg_confirm` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team_info`
--

INSERT INTO `team_info` (`id`, `event_id`, `team_name`, `team_gender`, `team_email`, `total_team_member`, `transaction_id`, `sender`, `reg_confirm`, `created_at`, `updated_at`) VALUES
(2, 2, 'xyz', 'male', 'sk@dd.com', 2, '6v86876v876687', '0980809', 1, '2019-08-23 20:15:52', '2019-08-23 20:16:05'),
(3, 2, 'Ralph George', 'male', 'rabi@iname.com', 3, '6v86876v876687', '0980809', 1, '2019-08-23 21:20:52', '2019-08-23 21:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tshirt_size` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `team_id`, `name`, `email`, `phone`, `student_id`, `institute`, `department`, `semester`, `tshirt_size`, `created_at`, `updated_at`) VALUES
(2, 2, 'sk Labib', 'sk@dd.com', '01754958065', 'C3231', 'iiuc', 'cse', '6th', 'XL', '2019-08-23 20:15:52', '2019-08-23 20:15:52'),
(3, 2, 'Sk mahmud', 'sk@dd.com', '00000188812', 'C121212', 'iiuc', 'cse', '6th', 'M', '2019-08-23 20:15:52', '2019-08-23 20:15:52'),
(4, 3, 'Sk mahmud', 'sk@dd.com', '01888888888', 'C3231', 'iiuc', 'cse', '2nd', 'M', '2019-08-23 21:20:52', '2019-08-23 21:20:52'),
(5, 3, 'Sk mahmud', 'rabiul@iname.com', '01888888888', 'C121212', 'iiuc', 'cse', '5th', 'S', '2019-08-23 21:20:52', '2019-08-23 21:20:52'),
(6, 3, 'akbar hossain', 'khill.meeh@gmail.com', '01754958065', 'C124342', 'iiuc', 'cse', '6th', NULL, '2019-08-23 21:20:52', '2019-08-23 21:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `comment` tinytext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `image`, `position`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Rosy Janner', '4.jpg', 'UI Designer', 'Pellentesque tellus arcu, laoreet volutpavenenatis molestPellentesque commodo lorem lectus pretium vehicula.', NULL, NULL),
(2, 'Dainel Dina', '4.jpg', 'Manager', 'Pellentesque tellus arcu, laoreet volutpavenenatis molestPellentesque commodo lorem lectus pretium vehicula.', NULL, NULL),
(3, 'John doe', '15.jpg', 'Software engineer', 'Pellentesque tellus arcu, laoreet volutpavenenatis molestPellentesque commodo lorem lectus pretium vehicula.', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee_members`
--
ALTER TABLE `committee_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontend_data`
--
ALTER TABLE `frontend_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallary_folders`
--
ALTER TABLE `gallary_folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual_members`
--
ALTER TABLE `individual_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `team_info`
--
ALTER TABLE `team_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `committee_members`
--
ALTER TABLE `committee_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallary_folders`
--
ALTER TABLE `gallary_folders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `individual_members`
--
ALTER TABLE `individual_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team_info`
--
ALTER TABLE `team_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
