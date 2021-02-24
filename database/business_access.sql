-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 02:48 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business_access`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_me`
--

CREATE TABLE `about_me` (
  `id` int(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `education_name` varchar(255) NOT NULL,
  `education_address` varchar(255) NOT NULL,
  `education_certification` varchar(255) NOT NULL,
  `current_employement_title` varchar(30) NOT NULL,
  `current_employement_name` varchar(100) DEFAULT NULL,
  `current_employement_address` varchar(255) DEFAULT NULL,
  `personal_contact` varchar(255) NOT NULL,
  `previous_employement_title` varchar(255) DEFAULT NULL,
  `previous_employment_name` varchar(255) DEFAULT NULL,
  `previous_employment_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `classification` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `abbrevation_name` varchar(255) NOT NULL,
  `business_reg_doc` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `statement_of_business_mission` varchar(255) NOT NULL,
  `area_served` varchar(255) DEFAULT NULL,
  `area_served_continent` varchar(255) DEFAULT NULL,
  `area_served_country` varchar(255) DEFAULT NULL,
  `revenue_year` varchar(255) DEFAULT NULL,
  `revenue_currency` varchar(255) DEFAULT NULL,
  `revenue_amount` int(255) DEFAULT NULL,
  `key_people_name` varchar(50) DEFAULT NULL,
  `key_people_title` varchar(255) DEFAULT NULL,
  `key_people_official_contact` varchar(255) DEFAULT NULL,
  `headquarters` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `number_of_locations` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `classification`, `type`, `name`, `abbrevation_name`, `business_reg_doc`, `date`, `statement_of_business_mission`, `area_served`, `area_served_continent`, `area_served_country`, `revenue_year`, `revenue_currency`, `revenue_amount`, `key_people_name`, `key_people_title`, `key_people_official_contact`, `headquarters`, `user_id`, `number_of_locations`) VALUES
(1, 'Government Organisation', 'Government sponsered', 'Uganda National Roads Authority', 'UNRA', NULL, '1992-12-15', 'UNRA', 'Uganda', 'Uganda', 'Uganda', '2020', 'UGX', 100, 'Kagyina', 'Minister', '+256789562345', 'kampala Uganda', 3, 'All districts');

-- --------------------------------------------------------

--
-- Table structure for table `anniversaries`
--

CREATE TABLE `anniversaries` (
  `anniversary_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `application_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `app_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `user_id`, `date`, `name`, `app_logo`) VALUES
(1, 3, '2021-02-09', 'mtn', 'mtn.png'),
(2, 3, '2021-02-09', 'Africel', 'africel.png');

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE `award` (
  `id` int(255) NOT NULL,
  `name_of_award` varchar(255) NOT NULL,
  `award_from` varchar(255) NOT NULL,
  `award_picture` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `award`
--

INSERT INTO `award` (`id`, `name_of_award`, `award_from`, `award_picture`, `user_id`) VALUES
(1, 'second runners up university league', 'Makerere University', 'award.jpg', 1),
(2, 'second runners up university league', 'Makerere University', 'award.jpg', 1),
(3, 'best devloper award', 'the developers hub', 'award2.jpg', 1),
(4, 'Best Software solutions company', 'RAN', 'award3.jpg', 3),
(5, 'Award', 'awards ceremony', 'award.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `wall_id` int(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `date`, `user_id`, `wall_id`, `comment`) VALUES
(2, '02:29 PM Wednesday February 10th ', 3, 1, 'We  all know it'),
(3, '02:48 PM Wednesday February 10th ', 3, 1, ' good to know\r\n'),
(4, '02:36 PM Thursday February 11th ', 1, 2, ' The mostly user for web apps'),
(5, '09:26 AM Friday February 12th ', 1, 1, ' i would like to learn html'),
(6, '07:37 AM Wednesday February 17th ', 1, 3, ' java is a monster'),
(7, '07:40 AM Wednesday February 17th ', 1, 4, ' The \"code once and run all\"');

-- --------------------------------------------------------

--
-- Table structure for table `comment_comment`
--

CREATE TABLE `comment_comment` (
  `comment_comment_id` int(255) NOT NULL,
  `comment_id` int(255) NOT NULL,
  `wall_id` int(255) NOT NULL,
  `comment` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_comment`
--

INSERT INTO `comment_comment` (`comment_comment_id`, `comment_id`, `wall_id`, `comment`, `date`, `user_id`) VALUES
(1, 2, 1, ' Alright', '11:49 AM Wednesday February 17th ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `configuration_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `connection_requests`
--

CREATE TABLE `connection_requests` (
  `connection_id` int(255) NOT NULL,
  `sender_id` int(255) NOT NULL,
  `reciever_id` int(255) NOT NULL,
  `status` int(3) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connection_requests`
--

INSERT INTO `connection_requests` (`connection_id`, `sender_id`, `reciever_id`, `status`, `date`) VALUES
(1, 5, 1, 1, '10:52 AM Monday February 22nd '),
(2, 1, 3, 1, '11:37 AM Monday February 22nd '),
(5, 11, 1, 1, '01:04 PM Monday February 22nd '),
(7, 11, 5, 0, '01:54 PM Monday February 22nd ');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(255) NOT NULL,
  `p_o_box` varchar(255) NOT NULL,
  `district_city` varchar(255) NOT NULL,
  `place_of_business` varchar(255) NOT NULL,
  `business_plot_number` varchar(255) NOT NULL,
  `business_street_name` varchar(255) NOT NULL,
  `business_building_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state_province` varchar(255) NOT NULL,
  `zip_postal_code` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `postal_address` varchar(255) NOT NULL,
  `physical_address` varchar(255) NOT NULL,
  `goods_services` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `work_hours` varchar(255) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `log` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `p_o_box`, `district_city`, `place_of_business`, `business_plot_number`, `business_street_name`, `business_building_name`, `city`, `state_province`, `zip_postal_code`, `tel`, `fax`, `mobile`, `email_address`, `website`, `postal_address`, `physical_address`, `goods_services`, `user_id`, `contact_person`, `work_hours`, `lat`, `log`) VALUES
(1, '15222', 'kampala ', 'Kireka', '14556', 'jinja high way', 'kireka shopping center', 'kampala city', 'nakawa  division', '54555', '+256709686326', '+256789526412', '+256789264512', 'admin@admin.com', 'www.officialaccess.com', '15222', 'kireka shopping center rm 108', 'IT and civil services', 3, 'Katerega Micheal', 'mon-fri 8am-5pm', 0.342165, 32.499996);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(255) NOT NULL,
  `text` text DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `text`, `photo`, `user_id`) VALUES
(1, 'jj', 'badman.jpg', 3),
(2, 'jj', 'designthiswebpage.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(255) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `filename`) VALUES
(1, '43636063_1101515383344143_8107776078677803008_n.jpg'),
(2, 'bad.PNG'),
(3, 'bob.jpg'),
(4, '43636063_1101515383344143_8107776078677803008_n.jpg'),
(5, 'bob.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `individual`
--

CREATE TABLE `individual` (
  `individual_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `profile_type` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `wall_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `date`, `wall_id`, `user_id`, `status`) VALUES
(1, '0000-00-00', 1, 3, 'liked');

-- --------------------------------------------------------

--
-- Table structure for table `location_activation`
--

CREATE TABLE `location_activation` (
  `location_activation_id` int(255) NOT NULL,
  `activation_log` int(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(255) NOT NULL,
  `sender_id` int(255) NOT NULL,
  `reciever_id` int(255) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `sender_id`, `reciever_id`, `message`, `date`, `status`) VALUES
(1, 1, 3, 'helo there', '06:42 PM Friday February 19th ', 1),
(2, 1, 3, 'how are you', '06:43 PM Friday February 19th ', 1),
(3, 1, 3, 'tell me about your company\r\n', '06:43 PM Friday February 19th ', 1),
(4, 3, 1, 'im okay mr\r\n', '07:16 PM Friday February 19th ', 1),
(5, 3, 1, 'how are you', '07:17 PM Friday February 19th ', 1),
(6, 3, 1, 'our company is about alot of things..i will send you the website link', '07:17 PM Friday February 19th ', 1),
(7, 3, 1, 'hey there', '07:05 PM Sunday February 21st ', 1),
(8, 1, 3, 'hey nastar..how are you', '07:41 PM Sunday February 21st ', 1),
(9, 3, 1, 'im okay, how are you', '07:42 PM Sunday February 21st ', 1),
(10, 1, 3, 'im okay..', '07:48 PM Sunday February 21st ', 1),
(11, 3, 1, 'Alright then', '07:49 PM Sunday February 21st ', 1),
(12, 3, 1, '', '07:55 PM Sunday February 21st ', 1),
(13, 3, 1, '', '07:56 PM Sunday February 21st ', 1),
(14, 1, 3, 'jj\r\n', '07:59 PM Sunday February 21st ', 1),
(15, 1, 5, 'hi mtn', '02:52 PM Monday February 22nd ', 1),
(16, 5, 1, 'hi hamza', '03:17 PM Monday February 22nd ', 1),
(17, 1, 5, 'tell me about senkyu', '03:21 PM Monday February 22nd ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_feed_individual`
--

CREATE TABLE `news_feed_individual` (
  `id` int(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `author_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `comment` text NOT NULL,
  `reaction` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news_feed_non_individual`
--

CREATE TABLE `news_feed_non_individual` (
  `id` int(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `author_name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `details` text NOT NULL,
  `date` date NOT NULL,
  `comment` text NOT NULL,
  `reaction` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `non_individual`
--

CREATE TABLE `non_individual` (
  `non_individual_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `profile_type` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile_individual`
--

CREATE TABLE `profile_individual` (
  `profile_individual_id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `employement_current_status` varchar(255) DEFAULT NULL,
  `employement_position` varchar(255) DEFAULT NULL,
  `employement_name` varchar(255) DEFAULT NULL,
  `current_address` varchar(255) DEFAULT NULL,
  `employement_past_position` varchar(255) DEFAULT NULL,
  `employement_past_name` varchar(255) DEFAULT NULL,
  `employement_past_address` varchar(255) DEFAULT NULL,
  `specialisties` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `user_id` int(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_individual`
--

INSERT INTO `profile_individual` (`profile_individual_id`, `first_name`, `last_name`, `email`, `gender`, `dob`, `photo`, `employement_current_status`, `employement_position`, `employement_name`, `current_address`, `employement_past_position`, `employement_past_name`, `employement_past_address`, `specialisties`, `education`, `marital_status`, `user_id`, `logo`) VALUES
(1, 'hamza', 'mugabo', 'ham@gmail.com', 'male', '2021-02-04', 'hamza.jpg', 'Employed', 'web  developer', '  developer', '  kireka', 'android developer', '  developer', '  bukoto', 'software development', 'makerere univesity', 'single', 1, 'design this web page.jpg,bou.jpg,dba.jpg,upolice.png'),
(2, 'Tumusiime', 'Mpoza', 'mpoza@gmail.com', 'male', '1993-02-02', 'count1.png', 'Employed', 'supervisor', 'civil eng supervisor', 'kawempe', 'filed civil', 'civil eng', 'kireka', 'civil engineering', 'makerere univesity', 'single', 11, 'civil.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profile_non_individual`
--

CREATE TABLE `profile_non_individual` (
  `profile_non_individual_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `license_no` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `tin` varchar(255) NOT NULL,
  `mission` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_non_individual`
--

INSERT INTO `profile_non_individual` (`profile_non_individual_id`, `name`, `division`, `license_no`, `photo`, `user_id`, `tin`, `mission`, `date`) VALUES
(1, 'Nastar ', 'Kireka Shopping mall', '15548', 'logo.png', 3, '1111111', 'the future of tech', '2009-02-19'),
(2, 'mtn', 'nakasero', '157855', 'mtn.png', 5, '158556', 'Everywhere you go', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `timeline` varchar(255) NOT NULL,
  `purpose` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `project_award` varchar(255) DEFAULT NULL,
  `award` varchar(1200) NOT NULL,
  `user_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `log` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `name`, `timeline`, `purpose`, `status`, `project_award`, `award`, `user_id`, `date`, `location`, `lat`, `log`) VALUES
(1, 'Office Access', '2 months', 'connect offices', 'on track', 'award.jpg', 'best in the central region', 3, '0000-00-00', 'kireka shopping center', 0.347500, 32.649170),
(2, 'Office Access0', '2 months', 'connect offices', 'on track', 'award2.jpg', 'best project', 3, '0000-00-00', 'makerere university', 0.349999, 32.567165);

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `file_name`, `project_id`) VALUES
(1, 'form2.PNG', 1),
(2, 'form3.PNG', 1),
(3, 'ffff.PNG', 1),
(4, 'firebase android config2.PNG', 1),
(5, 'form1.PNG', 1),
(6, 'token 200.PNG', 1),
(7, 'token 422.PNG', 1),
(8, 'jaridah1.jpg', 1),
(9, 'jaridah2.jpg', 1),
(10, 'jaridah3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_team`
--

CREATE TABLE `project_team` (
  `project_team_id` int(255) NOT NULL,
  `project_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_team`
--

INSERT INTO `project_team` (`project_team_id`, `project_id`, `date`, `name`, `user_id`) VALUES
(1, 1, '2021-02-10', 'Hamza Mugabo', 1),
(2, 1, '2021-02-10', 'Nastar Kireka', 3),
(3, 2, '2021-02-11', 'Hamza Mugabo', 1),
(4, 2, '2021-02-11', 'Nastar Kireka', 3);

-- --------------------------------------------------------

--
-- Table structure for table `recommendation`
--

CREATE TABLE `recommendation` (
  `recommendation_id` int(255) NOT NULL,
  `profile_id` int(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `regards`
--

CREATE TABLE `regards` (
  `regard_id` int(255) NOT NULL,
  `regard` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `sender_id` int(255) NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regards`
--

INSERT INTO `regards` (`regard_id`, `regard`, `date`, `user_id`, `sender_id`, `status`) VALUES
(1, 'regards', '01:31 PM Thursday February 18th ', 3, 3, 1),
(2, 'regards', '02:38 PM Thursday February 18th ', 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `relatioship_partners`
--

CREATE TABLE `relatioship_partners` (
  `relationship_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `project_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `add_by` int(255) NOT NULL,
  `confirm_status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relatioship_partners`
--

INSERT INTO `relatioship_partners` (`relationship_id`, `name`, `project_id`, `date`, `user_id`, `user_type`, `add_by`, `confirm_status`) VALUES
(1, 'Hamza Mugabo', 1, '2021-02-10', 1, 'individual', 3, 0),
(2, 'Nastar Kireka', 1, '2021-02-10', 3, 'non_individual', 3, 0),
(4, 'Hamza Mugabo', 2, '2021-02-17', 1, 'individual', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sub_category` varchar(255) DEFAULT NULL,
  `sub_sub_category` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(255) NOT NULL,
  `entity_name` varchar(255) NOT NULL,
  `business_relationship_status` varchar(255) NOT NULL,
  `business_relationship_to_crane_bank` varchar(255) NOT NULL,
  `comment_to_cranebank` text NOT NULL,
  `business_relationship_to_cfs` varchar(255) NOT NULL,
  `comment_to_cfs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `share_id` int(255) NOT NULL,
  `content_id` int(255) NOT NULL,
  `date` datetime NOT NULL,
  `shared_from_id` int(255) NOT NULL,
  `shared_to_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `share`
--

INSERT INTO `share` (`share_id`, `content_id`, `date`, `shared_from_id`, `shared_to_id`) VALUES
(1, 5, '2021-02-23 14:36:29', 3, 1),
(2, 5, '2021-02-23 14:36:29', 3, 5),
(3, 5, '2021-02-23 14:36:29', 3, 11),
(4, 6, '2021-02-24 07:00:36', 3, 1),
(5, 1, '2021-02-24 07:53:17', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `subscriber_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `theme_switch`
--

CREATE TABLE `theme_switch` (
  `theme_switch_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `user_type`, `gender`, `dob`, `contact`) VALUES
(1, 'Hamza', 'Mugabo', 'ham@gmail.com', '1234', 'individual', 'male', '2021-02-08', '123'),
(3, 'Nastar', 'Kireka', 'nastar@gmail.com', '123', 'non_individual', '', '2021-02-09', '123'),
(5, 'Mtn ', 'Uganda', 'mtn@gmail.com', '123', 'non_individual', '', '1882-06-07', '+256789523642'),
(11, 'Tumusiime', 'Mpoza', 'mpoza@gmail.com', '123', 'individual', 'male', '1993-02-02', '+236775652315');

-- --------------------------------------------------------

--
-- Table structure for table `usr`
--

CREATE TABLE `usr` (
  `id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `project_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usr`
--

INSERT INTO `usr` (`id`, `images`, `date_time`, `project_id`) VALUES
(0, 'admin_dashboard.PNG', '2021-02-08 15:15:04', 0),
(0, 'admin_manage_tax_agent.PNG', '2021-02-08 15:15:04', 0),
(0, 'admin_view_tax_agents.PNG', '2021-02-08 15:15:04', 0),
(0, 'car.png', '2021-02-08 15:18:15', 0),
(0, 'car1.png', '2021-02-08 15:18:15', 0),
(0, 'car2.png', '2021-02-08 15:18:15', 0),
(0, 'car3.png', '2021-02-08 15:18:15', 0),
(0, 'dlt204.PNG', '2021-02-08 15:19:31', 1),
(0, 'dlt422.PNG', '2021-02-08 15:19:31', 1),
(0, 'doctor.PNG', '2021-02-08 15:19:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wall`
--

CREATE TABLE `wall` (
  `wall_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `photo` varchar(1000) DEFAULT NULL,
  `message` text NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wall`
--

INSERT INTO `wall` (`wall_id`, `user_id`, `date`, `photo`, `message`, `status`) VALUES
(1, 1, '11:21 AM Friday February 5th ', 'Capture1.PNG', 'HTML is the standard markup language for creating Web pages', 1),
(2, 1, '11:52 AM Friday February 5th ', 'freezer_truck.png', 'php is pretty good', 0),
(3, 1, '11:55 AM Friday February 5th ', 'freezer_truck.png', 'java is good', 0),
(4, 1, '02:35 PM Friday February 5th ', 'pro.png', 'how about react native', 0),
(5, 3, '12:26 PM Wednesday February 10th ', '', 'im loving this wall', 0),
(6, 3, '12:30 PM Wednesday February 10th ', '', 'testing again', 0),
(7, 5, '08:30 AM Monday February 22nd ', 'senkyu.jpg', 'Mtn Senkyu', 0),
(8, 11, '01:00 PM Monday February 22nd ', 'civil.jpg', 'Im a Civil eng', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `anniversaries`
--
ALTER TABLE `anniversaries`
  ADD PRIMARY KEY (`anniversary_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `wall_id` (`wall_id`);

--
-- Indexes for table `comment_comment`
--
ALTER TABLE `comment_comment`
  ADD PRIMARY KEY (`comment_comment_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `wall_id` (`wall_id`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`configuration_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `connection_requests`
--
ALTER TABLE `connection_requests`
  ADD PRIMARY KEY (`connection_id`),
  ADD KEY `reciever_id` (`reciever_id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual`
--
ALTER TABLE `individual`
  ADD PRIMARY KEY (`individual_id`),
  ADD KEY `profile_type` (`profile_type`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `location_activation`
--
ALTER TABLE `location_activation`
  ADD PRIMARY KEY (`location_activation_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `reciever_id` (`reciever_id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indexes for table `news_feed_individual`
--
ALTER TABLE `news_feed_individual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_feed_non_individual`
--
ALTER TABLE `news_feed_non_individual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `non_individual`
--
ALTER TABLE `non_individual`
  ADD PRIMARY KEY (`non_individual_id`),
  ADD KEY `profile_type` (`profile_type`);

--
-- Indexes for table `profile_individual`
--
ALTER TABLE `profile_individual`
  ADD PRIMARY KEY (`profile_individual_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `profile_non_individual`
--
ALTER TABLE `profile_non_individual`
  ADD PRIMARY KEY (`profile_non_individual_id`),
  ADD UNIQUE KEY `tin` (`tin`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_team`
--
ALTER TABLE `project_team`
  ADD PRIMARY KEY (`project_team_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recommendation`
--
ALTER TABLE `recommendation`
  ADD PRIMARY KEY (`recommendation_id`);

--
-- Indexes for table `regards`
--
ALTER TABLE `regards`
  ADD PRIMARY KEY (`regard_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indexes for table `relatioship_partners`
--
ALTER TABLE `relatioship_partners`
  ADD PRIMARY KEY (`relationship_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`share_id`),
  ADD KEY `share_ibfk_1` (`content_id`),
  ADD KEY `shared_from_id` (`shared_from_id`),
  ADD KEY `shared_to_id` (`shared_to_id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`subscriber_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `theme_switch`
--
ALTER TABLE `theme_switch`
  ADD PRIMARY KEY (`theme_switch_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wall`
--
ALTER TABLE `wall`
  ADD PRIMARY KEY (`wall_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_me`
--
ALTER TABLE `about_me`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anniversaries`
--
ALTER TABLE `anniversaries`
  MODIFY `anniversary_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `award`
--
ALTER TABLE `award`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment_comment`
--
ALTER TABLE `comment_comment`
  MODIFY `comment_comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `connection_requests`
--
ALTER TABLE `connection_requests`
  MODIFY `connection_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `individual`
--
ALTER TABLE `individual`
  MODIFY `individual_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location_activation`
--
ALTER TABLE `location_activation`
  MODIFY `location_activation_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `news_feed_individual`
--
ALTER TABLE `news_feed_individual`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_feed_non_individual`
--
ALTER TABLE `news_feed_non_individual`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `non_individual`
--
ALTER TABLE `non_individual`
  MODIFY `non_individual_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_individual`
--
ALTER TABLE `profile_individual`
  MODIFY `profile_individual_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile_non_individual`
--
ALTER TABLE `profile_non_individual`
  MODIFY `profile_non_individual_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `project_team`
--
ALTER TABLE `project_team`
  MODIFY `project_team_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recommendation`
--
ALTER TABLE `recommendation`
  MODIFY `recommendation_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regards`
--
ALTER TABLE `regards`
  MODIFY `regard_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `relatioship_partners`
--
ALTER TABLE `relatioship_partners`
  MODIFY `relationship_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `share`
--
ALTER TABLE `share`
  MODIFY `share_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `subscriber_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theme_switch`
--
ALTER TABLE `theme_switch`
  MODIFY `theme_switch_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wall`
--
ALTER TABLE `wall`
  MODIFY `wall_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_us`
--
ALTER TABLE `about_us`
  ADD CONSTRAINT `about_us_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `anniversaries`
--
ALTER TABLE `anniversaries`
  ADD CONSTRAINT `anniversaries_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `award`
--
ALTER TABLE `award`
  ADD CONSTRAINT `award_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`wall_id`) REFERENCES `wall` (`wall_id`);

--
-- Constraints for table `comment_comment`
--
ALTER TABLE `comment_comment`
  ADD CONSTRAINT `comment_comment_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`comment_id`),
  ADD CONSTRAINT `comment_comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `comment_comment_ibfk_3` FOREIGN KEY (`wall_id`) REFERENCES `wall` (`wall_id`);

--
-- Constraints for table `configuration`
--
ALTER TABLE `configuration`
  ADD CONSTRAINT `configuration_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `connection_requests`
--
ALTER TABLE `connection_requests`
  ADD CONSTRAINT `connection_requests_ibfk_1` FOREIGN KEY (`reciever_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `connection_requests_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `contact_us_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `individual`
--
ALTER TABLE `individual`
  ADD CONSTRAINT `individual_ibfk_1` FOREIGN KEY (`profile_type`) REFERENCES `profile_individual` (`profile_individual_id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`reciever_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `non_individual`
--
ALTER TABLE `non_individual`
  ADD CONSTRAINT `non_individual_ibfk_1` FOREIGN KEY (`profile_type`) REFERENCES `profile_non_individual` (`profile_non_individual_id`);

--
-- Constraints for table `profile_individual`
--
ALTER TABLE `profile_individual`
  ADD CONSTRAINT `profile_individual_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `profile_non_individual`
--
ALTER TABLE `profile_non_individual`
  ADD CONSTRAINT `profile_non_individual_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `project_images`
--
ALTER TABLE `project_images`
  ADD CONSTRAINT `project_images_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`);

--
-- Constraints for table `project_team`
--
ALTER TABLE `project_team`
  ADD CONSTRAINT `project_team_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`),
  ADD CONSTRAINT `project_team_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `regards`
--
ALTER TABLE `regards`
  ADD CONSTRAINT `regards_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `regards_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `relatioship_partners`
--
ALTER TABLE `relatioship_partners`
  ADD CONSTRAINT `relatioship_partners_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`),
  ADD CONSTRAINT `relatioship_partners_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `share`
--
ALTER TABLE `share`
  ADD CONSTRAINT `share_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `wall` (`wall_id`),
  ADD CONSTRAINT `share_ibfk_2` FOREIGN KEY (`shared_from_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `share_ibfk_3` FOREIGN KEY (`shared_to_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD CONSTRAINT `subscriber_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
