-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2022 a las 16:04:42
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_fallecimiento` date DEFAULT NULL,
  `lugar_nacimiento` varchar(40) DEFAULT NULL,
  `biografia` longtext DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre`, `apellidos`, `fecha_nacimiento`, `fecha_fallecimiento`, `lugar_nacimiento`, `biografia`, `imagen`, `fecha_creacion`, `fecha_modificacion`) VALUES
(2, 'Miguel ', 'de Cervantes Saavedra ', '1547-09-29', '1616-04-22', 'Alcalá de Henares', 'Novelista, poeta y dramaturgo   español. Se cree que nació el 29 de septiembre de 1547 en Alcalá de Henares y murió el 22 de abril de 1616 en Madrid, pero fue enterrado el 23 de abril y popularmente se conoce esta fecha como la de su muerte. Es considerado la máxima figura de la literatura española. Es universalmente conocido, sobre todo por haber escrito El ingenioso hidalgo Don Quijote de la Mancha, que muchos críticos han descrito como la primera novela moderna y una de las mejores obras de la literatura universal. Se le ha dado el sobrenombre de Príncipe de los Ingenios.\r\n\r\nMiguel de Cervantes nació en Alcalá de Henares en 1547. Fue el cuarto de los siete hijos de un modesto cirujano, Rodrigo de Cervantes, y de Leonor Cortinas.A los dieciocho años tuvo que huir a Italia porque había herido a un hombre; allí entró al servicio del cardenal Acquaviva. Poco después se alistó como soldado y participó heroicamente en la batalla de Lepanto, en 1571; donde fue herido en el pecho y en la mano izquierda, que le quedó anquilosada. Cervantes siempre se mostró orgulloso de haber participado en la batalla de Lepanto.Continuó unos años como soldado y, en 1575, cuando regresaba a la península junto a su hermano Rodrigo, fueron apresados y llevados cautivos a Argel. Cinco años estuvo prisionero, hasta que en 1580 pudo ser liberado gracias al rescate que aportó su familia y los padres trinitarios. Durante su cautiverio, Cervantes intentó fugarse varias veces, pero nunca lo logró.Cuando en 1580 volvió a la Península tres doce años de ausencia, intentó varios trabajos y solicitó un empleo en <<las Indias>>, que no le fue concedido, Fue una etapa dura para Cervantes, que empezaba a escribir en aquellos años, En 1584 se casó y, entre 1587 y 1600, residió en Sevilla ejerciendo un ingrato y humilde oficio –comisario de abastecimientos-, que le obligaba a recorrer Andalucía requisando alimentos para las expediciones que preparaba Felipe II. La estancia en Sevilla parece ser fundamental en la biografía cervantina, pues tanto los viajes como la cárcel le permitieron conocer todo tipo de gentes que aparecerán como personajes en su obra.Cervantes se transladó a Valladolid en 1604, en busca de mecenas en el entorno de la corte, pues tenía dificultades económicas. Cuando en 1605 publicó la primera parte del Quijote, alcanzó un gran éxito, lo que le permitió publicar en pocos años lo que había ido escribiendo. Sin embargo, a pesar del éxito del Quijote, Cervantes siempre vivió con estrecheces, buscando la protección de algún mecenas entre los nobles, lo que consiguió sólo parcialmente del conde de Lemos, a quien dedicó su última obra, Los trabajos de Persiles y Segismunda. ', '????\0JFIF\0\0\0\0\0\0', '2021-12-14 12:49:43', '2021-12-14 12:49:43'),
(7, 'Claudia', 'Santana Morales', '2001-05-02', '0000-00-00', '', 'ffhj', 'wallpaper-eevee.jpg', '2022-01-03 13:01:27', '2022-01-03 13:01:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, 'narrativo', '2021-12-14 12:55:49', '2021-12-14 12:55:49'),
(2, 'lírico', '2021-12-14 12:55:49', '2021-12-14 12:55:49'),
(3, 'dramático', '2021-12-14 12:56:58', '2021-12-14 12:56:58'),
(4, 'didáctico', '2021-12-14 12:56:58', '2021-12-14 12:56:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `id_editorial` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id_editorial`, `nombre`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, ' Planeta Cómic', '2021-12-14 13:01:25', '2021-12-14 13:01:25'),
(2, 'IC EDITORIAL', '2021-12-14 13:01:25', '2021-12-14 13:01:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `disponible` tinyint(4) NOT NULL,
  `portada` varchar(80) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `id_editorial` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `disponible`, `portada`, `id_editorial`, `id_categoria`, `id_autor`) VALUES
(37, 'Las aventuras de Perry el Ornitorrinco', 1, NULL, 2, 1, 7),
(42, 'Los Miserables', 0, NULL, 1, 1, 7),
(43, 'El Alquimista', 1, NULL, 2, 3, 7),
(44, 'La Divina Comedia', 1, NULL, 1, 1, 2),
(45, 'Cien años de Soledad', 1, NULL, 2, 3, 2),
(46, 'El Principito', 1, NULL, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id_prestamo` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  `timestamps` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` varchar(50) NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`id_prestamo`, `id_libro`, `id_usuario`, `fecha_prestamo`, `fecha_devolucion`, `timestamps`, `estado`) VALUES
(28, 42, 13, '2022-02-28', NULL, '2022-02-28 15:03:51', 'aceptado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sanciones`
--

CREATE TABLE `sanciones` (
  `id_sancion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `motivo` varchar(50) NOT NULL,
  `timestamps` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sanciones`
--

INSERT INTO `sanciones` (`id_sancion`, `id_usuario`, `fecha_inicio`, `fecha_fin`, `motivo`, `timestamps`) VALUES
(3, 11, '2022-02-21', '2022-02-23', 'dd', '2022-02-26 18:35:32'),
(6, 11, '2022-02-27', '2022-03-04', 'retraso', '2022-02-27 16:48:40'),
(7, 11, '2022-02-27', '2022-03-04', 'retraso', '2022-02-27 16:59:35'),
(8, 13, '2022-02-27', '2022-03-04', 'retraso', '2022-02-27 17:09:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipo` tinyint(1) DEFAULT 0,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `password`, `created_at`, `tipo`, `imagen`) VALUES
(11, 'Claudia', 'Santana Morales', 'claudiasm0205@gmail.com', '$2y$10$2q09roKXVHjKJph3pDQ/X.fmr2U8UDottv7MvpQI31cmZYkMsMNZK', '2022-02-22 20:21:41', 1, ''),
(13, 'Carmen Rita', 'Morales Santiago', 'carmen@hotmail.com', '$2y$04$//W9xy2W2rtXL6a3rjGEW.9xKPSvwNGp3GEIMwYl6ChvLYsfQZxf.', '2022-02-23 19:56:07', 0, NULL),
(16, 'jose', 'gracia', 'jose@admin.com', '$2y$10$8tD09TFbwkXjmAwPx0EDzuGRG5RAeB1CDC8OB5L3Wo.nEPpbU.mcO', '2022-02-28 15:00:59', 1, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`id_editorial`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_editorial` (`id_editorial`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `id_libro` (`id_libro`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `sanciones`
--
ALTER TABLE `sanciones`
  ADD PRIMARY KEY (`id_sancion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id_editorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `sanciones`
--
ALTER TABLE `sanciones`
  MODIFY `id_sancion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_editorial`) REFERENCES `editorial` (`id_editorial`),
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `libros_ibfk_3` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`),
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `sanciones`
--
ALTER TABLE `sanciones`
  ADD CONSTRAINT `sanciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
