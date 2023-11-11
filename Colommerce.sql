-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2023 a las 18:46:17
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(2) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion`) VALUES
(1, 'Emprendedor'),
(2, 'Administrador\r\n'),
(3, 'Proveedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `Pago` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `Pago`, `created`, `modified`, `status`) VALUES
(12, 'yo', '2022-09-27 13:31:04', '2022-09-27 13:31:04', 1),
(13, 'yo123', '2022-09-27 14:16:25', '2022-09-27 14:16:25', 1),
(14, 'yo123', '2022-09-27 16:49:12', '2022-09-27 16:49:12', 1),
(15, 'yo123', '2022-09-29 16:04:53', '2022-09-29 16:04:53', 1),
(16, 'yo123', '2022-09-29 16:06:56', '2022-09-29 16:06:56', 1),
(17, 'asd', '2023-08-09 12:02:10', '2023-08-09 12:02:10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `Documento` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellidos` varchar(65) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Genero` varchar(50) NOT NULL,
  `Eps` varchar(21) NOT NULL,
  `Telefono` int(14) NOT NULL,
  `Correo` varchar(87) NOT NULL,
  `Direccion` varchar(96) NOT NULL,
  `Fecha de nacimiento` date NOT NULL,
  `Cargo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`Documento`, `Nombre`, `Apellidos`, `Edad`, `Genero`, `Eps`, `Telefono`, `Correo`, `Direccion`, `Fecha de nacimiento`, `Cargo`) VALUES
