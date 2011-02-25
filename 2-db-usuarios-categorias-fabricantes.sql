-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-02-2011 a las 13:38:21
-- Versión del servidor: 5.1.33
-- Versión de PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tecnocenter`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'admin_menu', 1, 2),
(2, NULL, NULL, NULL, 'menu', 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Role', 1, 'Super_Administrador', 1, 4),
(2, NULL, 'Role', 2, 'Administrador', 5, 8),
(3, NULL, 'Role', 3, 'Vendedor', 9, 12),
(4, NULL, 'Role', 4, 'Web', 13, 14),
(5, NULL, 'Role', 5, 'Clientes', 15, 16),
(6, 1, 'User', 1, 'superadministrador', 2, 3),
(7, 2, 'User', 2, 'administrador', 6, 7),
(8, 3, 'User', 3, 'vendedor', 10, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '1', '1', '1', '1'),
(3, 3, 1, '1', '1', '1', '1'),
(4, 4, 2, '1', '1', '1', '1'),
(5, 5, 2, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audits`
--

CREATE TABLE IF NOT EXISTS `audits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `foreing_key` varchar(45) DEFAULT NULL,
  `model` varchar(45) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `action` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `auidtdeunusuario` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `audits`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `nombre`, `order`) VALUES
(1, 'Portatiles', 1),
(2, 'Pc de escritorio', 2),
(3, 'Routers', 3),
(4, 'Impresoras', 4),
(5, 'Accesorios', 5),
(6, 'Cables', 6),
(7, 'Software', 7),
(8, 'Perifericos', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact_page`
--

CREATE TABLE IF NOT EXISTS `contact_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `e_mail` varchar(60) NOT NULL,
  `asunto` varchar(30) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `contact_page`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventories`
--

