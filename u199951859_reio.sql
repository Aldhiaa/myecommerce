-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 02 ديسمبر 2023 الساعة 14:05
-- إصدار الخادم: 10.6.15-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u199951859_reio`
--

-- --------------------------------------------------------

--
-- بنية الجدول `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_url` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_slug` varchar(255) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_slug`, `brand_image`, `created_at`, `updated_at`) VALUES
(1, 'Reio', 'reio', 'upload/brand/1783296871906934.png', '2023-11-22 20:20:25', '2023-11-22 20:20:25');

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_image`, `created_at`, `updated_at`) VALUES
(1, 'حقائب', 'حقائب', 'upload/category/1783296610698180.png', '2023-11-22 20:15:15', '2023-11-22 20:16:16'),
(2, 'ساعات', 'ساعات', 'upload/category/1783373082401566.png', '2023-11-23 16:31:45', '2023-11-23 16:31:45'),
(3, 'ملابس رجالية', 'ملابس رجالية', 'upload/category/1783373479932654.jpg', '2023-11-23 16:38:04', '2023-11-23 16:38:04'),
(4, 'ملابس نسائية', 'ملابس نسائية', 'upload/category/1783373619583764.jpg', '2023-11-23 16:40:17', '2023-11-23 16:40:17'),
(5, 'أحذية نسائية', 'أحذية نسائية', 'upload/category/1783374404586053.jpg', '2023-11-23 16:52:46', '2023-11-23 16:52:46'),
(6, 'أحذية رجالية', 'أحذية رجالية', 'upload/category/1783374490669092.png', '2023-11-23 16:54:08', '2023-11-23 16:54:08'),
(7, 'الصحة والجمال', 'الصحة والجمال', 'upload/category/1783374759276676.png', '2023-11-23 16:58:24', '2023-11-23 16:58:24'),
(8, 'الاجهزة الالكترونية', 'الاجهزة الالكترونية', 'upload/category/1783374892155769.jpg', '2023-11-23 17:00:31', '2023-11-23 17:00:31'),
(9, 'الهواتف وملحقاته', 'الهواتف وملحقاته', 'upload/category/1783376873935187.png', '2023-11-23 17:01:23', '2023-11-23 17:32:01'),
(10, 'مستلزمات البناء', 'مستلزمات البناء', 'upload/category/1783375359078772.png', '2023-11-23 17:07:56', '2023-11-23 17:07:56'),
(11, 'أدوات المطبخ', 'أدوات المطبخ', 'upload/category/1783375433678633.jpg', '2023-11-23 17:09:07', '2023-11-23 17:09:07'),
(12, 'العاب', 'العاب', 'upload/category/1783375883795525.png', '2023-11-23 17:10:28', '2023-11-23 17:16:16'),
(13, 'الاثاث والديكور', 'الاثاث والديكور', 'upload/category/1783376230903246.jpg', '2023-11-23 17:21:48', '2023-11-23 17:21:48'),
(14, 'الاكسسوارات', 'الاكسسوارات', 'upload/category/1783376820705907.png', '2023-11-23 17:31:10', '2023-11-23 17:31:10'),
(15, 'الفضيات', 'الفضيات', 'upload/category/1783376929568557.jpg', '2023-11-23 17:32:54', '2023-11-23 17:32:54'),
(16, 'ادوات المنزل', 'ادوات المنزل', 'upload/category/1783377070709648.png', '2023-11-23 17:35:08', '2023-11-23 17:35:08'),
(17, 'مستلزمات السيارات', 'مستلزمات السيارات', 'upload/category/1783377184235646.jpg', '2023-11-23 17:36:57', '2023-11-23 17:36:57'),
(18, 'مستلزمات الحيوانات', 'مستلزمات الحيوانات', 'upload/category/1783377272326892.jpg', '2023-11-23 17:38:21', '2023-11-23 17:38:21'),
(19, 'مستلزمات مدرسية ومكتبية', 'مستلزمات مدرسية ومكتبية', 'upload/category/1783377474382199.png', '2023-11-23 17:41:33', '2023-11-23 17:41:33');

