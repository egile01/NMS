-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2022 at 05:52 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `PId` int(11) DEFAULT NULL,
  `IsOrderPlaced` int(5) DEFAULT NULL,
  `OrderNumber` bigint(12) DEFAULT NULL,
  `PaymentMethod` varchar(200) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `UserId`, `PId`, `IsOrderPlaced`, `OrderNumber`, `PaymentMethod`, `orderDate`) VALUES
(26, 7, 6, 1, 155060940, 'Cash on Delivery', '2022-12-05 13:59:46'),
(27, 7, 4, 1, 155060940, 'Cash on Delivery', '2022-12-05 13:59:52'),
(28, 7, 5, 1, 155060940, 'Cash on Delivery', '2022-12-06 06:48:48'),
(29, 7, 1, 1, 155060940, 'Cash on Delivery', '2022-12-06 07:05:03'),
(30, 7, 3, 1, 155060940, 'Cash on Delivery', '2022-12-06 07:37:39'),
(31, 7, 6, 1, 155060940, 'Cash on Delivery', '2022-12-06 08:35:45'),
(32, 7, 2, 1, 155060940, 'Cash on Delivery', '2022-12-06 08:37:14'),
(34, 6, 6, 1, 563346249, 'Credit Card', '2022-12-07 05:39:11'),
(35, 6, 6, 1, 232988985, 'Credit Card', '2022-12-07 07:14:17'),
(36, 6, 2, 1, 663588486, 'Credit Card', '2022-12-07 07:16:05'),
(37, 6, 3, 1, 663588486, 'Credit Card', '2022-12-07 07:16:12'),
(38, 7, 6, 1, 632540602, 'Cash on Delivery', '2022-12-08 12:18:52'),
(39, 6, 6, NULL, NULL, NULL, '2022-12-08 13:32:19'),
(41, 8, 2, 1, 404756497, 'Cash on Delivery', '2022-12-25 04:31:29'),
(42, 8, 4, 1, 404756497, 'Cash on Delivery', '2022-12-25 04:31:35'),
(43, 8, 5, NULL, NULL, NULL, '2022-12-25 04:49:28'),
(44, 8, 5, NULL, NULL, NULL, '2022-12-25 04:50:04'),
(45, 8, 2, NULL, NULL, NULL, '2022-12-25 17:53:58'),
(46, 9, 5, 1, 613576588, 'Cash on Delivery', '2022-12-26 16:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Akash Jagdale', 'akash', 1234567890, 'akash@gmail.com', 'Shree@001', '2022-12-14 10:06:52');


-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(5) NOT NULL,
  `CategoryName` varchar(250) DEFAULT NULL,
  `CategoryDescription` mediumtext DEFAULT NULL,
  `CreatedBy` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `CategoryDescription`, `CreatedBy`, `CreationDate`) VALUES
