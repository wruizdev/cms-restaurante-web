-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-09-2025 a las 15:10:47
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zona` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `numero` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `zona`, `estado`, `numero`, `capacidad`, `created_at`, `updated_at`) VALUES
(1, 'Terraza', 1, 1, 4, '2025-06-13 07:09:30', '2025-06-24 09:11:17'),
(2, 'Terraza', 1, 2, 4, '2025-06-13 07:25:23', '2025-07-03 15:21:26'),
(3, 'Terraza', 0, 3, 4, '2025-06-13 07:25:50', '2025-07-08 13:24:14'),
(4, 'Terraza', 0, 4, 4, '2025-06-13 07:42:55', '2025-07-08 13:24:12'),
(5, 'Terraza', 0, 5, 4, '2025-06-13 07:43:10', '2025-06-17 11:02:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_11_091837_create_usuarios_table', 1),
(5, '2025_06_11_091855_create_mesas_table', 1),
(6, '2025_06_11_091906_create_platos_table', 1),
(7, '2025_06_11_091919_create_reservas_table', 1),
(8, '2025_07_01_155958_create_posts_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `foto` longtext NOT NULL,
  `categoria` enum('Entrante','Principal','Postre','Bebida') NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`id`, `nombre`, `foto`, `categoria`, `precio`, `descripcion`, `created_at`, `updated_at`) VALUES
(3, 'Entrecot', 'platos/IUKsOdphny6i4os96PQBKSIp4HLftFmK3XDqOqiU.jpg', 'Principal', 18.90, 'Carne asada a la parilla acompañada de patatas y pimientos.', '2025-06-23 08:12:08', '2025-06-23 08:12:08'),
(4, 'Lubina', 'platos/q6NXplZykxfN1weadukW1r9wjXhqfFOSOQwiSAYz.jpg', 'Principal', 16.70, 'Lubina acompañada de verduras y una salsa especial de la casa', '2025-06-23 08:13:03', '2025-06-23 08:40:48'),
(5, 'Langostinos asados', 'platos/RdsFk7ll7tkMaMGiJwygwUbLSIc6fwtM2JzsvcIL.jpg', 'Entrante', 15.50, 'Langostinos asados a la plancha acompañados de guarnición', '2025-06-23 08:14:45', '2025-06-23 08:14:45'),
(6, 'Salmón envuelto', 'platos/TGuxWBNer5xEi7KKsmQQ830gaId2t31LXNYvqOXl.jpg', 'Entrante', 17.80, 'Salmón envuelto en hoja de plátano acompañado de verduritas', '2025-06-23 08:16:25', '2025-06-23 08:16:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `resumen` longtext NOT NULL,
  `cuerpo` text NOT NULL,
  `foto_post` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `titulo`, `resumen`, `cuerpo`, `foto_post`, `created_at`, `updated_at`) VALUES
(1, 'La importancia de una alimentación equilibrada', 'Descubre cómo una dieta equilibrada no solo mejora tu salud física, sino también tu bienestar emocional y mental.', '<p>Los Beneficios de Dormir Bien</p>\n\n<p>Dormir bien es fundamental para la salud física y mental. Un buen descanso mejora:</p>\n\n<ul>\n	<li>\n	<p>Memoria y concentración</p>\n	</li>\n	<li>\n	<p>Estado de ánimo y bienestar emocional</p>\n	</li>\n	<li>\n	<p>Función inmunológica</p>\n	</li>\n	<li>\n	<p>Rendimiento físico y deportivo</p>\n	</li>\n</ul>\n\n<p>Además, la falta de sueño puede aumentar el riesgo de enfermedades crónicas como:</p>\n\n<ol>\n	<li>\n	<p>Diabetes tipo 2</p>\n	</li>\n	<li>\n	<p>Enfermedades cardiovasculares</p>\n	</li>\n	<li>\n	<p>Obesidad</p>\n	</li>\n</ol>\n\n<p>Para mejorar la calidad del sueño, te recomendamos:</p>\n\n<ul>\n	<li>\n	<p>Establecer una rutina de horarios</p>\n	</li>\n	<li>\n	<p>Evitar pantallas y cafeína antes de dormir</p>\n	</li>\n	<li>\n	<p>Crear un ambiente tranquilo y oscuro</p>\n	</li>\n	<li>\n	<p>Realizar ejercicio regularmente</p>\n	</li>\n</ul>\n\n<p>“Dormir es la cadena dorada que une salud y nuestros cuerpos.” – <strong>Thomas Dekker</strong></p>\n\n<p> </p>', 'posts/NGqg4cmIE88VPCVoRmufrsPGW9FOg9RV6R8O6sDU.jpg', '2025-07-01 14:45:39', '2025-07-01 15:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mesa_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comensales` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `visto` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `mesa_id`, `nombre`, `telefono`, `email`, `comensales`, `fecha`, `hora`, `visto`, `created_at`, `updated_at`) VALUES
(16, 3, 'Brissa Conde', '6574895458', 'brisac@gmail.com', 4, '2025-06-20', '20:29:00', 1, '2025-06-19 11:29:13', '2025-06-19 11:29:13'),
(18, 1, 'Juan Sierra', '6574895456', 'juanlopez@gmail.com', 4, '2025-06-24', '15:15:00', 0, '2025-06-24 09:11:17', '2025-07-01 16:26:27'),
(19, 2, 'Benito', '6574895458', 'juanlopez@gmail.com', 4, '2025-07-02', '20:25:00', 0, '2025-07-01 16:25:56', '2025-07-01 16:26:07'),
(20, 2, 'William Ruiz', '6574895456', 'willruiz@gmail.com', 4, '2025-07-04', '20:21:00', 1, '2025-07-03 15:21:26', '2025-07-03 15:21:26'),
(21, 3, 'Prueba', '6574895458', 'juansierra@gmail.com', 4, '2025-07-08', '18:22:00', 1, '2025-07-08 13:22:06', '2025-07-08 13:22:06'),
(22, 4, 'David', '6574895456', 'davidlopez@gmail.com', 4, '2025-07-09', '18:23:00', 0, '2025-07-08 13:23:42', '2025-07-08 13:24:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4izYUNTa1wQ6LU9iz6og1MDzEb4UvkYP54FbkuC8', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkVUSmZvRmxoYzZpa0F2T21EWERPYXlwa3pENW91eWMxYXBIbFRvcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1751991719);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nick` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp(),
  `rol` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `email`, `password`, `fecha_alta`, `rol`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin@admin.com', '$2y$12$nqueBN7UDJ2UgT.I9NNA0.60eaP6kexaDUuCVYqOyP6vpjVnUpcjS', '2025-06-11 08:28:24', 0, '2025-06-11 08:28:24', '2025-06-11 08:28:24'),
(2, 'administrador1', 'admin1@example.com', '$2y$12$RQAA.uUUOHd6Co21CJd5PejLGeAJ6/Bu.ZoFKwfNVZrepgQOpWAle', '2025-06-11 12:17:04', 1, '2025-06-11 10:17:04', '2025-06-11 10:17:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mesas_numero_unique` (`numero`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservas_mesa_id_foreign` (`mesa_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_nick_unique` (`nick`),
  ADD UNIQUE KEY `usuarios_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_mesa_id_foreign` FOREIGN KEY (`mesa_id`) REFERENCES `mesas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
