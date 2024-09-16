-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2024 a las 20:19:41
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `ID` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_tienda` int(11) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`ID`, `id_producto`, `id_tienda`, `precio`) VALUES
(41, 41, 1, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `nombre`) VALUES
(41, 'Arroz'),
(42, 'Azúcar'),
(43, 'Harina'),
(44, 'Leche'),
(45, 'Aceite'),
(46, 'Pasta'),
(47, 'Sal'),
(48, 'Frijoles'),
(49, 'Atún'),
(50, 'Tomate'),
(51, 'Cebolla'),
(52, 'Ajo'),
(53, 'Pollo'),
(54, 'Carne de res'),
(55, 'Huevo'),
(56, 'Mantequilla'),
(57, 'Yogur'),
(58, 'Pan'),
(59, 'Queso'),
(60, 'Jugo'),
(61, 'Arroz'),
(62, 'Azúcar'),
(63, 'Harina'),
(64, 'Leche'),
(65, 'Aceite'),
(66, 'Pasta'),
(67, 'Sal'),
(68, 'Frijoles'),
(69, 'Atún'),
(70, 'Tomate'),
(71, 'Cebolla'),
(72, 'Ajo'),
(73, 'Pollo'),
(74, 'Carne de res'),
(75, 'Huevo'),
(76, 'Mantequilla'),
(77, 'Yogur'),
(78, 'Pan'),
(79, 'Queso'),
(80, 'Jugo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `direccion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`ID`, `nombre`, `direccion`) VALUES
(1, 'Camiletti', 'Junka y Junin'),
(2, 'Caceres', 'Maradona 2500'),
(3, 'Supermercado El Ahorro', 'Calle Falsa 123, Ciudad, Estado, 12345'),
(4, 'Mercado Central', 'Avenida Siempre Viva 742, Ciudad, Estado, 67890'),
(5, 'Tienda La Esquina', 'Boulevard de los Sueños Rotos 50, Ciudad, Estado, 11223'),
(6, 'Minimarket La Familia', 'Avenida Principal 101, Ciudad, Estado, 44556'),
(7, 'Supermercado Los Precios Bajos', 'Calle Secundaria 202, Ciudad, Estado, 78901'),
(8, 'Tienda La Canasta', 'Avenida del Comercio 303, Ciudad, Estado, 23456'),
(9, 'Tienda 96', 'Dirección aleatoria 96'),
(10, 'Tienda 97', 'Dirección aleatoria 97'),
(11, 'Tienda 98', 'Dirección aleatoria 98'),
(12, 'Tienda 99', 'Dirección aleatoria 99'),
(13, 'Tienda 100', 'Dirección aleatoria 100');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_datos`
--

CREATE TABLE `usuarios_datos` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `domicilio` varchar(250) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `contraseña` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_datos`
--

