/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : education

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-08-21 08:50:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '用户名称',
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '用户编号（账号）',
  `phone` char(12) DEFAULT NULL COMMENT '手机号',
  `password` varchar(50) NOT NULL DEFAULT '' COMMENT '密码',
  `roleID` varchar(255) NOT NULL DEFAULT '1' COMMENT '角色权限',
  `bumen` varchar(255) DEFAULT NULL COMMENT '所属部门',
  `working` varchar(255) DEFAULT NULL COMMENT '工作岗位',
  `time` varchar(255) DEFAULT NULL COMMENT '登录时间',
  `beizhu` varchar(325) DEFAULT NULL COMMENT '账号备注信息',
  `status` int(11) DEFAULT '0' COMMENT '账号状态，0启用，1禁用',
  `dateandtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  `IP` varchar(255) DEFAULT NULL COMMENT '当前登陆IP',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '超级管理员', 'tygytc', null, 'tygytc', '0', null, null, '2018-11-03 16:23:48', null, '0', '2018-05-20 00:00:00', null);
INSERT INTO `admin` VALUES ('2', '超级管理员', 'admin', '', '123456', '1', '', '', '2019-08-20 10:14:48', null, '0', '2018-05-23 00:00:00', '0.0.0.0');

-- ----------------------------
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL COMMENT '区分电脑站，手机站',
  `imageurl` varchar(100) DEFAULT NULL,
  `specifyurl` varchar(255) DEFAULT NULL,
  `times` varchar(255) NOT NULL,
  `SortID` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------

-- ----------------------------
-- Table structure for class
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_title` varchar(255) DEFAULT NULL COMMENT '课程名称',
  `specialty` varchar(255) DEFAULT NULL COMMENT '专业',
  `class_type` varchar(255) DEFAULT NULL COMMENT '资费类型、收费1、免费2、公开课3',
  `price` double(8,2) unsigned DEFAULT '0.00' COMMENT '价格',
  `imageurl` varchar(255) DEFAULT NULL COMMENT '封面图',
  `content` longtext COMMENT '详情',
  `num` int(11) DEFAULT '0' COMMENT '学过次数',
  `cat_id` int(11) unsigned NOT NULL DEFAULT '0',
  `is_join` int(11) NOT NULL COMMENT '是否加入课程',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='课程表';

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES ('5', '护士11', '8', '1', '123.00', '/public/upload/Class/c39ca79a0813c8e81fe5ae6a1c3ba78a.JPG', '<p>护士11<br/></p>', '12', '2', '0');
INSERT INTO `class` VALUES ('6', '公开课测试1', '8', '3', '0.00', '/public/upload/Class/c39ca79a0813c8e81fe5ae6a1c3ba78a.JPG', '<p>公开课<br/></p>', '222', '2', '0');
INSERT INTO `class` VALUES ('7', '公开课测试2', '8', '3', '0.00', '/public/upload/Class/c39ca79a0813c8e81fe5ae6a1c3ba78a.JPG', '<p>公开课<br/></p>', '123', '2', '0');
INSERT INTO `class` VALUES ('8', '护士必修', '8', '1', '234.00', '/public/upload/Class/f46e72816590022909e06b193c9964e3.jpg', '<p>护士必修护士必修护士必修护士必修护士必修护士必修护士必修</p>', '0', '1', '0');
INSERT INTO `class` VALUES ('9', '护士免费1', '8', '2', '0.00', '/public/upload/Class/124f8a2f431e9e6bf511b15c6835658b.jpg', '<p>护士免费1护士免费1护士免费1护士免费1护士免费1护士免费1护士免费1护士免费1护士免费1护士免费1护士免费1</p>', '0', '1', '0');
INSERT INTO `class` VALUES ('10', '护士免费2', '8', '2', '0.00', '/public/upload/Class/d79573de20748eb65ebfb8a8a319d079.jpg', '<p>护士免费2护士免费2护士免费2护士免费2护士免费2护士免费2护士免费2护士免费2护士免费2护士免费2护士免费2护士免费2护士免费2</p>', '0', '2', '0');
INSERT INTO `class` VALUES ('11', '护士免费3', '8', '2', '0.00', '/public/upload/Class/c9867c334e4ad88cccd1f4cd024057d9.jpg', '<p>护士免费3护士免费3护士免费3护士免费3护士免费3护士免费3护士免费3护士免费3护士免费3护士免费3护士免费3护士免费3护士免费3</p>', '0', '2', '0');
INSERT INTO `class` VALUES ('12', '护士免费4', '8', '2', '0.00', '/public/upload/Class/11277d723cf277cb179dd9c6809d23a9.jpg', '<p>护士免费4护士免费4护士免费4护士免费4护士免费4护士免费4护士免费4护士免费4护士免费4护士免费4</p>', '0', '1', '0');

