-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 08:22 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ht_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'dhruti', 'dhrutimehta1672@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(10) NOT NULL,
  `contact_name` varchar(40) NOT NULL,
  `contact_email` varchar(150) NOT NULL,
  `contact_mess` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `contact_name`, `contact_email`, `contact_mess`) VALUES
(1, 'dhruti mehta', 'dhrutimehta1672@gmail.com', 'hsdgiuksdjgficskdfhcoskxj');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_master`
--

CREATE TABLE `hotel_master` (
  `hotel_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `hotel_name` varchar(50) NOT NULL,
  `hotel_address` text NOT NULL,
  `hotel_night` int(11) NOT NULL,
  `hotel_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_master`
--

INSERT INTO `hotel_master` (`hotel_id`, `package_id`, `hotel_name`, `hotel_address`, `hotel_night`, `hotel_price`) VALUES
(1, 1, 'Prince Residency', 'Village : Mehra Gaun, Bhimtal â€“ Bhowali Road, Bhimtal, District- Nainital (Uttarakhand) - 263136', 2, 7000);

-- --------------------------------------------------------

--
-- Table structure for table `img_master`
--

CREATE TABLE `img_master` (
  `img_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `img_url` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inclusion_master`
--

CREATE TABLE `inclusion_master` (
  `inclusion_id` int(11) NOT NULL,
  `inclusion_stay` int(1) NOT NULL,
  `inclusion_sightseeing` int(1) NOT NULL,
  `inclusion_meal` int(1) NOT NULL,
  `inclusion_transfer` int(1) NOT NULL,
  `inclusion_visa` int(1) NOT NULL,
  `inclusion_flight` int(1) NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package_enquiry`
--

CREATE TABLE `package_enquiry` (
  `enquire_id` int(10) NOT NULL,
  `enquire_name` varchar(30) NOT NULL,
  `enquire_email` varchar(50) NOT NULL,
  `enquire_phn` bigint(13) NOT NULL,
  `enquire_from` date NOT NULL,
  `enquire_to` date NOT NULL,
  `enquire_notes` varchar(170) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_enquiry`
--

INSERT INTO `package_enquiry` (`enquire_id`, `enquire_name`, `enquire_email`, `enquire_phn`, `enquire_from`, `enquire_to`, `enquire_notes`) VALUES
(1, 'dhruti mehta', 'dhrutimehta1672@gmail.com', 9033835455, '2021-05-26', '2021-05-30', 'ygydsiduviwodjeopjvhbvh d');

-- --------------------------------------------------------

--
-- Table structure for table `package_master`
--

CREATE TABLE `package_master` (
  `package_id` int(10) NOT NULL,
  `package_name` varchar(70) NOT NULL,
  `package_available` tinyint(1) NOT NULL,
  `package_nights` int(10) NOT NULL,
  `flight_include` tinyint(1) NOT NULL,
  `package_from` int(20) NOT NULL,
  `package_img` varchar(150) NOT NULL,
  `package_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_master`
--

INSERT INTO `package_master` (`package_id`, `package_name`, `package_available`, `package_nights`, `flight_include`, `package_from`, `package_img`, `package_desc`) VALUES
(1, 'Bhimtal', 1, 2, 0, 5000, 'bhimtal.jpeg', 'Bhimtal is an ancient place named after Bhima of Mahabharata. Bhimeshwara Mahadev Temple, an old Shiva temple in the bank of Bhimtal lake, is believed to have been built when Bhima visited the place during the banishment (vanvas) period of Pandavas. The present temple was built in the 17th century, by Baz Bahadur (1638â€“78 AD), a King of the Chand dynasty, and the Raja of Kumaon.[1]Archived 2008-06-18 at the Wayback Machine British Library.6).\r\n\r\nBhimtal is older than nearby Nainital as the city of Nainital is just 150â€“160 years old but Bhimtal is older than Nainital and Haldwami and was a stoppage onrute to old pedesterial road is still in use here and this road connects nearby Kathgodam to all Kumaon region and even to Nepal and Tibet. It might have been the part of the famous ancient silk route.\r\n\r\nAbout 2 km from Bhimtal is Nal Damyanti Tal, a small natural lake. It is believed that the palace of famous king Nala drowned into this lake. It is a very sacred place for the dwellers of the region. About 5 km from Bhimtal is the famous group of lakes known as Sattal, which is a place of attraction for nature lovers. Clear water of lakes surrounded by thick forest and voice of birds is a wonderful experience. Hill near the lake known as Hidimba Parvat. It gets its name from demon Hidimba of Mahabharata. Vankhandi Maharaj, a monk and environmentalist lives on the hill now, and has created a sanctuary for the wild animals around the hill. The area is known as Vankhandi Ashram.\r\n\r\nThe hill of Karkotaka is supposed to be named after Karkotaka, a mythical cobra. The hill is famous for its Nag temple in the region and on every Rishi Panchami thousands of people visit the temple and worship the Nag Karkotaka Maharaj. This is one of the famous nag temples situated in Uttarakhand region.\r\n\r\nSayad Baba ki mazar is a place where people from different part of Bhimtal and near around places come for worship on every Thursday. It is an example of unity in diversity as people from different religions (Hindu, Muslim, Sikh, Christian) visit this place, apart from this the centre of attraction of this mazar is its location. You can see the whole lake, dam and the island from their and also near around places like Jhangaliyagaon, Nakuchiyatal.'),
(2, 'Statue Of Unity', 1, 1, 0, 7000, 'sou.jpg', 'The Statue of Unity is a colossal statue of Indian statesman and independence activist Vallabhbhai Patel (1875â€“1950), who was the first Deputy Prime Minister and Home Minister of independent India and an adherent of Mahatma Gandhi during the nonviolent Indian Independence movement. Patel was highly respected for his leadership in uniting 562 princely states of India with a major part of the former British Raj to form the single Union of India. The statue is located in the state of Gujarat, India. It is the world\'s tallest statue with a height of 182 metres (597 feet).[3] It is located on the Narmada River in the Kevadiya colony, facing the Sardar Sarovar Dam 100 kilometres (62 mi) southeast of the city of Vadodara[4] and 150 kilometres (93 mi) from Surat. Kevadia railway station is located at a distance of just 5 kilometres from Statue of Unity.[5][6]\r\n\r\nNarendra Modi first announced the project to commemorate Vallabhbhai Patel on 7 October 2013 at a press conference to mark the beginning of his 10th year as the Chief Minister of Gujarat. At the time, the project was dubbed, \"Gujarat\'s tribute to the nation\".[9]\r\n\r\nA separate Society named Sardar Vallabhbhai Patel Rashtriya Ekta Trust (SVPRET) was formed under the chairmanship of the Chief minister, Government of Gujarat, to execute the project.[9][10]\r\n\r\nAn outreach drive named the Statue of Unity Movement was started to support the construction of the statue. It helped collect the iron needed for the statue by asking farmers to donate their used farming instruments.[9][11] By 2016, a total of 135 metric tonnes of scrap iron had been collected and about 109 tonnes of it was used to make the foundation of the statue after processing.[12] A marathon titled Run For Unity was held on 15 December 2013 in Surat and Vadodara in support of the project.[13]\r\n\r\nThe project was first announced in 2010 and the construction of the statue started in October 2013 by Larsen & Toubro, with a total construction cost of â‚¹2700 crore (â‚¹27 billion; US$422 million).[7] It was designed by Indian sculptor Ram V. Sutar, and was inaugurated by Indian Prime Minister Narendra Modi on 31 October 2018, the 143rd anniversary of Sardar Patel\'s birth.[8]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `hotel_master`
--
ALTER TABLE `hotel_master`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `img_master`
--
ALTER TABLE `img_master`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `inclusion_master`
--
ALTER TABLE `inclusion_master`
  ADD PRIMARY KEY (`inclusion_id`);

--
-- Indexes for table `package_enquiry`
--
ALTER TABLE `package_enquiry`
  ADD PRIMARY KEY (`enquire_id`);

--
-- Indexes for table `package_master`
--
ALTER TABLE `package_master`
  ADD PRIMARY KEY (`package_id`),
  ADD UNIQUE KEY `package_name` (`package_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotel_master`
--
ALTER TABLE `hotel_master`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `img_master`
--
ALTER TABLE `img_master`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inclusion_master`
--
ALTER TABLE `inclusion_master`
  MODIFY `inclusion_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_enquiry`
--
ALTER TABLE `package_enquiry`
  MODIFY `enquire_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `package_master`
--
ALTER TABLE `package_master`
  MODIFY `package_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
