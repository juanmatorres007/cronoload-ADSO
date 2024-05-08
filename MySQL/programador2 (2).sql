-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2024 a las 04:20:01
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
-- Base de datos: `programador2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `id_auto_acc` int(11) NOT NULL,
  `account_acc` bigint(20) NOT NULL,
  `password_acc` varchar(20) NOT NULL,
  `id_user_acc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`id_auto_acc`, `account_acc`, `password_acc`, `id_user_acc`) VALUES
(4, 1138524258, '123', 3),
(7, 1004260145, '321', 4),
(9, 1004473715, '123', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity`
--

CREATE TABLE `activity` (
  `id_auto_acti` int(11) NOT NULL,
  `name_acti` varchar(30) NOT NULL,
  `date_register_acti` date NOT NULL,
  `state_acti` tinyint(1) NOT NULL DEFAULT 1,
  `id_pha_acti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `address`
--

CREATE TABLE `address` (
  `id_auto_add` int(11) NOT NULL,
  `department_add` tinyint(1) NOT NULL,
  `municipality_add` tinyint(1) NOT NULL,
  `address_add` varchar(40) NOT NULL,
  `id_user_add` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competition`
--

CREATE TABLE `competition` (
  `id_auto_comp` int(11) NOT NULL,
  `name_comp` varchar(20) NOT NULL,
  `number_comp` int(11) NOT NULL,
  `date_register_comp` date NOT NULL,
  `state_comp` tinyint(1) NOT NULL DEFAULT 1,
  `id_acti_comp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `id_auto_con` int(11) NOT NULL,
  `email_con` varchar(60) NOT NULL,
  `phone_con` int(11) NOT NULL,
  `id_user_con` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facility_model`
--

CREATE TABLE `facility_model` (
  `id_auto_fac` int(11) NOT NULL,
  `hours_fac` int(11) NOT NULL,
  `id_res_fac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file`
--

CREATE TABLE `file` (
  `id_auto_fil` int(11) NOT NULL,
  `number_file` int(11) NOT NULL,
  `state_file` tinyint(1) NOT NULL DEFAULT 1,
  `start_date_file` date NOT NULL,
  `end_date_file` date NOT NULL,
  `id_proj_file` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formation_lvl`
--

CREATE TABLE `formation_lvl` (
  `id_auto_flvl` int(11) NOT NULL,
  `name_flvl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `formation_lvl`
--

INSERT INTO `formation_lvl` (`id_auto_flvl`, `name_flvl`) VALUES
(1, 'Software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img`
--

CREATE TABLE `img` (
  `id_img` int(11) NOT NULL,
  `name_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `img`
--

INSERT INTO `img` (`id_img`, `name_img`) VALUES
(1, '../img/imgPrueba/Captura de pantalla_20230613_194444.png'),
(2, '../img/imgPrueba/Captura de pantalla_20230613_194444.png'),
(3, '../img/imgPrueba/Captura de pantalla_20230613_194444.png'),
(4, '../img/imgPrueba/Captura de pantalla_20230613_194444.png'),
(5, '../img/imgPrueba/Captura de pantalla (1).png'),
(6, '../img/imgPrueba/Captura de pantalla (1).png'),
(7, '../img/imgPrueba/Captura de pantalla (1).png'),
(8, '../img/imgPrueba/Captura de pantalla (1).png'),
(9, '../img/imgPrueba/Captura de pantalla (1).png'),
(10, '../img/imgPrueba/Captura de pantalla (1).png'),
(11, '../img/imgPrueba/Captura de pantalla_20221121_082119.png'),
(12, '../img/imgPrueba/Captura de pantalla_20221121_082119.png'),
(13, '../img/imgPrueba/Captura de pantalla_20221121_082119.png'),
(14, '../img/imgPrueba/Captura de pantalla_20230127_103930.png'),
(15, '../img/imgPrueba/Captura de pantalla_20230127_103930.png'),
(16, '../img/imgPrueba/Captura de pantalla_20230127_103930.png'),
(17, '../img/imgPrueba/Captura de pantalla_20230127_103930.png'),
(18, '../img/imgPrueba/Captura de pantalla_20230127_103930.png'),
(19, '../img/imgPrueba/Captura de pantalla_20230215_074034.png'),
(20, '../img/imgPrueba/Captura de pantalla_20230215_082009.png'),
(21, '../img/imgPrueba/Captura de pantalla_20230215_082009.png'),
(22, '../img/imgPrueba/Captura de pantalla_20221031_171237.png'),
(23, '../img/imgPrueba/Captura de pantalla_20221031_171237.png'),
(24, '../img/imgPrueba/Captura de pantalla_20221118_164651.png'),
(25, '../img/imgPrueba/Captura de pantalla_20221205_170539.png'),
(26, '../img/imgPrueba/Captura de pantalla_20221118_163518.png'),
(27, '../img/imgPrueba/Captura de pantalla_20221118_163518.png'),
(28, '../img/imgPrueba/Captura de pantalla_20221118_163518.png'),
(29, '../img/imgPrueba/1701274428827.jpg'),
(30, '../img/imgPrueba/WIN_20240220_10_32_32_Pro.jpg'),
(31, '../img/imgPrueba/WIN_20240220_10_32_32_Pro.jpg'),
(32, '../img/imgPrueba/1701274428827.jpg'),
(33, '../img/imgPrueba/Sin título.png'),
(34, '../img/imgPrueba/1701274428827.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `knowledge_area`
--

CREATE TABLE `knowledge_area` (
  `id_auto_know` int(11) NOT NULL,
  `area_name_know` varchar(30) NOT NULL,
  `date_register_know` date NOT NULL,
  `state_know` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `knowledge_area`
--

INSERT INTO `knowledge_area` (`id_auto_know`, `area_name_know`, `date_register_know`, `state_know`) VALUES
(1, 'Tecnologia', '2024-04-30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notification`
--

CREATE TABLE `notification` (
  `id_auto_noti` int(11) NOT NULL,
  `type_noti` varchar(20) NOT NULL,
  `descripion_noti` text NOT NULL,
  `state_noti` tinyint(1) NOT NULL DEFAULT 1,
  `date_register_noti` date NOT NULL,
  `id_file_noti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phase`
--

CREATE TABLE `phase` (
  `id_auto_pha` int(11) NOT NULL,
  `name_pha` varchar(80) NOT NULL,
  `date_register_pha` date NOT NULL,
  `state_pha` tinyint(1) NOT NULL DEFAULT 1,
  `id_project_pha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `program`
--

CREATE TABLE `program` (
  `id_auto_prog` int(11) NOT NULL,
  `name_prog` int(11) NOT NULL,
  `date_register_prog` date NOT NULL,
  `code_prog` int(11) NOT NULL,
  `version_prog` float NOT NULL,
  `type_prog` tinyint(1) NOT NULL DEFAULT 1,
  `state_prog` tinyint(1) NOT NULL DEFAULT 1,
  `id_project-prog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='codigo solo numercio (creo según Gilberto)';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE `project` (
  `id_auto_proj` int(11) NOT NULL,
  `name_proj` varchar(70) NOT NULL,
  `number_proj` int(11) NOT NULL,
  `state_proj` tinyint(1) NOT NULL DEFAULT 1,
  `register_date_proj` date NOT NULL,
  `id_knowledge_area_proj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`id_auto_proj`, `name_proj`, `number_proj`, `state_proj`, `register_date_proj`, `id_knowledge_area_proj`) VALUES
(3, 'HSFKF', 123, 1, '2024-04-30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relation_rol_user`
--

CREATE TABLE `relation_rol_user` (
  `id_auto_relaru` int(11) NOT NULL,
  `id_rol_relaru` int(11) NOT NULL,
  `id_user_relaru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Relacion entre usuarios y roles';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relation_user_file`
--

CREATE TABLE `relation_user_file` (
  `id_auto_reluf` int(11) NOT NULL,
  `id_user_reluf` int(11) NOT NULL,
  `id_file_reluf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `result`
--

CREATE TABLE `result` (
  `id_auto_res` int(11) NOT NULL,
  `name_res` varchar(50) NOT NULL,
  `date_register_res` date NOT NULL,
  `state_res` tinyint(1) NOT NULL DEFAULT 1,
  `id_comp_res` int(11) NOT NULL,
  `id_know_res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_auto_rol` int(11) NOT NULL,
  `name_rol` varchar(20) NOT NULL,
  `state_rol` tinyint(1) NOT NULL DEFAULT 1,
  `date_register_rol` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_auto_rol`, `name_rol`, `state_rol`, `date_register_rol`) VALUES
(1, 'Aprendiz', 2, '2024-04-01'),
(4, 'Instructor', 2, '2024-04-01'),
(5, '', 1, '2024-04-02'),
(6, 'aprebdiz', 2, '2024-04-02'),
(7, 'Coordinador', 1, '2024-04-03'),
(9, 'Coordinador2', 1, '2024-04-03'),
(10, 'uno', 1, '2024-04-22'),
(14, 'Psicologo', 2, '2024-04-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `time_tracking`
--

CREATE TABLE `time_tracking` (
  `id_auto_time` int(11) NOT NULL,
  `id_user_time` int(11) NOT NULL,
  `available_hours_time` int(11) NOT NULL,
  `virtuals_hours_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_auto_user` int(11) NOT NULL,
  `name_user` varchar(40) NOT NULL,
  `lastname_user` varchar(40) NOT NULL,
  `type_id_user` tinyint(1) NOT NULL DEFAULT 1,
  `number_id_user` int(11) NOT NULL,
  `state_user` tinyint(1) DEFAULT 1,
  `Type_contract_user` tinyint(1) DEFAULT NULL,
  `id_know_user` int(11) DEFAULT NULL,
  `id_formation_lvl_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_auto_user`, `name_user`, `lastname_user`, `type_id_user`, `number_id_user`, `state_user`, `Type_contract_user`, `id_know_user`, `id_formation_lvl_user`) VALUES
(3, 'Samuel Esteban', 'Salazar Trejos', 1, 1138524258, 1, NULL, NULL, NULL),
(4, 'juan', 'pablo', 1, 1004260145, 1, NULL, NULL, NULL),
(11, 'FDSFS', 'GFDG', 1, 3435346, 1, NULL, NULL, NULL),
(12, 'FDDSFG', 'GDFG', 1, 35345, 1, NULL, NULL, NULL),
(13, 'FDDSFG', 'GDFG', 1, 35345, 1, NULL, NULL, NULL),
(14, 'fdg', 'fhfgh', 1, 43654, 1, NULL, 1, NULL),
(17, 'Brayan ', 'Perdomo', 1, 1004473715, 1, NULL, NULL, NULL),
(18, 'dafssd', 'fsdf', 1, 214235435, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vinculation`
--

CREATE TABLE `vinculation` (
  `id_auto_vin` int(11) NOT NULL,
  `name_vin` varchar(50) NOT NULL,
  `start_date_vin` date NOT NULL,
  `end_date_vin` date NOT NULL,
  `id_user_vin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vinculation`
--

INSERT INTO `vinculation` (`id_auto_vin`, `name_vin`, `start_date_vin`, `end_date_vin`, `id_user_vin`) VALUES
(1, '1', '2024-04-02', '2024-04-02', 13),
(2, '1', '2024-04-02', '2024-04-11', 14),
(3, '1', '0000-00-00', '0000-00-00', 17),
(4, '1', '0000-00-00', '0000-00-00', 18);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`id_auto_acc`),
  ADD KEY `id_user_acc` (`id_user_acc`);

--
-- Indices de la tabla `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id_auto_acti`),
  ADD KEY `id_auto_pha_acti` (`id_pha_acti`);

--
-- Indices de la tabla `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id_auto_add`),
  ADD KEY `id_user_add` (`id_user_add`);

--
-- Indices de la tabla `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id_auto_comp`),
  ADD KEY `id_acti_comp` (`id_acti_comp`);

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_auto_con`),
  ADD KEY `id_user_con` (`id_user_con`);

--
-- Indices de la tabla `facility_model`
--
ALTER TABLE `facility_model`
  ADD PRIMARY KEY (`id_auto_fac`),
  ADD KEY `id_res_fac` (`id_res_fac`);

--
-- Indices de la tabla `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_auto_fil`),
  ADD KEY `id_proj_file` (`id_proj_file`);

--
-- Indices de la tabla `formation_lvl`
--
ALTER TABLE `formation_lvl`
  ADD PRIMARY KEY (`id_auto_flvl`);

--
-- Indices de la tabla `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id_img`);

--
-- Indices de la tabla `knowledge_area`
--
ALTER TABLE `knowledge_area`
  ADD PRIMARY KEY (`id_auto_know`);

--
-- Indices de la tabla `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id_auto_noti`),
  ADD KEY `id_file_noti` (`id_file_noti`);

--
-- Indices de la tabla `phase`
--
ALTER TABLE `phase`
  ADD PRIMARY KEY (`id_auto_pha`),
  ADD KEY `id_auto_project_pha` (`id_project_pha`);

--
-- Indices de la tabla `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_auto_prog`),
  ADD KEY `id_project-prog` (`id_project-prog`);

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_auto_proj`),
  ADD KEY `knowledge_area_proj` (`id_knowledge_area_proj`);

--
-- Indices de la tabla `relation_rol_user`
--
ALTER TABLE `relation_rol_user`
  ADD PRIMARY KEY (`id_auto_relaru`),
  ADD KEY `id_rol_relaru` (`id_rol_relaru`),
  ADD KEY `id_user_relaru` (`id_user_relaru`);

--
-- Indices de la tabla `relation_user_file`
--
ALTER TABLE `relation_user_file`
  ADD PRIMARY KEY (`id_auto_reluf`),
  ADD KEY `id_file_reluf` (`id_file_reluf`),
  ADD KEY `id_user_reluf` (`id_user_reluf`);

--
-- Indices de la tabla `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id_auto_res`),
  ADD KEY `id_comp_res` (`id_comp_res`),
  ADD KEY `id_know_res` (`id_know_res`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_auto_rol`),
  ADD UNIQUE KEY `name_rol` (`name_rol`);

--
-- Indices de la tabla `time_tracking`
--
ALTER TABLE `time_tracking`
  ADD PRIMARY KEY (`id_auto_time`),
  ADD KEY `id_user_time` (`id_user_time`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_auto_user`),
  ADD KEY `id_know_user` (`id_know_user`),
  ADD KEY `id_formation_lvl_user` (`id_formation_lvl_user`);

--
-- Indices de la tabla `vinculation`
--
ALTER TABLE `vinculation`
  ADD PRIMARY KEY (`id_auto_vin`),
  ADD KEY `id_user_vin` (`id_user_vin`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `id_auto_acc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `activity`
--
ALTER TABLE `activity`
  MODIFY `id_auto_acti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `address`
--
ALTER TABLE `address`
  MODIFY `id_auto_add` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `competition`
--
ALTER TABLE `competition`
  MODIFY `id_auto_comp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `id_auto_con` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facility_model`
--
ALTER TABLE `facility_model`
  MODIFY `id_auto_fac` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `file`
--
ALTER TABLE `file`
  MODIFY `id_auto_fil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formation_lvl`
--
ALTER TABLE `formation_lvl`
  MODIFY `id_auto_flvl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `img`
--
ALTER TABLE `img`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `knowledge_area`
--
ALTER TABLE `knowledge_area`
  MODIFY `id_auto_know` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `notification`
--
ALTER TABLE `notification`
  MODIFY `id_auto_noti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `phase`
--
ALTER TABLE `phase`
  MODIFY `id_auto_pha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `program`
--
ALTER TABLE `program`
  MODIFY `id_auto_prog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `project`
--
ALTER TABLE `project`
  MODIFY `id_auto_proj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `relation_rol_user`
--
ALTER TABLE `relation_rol_user`
  MODIFY `id_auto_relaru` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `relation_user_file`
--
ALTER TABLE `relation_user_file`
  MODIFY `id_auto_reluf` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `result`
--
ALTER TABLE `result`
  MODIFY `id_auto_res` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_auto_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `time_tracking`
--
ALTER TABLE `time_tracking`
  MODIFY `id_auto_time` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_auto_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `vinculation`
--
ALTER TABLE `vinculation`
  MODIFY `id_auto_vin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `acceso_ibfk_1` FOREIGN KEY (`id_user_acc`) REFERENCES `user` (`id_auto_user`);

--
-- Filtros para la tabla `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`id_pha_acti`) REFERENCES `phase` (`id_auto_pha`);

--
-- Filtros para la tabla `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`id_user_add`) REFERENCES `user` (`id_auto_user`);

--
-- Filtros para la tabla `competition`
--
ALTER TABLE `competition`
  ADD CONSTRAINT `competition_ibfk_1` FOREIGN KEY (`id_acti_comp`) REFERENCES `activity` (`id_auto_acti`);

--
-- Filtros para la tabla `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`id_user_con`) REFERENCES `user` (`id_auto_user`);

--
-- Filtros para la tabla `facility_model`
--
ALTER TABLE `facility_model`
  ADD CONSTRAINT `facility_model_ibfk_1` FOREIGN KEY (`id_res_fac`) REFERENCES `result` (`id_auto_res`);

--
-- Filtros para la tabla `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`id_proj_file`) REFERENCES `project` (`id_auto_proj`);

--
-- Filtros para la tabla `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`id_file_noti`) REFERENCES `file` (`id_auto_fil`);

--
-- Filtros para la tabla `phase`
--
ALTER TABLE `phase`
  ADD CONSTRAINT `phase_ibfk_1` FOREIGN KEY (`id_project_pha`) REFERENCES `project` (`id_auto_proj`);

--
-- Filtros para la tabla `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`id_project-prog`) REFERENCES `project` (`id_auto_proj`);

--
-- Filtros para la tabla `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`id_knowledge_area_proj`) REFERENCES `knowledge_area` (`id_auto_know`);

--
-- Filtros para la tabla `relation_rol_user`
--
ALTER TABLE `relation_rol_user`
  ADD CONSTRAINT `relation_rol_user_ibfk_1` FOREIGN KEY (`id_user_relaru`) REFERENCES `user` (`id_auto_user`),
  ADD CONSTRAINT `relation_rol_user_ibfk_2` FOREIGN KEY (`id_rol_relaru`) REFERENCES `rol` (`id_auto_rol`);

--
-- Filtros para la tabla `relation_user_file`
--
ALTER TABLE `relation_user_file`
  ADD CONSTRAINT `relation_user_file_ibfk_1` FOREIGN KEY (`id_user_reluf`) REFERENCES `user` (`id_auto_user`),
  ADD CONSTRAINT `relation_user_file_ibfk_2` FOREIGN KEY (`id_file_reluf`) REFERENCES `file` (`id_auto_fil`);

--
-- Filtros para la tabla `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`id_know_res`) REFERENCES `knowledge_area` (`id_auto_know`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`id_comp_res`) REFERENCES `competition` (`id_auto_comp`);

--
-- Filtros para la tabla `time_tracking`
--
ALTER TABLE `time_tracking`
  ADD CONSTRAINT `time_tracking_ibfk_1` FOREIGN KEY (`id_user_time`) REFERENCES `user` (`id_auto_user`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_know_user`) REFERENCES `knowledge_area` (`id_auto_know`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_formation_lvl_user`) REFERENCES `formation_lvl` (`id_auto_flvl`);

--
-- Filtros para la tabla `vinculation`
--
ALTER TABLE `vinculation`
  ADD CONSTRAINT `vinculation_ibfk_1` FOREIGN KEY (`id_user_vin`) REFERENCES `user` (`id_auto_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