-- ----------------------------
-- Table structure for class_type
-- ----------------------------
DROP TABLE IF EXISTS `class_type`;
CREATE TABLE `class_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentID` varchar(255) DEFAULT NULL COMMENT '父级id',
  `type_name` varchar(255) DEFAULT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='课程分类';

-- ----------------------------
-- Records of class_type
-- ----------------------------
INSERT INTO `class_type` VALUES ('1', '0', '备考指导');
INSERT INTO `class_type` VALUES ('2', '0', '基础精讲');
INSERT INTO `class_type` VALUES ('3', '0', '黄金考点');
INSERT INTO `class_type` VALUES ('4', '0', '公开课');

-- ----------------------------
-- Table structure for collect_class
-- ----------------------------
DROP TABLE IF EXISTS `collect_class`;
CREATE TABLE `collect_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL COMMENT '用户ID',
  `classID` int(11) DEFAULT NULL COMMENT '课程ID',
  `zhangjieId` int(11) DEFAULT NULL,
  `collect_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COMMENT='用户收藏';

-- ----------------------------
-- Records of collect_class
-- ----------------------------
INSERT INTO `collect_class` VALUES ('67', '5', '5', '2', '1566291370');
INSERT INTO `collect_class` VALUES ('66', '5', '5', '1', '1566291361');

-- ----------------------------
-- Table structure for collect_shiti
-- ----------------------------
DROP TABLE IF EXISTS `collect_shiti`;
CREATE TABLE `collect_shiti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL COMMENT '用户id',
  `shitiID` int(11) DEFAULT NULL COMMENT '试题id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='试题收藏';

-- ----------------------------
-- Records of collect_shiti
-- ----------------------------

-- ----------------------------
-- Table structure for daily_problem
-- ----------------------------
DROP TABLE IF EXISTS `daily_problem`;
CREATE TABLE `daily_problem` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `specialty` int(11) DEFAULT NULL COMMENT '专业',
  `question` longtext COMMENT '题目',
  `list` longtext NOT NULL COMMENT '试题列表',
  `answer` varchar(255) NOT NULL COMMENT '答案',
  `jiexi` longtext COMMENT '试题解析',
  `datetime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '时间日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='每日一题';

-- ----------------------------
-- Records of daily_problem
-- ----------------------------
INSERT INTO `daily_problem` VALUES ('1', '8', '买了假药该去什么部门告状？请选择：', 'A,国务院食品药品监督管理部门||B,省级食品药品监管部门||C,市场食品药品监管部门||D,县级食品药品监管部门', 'A', '暂无解析', '123465456');

-- ----------------------------
-- Table structure for danye
-- ----------------------------
DROP TABLE IF EXISTS `danye`;
CREATE TABLE `danye` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lanmuID` int(11) NOT NULL DEFAULT '0' COMMENT '所属栏目ID',
  `type` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(300) DEFAULT '',
  `content` text,
  `imageurl` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of danye
-- ----------------------------
INSERT INTO `danye` VALUES ('1', '44', '', '使用说明', '<h3>1.如果收不到验证码怎么办？</h3><p><br/></p><p>注册等收秒验证码时，注册等收秒验证码时，注册等收秒验证码时，注册等收秒验证码时，</p><p><br/></p><h3>1.如果收不到验证码怎么办？</h3><p><br/></p><p>注册等收秒验证码时，注册等收秒验证码时，注册等收秒验证码时，注册等收秒验证码时，</p>', null);

-- ----------------------------
-- Table structure for dibu
-- ----------------------------
DROP TABLE IF EXISTS `dibu`;
CREATE TABLE `dibu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL DEFAULT '',
  `keywords` varchar(500) NOT NULL DEFAULT '无',
  `content` text,
  `logo` varchar(100) DEFAULT NULL,
  `IsOpen` varchar(255) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='网站信息';

