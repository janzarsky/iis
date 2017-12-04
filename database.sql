-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost
-- Vytvořeno: Pon 04. pro 2017, 19:12
-- Verze serveru: 10.2.9-MariaDB
-- Verze PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `iis`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `checks`
--

CREATE TABLE `checks` (
  `id` int(10) UNSIGNED NOT NULL,
  `alcoholic_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `checks`
--

INSERT INTO `checks` (`id`, `alcoholic_id`, `amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2017-12-04 18:12:19', '2017-12-04 18:12:19', NULL),
(2, 2, 2, '2017-12-04 18:12:19', '2017-12-04 18:12:19', NULL),
(3, 1, 2, '2017-12-04 18:12:19', '2017-12-04 18:12:19', NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `meetings`
--

CREATE TABLE `meetings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user1_id` int(10) UNSIGNED NOT NULL,
  `user2_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `location` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `meetings`
--

INSERT INTO `meetings` (`id`, `user1_id`, `user2_id`, `date`, `location`, `confirmed`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, '2017-11-27', 'Some cafe', 0, '2017-12-04 18:12:19', '2017-12-04 18:12:19', NULL),
(2, 2, 1, '2017-11-27', 'Some cafe', 0, '2017-12-04 18:12:19', '2017-12-04 18:12:19', NULL),
(3, 2, 1, '2017-11-23', 'Some cafe', 1, '2017-12-04 18:12:19', '2017-12-04 18:12:19', NULL),
(4, 1, 2, '2017-11-23', 'Some cafe', 1, '2017-12-04 18:12:19', '2017-12-04 18:12:19', NULL),
(5, 2, 1, '2018-11-27', 'Some cafe', 1, '2017-12-04 18:12:19', '2017-12-04 18:12:19', NULL),
(6, 1, 2, '2018-11-27', 'Some cafe', 1, '2017-12-04 18:12:19', '2017-12-04 18:12:19', NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2017_11_27_134756_create_meetings_table', 1),
(3, '2017_12_04_152457_create_checks_table', 1),
(4, '2017_12_04_163043_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `organizer_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `location` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `sessions`
--

INSERT INTO `sessions` (`id`, `organizer_id`, `date`, `location`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2018-01-02', 'some meeting room', '2017-12-04 18:12:19', '2017-12-04 18:12:19', NULL),
(2, 4, '2018-01-04', 'some meeting room', '2017-12-04 18:12:19', '2017-12-04 18:12:19', NULL),
(3, 4, '2018-01-06', 'some meeting room', '2017-12-04 18:12:19', '2017-12-04 18:12:19', NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_alcoholic` tinyint(1) NOT NULL DEFAULT 0,
  `is_patron` tinyint(1) NOT NULL DEFAULT 0,
  `is_specialist` tinyint(1) NOT NULL DEFAULT 0,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `patron_id` int(10) UNSIGNED DEFAULT NULL,
  `patron_confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `specialist_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_alcoholic`, `is_patron`, `is_specialist`, `is_admin`, `patron_id`, `patron_confirmed`, `specialist_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'alcoholic', 'alcoholic@example.org', '$2y$10$KbB9Gfc343zaEmz9yKCbQu1mi8TprJn.MSOJu7nBRjRf5fj2th6Tm', 1, 1, 0, 0, 2, 1, 4, NULL, '2017-12-04 18:12:19', '2017-12-04 18:12:19', NULL),
(2, 'alcoholic2', 'alcoholic2@example.org', '$2y$10$98yPuYk3UN1smJRFEmi.kuQ1fZ18Cl5fh83CbRIhOQIF217HKYr.C', 1, 1, 0, 0, 1, 1, 4, NULL, '2017-12-04 18:12:19', '2017-12-04 18:12:19', NULL),
(3, 'alcoholic3', 'alcoholic3@example.org', '$2y$10$3Wr7LJIMHN901CulACFiFudsFdlMSKssp7h4T1JhF2rPGBPcj0XgW', 1, 1, 0, 0, 1, 0, 4, NULL, '2017-12-04 18:12:19', '2017-12-04 18:12:19', NULL),
(4, 'specialist', 'specialist@example.org', '$2y$10$8OLbnYMaVjRx7zo2OxvRkOUCEuVNtVfK5kH7NwhqpB7EnChhA8nm6', 0, 0, 1, 0, NULL, 0, NULL, NULL, '2017-12-04 18:12:19', '2017-12-04 18:12:19', NULL),
(5, 'admin', 'admin@example.org', '$2y$10$PpePo/5BGG57GDD9RE4uK.fv11NMw7.IPLlrji3IdcT5bW8bRxQgO', 0, 0, 0, 1, NULL, 0, NULL, NULL, '2017-12-04 18:12:19', '2017-12-04 18:12:19', NULL),
(6, 'alcoholic_deletable', 'alcoholic_deletable3@example.org', '$2y$10$s4.YDgDW35TA5JTCspSJl.fNjQGvPHJ/mzdHefeZVqVy7/Gmq/BcW', 1, 0, 0, 0, NULL, 0, NULL, NULL, '2017-12-04 18:12:19', '2017-12-04 18:12:19', NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `users_sessions`
--

CREATE TABLE `users_sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `users_sessions`
--

INSERT INTO `users_sessions` (`id`, `user_id`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2017-12-04 18:12:19', '2017-12-04 18:12:19');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `checks`
--
ALTER TABLE `checks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checks_alcoholic_id_foreign` (`alcoholic_id`);

--
-- Klíče pro tabulku `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meetings_user1_id_foreign` (`user1_id`),
  ADD KEY `meetings_user2_id_foreign` (`user2_id`);

--
-- Klíče pro tabulku `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_organizer_id_foreign` (`organizer_id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_patron_id_foreign` (`patron_id`),
  ADD KEY `users_specialist_id_foreign` (`specialist_id`),
  ADD KEY `users_id_index` (`id`);

--
-- Klíče pro tabulku `users_sessions`
--
ALTER TABLE `users_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_sessions_user_id_foreign` (`user_id`),
  ADD KEY `users_sessions_session_id_foreign` (`session_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `checks`
--
ALTER TABLE `checks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pro tabulku `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pro tabulku `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pro tabulku `users_sessions`
--
ALTER TABLE `users_sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `checks`
--
ALTER TABLE `checks`
  ADD CONSTRAINT `checks_alcoholic_id_foreign` FOREIGN KEY (`alcoholic_id`) REFERENCES `users` (`id`);

--
-- Omezení pro tabulku `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `meetings_user1_id_foreign` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `meetings_user2_id_foreign` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`);

--
-- Omezení pro tabulku `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_organizer_id_foreign` FOREIGN KEY (`organizer_id`) REFERENCES `users` (`id`);

--
-- Omezení pro tabulku `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_patron_id_foreign` FOREIGN KEY (`patron_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_specialist_id_foreign` FOREIGN KEY (`specialist_id`) REFERENCES `users` (`id`);

--
-- Omezení pro tabulku `users_sessions`
--
ALTER TABLE `users_sessions`
  ADD CONSTRAINT `users_sessions_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`),
  ADD CONSTRAINT `users_sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
