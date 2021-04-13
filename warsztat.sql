-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Kwi 2021, 16:04
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `warsztat`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `delivers`
--

CREATE TABLE `delivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workshop_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `delivers`
--

INSERT INTO `delivers` (`id`, `name`, `nip`, `address`, `workshop_id`, `created_at`, `updated_at`) VALUES
(4, 'Michelin', 679203012, 'ul. Niebieska 12, 34-112 Sosnowiec', 4, '2021-03-26 15:26:23', '2021-04-03 12:05:48'),
(5, 'Twin Busch', 612345192, 'ul. Bielska 79/2, 34-112 Sosnowiec', 4, '2021-03-26 15:26:54', '2021-04-03 12:07:55'),
(6, 'Hurtownia \"LexMoto\"', 654023341, 'ul. Jaśkowicka 43, 43-100 Tychy', 1, '2021-03-27 17:09:30', '2021-04-03 12:04:16'),
(7, 'Auto-Partner S.A.', 632659102, 'ul. Świąteczna 12, 43-100 Tychy', 1, '2021-03-27 17:56:57', '2021-04-03 12:04:35');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `description`
--

CREATE TABLE `description` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `description`
--

INSERT INTO `description` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Warsztat 1', '21352351', NULL, NULL),
(2, '235235', '235', '2021-03-20 12:06:47', '2021-03-20 12:06:47'),
(3, 'weyewry', 'wrey', '2021-03-20 12:07:23', '2021-03-20 12:07:23'),
(4, 'Pozdrawiam', '235', '2021-03-20 14:00:28', '2021-03-20 15:05:05'),
(5, 'eee', '235', '2021-03-20 15:04:00', '2021-03-20 15:04:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `workshop_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `is_discount` tinyint(1) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `netto_value` double(8,2) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `workshop_id`, `order_id`, `is_discount`, `name`, `netto_value`, `comment`, `created_at`, `updated_at`) VALUES
(5, 2, 1, 1, 0, '3456', 3456.00, '3456', '2021-03-27 16:45:11', '2021-03-27 16:45:11'),
(6, 17, 1, 13, 0, 'Usługa warsztatowa', 1.00, 'Wymiana akumulatora', '2021-04-03 12:00:47', '2021-04-03 12:00:47'),
(8, 17, 2, 14, 0, 'Usługa warsztatowa', 1.00, 'Naprawa samochodu', '2021-04-05 12:36:30', '2021-04-05 12:36:30');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2021_03_18_182511_workshops', 2),
(19, '2021_03_18_182818_permissions', 3),
(23, '2021_03_18_182145_orders', 4),
(24, '2021_03_19_182211_add_status_to_orders', 5),
(25, '2021_03_19_195541_users_roles', 6),
(26, '2021_03_23_204053_delivers', 7),
(27, '2021_03_23_204055_warehouses', 7),
(28, '2021_03_25_201336_invoices', 8),
(29, '2021_03_25_203229_add_workshopid_to_warehouse_items', 9),
(30, '2021_03_25_214901_add_workshop_id_to_delivers', 10),
(33, '2021_03_27_132448_update_invoices', 12),
(34, '2021_03_27_135108_update_invoices2', 12),
(35, '2021_03_26_165505_add_discount_counter_to_users', 13),
(36, '2021_03_27_145521_add_discount_to_invoices', 14),
(38, '2021_03_28_170724_rename_workshop_comment_to_address', 15),
(39, '2021_03_28_173656_delete_useless_column_from_users', 16),
(40, '2021_03_31_203644_add_is_accepted_by_client_to_orders', 17);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `workshop_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_accept_from_client` int(11) NOT NULL DEFAULT 0,
  `cost` int(11) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `workshop_id`, `status`, `is_accept_from_client`, `cost`, `description`, `staff_note`, `date`, `created_at`, `updated_at`) VALUES
