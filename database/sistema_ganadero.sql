-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.69-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema sistema_ganadero
--

CREATE DATABASE IF NOT EXISTS sistema_ganadero;
USE sistema_ganadero;

--
-- Definition of table `aplicacion_insumo`
--

DROP TABLE IF EXISTS `aplicacion_insumo`;
CREATE TABLE `aplicacion_insumo` (
  `idaplicacion_insumo` int(11) NOT NULL AUTO_INCREMENT,
  `inventario_ganado_idinventario_ganado` int(11) NOT NULL,
  `inventario_insumos_idinventario_insumos` int(11) NOT NULL,
  `unidades_idunidades` int(11) NOT NULL,
  `cantidad_aplicada` float NOT NULL,
  `fecha_aplicacion` date NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idaplicacion_insumo`),
  KEY `fk_aplicacion_insumo_inventario_ganado1_idx` (`inventario_ganado_idinventario_ganado`),
  KEY `fk_aplicacion_insumo_inventario_insumos1_idx` (`inventario_insumos_idinventario_insumos`),
  KEY `fk_aplicacion_insumo_unidades1_idx` (`unidades_idunidades`),
  CONSTRAINT `fk_aplicacion_insumo_inventario_ganado1` FOREIGN KEY (`inventario_ganado_idinventario_ganado`) REFERENCES `inventario_ganado` (`idinventario_ganado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_aplicacion_insumo_inventario_insumos1` FOREIGN KEY (`inventario_insumos_idinventario_insumos`) REFERENCES `inventario_insumos` (`idinventario_insumos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_aplicacion_insumo_unidades1` FOREIGN KEY (`unidades_idunidades`) REFERENCES `unidades` (`idunidades`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aplicacion_insumo`
--

/*!40000 ALTER TABLE `aplicacion_insumo` DISABLE KEYS */;
/*!40000 ALTER TABLE `aplicacion_insumo` ENABLE KEYS */;


--
-- Definition of table `cliente_proveedores`
--

DROP TABLE IF EXISTS `cliente_proveedores`;
CREATE TABLE `cliente_proveedores` (
  `idcliente_proveedores` int(11) NOT NULL AUTO_INCREMENT,
  `Categoria` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `dv` varchar(8) NOT NULL,
  `ruc` varchar(25) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idcliente_proveedores`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente_proveedores`
--

/*!40000 ALTER TABLE `cliente_proveedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente_proveedores` ENABLE KEYS */;


--
-- Definition of table `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras` (
  `idcompras` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_proveedores_idcliente_proveedores` int(11) NOT NULL,
  `numfactura` bigint(20) NOT NULL,
  `fecha_compra` date NOT NULL,
  `nombre_vendedor` varchar(45) NOT NULL,
  `tipo_pago` varchar(20) NOT NULL,
  `descuento` float DEFAULT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`idcompras`),
  KEY `fk_compras_cliente_proveedores1_idx` (`cliente_proveedores_idcliente_proveedores`),
  CONSTRAINT `fk_compras_cliente_proveedores1` FOREIGN KEY (`cliente_proveedores_idcliente_proveedores`) REFERENCES `cliente_proveedores` (`idcliente_proveedores`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compras`
--

/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;


--
-- Definition of table `compras_insumo`
--

DROP TABLE IF EXISTS `compras_insumo`;
CREATE TABLE `compras_insumo` (
  `idcompras` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_proveedores_idcliente_proveedores` int(11) NOT NULL,
  `numfactura` bigint(20) NOT NULL,
  `fecha_compra` date NOT NULL,
  `nombre_vendedor` varchar(45) NOT NULL,
  `tipo_pago` varchar(20) NOT NULL,
  `descuento` float DEFAULT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`idcompras`),
  KEY `fk_compras_cliente_proveedores1_idx` (`cliente_proveedores_idcliente_proveedores`),
  CONSTRAINT `fk_compras_cliente_proveedores10` FOREIGN KEY (`cliente_proveedores_idcliente_proveedores`) REFERENCES `cliente_proveedores` (`idcliente_proveedores`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compras_insumo`
--

/*!40000 ALTER TABLE `compras_insumo` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras_insumo` ENABLE KEYS */;


--
-- Definition of table `detalle_compra_ganado`
--

DROP TABLE IF EXISTS `detalle_compra_ganado`;
CREATE TABLE `detalle_compra_ganado` (
  `iddetalle_compra_ganado` int(11) NOT NULL AUTO_INCREMENT,
  `compras_idcompras` int(11) NOT NULL,
  `precio_x_kilo` double NOT NULL,
  `kilos` float NOT NULL,
  `precio_bruto` double NOT NULL,
  `inventario_ganado_idinventario_ganado` int(11) NOT NULL,
  PRIMARY KEY (`iddetalle_compra_ganado`),
  KEY `fk_detalle_compra_ganado_compras1_idx` (`compras_idcompras`),
  KEY `fk_detalle_compra_ganado_inventario_ganado1_idx` (`inventario_ganado_idinventario_ganado`),
  CONSTRAINT `fk_detalle_compra_ganado_compras1` FOREIGN KEY (`compras_idcompras`) REFERENCES `compras` (`idcompras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_compra_ganado_inventario_ganado1` FOREIGN KEY (`inventario_ganado_idinventario_ganado`) REFERENCES `inventario_ganado` (`idinventario_ganado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalle_compra_ganado`
--

/*!40000 ALTER TABLE `detalle_compra_ganado` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_compra_ganado` ENABLE KEYS */;


--
-- Definition of table `detalle_compra_insumo`
--

DROP TABLE IF EXISTS `detalle_compra_insumo`;
CREATE TABLE `detalle_compra_insumo` (
  `iddetalle_compra_insumo` int(11) NOT NULL AUTO_INCREMENT,
  `compras_insumo_idcompras` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `precio` float NOT NULL,
  `precio_bruto` double NOT NULL,
  `inventario_insumos_idinventario_insumos` int(11) NOT NULL,
  PRIMARY KEY (`iddetalle_compra_insumo`),
  KEY `fk_detalle_compra_insumo_compras_insumo1_idx` (`compras_insumo_idcompras`),
  KEY `fk_detalle_compra_insumo_inventario_insumos1_idx` (`inventario_insumos_idinventario_insumos`),
  CONSTRAINT `fk_detalle_compra_insumo_compras_insumo1` FOREIGN KEY (`compras_insumo_idcompras`) REFERENCES `compras_insumo` (`idcompras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_compra_insumo_inventario_insumos1` FOREIGN KEY (`inventario_insumos_idinventario_insumos`) REFERENCES `inventario_insumos` (`idinventario_insumos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalle_compra_insumo`
--

/*!40000 ALTER TABLE `detalle_compra_insumo` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_compra_insumo` ENABLE KEYS */;


--
-- Definition of table `detallesventas`
--

DROP TABLE IF EXISTS `detallesventas`;
CREATE TABLE `detallesventas` (
  `iddetallesfacturas` int(11) NOT NULL AUTO_INCREMENT,
  `ventas_idventas` int(11) NOT NULL,
  `cod_ganado` varchar(8) NOT NULL,
  `precio_x_kilo` double NOT NULL,
  `peso` double NOT NULL,
  `monto` double NOT NULL,
  PRIMARY KEY (`iddetallesfacturas`),
  KEY `fk_detallesfacturas_facturas1_idx` (`ventas_idventas`),
  CONSTRAINT `fk_detallesfacturas_facturas1` FOREIGN KEY (`ventas_idventas`) REFERENCES `ventas` (`idventas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detallesventas`
--

/*!40000 ALTER TABLE `detallesventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallesventas` ENABLE KEYS */;


--
-- Definition of table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE `grupos` (
  `idgrupos` int(11) NOT NULL AUTO_INCREMENT,
  `cod_grupo` varchar(8) NOT NULL,
  `nom_grupo` text NOT NULL,
  `descripcion` text,
  `oculto` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idgrupos`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grupos`
--

/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` (`idgrupos`,`cod_grupo`,`nom_grupo`,`descripcion`,`oculto`) VALUES 
 (1,'GP001','Grupo NÂº 1','ESTE ES EL GRUPO NÂº 1',0),
 (2,'GP002','Grupo NÂº 2','ESTE ES EL GRUPO NÂº 2',0),
 (3,'GP003','Grupo NÂº 3','ESTE ES EL GRUPO NÂº 3',0),
 (4,'GP004','Grupo NÂº 4','ESTE ES EL GRUPO NÂº 4',0),
 (5,'GP005','Grupo NÂº 5','ESTE ES EL GRUPO NÂº 5',0);
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;


--
-- Definition of table `inventario_ganado`
--

DROP TABLE IF EXISTS `inventario_ganado`;
CREATE TABLE `inventario_ganado` (
  `idinventario_ganado` int(11) NOT NULL AUTO_INCREMENT,
  `tipos_ganados_idtipos_ganados` int(11) NOT NULL,
  `tipos_razas_idtipos_razas` int(11) NOT NULL,
  `cod_ganado` char(8) NOT NULL,
  `color` varchar(15) NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `cod_padre` char(8) DEFAULT NULL,
  `cod_madre` char(8) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `descripcion` text,
  `status_idstatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`idinventario_ganado`),
  KEY `fk_inventario_ganado_tipos_ganados1_idx` (`tipos_ganados_idtipos_ganados`),
  KEY `fk_inventario_ganado_tipos_razas1_idx` (`tipos_razas_idtipos_razas`),
  KEY `fk_inventario_ganado_status1_idx` (`status_idstatus`),
  CONSTRAINT `fk_inventario_ganado_status1` FOREIGN KEY (`status_idstatus`) REFERENCES `status` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventario_ganado_tipos_ganados1` FOREIGN KEY (`tipos_ganados_idtipos_ganados`) REFERENCES `tipos_ganados` (`idtipos_ganados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventario_ganado_tipos_razas1` FOREIGN KEY (`tipos_razas_idtipos_razas`) REFERENCES `tipos_razas` (`idtipos_razas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventario_ganado`
--

/*!40000 ALTER TABLE `inventario_ganado` DISABLE KEYS */;
INSERT INTO `inventario_ganado` (`idinventario_ganado`,`tipos_ganados_idtipos_ganados`,`tipos_razas_idtipos_razas`,`cod_ganado`,`color`,`sexo`,`cod_padre`,`cod_madre`,`fecha_nacimiento`,`descripcion`,`status_idstatus`) VALUES 
 (1,1,1,'CR01','Blanco','M','PA01','MA01','2015-03-12','Cria en buen estado',1),
 (2,2,2,'CR02','Negro','H','PA01','MA02','2015-06-21','Bovino en buen estado',1),
 (4,1,6,'CR03','Crema','H','PA02','MA01','2015-06-21','Cria grande',1),
 (5,3,4,'CR04','Blanco','H','PA02','MA01','2015-06-12','Engordar',1),
 (6,2,8,'CR05','Blanco','H','PA01','MA01','2015-06-20','Patas cortas ',1),
 (7,1,7,'CR06','Blanco','H','PA01','MA02','2015-06-19','Cola corta',1),
 (8,1,3,'CR07','Chocolate','H','PA01','MA03','2015-06-18','Bolas negras en la cara',1),
 (9,2,9,'CR08','Negro','M','PA02','MA01','2015-06-22','Muy delgado',1);
/*!40000 ALTER TABLE `inventario_ganado` ENABLE KEYS */;


--
-- Definition of table `inventario_ganado_has_grupos`
--

DROP TABLE IF EXISTS `inventario_ganado_has_grupos`;
CREATE TABLE `inventario_ganado_has_grupos` (
  `idmovimiento` int(11) NOT NULL AUTO_INCREMENT,
  `inventario_ganado_idinventario_ganado` int(11) NOT NULL,
  `grupos_idgrupos` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idmovimiento`,`inventario_ganado_idinventario_ganado`,`grupos_idgrupos`),
  KEY `fk_inventario_ganado_has_grupos_grupos1` (`grupos_idgrupos`),
  KEY `fk_inventario_ganado_has_grupos_inventario_ganado1` (`inventario_ganado_idinventario_ganado`),
  CONSTRAINT `fk_inventario_ganado_has_grupos_grupos1` FOREIGN KEY (`grupos_idgrupos`) REFERENCES `grupos` (`idgrupos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventario_ganado_has_grupos_inventario_ganado1` FOREIGN KEY (`inventario_ganado_idinventario_ganado`) REFERENCES `inventario_ganado` (`idinventario_ganado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventario_ganado_has_grupos`
--

/*!40000 ALTER TABLE `inventario_ganado_has_grupos` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventario_ganado_has_grupos` ENABLE KEYS */;


--
-- Definition of table `inventario_ganado_has_potreros`
--

DROP TABLE IF EXISTS `inventario_ganado_has_potreros`;
CREATE TABLE `inventario_ganado_has_potreros` (
  `idmovimiento` int(11) NOT NULL AUTO_INCREMENT,
  `inventario_ganado_idinventario_ganado` int(11) NOT NULL,
  `potreros_idpotreros` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idmovimiento`,`inventario_ganado_idinventario_ganado`,`potreros_idpotreros`),
  KEY `fk_inventario_ganado_has_potreros_potreros1` (`potreros_idpotreros`),
  KEY `fk_inventario_ganado_has_potreros_inventario_ganado1` (`inventario_ganado_idinventario_ganado`),
  CONSTRAINT `fk_inventario_ganado_has_potreros_inventario_ganado1` FOREIGN KEY (`inventario_ganado_idinventario_ganado`) REFERENCES `inventario_ganado` (`idinventario_ganado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventario_ganado_has_potreros_potreros1` FOREIGN KEY (`potreros_idpotreros`) REFERENCES `potreros` (`idpotreros`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventario_ganado_has_potreros`
--

/*!40000 ALTER TABLE `inventario_ganado_has_potreros` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventario_ganado_has_potreros` ENABLE KEYS */;


--
-- Definition of table `inventario_insumos`
--

DROP TABLE IF EXISTS `inventario_insumos`;
CREATE TABLE `inventario_insumos` (
  `idinventario_insumos` int(11) NOT NULL AUTO_INCREMENT,
  `cod_producto` char(8) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `tipo_insumos_idtipo_insumos` int(11) NOT NULL,
  `cantidad` double DEFAULT NULL,
  `unidades_idunidades` int(11) NOT NULL,
  `descripcion` text,
  `fecha_vencimiento` date DEFAULT NULL,
  `status_idstatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`idinventario_insumos`),
  KEY `fk_inventario_insumos_unidades1_idx` (`unidades_idunidades`),
  KEY `fk_inventario_insumos_tipo_insumos1` (`tipo_insumos_idtipo_insumos`),
  KEY `fk_inventario_insumos_status1_idx` (`status_idstatus`),
  CONSTRAINT `fk_inventario_insumos_status1` FOREIGN KEY (`status_idstatus`) REFERENCES `status` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventario_insumos_tipo_insumos1` FOREIGN KEY (`tipo_insumos_idtipo_insumos`) REFERENCES `tipo_insumos` (`idtipo_insumos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventario_insumos_unidades1` FOREIGN KEY (`unidades_idunidades`) REFERENCES `unidades` (`idunidades`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventario_insumos`
--

/*!40000 ALTER TABLE `inventario_insumos` DISABLE KEYS */;
INSERT INTO `inventario_insumos` (`idinventario_insumos`,`cod_producto`,`nombre`,`tipo_insumos_idtipo_insumos`,`cantidad`,`unidades_idunidades`,`descripcion`,`fecha_vencimiento`,`status_idstatus`) VALUES 
 (1,'4494','Sal',2,44,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `inventario_insumos` ENABLE KEYS */;


--
-- Definition of table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`,`batch`) VALUES 
 ('2014_10_12_000000_create_users_table',1),
 ('2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


--
-- Definition of table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


--
-- Definition of table `peso_ganado`
--

DROP TABLE IF EXISTS `peso_ganado`;
CREATE TABLE `peso_ganado` (
  `idpeso_ganado` int(11) NOT NULL AUTO_INCREMENT,
  `peso` float NOT NULL,
  `fecha` date NOT NULL,
  `inventario_ganado_idinventario_ganado` int(11) NOT NULL,
  PRIMARY KEY (`idpeso_ganado`),
  KEY `fk_peso_ganado_inventario_ganado1_idx` (`inventario_ganado_idinventario_ganado`),
  CONSTRAINT `fk_peso_ganado_inventario_ganado1` FOREIGN KEY (`inventario_ganado_idinventario_ganado`) REFERENCES `inventario_ganado` (`idinventario_ganado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `peso_ganado`
--

/*!40000 ALTER TABLE `peso_ganado` DISABLE KEYS */;
/*!40000 ALTER TABLE `peso_ganado` ENABLE KEYS */;


--
-- Definition of table `potreros`
--

DROP TABLE IF EXISTS `potreros`;
CREATE TABLE `potreros` (
  `idpotreros` int(11) NOT NULL AUTO_INCREMENT,
  `cod_potrero` varchar(8) NOT NULL,
  `descripcion` text NOT NULL,
  `oculto` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idpotreros`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `potreros`
--

/*!40000 ALTER TABLE `potreros` DISABLE KEYS */;
INSERT INTO `potreros` (`idpotreros`,`cod_potrero`,`descripcion`,`oculto`) VALUES 
 (1,'P001','Potrero NÂº 1',0),
 (2,'P002','Potrero NÂº 2',0),
 (3,'P003','Potrero NÂº 3',0),
 (4,'P004','Potrero NÂº 4',0),
 (5,'P005','Potrero NÂº 5',0),
 (6,'P006','Potrero NÂ° 6',0);
/*!40000 ALTER TABLE `potreros` ENABLE KEYS */;


--
-- Definition of table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `idstatus` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `oculto` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`idstatus`,`status`,`oculto`) VALUES 
 (1,'Activo',0),
 (2,'Inactivo',0);
/*!40000 ALTER TABLE `status` ENABLE KEYS */;


--
-- Definition of table `tipo_insumos`
--

DROP TABLE IF EXISTS `tipo_insumos`;
CREATE TABLE `tipo_insumos` (
  `idtipo_insumos` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_insumo` varchar(45) NOT NULL,
  `oculto` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idtipo_insumos`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_insumos`
--

/*!40000 ALTER TABLE `tipo_insumos` DISABLE KEYS */;
INSERT INTO `tipo_insumos` (`idtipo_insumos`,`tipo_insumo`,`oculto`) VALUES 
 (1,'Medicina',0),
 (2,'Alimento',0),
 (3,'Material',0);
/*!40000 ALTER TABLE `tipo_insumos` ENABLE KEYS */;


--
-- Definition of table `tipos_ganados`
--

DROP TABLE IF EXISTS `tipos_ganados`;
CREATE TABLE `tipos_ganados` (
  `idtipos_ganados` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(25) NOT NULL,
  `oculto` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idtipos_ganados`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipos_ganados`
--

/*!40000 ALTER TABLE `tipos_ganados` DISABLE KEYS */;
INSERT INTO `tipos_ganados` (`idtipos_ganados`,`tipo`,`oculto`) VALUES 
 (1,'Cria',0),
 (2,'Leche',0),
 (3,'Carne',0);
/*!40000 ALTER TABLE `tipos_ganados` ENABLE KEYS */;


--
-- Definition of table `tipos_razas`
--

DROP TABLE IF EXISTS `tipos_razas`;
CREATE TABLE `tipos_razas` (
  `idtipos_razas` int(11) NOT NULL AUTO_INCREMENT,
  `raza` varchar(25) NOT NULL,
  `oculto` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idtipos_razas`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipos_razas`
--

/*!40000 ALTER TABLE `tipos_razas` DISABLE KEYS */;
INSERT INTO `tipos_razas` (`idtipos_razas`,`raza`,`oculto`) VALUES 
 (1,'Simental',0),
 (2,'Brahman',0),
 (3,'Brangus',0),
 (4,'Charolais',0),
 (5,'Simbrah',0),
 (6,'Santa Carolina',0),
 (7,'Indo Brasil',0),
 (8,'Angus',0),
 (9,'Heck',0);
/*!40000 ALTER TABLE `tipos_razas` ENABLE KEYS */;


--
-- Definition of table `transacciones`
--

DROP TABLE IF EXISTS `transacciones`;
CREATE TABLE `transacciones` (
  `idtransacciones` int(11) NOT NULL AUTO_INCREMENT,
  `ventas_idventas` int(11) NOT NULL,
  `inventario_ganado_idinventario_ganado` int(11) NOT NULL,
  `num_transaccion` int(11) NOT NULL,
  `tipo_transaccion` varchar(25) NOT NULL,
  `fecha_transaccion` date NOT NULL,
  `descripcion` text,
  PRIMARY KEY (`idtransacciones`),
  KEY `fk_transacciones_facturas1` (`ventas_idventas`),
  KEY `fk_transacciones_inventario_ganado1` (`inventario_ganado_idinventario_ganado`),
  CONSTRAINT `fk_transacciones_facturas1` FOREIGN KEY (`ventas_idventas`) REFERENCES `ventas` (`idventas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_transacciones_inventario_ganado1` FOREIGN KEY (`inventario_ganado_idinventario_ganado`) REFERENCES `inventario_ganado` (`idinventario_ganado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transacciones`
--

/*!40000 ALTER TABLE `transacciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `transacciones` ENABLE KEYS */;


--
-- Definition of table `unidades`
--

DROP TABLE IF EXISTS `unidades`;
CREATE TABLE `unidades` (
  `idunidades` int(11) NOT NULL AUTO_INCREMENT,
  `unidad` varchar(15) NOT NULL,
  `oculto` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idunidades`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unidades`
--

/*!40000 ALTER TABLE `unidades` DISABLE KEYS */;
INSERT INTO `unidades` (`idunidades`,`unidad`,`oculto`) VALUES 
 (1,'kg',0),
 (2,'g',0),
 (3,'L',0),
 (4,'mL',0),
 (5,'m',0),
 (6,'km',0),
 (7,'m2',0),
 (8,'hm2',0);
/*!40000 ALTER TABLE `unidades` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


--
-- Definition of table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas` (
  `idventas` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` int(11) NOT NULL,
  `cliente_proveedores_idcliente_proveedores` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_pago` varchar(15) NOT NULL,
  `descuento` float DEFAULT NULL,
  `total` double NOT NULL,
  `itbms` float NOT NULL,
  PRIMARY KEY (`idventas`),
  KEY `fk_facturas_cliente_proveedores1_idx` (`cliente_proveedores_idcliente_proveedores`),
  CONSTRAINT `fk_facturas_cliente_proveedores1` FOREIGN KEY (`cliente_proveedores_idcliente_proveedores`) REFERENCES `cliente_proveedores` (`idcliente_proveedores`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ventas`
--

/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