-- --------------------------------------------------------

--
-- بنية الجدول `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_validity` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_03_191028_create_brands_table', 1),
(6, '2023_08_05_182441_create_categories_table', 1),
(7, '2023_08_05_191328_create_sub_categories_table', 1),
(8, '2023_08_14_002429_create_products_table', 1),
(9, '2023_08_14_004437_create_multiimages_table', 1),
(10, '2023_09_19_144634_create_sliders_table', 1),
(11, '2023_10_02_190538_create_banners_table', 1),
(12, '2023_10_13_224554_create_coupons_table', 1),
(13, '2023_10_19_232754_create_orders_table', 1),
(14, '2023_10_19_232816_create_order_items_table', 1),
(15, '2023_10_25_222825_create_ship_divisions_table', 1),
(16, '2023_10_25_225456_create_ship_districts_table', 1),
(17, '2023_10_25_225829_create_ship_states_table', 1),
(18, '2023_10_29_005219_create_site_settings_table', 1),
(19, '2023_10_29_005543_create_seos_table', 1),
(20, '2023_10_31_142727_create_permission_tables', 1),
(21, '2023_11_13_202057_create_notifications_table', 1),
(22, '2023_11_25_203039_create_terms_and_cons_table', 2);

-- --------------------------------------------------------

--
-- بنية الجدول `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `multiimages`
--

CREATE TABLE `multiimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `location_address` varchar(255) DEFAULT NULL,
  `post_code` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `currency` varchar(255) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_month` varchar(255) NOT NULL,
  `order_year` varchar(255) NOT NULL,
  `confirmed_date` varchar(255) DEFAULT NULL,
  `processing_date` varchar(255) DEFAULT NULL,
  `picked_date` varchar(255) DEFAULT NULL,
  `shipped_date` varchar(255) DEFAULT NULL,
  `delivered_date` varchar(255) DEFAULT NULL,
  `cancel_date` varchar(255) DEFAULT NULL,
  `return_date` varchar(255) DEFAULT NULL,
  `return_reason` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `qty` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_slug` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_tags` varchar(255) NOT NULL,
  `product_qty` varchar(255) DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `product_color` varchar(255) DEFAULT NULL,
  `selling_price` int(11) NOT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `long_describtion` text NOT NULL,
  `short_describtion` text NOT NULL,
  `product_thambnail` varchar(255) NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `specail_offer` int(11) DEFAULT NULL,
  `specail_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `product_name`, `product_slug`, `product_code`, `product_tags`, `product_qty`, `product_size`, `product_color`, `selling_price`, `discount_price`, `long_describtion`, `short_describtion`, `product_thambnail`, `vendor_id`, `hot_deals`, `featured`, `specail_offer`, `specail_deals`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'حقيبة مربعة', 'حقيبة-مربعة', 'PRD-W2PKil', 'New Product,Top Product,Net', '10', 'Small,Medium,Large', 'Black,red,blue', 65, 12, '<p>حقيبة مربعة الشكل خفيفة الوزن ومزينة بحروف منقوشة على شكل حرف كاجوال للفتيات المراهقات والنساء وطلاب الجامعات والمبتدئين والعمال ذوي الياقات البيضاء مثالية للمكتب والكلية والعمل والأعمال التجارية والتنقل في الهواء الطلق والسفر والنزهات</p>', 'حقيبة مربعة الشكل خفيفة الوزن ومزينة بحروف منقوشة على شكل حرف كاجوال للفتيات المراهقات والنساء وطلاب الجامعات والمبتدئين والعمال ذوي الياقات البيضاء مثالية للمكتب والكلية والعمل والأعمال التجارية والتنقل في الهواء الطلق والسفر والنزهات', 'upload/products/thambnail/1783297472466878.png', 14, NULL, NULL, NULL, NULL, 1, '2023-11-22 20:29:58', NULL),
