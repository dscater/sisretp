-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-03-2023 a las 16:23:12
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisretp_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nom`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'INGENIERÍA DE SISTEMAS', '', '2019-04-29 18:29:14', '2019-04-29 18:29:14'),
(2, 'MEDICINA', '', '2019-04-29 18:29:14', '2019-04-29 18:29:14'),
(3, 'DERECHO', '', '2019-04-29 18:29:14', '2019-04-29 18:29:14'),
(4, 'ADMINISTRACIÓN DE EMPRESAS', '', '2019-04-29 18:29:14', '2019-05-02 14:36:56'),
(5, 'INGENIERÍA COMERCIAL', '', '2019-05-02 14:37:34', '2019-05-02 14:38:08'),
(6, 'INFORMATICA', '', '2019-05-03 14:01:38', '2019-05-03 14:01:38'),
(7, 'COMUNICACIÓN SOCIAL', '', '2019-05-05 15:42:04', '2019-05-05 15:42:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuarios`
--

CREATE TABLE `datos_usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apep` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apem` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci_exp` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fono` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cel` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `datos_usuarios`
--

INSERT INTO `datos_usuarios` (`id`, `nom`, `apep`, `apem`, `ci`, `ci_exp`, `fono`, `cel`, `foto`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'JUAN', 'COPA', 'MAMANI', '12345678', 'LP', '2134568', '78945612', 'JUAN1234567890.jpg', 2, '2019-04-29 18:29:14', '2019-04-29 18:29:14'),
(2, 'CARLOS', 'QUISPE', '', '12345678', 'LP', '', '68431265', 'CARLOS123456800.jpg', 3, '2019-04-29 18:29:14', '2019-04-29 18:29:14'),
(3, 'JOAQUIN', 'COPA', 'MAMANI', '1234578', 'LP', '', '78965321', 'JCOPA1_91557235952.jpg', 15, '2019-05-07 13:32:32', '2019-05-07 13:32:32'),
(4, 'AAAA', 'AAA', 'AAA', '1234', 'LP', '', '76522101', 'AAAA11679414611.jpg', 17, '2023-03-21 16:03:31', '2023-03-21 16:03:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cod` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_aut` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_emp` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpto` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zona` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fono` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `casilla` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actividad_eco` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `cod`, `nit`, `nro_aut`, `nro_emp`, `name`, `alias`, `pais`, `dpto`, `ciudad`, `zona`, `calle`, `nro`, `email`, `fono`, `cel`, `fax`, `casilla`, `web`, `logo`, `actividad_eco`, `created_at`, `updated_at`) VALUES
(1, 'EMP-01', '1111556878', '56565555', '111155500', 'REGISTRO DE PROFESIONALES LEGALES EN BOLIVIA', 'E.P.', 'BOLIVIA', 'LA PAZ', 'LA PAZ', 'x', 'x', '0', NULL, '224578', '68412345', NULL, NULL, NULL, 'logo.png', 'SIN FINES DE LUCRO', '2019-04-29 18:29:14', '2019-04-29 18:29:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razon` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mensaje` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emisor_id` bigint(20) UNSIGNED NOT NULL,
  `receptor_id` bigint(20) UNSIGNED NOT NULL,
  `visto_receptor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `razon`, `mensaje`, `emisor_id`, `receptor_id`, `visto_receptor`, `fecha`, `hora`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CARLOS PRADERA GONZALES', 'ENTREVISTA', 'mensaje de prueba', 5, 4, 1, '2019-04-29', '16:03:54', 1, '2019-04-29 20:03:54', '2019-04-30 13:47:17'),
(6, 'CARLOS PRADERA GONZALES', 'ENTREVISTA 2', 'Otro mensaje', 5, 4, 1, '2019-04-29', '16:11:41', 1, '2019-04-29 20:11:41', '2019-05-02 16:50:23'),
(7, 'VICTOR CHURA CALLISAYA', 'ACEPTACIÓN DE TRABAJO', 'MENSAJE DE TITULADO', 4, 5, 1, '2019-04-30', '10:17:32', 1, '2019-04-30 14:17:32', '2019-05-07 14:58:11'),
(9, 'CARLOS PRADERA', 'ASUNTO2', 'MENSAJE2', 5, 4, 1, '2019-04-30', '10:31:44', 0, '2019-04-30 14:31:44', '2019-05-07 15:28:45'),
(10, 'CARLOS PRADERA', 'ASUNTO3', 'MENSAJE3', 5, 4, 1, '2019-04-30', '10:33:44', 1, '2019-04-30 14:33:44', '2019-05-02 16:50:38'),
(11, 'CARLOS PRADERA', 'ENTREVISTA DE TRABAJO', 'ME INTERESARIA CONTRATARTE', 5, 6, 1, '2019-05-01', '16:41:39', 1, '2019-05-01 20:41:39', '2019-05-01 20:42:12'),
(12, 'CARLOS PRADERA', 'ASUNTO 12', 'MENSAJE 12', 5, 6, 1, '2019-05-01', '16:52:28', 1, '2019-05-01 20:52:28', '2019-05-01 20:52:28'),
(13, 'CARLOS PRADERA', 'OTRO ASUNTO', 'OTRO MENSAJE MAS', 5, 6, 1, '2019-05-01', '16:54:30', 1, '2019-05-01 20:54:30', '2019-05-01 20:54:30'),
(14, 'JAVIER MAMANI MAMANI', 'ACEPTACION DE ENTREVISTA DE TRABAJO', 'MENSAJE DE ACEPTACION', 6, 5, 1, '2019-05-01', '16:56:43', 1, '2019-05-01 20:56:43', '2019-05-07 15:01:13'),
(15, 'CARLOS PRADERA', 'ENTREVISTA12312', 'MENSAJE123123123', 5, 7, 1, '2019-05-01', '18:27:19', 1, '2019-05-01 22:27:19', '2019-05-01 22:28:30'),
(16, 'CARLOS PRADERA', 'MENSAJE123123123', 'MENSAJER123123123123123213123', 5, 6, 1, '2019-05-01', '18:29:34', 1, '2019-05-01 22:29:34', '2019-05-01 22:29:34'),
(17, 'CARLOS PRADERA', 'ENTREVISTA4556', 'MENSAJE9489', 5, 6, 1, '2019-05-02', '18:55:37', 1, '2019-05-02 22:55:37', '2019-05-02 22:56:06'),
(18, 'JAVIER MAMANI MAMANI', 'ACEPTACIÓN DE TRABAJO', 'OK', 6, 5, 1, '2019-05-02', '18:56:25', 1, '2019-05-02 22:56:25', '2019-05-07 14:58:47'),
(19, 'CARLOS PRADERA', 'ENTREVISTA12312', 'MENSAJE DE PRUEBA21', 5, 9, 1, '2019-05-02', '19:18:35', 1, '2019-05-02 23:18:35', '2019-05-02 23:18:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(36, '2014_10_12_000000_create_users_table', 1),
(37, '2014_10_12_100000_create_password_resets_table', 1),
(38, '2019_04_23_125856_create_datos_usuarios_table', 1),
(39, '2019_04_23_130205_create_carreras_table', 1),
(40, '2019_04_23_130208_create_titulados_table', 1),
(41, '2019_04_23_130223_create_titulos_table', 1),
(42, '2019_04_23_130259_create_empresas_table', 1),
(43, '2019_04_29_141541_create_mensajes_table', 1),
(44, '2019_04_29_141607_create_visitas_table', 1),
(45, '2023_03_22_104917_create_postgrados_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postgrados`
--

CREATE TABLE `postgrados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulado_id` bigint(20) UNSIGNED NOT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `universidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `tipo` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diploma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `postgrados`
--

INSERT INTO `postgrados` (`id`, `titulado_id`, `pais`, `universidad`, `nombre`, `fecha_ini`, `fecha_fin`, `tipo`, `diploma`, `created_at`, `updated_at`) VALUES
(1, 4, 'BOLIVIA', 'UNIVERSIDAD 1', 'ESPECIALIDAD', '2022-01-01', '2023-03-03', 'POSTGRADO', 'dFELIPE01679498365.pdf', '2023-03-22 15:15:34', '2023-03-22 15:19:25'),
(2, 4, 'PAIS2', 'UNIVERSIDAD 2', 'ESPECIALIDAD', '2023-03-03', '2023-04-04', 'POSTGRADO', 'dFELIPE11679498431.pdf', '2023-03-22 15:20:31', '2023-03-22 15:21:19'),
(3, 10, 'PAIS 1', 'UNIVERSIDAD 1', 'POSTGRADO 1', '2023-01-01', '2023-03-03', 'POSTGRADO', 'dCARLOS01679500550.pdf', '2023-03-22 15:53:07', '2023-03-22 15:55:50'),
(4, 11, 'PAIS 1', 'UNIVERSIDAD 1', 'NOMBRE POSTGRADO 1', '2023-03-03', '2023-04-04', 'POSTGRADO', 'dSANDRO01679501204.pdf', '2023-03-22 16:06:44', '2023-03-22 16:06:44'),
(5, 11, 'PAIS 2', 'UNIVERSIDAD POST GRADO 2', 'NOMBRE ESPECIALIDAD', '2022-01-01', '2023-02-01', 'POSTGRADO', 'dSANDRO11679501205.pdf', '2023-03-22 16:06:45', '2023-03-22 16:06:45'),
(6, 12, 'PAIS 1', 'UNIVERSIDAD 1', 'ESPECIALIDAD', '2023-03-03', '2023-04-04', 'POSTGRADO', 'dJOSE01679501636.pdf', '2023-03-22 16:13:56', '2023-03-22 16:13:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulados`
--

CREATE TABLE `titulados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apep` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apem` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nac` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci_exp` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_pais` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_ciudad` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_z` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_ac` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_num` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fono` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_reg` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `titulados`
--

INSERT INTO `titulados` (`id`, `nom`, `apep`, `apem`, `fecha_nac`, `ci`, `ci_exp`, `genero`, `dir_pais`, `dir_ciudad`, `dir_z`, `dir_ac`, `dir_num`, `fono`, `cel`, `foto`, `user_id`, `fecha_reg`, `created_at`, `updated_at`) VALUES
(1, 'VICTOR', 'CHURA', 'CALLISAYA', '1995-04-22', '6843175', 'LP', 'M', 'BOLIVIA', 'LA PAZ', 'ZONA PANTICIRCA', 'CALLE 4', '538', '72558358', '77575383', 'VICTOR1556640582.jpg', 4, '2019-04-29', '2019-04-29 19:10:36', '2019-04-30 16:09:42'),
(2, 'JAVIER', 'MAMANI', 'MAMANI', '1990-06-22', '12345678', 'CB', 'M', 'BOLIVIA', 'LA PAZ', 'ZONA PAMPAHASI', 'CALLE LOS HEROES', '231', '2314568', '68435129', 'JAVIER1556743078.jpg', 6, '2019-05-01', '2019-05-01 20:37:58', '2019-05-01 20:37:58'),
(3, 'JORGE', 'CHOQUE', 'MAMANI', '1994-02-01', '12345678', 'CB', 'M', 'BOLIVIA', 'LA PAZ', 'ZONA LOS OLIVOS', 'CALLE LOS PEDREGALES', '123', '3215647', '64832156', 'JORGE1556749117.png', 7, '2019-05-01', '2019-05-01 22:18:37', '2019-05-01 22:18:37'),
(4, 'FELIPE', 'CONTRERAS', 'CONTRERAS', '1990-01-01', '12345678', 'SC', 'M', 'BOLIVIA', 'LA PAZ', 'ZONA LOS OLIVOS', 'CALLE LOS HEROES', '123', '', '78945612', 'FELIPE1556838349.jpg', 8, '2019-05-02', '2019-05-02 23:05:49', '2019-05-02 23:05:49'),
(5, 'PATRICIA', 'CONDORI', 'MORALES', '1994-02-01', '12345678', 'LP', 'F', 'BOLIVIA', 'LA PAZ', 'ZONA LOS HEROES', 'CALLE LOS OLIVOS', '3132', '2314568', '78945612', 'PATRICIA1556838971.jpg', 9, '2019-05-02', '2019-05-02 23:16:11', '2019-05-02 23:16:11'),
(6, 'LOURDES', 'MAMANI', 'CARVAJAL', '1993-06-02', '123456789', 'CB', 'F', 'BOLIVIA', 'COCHABAMBA', 'ZONA LOS PEDREGALES', 'BARRIO 23 DE MAYO', '156', '3654123', '68432156', 'LOURDES1556839496.jpg', 10, '2019-05-02', '2019-05-02 23:24:56', '2019-05-02 23:24:56'),
(7, 'XIMENA', 'QUISPE', 'QUISPE', '1993-01-01', '12345678', 'LP', 'F', 'BOLIVIA', 'LA PAZ', 'ZONA LOS OLIVOS', 'AVENIDA BOLIVAR', '123', '', '78945612', 'XIMENA1556840278.jpg', 11, '2019-05-02', '2019-05-02 23:37:58', '2019-05-02 23:37:58'),
(8, 'LUIS', 'QUISPE', 'CHAVEZ', '1994-12-22', '12345678', 'LP', 'M', 'BOLIVIA', 'LA PAZ', 'ZONA LOS OLIVOS', 'CALLE LOS HERORES', '156156', '1156', '78945612', 'LUIS1556840369.jpg', 12, '2019-05-02', '2019-05-02 23:39:29', '2019-05-02 23:39:29'),
(9, 'MARIA', 'MERCADO', 'GOMEZ', '1992-08-06', '12345678', 'CB', 'F', 'BOLIVIA', 'COCHABAMBA', 'ZONA LOS OLIVOS', 'CALLE LOS HEROES', '45', '', '78945612', 'MARIA1556893370.jpg', 13, '2019-05-03', '2019-05-03 14:22:50', '2019-05-03 14:22:50'),
(10, 'CARLOS', 'MAMANI', 'MAMANI', '2000-01-01', '123456', 'LP', 'M', 'BOLIVIA', 'LA PAZ', 'LOS OLIVOS', 'AV. LOS PEDREGALES', '123', '', '7777777', 'CARLOS1679500387.jpg', 23, '2023-03-22', '2023-03-22 15:53:07', '2023-03-22 15:53:07'),
(11, 'SANDRO', 'CALCINA', 'MAMANI', '2000-03-03', '123456', 'CB', 'M', 'BOLIVIA', 'LA PAZ', 'LOS PEDREGALES', 'CALLE 3', '123123', '22222', '77776676', 'SANDRO1679501204.jpg', 24, '2023-03-22', '2023-03-22 16:06:44', '2023-03-22 16:06:44'),
(12, 'JOSE', 'CARVAJAL', 'MAMANI', '2023-01-01', '123456', 'SC', 'M', 'BOLIVIA', 'LA PAZ', 'LOS OLIVOS', 'C 3', '44', '22222', '777777', 'JOSE1679501636.jpg', 25, '2023-03-22', '2023-03-22 16:13:56', '2023-03-22 16:13:56');

--
-- Disparadores `titulados`
--
DELIMITER $$
CREATE TRIGGER `inicia_visitas` AFTER INSERT ON `titulados` FOR EACH ROW BEGIN
INSERT INTO visitas VALUES(null,0,NEW.id,NOW(),NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulos`
--

CREATE TABLE `titulos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serie` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uni` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grado` enum('TÉCNICO MEDIO','TÉCNICO SUPERIOR','LICENCIATURA','MAESTRÍA','DOCTORADO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo_prof` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_t` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulado_id` bigint(20) UNSIGNED NOT NULL,
  `carrera_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `titulos`
--

INSERT INTO `titulos` (`id`, `titulo`, `num`, `serie`, `uni`, `grado`, `titulo_prof`, `fecha_t`, `titulado_id`, `carrera_id`, `created_at`, `updated_at`) VALUES
(1, 'VICTOR1556550636.pdf', '12315', '4A-55-C1', 'UNIVERSIDAD SALESIANA DE BOLIVIA', 'LICENCIATURA', 'INGENIERO DE SISTEMAS', '2019-12-20', 1, 1, '2019-04-29 19:10:36', '2019-04-29 19:10:36'),
(2, 'JAVIER1556743079.pdf', '123456', '123156', 'UNIVERSIDAD PUBLICA DE EL ALTO', 'LICENCIATURA', 'ADMINISTRADOR DE EMPRESAS', '2017-05-22', 2, 4, '2019-05-01 20:37:59', '2019-05-01 20:37:59'),
(3, 'JORGE1556749117.pdf', '1231', '5645645', 'UNIVERSIDAD MAYOR DE SAN ANDRES', 'LICENCIATURA', 'INGENIERO COMERCIAL', '2010-01-22', 3, 1, '2019-05-01 22:18:37', '2019-05-01 22:18:37'),
(4, 'FELIPE01679496218.pdf', '213', '15656', 'UNIVERSIDAD MAYOR DE SAN ANDRES', 'LICENCIATURA', 'INFORMATICO', '2012-01-01', 4, 1, '2019-05-02 23:05:50', '2023-03-22 14:43:38'),
(5, 'PATRICIA1556838971.pdf', '1651', '135156', 'PUBLICA DE EL ALTO', 'LICENCIATURA', 'ADMINISTRADORA DE EMPRESAS', '2017-01-01', 5, 4, '2019-05-02 23:16:11', '2019-05-02 23:16:11'),
(6, 'LOURDES1556839497.pdf', '156', '15656', 'UNIVERSIDAD MAYOR DE SAN SIMON', 'LICENCIATURA', 'INGENIERA DE SISTEMAS', '2013-01-01', 6, 1, '2019-05-02 23:24:57', '2019-05-02 23:24:57'),
(7, 'XIMENA1556840279.pdf', '1561', '156165', 'SALESIANA DE BOLIVIA', 'LICENCIATURA', 'LICENCIADA EN DERECHO', '2007-02-02', 7, 3, '2019-05-02 23:37:59', '2019-05-02 23:37:59'),
(8, 'LUIS1556840369.pdf', '1894', '87987', 'MAYOR DE SAN ANDRES', 'LICENCIATURA', 'INGENIERO COMERCIAL', '2013-01-01', 8, 1, '2019-05-02 23:39:29', '2019-05-02 23:39:29'),
(9, 'MARIA1556893370.pdf', '456', '78912', 'MAYOR DE SAN SIMON', 'LICENCIATURA', 'INFORMATICA', '2010-01-01', 9, 6, '2019-05-03 14:22:50', '2019-05-03 14:22:50'),
(19, 'FELIPE11679496481.pdf', '213', '2222', 'UNIVERSIDAD 2', 'LICENCIATURA', 'TITULO 2', '2023-01-01', 4, 2, '2023-03-22 14:48:01', '2023-03-22 14:48:01'),
(20, 'CARLOS01679500510.pdf', '123123', '123', 'UNIVERSIDAD 1', 'LICENCIATURA', 'TITULO 1', '2022-02-02', 10, 4, '2023-03-22 15:53:07', '2023-03-22 15:55:10'),
(21, 'CARLOS11679500533.pdf', '1231', '1231', 'UNIVERSIDAD 2', 'MAESTRÍA', 'TITULO 2', '2023-03-03', 10, 1, '2023-03-22 15:55:33', '2023-03-22 15:55:33'),
(22, 'SANDRO01679501204.pdf', '123', '123', 'UNIVERSIDAD 1', 'TÉCNICO MEDIO', 'TITULO 1', '2022-02-02', 11, 2, '2023-03-22 16:06:44', '2023-03-22 16:09:10'),
(23, 'JOSE01679501636.pdf', '213', '2222', 'UNIVERSIDAD 1', 'TÉCNICO MEDIO', 'TITULO 1', '2022-02-02', 12, 3, '2023-03-22 16:13:56', '2023-03-22 16:13:56'),
(24, 'JOSE11679501636.pdf', '123', '2222', 'UNIVERSIDAD 2', 'LICENCIATURA', 'TITULO 2', '2023-03-03', 12, 4, '2023-03-22 16:13:56', '2023-03-22 16:13:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('ADMINISTRADOR','AUXILIAR','TITULADO','EMPLEADOR') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `foto`, `tipo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@hotmail.com', '$2y$10$kzlnMYU9TP1SzoCzg2pFe.4r/vZzI1Fj8E5NI1pUEn2qsyKkF.4hq', 'user_default.png', 'ADMINISTRADOR', 1, '2019-04-29 18:29:13', '2019-04-29 18:29:13'),
(2, 'JCOPA1', 'juan@hotmail.com', '$2y$10$thGR6F4.Y5ZApuRWJuqib.oqycgk5j.HhHrJH9/JbbksD0N6aQ0Zy', 'user_default.png', 'ADMINISTRADOR', 1, '2019-04-29 18:29:13', '2019-05-02 16:46:20'),
(3, 'CQUISPE2', 'carlos@hotmail.com', '$2y$10$sHwNmyhStReYuxPxpdeJIelgsiXYQCRA9jggLLADyGC8UWp7Ca0cG', 'user_default.png', 'AUXILIAR', 1, '2019-04-29 18:29:14', '2019-05-02 16:46:02'),
(4, 'VICTOR', 'victorgonzalo1.as@gmail.com', '$2y$10$q0r2Hc/mjoaI9wEpslAp4O2o1At7PhxrPCef462Mr0JfQYRFxEMjm', 'VICTOR1557242907.jpg', 'TITULADO', 1, '2019-04-29 18:43:10', '2019-05-07 15:28:27'),
(5, 'GONZALO', 'victorsalas_01@hotmail.com', '$2y$10$q0r2Hc/mjoaI9wEpslAp4O2o1At7PhxrPCef462Mr0JfQYRFxEMjm', 'user_default.png', 'EMPLEADOR', 1, '2019-04-29 19:08:24', '2019-05-01 22:56:46'),
(6, 'JAVIER', 'javier_21.as@gmail.com', '$2y$10$/PaROwMzrI/TuDzoWj1SKeV.L644sjGi2.8wJSGPlfvZPI7MZXF6u', 'user_default.png', 'TITULADO', 1, '2019-05-01 20:33:41', '2019-05-02 15:01:18'),
(7, 'JORGE', 'jorge@hotmail.com', '$2y$10$dwzQR15uXoVlp2iRIchT3uqeffV5wwwDr3pLC9Ogn0btHnHa1/bR6', 'user_default.png', 'TITULADO', 1, '2019-05-01 22:02:37', '2022-10-19 15:50:56'),
(8, 'FELIPE', 'felipe@hotmail.com', '$2y$10$hgjdNPCQDEd2efjaHCkoluVzXLlhLyINUs5RFJdHdrkyHtLYSbHSy', 'user_default.png', 'TITULADO', 1, '2019-05-02 22:57:38', '2019-05-02 22:57:38'),
(9, 'PATRICIA', 'patricia@gmail.com', '$2y$10$FSBjUS4HHO7blPg.yRXxjeLG6xGmLaqUBTQv.4b3JT.fV81HLjuW.', 'user_default.png', 'TITULADO', 1, '2019-05-02 23:06:52', '2019-05-02 23:06:52'),
(10, 'LOURDES', 'lourdes@gmail.com', '$2y$10$PGbZobdpusd5IBdjxp31kOYk4xcN96whLeYTNj5ALQu05A.CUq61W', 'user_default.png', 'TITULADO', 1, '2019-05-02 23:23:15', '2019-05-02 23:23:15'),
(11, 'XIMENA', 'ximena@hotmail.com', '$2y$10$sJ7rhtB1BF9oOegJWeqLNeW6Dhwk59y5JgsRrep/E4/vtPUQCO0LG', 'user_default.png', 'TITULADO', 1, '2019-05-02 23:36:43', '2019-05-02 23:36:43'),
(12, 'LUIS', 'luis@gmail.com', '$2y$10$HDupSyfI3yR4gOtY7xR4BO39A1A5b1eWuhMT6eO1HXDJm21.b5C2u', 'user_default.png', 'TITULADO', 1, '2019-05-02 23:38:19', '2019-05-31 21:46:59'),
(13, 'MARIA', 'maria@gmail.com', '$2y$10$dKUmNfHKvDQHdsx5jvghkedIfO8iZ3eJrkgZg8bHTx956c6Xn0hSu', 'user_default.png', 'TITULADO', 0, '2019-05-03 14:20:59', '2019-05-31 21:47:15'),
(15, 'JCOPA1_9', 'joaquin@gmail.com', '$2y$10$BPjgAIm/9bF8XBlGL5Uhz.iZhltNTVcj6U/SJzotmHI7x1k3lSUKy', 'user_default.png', 'ADMINISTRADOR', 1, '2019-05-07 13:32:32', '2019-05-07 13:32:32'),
(16, 'JIMMY', 'nawebuno@gmail.com', '$2y$10$xOvzZFIr36sv3/JDvvCF5.ZU6rNASF8IiMk6IE0kWh82IvYwohlMy', 'user_default.png', 'TITULADO', 0, '2019-06-03 21:53:45', '2019-06-03 21:53:45'),
(17, 'AAAA1', 'admin@gmail.com', '$2y$10$EZrOI38yI.TfA9gKlKJYpOiNGH6gYWvIaOu0WmEr/qEOIXMouZ.2q', 'user_default.png', 'ADMINISTRADOR', 0, '2023-03-21 16:03:31', '2023-03-21 16:03:52'),
(23, 'CARLOS', 'carlos@gmail.com', '$2y$10$7LyKcWKLJZoDge4kL3lOBuP3WlxYT4I.0HlFjBU8phA6CxZXinhmC', 'user_default.png', 'TITULADO', 1, '2023-03-22 15:45:06', '2023-03-22 15:45:09'),
(24, 'SANDRO', 'sandro@gmail.com', '$2y$10$wrvaPOY5ZX3iB/r84d3xx.UcDhfPG12/OtxPf3dX3GMyGByjmMalS', 'user_default.png', 'TITULADO', 1, '2023-03-22 16:04:11', '2023-03-22 16:04:11'),
(25, 'JOSE', 'jose@gmail.com', '$2y$10$DO0g269pov4Lz93jNX2W2.C7tMvUpNQKQAN3DELomJZrzhWwk78PC', 'user_default.png', 'TITULADO', 1, '2023-03-22 16:10:24', '2023-03-22 16:10:24'),
(26, 'PEDRO123', 'victorgonzalo.as@gmail.com', '$2y$10$3n6q53aaIa/lufdNCYxvvONGy7KPQMFMLuzQCCZ0HEWx9nMmWCwj.', 'user_default.png', 'TITULADO', 1, '2023-03-22 16:14:57', '2023-03-22 16:15:22'),
(27, 'JUAN23', 'juan@gmail.com', '$2y$10$KYmG433jh1hROHAOSWhN0.uyH/jJq5qYfJTGm.IwNC6h17wbRyZ6q', 'user_default.png', 'EMPLEADOR', 1, '2023-03-22 16:15:58', '2023-03-22 16:15:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `num_visitas` bigint(20) UNSIGNED NOT NULL,
  `titulado_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`id`, `num_visitas`, `titulado_id`, `created_at`, `updated_at`) VALUES
(1, 21, 1, '2019-04-29 15:10:36', '2023-03-22 16:20:23'),
(2, 29, 2, '2019-05-01 20:37:58', '2019-05-02 22:55:15'),
(3, 3, 3, '2019-05-01 22:18:37', '2019-05-01 22:27:08'),
(4, 1, 4, '2019-05-02 23:05:49', '2021-03-16 03:18:40'),
(5, 3, 5, '2019-05-02 23:16:11', '2019-05-05 16:38:45'),
(6, 36, 6, '2019-05-02 23:24:56', '2019-05-07 15:25:07'),
(7, 1, 7, '2019-05-02 23:37:58', '2019-05-07 15:25:58'),
(8, 1, 8, '2019-05-02 23:39:29', '2019-05-02 23:41:01'),
(9, 0, 9, '2019-05-03 14:22:50', '2019-05-03 14:22:50'),
(10, 0, 10, '2023-03-22 15:53:07', '2023-03-22 15:53:07'),
(11, 0, 11, '2023-03-22 16:06:44', '2023-03-22 16:06:44'),
(12, 0, 12, '2023-03-22 16:13:56', '2023-03-22 16:13:56');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carreras_nom_unique` (`nom`);

--
-- Indices de la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datos_usuarios_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mensajes_emisor_id_foreign` (`emisor_id`),
  ADD KEY `mensajes_receptor_id_foreign` (`receptor_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `postgrados`
--
ALTER TABLE `postgrados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `titulados`
--
ALTER TABLE `titulados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titulados_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `titulos`
--
ALTER TABLE `titulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titulos_titulado_id_foreign` (`titulado_id`),
  ADD KEY `titulos_carrera_id_foreign` (`carrera_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitas_titulado_id_foreign` (`titulado_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `postgrados`
--
ALTER TABLE `postgrados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `titulados`
--
ALTER TABLE `titulados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `titulos`
--
ALTER TABLE `titulos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  ADD CONSTRAINT `datos_usuarios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_emisor_id_foreign` FOREIGN KEY (`emisor_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `mensajes_receptor_id_foreign` FOREIGN KEY (`receptor_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `titulados`
--
ALTER TABLE `titulados`
  ADD CONSTRAINT `titulados_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
