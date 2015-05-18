-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-05-2015 a las 09:17:03
-- Versión del servidor: 5.6.23
-- Versión de PHP: 5.4.40-1~dotdeb+wheezy.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estaciones`
--

CREATE TABLE IF NOT EXISTS `estaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estatus` varchar(20) DEFAULT NULL,
  `usuario_nombre` varchar(20) DEFAULT NULL,
  `usuario_indicador` varchar(20) DEFAULT NULL,
  `equipo_serial` varchar(20) DEFAULT NULL,
  `equipo_etiqueta` varchar(20) DEFAULT NULL,
  `almacenamiento_ram` varchar(15) DEFAULT NULL,
  `almacenamiento_hdd` varchar(15) DEFAULT NULL,
  `almacenamiento_hdd_cantidad` varchar(15) DEFAULT NULL,
  `procesador_modelo_marca` varchar(15) DEFAULT NULL,
  `procesador_velocidad` varchar(45) DEFAULT NULL,
  `procesador_cantidad` varchar(45) DEFAULT NULL,
  `monitor_tipo_modelo` varchar(45) DEFAULT NULL,
  `monitor_marca` varchar(45) DEFAULT NULL,
  `monitor_cantidad` varchar(45) DEFAULT NULL,
  `video_integrada` varchar(45) DEFAULT NULL,
  `video_memoria` varchar(45) DEFAULT NULL,
  `video_marca_modelo` varchar(45) DEFAULT NULL,
  `video_cantidad` varchar(45) DEFAULT NULL,
  `red_ip` varchar(45) DEFAULT NULL,
  `red_hostname` varchar(45) DEFAULT NULL,
  `red_nombre_vlan` varchar(45) DEFAULT NULL,
  `red_gateway` varchar(45) DEFAULT NULL,
  `red_mascara` varchar(45) DEFAULT NULL,
  `red_broadcast` varchar(45) DEFAULT NULL,
  `energia_dispositivo` varchar(45) DEFAULT NULL,
  `energia_estado` varchar(45) DEFAULT NULL,
  `energia_marca` varchar(45) DEFAULT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `empresas_id` int(11) NOT NULL,
  `gerencias_id` int(11) NOT NULL,
  `ubicaciones_id` int(11) NOT NULL,
  `marcas_id` int(11) NOT NULL,
  `modelos_id` int(11) NOT NULL,
  `sistemas_operativos_id` int(11) NOT NULL,
  `aplicaciones_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`empresas_id`,`gerencias_id`,`ubicaciones_id`,`marcas_id`,`modelos_id`,`sistemas_operativos_id`,`aplicaciones_id`),
  KEY `fk_estaciones_empresas` (`empresas_id`),
  KEY `fk_estaciones_gerencias1` (`gerencias_id`),
  KEY `fk_estaciones_ubicaciones1` (`ubicaciones_id`),
  KEY `fk_estaciones_marcas1` (`marcas_id`),
  KEY `fk_estaciones_modelos1` (`modelos_id`),
  KEY `fk_estaciones_sistemas_operativos1` (`sistemas_operativos_id`),
  KEY `fk_estaciones_aplicaciones1` (`aplicaciones_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estaciones`
--
ALTER TABLE `estaciones`
  ADD CONSTRAINT `fk_estaciones_aplicaciones1` FOREIGN KEY (`aplicaciones_id`) REFERENCES `aplicaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estaciones_empresas` FOREIGN KEY (`empresas_id`) REFERENCES `empresas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estaciones_gerencias1` FOREIGN KEY (`gerencias_id`) REFERENCES `gerencias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estaciones_marcas1` FOREIGN KEY (`marcas_id`) REFERENCES `marcas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estaciones_modelos1` FOREIGN KEY (`modelos_id`) REFERENCES `modelos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estaciones_sistemas_operativos1` FOREIGN KEY (`sistemas_operativos_id`) REFERENCES `sistemas_operativos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estaciones_ubicaciones1` FOREIGN KEY (`ubicaciones_id`) REFERENCES `ubicaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
