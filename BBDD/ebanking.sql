-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-09-2024 a las 02:28:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ebanking`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id_usuario` int(11) NOT NULL,
  `n_cuenta` int(11) NOT NULL,
  `saldo` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id_usuario`, `n_cuenta`, `saldo`) VALUES
(17, 1, 430),
(2, 2, 7000),
(17, 3, 644),
(24, 4, 30),
(24, 5, 222),
(24, 6, 0),
(26, 16, 3000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE `transaccion` (
  `n_cuentaremitente` int(11) NOT NULL,
  `n_cuentadestino` int(90) NOT NULL,
  `monto` int(255) NOT NULL,
  `concepto` varchar(255) NOT NULL,
  `id_transaccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombrecompleto` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombrecompleto`, `email`, `contraseña`) VALUES
(1, 'juan sosa', '0', '123456789'),
(2, 'JUAN', 'BENJY@GMAIL', '1234567'),
(3, 'juansito', 'mateo@gmail', '123456789'),
(9, 'don dasjdajs', 'benjamincho', '2147483647'),
(10, 'kakakak 3131', 'benjamincho', '2147483647'),
(11, 'Mateito', 'login@gmail', '12345678Mateo'),
(12, 'Mariano Gonzalez', 'Marianito@g', '$2y$10$fjTT9NthF6ir693Eh5fkieiTzsBa/SEhLQnZA6ZhS/h48szjfI8j2'),
(13, 'ddasdas das', 'Benjamincit', '$2y$10$UxdwRCT8W76PZJ7Gg3BRyOKCJYmbzZYG2HXfz1s6Rt2zINJxWLMZK'),
(14, 'Nacional MasQpenadoy', 'Nacional1899@bolso.com', '$2y$10$1zRCma51oXHYHV0MDJHi5uVsIpn.XJKCiUSZSuDWMhBQ3cUNAm5W2'),
(15, 'Prueba Contra', 'CONTRASENA@GMAIL.COM', '$2y$10$AXM4QV/lnxv.xuBufAhz8OPezZ8iJ4Fo.Ai9HZoNHPmKzCZxa4kqe'),
(16, 'Penadoy 1981', 'penadoy@gmail.com', '$2y$10$H1cPnQZghD/wIQxnJxVkP.f0jH0zWIrcCMCd.kWRp0BCDfSBs7Ohy'),
(17, 'Benja Gonzalez', 'BenjaGonzalez@gmail.com', '$2y$10$EnBY5xwSPjYJ0ehq7io8WOUH/P1PWpah1LQJQv2jXXWkg8oETuwo2'),
(18, 'Registro 12', 'registro12@gmail.com', '$2y$10$ohkLLeoPVxJkWqT2/2PXCuWdqYNEFjJ6tE5qrfIwUvfusQQYbH2hq'),
(19, 'Registro 12', 'registro12@gmail.com', '$2y$10$ThlhqXb1YT3UYbNefBPomuc0I.FLd6GFAQOLm5pdwuLLGKoHlVf02'),
(20, 'Registro 12', 'registro12@gmail.com', '$2y$10$itpAB0sShfp6M7sBYPjYFuAmACBM3zkfPQ9Z/HlLqXeEXleFOE0qm'),
(21, 'Registro 13', 'registro13@gmail.com', '$2y$10$HIkrCfA.Lk5NGfa9Wfk6VOyXXQfwL6TQWdZwJgfZbTIXE3INorbGO'),
(22, 'registro14', 'registro14@gmail.com', '$2y$10$yFr6TR26u9FRx14D0LFOXuj/APBwWugzShysEEG4VTrGmZa9cF.ku'),
(23, 'benja', 'benjamincho2004@gmail.com', '$2y$10$ei99fxyFp5w5PYHvKKv4uO14pkB9skqLQdaLOYyh.FPAvJFfckVT2'),
(24, 'octavio sosa', 'otti@gmail.com', '$2y$10$tYC5QRGPMvGqBit7A6wz7uWd5kfx4csJqPY6XX5b/.tQwtzlYwcdS'),
(25, 'Registro Gonzalez', 'Nosequeponer@gmail.com', '$2y$10$Smyi2H2g92iUXlvUEm3sSeOklsm4r7MZYsJLpZINoH4pa78yls95S'),
(26, 'pruebamateo', 'pruebamateo@gmail.com', '$2y$10$QcsW6H/NOL3QO9dM75FA5OY.mIxbZY7s5MB76eNFf7iDI/qGoQ/bW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`n_cuenta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`id_transaccion`),
  ADD KEY `n_cuentaremitente` (`n_cuentaremitente`),
  ADD KEY `n_cuentadestino` (`n_cuentadestino`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `n_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `id_transaccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD CONSTRAINT `transaccion_ibfk_1` FOREIGN KEY (`n_cuentaremitente`) REFERENCES `cuenta` (`n_cuenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaccion_ibfk_2` FOREIGN KEY (`n_cuentadestino`) REFERENCES `cuenta` (`n_cuenta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
