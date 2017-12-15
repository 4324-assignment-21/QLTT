-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 15, 2017 lúc 01:54 PM
-- Phiên bản máy phục vụ: 10.1.22-MariaDB
-- Phiên bản PHP: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `4324`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `api_token` text COLLATE utf8_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `HoTen`, `email`, `SoDienThoai`, `NgaySinh`, `password`, `level`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'admin@gmail.com', '0123456789', '2017-01-01', '$2y$10$gXc4D/IuAMxZ11Q8mo90/OIUwpcwoPeYUDGXOKhItD///y1r6nlG2', 1, NULL, NULL, '2017-11-20 20:41:08', '2017-12-15 05:38:51'),
(2, 'hoangphuc', 'Le Hoang Phuc', 'hoangphuc@gmail.com', '01868825482', '1996-01-16', '$2y$10$.c7j1ENZMrbyTqF0KSMLR.6NOujkBlHeco2MV9ZZwsXQNBE1wNJwG', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC93ZWJzZXJ2aWNlL2FwaS9sb2dpbiIsImlhdCI6MTUxMzM0MjE2NiwiZXhwIjoxNTEzMzQ1NzY2LCJuYmYiOjE1MTMzNDIxNjYsImp0aSI6IlVrVFNPTkFuZzFYYmk2YkIifQ.s4CBlhfzpn39h3nCOiSI05ghKT94-7ETigta4xvJk6Y', NULL, '2017-11-20 21:12:43', '2017-12-15 05:49:26'),
(3, 'huyhoang', 'Le Huy Hoang', 'huyhoang@gmail.com', '0147852369', '1996-11-11', '$2y$10$25dTzbih/AGriGxb03nXSeCPcLxsuaFutMIlek4UNW83Netbmm/UW', 1, NULL, NULL, '2017-11-20 21:41:44', '2017-12-15 05:47:31'),
(4, 'ngocan', 'Lê Hoàng Ngọc Ấn', 'ngocan@gmail.com', '01668118011', '1996-06-11', '$2y$10$iE1NNXdgLfJTdp8vkK3MSesB4G2wPVucBmwF3fCRhziHhPAqHwO2K', 2, NULL, NULL, '2017-12-14 00:57:07', '2017-12-14 00:57:07'),
(6, 'member', 'member1', 'member@gmail.com', '0147852369', '2017-11-08', '$2y$10$ZRgHrXS5M1FA0NuQUvyCc.14/Fo6TAwIiwdSZUb/S/dlS0SMgEO1O', 2, NULL, NULL, '2017-12-14 07:23:22', '2017-12-15 05:43:41');

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
