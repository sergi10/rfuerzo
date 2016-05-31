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

INSERT INTO `alumno` (`id`, `nombre`, `apellidos`, `mail`, `user`, `pass`, `nacimiento`, `centro_id`, `enlace_avatar`, `profesor_id`) VALUES(1, 'Alumno Uno', 'Uno Uno', 'uno@alumno.es', 'alumno1','y$Bi1Pj0Zq.fHncZwSdOFpVejPHcINyBro0iVG/2jXLjU5jur6BnfKe',
 '0000-00-00 00:00:00', 1, '574176ae9d4f5.png', 7);
INSERT INTO `alumno` (`id`, `nombre`, `apellidos`, `mail`, `user`, `pass`, `nacimiento`, `centro_id`, `enlace_avatar`, `profesor_id`) VALUES(2, 'Alumno Dos', 'Alum Dos', 'dos@alumno.es', 'alumno2', '$2y$10$ymC6VvSnCuDJ013gHQFFwOuxrlHPcCCPHt5H9uOpr.OsAtSeVxIjO', '2001-08-22 00:00:00', 1, '5741b895786b2.png', 8);

--
-- Volcado de datos para la tabla `centro`
--

INSERT INTO `centro` (`id`, `nombre`, `direccion`) VALUES(1, 'Centro 1', 'calle del centro1');

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id`, `nombre`, `apellidos`, `mail`, `user`, `pass`, `nacimiento`, `centro_id`, `enlace_avatar`, `es_admin`) VALUES(1, 'adminRfuezo', 'adminRfuezo', 'admin@example.com', 'adminRfuezo', '', NULL, 1, 'noavatar92.png', NULL);
INSERT INTO `profesor` (`id`, `nombre`, `apellidos`, `mail`, `user`, `pass`, `nacimiento`, `centro_id`, `enlace_avatar`, `es_admin`) VALUES(2, 'Profe Uno', 'Uno Uno', 'uno@profesor.es', 'profe1', '', NULL, 1, '57417749b0280.png', NULL);
INSERT INTO `profesor` (`id`, `nombre`, `apellidos`, `mail`, `user`, `pass`, `nacimiento`, `centro_id`, `enlace_avatar`, `es_admin`) VALUES(3, 'Profesor Dos', 'Dos Dos', 'dos@profesor.es', 'profe2', '', NULL, 1, '574177d32c2fd.png', NULL);

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

INSERT INTO `users` (`id`, `name`, `password`, `level`, `updated_at`, `created_at`) VALUES(1, 'adminRfuezo', '$2y$10$So9hz4jAKyiUB3iiqKoOJ.FgzwdW/Fl9RcVrdh0cU0Nq8fJc1.m/i', 2, '2016-05-21 21:07:26', '2016-05-21 21:07:26');
INSERT INTO `users` (`id`, `name`, `password`, `level`, `updated_at`, `created_at`) VALUES(2, 'alumno1', '$2y$10$R8JkFgcd6pa/jktBZhoeuO4uQwoNr8ZwVUcdLB4VcKnNBBYFeXpc2', 0, '2016-05-22 09:06:54', '2016-05-22 09:06:54');
INSERT INTO `users` (`id`, `name`, `password`, `level`, `updated_at`, `created_at`) VALUES(3, 'profe1', '$2y$10$EBE8MKKAJDOluad.Gro6y.0ybKDY7605qI7rBqH77DhQ.HABp4iO.', 1, '2016-05-22 09:09:29', '2016-05-22 09:09:29');
INSERT INTO `users` (`id`, `name`, `password`, `level`, `updated_at`, `created_at`) VALUES(4, 'profe2', '$2y$10$zAbtyPx6MH1RpETym6plVeGjrWiyjPQJ3zGgR/t/ltI5Vk285u70q', 1, '2016-05-22 09:11:47', '2016-05-22 09:11:47');
INSERT INTO `users` (`id`, `name`, `password`, `level`, `updated_at`, `created_at`) VALUES(5, 'alumno2', '$2y$10$GPTcwh.GDgs2OT.tVyN09OAAARCKkVdIfyRmo.hyfyjk3QQapO65G', 0, '2016-05-22 13:48:06', '2016-05-22 13:48:06');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
