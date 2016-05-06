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


-- Volcando estructura para tabla maternidad.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.migrations: ~88 rows (aproximadamente)
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


-- Volcando estructura para tabla maternidad.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.roles: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_areas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_areas` DISABLE KEYS */;
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


-- Volcando estructura para tabla maternidad.tipo_documentos
CREATE TABLE IF NOT EXISTS `tipo_documentos` (
  `idtipo_documento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.tipo_documentos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_documentos` DISABLE KEYS */;
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
  KEY `fk_users_tipo_doc_identidades1_idx` (`idtipo_documento`),
  CONSTRAINT `fk_users_areas1` FOREIGN KEY (`idarea`) REFERENCES `areas` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_roles` FOREIGN KEY (`idrol`) REFERENCES `roles` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_tipo_doc_identidades1` FOREIGN KEY (`idtipo_documento`) REFERENCES `tipo_doc_identidades` (`idtipo_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla maternidad.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
