-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2020 at 04:41 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'http://',
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'http://',
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'http://',
  `gplus_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'http://',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `phone_number`, `email`, `address`, `facebook_url`, `twitter_url`, `linkedin_url`, `gplus_url`, `created_at`, `updated_at`) VALUES
(1, '017XX - XXXXXX', 'riazmd582@gmail.com', 'Bogura, Bogura', 'http://facebook.com', 'http://twitter.com', 'http://linkedin.com', 'http://plus.google.com', NULL, '2020-04-30 16:15:02');

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
(1, 1, 'Amazing Pure Nature Hohey', 'If you are a honey connoisseur, you will eventually come across Acacia Honey.', '1.jpg', '2020-04-30 15:28:03', '2020-04-30 15:28:04', NULL),
(2, 1, 'Amazing Pure Nature Coconut Oil', 'Clear oil, melting point is 25-29 deg C so it is generally solid, in this phase it will appear white.', '2.jpg', '2020-04-30 15:29:25', '2020-04-30 15:29:25', NULL),
(3, 1, 'Amazing Pure Nut Oil', 'Pure Nut Filtered Groundnut Oil Pouch', '3.jpg', '2020-04-30 15:30:46', '2020-04-30 15:30:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `best_sellers`
--

CREATE TABLE `best_sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `ordered` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `best_sellers`
--