(7, 2, 4, 0, 0, 0, 'Spod maski wczoraj wydobył się dym, ale auto działa,', '', '2021-03-02 22:09:00', '2021-03-27 20:11:37', '2021-03-27 20:11:37'),
(8, 2, 2, 0, 0, 0, 'Kierownica chodzi trochę ciężko', '', '2021-03-09 22:11:00', '2021-03-27 20:12:02', '2021-03-27 20:12:02'),
(9, 2, 2, 0, 0, 0, 'Potrzebuję zapisać się na geometrię kół', '', '2021-03-18 22:12:00', '2021-03-27 20:12:57', '2021-03-27 20:12:57'),
(10, 2, 4, 3, 0, 0, 'Syn zalał wejście na płyty klejem, potrzebuję pomocy', '', '2021-04-22 22:14:00', '2021-03-27 20:14:30', '2021-04-03 11:58:33'),
(11, 12, 1, 3, 1, 3475, 'Silnik przestał działać i chyba nie jest to cewka zapłonowa', '', '2021-04-02 19:47:35', '2021-04-01 13:37:50', '2021-04-01 13:51:54'),
(12, 2, 4, 0, 0, 0, 'Tuleje do wymiany', '', '2021-03-02 22:09:00', '2021-03-27 20:11:37', '2021-03-27 20:11:37'),
(13, 17, 1, 2, 0, 300, 'Akumulator chyba padł, bo nie działają światła i samochód nie chce odpalić.', '', '2021-04-01 16:15:00', '2021-04-03 11:51:44', '2021-04-03 12:35:30'),
(14, 17, 2, 2, 1, 699, 'Coś  świszczy podczas jazdy pod maską.', '', '2021-04-15 12:45:00', '2021-04-03 11:52:07', '2021-04-05 12:25:39'),
(15, 17, 3, 3, 0, 0, 'Przebite koło', '', '2021-04-20 20:10:00', '2021-04-03 11:52:29', '2021-04-03 11:55:38'),
(16, 17, 4, 3, 0, 0, 'Chciałbym wymienić radio', '', '2021-04-05 17:52:00', '2021-04-03 11:52:46', '2021-04-03 11:58:34'),
(17, 17, 5, 3, 1, 0, 'Mam swój filtr paliwa i potrzebuję wymiany', '', '2021-04-27 19:00:00', '2021-04-03 11:53:27', '2021-04-03 11:59:48'),
(18, 17, 6, 3, 0, 0, 'Kończy mi się przegląd niedługo i potrzebuję sprawdzić wszystko w samochodzie Opel Astra', '', '2021-04-24 19:55:00', '2021-04-03 11:53:55', '2021-04-03 11:59:17'),
(19, 17, 1, 2, 0, 123, 'Pomoc potrzebna, koła nie działają i piszczą', '', '2021-04-24 22:11:00', '2021-04-05 15:08:14', '2021-04-05 16:19:34');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('najimichal@gmail.com', '$2y$10$JJUYAFP14HnnHueQR63KIOLlBXS9k2GeHuWJ9fu3LmULJzhPWxJme', '2021-04-05 14:00:23');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `workshop_id` bigint(20) UNSIGNED NOT NULL,
  `permissions_level` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `permissions`
--

