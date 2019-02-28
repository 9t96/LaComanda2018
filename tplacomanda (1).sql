-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2019 a las 00:47:47
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tplacomanda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosmesas`
--

CREATE TABLE `datosmesas` (
  `nro_mesa` int(11) NOT NULL,
  `cant_usos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datosmesas`
--

INSERT INTO `datosmesas` (`nro_mesa`, `cant_usos`) VALUES
(1, 12),
(2, 18),
(3, 8),
(4, 10),
(5, 10),
(6, 3),
(7, 4),
(8, 4),
(9, 3),
(10, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `mozoScore` int(2) NOT NULL,
  `mesaScore` int(2) NOT NULL,
  `restoScore` int(2) NOT NULL,
  `comidaScore` int(2) NOT NULL,
  `opinion` varchar(200) NOT NULL,
  `cod_user` int(3) NOT NULL,
  `nro_mesa` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`mozoScore`, `mesaScore`, `restoScore`, `comidaScore`, `opinion`, `cod_user`, `nro_mesa`) VALUES
(4, 6, 5, 6, 'genial buenisimo hermoso', 6, 2),
(8, 6, 9, 10, 'me encanto la tematica recomendable', 46, 10),
(10, 8, 5, 1, 'justo aliquam quis turpis', 50, 2),
(2, 7, 1, 8, 'cubilia curae nulla', 54, 1),
(1, 2, 2, 10, 'mattis egestas metus aenean', 51, 5),
(7, 7, 7, 9, 'pellentesque ultrices mattis odio', 51, 3),
(6, 6, 3, 10, 'vestibulum ante ipsum primis', 50, 3),
(5, 9, 10, 6, 'eu mi nulla ac', 55, 5),
(10, 10, 9, 3, 'mi in porttitor', 53, 4),
(9, 3, 10, 2, 'nec sem duis aliquam', 50, 9),
(1, 8, 6, 7, 'pede libero quis orci', 50, 1),
(3, 6, 9, 4, 'in ante vestibulum', 55, 6),
(3, 2, 2, 6, 'sollicitudin vitae consectetuer eget', 51, 8),
(8, 10, 10, 9, 'diam id ornare imperdiet', 53, 5),
(2, 5, 1, 6, 'felis eu sapien cursus', 53, 5),
(7, 1, 3, 2, 'sagittis sapien cum sociis', 53, 4),
(5, 3, 2, 3, 'habitasse platea dictumst maecenas ut', 55, 4),
(7, 1, 6, 5, 'justo lacinia eget', 54, 10),
(4, 8, 1, 9, 'eget nunc donec quis', 54, 1),
(10, 9, 3, 4, 'ante vivamus tortor', 54, 7),
(2, 9, 1, 9, 'ligula suspendisse ornare consequat', 55, 1),
(7, 8, 10, 7, 'ac nulla sed vel', 51, 4),
(6, 7, 8, 1, 'proin interdum mauris', 50, 5),
(2, 5, 10, 1, 'sapien dignissim vestibulum vestibulum ante', 52, 10),
(3, 9, 9, 2, 'ultrices mattis odio donec vitae', 51, 2),
(1, 10, 1, 8, 'leo pellentesque ultrices mattis', 55, 10),
(3, 6, 5, 3, 'ut erat id mauris vulputate', 53, 5),
(4, 8, 9, 7, 'libero quis orci', 51, 2),
(6, 10, 1, 2, 'ridiculus mus vivamus', 55, 3),
(4, 4, 8, 10, 'ac lobortis vel', 53, 5),
(10, 1, 6, 4, 'faucibus orci luctus', 51, 4),
(10, 3, 9, 1, 'libero nullam sit amet turpis', 55, 1),
(6, 2, 5, 8, 'auctor sed tristique', 54, 6),
(7, 1, 9, 6, 'purus eu magna vulputate luctus', 55, 3),
(5, 10, 2, 5, 'habitasse platea dictumst', 53, 6),
(10, 3, 1, 8, 'orci eget orci', 51, 7),
(3, 7, 10, 7, 'odio justo sollicitudin ut suscipit', 53, 4),
(2, 7, 8, 3, 'non pretium quis', 54, 1),
(5, 8, 10, 9, 'blandit lacinia erat vestibulum', 51, 9),
(7, 1, 9, 6, 'augue aliquam erat volutpat', 55, 2),
(5, 7, 7, 8, 'molestie nibh in', 51, 5),
(7, 2, 1, 2, 'sed justo pellentesque', 55, 6),
(4, 1, 3, 5, 'morbi odio odio elementum', 52, 4),
(2, 8, 8, 7, 'mauris vulputate elementum nullam varius', 51, 8),
(5, 7, 10, 4, 'sapien cursus vestibulum proin', 52, 1),
(5, 7, 10, 5, 'potenti cras in purus eu', 54, 5),
(1, 7, 7, 8, 'vivamus vestibulum sagittis sapien', 52, 5),
(6, 7, 10, 9, 'morbi vel lectus in quam', 54, 6),
(4, 8, 2, 6, 'vestibulum proin eu mi nulla', 55, 1),
(2, 2, 5, 3, 'consequat lectus in', 54, 10),
(5, 10, 6, 8, 'elit sodales scelerisque mauris', 53, 3),
(3, 7, 1, 9, 'dolor vel est donec odio', 50, 5),
(5, 1, 8, 6, 'purus phasellus in felis donec', 54, 7),
(10, 2, 7, 1, 'pede venenatis non sodales sed', 51, 1),
(3, 4, 4, 2, 'dolor sit amet consectetuer adipiscing', 51, 10),
(8, 1, 3, 9, 'tellus semper interdum mauris', 51, 9),
(3, 8, 5, 8, 'orci vehicula condimentum curabitur in', 53, 3),
(10, 8, 4, 4, 'in hac habitasse platea dictumst', 54, 4),
(5, 8, 1, 1, 'congue vivamus metus', 53, 4),
(6, 7, 2, 9, 'consequat lectus in', 53, 10),
(7, 4, 3, 10, 'proin leo odio porttitor id', 54, 9),
(7, 9, 6, 10, 'ornare imperdiet sapien urna', 53, 7),
(7, 6, 7, 3, 'faucibus orci luctus et ultrices', 50, 6),
(2, 8, 8, 9, 'orci luctus et', 51, 1),
(8, 4, 4, 8, 'et commodo vulputate justo', 55, 10),
(5, 3, 10, 2, 'lobortis convallis tortor', 51, 6),
(7, 10, 5, 8, 'ultrices mattis odio', 50, 10),
(5, 3, 9, 6, 'phasellus id sapien in', 55, 1),
(4, 8, 7, 2, 'venenatis tristique fusce congue diam', 54, 3),
(7, 5, 1, 8, 'sit amet nunc', 55, 2),
(3, 4, 8, 8, 'eu orci mauris', 53, 2),
(8, 1, 10, 5, 'natoque penatibus et', 52, 10),
(3, 6, 7, 3, 'vestibulum sit amet cursus id', 55, 1),
(10, 5, 1, 4, 'nam congue risus semper', 52, 3),
(1, 3, 1, 6, 'sociis natoque penatibus et magnis', 53, 7),
(6, 6, 1, 5, 'augue vestibulum rutrum', 54, 9),
(9, 2, 9, 2, 'amet consectetuer adipiscing', 51, 10),
(3, 8, 4, 6, 'massa donec dapibus', 55, 2),
(5, 8, 6, 4, 'libero rutrum ac lobortis vel', 54, 5),
(1, 4, 7, 5, 'in hac habitasse platea', 53, 1),
(5, 7, 5, 8, 'sodales sed tincidunt', 55, 3),
(5, 5, 8, 8, 'donec posuere metus vitae', 53, 5),
(10, 9, 9, 7, 'nec euismod scelerisque', 54, 2),
(7, 7, 2, 8, 'vel dapibus at', 52, 10),
(1, 5, 1, 5, 'ullamcorper augue a', 51, 1),
(3, 7, 5, 8, 'dictumst etiam faucibus cursus urna', 51, 5),
(10, 4, 4, 2, 'felis ut at dolor', 50, 4),
(8, 8, 3, 5, 'eros viverra eget', 55, 4),
(9, 10, 9, 1, 'tortor duis mattis', 52, 10),
(3, 3, 7, 10, 'in felis eu', 51, 9),
(5, 5, 2, 8, 'porttitor pede justo eu massa', 52, 1),
(9, 3, 3, 9, 'pede libero quis', 50, 2),
(7, 4, 7, 10, 'leo rhoncus sed vestibulum', 54, 8),
(4, 6, 2, 6, 'habitasse platea dictumst', 55, 10),
(3, 2, 4, 8, 'orci mauris lacinia sapien quis', 54, 6),
(1, 9, 9, 5, 'cubilia curae donec', 52, 6),
(8, 7, 10, 3, 'luctus tincidunt nulla mollis molestie', 53, 2),
(8, 7, 10, 6, 'et ultrices posuere', 54, 5),
(10, 1, 9, 10, 'donec dapibus duis at velit', 55, 10),
(7, 1, 7, 3, 'vestibulum eget vulputate', 53, 8),
(7, 3, 2, 2, 'vitae quam suspendisse potenti nullam', 51, 7),
(3, 4, 9, 7, 'vitae ipsum aliquam', 55, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestasfuturas`
--

