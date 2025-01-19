-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2025 a las 22:06:43
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
-- Estructura de tabla para la tabla `historiales`
--

DROP TABLE IF EXISTS `historiales`;
CREATE TABLE `historiales` (
  `id_historial` int(10) NOT NULL,
  `id_paciente` int(10) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historiales`
--

INSERT INTO `historiales` (`id_historial`, `id_paciente`, `mensaje`, `fecha_hora`) VALUES
(5, 22, 'Yesenia ha completado de nuevo su sesión de terapia de:  Ejercicios de pronunciación de fonemas.   ', '2025-01-19 16:29:08'),
(6, 22, 'Yesenia  ha completado su sesión de terapia de: Ejercicios de pronunciación de fonemas.   ', '2025-01-19 16:29:52'),
(7, 22, 'Yesenia ha completado de nuevo su sesión de terapia de: Ejercicios de pronunciación de fonemas', '2025-01-19 16:33:10'),
(8, 22, 'Yesenia ha completado su sesión de terapia de: Ejercicios de pronunciación de fonemas', '2025-01-19 16:42:12'),
(9, 22, 'Yesenia ha completado de nuevo su sesión de terapia de: Ejercicios de pronunciación de fonemas', '2025-01-19 16:57:53');

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
(1, 1, 'bi bi-filetype-pdf', 'Ejercicios para pronunciación el fonema r y la doble rr', ''),
(2, 5, 'bi bi-ear', 'Actividades para discriminar sonidos', ''),
(3, 5, 'bi bi-journals', 'Ejercicios para identificar errores en la propia pronunciación', ''),
(5, 5, 'bi bi-journals', 'Actividades para mejorar  el vocabulario', ''),
(6, 2, 'book', 'Trabalenguas fáciles', ''),
(7, 3, 'bi bi-play-btn', 'Aprende a pronunciar el fonema Ñ 👅👀🧠 ', 'bi bi-book'),
(8, 2, 'bi bi-book', 'Trabalenguas ', './materials/image/tongue-twister.php'),
(9, 1, 'bi bi-filetype-pdf', 'Ejercicios de <br> respiración', '../../pdf/Ejercicios de respiración.pdf');

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
(1, 2, 28, 13, 'Yane', 'Perdomo', '2016-01-20'),
(11, 1, 38, 13, 'Yaneri', 'perdomo', '2025-01-17'),
(12, 2, 39, 13, 'Emily', 'Perdomo', '2019-02-02'),
(13, 2, 40, 13, 'Fanny2029', 'Perdomo', '2025-01-09'),
(14, 1, 41, 13, 'yane2', 'perdoo', '2020-02-02'),
(15, 1, 42, 13, 'Taka', 'perdomo', '2020-01-12'),
(16, 1, 43, 13, 'Edgar', 'Maldonado', '0000-00-00'),
(17, 2, 44, 13, 'Toño', 'Perdomo', '2019-02-02'),
(19, 1, 46, 13, 'Carleys', 'Marquez', '2025-01-03'),
(20, 2, 47, 13, 'Dustin', 'perdomo', '2025-01-02'),
(22, 2, 49, 13, 'Yaireli', 'Perdomo', '2021-01-06');

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
  `observacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes_diagnosticados`
--

INSERT INTO `pacientes_diagnosticados` (`id_paciente_diagnostico`, `id_paciente`, `id_tipo_dislalia`, `id_calificacion_dislalia`, `fonemas`, `fecha_diagnostico`, `gravedad`, `observacion`) VALUES
(1, 15, 2, 1, 'a', '2025-01-15', 'Moderada', 'weqewqewqewq'),
(2, 16, 2, 2, 'r,w', '2025-01-15', 'Leve', 'rwwqewqe'),
(3, 17, 2, 3, 'b', '2025-01-15', 'Moderada', 'dsadas'),
(4, 19, 2, 4, 'a', '2025-01-15', 'Leve', 'dwd'),
(5, 20, 2, 1, 'k', '2025-01-15', 'Leve', 'dsadas'),
(6, 22, 1, 1, 'b', '2025-01-15', 'Leve', '');

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
(8, 11, 7, b'1'),
(9, 12, 1, b'1'),
(10, 12, 2, b'1'),
(11, 12, 7, b'1'),
(12, 13, 7, b'1'),
(13, 14, 7, b'1'),
(14, 15, 7, b'1'),
(15, 16, 7, b'1'),
(16, 17, 7, b'1'),
(17, 19, 7, b'1'),
(18, 20, 7, b'1'),
(19, 22, 9, b'1');

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
  `clave_secreta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `representantes`
--

INSERT INTO `representantes` (`id_representante`, `id_paciente`, `nombre`, `apellido`, `correo_electronico`, `numero_telefonico`, `clave_secreta`) VALUES
(1, 19, 'chile2029', 'perdomo', 'perdomopaolabarrios@gmail.com', 0, '$2y$10$NLuXJ'),
(2, 20, '3das', 'dsada', 'perdomopaolabarrios@222gmail.com', 324234234, '$2y$10$kbfs/');

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
  `id_terapia_lenguaje` int(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` enum('Completado','Pausado') DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `objetivos_alcanzados` text DEFAULT NULL,
  `evaluacion` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id_sesion`, `id_paciente`, `id_terapia_lenguaje`, `fecha`, `estado`, `observaciones`, `objetivos_alcanzados`, `evaluacion`) VALUES
(8, 22, 23, '2025-01-19', 'Completado', NULL, NULL, NULL);

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
(2, 1, 'sonidos-habla,rotacismo1,rotac', 15000, '01:50:00', '342432'),
(12, 11, 'sonidos-habla,rotacismo0,rotac', 10000, '01:00:00', 'wrewrwe'),
(13, 12, 'sonidos-habla,rotacismo0,rotac', 15000, '01:50:00', 'dsadsa'),
(14, 13, 'sonidos-habla,rotacismo0,rotac', 15000, '01:50:00', 'dsadsa'),
(15, 14, 'sonidos-habla,rotacismo0,rotac', 15000, '01:50:00', 'dasdasd'),
(16, 15, 'sonidos-habla,rotacismo0,rotac', 15000, '01:50:00', 'ew'),
(17, 16, 'sonidos-habla,musculos de la lengua0', 10000, '01:00:00', 'wewq'),
(18, 17, 'sonidos-habla,rotacismo0,rotacismo1', 15000, '01:50:00', 'dasdas'),
(20, 19, 'sonidos-habla,rotacismo0,rotacismo1', 15000, '01:50:00', 'wewqe'),
(21, 20, 'sonidos-habla,rotacismo0', 10000, '01:00:00', 'dsadsad'),
(23, 22, 'sonidos-habla,rotacismo0', 10000, '01:00:00', 'El segundo ejercicio coloque bien la lengua');

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
(5, 2, 'pepito', '$2y$10$VGC', '2025-01-09 22:52:32', NULL),
(6, 2, 'pepito3', '123', '2025-01-09 23:10:15', NULL),
(7, 2, 'pepito33', '$2y$10$vzk', '2025-01-09 23:14:28', NULL),
(8, 2, 'yaya', '123', '2025-01-09 23:21:35', '2025-01-10 19:06:27'),
(12, 2, 'Josef', '$2y$10$82MantakXrnLWQAST9GeYurPOUWrq7qMB7zFcg8.SEj0MSJ.G51He', '2025-01-10 13:08:26', NULL),
(13, 2, 'Dustin2024', '$2y$10$tS.V2.Qh5Ezd6GR1TcX2A.BqdtCiwbSGgYAOIoxtqTJctm.R7zBH.', '2025-01-10 22:23:21', '2025-01-19 17:01:40'),
(28, 1, 'Yayi3', '$2y$10$uT6a93QvQ2i89dOarN/cl..Wa7AtR2Z/BJDserlo5SU1kEwHRbJ1e', '2025-01-15 14:01:37', NULL),
(38, 1, 'perdomo2', '$2y$10$8QZIPOl.Q3mmzYOAhwPagO4MVTfgYErtITYWjg7u6flD0hFB5zPTO', '2025-01-15 14:36:18', NULL),
(39, 1, 'Emilita', '$2y$10$.qIXULE52aytpZfac5b0nehJ0zsmSagqYvZV0HXvF7Fo5XTtwZEbi', '2025-01-15 14:38:12', NULL),
(40, 1, 'eded', '$2y$10$aoGMq017qacfaaQ0CGI/BeEpujkKZWaCtj68Yd/VBygLzrJS71S9W', '2025-01-15 14:39:04', NULL),
(41, 1, 'yane02', '$2y$10$nxdRGgRVlWY9VDVhB5kdQuxjsC9prFMfq0/av75vZa25rK7uMAUTm', '2025-01-15 14:49:10', NULL),
(42, 1, 'taka20', '$2y$10$REylhGVJZc4UbRpgJBDJO.a5QGBpDNzmNF7WtaHc6jRIBQEBeFJuK', '2025-01-15 14:51:09', NULL),
(43, 1, '', '$2y$10$jAYnCiZIyIdzHxIbluL6UuoVwoMTTQoLKAO4fgNgTxxMEXfzb0iVS', '2025-01-15 14:52:10', NULL),
(44, 1, 'tono2029', '$2y$10$1eGdjoNFhqqycOVARUg7W.YGEgMydCbVc6zv9ADgLMTL1mEjNIhOa', '2025-01-15 15:06:38', NULL),
(46, 1, 'chile', '$2y$10$c6r/osaYMUSyEbJn5VMoDeUWkZ2wJTr9ZGDjH5je24MdipGnijb9S', '2025-01-15 15:10:15', NULL),
(47, 1, 'andosad', '$2y$10$7Jf9H2.JnabWx/8LMr8sEeAnIZXiZYYTVbEopENH0J/XndQplsL16', '2025-01-15 15:12:31', NULL),
(49, 1, 'Yesenia', '$2y$10$tIKCJFf8bNJspgv3X2e91.wE8dVZlUpAPSlq1ZIxrfKl/MbIewmL.', '2025-01-15 18:10:01', '2025-01-19 13:10:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones_dislalia`
--
ALTER TABLE `calificaciones_dislalia`
  ADD PRIMARY KEY (`id_calificacion_dislalia`);

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
-- Indices de la tabla `historiales`
--
ALTER TABLE `historiales`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_paciente` (`id_paciente`);

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
  ADD UNIQUE KEY `clave_secreta` (`clave_secreta`),
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
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_terapia_lenguaje` (`id_terapia_lenguaje`);

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
-- AUTO_INCREMENT de la tabla `calificaciones_dislalia`
--
ALTER TABLE `calificaciones_dislalia`
  MODIFY `id_calificacion_dislalia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT de la tabla `historiales`
--
ALTER TABLE `historiales`
  MODIFY `id_historial` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `materiales_apoyo`
--
ALTER TABLE `materiales_apoyo`
  MODIFY `id_material_apoyo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `pacientes_diagnosticados`
--
ALTER TABLE `pacientes_diagnosticados`
  MODIFY `id_paciente_diagnostico` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pacientes_materiales_apoyo`
--
ALTER TABLE `pacientes_materiales_apoyo`
  MODIFY `id_paciente_material_apoyo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  MODIFY `id_profesional` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `representantes`
--
ALTER TABLE `representantes`
  MODIFY `id_representante` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id_sesion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `terapias_lenguaje`
--
ALTER TABLE `terapias_lenguaje`
  MODIFY `id_terapia_lenguaje` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tipos_dislalia`
--
ALTER TABLE `tipos_dislalia`
  MODIFY `id_tipo_dislalia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historiales`
--
ALTER TABLE `historiales`
  ADD CONSTRAINT `historiales_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

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
  ADD CONSTRAINT `pacientes_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `pacientes_ibfk_3` FOREIGN KEY (`id_profesional`) REFERENCES `profesionales` (`id_profesional`);

--
-- Filtros para la tabla `pacientes_diagnosticados`
--
ALTER TABLE `pacientes_diagnosticados`
  ADD CONSTRAINT `fk_calificacion_dislalia` FOREIGN KEY (`id_calificacion_dislalia`) REFERENCES `calificaciones_dislalia` (`id_calificacion_dislalia`),
  ADD CONSTRAINT `pacientes_diagnosticados_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`),
  ADD CONSTRAINT `pacientes_diagnosticados_ibfk_2` FOREIGN KEY (`id_tipo_dislalia`) REFERENCES `tipos_dislalia` (`id_tipo_dislalia`);

--
-- Filtros para la tabla `pacientes_materiales_apoyo`
--
ALTER TABLE `pacientes_materiales_apoyo`
  ADD CONSTRAINT `fk_paciente_material_apoyo_1` FOREIGN KEY (`id_material_apoyo`) REFERENCES `materiales_apoyo` (`id_material_apoyo`),
  ADD CONSTRAINT `pacientes_materiales_apoyo_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`),
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
  ADD CONSTRAINT `representantes_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`),
  ADD CONSTRAINT `sesiones_ibfk_2` FOREIGN KEY (`id_terapia_lenguaje`) REFERENCES `terapias_lenguaje` (`id_terapia_lenguaje`);

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