INSERT INTO `permissions` (`id`, `user_id`, `workshop_id`, `permissions_level`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 4, '2021-03-16 20:41:31', '2021-04-03 11:40:59'),
(8, 2, 1, 4, '2021-03-27 19:59:25', '2021-03-28 18:06:46'),
(9, 8, 1, 3, '2021-03-28 17:03:19', '2021-04-03 11:37:41'),
(10, 9, 1, 2, '2021-03-31 18:25:34', '2021-04-03 11:38:49'),
(11, 10, 1, 1, '2021-03-31 18:26:53', '2021-03-31 18:26:53'),
(12, 11, 1, 1, '2021-03-31 18:32:40', '2021-04-03 11:39:43'),
(13, 12, 1, 1, '2021-04-01 13:37:26', '2021-04-01 13:37:26'),
(14, 2, 2, 4, '2021-04-03 11:34:51', '2021-04-03 11:34:51'),
(15, 2, 4, 4, '2021-04-03 11:35:01', '2021-04-03 11:35:01'),
(16, 2, 5, 4, '2021-04-03 11:35:08', '2021-04-03 11:35:08'),
(19, 2, 6, 4, '2021-04-03 11:37:07', '2021-04-03 11:37:07'),
(20, 8, 2, 3, '2021-04-03 11:37:52', '2021-04-03 11:37:52'),
(21, 8, 3, 3, '2021-04-03 11:38:01', '2021-04-03 11:38:01'),
(22, 8, 4, 3, '2021-04-03 11:38:19', '2021-04-03 11:38:19'),
(23, 8, 5, 3, '2021-04-03 11:38:29', '2021-04-03 11:38:29'),
(24, 8, 6, 3, '2021-04-03 11:38:37', '2021-04-03 11:38:37'),
(25, 9, 2, 2, '2021-04-03 11:38:55', '2021-04-03 11:38:55'),
(26, 9, 3, 2, '2021-04-03 11:39:02', '2021-04-03 11:39:02'),
(27, 9, 4, 2, '2021-04-03 11:39:10', '2021-04-03 11:39:10'),
(28, 9, 5, 2, '2021-04-03 11:39:16', '2021-04-03 11:39:16'),
(29, 9, 6, 2, '2021-04-03 11:39:22', '2021-04-03 11:39:22'),
(30, 15, 1, 3, '2021-04-03 11:44:39', '2021-04-03 11:49:02'),
(31, 16, 1, 2, '2021-04-03 11:45:02', '2021-04-03 11:49:45'),
(32, 17, 1, 1, '2021-04-03 11:45:23', '2021-04-03 11:45:23'),
(33, 18, 1, 1, '2021-04-03 11:45:48', '2021-04-03 11:45:48'),
(34, 19, 1, 1, '2021-04-03 11:46:07', '2021-04-03 11:46:07'),
(35, 20, 1, 1, '2021-04-03 11:46:23', '2021-04-03 11:46:23'),
(36, 21, 1, 1, '2021-04-03 11:46:46', '2021-04-03 11:46:46'),
(37, 15, 2, 3, '2021-04-03 11:49:08', '2021-04-03 11:49:08'),
(38, 15, 3, 3, '2021-04-03 11:49:15', '2021-04-03 11:49:15'),
(39, 15, 4, 3, '2021-04-03 11:49:22', '2021-04-03 11:49:22'),
(40, 15, 5, 3, '2021-04-03 11:49:30', '2021-04-03 11:49:30'),
(41, 15, 6, 3, '2021-04-03 11:49:36', '2021-04-03 12:14:44'),
(42, 16, 2, 2, '2021-04-03 11:50:05', '2021-04-03 11:50:05'),
(43, 16, 3, 2, '2021-04-03 11:50:11', '2021-04-03 11:50:11'),
(44, 16, 4, 2, '2021-04-03 11:50:18', '2021-04-03 11:50:18'),
(45, 16, 5, 2, '2021-04-03 11:50:23', '2021-04-03 11:50:23'),
(46, 16, 6, 2, '2021-04-03 11:50:30', '2021-04-03 11:50:30'),
(47, 22, 1, 1, '2021-04-05 14:00:08', '2021-04-05 14:00:08');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_counter` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `discount_counter`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Właściciel', 'wlasciciel@wlasciciel.pl', 12, NULL, '$2y$10$vPijtM5tTDxFUqK2KHQUVuKAc1FzVpzc9Ntx41.sn0ZU8zSqE51Mu', 'nbypHlbUA9CITnLQkTyn9loSpRJtQJZFeZFo29yg4dWQK4hzA7d8MvXbnQJa', '2021-01-12 16:38:01', '2021-03-28 17:13:30'),
(8, 'Zapełniacz1', 'zapelniacz1@zapelniacz.pl', 1, NULL, '$2y$10$Wa05MgE8IU18jNJXUOTKL.nG7GDPLEc2fM6Trp9U3GG8EZ7jLT5Ki', NULL, '2021-02-09 18:03:19', '2021-03-28 17:03:19'),
(9, 'Zapełniacz2', 'zapelniacz2@zapelniacz.pl', 0, NULL, '$2y$10$gMc6L6CU0UyLOysz6P41AumNUEHlBHmYXK5GfEMZgutl.unSyeX.m', NULL, '2020-12-09 19:25:34', '2021-03-31 18:25:34'),
(10, 'Zapełniacz3', 'zapelniacz3@zapelniacz.pl', 0, NULL, '$2y$10$5ne0aId4LU.f9ZISVYizYO7PzAOTsRHkh/Fvjj8RgitGw5lGqasTK', NULL, '2020-11-16 19:26:53', '2021-03-31 18:26:53'),
(11, 'Zapełniacz4', 'zapelniacz4@zapelniacz.pl', 0, NULL, '$2y$10$8YY2Oynm6dS5BG1ohGEdMuRX8Pgfdm7WlRAHSVHimW8NqLoIzbC6W', NULL, '2021-03-31 18:32:40', '2021-03-31 18:32:40'),
(12, 'Zapełniacz5', 'zapelniacz5@zapelniacz.pl', 0, NULL, '$2y$10$I00OqvEPT9c6ZEERN4JL9ulHBpXc7geAborEeqSGhA0YKTfz6i/k6', NULL, '2021-04-01 13:37:26', '2021-04-01 13:37:26'),
(15, 'Manager', 'manager@manager.pl', 0, NULL, '$2y$10$UCHOhAn/CbUPShT/tjoaVOGrolRvUMCh6UpRk7RHfIRnHGn4rR8ry', NULL, '2021-03-10 14:47:43', '2021-04-03 11:44:39'),
(16, 'Pracownik', 'pracownik@pracownik.pl', 0, NULL, '$2y$10$5v9aQJbduJ9vjzv0MZjKVe2AFw6zxqci9awMy0H.qMcGCI2DEmPVm', NULL, '2021-02-15 12:45:02', '2021-04-03 11:45:02'),
(17, 'Klient1', 'klient1@klient.pl', 10, NULL, '$2y$10$yFY9Qt7A0C.9l6ZE58GW6uY0QhyaF6P6zE0NBJRq5oad5WhB4nZWO', NULL, '2021-04-01 11:45:23', '2021-04-05 12:36:30'),
(18, 'Klient2', 'klient2@klient.pl', 0, NULL, '$2y$10$zNNQHUrQm1zWlcVtLjB4yOe9y3IV7MYcdfUhBPy.vG4Gn5/RKL/MK', NULL, '2021-03-08 12:45:48', '2021-04-03 11:45:48'),
(19, 'Klient3', 'klient3@klient.pl', 0, NULL, '$2y$10$c9cF1ZiftpExDbusu1Wru.fyuehTt0cqQZ.yT/y8n3lCz3/U6Z74q', NULL, '2021-02-04 12:46:07', '2021-04-03 11:46:07'),
(20, 'Klient4', 'klient4@klient.pl', 0, NULL, '$2y$10$9sSvQaRg1B9Oir57eCAp7eU5W9mjZffgAz2RIDfWpcYjNEX9JF8Ve', NULL, '2021-04-02 11:46:23', '2021-04-03 11:46:23'),
(21, 'Klient5', 'klient5@klient.pl', 0, NULL, '$2y$10$izggA//zJ1XhOAhcE9zWwOk43gb7qSC98.NavyVzGZtPb0MbT3HzC', NULL, '2021-03-20 12:46:46', '2021-04-03 11:46:46'),
(22, 'Klient6', 'klient6@klient6.pl', 0, NULL, '$2y$10$gMc6L6CU0UyLOysz6P41AumNUEHlBHmYXK5GfEMZgutl.unSyeX.m'', NULL, '2021-04-05 14:00:08', '2021-04-05 14:00:08');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_roles`
--

