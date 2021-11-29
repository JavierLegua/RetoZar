-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-11-2021 a las 11:04:59
-- Versión del servidor: 8.0.27-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `TeamMaker`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ALUMNO`
--

CREATE TABLE `ALUMNO` (
  `USUARIO_DNI` varchar(11) NOT NULL,
  `id_curso` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ALUMNO`
--

INSERT INTO `ALUMNO` (`USUARIO_DNI`, `id_curso`) VALUES
('12369858W', 'IFC303'),
('21746379V', 'IFC303'),
('77777777W', 'IFC303'),
('73108801Q', 'IFC304');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CATEGORIA`
--

CREATE TABLE `CATEGORIA` (
  `idCategoria` int NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Color` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `CATEGORIA`
--

INSERT INTO `CATEGORIA` (`idCategoria`, `Nombre`, `Color`) VALUES
(1, 'Cientifico', 'Azul'),
(2, 'Lider', 'Rojo'),
(3, 'Creativo', 'Amarillo'),
(4, 'Mediador', 'Verde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CENTRO`
--

CREATE TABLE `CENTRO` (
  `idCentro` int NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Direccion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `CENTRO`
--

INSERT INTO `CENTRO` (`idCentro`, `Nombre`, `Direccion`) VALUES
(1, 'CPIFP bajo aragon', 'calle 1'),
(2, 'CPIFP los enlaces', 'calle 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CURSO`
--

CREATE TABLE `CURSO` (
  `idCurso` varchar(10) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `CENTRO_idCentro` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `CURSO`
--

INSERT INTO `CURSO` (`idCurso`, `Nombre`, `CENTRO_idCentro`) VALUES
('DAM302', 'DAM', 2),
('IFC303', 'DWEB', 1),
('IFC304', 'DAW', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EQUIPO`
--

CREATE TABLE `EQUIPO` (
  `idEquipo` varchar(10) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `ALUMNO_USUARIO_DNI` varchar(11) NOT NULL,
  `CURSO_idCurso` varchar(10) NOT NULL,
  `CURSO_CENTRO_idCentro` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pertenece`
--

CREATE TABLE `pertenece` (
  `PROFESOR_USUARIO_DNI` varchar(11) NOT NULL,
  `CURSO_idCurso` varchar(10) NOT NULL,
  `CURSO_CENTRO_idCentro` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PREGUNTA`
--

CREATE TABLE `PREGUNTA` (
  `idPregunta` int NOT NULL,
  `Enunciado` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Definicion` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Categoria` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `PREGUNTA`
--

INSERT INTO `PREGUNTA` (`idPregunta`, `Enunciado`, `Definicion`, `Categoria`) VALUES
(1, 'En un buen día… ¿Eres una persona precisa?', 'Eres una persona concisa, clara, exacta y rigurosamente ajustada a la realidad.', 1),
(2, 'En un buen día… ¿Eres una persona sistemática?', 'Eres una persona que realiza las tareas ordenadame siguiendo un sistema o un método.', 1),
(3, 'En un buen día… ¿Eres una persona curiosa o preguntona?', 'Te prima la tendencia a la investigación y exploración de cuestiones de interés.', 1),
(4, 'En un buen día… ¿Eres una persona analítica?', 'Te gusta llegar al fondo de las cosas, quieres saber qué es lo que mantiene al mundo funcionando.', 1),
(5, 'En un buen día… ¿Eres una persona sensata?', 'Consideras que tienes buen juicio, prudencia y madurez en tus actos y decisiones.', 1),
(6, 'En un buen día... ¿Eres una persona perseverante?', 'Te sueles mantener constante en un proyecto ya comenzado, una actitud o una opinión, aún cuando las circunstancias sean adversas.', 1),
(7, 'En un buen día… ¿Eres una persona metódica?', 'Eres una persona disciplinada en el cumplimiento de unos hábitos concretos. Tus rutinas son previsibles ya que eres una persona muy ordenada en tus costumbres y muy constante en las mismas.', 1),
(8, 'En un buen día… ¿Eres una persona controlada?', 'Persona controlada: Que tiene control sobre sus propios impulsos.', 1),
(9, 'En un buen día… ¿Eres una persona disciplinada?', 'Persona disciplinada: es aquella persona ordenada con sus hábitos y que trata de involucrarse y tener un compromiso con lo que se decide que va a hacer.', 1),
(10, 'En un buen día… ¿Eres una persona estable?', 'Persona estable: es la que es capaz de mantenerse estable o equilibrado y que no muestra fácilmente las emociones negativas.', 1),
(11, 'En un mal día… ¿Eres una persona aburrida?', 'No es entretenido, eres monótono y predecible.', 1),
(12, 'En un mal día… ¿Eres una persona mezquina?', 'Persona mezquina: Es aquella que tiene actitud de una persona ruin o hipócrita que comete acciones que pueden perjudicar a los demás sin hacerse responsable de sus actos.', 1),
(13, 'En un mal día… ¿Eres una persona quisquillosa?', 'Que se ofende fácilmente por cosas insignificantes a las que da mayor valor o importancia de la que merecen.', 1),
(14, 'En un mal día… ¿Eres una persona inamovible?', 'Te cuesta cambiar las decisiones ya tomadas.', 1),
(15, 'En un mal día… ¿Eres una persona aislada?', 'Persona que se separa y no se comunica con fluidez con el resto.', 1),
(16, 'En un mal día… ¿Eres una persona fría?', 'Persona que no muestra sus sentimientos y es distante con los demás.', 1),
(17, 'En un mal día… ¿Eres una persona suspicaz?', 'Tiendes a pensar mal de los demás, creyendo que tienen una segunda intención en todo lo que hacen.', 1),
(18, 'En un mal día… ¿Eres una persona crítica?', 'Analizas la realidad, cuestionas las cosas, no te quedas con lo primero que te cuentan.', 1),
(19, 'En un mal día… ¿Eres una persona poco diplomática?', 'No tienes capacidad de razonar con una persona que no esté de acuerdo contigo.', 1),
(20, 'En un mal día… ¿Eres una persona susceptible?', 'Que se ofende o toma a mal las cosas con facilidad.', 1),
(21, 'En un buen día… ¿Eres una persona fiable?', 'Se puede confiar en ti.', 1),
(22, 'En un buen día… ¿Eres una persona considerada?', 'Tienes en cuenta los sentimientos/opiniones de los demás.', 4),
(23, 'En un buen día… ¿Eres una persona que comparte?', 'Compartes tanto cosas materiales como personales, tus sentimientos, cómo te encuentras...', 4),
(24, 'En un buen día… ¿Eres una persona leal?', 'Que eres incapaz de traicionar o engañar a las personas que te importan.', 4),
(25, 'En un buen día… ¿Eres una persona atenta?', 'Pones atención en lo que haces.', 4),
(26, 'En un buen día… ¿Eres una persona paciente?', 'Eres tolerante ante actitudes que podrían molestarte.', 4),
(27, 'En un buen día… ¿Eres una persona comprensiva?', 'Una persona que entiende las circustancias de los demás.', 4),
(28, 'En un buen día… ¿Eres una persona tranquila?', 'Eres una persona calmada, que no pierde los nervios con facilidad.', 4),
(29, 'En un buen día… ¿Eres una persona considerada?', 'Tienes en cuenta los sentimientos/opiniones de los demás.', 4),
(30, 'En un buen día… ¿Eres una persona discreta?', 'Es una persona que no busca llamar la atención.', 4),
(31, 'En un mal día… ¿Eres una persona obstinada (cabezona)?', 'Te mantienes firme en una u opinión, generalmente poco acertada, sin tener en cuenta otra posiblidad.', 4),
(32, 'En un mal día… ¿Eres una persona precavida?', 'Eres una persona prudente, no tomas riesgos innecesarios.', 4),
(33, 'En un mal día… ¿Eres una persona indecisa?', 'Te cuesta mucho tomar decisiones.', 4),
(34, 'En un mal día… ¿Eres una persona evasiva?', 'Evitas afrontar las dificultades.', 4),
(35, 'En un mal día… ¿Eres una persona no conciliadora?', 'No ayudas a calmar las tensiones o a poner de acuerdo a la gente.', 4),
(36, 'En un mal día… ¿Eres una persona introvertida?', 'Te cuesta expresar tus sentimientos o estado de ánimo.', 4),
(37, 'En un mal día… ¿Eres una persona reacia?', 'Muestras resistencia a hacer las cosas.', 4),
(38, 'En un mal día… ¿Eres una persona desalentadora?', 'Quitas las ganas de hacer cosas a los demás.', 4),
(39, 'En un mal día… ¿Eres una persona sensible?', 'Tiendes a emocionarte o a dejarte llevar por tus sentimientos.', 4),
(40, 'En un mal día… ¿Eres una persona callada?', 'No hablas mucho, dejas que los demás opinen por ti', 4),
(41, 'En un buen día… ¿Eres una persona emprendedora?', 'Identificas una oportunidad y organizas los recursos necesarios para cogerla.', 2),
(42, 'En un buen día… ¿Eres una persona objetiva?', 'Eres capaz de analizar las cosas sin dejar que nada te influya.', 2),
(43, 'En un buen día… ¿Eres una persona decidida?', 'Actuas con decisión y seguridad.', 2),
(44, 'En un buen día… ¿Eres una persona exigente?', 'Eres una persona rigurosa, estricta tiendes a hacer las cosas hasta el final.', 2),
(45, 'En un buen día… ¿Eres una persona tenaz?', 'Pones mucho empeño y no desiste en algo que quiere hacer o conseguir.', 2),
(46, 'En un buen día… ¿Eres una persona orientada a objetivos?', 'Tienes  largo lo que quieres hacer, fijas prioridades y vas trabajando para conseguir tus objetivos.', 2),
(47, 'En un buen día… ¿Eres una persona energética?', 'Haces las cosas con vitalidad y de forma animosa .', 2),
(48, 'En un buen día… ¿Eres una persona organizada?', 'Planificas lo que vas a hacer, cumples los horario, te gusta tener las cosas ordenadas...', 2),
(49, 'En un buen día… ¿Eres una persona resolutiva?', 'Solucionas los asuntos o problemas con eficacia, rapidez, determinación... con pocas dudas.', 2),
(50, 'En un buen día… ¿Eres una persona competitiva?', 'Eres capaz de hacer casi todo para ganar, no te rindes con nada y te fastidia que otra persona gane.', 2),
(51, 'En un mal día… ¿Eres una persona dominante?', 'Quieres controlar la situación y a la gente, no dejas que otros expresen sus opiniones.', 2),
(52, 'En un mal dia… ¿Eres una persona agresiva?', 'Te comportas con violencia física o verbal.', 2),
(53, 'En un mal dia… ¿Eres una persona intolerante?', 'No te gustan y te fastidian las opiniones distintas a las tuyas.', 2),
(54, 'En un mal día… ¿Eres una persona soberbia?', 'Te valoras por encima de los demas: te cuesta pedir perdón y te gusta que te reconozcan las cosas que has hecho.', 2),
(55, 'En un mal día… ¿Eres una persona impaciente?', 'Te falta paciencia. Te cuesta realizar acciones minuciosas o complejas que requieren de calma.', 2),
(56, 'En un mal día… ¿Eres una persona desconsiderada?', 'No tienes en consideración a los demás, ni sus opiniones ni sus sentimientos, y te da igual.', 2),
(57, 'En un mal día… ¿Eres una persona grosera?', 'Eres desagradable sin necesidad, ofendes a la gente con tus comentarios.', 2),
(58, 'En un mal día… ¿Eres una persona sin escrúpulos?', 'No tienes ningún problema en hacer lo que haga falta para conseguir tus objetivos, aunque dañe o perjudique a otros.', 2),
(59, 'En un mal día… ¿Eres una persona prepotente?', 'Te crees mejor que el resto de la gente.', 2),
(60, 'En un mal día… ¿Eres una persona controladora?', 'Le dictas a la gente como tiene que actuar y lo que tiene que hacer para tenerlo todo controlado.', 2),
(61, 'En un buen día… ¿Eres una persona convincente?', 'La gente cree, confía en lo que dices, puedes convencerles y animarles a hacer cosas.', 3),
(62, 'En un buen día… ¿Eres una persona extrovertida?', 'Eres abierto, no te cuesta hablar con la gente y expresar tus sentimientos.', 3),
(63, 'En un buen día… ¿Eres una persona entusiasta?', 'Muestra energía y entusiasmo en todo lo que haces, animas a la gente a que se sienta igual.', 3),
(64, 'En un buen día… ¿Eres una persona optimista?', 'Tiendes a ver el lado bueno de las cosas. Sueles juzgar las cosas en su aspecto más positivo o más favorable.', 3),
(65, 'En un buen día… ¿Eres una persona sociable?', 'Te gusta relacionarse con otras personas y además tienes facilidad.', 3),
(66, 'En un buen día… ¿Eres una persona dinámica a objetivos?', 'Cuando tienes que hacer una tarea te marcas las metas que debes conseguir y vas a por ellas.', 3),
(67, 'En un buen día… ¿Eres una persona comunicativa?', 'Tienes propensión a comunicarte de una forma fácil y accesible al trato de los demás.', 3),
(68, 'En un buen día… ¿Eres una persona creativa?', 'Eres capaz de producir ideas o comportamientos que son originales; es decir nuevos, sorprendentes o inusuales y que además supongan una contribución positiva a la vida.', 3),
(69, 'En un buen día… ¿Eres una persona espontánea?', 'Tienes la habilidad de ser natural y sincero en la forma de pensar y actuar, sin fingir algo que no eres y libre de apariencias.', 3),
(70, 'En un buen día… ¿Eres una persona independiente?', 'Tienes capacidad de decidir por ti mismo, eres autónomo, puedes hacer cosas por ti mismo.', 3),
(71, 'En un mal día… ¿Eres una persona impulsiva?', 'Haces las cosas sin pensar, sin apenas reflexionar en las consecuencias.', 3),
(72, 'En un mal día… ¿Eres una persona sobreexcitada?', 'Vas a más revoluciones de las normales, nervioso, no paras.', 3),
(73, 'En un mal día… ¿Eres una persona agitada?', 'Eres nervioso y transmites esa sensación a los demás.', 3),
(74, 'En un mal día… ¿Eres una persona exagerada?', 'No te ajustas a la realidad de los hechos, tiendes a contarlos como si fueran más de lo que han sido en realidad.', 3),
(75, 'En un mal día… ¿Eres una persona indiscreta?', 'Tiendes a contar secretos o intimidades de la gente.', 3),
(76, 'En un mal día… ¿Eres una persona extravagante?', 'No te ajustas a las normas, haces cosas que a los demás les pueden parecer extrañas.', 3),
(77, 'En un mal día… ¿Eres una persona llamativa, ruidosa?', 'Das mucho la nota, te haces de notar pero no para bien.', 3),
(78, 'En un mal día… ¿Eres una persona superficial?', 'Te impotan mucho las apariencias.', 3),
(79, 'En un mal día… ¿Eres una persona descuidada?', 'Tienes falta de interés, atención o cuidado.', 3),
(80, 'En un mal día… ¿Eres una persona desvergonzada?', 'Tiendes a se una persona atrevida, insolente, descarada o irrespetuosa.', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PROFESOR`
--

CREATE TABLE `PROFESOR` (
  `USUARIO_DNI` varchar(11) NOT NULL,
  `Rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `PROFESOR`
--

INSERT INTO `PROFESOR` (`USUARIO_DNI`, `Rol`) VALUES
('11111111Q', 'Admin'),
('12345678Q', 'Profesor'),
('73104964Q', 'Admin'),
('73107701T', 'SuperAdmin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responde`
--

CREATE TABLE `responde` (
  `PREGUNTA_idPregunta` int NOT NULL,
  `ALUMNO_USUARIO_DNI` varchar(11) NOT NULL,
  `RESPUESTA_Valor_Respuesta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `responde`
--

INSERT INTO `responde` (`PREGUNTA_idPregunta`, `ALUMNO_USUARIO_DNI`, `RESPUESTA_Valor_Respuesta`) VALUES
(1, '21746379V', 'VERDADERO'),
(2, '21746379V', 'FALSO'),
(3, '21746379V', 'VERDADERO'),
(4, '21746379V', 'VERDADERO'),
(5, '21746379V', 'VERDADERO'),
(6, '21746379V', 'FALSO'),
(7, '21746379V', 'FALSO'),
(8, '21746379V', 'FALSO'),
(9, '21746379V', 'VERDADERO'),
(10, '21746379V', 'FALSO'),
(11, '21746379V', 'VERDADERO'),
(12, '21746379V', 'VERDADERO'),
(13, '21746379V', 'FALSO'),
(14, '21746379V', 'FALSO'),
(15, '21746379V', 'FALSO'),
(16, '21746379V', 'FALSO'),
(17, '21746379V', 'FALSO'),
(18, '21746379V', 'VERDADERO'),
(19, '21746379V', 'FALSO'),
(20, '21746379V', 'FALSO'),
(21, '21746379V', 'FALSO'),
(22, '21746379V', 'VERDADERO'),
(23, '21746379V', 'VERDADERO'),
(24, '21746379V', 'FALSO'),
(25, '21746379V', 'VERDADERO'),
(26, '21746379V', 'FALSO'),
(27, '21746379V', 'FALSO'),
(28, '21746379V', 'FALSO'),
(29, '21746379V', 'VERDADERO'),
(30, '21746379V', 'FALSO'),
(31, '21746379V', 'VERDADERO'),
(32, '21746379V', 'VERDADERO'),
(33, '21746379V', 'VERDADERO'),
(34, '21746379V', 'FALSO'),
(35, '21746379V', 'FALSO'),
(36, '21746379V', 'VERDADERO'),
(37, '21746379V', 'VERDADERO'),
(38, '21746379V', 'FALSO'),
(39, '21746379V', 'FALSO'),
(40, '21746379V', 'FALSO'),
(41, '21746379V', 'VERDADERO'),
(42, '21746379V', 'FALSO'),
(43, '21746379V', 'VERDADERO'),
(44, '21746379V', 'VERDADERO'),
(45, '21746379V', 'VERDADERO'),
(46, '21746379V', 'FALSO'),
(47, '21746379V', 'FALSO'),
(48, '21746379V', 'VERDADERO'),
(49, '21746379V', 'VERDADERO'),
(50, '21746379V', 'FALSO'),
(51, '21746379V', 'VERDADERO'),
(52, '21746379V', 'VERDADERO'),
(53, '21746379V', 'FALSO'),
(54, '21746379V', 'VERDADERO'),
(55, '21746379V', 'VERDADERO'),
(56, '21746379V', 'VERDADERO'),
(57, '21746379V', 'VERDADERO'),
(58, '21746379V', 'VERDADERO'),
(59, '21746379V', 'VERDADERO'),
(60, '21746379V', 'FALSO'),
(61, '21746379V', 'VERDADERO'),
(62, '21746379V', 'FALSO'),
(63, '21746379V', 'FALSO'),
(64, '21746379V', 'FALSO'),
(65, '21746379V', 'VERDADERO'),
(66, '21746379V', 'VERDADERO'),
(67, '21746379V', 'FALSO'),
(68, '21746379V', 'FALSO'),
(69, '21746379V', 'VERDADERO'),
(70, '21746379V', 'VERDADERO'),
(71, '21746379V', 'FALSO'),
(72, '21746379V', 'FALSO'),
(73, '21746379V', 'VERDADERO'),
(74, '21746379V', 'FALSO'),
(75, '21746379V', 'VERDADERO'),
(76, '21746379V', 'VERDADERO'),
(77, '21746379V', 'VERDADERO'),
(78, '21746379V', 'FALSO'),
(79, '21746379V', 'VERDADERO'),
(80, '21746379V', 'VERDADERO'),
(2, '77777777W', 'VERDADERO'),
(9, '77777777W', 'VERDADERO'),
(11, '77777777W', 'VERDADERO'),
(24, '77777777W', 'FALSO'),
(26, '77777777W', 'FALSO'),
(33, '77777777W', 'VERDADERO'),
(35, '77777777W', 'FALSO'),
(40, '77777777W', 'FALSO'),
(51, '77777777W', 'FALSO'),
(57, '77777777W', 'VERDADERO'),
(61, '77777777W', 'VERDADERO'),
(68, '77777777W', 'VERDADERO'),
(76, '77777777W', 'VERDADERO'),
(80, '77777777W', 'VERDADERO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RESPUESTA`
--

CREATE TABLE `RESPUESTA` (
  `Valor_Respuesta` varchar(20) NOT NULL,
  `Peso` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `RESPUESTA`
--

INSERT INTO `RESPUESTA` (`Valor_Respuesta`, `Peso`) VALUES
('FALSO', '0'),
('VERDADERO', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIO`
--

CREATE TABLE `USUARIO` (
  `DNI` varchar(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Clave` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `USUARIO`
--

INSERT INTO `USUARIO` (`DNI`, `Nombre`, `Clave`) VALUES
('11111111Q', 'Jose manuel', '11111111Q'),
('12345678Q', 'profesor', '12345678Q'),
('12369858W', 'jordi', '12369858W'),
('21746379V', 'Gil Pablo', '21746379V'),
('73104964Q', 'Angel', '73104964Q'),
('73107701T', 'Javier', '73107701T'),
('73108801Q', 'Gil ', '73108801Q'),
('77777777W', 'javier', '77777777W');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ALUMNO`
--
ALTER TABLE `ALUMNO`
  ADD PRIMARY KEY (`USUARIO_DNI`),
  ADD KEY `fk_curso` (`id_curso`);

--
-- Indices de la tabla `CATEGORIA`
--
ALTER TABLE `CATEGORIA`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `CENTRO`
--
ALTER TABLE `CENTRO`
  ADD PRIMARY KEY (`idCentro`);

--
-- Indices de la tabla `CURSO`
--
ALTER TABLE `CURSO`
  ADD PRIMARY KEY (`idCurso`,`CENTRO_idCentro`),
  ADD KEY `fk_CURSO_CENTRO1` (`CENTRO_idCentro`);

--
-- Indices de la tabla `EQUIPO`
--
ALTER TABLE `EQUIPO`
  ADD PRIMARY KEY (`idEquipo`),
  ADD KEY `fk_EQUIPO_ALUMNO1` (`ALUMNO_USUARIO_DNI`),
  ADD KEY `fk_EQUIPO_CURSO1` (`CURSO_idCurso`,`CURSO_CENTRO_idCentro`);

--
-- Indices de la tabla `pertenece`
--
ALTER TABLE `pertenece`
  ADD PRIMARY KEY (`PROFESOR_USUARIO_DNI`,`CURSO_idCurso`,`CURSO_CENTRO_idCentro`),
  ADD KEY `fk_pertenece_CURSO1` (`CURSO_idCurso`,`CURSO_CENTRO_idCentro`);

--
-- Indices de la tabla `PREGUNTA`
--
ALTER TABLE `PREGUNTA`
  ADD PRIMARY KEY (`idPregunta`),
  ADD KEY `PREGUNTA` (`Categoria`);

--
-- Indices de la tabla `PROFESOR`
--
ALTER TABLE `PROFESOR`
  ADD PRIMARY KEY (`USUARIO_DNI`);

--
-- Indices de la tabla `responde`
--
ALTER TABLE `responde`
  ADD PRIMARY KEY (`PREGUNTA_idPregunta`,`ALUMNO_USUARIO_DNI`,`RESPUESTA_Valor_Respuesta`) USING BTREE,
  ADD KEY `fk_responde_ALUMNO1` (`ALUMNO_USUARIO_DNI`),
  ADD KEY `fk_responde_RESPUESTA1` (`RESPUESTA_Valor_Respuesta`);

--
-- Indices de la tabla `RESPUESTA`
--
ALTER TABLE `RESPUESTA`
  ADD PRIMARY KEY (`Valor_Respuesta`);

--
-- Indices de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD PRIMARY KEY (`DNI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `CATEGORIA`
--
ALTER TABLE `CATEGORIA`
  MODIFY `idCategoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ALUMNO`
--
ALTER TABLE `ALUMNO`
  ADD CONSTRAINT `fk_ALUMNO_USUARIO1` FOREIGN KEY (`USUARIO_DNI`) REFERENCES `USUARIO` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_curso` FOREIGN KEY (`id_curso`) REFERENCES `CURSO` (`idCurso`);

--
-- Filtros para la tabla `CURSO`
--
ALTER TABLE `CURSO`
  ADD CONSTRAINT `fk_CURSO_CENTRO1` FOREIGN KEY (`CENTRO_idCentro`) REFERENCES `CENTRO` (`idCentro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `EQUIPO`
--
ALTER TABLE `EQUIPO`
  ADD CONSTRAINT `fk_EQUIPO_ALUMNO1` FOREIGN KEY (`ALUMNO_USUARIO_DNI`) REFERENCES `ALUMNO` (`USUARIO_DNI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_EQUIPO_CURSO1` FOREIGN KEY (`CURSO_idCurso`,`CURSO_CENTRO_idCentro`) REFERENCES `CURSO` (`idCurso`, `CENTRO_idCentro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pertenece`
--
ALTER TABLE `pertenece`
  ADD CONSTRAINT `fk_pertenece_CURSO1` FOREIGN KEY (`CURSO_idCurso`,`CURSO_CENTRO_idCentro`) REFERENCES `CURSO` (`idCurso`, `CENTRO_idCentro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_PROFESOR_has_CURSO_PROFESOR1` FOREIGN KEY (`PROFESOR_USUARIO_DNI`) REFERENCES `PROFESOR` (`USUARIO_DNI`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `PREGUNTA`
--
ALTER TABLE `PREGUNTA`
  ADD CONSTRAINT `PREGUNTA_ibfk_1` FOREIGN KEY (`Categoria`) REFERENCES `CATEGORIA` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `PROFESOR`
--
ALTER TABLE `PROFESOR`
  ADD CONSTRAINT `fk_PROFESOR_USUARIO1` FOREIGN KEY (`USUARIO_DNI`) REFERENCES `USUARIO` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `responde`
--
ALTER TABLE `responde`
  ADD CONSTRAINT `fk_responde_ALUMNO1` FOREIGN KEY (`ALUMNO_USUARIO_DNI`) REFERENCES `ALUMNO` (`USUARIO_DNI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_responde_PREGUNTA1` FOREIGN KEY (`PREGUNTA_idPregunta`) REFERENCES `PREGUNTA` (`idPregunta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_responde_RESPUESTA1` FOREIGN KEY (`RESPUESTA_Valor_Respuesta`) REFERENCES `RESPUESTA` (`Valor_Respuesta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
