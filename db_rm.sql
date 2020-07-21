/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : db_rm

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-07-21 10:57:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_event`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_event`;
CREATE TABLE `tbl_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(255) NOT NULL,
  `event_start` datetime NOT NULL,
  `event_end` datetime NOT NULL,
  `event_url` varchar(255) NOT NULL,
  `event_allDay` varchar(5) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_event
-- ----------------------------
INSERT INTO `tbl_event` VALUES ('1', 'Birthday Party', '2015-01-30 11:35:38', '2015-01-30 15:35:52', 'http://www.ninenik.com', 'false');
INSERT INTO `tbl_event` VALUES ('2', 'Meeting', '2015-01-31 11:36:16', '2015-01-31 15:00:00', 'http://www.ninenik.com', 'false');
INSERT INTO `tbl_event` VALUES ('3', 'Lunch', '2015-02-01 15:30:00', '2015-02-01 16:00:00', 'http://www.google.com', 'false');
INSERT INTO `tbl_event` VALUES ('4', 'All Day Event', '2015-01-31 22:10:08', '0000-00-00 00:00:00', '', 'true');
INSERT INTO `tbl_event` VALUES ('5', 'Long Event', '2010-08-29 08:40:00', '2010-08-31 09:30:00', '', 'true');

-- ----------------------------
-- Table structure for `tb_admin_level`
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin_level`;
CREATE TABLE `tb_admin_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_level` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_admin_level
-- ----------------------------
INSERT INTO `tb_admin_level` VALUES ('1', 'Admin');
INSERT INTO `tb_admin_level` VALUES ('2', 'SUPER');
INSERT INTO `tb_admin_level` VALUES ('3', 'USER');

