-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 19, 2017 at 11:25 AM
-- Server version: 5.7.17
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Education`
--
CREATE DATABASE `education`  CHARSET utf8;
USE `education`;

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

DROP TABLE IF EXISTS `apply`;
CREATE TABLE IF NOT EXISTS `apply` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '签到主键',
  `o_id` int(10) UNSIGNED NOT NULL COMMENT '操作员 ID',
  `m_id` int(10) UNSIGNED NOT NULL COMMENT '会议   ID',
  `apply_name` varchar(25) NOT NULL DEFAULT '' COMMENT '签到姓名',
  `apply_dress` varchar(55) NOT NULL DEFAULT '' COMMENT '附件密码',
  `apply_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `a_status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1为未签到，0为已签到',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1为存在，0为删除',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='签到表';

-- --------------------------------------------------------

--
-- Table structure for table `courseware`
--

DROP TABLE IF EXISTS `courseware`;
CREATE TABLE IF NOT EXISTS `courseware` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '课件主键',
  `o_id` int(10) UNSIGNED NOT NULL COMMENT '操作员 ID',
  `m_id` int(10) UNSIGNED NOT NULL COMMENT '会议   ID',
  `f_path` varchar(55) NOT NULL DEFAULT '' COMMENT '附件地址',
  `f_pass` varchar(25) NOT NULL DEFAULT '' COMMENT '附件密码',
  `c_status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1为开启，0为关闭',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1为存在，0为删除',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='课件表';

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

DROP TABLE IF EXISTS `meeting`;
CREATE TABLE IF NOT EXISTS `meeting` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '会仪表主键',
  `o_id` int(10) UNSIGNED NOT NULL COMMENT '操作员 ID',
  `m_topic` varchar(55) NOT NULL DEFAULT '' COMMENT '会议主题',
  `m_code` varchar(32) NOT NULL DEFAULT '' COMMENT '会议代码',
  `m_content` text COMMENT '会议内容',
  `apply_fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '报名费用',
  `m_status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1为开启，0为关闭',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1为存在，0为删除',
  `start_time` int(10) UNSIGNED NOT NULL COMMENT '开始时间',
  `end_time` int(10) UNSIGNED NOT NULL COMMENT '结束时间',
  `apply_time` int(10) UNSIGNED NOT NULL COMMENT '签到时间',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会议表';

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '订单主键',
  `increment_id` int(10) UNSIGNED NOT NULL COMMENT 'YYMMDDHHMM + 用户ID +RAND 5位',
  `m_id` int(10) UNSIGNED NOT NULL COMMENT '会议   ID',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT '用户   ID',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '用户 姓名',
  `mobile` char(11) NOT NULL DEFAULT '' COMMENT '用户 手机号',
  `order_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '订单金额',
  `pay_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '支付金额',
  `pay_way` varchar(20) NOT NULL DEFAULT '' COMMENT '支付类型',
  `status` tinyint(4) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1为未支付，0为支付',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单表';

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '日程主键',
  `o_id` int(10) UNSIGNED NOT NULL COMMENT '操作员 ID',
  `m_id` int(10) UNSIGNED NOT NULL COMMENT '会议   ID',
  `schedule_name` varchar(55) NOT NULL DEFAULT '' COMMENT '日程名称',
  `schedule_conten` text COMMENT '日程内容',
  `s_status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1为开启，0为关闭',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1为存在，0为删除',
  `start_time` int(10) UNSIGNED NOT NULL COMMENT '开始时间',
  `end_time` int(10) UNSIGNED NOT NULL COMMENT '结束时间',
  `apply_time` int(10) UNSIGNED NOT NULL COMMENT '签到时间',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='日程表';

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '电子票自增ID',
  `m_id` int(10) UNSIGNED NOT NULL COMMENT '会议表ID',
  `is_check` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1为未验，0为已验',
  `status` tinyint(4) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1为存在，0为删除',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

-- --------------------------------------------------------

--
-- Table structure for table `trade_info`
--

DROP TABLE IF EXISTS `trade_info`;
CREATE TABLE IF NOT EXISTS `trade_info` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '交易主键',
  `increment_id` int(10) UNSIGNED NOT NULL COMMENT 'YYMMDDHHMM + 用户ID +RAND 5位',
  `trade_no` varchar(40) NOT NULL DEFAULT '' COMMENT '我方交易号，日期+订单号',
  `third_trade_no` varchar(50) NOT NULL DEFAULT '' COMMENT '第三方方交易号',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT '用户   ID',
  `order_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '订单金额',
  `pay_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '支付金额',
  `pay_way` varchar(20) NOT NULL DEFAULT '' COMMENT '支付类型',
  `status` tinyint(4) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1为未支付，0为支付',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='交易流水表';

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户主键',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '用户 姓名',
  `password` char(32)  NOT NULL DEFAULT '' COMMENT '用户密码',
  `mobile` char(11) NOT NULL DEFAULT '' COMMENT '用户 手机号',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `status` tinyint(4) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1为存在，0为删除',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
