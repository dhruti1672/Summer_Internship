-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 01:02 PM
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
-- Table structure for table `blog_master`
--

CREATE TABLE `blog_master` (
  `blog_id` int(11) NOT NULL,
  `blog_name` varchar(100) NOT NULL,
  `blog_url` text NOT NULL,
  `blog_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_master`
--

INSERT INTO `blog_master` (`blog_id`, `blog_name`, `blog_url`, `blog_img`) VALUES
(2, '6 South Africa Travel Tips That Are A Must For Every Traveler', 'https://traveltriangle.com/blog/south-africa-travel-tips/', 'b2.jpg'),
(3, '10 Manali Travel Tips To Vacay Like A Pro In This Himachali Paradise', 'https://traveltriangle.com/blog/manali-travel-tips/', 'b3.jpg'),
(4, '30 Budget Trips In India For That Pocket-Friendly Escape In 2021!', 'https://traveltriangle.com/blog/budget-trips-in-india/', 'b4.jpg'),
(5, 'Leh Travel Guide: Planning a Trip to Leh-Ladakh in 2021', 'https://meanderwander.com/trip-to-leh-ladakh/', 'b5.jpeg'),
(6, 'The Most Romantic City in Italy ', 'https://travelforawhile.com/the-most-romantic-city-in-italy/', 'b6.jpg');

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
(2, 'Dhruti Mehta', 'dhrutidmehta123@gmail.com', 'hello, i need package of Goa tour. We are 2 adults and we need for 4 nights. Date will be in september.'),
(3, 'Hetal ', 'hetalmehta12@gmail.com', 'i\'m travel agent and i need b2b rates for dubai\r\n'),
(4, 'chirag vyas', 'chiragvyas@gmail.com', 'i need package of jaiselmer for 2 nights'),
(5, 'Helly Shah', 'helly05@gmail.com', 'Hi. I\'m looking for Udaipur package for my family. can u please mail me all the available hotels with it\'s price and other necessary details on my mail.'),
(6, 'Vihan Shukla', 'vihans@gmail.com', 'I want package of leela resort goa for 4 adults and for 3 nights. We are planning our trip in july.'),
(7, 'Darshan Mehta', 'darshan4772@gmail.com', 'i am planning to celebrate my bday in udaipur and for that i need 2 nights package in any 5 star resort'),
(8, 'Het ', 'het5@gmail.com', 'Hi im looking for foreign tour package. Please suggest me some.');

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
  `hotel_price` int(11) NOT NULL,
  `hotel_img` varchar(150) NOT NULL,
  `hotel_available` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_master`
--

INSERT INTO `hotel_master` (`hotel_id`, `package_id`, `hotel_name`, `hotel_address`, `hotel_night`, `hotel_price`, `hotel_img`, `hotel_available`) VALUES
(1, 3, 'Prince Residency', 'Mehra Gaun, Bhimtal ,Bhowali Road, Bhimtal, District, Nainital , 263136', 2, 10000, '11.jpg', 1),
(2, 4, ' Statue Of Unity Eco Camp', 'sou eco camp, Akteshwar opp Indian oil petrol pump, Garudeshwar, Narmada, Gujarat 393151, India., 393151 Akteshwar, India', 1, 3000, 'h1.jpg', 0),
(3, 4, 'Tent City Narmada', 'Tent City Narmada, Dyke -3, Sardar Sarovar Dam Site, Kevadiya, 393151 Kevadia, India ', 2, 7000, 'h2.jpg', 1),
(4, 5, 'The Fern Residency, Bhuj', 'Bhuj Madhapar Highway Plot No. 14 A , 14 B 15, Bhuj 370020 India', 4, 3597, 'h3.jpg', 1),
(5, 5, 'Regenta Resort Bhuj', 'Gmdc House Opp Hill Garden GMDC House, Bhuj 370001 India', 3, 2836, 'h4.jpg', 1),
(6, 5, 'Seven Sky Clarks Exotica', 'Seven Sky Clarks Exotica, Airport Ring Road, Bhuj 370001 India', 2, 2500, 'h5.jpg', 0),
(7, 6, 'Chokhi Dhani - The Palace Hotel', ' Plot No.415, Barmer Road, Indira Colony, Jaisalmer, India, 345001', 2, 3275, 'h6.jpg', 1),
(8, 6, 'Boutique Helsinki ', 'Boutique Helsinki,Bera Road, Postal Colony, Jaisalmer, India, 345001', 3, 4500, 'h7.jpg', 1),
(9, 6, 'WelcomHeritage Mohangarh Fort', 'Jaisalmer Road, Shri Mohangarh - 345003, District - Jaisalmer, Rajasthan, INDIA, 345003 Jaisalmer, India', 1, 6720, 'h8.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `img_master`
--

CREATE TABLE `img_master` (
  `img_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `img_url` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_master`
--

INSERT INTO `img_master` (`img_id`, `hotel_id`, `img_url`) VALUES
(2, 1, '2.jpg'),
(3, 2, 'sou-1.jpg'),
(4, 2, 'sou-3.jpg'),
(5, 2, 'sou-2.jpg'),
(6, 9, 'h9-5.jpg'),
(7, 9, 'h9-4.jpg'),
(8, 9, 'h9-3.jpg'),
(9, 9, 'h9-2.jpg'),
(10, 9, 'h9-1.jpg');

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
-- Stand-in structure for view `package report`
-- (See below for the actual view)
--
CREATE TABLE `package report` (
`package_name` varchar(70)
,`package_available` tinyint(1)
,`package_nights` int(10)
,`flight_include` tinyint(1)
,`package_desc` text
,`hotel_id` int(11)
,`hotel_name` varchar(50)
,`hotel_price` int(11)
);

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
(3, 'Bhimtal', 1, 2, 0, 7000, 'bhimtal.jpeg', 'Perched at a height of 1370masl, Bhimtal is an idyllic and less-crowded version of Nainital, 23 km away. Bhimtal is a scenic hill station, the charm of which lies in its off-beat, tranquil atmosphere. The picturesque Bhimtal Lake is a popular attraction for paddle boating, birding and nature walk.\r\n\r\nBounded by a dense forest of oaks, pine and shrubs, it is also known for a few ancient temples. The 17th-century Bhimeshwar Temple is a must-visit spot in the hilltown. Well connected by road, Bhimtal is an ideal weekend getaway from Delhi.'),
(4, 'Statue Of Unity', 1, 4, 0, 9000, 'sou.jpg', 'Sardar Sarovar Dam\r\nSardar Sarovar Dam is one of the world\'s largest concrete gravity dam which is 1.2 kms long and 163 mts hight from its deepest foundation level. It has 30 radial gates weighing about 450 tonnes each.\r\n\r\n\r\nKhalwani Eco Tourism\r\nKhalwani Eco-Tourism is located near Sardar Sarovar Dam along the bank of a perennial stream fed by the waters released from the Godbole Gate. For accommodation tents and tree house are available. It has facilities like children play area, campfire zone, amphitheater, nursery, painting kits with herbal colours for children, nature education etc. River rafting is one of the popular sport and a recreational activity in India. Steering through the unbridled water and passing through treacherous rapids, is something that every adventurer seeks. River Rafting at Khalwani Eco-Tourism on the River Narmada provides an excellent opportunity to experience this utterly exhilarating water sport. Visitors will also enjoy activities like river crossing, Burma Bridge, river rafting, tubing, rock climbing & rappelling.\r\n\r\n\r\nEkta Cruise\r\nA unique way to see the Statue of Unity, world tallest statue, is through the river cruise. A passenger boat gives a breathtaking view of th'),
(5, 'Kutch-Bhujj', 1, 3, 0, 5000, 'p1.jpeg', 'Kutch region of Gujarat is known world over for its extremely diverse flora and fauna, the culturally rich tribal natives and their unique arts and crafts. Life is celebrated here in its many forms, the colourful attire of the locals against the pristine white of the Rann of Kutch paints a flamboyant canvas. The region celebrates The Rann Utsav each year with much fanfare and gaiety attracting thousands of tourists each day of the Festival. Bhuj was the capital city of the princely state of Kutch, deriving its name from a hill called Bhujiyo Dungar which it is flanked by on one side while the other side is bracketed by The Hamirsar Lake. Bhuj boasts of the presence of many opulent palaces and thoughtfully curated art and craft museums. The tribal life in and around the Bhuj / Kutch region is diverse and unique with each tribe preserving and carrying on its traditional art generations after generations. The Banni Grasslands offer a distinctive experience of witnessing the vast open grasslands dotted by the Mud Huts or Bhungas of the Natives where hand embroidered masterpieces are turned out each day. Welcome to this mystical land that has so much to offer to the discerning traveller.'),
(6, 'Jaisalmer', 1, 2, 1, 12000, 'p2.jpg', 'Jaisalmer has been enriched by its Jain community, which has adorned the city with beautiful temples, notably the temples dedicated to the 16th Tirthankara, Shantinath, and 23rd Tirthankara, Parshvanath.\r\n\r\nThere are seven Jain temples in total which are situated within the Jaisalmer fort built during the 12th and 15th centuries. Among these temples, the biggest is the Paraswanath Temple; the others are Chandraprabhu temple, Rishabdev temple, Shitalnath Temple, Kunthunath Temple, and Shantinath Temple. Known for their exquisite work of art and architecture that was predominant in the medieval era the temples are built out of yellow sandstone and have intricate engravings on them.\r\n\r\nJaisalmer has some of the oldest libraries of India which contain rarest of the manuscripts and artefacts of Jain tradition. There are many pilgrimage centres around Jaisalmer such as Lodhruva (Lodarva), Amarsagar, Brahmsar and Pokharan.'),
(7, 'Dubai', 0, 7, 1, 50000, 'p3.jpeg', 'Dubai (/duËËˆbaÉª/ doo-BY; Arabic: Ø¯Ø¨ÙŠâ€Ž, romanized: Dubayy [dÊŠËˆbajj], Gulf Arabic pronunciation: [dÉ™Ëˆbaj]) is the most populous city in the United Arab Emirates (UAE) and the capital of the Emirate of Dubai.[5][6][7] Established in the 18th century as a small fishing village, the city grew rapidly in the early 21st century into a cosmopolitan metropolis with a focus on tourism and hospitality. Dubai is one of the world\'s most popular tourist destinations[8] with the second most five-star hotels in the world,[9] and the tallest building in the world, the Burj Khalifa.\r\n\r\nLocated in the eastern part of the Arabian Peninsula on the coast of the Persian Gulf, Dubai aims to be the business hub of Western Asia.[10] It is also a major global transport hub for passengers and cargo.[11] Oil revenue helped accelerate the development of the city, which was already a major mercantile hub. A centre for regional and international trade since the early 20th century, Dubai\'s economy relies on revenues from trade, tourism, aviation, real estate, and financial services.[12][13][14][15] Oil production contributed to less than 1 percent of the emirate\'s GDP in 2018.[16] According to government data, the population of Dubai is estimated at around 3,400,800 as of 8 September 2020.');

-- --------------------------------------------------------

--
-- Structure for view `package report`
--
DROP TABLE IF EXISTS `package report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `package report`  AS  select `package_master`.`package_name` AS `package_name`,`package_master`.`package_available` AS `package_available`,`package_master`.`package_nights` AS `package_nights`,`package_master`.`flight_include` AS `flight_include`,`package_master`.`package_desc` AS `package_desc`,`hotel_master`.`hotel_id` AS `hotel_id`,`hotel_master`.`hotel_name` AS `hotel_name`,`hotel_master`.`hotel_price` AS `hotel_price` from (`hotel_master` join `package_master` on((`hotel_master`.`package_id` = `package_master`.`package_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blog_master`
--
ALTER TABLE `blog_master`
  ADD PRIMARY KEY (`blog_id`);

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
-- AUTO_INCREMENT for table `blog_master`
--
ALTER TABLE `blog_master`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hotel_master`
--
ALTER TABLE `hotel_master`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `img_master`
--
ALTER TABLE `img_master`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inclusion_master`
--
ALTER TABLE `inclusion_master`
  MODIFY `inclusion_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_master`
--
ALTER TABLE `package_master`
  MODIFY `package_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
