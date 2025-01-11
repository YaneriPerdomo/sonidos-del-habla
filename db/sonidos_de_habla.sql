-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2025 a las 20:06:36
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
  `titulo` varchar(20) NOT NULL,
  `url_imagenes` varchar(255) NOT NULL,
  `objetivo` text DEFAULT NULL,
  `edad_minimo` tinyint(4) DEFAULT NULL,
  `edad_maximo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `fecha_nacimiento` date DEFAULT NULL,
  `codigo_secreto` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_diagnostico`
--

DROP TABLE IF EXISTS `pacientes_diagnostico`;
CREATE TABLE `pacientes_diagnostico` (
  `id_paciente_diagnostico` int(10) NOT NULL,
  `id_paciente` int(10) NOT NULL,
  `id_tipo_dislalia` int(10) NOT NULL,
  `fonemas` varchar(40) DEFAULT NULL,
  `fecha_diagnostico` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_materiales_apoyo`
--

DROP TABLE IF EXISTS `pacientes_materiales_apoyo`;
CREATE TABLE `pacientes_materiales_apoyo` (
  `id_paciente_material_apoyo` int(10) NOT NULL,
  `id_paciente` int(10) DEFAULT NULL,
  `id_material_apoyo` int(10) DEFAULT NULL,
  `esta_activo` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `correo_electronico` varchar(20) NOT NULL,
  `centro_trabajo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id_rol` int(10) NOT NULL,
  `rol` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `duracion_real` time DEFAULT NULL,
  `estado_sesion` enum('completada','pausada') DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `objetivos_alcanzados` text DEFAULT NULL,
  `evaluacion` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terapias_lenguaje`
--

DROP TABLE IF EXISTS `terapias_lenguaje`;
CREATE TABLE `terapias_lenguaje` (
  `id_terapia_lenguaje` int(10) NOT NULL,
  `id_paciente` int(10) DEFAULT NULL,
  `ejercicios` varchar(30) DEFAULT NULL,
  `duracion_cada_ejercicio` time DEFAULT NULL,
  `duracion_total` time DEFAULT NULL,
  `nota` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 'Dislalia orgánica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `id_rol` int(10) NOT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `clave` varchar(10) DEFAULT NULL,
  `fecha_hora_creacion` datetime DEFAULT NULL,
  `ultimo_acceso` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `materiales_apoyo`
--
ALTER TABLE `materiales_apoyo`
  ADD PRIMARY KEY (`id_material_apoyo`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`),
  ADD UNIQUE KEY `codigo_secreto` (`codigo_secreto`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_profesional` (`id_profesional`);

--
-- Indices de la tabla `pacientes_diagnostico`
--
ALTER TABLE `pacientes_diagnostico`
  ADD PRIMARY KEY (`id_paciente_diagnostico`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_tipo_dislalia` (`id_tipo_dislalia`);

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
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `materiales_apoyo`
--
ALTER TABLE `materiales_apoyo`
  MODIFY `id_material_apoyo` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pacientes_diagnostico`
--
ALTER TABLE `pacientes_diagnostico`
  MODIFY `id_paciente_diagnostico` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pacientes_materiales_apoyo`
--
ALTER TABLE `pacientes_materiales_apoyo`
  MODIFY `id_paciente_material_apoyo` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  MODIFY `id_profesional` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id_sesion` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `terapias_lenguaje`
--
ALTER TABLE `terapias_lenguaje`
  MODIFY `id_terapia_lenguaje` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_dislalia`
--
ALTER TABLE `tipos_dislalia`
  MODIFY `id_tipo_dislalia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`),
  ADD CONSTRAINT `pacientes_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `pacientes_ibfk_3` FOREIGN KEY (`id_profesional`) REFERENCES `profesionales` (`id_profesional`);

--
-- Filtros para la tabla `pacientes_diagnostico`
--
ALTER TABLE `pacientes_diagnostico`
  ADD CONSTRAINT `pacientes_diagnostico_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`),
  ADD CONSTRAINT `pacientes_diagnostico_ibfk_2` FOREIGN KEY (`id_tipo_dislalia`) REFERENCES `tipos_dislalia` (`id_tipo_dislalia`);

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