-- ----------------------------
-- Records of dibu
-- ----------------------------

-- ----------------------------
-- Table structure for dingdan
-- ----------------------------
DROP TABLE IF EXISTS `dingdan`;
CREATE TABLE `dingdan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` varchar(255) DEFAULT NULL COMMENT '用户ID',
  `classID` int(11) DEFAULT NULL COMMENT '课程ID',
  `status` varchar(255) DEFAULT '0' COMMENT '付款状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订单';

-- ----------------------------
-- Records of dingdan
-- ----------------------------

-- ----------------------------
-- Table structure for download
-- ----------------------------
DROP TABLE IF EXISTS `download`;
CREATE TABLE `download` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(5) NOT NULL COMMENT '用户ID',
  `mp4id` int(5) DEFAULT NULL COMMENT '视频ID',
  `classid` int(5) DEFAULT NULL COMMENT '分类ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=451 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of download
-- ----------------------------

-- ----------------------------
-- Table structure for friendlink
-- ----------------------------
DROP TABLE IF EXISTS `friendlink`;
CREATE TABLE `friendlink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL DEFAULT '',
  `linkurl` varchar(100) NOT NULL DEFAULT '' COMMENT '链接地址',
  `imageurl` varchar(100) DEFAULT NULL,
  `IsShow` varchar(255) NOT NULL DEFAULT 'true' COMMENT '0:no，1：yes',
  `SortID` int(11) NOT NULL DEFAULT '1',
  `type` varchar(255) DEFAULT NULL COMMENT '类别',
  `status` varchar(255) DEFAULT NULL COMMENT '状态：0启用，1禁用',
  `dateandtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of friendlink
-- ----------------------------

-- ----------------------------
-- Table structure for idea
-- ----------------------------
DROP TABLE IF EXISTS `idea`;
CREATE TABLE `idea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` varchar(255) DEFAULT NULL COMMENT '用户id',
  `question` varchar(255) DEFAULT NULL COMMENT '问题',
  `content` varchar(255) DEFAULT NULL COMMENT '详情',
  `type` tinyint(3) DEFAULT NULL COMMENT '问题0，意见1',
  `dateandtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COMMENT='意见表';

-- ----------------------------
-- Records of idea
-- ----------------------------
INSERT INTO `idea` VALUES ('6', '5', null, '意见4', '0', null);
INSERT INTO `idea` VALUES ('7', '5', null, '111', '0', null);
INSERT INTO `idea` VALUES ('8', '5', null, '2222', '0', null);
INSERT INTO `idea` VALUES ('9', '5', '答案有疑问 | 答案与解析不符合 | 有错别字 | ', 'abc', '1', null);
INSERT INTO `idea` VALUES ('10', '5', '选项有问题 | 其他问题 | ', '问题333', '1', null);
INSERT INTO `idea` VALUES ('11', '5', '有错别字||选项有问题||其他问题', '问题444', '1', null);
INSERT INTO `idea` VALUES ('12', '5', '有错别字  ||  选项有问题', '问题4444', '1', null);
INSERT INTO `idea` VALUES ('13', '5', null, 'qweqwe', '0', null);
INSERT INTO `idea` VALUES ('14', '5', '答案有疑问  ||  答案与解析不符合', 'qweqwe', '1', null);
INSERT INTO `idea` VALUES ('15', '5', '答案有疑问  ||  答案与解析不符合', 'asdasda', '1', null);
INSERT INTO `idea` VALUES ('16', '12', null, '123456', '0', null);
INSERT INTO `idea` VALUES ('17', '12', '答案与解析不符合  ||  有错别字', 'abc', '1', '2018-10-24 08:55:56');
INSERT INTO `idea` VALUES ('18', '12', null, '意见反馈111', '0', '2018-10-24 09:18:47');
INSERT INTO `idea` VALUES ('19', '12', '其他问题', '驱蚊器翁群翁群翁', '1', '2018-10-24 09:19:10');
INSERT INTO `idea` VALUES ('20', '12', '其他问题', '阿萨撒撒撒撒撒', '1', '2018-10-24 09:19:58');
INSERT INTO `idea` VALUES ('21', null, '答案与解析不符合  ||  有错别字', 'qweqw', '1', '2018-10-24 10:56:26');
INSERT INTO `idea` VALUES ('23', null, null, 'a', '0', '2018-10-24 11:01:08');
INSERT INTO `idea` VALUES ('24', null, null, 'b', '0', '2018-10-24 11:01:15');
INSERT INTO `idea` VALUES ('25', null, null, 'c', '0', '2018-10-24 11:01:22');
INSERT INTO `idea` VALUES ('26', null, null, 'd', '0', '2018-10-24 11:01:32');
INSERT INTO `idea` VALUES ('27', null, null, 'e', '0', '2018-10-24 11:01:39');
INSERT INTO `idea` VALUES ('28', '5', '答案有疑问  ||  有错别字  ||  选项有问题', 'test', '1', '2018-11-01 10:23:11');
INSERT INTO `idea` VALUES ('29', '5', '答案有疑问  ||  答案与解析不符合', '测试', '1', '2018-11-01 10:35:18');

-- ----------------------------
-- Table structure for lanmu
-- ----------------------------
DROP TABLE IF EXISTS `lanmu`;
CREATE TABLE `lanmu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentID` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '',
  `controller` varchar(50) NOT NULL DEFAULT '',
  `SortID` int(11) NOT NULL,
  `IsShow` varchar(255) NOT NULL DEFAULT 'true',
  `icon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of lanmu
