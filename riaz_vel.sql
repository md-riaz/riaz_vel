-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 05:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riaz_vel`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `user_id`, `banner_title`, `banner_info`, `banner_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 1, 'Amazing Pure Nut Oil', 'Contrary to popular belief, Lorem Ipsum is  not simply random text. It has roots in a piece of classical Latin', '13.jpg', '2020-04-13 15:44:42', '2020-04-13 16:52:55', NULL),
(14, 1, 'Amazing Pure Nature Hohey', 'Contrary to popular belief, Lorem Ipsum is  not simply random text. It has roots in a piece of classical Latin', '14.jpg', '2020-04-13 15:45:16', '2020-04-13 15:45:17', NULL),
(15, 1, 'Amazing Pure Nature Coconut Oil', 'Contrary to popular belief, Lorem Ipsum is  not simply random text. It has roots in a piece of classical Latin', '15.jpg', '2020-04-13 15:45:56', '2020-04-14 11:02:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_thumbnail_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `blog_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_title`, `blog_thumbnail_photo`, `user_id`, `blog_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'We Can Ensure Your Comfortable Life', '1.jpg', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic\r\n\r\ntypesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-04-16 08:05:30', '2020-04-16 08:08:15', NULL),
(2, 'This is temporary', '2.png', 1, 'This is a HP Laptop', '2020-04-16 16:34:49', '2020-04-16 16:34:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `quantity`, `ip_address`, `created_at`, `updated_at`) VALUES
(10, 11, 3, '127.0.0.1', '2020-04-18 19:14:14', '2020-04-21 10:24:03'),
(11, 13, 3, '127.0.0.1', '2020-04-21 12:52:16', '2020-04-21 12:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `user_id`, `category_img`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 'Lenovo', 1, '12.png', '2020-04-14 15:23:24', '2020-04-14 15:23:24', NULL),
(13, 'Dell', 1, '13.jpg', '2020-04-14 15:24:26', '2020-04-14 15:24:27', NULL),
(14, 'Asus', 1, '14.jpg', '2020-04-14 15:25:05', '2020-04-14 15:25:05', NULL),
(15, 'Acer', 1, '15.jpg', '2020-04-14 15:27:32', '2020-04-14 15:27:32', NULL),
(16, 'HP', 1, '16.png', '2020-04-14 15:28:29', '2020-04-14 15:28:29', NULL),
(17, 'Apple', 1, '17.webp', '2020-04-14 15:29:11', '2020-04-14 15:29:11', NULL),
(18, 'Microsoft', 1, '18.jpg', '2020-04-14 15:30:10', '2020-04-14 15:30:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `validity_till` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `discount_amount`, `validity_till`, `created_at`, `updated_at`) VALUES
(5, 'BD10', 99, '2020-04-17', '2020-04-18 16:01:09', '2020-04-18 16:01:09'),
(9, 'BOGURA10', 10, '2020-04-30', '2020-04-21 09:40:08', '2020-04-21 09:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq_question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq_question`, `faq_answer`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Why Lorem ipsum dolor sit amet, consectetur adipisicing elit?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', 1, '2020-04-15 10:42:44', '2020-04-15 10:42:44'),
(3, 'Why Lorem ipsum dolor sit amet, consectetur adipisicing elit?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', 1, '2020-04-15 10:49:50', '2020-04-15 10:49:50'),
(4, 'Why Lorem ipsum dolor sit amet, consectetur adipisicing elit?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', 1, '2020-04-15 10:49:56', '2020-04-15 10:49:56'),
(6, 'What is this class?', 'This is laravel practice class', 1, '2020-04-15 19:13:42', '2020-04-15 19:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'MD RIAZ', 'riazmd582@gmail.com', 'Check it out', 'Hi', '2020-04-12 11:12:48', '2020-04-14 13:53:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_04_02_144330_create_categories_table', 2),
(8, '2020_04_11_234654_create_messages_table', 3),
(12, '2020_04_13_181620_create_banners_table', 4),
(15, '2020_04_14_170554_create_products_table', 5),
(18, '2020_04_14_223613_create_testimonials_table', 6),
(21, '2020_04_15_160724_create_faqs_table', 7),
(25, '2020_04_16_011920_create_blogs_table', 8),
(27, '2020_04_16_180253_create_product_multiple_photos_table', 9),
(28, '2020_04_16_190924_create_carts_table', 10),
(29, '2020_04_18_185452_create_coupons_table', 11),
(31, '2020_04_18_222238_create_wishlists_table', 12);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_thumbnail_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `product_price`, `product_thumbnail_photo`, `product_quantity`, `product_short_description`, `product_long_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'Lenovo Ideapad 330 AMD E2-9000 14\" HD Laptop With Genuine Win 10 (Black)', 12, 25500, '11.jpg', 200, 'Model: Lenovo IP330 AMD E2-9000 (Clocks peed 1.8 GHz up to 2.2 GHz) 4GB DDR4 Ram 1TB HDD 14\" HD (1366 x 768)', 'Processor	AMD E2-9000 Processor (Clocks peed 1.8 GHz up to 2.2 GHz , 2 Cores)\r\nDisplay	14\" HD (1366 x 768)\r\nMemory	4 GB onboard DDR4\r\nStorage	1 TB SATA HDD\r\nGraphics	AMD R2 Graphics\r\nOperating System	Windows 10 home 64 bit\r\nBattery	Up to 6 hours\r\nAudio	2 x 1.5 W speakers with Dolby Audio™\r\nInput Devices\r\nKeyboard	Standard keyboard\r\nOptical Drive	Yes\r\nWebCam	HD Camera\r\nCard Reader	4-in-1 card reader (SD, SDHC, SDXC, MMC)\r\nNetwork & Wireless Connectivity\r\nWi-Fi	1 x 1 AC WiFi\r\nBluetooth	Bluetooth 4.1\r\nPorts, Connectors & Slots\r\nUSB (s)	USB Type-C 3.1\r\n2 x USB 3.0 (one charging)\r\nHDMI	1 x HDMI\r\nAudio Jack Combo	Audio jack\r\nPhysical Specification\r\nDimensions (W x D x H)	378 mm x 260 mm x 22.9 mm / 14.1\" x 10.2\" x 0.9\"\r\nWeight	Starting at 2.2 kg / 4.85 lbs\r\nColor(s)	Black\r\nWarranty\r\nManufacturing Warranty	02 years International Limited Warranty (Terms & condition Apply As Per Lenovo)\r\n01 Year battery & adapter', '2020-04-18 18:52:20', '2020-04-18 18:52:20', NULL),
(12, 'Lenovo IdeaPad 330 Ryzen 5 2500U 2GB Graphics 15.6\" FHD Laptop With Windows 10', 12, 53000, '12.jpeg', 10, 'Model: Lenovo IdeaPad 330 AMD Ryzen 5 2500U (2.0GHz up to 3.6GHz) 8GB 2400MHz RAM + 1TB HDD AMD Radeon 540 2GB Graphics 15.6” FHD (1920x1080) LED Display', 'Model: Lenovo IdeaPad 330\r\nAMD Ryzen 5 2500U (2.0GHz up to 3.6GHz)\r\n8GB 2400MHz RAM + 1TB HDD\r\nAMD Radeon 540 2GB Graphics\r\n15.6” FHD (1920x1080) LED Display', '2020-04-18 18:54:14', '2020-04-18 18:54:14', NULL),
(13, 'HP ENVY x360 Laptop - 15t touch Best Value', 16, 1400, '13.jpg', 100, 'Windows 10 Pro 64 10th Gen Intel® Core™ i7 processor Intel® UHD Graphics 16 GB memory; 1 TB SSD storage', 'HP ENVY x360 Laptop - 15t touch Best Value\r\nMore power, more security, and more ways to do it all. The convertible 15\" HP ENVY x360 lets you adapt to anything your day has in store, without sacrificing power or security. With the power and versatility you want and a suite of cutting-edge security features you need, you can stay productive and protected like never before.\r\n\r\nOPERATING SYSTEM	Windows 10 Pro 64\r\nPROCESSOR AND GRAPHICS	Intel® Core™ i7-10510U (1.8 GHz, up to 4.9 GHz, 8 MB cache, 4 cores)+Intel® UHD Graphics\r\nIntel® Core™ i7-10510U (1.8 GHz, up to 4.9 GHz, 8 MB cache, 4 cores)+NVIDIA® GeForce® MX250 (4 GB GDDR5)\r\nIntel® Core™ i7-10510U (1.8 GHz, up to 4.9 GHz, 8 MB cache, 4 cores)+NVIDIA® GeForce® MX250 (4 GB GDDR5)(With OLED)\r\nDISPLAY	15.6\" FHD IPS micro-edge WLED-backlit multitouch-enabled edge-to-edge glass (1920 x 1080)(TS)\r\n15.6\" FHD IPS micro-edge WLED-backlit multitouch-enabled edge-to-edge glass with integrated privacy screen (1920 x 1080)(TS)\r\n15.6\" diagonal 4K UWVA micro-edge AMOLED (3840 x 2160) (Touch)\r\nMEMORY	16 GB DDR4-2666 SDRAM (2x8GB)\r\nSTORAGE	1 TB PCIe® NVMe™ M.2 SSD\r\nOFFICE SOFTWARE	Microsoft® Office 365 Personal 1-year - Save $20 instantly\r\nMicrosoft® Office 365 Home 1-year - Save $20 instantly\r\nMicrosoft® Office Home and Student 2019\r\nMicrosoft® Office 2019 Home and Business\r\nMicrosoft® Office 2019 Professional\r\nMCAFEE LIVESAFE(TM) SECURITY SOFTWARE	Security Software Trial\r\nMcAfee LiveSafe™ 12 months - Save $50 instantly\r\nMcAfee LiveSafe™ 24 months - Save $99.99 instantly\r\nMcAfee LiveSafe™ 36 months - Save $149.98 instantly\r\nPRIMARY BATTERY	4-cell, 53 Wh Lithium-ion prismatic Battery\r\nKEYBOARD	Full-size island-style backlit keyboard(Natural Silver)\r\nFull-size island-style backlit keyboard with integrated Privacy Screen(Privacy Screen)\r\nPERSONALIZATION	HP Wide Vision HD Camera with Dual array digital microphone (Natural Silver)(Touchscreen)\r\nHP Wide Vision HD Camera with Dual array digital microphone (Natural Silver)(Touchscreen)\r\nWIRELESS TECHNOLOGY	Intel® 802.11b/g/n/ac (2x2) Wi-Fi® and Bluetooth® 5 Combo(MU-MIMO supported)\r\nBATTERY RECHARGE TIME	Supports battery fast charge: approximately 50% in 45 minutes [5]\r\nAUDIO	Bang & Olufsen, dual speakers, HP Audio Boost\r\nPOINTING DEVICE	Precision Touchpad Support\r\nNETWORK INTERFACE	Integrated 10/100/1000 GbE LAN\r\nEXPANSION SLOTS	1 multi-format SD media card reader\r\nEXTERNAL I/O PORTS	1 headphone/microphone combo; 1 USB 3.1 Gen 1 Type-C™ (Data Transfer Only, 5 Gb/s signaling rate); 1 USB 3.1 Gen 1 Type-A (HP Sleep and Charge); 1 USB 3.1 Gen 1 Type-A (Data Transfer Only)\r\nPOWER SUPPLY	65 W AC power adapter\r\nENERGY EFFICIENCY	ENERGY STAR® certified; EPEAT® Silver registered\r\nDIMENSIONS (W X D X H)	14.13 x 9.68 x 0.67 in\r\nWEIGHT	4.53 lb\r\nWARRANTY	1 year limited hardware warranty (information at www.hp.com/support); 90 day phone support (from date of purchase); complimentary chat support within warranty period (at www.hp.com/go/contacthp)\r\nSOFTWARE INCLUDED	McAfee LiveSafe™ 30-day trial offer (Internet access required. First 30 days included. Subscription required for live updates afterwards.) Office 365 Personal 1-year [2]\r\nSECURITY MANAGEMENT	Webcam kill switch\r\n[1] New Dropbox users are eligible to get 25 GB of Dropbox space free for 12 months from date of registration. For complete details and terms of use, including cancellation policies, visit the Dropbox website at https://www.dropbox.com/help/space/hp-promotion. Internet service required and not included.\r\n[2] Free 30 day subscription of McAfee LiveSafe service included. Internet access required and not included. Subscription required after expiration.\r\n[5] Recharges your battery up to 50% within 45 minutes when the system is off (using “shut down” command). Recommended for use with the HP adapter provided with the notebook, not recommended with a smaller capacity battery charger. After charging has reached 50% capacity, charging speed will return to normal speed. Charging time may vary +/-10% due to System tolerance. Available on select HP products. See http://store.hp.com for a full list of product features.\r\n \r\nSee all offers\r\nStarting at $1,699.99 $1,399.99\r\nCompareCUSTOMIZE & BUY\r\nHP Spectre x360 Laptop - 15t touch - Top view closed \r\nHP Spectre x360 Laptop - 15t touch - Center \r\nHP Spectre x360 Laptop - 15t touch - Left \r\nHP Spectre x360 Laptop - 15t touch - Left rear \r\nHP Spectre x360 Laptop - 15t touch - Right \r\nHP Spectre x360 Laptop - 15t touch - Right profile closed \r\nHP Spectre x360 Laptop - 15t touch - Right rear \r\nHP Spectre x360 Laptop - 15t touch - Right screen center \r\nHP Spectre x360 Laptop - 15t touch - Top view closed \r\nHP Spectre x360 Laptop - 15t touch - Center\r\nPrevNext\r\nHP Spectre x360 Laptop - 15t touch\r\nCustom built to your specs\r\n (86) 8NW68AV_1 Part number: 8NW68AV_1ENERGY STAR\r\nWindows 10 Home 64\r\n10th Gen Intel® Core™ i7 processor\r\nNVIDIA® GeForce® MX250 (2 GB)\r\n16 GB memory; 256 GB SSD storage\r\nTech spec\r\n \r\nSee all offers\r\nStarting at $1,649.99\r\nCompareCUSTOMIZE & BUY\r\nHP Spectre x360 Laptop - 15t touch - Top view closed \r\nHP Spectre x360 Laptop - 15t touch - Center', '2020-04-18 18:56:25', '2020-04-18 18:56:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_multiple_photos`
--

CREATE TABLE `product_multiple_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_multiple_photos`
--

INSERT INTO `product_multiple_photos` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(19, 11, '11-0.jpg', '2020-04-18 18:52:20', '2020-04-18 18:52:20'),
(20, 11, '11-1.jpg', '2020-04-18 18:52:20', '2020-04-18 18:52:20'),
(21, 11, '11-2.jpg', '2020-04-18 18:52:20', '2020-04-18 18:52:20'),
(22, 12, '12-0.jpg', '2020-04-18 18:54:14', '2020-04-18 18:54:14'),
(23, 12, '12-1.jpg', '2020-04-18 18:54:14', '2020-04-18 18:54:14'),
(24, 12, '12-2.jpg', '2020-04-18 18:54:14', '2020-04-18 18:54:14'),
(25, 12, '12-3.jpg', '2020-04-18 18:54:14', '2020-04-18 18:54:14'),
(26, 12, '12-4.jpg', '2020-04-18 18:54:14', '2020-04-18 18:54:14'),
(27, 12, '12-5.jpeg', '2020-04-18 18:54:15', '2020-04-18 18:54:15'),
(28, 12, '12-6.jpg', '2020-04-18 18:54:15', '2020-04-18 18:54:15'),
(29, 13, '13-0.jpg', '2020-04-18 18:56:26', '2020-04-18 18:56:26'),
(30, 13, '13-1.jpg', '2020-04-18 18:56:26', '2020-04-18 18:56:26'),
(31, 13, '13-2.jpg', '2020-04-18 18:56:26', '2020-04-18 18:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speech` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `client_photo`, `speech`, `created_at`, `updated_at`) VALUES
(3, 'Elizabeth Ayna', 'CEO of Woman Fedaration', '3.png', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical LatinContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin', '2020-04-14 18:19:46', '2020-04-14 18:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md Riaz Uddin', 'riazmd582@gmail.com', 1, '2020-04-10 08:44:41', '$2y$10$RSXuG3zviYYZP.gKTUETjOwwfOqryBu6P.HUhXz5uwZDZWfR7ViXe', 'bsH1oYzFzuB1lF7oGQhogEiZgb2G82fYCLMnNx0z6h4u7pMD8m62R9s8XBcR', '2020-04-10 08:44:06', '2020-04-10 18:33:39'),
(2, 'Abu Talha', 'at@gmail.com', 0, '2020-04-14 15:37:12', '$2y$10$1EO5iEvZUP8KcR/kzPy8Wen4PPxNsMmsKQerUutPlzz1YrvEEv6Rm', NULL, '2020-04-14 15:37:01', '2020-04-14 15:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `product_id`, `ip_address`, `created_at`, `updated_at`) VALUES
(7, 13, '127.0.0.1', '2020-04-18 19:14:00', '2020-04-18 19:14:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_multiple_photos`
--
ALTER TABLE `product_multiple_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_multiple_photos`
--
ALTER TABLE `product_multiple_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
