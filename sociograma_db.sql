-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2021 a las 01:12:34
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sociograma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `grupo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `grupo`) VALUES
(3, 'ADELAIDA SANTIAGO DORANTES ', 'A'),
(4, 'ADRIANA TENCHIL HERRERO ', 'A'),
(15, 'VICTOR MANUEL HUITZIL FLORES ', 'A'),
(16, 'ISRAEL LIBRADO HERNANDEZ ', 'A'),
(17, 'LETICIA PEREZ AGUILAR ', 'A'),
(18, 'MARIA JOSE CABRERA ROJAS  ', 'A'),
(19, 'EMILIO ALEJANDRO CRUZ  RASCON   ', 'A'),
(20, 'LUIS ANGEL  MACHORRO  SANTIAGO  ', 'A'),
(21, 'RAFAEL DIAZ FERNANDEZ ', 'A'),
(22, 'MARIA FERNANDA  MORALES APAN  ', 'A'),
(23, 'NAZARET DIAZ REYES ', 'A'),
(24, 'ZURIET MIGUEL RODRIGUEZ TENDILLA ', 'A'),
(25, 'MELISA RIVERA CUELLAR ', 'A'),
(26, 'JAHAZIEL CORTES  CAPORAL  ', 'A'),
(27, 'RODRIGO CARRILLO GODINEZ ', 'A'),
(28, 'LUIS GUSTAVO CONTRERAS NABOR', 'A'),
(29, 'ISAAC DOMINGUEZ REYES ', 'A'),
(30, 'FRANCISCO ALVAREZ  DIAZ ', 'A'),
(31, 'SEBASTIAN ANTONIO TRIFUNDIO HERNANDEZ ', 'A'),
(32, 'KEVIN AARON FLORES HERNANDEZ ', 'A'),
(33, 'ALDAIR CLEMENTE SANCHEZ MORALES ', 'A'),
(34, 'ALEKS BADILLO RAMIREZ ', 'A'),
(35, 'ITZEL ANDREA  VILLANUEVA ORTEGA', 'A'),
(36, 'VICTOR IVAN GUTIERREZ ZEPEDA ', 'A'),
(37, 'DIANA LAURA CAMERO  RENDON ', 'A'),
(38, 'JOSE LUIS FLORES AVILA ', 'A'),
(39, 'MARIA FERNANDA SALAZAR TECAYEHUATL ', 'A'),
(42, 'RICARDO ROLDAN  RIOS   ', 'A'),
(43, 'DULCE  YANETH LOPEZ HERNANDEZ ', 'A'),
(44, 'BRENDA RUEDA BAEZ ', 'A'),
(45, 'NAYELI VANESSA  ORTA YONCA ', 'A'),
(46, 'JUAN CARLOS CERVANTES  ORTIZ ', 'A'),
(47, 'FABIOLA BERNABE SEDAS ', 'A'),
(48, 'JAIME JHAIR SORIANO LOPEZ ', 'A'),
(49, 'JESUS EMMANUEL JIMENEZ NOLASCO   ', 'A'),
(75, 'ALEXIS ROMERO TENORIO ', 'B'),
(76, 'JESUS EDUARDO HERNANDEZ JUAREZ ', 'B'),
(77, 'DIANA CORDOVA AGUILA DIANA', 'B'),
(78, 'IMELDA TOXQUI FABIAN ', 'B'),
(79, 'SANDRA GONZALEZ PEREZ ', 'B'),
(80, 'ALEJANDRO GARCIA GALLARDO ', 'B'),
(81, 'GUILLERMO JAHAZIEL ABSALON  SCHIAFFINI ', 'B'),
(82, 'CECIAH ISMARI TRINIDAD FLORES ', 'B'),
(83, 'LUIS ENRIQUE AGUILAR CAMACHO ', 'B'),
(84, 'JESUS ARTURO HERNANDEZ RAMOS ', 'B'),
(85, 'PEDRO DE LA CRUZ LUCAS ', 'B'),
(86, 'JUAN RODOLFO MARQUEZ  LOPEZ ', 'B'),
(87, 'DAVID HERNANDEZ PEREZ ', 'B'),
(88, 'MAURO MENDEZ MERINO  ', 'B'),
(89, 'KARLA PAOLA LOPEZ  MEZA ', 'B'),
(90, 'NOE OZIEL PEREZ LOPEZ ', 'B'),
(91, 'JAQUELINE PALETA JAIME', 'B'),
(92, 'EFRAIN GRANADOS RODRÍGUEZ', 'B'),
(93, 'ROMÁN ANTONIO ISIDOR GUINTO', 'B'),
(94, 'CINTHIA MARGARITA LUNA LOPEZ ', 'B'),
(95, 'BRANDON BELTRAN HERNANDEZ ', 'B'),
(96, 'MARIA FERNANDA OVILLA  TEOBA  ', 'B'),
(97, 'ALDO ROMANO ROJAS ', 'B'),
(98, 'ALISON ARANZA TELLEZ CALDERON ', 'B'),
(99, 'GUADALUPE ITZEL PRADO CUAUTLE', 'B'),
(100, 'MIGUEL ALEJANDRO AGUILAR AGUILERA', 'C'),
(101, 'ADAD NAHUM CASTILLO CASTILLO', 'C'),
(102, 'DANIEL CASTILLO SANCHEZ', 'C'),
(103, 'JOVANA CHICO FLORES', 'C'),
(104, 'WILFRIDO CID GALLARDO', 'C'),
(105, 'JESUS ABRAHAN DE YTA MATUS', 'C'),
(106, 'EVERALDO GARCIA LOPEZ', 'C'),
(107, 'DANIEL GONZALEZ FLORES', 'C'),
(108, 'ISRAEL GONZALEZ HERNANDEZ', 'C'),
(109, 'LUIS SEBASTIAN GONZALEZ RAMIREZ', 'C'),
(110, 'ATLAI GONZALEZ RUEDA', 'C'),
(111, 'KELLY JOY HERNANDEZ CASTUERA', 'C'),
(112, 'MARIA DEL CIELO HERNANDEZ HERNANDEZ', 'C'),
(113, 'EMILIA ABIGAIL HERNANDEZ MONTOYA', 'C'),
(114, 'MARIEL ARIADNA LEON FLORES', 'C'),
(115, 'ANGELICA LOPEZ GARCIA', 'C'),
(116, 'IVAN LOPEZ MORALES', 'C'),
(117, 'JESUS DAVID LUGO CABRERA', 'C'),
(118, 'JOSE EDUARDO MARAVILLA XICOHTENCATL', 'C'),
(119, 'GIOVANNI MARTINEZ DE SANTIAGO', 'C'),
(120, 'JOSE LUIS MEDELLIN LOPEZ', 'C'),
(121, 'DANIEL MENESES NAVARRO', 'C'),
(122, 'SERGIO MERINO CORTEZ', 'C'),
(123, 'ZURIEL MONTAÑO SANCHEZ', 'C'),
(124, 'LUIS FERNANDO MUÑOZ CISNEROS', 'C'),
(125, 'LUIS NORBERTO CASTILLO PINEDA', 'D'),
(126, 'MARIA DEL ROCIO FALCON ARCIGA', 'D'),
(127, 'CONCEPCION FLORES MIRANDA', 'D'),
(128, 'ERICK ALEJANDRO FLORES ROMERO', 'D'),
(129, 'LUIS ANGEL GARCIA PINEDA', 'D'),
(130, 'ANDREA GUTIERREZ ROSALES', 'D'),
(131, 'JUAN FRANCISCO HERNANDEZ SEBASTIAN ', 'D'),
(132, 'ALLISON HERRERA ORTIZ', 'D'),
(133, 'VICTOR HUGO ISLAS LIMON', 'D'),
(134, 'JOSEPH ROGELIO MALDONADO MUÑOZ', 'D'),
(135, 'JOSE ARTURO MORENO AGUILAR', 'D'),
(136, 'DIEGO MARTIN NOLASCO GALLEGOS', 'D'),
(137, 'KEVIN OCHOA XOPA', 'D'),
(138, 'FERNANDO ORTIZ MARIN', 'D'),
(139, 'EDGAR YOVAN PEREZ ALVARADO', 'D'),
(140, 'JESUS EMMANUEL BAZAN VELASCO', 'D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `pregunta` text NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`, `tipo`) VALUES
(1, '¿A quién elegirías para realizar un proyecto de programación?', 'Efectivas'),
(2, '¿A quién descartarías para que te diera asesorías de programación?', 'Efectivas'),
(3, '¿Si se descompone tu computadora a quién recurrirías para que te ayude a repararla? ', 'Efectivas'),
(4, '¿A cuál de tus compañeros evitarías si tu equipo de cómputo tuviera alguna falla?', 'Efectivas'),
(5, 'Si vas a presentar un proyecto a tu cliente, ¿a quién elegirías para que lo exponga?', 'Efectivas'),
(6, 'Si un cliente llega  a tu empresa y pide que le expliquen su método de trabajo, ¿a quién no le pedirías que hablara con él?', 'Efectivas'),
(7, '¿A cuál de tus compañeros elegirías para documentar un trabajo?', 'Efectivas'),
(8, '¿A quién evitarías preguntarle cuando tienes dudas de ortografía o redacción?', 'Efectivas'),
(9, '¿A quién elegirías para que te apoye en un trabajo como freelance?', 'Efectivas'),
(10, '¿A quién evitarías recomendar en un puesto de trabajo?', 'Efectivas'),
(11, 'Si vas a un congreso fuera de tu estado,  ¿Con quién te gustaría compartir habitación?', 'Afectivas'),
(12, 'Si vas a un evento fuera de tu ciudad,  ¿Con quién evitarías compartir habitación?', 'Afectivas'),
(13, '¿A quién le pedirías que te ayude a organizar una fiesta? ', 'Afectivas'),
(14, '¿Quién sería la persona menos adecuada para organizar un evento?', 'Afectivas'),
(15, '¿A quién le compartirías un secreto? ', 'Afectivas'),
(16, '¿A quién evitarías contarle algo importante para ti?', 'Afectivas'),
(17, '¿A quién le contraías un secreto pero con la seguridad de que se enteraría todo el salón?', 'Afectivas'),
(18, '¿A quién recurres cuando necesitas un consejo?', 'Afectivas'),
(19, 'Si tuvieras un conflicto legal, ¿A quién le pedirías que te ayude a resolver tu caso?', 'Afectivas'),
(20, 'Si tuvieras un problema con la policía, ¿a quién NO le pedirías ayuda?', 'Afectivas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados_a`
--

CREATE TABLE `resultados_a` (
  `id` int(11) NOT NULL,
  `alumno` int(11) NOT NULL,
  `pregunta` int(11) NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resultados_a`
--
ALTER TABLE `resultados_a`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `resultados_a`
--
ALTER TABLE `resultados_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
