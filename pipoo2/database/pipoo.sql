/*
 Navicat Premium Data Transfer

 Source Server         : ampps
 Source Server Type    : MySQL
 Source Server Version : 50637
 Source Host           : localhost
 Source Database       : pipoo

 Target Server Type    : MySQL
 Target Server Version : 50637
 File Encoding         : utf-8

 Date: 11/12/2018 13:00:38 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `clientes`
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `saldo_devedor` decimal(9,2) DEFAULT NULL,
  `situacao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `clientes`
-- ----------------------------
BEGIN;
INSERT INTO `clientes` VALUES ('15', 'Teste Cliente - Em Atraso', '', '', '0000-00-00', '0.00', 'Em atraso'), ('12', '12312312', null, null, null, null, 'Em dia');
COMMIT;

-- ----------------------------
--  Table structure for `filmes`
-- ----------------------------
DROP TABLE IF EXISTS `filmes`;
CREATE TABLE `filmes` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `sinopse` varchar(255) DEFAULT NULL,
  `quantidade` varchar(255) DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `filmes`
-- ----------------------------
BEGIN;
INSERT INTO `filmes` VALUES ('1', 'TEE1231', 'EEE', '1', 'rterte'), ('2', 'TEE2', 'EEE', '1', 'rterte'), ('3', 'DASDAD', 'asdasd', '111', 'asfsdfsdf'), ('4', 'teste 2', 'tes ests 234', '2342342', '1231231'), ('7', '2123', '234234', '345345', '3453453');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