CREATE TABLE IF NOT EXISTS `inventories` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventariodelproducto` (`product_id`),
  KEY `inventariodelproveedor` (`provider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `inventories`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventory_movement`
--

CREATE TABLE IF NOT EXISTS `inventory_movement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(11) DEFAULT NULL,
  `tipo_documento_id` int(11) DEFAULT NULL,
  `tipo_movimiento_id` int(11) DEFAULT NULL,
  `detalle` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movimientodelinventario` (`inventory_id`),
  KEY `deltipodedocumento` (`tipo_documento_id`),
  KEY `deltipodemovimiento` (`tipo_movimiento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `inventory_movement`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manufacturers`
--

CREATE TABLE IF NOT EXISTS `manufacturers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `nombre`, `created`, `updated`) VALUES
(1, 'DELL', '2011-02-25 13:13:34', '2011-02-25 13:13:34'),
(2, 'HP', '2011-02-25 13:18:32', '2011-02-25 13:18:32'),
(3, 'CISCO', '2011-02-25 13:18:38', '2011-02-25 13:18:38'),
(4, 'LINK SYS', '2011-02-25 13:18:49', '2011-02-25 13:18:49'),
(5, 'APPLE', '2011-02-25 13:18:54', '2011-02-25 13:18:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `online_sales`
--

CREATE TABLE IF NOT EXISTS `online_sales` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_cuenta` int(10) NOT NULL,
  `nit_cliente` int(15) NOT NULL,
  `cod_producto` int(10) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `porcentaje_iva` float DEFAULT NULL,
  `valor_unit` int(10) NOT NULL,
  `subtotal` double NOT NULL,
  `valor_iva` double NOT NULL,
  `valor_total` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `online_sales`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `passoword_changes`
--

CREATE TABLE IF NOT EXISTS `passoword_changes` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `passoword_changes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_album_id` int(11) DEFAULT NULL,
  `path` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `thumb` varchar(45) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `imagendelagaleria` (`photo_album_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `photos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photo_albums`
--

CREATE TABLE IF NOT EXISTS `photo_albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galeriadelproducto` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `photo_albums`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text,
  `codigo` int(11) NOT NULL,
  `cod_barras` int(11) DEFAULT NULL,
  `promocionar` tinyint(1) DEFAULT NULL,
  `destacar` tinyint(1) DEFAULT NULL,
  `ficha_producto` varchar(45) DEFAULT NULL,
  `inventario` int(11) DEFAULT NULL,
  `stock_minimo` int(4) DEFAULT NULL,
  `stock_maximo` int(4) DEFAULT NULL,
  `costo` int(10) NOT NULL,
  `costo_promedio` float DEFAULT NULL,
  `tarifa_iva` int(5) DEFAULT NULL,
  `valor_iva` int(10) DEFAULT NULL,
  `porc_utilidad` int(5) DEFAULT NULL,
  `valor_venta` int(10) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `rotacion` varchar(5) NOT NULL,
  `tiempo_reposicion` int(3) NOT NULL,
  `imagen_listado` varchar(50) DEFAULT NULL,
  `imagen_principal` varchar(50) DEFAULT NULL,
  `imagen_destacar` varchar(50) DEFAULT NULL,
  `imagen_ficha_tecnica` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`,`codigo`),
  KEY `productsbelogstocategorie` (`category_id`),
  KEY `pertenece a un fabricante` (`manufacturer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `products`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `providers`
--

CREATE TABLE IF NOT EXISTS `providers` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `tipo_prov` varchar(8) NOT NULL,
  `tipo_iden_pro` varchar(5) NOT NULL,
  `nit_proveedor` int(15) NOT NULL,
  `digito_ver` varchar(1) DEFAULT NULL,
  `clasificacion` varchar(30) NOT NULL,
  `p_nom_prov` varchar(25) NOT NULL,
  `s_nom_prov` varchar(25) DEFAULT NULL,
  `p_ape_prov` varchar(25) NOT NULL,
  `s_ape_prov` varchar(25) DEFAULT NULL,
  `representante_legal` varchar(50) NOT NULL,
  `pais` varchar(30) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `ciudad` varchar(40) NOT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `telefono_1` int(15) NOT NULL,
  `telefono_2` int(15) DEFAULT NULL,
  `celular` int(30) DEFAULT NULL,
  `e_mail` varchar(60) DEFAULT NULL,
  `estado_proveedor` varchar(1) NOT NULL,
  `tipo_regimen` varchar(20) NOT NULL,
  `notas_proveedor` varchar(500) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `providers`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Super_Administrador'),
(2, 'Administrador'),
(3, 'Vendedor'),
(4, 'Web'),
(5, 'Clientes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `description` text,
  `content` longtext,
  `order` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `services`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documentos`
--

CREATE TABLE IF NOT EXISTS `tipo_documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tipo_documentos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_movimiento`
--

CREATE TABLE IF NOT EXISTS `tipo_movimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `entrada` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tipo_movimiento`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `tipo_identificacion` varchar(3) DEFAULT NULL,
  `numero_identificacion` int(11) DEFAULT NULL,
  `primer_nombre` varchar(25) DEFAULT NULL,
  `segundo_nombre` varchar(25) DEFAULT NULL,
  `primer_apellido` varchar(25) DEFAULT NULL,
  `segundo_apellido` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `pais` varchar(30) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `telefono` int(15) DEFAULT NULL,
  `telefono_adicional` int(15) DEFAULT NULL,
  `celular` int(15) DEFAULT NULL,
  `celular_adicional` int(15) DEFAULT NULL,
  `foto` varchar(25) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_belongs_to_role` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role_id`, `tipo_identificacion`, `numero_identificacion`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `email`, `direccion`, `pais`, `departamento`, `ciudad`, `telefono`, `telefono_adicional`, `celular`, `celular_adicional`, `foto`, `username`, `password`) VALUES
(1, 1, 'C. ', NULL, 'Super', '', 'Administrador', '', 'superadministra@gmail.com', '', NULL, NULL, NULL, 2147483647, 5555555, 5555555, 5555555, '', 'superadministrador', 'bc8931b56c'),
(2, 2, '1', NULL, 'Administrador', '', 'Administrador', '', 'administrador@gmail.com', '', '', '', '', 2147483647, 5555555, 5555555, 5555555, '', 'administrador', 'efbc37e2ac'),
(3, 3, 'C. ', NULL, 'vendedor', '', 'vendedor', '', 'vendedor@gmail.com', '', NULL, NULL, NULL, 2147483647, 5555555, 5555555, 5555555, '', 'vendedor', '7bcf484a27');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `audits`
--
ALTER TABLE `audits`
  ADD CONSTRAINT `auidtdeunusuario` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventariodelproducto` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventariodelproveedor` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventory_movement`
--
ALTER TABLE `inventory_movement`
  ADD CONSTRAINT `movimientodelinventario` FOREIGN KEY (`inventory_id`) REFERENCES `inventories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `deltipodedocumento` FOREIGN KEY (`tipo_documento_id`) REFERENCES `tipo_documentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `deltipodemovimiento` FOREIGN KEY (`tipo_movimiento_id`) REFERENCES `tipo_movimiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `imagendelagaleria` FOREIGN KEY (`photo_album_id`) REFERENCES `photo_albums` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `photo_albums`
--
ALTER TABLE `photo_albums`
  ADD CONSTRAINT `galeriadelproducto` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `productsbelogstocategorie` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pertenece a un fabricante` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_belongs_to_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
