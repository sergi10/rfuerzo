-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-10-2015 a las 17:48:48
-- Versión del servidor: 5.5.44-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.11

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mapas`
--
CREATE DATABASE IF NOT EXISTS `mapas` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `mapas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--
-- Creación: 06-10-2015 a las 14:47:27
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellidos` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mail` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `user` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pass` varchar(11) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nacimiento` datetime DEFAULT NULL,
  `centro_id` int(11) NOT NULL,
  `enlace_avatar` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `profesor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_alumno_centro_idx` (`centro_id`),
  KEY `fk_alumno_profesor1_idx` (`profesor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Truncar tablas antes de insertar `alumno`
--

TRUNCATE TABLE `alumno`;
--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nombre`, `apellidos`, `mail`, `user`, `pass`, `nacimiento`, `centro_id`, `enlace_avatar`, `profesor_id`) VALUES
(1, 'Alumno ', 'Prueba Apellido', 'prueba@example.com', 'alpruape', 'aodvhpasuvh', NULL, 1, '5613e3b89ac03.png', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro`
--
-- Creación: 06-10-2015 a las 14:47:26
--

DROP TABLE IF EXISTS `centro`;
CREATE TABLE IF NOT EXISTS `centro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Truncar tablas antes de insertar `centro`
--

TRUNCATE TABLE `centro`;
--
-- Volcado de datos para la tabla `centro`
--

INSERT INTO `centro` (`id`, `nombre`, `direccion`) VALUES
(1, 'IES SAN RAFAEL', 'Avd. Rafael Ridaura s/n Buñol 46360 Valencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mapa`
--
-- Creación: 06-10-2015 a las 14:47:27
--

DROP TABLE IF EXISTS `mapa`;
CREATE TABLE IF NOT EXISTS `mapa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enlace` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `profesor_id` int(11) NOT NULL,
  `titulo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `enlace_audio` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mapa_profesor_fk1_idx` (`profesor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=10 ;

--
-- Truncar tablas antes de insertar `mapa`
--

TRUNCATE TABLE `mapa`;
--
-- Volcado de datos para la tabla `mapa`
--

INSERT INTO `mapa` (`id`, `enlace`, `descripcion`, `profesor_id`, `titulo`, `enlace_audio`) VALUES
(1, '120px-550px-Africa_(orthographic_projection).png', 'Todos sabemos que los primeros seres humanos aparecieron en África hace 5 millones de años. Es por eso que utilizamos la imagen de este continente como enlace. Descubre con las actividades que te proponemos cómo conectar el aprendizaje de estos contenidos', 2, 'Africa', NULL),
(2, '120px-UEFA_orthographic_projection_Mapa_UEFA.png', 'Durante el Neolítico y La Edad de los Metales, el ser humanó llegó a Europa y otros lugares del mundo. De ahí que te propongamos como icono la imagen de este continente. La conexión entre estos contenidos y otros como el género lírico, los adjetivos calif', 2, 'Europa', NULL),
(3, 'AFC_orthographic_projection_Mapa_AFC.png', 'Algunas de las primeras civilizaciones fluviales como las de Mesopotamia, India o China; surgieron en el continente asiático. Por ello, te proponemos que accedas a través de la imagen de Asia a unas actividades que te permitirán repasar estos conceptos y ', 2, 'Asia', NULL),
(4, '120px-BK_Oceania_(orthographic_projection).png', 'Al contrario que Mesopotamia, que fue una de las primeras civilizaciones, Oceanía es uno de los lugares del mundo con la historia más reciente. Si pinchas en la imagen de este continente, comprobarás que podemos conocer un poquito más sobre él y a la vez ', 2, 'Oceania', NULL),
(5, '120px-Antarctica_(orthographic_projection).svg.png', 'Aparentemente, no existe ninguna relación entre El antiguo Egipto, la Antártida, los cuentos, el verbo y las palabras simples o derivadas. Pero como decíamos, solo en apariencia. Clica en la imagen que te proponemos y descubre cómo relacionar estos conten', 2, 'Antártida.', NULL),
(6, '120px-CONCACAF_orthographic_projection_Mapa_CONCACAF.png', 'La civilización griega se desarrolló en tierras muy lejanas a América del Norte, pero eso no significa que la primera no influyese en la segunda. Ni tampoco que ambas no nos puedan servir de excusa para repasar otros contenidos como la novela, los adverbi', 2, 'America del Norte', NULL),
(7, '120px-America_do_Sul_(orthographic_projection).jpg', 'La civilización romana también ha tenido un peso enorme para el posterior desarrollo del mundo occidental, incluida América del Sur. Durante este periodo se escribieron grandes tragedias, de eso no hay duda. Pero si clicas en el mapa, comprobarás que tamb', 2, 'America del Sur', NULL),
(8, '120px-Spain_(orthographic_projection).png', 'Ahora toca concentrarnos en los sucesos que tuvieron lugar en nuestra península durante la época que los romanos llegaron a ella. Además de Hispania y algunos accidentes geográficos; repasaremos en este mapa la comedia como subgénero teatral, las conjunci', 2, 'Peninsula Ibrica', NULL),
(9, '120px-Spain_(orthographic_projection).png', 'Como ya sabéis, los germanos pusieron fin al esplendor del imperio romano, y la distribución de nuestra península cambió igual que la de muchos otros lugares. Si clicas en la imagen que te proponemos, relacionaremos estos sucesos con la posibilidad de rep', 2, 'España', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--
-- Creación: 06-10-2015 a las 14:47:26
--

DROP TABLE IF EXISTS `profesor`;
CREATE TABLE IF NOT EXISTS `profesor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellidos` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mail` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `user` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pass` varchar(11) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nacimiento` datetime DEFAULT NULL,
  `centro_id` int(11) NOT NULL,
  `enlace_avatar` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prof_centro_idx` (`centro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Truncar tablas antes de insertar `profesor`
--

TRUNCATE TABLE `profesor`;
--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id`, `nombre`, `apellidos`, `mail`, `user`, `pass`, `nacimiento`, `centro_id`, `enlace_avatar`) VALUES
(2, 'Sandra ', 'Clemente Estada', 'emailejemplo@example.com', 'sanclest', 'sovnpaisnvp', NULL, 1, '5613776814d53.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado_tarea`
--
-- Creación: 06-10-2015 a las 14:47:27
--

DROP TABLE IF EXISTS `resultado_tarea`;
CREATE TABLE IF NOT EXISTS `resultado_tarea` (
  `alumno_id` int(11) NOT NULL,
  `tarea_id` int(11) NOT NULL,
  `nota` decimal(3,2) DEFAULT NULL,
  `activa` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`alumno_id`,`tarea_id`),
  KEY `fk_alumno_tarea_idx` (`tarea_id`),
  KEY `fk_alumno__alumno_idx` (`alumno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Truncar tablas antes de insertar `resultado_tarea`
--

TRUNCATE TABLE `resultado_tarea`;
--
-- Volcado de datos para la tabla `resultado_tarea`
--

INSERT INTO `resultado_tarea` (`alumno_id`, `tarea_id`, `nota`, `activa`) VALUES
(1, 1, 8.00, NULL),
(1, 2, 6.00, NULL),
(1, 4, 6.00, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--
-- Creación: 06-10-2015 a las 14:47:27
--

DROP TABLE IF EXISTS `tarea`;
CREATE TABLE IF NOT EXISTS `tarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mapa_id` int(11) NOT NULL,
  `enlace_audio` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `enlace_imagen` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tarea_mapa_fk1_idx` (`mapa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=47 ;

--
-- Truncar tablas antes de insertar `tarea`
--

TRUNCATE TABLE `tarea`;
--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id`, `nombre`, `descripcion`, `mapa_id`, `enlace_audio`, `enlace_imagen`) VALUES
(1, 'GEOGRAFÍA Y LENGUA. ', 'De la siguiente lista con nombres de ríos y golfos africanos, elige todos aquellos que sean palabras llanas y no agudas para completar el crucigrama. No debes utilizar la palabra golfo o río cada vez, solo los nombres propios: Golfo de Guinea, Golfo de Ga', 1, NULL, 'geografia_lengua_africa_acentuacion.htm'),
(2, 'LENGUA E HISTORIA.', ' Elige la forma correcta de dividir los siguientes sustantivos en sílabas, todos ellos relacionados con el Paleolítico. a. Pulgar oponible: que permite realizar trabajos manuales de gran minuciosidad. ¿Cómo se divide en sílabas OPONIBLE? b. Vida nómada: l', 1, NULL, 'lengua_historia_separacion_sílabas_paleolitico.htm'),
(3, 'LITERATURA Y LENGUA.', ' Completa los huecos de las siguientes definiciones sobre los géneros narrativos. ¡Recuerda!, todas las palabras que faltan son sustantivos:', 1, NULL, 'litearatura_lengua_generos_literarios_sustantivos.htm'),
(4, 'HISTORIA Y LITERATURA. ', 'Te presentamos un pequeño texto teatral en el que los personajes son los jefes de dos tribus humanas que vivieron en el Paleolítico. Une los textos de forma que el diálogo tenga sentido.', 1, NULL, 'historia_literatura_vidapaleolitico_teatro.htm'),
(5, 'LENGUA E HISTORIA.', ' Ordena las siguientes oraciones para que tengan sentido. Todas contienen algún adjetivo en sus diferentes grados y tienen que ver con la vida en el Neolítico y la Edad de los Metales.', 2, NULL, 'lengua_historia_adjetivos_neolitico1.htm'),
(6, 'LITERATURA Y GEOGRAFÍA. ', 'En todos los países europeos ha habido grandes poetas. Te proponemos una lista con los nombres de algunos de ellos que debes asociar a sus países de origen, que encontrarás en la otra columna. A continuación localiza estos países en un mapa y coloca sus n', 2, NULL, 'literatura_geografia_poetas_paiseseuropa.htm'),
(7, 'GEOGRAFÍA Y LENGUA. ', 'Te proponemos ahora una lista con otros países europeos. Recuerda las reglas de acentuación y decide si son agudas, llanas o esdrújulas.', 2, NULL, 'geografia_lengua_paiseseuropa_agudas_llanas_esdrujulas.htm'),
(8, 'HISTORIA Y LENGUA. ', 'Completa las siguientes afirmaciones sobre la Edad de los Metales con una de las palabras de entre las siguientes parejas. Recuerda que la tilde diacrítica sirve para diferenciarlas entre ellas: sé / se, sí / si, tú / tu, mí / mi, él / el, té / te.', 2, NULL, 'historia_lengua_edadmetales_tildediacritica.htm'),
(9, 'GEOGRAFÍA Y LENGUA. ', 'Elige cuál de las siguientes respuestas es la correcta para contestar a las preguntas que te formulamos sobre Asia. No solo debes prestar atención al contenido, sino también a los signos de puntuación: comas y puntos.', 3, NULL, 'geografia_lengua_signospuntuacion_asia.htm'),
(10, 'LENGUA, LITERATURA Y GEOGRAFÍA.', ' Lee el siguiente poema de Aazam Abidov, un poeta asiático. Debes unir los artículos y determinantes que te proponemos a los versos correspondientes para que estos tengan sentido. Por último deberás unir el nombre del poeta a su lugar de nacimiento. En gr', 3, NULL, 'lengua_lite_geo_articulos_poesia_asia.htm'),
(11, 'LENGUA E HISTORIA.', ' En el siguiente texto sobre las civilizaciones fluviales se han perdido las primeras letras de palabras muy importantes para su comprensión. Completa los huecos y, lo más importante, debes decidir si las letras son mayúsculas o minúsculas.', 3, NULL, 'lengua_hist_mayusculas_civilizacionesfluviales.htm'),
(12, 'LITERATURA E HISTORIA.', 'Completa el siguiente crucigrama con los nombres de las estrofas que se correspondan con las definiciones proporcionadas. A continuación, imagina que eres un habitante de cualquiera de las civilizaciones fluviales y vas a escribir un poema sobre el río qu', 3, NULL, 'lit_historia_estrofas_civilizacionesfluviales.htm'),
(13, 'HISTORIA Y LITERATURA. ', 'Lee el siguiente texto y decide si se trata de un mito, una leyenda o una epopeya.', 4, NULL, 'historia_lite_mesopotamia_mito.htm'),
(14, 'GEOGRAFÍA Y LENGUA.', ' Completa los huecos de siguiente texto sobre Oceanía para que tenga sentido con los pronombres y los sustantivos que te proponemos.', 4, NULL, 'lengua_geografia_siglasycronimos_oceania.htm'),
(15, 'LENGUA Y GEOGRAFÍA.', ' Une las siguientes siglas y acrónimos con su significado correspondiente. Después averigua cuál o cuáles de ellas entenderían también en Oceanía y en grupo buscad otras internacionales.', 4, NULL, 'lengua_geografia_siglasycronimos_oceania.htm'),
(16, 'LENGUA, LITERATURA, GEOGRAFÍA E HISTORIA 1', 'Ordena las siguientes oraciones para obtener afirmaciones verdaderas sobre todos los contenidos que hemos repasado en las actividades anteriores de este mapa.', 4, NULL, 'lyl_geh_repasotodaunidad1.htm'),
(17, 'LENGUA, LITERATURA, GEOGRAFÍA E HISTORIA 2', ' Ordena las siguientes oraciones para obtener afirmaciones verdaderas sobre todos los contenidos que hemos repasado en las actividades anteriores de este mapa.', 4, NULL, 'lyl_geh_repasotodaunidad2.htm'),
(18, 'LENGUA, LITERATURA, GEOGRAFÍA E HISTORIA 3.', ' Ordena las siguientes oraciones para obtener afirmaciones verdaderas sobre todos los contenidos que hemos repasado en las actividades anteriores de este mapa.', 4, NULL, 'lyl_geh_repasotodaunidad3.htm'),
(19, 'LENGUA, LITERATURA, GEOGRAFÍA E HISTORIA 4.', ' Ordena las siguientes oraciones para obtener afirmaciones verdaderas sobre todos los contenidos que hemos repasado en las actividades anteriores de este mapa.', 3, NULL, 'lyl_geh_repasotodaunidad4.htm'),
(20, 'GEOGRAFÍA Y LENGUA. ', 'Completa los huecos del siguiente texto sobre la Antártida. Todas las palabras que faltan son verbos. Te damos la primera letra para que te resulte más fácil adivinarlos, pero recuerda que debes conjugarlos en el tiempo adecuado.', 5, NULL, 'geo_leng_antartida_verbos.htm'),
(21, 'LITERATURA E HISTORIA.', ' Lee el siguiente cuento egipcio y a continuación elige la opción correcta a las preguntas relacionadas con este subgénero narrativo y con la vida en el antiguo Egipto.', 5, NULL, 'lit_hist_cuento_egipto.htm'),
(22, 'LENGUA E HISTORIA 1', ' Decide si las siguientes palabras son primitivas o derivadas y únelas con su definición. Todas tienen que ver con el antiguo Egipto y su civilización.', 5, NULL, 'leng_histo_palabrasprimitivasderivadas_egipto.htm'),
(23, 'LENGUA E HISTORIA 2', 'Decide si las siguientes palabras son primitivas o derivadas y únelas con su definición. Todas tienen que ver con el antiguo Egipto y su civilización.', 5, NULL, 'leng_histo_palabrasprimitivasderivadas_egipto1.htm'),
(24, 'HISTORIA Y LITERATURA', 'Completa el siguiente crucigrama con los nombres de los dioses egipcios que se correspondan con las definiciones proporcionadas. A continuación, en grupos o con ayuda de vuestras familias, buscad un cuento o leyenda sobre cada uno de ellos para presentarl', 5, NULL, 'lit_hist_cuento_egipto.htm'),
(25, 'HISTORIA Y LENGUA.', ' Recuerda que uno de los personajes históricos más importantes de la civilización griega fue Alejandro Magno. Repasa su vida a través del texto que te proporcionamos y completa los espacios en blanco. Todas las palabras que vas a usar son adverbios. ¿Recu', 6, NULL, 'histo_leng_alejandromagno_adverbios.htm'),
(26, 'LITERATURA Y GEOGRAFÍA. ', 'Como hemos estudiado, las novelas son en la actualidad las máximas representantes del género narrativo. Te proponemos una lista con autores norteamericanos y otra con sus novelas. En la primera parte del ejercicio debes asociar cada autor con su obra. La ', 6, NULL, 'lite_geo_novelas_americanorte.htm'),
(27, 'LENGUA Y GEOGRAFÍA.', ' Lee las siguientes afirmaciones sobre el continente americano. A continuación fíjate en las palabras destacadas y elige la opción que mejor explique por qué son derivadas o parasintéticas. Recuerda que una palabra es derivada cuando añadimos prefijos o s', 6, NULL, 'leng_geo_derivadasyparasinteticas_americanorte.htm'),
(28, 'LITERATURA, GEOGRAFÍA E HISTORIA 1', ' Ordena las siguientes oraciones para obtener afirmaciones verdaderas sobre algunos contenidos que has estudiado.', 6, NULL, 'lit_geo_hist_novela_americanorte_grecia.htm'),
(29, 'LITERATURA, GEOGRAFÍA E HISTORIA 2', 'LITERATURA, GEOGRAFÍA E HISTORIA. Ordena las siguientes oraciones para obtener afirmaciones verdaderas sobre algunos contenidos que has estudiado.', 6, NULL, 'lit_geo_hist_novela_americanorte_grecia1.htm'),
(30, 'LITERATURA, GEOGRAFÍA E HISTORIA 3', 'LITERATURA, GEOGRAFÍA E HISTORIA. Ordena las siguientes oraciones para obtener afirmaciones verdaderas sobre algunos contenidos que has estudiado.', 6, NULL, 'lit_geo_hist_novela_americanorte_grecia3.htm'),
(31, 'lLITERATURA, GEOGRAFÍA E HISTORIA 4', 'Ordena las siguientes oraciones para obtener afirmaciones verdaderas sobre algunos contenidos que has estudiado.', 6, NULL, 'lit_geo_hist_novela_americanorte_grecia4.htm'),
(32, 'HISTORIA Y LITERATURA.', ' Completa el siguiente crucigrama con los nombres de los dioses romanos que se correspondan con las definiciones proporcionadas. A continuación, en grupos o con ayuda de vuestras familias, escribid un texto teatral que esté protagonizado por dichos dioses', 7, NULL, 'hist_lite_diosesromanos_comedia.htm'),
(33, 'GEOGRAFÍA Y LENGUA.', ' Une las definiciones que te proponemos a la izquierda con las palabras de la derecha, las cuales pertenecen al campo semántico de los “gentilicios de América del Sur”. Recuerda: un campo semántico es un conjunto de palabras que tienen, al menos, un rasgo', 7, NULL, 'geo_leng_amesur_camposem.htm'),
(34, 'LITERATURA E HISTORIA.', ' Como ya sabéis los romanos heredaron de los griegos el gusto por el teatro, aunque implantaron algunas innovaciones en su arquitectura. Elige la opción correcta a las siguientes preguntas que te proponemos a continuación, sobre teatro como género literar', 7, NULL, 'lit_hist_ttoromano_ttotragedia.htm'),
(35, 'LENGUA E HISTORIA', 'Completa los huecos del siguiente texto sobre la historia de los romanos. Todas las palabras que faltan son preposiciones o de la familia léxica de Roma. Recuerda, llamamos familia léxica a todas aquellas palabras que comparten un mismo lexema.', 7, NULL, 'leng_hist_prepyfamlex_roma.htm'),
(36, 'HISTORIA Y LENGUA.', ' Completa los huecos de este texto sobre Hispania en la Antigüedad. Recuerda que todas las palabras que faltan son conjunciones.', 8, NULL, 'hist_lengua_hispania_conjunciones.htm'),
(37, 'LITERATURA E HISTORIA. ', 'Para realizar esta actividad, podéis contar con la ayuda de algún familiar o persona responsable; o bien hacerla en grupo o por parejas. Se trata de que busquéis información sobre los teatros que construyeron los romanos en la Península Ibérica, para sabe', 8, NULL, 'lit_histo_tto_romanoshispania.htm'),
(38, 'GEOGRAFÍA Y LENGUA. ', 'Te proponemos a continuación una serie de oraciones explicativas sobre algunos accidentes geográficos de la Península Ibérica. Todas tienen un hueco. Une las palabras polisémicas que te facilitamos en la columna contraria de manera que las oraciones tenga', 8, NULL, 'geo_leng_espfisica_polisemia.htm'),
(39, 'LENGUA, LITERATURA, GEOGRAFÍA E HISTORIA 1', ' Ordena las siguientes palabras para formar afirmaciones verdaderas sobre los contenidos estudiados en este mapa.', 8, NULL, 'todos_hispania_espfisica_comedias_monosemiapolisemia.htm'),
(40, 'LENGUA, LITERATURA, GEOGRAFÍA E HISTORIA 2', ' Ordena las siguientes palabras para formar afirmaciones verdaderas sobre los contenidos estudiados en este mapa.', 8, NULL, 'todos_hispania_espfisica_comedias_monosemiapolisemia1.htm'),
(41, 'LENGUA, LITERATURA, GEOGRAFÍA E HISTORIA 3', ' Ordena las siguientes palabras para formar afirmaciones verdaderas sobre los contenidos estudiados en este mapa.', 8, NULL, 'todos_hispania_espfisica_comedias_monosemiapolisemia2.htm'),
(42, 'LENGUA, LITERATURA, GEOGRAFÍA E HISTORIA 4', ' Ordena las siguientes palabras para formar afirmaciones verdaderas sobre los contenidos estudiados en este mapa.', 8, NULL, 'todos_hispania_espfisica_comedias_monosemiapolisemia3.htm'),
(43, 'LENGUA E HISTORIA.', ' Te proponemos una columna con sujetos y otra con predicados. Une ambas de manera que las oraciones resultantes sean verdaderas. Todas ellas tratan sobre la caída del imperio romano y la llegada de los pueblos germanos a nuestra península', 9, NULL, 'leng_histo_sujypred_finimperioromano.htm'),
(44, 'LITERATURA, LENGUA Y GEOGRAFÍA. ', 'Completa los huecos del siguiente texto teatral. Recuerda, todas las palabras que faltan son interjecciones.', 9, NULL, 'leng_lit_geo_interjec_tto_capitalesesp.htm'),
(45, 'GEOGRAFÍA, HISTORIA, LENGUA Y LITERATURA.', ' A continuación debes responder a una serie de preguntas sobre los contenidos estudiados en este mapa. Te damos varias opciones para que elijas la verdadera.', 9, NULL, 'lit_geo_dramaturgos_españapolítica.htm'),
(46, 'LITERATURA Y GEOGRAFÍA.', ' Completa el siguiente crucigrama con los nombres de los dramaturgos españoles que se correspondan con las definiciones proporcionadas. A continuación, en grupos o con ayuda de vuestras familias, colocad sus nombres en un mapa para relacionarlos con su lu', 9, NULL, 'lit_geo_dramaturgos_españapolítica.htm');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_alumno_centro` FOREIGN KEY (`centro_id`) REFERENCES `centro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `alumno_profesor_fk` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mapa`
--
ALTER TABLE `mapa`
  ADD CONSTRAINT `fk_mapa_profesor` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `fk_profesor_centro` FOREIGN KEY (`centro_id`) REFERENCES `centro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `resultado_tarea`
--
ALTER TABLE `resultado_tarea`
  ADD CONSTRAINT `fk_resultado_alumno` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_resultado_tarea` FOREIGN KEY (`tarea_id`) REFERENCES `tarea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `fk_tarea_mapa` FOREIGN KEY (`mapa_id`) REFERENCES `mapa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
