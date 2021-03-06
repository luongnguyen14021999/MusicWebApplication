-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 20, 2020 at 11:15 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `247Music`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `album_id` int(11) NOT NULL COMMENT 'Filename of thumbnail image for the artist',
  `album_name` varchar(200) NOT NULL COMMENT 'Album name',
  `album_date` year(4) DEFAULT NULL COMMENT 'Year of release of album',
  `thumbnail` varchar(200) DEFAULT NULL COMMENT 'Filename of thumbnail image for the album',
  `artist_id` int(11) NOT NULL COMMENT 'unique artist identification number'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `album_name`, `album_date`, `thumbnail`, `artist_id`) VALUES
(1, 'East', 1980, 'ALB-THMB-East.jpg', 1),
(2, 'Killers	', 1981, 'ALB-THMB-Killers.jpg', 3),
(3, 'Bird Noises	', 1980, 'ALB-THMB-BirdNoises.jpg', 2),
(4, 'Kiss Me Once', 2014, 'ALB-THMB-KissMeOnce.jpg', 4),
(5, 'Circus Animals', 1982, 'ALB-THMB-CircusAnimals.jpg', 1),
(6, 'Breakfast At Sweethearts', 1979, 'ALB-THMB-BreakfastAtSweethearts.jpg', 1),
(7, 'Breakfast in America', 1979, 'ALB-THMB-BreakfastInAmerica.jpg', 5),
(8, 'Kick', 1987, 'ALB-THMB-Kick.jpg', 6),
(9, 'El Camino', 2011, 'ALB-THMB-ElCamino.jpg', 7),
(10, 'Night Visions	', 2012, 'ALB-THMB-NightVisions.jpg', 8),
(11, 'Switch', 2005, 'ALB-THMB-Switch.jpg', 6),
(12, 'Diesel And Dust', 1987, 'ALB-THMB-DieselAndDust.jpg', 2),
(13, 'AM', 2013, 'ALB-THMB-AM.jpg', 10),
(14, 'Metallica Through The Never', 2013, 'ALB-THMB-Never.jpg', 9),
(15, 'Evolve', 2017, 'ALB-THMB-Evolve.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_id` int(11) NOT NULL COMMENT 'This is an auto incrementing number to uniquely identify a table row. It is the unique artist identification number',
  `artist_name` varchar(200) NOT NULL COMMENT 'Recording artist name',
  `thumbnail` varchar(200) DEFAULT NULL COMMENT 'Filename of thumbnail image for the artist'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`, `thumbnail`) VALUES
(1, 'Cold Chisel', 'ColdChisel.jpg'),
(2, 'Midnight Oil	', 'MidnightOil.jpg'),
(3, 'Iron Maiden', 'IronMaiden.jpg'),
(4, 'Kylie Minogue', 'KylieMinogue.jpg'),
(5, 'Supertramp', 'Supertramp.jpg'),
(6, 'INXS	', 'INXS.jpg'),
(7, 'The Black Keys	', 'BlackKeys.jpg'),
(8, 'Imagine Dragons', 'ImagineDragons.jpg'),
(9, 'Metallica', 'Metallica.jpg'),
(10, 'Arctic Monkeys\r\n', 'ArcticMonkeys.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `memberplaylist`
--

CREATE TABLE `memberplaylist` (
  `playlist_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `playlist_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `memberplaylist`
--

INSERT INTO `memberplaylist` (`playlist_id`, `member_id`, `playlist_name`) VALUES
(1, 2, 'Liked'),
(2, 2, 'Chisel'),
(3, 6, 'Random'),
(4, 3, 'Liked'),
(5, 2, 'we'),
(6, 2, 'bcvbc'),
(7, 2, 'yuio'),
(8, 2, 'ou'),
(9, 2, 'fggfhgf'),
(10, 2, 'enter'),
(11, 2, 'were'),
(12, 2, 'erytrttrytry'),
(13, 2, 'fegeerrereeger'),
(14, 2, 'ffwwwwef'),
(15, 2, ',.,./,'),
(16, 2, '.,.,.,.'),
(17, 2, '././../.'),
(18, 2, ',.,/,/,/'),
(19, 2, ',././/.,/.,/.,'),
(20, 2, ',.,/,././.,/.,/.,/,./.,...///'),
(21, 2, '@#$#@##'),
(22, 2, '@#@$$#'),
(23, 2, '%%%'),
(24, 2, '%%%%%%'),
(25, 2, '*****'),
(26, 2, '(((((('),
(27, 2, '((('),
(28, 2, '))'),
(29, 2, '++++'),
(30, 2, '^^'),
(31, 2, 'ever'),
(32, 2, 'ddfdf     4545 ^'),
(33, 2, 'dgdf.   '),
(34, 2, 'dfgd.   '),
(35, 2, 'dads'),
(36, 2, '12'),
(37, 2, 'fdfr'),
(38, 2, 'vxfg     '),
(39, 2, 'fsdf4343'),
(40, 1, 'night');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `member_id` int(11) NOT NULL COMMENT 'This is an auto incrementing number to uniquely identify a table row. It is the unique member id',
  `username` varchar(100) NOT NULL COMMENT 'member username. This is used by the member to login to the web application',
  `surname` varchar(50) NOT NULL COMMENT 'member surname',
  `firstname` varchar(50) NOT NULL COMMENT 'member first name',
  `password` varchar(300) NOT NULL COMMENT 'member password. This is used for authentication in combination with the username. The value stored in this field is encrypted using the sha256 algorithm',
  `category` varchar(10) NOT NULL COMMENT 'The type of membership held by the member. Possible values are Free, Premium, Family                                  '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`member_id`, `username`, `surname`, `firstname`, `password`, `category`) VALUES
(1, 'alan@me.com', 'Quay', 'Alan', '97c374a731b234cec048378a2087cae0eb6ee02fd789cc881236c99ede29e1c5', 'Free'),
(2, 'paigeTurner', 'Turner', 'Paige', '3b096ab7467aff69376a26ea851efd6a72cb383577f760608812b7fce8b5ad81', 'Premium'),
(3, 'deeZaster', 'Zaster', 'Dee', '1197a20df1b4c87b10c868648eba70eac619e18ab6a6772e32bc9c701c315e41', 'Free'),
(4, 'justin@hotmail.com', 'Case', 'Justin', '8373a26be72b5d6f98d953f64d342070b131bc4959c84ab95f50fe9bb40b6230', 'Premium'),
(5, 'Bill@icloud.com', 'Ding', 'Bill', 'd19949c3d422029d06515a1be8b6ebca9733ca3dfbe1e30fc7253ae638d8139d', 'Family'),
(6, 'LouStooth	', 'Stooth', 'Lou', '2e9833ef9c49e78e6777f13a427a5eae856846555d140b398e2dedc46ec6a1ad', 'Premium'),
(7, 'NeilDowne', 'Downe	', 'Neil', '60f1467b9e92a0c58e1c6b116df520a61b6e3875b13c048a48194daf8348e103', 'Family');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL COMMENT 'This is an auto incrementing number to uniquely identify a table row. You do not insert this number into the database it is determined automatically.',
  `playlist_id` int(11) NOT NULL COMMENT 'unique playlist identification number.',
  `track_id` int(11) NOT NULL COMMENT 'unique song identification number.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `playlist_id`, `track_id`) VALUES
(1, 1, 1),
(2, 1, 10),
(3, 1, 20),
(4, 1, 30),
(5, 1, 35),
(6, 1, 36),
(7, 1, 87),
(8, 1, 21),
(9, 1, 54),
(10, 1, 78),
(11, 2, 3),
(12, 2, 4),
(13, 2, 5),
(14, 2, 6),
(15, 2, 7),
(16, 2, 8),
(17, 2, 41),
(18, 2, 46),
(19, 2, 49),
(20, 2, 50),
(21, 2, 53),
(22, 2, 43),
(23, 2, 44),
(24, 3, 79),
(25, 3, 80),
(26, 3, 81),
(27, 3, 82),
(28, 3, 83),
(29, 3, 57),
(30, 3, 58),
(31, 3, 59),
(32, 3, 60),
(33, 3, 61),
(34, 3, 8),
(35, 3, 9),
(36, 3, 10),
(37, 3, 11),
(38, 3, 12),
(39, 3, 13),
(40, 3, 14),
(41, 3, 15),
(42, 3, 16),
(43, 3, 1),
(44, 4, 18),
(44, 4, 34),
(45, 4, 34),
(46, 4, 42),
(47, 22, 7),
(48, 5, 3),
(49, 5, 2),
(50, 11, 9),
(51, 5, 3),
(52, 5, 2),
(53, 6, 21),
(54, 5, 2),
(55, 5, 4),
(56, 19, 3),
(57, 21, 10),
(58, 9, 1),
(59, 23, 3),
(60, 23, 3),
(61, 27, 7),
(62, 28, 1),
(63, 28, 12),
(64, 5, 12),
(65, 6, 19),
(66, 7, 24),
(67, 2, 24),
(68, 7, 12),
(69, 8, 12),
(70, 5, 17),
(71, 40, 2);

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `track_id` int(11) NOT NULL COMMENT ' This is an auto incrementing number to uniquely identify a table row. It is the unique song identification number.',
  `track_title` varchar(200) NOT NULL COMMENT 'Song title',
  `artist_id` int(11) NOT NULL COMMENT 'Recording artist id',
  `track_length` varchar(6) DEFAULT NULL COMMENT 'Playing length of the song in minutes and seconds (eg, 2:52)',
  `spotify_track` varchar(40) DEFAULT NULL COMMENT 'Track identifier on Spotify (for play a short preview clip)',
  `album_id` int(11) NOT NULL COMMENT 'unique album identification number'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`track_id`, `track_title`, `artist_id`, `track_length`, `spotify_track`, `album_id`) VALUES
(1, 'Standing on the Outside', 1, '2:53', '7G5eBJbcCGu6XMBcjRvqK9', 1),
(2, 'Never Before', 1, '4:08', '4XR7S3AfmcO4Y7rCkK34hT', 1),
(3, 'Choirgirl', 1, '3:13', '7hGneIA9WUVndTqf1klrdU', 1),
(4, 'Rising Sun', 1, '3:27', 'RUHZGHb1dLmNn4qGceSAH', 1),
(5, 'My Baby', 1, '4:02', '5rggyTXQCWMeAib7JkPEYS	', 1),
(6, 'Tomorrow', 1, '3:35', '06TDPajRIOGlIgBANdwesk', 1),
(7, 'Cheap Wine', 1, '3:25', '3EkEomllpfXPPIGVFvZcEq', 1),
(8, 'Best Kept Lies', 1, '3:47', '5oSiiw244FDl8gKKgbt9mk', 1),
(9, 'Ita', 1, '3:33', '5polLaP7tpqUGaUOo3mb6q', 1),
(10, 'Star Hotel', 1, '4:09', '0LrVriRx1MQYBPcOPoBfVO', 1),
(11, 'Four Walls', 1, '2:23', '6O984dPcYFnGhnIGCBwlkf', 1),
(12, 'My Turn to Cry', 1, '3:19', '4xPB6YFrZ2Ujrta0t4K6O5', 1),
(13, 'No Time For Games', 2, '4:32', '1OJ3GW40q5pJ77EL0mPjpT	', 3),
(14, 'Knife\'s Edge', 2, '3:33', '0yUPBaAIRdrmFU657Q9s7c', 3),
(15, 'Wedding Cake Island', 2, '3:11', '5g9F1F1NP2jnqJqPKP5N1A', 3),
(16, 'I\'m the Cure', 2, '3:49', '5rOwHAkpTT8diTB5UPO83d', 3),
(17, 'The Ides of March', 3, '1:45', '1bsko7BvWDVWiew5h468v7', 2),
(18, 'Wrathchild', 3, '2:55', '1SpuDZ7y1W4vaCzHeLvsf7', 2),
(19, 'Murders in the Rue Morgue', 3, '4:19', '71kapcyWLxdv7kQpM6jFTv', 2),
(20, 'Another Life', 3, '3:24', '4sv1NiU2MRlQCUyFKdbF3K', 2),
(21, 'Genghis Khan', 3, '3:08', '1UCZ9zeRaGYyZwF6cM3Brj', 2),
(22, 'Innocent Exile', 3, '3:53', '39uocZ5W2VV74lciqMR4lg', 2),
(23, 'Killers', 3, '5:02', '2Ydpa6xB4kD8WRXHYN6T1G', 2),
(24, 'Prodigal Son', 3, '6:13', '67jyLOxan1EkuAqMRgb3Uc', 2),
(25, 'Purgatory', 3, '3:21', '50W4g2UgayD7s3ixmEVQen', 2),
(26, 'Drifter', 3, '4:49', '6UdF7hJaqkv1lO8ocNf5Nv', 2),
(27, 'Into the Blue', 4, '4:09', '6StGvk4s7flUcgDTOJ6L6Z', 4),
(28, 'Million Miles', 4, '3:29', '2UPHpy3ns1lJVs23dUckgg', 4),
(29, 'I was Gonna Cancel', 4, '3:33', '0Y3x5oXUB9olJH6mE3Ctl0	', 4),
(30, 'Sexy Love', 4, '3:32', '2bS8qFEEsbBht032fzVPZ5', 4),
(31, 'Feels So Good', 4, '3:38', '4ylhp2pwyUwL29GHGzA5ze', 4),
(32, 'If Only', 4, '3:22', '2f0gOeefV1u8JjvfhuhIyW', 4),
(33, 'Les Sex', 4, '3:48', '1vahFVy5WgAv2TadMpmFQL', 4),
(34, 'Kiss Me Once', 4, '3:18', '23T25uO7VwRzOmz9aTHBFl', 4),
(35, 'Beautiful', 4, '3:34', '0BJtJKpCeHcTjpbycR8CEN', 4),
(36, 'Fine', 4, '3:36', '4WgeGbhE2PF8vbca9SDbqA', 4),
(37, 'You Got Nothing I Want', 1, '3:18	', '1i3lZqk7Zvl7qsZIpFoWhr', 5),
(38, 'Bow River', 1, '4:23', '0zYKkOvUgOL8gceY8Eh1Wh', 5),
(39, 'Forever Now', 1, '4:28', '4cZ7dRrEPJoyM0m8IF3iTr', 5),
(40, 'Taipan', 1, '3:55', '14jh12pEhxMQxiTDtVmmdC', 5),
(41, 'Houndog', 1, '5:05', '5WUHO6aeO2rXfc4vbxBUqO', 5),
(42, 'Wild Colonial Boy', 1, '4:52', '0zeF39l6So1hCBIbOpgchV', 5),
(43, 'No Good For You', 1, '3:16	', '1U5tNrIwWc7IHeVyawYv58', 5),
(44, 'Numbers Fall', 1, '4:47', '5PruIX2eGAUfjsDD6wp4i5', 5),
(45, 'When the War is Over', 1, '4:26', '5Eqx81y2ETkPuZrQuYBiub', 5),
(46, 'Letter to Alan', 1, '5:45', '3t4kDzEU8iO2sLGMFh7tTj', 5),
(47, 'Conversations', 1, '4:35', '7jBCs3WyIwfXgGztwIAbFP', 6),
(48, 'Merry-Go-Round', 1, '3:44', '1IK6QCOv51tOaLz45VyOv7', 6),
(49, 'Dresden', 1, '3:59', '3SHwOGNblfssV9rmesSC0y', 6),
(50, 'Goodbye', 1, '2:51	', '5ej8axgwRwWnlMuqas4YDL', 6),
(51, 'Plaza', 1, '2:09', '6NPtt9efvbG8Tf1Oup8L5v', 6),
(52, 'Shipping Steel', 1, '3:24', '1M6xGY4IBn6xBe1o2ZkNvJ', 6),
(53, 'I\'m Gonna Roll Ya', 1, '3:29', '6ZTgQpmCvJd3R4PuSaFGrb', 6),
(54, 'Showtime', 1, '3:45', '4S59BQQp4YPa09RPITzeRA', 6),
(55, 'Breakfast at Sweethearts', 1, '4:11', '1MstT5JdBaIR9K5IGccGps', 6),
(56, 'The Door', 1, '4:20', '4LEBRyWL7vwlyFjS8tqC4F', 6),
(57, 'Gone Hollywood', 5, '5:21', '3MUBckEZ9MePQkOeiYP9JW', 7),
(58, 'The Logical Song', 5, '4:11', '7dwwHfhF2FKhnKHF5QcRkn', 7),
(59, 'Goodbye Stranger', 5, '5:51', '2xpYzsEu012EWUalfk46Dr', 7),
(60, 'Breakfast in America', 5, '2:39', '4OeAOXT5DNRUJPO6phiA0d', 7),
(61, 'Oh Darling', 5, '4:02', '7sMsd9FPAO950l1lRg2dLf', 7),
(62, 'Take the Long Way Home', 5, '5:09', '5VnZeCSiH1Dq5kzuudlluZ	', 7),
(63, 'Lord is it Mine', 5, '4:10', '1iq2EOVThbcGqSXYfH1OoA', 7),
(64, 'Just Another Nervous Wreck', 5, '4:26', '4IIpo5OLYyLZqHQTYaYzIK', 7),
(65, 'Casual Convesations', 5, '2:59', '6ocCv2agI3EA1GCG9qGOeR', 7),
(66, 'Child of Vision', 5, '7:31', '70OA31UNhLkTL0M8CXMwJi', 7),
(67, 'Guns in the Sky', 6, '2:22', '5sUmNduSaYbbgq3AHIRRYn', 8),
(68, 'New Sensation', 6, '3:40', '2xcrseImDFEf8Urommws03', 8),
(69, 'Devil Inside', 6, '5:14', '0sTnQus7pGewDC0UHSyRDS', 8),
(70, 'Need you tonight', 6, '3:01', '3h04eZTnmFLRMjZajbrp2R', 8),
(71, 'Mediate', 6, '2:36', '7CTzpL0xF96GENbC1QXy10', 8),
(72, 'The Loved One', 6, '3:36', '0viuJflpRQIo54IVCmgw1F', 8),
(73, 'Wildlife', 6, '3:10', '5iMHmkWnjLnb3YoWSUFZRh', 8),
(74, 'Never Tear us Apart', 6, '3:05', '1GjbTNFImFrjFsNdleDe78', 8),
(75, 'Mystify', 6, '3:18', '1teL5em5cNGwVS4l5f8wjg', 8),
(76, 'Kick', 6, '3:14', '2iHOrq2wH1r4w4SwcvKZWQ', 8),
(77, 'Calling all Nations', 6, '3:03', '0rLbdG1IzOVBtZpGngRtTt', 8),
(78, 'Tiny Daggers', 6, '3:33', '06valoVoMkdZfsrNsYngqE', 8),
(79, 'Lonely Boy', 7, '3:14', '5G1sTBGbZT5o4PNRc75RKI', 9),
(80, 'Dead and Gone', 7, '3:41', '3UD4sghkq8dHUwvKxln1nB', 9),
(81, 'Gold on the Ceiling', 7, '3:44', '5lN1EH25gdiqT1SFALMAq1', 9),
(82, 'Little Black Submarines', 7, '4:11', '1PXsUXSM3LF2XNSkmIldPb', 9),
(83, 'Money Maker', 7, '2:57', '1S8PKtVKvJWwOwfQpQxzWV', 9),
(84, 'Run Right Back', 7, '3:17', '5HgAZuHFAU5qLLMYuIQkgq', 9),
(85, 'Sister', 7, '3:25', '5LCuFER5mMzL0fGNpClksf', 9),
(86, 'Hell of a Season', 7, '3:45', '2ONpXycQzFmWiutUm7vpIC', 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
