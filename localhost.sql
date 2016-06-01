-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-06-01 08:01:06
-- 服务器版本： 5.6.29
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--
CREATE DATABASE IF NOT EXISTS `laravel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `laravel`;

-- --------------------------------------------------------

--
-- 表的结构 `account`
--

CREATE TABLE `account` (
  `id` int(10) UNSIGNED NOT NULL,
  `cbe_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `adminRecord`
--

CREATE TABLE `adminRecord` (
  `id` int(10) UNSIGNED NOT NULL,
  `cbeAdminId` int(11) NOT NULL,
  `cbeAdminLoginLasttime` bigint(20) NOT NULL,
  `cbeAdminLoginLastIP` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `cbeAdminLogintime` bigint(20) NOT NULL,
  `cbeAdminLoginIP` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `adminRecord`
--

INSERT INTO `adminRecord` (`id`, `cbeAdminId`, `cbeAdminLoginLasttime`, `cbeAdminLoginLastIP`, `cbeAdminLogintime`, `cbeAdminLoginIP`, `created_at`, `updated_at`) VALUES
(1, 1, 1464747896, '::1', 1464757769, '::1', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `cbe`
--

CREATE TABLE `cbe` (
  `id` int(10) UNSIGNED NOT NULL,
  `cbeName` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `cbeCode` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cbeNo` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `cbeAccount` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `cbeBalance` double(8,2) NOT NULL DEFAULT '0.00',
  `cbePass` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `cbeChoice` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cbeLogistics` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cbePay` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cbeTime` bigint(20) NOT NULL,
  `isalive` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `cbe`
--

INSERT INTO `cbe` (`id`, `cbeName`, `cbeCode`, `cbeNo`, `cbeAccount`, `cbeBalance`, `cbePass`, `cbeChoice`, `cbeLogistics`, `cbePay`, `phone`, `cbeTime`, `isalive`) VALUES
(1, '测试公司', 'demo', '13121147', '1107745359@qq.com', 0.00, 'e6cbd48a45f1c245ef39997543cba10c', '1', '0', NULL, '15249243295', 1464747408, 1);

-- --------------------------------------------------------

--
-- 表的结构 `cbeAdmin`
--

CREATE TABLE `cbeAdmin` (
  `cbeAdminId` int(10) UNSIGNED NOT NULL,
  `cbeAdminAccount` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `cbeAdminPass` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `cbeAdminPhone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `cbeAdminMail` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `cbeAdmin`
--

INSERT INTO `cbeAdmin` (`cbeAdminId`, `cbeAdminAccount`, `cbeAdminPass`, `cbeAdminPhone`, `cbeAdminMail`, `created_at`, `updated_at`) VALUES
(1, 'water', 'e6cbd48a45f1c245ef39997543cba10c', '15249243295', '1107745359@qq.com', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `cbeRecord`
--

CREATE TABLE `cbeRecord` (
  `id` int(10) UNSIGNED NOT NULL,
  `cbe_id` int(11) NOT NULL,
  `cbeLoginTime` bigint(20) NOT NULL,
  `cbeLoginIP` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `cbeRecord`
--

INSERT INTO `cbeRecord` (`id`, `cbe_id`, `cbeLoginTime`, `cbeLoginIP`, `created_at`, `updated_at`) VALUES
(1, 1, 1464757753, '::1', NULL, NULL),
(2, 1, 1464758624, '::1', NULL, NULL),
(3, 1, 1464764465, '::1', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `good`
--

CREATE TABLE `good` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `log`
--

CREATE TABLE `log` (
  `cbeLogName` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `cbeLogNo` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `insure` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(4) NOT NULL,
  `support_cod` tinyint(4) NOT NULL,
  `shipping_print` text COLLATE utf8_unicode_ci NOT NULL,
  `print_bg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `config_lable` text COLLATE utf8_unicode_ci NOT NULL,
  `print_model` tinyint(4) NOT NULL,
  `shipping_order` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `log`
--

INSERT INTO `log` (`cbeLogName`, `cbeLogNo`, `created_at`, `updated_at`, `shipping_code`, `shipping_name`, `shipping_desc`, `insure`, `enabled`, `support_cod`, `shipping_print`, `print_bg`, `config_lable`, `print_model`, `shipping_order`) VALUES
('', 1, NULL, NULL, 'sf_express', '顺丰速运', '江、浙、沪地区首重15元/KG，续重2元/KG，其余城市首重20元/KG', '', 1, 0, '', '', '', 0, 0),
('', 2, NULL, NULL, 'yto', '圆通速递', '上海圆通物流（速递）有限公司经过多年的网络快速发展，在中国速递行业中一直处于领先地位。为了能更好的发展国际快件市场，加快与国际市场的接轨，强化圆通的整体实力，圆通已在东南亚、欧美、中东、北美洲、非洲等许多城市运作国际快件业务', '', 1, 1, '', '', '', 0, 0),
('', 3, NULL, NULL, 'post_express', '邮政快递包裹', '邮政快递包裹的描述内容。', '', 1, 0, '', '', '', 0, 0),
('', 4, NULL, NULL, 'ems', 'EMS 国内邮政特快专递', 'EMS 国内邮政特快专递描述内容', '', 1, 0, '', '', '', 0, 0),
('', 5, NULL, NULL, 'flat', '市内快递', '固定运费的配送方式内容', '', 1, 1, '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2016_03_25_072238_create_cbe_table', 1),
('2016_03_25_074737_create_order_table', 1),
('2016_03_25_074756_create_log_table', 1),
('2016_03_25_074811_create_pay_table', 1),
('2016_03_25_074825_create_cbeAdmin_table', 1),
('2016_03_25_074839_create_account_table', 1),
('2016_03_25_074902_create_good_table', 1),
('2016_03_25_074925_create_adminRecord_table', 1),
('2016_03_25_074948_create_cbeRecord_table', 1),
('2016_04_05_065546_create_recharge_table', 1),
('2016_04_16_021422_add_to_pay_table', 1),
('2016_04_22_024843_add_to_log_table', 2),
('2016_04_28_031236_add_to_order_table', 2),
('2016_05_09_014929_create_order_info_table', 2),
('2016_05_09_020057_create_waybill_table', 2);

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `cbe_id` int(11) NOT NULL,
  `num` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `money` double(8,2) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `log_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `BookNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `orderInfo`
--

CREATE TABLE `orderInfo` (
  `id` int(10) UNSIGNED NOT NULL,
  `cbe_id` int(11) NOT NULL,
  `BookNo` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `declareDate` bigint(20) NOT NULL,
  `cbeCode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cbeName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LogisticsNo` int(11) DEFAULT NULL,
  `shipper` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipperAddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipperPhone` int(11) DEFAULT NULL,
  `shipperCountryCiq` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `consignor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phoneNum` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `consignorAdd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cardId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `consigneePhone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `countryiq` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `countryCus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `goodName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agentCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agentName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `packageTypeCiq` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transportationMethod` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `pay`
--

CREATE TABLE `pay` (
  `pay_id` int(10) UNSIGNED NOT NULL,
  `pay_code` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `pay_name` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `pay_fee` double(8,2) NOT NULL,
  `pay_desc` text COLLATE utf8_unicode_ci,
  `pay_config` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `enabled` int(11) NOT NULL,
  `is_cod` int(11) NOT NULL,
  `is_online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `pay`
--

INSERT INTO `pay` (`pay_id`, `pay_code`, `pay_name`, `pay_fee`, `pay_desc`, `pay_config`, `created_at`, `updated_at`, `enabled`, `is_cod`, `is_online`) VALUES
(1, 'alipay', '<font color="#FF0000">支付宝</fon', 0.00, '支付宝网站(www.alipay.com) 是国内先进的网上支付平台。<br/>支付宝收款接口：在线即可开通，<font color="red"><b>零预付，免年费</b></font>，单笔阶梯费率，无流量限制。<br/><a href="http://cloud.ecshop.com/payment_apply.php?mod=alipay" target="_blank"><font color="red">立即在线申请</font></a>', 'a:4:{i:0;a:3:{s:4:"name";s:14:"alipay_account";s:4', NULL, NULL, 1, 0, 0),
(2, 'tenpay', '财付通', 0.00, '<b>财付通（www.tenpay.com） - 腾讯旗下在线支付平台，通过国家权威安全认证，支持各大银行网上支付，免支付手续费。</b><br /><a href="http://cloud.ecshop.com/payment_apply.php?mod=tenpay&par=1202822001" target="_blank">立即免费申请：单笔费率1%</a><br /><a href="http://cloud.ecshop.com/payment_apply.php?mod=tenpay&par=1442037873" target="_blank">立即购买包量套餐：折算后单笔费率0.6-1%</a>', 'a:3:{i:0;a:3:{s:4:"name";s:14:"tenpay_account";s:4', NULL, NULL, 1, 0, 0),
(3, 'cod', '货到付款', 0.00, '开通城市：×××\r\n货到付款区域：×××', '', NULL, NULL, 1, 0, 0),
(4, 'epay', '<font color="#FF0000">双乾支付</fo', 0.00, '双乾网络支付是苏州市首家获得<font color="red"><b>人民银行颁发支付牌照</b></font>的支付平台，国内先进的网络支付平台之一，与国内38家银行深度合作，一次开通网关支付，快捷支付，无卡支付，手机支付等收款接口：<font color="red"><b>24小时内</b></font>可在线开通收款，<font color="red"><b>零预付</b></font>关单笔手续费为T+1结算<font color="red"><b>0.35％</b></font>，无流量限制，<a href="http://cloud.ecshop.com/payment_apply.php?mod=epay" target="_blank"><font color="red"><b>立即在线申请</b></font></a>', 'a:2:{i:0;a:3:{s:4:"name";s:12:"epay_account";s:4:"', NULL, NULL, 1, 0, 0),
(5, 'chinabank', '网银在线', 0.00, '网银在线（www.chinabank.com.cn）与中国工商银行、招商银行、中国建设银行、农业银行、民生银行等数十家金融机构达成协议。全面支持全国19家银行的信用卡及借记卡实现网上支付。<br/><a href="http://cloud.ecshop.com/payment_apply.php?mod=chinabank" target="_blank">立即在线申请</a>', 'a:2:{i:0;a:3:{s:4:"name";s:17:"chinabank_account";', NULL, NULL, 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `recharge`
--

CREATE TABLE `recharge` (
  `id` int(10) UNSIGNED NOT NULL,
  `cbe_id` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `num` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `money` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `waybill`
--

CREATE TABLE `waybill` (
  `id` int(10) UNSIGNED NOT NULL,
  `billNo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `billTime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billState` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminRecord`
--
ALTER TABLE `adminRecord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cbe`
--
ALTER TABLE `cbe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cbe_cbename_unique` (`cbeName`),
  ADD UNIQUE KEY `cbe_cbeno_unique` (`cbeNo`),
  ADD UNIQUE KEY `cbe_cbeaccount_unique` (`cbeAccount`);

--
-- Indexes for table `cbeAdmin`
--
ALTER TABLE `cbeAdmin`
  ADD PRIMARY KEY (`cbeAdminId`);

--
-- Indexes for table `cbeRecord`
--
ALTER TABLE `cbeRecord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `good`
--
ALTER TABLE `good`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`cbeLogNo`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderInfo`
--
ALTER TABLE `orderInfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `recharge`
--
ALTER TABLE `recharge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waybill`
--
ALTER TABLE `waybill`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `adminRecord`
--
ALTER TABLE `adminRecord`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `cbe`
--
ALTER TABLE `cbe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `cbeAdmin`
--
ALTER TABLE `cbeAdmin`
  MODIFY `cbeAdminId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `cbeRecord`
--
ALTER TABLE `cbeRecord`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `good`
--
ALTER TABLE `good`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `log`
--
ALTER TABLE `log`
  MODIFY `cbeLogNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `orderInfo`
--
ALTER TABLE `orderInfo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `pay`
--
ALTER TABLE `pay`
  MODIFY `pay_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `recharge`
--
ALTER TABLE `recharge`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `waybill`
--
ALTER TABLE `waybill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
