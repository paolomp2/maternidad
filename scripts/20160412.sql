-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.21 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para maternidad
CREATE DATABASE IF NOT EXISTS `maternidad` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `maternidad`;


-- Volcando estructura para tabla maternidad.accesorios
CREATE TABLE IF NOT EXISTS `accesorios` (
  `idaccesorio` int(11) NOT NULL AUTO_INCREMENT,
  `numero_pieza` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `costo` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idmodelo_equipo` int(11) NOT NULL,
  PRIMARY KEY (`idaccesorio`),
  KEY `fk_accesorios_modelo_activos1_idx` (`idmodelo_equipo`),
  CONSTRAINT `fk_accesorios_modelo_activos1` FOREIGN KEY (`idmodelo_equipo`) REFERENCES `modelo_activos` (`idmodelo_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.accesorios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `accesorios` DISABLE KEYS */;
/*!40000 ALTER TABLE `accesorios` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.activos
CREATE TABLE IF NOT EXISTS `activos` (
  `idactivo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_patrimonial` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numero_serie` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `anho_adquisicion` date NOT NULL,
  `garantia` int(11) NOT NULL,
  `fecha_garantia_fin` date NOT NULL,
  `costo` double DEFAULT NULL,
  `codigo_compra` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idgrupo` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `idreporte_instalacion` int(11) NOT NULL,
  `idubicacion_fisica` int(11) NOT NULL,
  `idmodelo_equipo` int(11) NOT NULL,
  `fe` int(11) NOT NULL,
  `ac` int(11) NOT NULL,
  `rm` int(11) NOT NULL,
  `hie` int(11) NOT NULL,
  `ge` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idactivo`),
  KEY `fk_activos_grupos1_idx` (`idgrupo`),
  KEY `fk_activos_servicios1_idx` (`idservicio`),
  KEY `fk_activos_proveedores1_idx` (`idproveedor`),
  KEY `fk_activos_reporte_instalaciones1_idx` (`idreporte_instalacion`),
  KEY `fk_activos_ubicacion_fisicas1_idx` (`idubicacion_fisica`),
  KEY `fk_activos_modelo_activos1_idx` (`idmodelo_equipo`),
  KEY `fk_activos_estados1_idx` (`idestado`),
  CONSTRAINT `fk_activos_estados1` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_activos_grupos1` FOREIGN KEY (`idgrupo`) REFERENCES `grupos` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_activos_modelo_activos1` FOREIGN KEY (`idmodelo_equipo`) REFERENCES `modelo_activos` (`idmodelo_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_activos_proveedores1` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_activos_reporte_instalaciones1` FOREIGN KEY (`idreporte_instalacion`) REFERENCES `reporte_instalaciones` (`idreporte_instalacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_activos_servicios1` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_activos_ubicacion_fisicas1` FOREIGN KEY (`idubicacion_fisica`) REFERENCES `ubicacion_fisicas` (`idubicacion_fisica`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.activos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `activos` DISABLE KEYS */;
/*!40000 ALTER TABLE `activos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.alcances
CREATE TABLE IF NOT EXISTS `alcances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(10) unsigned NOT NULL,
  `id_servicio_clinico` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `id_proyecto` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.alcances: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `alcances` DISABLE KEYS */;
/*!40000 ALTER TABLE `alcances` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.alcances_asunciones
CREATE TABLE IF NOT EXISTS `alcances_asunciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_alcance` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.alcances_asunciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `alcances_asunciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `alcances_asunciones` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.alcances_caracteristicas
CREATE TABLE IF NOT EXISTS `alcances_caracteristicas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_alcance` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.alcances_caracteristicas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `alcances_caracteristicas` DISABLE KEYS */;
/*!40000 ALTER TABLE `alcances_caracteristicas` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.alcances_criterios
CREATE TABLE IF NOT EXISTS `alcances_criterios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_alcance` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.alcances_criterios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `alcances_criterios` DISABLE KEYS */;
/*!40000 ALTER TABLE `alcances_criterios` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.alcances_entregables
CREATE TABLE IF NOT EXISTS `alcances_entregables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_alcance` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.alcances_entregables: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `alcances_entregables` DISABLE KEYS */;
/*!40000 ALTER TABLE `alcances_entregables` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.alcances_exclusiones
CREATE TABLE IF NOT EXISTS `alcances_exclusiones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_alcance` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.alcances_exclusiones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `alcances_exclusiones` DISABLE KEYS */;
/*!40000 ALTER TABLE `alcances_exclusiones` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.alcances_requerimientos
CREATE TABLE IF NOT EXISTS `alcances_requerimientos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_alcance` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.alcances_requerimientos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `alcances_requerimientos` DISABLE KEYS */;
/*!40000 ALTER TABLE `alcances_requerimientos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.alcances_restricciones
CREATE TABLE IF NOT EXISTS `alcances_restricciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_alcance` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.alcances_restricciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `alcances_restricciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `alcances_restricciones` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.areas
CREATE TABLE IF NOT EXISTS `areas` (
  `idarea` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idtipo_area` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idarea`),
  KEY `fk_areas_tipo_areas1_idx` (`idtipo_area`),
  KEY `fk_areas_estados1_idx` (`idestado`),
  CONSTRAINT `fk_areas_estados1` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_areas_tipo_areas1` FOREIGN KEY (`idtipo_area`) REFERENCES `tipo_areas` (`idtipo_area`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.areas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.componentes
CREATE TABLE IF NOT EXISTS `componentes` (
  `idcomponente` int(11) NOT NULL AUTO_INCREMENT,
  `numero_pieza` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `costo` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idmodelo_equipo` int(11) NOT NULL,
  PRIMARY KEY (`idcomponente`),
  KEY `fk_componentes_modelo_activos1_idx` (`idmodelo_equipo`),
  CONSTRAINT `fk_componentes_modelo_activos1` FOREIGN KEY (`idmodelo_equipo`) REFERENCES `modelo_activos` (`idmodelo_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.componentes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `componentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `componentes` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.consumibles
CREATE TABLE IF NOT EXISTS `consumibles` (
  `idconsumible` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idmodelo_equipo` int(11) NOT NULL,
  PRIMARY KEY (`idconsumible`),
  KEY `fk_consumibles_modelo_activos1_idx` (`idmodelo_equipo`),
  CONSTRAINT `fk_consumibles_modelo_activos1` FOREIGN KEY (`idmodelo_equipo`) REFERENCES `modelo_activos` (`idmodelo_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.consumibles: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `consumibles` DISABLE KEYS */;
/*!40000 ALTER TABLE `consumibles` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.contratos
CREATE TABLE IF NOT EXISTS `contratos` (
  `idcontrato` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_contrato` datetime DEFAULT NULL,
  `idorden_compra` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idproveedor` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idcontrato`),
  KEY `fk_contratos_proveedores1_idx` (`idproveedor`),
  KEY `fk_contratos_users1_idx` (`id_responsable`),
  KEY `fk_contratos_estados1_idx` (`idestado`),
  CONSTRAINT `fk_contratos_estados1` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contratos_proveedores1` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contratos_users1` FOREIGN KEY (`id_responsable`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.contratos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contratos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.cotizaciones
CREATE TABLE IF NOT EXISTS `cotizaciones` (
  `idcotizacion` int(11) NOT NULL AUTO_INCREMENT,
  `precio` double NOT NULL,
  `anho` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idtipo_referencia` int(11) NOT NULL,
  `codigo_cotizacion` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enlace_seace` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modelo_equipo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_detallado` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_equipo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marca` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proveedor` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idcotizacion`),
  KEY `fk_cotizaciones_tipo_referencia1_idx` (`idtipo_referencia`),
  CONSTRAINT `fk_cotizaciones_tipo_referencia1` FOREIGN KEY (`idtipo_referencia`) REFERENCES `tipo_referencia` (`idtipo_referencia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.cotizaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cotizaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `cotizaciones` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.cronogramas
CREATE TABLE IF NOT EXISTS `cronogramas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(10) unsigned NOT NULL,
  `id_servicio_clinico` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `id_proyecto` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.cronogramas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cronogramas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cronogramas` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.cronogramas_actividades
CREATE TABLE IF NOT EXISTS `cronogramas_actividades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `duracion` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_actividad_previa` int(10) unsigned DEFAULT NULL,
  `id_cronograma` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.cronogramas_actividades: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cronogramas_actividades` DISABLE KEYS */;
/*!40000 ALTER TABLE `cronogramas_actividades` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.detalle_iper
CREATE TABLE IF NOT EXISTS `detalle_iper` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero_version` int(11) NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idiper` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `detalle_iper_idiper_foreign` (`idiper`),
  CONSTRAINT `detalle_iper_idiper_foreign` FOREIGN KEY (`idiper`) REFERENCES `ipers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.detalle_iper: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_iper` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_iper` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.detalle_reporte_calibracion
CREATE TABLE IF NOT EXISTS `detalle_reporte_calibracion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idreporte_calibracion` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_reporte_calibracion_idreporte_calibracion_foreign` (`idreporte_calibracion`),
  CONSTRAINT `detalle_reporte_calibracion_idreporte_calibracion_foreign` FOREIGN KEY (`idreporte_calibracion`) REFERENCES `reporte_calibracion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.detalle_reporte_calibracion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_reporte_calibracion` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_reporte_calibracion` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.detalle_reporte_instalaciones
CREATE TABLE IF NOT EXISTS `detalle_reporte_instalaciones` (
  `iddetalle_reporte_instalacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tarea` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tarea_realizada` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idreporte_instalacion` int(11) NOT NULL,
  PRIMARY KEY (`iddetalle_reporte_instalacion`),
  KEY `fk_detalle_reporte_instalaciones_reporte_instalaciones1_idx` (`idreporte_instalacion`),
  CONSTRAINT `fk_detalle_reporte_instalaciones_reporte_instalaciones1` FOREIGN KEY (`idreporte_instalacion`) REFERENCES `reporte_instalaciones` (`idreporte_instalacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.detalle_reporte_instalaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_reporte_instalaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_reporte_instalaciones` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.detalle_solicitud_compras
CREATE TABLE IF NOT EXISTS `detalle_solicitud_compras` (
  `iddetalle_solicitud_compra` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `marca` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `serie_parte` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idsolicitud_compra` int(11) NOT NULL,
  PRIMARY KEY (`iddetalle_solicitud_compra`),
  KEY `fk_detalle_solicitud_compras_solicitud_compras1_idx` (`idsolicitud_compra`),
  CONSTRAINT `fk_detalle_solicitud_compras_solicitud_compras1` FOREIGN KEY (`idsolicitud_compra`) REFERENCES `solicitud_compras` (`idsolicitud_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.detalle_solicitud_compras: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_solicitud_compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_solicitud_compras` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.dimensiones
CREATE TABLE IF NOT EXISTS `dimensiones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.dimensiones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `dimensiones` DISABLE KEYS */;
/*!40000 ALTER TABLE `dimensiones` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.documentos
CREATE TABLE IF NOT EXISTS `documentos` (
  `iddocumento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `autor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_archivamiento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idtipo_documento` int(11) NOT NULL,
  `idreporte_instalacion` int(11) DEFAULT NULL,
  `idactivo` int(11) DEFAULT NULL,
  `idcontrato` int(11) DEFAULT NULL,
  `idreporte_incumplimiento` int(11) DEFAULT NULL,
  `idsolicitud_compra` int(11) DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  `idtipo_acta` int(11) DEFAULT NULL,
  `idproveedor` int(11) DEFAULT NULL,
  `fecha_acta` datetime DEFAULT NULL,
  `idreporte_retiro` int(11) DEFAULT NULL,
  `idot_vmetrologica` int(11) DEFAULT NULL,
  `nombre_archivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`iddocumento`),
  KEY `fk_documentos_tipo_documentos1_idx` (`idtipo_documento`),
  KEY `fk_documentos_reporte_instalaciones1_idx` (`idreporte_instalacion`),
  KEY `fk_documentos_activos1_idx` (`idactivo`),
  KEY `fk_documentos_contratos1_idx` (`idcontrato`),
  KEY `fk_documentos_reporte_incumplimientos1_idx` (`idreporte_incumplimiento`),
  KEY `fk_documentos_solicitud_compras1_idx` (`idsolicitud_compra`),
  KEY `fk_documentos_estados1_idx` (`idestado`),
  KEY `fk_documentos_tipo_actas1_idx` (`idtipo_acta`),
  KEY `fk_documentos_proveedores1_idx` (`idproveedor`),
  KEY `fk_documentos_reporte_retiros1_idx` (`idreporte_retiro`),
  KEY `fk_documentos_ot_vmetrologicas1_idx` (`idot_vmetrologica`),
  CONSTRAINT `fk_documentos_activos1` FOREIGN KEY (`idactivo`) REFERENCES `activos` (`idactivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documentos_contratos1` FOREIGN KEY (`idcontrato`) REFERENCES `contratos` (`idcontrato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documentos_estados1` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documentos_ot_vmetrologicas1` FOREIGN KEY (`idot_vmetrologica`) REFERENCES `ot_vmetrologicas` (`idot_vmetrologica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documentos_proveedores1` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documentos_reporte_incumplimientos1` FOREIGN KEY (`idreporte_incumplimiento`) REFERENCES `reporte_incumplimientos` (`idreporte_incumplimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documentos_reporte_instalaciones1` FOREIGN KEY (`idreporte_instalacion`) REFERENCES `reporte_instalaciones` (`idreporte_instalacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documentos_reporte_retiros1` FOREIGN KEY (`idreporte_retiro`) REFERENCES `reporte_retiros` (`idreporte_retiro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documentos_solicitud_compras1` FOREIGN KEY (`idsolicitud_compra`) REFERENCES `solicitud_compras` (`idsolicitud_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documentos_tipo_actas1` FOREIGN KEY (`idtipo_acta`) REFERENCES `tipo_actas` (`idtipo_acta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documentos_tipo_documentos1` FOREIGN KEY (`idtipo_documento`) REFERENCES `tipo_documentos` (`idtipo_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.documentos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.documentosinf
CREATE TABLE IF NOT EXISTS `documentosinf` (
  `iddocumentosinf` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `autor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_archivamiento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nombre_archivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idtipo_documentosinf` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  `idfamilia_activo` int(11) DEFAULT NULL,
  `id_subtipo` int(10) unsigned DEFAULT NULL,
  `id_tipo_padre` int(10) unsigned DEFAULT NULL,
  `id_programacion` int(10) unsigned DEFAULT NULL,
  `anho_publicacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddocumentosinf`),
  KEY `fk_documentosinf_tipo_documentosinf1_idx` (`idtipo_documentosinf`),
  KEY `fk_documentosinf_estados1_idx` (`idestado`),
  KEY `fk_documentosinf_familia_activos1_idx` (`idfamilia_activo`),
  KEY `documentosinf_id_subtipo_foreign` (`id_subtipo`),
  KEY `documentosinf_id_tipo_padre_foreign` (`id_tipo_padre`),
  CONSTRAINT `documentosinf_id_subtipo_foreign` FOREIGN KEY (`id_subtipo`) REFERENCES `subtipo_documentosinf` (`id`),
  CONSTRAINT `documentosinf_id_tipo_padre_foreign` FOREIGN KEY (`id_tipo_padre`) REFERENCES `tipo_documentosinf_padre` (`id`),
  CONSTRAINT `fk_documentosinf_estados1` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documentosinf_familia_activos1` FOREIGN KEY (`idfamilia_activo`) REFERENCES `familia_activos` (`idfamilia_activo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documentosinf_tipo_documentosinf1` FOREIGN KEY (`idtipo_documentosinf`) REFERENCES `tipo_documentosinf` (`idtipo_documentosinf`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.documentosinf: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `documentosinf` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentosinf` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.documentospacc
CREATE TABLE IF NOT EXISTS `documentospacc` (
  `iddocumentosPAAC` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idtipo_documentosPAAC` int(11) NOT NULL,
  `anho` int(11) DEFAULT NULL,
  `cod_reporte_cn_paac1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cod_reporte_cn_paac2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cod_reporte_cn_paac3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cod_reporte_cn_paac4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cod_reporte_cn_paac5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`iddocumentosPAAC`),
  KEY `fk_documentosPAAC_tipo_documentosPAAC1_idx` (`idtipo_documentosPAAC`),
  CONSTRAINT `fk_documentosPAAC_tipo_documentosPAAC1` FOREIGN KEY (`idtipo_documentosPAAC`) REFERENCES `tipo_documentospaac` (`idtipo_documentosPAAC`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.documentospacc: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `documentospacc` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentospacc` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.documentosplandirector
CREATE TABLE IF NOT EXISTS `documentosplandirector` (
  `iddocumentosPlanDirector` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idtipo_documentosPlanDirector` int(11) NOT NULL,
  `anho` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddocumentosPlanDirector`),
  KEY `fk_documentosPAAC_copy1_tipo_documentosPlanDirector1_idx` (`idtipo_documentosPlanDirector`),
  CONSTRAINT `fk_documentosPAAC_copy1_tipo_documentosPlanDirector1` FOREIGN KEY (`idtipo_documentosPlanDirector`) REFERENCES `tipo_documentosplandirector` (`idtipo_documentosPlanDirector`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.documentosplandirector: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `documentosplandirector` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentosplandirector` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.documentos_servicios_clinicos
CREATE TABLE IF NOT EXISTS `documentos_servicios_clinicos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_servicio` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.documentos_servicios_clinicos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `documentos_servicios_clinicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentos_servicios_clinicos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.documento_riesgos
CREATE TABLE IF NOT EXISTS `documento_riesgos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_archivamiento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_tipo` int(10) unsigned DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documento_riesgos_id_tipo_foreign` (`id_tipo`),
  CONSTRAINT `documento_riesgos_id_tipo_foreign` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_documento_riesgos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.documento_riesgos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `documento_riesgos` DISABLE KEYS */;
/*!40000 ALTER TABLE `documento_riesgos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.entorno_asistencial
CREATE TABLE IF NOT EXISTS `entorno_asistencial` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.entorno_asistencial: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `entorno_asistencial` DISABLE KEYS */;
/*!40000 ALTER TABLE `entorno_asistencial` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.entorno_asistencialxtipo_servicio
CREATE TABLE IF NOT EXISTS `entorno_asistencialxtipo_servicio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `identorno` int(10) unsigned NOT NULL,
  `idtipo` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entorno_asistencialxtipo_servicio_identorno_foreign` (`identorno`),
  KEY `entorno_asistencialxtipo_servicio_idtipo_foreign` (`idtipo`),
  CONSTRAINT `entorno_asistencialxtipo_servicio_identorno_foreign` FOREIGN KEY (`identorno`) REFERENCES `entorno_asistencial` (`id`),
  CONSTRAINT `entorno_asistencialxtipo_servicio_idtipo_foreign` FOREIGN KEY (`idtipo`) REFERENCES `tipo_servicio` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.entorno_asistencialxtipo_servicio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `entorno_asistencialxtipo_servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `entorno_asistencialxtipo_servicio` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.estados
CREATE TABLE IF NOT EXISTS `estados` (
  `idestado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idtabla` int(11) NOT NULL,
  PRIMARY KEY (`idestado`),
  KEY `fk_estados_tablas1_idx` (`idtabla`),
  CONSTRAINT `fk_estados_tablas1` FOREIGN KEY (`idtabla`) REFERENCES `tablas` (`idtabla`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.estados: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.estado_programacion_reportes
CREATE TABLE IF NOT EXISTS `estado_programacion_reportes` (
  `idestado_programacion_reportes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idestado_programacion_reportes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.estado_programacion_reportes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `estado_programacion_reportes` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado_programacion_reportes` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.etapa_servicio
CREATE TABLE IF NOT EXISTS `etapa_servicio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `identornoxtipo` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `etapa_servicio_identornoxtipo_foreign` (`identornoxtipo`),
  CONSTRAINT `etapa_servicio_identornoxtipo_foreign` FOREIGN KEY (`identornoxtipo`) REFERENCES `entorno_asistencialxtipo_servicio` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.etapa_servicio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `etapa_servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `etapa_servicio` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.eventosxhijoxnieto
CREATE TABLE IF NOT EXISTS `eventosxhijoxnieto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ideventoxhijo` int(10) unsigned NOT NULL,
  `idsubtiponieto` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eventosxhijoxnieto_ideventoxhijo_foreign` (`ideventoxhijo`),
  KEY `eventosxhijoxnieto_idsubtiponieto_foreign` (`idsubtiponieto`),
  CONSTRAINT `eventosxhijoxnieto_ideventoxhijo_foreign` FOREIGN KEY (`ideventoxhijo`) REFERENCES `eventos_adversosxsubtipohijo_incidente` (`id`),
  CONSTRAINT `eventosxhijoxnieto_idsubtiponieto_foreign` FOREIGN KEY (`idsubtiponieto`) REFERENCES `subtiponieto_incidente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.eventosxhijoxnieto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `eventosxhijoxnieto` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventosxhijoxnieto` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.eventos_adversos
CREATE TABLE IF NOT EXISTS `eventos_adversos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_abreviatura` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_correlativo` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_paciente` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `idtipo_documento` int(11) NOT NULL,
  `numero_documento` int(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_reporte` date NOT NULL,
  `fecha_incidente` date NOT NULL,
  `idfrecuencia` int(10) unsigned NOT NULL,
  `tipo_danho` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idgrado_danho` int(10) unsigned NOT NULL,
  `impacto_socioeconomico` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `idetapa_servicio` int(10) unsigned DEFAULT NULL,
  `disciplina` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idfactor` int(10) unsigned NOT NULL,
  `idproceso` int(10) unsigned NOT NULL,
  `danho_bienes` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `procedimiento` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `diagnostico` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `causa` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `medidas` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `idactivo` int(11) DEFAULT NULL,
  `informacion` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_reportante` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profesion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `codigo_anho` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eventos_adversos_idtipo_documento_foreign` (`idtipo_documento`),
  KEY `eventos_adversos_idfrecuencia_foreign` (`idfrecuencia`),
  KEY `eventos_adversos_idgrado_danho_foreign` (`idgrado_danho`),
  KEY `eventos_adversos_idactivo_foreign` (`idactivo`),
  KEY `eventos_adversos_idetapa_servicio_foreign` (`idetapa_servicio`),
  KEY `eventos_adversos_idfactor_foreign` (`idfactor`),
  KEY `eventos_adversos_idproceso_foreign` (`idproceso`),
  CONSTRAINT `eventos_adversos_idactivo_foreign` FOREIGN KEY (`idactivo`) REFERENCES `activos` (`idactivo`),
  CONSTRAINT `eventos_adversos_idetapa_servicio_foreign` FOREIGN KEY (`idetapa_servicio`) REFERENCES `etapa_servicio` (`id`),
  CONSTRAINT `eventos_adversos_idfactor_foreign` FOREIGN KEY (`idfactor`) REFERENCES `factores_contribuyentes` (`id`),
  CONSTRAINT `eventos_adversos_idfrecuencia_foreign` FOREIGN KEY (`idfrecuencia`) REFERENCES `frecuencia_incidente` (`id`),
  CONSTRAINT `eventos_adversos_idgrado_danho_foreign` FOREIGN KEY (`idgrado_danho`) REFERENCES `grado_danho` (`id`),
  CONSTRAINT `eventos_adversos_idproceso_foreign` FOREIGN KEY (`idproceso`) REFERENCES `procesos` (`id`),
  CONSTRAINT `eventos_adversos_idtipo_documento_foreign` FOREIGN KEY (`idtipo_documento`) REFERENCES `tipo_doc_identidades` (`idtipo_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.eventos_adversos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `eventos_adversos` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos_adversos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.eventos_adversosxsubtipohijo_incidente
CREATE TABLE IF NOT EXISTS `eventos_adversosxsubtipohijo_incidente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idevento` int(10) unsigned NOT NULL,
  `idsubtipohijo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eventos_adversosxsubtipohijo_incidente_idevento_foreign` (`idevento`),
  KEY `eventos_adversosxsubtipohijo_incidente_idsubtipohijo_foreign` (`idsubtipohijo`),
  CONSTRAINT `eventos_adversosxsubtipohijo_incidente_idevento_foreign` FOREIGN KEY (`idevento`) REFERENCES `eventos_adversos` (`id`),
  CONSTRAINT `eventos_adversosxsubtipohijo_incidente_idsubtipohijo_foreign` FOREIGN KEY (`idsubtipohijo`) REFERENCES `subtipohijo_incidente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.eventos_adversosxsubtipohijo_incidente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `eventos_adversosxsubtipohijo_incidente` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos_adversosxsubtipohijo_incidente` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.eventoxentorno_asistencial
CREATE TABLE IF NOT EXISTS `eventoxentorno_asistencial` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `identorno` int(10) unsigned NOT NULL,
  `idevento` int(10) unsigned NOT NULL,
  `comentario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eventoxentorno_asistencial_identorno_foreign` (`identorno`),
  KEY `eventoxentorno_asistencial_idevento_foreign` (`idevento`),
  CONSTRAINT `eventoxentorno_asistencial_identorno_foreign` FOREIGN KEY (`identorno`) REFERENCES `entorno_asistencial` (`id`),
  CONSTRAINT `eventoxentorno_asistencial_idevento_foreign` FOREIGN KEY (`idevento`) REFERENCES `eventos_adversos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.eventoxentorno_asistencial: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `eventoxentorno_asistencial` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventoxentorno_asistencial` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.eventoxpersonas_implicadas
CREATE TABLE IF NOT EXISTS `eventoxpersonas_implicadas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idevento` int(10) unsigned NOT NULL,
  `idpersonas_implicada` int(10) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eventoxpersonas_implicadas_idevento_foreign` (`idevento`),
  KEY `eventoxpersonas_implicadas_idpersonas_implicada_foreign` (`idpersonas_implicada`),
  CONSTRAINT `eventoxpersonas_implicadas_idevento_foreign` FOREIGN KEY (`idevento`) REFERENCES `eventos_adversos` (`id`),
  CONSTRAINT `eventoxpersonas_implicadas_idpersonas_implicada_foreign` FOREIGN KEY (`idpersonas_implicada`) REFERENCES `personas_implicadas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.eventoxpersonas_implicadas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `eventoxpersonas_implicadas` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventoxpersonas_implicadas` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.factores_contribuyentes
CREATE TABLE IF NOT EXISTS `factores_contribuyentes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.factores_contribuyentes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `factores_contribuyentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `factores_contribuyentes` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.familia_activos
CREATE TABLE IF NOT EXISTS `familia_activos` (
  `idfamilia_activo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_equipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_siga` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idtipo_activo` int(11) NOT NULL,
  `idmarca` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idfamilia_activo`),
  KEY `fk_familia_activos_tipo_activos1_idx` (`idtipo_activo`),
  KEY `fk_familia_activos_marcas1_idx` (`idmarca`),
  KEY `fk_familia_activos_estados1_idx` (`idestado`),
  CONSTRAINT `fk_familia_activos_estados1` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_familia_activos_marcas1` FOREIGN KEY (`idmarca`) REFERENCES `marcas` (`idmarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_familia_activos_tipo_activos1` FOREIGN KEY (`idtipo_activo`) REFERENCES `tipo_activos` (`idtipo_activo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.familia_activos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `familia_activos` DISABLE KEYS */;
/*!40000 ALTER TABLE `familia_activos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.frecuencia_incidente
CREATE TABLE IF NOT EXISTS `frecuencia_incidente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.frecuencia_incidente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `frecuencia_incidente` DISABLE KEYS */;
/*!40000 ALTER TABLE `frecuencia_incidente` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.grado_danho
CREATE TABLE IF NOT EXISTS `grado_danho` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.grado_danho: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `grado_danho` DISABLE KEYS */;
/*!40000 ALTER TABLE `grado_danho` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.grupos
CREATE TABLE IF NOT EXISTS `grupos` (
  `idgrupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_responsable` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idgrupo`),
  KEY `fk_grupos_users1_idx` (`id_responsable`),
  KEY `fk_grupos_estados1_idx` (`idestado`),
  CONSTRAINT `fk_grupos_estados1` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupos_users1` FOREIGN KEY (`id_responsable`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.grupos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.informaciones_economicas
CREATE TABLE IF NOT EXISTS `informaciones_economicas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(10) unsigned NOT NULL,
  `id_servicio_clinico` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `id_proyecto` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.informaciones_economicas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `informaciones_economicas` DISABLE KEYS */;
/*!40000 ALTER TABLE `informaciones_economicas` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.informaciones_economicas_actividades
CREATE TABLE IF NOT EXISTS `informaciones_economicas_actividades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo_unitario` double(8,2) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `id_tipo` int(10) unsigned NOT NULL,
  `id_clase` int(10) unsigned NOT NULL,
  `id_informacion_economica` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.informaciones_economicas_actividades: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `informaciones_economicas_actividades` DISABLE KEYS */;
/*!40000 ALTER TABLE `informaciones_economicas_actividades` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.ipers
CREATE TABLE IF NOT EXISTS `ipers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idusuario_elaborador` int(11) NOT NULL,
  `idservicio` int(11) DEFAULT NULL,
  `identorno_asistencial` int(10) unsigned DEFAULT NULL,
  `idtipo_iper` int(10) unsigned NOT NULL,
  `codigo_abreviatura` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_tipo` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_correlativo` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_anho` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `periodicidad` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `ipers_idusuario_elaborador_foreign` (`idusuario_elaborador`),
  KEY `ipers_idservicio_foreign` (`idservicio`),
  KEY `ipers_identorno_asistencial_foreign` (`identorno_asistencial`),
  KEY `ipers_idtipo_iper_foreign` (`idtipo_iper`),
  CONSTRAINT `ipers_identorno_asistencial_foreign` FOREIGN KEY (`identorno_asistencial`) REFERENCES `entorno_asistencial` (`id`),
  CONSTRAINT `ipers_idservicio_foreign` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`),
  CONSTRAINT `ipers_idtipo_iper_foreign` FOREIGN KEY (`idtipo_iper`) REFERENCES `tipo_iper` (`id`),
  CONSTRAINT `ipers_idusuario_elaborador_foreign` FOREIGN KEY (`idusuario_elaborador`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.ipers: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ipers` DISABLE KEYS */;
/*!40000 ALTER TABLE `ipers` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.marcas
CREATE TABLE IF NOT EXISTS `marcas` (
  `idmarca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idmarca`),
  KEY `fk_marcas_estados1_idx` (`idestado`),
  CONSTRAINT `fk_marcas_estados1` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.marcas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.metodo_difusion
CREATE TABLE IF NOT EXISTS `metodo_difusion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.metodo_difusion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `metodo_difusion` DISABLE KEYS */;
/*!40000 ALTER TABLE `metodo_difusion` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.migrations: ~259 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2015_12_14_210432_create_accesorios_table', 1),
	('2015_12_14_210432_create_activos_table', 1),
	('2015_12_14_210432_create_areas_table', 1),
	('2015_12_14_210432_create_componentes_table', 1),
	('2015_12_14_210432_create_consumibles_table', 1),
	('2015_12_14_210432_create_contratos_table', 1),
	('2015_12_14_210432_create_cotizaciones_table', 1),
	('2015_12_14_210432_create_detalle_reporte_instalaciones_table', 1),
	('2015_12_14_210432_create_detalle_solicitud_compras_table', 1),
	('2015_12_14_210432_create_documentos_table', 1),
	('2015_12_14_210432_create_documentosinf_table', 1),
	('2015_12_14_210432_create_documentospacc_table', 1),
	('2015_12_14_210432_create_documentosplandirector_table', 1),
	('2015_12_14_210432_create_estado_programacion_reportes_table', 1),
	('2015_12_14_210432_create_estados_table', 1),
	('2015_12_14_210432_create_familia_activos_table', 1),
	('2015_12_14_210432_create_grupos_table', 1),
	('2015_12_14_210432_create_marcas_table', 1),
	('2015_12_14_210432_create_modelo_activos_table', 1),
	('2015_12_14_210432_create_motivo_retiros_table', 1),
	('2015_12_14_210432_create_ot_busqueda_infos_table', 1),
	('2015_12_14_210432_create_ot_correctivos_table', 1),
	('2015_12_14_210432_create_ot_inspec_equipos_table', 1),
	('2015_12_14_210432_create_ot_inspec_equiposxactivos_table', 1),
	('2015_12_14_210432_create_ot_inspec_equiposxactivosxtareas_inspec_equipo_table', 1),
	('2015_12_14_210432_create_ot_preventivos_table', 1),
	('2015_12_14_210432_create_ot_retiros_table', 1),
	('2015_12_14_210432_create_ot_vmetrologicas_table', 1),
	('2015_12_14_210432_create_personal_ot_busqueda_infos_table', 1),
	('2015_12_14_210432_create_personal_ot_correctivos_table', 1),
	('2015_12_14_210432_create_personal_ot_preventivos_table', 1),
	('2015_12_14_210432_create_personal_ot_retiros_table', 1),
	('2015_12_14_210432_create_personal_ot_vmetrologicas_table', 1),
	('2015_12_14_210432_create_prioridades_table', 1),
	('2015_12_14_210432_create_programacion_reporte_cn_table', 1),
	('2015_12_14_210432_create_programacion_reporte_etes_table', 1),
	('2015_12_14_210432_create_programacion_reporte_paac_table', 1),
	('2015_12_14_210432_create_proveedores_table', 1),
	('2015_12_14_210432_create_reporte_cn_table', 1),
	('2015_12_14_210432_create_reporte_etes_table', 1),
	('2015_12_14_210432_create_reporte_incumplimientos_table', 1),
	('2015_12_14_210432_create_reporte_instalaciones_table', 1),
	('2015_12_14_210432_create_reporte_paac_table', 1),
	('2015_12_14_210432_create_reporte_retiros_table', 1),
	('2015_12_14_210432_create_repuestos_ot_correctivo_table', 1),
	('2015_12_14_210432_create_repuestos_ot_preventivos_table', 1),
	('2015_12_14_210432_create_roles_table', 1),
	('2015_12_14_210432_create_servicios_table', 1),
	('2015_12_14_210432_create_solicitud_busqueda_infos_table', 1),
	('2015_12_14_210432_create_solicitud_compras_table', 1),
	('2015_12_14_210432_create_solicitud_orden_trabajos_table', 1),
	('2015_12_14_210432_create_soporte_tecnicos_table', 1),
	('2015_12_14_210432_create_soporte_tecnicosxactivos_table', 1),
	('2015_12_14_210432_create_tablas_table', 1),
	('2015_12_14_210432_create_tareas_inspec_equipos_table', 1),
	('2015_12_14_210432_create_tareas_ot_busqueda_infos_table', 1),
	('2015_12_14_210432_create_tareas_ot_correctivos_table', 1),
	('2015_12_14_210432_create_tareas_ot_preventivos_table', 1),
	('2015_12_14_210432_create_tareas_ot_preventivosxot_preventivos_table', 1),
	('2015_12_14_210432_create_tareas_ot_retiros_table', 1),
	('2015_12_14_210432_create_tipo_actas_table', 1),
	('2015_12_14_210432_create_tipo_activos_table', 1),
	('2015_12_14_210432_create_tipo_areas_table', 1),
	('2015_12_14_210432_create_tipo_busqueda_infos_table', 1),
	('2015_12_14_210432_create_tipo_doc_identidades_table', 1),
	('2015_12_14_210432_create_tipo_documentos_table', 1),
	('2015_12_14_210432_create_tipo_documentosinf_table', 1),
	('2015_12_14_210432_create_tipo_documentospaac_table', 1),
	('2015_12_14_210432_create_tipo_documentosplandirector_table', 1),
	('2015_12_14_210432_create_tipo_fallas_table', 1),
	('2015_12_14_210432_create_tipo_referencia_table', 1),
	('2015_12_14_210432_create_tipo_reporte_cn_table', 1),
	('2015_12_14_210432_create_tipo_reporte_etes_table', 1),
	('2015_12_14_210432_create_tipo_reporte_instalaciones_table', 1),
	('2015_12_14_210432_create_tipo_reporte_paac_table', 1),
	('2015_12_14_210432_create_tipo_servicios_table', 1),
	('2015_12_14_210432_create_tipo_solicitud_compras_table', 1),
	('2015_12_14_210432_create_ubicacion_fisicas_table', 1),
	('2015_12_14_210432_create_users_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_accesorios_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_activos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_areas_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_componentes_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_consumibles_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_contratos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_cotizaciones_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_detalle_reporte_instalaciones_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_detalle_solicitud_compras_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_documentos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_documentosinf_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_documentospacc_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_documentosplandirector_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_estados_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_familia_activos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_grupos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_marcas_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_modelo_activos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_ot_busqueda_infos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_ot_correctivos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_ot_inspec_equipos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_ot_inspec_equiposxactivos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_ot_inspec_equiposxactivosxtareas_inspec_equipo_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_ot_preventivos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_ot_retiros_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_ot_vmetrologicas_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_personal_ot_busqueda_infos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_personal_ot_correctivos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_personal_ot_preventivos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_personal_ot_retiros_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_personal_ot_vmetrologicas_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_programacion_reporte_cn_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_programacion_reporte_etes_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_programacion_reporte_paac_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_proveedores_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_reporte_cn_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_reporte_etes_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_reporte_incumplimientos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_reporte_instalaciones_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_reporte_paac_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_reporte_retiros_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_repuestos_ot_correctivo_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_repuestos_ot_preventivos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_servicios_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_solicitud_busqueda_infos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_solicitud_compras_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_solicitud_orden_trabajos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_soporte_tecnicos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_soporte_tecnicosxactivos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_tareas_inspec_equipos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_tareas_ot_busqueda_infos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_tareas_ot_correctivos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_tareas_ot_preventivos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_tareas_ot_preventivosxot_preventivos_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_tareas_ot_retiros_table', 1),
	('2015_12_14_210438_add_foreign_keys_to_users_table', 1),
	('2015_12_19_161336_add_foreign_key_to_tareas_inspec_equipos_table', 1),
	('2015_12_19_173426_add_foreign_key_to_tareas_ot_preventivos_table', 1),
	('2015_12_19_193208_create_subtipo_documentosinf_table', 1),
	('2015_12_19_195232_add_fk_to_subtipo_documentosinf_table', 1),
	('2015_12_19_203047_add_fk_to_documentosinf_table', 1),
	('2015_12_20_204841_create_tipo_documentosinf_padre_table', 1),
	('2015_12_20_210953_add_fk_id_tipo_padre_to_documentosinf_table', 1),
	('2015_12_20_212316_add_fk_id_tipo_padre_to_tipo_documentosinf_table', 1),
	('2015_12_21_090723_alter_idservicio_to_programacion_reporte_paac_table', 1),
	('2015_12_21_090805_alter_idservicio_to_programacion_reporte_cn_table', 1),
	('2015_12_26_173300_create_programacion_guia_ts_table', 1),
	('2015_12_26_174658_create_programacion_guia_gpc_table', 1),
	('2015_12_26_175220_add_fk_to_programacion_guia_ts_table', 1),
	('2015_12_26_175652_add_fk_to_programacion_guia_gpc_table', 1),
	('2015_12_28_114859_add_id_programacion_to_documentosinf_table', 1),
	('2015_12_28_135435_add_id_guia_to_programacion_guia_ts_table', 1),
	('2015_12_28_140302_add_fk_id_guia_to_programacion_guia_ts_table', 1),
	('2015_12_30_205634_add_id_guia_to_programacion_guia_gpc_table', 1),
	('2015_12_30_205714_add_fk_id_guia_to_programacion_guia_gpc_table', 1),
	('2016_01_14_161017_add_anho_publicacion_to_documentosinf_table', 1),
	('2016_01_14_162716_add_fecha_publicacion_to_programacion_guia_gpc_table', 1),
	('2016_01_21_121401_add_nullable_id_programacion_to_documentosinf_table', 1),
	('2016_01_28_170812_add_tiempo_maximo_to_tipo_solicitud_compras', 1),
	('2016_01_29_212448_create_reporte_financiamiento_table', 1),
	('2016_01_29_213838_create_reporte_financiamiento_cronogramas_table', 1),
	('2016_01_29_213903_create_reporte_financiamiento_inversiones_table', 1),
	('2016_02_01_121207_create_tipo_documento_riesgos_table', 1),
	('2016_02_01_121225_create_documento_riesgos_table', 1),
	('2016_02_01_121243_add_fk_to_documento_riesgos_table', 1),
	('2016_02_02_162156_create_grado_danho_table', 1),
	('2016_02_02_162354_create_frecuencia_incidente_table', 1),
	('2016_02_02_162653_create_tipo_incidente_table', 1),
	('2016_02_03_091327_create_subtipopadre_incidente_table', 1),
	('2016_02_03_091457_create_subtipohijo_incidente_table', 1),
	('2016_02_03_091536_create_eventos_adversos_table', 1),
	('2016_02_03_141745_create_subtiponieto_incidente_table', 1),
	('2016_02_03_141823_add_fk_to_subtipopadre_incidente_table', 1),
	('2016_02_03_141915_add_fk_to_subtipohijo_incidente_table', 1),
	('2016_02_03_141944_add_fk_to_subtiponieto_incidente_table', 1),
	('2016_02_03_144537_create_eventos_adversosxsubtipohijo_incidente_table', 1),
	('2016_02_03_145224_add_fk_to_eventos_adversosxsubtipohijo_incidente_table', 1),
	('2016_02_03_150826_create_eventosxhijoxnieto_table', 1),
	('2016_02_03_150921_add_fk_to_eventosxhijoxnieto_table', 1),
	('2016_02_03_214603_create_proyecto_categorias_table', 1),
	('2016_02_04_104329_add_fks_to_reporte_financiamiento_table', 1),
	('2016_02_04_105250_add_fk_id_reporte_to_reporte_financiamiento_cronogramas_table', 1),
	('2016_02_04_105407_add_fk_id_reporte_to_reporte_financiamiento_inversiones_table', 1),
	('2016_02_04_110712_add_duracion_to_reporte_financiamiento_table', 1),
	('2016_02_04_150650_create_requerimientos_clinicos_estados_table', 1),
	('2016_02_04_151933_create_requerimientos_clinicos_table', 1),
	('2016_02_04_170037_add_fks_to_requerimientos_clinicos_table', 1),
	('2016_02_08_113825_create_dimensiones_table', 1),
	('2016_02_08_195303_create_reporte_calibracion_table', 1),
	('2016_02_08_195544_create_detalle_reporte_calibracion_table', 1),
	('2016_02_08_195726_add_fk_to_reporte_calibracion', 1),
	('2016_02_08_195826_add_fk_to_detalle_reporte_calibracion', 1),
	('2016_02_09_162754_create_factores_contribuyentes_table', 1),
	('2016_02_09_162832_create_procesos_table', 1),
	('2016_02_09_162911_create_entorno_asistencial_table', 1),
	('2016_02_09_163058_create_tipo_servicio_table', 1),
	('2016_02_09_163146_create_entorno_asistencialxtipo_servicio_table', 1),
	('2016_02_09_163307_create_etapa_servicio_table', 1),
	('2016_02_09_163523_create_eventoxentorno_asistencial_table', 1),
	('2016_02_09_163832_add_fk_to_entorno_asistencialxtipo_servicio', 1),
	('2016_02_09_163952_add_fk_to_etapa_servicio', 1),
	('2016_02_09_164124_add_fk_to_eventoxentorno_asistencial', 1),
	('2016_02_09_164242_add_fk_to_eventos_adversos', 1),
	('2016_02_10_113158_add_codigo_to_reporte_financiamiento', 1),
	('2016_02_10_113356_add_codigo_to_requerimientos_clinicos', 1),
	('2016_02_10_122213_create_table_reportes_desarollo', 1),
	('2016_02_10_124939_create_reporte_priorizacion_table', 1),
	('2016_02_10_125344_create_table_reportes_desarollo_indicadores', 1),
	('2016_02_10_153226_create_personas_implicadas_table', 1),
	('2016_02_10_153251_create_eventoxpersonas_implicadas_table', 1),
	('2016_02_10_153415_add_fk_to_eventoxpersonas_implicadas', 1),
	('2016_02_10_212323_create_documentos_servicios_clinicos_table', 1),
	('2016_02_11_185430_create_proyectos_table', 1),
	('2016_02_11_190029_create_proyectos_requerimientos_table', 1),
	('2016_02_11_192046_create_proyectos_asunciones_table', 1),
	('2016_02_11_192400_create_proyectos_restricciones_table', 1),
	('2016_02_11_193303_create_proyectos_personal_table', 1),
	('2016_02_11_193607_create_proyectos_entidades_table', 1),
	('2016_02_11_193941_create_proyectos_aprobaciones_table', 1),
	('2016_02_11_194435_create_proyectos_riesgos_table', 1),
	('2016_02_11_194940_create_proyectos_cronogramas_table', 1),
	('2016_02_11_195348_create_proyectos_presupuestos_table', 1),
	('2016_02_12_114624_add_fks_to_reporte_priorizacion_table', 1),
	('2016_02_15_184003_add_upload_to_proyectos_table', 1),
	('2016_02_15_192650_create_reporte_investigacion_table', 1),
	('2016_02_15_193014_create_metodo_difusion_table', 1),
	('2016_02_15_193243_create_tipo_capacitacion_riesgos_table', 1),
	('2016_02_15_193453_add_fk_to_reporte_investigacion_table', 1),
	('2016_02_15_195017_create_reporte_investigacionxmetodo_table', 1),
	('2016_02_15_195107_add_fk_to_reporte_investigacionxmetodo_table', 1),
	('2016_02_15_200307_create_reporte_investigacionxtipo_capacitacion_table', 1),
	('2016_02_15_200348_add_fk_to_reporte_investigacionxtipo_capacitacion_table', 1),
	('2016_02_16_195038_add_codigo_anho_to_eventos_adversos_table', 1),
	('2016_02_17_095345_add_ids_alcance_cronograma_presupuesto_to_proyectos_table', 1),
	('2016_02_17_111922_create_alcances_table', 1),
	('2016_02_17_113931_create_alcances_requerimientos_table', 1),
	('2016_02_17_114029_create_alcances_caracteristicas_table', 1),
	('2016_02_17_114109_create_alcances_criterios_table', 1),
	('2016_02_17_114156_create_alcances_entregables_table', 1),
	('2016_02_17_114258_create_alcances_exclusiones_table', 1),
	('2016_02_17_114358_create_alcances_restricciones_table', 1),
	('2016_02_17_114443_create_alcances_asunciones_table', 1),
	('2016_02_18_175400_create_tipo_iper_table', 1),
	('2016_02_18_175930_create_detalle_iper_table', 1),
	('2016_02_18_182313_create_ipers_table', 1),
	('2016_02_18_182346_add_fk_to_ipers_table', 1),
	('2016_02_18_182413_add_fk_to_detalle_iper_table', 1),
	('2016_02_18_224320_create_presupuestos_table', 1),
	('2016_02_18_234254_create_presupuestos_actividades_table', 1),
	('2016_02_19_111016_add_reporte_etes_to_reporte_cn_table', 1),
	('2016_02_19_111119_add_reporte_cn_to_reporte_priorizacion_table', 1),
	('2016_02_19_184445_alter_activos_table', 1),
	('2016_02_20_105429_create_cronogramas_table', 1),
	('2016_02_20_112424_create_cronogramas_actividades_table', 1),
	('2016_02_22_114623_create_planes_aprendizaje_table', 1),
	('2016_02_22_121119_create_planes_aprendizaje_actividades_table', 1),
	('2016_02_22_121201_create_planes_aprendizaje_recursos_table', 1),
	('2016_02_22_121709_alter_idactivo_to_eventos_adversos_table', 1),
	('2016_02_22_121934_add_fechas_to_reporte_calibracion_table', 1),
	('2016_02_23_121045_alter_fecha_garantia_fin_to_activos_table', 1),
	('2016_02_23_173451_create_reportes_seguimiento_table', 1),
	('2016_02_23_202509_create_trabajos_cronograma_table', 1),
	('2016_02_23_211805_create_trabajos_cronograma_actividades_table', 1),
	('2016_02_24_131143_add_reporte_cn_paac_to_documentospaac_table', 1),
	('2016_02_25_180346_create_informaciones_economicas_table', 1),
	('2016_02_25_180610_create_informaciones_economicas_actividades_table', 1),
	('2016_02_27_001920_create_plan_mejora__procesos_table', 1),
	('2016_02_27_002731_add_foreign_keys_to_plan_mejora_procesos_table', 1),
	('2016_02_27_193505_add_estado_to_reporte_calibracion_table', 1),
	('2016_02_28_154538_create_programacion_compra_adquisicion_table', 1),
	('2016_02_28_155249_create_tipo_compra_table', 1),
	('2016_02_28_155314_create_unidad_medida_table', 1),
	('2016_02_28_155519_add_foreign_keys_to_programacion_compra_adquisicion_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.modelo_activos
CREATE TABLE IF NOT EXISTS `modelo_activos` (
  `idmodelo_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idfamilia_activo` int(11) NOT NULL,
  PRIMARY KEY (`idmodelo_equipo`),
  KEY `fk_modelo_activos_familia_activos1_idx` (`idfamilia_activo`),
  CONSTRAINT `fk_modelo_activos_familia_activos1` FOREIGN KEY (`idfamilia_activo`) REFERENCES `familia_activos` (`idfamilia_activo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.modelo_activos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `modelo_activos` DISABLE KEYS */;
/*!40000 ALTER TABLE `modelo_activos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.motivo_retiros
CREATE TABLE IF NOT EXISTS `motivo_retiros` (
  `idmotivo_retiro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idmotivo_retiro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.motivo_retiros: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `motivo_retiros` DISABLE KEYS */;
/*!40000 ALTER TABLE `motivo_retiros` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.ot_busqueda_infos
CREATE TABLE IF NOT EXISTS `ot_busqueda_infos` (
  `idot_busqueda_info` int(11) NOT NULL AUTO_INCREMENT,
  `ot_tipo_abreviatura` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ot_correlativo` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idarea` int(11) NOT NULL,
  `id_usuariosolicitante` int(11) NOT NULL,
  `id_usuarioelaborador` int(11) NOT NULL,
  `id_usuarioencargado` int(11) NOT NULL,
  `fecha_conformidad` datetime DEFAULT NULL,
  `fecha_programacion` datetime DEFAULT NULL,
  `costo_total_personal` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idestado_ot` int(11) NOT NULL,
  `idsolicitud_busqueda_info` int(11) NOT NULL,
  PRIMARY KEY (`idot_busqueda_info`),
  KEY `fk_ot_busqueda_infos_areas1_idx` (`idarea`),
  KEY `fk_ot_busqueda_infos_users1_idx` (`id_usuariosolicitante`),
  KEY `fk_ot_busqueda_infos_users2_idx` (`id_usuarioelaborador`),
  KEY `fk_ot_busqueda_infos_users3_idx` (`id_usuarioencargado`),
  KEY `fk_ot_busqueda_infos_estados1_idx` (`idestado_ot`),
  KEY `fk_ot_busqueda_infos_solicitud_busqueda_infos1_idx` (`idsolicitud_busqueda_info`),
  CONSTRAINT `fk_ot_busqueda_infos_areas1` FOREIGN KEY (`idarea`) REFERENCES `areas` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_busqueda_infos_estados1` FOREIGN KEY (`idestado_ot`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_busqueda_infos_solicitud_busqueda_infos1` FOREIGN KEY (`idsolicitud_busqueda_info`) REFERENCES `solicitud_busqueda_infos` (`idsolicitud_busqueda_info`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_busqueda_infos_users1` FOREIGN KEY (`id_usuariosolicitante`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_busqueda_infos_users2` FOREIGN KEY (`id_usuarioelaborador`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_busqueda_infos_users3` FOREIGN KEY (`id_usuarioencargado`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.ot_busqueda_infos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ot_busqueda_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ot_busqueda_infos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.ot_correctivos
CREATE TABLE IF NOT EXISTS `ot_correctivos` (
  `idot_correctivo` int(11) NOT NULL AUTO_INCREMENT,
  `ot_tipo_abreviatura` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ot_correlativo` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_ficha` int(11) DEFAULT NULL,
  `ot_activo_abreviatura` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idubicacion_fisica` int(11) NOT NULL,
  `id_usuariosolicitante` int(11) NOT NULL,
  `id_usuarioelaborador` int(11) NOT NULL,
  `idsolicitud_orden_trabajo` int(11) NOT NULL,
  `idestado_inicial` int(11) DEFAULT NULL,
  `idestado_final` int(11) DEFAULT NULL,
  `idestado_ot` int(11) NOT NULL,
  `idactivo` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `idprioridad` int(11) NOT NULL,
  `idtipo_falla` int(11) NOT NULL,
  `fecha_conformidad` datetime DEFAULT NULL,
  `fecha_programacion` datetime DEFAULT NULL,
  `descripcion_problema` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diagnostico_falla` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_ejecutor` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_inicio_ejecucion` datetime DEFAULT NULL,
  `fecha_termino_ejecucion` datetime DEFAULT NULL,
  `sin_interrupcion_servicio` int(11) DEFAULT NULL,
  `costo_total_repuestos` double DEFAULT NULL,
  `costo_total_personal` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idot_correctivo`),
  KEY `fk_ot_correctivos_ubicacion_fisicas1_idx` (`idubicacion_fisica`),
  KEY `fk_ot_correctivos_users1_idx` (`id_usuariosolicitante`),
  KEY `fk_ot_correctivos_users2_idx` (`id_usuarioelaborador`),
  KEY `fk_ot_correctivos_solicitud_orden_trabajos1_idx` (`idsolicitud_orden_trabajo`),
  KEY `fk_ot_correctivos_estados1_idx` (`idestado_inicial`),
  KEY `fk_ot_correctivos_estados2_idx` (`idestado_final`),
  KEY `fk_ot_correctivos_estados3_idx` (`idestado_ot`),
  KEY `fk_ot_correctivos_activos1_idx` (`idactivo`),
  KEY `fk_ot_correctivos_servicios1_idx` (`idservicio`),
  KEY `fk_ot_correctivos_prioridades1_idx` (`idprioridad`),
  KEY `fk_ot_correctivos_tipo_fallas1_idx` (`idtipo_falla`),
  CONSTRAINT `fk_ot_correctivos_activos1` FOREIGN KEY (`idactivo`) REFERENCES `activos` (`idactivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_correctivos_estados1` FOREIGN KEY (`idestado_inicial`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_correctivos_estados2` FOREIGN KEY (`idestado_final`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_correctivos_estados3` FOREIGN KEY (`idestado_ot`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_correctivos_prioridades1` FOREIGN KEY (`idprioridad`) REFERENCES `prioridades` (`idprioridad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_correctivos_servicios1` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_correctivos_solicitud_orden_trabajos1` FOREIGN KEY (`idsolicitud_orden_trabajo`) REFERENCES `solicitud_orden_trabajos` (`idsolicitud_orden_trabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_correctivos_tipo_fallas1` FOREIGN KEY (`idtipo_falla`) REFERENCES `tipo_fallas` (`idtipo_falla`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_correctivos_ubicacion_fisicas1` FOREIGN KEY (`idubicacion_fisica`) REFERENCES `ubicacion_fisicas` (`idubicacion_fisica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_correctivos_users1` FOREIGN KEY (`id_usuariosolicitante`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_correctivos_users2` FOREIGN KEY (`id_usuarioelaborador`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.ot_correctivos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ot_correctivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ot_correctivos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.ot_inspec_equipos
CREATE TABLE IF NOT EXISTS `ot_inspec_equipos` (
  `idot_inspec_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `ot_tipo_abreviatura` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ot_correlativo` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_ficha` int(11) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  `idubicacion_fisica` int(11) DEFAULT NULL,
  `idservicio` int(11) NOT NULL,
  `id_ingeniero` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idot_inspec_equipo`),
  KEY `fk_ot_inspec_equipos_estados1_idx` (`idestado`),
  KEY `fk_ot_inspec_equipos_ubicacion_fisicas1_idx` (`idubicacion_fisica`),
  KEY `fk_ot_inspec_equipos_servicios1_idx` (`idservicio`),
  KEY `fk_ot_inspec_equipos_users1_idx` (`id_ingeniero`),
  CONSTRAINT `fk_ot_inspec_equipos_estados1` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_inspec_equipos_servicios1` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_inspec_equipos_ubicacion_fisicas1` FOREIGN KEY (`idubicacion_fisica`) REFERENCES `ubicacion_fisicas` (`idubicacion_fisica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_inspec_equipos_users1` FOREIGN KEY (`id_ingeniero`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.ot_inspec_equipos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ot_inspec_equipos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ot_inspec_equipos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.ot_inspec_equiposxactivos
CREATE TABLE IF NOT EXISTS `ot_inspec_equiposxactivos` (
  `idot_inspec_equiposxactivo` int(11) NOT NULL AUTO_INCREMENT,
  `idot_inspec_equipo` int(11) NOT NULL,
  `idactivo` int(11) NOT NULL,
  `observaciones` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagen_url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nombre_archivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idot_inspec_equiposxactivo`),
  KEY `fk_ot_inspec_equipos_has_activos_ot_inspec_equipos1_idx` (`idot_inspec_equipo`),
  KEY `fk_ot_inspec_equipos_has_activos_activos1_idx` (`idactivo`),
  CONSTRAINT `fk_ot_inspec_equipos_has_activos_activos1` FOREIGN KEY (`idactivo`) REFERENCES `activos` (`idactivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_inspec_equipos_has_activos_ot_inspec_equipos1` FOREIGN KEY (`idot_inspec_equipo`) REFERENCES `ot_inspec_equipos` (`idot_inspec_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.ot_inspec_equiposxactivos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ot_inspec_equiposxactivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ot_inspec_equiposxactivos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.ot_inspec_equiposxactivosxtareas_inspec_equipo
CREATE TABLE IF NOT EXISTS `ot_inspec_equiposxactivosxtareas_inspec_equipo` (
  `idot_inspec_equiposxactivosxtareas_inspec_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `idot_inspec_equiposxactivo` int(11) NOT NULL,
  `idtareas_inspec_equipo` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idestado_realizado` int(11) NOT NULL,
  PRIMARY KEY (`idot_inspec_equiposxactivosxtareas_inspec_equipo`),
  KEY `fk_ot_inspec_equiposxactivos_has_tareas_inspec_equipos_ot_i_idx` (`idot_inspec_equiposxactivo`),
  KEY `fk_ot_inspec_equiposxactivos_has_tareas_inspec_equipos_tare_idx` (`idtareas_inspec_equipo`),
  KEY `fk_ot_inspec_equiposxactivosxtareas_inspec_equipo_estados1_idx` (`idestado_realizado`),
  CONSTRAINT `fk_ot_inspec_equiposxactivos_has_tareas_inspec_equipos_ot_ins1` FOREIGN KEY (`idot_inspec_equiposxactivo`) REFERENCES `ot_inspec_equiposxactivos` (`idot_inspec_equiposxactivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_inspec_equiposxactivos_has_tareas_inspec_equipos_tareas1` FOREIGN KEY (`idtareas_inspec_equipo`) REFERENCES `tareas_inspec_equipos` (`idtareas_inspec_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_inspec_equiposxactivosxtareas_inspec_equipo_estados1` FOREIGN KEY (`idestado_realizado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.ot_inspec_equiposxactivosxtareas_inspec_equipo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ot_inspec_equiposxactivosxtareas_inspec_equipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `ot_inspec_equiposxactivosxtareas_inspec_equipo` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.ot_preventivos
CREATE TABLE IF NOT EXISTS `ot_preventivos` (
  `idot_preventivo` int(11) NOT NULL AUTO_INCREMENT,
  `ot_tipo_abreviatura` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ot_correlativo` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ot_activo_abreviatura` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_ficha` int(11) DEFAULT NULL,
  `id_usuariosolicitante` int(11) NOT NULL,
  `id_usuarioelaborador` int(11) NOT NULL,
  `idubicacion_fisica` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `idactivo` int(11) NOT NULL,
  `idestado_inicial` int(11) DEFAULT NULL,
  `idestado_final` int(11) DEFAULT NULL,
  `idestado_ot` int(11) NOT NULL,
  `fecha_conformidad` datetime DEFAULT NULL,
  `fecha_programacion` datetime DEFAULT NULL,
  `costo_total_repuestos` double DEFAULT NULL,
  `costo_total_personal` double DEFAULT NULL,
  `fecha_inicio_ejecucion` datetime DEFAULT NULL,
  `fecha_termino_ejecucion` datetime DEFAULT NULL,
  `sin_interrupcion_servicio` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nombre_ejecutor` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idot_preventivo`),
  KEY `fk_ot_preventivos_users1_idx` (`id_usuariosolicitante`),
  KEY `fk_ot_preventivos_users2_idx` (`id_usuarioelaborador`),
  KEY `fk_ot_preventivos_ubicacion_fisicas1_idx` (`idubicacion_fisica`),
  KEY `fk_ot_preventivos_servicios1_idx` (`idservicio`),
  KEY `fk_ot_preventivos_activos1_idx` (`idactivo`),
  KEY `fk_ot_preventivos_estados1_idx` (`idestado_inicial`),
  KEY `fk_ot_preventivos_estados2_idx` (`idestado_final`),
  KEY `fk_ot_preventivos_estados3_idx` (`idestado_ot`),
  CONSTRAINT `fk_ot_preventivos_activos1` FOREIGN KEY (`idactivo`) REFERENCES `activos` (`idactivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_preventivos_estados1` FOREIGN KEY (`idestado_inicial`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_preventivos_estados2` FOREIGN KEY (`idestado_final`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_preventivos_estados3` FOREIGN KEY (`idestado_ot`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_preventivos_servicios1` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_preventivos_ubicacion_fisicas1` FOREIGN KEY (`idubicacion_fisica`) REFERENCES `ubicacion_fisicas` (`idubicacion_fisica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_preventivos_users1` FOREIGN KEY (`id_usuariosolicitante`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_preventivos_users2` FOREIGN KEY (`id_usuarioelaborador`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.ot_preventivos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ot_preventivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ot_preventivos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.ot_retiros
CREATE TABLE IF NOT EXISTS `ot_retiros` (
  `idot_retiro` int(11) NOT NULL AUTO_INCREMENT,
  `ot_tipo_abreviatura` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ot_correlativo` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ot_activo_abreviatura` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_usuariosolicitante` int(11) NOT NULL,
  `id_usuarioelaborador` int(11) NOT NULL,
  `fecha_conformidad` datetime DEFAULT NULL,
  `fecha_programacion` datetime DEFAULT NULL,
  `nombre_ejecutor` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `costo_total_personal` double DEFAULT NULL,
  `idubicacion_fisica` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `idactivo` int(11) NOT NULL,
  `idestado_inicial` int(11) DEFAULT NULL,
  `idestado_final` int(11) DEFAULT NULL,
  `idestado_ot` int(11) NOT NULL,
  `idreporte_retiro` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idot_retiro`),
  KEY `fk_orden_trabajo_retiro_servicios_users1_idx` (`id_usuariosolicitante`),
  KEY `fk_orden_trabajo_retiro_servicios_users2_idx` (`id_usuarioelaborador`),
  KEY `fk_ot_retiros_ubicacion_fisicas1_idx` (`idubicacion_fisica`),
  KEY `fk_ot_retiros_servicios1_idx` (`idservicio`),
  KEY `fk_ot_retiros_activos1_idx` (`idactivo`),
  KEY `fk_ot_retiros_estados1_idx` (`idestado_inicial`),
  KEY `fk_ot_retiros_estados2_idx` (`idestado_final`),
  KEY `fk_ot_retiros_estados3_idx` (`idestado_ot`),
  KEY `fk_ot_retiros_reporte_retiros1_idx` (`idreporte_retiro`),
  CONSTRAINT `fk_orden_trabajo_retiro_servicios_users1` FOREIGN KEY (`id_usuariosolicitante`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orden_trabajo_retiro_servicios_users2` FOREIGN KEY (`id_usuarioelaborador`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_retiros_activos1` FOREIGN KEY (`idactivo`) REFERENCES `activos` (`idactivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_retiros_estados1` FOREIGN KEY (`idestado_inicial`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_retiros_estados2` FOREIGN KEY (`idestado_final`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_retiros_estados3` FOREIGN KEY (`idestado_ot`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_retiros_reporte_retiros1` FOREIGN KEY (`idreporte_retiro`) REFERENCES `reporte_retiros` (`idreporte_retiro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_retiros_servicios1` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_retiros_ubicacion_fisicas1` FOREIGN KEY (`idubicacion_fisica`) REFERENCES `ubicacion_fisicas` (`idubicacion_fisica`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.ot_retiros: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ot_retiros` DISABLE KEYS */;
/*!40000 ALTER TABLE `ot_retiros` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.ot_vmetrologicas
CREATE TABLE IF NOT EXISTS `ot_vmetrologicas` (
  `idot_vmetrologica` int(11) NOT NULL AUTO_INCREMENT,
  `ot_tipo_abreviatura` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ot_correlativo` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ot_activo_abreviatura` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_ficha` int(11) DEFAULT NULL,
  `idservicio` int(11) NOT NULL,
  `id_usuariosolicitante` int(11) NOT NULL,
  `id_usuarioelaborador` int(11) DEFAULT NULL,
  `idactivo` int(11) NOT NULL,
  `idestado_inicial` int(11) DEFAULT NULL,
  `idestado_final` int(11) DEFAULT NULL,
  `idestado_ot` int(11) NOT NULL,
  `idubicacion_fisica` int(11) NOT NULL,
  `fecha_programacion` datetime DEFAULT NULL,
  `fecha_conformidad` datetime DEFAULT NULL,
  `costo_total` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nombre_ejecutor` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idot_vmetrologica`),
  KEY `fk_ot_vmetrologicas_servicios1_idx` (`idservicio`),
  KEY `fk_ot_vmetrologicas_users1_idx` (`id_usuariosolicitante`),
  KEY `fk_ot_vmetrologicas_users2_idx` (`id_usuarioelaborador`),
  KEY `fk_ot_vmetrologicas_activos1_idx` (`idactivo`),
  KEY `fk_ot_vmetrologicas_estados1_idx` (`idestado_inicial`),
  KEY `fk_ot_vmetrologicas_estados2_idx` (`idestado_final`),
  KEY `fk_ot_vmetrologicas_estados3_idx` (`idestado_ot`),
  KEY `fk_ot_vmetrologicas_ubicacion_fisicas1_idx` (`idubicacion_fisica`),
  CONSTRAINT `fk_ot_vmetrologicas_activos1` FOREIGN KEY (`idactivo`) REFERENCES `activos` (`idactivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_vmetrologicas_estados1` FOREIGN KEY (`idestado_inicial`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_vmetrologicas_estados2` FOREIGN KEY (`idestado_final`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_vmetrologicas_estados3` FOREIGN KEY (`idestado_ot`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_vmetrologicas_servicios1` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_vmetrologicas_ubicacion_fisicas1` FOREIGN KEY (`idubicacion_fisica`) REFERENCES `ubicacion_fisicas` (`idubicacion_fisica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_vmetrologicas_users1` FOREIGN KEY (`id_usuariosolicitante`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ot_vmetrologicas_users2` FOREIGN KEY (`id_usuarioelaborador`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.ot_vmetrologicas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ot_vmetrologicas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ot_vmetrologicas` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.personal_ot_busqueda_infos
CREATE TABLE IF NOT EXISTS `personal_ot_busqueda_infos` (
  `idpersonal_ot_busqueda_info` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `horas_hombre` double NOT NULL,
  `costo` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idot_busqueda_info` int(11) NOT NULL,
  PRIMARY KEY (`idpersonal_ot_busqueda_info`),
  KEY `fk_personal_ot_busqueda_infos_ot_busqueda_infos1_idx` (`idot_busqueda_info`),
  CONSTRAINT `fk_personal_ot_busqueda_infos_ot_busqueda_infos1` FOREIGN KEY (`idot_busqueda_info`) REFERENCES `ot_busqueda_infos` (`idot_busqueda_info`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.personal_ot_busqueda_infos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personal_ot_busqueda_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_ot_busqueda_infos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.personal_ot_correctivos
CREATE TABLE IF NOT EXISTS `personal_ot_correctivos` (
  `idpersonal_ot_correctivo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `horas_hombre` double NOT NULL,
  `costo` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idot_correctivo` int(11) NOT NULL,
  PRIMARY KEY (`idpersonal_ot_correctivo`),
  KEY `fk_personal_ot_correctivos_ot_correctivos1_idx` (`idot_correctivo`),
  CONSTRAINT `fk_personal_ot_correctivos_ot_correctivos1` FOREIGN KEY (`idot_correctivo`) REFERENCES `ot_correctivos` (`idot_correctivo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.personal_ot_correctivos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personal_ot_correctivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_ot_correctivos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.personal_ot_preventivos
CREATE TABLE IF NOT EXISTS `personal_ot_preventivos` (
  `idpersonal_ot_preventivo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `horas_hombre` double NOT NULL,
  `costo` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idot_preventivo` int(11) NOT NULL,
  PRIMARY KEY (`idpersonal_ot_preventivo`),
  KEY `fk_personal_ot_preventivos_ot_preventivos1_idx` (`idot_preventivo`),
  CONSTRAINT `fk_personal_ot_preventivos_ot_preventivos1` FOREIGN KEY (`idot_preventivo`) REFERENCES `ot_preventivos` (`idot_preventivo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.personal_ot_preventivos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personal_ot_preventivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_ot_preventivos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.personal_ot_retiros
CREATE TABLE IF NOT EXISTS `personal_ot_retiros` (
  `idpersonal_ot_retiro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `horas_hombre` double NOT NULL,
  `costo` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idot_retiro` int(11) NOT NULL,
  PRIMARY KEY (`idpersonal_ot_retiro`),
  KEY `fk_personal_ot_retiros_ot_retiros1_idx` (`idot_retiro`),
  CONSTRAINT `fk_personal_ot_retiros_ot_retiros1` FOREIGN KEY (`idot_retiro`) REFERENCES `ot_retiros` (`idot_retiro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.personal_ot_retiros: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personal_ot_retiros` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_ot_retiros` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.personal_ot_vmetrologicas
CREATE TABLE IF NOT EXISTS `personal_ot_vmetrologicas` (
  `idpersonal_ot_vmetrologica` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `horas_hombre` double NOT NULL,
  `costo` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idot_vmetrologica` int(11) NOT NULL,
  PRIMARY KEY (`idpersonal_ot_vmetrologica`),
  KEY `fk_personal_ot_vmetrologicas_ot_vmetrologicas1_idx` (`idot_vmetrologica`),
  CONSTRAINT `fk_personal_ot_vmetrologicas_ot_vmetrologicas1` FOREIGN KEY (`idot_vmetrologica`) REFERENCES `ot_vmetrologicas` (`idot_vmetrologica`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.personal_ot_vmetrologicas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personal_ot_vmetrologicas` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_ot_vmetrologicas` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.personas_implicadas
CREATE TABLE IF NOT EXISTS `personas_implicadas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.personas_implicadas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personas_implicadas` DISABLE KEYS */;
/*!40000 ALTER TABLE `personas_implicadas` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.planes_aprendizaje
CREATE TABLE IF NOT EXISTS `planes_aprendizaje` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(10) unsigned NOT NULL,
  `id_servicio_clinico` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `personal` text COLLATE utf8_unicode_ci NOT NULL,
  `objetivo` text COLLATE utf8_unicode_ci NOT NULL,
  `competencias_requeridas` text COLLATE utf8_unicode_ci NOT NULL,
  `infraestructura` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equipos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `herramientas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `insumos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equipo_personal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `condiciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_proyecto` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.planes_aprendizaje: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `planes_aprendizaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `planes_aprendizaje` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.planes_aprendizaje_actividades
CREATE TABLE IF NOT EXISTS `planes_aprendizaje_actividades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `servicio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `duracion` int(11) NOT NULL,
  `id_plan` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.planes_aprendizaje_actividades: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `planes_aprendizaje_actividades` DISABLE KEYS */;
/*!40000 ALTER TABLE `planes_aprendizaje_actividades` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.planes_aprendizaje_recursos
CREATE TABLE IF NOT EXISTS `planes_aprendizaje_recursos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `competencia_generada` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `indicador` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_plan` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.planes_aprendizaje_recursos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `planes_aprendizaje_recursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `planes_aprendizaje_recursos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.plan_mejora_procesos
CREATE TABLE IF NOT EXISTS `plan_mejora_procesos` (
  `iddocumento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `autor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_archivamiento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idtipo_documento` int(11) NOT NULL,
  `nombre_archivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`iddocumento`),
  KEY `fk_documentos_tipo_documentos1_idx` (`idtipo_documento`),
  CONSTRAINT `fk_plan_mejora_procesos_tipo_documentos1` FOREIGN KEY (`idtipo_documento`) REFERENCES `tipo_documentos` (`idtipo_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.plan_mejora_procesos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `plan_mejora_procesos` DISABLE KEYS */;
/*!40000 ALTER TABLE `plan_mejora_procesos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.presupuestos
CREATE TABLE IF NOT EXISTS `presupuestos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(10) unsigned NOT NULL,
  `id_servicio_clinico` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `monto_restante` double(8,2) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `id_proyecto` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.presupuestos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `presupuestos` DISABLE KEYS */;
/*!40000 ALTER TABLE `presupuestos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.presupuestos_actividades
CREATE TABLE IF NOT EXISTS `presupuestos_actividades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo_unitario` double(8,2) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `id_tipo` int(10) unsigned NOT NULL,
  `id_clase` int(10) unsigned NOT NULL,
  `id_presupuesto` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.presupuestos_actividades: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `presupuestos_actividades` DISABLE KEYS */;
/*!40000 ALTER TABLE `presupuestos_actividades` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.prioridades
CREATE TABLE IF NOT EXISTS `prioridades` (
  `idprioridad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idprioridad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.prioridades: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `prioridades` DISABLE KEYS */;
/*!40000 ALTER TABLE `prioridades` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.procesos
CREATE TABLE IF NOT EXISTS `procesos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.procesos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `procesos` DISABLE KEYS */;
/*!40000 ALTER TABLE `procesos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.programacion_compra_adquisicion
CREATE TABLE IF NOT EXISTS `programacion_compra_adquisicion` (
  `idprogramacion_compra` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_compra` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_corta` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idtipo_compra` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idunidad_medida` int(11) NOT NULL,
  `costo_aproximado` double(10,2) NOT NULL,
  `idarea` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idresponsable` int(11) NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio_evaluacion` date NOT NULL,
  `fecha_aproximada_adquisicion` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idprogramacion_compra`),
  KEY `fk_programacion_compra_adquisicion_tipo_compra1_idx` (`idtipo_compra`),
  KEY `fk_programacion_compra_adquisicion_unidad_medida1_idx` (`idunidad_medida`),
  KEY `fk_programacion_compra_adquisicion_areas1_idx` (`idarea`),
  KEY `fk_programacion_compra_adquisicion_servicios1_idx` (`idservicio`),
  KEY `fk_programacion_compra_adquisicion_users1_idx` (`iduser`),
  KEY `fk_programacion_compra_adquisicion_users2_idx` (`idresponsable`),
  CONSTRAINT `fk_programacion_compra_adquisicion_areas1` FOREIGN KEY (`idarea`) REFERENCES `areas` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_programacion_compra_adquisicion_servicios1` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_programacion_compra_adquisicion_tipo_compra1` FOREIGN KEY (`idtipo_compra`) REFERENCES `tipo_compra` (`idtipo_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_programacion_compra_adquisicion_unidad_medida1` FOREIGN KEY (`idunidad_medida`) REFERENCES `unidad_medida` (`idunidad_medida`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_programacion_compra_adquisicion_users1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_programacion_compra_adquisicion_users2` FOREIGN KEY (`idresponsable`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.programacion_compra_adquisicion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `programacion_compra_adquisicion` DISABLE KEYS */;
/*!40000 ALTER TABLE `programacion_compra_adquisicion` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.programacion_guia_gpc
CREATE TABLE IF NOT EXISTS `programacion_guia_gpc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_reporte` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `id_estado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_guia` int(11) DEFAULT NULL,
  `fecha_publicacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `programacion_guia_gpc_iduser_foreign` (`iduser`),
  KEY `programacion_guia_gpc_id_tipo_foreign` (`id_tipo`),
  KEY `programacion_guia_gpc_id_estado_foreign` (`id_estado`),
  KEY `programacion_guia_gpc_id_guia_foreign` (`id_guia`),
  CONSTRAINT `programacion_guia_gpc_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estado_programacion_reportes` (`idestado_programacion_reportes`),
  CONSTRAINT `programacion_guia_gpc_id_guia_foreign` FOREIGN KEY (`id_guia`) REFERENCES `documentosinf` (`iddocumentosinf`),
  CONSTRAINT `programacion_guia_gpc_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.programacion_guia_gpc: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `programacion_guia_gpc` DISABLE KEYS */;
/*!40000 ALTER TABLE `programacion_guia_gpc` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.programacion_guia_ts
CREATE TABLE IF NOT EXISTS `programacion_guia_ts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_reporte` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `id_tipo` int(10) unsigned NOT NULL,
  `id_estado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_guia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `programacion_guia_ts_iduser_foreign` (`iduser`),
  KEY `programacion_guia_ts_id_tipo_foreign` (`id_tipo`),
  KEY `programacion_guia_ts_id_estado_foreign` (`id_estado`),
  KEY `programacion_guia_ts_id_guia_foreign` (`id_guia`),
  CONSTRAINT `programacion_guia_ts_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estado_programacion_reportes` (`idestado_programacion_reportes`),
  CONSTRAINT `programacion_guia_ts_id_guia_foreign` FOREIGN KEY (`id_guia`) REFERENCES `documentosinf` (`iddocumentosinf`),
  CONSTRAINT `programacion_guia_ts_id_tipo_foreign` FOREIGN KEY (`id_tipo`) REFERENCES `subtipo_documentosinf` (`id`),
  CONSTRAINT `programacion_guia_ts_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.programacion_guia_ts: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `programacion_guia_ts` DISABLE KEYS */;
/*!40000 ALTER TABLE `programacion_guia_ts` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.programacion_reporte_cn
CREATE TABLE IF NOT EXISTS `programacion_reporte_cn` (
  `idprogramacion_reporte_cn` int(11) NOT NULL AUTO_INCREMENT,
  `idarea` int(11) NOT NULL,
  `idservicio` int(11) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `idtipo_reporte_CN` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `nombre_reporte` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idestado_programacion_reportes` int(11) NOT NULL,
  PRIMARY KEY (`idprogramacion_reporte_cn`),
  KEY `fk_programacion_reporte_cn_areas1_idx` (`idarea`),
  KEY `fk_programacion_reporte_cn_servicios1_idx` (`idservicio`),
  KEY `fk_programacion_reporte_cn_users1_idx` (`iduser`),
  KEY `fk_programacion_reporte_cn_tipo_reporte_cn1_idx` (`idtipo_reporte_CN`),
  KEY `fk_programacion_reporte_cn_estado_programacion_reportes1_idx` (`idestado_programacion_reportes`),
  CONSTRAINT `fk_programacion_reporte_cn_areas1` FOREIGN KEY (`idarea`) REFERENCES `areas` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_programacion_reporte_cn_estado_programacion_reportes1` FOREIGN KEY (`idestado_programacion_reportes`) REFERENCES `estado_programacion_reportes` (`idestado_programacion_reportes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_programacion_reporte_cn_servicios1` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_programacion_reporte_cn_tipo_reporte_cn1` FOREIGN KEY (`idtipo_reporte_CN`) REFERENCES `tipo_reporte_cn` (`idtipo_reporte_CN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_programacion_reporte_cn_users1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.programacion_reporte_cn: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `programacion_reporte_cn` DISABLE KEYS */;
/*!40000 ALTER TABLE `programacion_reporte_cn` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.programacion_reporte_etes
CREATE TABLE IF NOT EXISTS `programacion_reporte_etes` (
  `idprogramacion_reporte_etes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_reporte` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `idtipo_reporte_ETES` int(11) NOT NULL,
  `idestado_programacion_reportes` int(11) NOT NULL,
  PRIMARY KEY (`idprogramacion_reporte_etes`),
  KEY `fk_programacion_reporte_etes_users1_idx` (`iduser`),
  KEY `fk_programacion_reporte_etes_tipo_reporte_etes1_idx` (`idtipo_reporte_ETES`),
  KEY `fk_programacion_reporte_etes_estado_programacion_reportes1_idx` (`idestado_programacion_reportes`),
  CONSTRAINT `fk_programacion_reporte_etes_estado_programacion_reportes1` FOREIGN KEY (`idestado_programacion_reportes`) REFERENCES `estado_programacion_reportes` (`idestado_programacion_reportes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_programacion_reporte_etes_tipo_reporte_etes1` FOREIGN KEY (`idtipo_reporte_ETES`) REFERENCES `tipo_reporte_etes` (`idtipo_reporte_ETES`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_programacion_reporte_etes_users1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.programacion_reporte_etes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `programacion_reporte_etes` DISABLE KEYS */;
/*!40000 ALTER TABLE `programacion_reporte_etes` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.programacion_reporte_paac
CREATE TABLE IF NOT EXISTS `programacion_reporte_paac` (
  `idprogramacion_reporte_paac` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_reporte` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idtipo_reporte_PAAC` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idservicio` int(11) DEFAULT NULL,
  `idarea` int(11) NOT NULL,
  `idestado_programacion_reportes` int(11) NOT NULL,
  PRIMARY KEY (`idprogramacion_reporte_paac`),
  KEY `fk_programacion_reporte_paac_tipo_reporte_paac1_idx` (`idtipo_reporte_PAAC`),
  KEY `fk_programacion_reporte_paac_users1_idx` (`iduser`),
  KEY `fk_programacion_reporte_paac_servicios1_idx` (`idservicio`),
  KEY `fk_programacion_reporte_paac_areas1_idx` (`idarea`),
  KEY `fk_programacion_reporte_paac_estado_programacion_reportes1_idx` (`idestado_programacion_reportes`),
  CONSTRAINT `fk_programacion_reporte_paac_areas1` FOREIGN KEY (`idarea`) REFERENCES `areas` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_programacion_reporte_paac_estado_programacion_reportes1` FOREIGN KEY (`idestado_programacion_reportes`) REFERENCES `estado_programacion_reportes` (`idestado_programacion_reportes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_programacion_reporte_paac_servicios1` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_programacion_reporte_paac_tipo_reporte_paac1` FOREIGN KEY (`idtipo_reporte_PAAC`) REFERENCES `tipo_reporte_paac` (`idtipo_reporte_PAAC`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_programacion_reporte_paac_users1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.programacion_reporte_paac: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `programacion_reporte_paac` DISABLE KEYS */;
/*!40000 ALTER TABLE `programacion_reporte_paac` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.proveedores
CREATE TABLE IF NOT EXISTS `proveedores` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `ruc` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `razon_social` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_contacto` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idproveedor`),
  KEY `fk_proveedores_estados1_idx` (`idestado`),
  CONSTRAINT `fk_proveedores_estados1` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.proveedores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.proyectos
CREATE TABLE IF NOT EXISTS `proyectos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(10) unsigned NOT NULL,
  `id_servicio_clinico` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `proposito` text COLLATE utf8_unicode_ci NOT NULL,
  `metodologia` text COLLATE utf8_unicode_ci NOT NULL,
  `objetivos` text COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `id_requerimiento` int(10) unsigned NOT NULL,
  `id_presupuesto` int(10) unsigned DEFAULT NULL,
  `id_alcance` int(10) unsigned DEFAULT NULL,
  `id_cronograma` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.proyectos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.proyectos_aprobaciones
CREATE TABLE IF NOT EXISTS `proyectos_aprobaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `id_proyecto` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.proyectos_aprobaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyectos_aprobaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos_aprobaciones` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.proyectos_asunciones
CREATE TABLE IF NOT EXISTS `proyectos_asunciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_proyecto` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.proyectos_asunciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyectos_asunciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos_asunciones` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.proyectos_cronogramas
CREATE TABLE IF NOT EXISTS `proyectos_cronogramas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_proyecto` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.proyectos_cronogramas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyectos_cronogramas` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos_cronogramas` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.proyectos_entidades
CREATE TABLE IF NOT EXISTS `proyectos_entidades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_proyecto` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.proyectos_entidades: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyectos_entidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos_entidades` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.proyectos_personal
CREATE TABLE IF NOT EXISTS `proyectos_personal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `id_proyecto` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.proyectos_personal: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyectos_personal` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos_personal` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.proyectos_presupuestos
CREATE TABLE IF NOT EXISTS `proyectos_presupuestos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto` double NOT NULL,
  `id_proyecto` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.proyectos_presupuestos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyectos_presupuestos` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos_presupuestos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.proyectos_requerimientos
CREATE TABLE IF NOT EXISTS `proyectos_requerimientos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_proyecto` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.proyectos_requerimientos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyectos_requerimientos` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos_requerimientos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.proyectos_restricciones
CREATE TABLE IF NOT EXISTS `proyectos_restricciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_proyecto` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.proyectos_restricciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyectos_restricciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos_restricciones` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.proyectos_riesgos
CREATE TABLE IF NOT EXISTS `proyectos_riesgos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_proyecto` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.proyectos_riesgos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyectos_riesgos` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos_riesgos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.proyecto_categorias
CREATE TABLE IF NOT EXISTS `proyecto_categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.proyecto_categorias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyecto_categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyecto_categorias` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.reportes_desarrollo
CREATE TABLE IF NOT EXISTS `reportes_desarrollo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(10) unsigned NOT NULL,
  `id_servicio_clinico` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `indicadores` text COLLATE utf8_unicode_ci NOT NULL,
  `objetivos` text COLLATE utf8_unicode_ci NOT NULL,
  `id_requerimiento` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.reportes_desarrollo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reportes_desarrollo` DISABLE KEYS */;
/*!40000 ALTER TABLE `reportes_desarrollo` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.reportes_desarrollo_indicadores
CREATE TABLE IF NOT EXISTS `reportes_desarrollo_indicadores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `base` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `definicion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reporte_id` int(10) unsigned NOT NULL,
  `dimension_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.reportes_desarrollo_indicadores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reportes_desarrollo_indicadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `reportes_desarrollo_indicadores` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.reportes_seguimiento
CREATE TABLE IF NOT EXISTS `reportes_seguimiento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_servicio_clinico` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `id_proyecto` int(10) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_cronograma` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.reportes_seguimiento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reportes_seguimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `reportes_seguimiento` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.reporte_calibracion
CREATE TABLE IF NOT EXISTS `reporte_calibracion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_abreviatura` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_correlativo` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_anho` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `idactivo` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `fecha_calibracion` date DEFAULT NULL,
  `fecha_proxima_calibracion` date DEFAULT NULL,
  `idestado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reporte_calibracion_idactivo_foreign` (`idactivo`),
  KEY `reporte_calibracion_idestado_foreign` (`idestado`),
  CONSTRAINT `reporte_calibracion_idactivo_foreign` FOREIGN KEY (`idactivo`) REFERENCES `activos` (`idactivo`),
  CONSTRAINT `reporte_calibracion_idestado_foreign` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idestado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.reporte_calibracion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reporte_calibracion` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporte_calibracion` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.reporte_cn
CREATE TABLE IF NOT EXISTS `reporte_cn` (
  `idreporte_CN` int(11) NOT NULL AUTO_INCREMENT,
  `numero_reporte_abreviatura` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `numero_reporte_correlativo` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `numero_reporte_anho` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idot_retiro` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idprogramacion_reporte_cn` int(11) NOT NULL,
  `idreporte_etes1` int(11) DEFAULT NULL,
  `idreporte_etes2` int(11) DEFAULT NULL,
  `idreporte_etes3` int(11) DEFAULT NULL,
  `idreporte_etes4` int(11) DEFAULT NULL,
  `idreporte_etes5` int(11) DEFAULT NULL,
  PRIMARY KEY (`idreporte_CN`),
  KEY `fk_reporte_CN_ot_retiros1_idx` (`idot_retiro`),
  KEY `fk_reporte_cn_programacion_reporte_cn1_idx` (`idprogramacion_reporte_cn`),
  CONSTRAINT `fk_reporte_CN_ot_retiros1` FOREIGN KEY (`idot_retiro`) REFERENCES `ot_retiros` (`idot_retiro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporte_cn_programacion_reporte_cn1` FOREIGN KEY (`idprogramacion_reporte_cn`) REFERENCES `programacion_reporte_cn` (`idprogramacion_reporte_cn`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.reporte_cn: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reporte_cn` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporte_cn` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.reporte_etes
CREATE TABLE IF NOT EXISTS `reporte_etes` (
  `idreporte_ETES` int(11) NOT NULL AUTO_INCREMENT,
  `numero_reporte_abreviatura` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `numero_reporte_correlativo` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `numero_reporte_anho` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idprogramacion_reporte_etes` int(11) NOT NULL,
  PRIMARY KEY (`idreporte_ETES`),
  KEY `fk_reporte_etes_programacion_reporte_etes1_idx` (`idprogramacion_reporte_etes`),
  CONSTRAINT `fk_reporte_etes_programacion_reporte_etes1` FOREIGN KEY (`idprogramacion_reporte_etes`) REFERENCES `programacion_reporte_etes` (`idprogramacion_reporte_etes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.reporte_etes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reporte_etes` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporte_etes` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.reporte_financiamiento
CREATE TABLE IF NOT EXISTS `reporte_financiamiento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(10) unsigned NOT NULL,
  `id_servicio_clinico` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `objetivos` text COLLATE utf8_unicode_ci NOT NULL,
  `impacto` text COLLATE utf8_unicode_ci NOT NULL,
  `costo_beneficio` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `duracion` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reporte_financiamiento_id_categoria_foreign` (`id_categoria`),
  KEY `reporte_financiamiento_id_servicio_clinico_foreign` (`id_servicio_clinico`),
  KEY `reporte_financiamiento_id_departamento_foreign` (`id_departamento`),
  KEY `reporte_financiamiento_id_responsable_foreign` (`id_responsable`),
  CONSTRAINT `reporte_financiamiento_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `proyecto_categorias` (`id`),
  CONSTRAINT `reporte_financiamiento_id_departamento_foreign` FOREIGN KEY (`id_departamento`) REFERENCES `areas` (`idarea`),
  CONSTRAINT `reporte_financiamiento_id_responsable_foreign` FOREIGN KEY (`id_responsable`) REFERENCES `users` (`id`),
  CONSTRAINT `reporte_financiamiento_id_servicio_clinico_foreign` FOREIGN KEY (`id_servicio_clinico`) REFERENCES `servicios` (`idservicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.reporte_financiamiento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reporte_financiamiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporte_financiamiento` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.reporte_financiamiento_cronogramas
CREATE TABLE IF NOT EXISTS `reporte_financiamiento_cronogramas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `duracion` int(11) NOT NULL,
  `id_reporte` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reporte_financiamiento_cronogramas_id_reporte_foreign` (`id_reporte`),
  CONSTRAINT `reporte_financiamiento_cronogramas_id_reporte_foreign` FOREIGN KEY (`id_reporte`) REFERENCES `reporte_financiamiento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.reporte_financiamiento_cronogramas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reporte_financiamiento_cronogramas` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporte_financiamiento_cronogramas` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.reporte_financiamiento_inversiones
CREATE TABLE IF NOT EXISTS `reporte_financiamiento_inversiones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `costo` double(8,2) NOT NULL,
  `id_reporte` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reporte_financiamiento_inversiones_id_reporte_foreign` (`id_reporte`),
  CONSTRAINT `reporte_financiamiento_inversiones_id_reporte_foreign` FOREIGN KEY (`id_reporte`) REFERENCES `reporte_financiamiento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.reporte_financiamiento_inversiones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reporte_financiamiento_inversiones` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporte_financiamiento_inversiones` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.reporte_incumplimientos
CREATE TABLE IF NOT EXISTS `reporte_incumplimientos` (
  `idreporte_incumplimiento` int(11) NOT NULL AUTO_INCREMENT,
  `numero_reporte_abreviatura` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `numero_reporte_correlativo` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `numero_reporte_anho` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_reporte` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `descripcion_corta` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion_servicio` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `costo_generado` double NOT NULL,
  `accion_correctiva` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flag_reincidente` int(11) NOT NULL,
  `acciones` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resultados` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idservicio` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `id_elaborado` int(11) NOT NULL,
  `id_autorizado` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  `codigo_ot` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idreporte_incumplimiento`),
  KEY `fk_reporte_incumplimientos_servicios1_idx` (`idservicio`),
  KEY `fk_reporte_incumplimientos_proveedores1_idx` (`idproveedor`),
  KEY `fk_reporte_incumplimientos_users1_idx` (`id_responsable`),
  KEY `fk_reporte_incumplimientos_users2_idx` (`id_elaborado`),
  KEY `fk_reporte_incumplimientos_users3_idx` (`id_autorizado`),
  KEY `fk_reporte_incumplimientos_estados1_idx` (`idestado`),
  CONSTRAINT `fk_reporte_incumplimientos_estados1` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporte_incumplimientos_proveedores1` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporte_incumplimientos_servicios1` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporte_incumplimientos_users1` FOREIGN KEY (`id_responsable`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporte_incumplimientos_users2` FOREIGN KEY (`id_elaborado`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporte_incumplimientos_users3` FOREIGN KEY (`id_autorizado`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.reporte_incumplimientos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reporte_incumplimientos` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporte_incumplimientos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.reporte_instalaciones
CREATE TABLE IF NOT EXISTS `reporte_instalaciones` (
  `idreporte_instalacion` int(11) NOT NULL AUTO_INCREMENT,
  `numero_reporte_abreviatura` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `numero_reporte_correlativo` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `numero_reporte_anho` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idtipo_reporte_instalacion` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `codigo_compra` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idproveedor` int(11) NOT NULL,
  `idarea` int(11) NOT NULL,
  `idreporte_instalacion_entorno_concluido` int(11) DEFAULT NULL,
  PRIMARY KEY (`idreporte_instalacion`),
  KEY `fk_reporte_instalaciones_tipo_reporte_instalaciones1_idx` (`idtipo_reporte_instalacion`),
  KEY `fk_reporte_instalaciones_estados1_idx` (`idestado`),
  KEY `fk_reporte_instalaciones_users1_idx` (`id_responsable`),
  KEY `fk_reporte_instalaciones_proveedores1_idx` (`idproveedor`),
  KEY `fk_reporte_instalaciones_areas1_idx` (`idarea`),
  KEY `fk_reporte_instalaciones_reporte_instalaciones1_idx` (`idreporte_instalacion_entorno_concluido`),
  CONSTRAINT `fk_reporte_instalaciones_areas1` FOREIGN KEY (`idarea`) REFERENCES `areas` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporte_instalaciones_estados1` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporte_instalaciones_proveedores1` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporte_instalaciones_reporte_instalaciones1` FOREIGN KEY (`idreporte_instalacion_entorno_concluido`) REFERENCES `reporte_instalaciones` (`idreporte_instalacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporte_instalaciones_tipo_reporte_instalaciones1` FOREIGN KEY (`idtipo_reporte_instalacion`) REFERENCES `tipo_reporte_instalaciones` (`idtipo_reporte_instalacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporte_instalaciones_users1` FOREIGN KEY (`id_responsable`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.reporte_instalaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reporte_instalaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporte_instalaciones` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.reporte_investigacion
CREATE TABLE IF NOT EXISTS `reporte_investigacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_abreviatura` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_correlativo` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_anho` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_reportante` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idevento_adverso` int(10) unsigned NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idusuario_elaborador` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reporte_investigacion_idevento_adverso_foreign` (`idevento_adverso`),
  KEY `reporte_investigacion_idusuario_elaborador_foreign` (`idusuario_elaborador`),
  CONSTRAINT `reporte_investigacion_idevento_adverso_foreign` FOREIGN KEY (`idevento_adverso`) REFERENCES `eventos_adversos` (`id`),
  CONSTRAINT `reporte_investigacion_idusuario_elaborador_foreign` FOREIGN KEY (`idusuario_elaborador`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.reporte_investigacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reporte_investigacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporte_investigacion` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.reporte_investigacionxmetodo
CREATE TABLE IF NOT EXISTS `reporte_investigacionxmetodo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idreporte` int(10) unsigned NOT NULL,
  `idmetodo` int(10) unsigned NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reporte_investigacionxmetodo_idreporte_foreign` (`idreporte`),
  KEY `reporte_investigacionxmetodo_idmetodo_foreign` (`idmetodo`),
  CONSTRAINT `reporte_investigacionxmetodo_idmetodo_foreign` FOREIGN KEY (`idmetodo`) REFERENCES `metodo_difusion` (`id`),
  CONSTRAINT `reporte_investigacionxmetodo_idreporte_foreign` FOREIGN KEY (`idreporte`) REFERENCES `reporte_investigacion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.reporte_investigacionxmetodo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reporte_investigacionxmetodo` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporte_investigacionxmetodo` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.reporte_investigacionxtipo_capacitacion
CREATE TABLE IF NOT EXISTS `reporte_investigacionxtipo_capacitacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idreporte` int(10) unsigned NOT NULL,
  `idtipo` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reporte_investigacionxtipo_capacitacion_idreporte_foreign` (`idreporte`),
  KEY `reporte_investigacionxtipo_capacitacion_idtipo_foreign` (`idtipo`),
  CONSTRAINT `reporte_investigacionxtipo_capacitacion_idreporte_foreign` FOREIGN KEY (`idreporte`) REFERENCES `reporte_investigacion` (`id`),
  CONSTRAINT `reporte_investigacionxtipo_capacitacion_idtipo_foreign` FOREIGN KEY (`idtipo`) REFERENCES `tipo_capacitacion_riesgos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.reporte_investigacionxtipo_capacitacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reporte_investigacionxtipo_capacitacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporte_investigacionxtipo_capacitacion` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.reporte_paac
CREATE TABLE IF NOT EXISTS `reporte_paac` (
  `idreporte_PAAC` int(11) NOT NULL AUTO_INCREMENT,
  `numero_reporte_abreviatura` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `numero_reporte_correlativo` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `numero_reporte_anho` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idprogramacion_reporte_paac` int(11) NOT NULL,
  PRIMARY KEY (`idreporte_PAAC`),
  KEY `fk_reporte_paac_programacion_reporte_paac1_idx` (`idprogramacion_reporte_paac`),
  CONSTRAINT `fk_reporte_paac_programacion_reporte_paac1` FOREIGN KEY (`idprogramacion_reporte_paac`) REFERENCES `programacion_reporte_paac` (`idprogramacion_reporte_paac`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.reporte_paac: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reporte_paac` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporte_paac` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.reporte_priorizacion
CREATE TABLE IF NOT EXISTS `reporte_priorizacion` (
  `idreporte_priorizacion` int(11) NOT NULL AUTO_INCREMENT,
  `numero_reporte_abreviatura` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `numero_reporte_correlativo` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `numero_reporte_anho` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `idarea` int(11) NOT NULL,
  `idservicio` int(11) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo_encriptado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idreporte_cn1` int(11) DEFAULT NULL,
  `idreporte_cn2` int(11) DEFAULT NULL,
  `idreporte_cn3` int(11) DEFAULT NULL,
  `idreporte_cn4` int(11) DEFAULT NULL,
  `idreporte_cn5` int(11) DEFAULT NULL,
  PRIMARY KEY (`idreporte_priorizacion`),
  KEY `fk_reporte_priorizacion_areas1_idx` (`idarea`),
  KEY `fk_reporte_priorizacion_servicios1_idx` (`idservicio`),
  KEY `fk_reporte_priorizacion_users1_idx` (`iduser`),
  CONSTRAINT `fk_reporte_priorizacion_areas1` FOREIGN KEY (`idarea`) REFERENCES `areas` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporte_priorizacion_servicios1` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporte_priorizacion_users1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.reporte_priorizacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reporte_priorizacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporte_priorizacion` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.reporte_retiros
CREATE TABLE IF NOT EXISTS `reporte_retiros` (
  `idreporte_retiro` int(11) NOT NULL AUTO_INCREMENT,
  `reporte_tipo_abreviatura` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reporte_correlativo` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reporte_activo_abreviatura` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idactivo` int(11) NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idmotivo_retiro` int(11) NOT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `costo` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idreporte_retiro`),
  KEY `fk_reporte_retiros_activos1_idx` (`idactivo`),
  KEY `fk_reporte_retiros_motivo_retiros1_idx` (`idmotivo_retiro`),
  CONSTRAINT `fk_reporte_retiros_activos1` FOREIGN KEY (`idactivo`) REFERENCES `activos` (`idactivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporte_retiros_motivo_retiros1` FOREIGN KEY (`idmotivo_retiro`) REFERENCES `motivo_retiros` (`idmotivo_retiro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.reporte_retiros: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reporte_retiros` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporte_retiros` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.repuestos_ot_correctivo
CREATE TABLE IF NOT EXISTS `repuestos_ot_correctivo` (
  `idrepuestos_ot_correctivo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codigo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `costo` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idot_correctivo` int(11) NOT NULL,
  PRIMARY KEY (`idrepuestos_ot_correctivo`),
  KEY `fk_repuestos_ot_correctivo_ot_correctivos1_idx` (`idot_correctivo`),
  CONSTRAINT `fk_repuestos_ot_correctivo_ot_correctivos1` FOREIGN KEY (`idot_correctivo`) REFERENCES `ot_correctivos` (`idot_correctivo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.repuestos_ot_correctivo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `repuestos_ot_correctivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `repuestos_ot_correctivo` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.repuestos_ot_preventivos
CREATE TABLE IF NOT EXISTS `repuestos_ot_preventivos` (
  `idrepuestos_ot_preventivo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codigo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `costo` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idot_preventivo` int(11) NOT NULL,
  PRIMARY KEY (`idrepuestos_ot_preventivo`),
  KEY `fk_repuestos_ot_preventivos_ot_preventivos1_idx` (`idot_preventivo`),
  CONSTRAINT `fk_repuestos_ot_preventivos_ot_preventivos1` FOREIGN KEY (`idot_preventivo`) REFERENCES `ot_preventivos` (`idot_preventivo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.repuestos_ot_preventivos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `repuestos_ot_preventivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `repuestos_ot_preventivos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.requerimientos_clinicos
CREATE TABLE IF NOT EXISTS `requerimientos_clinicos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(10) unsigned NOT NULL,
  `id_servicio_clinico` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `presupuesto` double(8,2) NOT NULL,
  `tipo` int(11) NOT NULL,
  `observaciones` text COLLATE utf8_unicode_ci NOT NULL,
  `id_estado` int(10) unsigned NOT NULL,
  `id_reporte` int(10) unsigned NOT NULL,
  `id_modificador` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `requerimientos_clinicos_id_categoria_foreign` (`id_categoria`),
  KEY `requerimientos_clinicos_id_servicio_clinico_foreign` (`id_servicio_clinico`),
  KEY `requerimientos_clinicos_id_departamento_foreign` (`id_departamento`),
  KEY `requerimientos_clinicos_id_responsable_foreign` (`id_responsable`),
  KEY `requerimientos_clinicos_id_estado_foreign` (`id_estado`),
  KEY `requerimientos_clinicos_id_reporte_foreign` (`id_reporte`),
  KEY `requerimientos_clinicos_id_modificador_foreign` (`id_modificador`),
  CONSTRAINT `requerimientos_clinicos_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `proyecto_categorias` (`id`),
  CONSTRAINT `requerimientos_clinicos_id_departamento_foreign` FOREIGN KEY (`id_departamento`) REFERENCES `areas` (`idarea`),
  CONSTRAINT `requerimientos_clinicos_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `requerimientos_clinicos_estados` (`id`),
  CONSTRAINT `requerimientos_clinicos_id_modificador_foreign` FOREIGN KEY (`id_modificador`) REFERENCES `users` (`id`),
  CONSTRAINT `requerimientos_clinicos_id_reporte_foreign` FOREIGN KEY (`id_reporte`) REFERENCES `reporte_financiamiento` (`id`),
  CONSTRAINT `requerimientos_clinicos_id_responsable_foreign` FOREIGN KEY (`id_responsable`) REFERENCES `users` (`id`),
  CONSTRAINT `requerimientos_clinicos_id_servicio_clinico_foreign` FOREIGN KEY (`id_servicio_clinico`) REFERENCES `servicios` (`idservicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.requerimientos_clinicos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `requerimientos_clinicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `requerimientos_clinicos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.requerimientos_clinicos_estados
CREATE TABLE IF NOT EXISTS `requerimientos_clinicos_estados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.requerimientos_clinicos_estados: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `requerimientos_clinicos_estados` DISABLE KEYS */;
/*!40000 ALTER TABLE `requerimientos_clinicos_estados` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.roles: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`idrol`, `nombre`, `descripcion`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Admin', 'Admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.servicios
CREATE TABLE IF NOT EXISTS `servicios` (
  `idservicio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idtipo_servicios` int(11) NOT NULL,
  `idarea` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  `id_usuario_responsable` int(11) NOT NULL,
  PRIMARY KEY (`idservicio`),
  KEY `fk_servicios_tipo_servicios1_idx` (`idtipo_servicios`),
  KEY `fk_servicios_areas1_idx` (`idarea`),
  KEY `fk_servicios_estados1_idx` (`idestado`),
  KEY `fk_servicios_users1_idx` (`id_usuario_responsable`),
  CONSTRAINT `fk_servicios_areas1` FOREIGN KEY (`idarea`) REFERENCES `areas` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicios_estados1` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicios_tipo_servicios1` FOREIGN KEY (`idtipo_servicios`) REFERENCES `tipo_servicios` (`idtipo_servicios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicios_users1` FOREIGN KEY (`id_usuario_responsable`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.servicios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.solicitud_busqueda_infos
CREATE TABLE IF NOT EXISTS `solicitud_busqueda_infos` (
  `idsolicitud_busqueda_info` int(11) NOT NULL AUTO_INCREMENT,
  `sot_tipo_abreviatura` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sot_correlativo` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_solicitud` datetime DEFAULT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `motivo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `detalle` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id` int(11) NOT NULL,
  `id_usuarioencargado` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  `idarea` int(11) NOT NULL,
  `idtipo_busqueda_info` int(11) NOT NULL,
  PRIMARY KEY (`idsolicitud_busqueda_info`),
  KEY `fk_solicitud_busqueda_infos_users1_idx` (`id_usuarioencargado`),
  KEY `fk_solicitud_busqueda_infos_areas1_idx` (`idarea`),
  KEY `fk_solicitud_busqueda_infos_tipo_busqueda_infos1_idx` (`idtipo_busqueda_info`),
  CONSTRAINT `fk_solicitud_busqueda_infos_areas1` FOREIGN KEY (`idarea`) REFERENCES `areas` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_busqueda_infos_tipo_busqueda_infos1` FOREIGN KEY (`idtipo_busqueda_info`) REFERENCES `tipo_busqueda_infos` (`idtipo_busqueda_info`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_busqueda_infos_users1` FOREIGN KEY (`id_usuarioencargado`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.solicitud_busqueda_infos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `solicitud_busqueda_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud_busqueda_infos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.solicitud_compras
CREATE TABLE IF NOT EXISTS `solicitud_compras` (
  `idsolicitud_compra` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_ot` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idtipo_solicitud_compra` int(11) NOT NULL,
  `idfamilia_activo` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `sustento` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idservicio` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_responsable` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idsolicitud_compra`),
  KEY `fk_solicitud_compras_tipo_solicitud_compras1_idx` (`idtipo_solicitud_compra`),
  KEY `fk_solicitud_compras_familia_activos1_idx` (`idfamilia_activo`),
  KEY `fk_solicitud_compras_servicios1_idx` (`idservicio`),
  KEY `fk_solicitud_compras_users1_idx` (`id_responsable`),
  KEY `fk_solicitud_compras_estados1_idx` (`idestado`),
  CONSTRAINT `fk_solicitud_compras_estados1` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_compras_familia_activos1` FOREIGN KEY (`idfamilia_activo`) REFERENCES `familia_activos` (`idfamilia_activo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_compras_servicios1` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_compras_tipo_solicitud_compras1` FOREIGN KEY (`idtipo_solicitud_compra`) REFERENCES `tipo_solicitud_compras` (`idtipo_solicitud_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_compras_users1` FOREIGN KEY (`id_responsable`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.solicitud_compras: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `solicitud_compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud_compras` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.solicitud_orden_trabajos
CREATE TABLE IF NOT EXISTS `solicitud_orden_trabajos` (
  `idsolicitud_orden_trabajo` int(11) NOT NULL AUTO_INCREMENT,
  `sot_tipo_abreviatura` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sot_correlativo` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sot_activo_abreviatura` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_solicitud` datetime DEFAULT NULL,
  `especificacion_servicio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `motivo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `justificacion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  `idactivo` int(11) NOT NULL,
  PRIMARY KEY (`idsolicitud_orden_trabajo`),
  KEY `fk_solicitud_orden_trabajos_users1_idx` (`id`),
  KEY `fk_solicitud_orden_trabajos_estados1_idx` (`idestado`),
  KEY `fk_solicitud_orden_trabajos_activos1_idx` (`idactivo`),
  CONSTRAINT `fk_solicitud_orden_trabajos_activos1` FOREIGN KEY (`idactivo`) REFERENCES `activos` (`idactivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_orden_trabajos_estados1` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_orden_trabajos_users1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.solicitud_orden_trabajos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `solicitud_orden_trabajos` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud_orden_trabajos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.soporte_tecnicos
CREATE TABLE IF NOT EXISTS `soporte_tecnicos` (
  `idsoporte_tecnico` int(11) NOT NULL AUTO_INCREMENT,
  `numero_doc_identidad` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_pat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_mat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `especialidad` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `idtipo_documento` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idsoporte_tecnico`),
  KEY `fk_soporte_tecnicos_tipo_doc_identidades1_idx` (`idtipo_documento`),
  KEY `fk_soporte_tecnicos_proveedores1_idx` (`idproveedor`),
  CONSTRAINT `fk_soporte_tecnicos_proveedores1` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_soporte_tecnicos_tipo_doc_identidades1` FOREIGN KEY (`idtipo_documento`) REFERENCES `tipo_doc_identidades` (`idtipo_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.soporte_tecnicos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `soporte_tecnicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `soporte_tecnicos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.soporte_tecnicosxactivos
CREATE TABLE IF NOT EXISTS `soporte_tecnicosxactivos` (
  `idsoporte_tecnicosxactivo` int(11) NOT NULL AUTO_INCREMENT,
  `idsoporte_tecnico` int(11) NOT NULL,
  `idactivo` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idsoporte_tecnicosxactivo`),
  KEY `fk_soporte_tecnicos_has_activos_soporte_tecnicos1_idx` (`idsoporte_tecnico`),
  KEY `fk_soporte_tecnicos_has_activos_activos1_idx` (`idactivo`),
  KEY `fk_soporte_tecnicosxactivos_estados1_idx` (`idestado`),
  CONSTRAINT `fk_soporte_tecnicos_has_activos_activos1` FOREIGN KEY (`idactivo`) REFERENCES `activos` (`idactivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_soporte_tecnicos_has_activos_soporte_tecnicos1` FOREIGN KEY (`idsoporte_tecnico`) REFERENCES `soporte_tecnicos` (`idsoporte_tecnico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_soporte_tecnicosxactivos_estados1` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.soporte_tecnicosxactivos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `soporte_tecnicosxactivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `soporte_tecnicosxactivos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.subtipohijo_incidente
CREATE TABLE IF NOT EXISTS `subtipohijo_incidente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idsubtipopadre_incidente` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subtipohijo_incidente_idsubtipopadre_incidente_foreign` (`idsubtipopadre_incidente`),
  CONSTRAINT `subtipohijo_incidente_idsubtipopadre_incidente_foreign` FOREIGN KEY (`idsubtipopadre_incidente`) REFERENCES `subtipopadre_incidente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.subtipohijo_incidente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `subtipohijo_incidente` DISABLE KEYS */;
/*!40000 ALTER TABLE `subtipohijo_incidente` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.subtiponieto_incidente
CREATE TABLE IF NOT EXISTS `subtiponieto_incidente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idsubtipohijo_incidente` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subtiponieto_incidente_idsubtipohijo_incidente_foreign` (`idsubtipohijo_incidente`),
  CONSTRAINT `subtiponieto_incidente_idsubtipohijo_incidente_foreign` FOREIGN KEY (`idsubtipohijo_incidente`) REFERENCES `subtipohijo_incidente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.subtiponieto_incidente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `subtiponieto_incidente` DISABLE KEYS */;
/*!40000 ALTER TABLE `subtiponieto_incidente` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.subtipopadre_incidente
CREATE TABLE IF NOT EXISTS `subtipopadre_incidente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idtipo_incidente` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subtipopadre_incidente_idtipo_incidente_foreign` (`idtipo_incidente`),
  CONSTRAINT `subtipopadre_incidente_idtipo_incidente_foreign` FOREIGN KEY (`idtipo_incidente`) REFERENCES `tipo_incidente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.subtipopadre_incidente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `subtipopadre_incidente` DISABLE KEYS */;
/*!40000 ALTER TABLE `subtipopadre_incidente` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.subtipo_documentosinf
CREATE TABLE IF NOT EXISTS `subtipo_documentosinf` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_tipo` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subtipo_documentosinf_id_tipo_foreign` (`id_tipo`),
  CONSTRAINT `subtipo_documentosinf_id_tipo_foreign` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_documentosinf` (`idtipo_documentosinf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.subtipo_documentosinf: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `subtipo_documentosinf` DISABLE KEYS */;
/*!40000 ALTER TABLE `subtipo_documentosinf` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tablas
CREATE TABLE IF NOT EXISTS `tablas` (
  `idtabla` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tabla` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtabla`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tablas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tablas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tablas` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tareas_inspec_equipos
CREATE TABLE IF NOT EXISTS `tareas_inspec_equipos` (
  `idtareas_inspec_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idfamilia_activo` int(11) NOT NULL,
  `creador` int(11) NOT NULL,
  `borrado_por` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtareas_inspec_equipo`),
  KEY `fk_tareas_inspec_equipos_familia_activos1_idx` (`idfamilia_activo`),
  KEY `fk_tareas_inspec_equipos_users1_idx` (`creador`),
  KEY `tareas_inspec_equipos_borrado_por_foreign` (`borrado_por`),
  CONSTRAINT `fk_tareas_inspec_equipos_familia_activos1` FOREIGN KEY (`idfamilia_activo`) REFERENCES `familia_activos` (`idfamilia_activo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tareas_inspec_equipos_users1` FOREIGN KEY (`creador`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tareas_inspec_equipos_borrado_por_foreign` FOREIGN KEY (`borrado_por`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tareas_inspec_equipos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tareas_inspec_equipos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareas_inspec_equipos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tareas_ot_busqueda_infos
CREATE TABLE IF NOT EXISTS `tareas_ot_busqueda_infos` (
  `idtareas_ot_busqueda_info` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idot_busqueda_info` int(11) NOT NULL,
  `idestado_realizado` int(11) NOT NULL,
  PRIMARY KEY (`idtareas_ot_busqueda_info`),
  KEY `fk_tareas_ot_busqueda_infos_ot_busqueda_infos1_idx` (`idot_busqueda_info`),
  KEY `fk_tareas_ot_busqueda_infos_estados1_idx` (`idestado_realizado`),
  CONSTRAINT `fk_tareas_ot_busqueda_infos_estados1` FOREIGN KEY (`idestado_realizado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tareas_ot_busqueda_infos_ot_busqueda_infos1` FOREIGN KEY (`idot_busqueda_info`) REFERENCES `ot_busqueda_infos` (`idot_busqueda_info`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tareas_ot_busqueda_infos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tareas_ot_busqueda_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareas_ot_busqueda_infos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tareas_ot_correctivos
CREATE TABLE IF NOT EXISTS `tareas_ot_correctivos` (
  `idtareas_ot_correctivo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idot_correctivo` int(11) NOT NULL,
  `idestado_realizado` int(11) NOT NULL,
  PRIMARY KEY (`idtareas_ot_correctivo`),
  KEY `fk_tareas_ot_correctivos_ot_correctivos1_idx` (`idot_correctivo`),
  KEY `fk_tareas_ot_correctivos_estados1_idx` (`idestado_realizado`),
  CONSTRAINT `fk_tareas_ot_correctivos_estados1` FOREIGN KEY (`idestado_realizado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tareas_ot_correctivos_ot_correctivos1` FOREIGN KEY (`idot_correctivo`) REFERENCES `ot_correctivos` (`idot_correctivo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tareas_ot_correctivos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tareas_ot_correctivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareas_ot_correctivos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tareas_ot_preventivos
CREATE TABLE IF NOT EXISTS `tareas_ot_preventivos` (
  `idtareas_ot_preventivo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idfamilia_activo` int(11) DEFAULT NULL,
  `creador` int(11) NOT NULL,
  `borrado_por` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtareas_ot_preventivo`),
  KEY `fk_tareas_ot_preventivos_familia_activos1_idx` (`idfamilia_activo`),
  KEY `fk_tareas_ot_preventivos_users1_idx` (`creador`),
  KEY `tareas_ot_preventivos_borrado_por_foreign` (`borrado_por`),
  CONSTRAINT `fk_tareas_ot_preventivos_familia_activos1` FOREIGN KEY (`idfamilia_activo`) REFERENCES `familia_activos` (`idfamilia_activo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tareas_ot_preventivos_users1` FOREIGN KEY (`creador`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tareas_ot_preventivos_borrado_por_foreign` FOREIGN KEY (`borrado_por`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tareas_ot_preventivos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tareas_ot_preventivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareas_ot_preventivos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tareas_ot_preventivosxot_preventivos
CREATE TABLE IF NOT EXISTS `tareas_ot_preventivosxot_preventivos` (
  `idtareas_ot_preventivosxot_preventivo` int(11) NOT NULL AUTO_INCREMENT,
  `idtareas_ot_preventivo` int(11) NOT NULL,
  `idot_preventivo` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idestado_realizado` int(11) NOT NULL,
  PRIMARY KEY (`idtareas_ot_preventivosxot_preventivo`),
  KEY `fk_tareas_ot_preventivos_has_ot_preventivos_tareas_ot_preve_idx` (`idtareas_ot_preventivo`),
  KEY `fk_tareas_ot_preventivos_has_ot_preventivos_ot_preventivos1_idx` (`idot_preventivo`),
  KEY `fk_tareas_ot_preventivosxot_preventivos_estados1_idx` (`idestado_realizado`),
  CONSTRAINT `fk_tareas_ot_preventivos_has_ot_preventivos_ot_preventivos1` FOREIGN KEY (`idot_preventivo`) REFERENCES `ot_preventivos` (`idot_preventivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tareas_ot_preventivos_has_ot_preventivos_tareas_ot_prevent1` FOREIGN KEY (`idtareas_ot_preventivo`) REFERENCES `tareas_ot_preventivos` (`idtareas_ot_preventivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tareas_ot_preventivosxot_preventivos_estados1` FOREIGN KEY (`idestado_realizado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tareas_ot_preventivosxot_preventivos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tareas_ot_preventivosxot_preventivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareas_ot_preventivosxot_preventivos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tareas_ot_retiros
CREATE TABLE IF NOT EXISTS `tareas_ot_retiros` (
  `idtareas_ot_retiro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idot_retiro` int(11) NOT NULL,
  `idestado_realizado` int(11) NOT NULL,
  PRIMARY KEY (`idtareas_ot_retiro`),
  KEY `fk_tareas_ot_retiros_ot_retiros1_idx` (`idot_retiro`),
  KEY `fk_tareas_ot_retiros_estados1_idx` (`idestado_realizado`),
  CONSTRAINT `fk_tareas_ot_retiros_estados1` FOREIGN KEY (`idestado_realizado`) REFERENCES `estados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tareas_ot_retiros_ot_retiros1` FOREIGN KEY (`idot_retiro`) REFERENCES `ot_retiros` (`idot_retiro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tareas_ot_retiros: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tareas_ot_retiros` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareas_ot_retiros` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_actas
CREATE TABLE IF NOT EXISTS `tipo_actas` (
  `idtipo_acta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_acta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_actas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_actas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_actas` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_activos
CREATE TABLE IF NOT EXISTS `tipo_activos` (
  `idtipo_activo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_activos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_activos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_activos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_areas
CREATE TABLE IF NOT EXISTS `tipo_areas` (
  `idtipo_area` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_area`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_areas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_areas` DISABLE KEYS */;
INSERT INTO `tipo_areas` (`idtipo_area`, `nombre`, `descripcion`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'tipo Area1', 'tipo Area 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);
/*!40000 ALTER TABLE `tipo_areas` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_busqueda_infos
CREATE TABLE IF NOT EXISTS `tipo_busqueda_infos` (
  `idtipo_busqueda_info` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_busqueda_info`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_busqueda_infos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_busqueda_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_busqueda_infos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_capacitacion_riesgos
CREATE TABLE IF NOT EXISTS `tipo_capacitacion_riesgos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_capacitacion_riesgos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_capacitacion_riesgos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_capacitacion_riesgos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_compra
CREATE TABLE IF NOT EXISTS `tipo_compra` (
  `idtipo_compra` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_compra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_compra: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_compra` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_documentos
CREATE TABLE IF NOT EXISTS `tipo_documentos` (
  `idtipo_documento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_documentos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_documentos` DISABLE KEYS */;
INSERT INTO `tipo_documentos` (`idtipo_documento`, `nombre`, `descripcion`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'DNI', 'DNI', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);
/*!40000 ALTER TABLE `tipo_documentos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_documentosinf
CREATE TABLE IF NOT EXISTS `tipo_documentosinf` (
  `idtipo_documentosinf` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_tipo_padre` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idtipo_documentosinf`),
  KEY `tipo_documentosinf_id_tipo_padre_foreign` (`id_tipo_padre`),
  CONSTRAINT `tipo_documentosinf_id_tipo_padre_foreign` FOREIGN KEY (`id_tipo_padre`) REFERENCES `tipo_documentosinf_padre` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_documentosinf: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_documentosinf` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_documentosinf` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_documentosinf_padre
CREATE TABLE IF NOT EXISTS `tipo_documentosinf_padre` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_documentosinf_padre: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_documentosinf_padre` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_documentosinf_padre` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_documentospaac
CREATE TABLE IF NOT EXISTS `tipo_documentospaac` (
  `idtipo_documentosPAAC` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_documentosPAAC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_documentospaac: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_documentospaac` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_documentospaac` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_documentosplandirector
CREATE TABLE IF NOT EXISTS `tipo_documentosplandirector` (
  `idtipo_documentosPlanDirector` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_documentosPlanDirector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_documentosplandirector: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_documentosplandirector` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_documentosplandirector` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_documento_riesgos
CREATE TABLE IF NOT EXISTS `tipo_documento_riesgos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_documento_riesgos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_documento_riesgos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_documento_riesgos` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_doc_identidades
CREATE TABLE IF NOT EXISTS `tipo_doc_identidades` (
  `idtipo_documento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_doc_identidades: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_doc_identidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_doc_identidades` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_fallas
CREATE TABLE IF NOT EXISTS `tipo_fallas` (
  `idtipo_falla` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_falla`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_fallas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_fallas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_fallas` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_incidente
CREATE TABLE IF NOT EXISTS `tipo_incidente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_incidente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_incidente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_incidente` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_iper
CREATE TABLE IF NOT EXISTS `tipo_iper` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_iper: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_iper` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_iper` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_referencia
CREATE TABLE IF NOT EXISTS `tipo_referencia` (
  `idtipo_referencia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_referencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_referencia: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_referencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_referencia` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_reporte_cn
CREATE TABLE IF NOT EXISTS `tipo_reporte_cn` (
  `idtipo_reporte_CN` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_reporte_CN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_reporte_cn: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_reporte_cn` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_reporte_cn` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_reporte_etes
CREATE TABLE IF NOT EXISTS `tipo_reporte_etes` (
  `idtipo_reporte_ETES` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_reporte_ETES`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_reporte_etes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_reporte_etes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_reporte_etes` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_reporte_instalaciones
CREATE TABLE IF NOT EXISTS `tipo_reporte_instalaciones` (
  `idtipo_reporte_instalacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_reporte_instalacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_reporte_instalaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_reporte_instalaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_reporte_instalaciones` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_reporte_paac
CREATE TABLE IF NOT EXISTS `tipo_reporte_paac` (
  `idtipo_reporte_PAAC` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_reporte_PAAC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_reporte_paac: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_reporte_paac` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_reporte_paac` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_servicio
CREATE TABLE IF NOT EXISTS `tipo_servicio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_servicio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_servicio` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_servicios
CREATE TABLE IF NOT EXISTS `tipo_servicios` (
  `idtipo_servicios` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_servicios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_servicios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_servicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_servicios` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.tipo_solicitud_compras
CREATE TABLE IF NOT EXISTS `tipo_solicitud_compras` (
  `idtipo_solicitud_compra` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `tiempo_maximo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtipo_solicitud_compra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_solicitud_compras: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_solicitud_compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_solicitud_compras` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.trabajos_cronograma
CREATE TABLE IF NOT EXISTS `trabajos_cronograma` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_servicio_clinico` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `id_reporte` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.trabajos_cronograma: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `trabajos_cronograma` DISABLE KEYS */;
/*!40000 ALTER TABLE `trabajos_cronograma` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.trabajos_cronograma_actividades
CREATE TABLE IF NOT EXISTS `trabajos_cronograma_actividades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `duracion` int(11) NOT NULL,
  `id_actividad_previa` int(10) unsigned DEFAULT NULL,
  `id_cronograma` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.trabajos_cronograma_actividades: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `trabajos_cronograma_actividades` DISABLE KEYS */;
/*!40000 ALTER TABLE `trabajos_cronograma_actividades` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.ubicacion_fisicas
CREATE TABLE IF NOT EXISTS `ubicacion_fisicas` (
  `idubicacion_fisica` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idubicacion_fisica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.ubicacion_fisicas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ubicacion_fisicas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ubicacion_fisicas` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.unidad_medida
CREATE TABLE IF NOT EXISTS `unidad_medida` (
  `idunidad_medida` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idunidad_medida`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.unidad_medida: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `unidad_medida` DISABLE KEYS */;
/*!40000 ALTER TABLE `unidad_medida` ENABLE KEYS */;


-- Volcando estructura para tabla maternidad.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_pat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_mat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` datetime DEFAULT NULL,
  `genero` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `numero_doc_identidad` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idrol` int(11) NOT NULL,
  `idarea` int(11) NOT NULL,
  `idtipo_documento` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_roles_idx` (`idrol`),
  KEY `fk_users_areas1_idx` (`idarea`),
  KEY `fk_users_tipo_doc_identidades1_idx` (`idtipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.users: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `email`, `remember_token`, `nombre`, `apellido_pat`, `apellido_mat`, `fecha_nacimiento`, `genero`, `numero_doc_identidad`, `telefono`, `created_at`, `updated_at`, `deleted_at`, `idrol`, `idarea`, `idtipo_documento`) VALUES
	(6, 'paolomp', '$2y$10$Ki6bdL6YDRojqHZevPDep.T5xTg2YGOIDLC9e8mH0lqiTWfp14ajK', 'mail@mail.com', 'VWlZ0m2Y08vjWReMfYBEiiPldUP86pWOObXY5oMij0tZ9xxAnwGTPRdQqLOw', 'paolo', 'munoz', 'pacheco', NULL, 'M', '123456789', '123456789', '2016-03-19 11:09:04', '2016-04-04 18:04:03', NULL, 1, 1, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
