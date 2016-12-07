/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : work

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-12-06 21:41:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `age` int(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '陈小婷', '123', '女', '21', '56345534', '前端开发工程师', './images/20161206205554.jpg');
INSERT INTO `user` VALUES ('2', '连彩琴', '345', '女', '23', '35625543', '教师', './images/20161206200402.jpg');
INSERT INTO `user` VALUES ('3', '何静', '345', '女', '21', '56235443', '教师', './images/20161206200516.jpg');
INSERT INTO `user` VALUES ('4', '陈丽容', '456', '女', '23', '32452454', '教师', './images/20161206200603.jpg');
INSERT INTO `user` VALUES ('5', '乐惠清', '567', '女', '22', '23462354', 'UI设计师', './images/20161206202350.jpg');
INSERT INTO `user` VALUES ('6', '官华金', '564', '女', '21', '34523544', '安卓开发工程师', './images/20161206202252.jpg');
INSERT INTO `user` VALUES ('7', '曾燕美', '546', '女', '21', '23452345', '教师', './images/20161206202439.jpg');
INSERT INTO `user` VALUES ('8', '蔡娇丹', '567', '女', '21', '42543532', 'UI设计师', './images/20161206203137.jpg');
INSERT INTO `user` VALUES ('9', '林津津', '678', '女', '19', '35634534', '教师', './images/20161206203215.jpg');
INSERT INTO `user` VALUES ('10', '李冰冰', '786', '女', '20', '54262434', 'PHP开发工程师', './images/20161206203311.jpg');
INSERT INTO `user` VALUES ('11', '陈惠超', '435', '男', '24', '56342543', '前端开发工程师', './images/20161206203401.jpg');
INSERT INTO `user` VALUES ('12', '陈志彬', '563', '男', '19', '54635443', '前端开发工程师', './images/20161206203446.jpg');
INSERT INTO `user` VALUES ('13', '陈婷婷', '563', '女', '25', '56734564', 'UI设计师', './images/20161206203637.jpg');
INSERT INTO `user` VALUES ('14', '陈洁婷', '342', '女', '21', '45879385', '教师', './images/20161206203728.jpg');
INSERT INTO `user` VALUES ('15', '许萍萍', '456', '女', '21', '49892343', '教师', './images/20161206203819.jpg');
INSERT INTO `user` VALUES ('16', '陈志超', '343', '男', '24', '56453454', '安卓开发工程师', './images/20161206203535.jpg');
