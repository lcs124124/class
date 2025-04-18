/*
Navicat MySQL Data Transfer

Source Server         : all
Source Server Version : 50560
Source Host           : localhost:3306
Source Database       : stu

Target Server Type    : MYSQL
Target Server Version : 50560
File Encoding         : 65001

Date: 2022-12-11 19:42:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admininfo
-- ----------------------------
DROP TABLE IF EXISTS `admininfo`;
CREATE TABLE `admininfo` (
  `adminid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`adminid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of admininfo
-- ----------------------------
INSERT INTO `admininfo` VALUES ('1', 'admin', 'admin');

-- ----------------------------
-- Table structure for scoreinfo
-- ----------------------------
DROP TABLE IF EXISTS `scoreinfo`;
CREATE TABLE `scoreinfo` (
  `xuehao` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `xueyuan` varchar(255) DEFAULT NULL,
  `android` varchar(255) DEFAULT NULL,
  `j2ee` varchar(255) DEFAULT NULL,
  `php` varchar(255) DEFAULT NULL,
  `javascript` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of scoreinfo
-- ----------------------------
INSERT INTO `scoreinfo` VALUES ('2101', '张五', '建筑信息学院', '90', '92', '91', '93');
INSERT INTO `scoreinfo` VALUES ('2102', '张一', '建筑信息学院', '89', '83', '93', '95');
INSERT INTO `scoreinfo` VALUES ('2103', '李二', '建筑信息学院', '88', '96', '89', '92');
INSERT INTO `scoreinfo` VALUES ('2104', '王一', '建筑信息学院', '82', '86', '88', '92');
INSERT INTO `scoreinfo` VALUES ('2105', '李四', '建筑信息学院', '94', '91', '93', '96');
INSERT INTO `scoreinfo` VALUES ('2106', '王三', '建筑信息学院', '87', '86', '92', '93');
INSERT INTO `scoreinfo` VALUES ('2107', '张二', '建筑信息学院', '92', '91', '87', '92');
INSERT INTO `scoreinfo` VALUES ('2108', '王六', '建筑信息学院', '81', '89', '91', '96');
INSERT INTO `scoreinfo` VALUES ('2109', '李三', '建筑信息学院', '97', '94', '92', '91');
INSERT INTO `scoreinfo` VALUES ('2110', '张六', '建筑信息学院', '96', '89', '93', '88');
INSERT INTO `scoreinfo` VALUES ('2111', '张八', '建筑信息学院', '96', '98', '95', '98');

-- ----------------------------
-- Table structure for studentinfo
-- ----------------------------
DROP TABLE IF EXISTS `studentinfo`;
CREATE TABLE `studentinfo` (
  `xuehao` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) DEFAULT NULL,
  `xueyuan` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `classname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`xuehao`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of studentinfo
-- ----------------------------
INSERT INTO `studentinfo` VALUES ('2101', '张五', '建筑信息学院', '女', '01', '13847396421', '123456');
INSERT INTO `studentinfo` VALUES ('2102', '张一', '建筑信息学院', '女', '01', '17335595989', '123456');
INSERT INTO `studentinfo` VALUES ('2103', '李二', '建筑信息学院', '男', '02', '13087058800', '123321');
INSERT INTO `studentinfo` VALUES ('2104', '王一', '建筑信息学院', '女', '02', '15639962222', '123456');
INSERT INTO `studentinfo` VALUES ('2105', '李四', '建筑信息学院', '男', '03', '13213126338', '123456');
INSERT INTO `studentinfo` VALUES ('2106', '王三', '建筑信息学院', '男', '03', '18639189222', '123456');
INSERT INTO `studentinfo` VALUES ('2107', '张二', '建筑信息学院', '男', '04', '15716301788', '123456');
INSERT INTO `studentinfo` VALUES ('2108', '王六', '建筑信息学院', '女', '04', '17230544781', '123456');
INSERT INTO `studentinfo` VALUES ('2109', '李三', '建筑信息学院', '女', '05', '13673899784', '123456');
INSERT INTO `studentinfo` VALUES ('2110', '张六', '建筑信息学院', '男', '05', '15785676832', '123456');
INSERT INTO `studentinfo` VALUES ('2111', '张八', '建筑信息学院', '女', '06', '18976896688', '123456');
