-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 21, 2022 lúc 12:49 AM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel_basic_4`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_products`
--

CREATE TABLE `image_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `image_product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image_products`
--

INSERT INTO `image_products` (`id`, `id_product`, `image_product`, `created_at`, `updated_at`) VALUES
(2, 19, '/storage/uploads/product-images/2022-06-20/aaaaaa78 - Copy581.jpg', '2022-06-20 15:18:14', '2022-06-20 15:18:14'),
(3, 19, '/storage/uploads/product-images/2022-06-20/aaaaaa78974.jpg', '2022-06-20 15:18:14', '2022-06-20 15:18:14'),
(4, 19, '/storage/uploads/product-images/2022-06-20/asas964.jpg', '2022-06-20 15:18:14', '2022-06-20 15:18:14'),
(5, 19, '/storage/uploads/product-images/2022-06-20/asas884.jpg', NULL, NULL),
(6, 19, '/storage/uploads/product-images/2022-06-20/asdada946.jpg', NULL, NULL),
(7, 19, '/storage/uploads/product-images/2022-06-20/pro2 - Copy470.jpg', NULL, NULL),
(8, 19, '/storage/uploads/product-images/2022-06-20/aaaaaa78149.jpg', NULL, NULL),
(9, 19, '/storage/uploads/product-images/2022-06-20/asas909.jpg', NULL, NULL),
(10, 19, '/storage/uploads/product-images/2022-06-20/asdada481.jpg', NULL, NULL),
(11, 19, '/storage/uploads/product-images/2022-06-20/pro2 - Copy336.jpg', NULL, NULL),
(12, 23, '/storage/uploads/product-images/2022-06-20/aaaaaa78199.jpg', NULL, NULL),
(13, 23, '/storage/uploads/product-images/2022-06-20/asas14.jpg', NULL, NULL),
(14, 23, '/storage/uploads/product-images/2022-06-20/asdada21.jpg', NULL, NULL),
(15, 23, '/storage/uploads/product-images/2022-06-20/pro2 - Copy926.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `description`, `content`, `active`, `created_at`, `updated_at`) VALUES
(3, 'Laptop', 0, 'Laptop', 'Laptop', 1, '2022-06-19 21:40:07', '2022-06-20 12:35:51'),
(4, 'Phụ kiện', 0, 'Phụ kiện', 'Phụ kiện', 1, '2022-06-19 21:40:26', '2022-06-20 12:39:22'),
(5, 'Điện thoại', 0, 'Bán điện thoại', 'Bán điện thoại', 1, '2022-06-19 21:40:43', '2022-06-19 21:40:43'),
(8, 'Iphone', 5, 'Iphone', 'Iphone', 1, '2022-06-20 12:36:36', '2022-06-20 12:36:36'),
(11, 'MSI', 3, 'MSI', 'MSI', 1, '2022-06-20 12:37:53', '2022-06-20 13:56:30'),
(12, 'ASUS', 3, 'ASUS', 'ASUS', 1, '2022-06-20 12:38:05', '2022-06-20 12:38:05'),
(13, 'Chuột Xịn', 4, 'Chuột không dây', 'Chuột không dây', 1, '2022-06-20 12:38:42', '2022-06-20 12:38:42'),
(14, 'Bàn phím', 4, 'Bàn phím', 'Bàn phím', 1, '2022-06-20 12:38:54', '2022-06-20 12:38:54'),
(19, 'Sam Sung', 5, 'Sam Sung', 'Sam Sung', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_09_211455_create_menus_table', 1),
(6, '2022_03_11_032333_create_products_table', 1),
(7, '2022_04_12_082110_create_image_products_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `price_sale` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `content`, `menu_id`, `price`, `price_sale`, `qty`, `image`, `active`, `created_at`, `updated_at`) VALUES
(24, 'Samsung Galaxy S22 Ultra 5G', 'Samsung Galaxy S22 Ultra 5G', 'Samsung Galaxy S22 Ultra 5G', 19, 1000000, 999999, 10, '/storage/uploads/products/2022-06-20/637800453115752334_samsung-galaxy-s22-ultra-den-1989.jpg', 2, NULL, NULL),
(25, 'Samsung Galaxy A53 5G', 'Samsung Galaxy A53 5G', 'Samsung Galaxy A53 5G', 19, 11111111, 9999997, 11, '/storage/uploads/products/2022-06-20/637824382369440628_samsung-galaxy-a53-cam-2349.jpg', 0, NULL, NULL),
(26, 'iPhone 11 64GB', 'iPhone 11 64GB', 'iPhone 11 64GB', 11, 12222222, 999998, 10, '/storage/uploads/products/2022-06-20/637037652462548298_11-trang457.jpg', 1, NULL, NULL),
(27, 'iPhone 13 Pro', 'iPhone 13 Pro', 'iPhone 13 Pro', 11, 27000000, 24500000, 11, '/storage/uploads/products/2022-06-20/637861335143797501_iphone-13-pro-max-xanh-1529.jpg', 2, NULL, NULL),
(28, 'Laptop Gaming MSI Crosshair', 'Laptop Gaming MSI Crosshair', 'Laptop Gaming MSI Crosshair', 11, 30000000, 26000000, 20, '/storage/uploads/products/2022-06-20/620vnDQ_compressed-600x600797.jpg', 2, NULL, NULL),
(29, 'Laptop MSI Modern 14', 'Laptop MSI Modern 14', 'Laptop MSI Modern 14', 11, 20000000, 18000000, 15, '/storage/uploads/products/2022-06-20/Modern14-1_compressed-1-600x600702.jpg', 2, NULL, NULL),
(30, 'Laptop Asus ROG Strix G15', 'Laptop Asus ROG Strix G15', 'Laptop Asus ROG Strix G15', 12, 22222222, 11111111, 11, '/storage/uploads/products/2022-06-20/HN090W_compressed-600x600937.jpg', 0, NULL, NULL),
(31, 'Bàn phím cơ không dây Logitech', 'Bàn phím cơ không dây Logitech', 'Bàn phím cơ không dây Logitech', 14, 2000000, 1600000, 5, '/storage/uploads/products/2022-06-20/pop-keys-gallery-blast-1-copy-600x600209.jpg', 0, NULL, NULL),
(32, 'Bàn phím cơ Logitech Pro X', 'Bàn phím cơ Logitech Pro X', 'Bàn phím cơ Logitech Pro X', 14, 3000000, 2900000, 7, '/storage/uploads/products/2022-06-20/Pro_KB_LOL_1-600x600773.jpg', 2, NULL, NULL),
(33, 'Chuột HyperX Pulsefire Haste', 'Chuột HyperX Pulsefire Haste', 'Chuột HyperX Pulsefire Haste', 13, 1500000, 1300000, 17, '/storage/uploads/products/2022-06-20/hx-product-mouse-pulsefire-haste-4-zm-lg_compressed-600x600649.jpg', 1, NULL, NULL),
(34, 'Chuột HyperX Pulsefire Surge', 'Chuột HyperX Pulsefire Surge', 'Chuột HyperX Pulsefire Surge', 13, 2000000, 1800000, 7, '/storage/uploads/products/2022-06-20/PulseFire_Surge_2-600x600756.jpg', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `image_products`
--
ALTER TABLE `image_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `image_products`
--
ALTER TABLE `image_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
