-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-05-2016 a las 23:10:27
-- Versión del servidor: 5.5.44-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `rfuerzo`
--

--
-- Volcado de datos para la tabla `alumno`
--

--
-- Volcado de datos para la tabla `centro`
--

INSERT INTO `centro` (`id`, `nombre`, `direccion`) VALUES(1, 'Centro 1', 'calle del centro1');

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id`, `nombre`, `apellidos`, `mail`, `user`, `pass`, `nacimiento`, `centro_id`, `enlace_avatar`, `es_admin`) VALUES(6, 'adminRfuezo', 'adminRfuezo', 'admin@example.com', 'adminRfuezo', '', NULL, 1, '5740ce0e3f9d7.png', NULL);

--
-- Volcado de datos para la tabla `resultado_tarea`
--

--
-- Volcado de datos para la tabla `tarea`
--

--
-- Volcado de datos para la tabla `tema`
--

--
-- Volcado de datos para la tabla `users`
--


INSERT INTO `users` (`id`, `name`, `password`, `level`, `updated_at`, `created_at`) VALUES(14, 'adminRfuezo', '$2y$10$So9hz4jAKyiUB3iiqKoOJ.FgzwdW/Fl9RcVrdh0cU0Nq8fJc1.m/i', 2, '2016-05-21 21:07:26', '2016-05-21 21:07:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
