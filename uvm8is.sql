-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-10-2018 a las 13:21:02
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `uvm8is`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paterno` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materno` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_cuenta` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_movil` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_fijo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alumno_no_cuenta_unique` (`no_cuenta`),
  UNIQUE KEY `alumno_e_mail_unique` (`e_mail`),
  UNIQUE KEY `alumno_tel_movil_unique` (`tel_movil`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nombres`, `paterno`, `materno`, `pass`, `no_cuenta`, `e_mail`, `tel_movil`, `tel_fijo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Noe Carlos', 'Lara', 'Martinez', '123456', '010033825', 'noelaramartinez@gmail.com', '5512462219', '5512462219', 1, NULL, NULL),
(2, 'Luis Fernando', 'Aguirre', 'Aguirre', 'secret', '010033816', 'fcrm2000@gmail.com', '5523168739', '5523168739', 1, NULL, NULL),
(3, 'Niki', 'Minaj', '', '123456', '010022834', 'niki@uvm.my.edu.mx', '55133345497', '', 1, NULL, NULL),
(4, 'Sasha', 'Gray', '', '123456', '010033111', 'sashaaction@gray.com', '5513343325', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiento`
--

DROP TABLE IF EXISTS `asiento`;
CREATE TABLE IF NOT EXISTS `asiento` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_mesa` int(10) UNSIGNED NOT NULL,
  `id_silla` int(10) UNSIGNED NOT NULL,
  `id_reservacion` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `asiento_id_mesa_foreign` (`id_mesa`),
  KEY `asiento_id_silla_foreign` (`id_silla`),
  KEY `asiento_id_reservacion_foreign` (`id_reservacion`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `asiento`
--

INSERT INTO `asiento` (`id`, `id_mesa`, `id_silla`, `id_reservacion`, `created_at`, `updated_at`) VALUES
(1, 10, 4, 3, NULL, NULL),
(2, 5, 3, 3, NULL, NULL),
(3, 7, 8, 3, NULL, NULL),
(4, 8, 1, 3, NULL, NULL),
(5, 7, 9, 3, NULL, NULL),
(11, 11, 6, 1, NULL, NULL),
(12, 11, 7, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

DROP TABLE IF EXISTS `mesa`;
CREATE TABLE IF NOT EXISTS `mesa` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `numero_mesa` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`id`, `created_at`, `updated_at`, `numero_mesa`) VALUES
(1, NULL, NULL, 1),
(2, NULL, NULL, 2),
(3, NULL, NULL, 3),
(4, NULL, NULL, 4),
(5, NULL, NULL, 5),
(6, NULL, NULL, 6),
(7, NULL, NULL, 7),
(8, NULL, NULL, 8),
(9, NULL, NULL, 9),
(10, NULL, NULL, 10),
(11, NULL, NULL, 11),
(12, NULL, NULL, 12),
(13, NULL, NULL, 13),
(14, NULL, NULL, 14),
(15, NULL, NULL, 15),
(16, NULL, NULL, 16),
(17, NULL, NULL, 17),
(18, NULL, NULL, 18),
(19, NULL, NULL, 19),
(20, NULL, NULL, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_08_165643_create_alumno_table', 1),
(4, '2018_09_08_211013_create_reservacion_table', 1),
(5, '2018_09_08_211134_create_mesa_table', 1),
(6, '2018_09_08_211203_create_silla_table', 1),
(7, '2018_09_08_211234_create_asiento_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

DROP TABLE IF EXISTS `reservacion`;
CREATE TABLE IF NOT EXISTS `reservacion` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_alumno` int(10) UNSIGNED NOT NULL,
  `fecha_reservacion` datetime NOT NULL,
  `fecha_limite` datetime NOT NULL,
  `fecha_evento` datetime NOT NULL,
  `monto_total` double(8,2) NOT NULL,
  `adeudo` double(8,2) NOT NULL,
  `precio_unitario` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `cantidad_asientos` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reservacion_id_alumno_foreign` (`id_alumno`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`id`, `id_alumno`, `fecha_reservacion`, `fecha_limite`, `fecha_evento`, `monto_total`, `adeudo`, `precio_unitario`, `status`, `cantidad_asientos`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-09-09 00:00:00', '2018-11-30 00:00:00', '2018-12-07 00:00:00', 3040.00, 340.00, 760.00, 0, 4, NULL, NULL),
(2, 2, '2018-09-06 00:00:00', '2018-11-30 00:00:00', '2018-12-07 00:00:00', 3800.00, 1900.00, 760.00, 0, 5, NULL, NULL),
(3, 4, '2018-10-16 00:00:00', '2018-11-30 00:00:00', '2018-12-07 00:00:00', 7600.00, 0.00, 760.00, 1, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `silla`
--

DROP TABLE IF EXISTS `silla`;
CREATE TABLE IF NOT EXISTS `silla` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `numero_silla` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `silla`
--

INSERT INTO `silla` (`id`, `numero_silla`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL),
(3, 3, NULL, NULL),
(4, 4, NULL, NULL),
(5, 5, NULL, NULL),
(6, 6, NULL, NULL),
(7, 7, NULL, NULL),
(8, 8, NULL, NULL),
(9, 9, NULL, NULL),
(10, 10, NULL, NULL),
(11, 11, NULL, NULL),
(12, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '010033825', 'noelaramartinez@gmail.com', '123456', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