(1, 'Plant', 'There is variety of plants available.\r\nThere is variety of plants available.\r\nThere is variety of plants available.There is variety of plants available.\r\nThere is variety of plants available.There is variety of plants available.There is variety of plants available.', '1', '2022-12-02 06:55:38'),
(2, 'Flowers', 'A flower, sometimes known as a bloom or blossom, is the reproductive structure found in flowering plants (plants of the division Angiospermae). The biological function of a flower is to facilitate reproduction, usually by providing a mechanism for the union of sperm with eggs. Flowers may facilitate outcrossing (fusion of sperm and eggs from different individuals in a population) resulting from cross-pollination or allow selfing (fusion of sperm and egg from the same flower) when self-pollination occurs.', '1', '2022-12-02 07:05:16'),
(3, 'Seeds', 'A seed is an embryonic plant enclosed in a protective outer covering, along with a food reserve. The formation of the seed is a part of the process of reproduction in seed plants, the spermatophytes, including the gymnosperm and angiosperm plants.\r\n\r\nSeeds are the product of the ripened ovule, after the embryo sac is fertilized by sperm from pollen, forming a zygote. The embryo within a seed develops from the zygote, and grows within the mother plant to a certain size before growth is halted. The seed coat arises from the integuments of the ovule.', '1', '2022-12-02 07:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `Name`, `Email`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(1, 'Kiran', 'kran@gmail.com', 'cost of volvo place pritampura to dwarka', '2021-07-05 07:26:24', 1),
(2, 'Sarita Pandey', 'sar@gmail.com', 'huiyuihhjjkhkjvhknv iyi tuyvuoiup', '2021-07-09 12:48:40', 1),
(3, 'Test', 'test@gmail.com', 'Want to know price of forest cake', '2021-07-16 12:51:06', 1),
(4, 'Shanu', 'shanu@gmail.com', 'hkjhkjhk', '2021-07-17 07:32:14', 1),
(5, 'Taanu Sharma', 'tannu@gmail.com', 'ytjhdjguqwgyugjhbjdsuy\r\nkjhjkwhkd\r\nljkkljwq\r\nmlkjol ', '2021-07-28 12:09:22', 1),
(6, 'Harish Kumar', 'hari@gmail.com', 'rytweiuyeiouoipoipo[po\r\njknkjlkdsflkjflkdjslk;lsdkf;l\r\nn,mn,ncxm.,m.m.,.', '2021-07-31 16:34:16', NULL),
(7, 'test', 'test@gmail.com', 'Test', '2021-08-25 16:56:19', 1),
(8, 'Sarita Pandey', 'sar@gmail.com', 'ytgjq[prooaerh', '2022-02-07 11:38:47', 1),
(9, 'Rashi Singh', 'rashu@gmail.com', 'Test Message', '2022-12-07 13:51:33', NULL),
(10, 'Anuj Kumar', 'ak@gmail.com', 'This is a test enquiry', '2022-12-26 16:08:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblorderaddresses`
--

CREATE TABLE `tblorderaddresses` (
  `ID` int(10) NOT NULL,
  `UserId` int(5) DEFAULT NULL,
  `Ordernumber` bigint(12) DEFAULT NULL,
  `Flatnobuldngno` varchar(200) DEFAULT NULL,
  `StreetName` varchar(200) DEFAULT NULL,
  `Area` varchar(200) DEFAULT NULL,
  `Landmark` varchar(200) DEFAULT NULL,
  `City` varchar(200) DEFAULT NULL,
  `Zipcode` int(10) DEFAULT NULL,
  `Phone` bigint(11) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `PaymentMethod` varchar(200) DEFAULT NULL,
  `OrderTime` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(200) DEFAULT NULL,
  `Remark` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorderaddresses`
--

INSERT INTO `tblorderaddresses` (`ID`, `UserId`, `Ordernumber`, `Flatnobuldngno`, `StreetName`, `Area`, `Landmark`, `City`, `Zipcode`, `Phone`, `Email`, `PaymentMethod`, `OrderTime`, `Status`, `Remark`, `UpdationDate`) VALUES
(6, 7, 155060940, 'J-980, Blue Moon Apartment ', 'Haji Nagar', 'Basan Kunj', 'near reliance fresh', '', 201718, 7979879879, 'ghj@gmail.com', 'Cash on Delivery', '2022-12-26 07:05:42', 'Delivered', 'Order Delivered', '2022-12-26 07:05:42'),
(7, 6, 563346249, 'K-890 Ratan Vihar', 'Mongolia Street', 'Janki Das Apartment', '', '', 253689, 4654654654, 'jk@gmail.com', 'Credit Card', '2022-12-07 07:52:09', 'Delivered', 'Order has been delivered', '2022-12-07 07:52:09'),
(8, 6, 232988985, 'L-890, HVIP Apartment', 'Nehru Nagar', 'Ghaziabad', 'Near Shiv Mandir', '', 564789, 7898789798, 'shiv@gmail.com', 'Credit Card', '2022-12-26 07:40:28', 'Order Cancelled', 'cancell', '2022-12-26 07:40:28'),
(9, 6, 663588486, 'J&K Block, House Number-313', 'Laxmi Nagar', 'Delhi', 'Near V3S Mall', '', 110010, 4654654564, 'jk@gmail.com', 'Credit Card', '2022-12-26 07:41:16', 'Pickup', 'fdf', '2022-12-26 07:41:16'),
(10, 8, 404756497, 'A123 Rama Apartments', 'ABC Street', 'TEst', 'NA', '', 201201, 8965478952, 'ak@rsasf@test.com', 'Cash on Delivery', '2022-12-26 07:41:07', 'Order Confirmed', 'order confirmed', '2022-12-26 07:41:07'),
(11, 7, 632540602, 'H.No-K-890', 'Kalyan ji strrest', 'Monga Gao', 'Near Shiv Mandir', '', 221018, 7797897897, 'hjk@gmail.com', 'Cash on Delivery', '2022-12-26 07:39:56', 'Delivered', 'Delivered\r\n', '2022-12-26 07:39:56'),
(12, 9, 613576588, 'E 74 Sector50', 'E block', 'Sector 50', 'NA', '', 201301, 3366998855, 'test@test/com', 'Cash on Delivery', '2022-12-26 16:05:54', 'Delivered', 'Order delivered successfully\r\n', '2022-12-26 16:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '<div><font color=\"#202124\" face=\"arial, sans-serif\"><b>Our mission declares our purpose of existence as a company and our objectives.</b></font></div><div><font color=\"#202124\" face=\"arial, sans-serif\"><b><br></b></font></div><div><font color=\"#202124\" face=\"arial, sans-serif\"><b>To give every customer much more than what he/she asks for in terms of quality, selection, value for money and customer service, by understanding local tastes and preferences and innovating constantly to eventually provide an unmatched experience in jewellery shopping.</b></font></div>', NULL, NULL, NULL),
(2, 'contactus', 'Contact Us', '890,Sector 62, Gyan Sarovar, GAIL Noida(Delhi/NCR)', 'info@gmail.com', 7896541239, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `ID` int(5) NOT NULL,
  `category` int(5) DEFAULT NULL,
  `productName` varchar(250) DEFAULT NULL,
  `productweight` varchar(100) DEFAULT NULL,
  `productPrice` decimal(10,0) DEFAULT NULL,
  `productDescription` mediumtext DEFAULT NULL,
  `productInstruction` mediumtext DEFAULT NULL,
  `shippingCharge` decimal(10,0) DEFAULT NULL,
  `productAvailability` varchar(50) DEFAULT NULL,
  `productImage1` varchar(250) DEFAULT NULL,
  `productImage2` varchar(250) DEFAULT NULL,
  `productImage3` varchar(250) DEFAULT NULL,
  `addedBy` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`ID`, `category`, `productName`, `productweight`, `productPrice`, `productDescription`, `productInstruction`, `shippingCharge`, `productAvailability`, `productImage1`, `productImage2`, `productImage3`, `addedBy`, `CreationDate`) VALUES
(1, 1, 'Spider Plant in 4 Inch White Ceramic Pot', '2 kg', '169', 'An excellent indoor and air-purifying plant, the Spider plant (Chlorophytum comosum) is one of the best plants to grow.\r\nIt is a low-maintenance plant and multiplies rapidly through runners.\r\nProvide bright spaces indoors for faster growth.', 'Water: Water well but avoid waterlogging at all costs. \r\nSoil: Grow in well-drained soil.\r\nSunlight: This plant thrives in bright indirect sunlight. \r\nThis plant also grows with regular pruning and can be easily propagated through the shoots.', '50', 'In Stock', 'da8ab9bd0741d0ffcbf3732cfa919947.jpg', 'da8ab9bd0741d0ffcbf3732cfa919947.jpg', 'da8ab9bd0741d0ffcbf3732cfa919947.jpg', '1', '2022-12-02 07:29:49'),
(2, 1, 'Rama Tulsi in 6 Inch Plastic Pot', '1 kg', '99', 'Rama Tulsi in 6 Inch Plastic Pot', 'Take care in winter', '50', 'In Stock', '683ecab0efce23d9fcf2289ff9ab1d8e.jpg', '683ecab0efce23d9fcf2289ff9ab1d8e.jpg', '683ecab0efce23d9fcf2289ff9ab1d8e.jpg', '1', '2022-12-02 11:31:01'),
(3, 2, 'Motia Jasmine (any colour) in 8 Inch Nursery Bag', '1 kg', '99', 'Motia in 8 Inch Nursery Bag', 'Motia in 8 Inch Nursery Bag', '50', 'In Stock', '8859a41ca20fb9b30e746bcceb63cd5f.jpg', '8859a41ca20fb9b30e746bcceb63cd5f.jpg', '8859a41ca20fb9b30e746bcceb63cd5f.jpg', '1', '2022-12-02 11:32:38'),
(4, 2, 'Petunia (Any Colour) in 4 Inch Nursery Bag', '500 gm', '99', 'Petunia (Any Colour) in 4 Inch Nursery Bag', 'Petunia (Any Colour) in 4 Inch Nursery Bag', '50', 'In Stock', 'd963acd31135244c74655c4f5362f338.jpg', 'd963acd31135244c74655c4f5362f338.jpg', 'd963acd31135244c74655c4f5362f338.jpg', '1', '2022-12-02 11:37:52'),
(5, 3, ' Dahlia Double Seeds - Excellent Germination', '50 gm', '56', 'This package will contain a packet of seeds. Plant in nursery bags, planters, propagation tubes, or directly in the ground!', 'Water: Water regularly in a moderate amount.\r\nSoil: Use nutrient-rich soil with cocopeat for a satisfactory bloom.\r\nSunlight: Initially, keep the seed in a shaded or low sunlight area. After germination, when you see a sprout of the plant, keep it in moderate sunlight for proper growth. \r\nSow, grow, nurture!', '0', 'In Stock', '0941e81f18b304146f49333db79bc9bb.jpg', '0941e81f18b304146f49333db79bc9bb.jpg', '0941e81f18b304146f49333db79bc9bb.jpg', '1', '2022-12-02 11:50:52'),
(6, 3, 'Methi Seeds - Excellent Germination', '120 gm', '50', 'Methi Seeds - Excellent Germination', 'Methi Seeds - Excellent Germination', '0', 'In Stock', '45c6efe6286a812ef8e105365b8c4e43.jpg', '36c85f8a2f1f156287a5ebebddc5ed7ewebp', 'e7f1779987207c04895d126e9360504d.jpg', '1', '2022-12-02 11:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscriber`
--

CREATE TABLE `tblsubscriber` (
  `ID` int(5) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `DateofSub` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsubscriber`
--

INSERT INTO `tblsubscriber` (`ID`, `Email`, `DateofSub`) VALUES
(8, 'money@gmail.com', '2022-02-09 11:19:40'),
(9, 'kunal@gmail.com', '2022-12-08 12:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbltracking`
--

CREATE TABLE `tbltracking` (
  `ID` int(10) NOT NULL,
  `OrderId` bigint(12) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `status` char(50) DEFAULT NULL,
  `StatusDate` timestamp NULL DEFAULT current_timestamp(),
  `OrderCanclledByUser` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltracking`
--

INSERT INTO `tbltracking` (`ID`, `OrderId`, `remark`, `status`, `StatusDate`, `OrderCanclledByUser`) VALUES
(13, 424108694, 'delivery boy take the order', 'Pickup', '2022-02-04 07:19:47', NULL),
(14, 424108694, 'Delivery boy is on the way', 'On The Way', '2022-02-04 07:21:25', NULL),
(15, 424108694, 'Your order has been delivered', 'Delivered', '2022-02-04 07:21:48', NULL),
(16, 624951460, 'Order Confiremd', 'Order Confirmed', '2022-02-04 07:28:09', NULL),
(17, 624951460, 'Order Has been pickup', 'Pickup', '2022-02-04 07:30:45', NULL),
(18, 624951460, 'Delivery boy is on the way', 'On The Way', '2022-02-04 07:32:40', NULL),
(19, 624951460, 'Order has been deliver', 'Delivered', '2022-02-04 07:34:55', NULL),
(20, 260984104, 'Order Cancelled', 'Order Cancelled', '2022-02-04 08:37:29', NULL),
(21, 260984104, 'tyty', 'Order Cancelled', '2022-02-04 08:40:15', 1),
(22, 424108694, 'gthth', 'Order Cancelled', '2022-02-04 12:23:13', 1),
(23, 284289657, 'cancel', 'Order Cancelled', '2022-02-04 12:27:36', 1),
(24, 663588486, 'No longer need', 'Order Cancelled', '2022-12-07 07:20:29', 1),
(25, 663588486, 'cancel', 'Order Cancelled', '2022-12-07 07:27:12', 1),
(26, 563346249, 'Order is confirmed', 'Order Confirmed', '2022-12-07 07:50:16', NULL),
(27, 563346249, 'Your order has been picked up', 'Pickup', '2022-12-07 07:51:05', NULL),
(28, 563346249, 'Delivery boy is on the way', 'On The Way', '2022-12-07 07:51:37', NULL),
(29, 563346249, 'Order has been delivered', 'Delivered', '2022-12-07 07:52:09', NULL),
(30, 563346249, 'fgfg', 'Order Cancelled', '2022-12-07 07:53:33', 1),
(31, 155060940, 'Order Confirmed', 'Order Confirmed', '2022-12-26 06:59:53', NULL),
(32, 155060940, 'Order Has been picked by delivery boy', 'Pickup', '2022-12-26 07:04:30', NULL),
(33, 155060940, 'Delivery boys is on the way', 'On The Way', '2022-12-26 07:05:15', NULL),
(34, 155060940, 'Order Delivered', 'Delivered', '2022-12-26 07:05:42', NULL),
(35, 632540602, 'confirmed', 'Order Confirmed', '2022-12-26 07:35:47', NULL),
(36, 632540602, 'Order Pickup', 'Pickup', '2022-12-26 07:36:14', NULL),
(37, 632540602, 'On the way', 'On The Way', '2022-12-26 07:37:46', NULL),
(38, 632540602, 'Delivered\r\n', 'Delivered', '2022-12-26 07:39:56', NULL),
(39, 232988985, 'cancell', 'Order Cancelled', '2022-12-26 07:40:28', NULL),
(40, 663588486, 'Confirmed', 'Order Confirmed', '2022-12-26 07:40:45', NULL),
(41, 404756497, 'order confirmed', 'Order Confirmed', '2022-12-26 07:41:07', NULL),
(42, 663588486, 'fdf', 'Pickup', '2022-12-26 07:41:16', NULL),
(43, 613576588, 'Order is confirmed', 'Order Confirmed', '2022-12-26 16:04:53', NULL),
(44, 613576588, 'Order picked', 'Pickup', '2022-12-26 16:05:11', NULL),
(45, 613576588, 'Order is on the way', 'On The Way', '2022-12-26 16:05:39', NULL),
(46, 613576588, 'Order delivered successfully\r\n', 'Delivered', '2022-12-26 16:05:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `CompanyName` varchar(250) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `Country` varchar(250) DEFAULT NULL,
  `City` varchar(250) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FirstName`, `LastName`, `CompanyName`, `Address`, `Country`, `City`, `Email`, `MobileNumber`, `Password`, `regDate`) VALUES
(4, 'Akshay', 'jagdale', 'xyz pvt', 'H-990, Pune', 'IN', 'Pune', 'ak@gmail.com', 09876543211, '202cb962ac59075b964b07152d234b70', '2023-03-08 10:05:17'),
(5, 'test', 'test1', 'Macintosh', 'H-990, near kasumbhi apartment', 'IN', 'Merrut', 'sar@gmail.com', 7987979797, '202cb962ac59075b964b07152d234b70', '2022-02-02 06:12:53'),
(6, 'Manish ', 'Sisodia', 'ACB PVT LTD', 'H-990, near kasumbhi apartment', 'IN', 'Jaunpur', 'manish@gmail.com', 8979898989, '202cb962ac59075b964b07152d234b70', '2022-02-05 09:49:18'),
(7, 'Test', 'Test1', 'HCL PVT lTd', '  H-990, near kasumbhi apartment', 'IN', 'Aligarh(UP)', 'rahul@gmail.com', 7797979797, '202cb962ac59075b964b07152d234b70', '2022-12-03 13:33:51'),


-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `UserId`, `ProductId`, `postingDate`) VALUES
(5, 6, 32, '2022-02-05 10:15:13'),
(6, 5, 27, '2022-02-07 09:32:46'),
(7, 7, 0, '2022-12-05 13:54:59'),
(12, 7, 5, '2022-12-08 12:19:04'),
(13, 8, 5, '2022-12-25 04:49:59'),
(14, 8, 5, '2022-12-25 18:00:11'),
(15, 8, 4, '2022-12-25 18:00:23'),
(17, 9, 5, '2022-12-26 16:03:10'),
(18, 9, 3, '2022-12-26 16:03:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `OrderNumber` (`OrderNumber`),
  ADD KEY `uid` (`UserId`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblorderaddresses`
--
ALTER TABLE `tblorderaddresses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `useridd` (`UserId`),
  ADD KEY `orderid` (`Ordernumber`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsubscriber`
--
ALTER TABLE `tblsubscriber`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltracking`
--
ALTER TABLE `tbltracking`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `OrderId` (`OrderId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `useriddd` (`UserId`),
  ADD KEY `productidddddd` (`ProductId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblorderaddresses`
--
ALTER TABLE `tblorderaddresses`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblsubscriber`
--
ALTER TABLE `tblsubscriber`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbltracking`
--
ALTER TABLE `tbltracking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `uid` FOREIGN KEY (`UserId`) REFERENCES `users` (`id`);

--
-- Constraints for table `tblorderaddresses`
--
ALTER TABLE `tblorderaddresses`
  ADD CONSTRAINT `orderid` FOREIGN KEY (`Ordernumber`) REFERENCES `orders` (`OrderNumber`),
  ADD CONSTRAINT `useridd` FOREIGN KEY (`UserId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