INSERT INTO `usuarios_datos` (`ID`, `nombre`, `apellido`, `domicilio`, `correo`, `contraseña`) VALUES
(1, 'Usuario1', '', 'Calle Camino del Rey 52, Ciudad Gótica, Oregon, 44556', 'usuario11@outlook.com', '$2y$10$53GXF4j1SquBovtycg9hEugcGlgR5N4mOK32jyqEvnpIpzgpPXtMi'),
(2, 'Usuario2', '', 'Calle Camino del Rey 735, Ciudad Gótica, Oregon, 67890', 'usuario22@outlook.com', '$2y$10$flqdTsnCcitDB80voMSpguArEjOvWMdcU3nlRAdmkocdTjKzqGAV.'),
(3, 'Usuario3', '', 'Pasaje Camino Verde 121, Rivendel, Nevada, 12345', 'usuario33@outlook.com', '$2y$10$.sAfG7r1D2aHcYfdHrGgIO10yfbdurVevEGqXgrSyYcRPOhnC3LRu'),
(4, 'Usuario4', '', 'Boulevard Camino Verde 520, Rivendel, Nueva York, 44556', 'usuario44@outlook.com', '$2y$10$OZco67ANfeu0k1p3Zhw1lu3JLvmApyaHPcr4Q3V.VutDBvttjWSmK'),
(5, 'Usuario5', '', 'Camino Callejón Diagon 239, Rivendel, Florida, 10112', 'usuario55@gmail.com', '$2y$10$j6ys.rYblDwSMwGr8ejgO.r2ebHf73QiqKJpxvaVTKzU1Y75m1rRa'),
(6, 'Usuario6', '', 'Calle Avenida Siempre Viva 76, Pueblo Paleta, Oregon, 09876', 'usuario66@outlook.com', '$2y$10$zq84XmT7JdOSz132jBqYquWYJBmD25TmsqPrR7JRuE6i/N7TVZpQK'),
(7, 'Usuario7', '', 'Pasaje Pasaje de la Fortuna 864, Pueblo Paleta, Texas, 54321', 'usuario77@yahoo.com', '$2y$10$T2TEq/CCMTkQMVijYZZwXeLTXyMmi1RjWEH65.9VCOHJchZaZnam.'),
(8, 'Usuario8', '', 'Boulevard Boulevard de los Sueños Rotos 537, Rivendel, Maine, 11223', 'usuario88@gmail.com', '$2y$10$qtz1m5OPEo0s19e9FckNOOR.QqKFCUsN9cGqpCJuX0wxr3km0jQMe'),
(9, 'Usuario9', '', 'Pasaje Camino Verde 979, Hogwarts, Oregon, 11223', 'usuario99@outlook.com', '$2y$10$D5S5KKWGs9e9kRlqsGZsmuJT98cOUqwFQhHZ84VyxV5OwDt26qOKy'),
(10, 'Usuario10', '', 'Camino Camino Verde 469, Ciudad Esmeralda, Oregon, 78901', 'usuario1010@outlook.com', '$2y$10$40uVkSr1NEq3HJVk/IqMl.FeftjpKnsdGRxisSwSz5zgR1CS2SK4u'),
(11, 'Usuario11', '', 'Camino Pasaje de la Fortuna 969, Gotham, Nueva York, 67890', 'usuario1111@gmail.com', '$2y$10$y/DZC77EtA0pwX1RzSfvuutVdzuBbbXvUkiflWDzyqGGqWIeetVT.'),
(12, 'Usuario12', '', 'Camino Pasaje de la Fortuna 67, Rivendel, California, 10112', 'usuario1212@outlook.com', '$2y$10$535N0AJa0ekFhc21IFjjge35Xd6.fQHmUnsZSvj1G26JoTvre9fAi'),
(13, 'Usuario13', '', 'Avenida Camino del Rey 29, Gotham, Washington, 78901', 'usuario1313@outlook.com', '$2y$10$2V0JDkW1k3UA7gCWinFLJ.l15W5hDLfhRxfNOCx8XhQ9JTV1CsRr6'),
(14, 'Usuario14', '', 'Calle Boulevard de los Sueños Rotos 536, Ciudad Esmeralda, Texas, 44556', 'usuario1414@yahoo.com', '$2y$10$lGswcvkS6cN4kj/LmFQqqeX13FT5v5krXRNcOrs1vYSH0cwXxFYdu'),
(15, 'Usuario15', '', 'Calle Camino Verde 149, Gotham, Texas, 78901', 'usuario1515@outlook.com', '$2y$10$A8bBZzJuRThcs3//kSF1U.oB9.nZnFoni0TEhLRyM.ahSOeOfzfKC'),
(16, 'Usuario16', '', 'Camino Callejón Diagon 695, Gotham, Nueva York, 12345', 'usuario1616@outlook.com', '$2y$10$i3pi9Qb27rRxgEv8YNOnyOeXViDv044dQIXHXFWPOfkCgwywa6pa6'),
(17, 'Usuario17', '', 'Boulevard Camino Verde 457, Ciudad Esmeralda, Nueva York, 11223', 'usuario1717@gmail.com', '$2y$10$OEjwnHh7xr.LA5IMjThxJedZ5nAChWDBBUScXRLrycuU445ZzMOUi'),
(18, 'Usuario18', '', 'Calle Carrera del Sol 506, Hogwarts, Nueva York, 09876', 'usuario1818@gmail.com', '$2y$10$bK884CkU4DfbKs7ko1dyFeOBZa9N4bNJvvF1DQpPgQtY6DNIGcXGm'),
(19, 'Usuario19', '', 'Calle Boulevard de los Sueños Rotos 214, Springfield, California, 09876', 'usuario1919@hotmail.com', '$2y$10$YLZSX/aAb./KHYALXAO1ruTp5X39W4CgvkaL/7c5yTSSNepIuiMnW'),
(20, 'Usuario20', '', 'Camino Camino Verde 818, Hogwarts, California, 44556', 'usuario2020@hotmail.com', '$2y$10$J0MngdbIZfzf6LetT20JMeMcuYX4NuyBuOjpNkfHc1KMkxXxYNtHy'),
(22, 'Enrique Josue', 'Rahn', 'barrio 8 de octubre', 'rahn@gmail.com', '$2y$10$icvtJiEjURxqPh7L/kDP9uE3f.zVOCrHf4ON8bcpBzinQ5EM9rsB.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_precios_productos` (`id_producto`),
  ADD KEY `fk_precios_tienda` (`id_tienda`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios_datos`
--
ALTER TABLE `usuarios_datos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `precios`
--
ALTER TABLE `precios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `tienda`
--
ALTER TABLE `tienda`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios_datos`
--
ALTER TABLE `usuarios_datos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `precios`
--
ALTER TABLE `precios`
  ADD CONSTRAINT `fk_precios_productos` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_precios_tienda` FOREIGN KEY (`id_tienda`) REFERENCES `tienda` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