CREATE TABLE `users_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users_roles`
--

INSERT INTO `users_roles` (`id`, `name`) VALUES
(1, 'Klient'),
(2, 'Pracownik'),
(3, 'Manager'),
(4, 'Właściciel');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `warehouses_items`
--

CREATE TABLE `warehouses_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workshop_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `warehouses_items`
--

INSERT INTO `warehouses_items` (`id`, `name`, `workshop_id`, `quantity`, `type`, `comment`, `created_at`, `updated_at`) VALUES
(4, 'Śruby M.12', 1, '12', 'Paczka', '100 sztuk w paczce', '2021-03-25 20:01:16', '2021-04-03 12:01:16'),
(5, 'Filtr paliwa', 1, '3', 'Komplet', 'Kompatybilne z markami Audi, Opel, BMW', '2021-03-25 20:02:25', '2021-04-03 12:01:43'),
(6, 'Opony', 1, '4', 'Sztuki', 'Opony letnie 205/55 R15, używane', '2021-03-25 20:35:59', '2021-04-03 12:02:21'),
(7, 'Odważniki do kół', 1, '79', 'Sztuki', NULL, '2021-04-03 12:02:50', '2021-04-03 12:02:50');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `workshops`
--

CREATE TABLE `workshops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `workshops`
--

