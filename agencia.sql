-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 02:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agencia`
--
CREATE DATABASE IF NOT EXISTS `agencia` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `agencia`;

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `com_id` int(10) UNSIGNED NOT NULL,
  `com_user_id` int(11) NOT NULL,
  `com_por_id` int(11) NOT NULL,
  `com_mensaje` varchar(100) NOT NULL,
  `com_fecha` datetime NOT NULL,
  `com_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: pendiente, 1: aprobado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`com_id`, `com_user_id`, `com_por_id`, `com_mensaje`, `com_fecha`, `com_status`) VALUES
(1, 6, 1, 'hola', '2023-04-28 20:35:53', 1),
(2, 6, 1, 'BUEN DIA AMIGO', '2023-04-28 22:19:57', 1),
(3, 6, 3, 'INFORMACION POR EL TOUR', '2023-04-28 22:20:55', 2),
(4, 6, 3, 'nuevo comentario', '2023-05-06 11:02:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

DROP TABLE IF EXISTS `header`;
CREATE TABLE `header` (
  `hea_logo` varchar(20) NOT NULL,
  `hea_subtitulo` varchar(50) NOT NULL,
  `hea_titulo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`hea_logo`, `hea_subtitulo`, `hea_titulo`) VALUES
('Xekram Mendoza', 'Bienvenido Coder', 'Chupando Solo');

-- --------------------------------------------------------

--
-- Table structure for table `portafolios`
--

DROP TABLE IF EXISTS `portafolios`;
CREATE TABLE `portafolios` (
  `por_id` int(10) UNSIGNED NOT NULL,
  `por_user_id` int(11) NOT NULL,
  `por_titulo` varchar(20) NOT NULL,
  `por_subtitulo` varchar(20) NOT NULL,
  `por_imgSmall` text NOT NULL,
  `por_imgLarge` text NOT NULL,
  `por_contenido` text NOT NULL,
  `por_fecha` date NOT NULL,
  `por_status` varchar(20) NOT NULL,
  `por_vistas` int(11) DEFAULT 0,
  `por_delete` tinyint(4) DEFAULT 1 COMMENT '0: desactivado, 1: activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portafolios`
--

INSERT INTO `portafolios` (`por_id`, `por_user_id`, `por_titulo`, `por_subtitulo`, `por_imgSmall`, `por_imgLarge`, `por_contenido`, `por_fecha`, `por_status`, `por_vistas`, `por_delete`) VALUES
(1, 6, 'Threads', 'Illustration', '9d9913ca2899d7c4939530ac8e3035dc.jpg', '64d144e087046858d2d9b8ac99f2a250.jpg', 'primera publicacion', '2023-04-19', 'publicado', 19, 1),
(2, 6, 'Explore', 'Graphic Design', 'ff7b73c4e7da68b43876e5775f026454.jpg', 'e50bdae4d9d87aa09dfd0477c4aca6e9.jpg', 'segunda publicacion', '2023-04-19', 'publicado', 0, 0),
(3, 6, 'Explore', 'Illustration', 'cc35ad84190ddde73812717b01081ee0.jpg', '138e022dec45567962220e4ba57777a2.jpg', 'NUEVO POST PARA EL TRATAMIENTO', '2023-04-28', 'publicado', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_nombres` varchar(100) NOT NULL,
  `user_apellidos` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_img` text DEFAULT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_token` text DEFAULT NULL,
  `user_status` tinyint(4) DEFAULT 0,
  `user_rol` varchar(50) NOT NULL DEFAULT 'suscritor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_nombres`, `user_apellidos`, `user_email`, `user_img`, `user_pass`, `user_token`, `user_status`, `user_rol`) VALUES
(1, 'Marco', 'Mendoza', 'marco@gmail.com', NULL, '$2y$10$S3Zq4ZmoDduMLuXSeQJ27uXhjdzIvClwlkCA3X6.7HpOwftRm1ccK', '', 1, 'admin'),
(2, 'Pedro', 'Suarez', 'pedro@mail.com', NULL, '$2y$10$84954vuVuOBF4kQSoxvVMel5qjC8Db0SGH0GPad1VgopNKbDEV1Wy', '', 1, 'suscritor');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_nombres` varchar(100) NOT NULL,
  `user_apellidos` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_img` text DEFAULT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_token` text DEFAULT NULL,
  `user_status` tinyint(4) DEFAULT 0 COMMENT 'status 0: no activo, status 1: activo',
  `user_rol` varchar(50) NOT NULL DEFAULT 'suscriptor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user_nombres`, `user_apellidos`, `user_email`, `user_img`, `user_pass`, `user_token`, `user_status`, `user_rol`) VALUES
(5, 'Jose', 'Dallas', 'jose@mail.com', NULL, '$2y$10$w0M5yaJQ/b9SolBtB57HsugWVupxO/OqxQS9ez2SMavFtBpq/wMvm', '', 1, 'suscriptor'),
(6, 'marco', 'mendoza', 'marloc2194@gmail.com', 'user01.png', '$2y$10$O1QAMxHeU5pXbEra.3pPuuGgplE/cq7Ufn3O9dldh3fDPbfK7J/he', '', 1, 'admin'),
(7, 'marco', 'mendiola', 'admin@gmail.com', NULL, '$2y$10$elj00ObkRyylCXQANU89d.suXqJuEENpM0Nv/gttmciN4tdbbLDRC', '75d23af433e0cea4c0e45a56dba18b30', 0, 'suscriptor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `portafolios`
--
ALTER TABLE `portafolios`
  ADD PRIMARY KEY (`por_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `com_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `portafolios`
--
ALTER TABLE `portafolios`
  MODIFY `por_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