(2, 1, 1, 1, 'حقيبة مربعة', 'حقيبة-مربعة', 'PRD-zsBEp1', 'New Product,Top Product,Net', '10', 'Small,Medium,Large', 'Black,red,blue', 65, 12, '<p>حقيبة مربعة الشكل خفيفة الوزن ومزينة بحروف منقوشة على شكل حرف كاجوال للفتيات المراهقات والنساء وطلاب الجامعات والمبتدئين والعمال ذوي الياقات البيضاء مثالية للمكتب والكلية والعمل والأعمال التجارية والتنقل في الهواء الطلق والسفر والنزهات</p>', 'حقيبة مربعة الشكل خفيفة الوزن ومزينة بحروف منقوشة على شكل حرف كاجوال للفتيات المراهقات والنساء وطلاب الجامعات والمبتدئين والعمال ذوي الياقات البيضاء مثالية للمكتب والكلية والعمل والأعمال التجارية والتنقل في الهواء الطلق والسفر والنزهات', 'upload/products/thambnail/1783297531356113.png', 14, NULL, NULL, NULL, NULL, 1, '2023-11-22 20:30:54', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_author` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `ship_districts`
--

CREATE TABLE `ship_districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `ship_districts`
--

INSERT INTO `ship_districts` (`id`, `division_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'السبعين', NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `ship_divisions`
--

CREATE TABLE `ship_divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `ship_divisions`
--

INSERT INTO `ship_divisions` (`id`, `division_name`, `created_at`, `updated_at`) VALUES
(1, 'صنعاء', NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `ship_states`
--

CREATE TABLE `ship_states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `support_phone` varchar(255) DEFAULT NULL,
  `phone_one` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `company_address` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `site_settings`
--

INSERT INTO `site_settings` (`id`, `title`, `logo`, `support_phone`, `phone_one`, `email`, `company_address`, `facebook`, `twitter`, `youtube`, `copyright`, `created_at`, `updated_at`) VALUES
(1, 'Reio Market ريو ماركت', 'upload/logo/1783171789840453.png', '781737123', NULL, 'Support@reiomarket.com', 'اليمن', 'https://fb.com/reiomarket', 'https://twitter.com/reiomarket', 'https://youtube.com/@ReioMarket?si=voFqg18J2lZkEtZf', 'Reio Market', '2023-11-21 11:09:27', '2023-11-21 11:12:17');

-- --------------------------------------------------------

--
-- بنية الجدول `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `short_title` varchar(255) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `sliders`
--

INSERT INTO `sliders` (`id`, `slider_title`, `short_title`, `slider_image`, `created_at`, `updated_at`) VALUES
(1, 'ريو ماركت', 'تسوق الان', 'upload/slider/1783173888890784.jpg', NULL, NULL),
(2, 'ريو ماركت', 'تسوق الان', 'upload/slider/1783174370108001.jpg', NULL, '2023-11-21 11:53:18');

-- --------------------------------------------------------

--
-- بنية الجدول `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `subcategory_slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `subcategory_slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'حقائب يد', 'حقائب-يد', NULL, NULL),
(2, 1, 'حقائب ظهر', 'حقائب-ظهر', NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `terms_and_cons`
--

CREATE TABLE `terms_and_cons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `vendor_trade_type` varchar(250) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `vendor_join` varchar(255) DEFAULT NULL,
  `vendor_info` varchar(255) DEFAULT NULL,
  `vendor_card` varchar(250) DEFAULT NULL,
  `vendor_record` varchar(250) DEFAULT NULL,
  `role` enum('admin','vendor','user') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `phone`, `vendor_trade_type`, `photo`, `address`, `vendor_join`, `vendor_info`, `vendor_card`, `vendor_record`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Candido Cremin Jr.', NULL, 'lesly.schowalter@example.org', '2023-11-20 20:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '469.881.8285', '', 'https://via.placeholder.com/60x60.png/0066dd?text=temporibus', '7864 Maude Crossing Apt. 508\nWest Mckayla, IN 38233-5189', NULL, NULL, NULL, NULL, 'admin', 'active', 'rJgYyTsc2r', '2023-11-20 20:09:09', '2023-11-20 20:09:09'),
(2, 'Francesco Robel V', NULL, 'mortiz@example.org', '2023-11-20 20:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+1-256-906-2480', '', 'https://via.placeholder.com/60x60.png/00cc33?text=fugiat', '477 Mohr Plains\nKochport, FL 54139', NULL, NULL, NULL, NULL, 'vendor', 'inactive', '6IdBcazA7z', '2023-11-20 20:09:09', '2023-11-20 20:09:09'),
(3, 'Prof. Louie Kessler Jr.', NULL, 'patricia.mayert@example.com', '2023-11-20 20:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '360-272-3229', '', 'https://via.placeholder.com/60x60.png/00ccee?text=minima', '8826 Lonnie Rapids\nHelmerport, NM 06705', NULL, NULL, NULL, NULL, 'user', 'active', 'psl2SoiHRx', '2023-11-20 20:09:09', '2023-11-20 20:09:09'),
(4, 'Berta Leannon', NULL, 'mayert.stephany@example.org', '2023-11-20 20:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1-626-352-3382', '', 'https://via.placeholder.com/60x60.png/00bbdd?text=dolor', '640 Mariah Landing\nJaylinfurt, MI 05195', NULL, NULL, NULL, NULL, 'user', 'active', 'PzN99sHOxC', '2023-11-20 20:09:09', '2023-11-20 20:09:09'),
(5, 'Dr. Madge Jones', NULL, 'zschimmel@example.net', '2023-11-20 20:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+15206883226', '', 'https://via.placeholder.com/60x60.png/00ccff?text=cum', '8019 Chelsea Ford Apt. 188\nSouth Cooperport, WV 67168-2953', NULL, NULL, NULL, NULL, 'vendor', 'active', '9VmtN4d1nb', '2023-11-20 20:09:09', '2023-11-21 10:55:23'),
(6, 'Blanca Emmerich', NULL, 'crist.joannie@example.net', '2023-11-20 20:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '507-725-4855', '', 'https://via.placeholder.com/60x60.png/0077dd?text=dolorem', '576 O\'Connell Fields Suite 038\nLittelstad, UT 59825', NULL, NULL, NULL, NULL, 'vendor', 'active', 'K0YbFSBY93', '2023-11-20 20:09:09', '2023-11-20 20:09:09'),
(7, 'Dr. Elmore Schulist', NULL, 'blanche.kertzmann@example.org', '2023-11-20 20:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+1-320-814-4567', '', 'https://via.placeholder.com/60x60.png/0022ee?text=vel', '461 Okuneva Crossroad Apt. 643\nSouth Vernerland, WA 57413-6043', NULL, NULL, NULL, NULL, 'user', 'inactive', 'cwauLWyR2W', '2023-11-20 20:09:09', '2023-11-20 20:09:09'),
(8, 'Cecil Schowalter Sr.', NULL, 'barrows.justice@example.net', '2023-11-20 20:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '458.724.1624', '', 'https://via.placeholder.com/60x60.png/00bb22?text=nihil', '2103 Cassandre Hollow\nEast Jenniemouth, MT 56872-4938', NULL, NULL, NULL, NULL, 'admin', 'inactive', '4V6JEX1IIq', '2023-11-20 20:09:09', '2023-11-20 20:09:09'),
(9, 'Samson Stiedemann', NULL, 'melvina72@example.org', '2023-11-20 20:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '508-432-8543', '', 'https://via.placeholder.com/60x60.png/008877?text=qui', '2028 McCullough Mall\nGarnetfurt, DC 14186', NULL, NULL, NULL, NULL, 'vendor', 'active', '1HFiN1gWVC', '2023-11-20 20:09:09', '2023-11-20 20:09:09'),
(10, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$uxc21xbEvdyQ0XElF4Av9eCqaBY2yBi7vACINifgj.sMQYHH.5gx.', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'active', NULL, NULL, NULL),
(11, 'dhiaa', 'dhiaa', 'dhiaa@gmail.com', NULL, '$2y$10$JRFdeQ2N.j7X6Q6FLhY/u.nQWkincd1fOdQPbmbCD2BNYfzzZJs9q', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'vendor', 'active', NULL, NULL, NULL),
(12, 'zaid askar', 'user', 'user@gmail.com', NULL, '$2y$10$3.wUrlCpxNGsM6EYvn7.P.C7Wo/Ce2n3pTaDgTsEssdbEphOOMVbe', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, NULL),
(13, 'MAHMOOD ALRAJHI', NULL, 'mdalrajihi@gmail.com', NULL, '$2y$10$NEJ6tzAyQF0E7PerVnUV7uaZlBOxZZf07EAHXN00yj4Lyhe1iPVFK', '775422524', '', '202311260315PicsArt_04-22-12.42.46.jpg', 'Yemen', NULL, NULL, NULL, NULL, 'user', 'active', NULL, '2023-11-22 19:55:27', '2023-11-26 15:15:52'),
(14, 'MAHMOOD ALRAJHI', 'alrajhi', 'mdalrajhi@gmail.com', NULL, '$2y$10$BdgW.PEDUrTVih7feYMC.O8aHUW3LZcobo.8le9NwI5oejdzDT9nO', '775422524', '', NULL, NULL, '2023', NULL, NULL, NULL, 'vendor', 'active', NULL, '2023-11-22 20:04:04', '2023-11-22 20:05:52'),
(15, 'Reio', 'Mahmood Alrajhi', 'reiomarketye@gmail.com', NULL, '$2y$10$isi7ugPSPZ/te7naqSr6FeLP50NzPrSRqpmYwRUQTfcaJRAlo4sdK', '775422524', '', NULL, NULL, '2023', NULL, 'صورة البطاقة وجهين.jpg', NULL, 'vendor', 'active', NULL, '2023-11-23 15:16:20', '2023-11-23 16:25:27'),
(18, 'ريو', 'محمود', 'mhmoud233@gmail.com', NULL, '$2y$10$mctTdZYGvvt/PXkuwUYYyOOlP2g9pH2cjvznEzylrOWeXSiwKTVge', '775422524', 'الكترونيات', NULL, NULL, '27 November 2023', NULL, 'upload/vendor_images/1783754468252736.jpg', NULL, 'vendor', 'inactive', NULL, '2023-11-27 21:33:43', '2023-11-27 21:33:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `multiimages`
--
ALTER TABLE `multiimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_districts`
--
ALTER TABLE `ship_districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ship_districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `ship_divisions`
--
ALTER TABLE `ship_divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_states`
--
ALTER TABLE `ship_states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ship_states_division_id_foreign` (`division_id`),
  ADD KEY `ship_states_district_id_foreign` (`district_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `terms_and_cons`
--
ALTER TABLE `terms_and_cons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `multiimages`
--
ALTER TABLE `multiimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ship_districts`
--
ALTER TABLE `ship_districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ship_divisions`
--
ALTER TABLE `ship_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ship_states`
--
ALTER TABLE `ship_states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `terms_and_cons`
--
ALTER TABLE `terms_and_cons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- قيود الجداول `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `ship_districts`
--
ALTER TABLE `ship_districts`
  ADD CONSTRAINT `ship_districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `ship_divisions` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `ship_states`
--
ALTER TABLE `ship_states`
  ADD CONSTRAINT `ship_states_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `ship_districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ship_states_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `ship_divisions` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
