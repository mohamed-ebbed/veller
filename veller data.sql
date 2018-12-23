-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 23, 2018 at 09:52 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `veller`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicable_countries`
--

DROP TABLE IF EXISTS `applicable_countries`;
CREATE TABLE IF NOT EXISTS `applicable_countries` (
  `post_id` int(11) NOT NULL,
  `country` varchar(30) NOT NULL,
  PRIMARY KEY (`post_id`,`country`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

DROP TABLE IF EXISTS `applicant`;
CREATE TABLE IF NOT EXISTS `applicant` (
  `id` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `year` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `resume` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `gender`, `year`, `day`, `month`, `resume`) VALUES
(1, 'female', 1998, 1, 2, 'https://www.linkedin.com/in/radwask/'),
(2, 'female', 1998, 1, 1, 'https://drive.google.com/'),
(3, 'male', 1998, 1, 1, 'https://drive.google.com/'),
(4, 'male', 1998, 1, 1, 'https://drive.google.com/'),
(5, 'female', 1998, 1, 3, 'https://drive.google.com/'),
(6, 'female', 1998, 2, 12, 'https://drive.google.com/'),
(7, 'female', 1998, 18, 7, 'https://drive.google.com/'),
(8, 'male', 1998, 18, 10, 'https://drive.google.com/'),
(9, 'female', 1998, 28, 4, 'https://drive.google.com/'),
(10, 'male', 1998, 1, 1, 'https://drive.google.com/'),
(11, 'female', 1998, 20, 8, 'https://drive.google.com/'),
(12, 'male', 1998, 6, 12, 'https://drive.google.com/'),
(13, 'male', 1998, 20, 9, 'https://drive.google.com/'),
(14, 'male', 1998, 1, 1, 'https://drive.google.com/'),
(15, 'male', 1999, 1, 3, 'https://drive.google.com/'),
(16, 'female', 1997, 6, 6, 'https://drive.google.com/'),
(17, 'male', 1920, 1, 1, 'https://drive.google.com/'),
(18, 'male', 1939, 1, 1, 'https://drive.google.com/'),
(19, 'male', 1920, 1, 1, 'https://drive.google.com/'),
(20, 'male', 1920, 1, 1, 'https://drive.google.com/');

-- --------------------------------------------------------

--
-- Table structure for table `apply_for`
--

DROP TABLE IF EXISTS `apply_for`;
CREATE TABLE IF NOT EXISTS `apply_for` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`post_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply_for`
--

INSERT INTO `apply_for` (`id`, `post_id`) VALUES
(1, 1),
(13, 1),
(1, 2),
(1, 3),
(13, 3),
(1, 4),
(1, 5),
(1, 6),
(13, 6),
(1, 7),
(13, 7);

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

DROP TABLE IF EXISTS `contest`;
CREATE TABLE IF NOT EXISTS `contest` (
  `post_id` int(11) NOT NULL,
  `prizes` text,
  `specialization` varchar(50) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`post_id`, `prizes`, `specialization`) VALUES
(3, '100$', 'computer science');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
CREATE TABLE IF NOT EXISTS `education` (
  `applicant_id` int(11) NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `degree` varchar(20) NOT NULL,
  `institution` varchar(20) NOT NULL,
  PRIMARY KEY (`applicant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exchange_program`
--

DROP TABLE IF EXISTS `exchange_program`;
CREATE TABLE IF NOT EXISTS `exchange_program` (
  `post_id` int(11) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exchange_program`
--

INSERT INTO `exchange_program` (`post_id`, `specialization`) VALUES
(4, 'Literature');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

