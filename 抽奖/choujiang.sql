/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : choujiang

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2015-08-23 22:55:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for choujiang
-- ----------------------------
DROP TABLE IF EXISTS `choujiang`;
CREATE TABLE `choujiang` (
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `num` int(10) unsigned NOT NULL,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of choujiang
-- ----------------------------
INSERT INTO `choujiang` VALUES ('iphone', '2');
