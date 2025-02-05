-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2025 a las 23:30:09
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
-- Base de datos: `sonidos_de_habla`
--
CREATE DATABASE IF NOT EXISTS `sonidos_de_habla` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sonidos_de_habla`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

DROP TABLE IF EXISTS `actividades`;
CREATE TABLE `actividades` (
  `id_actividad` int(10) NOT NULL,
  `id_paciente` int(10) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `id_paciente`, `mensaje`, `fecha_hora`) VALUES
(98, 43, '<b>Elimita </b>calificó con E en el material de apoyo de: Calificación Inválida', '2025-02-03 19:07:53'),
(99, 43, '<b>Elimita </b>calificó con D en el material de apoyo de: Calificación Inválida', '2025-02-03 19:08:10'),
(100, 43, '<b>Elimita </b>calificó con C en el material de apoyo de: Calificación Inválida', '2025-02-03 19:09:01'),
(101, 43, '<b>Elimita </b>calificó con E en el material de apoyo de: Calificación Inválida', '2025-02-03 19:10:28'),
(102, 43, '<b>Elimita </b>calificó con D en el material de apoyo de: Calificación Inválida', '2025-02-03 19:10:35'),
(103, 43, '<b>Elimita </b>calificó con E en el material de apoyo de: Calificación Inválida', '2025-02-03 19:34:23'),
(104, 43, '<b>Elimita </b>calificó con D en el material de apoyo de: Calificación Inválida', '2025-02-03 19:34:37'),
(105, 43, '<b>Elimita </b>calificó con D en el material de apoyo de: Calificación Inválida', '2025-02-03 19:35:23'),
(106, 43, '<b>Elimita </b>calificó con D en el material de apoyo de: Calificación Inválida', '2025-02-03 19:35:47'),
(107, 43, '<b>Elimita </b>calificó con D en el material de apoyo de: Calificación Inválida', '2025-02-03 19:36:21'),
(108, 43, '<b>Elimita </b>calificó con E en el material de apoyo de: Calificación Inválida', '2025-02-03 19:37:52'),
(109, 43, '<b>Elimita </b>calificó con D en el material de apoyo de: Calificación Inválida', '2025-02-03 19:38:03'),
(110, 43, '<b>Elimita </b>calificó con E en el material de apoyo de: Calificación Inválida', '2025-02-03 19:39:09'),
(111, 43, '<b>Elimita </b>calificó con D en el material de apoyo de: Calificación Inválida', '2025-02-03 19:39:16'),
(112, 43, '<b>Elimita </b>calificó con D en el material de apoyo de: Calificación Inválida', '2025-02-03 19:39:34'),
(113, 43, '<b>Elimita </b>calificó con D en el material de apoyo de: Calificación Inválida', '2025-02-03 19:39:55'),
(114, 43, '<b>Elimita </b>calificó con C en el material de apoyo de: Calificación Inválida', '2025-02-03 19:40:03'),
(115, 43, '<b>Elimita </b>calificó con E en el material de apoyo de: Calificación Inválida', '2025-02-03 21:48:36'),
(116, 43, '<b>Elimita </b>calificó con E en el material de apoyo de: Calificación Inválida', '2025-02-03 21:48:45'),
(117, 43, '<b>Elimita </b>calificó con D en el material de apoyo de: Calificación Inválida', '2025-02-03 21:48:51'),
(118, 43, '<b>Elimita </b>calificó con D en el material de apoyo de: Calificación Inválida', '2025-02-03 21:49:14'),
(121, 43, '<b>Elimita </b>calificó con E en el material de apoyo de: Vocabulario', '2025-02-04 15:19:12'),
(122, 43, '<b>Elimita </b>calificó con D en el material de apoyo de: Vocabulario', '2025-02-04 15:19:22'),
(123, 43, '<b>Elimita </b>calificó con [object Promise] en el material de apoyo de: Vocabulario', '2025-02-04 15:22:00'),
(124, 43, '<b>Elimita </b>calificó con [object Promise] en el material de apoyo de: Vocabulario', '2025-02-04 15:22:43'),
(125, 43, '<b>Elimita </b>calificó con E en el material de apoyo de: Vocabulario', '2025-02-04 15:22:52'),
(126, 43, '<b>Elimita </b>calificó con E en el material de apoyo de: Vocabulario', '2025-02-04 15:23:05'),
(127, 43, '<b>Elimita </b>calificó con D en el material de apoyo de: Vocabulario', '2025-02-04 15:23:14'),
(128, 43, '<b>Elimita </b>calificó con E en el material de apoyo de: Vocabulario', '2025-02-04 15:24:56'),
(129, 43, '<b>Elimita </b>calificó con D en el material de apoyo de: Vocabulario', '2025-02-04 15:25:02'),
(130, 43, '<b>Elimita </b>calificó con E en el material de apoyo de: Vocabulario', '2025-02-04 15:26:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones_dislalia`
--