(1231234, 'Nelson ', 'Lozano', 14, 'Hombre', 'Salud total', 1231234, 'a@a.com', 'wqeqw123', '2005-04-14', 'Atencion al cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialización`
--

CREATE TABLE `especialización` (
  `CARGO` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `grand_total` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `status` enum('Pending','Completed','Cancelled') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `grand_total`, `created`, `status`) VALUES
(12, 12, 1361700.00, '2022-09-27 13:31:04', 'Pending'),
(13, 13, 453900.00, '2022-09-27 14:16:25', 'Pending'),
(14, 14, 2479960.00, '2022-09-27 16:49:12', 'Pending'),
(15, 15, 453900.00, '2022-09-29 16:04:53', 'Pending'),
(16, 16, 453900.00, '2022-09-29 16:06:56', 'Pending'),
(17, 17, 453900.00, '2023-08-09 12:02:10', 'Pending');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(18, 12, 1, 3),
(19, 13, 1, 1),
(20, 14, 3, 4),
(21, 15, 1, 1),
(22, 16, 1, 1),
(23, 17, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `description`, `price`, `created`, `modified`, `status`) VALUES
(1, 'silla_ruedas.jpg', 'Silla De Ruedas Estándar Desarmable Fácil Manejo Nueva', 'BIOSMEDIC SAS.\r\n\r\nCon características estándar, esta silla de ruedas está fabricada en acero Pintado y es ideal para uso en interiores Y Exteriores.', 453900, '2022-09-22 16:00:28', '2022-09-22 16:00:28', 1),
(2, 'muletas.jpg', 'Muletas Ortopédicas Aluminio Axilares Par Talla M', 'BIOSMEDIC SAS. CARACTERÍSTICAS PRINCIPALES\r\n\r\nMuletas en aluminio, importadas con graduación de altura por medio de pin, axilares y manilares abullonados (par)\r\nCapacidad de peso 100 KGS - Peso: 1.92 kgs aprox\r\nColores disponibles: no aplica', 95000, '2022-09-22 16:12:34', '2022-09-22 16:12:34', 1),
(3, 'televisor.jpg', 'TV Hyundai HYLED3241D HD 32\" 100V/240V', 'Tamaño de la pantalla: 32 \". Su resolución es HD. Modo de sonido: Standard. Control LG Magic Remote no incluido. Conecta tus dispositivos mediante sus 3 puertos HDMI y sus 2 puertos USB.\r\nEntretenimiento para compartir en familia.', 619990, '2022-09-27 23:35:36', '2022-09-27 23:35:36', 1),
(4, 'cuelloortopedico1.png', 'Cuello Ortopédico Cervical Collar Philadelphia', 'Cuello Ortopedico Inmovilizador para Tratamiento y lesiones a nivel cervical.\r\nEstabiliza la espina dorsal cervical, proporciona el efecto térmico, tejidos suaves de la ayuda de la región cervical.\r\nProporciona Rigidez y estabilidad adecuadas en la aguda y durante el periodo de rehabilitación. Material: PLASTAZOTE - Rigidez: Semi-rígido - Ajustable: Sí', 20000, '2022-09-29 22:48:23', '2022-09-29 22:48:23', 1),
(5, 'audifonosparasordos1.jpg\r\n', 'Audífono Recargable Para Sordos Amplificador De Audición', 'Este amplificador auditivo tiene una batería recargable incorporada, ya no necesitará comprar ni cambiar baterías. Con un chip de reducción de ruido digital integrado, este amplificador ofrece una mejor claridad tanto para la televisión como para las conversaciones. 4 frecuencias de amplificación diferentes ajustables', 224000, '2022-09-29 23:02:12', '2022-09-29 23:02:12', 1),
(6, 'ferulamañomuñequera1.jpg', 'Ferula Mano Muñequera Faja Soporte Ortopedico Tunel Carpiano', 'Soporte ortopédico especial para acelerar la recuperación de la afección por túnel carpiano y lesiones leves. Esta férula brinda protección y estabilidad a la palma y muñeca gracias a la barra metálica interna que limita el movimiento de la mano favoreciendo el proceso de recuperación y además crea una compresión precisa gracias a su cierre con velcro ajustable.\r\n', 21900, '2022-09-29 23:09:06', '2022-09-29 23:09:06', 1),
(7, 'nevera1.png', 'Nevera auto defrost Challenger Lúmina CR 249 titanium con freezer 231L 115V', 'Disfruta de tus alimentos frescos y almacénalos de manera práctica y cómoda en la nevera Challenger, la protagonista de la cocina. La disposición de 2 estantes te proporcionará un gran ahorro de espacio y fácil localización de tus productos. Su sistema Auto defrost o de auto-descongelación es una técnica que regularmente permite que el electrodoméstico se descongele de manera automática, por lo que no es necesario que tengas que sacar manualmente la escarcha que se genera.\r\n', 1439900, '2022-09-29 23:17:09', '2022-09-29 23:17:09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `ID_PROMOCIONES` int(11) NOT NULL,
  `TIPO` varchar(10) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `FECHA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(2) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `categoria_productos` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `categoria_productos`) VALUES
(1, 'Ssahgif', 'Belleza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Documento` int(11) NOT NULL,
  `Foto` text NOT NULL,
  `Nombres` varchar(45) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `Apellidos` varchar(45) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Genero` varchar(50) NOT NULL,
  `Telefono` int(30) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Direccion` varchar(125) NOT NULL,
  `Interes` varchar(300) NOT NULL,
  `id_cargo` int(2) NOT NULL,
  `Usuario` varchar(40) NOT NULL,
  `Contraseña` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Documento`, `Foto`, `Nombres`, `Apellidos`, `Edad`, `Genero`, `Telefono`, `Correo`, `Direccion`, `Interes`, `id_cargo`, `Usuario`, `Contraseña`) VALUES
(12344, 'Árbol de objetivo.png', 'Nelson', 'Lozano', 13, 'wqeqwe', 21312321, 'asda@gasda.com', 'CALLE 65C SUR 77I-14', 'a', 2, '13', 'bd307a3ec329e10a2cff8fb87480823da114f8f4'),
(123123, 'Logo fondo blanco.png', 'Nelson', 'Lozano', 12, 'asadas', 21312312, 'asda@gasda.com', 'CALLE 65C SUR 77I-14', 'asdas', 1, '12', '7b52009b64fd0a2a49e6d8a939753077792b0554');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Documento`),
  ADD KEY `ID_CARGO` (`Cargo`),
  ADD KEY `CARGO` (`Cargo`),
  ADD KEY `GENERO` (`Genero`);

--
-- Indices de la tabla `especialización`
--
ALTER TABLE `especialización`
  ADD KEY `CARGO` (`CARGO`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indices de la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`ID_PROMOCIONES`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Documento`),
  ADD KEY `DISCAPACIDAD` (`Interes`),
  ADD KEY `ID_NECESIDADES` (`Interes`),
  ADD KEY `CAPACIDAD` (`Interes`),
  ADD KEY `GENERO` (`Genero`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `ID_PROMOCIONES` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