CREATE TABLE `encuestasfuturas` (
  `cod_user` int(3) NOT NULL,
  `mesa` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encuestasfuturas`
--

INSERT INTO `encuestasfuturas` (`cod_user`, `mesa`) VALUES
(6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesascerradas`
--

CREATE TABLE `mesascerradas` (
  `nro_mesa` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `importe_total` int(11) NOT NULL,
  `mozo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mesascerradas`
--

INSERT INTO `mesascerradas` (`nro_mesa`, `fecha`, `importe_total`, `mozo`) VALUES
(2, '2019-02-14 20:19:50', 790, 13),
(1, '2019-02-14 20:19:50', 750, 8),
(5, '2019-02-14 20:19:50', 1284, 10),
(2, '2019-02-14 20:19:50', 2389, 11),
(6, '2019-02-14 20:19:50', 1231, 11),
(3, '2019-02-14 20:19:50', 422, 8),
(9, '2019-02-14 20:19:50', 261, 10),
(10, '2019-02-14 20:19:50', 871, 10),
(1, '2019-02-14 20:19:50', 2742, 8),
(4, '2019-02-14 20:19:50', 1436, 13),
(9, '2019-02-14 20:19:50', 2215, 10),
(5, '2019-02-14 20:19:50', 1732, 8),
(5, '2019-02-14 20:19:50', 3436, 10),
(4, '2019-02-14 20:19:50', 1385, 8),
(8, '2019-02-14 20:19:50', 2991, 11),
(4, '2019-02-14 20:19:50', 2963, 12),
(1, '2019-02-14 20:19:50', 1112, 9),
(6, '2019-02-14 20:19:50', 3048, 8),
(4, '2019-02-14 20:19:50', 3423, 12),
(7, '2019-02-14 20:19:50', 3207, 9),
(6, '2019-02-14 20:19:50', 2551, 8),
(4, '2019-02-14 20:19:50', 2176, 10),
(5, '2019-02-14 20:19:50', 1918, 10),
(6, '2019-02-14 20:19:50', 2466, 11),
(8, '2019-02-14 20:19:50', 454, 8),
(1, '2019-02-14 20:19:50', 415, 12),
(8, '2019-02-14 20:19:50', 885, 8),
(1, '2019-02-14 20:19:50', 2264, 10),
(4, '2019-02-14 20:19:50', 1752, 11),
(5, '2019-02-14 20:19:50', 1304, 8),
(7, '2019-02-14 20:19:50', 2876, 8),
(6, '2019-02-14 20:19:51', 3387, 12),
(2, '2019-02-14 20:19:51', 2400, 12),
(10, '2019-02-14 20:19:51', 1102, 11),
(2, '2019-02-14 20:19:51', 180, 10),
(10, '2019-02-14 20:19:51', 2463, 8),
(3, '2019-02-14 20:19:51', 2404, 8),
(4, '2019-02-14 20:19:51', 1779, 10),
(3, '2019-02-14 20:19:51', 1794, 11),
(2, '2019-02-14 20:19:51', 2712, 12),
(10, '2019-02-14 20:19:51', 1044, 12),
(2, '2019-02-14 20:19:51', 565, 10),
(8, '2019-02-14 20:19:51', 3477, 13),
(9, '2019-02-14 20:19:51', 1229, 11),
(3, '2019-02-14 20:19:51', 2788, 9),
(3, '2019-02-14 20:19:51', 168, 9),
(3, '2019-02-14 20:19:51', 2013, 9),
(4, '2019-02-14 20:19:51', 1678, 13),
(10, '2019-02-14 20:19:51', 3118, 13),
(10, '2019-02-14 20:19:51', 2080, 12),
(6, '2019-02-14 20:19:51', 1671, 12),
(3, '2019-02-14 20:19:51', 1936, 11),
(8, '2019-02-14 20:19:51', 2528, 13),
(7, '2019-02-14 20:19:51', 2755, 9),
(7, '2019-02-14 20:19:51', 1098, 12),
(1, '2019-02-14 20:19:51', 1811, 9),
(7, '2019-02-14 20:19:51', 2680, 11),
(6, '2019-02-14 20:19:51', 1537, 10),
(1, '2019-02-14 20:19:51', 1785, 12),
(5, '2019-02-14 20:19:51', 3051, 9),
(3, '2019-02-14 20:19:51', 1594, 8),
(1, '2019-02-14 20:19:51', 3214, 10),
(2, '2019-02-14 20:19:51', 2716, 13),
(1, '2019-02-14 20:19:51', 2391, 10),
(2, '2019-02-14 20:19:51', 2519, 10),
(3, '2019-02-14 20:19:51', 3200, 11),
(3, '2019-02-14 20:19:51', 2186, 8),
(1, '2019-02-14 20:19:51', 2986, 10),
(7, '2019-02-14 20:19:51', 834, 13),
(5, '2019-02-14 20:19:51', 229, 11),
(10, '2019-02-14 20:19:51', 425, 11),
(4, '2019-02-14 20:19:51', 1046, 10),
(9, '2019-02-14 20:19:51', 237, 10),
(10, '2019-02-14 20:19:51', 329, 8),
(6, '2019-02-14 20:19:51', 2998, 9),
(2, '2019-02-14 20:19:51', 1398, 9),
(9, '2019-02-14 20:19:51', 2134, 13),
(8, '2019-02-14 20:19:51', 1384, 13),
(9, '2019-02-14 20:19:51', 3351, 11),
(8, '2019-02-14 20:19:51', 586, 10),
(5, '2019-02-14 20:19:51', 2526, 12),
(2, '2019-02-14 20:19:51', 3393, 12),
(10, '2019-02-14 20:19:51', 2272, 13),
(2, '2019-02-14 20:19:51', 232, 10),
(9, '2019-02-14 20:19:51', 128, 12),
(8, '2019-02-14 20:19:51', 1702, 13),
(1, '2019-02-14 20:19:51', 2194, 12),
(5, '2019-02-14 20:19:51', 1652, 13),
(2, '2019-02-14 20:19:51', 731, 8),
(2, '2019-02-14 20:19:51', 1784, 13),
(8, '2019-02-14 20:19:51', 1445, 10),
(7, '2019-02-14 20:19:51', 2307, 8),
(7, '2019-02-14 20:19:51', 2822, 9),
(3, '2019-02-14 20:19:51', 397, 13),
(9, '2019-02-14 20:19:51', 627, 9),
(7, '2019-02-14 20:19:51', 2822, 10),
(7, '2019-02-14 20:19:51', 2567, 13),
(10, '2019-02-14 20:19:51', 1024, 13),
(2, '2019-02-14 20:19:51', 499, 8),
(8, '2019-02-14 20:19:51', 1750, 12),
(5, '2019-02-23 19:51:58', 880, 8),
(4, '2019-02-23 19:52:02', 900, 8),
(6, '2019-02-23 19:52:12', 1400, 8),
(3, '2019-02-23 19:52:14', 350, 8),
(7, '2019-02-23 19:52:34', 620, 8),
(4, '2018-11-09 15:54:24', 1319, 23),
(5, '2018-11-11 08:31:37', 1137, 24),
(5, '2018-10-19 07:30:32', 596, 23),
(6, '2018-12-27 14:52:48', 632, 24),
(5, '2018-12-20 23:14:38', 1922, 23),
(2, '2018-12-12 11:52:59', 1637, 24),
(5, '2018-11-28 17:11:54', 1741, 24),
(8, '2018-11-10 23:32:37', 863, 24),
(4, '2018-12-21 07:46:42', 1929, 23),
(3, '2018-10-01 15:07:53', 1168, 23),
(6, '2018-09-24 01:52:31', 1348, 24),
(4, '2018-10-25 23:04:03', 797, 24),
(7, '2018-09-24 10:31:42', 657, 23),
(3, '2018-11-22 11:12:26', 1290, 24),
(8, '2018-12-12 14:03:03', 768, 24),
(6, '2019-01-21 07:52:15', 1068, 23),
(1, '2018-12-09 05:53:08', 709, 23),
(2, '2019-01-06 12:00:48', 924, 23),
(1, '2018-11-15 14:16:51', 1324, 23),
(2, '2018-12-23 17:26:30', 605, 23),
(3, '2019-01-06 13:16:58', 1677, 24),
(10, '2018-11-03 00:33:40', 1711, 24),
(5, '2018-12-27 08:59:06', 1717, 23),
(7, '2019-01-13 03:37:39', 1338, 24),
(1, '2019-01-12 03:03:26', 1939, 23),
(6, '2019-01-23 15:53:24', 1202, 24),
(9, '2018-12-26 02:59:46', 1907, 24),
(10, '2018-11-18 11:35:51', 744, 24),
(8, '2018-10-19 01:29:38', 631, 24),
(8, '2018-10-08 04:58:47', 1534, 24),
(4, '2018-12-12 17:11:12', 1786, 24),
(3, '2018-11-13 06:13:36', 1341, 24),
(9, '2019-01-08 20:44:27', 1202, 24),
(5, '2018-11-04 23:37:43', 833, 23),
(5, '2018-11-09 13:11:14', 1182, 24),
(7, '2019-01-22 17:51:22', 1544, 24),
(9, '2018-12-02 02:28:01', 536, 24),
(4, '2019-01-12 05:28:27', 376, 23),
(2, '2018-11-11 15:27:36', 1121, 23),
(1, '2019-01-09 23:14:51', 1684, 24),
(9, '2018-11-14 06:52:33', 742, 24),
(6, '2019-01-17 21:27:04', 1557, 24),
(5, '2018-12-06 19:55:10', 912, 23),
(1, '2018-09-25 02:15:58', 1669, 24),
(7, '2018-10-30 07:53:30', 1023, 23),
(5, '2018-12-11 11:47:10', 1358, 23),
(6, '2018-12-05 19:44:07', 1199, 23),
(4, '2018-12-26 02:00:10', 1167, 23),
(3, '2018-11-25 18:48:15', 1448, 24),
(10, '2018-09-30 06:32:24', 371, 24),
(8, '2018-12-08 00:49:29', 1829, 24),
(5, '2019-01-19 17:26:13', 1459, 24),
(5, '2018-12-23 14:08:52', 1611, 24),
(9, '2018-09-24 06:48:42', 823, 24),
(3, '2018-11-14 00:58:30', 376, 24),
(8, '2018-11-07 16:20:32', 1015, 23),
(7, '2018-11-18 04:45:42', 1850, 24),
(5, '2018-10-19 10:50:20', 474, 24),
(6, '2018-12-07 22:05:04', 629, 23),
(1, '2019-01-03 00:09:42', 940, 23),
(7, '2018-11-12 00:39:59', 1330, 23),
(7, '2018-10-26 04:09:35', 1692, 23),
(1, '2018-11-09 05:05:52', 1822, 24),
(9, '2018-10-24 02:13:36', 353, 23),
(1, '2018-10-03 11:57:03', 1302, 24),
(8, '2018-12-23 08:32:26', 1949, 23),
(3, '2018-12-26 11:23:35', 1359, 23),
(10, '2018-09-30 21:33:11', 930, 23),
(1, '2018-11-28 19:38:53', 1798, 23),
(8, '2018-10-27 15:30:02', 437, 24),
(8, '2018-10-31 01:18:50', 711, 24),
(5, '2019-01-12 17:54:16', 753, 23),
(5, '2018-12-11 19:44:53', 1614, 24),
(4, '2018-12-12 14:18:03', 748, 24),
(5, '2019-01-13 10:36:29', 1958, 23),
(9, '2018-11-25 07:59:27', 913, 23),
(7, '2018-10-10 07:13:54', 832, 23),
(5, '2018-11-30 09:52:50', 936, 23),
(5, '2018-11-16 07:12:42', 892, 23),
(8, '2018-11-16 09:35:02', 1516, 23),
(3, '2018-11-01 00:48:14', 973, 24),
(10, '2018-11-30 22:30:49', 1592, 23),
(6, '2018-10-14 00:19:12', 1912, 23),
(5, '2018-12-02 15:00:30', 1333, 24),
(7, '2019-01-20 10:41:06', 394, 24),
(7, '2018-11-03 11:44:53', 1847, 23),
(10, '2018-11-10 09:32:27', 1940, 24),
(7, '2019-01-19 21:16:22', 1906, 24),
(4, '2018-11-22 21:20:46', 759, 24),
(9, '2018-10-26 02:33:45', 1092, 24),
(2, '2018-10-10 20:45:36', 942, 23),
(1, '2018-11-09 07:44:10', 1151, 24),
(1, '2018-12-30 14:27:14', 1367, 23),
(7, '2018-12-27 04:37:57', 1893, 23),
(2, '2018-12-05 04:48:42', 502, 24),
(8, '2019-01-20 00:31:00', 934, 24),
(3, '2018-12-21 09:20:31', 1358, 23),
(4, '2018-10-21 12:25:49', 1632, 23),
(9, '2018-11-10 13:28:02', 1052, 23),
(5, '2019-01-15 11:07:24', 1676, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesaslive`
--

CREATE TABLE `mesaslive` (
  `nro_mesa` int(2) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mesaslive`
--

INSERT INTO `mesaslive` (`nro_mesa`, `estado`) VALUES
(1, 4),
(2, 1),
(3, 1),
(4, 4),
(5, 1),
(6, 1),
(7, 4),
(8, 4),
(9, 4),
(10, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidosenvivo`
--

CREATE TABLE `pedidosenvivo` (
  `nro_mesa` int(11) NOT NULL,
  `mozo` int(11) NOT NULL,
  `cod_plato` int(11) NOT NULL,
  `hora_pedido` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  `id` varchar(10) NOT NULL,
  `cliente` varchar(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `comensales` int(11) NOT NULL,
  `total` int(6) NOT NULL,
  `demora` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidosenvivo`
--

INSERT INTO `pedidosenvivo` (`nro_mesa`, `mozo`, `cod_plato`, `hora_pedido`, `estado`, `id`, `cliente`, `cantidad`, `comensales`, `total`, `demora`) VALUES
(2, 8, 202, '2019-02-24 20:26:17', 0, '3uyh9', 'mariela', 2, 2, 730, 0),
(2, 8, 304, '2019-02-24 20:26:17', 3, '3uyh9', 'mariela', 2, 2, 730, 20),
(2, 8, 403, '2019-02-24 20:26:17', 0, '3uyh9', 'mariela', 1, 2, 730, 0),
(6, 8, 302, '2019-02-27 16:15:26', 0, 'h4e2z', 'penco', 4, 2, 600, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `cod_plato` int(11) NOT NULL,
  `cant_ventas` int(11) NOT NULL,
  `cant_timeout` int(11) NOT NULL,
  `veces_cancelado` int(11) NOT NULL,
  `precio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`cod_plato`, `cant_ventas`, `cant_timeout`, `veces_cancelado`, `precio`) VALUES
(100, 92, 0, 0, 100),
(101, 53, 0, 0, 110),
(102, 13, 0, 0, 110),
(103, 15, 0, 0, 120),
(300, 4, 0, 0, 600),
(301, 6, 0, 0, 900),
(302, 20, 0, 1, 150),
(303, 6, 0, 0, 150),
(304, 38, 0, 0, 150),
(305, 13, 0, 0, 70),
(400, 4, 0, 0, 60),
(401, 8, 0, 0, 50),
(402, 24, 0, 0, 60),
(403, 25, 0, 0, 70),
(404, 9, 0, 0, 70),
(200, 28, 0, 0, 150),
(201, 8, 0, 0, 130),
(202, 34, 0, 0, 50),
(203, 47, 0, 0, 70),
(204, 14, 0, 1, 130),
(205, 7, 0, 1, 130);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientoempleados`
--

CREATE TABLE `seguimientoempleados` (
  `hora_ingreso` datetime NOT NULL,
  `hora_salida` datetime NOT NULL,
  `cant_operaciones` int(11) NOT NULL,
  `cod_emp` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguimientoempleados`
--

INSERT INTO `seguimientoempleados` (`hora_ingreso`, `hora_salida`, `cant_operaciones`, `cod_emp`) VALUES
('2018-12-07 16:07:56', '2018-12-07 16:08:15', 1, 8),
('2018-12-07 16:10:02', '2018-12-07 16:13:38', 1, 13),
('2018-12-08 18:32:40', '2018-12-08 20:14:48', 1, 8),
('2018-12-08 20:14:51', '2018-12-08 20:14:59', 1, 12),
('2018-12-08 20:30:51', '2018-12-08 20:31:18', 1, 13),
('2018-12-08 20:31:20', '2018-12-08 20:39:20', 3, 8),
('2018-12-08 20:39:22', '2018-12-08 20:39:36', 1, 10),
('2018-12-08 20:39:38', '2018-12-08 20:42:19', 1, 8),
('2018-12-09 20:49:23', '2018-12-09 20:51:24', 1, 11),
('2018-12-11 12:14:24', '2018-12-11 12:14:37', 1, 11),
('2019-01-17 19:21:45', '2019-01-17 19:22:10', 1, 13),
('2019-01-17 19:22:12', '2019-01-17 19:22:51', 1, 8),
('2019-01-31 16:38:36', '2019-01-31 16:38:45', 1, 13),
('2019-01-31 16:38:52', '2019-01-31 16:39:04', 1, 8),
('2019-02-11 16:04:22', '2019-02-11 16:07:54', 5, 13),
('2019-02-11 16:07:59', '2019-02-11 16:08:48', 4, 8),
('2019-02-14 16:24:41', '2019-02-14 16:24:51', 1, 13),
('2019-02-14 16:24:53', '2019-02-14 16:25:00', 1, 8),
('2019-02-15 16:46:56', '2019-02-15 16:47:17', 1, 12),
('2019-02-15 16:47:53', '2019-02-15 17:01:06', 1, 10),
('2019-02-23 16:36:08', '2019-02-23 16:46:50', 0, 12),
('2019-02-23 16:46:55', '2019-02-23 16:47:12', 0, 8),
('2019-02-23 16:47:14', '2019-02-23 17:01:22', 0, 13),
('2019-02-23 17:01:24', '2019-02-23 17:32:47', 0, 13),
('2019-02-23 17:37:42', '2019-02-23 18:22:06', 0, 13),
('2019-02-23 19:51:27', '2019-02-23 19:51:46', 0, 8),
('2019-02-23 20:01:21', '2019-02-23 20:01:51', 0, 8),
('2019-02-23 20:24:56', '2019-02-23 20:25:44', 0, 8),
('2019-02-24 19:29:23', '2019-02-24 19:30:17', 0, 13),
('2019-02-24 19:30:19', '2019-02-24 19:31:50', 0, 8),
('2019-02-24 19:39:32', '2019-02-24 20:17:03', 0, 10),
('2019-02-24 20:25:46', '2019-02-24 20:26:20', 0, 8),
('2019-02-25 00:02:50', '2019-02-25 00:03:00', 0, 11),
('2019-02-25 00:17:59', '2019-02-25 19:54:34', 0, 12),
('2019-02-27 16:15:11', '2019-02-27 16:15:30', 0, 8),
('2019-02-27 16:15:33', '2019-02-27 16:18:58', 0, 11),
('2019-02-27 16:19:01', '2019-02-27 16:29:05', 1, 11),
('2019-02-27 16:50:00', '2019-02-27 16:52:03', 0, 8),
('2019-02-27 17:09:27', '2019-02-27 17:09:43', 0, 8),
('2019-02-27 17:09:44', '2019-02-27 17:10:31', 0, 12),
('2019-02-27 17:11:44', '2019-02-27 17:20:11', 0, 8),
('2019-02-27 19:30:06', '2019-02-27 19:32:20', 1, 8),
('2019-02-27 19:32:31', '2019-02-27 19:32:34', 0, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `contraseña` varchar(25) NOT NULL,
  `tipo_usuario` int(2) NOT NULL,
  `estado` int(2) NOT NULL DEFAULT '1',
  `cod_emp` int(20) NOT NULL,
  `rol` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `apellido`, `usuario`, `contraseña`, `tipo_usuario`, `estado`, `cod_emp`, `rol`) VALUES
('claudio', 'manzanares', 'admin', 'admin', 3, 1, 5, 10),
('juan', 'ramirez', 'user', 'user', 1, 1, 6, 9),
('martin', 'jimenez', 'empleado', 'empleado', 2, 1, 7, 5),
('Rogelio', 'umbanda', 'mozo01', '123456', 2, 1, 8, 4),
('ever', 'maidana', 'evermaidana', '123456', 1, 3, 9, 9),
('ivan ', 'peloso', 'ivop', '123456', 2, 1, 10, 6),
('maru', 'botana', 'marub', '123456', 2, 1, 11, 7),
('tortita', 'god', 'tgod', '123456', 2, 1, 12, 8),
('lama', 'lteria', 'malte', '123456', 2, 1, 13, 5),
('Enrique', 'Martin', '', 'holamundo', 1, 3, 14, 4),
('martin', 'perez', 'cocinero1010', 'holamundo', 2, 1, 19, 7),
('martin', 'perez', 'cocinero666', 'holamundo', 2, 1, 27, 7),
('martin', 'perez', 'cocinerokpomafia', 'holamundo', 2, 1, 32, 7),
('martin', 'perez', 'mseesiosi', 'holamundo', 2, 1, 35, 7),
('dfghdfg', 'hdfghdfgh', 'miroperonopiens', '123456', 2, 1, 42, 5),
('gjhgj', 'ghjghj', 'lanana', '123456', 2, 1, 43, 5),
('dsgsd', 'fgsdfgsdfg', 'elnieri', '123456', 1, 1, 45, 0),
('mariano', 'pugliese', 'marian1010', '123456', 1, 1, 46, 0),
('emilio ', 'disi', 'emi5050', '123456', 1, 1, 47, 0),
('julio', 'mendez', 'elduenio', '123456', 2, 1, 48, 10),
('emanuel', 'gigliotti', 'elpuma', '123456', 2, 1, 49, 5),
('martin', 'perez', 'tincho2020', '123456', 1, 1, 50, 0),
('julieta', 'mendez', 'julim4534', '123456', 1, 1, 51, 0),
('martina', 'dann', 'martudan', '123456', 1, 1, 52, 0),
('pedro manuel', 'masa', 'pedritogenio', '123456', 1, 1, 53, 0),
('don miguel', 'de san martin', 'libertador', '123456', 1, 1, 54, 0),
('martin', 'palermo', 'elpescador', '123456', 1, 1, 55, 0),
('patricio ', 'pena', 'pp434', '123456', 1, 1, 56, 0),
('eladio', 'minini', 'eladiomini', '123456', 1, 1, 57, 0),
('mulata', 'la ninia', 'laninia', '123456', 1, 1, 58, 0),
('elprimo', 'ishere', 'elprimillo', '123456', 1, 1, 59, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encuestasfuturas`
--
ALTER TABLE `encuestasfuturas`
  ADD PRIMARY KEY (`cod_user`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_emp`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_emp` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