INSERT INTO `best_sellers` (`id`, `product_id`, `ordered`, `created_at`, `updated_at`) VALUES
(1, 6, 1, '2020-04-30 16:41:12', '2020-04-30 16:41:12');

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
(4, 'DARK TYPES', 1, '4.jpg', '2020-04-30 15:51:06', '2020-04-30 15:51:06', NULL),
(5, 'LIGHT TYPES', 1, '5.jpg', '2020-04-30 15:51:22', '2020-04-30 15:51:22', NULL),
(6, 'LIQUID, WHIPPED, AND HONEYCOMB', 1, '6.jpg', '2020-04-30 15:51:47', '2020-04-30 15:51:47', NULL),
(7, 'MANUKA', 1, '7.jpg', '2020-04-30 15:52:35', '2020-04-30 15:52:35', NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(1, 'What is this website made of?', 'Laravel framework', 1, '2020-04-30 16:13:25', '2020-04-30 16:13:25'),
(2, 'How many people visit this site?', 'It is based on their preference', 1, '2020-04-30 16:14:05', '2020-04-30 16:14:05');

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
(4, '2020_04_02_144330_create_categories_table', 1),
(5, '2020_04_11_234654_create_messages_table', 1),
(6, '2020_04_13_181620_create_banners_table', 1),
(7, '2020_04_14_170554_create_products_table', 1),
(8, '2020_04_14_223613_create_testimonials_table', 1),
(9, '2020_04_15_160724_create_faqs_table', 1),
(10, '2020_04_16_011920_create_blogs_table', 1),
(11, '2020_04_16_180253_create_product_multiple_photos_table', 1),
(12, '2020_04_16_190924_create_carts_table', 1),
(13, '2020_04_18_185452_create_coupons_table', 1),
(14, '2020_04_18_222238_create_wishlists_table', 1),
(15, '2020_04_23_204731_create_orders_table', 1),
(16, '2020_04_23_220747_create_order_lists_table', 1),
(17, '2020_04_26_235856_create_best_sellers_table', 1),
(18, '2020_04_27_210601_create_addresses_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `payment_method` int(11) NOT NULL,
  `sub_total` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `full_name`, `email`, `phone`, `country`, `address`, `post_code`, `city`, `notes`, `payment_method`, `sub_total`, `total`, `created_at`, `updated_at`) VALUES
(1, 2, 'abu talha', 'at@gmail.com', '0646629835', 'Bangladesh', 'Bogura', '5840', 'Bogura', 'test', 1, 650.00, 650.00, '2020-04-30 16:41:12', '2020-04-30 16:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_lists`
--

CREATE TABLE `order_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_lists`
--

INSERT INTO `order_lists` (`id`, `order_id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 6, 1, '2020-04-30 16:41:12', '2020-04-30 16:41:12');

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
  `product_short_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `product_price`, `product_thumbnail_photo`, `product_quantity`, `product_short_description`, `product_long_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'FOREVER বী-হানি (USA)', 4, 1000, '1.jpg', 10, 'স্পেনের নিজস্ব তত্বাবধায়নকৃত বৃহৎ বাগান থেকে খুব যত্নসহকারে ফরএভার বী হানি সংগ্রহ করা হয়। মৌমাছি ফুলে ফুলে ঘুরে পুস্প রেণু থেকে মধু নিয়ে সুচারুরূপে তাদের এনজাইমের সাথে মিশিয়ে মৌচাকে জমা রাখে।', 'যুগ যুগ ধরে প্রাকৃতিক গুণ সম্পন্ন সুস্বাদু খাবার হিসেবে সমাদৃত যা শক্তির চমৎকার উৎস এবং সহজেই হজম সাধ্য। সুস্বাদু, সম্পূর্ণ প্রাকৃতিক বিশুদ্ধ মিষ্টি দ্রব্য যা প্রকৃতির একটি শ্রেষ্ঠ অবদান। ফরএভার বী-হানি সময়োপযোগী দ্রুত ও প্রাকৃতিক শক্তির উৎস। এক নজরেঃ পরিবেশনের সুবিধা নিয়ে চমৎকার বোতলে দ্রুত শক্তি তৈরিতে সহায়ক প্রাকৃতিক মিষ্টতা ও সহজে হজম হয় পরিমাণঃ 17.6 oz (1.1 LB) (০.৫ কিলো. গ্রা.) সেবন বিধিঃ শুধু মধু সেবন করতে পারেন বা প্রাকৃতিক মিস্টিকরণ উপাদান হিসেবেও ব্যবহার যোগ্য। Made in USA', '2020-04-30 15:57:40', '2020-04-30 15:57:40', NULL),
(2, 'চাঁক ভাঙ্গা মধু', 6, 600, '2.jpg', 20, 'চাঁক ভাঙ্গা মধুপরিমাণ: ৫০০গ্রাম', 'চাঁক ভাঙ্গা মধুপরিমাণ: ৫০০গ্রামচাঁক ভাঙ্গা খাটি মধুএতে কোন প্রকার ভেজাল নেই,গ্যারান্টি সহকারে বিক্রয় করা হয়।', '2020-04-30 15:59:32', '2020-04-30 15:59:32', NULL),
(3, 'সরিষা ফুলের প্রাকৃতিক মধু -500GM BD', 5, 300, '3.jpg', 2, 'Product Type: Natural Honey Directly Collected from local mustard flower The presence of Sorisaflower is high Processed hygienically Natural Remedy 100% Adulteration free Maximum Level of purity is ensured Net Weight: 500gm Made In: Bangladesh', '১। প্রোডাক্টের অর্ডার স্টক থাকা সাপেক্ষে ডেলিভারি করা হবে। অনিবার্য কারনে পন্যের ডেলিভারিতে বিক্রেতা প্রতিশ্রুত ডেলিভারী সময়ের বেশী সময় লাগতে পারে।\r\n\r\n২। অর্ডার কনফার্মেশনের পরেও অনিবার্য কারনবশত যেকোনো সময়ে আজকেরডিল আপনার অর্ডার বাতিল করার ক্ষমতা রাখে। এক্ষেত্রে অগ্রিম মুল্য প্রদান করা হলে রিফান্ডের প্রয়োজনীয় তথ্য (বিকাশ নং/রকেট নং/কার্ড নং ও অন্যান্য) এবং প্রোডাক্ট ডেলিভারির জন্য কুরিয়ার দেয়ার পর আপনি গ্রহণ না করলে উক্ত কুরিয়ার থেকে প্রোডাক্টটি আজকেরডিলে ফেরত আসার পর সর্বোচ্চ ১০ কার্যদিবসের মধ্যে টাকা ফেরত দেয়া হবে।', '2020-04-30 16:00:38', '2020-04-30 16:00:39', NULL),
(4, 'মৌয়াল মধু', 6, 800, '4.jpg', 10, 'কেওড়া ফুলের মধুসুন্দরবন মধু সংগ্রহকারীদের দ্বারা আহরণ, প্রক্রিয়াজাত ও মোড়কজাতকৃত সুন্দরবনের ১০০% খাঁটি প্রাকৃতিক মধু।৫০০ গ্রাম জার', '১। প্রোডাক্টের অর্ডার স্টক থাকা সাপেক্ষে ডেলিভারি করা হবে। অনিবার্য কারনে পন্যের ডেলিভারিতে বিক্রেতা প্রতিশ্রুত ডেলিভারী সময়ের বেশী সময় লাগতে পারে।\r\n\r\n২। অর্ডার কনফার্মেশনের পরেও অনিবার্য কারনবশত যেকোনো সময়ে আজকেরডিল আপনার অর্ডার বাতিল করার ক্ষমতা রাখে। এক্ষেত্রে অগ্রিম মুল্য প্রদান করা হলে রিফান্ডের প্রয়োজনীয় তথ্য (বিকাশ নং/রকেট নং/কার্ড নং ও অন্যান্য) এবং প্রোডাক্ট ডেলিভারির জন্য কুরিয়ার দেয়ার পর আপনি গ্রহণ না করলে উক্ত কুরিয়ার থেকে প্রোডাক্টটি আজকেরডিলে ফেরত আসার পর সর্বোচ্চ ১০ কার্যদিবসের মধ্যে টাকা ফেরত দেয়া হবে।', '2020-04-30 16:02:52', '2020-04-30 16:02:52', NULL),
(5, 'SundarbanSold Out SUNDARBAN HONEY (NATURAL) - 100 GM', 6, 160, '5.jpg', 1, 'সুন্দরবনের মধু সংগ্রহ করা হয় এপ্রিল-মে মাসে। এই মধুতে খলিসা এবং গরান ফুলের নির্যাস বেশি থাকে আর এ মধু অনেক পাতলা এবং বেশ সুস্বাদু। সুন্দরবনের মধু সাতক্ষীরার সুন্দরবনের গহীন অরণ্য থেকে সংগ্রহ করা হয়। খাঁটি প্রাকৃতিক মধু।', '১। প্রোডাক্টের অর্ডার স্টক থাকা সাপেক্ষে ডেলিভারি করা হবে। অনিবার্য কারনে পন্যের ডেলিভারিতে বিক্রেতা প্রতিশ্রুত ডেলিভারী সময়ের বেশী সময় লাগতে পারে।\r\n\r\n২। অর্ডার কনফার্মেশনের পরেও অনিবার্য কারনবশত যেকোনো সময়ে আজকেরডিল আপনার অর্ডার বাতিল করার ক্ষমতা রাখে। এক্ষেত্রে অগ্রিম মুল্য প্রদান করা হলে রিফান্ডের প্রয়োজনীয় তথ্য (বিকাশ নং/রকেট নং/কার্ড নং ও অন্যান্য) এবং প্রোডাক্ট ডেলিভারির জন্য কুরিয়ার দেয়ার পর আপনি গ্রহণ না করলে উক্ত কুরিয়ার থেকে প্রোডাক্টটি আজকেরডিলে ফেরত আসার পর সর্বোচ্চ ১০ কার্যদিবসের মধ্যে টাকা ফেরত দেয়া হবে।', '2020-04-30 16:07:41', '2020-04-30 16:07:42', NULL),
(6, 'Manuka Honey', 7, 650, '6.webp', 99, 'NATURE MEETS SCIENCE: MGO 400+ is deliciously smooth and expertly crafted to naturally support general wellness; Featured for its quality and potency on Good Morning America.', 'This high grade premium MGO 400+ Manuka Honey from New Zealand contains a minimum of 400mg/kg of methylglyoxal, the naturally occurring compound that is present in high quantities only in some Manuka Honey. Manuka Health\'s New Zealand MGO Manuka Honey comes from hives in pristine and remote areas of New Zealand, and is fully traceable from beehive to shelf.', '2020-04-30 16:16:59', '2020-04-30 16:41:12', NULL);

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
(1, 1, '1-0.jpg', '2020-04-30 15:57:40', '2020-04-30 15:57:40'),
(2, 1, '1-1.jpg', '2020-04-30 15:57:40', '2020-04-30 15:57:40'),
(3, 1, '1-2.jpg', '2020-04-30 15:57:40', '2020-04-30 15:57:40'),
(4, 2, '2-0.jpg', '2020-04-30 15:59:32', '2020-04-30 15:59:32'),
(5, 3, '3-0.jpg', '2020-04-30 16:00:39', '2020-04-30 16:00:39'),
(6, 4, '4-0.jpg', '2020-04-30 16:02:52', '2020-04-30 16:02:52'),
(7, 4, '4-1.jpg', '2020-04-30 16:02:52', '2020-04-30 16:02:52'),
(8, 5, '5-0.jpg', '2020-04-30 16:07:42', '2020-04-30 16:07:42'),
(9, 6, '6-0.jpg', '2020-04-30 16:16:59', '2020-04-30 16:16:59'),
(10, 6, '6-1.webp', '2020-04-30 16:16:59', '2020-04-30 16:16:59');

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
(1, 'Aziz', 'head of idea', '1.jpg', 'Its a nice website made with laravel', '2020-04-30 16:09:08', '2020-04-30 16:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
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
(1, 'MD RIAZ', 'riazmd582@gmail.com', 1, '2020-04-30 15:06:25', '$2y$10$iQaTfHo/4gYS8LJZVBYdYu/e1QsUp6PKMXqWVTzYop/TwVVdLqgHS', NULL, '2020-04-30 15:04:37', '2020-04-30 15:06:25'),
(2, 'Abu Talha', 'at@gmail.com', 2, '2020-04-30 16:40:43', '$2y$10$Mo8yl2Dd.TyUt2jjKpch.OqcH1unc7dysbzLPBx78ceYIFcBl1j72', NULL, '2020-04-30 16:32:29', '2020-04-30 16:40:43');

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
(1, 6, '127.0.0.1', '2020-04-30 16:17:14', '2020-04-30 16:17:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `best_sellers`
--
ALTER TABLE `best_sellers`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_lists`
--
ALTER TABLE `order_lists`
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `best_sellers`
--
ALTER TABLE `best_sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_lists`
--
ALTER TABLE `order_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_multiple_photos`
--
ALTER TABLE `product_multiple_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