DROP TABLE IF EXISTS `calificaciones_dislalia`;
CREATE TABLE `calificaciones_dislalia` (
  `id_calificacion_dislalia` int(10) NOT NULL,
  `calificacion` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificaciones_dislalia`
--

INSERT INTO `calificaciones_dislalia` (`id_calificacion_dislalia`, `calificacion`) VALUES
(1, 'Simple'),
(2, 'Múltiple'),
(3, 'Hotentotismo'),
(4, 'Afín');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones_materiales_apoyo`
--

DROP TABLE IF EXISTS `calificaciones_materiales_apoyo`;
CREATE TABLE `calificaciones_materiales_apoyo` (
  `id_calificacion_material` int(10) NOT NULL,
  `id_material_apoyo` int(10) NOT NULL,
  `id_paciente` int(10) NOT NULL,
  `calificacion` enum('A','B','C','D,','E') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificaciones_materiales_apoyo`
--

INSERT INTO `calificaciones_materiales_apoyo` (`id_calificacion_material`, `id_material_apoyo`, `id_paciente`, `calificacion`) VALUES
(5, 2, 43, 'E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
CREATE TABLE `especialidades` (
  `id_especialidad` int(10) NOT NULL,
  `especialidad` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id_especialidad`, `especialidad`) VALUES
(1, 'Logopeda'),
(2, 'Foniatra'),
(3, 'Terapeuta del Lenguaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formatos_material`
--

DROP TABLE IF EXISTS `formatos_material`;
CREATE TABLE `formatos_material` (
  `id_formato_material` int(10) NOT NULL,
  `formato` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `formatos_material`
--

INSERT INTO `formatos_material` (`id_formato_material`, `formato`) VALUES
(1, 'Pdf'),
(2, 'img'),
(3, 'Video'),
(4, 'Audio'),
(5, 'Juego');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

DROP TABLE IF EXISTS `generos`;
CREATE TABLE `generos` (
  `id_genero` int(10) NOT NULL,
  `genero` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_genero`, `genero`) VALUES
(1, 'M'),
(2, 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales_apoyo`
--

DROP TABLE IF EXISTS `materiales_apoyo`;
CREATE TABLE `materiales_apoyo` (
  `id_material_apoyo` int(10) NOT NULL,
  `id_formato_material` int(10) NOT NULL,
  `Icono` varchar(25) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `url_material` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materiales_apoyo`
--

INSERT INTO `materiales_apoyo` (`id_material_apoyo`, `id_formato_material`, `Icono`, `titulo`, `url_material`) VALUES
(0, 1, 'bi bi-filetype-pdf', 'Ejercicios para pronunciación <br> el fonema r y la doble rr', '../../pdf/Ejercicios para el fonema r y la doble rr.pdf'),
(1, 5, 'bi bi-ear', 'Actividades para discriminar sonidos', './materials/auditory-discrimination/guide.php'),
(2, 5, 'bi bi-journals', 'Vocabulario', './materials/learn-more/vocabulary.php'),
(3, 2, 'bi bi-book', 'Trabalenguas fáciles', './materials/tongue-twister/easy.php'),
(4, 3, 'bi bi-play-btn', 'Aprende a pronunciar <br> el fonema Ñ 👅👀🧠 ', './materials/video/pronounce-the-ñ.php'),
(5, 2, 'bi bi-book', 'Trabalenguas difíciles ', './materials/tongue-twister/difficult.php'),
(6, 1, 'bi bi-filetype-pdf', 'Ejercicios de <br> respiración', '../../pdf/Ejercicios de respiración.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE `pacientes` (
  `id_paciente` int(10) NOT NULL,
  `id_genero` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_profesional` int(10) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `id_genero`, `id_usuario`, `id_profesional`, `nombre`, `apellido`, `fecha_nacimiento`) VALUES
(12, 1, 39, 13, 'Emily', 'Perdomo', '2019-02-02'),
(22, 2, 49, 13, 'Yaireli', 'Perdomo', '2021-01-06'),
(43, 2, 70, 13, 'Elimita', 'Perdomo', '2018-01-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_diagnosticados`
--

DROP TABLE IF EXISTS `pacientes_diagnosticados`;
CREATE TABLE `pacientes_diagnosticados` (
  `id_paciente_diagnostico` int(10) NOT NULL,
  `id_paciente` int(10) NOT NULL,
  `id_tipo_dislalia` int(10) NOT NULL,
  `id_calificacion_dislalia` int(10) DEFAULT NULL,
  `fonemas` varchar(40) DEFAULT NULL,
  `fecha_diagnostico` date DEFAULT NULL,
  `gravedad` enum('Leve','Moderada','Severa') DEFAULT NULL,
  `observacion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes_diagnosticados`
--

INSERT INTO `pacientes_diagnosticados` (`id_paciente_diagnostico`, `id_paciente`, `id_tipo_dislalia`, `id_calificacion_dislalia`, `fonemas`, `fecha_diagnostico`, `gravedad`, `observacion`) VALUES
(6, 22, 1, 3, 'b,a', '0000-00-00', 'Leve', ''),
(7, 12, 1, 3, 'a', '0000-00-00', 'Leve', ''),
(8, 43, 2, 1, 'a,b', '2025-01-25', 'Moderada', 'He podido notar que el niño no puede hablar mucho cuando hay gente no conocida por parte de el');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_materiales_apoyo`
--

DROP TABLE IF EXISTS `pacientes_materiales_apoyo`;
CREATE TABLE `pacientes_materiales_apoyo` (
  `id_paciente_material_apoyo` int(10) NOT NULL,
  `id_paciente` int(10) DEFAULT NULL,
  `id_material_apoyo` int(10) DEFAULT NULL,
  `activo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes_materiales_apoyo`
--

INSERT INTO `pacientes_materiales_apoyo` (`id_paciente_material_apoyo`, `id_paciente`, `id_material_apoyo`, `activo`) VALUES
(21, 43, 2, b'1'),
(22, 43, 1, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionales`
--

DROP TABLE IF EXISTS `profesionales`;
CREATE TABLE `profesionales` (
  `id_profesional` int(10) NOT NULL,
  `id_especialidad` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `correo_electronico` varchar(40) NOT NULL,
  `centro_trabajo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesionales`
--

INSERT INTO `profesionales` (`id_profesional`, `id_especialidad`, `id_usuario`, `nombre`, `apellido`, `correo_electronico`, `centro_trabajo`) VALUES
(4, 1, 4, 'Yaneri', 'Perdomo', 'yaneriperdomo@gmail.', 'josefina d'),
(5, 2, 5, 'paola', 'perdomo', 'perdomopaolabrrios@gmail.com', 'josefina de acosta'),
(6, 2, 6, 'paola', 'perdomo', 'perdomopaolabrriosw@gmail.com', 'josefina de acosta'),
(7, 2, 7, 'paola', 'perdomo', 'perdomopaola33brriosw@gmail.com', 'josefina de acosta'),
(8, 2, 8, 'paola', 'perdomo', 'perdomoapolabarrios@gmail.com', 'josef'),
(12, 1, 12, '', '', '', ''),
(13, 1, 13, 'Dustin', 'Perdomo', 'dustinperdomo@gmail.com', 'Josefina de Acosta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representantes`
--

DROP TABLE IF EXISTS `representantes`;
CREATE TABLE `representantes` (
  `id_representante` int(10) NOT NULL,
  `id_paciente` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `correo_electronico` varchar(80) DEFAULT NULL,
  `numero_telefonico` int(12) DEFAULT NULL,
  `clave_secreta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `representantes`
--

INSERT INTO `representantes` (`id_representante`, `id_paciente`, `nombre`, `apellido`, `correo_electronico`, `numero_telefonico`, `clave_secreta`) VALUES
(3, 12, 'Yaneri', 'perdomo', 'perdomopaolabarrios@gmail.com', 32332, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id_rol` int(10) NOT NULL,
  `rol` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'Paciente'),
(2, 'Profesional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

DROP TABLE IF EXISTS `sesiones`;
CREATE TABLE `sesiones` (
  `id_sesion` int(10) NOT NULL,
  `id_paciente` int(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` enum('Completado','Pausado') DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `objetivos_alcanzados` text DEFAULT NULL,
  `evaluacion` int(10) DEFAULT NULL,
  `ejercicios` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id_sesion`, `id_paciente`, `fecha`, `estado`, `observaciones`, `objetivos_alcanzados`, `evaluacion`, `ejercicios`) VALUES
(11, 22, '2025-01-19', 'Completado', 'DSADSA', '17', 0, ''),
(14, 22, '2025-01-20', 'Completado', 'La sesion de hoy buen bastante buena ', '3', 0, ''),
(17, 22, '2025-01-21', 'Completado', NULL, NULL, NULL, 'sonidos-habla,rotacismo0'),
(18, 22, '2025-01-22', 'Completado', NULL, NULL, NULL, 'sonidos-habla,rotacismo0'),
(19, 22, '2025-01-24', 'Completado', NULL, NULL, NULL, 'sonidos-habla,rotacismo0'),
(20, 43, '2025-01-25', 'Completado', NULL, NULL, NULL, 'sonidos-habla,rotacismo0'),
(23, 12, '2025-01-26', 'Completado', NULL, NULL, NULL, 'sonidos-habla,rotacismo0,el ritmo del habla0'),
(24, 12, '2025-01-28', 'Completado', NULL, NULL, NULL, 'sonidos-habla,rotacismo0,el ritmo del habla0,mejillas0,seseo0'),
(25, 12, '2025-01-29', 'Completado', NULL, NULL, NULL, 'sonidos-habla,rotacismo0,el ritmo del habla0,mejillas0,seseo0'),
(26, 12, '2025-01-30', 'Completado', NULL, NULL, NULL, 'sonidos-habla,rotacismo0,el ritmo del habla0,mejillas0,seseo0'),
(27, 43, '2025-01-31', 'Completado', NULL, NULL, NULL, 'sonidos-habla,rotacismo0,el ritmo del habla0'),
(28, 43, '2025-02-01', 'Completado', NULL, NULL, NULL, 'sonidos-habla,rotacismo0,el ritmo del habla0'),
(29, 43, '2025-02-03', 'Completado', NULL, NULL, NULL, 'sonidos-habla,rotacismo0,el ritmo del habla0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terapias_lenguaje`
--

DROP TABLE IF EXISTS `terapias_lenguaje`;
CREATE TABLE `terapias_lenguaje` (
  `id_terapia_lenguaje` int(10) NOT NULL,
  `id_paciente` int(10) DEFAULT NULL,
  `ejercicios` text DEFAULT NULL,
  `duracion_cada_ejercicio` int(10) DEFAULT NULL,
  `duracion_total` time DEFAULT NULL,
  `nota` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `terapias_lenguaje`
--

INSERT INTO `terapias_lenguaje` (`id_terapia_lenguaje`, `id_paciente`, `ejercicios`, `duracion_cada_ejercicio`, `duracion_total`, `nota`) VALUES
(13, 12, 'sonidos-habla,rotacismo0,el ritmo del habla0,mejillas0,seseo0', 15000, '01:50:00', 'dsadsa'),
(23, 22, 'sonidos-habla,rotacismo0', 10000, '01:00:00', 'El segundo ejercicio coloque bien la lengua'),
(44, 43, 'sonidos-habla,rotacismo0,el ritmo del habla0', 10000, '01:00:00', 'd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_dislalia`
--

DROP TABLE IF EXISTS `tipos_dislalia`;
CREATE TABLE `tipos_dislalia` (
  `id_tipo_dislalia` int(10) NOT NULL,
  `tipo_dislalia` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_dislalia`
--

INSERT INTO `tipos_dislalia` (`id_tipo_dislalia`, `tipo_dislalia`) VALUES
(1, 'Dislalia funcional'),
(2, 'Dislalia orgánica'),
(3, 'Dislalia evolutiva'),
(4, 'Dislalia audiógena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `id_rol` int(10) NOT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `fecha_hora_creacion` datetime DEFAULT NULL,
  `ultimo_acceso` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `usuario`, `clave`, `fecha_hora_creacion`, `ultimo_acceso`) VALUES
(4, 2, 'yaneri3', '$2y$10$R5fidU7jXv37E/iJ7BASeuv/CIkZlE86vSKRtp9BHQxIfR69xNvnq', '2025-01-09 22:40:54', NULL),
(5, 2, 'trt', '$2y$10$VGC', '2025-01-09 22:52:32', NULL),
(6, 2, 'tt', '123', '2025-01-09 23:10:15', NULL),
(7, 2, 'ttr', '$2y$10$vzk', '2025-01-09 23:14:28', NULL),
(8, 2, 'yayat', '123', '2025-01-09 23:21:35', '2025-01-10 19:06:27'),
(12, 2, 'Josef', '$2y$10$82MantakXrnLWQAST9GeYurPOUWrq7qMB7zFcg8.SEj0MSJ.G51He', '2025-01-10 13:08:26', NULL),
(13, 2, 'Dustin2024', '$2y$10$tS.V2.Qh5Ezd6GR1TcX2A.BqdtCiwbSGgYAOIoxtqTJctm.R7zBH.', '2025-01-10 22:23:21', '2025-02-03 22:21:41'),
(39, 1, 'Emilita', '$2y$10$.qIXULE52aytpZfac5b0nehJ0zsmSagqYvZV0HXvF7Fo5XTtwZEbi', '2025-01-15 14:38:12', '2025-02-02 15:53:47'),
(49, 1, 'Yesenia', '$2y$10$tIKCJFf8bNJspgv3X2e91.wE8dVZlUpAPSlq1ZIxrfKl/MbIewmL.', '2025-01-15 18:10:01', '2025-01-25 10:15:08'),
(70, 1, 'elimita', '$2y$10$8wanl9b5yMK96Yw0svZ6I.4EBbgUOV8OvhpJ6d4oVmAAoy/zMJxxy', '2025-01-25 08:06:32', '2025-02-04 18:01:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `calificaciones_dislalia`
--
ALTER TABLE `calificaciones_dislalia`
  ADD PRIMARY KEY (`id_calificacion_dislalia`);

--
-- Indices de la tabla `calificaciones_materiales_apoyo`
--
ALTER TABLE `calificaciones_materiales_apoyo`
  ADD PRIMARY KEY (`id_calificacion_material`),
  ADD KEY `idx_id_material_apoyo` (`id_material_apoyo`),
  ADD KEY `idx_id_paciente` (`id_paciente`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `formatos_material`
--
ALTER TABLE `formatos_material`
  ADD PRIMARY KEY (`id_formato_material`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `materiales_apoyo`
--
ALTER TABLE `materiales_apoyo`
  ADD PRIMARY KEY (`id_material_apoyo`),
  ADD KEY `id_formato_material` (`id_formato_material`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_profesional` (`id_profesional`);

--
-- Indices de la tabla `pacientes_diagnosticados`
--
ALTER TABLE `pacientes_diagnosticados`
  ADD PRIMARY KEY (`id_paciente_diagnostico`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_tipo_dislalia` (`id_tipo_dislalia`),
  ADD KEY `fk_calificacion_dislalia` (`id_calificacion_dislalia`);

--
-- Indices de la tabla `pacientes_materiales_apoyo`
--
ALTER TABLE `pacientes_materiales_apoyo`
  ADD PRIMARY KEY (`id_paciente_material_apoyo`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `fk_paciente_material_apoyo_1` (`id_material_apoyo`);

--
-- Indices de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  ADD PRIMARY KEY (`id_profesional`),
  ADD UNIQUE KEY `correo_electronico` (`correo_electronico`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD PRIMARY KEY (`id_representante`),
  ADD UNIQUE KEY `correo_electronico` (`correo_electronico`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id_sesion`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `terapias_lenguaje`
--
ALTER TABLE `terapias_lenguaje`
  ADD PRIMARY KEY (`id_terapia_lenguaje`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `tipos_dislalia`
--
ALTER TABLE `tipos_dislalia`
  ADD PRIMARY KEY (`id_tipo_dislalia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de la tabla `calificaciones_dislalia`
--
ALTER TABLE `calificaciones_dislalia`
  MODIFY `id_calificacion_dislalia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `calificaciones_materiales_apoyo`
--
ALTER TABLE `calificaciones_materiales_apoyo`
  MODIFY `id_calificacion_material` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `formatos_material`
--
ALTER TABLE `formatos_material`
  MODIFY `id_formato_material` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `materiales_apoyo`
--
ALTER TABLE `materiales_apoyo`
  MODIFY `id_material_apoyo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `pacientes_diagnosticados`
--
ALTER TABLE `pacientes_diagnosticados`
  MODIFY `id_paciente_diagnostico` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pacientes_materiales_apoyo`
--
ALTER TABLE `pacientes_materiales_apoyo`
  MODIFY `id_paciente_material_apoyo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  MODIFY `id_profesional` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `representantes`
--
ALTER TABLE `representantes`
  MODIFY `id_representante` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id_sesion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `terapias_lenguaje`
--
ALTER TABLE `terapias_lenguaje`
  MODIFY `id_terapia_lenguaje` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `tipos_dislalia`
--
ALTER TABLE `tipos_dislalia`
  MODIFY `id_tipo_dislalia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE;

--
-- Filtros para la tabla `calificaciones_materiales_apoyo`
--
ALTER TABLE `calificaciones_materiales_apoyo`
  ADD CONSTRAINT `calificaciones_materiales_apoyo_ibfk_1` FOREIGN KEY (`id_material_apoyo`) REFERENCES `materiales_apoyo` (`id_material_apoyo`) ON DELETE CASCADE,
  ADD CONSTRAINT `calificaciones_materiales_apoyo_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE;

--
-- Filtros para la tabla `materiales_apoyo`
--
ALTER TABLE `materiales_apoyo`
  ADD CONSTRAINT `materiales_apoyo_ibfk_1` FOREIGN KEY (`id_formato_material`) REFERENCES `formatos_material` (`id_formato_material`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`),
  ADD CONSTRAINT `pacientes_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `pacientes_ibfk_3` FOREIGN KEY (`id_profesional`) REFERENCES `profesionales` (`id_profesional`);

--
-- Filtros para la tabla `pacientes_diagnosticados`
--
ALTER TABLE `pacientes_diagnosticados`
  ADD CONSTRAINT `fk_calificacion_dislalia` FOREIGN KEY (`id_calificacion_dislalia`) REFERENCES `calificaciones_dislalia` (`id_calificacion_dislalia`),
  ADD CONSTRAINT `pacientes_diagnosticados_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE,
  ADD CONSTRAINT `pacientes_diagnosticados_ibfk_2` FOREIGN KEY (`id_tipo_dislalia`) REFERENCES `tipos_dislalia` (`id_tipo_dislalia`);

--
-- Filtros para la tabla `pacientes_materiales_apoyo`
--
ALTER TABLE `pacientes_materiales_apoyo`
  ADD CONSTRAINT `fk_paciente_material_apoyo_1` FOREIGN KEY (`id_material_apoyo`) REFERENCES `materiales_apoyo` (`id_material_apoyo`),
  ADD CONSTRAINT `pacientes_materiales_apoyo_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE,
  ADD CONSTRAINT `pacientes_materiales_apoyo_ibfk_2` FOREIGN KEY (`id_material_apoyo`) REFERENCES `materiales_apoyo` (`id_material_apoyo`);

--
-- Filtros para la tabla `profesionales`
--
ALTER TABLE `profesionales`
  ADD CONSTRAINT `profesionales_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id_especialidad`);

--
-- Filtros para la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD CONSTRAINT `representantes_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `terapias_lenguaje`
--
ALTER TABLE `terapias_lenguaje`
  ADD CONSTRAINT `terapias_lenguaje_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