INSERT INTO `workshops` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Warsztat \"Pod Sosną\"', 'ul. Słoneczna 2, 43-100 Tychy', NULL, NULL),
(2, 'Stacja Naprawy Pojazdów \"Cztery Koła\"', 'ul. Jasna 12/2, 40-750 Katowice', '2021-03-20 11:06:47', '2021-03-20 11:06:47'),
(3, 'Stacja Warsztatowa \"Bracia i Spółka\"', 'ul. Błogosławiona 13, 41-800 Zabrze', '2021-03-20 11:07:23', '2021-03-20 11:07:23'),
(4, 'Warsztat \"Post-PGR\"', 'ul. Błękitna 12/215, 34-112 Sosnowiec', '2021-03-20 13:00:28', '2021-03-20 14:05:05'),
(5, 'Stacja Kontroli Pojazdów \"Przegląd\"', 'ul. Stołeczna 1, 40-008 Bytom', '2021-03-20 14:04:00', '2021-03-20 14:04:00'),
(6, 'Warsztat Samochodowy Radom', 'ul. Biała 78, 26-602 Radom', '2021-03-28 13:16:56', '2021-03-28 13:17:01');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `delivers`
--
ALTER TABLE `delivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivers_workshop_id_foreign` (`workshop_id`);

--
-- Indeksy dla tabeli `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeksy dla tabeli `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`),
  ADD KEY `invoices_workshop_id_foreign` (`workshop_id`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_client_id_foreign` (`client_id`),
  ADD KEY `orders_workshop_id_foreign` (`workshop_id`);

--
-- Indeksy dla tabeli `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeksy dla tabeli `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_user_id_foreign` (`user_id`),
  ADD KEY `permissions_workshop_id_foreign` (`workshop_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeksy dla tabeli `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `warehouses_items`
--
ALTER TABLE `warehouses_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouses_items_workshop_id_foreign` (`workshop_id`);

--
-- Indeksy dla tabeli `workshops`
--
ALTER TABLE `workshops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `delivers`
--
ALTER TABLE `delivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `description`
--
ALTER TABLE `description`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `warehouses_items`
--
ALTER TABLE `warehouses_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `workshops`
--
ALTER TABLE `workshops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `delivers`
--
ALTER TABLE `delivers`
  ADD CONSTRAINT `delivers_workshop_id_foreign` FOREIGN KEY (`workshop_id`) REFERENCES `description` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_workshop_id_foreign` FOREIGN KEY (`workshop_id`) REFERENCES `description` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_workshop_id_foreign` FOREIGN KEY (`workshop_id`) REFERENCES `description` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permissions_workshop_id_foreign` FOREIGN KEY (`workshop_id`) REFERENCES `description` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `warehouses_items`
--
ALTER TABLE `warehouses_items`
  ADD CONSTRAINT `warehouses_items_workshop_id_foreign` FOREIGN KEY (`workshop_id`) REFERENCES `description` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
