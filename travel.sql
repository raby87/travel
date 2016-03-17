/*
Navicat MySQL Data Transfer

Source Server         : loc.129
Source Server Version : 50622
Source Host           : 192.168.1.129:3366
Source Database       : travel

Target Server Type    : MYSQL
Target Server Version : 50622
File Encoding         : 65001

Date: 2016-03-17 10:16:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `attention`
-- ----------------------------
DROP TABLE IF EXISTS `attention`;
CREATE TABLE `attention` (
  `attention_id` int(11) NOT NULL,
  `from` int(11) NOT NULL COMMENT '关注者',
  `to` int(11) NOT NULL,
  PRIMARY KEY (`attention_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of attention
-- ----------------------------

-- ----------------------------
-- Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `cid` int(11) NOT NULL AUTO_INCREMENT COMMENT '业务ID',
  `tid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `from` int(11) DEFAULT '0' COMMENT '评论者',
  `to` int(11) DEFAULT '0' COMMENT '回复者UID：0表示，无（即针针对主活动）',
  `dml_flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '数据操作标识: 1-新增;2-修改;3-删除',
  `init_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '数据创建时间',
  `dml_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '数据最后修改时间',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------

-- ----------------------------
-- Table structure for `fans`
-- ----------------------------
DROP TABLE IF EXISTS `fans`;
CREATE TABLE `fans` (
  `fans_id` int(11) NOT NULL,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  PRIMARY KEY (`fans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='粉丝';

-- ----------------------------
-- Records of fans
-- ----------------------------

-- ----------------------------
-- Table structure for `opt_log`
-- ----------------------------
DROP TABLE IF EXISTS `opt_log`;
CREATE TABLE `opt_log` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1登陆2登出3',
  PRIMARY KEY (`auto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of opt_log
-- ----------------------------

-- ----------------------------
-- Table structure for `tag`
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `tagid` int(11) NOT NULL AUTO_INCREMENT COMMENT '标签ID',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '标签名',
  `dml_flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '数据操作标识: 1-新增;2-修改;3-删除',
  `init_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '数据创建时间',
  `dml_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '数据最后修改时间',
  PRIMARY KEY (`tagid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tag
-- ----------------------------

-- ----------------------------
-- Table structure for `travel`
-- ----------------------------
DROP TABLE IF EXISTS `travel`;
CREATE TABLE `travel` (
  `tid` int(11) NOT NULL AUTO_INCREMENT COMMENT '业务ID',
  `uid` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `started` date NOT NULL,
  `ended` date NOT NULL,
  `plain` varchar(255) NOT NULL DEFAULT '' COMMENT '旅行计划',
  `money_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '线上费用类型：1线下AA，2我请客，3你买单',
  `partner_condition` varchar(11) NOT NULL DEFAULT '' COMMENT '结伴要求',
  `content` varchar(255) NOT NULL DEFAULT '',
  `dml_flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '数据操作标识: 1-新增;2-修改;3-删除',
  `init_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '数据创建时间',
  `dml_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '数据最后修改时间',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of travel
-- ----------------------------

-- ----------------------------
-- Table structure for `travel_join`
-- ----------------------------
DROP TABLE IF EXISTS `travel_join`;
CREATE TABLE `travel_join` (
  `auto_id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `dml_flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '数据操作标识: 1-新增;2-修改;3-删除',
  `init_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '数据创建时间',
  `dml_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '数据最后修改时间',
  PRIMARY KEY (`auto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='加入游行表';

-- ----------------------------
-- Records of travel_join
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT '业务ID',
  `nickname` varchar(20) NOT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT '1' COMMENT '情感状态：1保密2单身求勾搭3热恋中4已婚5独身主义',
  `orgin_address` varchar(255) DEFAULT NULL,
  `now_address` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT '' COMMENT '职业',
  `like` varchar(255) DEFAULT '' COMMENT '兴趣爱好',
  `last_logined` datetime DEFAULT NULL,
  `dml_flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '数据操作标识: 1-新增;2-修改;3-删除',
  `init_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '数据创建时间',
  `dml_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '数据最后修改时间',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------

-- ----------------------------
-- Table structure for `user_tag`
-- ----------------------------
DROP TABLE IF EXISTS `user_tag`;
CREATE TABLE `user_tag` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `tagid` int(11) NOT NULL,
  `dml_flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '数据操作标识: 1-新增;2-修改;3-删除',
  `init_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '数据创建时间',
  `dml_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '数据最后修改时间',
  PRIMARY KEY (`auto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户标签';

-- ----------------------------
-- Records of user_tag
-- ----------------------------