-- ----------------------------
INSERT INTO `lanmu` VALUES ('44', '0', '使用说明', 'Danye', '44', 'true', '');

-- ----------------------------
-- Table structure for liuyan
-- ----------------------------
DROP TABLE IF EXISTS `liuyan`;
CREATE TABLE `liuyan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zhiwei` varchar(60) DEFAULT NULL COMMENT '职位，',
  `name` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '0',
  `email` varchar(103) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL COMMENT '性别',
  `xueli` text COMMENT '学历',
  `jianli` text NOT NULL COMMENT '简历',
  `dateandtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '添加时间',
  `age` varchar(255) DEFAULT NULL COMMENT '年龄',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of liuyan
-- ----------------------------

-- ----------------------------
-- Table structure for my_class
-- ----------------------------
DROP TABLE IF EXISTS `my_class`;
CREATE TABLE `my_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL COMMENT '用户id',
  `classID` int(11) DEFAULT NULL COMMENT '课程id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='我的课程';

-- ----------------------------
-- Records of my_class
-- ----------------------------
INSERT INTO `my_class` VALUES ('1', '5', '5');
INSERT INTO `my_class` VALUES ('2', '5', '12');

-- ----------------------------
-- Table structure for pay_img
-- ----------------------------
DROP TABLE IF EXISTS `pay_img`;
CREATE TABLE `pay_img` (
  `newid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL COMMENT '区分支付宝，微信',
  `imageurl` varchar(100) DEFAULT NULL,
  `specifyurl` varchar(255) DEFAULT NULL,
  `times` varchar(255) NOT NULL,
  `SortID` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`newid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='支付二维码';

-- ----------------------------
-- Records of pay_img
-- ----------------------------

-- ----------------------------
-- Table structure for special
-- ----------------------------
DROP TABLE IF EXISTS `special`;
CREATE TABLE `special` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentID` varchar(255) DEFAULT NULL COMMENT '父级ID',
  `type_name` varchar(255) DEFAULT NULL COMMENT '类型名称',
  `SortID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COMMENT='专业类型';

-- ----------------------------
-- Records of special
-- ----------------------------
INSERT INTO `special` VALUES ('1', '0', '护士', '1');
INSERT INTO `special` VALUES ('2', '0', '药师', '2');
INSERT INTO `special` VALUES ('3', '0', '医师', '3');
INSERT INTO `special` VALUES ('4', '0', '医疗事业编', '4');
INSERT INTO `special` VALUES ('5', '0', '中西医理疗师', '5');
INSERT INTO `special` VALUES ('6', '0', '住院医师', '6');
INSERT INTO `special` VALUES ('7', '0', '医学考研', '7');
INSERT INTO `special` VALUES ('8', '1', '护士资格', '8');
INSERT INTO `special` VALUES ('9', '2', '执业西药师', '9');
INSERT INTO `special` VALUES ('10', '2', '执业中药师', '10');
INSERT INTO `special` VALUES ('17', '2', '营养课程', '11');
INSERT INTO `special` VALUES ('18', '2', '药店管理', '12');
INSERT INTO `special` VALUES ('19', '3', '临床执业医师', '13');
INSERT INTO `special` VALUES ('20', '3', '乡村全科助理医师', '14');
INSERT INTO `special` VALUES ('21', '3', '口腔助理医师', '15');
INSERT INTO `special` VALUES ('22', '3', '中西医助理医师', '16');
INSERT INTO `special` VALUES ('23', '3', '中医助理医师', '17');
INSERT INTO `special` VALUES ('24', '3', '临床助理医师', '18');
INSERT INTO `special` VALUES ('25', '3', '口腔执业医师', '19');
INSERT INTO `special` VALUES ('26', '3', '中西医执业医师', '20');
INSERT INTO `special` VALUES ('27', '3', '中医执业医师', '21');
INSERT INTO `special` VALUES ('28', '3', '中医专长', '22');
INSERT INTO `special` VALUES ('29', '4', '解剖学', '23');
INSERT INTO `special` VALUES ('30', '4', '药理学', '24');
INSERT INTO `special` VALUES ('31', '4', '生理学', '25');
INSERT INTO `special` VALUES ('32', '4', '病理学', '26');
INSERT INTO `special` VALUES ('33', '5', '102初级中荮士', '27');
INSERT INTO `special` VALUES ('34', '5', '367主管中药师', '28');
INSERT INTO `special` VALUES ('35', '5', '361-362疾病控制主治医师', '29');
INSERT INTO `special` VALUES ('36', '5', '201初级药师', '30');
INSERT INTO `special` VALUES ('37', '5', '366主管药师', '31');
INSERT INTO `special` VALUES ('38', '5', '303-39内科学(中级)', '32');
INSERT INTO `special` VALUES ('39', '6', '耳鼻咽喉科', '33');
INSERT INTO `special` VALUES ('40', '6', '全科', '34');
INSERT INTO `special` VALUES ('41', '6', '神经内科', '35');
INSERT INTO `special` VALUES ('42', '6', '外科', '36');
INSERT INTO `special` VALUES ('43', '6', '小儿内科', '37');
INSERT INTO `special` VALUES ('44', '6', '小儿外科', '38');
INSERT INTO `special` VALUES ('45', '6', '眼科', '39');
INSERT INTO `special` VALUES ('46', '6', '皮肤科', '40');
INSERT INTO `special` VALUES ('47', '6', '内科', '41');
INSERT INTO `special` VALUES ('48', '7', '西医考研', '42');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '会员名',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `nickname` varchar(255) DEFAULT NULL COMMENT '昵称',
  `phone` varchar(255) DEFAULT NULL COMMENT '手机号',
  `IDcard` varchar(255) DEFAULT NULL COMMENT '身份证号',
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `pay_type` varchar(255) DEFAULT NULL COMMENT '支付方式',
  `pay_num` varchar(255) DEFAULT NULL COMMENT '支付账号',
  `photo` varchar(255) DEFAULT 'public/home/img/touxiang.png' COMMENT '头像',
  `specialty` varchar(255) DEFAULT NULL COMMENT '专业',
  `status` varchar(255) DEFAULT '1' COMMENT '账户状态，0启用，1禁用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='会员';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'tygytc', 'e10adc3949ba59abbe56e057f20f883e', 'tygytc', null, null, '2018-10-20 10:58:45', null, null, 'public/home/img/touxiang.png', null, '1');
INSERT INTO `user` VALUES ('5', 'qweqwe', 'dc483e80a7a0bd9ef71d8cf973673924', '贼鸡儿准', '13412344444', null, '2018-10-20 14:42:43', null, null, 'public/upload/header/0c1b3c056280f6070c68684e6a98934d.jpg', '8', '1');
INSERT INTO `user` VALUES ('18', 'asdasd', 'a8f5f167f44f4964e6c998dee827110c', 'asdasd', '13412341234', null, '2018-10-24 14:35:04', null, null, 'public/home/img/touxiang.png', null, '1');
INSERT INTO `user` VALUES ('19', 'qwerty', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'qwerty', '13554655545', null, '2018-10-24 14:35:49', null, null, 'public/home/img/touxiang.png', null, '1');

-- ----------------------------
-- Table structure for user_join
-- ----------------------------
DROP TABLE IF EXISTS `user_join`;
CREATE TABLE `user_join` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kid` int(11) NOT NULL COMMENT '课程ID',
  `is_join` int(11) NOT NULL COMMENT '是否加入,0未加入，1已加入',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_join
-- ----------------------------
INSERT INTO `user_join` VALUES ('1', '5', '1', '5');
INSERT INTO `user_join` VALUES ('2', '2', '1', '5');
INSERT INTO `user_join` VALUES ('4', '10', '1', '5');
INSERT INTO `user_join` VALUES ('5', '4', '1', '5');
INSERT INTO `user_join` VALUES ('6', '6', '1', '5');
INSERT INTO `user_join` VALUES ('8', '9', '1', '5');
INSERT INTO `user_join` VALUES ('9', '12', '1', '5');
INSERT INTO `user_join` VALUES ('10', '8', '1', '5');
INSERT INTO `user_join` VALUES ('11', '7', '1', '5');
INSERT INTO `user_join` VALUES ('12', '11', '1', '5');

-- ----------------------------
-- Table structure for webinfo
-- ----------------------------
DROP TABLE IF EXISTS `webinfo`;
CREATE TABLE `webinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL DEFAULT '',
  `keywords` varchar(500) NOT NULL DEFAULT '无',
  `description` text,
  `logo` varchar(100) DEFAULT NULL,
  `IsOpen` varchar(255) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='网站信息';

-- ----------------------------
-- Records of webinfo
-- ----------------------------
INSERT INTO `webinfo` VALUES ('1', '医学教育', '', '', null, 'true');

-- ----------------------------
-- Table structure for zhangjie
-- ----------------------------
DROP TABLE IF EXISTS `zhangjie`;
CREATE TABLE `zhangjie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classID` int(11) DEFAULT NULL COMMENT '课程ID',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `video_path` varchar(255) DEFAULT NULL COMMENT '视频链接',
  `is_download` int(1) DEFAULT '0' COMMENT '0正在下载 1下载完成',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='课程章节';

-- ----------------------------
-- Records of zhangjie
-- ----------------------------
INSERT INTO `zhangjie` VALUES ('1', '5', '第一章：护士护理', '/public/upload/Video/1.mp4', '0');
INSERT INTO `zhangjie` VALUES ('2', '5', '第二章：护士护理2', '/public/upload/Video/1.mp4', '0');
INSERT INTO `zhangjie` VALUES ('3', '8', 'hhh', '/public/upload/Video/1.mp4', '0');
INSERT INTO `zhangjie` VALUES ('8', '5', 'aaaa', '/public/upload/Video/2.mp4', '0');
INSERT INTO `zhangjie` VALUES ('9', '6', 'aaaa', '/public/upload/Video/2.mp4', '0');
INSERT INTO `zhangjie` VALUES ('15', '10', '护士免费2', '/public/upload/Video/hushimianfei2.mp4', '0');
INSERT INTO `zhangjie` VALUES ('10', '12', 'bbbbb', '/public/upload/Video/2.mp4', '0');
INSERT INTO `zhangjie` VALUES ('14', '9', '护士免费1', '/public/upload/Video/hushimianfei1.mp4', '1');
INSERT INTO `zhangjie` VALUES ('16', '11', '护士免费3', '/public/upload/Video/hushimianfei3.mp4', '0');
INSERT INTO `zhangjie` VALUES ('17', '5', '护士11', '/public/upload/Video/fufei.mp4', '0');
INSERT INTO `zhangjie` VALUES ('18', '7', '公开', '/public/upload/Video/gongkai.mp4', '0');
INSERT INTO `zhangjie` VALUES ('19', '12', '护士免费4', '/public/upload/Video/hushimianfei4.mp4', '0');
