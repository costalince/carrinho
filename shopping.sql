-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2014 at 12:00 AM
-- Server version: 5.6.21
-- PHP Version: 5.3.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Sofá'),
(2, 'Racks'),
(3, 'Escritório'),
(4, 'Mesa');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE IF NOT EXISTS `checkout` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(150) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address1` varchar(150) DEFAULT NULL,
  `address2` varchar(150) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `zip` varchar(15) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `checkout`
--


-- --------------------------------------------------------

--
-- Table structure for table `checkout_product`
--

CREATE TABLE IF NOT EXISTS `checkout_product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `checkout_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `checkout_product`
--


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `description` text,
  `price` double DEFAULT NULL,
  `features` varchar(150) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `features`, `img`) VALUES
(1, 'Sofá Fluence Retrátil 3 Lugares Suede Bege Ricatteli', 'A sala de estar é um dos principais cômodos da casa, pois nela, recebemos as visitas e passamos os momentos de lazer ao lado de amigos e familiares. Para melhor recepcioná-los, o Sofá Fluence Retrátil 3 Lugares é uma excelente opção, aliando conforto e elegância de maneira esplêndida. Além de um visual absolutamente distinto e muito sofisticado na cor bege, o móvel conta com revestimento suave em suede e possui assentos retráteis, permitindo que você estique as pernas para poder relaxar e descansar plenamente. Demais, né? :)', 1299, NULL, 'http://static.mobly.com.br/r/900x900/p/Ricatteli-Estofados-SofC3A1-Fluence-RetrC3A1til-3-Lugares-Suede-Bege-Ricatteli-5559-45478-1-zoom.jpg'),
(2, 'Rack Tauro 1.9 Branco Gloss Província', 'Precisando de uma peça que agregue uma decoração contemporânea à sua sala? Então você vai curtir o Rack Tauro 1.9 da Província. O móvel garante um ambiente mais atraente e organizado, comportando aparelhos eletrônicos, livros e objetos de decoração. Elaborado em MDF, material extremamente resistente e de alta qualidade, conta com puxadores em alumínio, corrediças telescópicas, prateleiras de vidro, 2 amplas gavetas e rodízios para facilitar o transporte. Gostou? Leva! : )', 529, NULL, 'http://static.mobly.com.br/r/900x900/p/ProvC3ADncia-Rack-Tauro-1.9-Branco-Gloss-ProvC3ADncia-0402-10679-1-zoom.jpg'),
(3, 'Aparador Rubi com 1 Gaveta Imbuia Finestra', 'O aparador é um item básico para ter em casa. Que tal o modelo Rubi para garantir um visual mais clássico? Produzido com materiais resistentes e de alta qualidade, ele possui 1 gaveta para guardar caneta, bloquinho de anotações e chaves. A cor imbuia proporciona um visual tradicional para a sua sala de jantar. : )', 259, NULL, 'http://static.mobly.com.br/r/900x900/p/Finestra-Aparador-Rubi-com-1-Gaveta-Imbuia-Finestra-7615-601521-1-zoom.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `category_id`, `product_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 3, 4);