DROP TABLE IF EXISTS `interests`;
CREATE TABLE IF NOT EXISTS `interests` (
  `applicant_id` int(11) NOT NULL,
  `interest` varchar(20) NOT NULL,
  PRIMARY KEY (`applicant_id`,`interest`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`applicant_id`, `interest`) VALUES
(1, 'music'),
(1, 'travelling'),
(2, 'Turkey'),
(3, 'music'),
(4, ' pubG'),
(4, 'btates'),
(5, 'make up'),
(6, ' balloons'),
(6, ' studying'),
(6, 'tv series'),
(7, ' coloring'),
(7, ' cooking'),
(7, 'drawing'),
(8, ' cars'),
(8, ' music'),
(8, ' swimming'),
(8, 'electronics'),
(9, ' drawing'),
(9, ' music'),
(9, 'writing'),
(10, ' coding'),
(10, ' movies'),
(10, 'problem solving'),
(11, 'anything'),
(12, ' android'),
(12, ' music'),
(12, 'singing'),
(13, 'kol 7aga'),
(14, ' music'),
(14, ' singing'),
(14, 'problem solving'),
(15, 'no idea'),
(16, ' PR'),
(16, 'PR'),
(17, 'eating brains'),
(18, 'drinking blood'),
(19, 'disappearing'),
(20, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `internship`
--

DROP TABLE IF EXISTS `internship`;
CREATE TABLE IF NOT EXISTS `internship` (
  `post_id` int(11) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `paid` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internship`
--

INSERT INTO `internship` (`post_id`, `specialization`, `paid`) VALUES
(1, 'Computer Science', b'1'),
(2, 'Graphics', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `sent_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sent_by` int(11) NOT NULL,
  `content` text NOT NULL,
  `recieved_by` int(11) NOT NULL,
  PRIMARY KEY (`sent_at`),
  KEY `sent_by` (`sent_by`),
  KEY `recieved_by` (`recieved_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `opportunity`
--

DROP TABLE IF EXISTS `opportunity`;
CREATE TABLE IF NOT EXISTS `opportunity` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expiration_date` date NOT NULL,
  `description` text NOT NULL,
  `country` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `duration` varchar(50) NOT NULL,
  `funded` varchar(20) NOT NULL,
  `requirements` text NOT NULL,
  `posted_by` int(11) NOT NULL,
  `type` varchar(15) NOT NULL,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `posted_by` (`posted_by`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opportunity`
--

INSERT INTO `opportunity` (`post_id`, `post_date`, `expiration_date`, `description`, `country`, `city`, `duration`, `funded`, `requirements`, `posted_by`, `type`, `title`) VALUES
(1, '2018-12-23 00:00:00', '2018-12-23', 'internship for computer engineering students and computer science students in first and second years of their major', 'USA', 'LA', '2 months', 'yes', 'Computer-related major', 21, 'internship', 'Software engineering internship'),
(2, '2018-12-23 00:00:00', '2018-12-23', 'For those interested in Graphics', 'UK', 'London', '3 months', 'yes', 'nothing, just your passion and interest', 21, 'internship', 'Graphics Internship'),
(3, '2018-12-23 00:00:00', '2018-12-23', 'problem solving contest', 'online', 'online', '3 days', 'yes', 'knowledge in one of these languages, C++, C#, Java, PHP, Python', 21, 'contest', 'Hash code'),
(4, '2018-12-23 00:00:00', '2018-12-23', 'exchange program between arab and french', 'France', 'Paris', '7 months', 'yes', 'Good arabic and french', 26, 'exchange', 'Learn French'),
(5, '2018-12-23 00:00:00', '2018-12-23', 'help in organization of this huge event', 'Australia', 'Disney land', '2 weeks', 'yes', 'positivity', 27, 'volunteering', 'Organization of ICPC in Australia'),
(6, '2018-12-23 00:00:00', '2018-12-23', 'nuclear bombs', 'Switherlands', 'Genava', '5 years', 'yes', 'master in nuclear', 28, 'scholarship', 'PhD scholarship in Nuclear bombs'),
(7, '2018-12-23 00:00:00', '2018-12-23', 'computer engineering', 'Switherlands', 'Genava', '4 years', 'yes', '3.5 GPA', 28, 'scholarship', 'Computer engineering Bachelor scholarship');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

DROP TABLE IF EXISTS `organization`;
CREATE TABLE IF NOT EXISTS `organization` (
  `id` int(11) NOT NULL,
  `field` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `field`, `type`) VALUES
(21, 'Technology', 'Company'),
(25, 'Internet', 'Company'),
(26, 'learning', 'Institution'),
(27, 'Problem Solving', 'Organization'),
(28, 'Learning', 'university'),
(29, 'Learning', 'University'),
(30, 'Learning', 'University'),
(31, 'Learning', 'University'),
(32, 'Technology', 'Company'),
(33, 'Digital Marketing', 'Company'),
(34, 'Learning', 'University'),
(35, 'Telecom', 'Company');

-- --------------------------------------------------------

--
-- Table structure for table `scholarship`
--

DROP TABLE IF EXISTS `scholarship`;
CREATE TABLE IF NOT EXISTS `scholarship` (
  `post_id` int(11) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `paid` bit(1) NOT NULL DEFAULT b'0',
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scholarship`
--

INSERT INTO `scholarship` (`post_id`, `specialization`, `paid`, `type`) VALUES
(6, 'engineering', b'0', 'PHD'),
(7, 'Math', b'1', 'Bachelor');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

DROP TABLE IF EXISTS `supervisor`;
CREATE TABLE IF NOT EXISTS `supervisor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `country` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `support_tickets_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

DROP TABLE IF EXISTS `support_tickets`;
CREATE TABLE IF NOT EXISTS `support_tickets` (
  `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `sent_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `solved` bit(1) NOT NULL DEFAULT b'0',
  `solved_by` int(11) DEFAULT NULL,
  `sent_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`ticket_id`),
  KEY `solved_by` (`solved_by`),
  KEY `sent_by` (`sent_by`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support_tickets`
--

INSERT INTO `support_tickets` (`ticket_id`, `sent_at`, `content`, `solved`, `solved_by`, `sent_by`) VALUES
(1, '2018-12-23 09:13:26', 'Where is my profile?', b'0', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `post_id` int(11) NOT NULL,
  `tag` varchar(20) NOT NULL,
  PRIMARY KEY (`post_id`,`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`post_id`, `tag`) VALUES
(1, ' engineering'),
(1, 'computer'),
(2, ' google'),
(2, 'graphics'),
(3, ' C++'),
(3, ' problem solving'),
(3, 'computer'),
(4, ' Arabic'),
(4, 'French'),
(5, ' icpc'),
(5, 'problem solving'),
(6, 'phd'),
(7, 'engineering');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

DROP TABLE IF EXISTS `user_account`;
CREATE TABLE IF NOT EXISTS `user_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profile_picture` varchar(15) NOT NULL DEFAULT 'default.png',
  `country` varchar(30) NOT NULL,
  `city` varchar(30) DEFAULT NULL,
  `zip` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `about` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `name`, `email`, `profile_picture`, `country`, `city`, `zip`, `password`, `phone_number`, `about`) VALUES
(1, 'Radwa Khattab', 'radwa.khattab@hotmail.com', '1.png', 'Egypt', '6 October', 15523, 'blabla', '0111111111', 'Computer Engineering student'),
(2, 'Ayat Mostafa', 'ayat@hotmail.com', 'default.jpg', 'Egypt', 'Giza', 23187, 'blabla', '01111111', 'student'),
(3, 'Mohamed Ibrahim', 'mohamed.ibrahim@email.com', 'default.jpg', 'Egypt', 'Giza', 21388, 'blabla', '0111111111', 'student'),
(4, 'Mohamed Ramzy', 'ramzy@email.com', 'default.jpg', 'Egypt', 'Giza', 2137, 'blabla', '011111111', 'student and coder'),
(5, 'Nour Elsawy', 'elsawy@email.com', 'default.jpg', 'Egypt', 'Zayed', 21378, 'blabla', '01111111', 'FCES student'),
(6, 'Ranin Hamed', 'ranin@email.com', 'default.jpg', 'Egypt', 'Zayed', 21378, 'blabla', '01111111', 'Science faculty student'),
(7, 'Bashance', 'bashance@email.com', 'default.jpg', 'Egypt', 'Zayed', 231829, 'blabla', '01111111', 'faculty of arts student'),
(8, 'Ahmed Sobhi', 'ASobhi@email.com', 'default.jpg', 'Egypt', 'Giza', 231829, 'blabla', '01111111', 'Mechatronics geek'),
(9, 'Reham Ali', 'Lomi@email.com', 'default.jpg', 'Egypt', 'Giza', 231829, 'blabla', '01111111', 'writer when free, student when busy XD'),
(10, 'Ayman Azzam', 'Azzam@email.com', 'default.jpg', 'Egypt', 'Giza', 231829, 'blabla', '01111111', 'Graphics TA when needed, Problem solver till I find another interesting thing'),
(11, 'Nour Ahmed', 'Lighto@email.com', 'default.jpg', 'Egypt', '6 October', 231829, 'blabla', '01111111', 'computer engineering student'),
(12, 'Aly Ramzy', 'kiddo@email.com', 'default.jpg', 'Egypt', 'Down Town', 231829, 'blabla', '01111111', 'serious when needed, otherwise singing kids songs like toy story'),
(13, 'Ali Khaled', 'MrPhysics@email.com', 'default.jpg', 'Egypt', '6 October', 231829, 'blabla', '01111111', 'shaba7 w prince fe nfse'),
(14, 'Amr Aboshama', 'Aboshama@email.com', 'default.jpg', 'Egypt', 'Giza', 231829, 'blabla', '01111111', 'nerd w msh nerd fe nfs l w2t'),
(15, 'Yosry Mohammed', 'mandob@email.com', 'default.jpg', 'Egypt', '6 October', 231829, 'blabla', '01111111', 'Nerd at Computer Engineering'),
(16, 'Reham Gamal', 'Reem@email.com', 'default.jpg', 'Egypt', 'Cairo', 231829, 'blabla', '01111111', 'msh d7e7a l2'),
(17, 'zombie', 'someone@email.com', 'default.jpg', 'USA', 'LA', 3267, 'blabla', '921727983198', 'I AM A ZOMBIE'),
(18, 'vampire', 'vampire@email.com', 'default.jpg', 'USA', 'Vegas', 3267, 'blabla', '213872136', 'Dracula not vampire'),
(19, 'Casper', 'ghost@email.com', 'default.jpg', 'USA', 'Los Angelos', 31287, 'blabla', '21381298', 'ghost not in ghost busters'),
(20, 'Foobar', 'foobar@email.com', 'default.jpg', 'UK', 'London', 31287, 'blabla', '213891278', 'no one'),
(21, 'Google', 'google@google.com', 'default.jpg', 'USA', 'LA', 23187, 'blabla', '02173217', 'It is Google, dude!'),
(25, 'Facebook', 'facebook@google.com', 'default.jpg', 'USA', 'Texas', 23178, 'blabla', '9231782', 'IT IS FACEBOOK!'),
(26, 'Francis Institute', 'info@francis-istitute.com', 'default.jpg', 'France', 'Paris', 932712, 'blabla', '2318921', 'French rules'),
(27, 'ICPC', 'info@icpc.com', 'default.jpg', 'online', 'online', 318219, 'blabla', '2318921', 'PROBLEM SOLVING, DUDE!'),
(28, 'Genava Uni', 'genava@uni.com', 'default.jpg', 'Switzerland', 'Genava', 318219, 'blabla', '2318921', 'One of best universities in Switzerland'),
(29, 'Zhejiang Normal University', 'ZhejiangNormal@uni.com', 'default.jpg', 'China', 'Wuhan', 983, 'blabla', '2318233', 'China is awesome'),
(30, 'SOAS university', 'SOAS@uni.com', 'default.jpg', 'UK', 'London', 23827, 'blabla', '83629', 'British accent'),
(31, 'Chicago University', 'chicago@uni.com', 'default.jpg', 'USA', 'Chicago', 23827, 'blabla', '93268', 'Chicago is in USA not Austraila'),
(32, 'DELL EMC', 'dell-emc@dell.com', 'default.jpg', 'USA', 'Washington', 927891, 'blabla', '83216', 'Dell is awesome'),
(33, 'Amazon', 'amazon@web.com', 'default.jpg', 'Online', 'online', 31892178, 'blabla', '8231681', 'Amazon is number 1 company on the world in number of employees'),
(34, 'Zewail City', 'zc@zewail.com', 'default.jpg', 'Egypt', '6 October', 2723, 'blabla', '021272176', 'ZC is great'),
(35, 'Vodafone', 'vodafone@phone.com', 'default.jpg', 'Egypt', 'Cairo', 38217, 'blabla', '010202020', 'Vodafone rules');

-- --------------------------------------------------------

--
-- Table structure for table `volunteering`
--

DROP TABLE IF EXISTS `volunteering`;
CREATE TABLE IF NOT EXISTS `volunteering` (
  `post_id` int(11) NOT NULL,
  `previous_experience` text NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteering`
--

INSERT INTO `volunteering` (`post_id`, `previous_experience`) VALUES
(5, 'nothing');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicable_countries`
--
ALTER TABLE `applicable_countries`
  ADD CONSTRAINT `applicable_countries_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `exchange_program` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `applicant_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `apply_for`
--
ALTER TABLE `apply_for`
  ADD CONSTRAINT `apply_for_ibfk_1` FOREIGN KEY (`id`) REFERENCES `applicant` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `apply_for_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `opportunity` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `contest`
--
ALTER TABLE `contest`
  ADD CONSTRAINT `contest_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `opportunity` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exchange_program`
--
ALTER TABLE `exchange_program`
  ADD CONSTRAINT `exchange_program_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `opportunity` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `interests`
--
ALTER TABLE `interests`
  ADD CONSTRAINT `interests_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `internship`
--
ALTER TABLE `internship`
  ADD CONSTRAINT `internship_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `opportunity` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`sent_by`) REFERENCES `user_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`recieved_by`) REFERENCES `user_account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `opportunity`
--
ALTER TABLE `opportunity`
  ADD CONSTRAINT `opportunity_ibfk_1` FOREIGN KEY (`posted_by`) REFERENCES `organization` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD CONSTRAINT `scholarship_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `opportunity` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD CONSTRAINT `support_tickets_ibfk_1` FOREIGN KEY (`solved_by`) REFERENCES `supervisor` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `support_tickets_ibfk_2` FOREIGN KEY (`sent_by`) REFERENCES `user_account` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `opportunity` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `volunteering`
--
ALTER TABLE `volunteering`
  ADD CONSTRAINT `volunteering_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `opportunity` (`post_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
