-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2017 a las 16:06:33
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `namee` varchar(35) NOT NULL,
  `description` varchar(300) NOT NULL,
  `price` int(6) NOT NULL,
  `date_added` varchar(11) NOT NULL,
  `state` varchar(6) NOT NULL,
  `stock` int(3) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(35) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `namee`, `description`, `price`, `date_added`, `state`, `stock`, `user_id`, `image`, `category`) VALUES
(7, 'Televisor 4k Samsung', '3D - HDMI - SmartTV', 14000, '0000-00-00', 'nuevo', 10, 7, 'Todavia no implementado...', 'televisores'),
(8, 'Televisor 4k Samsung', '3D - HDMI - SmartTV', 14000, '0000-00-00', 'nuevo', 10, 7, 'Todavia no implementado...', 'televisores'),
(9, 'Televisor 4k Samsung', '3D - HDMI - SmartTV', 14000, '0000-00-00', 'nuevo', 10, 7, 'Todavia no implementado...', 'televisores'),
(10, 'Televisor 4k Samsung', '3D - HDMI - SmartTV', 14000, '24-08-2017', 'nuevo', 10, 7, 'Todavia no implementado...', 'televisores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_orders`
--

CREATE TABLE `products_orders` (
  `prd_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `date_perfomed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `product_price` double(6,2) NOT NULL,
  `selling_user_id` varchar(35) NOT NULL,
  `payment_made` varchar(3) NOT NULL,
  `product_name` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_name` varchar(35) NOT NULL,
  `date_perfomed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_received` varchar(3) NOT NULL,
  `user_id` int(11) NOT NULL,
  `buyer_user_id` int(11) NOT NULL,
  `product_price` double(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `name` varchar(35) NOT NULL,
  `surname` varchar(35) NOT NULL,
  `birthdate` varchar(11) NOT NULL,
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `DNI` int(11) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`name`, `surname`, `birthdate`, `id`, `username`, `DNI`, `pass`, `email`) VALUES
('Juan', 'Jhonson', '1990-02-10', 7, 'usuario1', 35620754, '$2y$10$dZ/HFbyMUFP9kXRTeM9mTORMMhIgboR8NORtYL95GtU4Ksogss0ZS', 'usuario1@gmail.com'),
('facundo', 'turano', '2017-08-09', 12, 'factura789', 12312312, '$2y$10$GS2qeT14YrQoQ47sCnFNeeh5lauKbxKXIndRw2bUf.dGiGMECelXG', 'asdasd@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