-- ----------------------------
-- Table structure for `tb_category`
-- ----------------------------
DROP TABLE IF EXISTS `tb_category`;
CREATE TABLE `tb_category` (
  `category` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT '',
  PRIMARY KEY (`category`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tb_category
-- ----------------------------
INSERT INTO `tb_category` VALUES ('2', 'ด้านระบบยาและสารน้ำ');
INSERT INTO `tb_category` VALUES ('3', 'กระจกเงา หมื่นบุปผา11');
INSERT INTO `tb_category` VALUES ('4', 'ด้านการป้องกันการติดเชื้อ');
INSERT INTO `tb_category` VALUES ('5', 'ด้านสิ่งแวดล้อมและความปลอดภัย');
INSERT INTO `tb_category` VALUES ('6', 'ด้านทรัพยากร');
INSERT INTO `tb_category` VALUES ('7', 'ด้านระบบสารสนเทศ');
INSERT INTO `tb_category` VALUES ('8', 'ด้านระบบบริการ');

-- ----------------------------
-- Table structure for `tb_department`
-- ----------------------------
DROP TABLE IF EXISTS `tb_department`;
CREATE TABLE `tb_department` (
  `dep_id` int(2) NOT NULL AUTO_INCREMENT,
  `main_dep` int(4) NOT NULL,
  `name` varchar(200) DEFAULT '',
  PRIMARY KEY (`dep_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tb_department
-- ----------------------------
INSERT INTO `tb_department` VALUES ('4', '1', 'งานพัสดุ');
INSERT INTO `tb_department` VALUES ('5', '1', 'งานการเงิน');
INSERT INTO `tb_department` VALUES ('6', '1', 'งานยานยนต์');
INSERT INTO `tb_department` VALUES ('7', '1', 'งานรักษาความปลอดภัย');
INSERT INTO `tb_department` VALUES ('18', '2', 'งานแล็บ (LAB)');
INSERT INTO `tb_department` VALUES ('9', '3', 'ผู้ป่วยนอก OPD');
INSERT INTO `tb_department` VALUES ('10', '3', 'งานผู้ป่วยใน IPD');
INSERT INTO `tb_department` VALUES ('11', '3', 'งานผู้ป่วยฉุกเฉิน ER');
INSERT INTO `tb_department` VALUES ('12', '3', 'งานซักฟอก (Supply) ');
INSERT INTO `tb_department` VALUES ('13', '4', 'งานทันตกรรม');
INSERT INTO `tb_department` VALUES ('14', '5', 'งานเภสัชกร');
INSERT INTO `tb_department` VALUES ('15', '6', 'งาน X-ray');
INSERT INTO `tb_department` VALUES ('16', '7', 'งานภายภาพ');
INSERT INTO `tb_department` VALUES ('17', '8', 'งานปฐมภูมิ');
INSERT INTO `tb_department` VALUES ('19', '9', 'องค์กรแพทย์');
INSERT INTO `tb_department` VALUES ('20', '10', 'งานแพทย์แผนไทย');
INSERT INTO `tb_department` VALUES ('21', '11', 'งานประกันสุขภาพ');
INSERT INTO `tb_department` VALUES ('22', '11', 'งาน IT');
INSERT INTO `tb_department` VALUES ('23', '11', 'งานเวชระเบียน');

-- ----------------------------
-- Table structure for `tb_department_group`
-- ----------------------------
DROP TABLE IF EXISTS `tb_department_group`;
CREATE TABLE `tb_department_group` (
  `main_dep` int(2) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(100) NOT NULL,
  PRIMARY KEY (`main_dep`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tb_department_group
-- ----------------------------
INSERT INTO `tb_department_group` VALUES ('1', 'กลุ่มงานบริหารทั่วไป');
INSERT INTO `tb_department_group` VALUES ('2', 'กลุ่มงานเทคนิคการแพทย์');
INSERT INTO `tb_department_group` VALUES ('3', 'กลุ่มงานการพยาบาล');
INSERT INTO `tb_department_group` VALUES ('4', 'กลุ่มงานทันตกรรม');
INSERT INTO `tb_department_group` VALUES ('5', 'กลุ่มงานเภสัชกรรมและคุ้มครองผู้บริโภค');
INSERT INTO `tb_department_group` VALUES ('6', 'กลุ่มงานรังสีวิทยา');
INSERT INTO `tb_department_group` VALUES ('8', 'กลุ่มงานบริการด้านปฐมภูมิและองค์รวม');
INSERT INTO `tb_department_group` VALUES ('9', 'กลุ่มงานองค์กรแพทย์');
INSERT INTO `tb_department_group` VALUES ('10', 'กลุ่มงานการแพทย์แผนไทยและการแพทย์ทางเลือก');
INSERT INTO `tb_department_group` VALUES ('11', 'กลุ่มงานประกันสุขภาพยุทธศาสตร์และสารสนเทศทางการแพทย์');

-- ----------------------------
-- Table structure for `tb_level_risk`
-- ----------------------------
DROP TABLE IF EXISTS `tb_level_risk`;
CREATE TABLE `tb_level_risk` (
  `level_risk` varchar(5) NOT NULL DEFAULT '',
  `name` varchar(200) DEFAULT NULL,
  `group_LV` int(2) NOT NULL,
  `num` int(2) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`num`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_level_risk
-- ----------------------------
INSERT INTO `tb_level_risk` VALUES ('A', 'เป็นเหตุการณ์เกือบพลาด ( Near miss )  พบเหตุการณ์หรือสถานที่ที่อาจเกิดเหตุการณ์ไม่พึงประสงค์   ผู้พบสามารถปรับแก้ไขได้ก่อนที่จะเกิดเหตุการณ์   ไม่ส่งผลกระทบต่อการทำงาน  ไม่มีมูลค่าความเสียหาย', '1', '1');
INSERT INTO `tb_level_risk` VALUES ('B', 'เกิดเหตุการณ์/ความผิดพลาดเกิดขึ้นแล้ว   แต่ไม่มีผลกระทบเนื่องจากยังไม่ถึงตัวผู้ป่วย ไม่ส่งผลกระทบต่อความสำเร็จของการให้บริการ ต่อองค์กร       ผู้ป่วยให้คำแนะนำกับรพ.หรือเกิดความไม่พอใจ', '1', '2');
INSERT INTO `tb_level_risk` VALUES ('C', 'เกิดเหตุการณ์/ความผิดพลาดกับผู้ป่วย/จนท. แต่ไม่เป็นอันตรายหรือเกิดความเสียหาย  จัดการได้  หรือมีมูลค่าความเสียหายน้อยกว่า 10,000 บาท มีผลกระทบต่อความสำเร็จขององค์กร', '2', '3');
INSERT INTO `tb_level_risk` VALUES ('D', 'เกิดความคลาดเคลื่อนขึ้นแล้ว  มีผลกระทบซึ่งไม่เป็นอันตราย  แต่ต้องมีการเฝ้าระวังเพื่อให้มั่นใจว่าไม่เป็นอันตราย   หรือมีมูลค่าความเสียหายน้อยกว่า 10,000 บาท  มีผลต่อความสำเร็จในการดำเนินงาน', '2', '4');
INSERT INTO `tb_level_risk` VALUES ('E   ', 'เกิดความผิดพลาดขึ้นและมีผลกระทบต่อผู้ป่วย /จนท. เพียงชั่วคราว   จำเป็นต้องได้รับการักษาเพิ่มเติม   ก่อให้เกิดปัญหาแก่การให้บริการปานกลางหรือต้องหยุดให้บริการบางส่วน สูญเสียเงิน10,000-100,000บาท', '3', '5');
INSERT INTO `tb_level_risk` VALUES ('F', 'เกิดความผิดพลาดขึ้นและมีผลกระทบต่อผู้ป่วย/จนท. เพียงชั่วคราว  จะต้องนอนรพ.นานขึ้น  หรือมีการสูญเสียเงิน 10,000-100,000 บาท       มีการร้องเรียนถึงผอ. ', '3', '6');
INSERT INTO `tb_level_risk` VALUES ('G', 'เกิดความผิดพลาดขึ้น และมีผลทำให้เกิดอันตราย  หรือมีผลกระทบมูลค่า 100,000 -1,000,000 บาท  มีผลกระทบทำให้การดำเนินงานไม่บรรลุผลสำเร็จขององค์กร  หรือมีการร้องเรียนระดับสื่อมวลชน                          ', '4', '7');
INSERT INTO `tb_level_risk` VALUES ('H', 'เกิดความคลาดเคลื่อน เกิดอันตรายเกือบถึงชีวิตต่อผู้รับบริการ ต้องทำการช่วยชีวิต ( ใส่ Tube clear airway )  หรือมีผลกระทบ สูญเสียเงิน 100,000-1,000,000บาท  หรือมีการร้องเรียนระดับสื่อมวลชน', '4', '8');
INSERT INTO `tb_level_risk` VALUES ('I', 'ความเสี่ยงเกิดขึ้นกับผู้ป่วย / จนท. และเป็นอันตรายจนถึงแก่ชีวิต   (Sentinel event )  หรือมีผลกระทบทำให้ไม่สามารถให้บริการได้เลย  หรือสูญเสียเงินมากกว่า 1 ล้านบาท หรือเกิดการฟ้องร้อง', '5', '9');

-- ----------------------------
-- Table structure for `tb_location`
-- ----------------------------
DROP TABLE IF EXISTS `tb_location`;
CREATE TABLE `tb_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_location
-- ----------------------------
INSERT INTO `tb_location` VALUES ('1', 'บริการหน้างาน OPD');
INSERT INTO `tb_location` VALUES ('2', 'ตึกผู้ป่วยใน IPD');
INSERT INTO `tb_location` VALUES ('3', 'บริเวณหน้าห้องฉุกเฉิน');
INSERT INTO `tb_location` VALUES ('6', 'ทางเดินหน้างานประกันสุขภาพ');

-- ----------------------------
-- Table structure for `tb_m`
-- ----------------------------
DROP TABLE IF EXISTS `tb_m`;
CREATE TABLE `tb_m` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rm` int(11) DEFAULT NULL COMMENT 'id ของ ตาราง tb_rm',
  `rm_subcategory` int(3) DEFAULT NULL COMMENT 'รหัสรายการความเสี่ยง',
  `rm_dep_id` int(11) DEFAULT NULL COMMENT 'id งานที่เกี่ยวข้อง',
  `date` datetime DEFAULT NULL,
  `tm_status` int(1) DEFAULT '1' COMMENT 'สถานะการทบทวน',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_m
-- ----------------------------
INSERT INTO `tb_m` VALUES ('1', '1', '6', '22', '2020-07-20 11:20:29', '1');
INSERT INTO `tb_m` VALUES ('2', '5', '6', '22', '2020-07-20 15:09:20', '1');
INSERT INTO `tb_m` VALUES ('3', '2', '5', '22', '2020-07-20 15:20:00', '1');

-- ----------------------------
-- Table structure for `tb_rm`
-- ----------------------------
DROP TABLE IF EXISTS `tb_rm`;
CREATE TABLE `tb_rm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rm_subcategory` int(3) DEFAULT NULL,
  `rm_date` date DEFAULT NULL,
  `rm_timeH` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rm_timeS` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rm_location` int(3) DEFAULT NULL,
  `rm_HN` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rm_AN` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rm_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rm_dep_id` int(3) DEFAULT NULL,
  `rm_details` text COLLATE utf8_unicode_ci,
  `rm_fedit` text COLLATE utf8_unicode_ci,
  `rm_note` text COLLATE utf8_unicode_ci,
  `rm_level_risk` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `files` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `rm_upost` int(3) DEFAULT NULL,
  `main_dep` int(3) DEFAULT NULL,
  `status` int(3) NOT NULL DEFAULT '1' COMMENT 'สถานะความเสี่ยง',
  `ms_status` int(1) DEFAULT '1' COMMENT 'สถานะของกล่องจดหมายแจ้งเตือน Admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_rm
-- ----------------------------
INSERT INTO `tb_rm` VALUES ('1', '6', '2020-07-09', '09', '00', '1', '000032011', '630001531', 'เชอร์รี่', '22', 'ห้องตรวจ 1 เข้าโปรแกรม Hosxpไม่ได้ ', 'แจ้งงาน IT', 'ไม่มี', 'C', '', '2020-07-09 13:16:33', '7', '11', '2', '2');
INSERT INTO `tb_rm` VALUES ('2', '5', '2020-07-09', '09', '00', '2', '000032011', '630001531', 'ธนัท ภัทรไพรศาล', '22', 'ทดสอบ', 'ทดสอบ', 'ทดสอบ', 'B', 'D-1594275524_4678.JPG', '2020-07-09 13:18:44', '7', '11', '2', '2');
INSERT INTO `tb_rm` VALUES ('3', '3', '2020-07-09', '10', '00', '6', '000032011', '630001531', 'บุษกร อ่องมี', '7', 'ทดสอบการเพิ่มความเสี่ยงครั้งที่ 1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'ไม่มีคับ', 'ให้แม่บ้านดูแลและทำความสะอาด', 'A', 'D-1594283304_6026.JPG', '2020-07-09 15:28:24', '7', '11', '1', '2');
INSERT INTO `tb_rm` VALUES ('4', '6', '2020-07-10', '09', '00', '1', '000032011', '', 'ธนัท ภัทรไพรศาล', '22', 'ทดสอบครั้งที่ 4', 'ทอสอบครั้งที่ 4', 'ไม่มีครับ', 'A', 'D-1594364091_2669.JPG', '2020-07-10 13:54:51', '7', '11', '1', '2');
INSERT INTO `tb_rm` VALUES ('5', '6', '2020-07-13', '10', '00', '1', '000032011', '', 'จุฑารัตน์ ตรีเพชร', '22', 'เข้าโปรแกรม Hosxp แล้ว มีข้อมูลแจ้งว่าติดต่อฐานข้อมูลไม่ได้', 'ขยับสายแลนแล้วก็ไม่ได้ จึงโทรแจ้งงาน IT', '', 'A', '', '2020-07-13 14:36:14', '7', '11', '2', '2');
INSERT INTO `tb_rm` VALUES ('6', '4', '2020-07-20', '09', '00', '2', ' 00003200', '630001532', 'ใครคนนั้น', '10', 'ผู้ป่วยปวดท้องทางเดินปัสสวะ ขับถ่ายไม่ออก', 'แจ้งแพทย์เวร', 'ไม่มี', 'E', '', '2020-07-20 16:11:13', '7', '11', '1', '1');

-- ----------------------------
-- Table structure for `tb_subcategory`
-- ----------------------------
DROP TABLE IF EXISTS `tb_subcategory`;
CREATE TABLE `tb_subcategory` (
  `subcategory` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT '',
  `category` varchar(5) DEFAULT '',
  PRIMARY KEY (`subcategory`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tb_subcategory
-- ----------------------------
INSERT INTO `tb_subcategory` VALUES ('1', 'กรณีเร่งด่วน - ไม่ได้รายงานแพทย์', '1');
INSERT INTO `tb_subcategory` VALUES ('2', 'ความสะอาดของพื้น ผนังเพดาน', '5');
INSERT INTO `tb_subcategory` VALUES ('3', 'สิ่งแวดล้อมรอบอาคาร/รพ.หญ้ารก,สกปรก,มีขยะ', '5');
INSERT INTO `tb_subcategory` VALUES ('4', 'ติดเชื้อจากการคาสายสวนปัสสาวะ', '4');
INSERT INTO `tb_subcategory` VALUES ('5', 'คอมพิวเตอร์เสีย', '7');
INSERT INTO `tb_subcategory` VALUES ('6', 'เข้าระบบงาน Hosxp ไม่ได้', '7');

-- ----------------------------
-- Table structure for `tb_times`
-- ----------------------------
DROP TABLE IF EXISTS `tb_times`;
CREATE TABLE `tb_times` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `timeS` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_times
-- ----------------------------
INSERT INTO `tb_times` VALUES ('1', '00');
INSERT INTO `tb_times` VALUES ('2', '01');
INSERT INTO `tb_times` VALUES ('3', '02');
INSERT INTO `tb_times` VALUES ('4', '03');
INSERT INTO `tb_times` VALUES ('5', '04');
INSERT INTO `tb_times` VALUES ('6', '05');
INSERT INTO `tb_times` VALUES ('7', '06');
INSERT INTO `tb_times` VALUES ('8', '07');
INSERT INTO `tb_times` VALUES ('9', '08');
INSERT INTO `tb_times` VALUES ('10', '09');
INSERT INTO `tb_times` VALUES ('11', '10');
INSERT INTO `tb_times` VALUES ('12', '11');
INSERT INTO `tb_times` VALUES ('13', '12');
INSERT INTO `tb_times` VALUES ('14', '13');
INSERT INTO `tb_times` VALUES ('15', '14');
INSERT INTO `tb_times` VALUES ('16', '15');
INSERT INTO `tb_times` VALUES ('17', '16');
INSERT INTO `tb_times` VALUES ('18', '17');
INSERT INTO `tb_times` VALUES ('19', '18');
INSERT INTO `tb_times` VALUES ('20', '19');
INSERT INTO `tb_times` VALUES ('21', '20');
INSERT INTO `tb_times` VALUES ('22', '21');
INSERT INTO `tb_times` VALUES ('23', '22');
INSERT INTO `tb_times` VALUES ('24', '23');
INSERT INTO `tb_times` VALUES ('25', '24');
INSERT INTO `tb_times` VALUES ('26', '25');
INSERT INTO `tb_times` VALUES ('27', '26');
INSERT INTO `tb_times` VALUES ('28', '27');
INSERT INTO `tb_times` VALUES ('29', '28');
INSERT INTO `tb_times` VALUES ('30', '29');
INSERT INTO `tb_times` VALUES ('31', '30');
INSERT INTO `tb_times` VALUES ('32', '31');
INSERT INTO `tb_times` VALUES ('33', '32');
INSERT INTO `tb_times` VALUES ('34', '33');
INSERT INTO `tb_times` VALUES ('35', '34');
INSERT INTO `tb_times` VALUES ('36', '35');
INSERT INTO `tb_times` VALUES ('37', '36');
INSERT INTO `tb_times` VALUES ('38', '37');
INSERT INTO `tb_times` VALUES ('39', '38');
INSERT INTO `tb_times` VALUES ('40', '39');
INSERT INTO `tb_times` VALUES ('41', '40');
INSERT INTO `tb_times` VALUES ('42', '41');
INSERT INTO `tb_times` VALUES ('43', '42');
INSERT INTO `tb_times` VALUES ('44', '43');
INSERT INTO `tb_times` VALUES ('45', '44');
INSERT INTO `tb_times` VALUES ('46', '45');
INSERT INTO `tb_times` VALUES ('47', '46');
INSERT INTO `tb_times` VALUES ('48', '47');
INSERT INTO `tb_times` VALUES ('49', '48');
INSERT INTO `tb_times` VALUES ('50', '49');
INSERT INTO `tb_times` VALUES ('51', '50');
INSERT INTO `tb_times` VALUES ('52', '51');
INSERT INTO `tb_times` VALUES ('53', '52');
INSERT INTO `tb_times` VALUES ('54', '53');
INSERT INTO `tb_times` VALUES ('55', '54');
INSERT INTO `tb_times` VALUES ('56', '55');
INSERT INTO `tb_times` VALUES ('57', '56');
INSERT INTO `tb_times` VALUES ('58', '57');
INSERT INTO `tb_times` VALUES ('59', '58');
INSERT INTO `tb_times` VALUES ('60', '59');

-- ----------------------------
-- Table structure for `tb_time_h`
-- ----------------------------
DROP TABLE IF EXISTS `tb_time_h`;
CREATE TABLE `tb_time_h` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timeH` varchar(20) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_time_h
-- ----------------------------
INSERT INTO `tb_time_h` VALUES ('1', '01');
INSERT INTO `tb_time_h` VALUES ('2', '02');
INSERT INTO `tb_time_h` VALUES ('3', '03');
INSERT INTO `tb_time_h` VALUES ('4', '04');
INSERT INTO `tb_time_h` VALUES ('5', '05');
INSERT INTO `tb_time_h` VALUES ('6', '06');
INSERT INTO `tb_time_h` VALUES ('7', '07');
INSERT INTO `tb_time_h` VALUES ('8', '08');
INSERT INTO `tb_time_h` VALUES ('9', '09');
INSERT INTO `tb_time_h` VALUES ('10', '10');
INSERT INTO `tb_time_h` VALUES ('11', '11');
INSERT INTO `tb_time_h` VALUES ('12', '12');
INSERT INTO `tb_time_h` VALUES ('13', '13');
INSERT INTO `tb_time_h` VALUES ('14', '14');
INSERT INTO `tb_time_h` VALUES ('15', '15');
INSERT INTO `tb_time_h` VALUES ('16', '16');
INSERT INTO `tb_time_h` VALUES ('17', '17');
INSERT INTO `tb_time_h` VALUES ('18', '18');
INSERT INTO `tb_time_h` VALUES ('19', '19');
INSERT INTO `tb_time_h` VALUES ('20', '20');
INSERT INTO `tb_time_h` VALUES ('21', '21');
INSERT INTO `tb_time_h` VALUES ('22', '22');
INSERT INTO `tb_time_h` VALUES ('23', '23');
INSERT INTO `tb_time_h` VALUES ('24', '00');

-- ----------------------------
-- Table structure for `tb_user`
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `dep_id` int(3) DEFAULT NULL,
  `main_dep` int(4) NOT NULL,
  `admin` varchar(1) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `files` varchar(200) DEFAULT '',
  `time_login` time DEFAULT NULL,
  `date_login` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('7', 'ธนัท  ภัทรไพรศาล', '22', '11', '1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'D-1594265132_181.JPG', null, null);
