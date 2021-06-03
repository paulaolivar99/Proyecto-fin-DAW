-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2021 a las 01:02:34
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(500) NOT NULL,
  `desarrollo` varchar(500) NOT NULL,
  `img` varchar(500) NOT NULL,
  `enlace` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `desarrollo`, `img`, `enlace`) VALUES
(3, 'Dos representantes de Huesca, finalistas del premio Promesas Alta Cocina de Le Cordon Bleu', 'La barbastrense Alba Gil, de la escuela de Guayente, y Ariel Munguía de la Escuela de Hostelería de Huesca, entre los participantes.', 'noticia6.jpg', 'https://www.radiohuesca.com/sociedad/el-16-de-marzo-se-conoceran-los-finalistas-del-premio-promesas-alta-cocina-19022021-150540.html'),
(29, 'José Luis Corral rescata del olvido a la reina Petronila y asume su voz', 'El escritor presentó ayer su novela sobre la hija de Ramiro II \'el Monje\' e Inés de Poitiers cuya boda dio lugar a la creación de la Corona de Aragón.', 'imagen5.jpeg', 'https://www.heraldo.es/noticias/ocio-y-cultura/2021/04/20/jose-luis-corral-rescata-del-olvido-a-la-reina-petronila-y-asume-su-voz-1486120.html'),
(30, 'Aragón suma ya 20 incendios, la mayoría agrícolas, desde el inicio de la época de peligro el 1 de abril', 'Solo tres han superado la hectárea gracias a la rápida intervención de los servicios de extinción. Hasta el 15 de octubre únicamente se permiten quemas de restos de poda de olivo o para prevenir daños por plagas...', 'noticia4.jpeg', 'https://www.heraldo.es/noticias/aragon/2021/04/06/aragon-suma-ya-20-incendios-la-mayoria-agricolas-desde-el-inicio-de-la-epoca-de-peligro-el-1-de-abril-1482715.html'),
(31, 'Nace el \"Monegros Pádel Tour\"', 'Las fechas de inscripción ya están abiertas hasta el 22 de abril.', 'noticia3.jpg', 'https://www.radiohuesca.com/deportes/nace-el-monegros-padel-tour-12042021-152976.html'),
(32, 'Una tractorada recorrerá las calles de Huesca el próximo jueves 29 de abril', 'UAGA y UPA convocan a los agricultores y ganaderos de la provincia para reclamar a las instituciones que apoyen su actividad.\r\n                                            ', 'noticia2.jpg', 'https://www.cope.es/emisoras/aragon/huesca-provincia/huesca/informativo-mediodia-en-huesca/noticias/una-tractorada-recorrera-las-calles-huesca-proximo-jueves-abril-20210426_1256705'),
(33, 'Arranca el “Monegros Pádel Tour” con una importante participación', 'Un total de 46 parejas se han inscrito en la primera edición del nuevo torneo comarcal de pádel que ha comenzado esta semana.', 'noticia1.jpeg', 'https://www.diariodelaltoaragon.es/noticias/deportes/2021/05/07/arranca-el-monegros-padel-tour-con-una-importante-participacion-1490385-daa.html'),
(34, 'Poleñino pide a sus vecinos que reduzcan sus salidas a la calle y fuera del pueblo para atajar el incremento de positivos', 'El consistorio ha cerrado además el bar y la pista de pádel y ha suspendido las actividades deportivas y extraescolares. La población tiene una incidencia acumulada a 14 días de 3.800 casos por cada 100.000 habitantes.', 'noticia0.jpeg', 'https://www.heraldo.es/noticias/aragon/huesca/2021/05/27/polenino-pide-vecinos-que-se-autoconfinen-para-atajar-el-importante-aumento-de-casos-coronavirus-1495303.html'),
(244, 'Abertura de Piscinas', 'El día 15 de julio se abrirán las piscinas.', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(5) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `nombre`, `tipo`, `telefono`, `fecha`, `hora`, `id_usuario`, `created_at`) VALUES
(67, 'Paula', 'padel', '976593247', '2021-06-04', '8:00', 1, '2021-06-03 02:14:37'),
(68, 'Paula', 'merendero', '976593247', '2021-06-20', 'Reser', 1, '2021-06-03 02:18:11'),
(69, 'Paula', 'merendero', '976593247', '2021-06-19', 'Reser', 1, '2021-06-03 02:18:26'),
(70, 'Paula', 'merendero', '976593247', '2021-06-27', 'Reser', 1, '2021-06-03 02:18:44'),
(71, 'Paula', 'salon', '976593247', '2021-06-19', 'Reser', 1, '2021-06-03 02:19:20'),
(72, 'f', 'salon', '976593247', '2021-06-15', 'Reser', 1, '2021-06-03 02:19:30'),
(73, 'Paula', 'merendero', '976593247', '2021-06-12', 'Reser', 1, '2021-06-03 02:19:44'),
(74, 'Jhon Doe', 'merendero', '976593247', '2021-06-23', 'Reser', 1, '2021-06-03 02:21:37'),
(75, 'Paula', 'merendero', '976593247', '2021-06-13', 'Reser', 1, '2021-06-03 02:22:23'),
(77, 'Paula', 'padel', '976593247', '2021-06-14', '10:00', 1, '2021-06-03 22:05:50'),
(78, 'Paula', 'salon', '976593247', '2021-06-07', 'Reser', 1, '2021-06-03 22:06:43'),
(79, 'Paula', 'salon', '976593247', '2021-06-08', 'Reser', 1, '2021-06-03 22:07:06'),
(80, 'Paula', 'padel', '976593247', '2021-06-07', '', 1, '2021-06-03 23:11:59'),
(81, 'Paula', 'padel', '976593247', '2021-06-05', '8:00', 1, '2021-06-03 23:15:31'),
(82, 'Paula', 'salon', '976593247', '2021-06-10', 'Reser', 1, '2021-06-03 23:23:19'),
(83, 'Paula', 'merendero', '976593247', '2021-06-18', 'Reser', 1, '2021-06-03 23:49:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'polivar.cbaz@gmail.com', '$2y$10$jr2RbmPRsk/3mXPh5//MT.Gqo4.jsYj0rYYEaaLu1ZvDDePCx3ozS', '2021-05-29 22:33:22'),
(2, 'omurbernad@gmail.com', '$2y$10$eKo7ado2ltCLzWfdiiT5x.c9MZ9ZgMXUDzc8LfaKKxjKHtEFsPX4a', '2021-06-01 20:05:39'),
(3, 'juana@gmail.com', '$2y$10$MUflOhLOVIxIE3/JDloOje3xindpWWYcjQJnVLatSucJAri0NBb.W', '2021-06-01 20:06:21'),
(4, 'laura@gmail.com', '$2y$10$EEG1.MfGTnzq7SCkPiM/9u20jQuh1.lYw6fCiV7ZwL2DyMQB3LYdK', '2021-06-03 22:30:17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `desarrollo` (`desarrollo`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
